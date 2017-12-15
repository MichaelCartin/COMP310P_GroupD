<?php

include ("connect.php");

if(isset($_POST['user_email']))
{
    $email=$_POST['user_email'];
    $checkdata=" SELECT user_email FROM user WHERE user_email='$email' ";
    $query=mysql_query($checkdata);

    if(mysql_num_rows($query)>0)
    {
        echo "Email Already Exist";
    }
    else
    {
        echo "OK";
    }
    exit();
}

?>


