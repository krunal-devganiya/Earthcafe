<?php
include 'DataBaseConnection.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user data along with certificate type, status, document names, and doc IDs from uploads table
$sqlDocs = "SELECT u.username, u.email, uploads.certificate_type, uploads.status,uploads.document_name,uploads.id
            FROM uploads
            INNER JOIN users u
            ON uploads.user_id = u.id
            WHERE uploads.user_id = ? 
            AND uploads.status = 'Wrong Document' AND uploads.reupload_request = 1";

$stmt = $conn->prepare($sqlDocs);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Store data in an associative array to ensure unique certificate types
$documents = [];
$userData = [];

while ($row = $result->fetch_assoc()) {
    $userData = [
        'username' => $row['username'],
        'email' => $row['email']
    ];

    $documents[$row['certificate_type']][] = [
        'status' => $row['status'],
        'document_names' => $row['document_name'],
        'doc_ids' => $row['id']
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Re-Upload Documents</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/jpg" href="../img/ashoksthambh.jpg">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 40px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #ffc107;
            color: white;
            text-align: center;
            padding: 15px;
            border-radius: 10px 10px 0 0;
            font-size: 22px;
            font-weight: bold;
        }

        .table th {
            background-color: #ffca2c;
            text-align: center;
        }

        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .reupload-section {
            background-color: #fff3cd;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .card-header {
            background-color: #ffca2c;
            color: white;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            padding: 15px;
            border-radius: 10px 10px 0 0;
        }

        .btn-reupload {
            background-color: #ffc107;
            border: none;
            color: white;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-reupload:hover {
            background-color: #e0a800;
        }

        .close-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: transparent;
            color: #ffc107;
            font-size: 35px;
            cursor: pointer;
            border: none;
            z-index: 9999;
        }

        .close-btn:hover {
            color: #e0a800;
        }

        .form-file {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-file input {
            flex-grow: 1;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="header">Re-Upload Documents</div>

    <?php if (!empty($documents)) : ?>
        <?php foreach ($documents as $certificate => $requests) : ?>
            <div class="reupload-section">
                <div class="card">
                    <div class="card-header">
                        <strong><?php echo htmlspecialchars($certificate); ?></strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Document Name</th>
                                    <th>Re-Upload</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($requests as $row) : ?>
                                    <?php
                                    $docNames = explode(", ", $row['document_names']);
                                    $docIds = explode(",", $row['doc_ids']);
                                    ?>
                                    <?php foreach ($docNames as $index => $docName) : ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($docName); ?></td>
                                            <td>
                                                <form action="reupload_document.php" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="upload_id" value="<?php echo trim($docIds[$index]); ?>">
                                                    <input type="hidden" name="certificate_type" value="<?php echo htmlspecialchars($certificate); ?>">
                                                    <div class="form-file">
                                                        <input type="file" name="new_document" required onchange="validateFile(this, '<?php echo htmlspecialchars($docName); ?>')">
                                                        <button type="submit" class="btn-reupload">Re-Upload</button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="p-3 text-center">No documents need re-uploading.</div>
    <?php endif; ?>
</div>

<!-- Close Button -->
<ion-icon name="close-outline" class="close-btn" onclick="goHome()"></ion-icon>

<script>
    function goHome() {
        window.location.assign("Dashboard.php");
    }

    function validateFile(input, certificateType) {
        let file = input.files[0];
        if (!file) return;

        let fileName = file.name.toLowerCase();
        let fileSize = file.size;
        let validType = certificateType.toLowerCase().replace(/\s+/g, '');
        let expectedFileName = validType + ".jpg";

        if (!fileName.includes(validType)) {
            alert(`Document should be named as '${expectedFileName}'`);
            input.value = "";
            return;
        }

        if (fileSize > 1048576) {
            alert("File size should be less than 1MB!");
            input.value = "";
            return;
        }
    }
</script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
