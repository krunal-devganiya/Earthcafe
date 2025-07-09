<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Cyber Cafe - Login</title>
  <!-- Bootstrap Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../earthcafe/css/login.css">
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

    // Check if admin login
    if ($email === "admin@gmail.com" && $password === "admin@1234") {
      $_SESSION['user_id'] = "admin";
      $_SESSION['username'] = "Administrator";
      header("Location: ../earthcafe/admin/dashboard.php");
      exit();
    }

    // Check in the users database
    $sql = "SELECT id, username, password FROM users WHERE email='$email'";
    $result = $conn->query($sql);


    // Check in the employees table
    $employee_query = "SELECT id AS id, name AS name, password, email FROM employees WHERE email='$email'";
    $employee_result = $conn->query($employee_query);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $user_type = 'user';
    } elseif ($employee_result->num_rows > 0) {
      $row = $employee_result->fetch_assoc();
      $user_type = 'employee';
    } else {
    echo "<script>alert('User Not Found!'); window.location.href='login.php';</script>";

      exit();
    }

    if (password_verify($password, $row['password'])) {
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['logged_in'] = true;
      $_SESSION['user_type'] = $user_type; 
      $_SESSION['email'] = $row['email'];


    
      // Redirect based on user type
      if ($user_type === 'user') {
        header("Location: index.php");
      } elseif ($user_type === 'employee') {
        header("Location: ../earthcafe/employee/dashboard.php");
      }
    
      exit();
    } else {
          echo "<script>alert('wrong Password!'); window.location.href='login.php';</script>";
    }
    
  }
  ?>



  <ion-icon name="close-outline" class="close-btn" onclick="goHome()"></ion-icon>

  <div class="container">
    <div class="cover">
      <div class="front">
        <img src="../earthcafe/img/loginpage image-modified.jpg" alt="Login image">
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

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <!-- External JS -->
  <script src="../earthcafe/js/script.js"></script>

</body>

</html>