<!DOCTYPE html>
<html lang="en">
<?php
include 'DataBaseConnection.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch certificate type and status from uploads table
$sqlDocs = "SELECT certificate_type, status FROM uploads WHERE user_id = ? AND status = 'service rejected'";

$stmt = $conn->prepare($sqlDocs);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Store data in an array
$documents = [];

while ($row = $result->fetch_assoc()) {
    $documents[$row['certificate_type']] = $row['status'];
}


?>


<head>
    <meta charset="UTF-8">
    <title>User Documents</title>
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
        <h2>My Uploaded Documents</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Certificate Type</th>
                    <th>Status</th>
                    <th>Message</th> 
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($documents)) : ?>
                    <?php foreach ($documents as $certificate_type => $status) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($certificate_type); ?></td>
                            <td><?php echo htmlspecialchars($status); ?></td>
                            <td>
                                <?php 
                                if (strtolower($status) == "service rejected") {
                                    echo "Your service request is rejected at office level and your payment will be refunded.";
                                } else {
                                    echo "-";
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3" class="text-center">No service rejected records found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- icon link -->
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
