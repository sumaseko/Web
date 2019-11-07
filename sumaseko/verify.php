<?php
    require 'config/connection.php';
    require 'insert.php';
    if (isset($_GET['vkey'])) {
      //Process Verification
    $vkey = $_GET['vkey'];
    $sql = "SELECT verified , vkey FROM camusers WHERE verified = 0 AND vkey = ? LIMIT 1" ;
   $stmt= $conn->prepare($sql);
   $stmt->bindParam(1, $vkey);
   $stmt->execute();
   if (count($stmt->fetchAll()) == 1)
   {
       // Validate the email
       $sql = "UPDATE camusers SET verified = 1 WHERE vkey = ? LIMIT 1";
       $stmt= $conn->prepare($sql);
       $stmt->bindParam(1, $vkey);
       if ($stmt->execute()){
           echo "Your Camagru account has been verified. You can now login to your account now.";
       }else{
           echo "Your account has not login";
       }
   }else{
       echo "This account is invalid or already verified";
   }
  }
  else{
      die("Something went wrong");
  }
?>
<html>
   <head>
       <title>Camagru | Verify</title>
       <link rel="stylesheet" type="text/css" href="style.css">
   </head>
   <body>
       <center>
       </center>
   </body>
</html>