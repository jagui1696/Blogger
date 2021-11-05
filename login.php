<?php
    include_once("config.php");

    if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $password = $_POST['pwd'];
    
        if ($username != "" && $password != "") {
            $sql = "SELECT * FROM users WHERE username='".$username."'";
            $result = mysqli_query($conn, $sql);
            $numRows = mysqli_num_rows($result);
    
            if ($numRows == 1) {
                $row = mysqli_fetch_assoc($result);
                if (password_verify($password, $row['password'])) {
                    $_SESSION['username'] = $username;
                    header('Location: home.php');
                }
                else {
                    echo "Invalid password";
                    if(isset($_POST['submit2'])) {
                        header('Location: index.php');
                      }
                }
            }
            else {
                echo "Invalid username";
                if(isset($_POST['submit2'])) {
                    header('Location: index.php');
                  }
            }
    
        }
    
    }

mysqli_close($conn);
?>

<!doctype html>
<html>
    <head><title>Login Error</title></head>
    <body style="background-color:grey">
        <form method='post' action="index.php">
            <input type="submit" value="Back to Index" name="submit2">
        </form>
    </body>
</html>