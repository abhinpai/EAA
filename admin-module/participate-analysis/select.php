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
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
  .filterable {
    margin-top: 15px;
}
.filterable .panel-heading .pull-right {
    margin-top: -20px;
}
.filterable .filters input[disabled] {
    background-color: transparent;
    border: none;
    cursor: auto;
    box-shadow: none;
    padding: 0;
    height: auto;
}
.filterable .filters input[disabled]::-webkit-input-placeholder {
    color: #333;
}
.filterable .filters input[disabled]::-moz-placeholder {
    color: #333;
}
.filterable .filters input[disabled]:-ms-input-placeholder {
    color: #333;
}
.jumbotron { 
    background-color: #f4511e; /* Orange */
    color: #ffffff;
}

</style>
    </head> 


 <body> 

 <div class="jumbotron text-center">
        <div class="logo" align='center' >
          <img src="img/logo3.png" alt="" width="15%" />
        </div>
        <h1 class="home-slide-content" align='center'> Participent<strong> Analysis</strong>  </h1>
   </div>

<?php  
//select.php  
if(isset($_POST["id"]))
{
 $output = '';
 $connect = mysqli_connect("localhost", "root", "", "event");
 $query = "SELECT * FROM register WHERE id = '".$_POST["id"]."'";
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
            <td width="30%"><label>College</label></td>  
            <td width="70%">'.$row["college"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Department</label></td>  
            <td width="70%">'.$row["dept"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Contact No</label></td>  
            <td width="70%">'.$row["ph_no"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Email Id</label></td>  
            <td width="70%">'.$row["email"].'</td>  
        </tr>
                <tr>  
            <td width="30%"><label>Event</label></td>  
            <td width="70%">'.$row["event"].'</td>  
        </tr>
       
       
     ';
    }
}
   
    
    $output .= '</table></div>';
    echo $output;

?>
</body>
</html>
