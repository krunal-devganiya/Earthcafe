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
    <link rel="stylesheet" href="../earthcafe/css/certificate.css">
    <title>Earth cafe - scolarships</title>
    <link rel="icon" type="image/jpg" href="../earthcafe/img/ashoksthambh.jpg">

</head>

<body>

    <div class="about-img">
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
        <div class="about mt-5 pt-5">
            <div class="about-text mt-3 pt-3">
                <h1 class="text-center">Scholarships</h1>
                <p class="text-center">Our Cyber Café helps students apply for various scholarship programs with ease. <br> 
        Whether you need assistance in filling out applications, submitting documents, or tracking your scholarship status, <br> 
        we ensure a smooth and hassle-free process. <br> 
        Get access to government and private scholarships and secure financial aid for your education effortlessly.</p>
            </div>
        </div>
    </div>

    <div class="news">
        <div class="news-text pb-5">
            <h1>Helping Students Access Scholarships Easily</h1>
            <p>Our Cyber Café makes it easy for students to apply for government and private scholarships. <br> 
   We assist with filling out applications, submitting documents, and tracking the status to ensure a smooth process. <br> 
   Whether it's CMSS, MYSY, or Digital Gujarat scholarships, we help you secure the financial aid you need for your education.</p>

        </div>
        <div class="news-container pb-4 mb-3">
            <div class="card">
                <img src="../earthcafe/img/cmss card2.jpg" alt="Product Design">
                <div class="card-content">
                    <h2>CMSS scolerships</h2>
                </div>
                <div class="apply">
                    <a href="uploadDocument.php?certificate=CMSS-scolership" class="read-more">Apply</a>
                </div>
            </div>

            <div class="card">
                <img src="../earthcafe/img/MYSY card.jpg" alt="Manufacturing">
                <div class="card-content">
                    <h2>MYSY Scolerships</h2>
                </div>
                <div class="apply">
                    <a href="uploadDocument.php?certificate=MYSY-scolership" class="read-more">Apply</a>
                </div>
            </div>

            <div class="card">
                <img src="../earthcafe/img/Digital-Gujarat-Initiatives.jpg" alt="Quality Assurance">
                <div class="card-content">
                    <h2>Digital Gujarat Scolerships</h2>
                </div>
                <div class="apply">
                    <a href="uploadDocument.php?certificate=Digital-gujarat-scolership" class="read-more">Apply</a>
                </div>
            </div>
        </div> 


    <div class="news-container mb-3 pb-3">
        <div class="card">
            <img src="../earthcafe/img/HDFC card.jpg" alt="Product Design">
            <div class="card-content">
                <h2>HDFC Scolerships</h2>
                <h2>comming soon...</h2>
            </div>
            <div class="apply">
                <a href="#" class="read-more">Apply</a>
            </div>
        </div>

        <div class="card">
            <img src="../earthcafe/img/SBI card.jpg" alt="Manufacturing">
            <div class="card-content">
                <h2>SBI Scolerships</h2>
                <h2>comming soon...</h2>
            </div>
            <div class="apply">
                <a href="#" class="read-more">Apply</a>
            </div>
        </div>

        <div class="card">
            <img src="../earthcafe/img/TATA card.jpg" alt="Quality Assurance">
            <div class="card-content">
                <h2>TATA Scolerships</h2>
                <h2>comming soon...</h2>
            </div>
            <div class="apply">
                <a href="#" class="read-more">Apply</a>
            </div>
        </div>
    </div>
 
</div>


 <!-- language change -->
 <div class="gtranslate_wrapper"></div>
<script>window.gtranslateSettings = {"default_language":"en","native_language_names":true,"detect_browser_language":true,"languages":["en","gu","hi"],"wrapper_selector":".gtranslate_wrapper"}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>


    <div class="container4">
        <div class="container-overlay"></div>
        <div class="container-content">
        <h1>Effortless Online Certificate & Document Services</h1>
<p>At our Cyber Café, we make applying for official certificates and documents simple and secure. <br> 
    Whether you need a caste certificate, income certificate, domicile certificate, or other essential documents, <br> 
    our expert team handles the process for you with accuracy and efficiency. <br> 
    Apply online today and let us take care of your documentation needs hassle-free.</p>

            <a href="#" class="container-btn btn quality-btn btn-warning">Get in touch</a>
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