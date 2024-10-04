<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom custompadd">
        <h1 class="h2">Contact Information</h1>
      </div>
      <?php if ($this->session->flashdata('status') == 0) { ?>
          <h4 class="color-red"><?php echo $this->session->flashdata('msg'); ?></h6>
              <?php 
              } else 
              {
              ?>
              <h4 class="color-green" ><?php echo $this->session->flashdata('msg'); ?></h6>
              <?php
             }
            ?>
      <div class="sub-ticket">
       
          <div class="row">
            <div class="col-md-7">
            <form name="password_change_frm" id="password_change_frm" action="<?php echo base_url('save-password-change'); ?>" method="post">
              <div class="form-group">
                <label for="exampleFormControlInput1">New Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" value="">
                <div id="password-strength-status"></div>
              </div>

              <div class="form-group1">
                <label for="exampleFormControlTextarea1">Re-type Password</label>
                <input type="password" class="form-control" id="conpassword" name="conpassword" value="">
              </div>
              <br>
              <div class="form-group">
                <button class="btn btn-buttom btn-sub">Update</button>
              </div>
                

            </form>
            </div>
          </div>         
          </div>
   
    </main>