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
    <link rel="stylesheet" href="../earthcafe/css/index.css">
    <title>Earth cafe - Home</title>
    <link rel="icon" type="image/jpg" href="../earthcafe/img/ashoksthambh.jpg">
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
                                <a class="nav-link" href="https://www.gujaratsamachar.com/city/all/1">News</a>
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
        <div class="home pt-5 mt-5">
            <div class="container pt-5">
                <h1 class="text-center pt-5 mt-5">We are <br> Government and private <br> Service Provider</h1>
                <p class="text-center pt-4">We provide reliable services for government and private sectors, ensuring
                    efficiency, <br> innovation, and compliance to support organizational growth and operational
                    success.</p>
            </div>
        </div>
    </div>

    <!-- language change -->
    <div class="gtranslate_wrapper"></div>
<script>window.gtranslateSettings = {"default_language":"en","native_language_names":true,"detect_browser_language":true,"languages":["en","gu","hi"],"wrapper_selector":".gtranslate_wrapper"}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>
 
    <div class="Our-impact">
        <div class="container">
            <div class="row pt-3">
                <div class="col-md-3">
                    <h1>Our <BR> impact</h1>
                </div>
                <div class="impact-box col-md-3">
                    <h3 class="counter" data-target="100">0%</h3>
                    <p class="impact-text">Customer Satisfaction</p>
                </div>
                <div class="impact-box col-md-3">
                    <h3 class="counter" data-target="120">0+</h3>
                    <p class="impact-text">Customers Worldwide</p>
                </div>
                <div class="impact-box col-md-3">
                    <h3 class="counter" data-target="650">0+</h3>
                    <p class="impact-text">Skilled Employees</p>
                </div>
            </div>
        </div>
    </div>


    <div class="news">
        <div class="news-text pb-5">
            <h1>How we create an impact on the world</h1>
            <p>Our cyber cafe is your best companion for your online journey! It has all the facilities for fast internet, comfortable seating and secure browsing. Every facility is available here. Come and enjoy the digital world without any hindrance!</p>
        </div>
        <div class="news-container">
            <div class="card">
                <img src="../earthcafe/img/news (1).jpg" alt="Product Design">
                <div class="card-content">
                    <h2>Certificates</h2>
                    <p>Gujarat Government provides various certificates in online and offline facilities. You can get the certificate online through Prithvi Cafe portal. Get the certificate easily and quickly!</p>
                    <a href="certificate.php" class="read-more">Show</a>
                </div>
            </div>

            <div class="card">
                <img src="../earthcafe/img/news (2).jpg" alt="Manufacturing">
                <div class="card-content">
                    <h2>Scolerships</h2>
                    <p>Scholarships are an important means of fulfilling the dreams of students. They provide financial assistance, which enables students to complete their studies without any hindrance.</p>
                    <a href="scolership.php" class="read-more">Show</a>
                </div>
            </div>

            <div class="card">
                <img src="../earthcafe/img/news (3).jpg" alt="Quality Assurance">
                <div class="card-content">
                    <h2>Other Documents</h2>
                    <p>The Gujarat government provides various facilities to its citizens including ration cards, PAN cards, admission forms, passports, driving licenses and other services.</p>
                    <a href="otherdoc.php" class="read-more">Show</a>
                </div>
            </div>
        </div>
    </div>


    <div class="conatiner-service">
        <div class="service">
            <div class="left-section">
                <h4 class="subheading">WHY US</h4>
                <h1>We are the future of Online Service Provider</h1>
                <p>
                The Earth Cafe website is an integrated online portal that provides various government services and schemes to citizens sitting at home. Through it, a person can apply and get ration card, income certificate, scholarship and other facilities online. This saves time and makes it easier for nature.
                </p>
                <img src="../earthcafe/img/service (2).jpg" alt="Manufacturing Process">
            </div>

            <div class="right-section">
                <img src="../earthcafe/img/service (1).jpg" alt="Industrial Process">
                <div class="experience-block">
                    <h2><span>25+</span> Years of Service Provider Experience</h2>
                    <p>
                        With over 25 years of Government service providers provide essential public services such as certificates, licenses, and welfare schemes, ensuring smooth governance, transparency, and easy accessibility for citizens.
                    </p>
                </div>
            </div>
        </div>
    </div>


    <section class="partners-section">
        <div class="partners-content">
            <h4 class="subheading">OUR PARTNERS</h4>
            <h1>Government of Gujarat & companies we worked with.</h1>
        </div>
        <p class="partners-description">
        Institutions like Gujarat Government, Tata, SBI play an important role in public service, banking, and industrial development. They provide opportunities for employment, wealth, and advancement.
        </p>
    </section>

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



    <div class="quality">
        <img src="../earthcafe/img/pexels-rdne-7947846.jpg" alt="">
        <div class="content">
            <h1>Quality of service that no one can match</h1>
            <p>Earth cafe is an online portal that provides citizens with the benefit of various government services. Through it, income certificates, ration cards, scholarships, caste certificates and other facilities are available online. This process is made easy, paperless and time-saving.</p>
            <a href="otherdoc.php" class="btn quality-btn btn-warning">Get in touch</a>
        </div>
    </div>


    <div class="review pt-5 pb-5">
        <h1>What our clients say</h1>
        <p class="review-text">Testimonials from satisfied customers who prefer ourservices at earth cafe online portal.</p>
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


    <!-- back to top button -->

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