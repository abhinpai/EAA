<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>EAA | Register</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets_register/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets_register/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets_register/css/form-elements.css">
        <link rel="stylesheet" href="assets_register/css/style.css">

       

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="img/icons/favicon.png" sizes="32x32">
        <script src="js/ajax.js"></script>
       

    </head>

    <body background="img/1.jpg">

		
<div class="logo" align='center' >
    
  </div>
        <!-- Top content -->
        <div class="top-content">
            <div class="container" >
                <img src="assets_register/img/logo2.png" alt="" width="15%" />
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1>Hello Patron, Please <strong>Register</strong> as <strong>Admin</strong></h1>
                        
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                    	<form role="form" action="db/register_admin.php" method="post" class="f1" id = "regForm">

                    		<h3>Register To Our Event</h3>
                    		
                    		<div class="f1-steps">
                    			<div class="f1-progress">
                    			    <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                    			</div>
                    			<div class="f1-step active">
                    				<div class="f1-step-icon"><i class="fa fa-user"></i></div>
                    				<p>about</p>
                    			</div>
                    			<div class="f1-step">
                    				<div class="f1-step-icon"><i class="glyphicon glyphicon-phone"></i></div>
                    				<p>contact</p>
                    			</div>
                    		    <div class="f1-step">
                    				<div class="f1-step-icon"><i class="glyphicon glyphicon-"></i></div>
                    				<p>About to finish</p>
                    			</div>
                    		</div>
                    		
                    		<fieldset>
                    		    <h4>Tell us who you are:</h4>
                    			<div class="form-group">
                    			    <label class="sr-only" for="f1-first-name">Name</label>
                                    <input type="text" name="name" placeholder="Admin name..." class="first_name form-control" id="name" 
                                     onblur="validate('name_result', this.value)">
                                     <center><div id='name_result' class  = "text-danger"></div><center>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-last-name">usn</label>
                                    <input type="text" name="usn" placeholder="User serial no..." class="last_name form-control" id="usn" 
                                     onblur="validate('usn_result', this.value)">
                                     <center><div id='usn_result' class  = "text-danger"></div><center>
                                </div>
                               
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <h4>Tell something more:</h4>
                                <div class="form-group">
                                    <label class="sr-only" for="usn">Contact</label>
                                    <input type="text" name="contact" placeholder="Contact No..." class="usn form-control" id="contact"
                                     onblur="validate('contact_result', this.value)">
                                     <center><div id='contact_result' class  = "text-danger"></div><center>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-name">DOB</label>
                                    <input type="text" name="dob" placeholder="YYYY-MM-DD..." class="college form-control" id="dob" 
                                     onblur="validate('dob_result', this.value)">
                                     <center><div id='dob_result' class  = "text-danger"></div><center>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-repeat-password">Mail</label>
                                    <input type="text" name="mail" placeholder="Email Id..."  class="dept form-control" id="mail" 
                                    onblur="validate('email_result', this.value)">
                                    <center><div id='email_result' class  = "text-danger"></div><center>
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <h4>Passcode details:</h4>
                               <div class="form-group">
                                    <label class="sr-only" for="usn">Password</label>
                                    <input type="Password" name="pass" placeholder="Enetr Password..." class="usn form-control" id="password" 
                                    onblur="validate('pass_result', this.value)">
                                    <center><div id='pass_result' class  = "text-danger"></div><center>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-email">Confirm Password</label>
                                    <input type="Password" name="cpass" placeholder="Confirm Password..." class="mail form-control" id="cpass" 
                                    onblur="validate('cpass_result', this.value)">
                                    <center><div id='cpass_result' class  = "text-danger"></div><center>
                                </div>
                                
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="submit" class="btn btn-submit">Submit</button>
                                </div>
                            </fieldset>
                    	
                    	</form>
                    </div>
                </div>
                    
            </div>
        </div>


        <!-- Javascript -->
        <script src="assets_register/js/jquery-1.11.1.min.js"></script>
        <script src="assets_register/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets_register/js/jquery.backstretch.min.js"></script>
        <script src="assets_register/js/retina-1.1.0.min.js"></script>
        <script src="assets_register/js/scripts.js"></script>

        <script type="text/javascript">
    $(function () {
        $("#submit").click(function () {
            var password = $("#pass").val();
            var confirmPassword = $("#cpass").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>
        
        <!--[if lt IE 10]>
            <script src="assets_register/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>