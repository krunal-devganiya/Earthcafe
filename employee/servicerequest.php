<?php
include 'DataBaseConnection.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

// Fetch all users who uploaded documents
$sqlUsers = "SELECT users.id, users.username, users.email, uploads.certificate_type, uploads.status, uploads.request_id
FROM users 
JOIN uploads ON users.id = uploads.user_id
WHERE uploads.status NOT IN ('Success', 'Service Rejected')  -- ✅ Exclude 'Success' and 'Service Rejected' requests
GROUP BY uploads.request_id";



$resultUsers = $conn->query($sqlUsers);

// Fetch user documents if a user is selected
// Fetch user documents if a user is selected
$documents = [];
if (isset($_GET['user_id']) && isset($_GET['request_id'])) {
    $user_id = intval($_GET['user_id']);
    $request_id = $_GET['request_id'];
    $certificate_type = $_GET['certificate_type'] ?? '';

    $sqlDocs = "SELECT request_id, certificate_type, document_name, document_path, reupload_request, status
                FROM uploads 
                WHERE user_id = $user_id 
                AND certificate_type = '$certificate_type' 
                AND request_id = '$request_id'
                AND status != 'Success'";

    $resultDocs = $conn->query($sqlDocs);

    while ($row = $resultDocs->fetch_assoc()) {
        $documents[$request_id][] = $row;
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Service Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/jpg" href="../img/ashoksthambh.jpg">


    <style>
        .close-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: transparent;
            color: #ffc107;
            padding: 5px 5px;
            border: none;
            cursor: pointer;
            font-size: 35px;
            font-weight: 100;
            border-radius: 10px;
            z-index: 9999;
        }

        .close-btn:hover {
            background: #ffc107;
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Service Requests</h2>

        <!-- User List Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Certificate Type</th>
                    <th>View Documents</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultUsers->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['certificate_type']); ?></td>
                        <td>
                            <a href="servicerequest.php?user_id=<?php echo $row['id']; ?>&certificate_type=<?php echo $row['certificate_type']; ?>&request_id=<?php echo $row['request_id']; ?>"
                                class="btn btn-primary btn-sm">
                                View Documents
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="update_status.php">
                                <input type="hidden" name="request_id"
                                    value="<?php echo htmlspecialchars($row['request_id']); ?>">
                                <select name="status" class="form-select" onchange="this.form.submit()">
                                    <option value="Pending" <?php if ($row['status'] == 'Pending')
                                        echo 'selected'; ?>>Pending
                                    </option>
                                    <option value="Active" <?php if ($row['status'] == 'Active')
                                        echo 'selected'; ?>>
                                        Active</option>
                                    <option value="Success" <?php if ($row['status'] == 'Success')
                                        echo 'selected'; ?>>
                                        Success</option>
                                    <option value="Wrong Document" <?php if ($row['status'] == 'Wrong Document')
                                        echo 'selected'; ?>>Wrong Document</option>
                                    <option value="Service Rejected" <?php if ($row['status'] == 'Service Rejected')
                                        echo 'selected'; ?>>Service Rejected</option>
                                </select>
                            </form>
                        </td>


                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Display Documents for Selected User -->
        <?php if (!empty($documents)) { ?>
            <h3 class="mt-4">Uploaded Documents for Request ID: <?php echo htmlspecialchars($request_id); ?></h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Certificate Type</th>
                        <th>Document Name</th>
                        <th>Download</th>
                        <th>Approve</th>
                        <th>Reject</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($documents[$request_id] as $doc) {
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($doc['certificate_type']); ?></td>
                            <td><?php echo htmlspecialchars($doc['document_name']); ?></td>
                            <td>
                                <a href="../<?php echo htmlspecialchars($doc['document_path']); ?>" target="_blank"
                                    class="btn btn-success btn-sm">
                                    Download
                                </a>
                            </td>
                            <td>
                                <?php if ($doc['status'] == 'Pending') { ?>
                                    <form method="POST" action="update_document_status.php">
                                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                        <input type="hidden" name="request_id" value="<?php echo $request_id; ?>">
                                        <input type="hidden" name="certificate_type"
                                            value="<?php echo $doc['certificate_type']; ?>">
                                        <input type="hidden" name="document_name" value="<?php echo $doc['document_name']; ?>">
                                        <button type="submit" name="action" value="Approved"
                                            class="btn btn-primary btn-sm">Approve</button>
                                    </form>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($doc['status'] == 'Pending' && $doc['reupload_request'] == 0) { ?>
                                    <form method="POST" action="update_document_status.php">
                                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                        <input type="hidden" name="request_id" value="<?php echo $request_id; ?>">
                                        <input type="hidden" name="certificate_type"
                                            value="<?php echo $doc['certificate_type']; ?>">
                                        <input type="hidden" name="document_name" value="<?php echo $doc['document_name']; ?>">
                                        <button type="submit" name="action" value="Rejected"
                                            class="btn btn-danger btn-sm">Reject</button>
                                    </form>
                                <?php } ?>
                            </td>

                        </tr>
                    <?php } ?>

                </tbody>

            </table>
        <?php } ?>

    </div>

    <!-- Close Button -->
    <ion-icon name="close-outline" class="close-btn" onclick="goHome()"></ion-icon>
    <script>
        function goHome() {
            window.location.assign("./dashboard.php");
        }
    </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>