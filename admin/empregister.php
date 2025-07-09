<?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection
$servername = "localhost";
$username = "root";  // Your database username (default for XAMPP is "root")
$password = "";  // Your database password (default for XAMPP is empty)
$dbname = "earthcafe";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);  // If connection fails, show the error
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];  // Employee name
    $contact = $_POST['contact'];  // Employee contact number
    $email = $_POST['email'];  // Employee email
    $password = $_POST['password'];  // Password
    $confirm_password = $_POST['confirm-password'];  // Confirm password

    // Check if the passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.');</script>";  // If passwords don't match, show an error message
        exit();  // Stop execution if passwords don't match
    }

    // Hash the password to store securely in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the data into the database using a simple SQL query
    $sql = "INSERT INTO employees (name, contact, email, password) VALUES ('$name', '$contact', '$email', '$hashed_password')";

    // Run the query and check if the data is inserted successfully
    if ($conn->query($sql) === TRUE) {
        // Success: Show alert and redirect to admin dashboard
        echo "<script type='text/javascript'>
                alert('Registration Successful!');
                window.location.href = 'manageemployee.php';  // Redirect to admin dashboard
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;  // If there's an error, show the error message
    }

    // Close the database connection
    $conn->close();
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration Form</title>
    <link rel="stylesheet" href="./css/empregister.css">  <!-- Your CSS file for styling -->
    <link rel="icon" type="image/jpg" href="../earthcafe/img/ashoksthambh.jpg">

</head>

<body>
    <div class="container">
        <h2>Employee Registration</h2>
        <form method="POST" action=""> 
            <div class="form-group">
                <label for="name">Employee Name</label>
                <input type="text" id="name" name="name" placeholder="Enter Employee Name" required>
            </div>
            <div class="form-group">
                <label for="contact">Employee Contact No</label>
                <input type="text" id="contact" name="contact" placeholder="Enter Employee Contact No" required>
            </div>
            <div class="form-group">
                <label for="email">Employee Email</label>
                <input type="email" id="email" name="email" placeholder="Enter Employee Email ID" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="New Password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>
