<section class="login-top-space"> 
    <div class="container">   
        <div class="row mt-5">
            
            <div class="col-md-6 offset-md-3 ">
                <?php if ($this->session->flashdata('status') == 0) { ?>
                <h4 style="color: #f91100; text-align: center;"><?php echo $this->session->flashdata('msg'); ?></h6>
                    <?php } else {
                ?>
                <h4 class="color-green" style="text-align: center;"><?php echo $this->session->flashdata('msg'); ?></h6>
                <?php
                }
                ?>
                <div class="shadow p-4">
                                
                                    <h2 class="text-center ">Signup</h2>
                <p class="text-center mb-1">To access the site please signup with your details</p>
                
                <form name="customer_reg_from" id="customer_reg_from" class="regfrmname" action="<?php echo base_url('register-customer'); ?>" method="post">
                <div class="row mt-3">
                                <div class="col-lg-12 form-group">
                                <!-- <h3 class="smll-text1 mt-1">Personal Details</h3>  -->
                                </div>
                                <div class="col-lg-6 form-group">
                                    <span class="last-name"><input type="text" class="form-control" name="firstName" id="firstName" value="" placeholder="First Name" /></span>
                                </div> 
                                <div class="col-lg-6 form-group">
                                    <span class="last-name"><input type="text" class="form-control" name="lastName" id="lastName" value="" placeholder="Last Name" /></span>
                                </div> 
                                <div class="col-lg-6 form-group">
                                    <span class="last-name"><input type="text" class="form-control chekemail" name="email" class="chekemail" id="email" value="" placeholder="Email" /></span>
                                    <span class="error" id="erremail"></span>
                                    <input type="hidden" name="emailrow" id="emailrow" value="0">
                                </div> 
                                <div class="col-lg-6 form-group">
                                    <div class="row no-gutters">
                                        <div class="col-md-5">
                                            <select name="cxPhoneCode" id="cxPhoneCode" class="form-control">
                                            <?php
                                            if(count($Countries) > 0)
                                            {
                                              foreach($Countries as $Country)
                                              {
                                            ?>
                                                <option data-countryCode="<?php echo $Country->iso2; ?>" value="<?php echo "+".str_replace("+","",$Country->phonecode); ?>" <?php echo ($Country->iso2 == "US") ? "selected='selected'" : ""; ?>><?php echo $Country->iso2."&nbsp;(&nbsp;"."+".str_replace("+","",$Country->phonecode).")"; ?></option>
                                            <?php
                                              }	
                                           }
                                            ?>											
								    </select>
                                        </div>
                                        <div class="col-md-7"><input type="text" class="form-control" name="cxPhone" id="cxPhone" value="" placeholder="Phone" /></div>
                                    </div>
                                    
                                    
                                </div> 
                                
                                <div class="col-lg-6 form-group">
                                    <span class="last-name"><input type="password" class="form-control" name="password" id="upassword" value="" placeholder="Password" /></span>
                                    <div id="password-strength-status"></div>
                                </div> 
                                <div class="col-lg-6 form-group">
                                    <span class="last-name"><input type="password" class="form-control" name="cpassword" id="cpassword" value="" placeholder="Confirm Password" /></span>
                                </div> 
                                <div class="col-lg-12 form-group">
                                    <!--<span class="last-name"><input class="form-control" type="text" name="cxAltPhone" id="cxAltPhone" value="" placeholder="Alternate Phone" /></span>-->
                                    <div class="row no-gutters">
                                        <div class="col-md-3">
                                            <select name="cxAltPhoneCode" id="cxAltPhoneCode" class="form-control">
                                            <?php
                                            if(count($Countries) > 0)
                                            {
                                              foreach($Countries as $Country)
                                              {
                                            ?>
                                                <option data-countryCode="<?php echo $Country->iso2; ?>" value="<?php echo "+".str_replace("+","",$Country->phonecode); ?>" <?php echo ($Country->iso2 == "US") ? "selected='selected'" : ""; ?>><?php echo $Country->iso2."&nbsp;(&nbsp;"."+".str_replace("+","",$Country->phonecode).")"; ?></option>
                                            <?php
                                              }	
                                            }
                                            ?>											
								    </select>
                                        </div>
                                        <div class="col-md-9"><input type="text" class="form-control" name="cxAltPhone" id="cxAltPhone" value="" placeholder="Alternate Phone" /></div>
                                    </div>
                                </div> 
                               
                               
                                              
                                                                                               
                                
                                <div class="col-lg-12 mt-4">
                                    <input type="submit" class="form-control loginbtn text-center w-100 pt-1" value="Signup">
                                    <!-- <a type="submit" value="Login" href="card-details.php" class="wpcf7-form-control wpcf7-submit text-center w-100" >Signup</a> -->
                                </div>
                            </div>
           </form>
           </div>
        </div>
        </div>
    </div>
</section>