<?php
/*  THIS SOURCE FROM: https://stackoverflow.com/questions/19751354/how-do-i-import-a-sql-file-in-mysql-database-using-php
    WITH HEAVY ADJUSTMENTS TO THE CODE AS IT WAS NOT WORKING APROPRIATELY
    USED FOR SQL INJECTION PURPOSES */
// Name of the file
$filename = 'university.sql';
// MySQL host
$mysql_host = 'localhost';
// MySQL username
$mysql_username = 'root';
// MySQL password
$mysql_password = 'pass1234';
// Database name
$mysql_database = 'compdb';

$conn = mysqli_connect($mysql_host, $mysql_username, $mysql_password);
if (!$conn){
    die('Error connecting to MySQL server: ' . mysqli_error($conn));
} else { echo 'connected to mysql server';}
$sql1 = mysqli_select_db($conn, $mysql_database);
if(!$sql1){
    die('Error selecting MySQL database: ' . mysqli_error($conn));
} else {echo 'connected to mysql db';}

// Temporary variable, used to store current query
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

?>