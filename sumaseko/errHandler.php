<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "masek0zamar";
$dbname = "dbusers";

try{
$db = "mysql:host=" . $dbHost . ";dbName=" .  $dbname;
$pdo = new PDO($db, $dbUser, $dbPassword);
echo "Successful";
}
catch(PDOException $e){
    echo "An error has occured: ".$e->getMessage();
}









    // if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     $username = $_POST['lgUsername'];
    //     $email = $_POST['email'];
    //     $password = $_POST['lgPasswd'];

    //     if (empty($email) || empty($username) || empty($password)){
    //         echo "All fields are required";
    //     }
    //     else {
    //         if (strlen($username) > 8 || !preg_match("/^[a-zA-Z-'\s]+$", $username)){
    //             echo "Please enter a valid username";
    //         }
    //         else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    //             echo "PPlease enter a valid email";
    //         }
    //         else{

    //             $sql = "INSERT INTO camusers (username, email, pasword) VALUES (:username, :email, :password)";

    //             $stmt = $pdo->prepare($sql);
    //             $stmt->execute(['username' => $username, 'email' => $email, 'password' => $password]);

    //             echo "Registration successful";
    //             $username = "";
    //             $email = "";
    //             $password = "";
    //         }
    //     }
    // }
?>