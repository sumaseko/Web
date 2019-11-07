<?php
include "config/connection.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (isset($_POST['regButton'])){
    if ($_POST['lgPasswd'] == $_POST['confirmPasswd']){

        $username = $_POST['lgUsername'];
        $email = $_POST['email'];
        $password = md5($_POST['lgPasswd']);

        $sql = "SELECT * FROM dbusers . camusers WHERE username = ? OR email = ?";
        $pdostmt= $connect->prepare($sql);
        $pdostmt->bindParam(1, $username);
        $pdostmt->bindParam(2, $email);
        $pdostmt->execute();
        // $res = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        $pdostmt->SetFetchMode(PDO::FETCH_ASSOC);
        $user = $pdostmt->fetch();

        if ($user > 0){
            echo "Username/Email already exists. Try again";
        }
        else {
            $sql = "INSERT INTO camusers (username, email, password) VALUES (?, ?, ?)";
            $pdostmt= $connect->prepare($sql);
            $pdostmt->bindParam(1, $username);
            $pdostmt->bindParam(2, $email);
            $pdostmt->bindParam(3, $password);
            // $pdostmt->bindParam(4, $vkey);
            if(!($pdostmt->execute())){
                echo "Error";
            }
        }
        // $from = "admin@gmail.com";
        // $to = $email;
        // $subject = "Camagru Account Verification";
        // $message = "<html><body>";
        // $message =  "<p>Hi. Please verify your Camagru account by clicking the link below</p>";
        // $message .= "<a href='http://".$_SERVER['HTTP_HOST'] . $loc ."/../resetpw.php?verify=".$key."'><p>press to verify</p></a>";
        // $message = "</body></html>";
        
        // mail($to, $subject, $message, $from);
        // $pdostmt = null;
        // $connect = null;
        
    }
    else{
        echo "Passwords don't match";
    }
    header("Location: login.php");
    session_destroy();
}

?>