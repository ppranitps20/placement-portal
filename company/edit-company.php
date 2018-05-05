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
    

       
</head>
<body>

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
                  <li class="active"><a href="edit-company.php"><span class="ion-edit step-size-32 "></span>  My Company</a></li>
                  <li><a href="create-job-post.php"><span class="ion-plus-round step-size-32 "></span>  Create Job Post</a></li>
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
            <h3><i>My Company</i></h3>
            <p>In this section you can change your company details.</p>
            <div class="row">
              <form action="update-company.php" method="post" enctype="multipart/form-data">
                <?php
                $sql = "SELECT * FROM company WHERE id_company='$_SESSION[id_company]'";
                $result = $conn->query($sql);

                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-6 latest-job ">
                  <div class="form-group">
                    <h4>Company Name: </h4>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control input-lg" name="companyname" value="<?php echo $row['companyname']; ?>" required="">
                  </div>
                  <div class="form-group">
                    <h4>Company Website: </h4>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control input-lg" name="website" value="<?php echo $row['website']; ?>" required="">
                  </div>
                  <div class="form-group">
                    <h4>Company E-Mail Address: </h4>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control input-lg" id="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <h4>Company Info: </h4>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control input-lg" rows="4" name="aboutme"><?php echo $row['aboutme']; ?></textarea>
                  </div>
                  <div class="form-group about">
                    <button type="submit" class="btn btn-flat btn-lg">Update Company Profile</button>
                  </div>
                </div>
                <div class="col-md-6 latest-job ">
                <div class="form-group">
                    <h4>Contact No.: </h4>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control input-lg" id="contactno" name="contactno" placeholder="Contact Number" value="<?php echo $row['contactno']; ?>">
                  </div>
                  <div class="form-group">
                    <h4>City: </h4>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control input-lg" id="city" name="city" value="<?php echo $row['city']; ?>" placeholder="city">
                  </div>
                  <div class="form-group">
                    <h4>State: </h4>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control input-lg" id="state" name="state" placeholder="state" value="<?php echo $row['state']; ?>">
                  </div>
                  <div class="form-group">
                    <h4>Company Logo: </h4>
                  </div>
                  <div class="form-group">
                    <div class="about">
                    <input type="file" name="image" class="btn btn-flat btn-lg">
                    <?php if($row['logo'] != "") { ?></div>
                    <br/><h4>Current Logo: </h4>

                    <img src="../uploads/logo/<?php echo $row['logo']; ?>" class="img-responsive" style="max-height: 200px; max-width: 200px;">
                    <?php } ?>
                  </div>
                </div>
                    <?php
                    }
                  }
                ?>  
              </form>
            </div>
            <?php if(isset($_SESSION['uploadError'])) { ?>
            <div class="row">
              <div class="col-md-12 text-center">
                <?php echo $_SESSION['uploadError']; ?>
              </div>
            </div>
            <?php unset($_SESSION['uploadError']); } ?>
            
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
  <script type="text/javascript" src="../js/main.js">
  <!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>
