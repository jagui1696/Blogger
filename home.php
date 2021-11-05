<?php
include_once("config.php");

// Check user login or not
if(!isset($_SESSION['username'])){
    header('Location: index.php');
}

// logout
if(isset($_POST['submit'])){
    session_destroy();
    header('Location: index.php');
}

?>
<!doctype html>
<html>
    <head><title>Homepage</title></head>
    <body style="background-color:grey">
        <h1>Successfully Logged In</h1>
        <form method='post' action="">
            <input type="submit" value="Logout" name="submit">
        </form>
    </body>
</html>