<?php
/* User login process, checks if user exists and password is correct */
session_start();
// Escape email to protect against SQL injections
$enroll =$_POST['enroll'];
$result = $mysqli->query("SELECT * FROM whywait WHERE enroll='$enroll'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message']= "User with that email doesn't exist!";
    header("location: newe.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( $_POST['password']== $user['pass'])  {
        
        $_SESSION['enroll'] = $user['enroll'];
        $_SESSION['username'] = $user['username'];
       // $_SESSION['active'] = $user['active'];
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        header("location: ../order/userhome.php");
    }
    else {
        $_SESSION['message']= "You have entered wrong password, try again!";
        header("location: newe.php");
    }
}
?>

