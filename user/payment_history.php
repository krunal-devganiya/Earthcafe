<?php
session_start();
include 'DataBaseConnection.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("Access Denied");
}

$user_id = $_SESSION['user_id'];

// Fetch User Payments Data
$sql = "SELECT * FROM payments WHERE user_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Payments</title>
    <link rel="icon" type="image/jpg" href="../img/ashoksthambh.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
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

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
            padding: 15px 20px;
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
        <div class="card">
            <div class="card-header">
                My Payments
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Service Name</th>
                                <th>Service Fees</th>
                                <th>Consultancy Fees</th>
                                <th>Total Fees</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                            <td>{$row['id']}</td>
                                            <td>{$row['service_name']}</td>
                                            <td>₹" . number_format($row['service_fees'], 2) . "</td>
                                            <td>₹" . number_format($row['consultancy_fees'], 2) . "</td>
                                            <td>₹" . number_format($row['total_fees'], 2) . "</td>
                                            <td>{$row['created_at']}</td>
                                          </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6' class='text-center'>No Payment Records Found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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