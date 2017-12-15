<!DOCTYPE html>
<head>

    <title>LOGIN</title>

    <link rel="stylesheet" type="text/css" href="main.css">

</head>
<body>
<h1>Welcome to TicketPro</h1>

<form method="post" action="test.php">
    <p><label for="email"> Email</label><br/>
        <input id="email" name="email" placeholder="Enter Username" type="email" size="50" maxLength="50"><br/>

    <p><label for="password"> Password</label><br/>
        <input id="password" name="password" placeholder="Enter Password" type="password" size="20" maxLength="20"><br/>

    <p><input type="submit" name = "submit" value="Submit" ><br/>
        <?php $reasons = array("email" => "Invalid Email", "password" => "Invalid Password", "both" => "Email and Password does not match."); if ($_GET["loginFailed"]) echo $reasons[$_GET["reason"]]; ?>

</form>

<form method="get" action="signUp.php">
    <p><button type="submit">Click here to sign up!</button><br/>
</form>

</body>