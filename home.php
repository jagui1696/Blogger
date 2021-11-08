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

if(isset($_POST['restart_user_tables'])){
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

if(isset($_POST['initdb'])){
    /*  THIS SOURCE FROM: https://stackoverflow.com/questions/19751354/how-do-i-import-a-sql-file-in-mysql-database-using-php
    WITH HEAVY ADJUSTMENTS TO THE CODE AS IT WAS NOT WORKING APROPRIATELY
    USED FOR SQL INJECTION PURPOSES */
    $filename = 'university.sql';
    $templine = '';

    // Read in entire file
    $lines = file($filename);
    // Loop through each line
    foreach ($lines as $line)
    {
        // Skip it if it's a comment
        if (substr($line, 0, 2) == '--' || $line == '')
            continue;

        // Add this line to the current segment
        $templine .= $line;
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';')
        {
            // Perform the query
            $sql2 = mysqli_query($conn, $templine);
            if(!$sql2) {
                print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error($conn) . '<br /><br />');
            }
            // Reset temp variable to empty
            $templine = '';
        }
    }
    echo "Tables imported successfully";
    // END OF THIRD PARTY CODE
    //session_destroy();
    //header('Location: index.php');
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
        <div id="restart_user_table" class="container">
            <form method='post' action="">
                <input type="submit" value="Restart Table Users" name="restart_user_tables">
            </form>
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