<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event";


$connect = mysqli_connect("localhost", "root", "", "event");
if (!$connect) {
die("Connection failed: " . mysqli_connect_error());
}
else{
    echo "Connected \n";
}

if(!empty($_GET))
{
    $name = $_GET["name"];  
    $usn = $_GET["usn"]; 
    $email =$_GET["email"];
    $contact = $_GET["contact"]; 
    $college = $_GET["college"];  
    $dept = $_GET["dept"];  
    $event = $_GET["event"]; 
    $cat = $_GET["cat"]; 
    $otp = $_GET['otp'];
    $hid_otp = $_GET['hid_otp'];
}

    /*$select_query = "
    INSERT INTO register (id, name, usn, college, dept, ph_no, email, event, cat) VALUES ('14', 'TEST', '1TEST', 'RVCE', 'TESTDEPT', '54782154', 'test1@mail.com', 'technical-event1', 'Techinical')";*/

    if(!strcmp($otp,$hid_otp))
    {
    $hashed_otp = hash('sha512', $_GET['otp']);
       $query2 = "
        INSERT INTO otp(name,email,phone,enc_otp,acc_time) VALUES('$name','$email','$contact','1234',now())";
    }

    $check_query = "
    SELECT usn from register where usn= '$usn'";

    $select_query = "
    INSERT INTO register(name, usn, college, dept, ph_no, email, event, cat)  
     VALUES('$name', '$usn', '$college', '$dept', '$contact', '$email', '$event', '$cat')";


          if(mysqli_query($connect, $select_query)){
        echo $name," | ",$usn," | ", $college," | ", $dept," | ", $contact," | ", $email," | ", $event," | ", $cat," | ", $otp," | ", $hid_otp;
        echo"success";
        
        $_SESSION['name']=$name;
        $_SESSION['usn']=$usn;
        $_SESSION['college']=$college;
        $_SESSION['event']=$event;
        $_SESSION['cat']=$cat;
        
        

        header("Location: ../payment/test.php");
    }
   

    
    
?>
