<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="../earthcafe/css/login.css">
  <link rel="icon" type="image/jpg" href="../earthcafe/img/ashoksthambh.jpg">

</head>

<body>

  <?php
  include 'DataBaseConnection.php';
  $errors = [];

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($username)) {
      $errors[] = "Username is required!";
    }

    if (empty($email)) {
      $errors[] = "Email is required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Invalid email format!";
    }

    if (empty($password)) {
      $errors[] = "Password is required!";
    } elseif (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
      $errors[] = "Password must be at least 8 characters long, contain at least one uppercase letter, one number, and one special character.";
    }

    if (empty($confirm_password)) {
      $errors[] = "Confirm Password is required!";
    } elseif ($password !== $confirm_password) {
      $errors[] = "Passwords do not match!";
    }

    $check_email = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($check_email);
    if ($result->num_rows > 0) {
      $errors[] = "Email already registered!";
    }

    if (empty($errors)) {
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
      if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Register Successfully'); window.location.href='login.php';</script>";
        exit();
      } else {
        $errors[] = "Error: " . $conn->error;
      }
    }
  }

  // Convert errors array to a JavaScript variable
  if (!empty($errors)) {
    echo "<script>
            let errorMessages = " . json_encode($errors) . ";
            alert(errorMessages.join('\\n'));
          </script>";
  }
  ?>

  <ion-icon name="close-outline" class="close-btn" onclick="goHome()"></ion-icon>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="../earthcafe/img/loginpage image-modified.jpg" alt="sign Up image">
      </div>
      <div class="back">
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
    </div>

    <div class="forms">
      <div class="form-content">
        <?php if (!isset($_SESSION['user_id'])): ?>
        <div class="signup-form">
          <div class="title">Signup</div>
          <form action="signup.php" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Enter your name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Enter your password" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="confirm_password" placeholder="Confirm your password" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Sign up">
              </div>
              <div class="text sign-up-text">Already have an account? 
                <label for="flip">
                  <a href="../earthcafe/login.php" class="Login">Login now</a>
                </label>
              </div>
            </div>
          </form>
        </div>
        <?php else: ?>
          <p style="text-align: center; font-size: 18px; color: green;">
            You are already logged in! <br>
            <a href="index.php">Go to Home</a>
          </p>
        <?php endif; ?>
      </div>
    </div>
  </div>
   <!-- language change -->
   <div class="gtranslate_wrapper"></div>
<script>window.gtranslateSettings = {"default_language":"en","native_language_names":true,"detect_browser_language":true,"languages":["en","gu","hi"],"wrapper_selector":".gtranslate_wrapper"}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>



      <!-- icon link -->

      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
      <!-- External JS -->
      <script src="../earthcafe/js/script.js"></script>
</body>

</html>