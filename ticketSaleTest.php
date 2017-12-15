<?php

include ('connect.php');

$currentID = '16';
$venueQuery = "SELECT venue_capacity FROM venue JOIN event ON venue.venue_id = event.venue_id WHERE event_id = '$currentID'";
$venueResults = $connect->query($venueQuery);

if ($venueResults->num_rows > 0){
    while($row = $venueResults->fetch_assoc()) {
        //echo 'The venue capacity is is';
//echo $row["total"];
        $venueCapacity = $row['venue_capacity'];
        echo $venueCapacity;
        //echo $row['venue_capacity'];
    }
}
?>