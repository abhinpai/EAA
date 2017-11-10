<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event";



$connect = mysqli_connect("localhost", "root", "", "$dbname");
if(!empty($_POST))
{
 $output = '';
    $name = mysqli_real_escape_string($connect, $_POST["name"]);  
    $usn = mysqli_real_escape_string($connect, $_POST["usn"]);
    
    $contact = mysqli_real_escape_string($connect, $_POST["contact"]);  
    $dob = mysqli_real_escape_string($connect, $_POST["dob"]);  
    $mail = mysqli_real_escape_string($connect, $_POST["mail"]);  
    $pass = mysqli_real_escape_string($connect, $_POST["pass"]);  
   
   
   // echo $name, $usn, $college, $dept, $ph_no, $email;

    $query = "
    INSERT INTO admin(usn, password, dob, name, contact, mail)  
     VALUES('$usn', '$pass', '$dob', '$name', '$contact', '$mail')
    ";

   /* $query = "
    INSERT INTO register(name,	usn,	college,	dept,	ph_no,	email)  
     VALUES('abhi', 'pai', 'rv', 'cs', '888', 'a@gmail.com')
    ";*/
    if(mysqli_query($connect, $query))
    {
    	echo"success";
        header("Location:../login.php");

    }
    else {
        echo "Error";
        # code...
    }

    
 }

 
 
?>
