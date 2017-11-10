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
    $usn = mysqli_real_escape_string($connect, $_POST["usn"]);  
    $contact = mysqli_real_escape_string($connect, $_POST["contact"]);  
    $email = mysqli_real_escape_string($connect, $_POST["email"]); 
    $dept = mysqli_real_escape_string($connect, $_POST["dept"]);
    $cat = mysqli_real_escape_string($connect, $_POST["cat"]);
    $event = mysqli_real_escape_string($connect, $_POST["event"]);

    
    $query = "
    INSERT INTO coordinator(name, contact, email, dept, event_cat, event, usn)  
     VALUES('$name', '$contact', '$email', '$dept', '$cat', '$event', '$usn')
    ";
    if(mysqli_query($connect, $query))
    {
     $output .= '<label class="text-success">Data Inserted</label>';
     $select_query = "SELECT * FROM coordinator";
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <table class="table table-bordered">  
                    <tr>  
                         <th width="15%">Name</th>
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
                         <td>' . $row["name"] . '</td> 
                         <td>' . $row["usn"] . '</td> 
                         <td>' . $row["contact"] . '</td> 
                         <td>' . $row["event"] . '</td> 
                         <td ><input type="button" name="view" value="view" id="' . $row["name"] . '" class="btn btn-info btn-xs view_data" /></td>
                          
                    </tr>
      ';
     }
     $output .= '</table>';
    }
    echo $output;
}
?>