<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Cyber Cafe - Login</title>
  <!-- Bootstrap Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./css/login.css">
  <!-- FontAwesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/jpg" href="../earthcafe/img/ashoksthambh.jpg">

</head>

<body>
<?php
session_start();
include 'DataBaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Admin Login
    if ($email === "admin@gmail.com" && $password === "admin@1234") {
        $_SESSION['user_id'] = "admin";
        $_SESSION['username'] = "Administrator";
        header("Location: ../earthcafe/admin/dashboard.php");
        exit();
    }

    // Check in the employees database 
    $sql = "SELECT id, name, password FROM employees WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['emp_id'] = $row['id'];
            $_SESSION['empname'] = $row['username'];
            $_SESSION['logged_in'] = true;
            header("Location: ./dashboard.php");
            exit();
        } else {
            echo "<script>alert('Wrong Password');</script>";
        }
    } else {
        echo "<script>alert('Employee not found');</script>";
    }
}
?>




  <div class="container">
    <div class="cover">
      <div class="front">
        <img src="../img/loginpage image-modified.jpg" alt="Login image">
      </div>
      <div class="back">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>

    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Login</div>
          <form method="POST" action="login.php">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Enter your password" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Sign in">
              </div>
              <div class="text sign-up-text">Don't have an account?
                <label for="flip"><a href="../earthcafe/Signup.php" class="Signup">Sign up now</a></label>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- language change -->
  <div class="gtranslate_wrapper"></div>
  <script>window.gtranslateSettings = { "default_language": "en", "native_language_names": true, "detect_browser_language": true, "languages": ["en", "gu", "hi"], "wrapper_selector": ".gtranslate_wrapper" }</script>
  <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>


  <!-- icon link -->

  <ion-icon name="close-outline" class="close-btn" onclick="goHome()"></ion-icon>
  <script>   
  function goHome() {
      window.location.assign("../index.php"); 
  }
  </script>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <!-- External JS -->
  <script src="../earthcafe/js/script.js"></script>

</body>

</html>