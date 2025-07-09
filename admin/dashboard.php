<?php
include 'DataBaseConnection.php';

// Total Users Count Fetch
$sql_count_users = "SELECT COUNT(id) AS total_users FROM users";
$result_count_users = $conn->query($sql_count_users);
$total_users = ($result_count_users && $row = $result_count_users->fetch_assoc()) ? $row['total_users'] : 0;

// Total Employees Count Fetch
$sql_count_employees = "SELECT COUNT(id) AS total_employees FROM employees";
$result_count_employees = $conn->query($sql_count_employees);
$total_employees = ($result_count_employees && $row = $result_count_employees->fetch_assoc()) ? $row['total_employees'] : 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../admin/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/jpg" href="../earthcafe/img/ashoksthambh.jpg">

</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2 class="logo">Dashboard</h2>
                <button class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="sidebar-content">
                <div class="nav-section">
                    <h3 class="nav-title">MAIN NAVIGATION</h3>
                    <nav class="nav-menu">
                        <a href="#" class="nav-item active">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="manageemployee.php" class="nav-item">
                            <i class="fas fa-user-md"></i>
                            <span>Manage Employee</span>
                        </a>
                        <a href="../admin/manageuser.php" class="nav-item">
                            <i class="fas fa-users"></i>
                            <span>Users</span>
                        </a>
                        <a href="../admin/document_history.php" class="nav-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Document History</span>
                        </a>
                        <a href="managecontactus.php" class="nav-item">
                            <i class="fas fa-comment"></i>
                            <span>Contact Us Queries</span>
                        </a>
                        <a href="payment_history.php" class="nav-item">
                            <i class="fas fa-clone"></i>
                            <span>Payments</span>
                        </a>
                        <!-- <a href="#" class="nav-item dropdown-toggle">
                            <i class="fa fa-clone" aria-hidden="true"></i>
                            <span>Pages</span>
                            <i class="fas fa-chevron-right chevron"></i>
                        </a>

                        <-- Dropdown Menu 
                        <ul class="dropdown-menu">
                            <li><a href="contactus.php">Contact Us</a></li>
                            <li><a href="aboutus.php">About Us</a></li>
                        </ul> -->

                    </nav>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="header">
                <div class="header-title">
                    <h1>Earth Cafe</h1>
                </div>
                <div class="user-profile">
                    <h3 class="username">
                        <img src="../img/user (1).png" alt="Admin" height="30px">
                        Admin
                    </h3>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="dashboard">
                <div class="dashboard-header">
                    <h2 class="page-title">ADMIN | DASHBOARD</h2>
                </div>
                <div class="breadcrumb">
                    <span>Admin</span>
                    <span class="separator">/</span>
                    <span>Dashboard</span>
                </div>

                <!-- Dashboard Cards -->
                <div class="dashboard-cards">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-icon">
                                <i class="fas fa-smile"></i>
                            </div>
                            <h3 class="card-title">Manage Users</h3>
                            <a href="manageuser.php" class="card-stats">Total Users: <?php echo $total_users; ?></a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-content">
                            <div class="card-icon">
                                <i class="fas fa-user-md"></i>
                            </div>
                            <h3 class="card-title">Manage Employee</h3>
                            <a href="manageemployee.php" class="card-stats">Total Employees:
                                <?php echo $total_employees; ?></a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-content">
                            <div class="card-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <h3 class="card-title">Document History</h3>
                            <a href="../admin/document_history.php" class="card-stats">Document history</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-content">
                            <div class="card-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <h3 class="card-title">New Queries</h3>
                            <a href="managecontactus.php" class="card-stats">Total New Queries: 0</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <h3 class="card-title">Payments</h3>
                            <a href="payment_history.php" class="card-stats">payments</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div class="logout">
        <a href="../logout.php" class="logout-btn">Logout</a>
    </div>

    <script src="../admin/js/script.js"></script>
</body>

</html>