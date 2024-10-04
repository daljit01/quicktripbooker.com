<section class="bannerform-sec single-form single-form1 flighttop-form" style="padding:0;">
  <!-- <div class="single-overlay"></div> -->
  <div class="container">
    <div class="home-banner-form-single bannerform-sec home p-2">
    <div class="row">
      <div class="col-md-6 col-6">
        <div class="destination-airport"><h2 class="text-white"><i class="fa fa-plane"></i> &nbsp;&nbsp;<?php echo $originLocationCode; ?> - <?php echo $origincity; ?></h2></div>
      </div>
      <!-- <div class="col-md-2"><div class="arrowboth text-center">&nbsp;</div></div> -->
      <div class="col-md-6 col-6 text-right">
        <div class="destination-airport"><h2 class="text-white"><i class="fa fa-plane"></i>&nbsp;&nbsp;<?php echo $destinationLocationCode; ?> - <?php echo $depcity; ?></h2></div>
      </div>
      <div class="col-md-12">

      <div class="home-banner-form bg-transparent">
              <form method="post" action="<?php echo base_url('search-flight-lookup') ?>" name="route_search_frm" id="route_search_frm" class="travl-search-advanced clearfix">
                  <input type="hidden" name="searchprogress" id="searchprogress" value="searchprogress">
                  <input type="hidden" name="nonStop" id="nonStop" value="<?php echo !empty($nonStop) ? $nonStop : "all"; ?>">
                  <input type="hidden" name="includedAirlineCodes" id="includedAirlineCodes" value="<?php echo $includedAirlineCodes ?>">
                  <input type="hidden" name="maxPrice" id="maxPrice" value="<?php echo $maxPrice ?>">
                  <div class="text-center11">
                  <label class="radio-inline">
                  <input type="radio" id="roundtrip" value="Roundtrip" class="route_travel_type" <?php echo ($travel_type == "Roundtrip") ? 'checked="checked"' : "" ?> name="travel_type">
                      <span></span>
                      <strong>Roundtrip</strong>
                  </label>
                  <label class="radio-inline">
                  <input type="radio" id="one-way" value="One way" class="route_travel_type" <?php echo ($travel_type == "One way") ? 'checked="checked"' : "" ?> name="travel_type">
                      <strong>One way</strong>
                  </label>
              </div>
              <div class="row">
                <div class="col-sm col-6">
                    <div class="form-group form-style">
                  <label class="level-home-form">Departure from</label>
                    <!-- <input type="text" class="date_from iata_code quote_frm form-control ui-autocomplete-input" autocomplete="off" id="routeorigincode" name="origincode" placeholder="Add departure"> -->
                    <input type="hidden" class="date_from iata_code quote_frm form-control routeorigincode" autocomplete="off" id="routeorigincode" name="origincode" value="<?php echo $originLocationCode; ?>" placeholder="Add departure">
                    <input type="text" class="date_fromt iata_code_city quote_frm form-control routeorigincode" autocomplete="off" id="origin_iata_code_city" name="origin_iata_code_city" value="<?php echo $origincity; ?>" placeholder="Add departure">
                    <input type="hidden" class="cityname" autocomplete="off" id="origin_cityname" name="origin_cityname">
                 
                  </div>
                
                </div>
                <div class="col-sm col-6">
                    <div class="form-group destination-placeholder form-style">
                        <label class="level-home-form">Arrive at</label>
                        <input type="hidden" class="date_to iata_code quote_frm form-control" autocomplete="off" id="routedestinationcode" name="destinationcode" value="<?php echo $destinationLocationCode; ?>" placeholder="Add arrival">
                        <input type="text" class="date_to iata_code_city quote_frm form-control" autocomplete="off" id="destination_iata_code_city" name="destination_iata_code_city" value="<?php echo $depcity; ?>" placeholder="To">
                        <input type="hidden" class="cityname" autocomplete="off" id="destination_cityname" name="destination_cityname">
                    </div>
                </div>
              
                <div class="col-sm col-6">
                    <div class="form-group form-style">
                        <label class="level-home-form">Departure date</label>
                        <input type="text" class="quote_frm form-control" autocomplete="off" name="date_from" id="date_from" value="<?php echo $departureDate; ?>"  value="" placeholder="Date From"> 
                      </div>
                </div>
                <div class="col-sm col-6">
                    <div class="form-group form-style">
                        <label class="level-home-form">Arrival date</label>
                        <input type="text" class="quote_frm form-control" autocomplete="off" name="date_to" id="date_to" value="<?php echo $returnDate; ?>" placeholder="Date To">
                        
                      </div>
                </div>
                <div class="col-sm col-12">
                  <div class="form-group form-style">
                      <label class="level-home-form">Guests</label>
                      <input type="hidden" class="form-control" autocomplete="off" name="traveller" id="traveller" value="<?php echo $totaltraveller ?>">
                      <!-- <input type="hidden" class="form-control" autocomplete="off" name="travellerinfo" id="travellerinfo" 
                      data-toggle="dropdown" aria-expanded="false" placeholder="Add guests" value=""> -->
                      <div class="form-control" data-toggle="dropdown" aria-expanded="false">
                      <div class="travelerselectbox"><?php echo $totaltraveller ?> <?php echo ($totaltraveller > 1) ? 'passengers' : 'passenger';?> <?php echo $travelClass; ?></div>
                  </div>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <!-- <button class="dropdown-item" type="button">Action</button>
                    <button class="dropdown-item" type="button">Another action</button>
                    <button class="dropdown-item" type="button">Something else here</button> -->


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
              
                <div class="col-sm col-12">
                    <button class="home-search-btn"><i class="fa fa-long-arrow-right"></i></button>
               
                </div>
              </div>
              
              </form>
          </div>
      </div>
    </div>
    </div>
  </div>
</section>

<?php
	if(!array_key_exists("errors",(array) $offers_price_response))
	{
	?>
  <form action="<?php echo base_url(); ?>create-flight-booking" name="passenger_frm" id="passenger_frm" method="post">
	<textarea name="serachdata" id="serachdata"  style="display:none;"><?php echo json_encode($serachdata); ?></textarea>
    <textarea name="offers_price_response" id="offers_price_response" style="display:none;"><?php echo json_encode($offers_price_response); ?></textarea>
    <textarea name="review_flight" id="review_flight" style="display:none;"><?php echo json_encode($review_flight); ?></textarea>
	<input type="hidden" name="offers_price_type" id="offers_price_type" value="<?php echo $offers_price_type ?>">
<section class="review-form bg-lightcu pb-5">
  <div class="container">
      <div class="row">
       <div class="col-md-12">
       <div class="right-block-new right-block p-3">
          <div class="exclu-btn">
            <h2 class="invisible">Limited Time Offer</h2>
            <p class="special-airport">Special Fare For <b>New York , United States Of America - London , United Kingdom</b></p>
          </div>
          <div class="right-block-new-price">
            <span>From</span>
            <h3>$<?php echo$review_flight['price']['grandTotal']; ?>*</h3>
            <small>price per adult</small>
          </div>
          <div class="right-block-travel">
          <?php
              if(count($review_flight['itineraries']) > 0)
              {
                $origin="";
                $destination="";
                $it=1;
                $dutime = 0;
                $hr=0;
                $min = 0;
                foreach($review_flight['itineraries'] as $itinerary)
                {
                  $duration = str_replace("PT","",$itinerary['duration']);
                  $hours = 0;
                  $mins = 0;
                  if (strpos($duration, 'H') !== false) {
                  $durationArr = explode("H",$duration);
                  $hours = strtolower($durationArr[0]);
                  $mins = strtolower(str_replace("M","",$durationArr[1]));
                  }
                  else
                  {
                  $mins = strtolower($duration);
                  }
                  $sectiontitle = ($it == 1) ? "Departure" : "Return";

                  if(count($itinerary['segments']) > 0) 
                  {
                   $sg=1;  
                   $newhr = 0;
                   $newmin =0;                                   
                   foreach($itinerary['segments'] as $segment)
                   {
                    $segduration = str_replace("H",":",str_replace("PT","",$segment['duration']));
                    $segduration = date("H:i:s",strtotime(str_replace("M",":00",$segduration)));
                    $hr = $hr+date("H",strtotime($segduration));
                    $hr1 = $hr+date("H",strtotime($segduration));
                    $min = $min+date("i",strtotime($segduration));
                    $min1 = $min+date("i",strtotime($segduration));
                    $newduration = str_replace("PT","",$segment['duration']);
                    $newdurationarr = explode("H",$newduration);
                    $newdurationhrs = (int)$newdurationarr[0];
                    $newdurationmin = (int)str_replace("M","",$newdurationarr[1]);
                    //echo $newdurationhrs."=======".$newdurationmin;
                    $newhr = $newhr+$newdurationhrs;
                    $newmin = $newmin+$newdurationmin;
                    //$secs = strtotime($segduration)-strtotime("00:00:00");
                    //$dutime= $dutime+strtotime($segduration);
                    //echo date("H:i:s",strtotime($dutime+$secs))."=============".$secs."<br>";
                    ///echo $segduration."==========<b>";
                    //echo $segment['duration']."=====".date("H:i",$dutime)."======".$dutime."=======".strtotime($segduration)."======".$segduration;
                     ?>
            <div class="row">
              <div class="col-lg-3 col-4">
                <div class="right-block-departure">
                  <p><b><?php echo ($sg == 1) ? $sectiontitle : ""; ?></b></p>  
                  <span>Departure On</span>  
                  <p><?php echo $segment['departure_iatacode']; ?> </p>
                  <small><?php echo !empty($segment['origin_city']) ? $segment['origin_city']."," : ""; ?> <?php echo $segment['origin_iataname']; ?> </small>
                </div>
              </div>
              <div class="col-lg-3 col-4">
                <div class="right-block-departure-arrow text-center">
                  <i class="fa fa-long-arrow-right"></i>
                </div>
              </div>
              <div class="col-lg-3 col-4">
                <div class="right-block-departure">
                  <span>Arrival On</span>  
                  <p><?php echo $segment['arrival_iataCode']; ?></p>
                  <small><?php echo !empty($segment['destination_city']) ? $segment['destination_city']."," : ""; ?><?php echo $segment['destination_iataname']; ?></small>
                </div>
              </div>
              <div class="col-lg-3 col-4">
                <p class="right-block-newdate"><b>D: <?php echo date('h:i a',strtotime($segment['departure_time'])) ?>  ,</b> <span><?php echo date('D, M d',strtotime($segment['departure_time'])) ?></span></p>
                <p class="right-block-newdate"><b>A: <?php echo date('h:i a',strtotime($segment['arrival_time'])) ?>,</b> <?php echo date('D, M d',strtotime($segment['arrival_time'])) ?></p>
              </div>
            </div>
            <?php
				  	$sg++;
					 }
					}
				      $it++;
				    }
			    }
				?>      
          </div>
        
        </div>
       </div>
    </div>
    </div>
    <div class="container">
      <div class="row">
       <div class="col-md-12">
        <div class="travetting-title"><h2>Who's Travelling</h2></div>
       </div> 
       <div class="col-md-12">
        <!-- <div class="adult-title">
          <h3>
          <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
           <span>1</span> ADULT <i class="fa fa-angle-down" aria-hidden="true"></i>
          </a>
          </h3>
          <div class="collapse" id="collapseExample">
            <div class="card card-body">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
            </div>
          </div>
        </div> -->
        <?php
							if(count($review_flight['travelerPricings']) > 0)
							{
								$travr=0;
                $trav=1;
								foreach($review_flight['travelerPricings'] as $travelertype => $traveler)
								{
                  $passtype = ucwords(strtolower(str_replace("HELD_","",$travelertype)));
							?>
        <div class="adult-title">          
          <h3>
          <a data-toggle="collapse" href="#collapseExample<?php echo $trav; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
           <span><?php echo $trav; ?></span> <?php echo $passtype; ?> <i class="fa fa-angle-down" aria-hidden="true"></i>
          </a>
          </h3>
          <?php
									if($traveler['passengercount'] > 0)
									{
										$k=1;
										for($i=0;$i<$traveler['passengercount'];$i++)
										{
									?>    
          <input type="hidden" name="passenger_type[]" id="passenger_type" class="passenger_type" value="<?php echo $passtype; ?>">
					<input type="hidden" name="passengercount[]" id="passengercount" class="passengercount" value="<?php echo $traveler['passengercount']; ?>">
													      
          <div class="passenger_row" id="collapseExample<?php echo $trav; ?>">
          <h2><?php echo $passtype; ?> Personal Information</h2>
            <div class="card card-body"> 
                <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                      <label class="review-label">Title</label>
                      <select name="passenger_title[]" id="passenger_title" class="form-control title reviewtitle validate_field" aria-invalid="false">
																<option value="Mr.">Mr.</option>
																<option value="Mrs.">Mrs.</option>
																<option value="Miss.">Miss.</option>
																<option value="Mstr.">Mstr.</option>
															</select>
                    </div>
                    <!-- <div class="arrow-form-search">
                      <img src="images/double-arrow.png">
                    </div> -->
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="review-label">Name</label>
                      <input autocomplete="off" placeholder="Name" class="form-control name validate_field" name="passenger_name[]" id="passenger_name" pattern="[a-zA-Z ]+$" class="tvlrInput" type="text" value="">
                    </div>
                    <!-- <div class="arrow-form-search">
                      <img src="images/double-arrow.png">
                    </div> -->
                  </div>
                  <div class="col-md-3">
                    <div class="form-group destination-placeholder">
                      <label class="review-label">Gender</label>
                      <select name="passenger_gender[]" id="passenger_gender" class="form-control gender validate_field" aria-invalid="false">
																	<option value="MALE">Male</option>
																	<option value="FEMALE">Female</option>
															</select>
                    </div>
                  </div>
                  
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="review-label">Date Of Birth</label>                    
                      <input autocomplete="off" placeholder="Date of birth" name="passenger_dob[]" id="passenger_dob" class="form-control dob validate_field" type="text" value="">
                    </div>
                  </div>
                  
                  <?php
														//$fligh_details['isInternational'] = 1;
														if($review_flight['isInternational'] == 1)
														{
														?>
                  <div class="col-md-3">
                    <div class="form-group1">
                      <label class="review-label">Birth Place</label>
                      <input autocomplete="off" placeholder="Birth Place" name="passenger_dop[]" id="passenger_dop" class="form-control dob validate_field" type="text" value="">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group1">
                      <label class="review-label">Nationality</label>
                      <select id="passenger_nationality" name="passenger_nationality[]" class="form-control nationality validate_field">
                        <option value="">Nationality</option>
                        <option>select country</option>
                        <?php
                        if(count($Countries) > 0)
                        {
                          foreach($Countries as $Country)
                          {
                        ?>
                            <option value="<?php echo $Country->iso2; ?>" <?php //echo ($Country->iso2 == "IN") ? "selected='selected'" : ""; ?>><?php echo $Country->name; ?></option>
                        <?php
                          }	
                        }
                        ?>																
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="review-label">Passport or ID Number</label>                      
                      <input autocomplete="off" placeholder="00000 00000 0000 0000" name="passenger_passportno[]" id="passenger_passportno" class="form-control validate_field" type="text" value="">  
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="review-label">Passport Issue Place</label>                      
                      <input autocomplete="off" placeholder="Passport Issue Place" name="passenger_issue_place[]" id="passenger_issue_place" class="form-control validate_field" type="text" value="">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="review-label">Passport Issue date</label>                      
                      <input autocomplete="off" placeholder="Passport Issue date" name="passenger_issue_date[]" id="passenger_issue_date" class="form-control validate_field" type="text" value="">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="review-label">Passport Expiry Date</label>                      
                      <input autocomplete="off" placeholder="Passport Expiry Date" name="passenger_passport_exp[]" id="passenger_passport_exp" class="form-control validate_field" type="text" value="">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="review-label">Passport Country</label>                      
                      <select id="passenger_passport_country" name="passenger_passport_country[]" class="form-control validate_field">
																<option value="">Passport Country</option>
																<?php
																if(count($Countries) > 0)
																{
																	foreach($Countries as $Country)
																	{
																?>
																		<option value="<?php echo $Country->iso2; ?>" <?php //echo ($Country->iso2 == "IN") ? "selected='selected'" : ""; ?>><?php echo $Country->name; ?></option>
																<?php
																	}	
																}
																?>	
															</select>
                    </div>
                  </div>
                    <?php
                            }
                  ?>
                </div>
            </div>
          </div>
          <?php
										$k++;
										}
									}
									?>
        </div>
        <?php
								$travr++;
                $trav++;
								}
							}
							?>


      </div>
      </div>
    </div>



    <div class="container">
      <div class="row">
       <div class="col-md-12">
        <div class="travetting-title"><h2>How Would You Like to Pay</h2></div>
       
       </div> 
       <div class="col-md-12">
        <div class="adult-title">
          <h2>Credit Card Information</h2>
          <div class="row">
            <div class="col-md-2 col-6">
              <div class="payment-img">
                <img src="<?php echo base_url(); ?>assets/images/paypal1.png" alt="paypal">
              </div>
            </div>
            <div class="col-md-2 col-6">
              <div class="payment-img">
                <img src="<?php echo base_url(); ?>assets/images/Discover1.png" alt="Discover">
              </div>
            </div>
            <div class="col-md-2 col-6">
              <div class="payment-img">
                <img src="<?php echo base_url(); ?>assets/images/mastercard1.png" alt="mastercard">
              </div>
            </div>
            <div class="col-md-2 col-6">
              <div class="payment-img">
                <img src="<?php echo base_url(); ?>assets/images/VISA1.png" alt="VISA">
              </div>
            </div>
            <div class="col-md-2 col-6">
              <div class="payment-img">
                <img src="<?php echo base_url(); ?>assets/images/Strip.png" alt="E-bay">
              </div>
            </div>

          </div>
          <div class="card-deataols">
            <div class="card card-body"> 

                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="review-label">Credit / Debit Card Number</label>
                      <div class="tvlrFormField make_relative card-reader card">
                      <!-- <label class="LatoBold">Credit / Debit Card Number</label> -->
                      <span id="CreditCardImg" class="CreditCardImg"></span>
                      <input placeholder="Card Number" class="form-control travellerdetails" name="traveller_card_number" id="traveller_card_number" type="text" value="">
                      <small>(Pay with credit or debit card)</small>                      
                      <div style="clear:both;"></div>
                      <p class="status"> 
                        <span class="status_icon"></span>
                        <span class="status_message"></span> 
                      </p>
                    </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="review-label">Card Holder's Name</label>
                      <input placeholder="Card Holder's Name" class="form-control travellerdetails" name="traveller_name_on_card" id="traveller_name_on_card" type="text" value="">
									    <small>(As it appears on your credit card)</small> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="row">
                      <div class="col-md-6 col-6">
                        <div class="form-group">
                          <label class="review-label">Expiry Date</label>
                          <select class="form-control travellerdetails payment_exp_date" name="traveller_card_exp_month" id="traveller_card_exp_month">
                            <option value="">Month</option>
                            <option value="1">01 - January</option>
                            <option value="2">02 - February</option>
                            <option value="3">03 - March</option>
                            <option value="4">04 - April</option>
                            <option value="5">05 - May</option>
                            <option value="6">06 - June</option>
                            <option value="7">07 - July</option>
                            <option value="8">08 - August</option>
                            <option value="9">09 - September</option>
                            <option value="10">10 - October</option>
                            <option value="11">11 - November</option>
                            <option value="12" >12 - December</option>
									        </select>
                        </div>
                      </div>
                      <div class="col-md-6 col-6">
                        <div class="form-group">
                          <label class="review-label">&nbsp;</label>
                          <select class="form-control travellerdetails payment_exp_date" name="traveller_card_exp_year" id="traveller_card_exp_year">
                          <option value="">Year</option>
                          <?php
                          for($y=date("Y");$y <= (date("Y")+15); $y++)
                          {
                          ?>
                          <option value="<?php echo $y?>" <?php //echo ($y == date("Y")) ? 'selected="selected"' : ""; ?>><?php echo $y;?></option>
                          <?php	
                          }
                          ?>
                        </select>
                        </div>
                      </div>
                    </div>
                  
                  </div>
                 
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="review-label">CVV Code</label>
                      <!-- <input type="text" class="form-control"  placeholder="0000"> -->
                      <input placeholder="cvv" class="form-control travellerdetails payment_exp_date" name="traveller_card_cvv" id="traveller_card_cvv" type="text" value="">
									     <small>3 digit number from your card &nbsp <img src="<?php echo base_url(); ?>assets/images/card.gif"></small>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group1">
                      <label class="review-label">Country</label>
                      <!-- <input type="text" class="form-control"  placeholder="Enter Country"> -->
                      <select id="traveller_country" name="traveller_country"
                          class="form-control travellerdetails">
                            <option value="">Country</option>
                            <?php
                            if(count($Countries) > 0)
                            {
                              foreach($Countries as $Country)
                              {
                            ?>
                                <option value="<?php echo $Country->iso2; ?>" <?php //echo ($Country->iso2 == "IN") ? "selected='selected'" : ""; ?>><?php echo $Country->name; ?></option>
                            <?php
                              }	
                            }
                            ?>						
                            
                          </select>
                    </div>
                    <!-- <div class="arrow-form-search">
                      <img src="images/double-arrow.png">
                    </div> -->
                  </div>
                  <div class="col-md-3">
                    <div class="form-group1 destination-placeholder">
                      <label class="review-label">State</label>
                      <input autocomplete="none" placeholder="State" class=" form-control tvlrInput travellerdetails" name="traveller_state" id="traveller_state" type="text" value="">
                    </div>
                  </div>
                  
                  <div class="col-md-2">
                    <div class="form-group1">
                      <label class="review-label">Zipcode</label>
                      <input autocomplete="none" placeholder="Zipcode" class=" form-control tvlrInput travellerdetails" name="traveller_postcode" id="traveller_postcode" type="text" value="">
                    </div>
                  </div>
                  
                  <div class="col-md-2">
                    <div class="form-group1">
                      <label class="review-label">Addrress</label>
                      <input autocomplete="none" placeholder="Addrress" class="form-control tvlrInput travellerdetails" name="traveller_address" id="traveller_address" type="text" value="">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group1">
                      <label class="review-label">City</label>
                      <input autocomplete="none" placeholder="City" class="form-control tvlrInput travellerdetails" name="traveller_city" id="traveller_city" type="text" value="">
                    </div>
                  </div>            
                </div>
                
                
              </form>

            </div>
          </div>
        </div>



      </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
       <div class="col-md-12">
        <div class="travetting-title"><h2>Where Should We Send Your Confirmation?</h2></div>
       
       </div> 
       <div class="col-md-12">
        <div class="adult-title">
     
          <div class="card-deataols">
            <div class="card card-body"> 
                <div class="row">
          
                <!--<div class="col-md-3">-->
                <!--    <div class="form-group1 destination-placeholder">-->
                <!--      <label class="review-label">First Name</label>-->
                <!--      <input autocomplete="none" placeholder="Name" class="form-control travellerdetails" name="traveller_name" id="traveller_name" type="text" value="">-->
                <!--    </div>-->
                <!--  </div>-->
                  
                  <div class="col-md-3">
                    <div class="form-group1 destination-placeholder">
                      <label class="review-label">First Name</label>
                      <input autocomplete="none" placeholder="Name" class="form-control travellerdetails" name="firstName" id="firstName" type="text" value="">
                    </div>
                  </div>
                  
                   <div class="col-md-3">
                    <div class="form-group1 destination-placeholder">
                      <label class="review-label">Last Name</label>
                      <input autocomplete="none" placeholder="Name" class="form-control travellerdetails" name="lastName" id="lastName" type="text" value="">
                    </div>
                  </div>
                  
                  <div class="col-md-3">
                    <div class="form-group1">
                      <label class="review-label">Country</label>
                      <select name="countryCode" id="countryCode" class="form-control travellerdetails">
                        <?php
                        if(count($Countries) > 0)
                        {
                          foreach($Countries as $Country)
                          {
                        ?>
                            <option data-countryCode="<?php echo $Country->iso2; ?>" value="<?php echo $Country->phonecode; ?>" <?php //echo ($Country->iso2 == "IN") ? "selected='selected'" : ""; ?>><?php echo $Country->name."(".$Country->phonecode.")"; ?></option>
                        <?php
                          }	
                        }
                        ?>											
								    </select>
                    </div>
                   
                  </div>
                   <div class="col-md-3">
                    <div class="form-group1">
                      <label class="review-label">Phone Number</label>
                      <input autocomplete="none" placeholder="Mobile No" class="form-control travellerdetails" name="traveller_mobile" id="traveller_mobile" type="text" value="">
                    </div>
                  </div>
                  
                  <div class="col-md-3">
                    <div class="form-group1 destination-placeholder">
                      <label class="review-label">Email Address</label>
                      <input autocomplete="none" placeholder="Email" name="traveller_email" id="traveller_email" class="form-control travellerdetails" type="email" value="">
                    </div>
                  </div>
                  
                 
                  <div class="col-md-3">
                    <div class="form-group1">
                      <label class="review-label">Alt Phone Number</label>
                      <input autocomplete="none" placeholder="Mobile No" class="form-control" name="cxAltPhone" id="cxAltPhone" type="text" value="">
                    </div>
                  </div>
                  
                  <!-- <div class="col-md-3">
                    <div class="form-group1">
                      <label class="review-label">&nbsp;</label>
                      <div class="form-group1 form-check">
                        <input type="checkbox" class="form-check-input flitersearch" value="B6" name="includecarrieroption[]" id="includecarrieroption_2">
                        <label class="form-check-label" for="exampleCheck1">I Accept the Rules of this Trip</label>
                      </div>
                      <div class="form-group1 form-check">
                        <input type="checkbox" class="form-check-input flitersearch" value="B6" name="includecarrieroption[]" id="includecarrieroption_2">
                        <label class="form-check-label" for="exampleCheck1">Send Me the Best Deals by Email</label>
                      </div>
                    </div>
                  </div> -->

              
                </div>
                
                
              </form>

            </div>
          </div>
        </div>
            <!-- <div class="col-md-8"></div> -->
            <div >
        <div class="travetting-title"><h2>Fare Summary</h2></div>
      </div>
      <!-- <div class="col-md-8"></div> -->
      <div >
        <div class="bg-white">
        <div class="fareSmry-header LatoBold border-bottom">
          <p class="fareSmry-hdng mb-0"><span class="fareSmry-expand-icon cursor_pointer marR15 open"></span><span><b>Base Fare</b></span></p>
        </div>
        <div class="row">
          <div class="col-md-8"></div>
          <div class="col-md-4">
            <div class="adult-title1">
              <div class="rvw-sctn append_bottom15 make_relative" style="z-index: 1;">
                <div class="fareSmry-sctn">
                <?php
									$totaltaxandfee = 0 ;
									if(count($review_flight['travelerPricings']) > 0)
									{
										foreach($review_flight['travelerPricings'] as $kye => $traveller)
										{
											$totaltaxandfee = $totaltaxandfee + $traveller['totaltaxes'];
											$travellrtype = ucwords(strtolower(str_replace("HELD_","",$kye)));
									?>
                  <div class="fareSmry-wrap">
                    <p class="fareSmry-row">
                      <span class="fareSmry-field"><span>
                      <?php echo (($traveller['passengercount']) > 1) ? $travellrtype."(s)" : $travellrtype; ?>  
                      (<?php echo $traveller['passengercount'] ?> X <?php echo $review_flight['price']['currency_symbol']." ".number_format($traveller['eachbase'],2) ?>)</span></span>
                      <span class="font16 LatoBold text-right">
                      <span>
                      <?php echo $review_flight['price']['currency_symbol']." ".number_format($traveller['totalbase'],2) ?>					
                    	</span>
                      </span>
                    </p>
                  </div>
                  <?php
										}
									}
									?>
                </div>
                <div class="fareSmry-sctn">
                  <div class="fareSmry-header LatoBold">
                    <p class="fareSmry-hdng"><span class="fareSmry-expand-icon cursor_pointer marR15 open"></span><span>Fee &amp; Surcharges</span></p>
                    <span class="font16"><?php echo $review_flight['price']['currency_symbol']." ".number_format($totaltaxandfee,2); ?></span>
                  </div>
                </div>
                <div class="fareSmry-sctn reqPad-fareSmry-sctn">
                  <p class="fareSmry-row LatoBold">
                    <span class="font18 fareSmry-field"><span style="font-size: 16px; text-align: right; line-height: normal;">
                    <span>Total Amount:</span></span></span><span class="font20">
                    <span style="font-size: 16px; text-align: right; line-height: normal;"><span><?php echo $review_flight['price']['currency_symbol']." <span id='grand_total'>".number_format((floatval(str_replace(',', '', $review_flight['price']['total']))+$charity_amt),2)."</span>"; ?></span></span></span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

    </div>
  </div>


      </div>
      </div>

      <div class="buy-now-btn1 d-md-flex1 pb-4 mt-3">
        <button class="btn btn-secondary home-search-btn w-100 pt-0">Confirm & Book Now</button>
      </div>
    </div>


</section>
</form>
<?php
	}
	else
	{
		?>
		<div class="fix_header_mar_top" style="margin-top: 0px;">
		<div class="fli-intl-container prepend_top20 clearfix ">
			<div class="api_response_error">Sorry! Something went wrong. Please search your flight and choose a suitable flight offer price <a href="<?php echo base_url(); ?>search-flight-lookup">Click Here</a></div>
		</div>
		</div>
		<?php		
	}
	?>



