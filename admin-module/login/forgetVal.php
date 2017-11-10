<?php
$val = $_GET['value'];
$field = $_GET['field'];


if($field == "usn_result"){
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

if($field == "contact_result"){
	
	if(!preg_match("/^\d*(?:\.\d{1,2})?$/", $val))
	{
		echo 'Invalid';
	}
	elseif(strlen($val) < 10){
		echo 'Invalid Contact no';
	}
	elseif(strlen($val)>10) {
	# code...
	echo 'Invalid Contact no';
}
	else{
		echo '<label class = "text-success">Valid</label>';
	}
}

if ($field == "password_result") {
	if (strlen($val) < 4) {
		echo 'Password too short';
	} 
	elseif (strlen($val>10)) {
		echo "Password is too long";
		# code...
	}
	else {
		echo '<label class = "text-success">Strong</label>';
	}
}

if ($field == "dob_result") {
	if(!preg_match("/^\d{4}-\d{1,2}-\d{1,2}$/", $val))
	{
		echo "Invalid DOB";
	}
	else {
		echo '<label class = "text-success">Strong</label>';
	}
}



?>