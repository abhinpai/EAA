<?php


session_start();
if(!isset($_SESSION["admin_id"]))
{
   header("location: ../../admin-module/login/login.php");
}
?>
<?php
//insert.php  
$connect = mysqli_connect("localhost", "root", "", "event");
if(!empty($_POST))
{
 $output = '';
    $name = mysqli_real_escape_string($connect, $_POST["name"]);  
    $dept = mysqli_real_escape_string($connect, $_POST["dept"]);  
    $fee = mysqli_real_escape_string($connect, $_POST["fee"]);  
    $part = mysqli_real_escape_string($connect, $_POST["part"]); 
    $des = mysqli_real_escape_string($connect, $_POST["des"]);
    $cat = mysqli_real_escape_string($connect, $_POST["cat"]);
    $prize = mysqli_real_escape_string($connect, $_POST["prize"]);

    
    $query = "
    INSERT INTO event_details(name, dept, fee, no_part, des, cat, prize)  
     VALUES('$name', '$dept', '$fee', '$part', '$des', '$cat', '$prize')
    ";
    if(mysqli_query($connect, $query))
    {
     $output .= '<label class="text-success">Data Inserted</label>';
     $select_query = "SELECT * FROM event_details";
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <table class="table table-bordered">  
                    <tr>  
                         <th width="20%">Employee Name</th>  
                          <th width="20%">Department</th>  
                          <th width="20%">Category</th> 
                         <th width="40%">View</th> 
                    </tr>

     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>  
                         <td>' . $row["name"] . '</td> 
                         <td>' . $row["dept"] . '</td> 
                         <td>' . $row["cat"] . '</td> 
                         <td ><input type="button" name="view" value="view" id="' . $row["name"] . '" class="btn btn-info btn-xs view_data" /></td>  
                    </tr>
      ';
     }
     $output .= '</table>';
    }
    echo $output;
}
?>