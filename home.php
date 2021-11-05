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

if(isset($_POST['initdb'])){
    $droptable = "DROP TABLE users";
    $sql1 = mysqli_query($conn, $droptable);
    $createtable = "CREATE TABLE users (username VARCHAR(12) PRIMARY KEY,
                                        firstName VARCHAR(24),
                                        lastName VARCHAR(24),
                                        password VARCHAR(255),
                                        email VARCHAR(255) UNIQUE )";
    $sql2 = mysqli_query($conn, $createtable);
    $hashpw = password_hash('pass1234', PASSWORD_DEFAULT);
    $default = "INSERT INTO users (username, password) VALUES ('comp440', '$hashpw')";
    $sql3 = mysqli_query($conn, $default);
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
            <table>
                <tr>Successfully<br>Logged In</tr><br>
                <tr><?php echo $_SESSION['username']; ?></tr>
            </table>
        </div>
        <div id="initdb" class="container">
            <form method='post' action="">
                <input type="submit" value="Initialize Database" name="initdb">
            </form>
        </div>
        </div>
        <div id="logout" class="container">
            <form method='post' action="">
                <input type="submit" value="Logout" name="submit">
            </form>
        </div>
    </body>
</html>