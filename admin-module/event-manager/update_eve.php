<?php


session_start();
if(!isset($_SESSION["admin_id"]))
{
   header("location: ../../admin-module/login/login.php");
}
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html>  
 <head>  
  <title>EAA | Event Manager</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <html xmlns="http://www.w3.org/1999/xhtml">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
 </head>

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
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
    <!-- <tr>  
            <td width="30%"><label>Name</label></td>  
            <td width="70%"><input type="text" value='.$row["name"].' name="update_name" class="form-control" disabled></td>  
        </tr>
        <tr>  
            <td width="30%"><label>Department</label></td>  
            <td width="70%"><input type="text" value='.$row["dept"].' name="update_dept" class="form-control" ></td> 
           
        </tr>
        <tr>  
            <td width="30%"><label>Total Participent</label></td>  
            <td width="70%"><input type="text" value='.$row["no_part"].' name="update_no_part" class="form-control" ></td> 
            
        </tr>
        <tr>  
            <td width="30%"><label>Entry Fees</label></td>  
            <td width="70%"><input type="text" value='.$row["fee"].' name="update_fee" class="form-control" ></td> 
            
        </tr>
        <tr>  
            <td width="30%"><label>Description</label></td>  
            <td width="70%"><input type="text" value='.$row["des"].' name="update_des" class="form-control" ></td> 
            
        </tr>
        <tr>  
            <td width="30%"><label>Category</label></td>
            <td width="70%"><input type="text" value='.$row["cat"].' name="update_cat" class="form-control" ></td>   
            
        </tr>
        <tr>  
            <td width="30%"><label>Prize</label></td> 
            <td width="70%"><input type="text" value='.$row["prize"].' name="update_prize" class="form-control" ></td>  
            
        </tr>-->

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
        <? $name='.$row["prize"].'?>
        <tr><td></td></tr>
       
     ';


    }
    $output .= '</table></div>';
    echo $output;
}
?>



<script src="jquery-1.12-0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="bootbox.min.js"></script>


 </body>  
</html>  
