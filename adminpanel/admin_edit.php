<?php
session_start();
require '../config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Employee Information - Admin</title>
    <link href="/css/adminpage.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="adminpage.php">Trim and Tonic</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar -->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">

            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="/adminpanel/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="admindashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Main Page</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Customer Data
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/adminpanel/admin_db.php">Employee Information</a>
                                <a class="nav-link" href="/adminpanel/reserv_db.php">Reservation Information</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Admin
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="message-container">
                        <?php include('../message.php'); ?>
                    </div>
                    <h1 class="mt-4">Edit Employee Profile</h1>
                    <ol class="breadcrumb mb-4">
                        <a class="btn btn-primary" href="/adminpanel/admin_db.php" role="button"><i class="fa-solid fa-arrow-left"></i> Back</a>
                    </ol>
                    <?php
                    if (isset($_GET['id'])) {
                        $emp_id = mysqli_real_escape_string($conn, $_GET['id']);
                        $query = "SELECT * FROM admin_db WHERE id='$emp_id' ";
                        $query_run = mysqli_query($conn, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            $emp = mysqli_fetch_array($query_run);

                            $image_data = base64_encode($emp['picture']);
                            $image_src = 'data:image/jpeg;base64,' . $image_data;
                    ?>
                            <form action="/adminpanel/adminfunction.php" method="POST" enctype="multipart/form-data">
                                <div class="profile-container">

                                    <div class="photo-container">
                                        <div class="photo-box">
                                            <label for="photo-upload" class="photo-upload-label">
                                                <?php if ($emp['picture']): ?>
                                                    <img src="<?= $image_src; ?>" alt="emp Photo" class="photo-display" />
                                                <?php else: ?>
                                                    <span class="add-photo-icon">+</span>
                                                <?php endif; ?>
                                            </label>
                                            <input type="file" id="photo-upload" name="photo" class="photo-upload-input" />
                                        </div>
                                        <span class="add-photo-text">Add Photo</span>
                                    </div>

                                    <h2 class="profile-heading">Employee Information</h2>

                                    <div class="profile-form">
                                        <input type="hidden" name="employee_id" value="<?= $emp['employee_id']; ?>" />

                                        <div class="form-group">
                                            <label class="form-label">Employee ID</label>
                                            <input type="text" class="form-input" value="<?= $emp['employee_id']; ?>" name="employee_id_disabled" placeholder="Enter emp Number" disabled />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Employee Name</label>
                                            <input type="text" name="name" value="<?= $emp['name']; ?>" class="form-input">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Position</label>
                                            <select class="form-select" name="position">
                                                <option value="Owner" <?= ($emp['position'] == 'Owner') ? 'selected' : '' ?>>Owner</option>
                                                <option value="Manager" <?= ($emp['position'] == 'Manager') ? 'selected' : '' ?>>Manager</option>
                                                <option value="Barber" <?= ($emp['position'] == 'Barber') ? 'selected' : '' ?>>Barber</option>
                                                <option value="Senior Barber" <?= ($emp['position'] == 'Senior Barber') ? 'selected' : '' ?>>Senior Barber</option>
                                                <option value="Hair Stylish" <?= ($emp['position'] == 'Hair Stylish') ? 'selected' : '' ?>>Hair Stylish</option>
                                                <option value="Receptionist" <?= ($emp['position'] == 'Receptionist') ? 'selected' : '' ?>>Receptionist</option>
                                                <option value="Cashier" <?= ($emp['position'] == 'Cashier') ? 'selected' : '' ?>>Cashier</option>
                                                <option value="Cleaning Staff" <?= ($emp['position'] == 'Cleaning Staff') ? 'selected' : '' ?>>Cleaning Staff</option>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label class="form-label">Birth Date</label>
                                            <input type="date" class="form-input" value="<?= $emp['birthdate']; ?>" name="birthdate" />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Gender</label>
                                            <select class="form-select" name="gender">
                                                <option value="Male" <?= ($emp['gender'] == 'Male') ? 'selected' : '' ?>>Male</option>
                                                <option value="Female" <?= ($emp['gender'] == 'Female') ? 'selected' : '' ?>>Female</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-input" value="<?= $emp['email']; ?>" name="email" placeholder="Enter Email" />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Contact Number</label>
                                            <input type="text" class="form-input" value="<?= $emp['contact_num']; ?>" name="contact_num" placeholder="Enter Contact Number" />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Full Address</label>
                                            <input type="text" class="form-input" value="<?= $emp['address']; ?>" name="address" placeholder="Enter Address" />
                                        </div>

                                        <button type="submit" name="update_emp" class="form-button">Update Information</button>
                                    </div>
                                </div>
                            </form>
                    <?php
                        } else {
                            echo "<h4>No Such Id Found</h4>";
                        }
                    }
                    ?>

                    <div style="height: 20vh"></div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2024</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/js/scripts.js"></script>
</body>

</html>