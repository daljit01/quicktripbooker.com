<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min1.css" rel="stylesheet" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/dashboard.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>
  <body>
  <div class="layer"></div>
	<!-- Mobile menu overlay mask -->

	<!-- Header================================================== -->
	<header class="login-hd">
        <div id="top_line">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-6 text-right">
                        <ul id="top_links">
                            <li><a href="tel:+18867854320" class="hd-ph"><i class="fa fa-phone"></i> <strong>(886) 785 4320</strong></a></li>
                            <li><a href="mailto:info@traveltogo.com" class="email hd-email"> <i class="fa fa-envelope"></i> <strong>info@traveltogo.com</strong></a></li>
                         
                        </ul>
                    </div>
                </div><!-- End row -->
            </div><!-- End container-->
        </div><!-- End top line-->
		<div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-3">
                    <div id="logo_home">
                    	<h1><a href="index.php" title="City tours travel template">City Tours travel template</a></h1>
                    </div>
                </div>
                <nav class="col-9 text-lg-left">
                <a href="signup.php"><i class="fa fa-user-o signupmenu d-block d-lg-none float-right text-white mr-5"></i></a> <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#">  <span>Menu mobile</span></a>
                    <div class="main-menu">
                        <div id="header_menu">
                            <img src="images/logo-header.png" width="160" height="34" alt="City tours">
                        </div>
                        <a href="#" class="open_close" id="close_in"><i class="fa fa-times"></i></a>
                        <ul>
                            <li class="select"> <a href="index.php" class="show-submenu">Home</a></li>
                            <li> <a href="flight.php" class="show-submenu">Flight</a></li>
                            <li> <a href="hotel.php" class="show-submenu">Hotel</a></li>
                            <li> <a href="hotel-flight.php" class="show-submenu">Flight + Hotel</a></li>
                            <li> <a href="about.php" class="show-submenu">About Us </a></li>
                            <li><a href="contact.php" class="show-submenu">Contact us </a> </li>
                            <li ><a href="login.php" class="show-submenu"><i class="fa fa-lock"></i> Login </a> </li>
                            <li><a href="signup.php" class="show-submenu"><i class="fa fa-user"></i> Signup</a> </li>
                        </ul>
                    </div>
                
                </nav>
            </div>
        </div>
	</header>
	<!-- End Header -->


<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-5 mt-5">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php">
              <span data-feather="home"></span>
              Overview <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="myprofile.php">
              <span data-feather="file"></span>
              My Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="changepassword.php">
              <span data-feather="shopping-cart"></span>
              Change Password
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mybooking.php">
              <span data-feather="users"></span>
              Flight Booking
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="myhotelbooking.php">
              <span data-feather="bar-chart-2"></span>
              Hotel Booking
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <span data-feather="layers"></span>
              Logout
            </a>
          </li>
        </ul>

       
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom custompadd">
        <h1 class="h2">Dashboard</h1>
      </div>
      <h2>Section title</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Header</th>
              <th>Header</th>
              <th>Header</th>
              <th>Header</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1,001</td>
              <td>random</td>
              <td>data</td>
              <td>placeholder</td>
              <td>text</td>
            </tr>
            <tr>
              <td>1,002</td>
              <td>placeholder</td>
              <td>irrelevant</td>
              <td>visual</td>
              <td>layout</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>data</td>
              <td>rich</td>
              <td>dashboard</td>
              <td>tabular</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>information</td>
              <td>placeholder</td>
              <td>illustrative</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,004</td>
              <td>text</td>
              <td>random</td>
              <td>layout</td>
              <td>dashboard</td>
            </tr>
            
            </tr>
            <tr>
              <td>1,014</td>
              <td>dashboard</td>
              <td>illustrative</td>
              <td>rich</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,015</td>
              <td>random</td>
              <td>tabular</td>
              <td>information</td>
              <td>text</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


<div class="dashboard-footer text-center">
  <div class="container">
    <br><br><br><br><br><br><br><br><br>
  <p>Copyright@2022 Traveltogo. All Rights Reserved. Privacy policy | Terms & condition</p>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.6/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script src="js/dashboard.js"></script>
  </body>
</html>
