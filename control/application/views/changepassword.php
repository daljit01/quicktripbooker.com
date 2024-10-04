<div id="wrapper">

	<div class="card card-authentication1 mx-auto my-5">
		<div class="card-body">
		 <div class="card-content p-2">
		  <div class="card-title text-uppercase pb-2">Reset Password</div>
            <hr>
            <?php if ($this->session->flashdata('status') == 0) { ?>
                <h6 style="color: #9e1a1a; text-align: center;"><?php echo $this->session->flashdata('msg'); ?></h6>
            <?php } else {
                ?>
                <h6 style="color: #1e7e34;  text-align: center;"><?php echo $this->session->flashdata('msg'); ?></h6>
                <?php

            }
            ?>

		    <p class="pb-2">Please enter your Current Password To Reset Your Password.</p>
		    <form action="<?php echo base_url('auth/save_password') ?>" name="password_frm" id="password_frm" method="post"
							  enctype="multipart/form-data">
			  <div class="form-group">
			  <label for="exampleInputEmailAddress" class="">Current Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="currentpassword" name="currentpassword" class="form-control input-shadow" placeholder="Email Address">
				  <div class="form-control-position">
					  <i class="icon-envelope-open"></i>
				  </div>
			   </div>
			  </div>

              <div class="form-group">
			  <label for="exampleInputEmailAddress" class="">Create Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" id="passwprd" name="passwprd" class="form-control input-shadow" placeholder="Email Address">
				  <div class="form-control-position">
					  <i class="icon-envelope-open"></i>
				  </div>
			   </div>
			  </div>

              <div class="form-group">
			  <label for="exampleInputEmailAddress" class="">Confirm Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" id="confirmpassword" name="confirmpassword" class="form-control input-shadow" placeholder="Email Address">
				  <div class="form-control-position">
					  <i class="icon-envelope-open"></i>
				  </div>
			   </div>
			  </div>
			 
			  <button type="submit" class="btn btn-warning btn-block mt-3">Reset Password</button>
			 </form>
		   </div>
		  </div>
		   <div class="card-footer text-center py-3">
                <a href="<?php echo base_url('admindashboard'); ?>">
                    <button type="submit" class="btn btn-info btn-block mt-3">Return to the HOME</button>
                </a>
            </div>
	     </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	
	
	</div>