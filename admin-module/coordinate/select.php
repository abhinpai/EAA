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
 $connect = mysqli_connect("localhost", "root", "", "event");
 $query = "SELECT * FROM coordinator WHERE name = '".$_POST["co_name"]."'";
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
            <td width="30%"><label>USN</label></td>  
            <td width="70%">'.$row["usn"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Contact No</label></td>  
            <td width="70%">'.$row["contact"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Email Id</label></td>  
            <td width="70%">'.$row["email"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Department</label></td>  
            <td width="70%">'.$row["dept"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Category</label></td>  
            <td width="70%">'.$row["event_cat"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Event Name</label></td>  
            <td width="70%">'.$row["event"].'</td>  
        </tr>
       
     ';
    }
}
   
    
    $output .= '</table></div>';
    echo $output;

?>
