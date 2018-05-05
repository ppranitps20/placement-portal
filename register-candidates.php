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
  <title>Online Placement And Training Solution</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
	<link type="text/css" rel="stylesheet" href="css/style.css" /><!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="css/custom.css">


  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>

        
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
					<li>
            <a href="jobs.php">Jobs</a>
          </li>
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
   

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section class="content-header">
      <div class="container">
        <div class="row latest-job margin-top-50 margin-bottom-20 bg-white">
          <h2 class="text-center margin-bottom-20 margin-top-20">Create Your Profile</h2>
          <form method="post" id="registerCandidates" action="adduser.php" enctype="multipart/form-data">
            <div class="col-md-6 latest-job ">
            <div class="form-group">
                <h4>First Name: </h4>
                </div>
            <div class="form-group">
                <input class="form-control input-lg" type="text" id="fname" name="fname" placeholder="First Name *" required>
              </div> 
              <div class="form-group">
                <h4>Last Name: </h4>
                </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="lname" name="lname" placeholder="Last Name *" required>
              </div>
              <div class="form-group">
                <h4>E-Mail Address: </h4>
                </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="email" name="email" placeholder="Email *" required>
              </div>
              <div class="form-group">
                <h4>Brief Intro About Yourself: </h4>
                </div>
              <div class="form-group">
                <textarea class="form-control input-lg" rows="4" id="aboutme" name="aboutme" placeholder="Brief intro about yourself *" required></textarea>
              </div>
              <div class="form-group">
                <h4>Date Of Birth: </h4>
                </div>
              <div class="form-group">
                <input class="form-control input-lg" type="date" id="dob" min="1960-01-01" max="1999-01-31" name="dob" placeholder="Date Of Birth">
              </div>
              <div class="form-group">
                <h4>Age: </h4>
                </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="age" name="age" placeholder="Age" readonly>
              </div>
              <div class="form-group">
                <h4>Passing Year: </h4>
                </div>
              <div class="form-group">
                <input class="form-control input-lg" type="date" id="passingyear" name="passingyear" placeholder="Passing Year">
              </div>
              <div class="form-group">
                <h4>Qualification: </h4>
                </div>       
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="qualification" name="qualification" placeholder="Highest Qualification">
              </div>
              <div class="form-group">
                <h4>Stream: </h4>
                </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="stream" name="stream" placeholder="Stream">
              </div>                  
              <div class="form-group checkbox">
                <label><input type="checkbox"> I accept terms & conditions</label>
              </div>
              
              
              <div class="form-group  col-md-12">
                <button class="btn btn-flat btn-lg ">Register</button>
              </div>
              <?php 
              //If User already registered with this email then show error message.
              if(isset($_SESSION['registerError'])) {
                ?>
                <div class="form-group">
                  <label style="color: red;">Email Already Exists! Choose A Different Email!</label>
                </div>
              <?php
               unset($_SESSION['registerError']); }
              ?> 

              <?php if(isset($_SESSION['uploadError'])) { ?>
              <div class="form-group">
                  <label style="color: red;"><?php echo $_SESSION['uploadError']; ?></label>
              </div>
              <?php unset($_SESSION['uploadError']); } ?>     

            </div>            
            <div class="col-md-6 latest-job ">
                <div class="form-group">
                <h4>Enter Password: </h4>
                </div>  
              <div class="form-group">
                <input class="form-control input-lg" type="password" id="password" name="password" placeholder="Password *" required>
              </div>
              <div class="form-group">
                <h4>Retype Password: </h4>
                </div>  
              <div class="form-group">
                <input class="form-control input-lg" type="password" id="cpassword" name="cpassword" placeholder="Confirm Password *" required>
              </div>
              <div id="passwordError" class="btn btn-flat btn-danger hide-me" >
                    Password Mismatch!! 
                  </div>
                  <div class="form-group">
                <h4>Contact No: </h4>
                </div>  
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="contactno" name="contactno" minlength="10" maxlength="10" onkeypress="return validatePhone(event);" placeholder="Phone Number">
              </div>
              <div class="form-group">
                <h4>Address: </h4>
                </div>  
              <div class="form-group">
                <textarea class="form-control input-lg" rows="4" id="address" name="address" placeholder="Address"></textarea>
              </div>
              <div class="form-group">
                <h4>City: </h4>
                </div>  
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="city" name="city" placeholder="City">
              </div>
              <div class="form-group">
                <h4>State: </h4>
                </div>  
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="state" name="state" placeholder="State">
              </div>
              <div class="form-group">
                <h4>Skils: </h4>
                </div>  
              <div class="form-group">
                <textarea class="form-control input-lg" rows="4" id="skills" name="skills" placeholder="Enter Skills"></textarea>
              </div>
              <div class="form-group">
                <h4>Designation: </h4>
                </div>                
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="designation" name="designation" placeholder="Designation">
              </div>
            
                <div class="form-group">
                <h4>Upload Your Resume: </h4>
                </div>  
              <div class="form-group">
                <label style="color: #10161A;">File Format PDF Only!</label>
                <input type="file" name="resume" class="btn btn-raised btn-link" required>
              </div>
            </div>
          </form>
          
        </div>
      </div>
    </section>

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

	<!-- jQuery Plugins -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>

<script type="text/javascript">
      function validatePhone(event) {

        //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
        //event.which will return key for mouse events and other events like ctrl alt etc. 
        var key = window.event ? event.keyCode : event.which;

        if(event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
          // 8 means Backspace
          //46 means Delete
          // 37 means left arrow
          // 39 means right arrow
          return true;
        } else if( key < 48 || key > 57 ) {
          // 48-57 is 0-9 numbers on your keyboard.
          return false;
        } else return true;
      }
</script>

<script type="text/javascript">
  $('#dob').on('change', function() {
    var today = new Date();
    var birthDate = new Date($(this).val());
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();

    if(m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
      age--;
    }

    $('#age').val(age);
  });
</script>
<script>
  $("#registerCandidates").on("submit", function(e) {
    e.preventDefault();
    if( $('#password').val() != $('#cpassword').val() ) {
      $('#passwordError').show();
    } else {
      $(this).unbind('submit').submit();
    }
  });
</script>
</body>
</html>
