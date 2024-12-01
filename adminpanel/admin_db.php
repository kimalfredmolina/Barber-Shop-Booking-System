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
                    <div class="message-container">
                        <?php include('../message.php'); ?>
                    </div>
                    <h1 class="mt-4">Employee Information</h1>
                    <ol class="breadcrumb mb-4">
                        <a class="btn btn-primary" href="admin_add.php" role="button"><i class="fa-solid fa-plus"></i> Add Employee</a>
                    </ol>

                    <!-- Search Form -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <form class="d-flex" method="GET" action="">
                                <input type="text" name="search" class="form-control me-2" placeholder="Search Employee" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                        </div>
                    </div>

                    <!-- Pagination Setup -->
                    <?php
                    $records_per_page = 10; //rage data you want to see in Admin page
                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $offset = ($page - 1) * $records_per_page;
                    ?>

                    <!-- this is for Student Table -->
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Position</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_GET['search'])) {
                                $filtervalues = $_GET['search'];
                                $query = "SELECT * FROM admin_db WHERE CONCAT(id, employee_id, email, contact_num, position, name, address) LIKE '%$filtervalues%' LIMIT $offset, $records_per_page";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $items) {
                            ?>
                                        <tr>
                                            <td><?= $items['id']; ?></td>
                                            <td><?= $items['employee_id']; ?></td>
                                            <td><?= $items['name']; ?></td>
                                            <td><?= $items['email']; ?></td>
                                            <td><?= $items['contact_num']; ?></td>
                                            <td><?= $items['position']; ?></td>
                                            <td><?= $items['address']; ?></td>
                                            <td>
                                                <a href="dataview_stud.php?id=<?= $items['id']; ?>" class="btn btn-info btn-sm"><i class="fas fa-info-circle fa-lg"></i></a>
                                                <a href="dataedit_stud.php?id=<?= $items['id']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit fa-lg"></i></a>
                                                <form action="/adminpanel/adminfunction.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_emp" value="<?= $items['id']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt fa-lg"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="9">No Record Found</td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                $query = "SELECT * FROM admin_db LIMIT $offset, $records_per_page";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $emp) {
                                    ?>
                                        <tr>
                                            <td><?= $emp['id']; ?></td>
                                            <td><?= $emp['employee_id']; ?></td>
                                            <td><?= $emp['name']; ?></td>
                                            <td><?= $emp['email']; ?></td>
                                            <td><?= $emp['contact_num']; ?></td>
                                            <td><?= $emp['position']; ?></td>
                                            <td><?= $emp['address']; ?></td>
                                            <td>
                                                <a href="dataview_stud.php?id=<?= $emp['id']; ?>" class="btn btn-info btn-sm"><i class="fas fa-info-circle fa-lg"></i></a>
                                                <a href="dataedit_stud.php?id=<?= $emp['id']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit fa-lg"></i></a>
                                                <form action="/adminpanel/adminfunction.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_emp" value="<?= $emp['id']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt fa-lg"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                            <?php
                                    }
                                } else {
                                    echo "<h5>No Record Found</h5>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                    <!-- Pagination Controls -->
                    <?php
                    $total_records_query = "SELECT COUNT(*) AS total FROM admin_db";
                    $total_records_result = mysqli_query($conn, $total_records_query);
                    $total_records = mysqli_fetch_assoc($total_records_result)['total'];

                    $total_pages = ceil($total_records / $records_per_page);
                    ?>

                    <nav class="d-flex justify-content-center">
                        <ul class="pagination">
                            <?php if ($page > 1): ?>
                                <li class="page-item"><a class="page-link" href="?page=<?= $page - 1; ?>&search=<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>">Previous</a></li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <li class="page-item <?= $i == $page ? 'active' : ''; ?>"><a class="page-link" href="?page=<?= $i; ?>&search=<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>"><?= $i; ?></a></li>
                            <?php endfor; ?>

                            <?php if ($page < $total_pages): ?>
                                <li class="page-item"><a class="page-link" href="?page=<?= $page + 1; ?>&search=<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>">Next</a></li>
                            <?php endif; ?>
                        </ul>
                    </nav>

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
    <script src="/js/script.js"></script>
</body>

</html>