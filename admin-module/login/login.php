<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>EAA | Admin Login </title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <!--<script src="js/login.js"></script>-->

       

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="img/icons/favicon.png" sizes="32x32">
       

    </head>

    <body>

		
<div class="logo" align='center' >
    
  </div>
        <!-- Top content -->
        <div class="top-content">
            <div class="container" >
                <img src="assets_register/img/logo2.png" alt="" width="15%" />
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1>Welcome to<strong>EAA</strong> Admin Login </h1>
                       
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                    	<form role="form" action="db/admin_login.php" method="post" class="f1" id="login">

                    		<h3>Please fill the valid credential</h3>
                    		                   	              			
                    		
                    		<fieldset>
                    		    </br>
                    			<div class="form-group">
                    			    <label class="sr-only" for="f1-first-name">First name</label>
                                    <input type="text" name="usn" placeholder="User serial no..." class="usn form-control" id="usn" required="required" onblur="validate('usn_result', this.value)">
                                    <center><div id='usn_result' class  = "text-danger"></div><center>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-last-name">Last name</label>
                                    <input type="Password" name="pass" placeholder="Password..." class="psss form-control" id="pass" required="required" onblur="validate('password_result', this.value)">
                                    <center><div id='password_result' class  = "text-danger"></div><center>
                                </div>
                                <div>
                                    <?php
                                        if(isset($_GET["e"]))
                                        echo("<center><span style='color:#FF0000;'>WRONG CREDENTIALS</span></center></br>");
                                    ?>
                                </div>
                               
                                <div class="f1-buttons">
                                     <button type="reset" class="btn btn-previous">Cancel</button>
                                    <button type="submit" class="btn btn-submit">Submit</button>
                                </div>
                            </fieldset>
                            </br></br>

                            <a href="forget.php" >Forgot Password?</a></br></br>
                            <a href="register.php" >Not register yet? Get your account !!</a>
                                               	
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
        
        <!--[if lt IE 10]>
            <script src="assets_register/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>