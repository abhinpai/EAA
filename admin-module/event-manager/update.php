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
   $output = '';
   //$id=mysqli_real_escape_string($connect,$_POST["hidden_user_id"]);
   $name = mysqli_real_escape_string($connect, $_POST["update_name"]);  
    $dept = mysqli_real_escape_string($connect, $_POST["update_dept"]);  
    $fee = mysqli_real_escape_string($connect, $_POST["update_fee"]);  
    $part = mysqli_real_escape_string($connect, $_POST["update_part"]); 
    $des = mysqli_real_escape_string($connect, $_POST["update_des"]);
    
    $prize = mysqli_real_escape_string($connect, $_POST["update_prize"]);

    $des = mysqli_real_escape_string($connect, $_POST["update_des"]);
   
    // Updaste User details
   /* $query = "UPDATE event_details SET name = '$name', dept = '$dept', fee = '$fee',, part = '$part', des = '$des', prize = '$prize'  WHERE name = '$name'";*/

     $query = "UPDATE event_details SET name = '$name', dept = '$dept', fee = '$fee', des='$des', prize='$prize' WHERE name = '$name'";
      $result = mysqli_query($connect, $query);
      if(mysqli_query($connect, $query))
    {
    // $output .= '<label class="text-success">Data Updated</label>';
     $select_query = "SELECT * FROM event_details";
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <table class="table table-bordered table-striped">  
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
                         <td align="center">' . $row["name"] . '</td> 
                         <td align="center">' . $row["dept"] . '</td> 
                         <td align="center">' . $row["cat"] . '</td> 
                         <td align="center">
                         <input type="button" name="view" value="view" id="' . $row["name"] . '" class="btn btn-primary btn-xs view_data" />
                         <input type="button" name="update" value="Update" id="' . $row["name"] . '" class="btn btn-success btn-xs update_data" />
                        <a class="delete_product" data-id="' . $row["name"] . '" href="javascript:void(0)">
                         <input type="button" name="delete" value="Delete" id="' . $row["name"] . '" class="btn btn-danger btn-xs delete_data " /></td>  
                    </tr>
      ';
     }
     $output .= '</table>';
    }
    echo $output;

}
?>