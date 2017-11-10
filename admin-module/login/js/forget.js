function validForm() {
	var usn = document.getElementById("usn").value;
	var dob = document.getElementById("dob").value;
	var contact = document.getElementById("contact").value;
	var pass = document.getElementById("pass").value;
	var cpass = document.getElementById("cpass").value;
	
	if (usn == '' || dob == '' || contact == '' || pass == '' || cpass == '') {
		alert("Complete all the required fields");
	} else {
		var usn1 = document.getElementById("usn_result");
		var dob1 = document.getElementById("dob_result");
		var contact1 = document.getElementById("contact_result");
		var pass1 = document.getElementById("pass_result");
		var cpass1 = document.getElementById("cpass_result");
		
		if (usn1.innerHTML == 'USN is not valid' || dob1.innerHTML == 'Invalid date of birth' || contact1.innerHTML == 'Invalid' || pass1.innerHTML == 'Invalid' || cpass1.innerHTML == 'password mismatch' ) {
			alert("Complete valid information");
		} 
		elseif(pass!=cpass)
		{
			alert("password mismatch");
		}
		else {
			document.getElementById("regForm").submit();
		}
	}
}

function validate(field, value) {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else { 
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
			document.getElementById(field).innerHTML = "Validating..";
		} else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById(field).innerHTML = xmlhttp.responseText;
		} else {
			document.getElementById(field).innerHTML = "Error Occurred. <a href='forget.php'>Reload Or Try Again</a> the page.";
		}
	}
	xmlhttp.open("GET", "forgetVal.php?field=" + field + "&value=" + value, true);
	xmlhttp.send();
}