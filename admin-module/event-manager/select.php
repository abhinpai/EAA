<?php


session_start();
if(!isset($_SESSION["admin_id"]))
{
   header("location: ../../admin-module/login/login.php");
}
?>

<?php  
//select.php  
if(isset($_POST["eve_name"]))
{
 $output = '';
 $connect = mysqli_connect("localhost", "root", "", "event");
 $query = "SELECT * FROM event_details WHERE name = '".$_POST["eve_name"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered table-striped">';
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
     <tr>  
            <td width="30%"><label>Name</label></td>  
            <td width="70%">'.$row["name"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Department</label></td>  
            <td width="70%">'.$row["dept"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Total Participent</label></td>  
            <td width="70%">'.$row["no_part"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Entry Fees</label></td>  
            <td width="70%">'.$row["fee"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Description</label></td>  
            <td width="70%">'.$row["des"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Category</label></td>  
            <td width="70%">'.$row["cat"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Prize</label></td>  
            <td width="70%">'.$row["prize"].'</td>  
        </tr>
       
     ';
    }
}
   
    
    $output .= '</table></div>';
    echo $output;

?>
