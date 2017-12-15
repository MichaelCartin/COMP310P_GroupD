

<?php
session_start();
include("connect.php");



//echo $_SESSION['user_email'];
//echo $_SESSION['userid'];

include("searchResultsPage.php")

?>
<?php

//echo $output; ?>

<!DOCTYPE html>
<html>
<head>
    <title>TicketPro Home Page</title>
    <link rel="stylesheet" type="text/css" href="main.css">
<body>
<!--<ul>
    <li><a href="mainPage.php">Home</a></li>
    <li><a href="myAccount.php">My Account</a></li>
    <li><a href="createevent.php">Make Event</a></li>
    <li><a href="logOut.php">Sign Out</a></li>
</ul>

<ul>
    <li> <a href="#.html"> Hip-Hop</a></li>
    <li> <a href="#.html"> Film Score</a></li>
    <li> <a href="#.html"> Contemporary R&B</a></li>
    <li> <a href="#.html"> Classical Music</a></li>
    <li> <a href="#.html"> Synthwave</a></li>
    <li> <a href="#.html"> Industrial Metal</a></li>
    <li> <a href="#.html"> Alternative Rock</a></li>
    <li> <a href="#.html"> Opera</a></li>
    <li> <a href="#.html"> Trap Music</a></li>
</ul>-->

<body>

<info>
    <h1>Latest Events</h1>
    <?php

    $event_name="";
    $sql = "SELECT event_name, description, event_id FROM event ORDER BY event_id DESC LIMIT 3";
    $latest = $connect->query($sql);

    if ($latest->num_rows > 0) {
        // output data of each row
        while($row = $latest->fetch_assoc()) {

            $event_id = $row['event_id'];
            $_SESSION['event_id'] = $event_id;
            $name = $row['event_name'];
          //outputs clickable links to each event
            echo "<a href='eventPage.php?id=".$event_id."'> ".$name." </a>";
            echo "<br>".$row["description"]."<br>";
            echo "<br>";
        }

    } else {
        echo "No results";
    }
    $connect->close();
    ?>

</info>

</body>
</html>