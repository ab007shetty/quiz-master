<?php session_start(); ?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="assets/img/logo.png" />
    <title>Online Quiz Management System</title>

  <!--     Fonts and icons     -->
  
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
	integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	
	<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css "/>
	
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />

 
  <link rel="stylesheet" href="assets/css/creativetim.min.css" type="text/css">
  

  <script type="text/javascript" src="https://cdn.weglot.com/weglot.min.js"></script>
<script>
    Weglot.initialize({
        api_key: 'wg_b315629468470fd1230c5a1bec6c00575'
    });
</script>

</head>



<?php
        if (isset($_POST['login'])) {
            if (isset($_POST['usertype']) && isset($_POST['username']) && isset($_POST['pass'])) {        require_once 'sql.php';
                $conn = mysqli_connect($host, $user, $ps, $project);if (!$conn) {
                    echo "<script>alert(\"Database error retry after some time !\")</script>";
                }
                $type = mysqli_real_escape_string($conn, $_POST['usertype']);
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $password = mysqli_real_escape_string($conn, $_POST['pass']);
                $password = crypt($password, 'rakeshmariyaplarrakesh');
                $sql = "select * from " . $type . " where mail='{$username}'";
                $res =   mysqli_query($conn, $sql);
                if ($res == true) {
                    global $dbmail, $dbpw;
                    while ($row = mysqli_fetch_array($res)) {
                        $dbpw = $row['pw'];
                        $dbmail = $row['mail'];
                        $_SESSION["name"] = $row['name'];
                        $_SESSION["type"] = $type;
                        $_SESSION["username"] = $dbmail;
                    }
                    if ($dbpw === $password) {
                        if ($type === 'student') {
                            header("location:homestud.php");
                        } elseif ($type === 'staff') {
                            header("Location: homestaff.php");
                        }
                    } elseif ($dbpw !== $password && $dbmail === $username) {
                        echo "<script>alert('password is wrong');</script>";
                    } elseif ($dbpw !== $password && $dbmail !== $username) {
                        echo "<script>alert('username name not found sing up');</script>";
                    }
                }
            }
        }
?>


  <body class="bg-white" id="top">
    <!-- Navbar -->
    <nav
      id="navbar-main"
      class="
        navbar navbar-main navbar-expand-lg
        bg-default
        navbar-light
        position-sticky
        top-0
        shadow
        py-0
      "
    >
      <div class="container">
        <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
          <li class="nav-item dropdown">
            <a href="index.php" class="navbar-brand mr-lg-5 text-white">
                               <img src="assets/img/navbar.png" />
            </a>
          </li>
        </ul>

        <button
          class="navbar-toggler bg-white"
          type="button"
          data-toggle="collapse"
          data-target="#navbar_global"
          aria-controls="navbar_global"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon text-white"></span>
        </button>
        <div class="navbar-collapse collapse bg-default" id="navbar_global">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-10 collapse-brand">
                <a href="index.html">
                  <img src="assets/img/navbar.png" />
                </a>
              </div>
              <div class="col-2 collapse-close bg-danger">
                <button
                  type="button"
                  class="navbar-toggler"
                  data-toggle="collapse"
                  data-target="#navbar_global"
                  aria-controls="navbar_global"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>

          <ul class="navbar-nav align-items-lg-center ml-auto">
		  
		   <li class="nav-item">
              <a href="contact.php" class="nav-link">
                <span class="text-white nav-link-inner--text"
                  ><i class="text-white fas fa-address-card"></i> Contact</span
                >
              </a>
            </li>
		  
		  <li class="nav-item">
              <a href="login.php" class="nav-link">
                <span class="text-white nav-link-inner--text"
                  ><i class="text-white fas fa-sign-in-alt"></i> Login</span
                >
              </a>
            </li>
		  


            <li class="nav-item">
              <a href="signup.php" class="nav-link">
                <span class="text-white nav-link-inner--text"
                  ><i class="text-white fas fa-user-plus"></i> Sign Up</span
                >
              </a>
            </li>

          
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
  
  

<div class="wrapper" >


      <div class="page-header">
          <div class="page-header-image" style="background-image: url('assets/img/home.jpg')"></div>
        <div class="container shape-container d-flex align-items-center py-lg">
          <div class="col px-0">
            <div class="row align-items-center justify-content-center">
              <div class="col-lg-6 text-center">
                <h1 class="text-white display-1">Welcome Back </h1>
                <h2 class="display-4 font-weight-normal text-white">Just Click Below 👇</h2>
                <div class="btn-wrapper mt-4">
                  <a href="#bottom"  data-toggle="modal" data-target="#loginModal" class="btn btn-warning btn-icon mt-3 mb-sm-0">
                    <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                    <span class="btn-inner--text">Login</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
	
	
	
	
	
	<!-- Login Modal -->
	<div id="loginModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg" role="content">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title text-center">Login </h1>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
			          <div class="card-group ">
                    <div class="card bg-dark p-4">
                        <div class="card-body  text-white">
						
						
                            <form method="post" >
							
								
								 <div class="form-group row">
                <label class="col-md-3 col-form-label text-white" >Select User</label>
				  
                <div class="col-3">
                  <label>
                    <input
                      class="form-control"
                      value="student"
                      name="usertype"
                      type="radio"
                      required
					  checked
                    />
                    <span class="text-white">Student</span>
                  </label>
                </div>


                <div class="col-3">
                  <label>
                    <input
                      class="form-control"
                      value="staff"
                      name="usertype"
                      type="radio"
                      required
                    />
                    <span class="text-white">Teacher</span>
                  </label>
                </div>
              </div>


                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input
                    autocomplete="new-password"
                    class="white-text validate form-control"
                    placeholder="Email Address"
                    id="email"
                    name="username"
                    type="email"
                    class="validate"
                  />
                                </div>

                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-asterisk"></i></span>
                                    </div>
                                   <input
                    autocomplete="new-password"
                    class="white-text validate form-control"
                    placeholder="*********"
                    id="password"
                    name="pass"
                    type="password"
                    class="validate"
                  />
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" name="login" value="login"  class="btn btn-success px-4">Login</button>
                                    </div>
                                    <div class="col-6 text-right">

                    <a  href="reset.php" >Forgot Password?</a>


                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card text-white bg-gradient-info py-5">
                        <div class="card-body text-center">
                            <div>
                                <h2>Sign up</h2>
                                <p class="mt-4">Register now, it's free.</p>
                                <a href="signup.php" class="btn btn-warning active mt-3">Register Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
				</div>

			</div>
		</div>
	</div>
	
   
   
   
    <!-- another Login Modal -->

    <div id="" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg" role="content">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Login</h4>
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>
          <div class="modal-body bg-gradient-info">
		  		

				
            <form
              class="col s12 l5 white-text"
              
              method="POST"
              autocomplete="new-password"
            >
             
              <div class="form-group row">
                <label class="col-md-2 col-form-label text-white" >Select User</label>
				  
                <div class="col-3">
                  <label>
                    <input
                      class="form-control"
                      value="student"
                      name="usertype"
                      type="radio"
                      required
					  checked
                    />
                    <span class="text-white">Student</span>
                  </label>
                </div>


                <div class="col-3">
                  <label>
                    <input
                      class="form-control"
                      value="staff"
                      name="usertype"
                      type="radio"
                      required
                    />
                    <span class="text-white">Teacher</span>
                  </label>
                </div>
              </div>



              <div class="form-group row">
                <label class="col-md-2 col-form-label text-white" for="email"
                  >Email</label
                >
                <div class="col-md-10">
                  <input
                    autocomplete="new-password"
                    class="white-text validate form-control"
                    placeholder="Email Address"
                    id="email"
                    name="username"
                    type="email"
                    class="validate"
                  />
                </div>
              </div>
			  
			   <div class="form-group row">
                <label class="col-md-2 col-form-label text-white" for="password"
                  >Password</label
                >
                <div class="col-md-10">
                  <input
                    autocomplete="new-password"
                    class="white-text validate form-control"
                    placeholder="*********"
                    id="password"
                    name="pass"
                    type="password"
                    class="validate"
                  />
                </div>
              </div>



              <div class="form-group row">
                <div class="offset-md-2 col-md-10">
                  <button class="btn btn-success form-control" name="login" value="login" type="submit">
                    Login
                  </button>
                </div>
              </div>
			  
			   <div class="form-group row">
                <div class="offset-md-2 col-md-10">
                 <a href="reset.php">Forgot password?</a> &nbsp; New user! <a href="signup.php">SIGN UP</a>
                </div>
              </div>
			                  

            </form>
          </div>
        </div>
      </div>
    </div>
<!-- ======================================================================================================================================== -->
 <!-- Registration Modal -->

    <div id="signupModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg" role="content">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Register Here</h4>
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>
          <div class="modal-body bg-gradient-info">
            <form
              class="col s12 l5 white-text"
              action="donor.html"
              method="POST"
              autocomplete="new-password"
            >
              <div class="form-group row">
                <label
                  for="firstname"
                  class="col-md-2 col-form-label text-white"
                  >Full Name</label
                >
                <div class="col-md-10">
                  <input
                    autocomplete="new-password"
                    class="form-control"
                    required
                    placeholder="Name"
                    id="first_name"
                    name="name"
                    type="text"
                    class="validate"
                  />
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="firstname"
                  class="col-md-2 col-form-label text-white"
                  for="blood"
                  >Blood Group</label
                >
                <div class="col-md-10">
                  <select
                    name="blood"
                    id="blood"
                    class="validate form-control"
                    required
                  >
                    <option value="">Select</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="O">O</option>
                    <option value="AB">AB</option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="firstname"
                  class="col-md-2 col-form-label text-white"
                  for="rh"
                  >RH Factor</label
                >
                <div class="col-3">
                  <label>
                    <input
                      class="form-control"
                      value="+"
                      name="rh"
                      type="radio"
                      required
                    />
                    <span class="text-white">Positive</span>
                  </label>
                </div>

                <div class="col-3">
                  <label>
                    <input
                      class="form-control"
                      value="-"
                      name="rh"
                      type="radio"
                      required
                    />
                    <span class="text-white">Negetive</span>
                  </label>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label text-white">Phone</label>
                <div class="col-md-10">
                  <input
                    autocomplete="new-password"
                    class="white-text form-control"
                    required
                    placeholder="Contact Number"
                    id="phone"
                    name="phone"
                    type="text"
                    pattern="[6789][0-9]{9}"
                    class="validate"
                  />
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label text-white" for="email"
                  >Email</label
                >
                <div class="col-md-10">
                  <input
                    autocomplete="new-password"
                    class="white-text validate form-control"
                    placeholder="Email Address"
                    id="email"
                    name="email"
                    type="email"
                    class="validate"
                  />
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label text-white" for="city"
                  >District</label
                >
                <div class="col-md-10">
                  <input
                    type="text"
                    name="city"
                    id="city"
                    class="validate form-control"
                    required
                    placeholder="District "
                  />
                </div>
              </div>

              <div class="form-group row">
                <label for="address" class="col-md-2 col-form-label text-white"
                  >Address</label
                >
                <div class="col-md-10">
                  <textarea
                    autocomplete="new-password"
                    maxlength="80"
                    id="address"
                    placeholder="Enter your Address"
                    name="address"
                    class="
                      materialize-textarea
                      white-text
                      validate
                      form-control
                    "
                    required
                  ></textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="offset-md-2 col-md-10">
                  <button class="btn btn-success form-control" type="submit">
                    Register
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
<!-- Page Content -->

<div class="section features-1 text-dark bg-white " > 
<div class="container " style="max-width: 1200px;" >

	  <div class="row">
                <div class="col-md-8 mx-auto text-center">
                    <span class="badge badge-primary badge-pill mb-3">welcome</span>
                    <h3 class="display-3 ">Welcome to E Attendance</h3>
                    <p class="" >The time is now for the next step. We bring you the future of attendance recording.</p>
                </div>
            </div>

<div class="row">
	<div class="col-md-4">
			<div class="card card-stats">
				<div class="card-body">
                        <div class="row">
                                    <div class="col">
                                        <h4 class="card-title text-uppercase text-center text-dark mb-0">About Us
                                      </h4>                                      
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                            <i class="ni ni-trophy"></i>
                                        </div>
                                    </div>
                                </div>
                                <hr>
					<p>
					<ul style="list-style-type:disc">
						<li>E-Attendance is a Web Based Application</li>
						<li>Students have access to real time statistics.</li>
						<li>Backed with Email Capabilities.
						</li>
						<li>Teachers can create new classes and they can start recording attendance.
						</li>
						<li>Secured login and database management.<br></li>

						</ul>
					 </p>
				</div>
			</div>
		</div>


		<div class="col-md-4">
			<div class="card card-stats">
				<div class="card-body">
                        <div class="row">
                                    <div class="col">
                                        <h4 class="card-title text-uppercase text-center text-dark mb-0">Objective
                                      </h4>                                      
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-warning text-white rounded-circle shadow">
                                            <i class="ni ni-books"></i>
                                        </div>
                                    </div>
                                </div>
                                <hr>
					<p>
					<ul style="list-style-type:disc">
							<li>To Keep attendance records of all Students.</li>
						<li>To reduce the time needed for taking attendnace.</li>
						<li>To Get all statistics easily on time.
						</li>
						<li>Get real time info about attendance to avoid penalty
						</li>
						<li>For reducing manual work and mental conflict.<br></li>

						</ul>
					 </p>
				</div>
			</div>
		</div>


        <div class="col-md-4">
			<div class="card card-stats">
				<div class="card-body">
                        <div class="row">
                                    <div class="col">
                                        <h4 class="card-title text-uppercase text-center text-dark mb-0">Technologies Used
                                      </h4>                                      
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
                                            <i class="ni ni-laptop"></i>
                                        </div>
                                    </div>
                                </div>
                                <hr>
				    <p>
					<ul style="list-style-type:disc">
					<li>Mongo DB </li>
					<li>BootStrap4</li>
					<li>Node JS</li>
					<li>Express JS</li>
					<li>Argon UI Kit</li>
                    <li>HTML5 CSS3 JS</li>
                    <li>Flask</li>
                    <li>Face Recognition</li>
					</ul>
					</p>
				</div>
			</div>
		</div>
    </div>
	</div>
	</div>

<!-- ======================================================================================================================================== -->

    <div class="section features-6 text-dark bg-white" id="services">
      <div class="container ">

        <div class="row">
                <div class="col-md-8 mx-auto text-center">
                    <span class="badge badge-primary badge-pill mb-3">Insight</span>
                    <h3 class="display-3 ">Services</h3>
                    <h5 class="" >We Offer Services to both Students and Teachers.</h5>
                </div>
            </div>
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="info info-horizontal info-hover-primary">
              <div class="description pl-4">
                <h3 class="title" >For Students</h3>
                            <p class=" ">Taking attendance made easier. Register and upload your photo to have a hassle free experience in recording your attendance.</p>
                        
              </div>
            </div>
            <div class="info info-horizontal info-hover-primary mt-5">
              <div class="description pl-4">
                <h3 class="">For Teachers</h3>
                            <p class=" ">Detailed analytics for you. Make classrooms, add students and take their attendance also  detailed reports on attendanc and absents.</p>
              </div>
            </div>
      
          </div>
          <div class="col-lg-6 col-10 mx-md-auto d-none d-md-block">
            <img class="ml-lg-5" src="assets/img/pic1.png" width="100%">
          </div>
        </div>
      </div>
    </div>


<!-- ======================================================================================================================================== -->




      <div class="section features-2 text-dark bg-white" id="features"> 
        <div class="container"> 
          <div class="row align-items-center"> 
            <div class="col-lg-4 col-md-8 mr-auto text-left"> 
              <div class="pr-md-5"> 
                <div class="icon icon-lg icon-shape icon-shape-primary shadow rounded-circle mb-5"> <i class="ni ni-favourite-28"> </i></div>
                <h3 class="display-3">Features</h3>
                <p>The time is now for the next step of Taking Attendance. We bring you the future of attendance recording along with great tools for analyzing.</p>
                <ul class="list-unstyled mt-5"> 
                  <li class="py-2"> 
                    <div class="d-flex align-items-center"> 
                      <div>
                        <div class="badge badge-circle badge-primary mr-3"> <i class="ni ni-settings-gear-65"> </i></div>
                      </div>
                      <div>
                        <h6 class="mb-0">Highly Reliable and Accurate.</h6>
                      </div>
                    </div>
                  </li>
                  <li class="py-2"> 
                    <div class="d-flex align-items-center"> 
                      <div>
                        <div class="badge badge-circle badge-primary mr-3"> <i class="ni ni-html5"> </i></div>
                      </div>
                      <div>
                        <h6 class="mb-0">Faster & Responsive website.</h6>
                      </div>
                    </div>
                  </li>
                  <li class="py-2"> 
                    <div class="d-flex align-items-center"> 
                      <div>
                        <div class="badge badge-circle badge-primary mr-3"> <i class="ni ni-settings-gear-65"> </i></div>
                      </div>
                      <div>
                        <h6 class="mb-0">In Depth Attendance Analytics</h6>
                      </div>
                    </div>
                  </li>
                  <li class="py-2"> 
                    <div class="d-flex align-items-center"> 
                      <div>
                        <div class="badge badge-circle badge-primary mr-3"> <i class="ni ni-satisfied"> </i></div>
                      </div>
                      <div>
                        <h6 class="mb-0">Great Accuracy upto 99.36% on LFW.</h6>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-8 col-md-12 pl-md-0"> 
              <div class="row"> 
                <div class="col-lg-4 col-md-4 ">
                  <div class="info text-left bg-info shadow"> 
                    <div class="icon icon-shape bg-gradient-white shadow rounded-circle text-primary"> <i class="ni ni-satisfied text-info"> </i></div>
                    <h5 class="info-title text-white">Best Quality</h5>
                    <p class="description">Not just taking attendance , analyzing attendance is also very much important, we designed considering this also.</p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4">
                  <div class="info text-left bg-danger info-raised shadow"> 
                    <div class="icon icon-shape bg-gradient-white shadow rounded-circle text-primary"> <i class="ni ni-palette text-danger"> </i></div>
                    <h5 class="info-title text-white">Awesome Design</h5>
                    <p class="description"> A Good Interactive Web Interfce for both Students and Teacher. We Know you can Feel this.</p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 d-none d-md-block">
                  <div class="info text-left bg-default shadow"> 
                    <div class="icon icon-shape bg-gradient-white shadow rounded-circle text-primary"> <i class="ni ni-spaceship text-default"> </i></div>
                    <h5 class="info-title text-white">Great Performance</h5>
                    <p class="description">We optimised the website for faster response, especially by reducing the usage of JavScript, and many more.</p>
                  </div>
                </div>
              </div>
              <div class="row"> 
                <div class="col-lg-4 col-md-4">
                  <div class="info text-left bg-primary shadow"> 
                    <div class="icon icon-shape bg-gradient-white shadow rounded-circle text-primary"> <i class="ni ni-planet text-primary"> </i></div>
                    <h5 class="info-title text-white">User Friendly</h5>
                    <p class="description">Clean and great friendly User Interface to access all the features easily both for teachers and stduents.  </p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 d-none d-md-block">
                  <div class="info text-left bg-warning info-raised shadow"> 
                    <div class="icon icon-shape bg-gradient-white shadow rounded-circle text-primary"> <i class="ni ni-world text-warning"> </i></div>
                    <h5 class="info-title text-white">Analyze Attendance</h5>
                    <p class="description">Get all the statistics about attendance also in depth analysis of attendance for teachers as well as students.</p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 d-none d-md-block">
                  <div class="info text-left bg-success shadow"> 
                    <div class="icon icon-shape bg-gradient-white shadow rounded-circle text-primary"> <i class="ni ni-atom text-success"> </i></div>
                    <h5 class="info-title text-white">Safety First</h5>
                    <p class="description" >Secure authentication to avoid unauthorised login, Hiding Something Doesnt mean Its secured. </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <span > </span>
      </div>
     
<!-- ======================================================================================================================================== -->


 <div class="section features-6 text-dark bg-white" id="tech">
        <div class="container-fluid shado">

            <div class="row">
                <div class="col-md-8 mx-auto text-center">
                    <span class="badge badge-primary badge-pill mb-3">stack</span>
                    <h3 class="display-3 ">Technologies Used</h3>
                    <p class="" >Our Development Stack</p>
                </div>
            </div>

            <div class="row text-lg-center align-self-center">

                  <div class="col-md-4">
                    <div class="info">
                    <img class=" img-fluid" src="assets/img/html.png" alt="HTML5">                       
                        <h6 class="info-title text-uppercase text-primary">HTML5</h6>
                    </div>
                </div>

               <div class="col-md-4">
                    <div class="info">
                    <img class=" img-fluid" src="assets/img/css3.png" alt="CSS3">                       
                        <h6 class="info-title text-uppercase text-primary">CSS3</h6>
                    </div>
                </div>

               <div class="col-md-4">
                    <div class="info">
                    <img class=" img-fluid" src="assets/img/js.png" alt="JavaScript">                       
                        <h6 class="info-title text-uppercase text-primary">JavaScript</h6>
                    </div>
                </div>



</div>

<div class="row text-center ">            

                 <div class="col-md-4 d-none d-md-block">
                    <div class="info">
                    <img class=" img-fluid" src="assets/img/bootstrap.png" alt="BootStrap4">                       
                        <h6 class="info-title text-uppercase text-primary">BootStrap4</h6>
                    </div>
                </div>

                 <div class="col-md-4 d-none d-md-block">
                    <div class="info">
                    <img class=" img-fluid" src="assets/img/apache.png" alt="Apache">                       
                        <h6 class="info-title text-uppercase text-primary">Apache</h6>
                    </div>
                </div>
                
                 <div class="col-md-4 d-none d-md-block">
                    <div class="info">
                    <img class=" img-fluid" src="assets/img/mysql.png" alt="MySQL">                       
                        <h6 class="info-title text-uppercase text-primary">MySQL</h6>
                    </div>
                </div>

                
            </div>


        </div>
    </div>
  

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.148726942877!2d74.92318891461082!3d12.866579590924816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba358ff28ef6cf3%3A0xe93953598f53c53c!2sSahyadri%20College%20of%20Engineering%20%26%20Management%20(Autonomous)!5e1!3m2!1sen!2sin!4v1639473731159!5m2!1sen!2sin" width="100%" height="470" frameborder="0" style="border:2px solid black;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

<?php require("footer.php");?>

	
	
</body>

</html>