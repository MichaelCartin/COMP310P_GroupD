<?php
session_start();

include ("connect.php");
//include ("session.php");
//$_SESSION['user_email'] = $email;


$event_name =($_POST['event_name']);
$description =($_POST['description']);
$venue_id = ($_POST['venue_id']);
$artist_id = ($_POST['artist_id']);
$start_date = ($_POST['start_date']);
$end_date = ($_POST['end_date']);
$start_time = ($_POST['start_time']);
$end_time = ($_POST['end_time']);


if(isset($_POST['submit_event'])){

    $check = mysqli_query($connect, "SELECT event_name FROM event WHERE event_name='$event_name'");

    $checkrows = mysqli_num_rows($check);
}

if($checkrows>0){
    die(header("location:createEvent.php?createFailed=true&reason=event_name"));
    echo mysqli_error ($connect);
}else{
    $query = "INSERT INTO event(event_name, description, venue_id, artist_id, start_date, end_date, start_time, end_time, user_id)
            VALUES ('$event_name','$description','$venue_id','$artist_id', '$start_date', '$end_date', '$start_time', '$end_time', '".$_SESSION['userid']."')";


    $results = mysqli_query($connect, $query) or die('Error Querying database.');

    mysqli_close($connect);
}
header('Location: mainPage.php');

?>