<?php
session_start();

if(isset($_SESSION['auth'])){
    header('Location: admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    
    <div class="main-container">
        <div class='login-wrapper'>
            <p>Mixd Hub Restobar</p>
            <span class="error-notif"></span>
            <input type="text" class="username" name="username" placeholder="user name" />
            <input type="password" class="password" name="password" placeholder="password" />
            <input type="button" id="login" value="Login">
        </div>
    </div>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
    <script src="scripts/jquery-3.6.1.min.js"></script>
    <script src="scripts/main.js"></script>
</body>
</html>