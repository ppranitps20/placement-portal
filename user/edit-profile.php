<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if(empty($_SESSION['id_user'])) {
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
                  <li class="active"><a href="edit-profile.php"><span class="ion-edit step-size-32"></span> Edit Profile</a></li>
                  <li><a href="index.php"><span class="ion-document-text step-size-32"></span> My Applications</a></li>
                  <li><a href="../jobs.php"><span class="ion-ios-briefcase step-size-32s"></span> Jobs</a></li>
                  <li><a href="settings.php"><span class="ion-gear-a step-size-32"></span> Settings</a></li>
                  <li><a href="../logout.php"><span class="ion-android-exit step-size-32"></span> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <h3><i>Edit Profile</i></h3>
            <form action="update-profile.php" method="post" enctype="multipart/form-data">
            <?php
            //Sql to get logged in user details.
            $sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
            $result = $conn->query($sql);

            //If user exists then show his details.
            if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
            ?>
              <div class="row">
                <div class="col-md-6 latest-job ">
                  <div class="form-group">
                    <h4>First Name: </h4>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control input-lg" id="fname" name="fname" placeholder="First Name" value="<?php echo $row['firstname']; ?>" required="">
                  </div><div class="form-group">
                    <h4>Last Name: </h4>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control input-lg" id="lname" name="lname" placeholder="Last Name" value="<?php echo $row['lastname']; ?>" required="">
                  </div>
                  <div class="form-group">
                    <h4>E-Mail Address: </h4>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control input-lg" id="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <h4>Address: </h4>
                  </div>
                  <div class="form-group">
                    <textarea id="address" name="address" class="form-control input-lg" rows="5" placeholder="Address"><?php echo $row['address']; ?></textarea>
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
                  
                  <div class="form-group about">
                    <button type="submit" class="btn btn-flat btn-lg">Update Profile</button>
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
                    <h4>Highest Qualification: </h4>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control input-lg" id="qualification" name="qualification" placeholder="Highest Qualification" value="<?php echo $row['qualification']; ?>">
                  </div>
                  <div class="form-group">
                    <h4>Stream: </h4>
                  </div>
                  <div class="form-group">\
                    <input type="text" class="form-control input-lg" id="stream" name="stream" placeholder="stream" value="<?php echo $row['stream']; ?>">
                  </div>
                  <div class="form-group">
                    <h4>Skills: </h4>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control input-lg" rows="4" name="skills"><?php echo $row['skills']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <h4>Brief Info About You: </h4>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control input-lg" rows="4" name="aboutme"><?php echo $row['aboutme']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <h4>Upload/Change Resume</h4>
                  </div>
                  <div class="form-group about">
                    <input type="file" name="resume" class="btn btn-lg">
                  </div>
                </div>
              </div>
              <?php
                }
              }
            ?>   
            </form>
            <?php if(isset($_SESSION['uploadError'])) { ?>
            <div class="row">
              <div class="col-md-12 text-center">
                <?php echo $_SESSION['uploadError']; ?>
              </div>
            </div>
            <?php } ?>
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
