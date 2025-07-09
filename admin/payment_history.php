<?php
session_start();
include 'DataBaseConnection.php';

// Check Database Connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// Fetch All Payments Data
$sql = "SELECT * FROM payments ORDER BY created_at DESC";
$result = $conn->query($sql);

// Calculate total values
$total_service_fees = 0;
$total_consultancy_fees = 0;
$total_total_fees = 0;

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $total_service_fees += $row['service_fees'];
        $total_consultancy_fees += $row['consultancy_fees'];
        $total_total_fees += $row['total_fees'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Payments</title>
    <link rel="icon" type="image/jpg" href="../img/ashoksthambh.jpg">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
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

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #f1c70b;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .card-body {
            padding: 20px;
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

        .table th {
            font-weight: bold;
            font-size: 18px;
        }

        .table td {
            font-size: 16px;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .totals-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .totals-container label {
            font-weight: bold;
            margin-right: 10px;
        }

        .totals-container input {
            width: 120px;
            text-align: center;
            border: none;
            font-size: 16px;
            font-weight: bold;
            background: #fff;
            padding: 5px;
            border-radius: 5px;
        }

        .filter-container {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .filter-container input {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                Payments List
            </div>
            <div class="card-body">

                <!-- Totals and Filter Section -->
                <div class="totals-container">
                    <div>
                        <label>Total Service Fees:</label>
                        <input type="text" id="totalServiceFees" value="₹<?= number_format($total_service_fees, 2) ?>" readonly>
                    </div>
                    <div>
                        <label>Total Consultancy Fees:</label>
                        <input type="text" id="totalConsultancyFees" value="₹<?= number_format($total_consultancy_fees, 2) ?>" readonly>
                    </div>
                    <div>
                        <label>Total Fees:</label>
                        <input type="text" id="totalTotalFees" value="₹<?= number_format($total_total_fees, 2) ?>" readonly>
                    </div>
                    <div class="filter-container">
                        <label>Filter by Date:</label>
                        <input type="date" id="startDate">
                        <input type="date" id="endDate">
                        <button class="btn btn-warning" onclick="applyFilter()">Filter</button>
                    </div>
                </div>

                <!-- Payments Table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="paymentsTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Service Name</th>
                                <th>Service Fees</th>
                                <th>Consultancy Fees</th>
                                <th>Total Fees</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <?php
                            $result = $conn->query("SELECT * FROM payments ORDER BY created_at DESC");
                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                            <td>{$row['id']}</td>
                                            <td>{$row['user_id']}</td>
                                            <td>{$row['service_name']}</td>
                                            <td class='service_fees' data-value='{$row['service_fees']}'>₹" . number_format($row['service_fees'], 2) . "</td>
                                            <td class='consultancy_fees' data-value='{$row['consultancy_fees']}'>₹" . number_format($row['consultancy_fees'], 2) . "</td>
                                            <td class='total_fees' data-value='{$row['total_fees']}'>₹" . number_format($row['total_fees'], 2) . "</td>
                                            <td class='created_at' data-value='{$row['created_at']}'>{$row['created_at']}</td>
                                          </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7' class='text-center'>No Payment Records Found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <script>
        function applyFilter() {
            let startDate = new Date(document.getElementById("startDate").value);
            let endDate = new Date(document.getElementById("endDate").value);
            let rows = document.querySelectorAll("#tableBody tr");

            let totalService = 0, totalConsultancy = 0, totalTotal = 0;

            rows.forEach(row => {
                let createdAt = new Date(row.querySelector('.created_at').getAttribute('data-value'));
                if (createdAt >= startDate && createdAt <= endDate) {
                    row.style.display = "";
                    totalService += parseFloat(row.querySelector('.service_fees').getAttribute('data-value'));
                    totalConsultancy += parseFloat(row.querySelector('.consultancy_fees').getAttribute('data-value'));
                    totalTotal += parseFloat(row.querySelector('.total_fees').getAttribute('data-value'));
                } else {
                    row.style.display = "none";
                }
            });

            document.getElementById("totalServiceFees").value = "₹" + totalService.toFixed(2);
            document.getElementById("totalConsultancyFees").value = "₹" + totalConsultancy.toFixed(2);
            document.getElementById("totalTotalFees").value = "₹" + totalTotal.toFixed(2);
        }
    </script>
    <!-- Close button -->
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
