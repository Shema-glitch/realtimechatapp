<?php
session_start();
if (isset($_SESSION['unique_id'])) { // if the user has logged in and come to the user list otherwise to the login page
    include_once "config.php";
    $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
    if (isset($logout_id)) { // if the logout id is set
        $status = "Offline now";
        // Once the user logs out we'll update the db status to offline and in the login form 
        // we'll again update or change the status to online if logs back in successfully
        $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$logout_id}");
        if ($sql) {
            session_unset();
            session_destroy();
            header("location: ../login.php");
        }
    } else {
        header("location: ../users.php");
    }
} else {
    header("location: ../login.php");
}

