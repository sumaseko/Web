<?php
$dbhost = "localhost";
$dbuser = "root";
$password = "masek0zamar";

try {
    $connect = new PDO("mysql:host=$dbhost;dbname=dbusers", $dbuser, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "connect successful";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
}
?>