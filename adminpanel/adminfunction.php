<?php
session_start();
require '../config.php';

// Delete employee
if (isset($_POST['delete_emp'])) {
    $employee_id = mysqli_real_escape_string($conn, $_POST['delete_emp']);

    $query = "DELETE FROM admin_db WHERE id='$employee_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Employee Information Deleted Successfully";
    } else {
        $_SESSION['message'] = "Employee Information Not Deleted";
    }
    header("Location: admin_db.php");
    exit(0);
}

// Update employee
elseif (isset($_POST['update_emp'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $employee_id = mysqli_real_escape_string($conn, $_POST['employee_id']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact_num = mysqli_real_escape_string($conn, $_POST['contact_num']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    if (isset($_FILES['photo']['tmp_name']) && !empty($_FILES['photo']['tmp_name'])) {
        $photo = $_FILES['photo'];
        $photo_tmp_name = $photo['tmp_name'];

        if ($photo['error'] === UPLOAD_ERR_OK) {
            $picture = file_get_contents($photo_tmp_name);
            $picture = mysqli_real_escape_string($conn, $picture);

            $query = "UPDATE admin_db SET name='$name', email='$email', position='$position', address='$address', contact_num='$contact_num', picture='$picture', birthdate='$birthdate', gender='$gender' WHERE employee_id='$employee_id'";
        } else {
            $_SESSION['message'] = "File upload error: " . $photo['error'];
            header("Location: admin_db.php");
            exit(0);
        }
    } else {
        $query = "UPDATE admin_db SET name='$name', email='$email', position='$position', address='$address', contact_num='$contact_num', birthdate='$birthdate', gender='$gender' WHERE employee_id='$employee_id'";
    }

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Employee Information Updated Successfully";
    } else {
        $_SESSION['message'] = "Employee Information Not Updated";
    }
    header("Location: admin_db.php");
    exit(0);
}

// Save New employee
elseif (isset($_POST['save_emp'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $employee_id = mysqli_real_escape_string($conn, $_POST['employee_id']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact_num = mysqli_real_escape_string($conn, $_POST['contact_num']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    $picture = null;
    if (isset($_FILES['photo']['tmp_name']) && $_FILES['photo']['tmp_name'] != '') {
        $picture = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
    }

    $query = "INSERT INTO admin_db (name, email, employee_id, position, address, contact_num, picture, birthdate, gender) 
              VALUES ('$name', '$email', '$employee_id', '$position', '$address', '$contact_num', '$picture', '$birthdate', '$gender')";

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Employee Information Created Successfully";
    } else {
        die("Query Failed: " . mysqli_error($conn));
    }
    header("Location: admin_db.php");
    exit(0);
}

// Invalid Request
else {
    $_SESSION['message'] = "Invalid Request";
    header("Location: admin_db.php");
    exit(0);
}
