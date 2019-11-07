<?php
session_start();
if(empty($_SESSION['sess_user_id'])) header("location: index.php");
?>