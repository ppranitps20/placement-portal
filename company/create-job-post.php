<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
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

  <script src="../js/tinymce/tinymce.min.js"></script>

  <script>tinymce.init({ selector:'#description', height: 300 });</script>

  </head>
<body>
        
<!-- Nav -->
		<nav id="nav" class="navbar navbar-expand-sm bg-light">
        
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

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="index.php"><span class="ion-ios-analytics step-size-32 "></span> Dashboard</a></li>
                  <li><a href="edit-company.php"><span class="ion-edit step-size-32 "></span>  My Company</a></li>
                  <li class="active"><a href="create-job-post.php"><span class="ion-plus-round step-size-32 "></span>  Create Job Post</a></li>
                  <li><a href="my-job-post.php"><span class="ion-person step-size-32 "></span>  My Job Post</a></li>
                  <li><a href="job-applications.php"><span class="ion-ios-briefcase step-size-32 "></span> Job Application</a></li>
                  <li><a href="settings.php"><span class="ion-gear-a step-size-32 "></span> Settings</a></li>
                  <li><a href="resume-database.php"><span class="ion-document-text step-size-32 "></span> Resume Database</a></li>
                  <li><a href="../logout.php"><span class="ion-android-exit step-size-32 "></span> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <h2><i>Create Job Post</i></h2>
            <div class="row">
              <form method="post" action="addpost.php">
                <div class="col-md-12 latest-job ">
                  	<div class="form-group">
                      <h4>Job Title</h4>
                    </div>
                  <div class="form-group">
                    <input class="form-control input-lg" type="text" id="jobtitle" name="jobtitle" placeholder="Job Title">
                  </div>
                  <div class="form-group">
                      <h4>Job Description</h4>
                    </div>
                  <div class="form-group">
                    <textarea class="form-control input-lg" id="description" name="description" placeholder="Job Description"></textarea>
                  </div>
                  <div class="form-group">
                      <h4>Minimum Salary</h4>
                    </div>
                  <div class="form-group">
                    <input type="number" class="form-control  input-lg" id="minimumsalary" min="1000" autocomplete="off" name="minimumsalary" placeholder="Minimum Salary" required="">
                  </div>
                  <div class="form-group">
                      <h4>Maximum Salary</h4>
                    </div>
                  <div class="form-group">
                    <input type="number" class="form-control  input-lg" id="maximumsalary" name="maximumsalary" placeholder="Maximum Salary" required="">
                  </div>
                  <div class="form-group">
                      <h4>Experience</h4>
                    </div>
                  <div class="form-group">
                <input type="number" class="form-control  input-lg" id="experience" autocomplete="off" name="experience" placeholder="Experience (in Years) Required" required="">
                  </div>
                  <div class="form-group">
                      <h4>Qualification</h4>
                    </div>
                  <div class="form-group">
                    <input type="text" class="form-control  input-lg" id="qualification" name="qualification" placeholder="Qualification Required" required="">
                  </div>
                  <div class="form-group about">
                    <button type="submit" class="btn btn-flat btn-lg">Create</button>
                  </div>
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
    </section>

    

  </div>
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
  <script type="text/javascript" src="../js/main.js"><!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>
