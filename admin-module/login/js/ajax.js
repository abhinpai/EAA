function validForm() {
	var name = document.getElementById("name").value;
	var pass = document.getElementById("pass").value;
	var cpass = document.getElementById("cpass").value;
	var usn = document.getElementById("usn").value;
	var contact = document.getElementById("contact").value;
	var email = document.getElementById("mail").value;
	var dob = document.getElementById("dob").value;
	if (name == '' || pass == '' || cpass == '' || usn == '' ||email == '' ||dob == '') {
		alert("Complete all the required fields");
	} else {
		var name1 = document.getElementById("name_result");
		var pass1 = document.getElementById("pass_result");
		var cpass1 = document.getElementById("cpass_result");
		var usn1 = document.getElementById("usn_result");
		var contact1 = document.getElementById("contact_result");
		var email1 = document.getElementById("email_result");
		var dob1 = document.getElementById("dob_result");
		if (name1.innerHTML == 'Must be valid' || pass1.innerHTML == 'Password too short' || cpass1.innerHTML == 'Password too short' || usn.innerHTML == 'Invalid' || email1.innerHTML == 'Invalid email' || dob1.innerHTML == 'Invalid date of birth') {
			alert("Complete valid information");
		} else {
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
			document.getElementById(field).innerHTML = "Error Occurred. <a href='register.php'>Reload Or Try Again</a> the page.";
		}
	}
	xmlhttp.open("GET", "validation.php?field=" + field + "&value=" + value, true);
	xmlhttp.send();
}