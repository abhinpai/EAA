

<?php
require_once 'mailer/class.phpmailer.php'; 
// creates object
$mail = new PHPMailer(true); 
if(isset($_POST['btn_send']))
{
$name = strip_tags($_POST["name"]);
$email = strip_tags($_POST['email']);
$subject = "Contact Form ".$name;
$text_message = "Hello"; 
$message = ("<font size='3' face='verdana' ><strong>Hello <font color='blue'>Patron</font></strong></font><br/><br/>
	<strong>This mail is from <strong>".$name."</strong><br/><br/>". strip_tags($_POST['message']));
try
{
$mail->IsSMTP(); 
$mail->isHTML(true);
$mail->SMTPDebug = 0; 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = "ssl"; 
$mail->Host = "smtp.gmail.com"; 
$mail->Port = '465'; 
$mail->AddAddress("dev.abhinpai@gmail.com");
$mail->Username ="dev.abhinpai@gmail.com"; 
$mail->Password ="Arjun@1996"; 
$mail->SetFrom($email,$name);
$mail->AddReplyTo($email,$email);
$mail->Subject = $subject;
$mail->Body = $message;
$mail->AltBody = $message;
if($mail->Send())
{
$_SESSION['name']=$_POST['name'];
$_SESSION['email']=$_POST['email'];
 
}
}
catch(phpmailerException $ex)
{
$msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
}
}
header('Location: index.html'); 
?>


