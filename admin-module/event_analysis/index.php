<?php


session_start();
if(!isset($_SESSION["admin_id"]))
{
   header("location: ../../admin-module/login/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Meetup is a free responsive single page bootstrap template by designerdada.com">
  <meta name="author" content="Akash Bhadange">
      <script src="jquery-1.12-0.min.js"></script>
    <script src="canvasjs.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            $.getJSON("config.php", function (result) {

                var chart = new CanvasJS.Chart("chartContainer", {
                    data: [
                        {
                            dataPoints: result
                        }
                    ] 
                });

                chart.render();
            });
        });

        
       
    </script>
  <title>EAA | Analysis</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/themify-icons.css" rel="stylesheet">
  <link href='css/dosis-font.css' rel='stylesheet' type='text/css'>
  
  <style type="text/css">
  .filterable {
    margin-top: 15px;
}
.filterable .panel-heading .pull-right {
    margin-top: -20px;
}
.filterable .filters input[disabled] {
    background-color: transparent;
    border: none;
    cursor: auto;
    box-shadow: none;
    padding: 0;
    height: auto;
}
.filterable .filters input[disabled]::-webkit-input-placeholder {
    color: #333;
}
.filterable .filters input[disabled]::-moz-placeholder {
    color: #333;
}
.filterable .filters input[disabled]:-ms-input-placeholder {
    color: #333;
}
.jumbotron { 
    background-color: #f4511e; /* Orange */
    color: #ffffff;
}
p.serif {
    font-family:  'Hoefler Text', Georgia, 'Times New Roman', serif;
 font-weight: normal;
        font-size: 5em;
 letter-spacing: .1em;
 line-height: 0.9em;
 margin:5px;
 text-align: center;
 text-transform: uppercase;
}


</style>

    </head>
    <body id="page-top" data-spy="scroll" data-target=".side-menu">
      <nav class="side-menu">
        <ul>
          <li class="hidden active">
            <a class="page-scroll" href="#page-top"></a>
          </li>
          <li>
            <a href="#home" class="page-scroll">
              <span class="menu-title">Home</span>
              <span class="dot"></span>
            </a>
          </li>
          <li>
            <a href="#event" class="page-scroll">
              <span class="menu-title">Number of Event</span>
              <span class="dot"></span>
            </a>
          </li>
          <li>
            <a href="#graph" class="page-scroll">
              <span class="menu-title">Event Graph</span>
              <span class="dot"></span>
            </a>
          </li>
          
        </ul>
      </nav>
      <div class="container-fluid">
        <!-- Start: Header -->
         <div class="jumbotron text-center">
        <div class="logo" align='center' >
          <img src="img/logo3.png" alt="" width="15%" />
        </div>
        <h1 class="home-slide-content" align='center'> Participent<strong> Analysis</strong>  </h1>
   </div>
        <!-- End: Header -->
      </div>
      <div class="container">
        
         
        <?php 
               
                $con = mysqli_connect("localhost","root","","event");

                // Check connection
                if (mysqli_connect_errno($con))
                {
                    echo "Failed to connect to DataBase: " . mysqli_connect_error();
                }             
        ?>

        <!-- Start: Event -->
        <div class="row me-row content-ct speaker" id="event">
          <h2 class="row-title">Events</h2>
          <div class="col-md-4 col-sm-6 feature">
            <img src="img/tech.png" class="speaker-img">
            <h3>Techinical</h3>
            <p class="serif">
              <?php  $result = mysqli_query($con, "SELECT COALESCE(count(cat), 0) as total FROM register WHERE cat = 'Technical'");
              
              while($row = mysqli_fetch_array($result))
              {         
                 echo $row['total'];                      
              }
              ?>

            </p>
			
          </div>
		  
          <div class="col-md-4 col-sm-6 feature">
            <img src="img/culture.png" class="speaker-img">
            <h3>Cultular</h3>
            <p class="serif">
              <?php  $result = mysqli_query($con, "SELECT COALESCE(count(cat), 0) as total FROM register WHERE cat = 'Cultural'");
              
              while($row = mysqli_fetch_array($result))
              {         
                 echo $row['total'];                      
              }
              ?>

            </p>
            
          </div>
		  
          <div class="col-md-4 col-sm-6 feature">
            <img src="img/ent.png" class="speaker-img">
            <h3>Entertainment</h3>
            <p class="serif">
              <?php  $result = mysqli_query($con, "SELECT COALESCE(count(cat), 0) as total FROM register WHERE cat = 'Entertainment'");
              
              while($row = mysqli_fetch_array($result))
              {         
                 echo $row['total'];                      
              }
              ?>

            </p>
          </div>
		  
         
		  
          <div class="col-md-4 col-sm-6 feature">
            <img src="img/game.png" class="speaker-img">
            <h3>Gamming</h3>
			
            <p class="serif">
              <?php  $result = mysqli_query($con, "SELECT COALESCE(count(cat), 0) as total FROM register WHERE cat = 'Gamming'");
              
              while($row = mysqli_fetch_array($result))
              {         
                 echo $row['total'];                      
              }
              ?>

            </p>
          </div>

           <div class="col-md-4 col-sm-6 feature">
            <img src="img/Photo.png" class="speaker-img">
            <h3>Photography</h3>
            <p class="serif">
              <?php  $result = mysqli_query($con, "SELECT COALESCE(count(cat), 0) as total FROM register WHERE cat = 'Photography'");
              
              while($row = mysqli_fetch_array($result))
              {         
                 echo $row['total'];                      
              }
              ?>

            </p>
          </div>
		  
          <div class="col-md-4 col-sm-6 feature">
            <img src="img/man.png" class="speaker-img">
            <h3>Management</h3>
            <p class="serif">
              <?php  $result = mysqli_query($con, "SELECT COALESCE(count(cat), 0) as total FROM register WHERE cat = 'Management'");
              
              while($row = mysqli_fetch_array($result))
              {         
                 echo $row['total'];                      
              }
              ?>

            </p>
          </div>
        </div>
        <!-- End: Event -->
      </div>

      <!-- Start: Graph -->
      <!--<div class="container-fluid tickets" id="graph">
        <div class="row me-row content-ct">
          <h2 class="row-title">Pictorial Representation</h2>
		  
          <div class="col-md-4 col-sm-6 col-md-offset-2">
            <h3>Early Bird Ticket</h3>
            <p class="price">$399</p>
            <p>All days entry pass for all the events.</p>
            <a href="#" class="btn btn-lg btn-red">Buy <small>(6 remaining)</small></a>
          </div>
		  
          <div class="col-md-4 col-sm-6">
            <h3>Workshop Pass</h3>
            <p class="price">$199</p>
            <p>Entry pass for each workshop</p>
            <a href="#" class="btn btn-lg btn-red">Buy <small>(42 remaining)</small></a>
          </div>
		  
        </div>
      </div>-->
      <div class="container-fluid tickets" id="graph">
        </br>
        <center>
        <h1>Pictorail Analysis</h1>
        <div id="chartContainer" style="width: 800px; height: 380px;"></div></center></br></br>
      <!-- End: Graph -->
      </div>
     

      

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="js/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.easing.min.js"></script>
      <script src="js/scrolling-nav.js"></script>
      <script src="js/validator.js"></script>

      <!-- Google Analytics -->
      <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();
        a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;
        a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-29231762-2', 'auto');
      ga('send', 'pageview');
      </script>
    </body>
    </html>