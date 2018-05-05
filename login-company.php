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
	<link type="text/css" rel="stylesheet" href="css/style.css" />
<!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/blue.css">

  
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
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Placement</b> Portal</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Company Login</p>

    <form method="post" action="checkcompanylogin.php">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="ion-android-mail step-size-32 form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="ion-key step-size-32 form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <a href="#">I forgot my password</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
        <?php 
              //If Company have successfully registered then show them this success message
              //Todo: Remove Success Message without reload?
              if(isset($_SESSION['registerCompleted'])) {
                ?>
                <div>
                  <p class="text-center">You Have Registered Successfully! Your Account Approval Is Pending By Admin</p>
                </div>
              <?php
               unset($_SESSION['registerCompleted']); }
              ?>   
              <?php 
              //If Company Failed To log in then show error message.
              if(isset($_SESSION['loginError'])) {
                ?>
                <div>
                  <p class="text-center">Invalid Email/Password! Try Again!</p>
                </div>
              <?php
               unset($_SESSION['loginError']); }
              ?>   
              <?php 
              if(isset($_SESSION['companyLoginError'])) {
                ?>
                <div>
                  <p class="text-center"><?php echo $_SESSION['companyLoginError'] ?></p>
                </div>
              <?php
               unset($_SESSION['companyLoginError']); }
              ?>  
          </div>          
      </div>
    </form>

    <br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

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
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
<!-- iCheck -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
