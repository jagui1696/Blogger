<?php

include_once("config.php");

function indexButton() {
    if(isset($_POST['submit2'])) {
      header('Location: index.php');
    }
    $valid = FALSE;
}

if (isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['pwd1'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
    $valid = TRUE;
    
    if ($_POST['pwd1']!= $_POST['pwd2'])
    {
     echo "Password did not match! Please try again.";
     indexButton();
    }

    if (!empty($username)) {
      $sql_check_usernames = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
      $get_rows = mysqli_affected_rows($conn);
  
      if ($get_rows >= 1) {
          echo "Username already exists. Please try again.";
          indexButton();
      }
    }

    if (!empty($email)) {
      $sql_check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
      $get_rows = mysqli_affected_rows($conn);
  
      if ($get_rows >= 1) {
          echo "Email already exists. Please try again.";
          indexButton();
      }
    }

    if ($valid) {
      $sec_password = password_hash($password, PASSWORD_DEFAULT);
      $sql_register = "INSERT INTO users (username, password, firstName, lastName, email, birthdate) VALUES ('$username', '$sec_password', '$firstName', '$lastName', '$email', '$birthdate')";

      if (mysqli_query($conn, $sql_register)) {
          echo "New record created successfully";
        }
      else {
          echo "Error: " . $sql_register . "<br>" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>

<!doctype html>
<html>
    <head><title>Registration Error</title></head>
    <body style="background-color:grey">
        <form method='post' action="index.php">
            <input type="submit" value="Back to Index" name="submit2">
        </form>
    </body>
</html>
