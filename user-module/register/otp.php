<!DOCTYPE html>
<html>
<head>
<link href="css/style.css" rel="stylesheet">
 <link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.css" />
    <script data-require="jquery@*" data-semver="2.1.4" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script data-require="sweet-alert@*" data-semver="0.4.2" src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <script src="script.js"></script>

	<title>EAA | Register</title>
</head>
<body>


<?php
    session_start();
    if(!empty($_SESSION))
    {
        $name = $_SESSION["name"];  
        $usn = $_SESSION["usn"]; 
        $email =$_SESSION["email"];
        $contact = $_SESSION["contact"]; 
        $college = $_SESSION["college"];  
        $dept = $_SESSION["dept"];  
        $event = $_SESSION["event"]; 
        $cat = $_SESSION["cat"]; 
    }

    if(isset($_GET['rndno']) )
    {
      $rndno=$_GET['rndno'];
      
    }
?>

<div class="container">  
  <form id="contact" action="insert.php" method="get">
    <h3>EVENT ACTIVITY ANALYSIS</h3>
    <h4>One Time Password</h4><br/>

    <!-- Hidden Field Contents --> 
    <input type="hidden" name="name" value='<?php echo "$name"; ?>'> 
    <input type="hidden" name="usn" value='<?php echo "$usn"; ?>'> 
    <input type="hidden" name="college" value='<?php echo "$college"; ?>'> 
    <input type="hidden" name="dept" value='<?php echo "$dept"; ?>'> 
    <input type="hidden" name="contact" value='<?php echo "$contact"; ?>'> 
    <input type="hidden" name="email" value='<?php echo "$email"; ?>'> 
    <input type="hidden" name="event" value='<?php echo "$event"; ?>'> 
    <input type="hidden" name="cat" value='<?php echo "$cat"; ?>'>
    <input type="hidden" name="hid_otp" value="<?= $rndno?>" />
    <fieldset>
      <input placeholder="One Time Password" type="tel" tabindex="1" name="otp" required autofocus>
    </fieldset>
     <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
     <h5> <font color="red"> Note :</font> Please do not share one time passwrod or any credential with any one </h5>
          
  </form>
</div>


<script type="text/javascript"></script>
</body>
</html>