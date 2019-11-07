<?php
session_start();

require_once("config/connection.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// $dbhost= "localhost";
// $dbuser = "root";
// $password = "masek0zamar";

if(isset($_POST['lginButton'])){
    $username = trim($_POST['lgUsername']);
    $password = trim($_POST['lgPasswd']); 
    

    $sql = "SELECT id, username, password FROM `dbusers` . `camusers` WHERE `username` = :lgUsername AND `password` = :lgPasswd LIMIT 1;";
    $pdostmt = $connect->prepare($sql);
    $pdostmt->bindParam(":lgUsername" , $username);
    $pdostmt->bindParam(":lgPasswd", $password);
    $pdostmt->execute();
    $pdostmt->rowCount();
    // $pdostmt->rowCount(PDO::FETCH_ASSOC);
    $row = $pdostmt->fetch();

        if ($row == 0){
            echo "Invalid username/password";
        }
        else{
            $_SESSION['sess_user_id'] = $row['id'];
            $_SESSION['sess_user_name'] = $row['username'];
            $_SESSION['sess_email'] = $row['password'];
        }
        header("Location: home.php");
}
?>

<html>
    <head>
        <title>Camagru | Login</title>
        <link href="css/style.css" rel="stylesheet"/>
    </head>
    <body>

    <div class="login">
	<h1>Camagru | Login</h1>
    <form method="post">
    	<input type="text" name="lgUsername" placeholder="Username" required="required" />
        <input type="password" name="lgPasswd" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large" name="lginButton">LogIn</button>
        <p> <a href="forgotpasswd.php">Forgot password?</a></p>
        <p>Don't have an account? <a href="registration.php">Sign up</a></p>
    </form>
</div>
</body>
</html>