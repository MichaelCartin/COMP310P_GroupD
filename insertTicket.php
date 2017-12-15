<?php
session_start();

include ("connect.php");

if(isset($_POST['book_event'])){

    $query = "INSERT INTO ticket(user_id, event_id)
            VALUES ('".$_SESSION['userid']."','".$_SESSION['testing']."')";

    if (mysqli_query($connect, $query)){
        echo "You have successfully booked a ticket for this event! <a href='mainPage.php'</a> Click here to return to the home page!";

    }else{
        echo 'Error linking with the database';
    }

}
?>