<?php
include 'DataBaseConnection.php'; 
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php"); 
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user documents based on request_id
$sqlDocs = "SELECT u.username, u.email, uploads.request_id, uploads.certificate_type, uploads.status, uploads.upload_time
            FROM uploads
            INNER JOIN users u ON uploads.user_id = u.id
            WHERE uploads.user_id = ? 
            AND (uploads.status = 'Pending' OR uploads.status = 'Active' OR  uploads.status = 'Wrong Document')
            AND (uploads.is_upload= '1')
            ORDER BY uploads.request_id ASC";

$stmt = $conn->prepare($sqlDocs);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$documents = [];
$userData = [];

while ($row = $result->fetch_assoc()) {
    $userData = [
        'username' => $row['username'],
        'email' => $row['email']
    ];
    
    // Unique request_id & certificate_type
    $key = $row['request_id'] . '-' . $row['certificate_type'];
    if (!isset($documents[$key])) {
        $documents[$key] = [
            'request_id' => $row['request_id'],
            'certificate_type' => $row['certificate_type'],
            'status' => $row['status'],
            'upload_time' => $row['upload_time'] // ✅ Now storing upload_time
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Documents</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/jpg" href="../img/ashoksthambh.jpg">

    <style>
        /* Custom Close Button Styles */
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

        /* Table and Layout Styling */
        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
            padding: 12px;
        }

        .table thead {
            background-color: #f1c70b;
            color: white;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table th {
            font-weight: bold;
        }

        .container {
            margin-top: 50px;
        }

        h2 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 2rem;
            color: #333;
        }

        /* Badge Styles */
        .badge {
            font-size: 14px;
            font-weight: 600;
        }

        /* Card Layout */
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #f1c70b;
            color: white;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }

        .card-body {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                My Uploaded Documents
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Certificate Type</th>
                            <th>Apply Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($documents)): ?>
                            <?php foreach ($documents as $doc): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($doc['certificate_type']); ?></td>
                                    <td><?php echo htmlspecialchars($doc['upload_time']); ?></td> <!-- ✅ Display upload_time -->
                                    <td>
                                        <?php 
                                            if ($doc['status'] == 'Pending') {
                                                echo '<span class="badge bg-warning">' . htmlspecialchars($doc['status']) . '</span>';
                                            } elseif ($doc['status'] == 'Wrong Document') {
                                                echo '<span class="badge bg-danger">' . htmlspecialchars($doc['status']) . '</span>';
                                            } elseif ($doc['status'] == 'Active') {
                                                echo '<span class="badge bg-primary">' . htmlspecialchars($doc['status']) . '</span>';
                                            }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center">No Pending or Wrong Document Found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <ion-icon name="close-outline" class="close-btn" onclick="goHome()"></ion-icon>

    <script>
        function goHome() {
            window.location.assign("dashboard.php");
        }
    </script>
    
    <!-- Ionicons for Close Button Icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
