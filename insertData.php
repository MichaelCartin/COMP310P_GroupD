<?php

include ("connect.php");
// create variables
$first_name =($_POST['first_name']);
$last_name = ($_POST['last_name']);
$email = ($_POST['email']);
$password = ($_POST['password']);

// attempt insert query execution
if(isset($_POST['submit_form'])){
    mysqli_query($connect,"INSERT INTO user (first_name, last_name,user_email, user_password)
		        VALUES ('$first_name','$last_name','$email','$password')");
}

if(mysqli_affected_rows($connect) > 0){

    //echo "<a href='mainPage.php'</a>";
    header('Location: mainPage.php');

} else {
    die(header("location:signUp.php?signupFailed=true&factor=email"));
    echo mysqli_error ($connect);
}
?>