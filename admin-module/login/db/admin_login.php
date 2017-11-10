<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $usn = mysqli_real_escape_string($db,$_POST['usn']);
      $password = mysqli_real_escape_string($db,$_POST['pass']); 
      
      $sql = "SELECT admin_id FROM admin WHERE usn = '$usn' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
        
      if($count == 1) {
        
         $_SESSION["admin_id"]=$row["admin_id"];
         $_SESSION["name"]=$row["name"];
         $_SESSION["usn"]=$row["usn"];
         $_SESSION["dob"]=$row["dob"];
         $_SESSION["contact"]=$row["contact"];
         $_SESSION["mail"]=$row["mail"];
         header("location: ../../index/index.php");
      }else {
        
         header("location: ../login.php?e=1");
      }
   }
?>
