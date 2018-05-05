<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Online Placement And Training Solution</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="css/magnific-popup.css" />

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  
	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

       
</head>
<body>

	<!-- Header -->
	<header id="home">
		<!-- Background Image -->
		<div class="bg-img" style="background-image: url('./img/job-search.jpg');">
			<div class="overlay"></div>
		</div>
		<!-- /Background Image -->

		
		
    <!-- Nav -->
		<nav id="nav" class="navbar nav-transparent">
			<div class="container">

				<div class="navbar-header">
				<a class="navbar-brand " href="#"><b>Placement </b><br/>Portal
				</a>
					<!-- Collapse nav button -->
					<div class="nav-collapse">
						<span></span>
					</div>
					<!-- /Collapse nav button -->
				</div>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="jobs.php">Jobs</a></li>
					<li><a href="#candidates">Candidates</a></li>
					<li><a href="#company">Company </a></li>
                    <li><a href="#statistics">About us</a></li>
                    <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="sign-up.php">Sign Up</a></li>  
                    <?php } else { 
                        if(isset($_SESSION['id_user'])) { 
                    ?>        
                    <li><a href="user/index.php">Dashboard</a></li>
                    <?php
                    } else if(isset($_SESSION['id_company'])) { 
                    ?>        
                    <li><a href="company/index.php">Dashboard</a></li>
                    <?php } ?>
                    <li><a href="logout.php">Logout</a></li>
                    <?php } ?>
				</ul>
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->
        <!-- home wrapper -->
		<div class="home-wrapper">
			<div class="container">
				<div class="row">

					<!-- home content -->
					<div class="col-md-10 col-md-offset-1">
						<div class="home-content">
							<h1 class="white-text">Online Placement And Training Solution</h1>
							<p class="white-text"> We provide a platform for the Students And the Recruiters <br>to find their desired jobs/candidates.
							</p>
						</div>
					</div>
					<!-- /home content -->

				</div>
			</div>
		</div>
		<!-- /home wrapper -->
    </header>
	<!-- /Header -->

 
    <!-- About -->
	<div id="candidates" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">Candidates</h2>
				</div>
				<!-- /Section header -->

				<!-- about -->
				<div class="col-md-4">
					<div class="about">
						
						<h3>Browse Jobs</h3>
						<p>Browse through thousands of jobs from all the leading companies and find the right one for you.</p>
					</div>
				</div>
				<!-- /about -->

				<!-- about -->
				<div class="col-md-4">
					<div class="about">
						
						<h3>Apply For A Interview</h3>
						<p>Apply for your desired job <br/>and get interviewed for the job that you deserve.</p>

					</div>
				</div>
				<!-- /about -->

				<!-- about -->
				<div class="col-md-4">
					<div class="about">
						
						<h3>Boost Your Career</h3>
						<p>Build your career now by signing up<br/> and browsing through thousands of job suitable for you.</p>

					</div>
				</div>
				<!-- /about -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
    <!-- /About -->
    
        <!-- About -->
	<div id="company" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">Companies</h2>
				</div>
				<!-- /Section header -->

				<!-- about -->
				<div class="col-md-4">
					<div class="about">
						
						<h3>Post A Job</h3>
						<p>Register your company for free and post job openings instantly/ </p>
					</div>
				</div>
				<!-- /about -->

				<!-- about -->
				<div class="col-md-4">
					<div class="about">
						
						<h3>Manage & Track</h3>
						<p>Browse for applications from a talented pool of thousands and find the best candidates for you.</p>

					</div>
				</div>
				<!-- /about -->

				<!-- about -->
				<div class="col-md-4">
					<div class="about">
						
						<h3>Hire</h3>
						<p>Hire candidates best suited for you with their info readily available to you.</p>

					</div>
				</div>
				<!-- /about -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
    <!-- /About -->
    
   <!-- Statistics -->
	<div id="statistics" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">Statistics</h2>
					<p>This is our Capstone Project to facilitate placements online.</p>

				</div>
				<!-- /Section header -->

                <!-- about -->
				<div class="col-md-4">
					<div class="about">
					 <?php
                      $sql = "SELECT * FROM users WHERE active='1'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
              <h3><?php echo $totalno; ?></h3>

              <p>Daily Users</p>
              <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
					</div>
				</div>
				<!-- /about -->

                <!-- about -->
				<div class="col-md-4">
					<div class="about">
						
					<?php
                      $sql = "SELECT * FROM job_post";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <h3><?php echo $totalno; ?></h3>

                    <p>Job Offers</p>
                    <div class="icon">
              <i class="ion ion-ios-paper"></i>
            </div>
                </div>
				</div>
				<!-- /about -->

				<!-- about -->
				<div class="col-md-4">
					<div class="about">
						
						<?php
                      $sql = "SELECT * FROM company WHERE active='1'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
              <h3><?php echo $totalno; ?></h3>

              <p>Registered Company</p>
              <div class="icon">
                <i class="ion ion-briefcase"></i>
            </div>
					</div>
				</div>
				<!-- /about -->
      </div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Statistics -->

	<!-- Footer -->
	<footer id="footer" class="sm-padding bg-dark">
        
      <!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<div class="col-md-12">

					<div class="footer-copyright">
                        <p>Online Placement And Training Solution<br/>A Capstone Project</p>
					</div>
					
				</div>

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->
            
        </div>

	</footer>
	<!-- /Footer -->

	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->



	<!-- jQuery Plugins -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

</body>
</html>
