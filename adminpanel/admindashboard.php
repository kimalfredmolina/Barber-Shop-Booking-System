<?php
session_start();
require '../config.php';

/*$student_count_query = "SELECT COUNT(*) AS student_count FROM student_tb";
$student_count_result = mysqli_query($conn, $student_count_query);
$student_count = mysqli_fetch_assoc($student_count_result)['student_count'];

$faculty_count_query = "SELECT COUNT(*) AS faculty_count FROM faculty_tb";
$faculty_count_result = mysqli_query($conn, $faculty_count_query);
$faculty_count = mysqli_fetch_assoc($faculty_count_result)['faculty_count'];

$staff_count_query = "SELECT COUNT(*) AS staff_count FROM staff_tb";
$staff_count_result = mysqli_query($conn, $staff_count_query);
$staff_count = mysqli_fetch_assoc($staff_count_result)['staff_count'];

$event_count_query = "SELECT COUNT(*) AS event_count FROM event";
$event_count_result = mysqli_query($conn, $event_count_query);
$event_count = mysqli_fetch_assoc($event_count_result)['event_count'];*/


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/adminpage.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Drake's Barbershop</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar -->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
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
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
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
                                <a class="nav-link" href="/adminpanel/admindb/admin_db.php">Employee Information</a>
                                <a class="nav-link" href="#">Reservation Information</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Events
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="/event/addevent.php">Add Event</a>
                                        <a class="nav-link" href="/event/event.php">Event List</a>
                                        <a class="nav-link" href="#">Event Register</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAnnouncement" aria-expanded="false" aria-controls="pagesCollapseAnnouncement">
                                    Announcement
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAnnouncement" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="/announce/announce.php">Add Announcement</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseEvaluation" aria-expanded="false" aria-controls="pagesCollapseEvaluation">
                                    Evaluation
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseEvaluation" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">Add Evaluation</a>
                                        <a class="nav-link" href="401.html">Result</a>
                                    </nav>
                                </div>
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
                    <h1 class="mt-4">Admin Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <!--
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-info text-white mb-4">
                                <div class="card-body d-flex justify-content-between align-items-center" style="font-size: 1.5rem;">
                                    <span><i class="fa-solid fa-user fa-xl"></i></span>
                                    <span class>Total Students:</span>
                                    <span class="text-white"><?= $student_count; ?></span>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between" style="font-size: 1.25rem;">
                                    <a class="large text-white stretched-link" href="studentdb.php" style="font-size: 1rem;">View Details</a>
                                    <div class="large text-white" style="font-size: 1.25rem;"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body d-flex justify-content-between align-items-center" style="font-size: 1.5rem;">
                                    <span><i class="fa-solid fa-user fa-xl"></i></span>
                                    <span>Total Faculties:</span>
                                    <span class="text-white"><?= $faculty_count; ?></span>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between" style="font-size: 1.25rem;">
                                    <a class="large text-white stretched-link" href="/faculty/facultydb.php" style="font-size: 1rem;">View Details</a>
                                    <div class="large text-white" style="font-size: 1.25rem;"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-info text-white mb-4">
                                <div class="card-body d-flex justify-content-between align-items-center" style="font-size: 1.5rem;">
                                    <span><i class="fa-solid fa-user fa-xl"></i></span>
                                    <span>Total Staff's:</span>
                                    <span class="text-white"><?= $staff_count; ?></span>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between" style="font-size: 1.25rem;">
                                    <a class="large text-white stretched-link" href="/staff/staffdb.php" style="font-size: 1rem;">View Details</a>
                                    <div class="large text-white" style="font-size: 1.25rem;"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body d-flex justify-content-between align-items-center" style="font-size: 1.5rem;">
                                    <span><i class="fa-solid fa-calendar-days fa-xl"></i></span>
                                    <span>Total Events:</span>
                                    <span class="text-white"><?= $event_count; ?></span>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between" style="font-size: 1.25rem;">
                                    <a class="large text-white stretched-link" href="/event/event.php" style="font-size: 1rem;">View Details</a>
                                    <div class="large text-white" style="font-size: 1.25rem;"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>                        
                    </div>-->
                    <!-- The rest of dashboard content -->
                </div>
            </main>


        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/js/script.js"></script>
</body>

</html>