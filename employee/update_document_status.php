<?php
include 'DataBaseConnection.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $user_id = intval($_POST['user_id']);
    $request_id = $_POST['request_id'];
    $certificate_type = $_POST['certificate_type'];
    $document_name = $_POST['document_name'];
    $action = $_POST['action'];

    if ($action == "Approved") {
        $updateQuery = "UPDATE uploads SET status='Active' WHERE user_id=? AND request_id=? AND certificate_type=? AND document_name=?";
    } elseif ($action == "Rejected") {
        // Reject document and mark for reupload
        $updateQuery = "UPDATE uploads SET status='Wrong Document', reupload_request=1 WHERE user_id=? AND request_id=? AND certificate_type=? AND document_name=?";
    }

    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("isss", $user_id, $request_id, $certificate_type, $document_name);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Document status updated successfully!";
    } else {
        $_SESSION['error'] = "Error updating document status.";
    }

    header("Location: servicerequest.php?user_id=$user_id&certificate_type=$certificate_type&request_id=$request_id");
    exit();
}
?>
