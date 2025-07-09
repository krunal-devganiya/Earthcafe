<?php
session_start();
include 'DataBaseConnection.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Employee delete functionality
if (isset($_GET['delete_id'])) {
    $delete_id = (int)$_GET['delete_id']; // Ensure it is an integer

    $sql = "DELETE FROM employees WHERE id = $delete_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Employee deleted successfully'); window.location='manageemployee.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

// Fetch all employees
$sql = "SELECT * FROM employees";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employees List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/jpg" href="../earthcafe/img/ashoksthambh.jpg">

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .close-btn {
            position: absolute;
            top: 30px;
            right: 40px;
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

        .btn-sm {
            font-size: 12px;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Employees List</h2>
            <a href="./empregister.php" class="btn btn-outline-warning btn-lg ms-5 mb-2">Add Employee</a>
        </div>

        <div class="card">
            <div class="card-header text-center">
                Employees Information
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['contact']; ?></td> <!-- Contact Column -->
                                    <td>
                                        <a href="manageemployee.php?delete_id=<?php echo urlencode($row['id']); ?>" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this employee?');">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

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

<?php
$conn->close();
?>
