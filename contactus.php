<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrep link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- css link -->
    <link rel="stylesheet" href="../earthcafe/css/contact.css">
    <title>Earth cafe - Contact Us</title>
    <link rel="icon" type="image/jpg" href="../earthcafe/img/ashoksthambh.jpg">

    <script>
        function toggleAnswer(element) {
            const answer = element.nextElementSibling;
            const toggleSign = element.querySelector('.toggle');

            if (answer.style.display === "block") {
                answer.style.display = "none";
                toggleSign.innerHTML = "+";
            } else {
                answer.style.display = "block";
                toggleSign.innerHTML = "−";
            }
        }
    </script>
</head>

<body>
    <div class="home-img">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <img src="../earthcafe/img/images-removebg-preview.png" alt="Govt. of India" height="50px"
                        width="45px">
                    <a class="navbar-brand ps-2" href="#">Earth cafe</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarScroll">
                        <ul class="navbar-nav my-2 my-lg-0 navbar-nav-scroll ms-auto"
                            style="--bs-scroll-height: 100px;">
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php">Home</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#">News</a>
                            </li> -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Services
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="certificate.php">Certificates</a></li>
                                    <li><a class="dropdown-item" href="scolership.php">Scholarships</a></li>
                                    <li><a class="dropdown-item" href="otherdoc.php">Other Documents</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="About.php">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contactus.php">Contact US</a>
                            </li>
                            <li class="nav-item">
                                <?php if (!isset($_SESSION['user_id'])): ?>
                                    <a class="signup-btn btn btn-warning" href="login.php">Sign Up</a>
                                <?php else: ?>
                                    <span class="nav-link text-warning">

                                    <a href="./user/Dashboard.php" class="username">
                                            <img src="../earthcafe\img\user (1).png" alt="user" height="30px">
                                            <?php echo htmlspecialchars($_SESSION['username']); ?></a></span>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <!-- language change -->
        <div class="gtranslate_wrapper"></div>
        <script>window.gtranslateSettings = { "default_language": "en", "native_language_names": true, "detect_browser_language": true, "languages": ["en", "gu", "hi"], "wrapper_selector": ".gtranslate_wrapper" }</script>
        <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>


        <div class="home pt-5 mt-5">
            <div class="container pt-3 mt-3">
                <h1 class="text-center ">Contact Us</h1>
                <p class="text-center ">At Cyber Cafe, we are always ready to assist you with your online service needs. Whether it’s <br>
        document creation, scholarship applications, or any other service we offer, our team is here to provide fast and reliable <br>
        solutions. We prioritize customer satisfaction and aim to make your experience as smooth as possible. <br>
        If you have any questions or need assistance, don’t hesitate to reach out. Our friendly and professional staff is <br>
        available to guide you through every step of the process. Get in touch with us today, and we’ll be happy to help you!</p>
            </div>
        </div>
    </div>

    <div class="data-container">
        <div class="contact-details">
            <h2>Let's get connected</h2>
            <p style="padding-right: 20px;">We’re here to help you with all your online service needs. Reach out to us through the following contact details:</p>
            <p><strong>Address:</strong> Earth Cafe, Surat, Gujarat</p>
            <p><strong>Phone:</strong> +91 635 126 0524 (MG)</p>
            <p><strong>Phone:</strong> +91 704 1441 456 (KK)</p>
            <p><strong>Phone:</strong> +91 963 8152 670 (KD)</p>
            <p><strong>Email:</strong> earthcafe@gmail.com</p>
        </div>

        <?php
        include 'DataBaseConnection.php';
        // Default empty values
        $username = "";
        $email = "";

        // Check if user is logged in
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];

                // Fetch user data from database
                $select = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id'") or die('Query Failed');

                if (mysqli_num_rows($select) > 0) {
                    $fetch = mysqli_fetch_assoc($select);
                    $username = $fetch['username'];
                    $email = $fetch['email'];
                }
            }
        }
        ?>

        <div class="contact-form">

            <form method="POST" action="contactus.php">
                <label for="name">Name *</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                    echo $fetch['username'];
                } ?>" required readonly>

                <label for="email">Email *</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                    echo $fetch['email'];
                } ?>" required readonly>


                <label for="message">Message</label>
                <textarea id="message" name="message" rows="4"></textarea>

                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true): ?>
        <button type="submit" class="btn-send-Message">Send Message</button>
    <?php else: ?>
        <button type="button" class="btn-send-Message" disabled>Login to Send Message</button>
    <?php endif; ?>
            </form>

        </div>
    </div>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        // Ensure message is not empty
        if (!empty($message)) {
            $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Message sent successfully!'); window.location.href='contactus.php';</script>";
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('Message field cannot be empty!'); window.history.back();</script>";
        }
    }

    mysqli_close($conn);
    ?>




    <div class="map-container">
        <iframe width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12035.414996496876!2d72.78461695956801!3d21.249097678461553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04bf3cafd28cd%3A0xa4e0ddcf95fb09e9!2sVivekanand%20College!5e1!3m2!1sen!2sin!4v1740810918676!5m2!1sen!2sin">
        </iframe>
    </div>





    <div class="faq-container">
        <div class="faq-left">
            <h4 style="color: #FFA500;">QUESTIONS</h4><hr>
            <h2 style="font-size: 24px;">Frequently Asked Questions</h2><hr>
            <p style="font-size: 20px;">Have any questions? We're here to help! Below are some of the most common inquiries we receive. If you need further assistance, don't hesitate to contact us.</p>
        </div>

        <div class="faq-right">
            <div class="faq-item">
                <div style="font-size: 22px;" class="faq-question" onclick="toggleAnswer(this)">
                What services do you provide at Cyber Cafe?
                    <span class="toggle">+</span>
                </div>
                <div style="font-size: 20px;" class="faq-answer">
                At Cyber Cafe, we offer a variety of online services, including document creation, scholarship applications, and more. Our goal is to make online processes simple, secure, and accessible for everyone.
                </div>
            </div>
            <div class="faq-item">
                <div style="font-size: 22px;" class="faq-question" onclick="toggleAnswer(this)">
                How do I apply for a scholarship through your services?
                    <span class="toggle">+</span>
                </div>
                <div style="font-size: 20px;" class="faq-answer">
                To apply for a scholarship, simply visit our "Scholarships Applications" page, fill in the required details, and submit the necessary documents. Our team will guide you through the entire process.
                </div>
            </div>
            <div class="faq-item">
                <div style="font-size: 22px;" class="faq-question" onclick="toggleAnswer(this)">
                How can I create an official document at Cyber Cafe?
                    <span class="toggle">+</span>
                </div>
                <div style="font-size: 20px;" class="faq-answer">
                Creating an official document is easy with us! Just visit our "Document Creation" page, choose the type of document you need, and follow the step-by-step process to complete your request.
                </div>
            </div>
            <div class="faq-item">
                <div style="font-size: 22px;" class="faq-question" onclick="toggleAnswer(this)">
                What if I face any issues with my applications or documents?
                    <span class="toggle">+</span>
                </div>
                <div style="font-size: 20px;" class="faq-answer">
                If you face any issues, please don’t hesitate to reach out to our support team. You can contact us via email or phone, and we will assist you promptly to resolve any concerns.
                </div>
            </div>
        </div>
    </div>

    <div class="review pt-5 pb-5">
        <h1>What our clients say</h1>
        <p class="review-text">Testimonials from satisfied clients who love our products and <br> services at
            Manufacturing Company.</p>
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-5 review-text pt-5">
                    <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                        id est laborum.
                    </p>
                    <h3>
                        Sean Edwards</h3>
                    <h5> Acme Industries</h5>
                </div>
                <div class="col-md-5 review-text pt-5">
                    <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                        id est laborum.</p>
                    <h3>Matthew Hills</h3>
                    <h5>Kyrion Metallics</h5>
                </div>
            </div>

        </div>
    </div>

    <footer class="footer">
        <div class="logo">
            <img src="../earthcafe/img/footer-logo.png" alt="Govt. of India" height="50px" width="45px">
            <a class="footer-brand" href="#">Earth cafe</a>

        </div>
        <div class="link">
            <nav>
                <a href="index.php" class="footer-link">Home</a>
                <a href="#" class="footer-link">News</a>
                <a href="certificate.php" class="footer-link">Services</a>
                <a href="About.php" class="footer-link">About Us</a>
                <a href="contactus.php" class="footer-link">Contact Us</a>
            </nav>
        </div>
        <div class="social">
            <ion-icon name="logo-youtube" class="logo-youtube"></ion-icon>
            <ion-icon name="logo-linkedin" class="logo-linkedin"></ion-icon>
            <ion-icon name="logo-facebook" class="logo-facebook"></ion-icon>
            <ion-icon name="logo-instagram" class="logo-instagram"></ion-icon>
        </div>


    </footer>
    <div class="copy-write">
        <h6>© Construction Equipment. All Rights Reserved 2025</h6>
        <h6>Powered By Precision Engineering</h6>
    </div>

    <button onclick="topfunction()" id="mybtn" title="go to top"><ion-icon
            name="chevron-up-outline"></ion-icon></button>

    <!--  js link -->
    <script src="../earthcafe/js/script.js"></script>

    <!-- icon link -->

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- font stye link  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
</body>

</html>