<?php


session_start();
if(!isset($_SESSION["admin_id"]))
{
   header("location: ../../admin-module/login/login.php");
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>EAA | Admin Index</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="color/default.css" rel="stylesheet">
<link rel="shortcut icon" href="img/favicon.ico">

</head>
<body background="img/bg/slider.jpg"> 

<!-- Main slider area-->

<div id="header-wrapper" class="header-slider">

	<header class="clearfix">
	<div class="logo">
		<img src="img/logo2.png" alt="" width="40%" />
	</div>
	<div class="container">
		<div class="row">
			<div class="span12">
				<div id="main-flexslider" class="flexslider">
					<ul class="slides">
						<li>
						<p class="home-slide-content">
							Event<strong> Activity</strong>  analysis
						</p>
						</li>
						<li>
						<p class="home-slide-content">
							The College <strong>event analysis</strong>
						</p>
						</li>
						<li>
						<p class="home-slide-content">
							the event in <strong>technocolr</strong>
						</p>
						</li>
					</ul>
				</div>
				<!-- end slider -->
			</div>
		</div>
	</div>
	</header>
</div>
<!-- end of Main slider area-->

<!-- section: services -->
<section id="services" class="section orange">
<div class="container">		
	<h4>Services</h4>
	<!-- Four columns -->
	<div class="row">
		<div class="span3 animated-fast flyIn">
			<a href="../event-manager/event_manager.php" class =""><div class="service-box">
				<img src="img/icons/laptop.png" alt="" />
				<h2>Event Manager</h2>
				</a>
			</div>
		</div>
		<div class="span3 animated flyIn">
		<a href="../event_analysis/index.php" class ="">
			<div class="service-box">
				<img src="img/icons/laptop.png" alt="" />
				<h2>Event Analysis</h2>
			</div>
		</div>
		<div class="span3 animated-fast flyIn">
		<a href="../coordinate/co_manager.php" class ="">
			<div class="service-box">
				<img src="img/icons/laptop.png" alt="" />
				<h2>Coordinator Management</h2>
			</div>
		</div>
		<div class="span3 animated-slow flyIn">
		<a href="../participate-analysis/part_analysis.php" class ="">
			<div class="service-box">
				<img src="img/icons/laptop.png" alt="" />
				<h2>Participate Analysis</h2>
			</div>
		</div>
	</div>
</div>
</section>
<!-- end section: services -->


<!-- foorter of the index page-->
<footer>
<div class="container">
	<div class="row">
		<div class="span6 offset3">
			<ul class="social-networks">
				<li><a href="#"><i class="icon-circled icon-bgdark icon-instagram icon-2x"></i></a></li>
				<li><a href="#"><i class="icon-circled icon-bgdark icon-twitter icon-2x"></i></a></li>
				<li><a href="#"><i class="icon-circled icon-bgdark icon-dribbble icon-2x"></i></a></li>
				<li><a href="../logout.php"><i class="icon-circled icon-bgdark icon-2x">L</i></a></li>
				
				
			</ul>
			<p class="copyright">
				
                <div class="credits">
                    <a href="https://bootstrapmade.com/">Event Activity Analysis</a> by Abhin, Manish
                </div>
			</p>
		</div>
	</div>
</div>
<!-- ./container -->
</footer>
<!-- end foorter of the index page-->
<a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>
<script src="js/jquery.js"></script>
<script src="js/jquery.scrollTo.js"></script>
<script src="js/jquery.nav.js"></script>
<script src="js/jquery.localscroll-1.2.7-min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/isotope.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/inview.js"></script>
<script src="js/animate.js"></script>
<script src="js/validate.js"></script>
<script src="js/custom.js"></script>
<script src="contactform/contactform.js"></script>

</body>
</html>