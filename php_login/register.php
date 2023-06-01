 <?php
  require 'db.php';
  session_start();
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];
$first_name = $mysqli->escape_string($_POST['firstname']); 
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$phone = $mysqli->escape_string($_POST['phone']);	
$password = $mysqli->escape_string(base64_encode($_POST['password']));
$hash = rand(100000, 1000000);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

if ( $result->num_rows > 0 ) {
    $_SESSION['regmessage'] = 'User with this email already exists!';
    header("location: loginView.php");
    
}
else {
        if($first_name != '') {
        $sql = "INSERT INTO `users` (`f_name`, `l_name`, `email`, `phone`, `password`, `hash`) VALUES ('$first_name','$last_name','$email', '$phone' ,'$password', '$hash')";
        if ( $mysqli->query($sql) ){

            $_SESSION['active'] = 0; 
            $_SESSION['logged_in'] = true;
            $_SESSION['sucess'] =
                    
                    "Great! you're almost done. A confirmation link has been sent to $email,
                    please verify your account by clicking on the link in the message!";

            $to      = $email;
            $from    = 'lalakash012@gmail.com';
            $subject = 'Account Verification'; 
            $message = '
            Hello '.$first_name.',

            Thank you for signing up!

            Kindly click this link to activate your account:

            http://localhost/php_login/verify.php?email='.$email.'&hash='.$hash;  

            if (mail ($to, $subject, $message, $from)) {
                $_SESSION['sucess'] = 'Registration Successful, please verify the email!';
            } else {
                $_SESSION['regmessage'] = 'Something went wrong, go back and try again!';
            }
    
            
            header("location: loginView.php"); 

        }
    }

    else {
        $_SESSION['regmessage'] = 'Registration failed!';
        header("location: loginView.php");
    }

}