<?php
session_start();
include 'DataBaseConnection.php';

if (!isset($_SESSION['certificate_name']) || !isset($_SESSION['certificate_price'])) {
    echo "<script>alert('No certificate selected!'); window.location.href='index.php';</script>";
    exit;
}

$certificateName = $_SESSION['certificate_name'];
$documentFee = $_SESSION['document_fees'];
$consultancyFee = $_SESSION['consultancy_fees'];
$certificatePrice = $_SESSION['certificate_price'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['proceed_payment'])) {
    $user_id = $_SESSION['user_id'] ?? 0;
    $request_id=$_SESSION['req_id'] ?? 0;
    $sql = "INSERT INTO payments (user_id, service_name, service_fees, consultancy_fees, total_fees, created_at, request_id)
            VALUES ('$user_id', '$certificateName', '$documentFee', '$consultancyFee', '$certificatePrice', NOW(), '$request_id' )";


    if (mysqli_query($conn, $sql)) {
        $sql1="UPDATE `uploads` SET `is_upload`='1' WHERE request_id='$request_id'";
        mysqli_query($conn,$sql1);
        $_SESSION['payment_status'] = 'success';
        $_SESSION['payment_id'] = mysqli_insert_id($conn);
        
        // Payment ke baad upload page pe redirect
        // header("Location: uploadDocument.php");
        echo "<script>alert('Documents Request sent successfully!'); window.location.href='index.php';</script>";

        exit;
    } else {
        echo "<script>alert('Payment processing failed!');</script>";
    }
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        .order-info {
            background: #f0f0f0;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .amount {
            font-size: 18px;
            font-weight: bold;
        }

        .next-button {
            width: 100%;
            padding: 10px;
            text-decoration: none;
            background: blue;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
    <link rel="icon" type="image/jpg" href="../earthcafe/img/ashoksthambh.jpg">
</head>

<body>
    <div class="container">
        <header>
            <h2>Demo Store</h2>
            <div class="order-info">
                <p>Services: <strong><?php echo ucfirst($certificateName); ?></strong></p>
                <p>---------------------------------------------------------</p>
                <p><strong><?php echo ucfirst($certificateName); ?></strong> Fees:
                    ₹<?php echo number_format($documentFee, 2); ?></p>
                <p>Consultancy Fees: ₹<?php echo number_format($consultancyFee, 2); ?></p>
                <p>--------------------------------------</p>

                <p class="amount">Total Fees: ₹<?php echo number_format($certificatePrice, 2); ?></p>

            </div>
            <form method="POST">
                <button type="submit" name="proceed_payment" class="next-button">Proceed to Payment</button>
            </form>
        </header>
    </div>
</body>

</html>
