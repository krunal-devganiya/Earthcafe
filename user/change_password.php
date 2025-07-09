<?php
session_start();
include 'DataBaseConnection.php';

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $result = mysqli_query($conn, "SELECT password FROM users WHERE id='$user_id'");
    $user = mysqli_fetch_assoc($result);

    if (password_verify($current_password, $user['password'])) {
        if ($new_password === $confirm_password) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password='$hashed_password' WHERE id='$user_id'";
            mysqli_query($conn, $sql);
            echo "Password updated successfully";
        } else {
            echo "New password and confirm password do not match";
        }
    } else {
        echo "Current password is incorrect";
    }
}
?>
