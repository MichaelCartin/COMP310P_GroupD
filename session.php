<?php
include ('connect.php');
session_start();
header ('Location: login.php');

$user_email=$_SESSION['user_email'];


$sql = "SELECT user_id FROM user WHERE user_email='$user_email'";
$result = $connect->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $user_id = $row["user_id"];
        $_SESSION['userid'] = $user_id;
        echo $_SESSION['userid'];
    }
} else {
    echo "0 results";
}

$connect->close();
?>
