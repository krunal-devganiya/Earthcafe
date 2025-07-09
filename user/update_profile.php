<?php
session_start();
include 'DataBaseConnection.php';

// Assuming user is logged in and session has user id
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $state = $_POST['state'];
    $old_photo = $_POST['old_photo'];

    if (!empty($_FILES['photo']['name'])) {
        $photo = $_FILES['photo']['name'];
        $target = "../uploads/" . basename($photo);
        move_uploaded_file($_FILES['photo']['tmp_name'], $target);
    } else {
        $photo = $old_photo; // Use old photo if no new photo is uploaded
    }

    $sql = "UPDATE users SET 
                username='$username',
                phone='$phone', 
                address='$address', 
                birthdate='$birthdate', 
                state='$state', 
                photo='$photo',
                gender='$gender',  
                updated_at=NOW() 
            WHERE id='$user_id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
            alert('Profile Updated Successfully');
            window.location.href = '../user/dashboard.php';
        </script>";
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
}
?>
