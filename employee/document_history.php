<?php
include 'DataBaseConnection.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

// Fetch "Success" & "Service Rejected" status requests
$sqlHistory = "SELECT users.id, users.username, users.email, uploads.certificate_type, uploads.status, uploads.request_id
               FROM users 
               JOIN uploads ON users.id = uploads.user_id
               WHERE uploads.status IN ('Success', 'Service Rejected')  -- ✅ Fetch both Success & Service Rejected
               GROUP BY uploads.request_id";

$resultHistory = $conn->query($sqlHistory);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/jpg" href="../img/ashoksthambh.jpg">

</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Document History (Completed & Rejected Requests)</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Certificate Type</th>
                    <th>Status</th>  <!-- ✅ Status column added -->
                    <th>Request ID</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultHistory->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['certificate_type']); ?></td>
                        <td>
                            <?php if ($row['status'] == 'Success') { ?>
                                <span class="badge bg-success">Success</span>
                            <?php } else { ?>
                                <span class="badge bg-danger">Service Rejected</span>
                            <?php } ?>
                        </td>
                        <td><?php echo htmlspecialchars($row['request_id']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
        <a href="servicerequest.php" class="btn btn-primary">Back to Service Requests</a>
    </div>
</body>
</html>
