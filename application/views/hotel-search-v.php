                    
      <style>
        .quote_frm.error {
            border: 1px solid red;
        }
      </style>              
                    
                    <form method="post" action="<?php echo base_url('search-hotel-lookup') ?>" name="hotel_search_frm" id="hotel_search_frm" class="travl-search-advanced clearfix">
                                    <div class="row">
                                      <div class="col-12">
                                          <div class="form-group form-style">
                                            <label class="level-home-form">City / Hotel / Area</label>
                                          <!-- <input type="text" class="date_from iata_code quote_frm form-control ui-autocomplete-input" autocomplete="off" id="routeorigincode" name="origincode" placeholder="Add departure"> -->
                                          <!-- <input type="text" class="date_from iata_code quote_frm form-control routeorigincode" autocomplete="off" id="routeorigincode" name="origincode" placeholder="Add departure">
                                          <input type="hidden" class="date_fromt iata_code_city quote_frm form-control" autocomplete="off" id="origin_iata_code_city" name="origin_iata_code_city" placeholder="Add departure">
                                          <input type="hidden" class="cityname" autocomplete="off" id="origin_cityname" name="origin_cityname">
                                         -->
                                          <div class="hotel_inputbox">
                                            <input type="text" class="hoteldestination quote_frm form-control routeorigincode" autocomplete="off" id="hotel_city" name="hotel_city" placeholder="City / Hotel / Area" required>
                                            <input type="hidden" class="destinationId form-control quote_frm" autocomplete="off" value="<?php //echo $destinationId; ?>" id="destinationId" name="destinationId">
                                            <i class="fa-solid fa-tree-city"></i>
                                          </div>  
                                        </div>
                                      
                                      </div>
                                    
                                      <div class="col-12">
                                          <div class="form-group form-style">
                                              
                                                <label class="level-home-form">Check-in date</label>
                                                <div class="hotel_inputbox">
                                                    <input type="text" class="quote_frm form-control" autocomplete="off" name="date_from" id="date_from" value="" placeholder="Date From" required> 
                                                    <i class="fa-solid fa-calendar-days"></i>
                                                </div>  
                                            </div>
                                      </div>
                                      <div class="col-12">
                                          <div class="form-group form-style">
                                              
                                                <label class="level-home-form">Check-out date</label>
                                                <div class="hotel_inputbox">
                                                  <input type="text" class="form-control quote_frm" autocomplete="off" name="date_to" id="date_to" placeholder="Date To" required>
                                                  <i class="fa-solid fa-calendar-days"></i>
                                                </div>  
                                          </div>
                                      </div>
                                    
                                      <div class="col-12">
                                          <div class="form-group1 form-btn-style text-right">
                                          <button class="btn btn-secondary home-search-btn w-100 search-hotel-btn">Find Hotel</button>
                                          </div>
                                      </div>
                                    </div>
                                    <input type="hidden" name="no_of_adults" id="no_of_adults" value="1">
                                    <input type="hidden" name="searchflag" id="searchflag" value="1">
                            
                        </form>