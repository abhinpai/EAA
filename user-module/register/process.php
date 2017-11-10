<?php
session_start();

require_once 'mailer/class.phpmailer.php'; 
// creates object
$mail = new PHPMailer(true); 
if(isset($_POST['submit']))
{
$name = strip_tags($_POST["name"]);
$email = strip_tags($_POST['email']);
$usn = strip_tags($_POST['usn']);
$mobileNumber = strip_tags($_POST["contact"]);

$subject = "One Time Password";
$text_message = "Hello"; 
$rndno=rand(1000, 9999);
$message = ("<font face='verdana' size='3'><Strong>Dear <font color='blue'>".$name.",</font></strong> </font> USN ".$usn."<br/><br/>
	<strong> EAA</strong> welcomes you.  <br/><br/>
	The OTP for your registration is <Strong>".$rndno." </Strong><br/><br/>
	  Team Event Activity<br/><br/>
	<strong> Note:</strong>
	Protect yourself from  frauds, never share the details like Internet Banking Password, ATM PIN, OTP, RSA Token, Credit/Debit card details (Card Numbers, Expiry date, CVV) on Phone / e-Mail / SMS with others. EAA and its employees will not ask for this information.");
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

$_SESSION['name']=$_POST['name'];
$_SESSION['usn']=$_POST['usn'];
$_SESSION['email']=$_POST['email'];
$_SESSION['contact']=$_POST['contact'];
$_SESSION['college']=$_POST['college'];
$_SESSION['dept']=$_POST['dept'];
$_SESSION['event']=$_POST['event'];
$_SESSION['cat']=$_POST['cat'];
$_SESSION['otp']=$rndno;

$encoded = str_rot13($rndno);
//echo $rndno;
header( "Location: otp.php?rndno=".$encoded); 
}
}
catch(phpmailerException $ex)
{
$msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
}
} 
?>