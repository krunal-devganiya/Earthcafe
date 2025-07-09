<?php
include 'DataBaseConnection.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

// Fetch only "Success" status requests
$sqlHistory = "SELECT users.id, users.username, users.email, uploads.certificate_type, uploads.status, uploads.request_id
               FROM users 
               JOIN uploads ON users.id = uploads.user_id
               WHERE uploads.status = 'Success'  -- ✅ Fetch only 'Success' requests
               GROUP BY uploads.request_id";

$resultHistory = $conn->query($sqlHistory);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/jpg" href="../earthcafe/img/ashoksthambh.jpg">

    <style>
        /* Custom styles for the page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .table {
            border: 1px solid #dee2e6;
            border-radius: 8px;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
            padding: 15px 20px;
        }

        .table thead {
            background-color: #f1c70b;
            color: white;
            font-weight: bold;
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

    <div class="container">
        <div class="card">
            <div class="card-header">
                Document History (Completed Requests)
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Certificate Type</th>
                            <th>Request ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $resultHistory->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['username']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['certificate_type']); ?></td>
                                <td><?php echo htmlspecialchars($row['request_id']); ?></td>
                            </tr>
                        <?php } ?>
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

<?php
$conn->close();
?>
