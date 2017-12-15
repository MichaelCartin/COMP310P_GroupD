<?php
session_start();

//echo $_SESSION['userid'];
$currentID = $_GET['id'];

$_SESSION['eventID']=$currentID;


//echo $currentID;
?>
<!DOCTYPE html>

<html>
<head>
    <title>FEEDBACKS AND RATING</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

<h1>Leave your feedbacks here</h1>

<ul>
    <li><a href="mainPage.php">Home</a></li>
    <li><a href="#home">My Account</a></li>
    <li><a href="createEvent.php">Make Event</li>
    <li><a href="logOut.php">Sign Out</a></li>
</ul>
<form method="post" action="insertFeedback.php">
    <p><label for="feedback"> Leave your comments</label><br/>
        <input id="feedback" name="feedback" type="text" size="100" maxLength="100" required><br/>

    <p><label for="rating"> Rating</label><br/>
        <select id ="ratingList" name="rating" required><br/>
            <option value ="1">★</option>
            <option value ="2">★★</option>
            <option value ="3">★★★</option>
            <option value ="4">★★★★</option>
            <option value ="5">★★★★★</option>
        </select>

    <p><input type="submit" name="submit_feedback" value="Submit"><br/>
    <p><?php $result = array("date_error" => "No comments can be added before the event occur!"); if ($_GET["commentFailed"]) echo $result[$_GET["reason"]]; ?><br>

</form>

</body>
</html>