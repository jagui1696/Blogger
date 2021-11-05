<?php
    include_once("config.php");
?>
<!DOCTYPE html>
<head>
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
        width: 250px;
        padding: 20px;
    }
    </style>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <title>COMP440 - Welcome Page</title>
</head>
<body style="background-color:grey">

    <div class="container" id="register" style="display:none">
        <form action="register.php" method="POST">
            <h2>Register</h2><br>
            <input type="text" name="username" placeholder="Username" required style="margin-bottom: 5px" />
            </br>
            <input type="text" name="email" placeholder="Email" style="margin-bottom: 5px" />
            </br>
            <input type="password" name="pwd1" placeholder="Password" required style="margin-bottom: 5px" />
            </br>
            <input type="password" name="pwd2" placeholder="Re-enter Password" required style="margin-bottom: 5px" />
            </br>
            <input type="text" name="firstname" placeholder="First Name" style="margin-bottom: 5px" />
            </br>
            <input type="text" name="lastname" placeholder="Last Name" style="margin-bottom: 5px" />
            </br>
            <input type="submit" name="submit" value="Register" style="margin-bottom: 20px" />
            <br>
            Already have account?<br><button type="button" name="button" value ="login" onclick="switchFunction()">Login</button>
        </form>
    </div>
    <div class="container" id="login">
        <form action="login.php" method="POST">
            <h2>Login</h2><br>
            <input type="text" name="username" placeholder="Username" required style="margin-bottom: 5px" />
            </br>
            <input type="password" name="pwd" placeholder="Password" required style="margin-bottom: 5px" />
            </br>
            <input type="submit" name="submit" value="Login" style="margin-bottom: 20px" />
            <br>
            New User?<br><button type="button" name="button" value ="register" onclick="switchFunction()">Sign Up</button>
        </form>
    </div>
        <br>

    <script src="jquery.js"></script>   
    <script>
        function switchFunction() {
            var login = document.getElementById("login"); 
            var register = document.getElementById("register");

            login.style.display = (login.style.display == "none" ? "block" : "none"); 
            register.style.display = (register.style.display == "none" ? "block" : "none"); 
        }
    </script>

</body>