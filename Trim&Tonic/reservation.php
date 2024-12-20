<?php
session_start();
require '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['booking-form-name']);
    $phone = mysqli_real_escape_string($conn, $_POST['booking-form-phone']);
    $time = mysqli_real_escape_string($conn, $_POST['booking-form-time']);
    $date = mysqli_real_escape_string($conn, $_POST['booking-form-date']);
    $payment_method = mysqli_real_escape_string($conn, $_POST['position']);
    $comment = mysqli_real_escape_string($conn, $_POST['booking-form-message']);

    $max_capacity = 10; // reservations per day

    $query = "SELECT COUNT(*) as reservation_count FROM reservation WHERE date = '$date'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row['reservation_count'] >= $max_capacity) {
        echo "<script>alert('Sorry, reservations for this date are full. Please choose another date.');</script>";
    } else {
        $sql = "INSERT INTO reservation (full_name, contact_num, time, date, payment, comment) 
                VALUES ('$name', '$phone', '$time', '$date', '$payment_method', '$comment')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Reservation successful!');</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trim & Tonic</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,400;0,600;0,700;1,200;1,700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/vegas.min.css" rel="stylesheet">

    <link href="css/tooplate-barista.css" rel="stylesheet">



    <!--

Tooplate 2137 Barista

https://www.tooplate.com/view/2137-barista-cafe

Bootstrap 5 HTML CSS Template

-->
</head>

<body class="reservation-page">

    <main>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="index.html">
                    <img src="/Trim&Tonic/images/barbershop.png" class="navbar-brand-image img-fluid" alt="">
                    Trim & Tonic
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html#section_1">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.html#section_2">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.html#section_3">Our Menu</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.html#section_4">Reviews</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.html#section_5">Contact</a>
                        </li>
                    </ul>

                    <div class="ms-lg-3">
                        <a class="btn custom-btn custom-border-btn" href="reservation.html">
                            Reservation
                            <i class="bi-arrow-up-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>


        <section class="booking-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-10 col-12 mx-auto">
                        <div class="booking-form-wrap">
                            <div class="row">
                                <div class="col-lg-7 col-12 p-0">
                                    <form class="custom-form booking-form" action="" method="post" role="form">
                                        <div class="text-center mb-4 pb-lg-2">
                                            <em class="text-white">Fill out the booking form</em>

                                            <h2 class="text-white">Book a Barber</h2>
                                        </div>

                                        <div class="booking-form-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-12">
                                                    <input type="text" name="booking-form-name" id="booking-form-name" class="form-control" placeholder="Full Name" required>
                                                </div>

                                                <div class="col-lg-6 col-12">
                                                    <input type="tel" class="form-control" name="booking-form-phone" placeholder="+639" pattern="\+639[0-9]{9}" required>
                                                </div>

                                                <div class="col-lg-6 col-12">
                                                    <input class="form-control" type="time" name="booking-form-time" value="12:00">
                                                </div>

                                                <div class="col-lg-6 col-12">
                                                    <input type="date" name="booking-form-date" id="booking-form-date" class="form-control" placeholder="Date" required="">
                                                </div>

                                                <div class="col-lg-12 col-12">

                                                    <select class="form-control" name="position" required>
                                                        <option>Select Mode of Payment</option>
                                                        <option value="Gcash">Gcash</option>
                                                        <option value="PayMaya">Paymaya</option>
                                                        <option value="Credit Card">Credit Card</option>
                                                        <option value="Bank Transfer">Bank Transfer</option>
                                                        <option value="Cash">Cash</option>
                                                    </select>

                                                    <textarea name="booking-form-message" rows="3" class="form-control" id="booking-form-message" placeholder="Comment (Optional)"></textarea>
                                                </div>

                                                <div class="col-lg-4 col-md-10 col-8 mx-auto mt-2">
                                                    <button type="submit" class="form-control">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-lg-5 col-12 p-0">
                                    <div class="booking-form-image-wrap">

                                        <img src="images/scissors.jpg" class="booking-form-image img-fluid" alt="">
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </section>


        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-12 me-auto">
                        <em class="text-white d-block mb-4">Where to find us?</em>

                        <strong class="text-white">
                            <i class="bi-geo-alt me-2"></i>
                            Taguig City University
                        </strong>

                        <ul class="social-icon mt-4">
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-facebook">
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="https://x.com/minthu" target="_new" class="social-icon-link bi-twitter">
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-whatsapp">
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-12 mt-4 mb-3 mt-lg-0 mb-lg-0">
                        <em class="text-white d-block mb-4">Contact</em>

                        <p class="d-flex mb-1">
                            <strong class="me-2">Phone:</strong>
                            <a href="tel: 305-240-9671" class="site-footer-link">
                                +639

                            </a>
                        </p>

                        <p class="d-flex">
                            <strong class="me-2">Email:</strong>

                            <a href="mailto:info@yourgmail.com" class="site-footer-link">
                                trimandtonic.co
                            </a>
                        </p>
                    </div>


                    <div class="col-lg-5 col-12">
                        <em class="text-white d-block mb-4">Opening Hours.</em>

                        <ul class="opening-hours-list">
                            <li class="d-flex">
                                Monday - Friday
                                <span class="underline"></span>

                                <strong>9:00 - 18:00</strong>
                            </li>

                            <li class="d-flex">
                                Saturday
                                <span class="underline"></span>

                                <strong>11:00 - 16:30</strong>
                            </li>

                            <li class="d-flex">
                                Sunday
                                <span class="underline"></span>

                                <strong>Closed</strong>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-8 col-12 mt-4">
                        <p class="copyright-text mb-0">Copyright © Trim & Tonic. 2024</p>
                    </div>

                </div>
        </footer>
    </main>


    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/vegas.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>