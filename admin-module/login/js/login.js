function validForm() {
	var usn = document.getElementById("usn").value;
	var password = document.getElementById("pass").value;
	if (name == '' || password == '' ) {
		alert("Complete all the required fields");
	} else {
		var usn1 = document.getElementById("usn_result");
		var password1 = document.getElementById("password_result");
		
		if (usn.innerHTML == 'Must be 10 letters' || password1.innerHTML == 'Password too short' ) {
			alert("Complete valid information");
		} else {
			document.getElementById("login").submit();
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
			document.getElementById(field).innerHTML = "Error Occurred. <a href='login.php'>Reload Or Try Again</a> the page.";
		}
	}
	xmlhttp.open("GET", "validation.php?field=" + field + "&value=" + value, true);
	xmlhttp.send();
}