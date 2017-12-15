<!DOCTYPE html>

<html>
<head>
    <title>SIGN UP</title>
    <script type="text/javascript" src="signup.js"></script>
    <script type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="main.css">

</head>

<body>

<h1>Sign up with TicketPro</h1>

<p>Create Your Account!</p>

<form method="post" action="insertData.php">
    <p><label for="first_name"> First Name</label><br/>
        <input id="fn" name="first_name" type="text" size="30" maxLength="30" required><br/>

    <p><label for="last_name"> Last Name</label><br/>
        <input id="ln" name="last_name" type="text" size="30" maxLength="30" required><br/>

    <p><label for="email"> Email Address</label><br/>
        <input id="email" name="email" type="email" size="50" maxLength="50" required><br/>

    <p><label for="password"> Password</label><br/>
        <input id="password" name="password" type="password" size="20" required><br/>

    <p><input type="submit" name="submit_form" value="Submit"><br/>
        <?php $output = array("email" => "This email already exist!"); if ($_GET["signupFailed"]) echo $output[$_GET["factor"]]; ?>

</form>
<P><input type ="checkbox" checked="checked"> Would you like to receive email updates on upcoming event?<br/>
</body>
</html>