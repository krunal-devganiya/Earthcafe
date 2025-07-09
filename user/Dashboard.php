<!DOCTYPE html>
<html lang="en">

<?php
session_start();
?>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Dashboard</title>
    <link rel="stylesheet" href="./css/Dashboard.css">
    <link rel="stylesheet" href="./css/profile.css">
    <!-- bootstrep link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/jpg" href="../img/ashoksthambh.jpg">


</head>

<body>
    <ion-icon name="chevron-back-outline" class="close-btn" onclick="goHome()"></ion-icon>
    <div class="container1">
        <!-- Sidebar -->
        <navbar class="sidebar">
            <div class="sidebar-header">
                <a href="Dashboard.php" class="logo">Dashboard</a>
                <button class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="sidebar-content">
                <div class="nav-section">
                    <h3 class="nav-title">MAIN NAVIGATION</h3>
                    <nav class="nav-menu">
                        <a href="#" onclick="showPage('profile')" class="nav-item active">
                            <i class="fas fa-home"></i>
                            <span class="nav-link">Profile</span>
                        </a>
                        <a href="../otherdoc.php" class="nav-item">
                            <i class="fas fa-user-md"></i>
                            <span>Document List</span>
                        </a>
                        <a href="document_status.php" onclick="showPage('status')" class="nav-item">
                            <i class="fas fa-users"></i>
                            <span>Document Status</span>
                        </a>
                        <a href="document_history.php" onclick="showPage('history')" class="nav-item">
                            <i class="fas fa-user"></i>
                            <span>Document History</span>
                        </a>
                        <a href="wrong_document.php" class="nav-item">
                            <i class="fas fa-user"></i>
                            <span>Wrong Document</span>
                        </a>
                        <a href="download.php" class="nav-item">
                            <i class="fas fa-user"></i>
                            <span>Download document</span>
                        </a>
                        <a href="rejected_services.php" class="nav-item">
                        <i class="fa-solid fa-file-excel"></i>
                            <span>Rejected Services</span>
                        </a>
                        <a href="payment_history.php" class="nav-item">
                        <i class="fa-solid fa-file-excel"></i>
                            <span>Payment History</span>
                        </a>
                    </nav>
                </div>
            </div>
            <div class="logout">
                <a href="../logout.php" class="logout-btn btn btn-outline-danger">Logout</a>
            </div>
        </navbar>

        <!-- Main Content -->
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
                                        <?php echo htmlspecialchars($_SESSION['username']); ?>
                                    </p>
                                </span>
                            <?php endif; ?>
                        </li>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="dashboard" id="content">
                <div id="home" class="dashbord-content">
                    <div class="breadcrumb">
                        <span>User</span>
                        <span class="separator">/</span>
                        <span>Dashboard</span>
                    </div>
                    <!-- Dashboard Cards -->
                    <div class="dashboard-cards">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-icon">
                                    <img class="img-logo" src="./img/user.png" alt="user logo">
                                </div>
                                <h3 class="card-title">My Profile</h3>
                                <a class="card-stats" href="#" onclick="showPage('profile')">Update Profile</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="card-icon">
                                    <img class="img-logo" src="./img/files.png" alt="Doc List Logo">
                                </div>
                                <h3 class="card-title">Document List</h3>
                                <a class="card-stats" href="../otherdoc.php">View Document</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="card-icon">
                                    <img class="img-logo" src="./img/reporting.png" alt="Doc Status logo">
                                </div>
                                <h3 class="card-title">Document Status</h3>
                                <a class="card-stats" href="document_status.php" onclick="showPage('status')">Check
                                    Status</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="card-icon">
                                    <img class="img-logo" src="./img/file.png" alt="Doc History logo">
                                </div>
                                <h3 class="card-title">Document History</h3>
                                <a class="card-stats" href="document_history.php" onclick="showPage('history')">View
                                    History</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="card-icon">
                                    <img class="img-logo" src="./img/delete_10902755.png" alt="Wrong Doc logo">
                                </div>
                                <h3 class="card-title">Wrong Document</h3>
                                <a class="card-stats" href="wrong_document.php" onclick="showPage('history')">View Wrong
                                    Document</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="card-icon">
                                    <img class="img-logo" src="./img/file_16061653.png" alt="Doc History logo">
                                </div>
                                <h3 class="card-title">Download document</h3>
                                <a class="card-stats" href="download.php" onclick="showPage('download')">Download</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="card-icon">
                                    <img class="img-logo" src="./img/reject_4381663.png" alt="Doc History logo">
                                </div>
                                <h3 class="card-title">Rejected Services</h3>
                                <a href="./rejected_services.php" class="card-stats">document</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="card-icon">
                                    <img class="img-logo" src="./img/fine_10295727.png" alt="Doc History logo">
                                </div>
                                <h3 class="card-title">Payment History</h3>
                                <a href="./payment_history.php" class="card-stats">document</a>
                            </div>
                        </div>
                    </div>
                </div>


                <?php
                include 'DataBaseConnection.php';
                $username = "";
                $email = "";

                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                    if (isset($_SESSION['user_id'])) {
                        $user_id = $_SESSION['user_id'];

                        $select = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id'") or die('Query Failed');

                        if (mysqli_num_rows($select) > 0) {
                            $fetch = mysqli_fetch_assoc($select);
                            $username = $fetch['username'];
                            $email = $fetch['email'];
                            $phone = $fetch['phone'];
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
                    <div class="breadcrumb">
                        <span>User</span>
                        <span class="separator">/</span>
                        <span>profile</span>
                    </div>
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
                                                        <div class="text-light small mt-1">Allowed JPG, GIF or PNG.
                                                        </div>
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
                                                                echo $fetch['phone'];
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
                                                        <input type="password" id="new_password" name="new_password"
                                                            class="form-control" placeholder="New Password" required
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


                <div id="status" class="dashbord-content" style="display: none;">
                    <div class="breadcrumb">
                        <span>User</span>
                        <span class="separator">/</span>
                        <span>Status</span>
                    </div>
                    <div class="status">
                        <h1>User Status</h1>
                    </div>
                </div>
                <div id="history" class="dashbord-content" style="display: none;">
                    <div class="breadcrumb">
                        <span>User</span>
                        <span class="separator">/</span>
                        <span>History</span>
                    </div>
                    <div class="history">
                        <h1>User History</h1>
                    </div>
                </div>
            </div>

        </main>
    </div>




    <!-- icon link -->

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- External JS -->
    <script src="./js/script.js"></script>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>