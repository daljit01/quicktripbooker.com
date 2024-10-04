<!-- Start wrapper-->
<div id="wrapper">

    <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
	<div class="card card-authentication1 mx-auto my-5">
		<div class="card-body">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		<img src="assets/images/logo-icon.png" alt="logo icon">
		 	</div>
			<br>
			 <?php if ($this->session->flashdata('status') == 0) { ?>
                <h6 style="color: #9e1a1a; text-align: center;"><?php echo $this->session->flashdata('msg'); ?></h6>
            <?php } else {
                ?>
                <h6 style="color: #1e7e34;  text-align: center;"><?php echo $this->session->flashdata('msg'); ?></h6>
                <?php

            }
            ?>


		  <div class="card-title text-uppercase text-center py-3">Sign In</div>
		    <form action="<?php echo base_url('auth/do_login')?>" method="post">
			  <div class="form-group">
			  <label for="exampleInputUsername" class="sr-only">Username</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" name="username" class="form-control input-shadow" placeholder="Enter Username">
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			  <label for="exampleInputPassword" class="sr-only">Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" name="password" id="password" class="form-control input-shadow" placeholder="Enter Password">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			<div class="form-row">
			 <div class="form-group col-6">
			   <div class="icheck-material-primary">
                <input type="checkbox" id="user-checkbox" checked="" />
                <label for="user-checkbox">Remember me</label>
			  </div>
			 </div>
			 <div class="form-group col-6 text-right">
			  <a href="<?php echo base_url('comingsoon')?>">Reset Password</a>
			 </div>
			</div>
			 <button type="submit" class="btn btn-primary btn-block">Sign In</button>
			  <!-- <div class="text-center mt-3">Sign In With</div> -->
			  
			 <!-- <div class="form-row mt-4">
			  <div class="form-group mb-0 col-6">
			   <button type="button" class="btn bg-facebook text-white btn-block"><i class="fa fa-facebook-square"></i> Facebook</button>
			 </div>
			 <div class="form-group mb-0 col-6 text-right">
			  <button type="button" class="btn bg-twitter text-white btn-block"><i class="fa fa-twitter-square"></i> Twitter</button>
			 </div>
			</div> -->
			 
			 </form>
		   </div>
		  </div>
		  <!-- <div class="card-footer text-center py-3">
		    <p class="mb-0">Do not have an account? <a href="authentication-signup.html"> Sign Up here</a></p>
		  </div> -->
	     </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	
	
</div><!--wrapper-->