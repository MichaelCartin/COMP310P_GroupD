<!DOCTYPE html>

<html>
<head>
    <title>CREATE EVENT</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

<h1>Create your event !</h1>

<ul>
    <li><a href="mainPage.php">Home</a></li>
    <li><a href="#home">My Account</a></li>
    <li>Make Event</li>
    <li><a href="logOut.php">Sign Out</a></li>
</ul>


<form method="post" action="insertEvent.php">
    <p><label for="event_name"> Event Name</label><br/>
        <input id="event_name" name="event_name" type="text" size="30" maxLength="30" required><br/>

    <p><label for="description"> Event Description</label><br/>
        <input id="description" name="description" type="text" size="100" maxLength="300" required><br/>

    <p><label for="venue_id"> Venue</label><br/>
        <select id ="venueList" name="venue_id" required><br/>
            <option value ="1">O2 Apollo</option>
            <option value ="2">Manchester Arena</option>
            <option value ="3">Plymouth Pavillion</option>
            <option value ="4">Eleifend Stadium</option>
            <option value ="5">Ultrices Institute</option>
            <option value ="6">First Direct Arena</option>
            <option value ="7">Turpis Nec Arena</option>
            <option value ="8">Copper Box</option>
            <option value ="9">Semper Stadium</option>
            <option value ="10">Leo Central</option>
        </select>

    <p><label for="artist_id"> Music Genre</label><br/>
        <select id ="artist_id" name="artist_id" required><br/>
            <option value ="1">Hip-Hop</option>
            <option value ="2">Film Score</option>
            <option value ="3">Contemporary R&B</option>
            <option value ="4">K-Pop</option>
            <option value ="5">Classical Music</option>
            <option value ="6">Synthwave </option>
            <option value ="7">Industrial Metal</option>
            <option value ="8">Alternative Rock</option>
            <option value ="9">Opera</option>
            <option value ="10">Trap Music</option>
        </select>

    <p>Start Date
        <input id="startDate" name="start_date" type="date" required/><br/>

    <p>End Date
        <input id="endDate" name="end_date" type="date" required/><br/>
        <script>
            document.getElementById('startDate').onchange = function () {
                document.getElementById('endDate').setAttribute('min',  this.value);

            };

        </script>

    <p><label for="start_time"> Start Time</label><br/>
        <select id ="start_time" name="start_time" type="time" required><br/>
            <option value ="00:00:00">00:00:00</option>
            <option value ="01:00:00">01:00:00</option>
            <option value ="02:00:00">02:00:00</option>
            <option value ="03:00:00">03:00:00</option>
            <option value ="04:00:00">04:00:00</option>
            <option value ="05:00:00">05:00:00</option>
            <option value ="06:00:00">06:00:00</option>
            <option value ="07:00:00">07:00:00</option>
            <option value ="08:00:00">08:00:00</option>
            <option value ="09:00:00">09:00:00</option>
            <option value ="10:00:00">10:00:00</option>
            <option value ="11:00:00">11:00:00</option>
            <option value ="12:00:00">12:00:00</option>
            <option value ="13:00:00">13:00:00</option>
            <option value ="14:00:00">14:00:00</option>
            <option value ="15:00:00">15:00:00</option>
            <option value ="16:00:00">16:00:00</option>
            <option value ="17:00:00">17:00:00</option>
            <option value ="18:00:00">18:00:00</option>
            <option value ="19:00:00">19:00:00</option>
            <option value ="20:00:00">20:00:00</option>
            <option value ="21:00:00">21:00:00</option>
            <option value ="22:00:00">22:00:00</option>
            <option value ="23:00:00">23:00:00</option>
            <option value ="24:00:00">24:00:00</option>
        </select>

    <p><label for="end_time"> End Time</label><br/>
        <select id ="end_time" name="end_time" type="time" required><br/>
            <option value ="00:00:00">00:00:00</option>
            <option value ="01:00:00">01:00:00</option>
            <option value ="02:00:00">02:00:00</option>
            <option value ="03:00:00">03:00:00</option>
            <option value ="04:00:00">04:00:00</option>
            <option value ="05:00:00">05:00:00</option>
            <option value ="06:00:00">06:00:00</option>
            <option value ="07:00:00">07:00:00</option>
            <option value ="08:00:00">08:00:00</option>
            <option value ="09:00:00">09:00:00</option>
            <option value ="10:00:00">10:00:00</option>
            <option value ="11:00:00">11:00:00</option>
            <option value ="12:00:00">12:00:00</option>
            <option value ="13:00:00">13:00:00</option>
            <option value ="14:00:00">14:00:00</option>
            <option value ="15:00:00">15:00:00</option>
            <option value ="16:00:00">16:00:00</option>
            <option value ="17:00:00">17:00:00</option>
            <option value ="18:00:00">18:00:00</option>
            <option value ="19:00:00">19:00:00</option>
            <option value ="20:00:00">20:00:00</option>
            <option value ="21:00:00">21:00:00</option>
            <option value ="22:00:00">22:00:00</option>
            <option value ="23:00:00">23:00:00</option>
            <option value ="24:00:00">24:00:00</option>
        </select>


    <p><input type="submit" name="submit_event" value="Submit"><br/>
    <p><?php $createResults = array("event_name" => "Event name already exist!"); if ($_GET["createFailed"]) echo $createResults[$_GET["reason"]];
    ?><br>

</form>

</body>
</html>