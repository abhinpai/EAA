<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $usn = mysqli_real_escape_string($db,$_POST['usn']);
      $password = mysqli_real_escape_string($db,$_POST['pass']); 
      $contact = mysqli_real_escape_string($db,$_POST['contact']);
      $dob = mysqli_real_escape_string($db,$_POST['dob']);
      

      
      $sql = "UPDATE admin SET password = '$password'  WHERE usn = '$usn' and contact = '$contact' ";
      if(mysqli_query($db, $sql))
    {
      header("Location:../login.php");
    }
    else
    {
    	echo"error";
    }
             
        
     }
   exit;
?>