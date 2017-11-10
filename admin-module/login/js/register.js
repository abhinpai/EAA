function validForm() {
	var first_name = document.getElementById("first_name").value;
	var last_name = document.getElementById("last_name").value;
	var usn = document.getElementById("usn").value;
	var college = document.getElementById("college").value;
	var dept = document.getElementById("dept").value;
	var ph_no = document.getElementById("ph_no").value;
	var email = document.getElementById("email").value;
	if (first_name == '' || last_name == '' || usn == '' || college == '' ||dept == '') {
		alert("Complete all the required fields");
	} else {
		var first_name1 = document.getElementById("first_result");
		var last_name1 = document.getElementById("last_result");
		var usn1 = document.getElementById("usn_result");
		var college1 = document.getElementById("college_result");
		var email1 = document.getElementById("email_result");
		var dept1 = document.getElementById("dept_result");
		var ph_no1 = document.getElementById("ph_result");
		if (first_name1.innerHTML == 'First name is too short' || last_name1.innerHTML == 'Last name is too short' || first_name1.innerHTML == 'Invalid' || last_name1.innerHTML == 'Invalid' || email1.innerHTML == 'Invalid email' || ph_no1.innerHTML == 'Contact no must be 10 digit') {
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