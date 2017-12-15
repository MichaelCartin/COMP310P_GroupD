<?php
include ('connect.php');

session_start();
include ('searchResultsPage.php');
$currentID = $_GET['id'];
$_SESSION['testing']=$currentID;

//echo $_SESSION['testing'];

//echo $currentID;

$currentDate = date("Y-m-d");

//echo $currentDate;
//echo $currentID;
//echo $_SESSION['userid'];

$query = "SELECT * FROM event JOIN venue ON event.venue_id=venue.venue_id WHERE event_id = '$currentID'";
$result = mysqli_query($connect, $query)
or die('Error retrieving data from database. Query Error.');

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $end_date = $row['end_date'];
        $_SESSION['end_date'] = $end_date;
        echo $row['event_name']."<br>";
        echo "<br>";
        echo $row['description']."<br>";
        echo "Location: ".$row['venue_name']."<br>";
        echo "Date: ".$row['start_date']."<br>";
        echo "Start time: ".$row['start_time']."<br>";
        echo "End time: ".$row['end_time']."<br>";

        //echo $_SESSION['end_date'];
    }
} else {

    echo "0 results";
}

if($currentDate>$_SESSION['end_date']) {

    echo "<a href='feedback.php?id=" . $currentID . "'>Give Feedback</a>";
    echo "<br>";
}
else{
    echo "";
}
?>

<?php

include ('connect.php');
session_start();

$hostQuery = "SELECT user_id FROM event WHERE event_id = '$currentID'";
$hostResult = $connect->query($hostQuery);

if ($hostResult->num_rows > 0) {

    while ($row = $hostResult->fetch_assoc()) {
        $hostID = $row['user_id'];
        //echo 'the host id for this event is ';
        // echo $hostID;
        //echo $_SESSION['userid'];
        //echo $hostID;
    }
}
?>
<?php

include ('connect.php');
if($hostID=$_SESSION['userid'])
    {

        $sql = "SELECT count(ticket_id) as total FROM ticket WHERE event_id='$currentID'";
        $result = $connect->query($sql);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                echo 'The total number of ticket sales is ';
                //echo $row["total"];
                $totalSales = $row["total"];
                $_SESSION['ticketSales'] = $totalSales;
                echo $_SESSION['ticketSales'];

            }
        }
        else
            {
            echo "0 results";
            }
        //$connect->close();

        $venueQuery = "SELECT venue_capacity FROM venue JOIN event ON venue.venue_id = event.venue_id WHERE event_id = '$currentID'";
        $venueResults = $connect->query($venueQuery);

        if ($venueResults->num_rows > 0)
        {
            while ($row = $venueResults->fetch_assoc())
            {
                //echo 'The venue capacity is is';
//echo $row["total"];
                $venueCapacity = $row['venue_capacity'];
                $_SESSION['venue_capacity'] = $venueCapacity;
                echo ' out of an available ';
                echo $_SESSION['venue_capacity'];
                echo "<br>";
                //echo $row['venue_capacity'];
            }
        }
    }

?>

<?php

session_start();

if($currentDate<$_SESSION['end_date']){
    if($_SESSION['ticketSales']<$_SESSION['venue_capacity']){
        echo '<form method="post" action="insertTicket.php">
    <p><input type="submit" name="book_event" value="Get a ticket!"><br/> </form>';

    }else{
        echo 'This is sold out';
        echo "<br>";
    }
}else{
    echo 'This event has already happened';
    echo "<br>";
}
/*if(/*$currentDate<$_SESSION['end_date'] && $_SESSION['ticketSales']<$_SESSION['venue_capacity']) {

    echo '<form method="post" action="insertTicket.php">
    <p><input type="submit" name="book_event" value="Submit"><br/> </form>';
}else {

    echo 'No tickets available!';

}*/

?>

<?php

include ('connect.php');

$sql = "SELECT feedback, rating FROM review WHERE event_id ='$currentID'order by rating DESC";
$result = $connect->query($sql);

if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
        echo "<br> Rating:".$row['rating']." - Feedback:". $row['feedback']."";
        echo "<br>";
    }
}
else {
    echo "There is currently no feedback for this event.";
    echo "<br>";
}
$connect->close();
?>

<?php
include ('connect.php');
$sql = "SELECT last_name, first_name, user_email FROM user JOIN ticket ON user.user_id = ticket.user_id
JOIN event ON ticket.event_id = event.event_id
WHERE event_id='$currentID'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
while($row = $result->fetch_assoc()) {
echo "<table><tr><th>Name:</th> <td> ". $row["first_name"]. " " . $row["last_name"] . "</td>  <th>Email Address:</th><td>". $row["user_email"]. " </td></tr></table>";
}

}
else {
echo "0 results";
}
$connect->close();
?>