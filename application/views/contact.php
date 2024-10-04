<style>
  .step{
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 15px;
  }
</style>

    <div id="search_container_2" class="h-400 contactbanner">
        <div class="opacity-mask"></div>
        <div class="container">
            <div class="banner-rt-top abtbn text-white text-center">
                <h2 class="text-white">Fulfil your bucket list today!</h2>
            </div>
        </div>
    </div>

    <section class="mt-5 pt-lg-5 pb-4 pt-0">
      <div class="container margin_60">
        <div class="row">
          <div class="col-md-8">
            <div class="form_title">
              <!-- <h3><strong><i class="fa fa-pencil"></i></strong>Fill the form below</h3> -->
              <!-- <p>
                Let us know you better now
              </p> -->
            </div>
            <div class="step">
              <div id="message-contact">
              <?php if (!empty($this->session->flashdata('msg'))) { ?>
							<div class="errortext"><?php echo $this->session->flashdata('msg'); ?></div>
							<?php 
							} 
							?>
                </div>
                <form name="contact" id="contact" class="contact-form" action="<?php echo base_url('welcome/contactmail') ?>" method="post">
                <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Phone</label>
                      <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="Enter Phone number">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Message</label>
                      <textarea rows="5" id="message" name="message" class="form-control" placeholder="Write your message" style="height:200px;"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
								<div class="col-sm-12">
									<div class="form-group">
									<?php							
										// session_start();
										$n1=rand(1,6); //Generate First number between 1 and 6 
										$n2=rand(5,9); //Generate Second number between 5 and 9 
										$answer=$n1+$n2; 
						
										$math = "What is ".$n1." + ".$n2." : "; 
										$_SESSION['vercode'] = $answer;
										
										echo $math;
										
									?>
									</label>
									<input class="form-control col-sm-3" name="captcha" id="sum_captcha" type="text">
									<input id="cap_res" name="cap_res" type="hidden" value="<?php echo $_SESSION['vercode'];?>">									</div>
								</div>
							</div>
                <div class="row">
                  <div class="col-sm-6">
                    <button class="btn_1" >Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- End col-md-8 -->
  
          <div class="col-md-4">
            <div class="imgWrapper">
              <img src="<?php echo base_url('assets/images/contact.webp'); ?>" alt="contact">
            </div>
          </div>
          <!-- End col-md-4 -->
        </div>
        <!-- End row -->
      </div>
    
    </section>