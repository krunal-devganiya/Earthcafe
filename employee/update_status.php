<?php
include 'DataBaseConnection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $request_id = $_POST['request_id'];
    $status = $_POST['status'];

    // Debugging Log
    error_log("Updating Request ID: $request_id with Status: $status");

    // Get record details before updating
    $query = "SELECT * FROM uploads WHERE request_id = '$request_id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    if ($row) {
        $user_id = $row['user_id'];
        $certificate_type = $row['certificate_type'];
        $document_name = $row['document_name'];
        $document_path = $row['document_path'];
        $upload_time = $row['upload_time'];

        // Update status in uploads table
        $updateQuery = "UPDATE uploads SET status = '$status' WHERE request_id = '$request_id'";
        if ($conn->query($updateQuery) === TRUE) {
            error_log("Status updated successfully in uploads!");
        } else {
            error_log("Error updating status: " . $conn->error);
        }
    } else {
        error_log("No record found for Request ID: $request_id");
    }
}

header("Location: servicerequest.php");
exit();

?>
