<?php
session_start();

require_once 'mailer/class.phpmailer.php'; 

$mail = new PHPMailer(true); 


$subject = "Event Ticket";
$text_message = "Hello"; 
$rndno=rand(1000, 9999);


$email=$_SESSION['email'];
$name= $_SESSION['name'];
$usn= $_SESSION['usn'];
$college= $_SESSION['college'];
$event= $_SESSION['event'];
$cat= $_SESSION['cat'];
$today = date("d/m/Y, h:i:sa");

$message = ("<html><body style='margin: 0; padding: 0;''>
	<table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
	 <tr>
	 	 <td align='center' bgcolor='#70bbd9' style='padding: 40px 0 30px 0;''>
		 <p style='font-size: 50px; margin-top: -30px;'> <strong style='margin-left: 10px; color: #ffffff; font-family: Arial; font-style: initial; ' > Event </strong> Activity Analysis</p>
		 <p style='margin-top: -45px; font-family: arial'>Conducted by R V College of Engineering</p>
		  </td>
	 </tr>
	 <tr>
	  <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
		 <table border='0' cellpadding='0' cellspacing='0' width='100%''>
		  <tr>
		   <td>
			   <h3 style='margin-top: -5px;'>Event Activity Analysis
			   <span style='margin-left: 200px; font-weight: 100; '>".$today ."</span></h3>
		   	<h4 style='font-family: arial;'> Hello ".$name.", Team EAA Welcomes you</h4>
		   </td>
		  </tr>
		  <tr>
		   <td >
		   	<p style='font-weight: bold; color: blue; font-family: arial;'> Registration No: <font color='#787171' >".$rndno."</font></p>
		    <p> Hello ".$name.", your university registration no is ".$usn.".
		    	Thank you for participating in ".$event." (".$cat."),	
		    	Please note your registration no <b>".$rndno."</b> </p> 
		   </td>
		  </tr>
		  <tr>
		   <td>
		  <p style='font-weight: bold; color: red; font-family: arial;'> Note:</p>
		  <ul>
		  	<li>Please do not forgot to attend your event</li>
		  	<li>Please show the mail while attendig event</li>
		  	<li>Do not exploit event rule, If you caught cheting during event you will be put into blacklist</li>
		  </ul>
		   </td>
		  </tr>
		 </table>
	</td>
	 </tr>
	 <tr>
	  <td bgcolor='#ee4c50' style='padding: 30px 30px 30px 30px; font-family: arial;' align='center'> 
		    Team Event Activity Analysis <br/>
		    R V College of Engineering<br/>
		    Developed by <b> Abhin Pai and Manish BV</b>	
		
		</td>
	 </tr>
	</table>
</body>
</html>");
try
{
$mail->IsSMTP(); 
$mail->isHTML(true);
$mail->SMTPDebug = 0; 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = "ssl"; 
$mail->Host = "smtp.gmail.com"; 
$mail->Port = '465'; 
$mail->AddAddress($email);
$mail->Username ="dev.abhinpai@gmail.com"; 
$mail->Password ="Arjun@1996"; 
$mail->SetFrom('dev.abhinpai@gmail.com','Abhin Pai');
$mail->AddReplyTo("dev.abhinpai@gmail.com","Abhin Pai");
$mail->Subject = $subject;
$mail->Body = $message;
$mail->AltBody = $message;
if($mail->Send())
{

$_SESSION['rndno']=$rndno;
echo $_SESSION['name'];
echo $_SESSION['usn'];
echo $_SESSION['college'];
echo $_SESSION['event'];
echo $_SESSION['cat'];
echo $_SESSION['rndno'];


$encoded = str_rot13($rndno);

header( "Location: ../index/index.html"); 
}
}
catch(phpmailerException $ex)
{
$msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
}

?>