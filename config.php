<?php
      session_start();
      $dbhost = 'localhost';
      $dbuser = 'root';
      $dbpass = 'pass1234';
      $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

      if(! $conn ) {
         die('Could not connect: ' . mysqli_error($conn));
      }
      //echo 'Connected successfully<br />';
      $retval = mysqli_select_db( $conn, 'comp440' );
      if(! $retval ) {
         die('Could not select database: ' . mysqli_error($conn));
      }
      //echo "Database compdb selected successfully<br>";
      //mysqli_close($conn);
   ?>