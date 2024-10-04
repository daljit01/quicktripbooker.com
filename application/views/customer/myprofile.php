<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom custompadd">
        <h1 class="h2">Contact Information</h1>
      </div>
          <div class="sub-ticket">      
          <?php if ($this->session->flashdata('status') == 0) { ?>
          <h4 class="color-red"><?php echo $this->session->flashdata('msg'); ?></h6>
              <?php 
              } else 
              {
              ?>
              <h4 class="color-green"><?php echo $this->session->flashdata('msg'); ?></h6>
              <?php
             }
            ?>
          <div class="accordion" id="accordionExample">
                    <div class="card11">
                      <div id="headingOne2" class="text-right">
                          <a href="#" class="mb-0 btn btn-inline" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
                          Edit
                          </a>
                     
                      </div>
                  
                      <div id="collapseOne2" class="collapse" aria-labelledby="headingOne2" data-parent="#accordionExample">
                        <div class="card-body111">
                        <div class="row">
                         <div class="col-md-12">
                         <form name="profile_frm" id="profile_frm" action="<?php echo base_url('update-profie'); ?>" method="post">
                                <div class="row">
                                <div class="form-group col-md-4">
                                   <label for="cxName">First Name</label> 
                                   <input type="text" class="form-control" id="firstName" value="<?php echo $customerdetails->firstName; ?>" name="firstName" placeholder="First Name">
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="cxName">Last Name</label> 
                                  <input type="text" class="form-control" id="lastName" value="<?php echo $customerdetails->lastName; ?>" name="lastName" placeholder="Last Name">
                                </div>
                                 <div class="form-group col-md-4">
                                  <label for="cxName">Email</label> 
                                  <input type="text" class="form-control" id="email" value="<?php echo $customerdetails->email; ?>" name="email" placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                   <label for="exampleFormControlInput1">Pnone Number</label> 
                                   <input type="text" class="form-control" id="cxPhone" value="<?php echo $customerdetails->cxPhone; ?>" name="cxPhone" placeholder="Pnone Number">
                                </div>
                                <div class="form-group col-md-6">
                                   <label for="exampleFormControlInput1">Alternate Pnone Number</label> 
                                   <input type="text" class="form-control" id="cxAltPhone" value="<?php echo $customerdetails->cxAltPhone	; ?>" name="cxAltPhone" placeholder="Alternate Pnone Number">
                                </div>
                                <div class="form-group col-md-4">
                                  <button class="btn btn-buttom btn-sub w-100">Update</button>
                                </div>
                            </div>
                           

                            <!-- <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="customCheck1">
                              <label class="custom-control-label" for="customCheck1">I content for infinitybackup internet Ldt to process my data and agree to the terms of the privacy policy</label>
                            </div> -->


                          </form>
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                            <div class="accordion userinfo" id="accordionExample">
                    <div class="card11">
                      <div id="headingOne">
                      <span>Please note that updating your contact information on this page will not update the information displayed on your PDF invoices. If you update the billng address information associate with your invoice, please edit it through the payment page, located  <a href="#" class="mb-0 btn btn-inline" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Here.</a> </span> 
                          <!-- <a class="mb-0 btn btn-inline" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Edit
                          </a> -->
                     
                      </div>
                  
                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body111">
                        <div class="table-responsive">
                              <table class="table table-striped table-sm">
                                <tbody>
                                <tr>
                                    <td>Full Name</td>
                                    <td><?php echo $customerdetails->cxName; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Email</td>
                                    <td><?php echo $customerdetails->email; ?></td>
                                  </tr>
                                   <tr>
                                    <td>Phone Number</td>
                                    <td><?php echo $customerdetails->cxPhone; ?></td>
                                  </tr>
                                   <tr>
                                    <td>Alternate Phone Number</td>
                                    <td><?php echo $customerdetails->cxAltPhone; ?></td>
                                  </tr>
                                </tbody>
                              </table>
                              
                            </div>
                            <!-- <div class="form-group">
                              <button class="btn btn-buttom btn-sub">Update</button>
                              <button class="btn btn-buttom border">Cancel</button>
                            </div> -->
                        </div>
                      </div>
                    </div>
                </div>
          </div>
   
    </main>