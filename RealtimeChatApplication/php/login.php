<?php
session_start();
include_once "config.php";
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);

if (!empty($email) && !empty($password)) {
    // Checking the user entered email and password match in the database table row email and password
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
    if (mysqli_num_rows($sql) > 0) { // if user's credentials match
        $row = mysqli_fetch_assoc($sql);
        // updating the user's status to active if logged in successfully
        $status = "Active now";
        $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
        if ($sql2) {
            $_SESSION['unique_id'] = $row['unique_id']; //using this session we used user unique_id in other php file for login success
            echo "Success";
        }
    } else {
        echo "Email or Password is incorrect!";
    }
} else {
    echo "All the fields are required!";
}
?>