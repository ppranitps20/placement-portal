<?php

session_start();

if(empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}

require_once("../db.php");
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
	<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="../css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="../css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="../css/magnific-popup.css" />

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  
	

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="../css/style.css" />
    

       
</head>
<body>

        <header class ="main-header">
<!-- Nav -->
		<nav id="nav" class="navbar navbar-expand-sm bg-light">
        
        <div class="container">

				<div class="navbar-header">
				<a class="navbar-brand " href="../index.php"><b>Placement </b><br/>Portal
				</a>
					<!-- Collapse nav button -->
					<div class="nav-collapse">
						<span></span>
					</div>
					<!-- /Collapse nav button -->
				</div>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="../jobs.php">Jobs</a></li>
					<?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
          <li>
            <a href="../login.php">Login</a>
          </li>
          <li>
            <a href="../sign-up.php">Sign Up</a>
          </li>  
          <?php } else { 

            if(isset($_SESSION['id_user'])) { 
          ?>        
          <li>
            <a href="../user/index.php">Dashboard</a>
          </li>
          <?php
          } else if(isset($_SESSION['id_company'])) { 
          ?>        
          <li>
            <a href="../company/index.php">Dashboard</a>
          </li>
          <?php } ?>
          <li>
            <a href="../logout.php">Logout</a>
          </li>
          <?php } ?>
				</ul>
				<!-- /Main navigation -->

            </div>
		</nav>
		<!-- /Nav --> 

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper" style="margin-left: 0px;">
    <!-- About -->
	<div  class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Welcome <b>Admin</b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href="dashboard.php"><span class="ion-ios-analytics step-size-32 "></span> Dashboard</a></li>
                  <li><a href="active-jobs.php"><span class="ion-briefcase step-size-32"></span> Active Jobs</a></li>
                  <li><a href="applications.php"><span class="ion-document-text step-size-32 "></span> Applications</a></li>
                  <li><a href="companies.php"><span class="ion-ios-people step-size-32"></span> Companies</a></li>
                  <li><a href="../logout.php"><span class="ion-android-exit step-size-32 "></span> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">

            <h3>Placement Portal Statistics</h3>
              <div class="col-md-6">
                <div class="about">
                  <i class="ion ion-briefcase"></i>
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
                    <h3>Active Company Registered</h3>
                </div>             
              </div>
              <div class="col-md-6">
                <div class="about">
                  <i class="ion ion-briefcase"></i>
                    <?php
                      $sql = "SELECT * FROM company WHERE active='2'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <h3><?php echo $totalno; ?></h3>

                    <h3>Pending Company Approval</h3>
                    
                  </div>
                </div>   
             <div class="col-md-6">
                <div class="about">
                  <i class="ion ion-person-stalker"></i>
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
                    <h3>Registered Candidates</h3>
                  </div>
                </div>
              <div class="col-md-6">
                <div class="about">
                  <i class="ion ion-person-stalker"></i>
                    <?php
                      $sql = "SELECT * FROM users WHERE active='0'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <h3><?php echo $totalno; ?></h3>
                    <h3>Pending Candidates Confirmation</h3>
                  </div>
                </div>
              
              <div class="col-md-6">
                <div class="about">
                  <i class="ion ion-person-add"></i>
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
                  
                    <h3>Total Job Posts</h3>
                  </div>
              </div>
              <div class="col-md-6">
                 <div class="about">
                   <i class="ion ion-ios-browsers"></i>
                  
                    
                    <?php
                      $sql = "SELECT * FROM apply_job_post";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <h3><?php echo $totalno; ?></h3>
                    <h3>Total Applications</h3>
                  </div>
                </div>
              </div>
            </div>
       </div>
    </div>
</div>
    </header>header>
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
        

	</footer>
	<!-- /Footer -->

	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->



	<!-- jQuery Plugins -->
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="../js/jquery.magnific-popup.js"></script>
  <script type="text/javascript" src="../js/main.js">
      <!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
      
</body>
</html>
