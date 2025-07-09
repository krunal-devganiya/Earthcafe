<?php
session_start();
include 'DataBaseConnection.php';

// Check Database Connection
if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

// Fetch users (Fixed SQL Syntax)
$sql_users = "SELECT id, username, email FROM users";  
$result_users = $conn->query($sql_users);

// Query execution check
if (!$result_users) {
    die("Query Failed: " . $conn->error);
}

// Handle document upload
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['send_document'])) {
    $user_id = $_POST['user_id'];
    $file_name = $_FILES['document']['name'];
    $file_tmp = $_FILES['document']['tmp_name'];
    $upload_dir = "../uploads/";

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $file_path = $upload_dir . basename($file_name);
    if (move_uploaded_file($file_tmp, $file_path)) {
        $sql_insert = "INSERT INTO documents (user_id, file_name, file_path) VALUES ('$user_id', '$file_name', '$file_path')";
        if ($conn->query($sql_insert)) {
            echo "<script>alert('Document Sent Successfully!');</script>";
        } else {
            echo "<script>alert('Error in sending document!');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/jpg" href="../img/ashoksthambh.jpg">


    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
        }
        th {
            background: #007bff;
            color: white;
            text-align: center;
            padding: 10px;
        }
        td {
            text-align: center;
            vertical-align: middle;
            padding: 10px;
        }
        .btn-send {
            background: #28a745;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: 0.3s;
        }
        .btn-send:hover {
            background: #218838;
        }
        input[type="file"] {
            width: 100%;
        }
    </style>
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

<div class="container">
    <h2><i class="fas fa-file-upload"></i> Send Document</h2>
    <div class="table-responsive">
    <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>Email ID</th>
            <th>Certificate Type</th>
            <th>Upload Document</th>
            <th>Send</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        while ($row = $result_users->fetch_assoc()) { 
            $user_id = $row['id'];
            
            // Fetch only users who have at least one certificate (grouped by request_id)
            $cert_query = "SELECT request_id, certificate_type FROM uploads WHERE user_id = '$user_id' GROUP BY request_id";
            $cert_result = $conn->query($cert_query);
            
            // Show users only if they have at least one certificate
            if ($cert_result->num_rows > 0) {
                while ($cert_row = $cert_result->fetch_assoc()) { ?>
                    <tr>
                        <form action="" method="post" enctype="multipart/form-data">
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $cert_row['certificate_type']; ?></td>
                            <td>
                                <input type="file" class="form-control" name="document" required>
                                <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                            </td>
                            <td>
                                <button type="submit" name="send_document" class="btn btn-send">
                                    <i class="fas fa-paper-plane"></i> Send
                                </button>
                            </td>
                        </form>
                    </tr>
                <?php }
            }
        } ?>
    </tbody>
</table>

<!-- icon link -->

<ion-icon name="close-outline" class="close-btn" onclick="goHome()"></ion-icon>
  <script>   
  function goHome() {
      window.location.assign("dashboard.php"); 
  }
  </script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    </div>
</div>

</body>
</html>
