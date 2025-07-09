<?php
session_start();
include 'DataBaseConnection.php';

$user_id = $_SESSION['user_id'];
$sql_docs = "SELECT * FROM documents WHERE user_id = '$user_id'";
$result_docs = $conn->query($sql_docs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Documents</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/jpg" href="../img/ashoksthambh.jpg">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
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
            text-align: center;
        }

        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn-view, .btn-download {
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            display: inline-block;
        }

        .btn-view {
            background-color: #28a745;
        }
        .btn-download {
            background-color: #dc3545;
        }

        .btn-view:hover {
            background: #218838;
        }

        .btn-download:hover {
            background: #c82333;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header mb-3">Your Documents</div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Document Name</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result_docs->fetch_assoc()) { ?>
                        <tr>
                            <td>
                                <a href="/earthcafe/uploads/<?php echo urlencode(basename($row['file_path'])); ?>"
                                    class="btn btn-link" target="_blank">
                                    <?php echo $row['file_name']; ?>
                                </a>
                            </td>
                            <td>
                                <a href="/earthcafe/uploads/<?php echo urlencode(basename($row['file_path'])); ?>"
                                    target="_blank" class="btn-view">
                                    View
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

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
