<?php
include ('connect.php');
include ('searchResultsPage.php');

?>
<!DOCTYPE html>

<html>
<head>
    <title>My Account Page</title>
    <script type="text/javascript" src="homepage.js"></script>
    <script type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>


    <?php
    session_start();
    include ('connect.php');


    $sql =("SELECT *
FROM event
JOIN ticket ON event.event_id = ticket.event_id
JOIN user ON ticket.user_id = user.user_id
WHERE user.user_id = '".$_SESSION['userid']."'");
$result = $connect->query($sql);

    echo 'Your upcoming events are...'."<br>";
    echo "<br>";

if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
        $event_id = $row['event_id'];
        $_SESSION['event_id'] = $event_id;
        $name = $row['event_name'];
        echo "<a href='eventPage.php?id=".$event_id."'> ".$name." </a>";
        echo " - ". $row["end_date"]."<br>";
        echo "<br>";
    }
}
else {
    echo "0 results";
}
$connect->close();
?>
    <input type ="checkbox" name="updates" id="updates"> Would you like to receive email updates on upcoming event?<br/>


        <script>
            function validate() {
                if (document.getElementById('updates').checked) {
                    alert("An Update has been sent to your personal email");
                } else {
                    alert("You didn't check it! Let me check it for you.");
                }
            }

            document.getElementById('updates').addEventListener('change', validate);

        </script>
</body>
</html>
