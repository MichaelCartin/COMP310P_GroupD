<?php

include ('connect.php');
$output = "";
$genre = "All genres";


if(isset($_POST['search'])){
    $genre = $_POST['genre'];
    $search_query = $_POST['search'];
    $search_query = preg_replace("#[^0-9a-z]#i","",$search_query);
if ($genre == "All genres") {
    $query = mysqli_query($connect, "SELECT * FROM event JOIN artist ON event.artist_id = artist.artist_id WHERE event_name 
LIKE '%$search_query%' OR description LIKE '%$search_query%'") or die("Unable to search.");

}else{

    $query = mysqli_query($connect, "SELECT * FROM event JOIN artist ON event.artist_id = artist.artist_id WHERE event_name 
LIKE '%$search_query%' OR description LIKE '%$search_query%' AND artist.music_genre LIKE '%$genre%'") or die("Unable to search.");
}
    $count = mysqli_num_rows($query);
    if ($count == 0) {
        $output = 'No events found!';
    } else {
        while ($row = mysqli_fetch_array($query)) {

            $event_id = $row['event_id'];
            $name = $row['event_name'];
            //outputs clickable links to each event
            echo "<a href='eventPage.php?id=".$event_id."'> ".$name." </a>";
            echo "<br>".$row["description"]."<br>";
            echo "<br>";
            /*$event_name = "<p>" . $row['event_name'] . "<br>";
            $description = $row['description'];

            $output .= '<div>' . $event_name . ' ' . $description . '</div>';
            //<a href='".$link_address1."'>Search Results</a>;*/
        }
    }
}



?>

<!DOCTYPE html>
<html>
<head>
    <title>TicketPro Home</title>
    <link rel="stylesheet" type="text/css" href="main.css">
<body>

<form action="searchResultsPage.php" method="post">
    <input type="text" name="search" placeholder="Search for events in..."/>

    <select id = "genre" name ="genre">
        <option value = "All genres">All genres</option>
        <option value = "Hip-Hop">Hip-Hop</option>
        <option value = "Film Score">Film Score</option>
        <option value = "Contemporary R&B">Contemporary R&B</option>
        <option value = "Classical Music">Classical Music</option>
        <option value = "Synthwave">Synthwave</option>
        <option value = "Industrial Metal">Industrial Metal</option>
        <option value = "Alternative Rock">Alternative Rock</option>
        <option value = "Opera">Opera</option>
        <option value = "Trap Music">Trap Music</option>
    </select>
    <input type="submit" value="Search!"/>

    <ul>
        <li><a href="mainPage.php">Home</a></li>
        <li><a href="myAccount.php">My Account</a></li>
        <li><a href="createEvent.php">Make Event</a></li>
        <li><a href="logOut.php">Sign Out</a></li>
    </ul>

</form>

<h1>
    <?php

    echo $output;

    ?>
</h1>
</body>
</head>
</html>

