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
    <link rel="stylesheet" href="../earthcafe/css/about.css">
    <title>Earth cafe - About Us</title>
    <link rel="icon" type="image/jpg" href="../earthcafe/img/ashoksthambh.jpg">

</head>

<body>

    <div class="home-img">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <img src="../earthcafe/img/images-removebg-preview.png" alt="Govt. of India" height="50px" width="45px">
                        <a class="navbar-brand ps-2" href="#">Earth cafe</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarScroll">
                            <ul class="navbar-nav my-2 my-lg-0 navbar-nav-scroll ms-auto" style="--bs-scroll-height: 100px;">
                                <li class="nav-item">
                                    <a class="nav-link active" href="index.php">Home</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="#">News</a>
                                </li> -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"aria-expanded="false">Services</a>
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
<script>window.gtranslateSettings = {"default_language":"en","native_language_names":true,"detect_browser_language":true,"languages":["en","gu","hi"],"wrapper_selector":".gtranslate_wrapper"}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>
          

        <div class="home mt-5 pt-5">
            <div class="conatiner mt-3 pt-3">
                <h1 class="text-center">About Us</h1>
                <p class="text-center">Welcome to Cyber Cafe, your one-stop destination for all your online service needs. <br> With years of experience in providing reliable digital solutions, we specialize in offering a range of services <br> such as document creation, scholarship applications, and much more. Our mission is to make these processes <br>easier, faster, and accessible for everyone, ensuring a seamless and efficient experience for our clients.</p>
            </div>
        </div>
    </div>

    <div class="whoweare">
        <div class="whoweare-text">
            <h2>Who We Are</h2>
            <p>At Cyber Cafe, we are dedicated to providing comprehensive online services that cater to your everyday digital needs. <br>
            With years of experience and a commitment to customer satisfaction, we offer reliable solutions for document creation, <br>
            scholarship applications, and more. Our goal is to make online processes simple, secure, and accessible for everyone.</p>
        </div>
        <div class="whoweare-img">
            <img src="../earthcafe/img/who-we-are.jpg" alt="Who We Are">
        </div>
    </div>

    <div class="corequalities">
        <h2>Core Qualities</h2>
        <p class="description">At Cyber Cafe, we are committed to providing exceptional online services with a <br> focus on customer satisfaction, security, and reliability. Our core values guide us in delivering top-notch.<br> services in document creation, scholarship applications, and more.</p>
        <div class="qualities">
            <div class="quality-box">
                <h3>Reliable</h3>
                <p>We pride ourselves on being a trusted partner for all your online service needs. Whether it's creating official documents or helping with scholarship applications, we ensure consistent and reliable results every time.</p>
            </div>
            <div class="quality-box">
                <h3>Professional</h3>
                <p>Our team of professionals is dedicated to providing high-quality services with attention to detail. We adhere to the highest standards to ensure your online tasks are handled with expertise and professionalism.</p>
            </div>
            <div class="quality-box">
                <h3>Appreciated</h3>
                <p>Your satisfaction is our top priority. We listen to your needs and work hard to provide services that are tailored to your specific requirements, ensuring that your experience with us is always seamless and positive.</p>
            </div>
        </div>
    </div>

    <div class="brands-section">
        <div class="brands-text">
            <h2>Brands & companies <br> we worked with.</h2>
            <p>At Cyber Cafe, we have partnered with leading institutions and organizations to provide our <br> clients with exceptional online services. From document creation to scholarship applications,<br> we work with trusted brands to deliver top-tier results tailored to your needs. <br> <br>Institutions like Gujarat Government, Tata, SBI play an important role in public<br> service, banking, and industrial development. They provide opportunities for employment, wealth, and <br> advancement.</p>
        </div>
        <div class="slider">
        <div class="slide-track">
            <div class="slide">
                <img src="../earthcafe/img/GOG.png" alt="">
            </div>
            <div class="slide">
                <img src="../earthcafe/img/NSDL.png" alt="">
            </div>
            <div class="slide">
                <img src="../earthcafe/img/vnsgu.jpg"
                    alt="">
            </div>
            <div class="slide">
                <img src="../earthcafe/img/FSSI.png" alt="">
            </div>
            <div class="slide">
                <img src="../earthcafe/img/DG.png" alt="">
            </div>
            <div class="slide">
                <img src="../earthcafe/img/MYSY.png" alt="">
            </div>
            <div class="slide">
                <img src="../earthcafe/img/TATA.png" alt="">
            </div>
            <div class="slide">
                <img src="../earthcafe/img/SBI.png" alt="">
            </div>
            <div class="slide">
                <img src="../earthcafe/img/GOG.png" alt="">
            </div>
            <div class="slide">
                <img src="../earthcafe/img/NSDL.png" alt="">
            </div>
            <div class="slide">
                <img src="../earthcafe/img/vnsgu.jpg"
                    alt="">
            </div>
            <div class="slide">
                <img src="../earthcafe/img/FSSI.png" alt="">
            </div>
            <div class="slide">
                <img src="../earthcafe/img/DG.png" alt="">
            </div>
            <div class="slide">
                <img src="../earthcafe/img/MYSY.png" alt="">
            </div>
            <div class="slide">
                <img src="../earthcafe/img/TATA.png" alt="">
            </div>
            <div class="slide">
                <img src="../earthcafe/img/SBI.png" alt="">
            </div>
        </div>
    </div>


    </div>

    <div class="news-container">
        <div class="card">
            <img src="../earthcafe/img/employee-1.jpg" alt="Product Design">
            <div class="card-content">
                <h2>Maulik Ghoghari</h2>
                <p>CEO</p>
            </div>
        </div>

        <div class="card">
            <img src="../earthcafe/img/employee-2.jpg" alt="Manufacturing">
            <div class="card-content">
                <h2>Kelvin Kalsariya</h2>
                <p>CEO</p>
            </div>
        </div>

        <div class="card">
            <img src="../earthcafe/img/employee-3.jpg" alt="Quality Assurance">
            <div class="card-content">
                <h2>Krunal Devganiya</h2>
                <p>CEO</p>
            </div>
        </div>
    </div>

    <div class="container4">
        <div class="container-overlay"></div>
        <div class="container-content">
        <h1>Effortless Online Certificate & Document Services</h1>
<p>At our Cyber Café, we make applying for official certificates and documents simple and secure. <br> 
    Whether you need a caste certificate, income certificate, domicile certificate, or other essential documents, <br> 
    our expert team handles the process for you with accuracy and efficiency. <br> 
    Apply online today and let us take care of your documentation needs hassle-free.</p>

            <a href="../earthcafe/contactus.php" class="container-btn btn quality-btn btn-warning">Get in touch</a>
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
    <hr>
    <div class="copy-write">
        <h6>© Construction Equipment. All Rights Reserved 2025</h6>
        <h6>Powered By Precision Engineering</h6>
    </div>


    <!-- back to top button -->
    <button onclick="topfunction()" id="mybtn" title="go to top"><ion-icon name="chevron-up-outline"></ion-icon></button>

    <!--  js link -->
    <script src="../earthcafe/js/script.js"></script>

    <!-- icon link -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- font stye link  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">

</body>

</html>