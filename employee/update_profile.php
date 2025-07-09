<?php
include 'DataBaseConnection.php';
session_start();

// Check if employee is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true || !isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$employee_id = $_SESSION['user_id'];

if (isset($_POST['update_profile'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $old_photo = mysqli_real_escape_string($conn, $_POST['old_photo']);

    $photo_name = $old_photo; // Default to old photo if no new upload

    // Handle photo upload if a new photo is provided
    if (!empty($_FILES['photo']['name'])) {
        $photo_name = time() . "_" . basename($_FILES['photo']['name']); // Unique filename
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_folder = "../uploads/" . $photo_name;

        // Allowed file types
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");
        $photo_extension = strtolower(pathinfo($photo_name, PATHINFO_EXTENSION));

        if (!in_array($photo_extension, $allowed_extensions)) {
            $_SESSION['error_message'] = "Invalid file type. Only JPG, JPEG, PNG, and GIF allowed.";
            header("Location: dashboard.php");
            exit();
        }

        if (!move_uploaded_file($photo_tmp, $photo_folder)) {
            $_SESSION['error_message'] = "Failed to upload image.";
            header("Location: dashboard.php");
            exit();
        }
    }

    // Update employee profile using prepared statement
    $update_query = "UPDATE employees SET 
                    name = ?, 
                    contact = ?, 
                    address = ?, 
                    birthdate = ?, 
                    state = ?, 
                    gender = ?, 
                    photo = ?
                    WHERE id = ?";

    $stmt = mysqli_prepare($conn, $update_query);
    mysqli_stmt_bind_param($stmt, "sssssssi", $name, $contact, $address, $birthdate, $state, $gender, $photo_name, $employee_id);
    
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['success_message'] = "Profile updated successfully!";
    } else {
        $_SESSION['error_message'] = "Failed to update profile: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    header("Location: dashboard.php");
    exit();
}
?>
