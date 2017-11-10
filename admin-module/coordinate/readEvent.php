<?php


session_start();
if(!isset($_SESSION["admin_id"]))
{
   header("location: ../../admin-module/login/login.php");
}
?>

<?php  
//select.php  
if(isset($_POST["co_name"]))
{
 $output = '';
  $response = array();
 $connect = mysqli_connect("localhost", "root", "", "event");
 $query = "SELECT * FROM coordinator WHERE name = '".$_POST["co_name"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered table-striped">';
    while($row = mysqli_fetch_array($result))
    {
         $response = $row;
    }

     echo json_encode($response);
}
   
    
  

?>
