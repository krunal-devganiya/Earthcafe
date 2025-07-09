<?php
include 'DataBaseConnection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["new_document"])) {
    $upload_id = $_POST['upload_id'];

    // File upload handling
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); // Create directory if not exists
    }

    $file_name = basename($_FILES["new_document"]["name"]); // Keep original file name
    $target_file = $target_dir . $file_name;

    if (move_uploaded_file($_FILES["new_document"]["tmp_name"], $target_file)) {
        echo "File uploaded successfully: " . $target_file . "<br>"; // Debugging output

        // Update database with new document details
        $sqlUpdate = "UPDATE uploads SET document_name = ?, document_path = ?, status = 'Pending', reupload_request = 0 WHERE id = ?";
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->bind_param("ssi", $file_name, $target_file, $upload_id);

        if ($stmt->execute()) {
            echo "Database updated successfully!<br>";
            $_SESSION['success_message'] = "Document re-uploaded successfully!";
        } else {
            echo "SQL Error: " . $stmt->error . "<br>";
            $_SESSION['error_message'] = "Failed to update document!";
        }
    } else {
        echo "Error uploading file!<br>";
        print_r($_FILES["new_document"]);
        $_SESSION['error_message'] = "Error uploading file!";
    }
}

header("Location: Dashboard.php");
exit();
?>
