<?php

@include '../config.php';

session_start();

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query_admin = "SELECT * FROM admin_tb WHERE email = '$email' AND password = '$password'";
    $result_admin = mysqli_query($conn, $query_admin);

    if (mysqli_num_rows($result_admin) > 0) {
        $row_admin = mysqli_fetch_assoc($result_admin);
        $_SESSION['admin_name'] = $row_admin['name'];
        header('location:adminpage.php');
        exit();
    }

    $error[] = 'Incorrect email or password!';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>

    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .form-container {
            background-image: url('#');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>

</head>

<body>

    <div class="form-container">

        <form action="" method="post">
            <h3>Login now</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="submit" name="submit" value="login now" class="form-btn">

            <div class="social-icons">
                <p>For More Update Follow Us On:</p>
                <a href=""><i class="fa-brands fa-facebook" style="color:rgb(56, 67, 221)"></i></a>
                <a href=""><i class="fa-brands fa-instagram" style="color:rgb(212, 67, 9)"></i></a>
                <a href=""><i class="fa-brands fa-x-twitter" style="color:rgb(0, 0, 0)"></i></a>
                <a href=""><i class="fa-solid fa-envelope" style="color:rgb(255, 105, 180)"></i></a>
            </div>
        </form>

    </div>

</body>

</html>