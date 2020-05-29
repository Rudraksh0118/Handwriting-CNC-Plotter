<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['username'] = $_POST['username'];

// Escape all $_POST variables to protect against SQL injections
$enroll=$mysqli->escape_string($_POST['enroll']);
$username = $mysqli->escape_string($_POST['username']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string($_POST['password']);

      
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM whywait WHERE enroll='$enroll'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: index.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO whywait (enroll,email,username, pass) " 
            . "VALUES ('$enroll','$email','$username','$password')";

    // Add user to the database
    if ( $mysqli->query($sql) ){

        //$_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
       /* $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification ( clevertechie.com )';
        $message_body = '
        Hello '.$first_name.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost/login-system/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );*/

        header("location: ../order/userhome.php"); 

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: index.php");
    }

}
?>
