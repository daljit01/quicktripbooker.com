<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/fav-icon.png');?>" type="img/x-png">
    <!-- Bootstrap core CSS -->
<link href="<?php echo base_url('assets/css/bootstrap.min1.css');?>" rel="stylesheet" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?php echo base_url('assets/css/dashboard.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">


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
    <!-- <link href="css/dashboard.css" rel="stylesheet"> -->
  </head>
  <body>
  <div class="layer"></div>
	<!-- Mobile menu overlay mask -->

	<!-- Header================================================== -->
	<header class="login-hd">
        <div id="top_line">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-6 col-12 text-lg-right text-center">
                        <ul id="top_links">
                            <li><a href="tel:<?php echo $this->Site_Model->support_phone_link; ?>" class="hd-ph"><i class="fa fa-phone"></i> <strong><?php echo $this->Site_Model->support_phone; ?></strong></a></li>
                            <li><a href="mailto:<?php echo $this->Site_Model->support_email; ?>" class="email hd-email"> <i class="fa fa-envelope"></i> <strong><?php echo $this->Site_Model->support_email; ?></strong></a></li>
                         
                        </ul>
                    </div>
                </div><!-- End row -->
            </div><!-- End container-->
        </div><!-- End top line-->
		<div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3 col-8">
                    <div id="logo_home">
                    	<h1><a href="<?php echo base_url('/');?>" title="City tours travel template">City Tours travel </a></h1>
                    </div>
                </div>
                <nav class="col-lg-9 col-3 text-lg-left">
                <a href="signup.php"><i class="fa fa-user-o signupmenu d-block d-lg-none float-right text-white mr-5"></i></a> <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#">  <span>Menu mobile</span></a>
                    <div class="main-menu">
                        <div id="header_menu">
                            <img src="<?php echo base_url('assets/images/logo-header.png');?>" width="160" height="34" alt="City tours">
                        </div>
                        <a href="#" class="open_close" id="close_in"><i class="fa fa-times"></i></a>
                        <?php
                      include("menu.php");
                      ?>
                    </div>
                
                </nav>
            </div>
        </div>
	</header>
	<!-- End Header -->


<div class="container-fluid">
  <div class="row">
    <?php
      include("user_nav.php");
      ?>
		<?php echo $contents; ?>
		</div>
</div>


<div class="dashboard-footer text-center">
  <div class="container">
    <br><br><br><br><br><br><br><br><br>
  <p>Copyright @ <?php echo date("Y"); ?> Anatripgo | DBA - Infinity Travels. All Rights Reserved. <a href="<?php echo base_url('privacy-policy'); ?>" class="text-dark">Privacy policy</a> | <a href="<?php echo base_url('terms-and-conditions'); ?>" class="text-dark">Terms & condition</a></p>
  </div>
</div>
<!-- Common scripts -->


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.6/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
	<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js');?>" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script src="<?php echo base_url('assets/js/common_scripts_min.js');?>"></script>
<script src="<?php echo base_url('assets/js/functions.js');?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
	  <script>
		  function checkStrength(password) {  
        var strength = 0  
        if (password.length < 6) {  
            $('#password-strength-status').removeClass()  
            $('#password-strength-status').addClass('Short')  
            return 'Too short'  
        }  
        if (password.length > 7) strength += 1  
        // If password contains both lower and uppercase characters, increase strength value.  
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1  
        // If it has numbers and characters, increase strength value.  
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1  
        // If it has one special character, increase strength value.  
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1  
        // If it has two special characters, increase strength value.  
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1  
        // Calculated strength value, we can return messages  
        // If value is less than 2  
        if (strength < 2) {  
            $('#password-strength-status').removeClass()  
            $('#password-strength-status').addClass('Weak')  
            return 'Weak'  
        } else if (strength == 2) {  
            $('#password-strength-status').removeClass()  
            $('#password-strength-status').addClass('Good')  
            return 'Good'  
        } else {  
            $('#password-strength-status').removeClass()  
            $('#password-strength-status').addClass('Strong')  
            return 'Strong'  
        }  
    }
		  $(document).ready(function(){
			feather.replace();
			$("#password_change_frm").validate({
            rules: {
              cpassword: {
                    required: true,
                    minlength: 6
                },
                conpassword: {
                    required: true,
                    minlength: 6,
                    equalTo: "#cpassword"
                }
            }
        });
        $('#cpassword').keyup(function () {  
			$('#password-strength-status').html(checkStrength($('#cpassword').val()))  
		})
			$("#profile_frm").validate({
            rules: {
                firstName: "required",
                lastName: "required",
                email: {
                    required: true,
                    email: true
                },
                cxPhone: "required"
            },
			submitHandler: function (form) {
			    var  isValid= true

                var emailrow = $("#emailrow").val();
                if(emailrow > 0)
                {
                    isValid= false
                }
                if(isValid) {
                    //alert(isValid);
                    document.customer_reg_from.submit();
                }
					
			}
        });
		  });
	  </script>
  </body>
</html>
