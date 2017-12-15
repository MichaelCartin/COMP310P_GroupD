<?php

//session started//
session_start();

include ("connect.php");

$email = "";

function test_input($text){
    $email = trim($text);
    $email = stripslashes($text);
    $email = htmlspecialchars($text);
    $password = trim($text);
    $password = stripslashes($text);
    $password = htmlspecialchars($text);
    return $text;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["email"]))
    {
        die(header("location:login.php?loginFailed=true&reason=email"));;
    } else {
        $email = test_input($_POST["email"]);


        if(empty($_POST['password']))
        {
            die(header("location:login.php?loginFailed=true&reason=password"));;
        } else
            $password = test_input($_POST["password"]);

        $query = "SELECT first_name, last_name from user WHERE user_password = \"$password\" AND user_email = \"$email\"";

        $result = mysqli_query($connect, $query)
        or die('Error retrieving data from database. Query Error.');
        $row = mysqli_fetch_array($result);
        $fn = $row['first_name'];
        $ln = $row['last_name'];

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['user_email']=$email;
            header('Location: mainPage.php');
            session_register("email");
            session_register("password");

        } else {
            die(header("location:login.php?loginFailed=true&reason=both"));;
        }
    }

    $_SESSION[$this->GetLoginSessionVar()] = $fn;
    return true;

}