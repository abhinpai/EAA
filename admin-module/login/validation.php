<?php
$val = $_GET['value'];
$field = $_GET['field'];

if ($field == "name_result") {
	if (strlen($val) < 2) {
		echo 'Name is too short';
	} 
	elseif (strlen($val)>8) {
		echo "Name is too long";
		# code...
	}
	else {
		echo '<label class = "text-success">Valid</label>';
	}
}
if ($field == "pass_result") {
	if (strlen($val) < 5) {
		echo 'Password too short';
	} 
	elseif (strlen($val)>10) {
		# code...
		echo "Password is too long";
	}
	else {
		echo '<label class = "text-success">Strong</label>';
	}
}

if($field == "usn_result")
{
	if(strlen($val) < 10  ){
		echo 'Too short USN';
	}
	elseif (strlen($val)>10) {
		echo "Too long USN";
	}
	elseif(!preg_match("/^[a-z\d_]{10,10}$/i", $val))
	{
		echo 'Invalid USN';
	}
	
	else{
		echo '<label class = "text-success">Valid</label>';
	}
}

if($field == "contact_result")
{
	if(strlen($val) < 10  ){
		echo 'Contact no is less then 10 digit';
	}
	elseif (strlen($val)>10) {
		echo "Contact no is more then 10 digit";
	}
		
	
	else{
		echo '<label class = "text-success">Valid</label>';
	}
}



if ($field == "email_result") {
	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $val)) {
		echo 'Invalid email';
	} else {
		echo '<label class = "text-success">Valid</label>';
	}
}

if ($field == "dob_result") {

	
	if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $val)) {
		echo 'Invalid date of birth';
	} else {
		echo '<label class = "text-success">Valid</label>';
	}
}

?>