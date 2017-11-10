<?php


session_start();
if(!isset($_SESSION["admin_id"]))
{
   header("location: ../../admin-module/login/login.php");
}
?>
<?php
// include Database connection file
 $connect = mysqli_connect("localhost", "root", "", "event");
// check request
if(!empty($_POST))
{
    // get values
   $name = mysqli_real_escape_string($connect, $_POST["update_name"]);  
    $dept = mysqli_real_escape_string($connect, $_POST["update_dept"]);  
    $fee = mysqli_real_escape_string($connect, $_POST["update_fee"]);  
    $part = mysqli_real_escape_string($connect, $_POST["update_part"]); 
    $des = mysqli_real_escape_string($connect, $_POST["update_des"]);
    
    $prize = mysqli_real_escape_string($connect, $_POST["update_prize"]);

    $des = mysqli_real_escape_string($connect, $_POST["update_des"]);
   
    // Updaste User details
   /* $query = "UPDATE event_details SET name = '$name', dept = '$dept', fee = '$fee',, part = '$part', des = '$des', prize = '$prize'  WHERE name = '$name'";*/

     $query = "UPDATE event_details SET name = '$name', dept = '$dept', fee = '$fee'  WHERE name = '$name'";
      $result = mysqli_query($connect, $query);

}
?>