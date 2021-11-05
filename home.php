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
    <head><title>COMP440 - Homepage</title>
    <style>
    .container {
        font-weight: bold;
        font-family: Arial;
        display: flex;
        justify-content: center;
        text-align: center;
        align-items: center;
        background-color: #0C5F89;
        border: 2px solid #002538;
        margin: auto;
        margin-bottom: 10px;
        width: 350px;
        padding: 20px;
    }
    </style></head>
    <body style="background-color:grey">
        <div id ="header" class="container">
            <h1>Successfully<br>Logged In</h1>
        </div>
        <div id="initdb" class="container">
            <button type="button" value="initdb">Initialize Database</button></div>
        </div>
        <div id="logout" class="container">
            <form method='post' action="">
                <input type="submit" value="Logout" name="submit">
            </form>
        </div>
    </body>
</html>