<section class="homebanner-bg about-banner login-banner"></section>
<section class="login-top-space"> 
    <div class="container">   
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3 ">
                <div class="shadow p-4">
                    <?php if ($this->session->flashdata('status') == 0) { ?>
                <h4 style="color: #f91100; text-align: center;"><?php echo $this->session->flashdata('msg'); ?></h6>
                    <?php } else {
                ?>
                <h4 class="color-green" style="text-align: center;"><?php echo $this->session->flashdata('msg'); ?></h6>
                <?php
                }
                ?>
                <h2 class="text-center ">Reset Password</h2>
                <p class="text-left">Enter your new password below.</p>
                 <form name="resetpassfrm" id="resetpassfrm" action="<?php echo base_url("save-reset-password"); ?>" method="post">
                <div class="row mt-3">
                    <div class="col-lg-12 form-group">
                        <span class="wpcf7-form-control-wrap first-name">
                            <input type="password" name="rpassword" id="rpassword" value="" class="form-control" 
                            aria-required="true" aria-invalid="false" placeholder="Password" />
                        </span>
                    </div>
                    <div class="col-lg-12 form-group">
                        <span class="wpcf7-form-control-wrap first-name">
                            <input type="password" name="crpassword" id="crpassword" value="" class="form-control" 
                            aria-required="true" aria-invalid="false" placeholder="Confirm Password" />
                        </span>
                    </div>
                    <div class="col-lg-12 mt-4">
                        <input type="submit" value="Save Password" class="form-control loginbtn text-center w-100 pt-1" />
                    </div>
                </div>
                <input type="hidden" name="userdata" id="userdata" value="<?php echo $userdata; ?>">
           </form>
           </div>
        </div>
        </div>
    </div>
</section>
