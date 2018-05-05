<?php 

session_start();

if(isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) { 
  header("Location: index.php");
  exit();
}

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
        
<!-- Nav -->
		<nav id="nav" class="navbar navbar-expand-sm bg-light">
        
        <div class="container">

				<div class="navbar-header">
				<a class="navbar-brand " href="index.php"><b>Placement </b><br/>Portal
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
					<?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
          <li>
            <a href="login.php">Login</a>
          </li>
          <li>
            <a href="sign-up.php">Sign Up</a>
          </li>  
          <?php } else { 

            if(isset($_SESSION['id_user'])) { 
          ?>        
          <li>
            <a href="user/index.php">Dashboard</a>
          </li>
          <?php
          } else if(isset($_SESSION['id_company'])) { 
          ?>        
          <li>
            <a href="company/index.php">Dashboard</a>
          </li>
          <?php } ?>
          <li>
            <a href="logout.php">Logout</a>
          </li>
          <?php } ?>
				</ul>
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->
  

  <!-- About -->
	<div id="signin" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">Sign In</h2>
				</div>
				<!-- /Section header -->

				<!-- about -->
				<div class="col-md-6">
					<div class="about">
						<a href="login-candidates.php"/>
                        <h3>Candidate Login</h3>
                        </a>
					</div>
				</div>
				<!-- /about -->

				<!-- about -->
				<div class="col-md-6">
					<div class="about">
						<a href="login-company.php">
						<h3>Company Login</h3>
                        </a>
					</div>
				</div>
				<!-- /about -->
			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
    <!-- /About -->

</header>
  <!-- /.content-wrapper -->

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
