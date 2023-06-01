<?php
require 'db.php';
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
session_start();
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(base64_encode($_POST['password']));
$result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND `password` = '$password'"); 
$rows = $result->fetch_row();
if ( $result->num_rows == 0 ){
    $_SESSION['message'] = "Invalid User name or password";
    header("location: loginView.php");
}
elseif($rows['active'] != '1') {
    $_SESSION['message'] = "Please Activate your account by clicking on the link send to your account";
    header("location: loginView.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if (password_verify($_POST['password'], $user['password']) ) {
        
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['active'] = $user['active'];
        $_SESSION['logged_in'] = true;

        header("location: index.php");
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: loginView.php");
    }
}

