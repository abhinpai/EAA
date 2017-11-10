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
if ($field == "password_result") {
	if (strlen($val) < 6) {
		echo 'Password too short';
	elseif (strlen($val)>15) {
		# code...
		echo "Too long password";
	}

	} else {
		echo '<label class = "text-success">Valid</label>';
	}
}

?>