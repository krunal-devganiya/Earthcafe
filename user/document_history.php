<?php
include 'DataBaseConnection.php'; 
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user data along with certificate type and status from uploads table
$sqlDocs = "SELECT u.username, u.email, uploads.certificate_type, uploads.status
            FROM uploads
            INNER JOIN users u
            ON uploads.user_id = u.id
            WHERE uploads.user_id = ? 
            AND uploads.status = 'Success'";

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
    $documents[$row['certificate_type']] = $row['status']; // Ensure unique certificate type
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/jpg" href="../img/ashoksthambh.jpg">

    <style>
        /* Close button styling */
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

        /* Table styling */
        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
            padding: 15px;
        }

        .table thead {
            background-color: #f1c70b;
            color: white;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table-striped tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .table th {
            font-weight: bold;
        }

        .table td {
            font-size: 16px;
        }

        /* Container and general styling */
        .container {
            margin-top: 50px;
        }

        /* Card styling */
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

        /* Badge styling for status */
        .badge {
            padding: 8px 15px;
            font-size: 16px;
        }

        .badge-success {
            background-color: #28a745;
        }

        .badge-warning {
            background-color: #ffc107;
        }

        .badge-danger {
            background-color: #dc3545;
        }

    </style>
</head>

<body>
    <div class="container mt-5">
        <!-- Card Layout for Document History -->
        <div class="card">
            <div class="card-header">
                My Document History
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Certificate Type</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($documents)): ?>
                            <?php foreach ($documents as $certificate_type => $status): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($certificate_type); ?></td>
                                    <td><span class="badge badge-success"><?php echo htmlspecialchars($status); ?></span></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center">No Active or Success Documents Found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Close Button to go back to Dashboard -->
    <ion-icon name="close-outline" class="close-btn" onclick="goHome()"></ion-icon>
    <script>
        function goHome() {
            window.location.assign("dashboard.php");
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
