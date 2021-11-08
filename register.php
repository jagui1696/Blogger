<?php

include_once("config.php");
$valid = TRUE;

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
    
    if ($_POST['pwd1'] != $_POST['pwd2'])
    {
     echo "Password did not match! Please try again.";
     $valid = FALSE;
     indexButton();
    }

    if (!empty($username)) {
      $sql_check_usernames = $conn->prepare("SELECT * FROM users WHERE username=?");
      $sql_check_usernames->bind_param('s', $username);
      $sql_check_usernames->execute();
      $result = $sql_check_usernames->get_result();
      $get_rows = mysqli_affected_rows($conn);
  
      if ($get_rows >= 1) {
          echo "Username already exists. Please try again.";
          indexButton();
      }
    }

    if (!empty($email)) {
      $sql_check_email = $conn->prepare("SELECT * FROM users WHERE email=?");
      $sql_check_email->bind_param('s', $email);
      $sql_check_email->execute();
      $result = $sql_check_email->get_result();
      $get_rows = mysqli_affected_rows($conn);
  
      if ($get_rows >= 1) {
          echo "Email already exists. Please try again.";
          indexButton();
      }
    }

    if ($valid) {
      $sec_password = password_hash($password, PASSWORD_DEFAULT);
      $sql_register = $conn->prepare("INSERT INTO users VALUES (?, ?, ?, ?, ?)");
      $sql_register->bind_param('sssss', $username, $firstName, $lastName, $sec_password, $email);

      if ($sql_register->execute()) {
          echo "New record created successfully";
        }
      else {
          echo "Error: " . $sql_register->execute() . "<br>" . mysqli_error($conn);
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
