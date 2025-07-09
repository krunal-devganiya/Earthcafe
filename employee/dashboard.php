<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee - Dashboard</title>
    <link rel="stylesheet" href="../employee/css/dashboard.css">
    <link rel="stylesheet" href="../employee/css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="icon" type="image/jpg" href="../img/ashoksthambh.jpg">


</head>

<body>
    <?php
    session_start();
    include 'DataBaseConnection.php';
    $sql_count_users = "SELECT COUNT(id) AS total_users FROM users";
    $result_count_users = $conn->query($sql_count_users);
    $total_users = ($result_count_users && $row = $result_count_users->fetch_assoc()) ? $row['total_users'] : 0;
    $sql_count_request = "SELECT COUNT(DISTINCT uploads.user_id) AS total_request FROM users JOIN uploads ON users.id = uploads.user_id";
    ;
    $result_count_request = $conn->query($sql_count_request);
    $total_request = ($result_count_request && $row = $result_count_request->fetch_assoc()) ? $row['total_request'] : 0;

    ?>
    <div class="container1">
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
                        <a href="dashboard.php" class="nav-item active">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="#" onclick="showPage('profile')" class="nav-item active">
                            <i class="fas fa-home"></i>
                            <span class="nav-link">Profile</span>
                        </a>
                        <a href="manageuser.php" class="nav-item">
                            <i class="fas fa-user-md"></i>
                            <span>Manage User

                            </span>
                        </a>
                        <a href="./servicerequest.php" class="nav-item">
                            <i class="fas fa-users"></i>
                            <span>Service Requset</span>
                        </a>
                        <a href="./senddocument.php" class="nav-item">
                            <i class="fas fa-users"></i>
                            <span>Send Document</span>
                        </a>
                        <a href="./document_history.php" class="nav-item">
                            <i class="fas fa-users"></i>
                            <span>Document History</span>
                        </a>

                    </nav>
                </div>
            </div>
        </aside>

        <!-- Main Content -->

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
                $select = mysqli_query($conn, "SELECT * FROM employees WHERE id = '$user_id'") or die('Query Failed');

                if (mysqli_num_rows($select) > 0) {
                    $fetch = mysqli_fetch_assoc($select);
                    $username = $fetch['name'];
                }
            }
        }
        ?>

        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="header-title">
                    <h1>Earth Cafe</h1>
                </div>
                <div class="user-profile">
                    <div class="user-info">
                        <li class="nav-item">
                            <?php if (!isset($_SESSION['user_id'])): ?>
                                <a class="signup-btn btn btn-warning" href="login.php">Sign Up</a>
                            <?php else: ?>
                                <span class="nav-link text-warning">
                                    <p class="username pt-3">
                                        <img src="../img/user (1).png" alt="user" height="30px">
                                        <?php echo $username?>
                                    </p>
                                </span>
                            <?php endif; ?>
                        </li>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="dashboard" id="content">
                <div class="dashbord-content" id="home">
                    <h2 class="page-title">EMPLOYEE | DASHBOARD</h2>
                <div class="breadcrumb">
                    <span>Employee</span>
                    <span class="separator">/</span>
                    <span>Dashboard</span>
                </div>

                <!-- Dashboard Cards -->
                <div class="dashboard-cards">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-icon">
                                <i class="fas fa-user-md"></i>
                            </div>
                            <h3 class="card-title">My Profile</h3>
                            <a href="#" class="card-stats" onclick="showPage('profile')">Update Profile</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-content">
                            <div class="card-icon">
                                <i class="fas fa-smile"></i>
                            </div>
                            <h3 class="card-title">Manage Users</h3>
                            <a href="manageuser.php" class="card-stats">Total Users: <?php echo $total_users; ?></a>

                            </a>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-content">
                            <div class="card-icon">
                                <i class="fas fa-user-md"></i>
                            </div>
                            <h3 class="card-title">Service Request</h3>
                            <a href="./servicerequest.php" class="card-stats">service Requset</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-content">
                            <div class="card-icon">
                                <ion-icon name="send-outline" style="color:white"></ion-icon>
                            </div>
                            <h3 class="card-title">Send document</h3>
                            <a href="./senddocument.php" class="card-stats">Send document</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-icon">
                                <ion-icon name="send-outline" style="color:white"></ion-icon>
                            </div>
                            <h3 class="card-title">Document History</h3>
                            <a href="./document_history.php" class="card-stats">Document History</a>
                        </div>
                    </div>
                    
                    </div>


                </div>
            </div>

            <?php
            include 'DataBaseConnection.php';

            $name = "";
            $email = "";
            $contact = "";
            $address = "";
            $birthdate = "";
            $state = "";
            $photo = "";
            $gender = "";

            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                if (isset($_SESSION['user_id'])) {
                    $employee_id = $_SESSION['user_id'];

                    // Employees table se data fetch karenge
                    $select = mysqli_query($conn, "SELECT * FROM employees WHERE id = '$employee_id'") or die('Query Failed');

                    if (mysqli_num_rows($select) > 0) {
                        $fetch = mysqli_fetch_assoc($select);
                        $name = $fetch['name'];
                        $email = $fetch['email'];
                        $contact = $fetch['contact']; // Updated from phone to contact
                        $address = $fetch['address'];
                        $birthdate = $fetch['birthdate'];
                        $state = $fetch['state'];
                        $photo = $fetch['photo'];
                        $gender = $fetch['gender'];
                    }
                }
            }
            ?>


        <div id="profile" class="dashbord-content" style="display: none;">
                    <div class="container light-style flex-grow-1 container-p-y">
                        <div class="card overflow-hidden">
                            <div class="row no-gutters row-bordered row-border-light">

                                <div class="list-group list-group-flush account-settings-links">
                                    <a class="list-group-item btn btn-warning list-group-item-action ms-1  active"
                                        data-toggle="list" href="#account-general">General</a>
                                    <a class="list-group-item btn btn-warning list-group-item-action" data-toggle="list"
                                        href="#account-change-password">Change password</a>
                                </div>

                                <div class="col-md-12">
                                    <div class="tab-content">

                                        <div class="tab-pane fade active show" id="account-general">
                                            <form method="POST" action="update_profile.php"
                                                enctype="multipart/form-data">
                                                <div class="card-body media align-items-center d-flex">
                                                    <img src="../uploads/<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                                                        echo $photo;
                                                    } ?>" alt class="d-block ui-w-80">
                                                    <div class="media-body ml-4">
                                                        <label class="btn btn-outline-warning ms-3 me-3">
                                                            Upload new photo
                                                            <input type="file" name="photo"
                                                                class="account-settings-fileinput">
                                                            <input type="hidden" name="old_photo"
                                                                value="<?php echo $photo; ?>">
                                                        </label>
                                                        <button type="button"
                                                            class="btn btn-default md-btn-flat">Reset</button>
                                                        <div class="text-light small mt-1">Allowed JPG, GIF or PNG.</div>
                                                    </div>
                                                </div>
                                                <hr class="border-light m-0">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label class="form-label">User name</label>
                                                        <input type="text" id="name" name="username"
                                                            class="form-control mb-1" value="<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                                                                echo $username;
                                                            } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">E-mail</label>
                                                        <input type="email" class="form-control mb-1" id="email"
                                                            name="email" value="<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                                                                echo $fetch['email'];
                                                            } ?>" required readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Phone</label>
                                                        <input type="text" maxlength="10" name="phone"
                                                            pattern="^[0-9]{10}$" value="<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                                                                echo $fetch['contact'];
                                                            } ?>" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Address</label>
                                                        <textarea class="form-control" rows="3" name="address"><?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                                                            echo $fetch['address'];
                                                        } ?></textarea>
                                                    </div>
                                                    <div class="form-group d-flex mt-3 mb-2">
                                                        <label class="form-label pe-2 pt-1">Birth date</label>
                                                        <input type="date" name="birthdate" value="<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                                                            echo $fetch['birthdate'];
                                                        } ?>" class="form-control" style="max-width:200px;">
                                                        <label class="form-label pe-2 pt-1 ps-5 ms-5">Gender</label>
                                                        <select name="gender" class="ps-2 pe-2" required>
                                                            <option value="" disabled>Select Gender</option>
                                                            <option value="Male" <?php if ($gender == 'Male')
                                                                echo 'selected'; ?>>Male</option>
                                                            <option value="Female" <?php if ($gender == 'Female')
                                                                echo 'selected'; ?>>Female</option>
                                                            <option value="Other" <?php if ($gender == 'Other')
                                                                echo 'selected'; ?>>Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">State</label>
                                                        <input type="text" name="state" value="<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                                                            echo $fetch['state'];
                                                        } ?>" class="form-control mb-1">
                                                    </div>
                                                </div>
                                                <div class="text-right mt-3 ms-4 mb-5">
                                                    <input type="submit" value="Save Changes"
                                                        class="btn btn-warning">&nbsp;
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                </div>
                                            </form>
                                        </div>


                                        <div class="tab-pane fade" id="account-change-password">
                                            <form method="POST" action="change_password.php">
                                                <div class="card-body pb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Current password</label>
                                                        <input type="password" name="current_password"
                                                            class="form-control" placeholder="Current Password"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">New password</label>
                                                        <input type="password" id="new_password" name="new_password" class="form-control" placeholder="New Password" required
                                                               pattern="^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$">    
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Repeat new password</label>
                                                        <input type="password" name="confirm_password"
                                                            class="form-control" placeholder="Confirm Password"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="text-right mt-3  ms-4 mb-5">
                                                    <input type="submit" class="btn btn-warning"
                                                        value="Save Changes">&nbsp;
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </main>
    </div>



    </div>
    <div class="logout">
        <a href="../logout.php" class="logout-btn btn btn-outline-danger">Logout</a>
    </div>


<script>
//  dashbord file 
function showPage(pageId) {
    const pages = document.querySelectorAll('.dashbord-content');
    pages.forEach(page => page.style.display = 'none');
    document.getElementById(pageId).style.display = 'block';
}
document.addEventListener("DOMContentLoaded", function () {
    function showPage(pageId) {
        const pages = document.querySelectorAll('.dashbord-content');
        pages.forEach(page => {
            page.style.display = 'none';
        });
        document.getElementById(pageId).style.display = 'block';
    }
});

</script>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>