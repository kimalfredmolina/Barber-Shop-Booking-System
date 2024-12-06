<?php
session_start();
require '../config.php';

// Delete Customer
if (isset($_POST['delete_emp'])) {
    $full_name = mysqli_real_escape_string($conn, $_POST['delete_emp']);

    $query = "DELETE FROM reservation WHERE id='$full_name' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Customer Information Deleted Successfully";
    } else {
        $_SESSION['message'] = "Customer Information Not Deleted";
    }
    header("Location: reserv_db.php");
    exit(0);
} else {
    $_SESSION['message'] = "Invalid Request";
    header("Location: reserv_db.php");
    exit(0);
}
