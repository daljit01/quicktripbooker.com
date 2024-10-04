<section class="login-top-space"> 
    <div class="container">   
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3 ">
                <div class="shadow p-4">
                <h4 class="color-red"></h6>
                <?php 
                if ($this->session->flashdata('status') == 0) { ?>
                <h4 style="color-red"><?php echo $this->session->flashdata('msg'); ?></h6>
                    <?php } else {
                ?>
                <h4 class="color-green"><?php echo $this->session->flashdata('msg'); ?></h6>
                <?php
                }
                ?>
                <h2 class="text-center ">Forgot Password</h2>
                <p class="text-center">Please enter your email address. You will receive an email message with instructions on how to reset your password.</p>
                <form name="foprgotpassfrm" id="foprgotpassfrm" action="<?php echo base_url("send-reset-password"); ?>" method="post">
                <div class="row mt-3">
                    <div class="col-lg-12 form-group">
                        <span class="wpcf7-form-control-wrap first-name">
                        <input type="text" name="email" id="email" value="" class="form-control" 
                            aria-required="true" aria-invalid="false" placeholder="Email" />
                        </span>
                        </span>
                    </div>
                    <div class="col-lg-12 mt-4">
                        <input type="submit" value="Get New Password" class="form-control loginbtn text-center w-100 pt-1" />
                    </div>
                </div>
           </form>
           </div>
        </div>
        </div>
    </div>
</section>