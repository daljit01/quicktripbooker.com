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
                <h2 class="text-center ">Login</h2>
                <p class="text-center">To access the site please enter your username and password</p>
                <form name="loginfrm" id="loginfrm" class="loginsignupform" action="<?php echo base_url("do-login"); ?>" method="post">
                <div class="row mt-3">
                    <div class="col-lg-12 form-group">
                        <span class="wpcf7-form-control-wrap first-name">
                        <input type="text" name="email" id="email" value="" class="form-control" placeholder="Email" />
                        </span>
                        </span>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <span class="wpcf7-form-control-wrap last-name">
                            <input type="password" name="password" id="password" value="" class="form-control" 
                            aria-required="true" aria-invalid="false" placeholder="Password" />
                        </span>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 col-7">
                                <a href="<?php echo base_url('forget-password');?>" class="forget-pass">Forgot Password</a>
                            </div>    
                            <div class="col-md-6 col-5 text-right">
                                <a href="<?php echo base_url('signup');?>" class="forget-pass">Sign Up</a>
                            </div>                                                    
                        </div>
                    </div>                    
                    <div class="col-lg-12 mt-4">
                        <input type="submit" value="Login" class="form-control loginbtn text-center w-100 pt-1" />
                    </div>
                </div>
           </form>
           </div>
        </div>
        </div>
    </div>
</section>