<!DOCTYPE html>
<html>
<head>

 <link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.css" />
    <script data-require="jquery@*" data-semver="2.1.4" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script data-require="sweet-alert@*" data-semver="0.4.2" src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <script src="script.js"></script>

	<style type="text/css">
		@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-font-smoothing: antialiased;
  -o-font-smoothing: antialiased;
  font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

body {
  font-family: "Roboto", Helvetica, Arial, sans-serif;
  font-weight: 100;
  font-size: 12px;
  line-height: 30px;
  color: #777;
  background: #4CAF50;
}

.container {
  max-width: 700px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea,
#contact button[type="submit"] {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
  background: #F9F9F9;
  padding: 25px;
  margin: 70px 0;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#contact h3 {
  display: block;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}

#contact h4 {
  margin: 5px 0 15px;
  display: block;
  font-size: 13px;
  font-weight: 400;
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #FFF;
  margin: 0 0 5px;
  padding: 10px;
}

#contact input[type="text"]:hover,
#contact input[type="email"]:hover,
#contact input[type="tel"]:hover,
#contact input[type="url"]:hover,
#contact textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #aaa;
}

#contact textarea {
  height: 100px;
  max-width: 100%;
  resize: none;
}

#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #4CAF50;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

#contact button[type="submit"]:hover {
  background: #43A047;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}

.copyright {
  text-align: center;
}

#contact input:focus,
#contact textarea:focus {
  outline: 2;
  border: 1px solid #aaa;
}

::-webkit-input-placeholder {
  color: #888;
}

:-moz-placeholder {
  color: #888;
}

::-moz-placeholder {
  color: #888;
}

:-ms-input-placeholder {
  color: #888;
}
	</style>
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
    <h2>One Time Password</h2><br/>

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