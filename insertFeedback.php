<?php
/*
include ("connect.php");


$feedback =($_POST['feedback']);
$rating =($_POST['rating']);
$event_id = ($_GET['id']);


if(isset($_POST['submit_feedback'])){
    $query = "INSERT INTO review(feedback, rating, event_id)
            VALUES ('$feedback', '$rating', '$event_id')";

    $results = mysqli_query($connect, $query) or die('Error Querying database.');

    mysqli_close($connect);
}

header('Location: mainPage.php');
*/

session_start();
include ('connect.php');

$feedback =($_POST['feedback']);
$rating =($_POST['rating']);
$current_Date = Date('Y/m/d');

//$eventid = $_SESSION['eventID'];


if(isset($_POST['submit_feedback'])) {
    $check = mysqli_query($connect, "SELECT * FROM event e JOIN ticket t ON e.event_id = t.event_id WHERE $current_Date > e.end_date");

    $checkrows = mysqli_num_rows($check);

}

if($checkrows>0){
    	die(header("location:feedback.php?commentFailed=true&reason=date_error"));
	echo mysqli_error ($connect);
}
else{

$query = "INSERT INTO review(feedback, rating, user_id, event_id)
            VALUES ('$feedback', '$rating','".$_SESSION['userid']."','".$_SESSION['eventID']."')";


    $results = mysqli_query($connect, $query) or die('Error Querying database.');

    mysqli_close($connect);
}
    	header('Location: mainPage.php');

?>
