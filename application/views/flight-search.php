<?php
    $filtersearchurl = "search-flight-lookup";
    if($page == "hotel-flight")
    {
      $filtersearchurl = "search-package-lookup";
    }
    ?>
    <form method="post" action="<?php echo base_url($filtersearchurl) ?>" name="route_search_frm" id="route_search_frm">
    <div class="row no-gutters">
      <div class="col-md-12">
        <!-- <h3 class="form-lebelname-style">Flight type & travelers</h3> -->
        <input type="hidden" name="page" id="page" value="<?php echo $page; ?>">                                                       
          <div class="text-center11 pt-3">
          <label class="radio-inline">
                  <input type="radio" id="one-way" value="One way" class="route_travel_type" checked="checked" name="travel_type">
                  <strong>One way</strong>
              </label>
              <label class="radio-inline">
                  <input type="radio" id="roundtrip" value="Roundtrip" class="route_travel_type"  name="travel_type">
                  <span></span>
                  <strong>Roundtrip</strong>
              </label>
         
             
          </div>
      </div>
      <div class="col-md-12">
      <!-- <h3 class="form-lebelname-style mt-0">Cities & dates</h3> -->
            <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="form-group form-style">
                    <label class="level-home-form fromform">From</label>
                      <input type="text" class="date_from iata_code quote_frm form-control routeorigincode fromforminput" autocomplete="off" id="routeorigincode" name="origincode" placeholder="Add departure">
                      <input type="hidden" class="date_fromt iata_code_city quote_frm form-control" autocomplete="off" id="origin_iata_code_city" name="origin_iata_code_city" placeholder="Add departure">
                      <input type="hidden" class="cityname" autocomplete="off" id="origin_cityname" name="origin_cityname">
                      <?php
                      if($page == "hotel-flight")
                      {
                      ?>
                      <input type="hidden" name="destinationId" id="destinationId" value="">
                      <input type="hidden" name="searchflag" id="searchflag" value="1">
                      <input type="hidden" class="hoteldestination quote_frm form-control routeorigincode" autocomplete="off" id="hotel_city" name="hotel_city" placeholder="City / Hotel / Area">
                      <?php
                      }
                      ?>
                    </div>
                  </div>
                  <div class="col-sm-2 col-6">
                      <div class="form-group destination-placeholder form-style">
                          <label class="level-home-form fromform">At</label>
                          <input type="text" class="date_to iata_code quote_frm form-control fromforminput" autocomplete="off" id="routedestinationcode" name="destinationcode" placeholder="Add arrival">
                          <input type="hidden" class="date_to iata_code_city quote_frm form-control" autocomplete="off" id="destination_iata_code_city" name="destination_iata_code_city" placeholder="To">
                          <input type="hidden" class="cityname" autocomplete="off" id="destination_cityname" name="destination_cityname">       
                      </div>
                  </div>
                  <!-- </div> -->
                  <!-- </div> -->
                  <!-- </div>                 
                    -->
                  <!-- <div class="row pb-3"> -->
                                  <div class="col-sm col-6">
                                          <div class="form-group form-style">
                                              <label class="level-home-form">Departure</label>
                                              <input type="text" class="quote_frm form-control" autocomplete="off" name="date_from" id="date_from" value="" placeholder="Date from"> 
                                          </div>
                                      </div>
                                      <div class="col-sm col-6">
                                          <div class="form-group form-style">
                                              <label class="level-home-form">Arrival</label>
                                              <input type="text" class="form-control" autocomplete="off" name="date_to" id="date_to" placeholder="Date to">
                                          </div>
                                      </div>
                                      <div class="col-sm-3 col-12">
                                        <div class="form-group form-style">
                                            <label class="level-home-form">Guests</label>
                                            <input type="hidden" class="form-control" autocomplete="off" name="traveller" id="traveller">
                                    
                                            <div class="form-control" data-toggle="dropdown" aria-expanded="false">
                                            <div class="travelerselectbox">1 passengers Economy</div>
                                        </div>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">


                                          <div class="custom-model-main" id="traveller_details" >
                                                    <div class="custom-model-inner">
                                                    
                                                      <div class="custom-model-wrap">
                                                        <div class="pop-up-content-wrap">
                                                        <div class="row mb-4">
                                                            <div class="col-4">
                                                              Class
                                                            </div>
                                                            <div class="col-8 text-right">
                                                              <select name="fare_class" class="travelClass" id="fare_class">
                                                                <option value="ECONOMY">Economy</option>
                                                                <option value="PREMIUM_ECONOMY">Premium Economy</option>
                                                                <option value="BUSINESS">Business</option>
                                                                <option value="FIRST">First</option>
                                                              </select>
                                                            </div>
                                                          </div>
                                                          <div class="row mb-4">
                                                            <div class="col-md-8 col-7">
                                                              Adults
                                                            </div>
                                                            <div class="col-4">
                                                              <div class="row">
                                                                <div class="col-2 text-left">																											
                                                                  <a href="javascript:void(0);" class="remove_traveller"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                                                </div>
                                                              <div class="col-4 text-right ml-2">
                                                                <input type="hidden" name="no_of_adults" id="no_of_adults" class="traveller_no" value="1">
                                                                <span id="adult_traveller_txt" class="traveller_txt">1</span>
                                                              </div>
                                                              <div class="col-2 text-left">
                                                              <a href="javascript:void(0);" class="add_traveller"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                                              </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div class="row mb-4">
                                                            <div class="col-md-8 col-7">
                                                              Children under 12 years
                                                            </div>
                                                            <div class="col-4">
                                                              <div class="row">
                                                                <div class="col-2 text-left">																										
                                                                <a href="javascript:void(0);" class="remove_traveller"><i class="fa fa-minus" aria-hidden="true"></i></a>		
                                                                </div>
                                                              <div class="col-4 text-right ml-2">
                                                              <input type="hidden" name="no_of_child" id="no_of_child" class="traveller_no" value="0">
                                                              <span id="child_traveller_txt" class="traveller_txt">0</span>
                                                              </div>
                                                              <div class="col-2 text-left">
                                                                <a href="javascript:void(0);" class="add_traveller"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                                              </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div class="row mb-4">
                                                            <div class="col-md-8 col-7">
                                                              Infants under 2 years	
                                                            </div>
                                                            <div class="col-4">
                                                              <div class="row">
                                                                <div class="col-2 text-left">
                                                                <a href="javascript:void(0);" class="remove_traveller"><i class="fa fa-minus" aria-hidden="true"></i></a>		
                                                                </div>
                                                              <div class="col-4 text-right ml-2">
                                                              <input type="hidden" name="no_of_infant" id="no_of_infant" class="traveller_no" value="0">
                                                              <span id="infants_traveller_txt" class="traveller_txt">0</span>
                                                              </div>
                                                              <div class="col-2 text-left">																										
                                                                <a href="javascript:void(0);" class="add_traveller"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                                              </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="container">
                                                        <div class="rowcontainer btncontainer text-center">
                                                          <div class='col-12 done-bg'>
                                                              <button type="button" class="btn btn-main-search" id="passenger_btn" style="top: 0;">Done</button>
                                                          </div>
                                                        </div>
                                                        </div>																						
                                                      </div>
                                                      </div>
                                                    </div>
                                          </div>
                                        </div>
                                      </div>
                                    
                                      <div class="col-sm-1 col-6">
                                          <div class="form-group1 form-btn-style">
                                          <button class="home-search-btn"><i class="fa fa-long-arrow-right"></i></button>
                                          </div>
                                      </div>
                                    </div>
                                </div>
                        </form>