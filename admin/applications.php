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
                <h3 class="box-title">Welcome <b>Admin</b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="dashboard.php"><span class="ion-ios-analytics step-size-32 "></span></i> Dashboard</a></li>
                  <li><a href="active-jobs.php"><span class="ion-briefcase step-size-32"></span> Active Jobs</a></li>
                  <li class="active"><a href="applications.php"><span class="ion-document-text step-size-32 "></span> Applications</a></li>
                  <li><a href="companies.php"><span class="ion-ios-people step-size-32"></span> Companies</a></li>
                  <li><a href="../logout.php"><span class="ion-android-exit step-size-32 "></span>Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">

            <h3>Candidates Database</h3>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th><h4>Candidate</h4></th>
                      <th><h4>Highest Qualification</h4></th>
                      <th><h4>Skills</h4></th>
                      <th><h4>City</h4></th>
                      <th><h4>State</h4></th>
                      <th><h4>Download Resume</h4></th>
                    </thead>
                    <tbody>
                      <?php
                       $sql = "SELECT * FROM users";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0) {
                              while($row = $result->fetch_assoc()) 
                              {     

                                $skills = $row['skills'];
                                $skills = explode(',', $skills);
                      ?>
                      <tr>
                        <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
                        <td><?php echo $row['qualification']; ?></td>
                        <td>
                          <?php
                          foreach ($skills as $value) {
                            echo ' <span class="label label-success">'.$value.'</span>';
                          }
                          ?>
                        </td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['state']; ?></td>
                        <?php if($row['resume'] != '') { ?>
                        <td><a href="../uploads/resume/<?php echo $row['resume']; ?>" download="<?php echo $row['firstname'].' Resume'; ?>"><span class="ion-card"></span></a></td>
                        <?php } else { ?>
                        <td>No Resume Uploaded</td>
                        <?php } ?>
                      </tr>

                      <?php

                        }
                      }
                      ?>
                      
                    </tbody>                    
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    <div class="modal modal-success fade" id="modal-success">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Candidate Profile</h4>
          </div>
          <div class="modal-body">
              <h3><b>Applied On</b></h3>
              <p>24/04/2017</p>
              <br>
              <h3><b>Email</b></h3>
              <p>test@test.com</p>
              <br>
              <h3><b>Phone</b></h3>
              <p>44907512447</p>
              <br>
              <h3><b>Website</b></h3>
              <p>learningfromscratch.online</p>
              <br>
              <h3><b>Application Message</b></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    

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
            
        </div>

	</footer>
	<!-- /Footer -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery Plugins -->
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="../js/jquery.magnific-popup.js"></script>
  <script type="text/javascript" src="../js/main.js"><!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>

<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>
</body>
</html>
