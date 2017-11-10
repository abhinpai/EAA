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
    $name = mysqli_real_escape_string($connect, $_POST["update_name"]);  
    $usn = mysqli_real_escape_string($connect, $_POST["update_usn"]);  
    $contact = mysqli_real_escape_string($connect, $_POST["update_contact"]);  
    $email = mysqli_real_escape_string($connect, $_POST["update_email"]); 
    $dept = mysqli_real_escape_string($connect, $_POST["update_dept"]);
   // $cat = mysqli_real_escape_string($connect, $_POST["cat"]);
    $event = mysqli_real_escape_string($connect, $_POST["update_event"]);
   
    // Updaste User details
   /* $query = "UPDATE event_details SET name = '$name', dept = '$dept', fee = '$fee',, part = '$part', des = '$des', prize = '$prize'  WHERE name = '$name'";*/

     $query = "UPDATE coordinator SET  usn = '$usn', contact = '$contact', email='$email', dept='$dept', event='$event' WHERE name = '$name'";
      $result = mysqli_query($connect, $query);
      if(mysqli_query($connect, $query))
    {
    // $output .= '<label class="text-success">Data Updated</label>';
     $select_query = "SELECT * FROM coordinator";
     $result = mysqli_query($connect, $select_query);
     $output .= '
     <table class="table table-bordered">  
                    <tr>  
                         <th width="10%">Name</th>
                           <th width="20%">USN</th>  
                           <th width="20%">Contact No</th> 
                           <th width="15%">Event</th>
                           <th width="30%">Options</th>
                    </tr>

     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>  
                         <td align="center">' . $row["name"] . '</td> 
                         <td align="center">' . $row["usn"] . '</td> 
                         <td align="center">' . $row["contact"] . '</td> 
                         <td align="center">' . $row["event"] . '</td> 
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