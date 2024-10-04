<section class="bannerform-sec single-form single-form1 flighttop-form" style="padding:0;">
  <!-- <div class="single-overlay"></div> -->
  <div class="container">
  <div class="home-banner-form-single bannerform-sec home p-2" id="travel-search-content2">
    <div class="row">
      <div class="col-md-6 col-6">
        <div class="destination-airport"><h2 class="text-white"><i class="fa fa-plane"></i>&nbsp;&nbsp;<?php echo $originLocationCode; ?> - <?php echo $origincity; ?></h2></div>
      </div>
      <!-- <div class="col-md-2 col-1"><div class="arrowboth text-center">&nbsp;</div></div> -->
      <div class="col-md-6 col-6 text-right">
        <div class="destination-airport"><h2 class="text-white"><i class="fa fa-plane"></i>&nbsp;&nbsp;<?php echo $destinationLocationCode; ?> - <?php echo $depcity; ?></h2></div>
      </div>
      <div class="col-md-12">
              <div class="home-banner-form bg-transparent mt-lg-2 mt-3">
            <form method="post" action="<?php echo base_url('search-flight-lookup') ?>" name="route_search_frm" id="route_search_frm" class="travl-search-advanced clearfix">
              <input type="hidden" name="searchprogress" id="searchprogress" value="searchprogress">
              <input type="hidden" name="nonStop" id="nonStop" value="<?php echo !empty($nonStop) ? $nonStop : "all"; ?>">
              <input type="hidden" name="includedAirlineCodes" id="includedAirlineCodes" value="<?php echo $includedAirlineCodes ?>">
              <input type="hidden" name="maxPrice" id="maxPrice" value="<?php echo $maxPrice ?>">
              
              <div class="text-center11">
              <label class="radio-inline">
                  <input type="radio" id="one-way" value="One way" class="route_travel_type" <?php echo ($travel_type == "One way") ? 'checked="checked"' : "" ?> name="travel_type">
                      <strong class="text-white">One way</strong>
                  </label>
                  <label class="radio-inline">
                  <input type="radio" id="roundtrip" value="Roundtrip" class="route_travel_type" <?php echo ($travel_type == "Roundtrip") ? 'checked="checked"' : "" ?> name="travel_type">
                      <span></span>
                      <strong class="text-white">Roundtrip</strong>
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
                        <input type="text" class="<?php echo ($travel_type == "Roundtrip") ? 'quote_frm' : "" ?> form-control" autocomplete="off" name="date_to" id="date_to" value="<?php echo $returnDate; ?>" placeholder="Date To">
                      </div>
                </div>
                <div class="col-sm col-12">
                  <div class="form-group form-style">
                      <label class="level-home-form">Guests</label>
                      <input type="hidden" class="form-control" autocomplete="off" name="traveller" id="traveller" value="<?php echo $totaltraveller ?>">
                      <div class="form-control" data-toggle="dropdown" aria-expanded="false">
                      <div class="travelerselectbox"><?php echo $totaltraveller ?> <?php echo ($totaltraveller > 1) ? 'passengers' : 'passenger';?> <?php echo $travelClass; ?></div>
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
              
                <div class="col-sm col-12">
                    <button class="home-search-btn"><i class="fa fa-long-arrow-right"></i></button>
                   
                </div>
              </div>/
            </form>
            

       
        
          </div>
      </div>
    </div>
    </div>
  </div>
</section>
<section class="pt-4 bg-lightcu">
        <div class="loading_container mt-5" id="loading_container" style="display:none;">
         <div class="image-top pt72">   
         </div>
         <section class="image-top pt72">
            <div class="container">
               <div class="fromto">
                     <h2><?php echo $originLocationCode; ?> to <?php echo $destinationLocationCode; ?> <span> <?php echo date("D, M d,Y",strtotime($departureDate)); ?></span></h2>
                     <p>Prices are <?php echo !empty($returnDate) ? 'ROUNDTRIP' : "ONEWAY" ?> per person, include all taxes and fees, but do not include baggage fees</p>
               </div>
               <div class="wait">
               <p>Please wait....While we search the cheapest airfares for you,from over 500 Airlines. </p>
               </div>
                  <img src="<?php echo base_url('assets/images/Flight_GIF_Blue.gif'); ?>" alt="tour" class="img-responsive center-img">
                  
                  <div class="row">
                     <div class="col-md-2"></div>
                     <div class="col-md-3">
                     <div class="starting-point text-center">
                           <h3><?php echo $originLocationCode; ?></h3>
                           <h2><?php echo $origincity; ?> to <?php echo $depcity; ?> <span><?php echo date("D, M d,Y",strtotime($departureDate)); ?></span></h2>
                           <p><?php echo date("D, d/m/Y",strtotime($departureDate)); ?></p>
                     </div>
                     </div>
                     <div class="col-md-2 starting-point"><img src="<?php echo base_url('assets/images/arrow-both.svg'); ?>" alt="tour" width="30px" class="img-responsive center-img"></div>
                     <div class="col-md-3">
                        <div class="starting-point text-center">
                           <h3><?php echo $destinationLocationCode; ?></h3>
                           <h2><?php echo $origincity; ?> to <?php echo $depcity; ?> <span><?php echo date("D, M d,Y",strtotime($departureDate)); ?></span></h2>
                           <p><?php echo date("D, d/m/Y",strtotime($departureDate)); ?></p>
                     </div>
                     </div>
                     <div class="col-md-2"></div>
               </div>
            </div>
         </section>
        </div>
  <div class="container" id="search_results">
    <div class="row">
      <textarea name="carriers" style="display:none;" id="carriers"><?php echo $carriers; ?></textarea>
      <textarea name="locations" style="display:none;" id="locations"><?php echo $locations; ?></textarea>
      <textarea name="aircraft" style="display:none;" id="aircraft"><?php echo $aircraft; ?></textarea>

      <div class="col-md-3">

        <div class="form-checkedlist include-airlines" >
        <div id="accordion">
          <!--<h3>FILTERS</h3>-->
          <div>
                <div> 
                <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <div>
                                    <p class=" includeair-title">
                                        <b>Filter Option<i class="fa fa-chevron-down float-right"></i></b>
                                    </p></div>
                            </a>
                            <div class="clear_option"><a href="javascript:void(0);" class="clear_filter_option">Reset Filter</a></div>
                            <div class="collapse show" id="collapseExample">
                            <div class="border-bottom mb-3"></div>
                            <div class="check-redio-style">
                            <div class="form-check">
                                <input class="form-check-input flitersearch" type="radio" name="stopfiltertype" <?php echo ($nonStop == "all") ? 'checked="checked"' : "" ;?> id="stopfiltertype1" value="all">
                                <p class="max_price_range form-group1" for="stoptype1">
                                All Stop
                                </p>
                             </div>
                             </div>
                          <!--</div>-->
                          <div>	
                              <div class="check-redio-style form-group">
                                <div class="form-check">
                                  <input class="form-check-input flitersearch" type="radio" <?php echo ($nonStop == "non") ? 'checked="checked"' : "" ;?> name="stopfiltertype" id="stopfiltertype2" value="non">
                                  <p class="max_price_range form-group1" for="stoptype2">
                                    Non Stop </p>
                                </div>
                             </div>
                          </div>
                <div class="include-airline mt-3">
                      <p for="customRange1" class="max_price_range form-group includeair-title"><b>Maximum Price</b></p>
                      <div class="border-bottom mb-3"></div>
                      <div style="clear:both;"></div>
                      <div class="label_container">
                        <div id="tPrice" class="sliderstartcontainer">$<?php echo $lowestflterprice;?></div>
                        <div class="slidercontainer" style="position:relative;">
                            <div id="relationship-status-output" class="relationship-status-output color-default">$0</div>                                                   
                        </div>
                        <div id="endprice" class="sliderendtcontainer">$<?php echo $highestflterprice;?></div>
                      </div>
                      <div>
                        <input type="range" id="relationship-status-slider" class="relationship-status-slider" value="<?php echo $maxPrice; ?>" min="<?php echo $lowestflterprice;?>" max="<?php echo $highestflterprice;?>" step="1">
                      </div>
                  </div>
                  <?php	
                  $includedAirlineCodesArr = array();
                  if(!empty($includedAirlineCodes))
                  {
                     $includedAirlineCodesArr = explode(",",$includedAirlineCodes);
                  }	
                  if(count($carrierfilters) > 0)
                  {
                  ?>           
                  <div class="form-group include-airline">
                    <p class="max_price_range form-group includeair-title"><b>Included Airline</b> </p>
                    <div class="border-bottom mb-3"></div>
                    <?php                                                
                              $optn=1;
                              foreach($carrierfilters as $key => $carrierfilter)
                              {
                              ?>
                              <div class="check-redio-style">
                                <div class="form-check">
                                  <input type="checkbox" class="form-check-input flitersearch" <?php echo in_array($carrierfilter['carriercode'],$includedAirlineCodesArr) ?  "checked='checked'" : ""; ?> value="<?php echo  $carrierfilter['carriercode'] ?>" name="includecarrieroption[]" id="includecarrieroption_<?php echo $optn; ?>">
                                  <label class="form-check-label" for="exampleCheck1"><?php echo  $carrierfilter['Name']; ?></label>
                                </div>
                              </div>
                              <?php
                              $optn++;
                              }
                              ?>

                        </div>
                      <?php
                      }
                  ?>
         </div>
            </div>
            </div>
        </div>
        </div>
      </div>
      
      
      <div class="col-md-9">
        <div class="row justify-content-end">
          <div class="col-md-3">
            <div class="totalresul text-right">
              <p><?php echo (count($searchdata) > 0) ? count($searchdata)." Result" : "";?> </p>
              </div>
          </div>
         
        </div>

        <!-- main block flight-search -->
      <?php
      if(count($searchdata) > 0)
      { ?>                
        <div class="right-block-new right-block p-3">
          <div class="exclu-btn">
            <h2>Limited Time Offer</h2>
            <!-- <h3><a href="tel:<?php //echo $this->Site_Model->support_phone_link; ?>"> Call Now For Exclusiv Fares Deals </a></h3> -->
            <p class="special-airport">Special Fare For <b><?php echo $origincity; ?> - <?php echo $depcity; ?></b></p>
          </div>
          <div class="right-block-new-price">
            <span>From</span>
            <h3>$<?php echo ($searchdata[0]['price']['grandTotal']-20); ?>*</h3>
            <small>price per adult</small>
          </div>
          <div class="right-block-travel">
          <?php
           $it=1;
                     if(count($searchdata[0]['itineraries']) > 0)  
                     {
                        foreach($searchdata[0]['itineraries'] as $itinerary)
                        {
                           $lt=1;
                           $addsectiontitle = ($it == 1) ? "Departure" : "Return";
                           foreach($itinerary['segments'] as $segment)
                           {
                            $addsectiontitle = ($lt == 1) ? $addsectiontitle : "";
                            
                     ?>
            <div class="row">
              <div class="col-lg-3 col-4">
                <div class="right-block-departure">
                  <p><b><?php echo $addsectiontitle; ?></b></p>  
                  <span>Departure On</span>  
                  <p><?php echo $segment['departure_iatacode']; ?> </p>
                  <small><?php echo $segment['origin_iataname']; ?></small>
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
                  <small><?php echo $segment['destination_iataname']; ?></small>
                </div>
              </div>
              <div class="col-lg-3 col-4">
                <p class="right-block-newdate"><b>D: <?php echo date('h:i a',strtotime($segment['departure_time'])) ?>  ,</b> <span><?php echo date('D, M d',strtotime($segment['departure_time'])) ?></span></p>
                <p class="right-block-newdate"><b>A: <?php echo date('h:i a',strtotime($segment['arrival_time'])) ?>,</b> <?php echo date('D, M d',strtotime($segment['arrival_time'])) ?></p>
              </div>
            </div>
          
            <?php
                             $lt++;
                           }
                           $it++;
                        }
                     }
                     ?>
          </div>
        
        </div>

        <?php 
      } ?>

        <?php /*?> under cutting banner end <?php */ ?>


    <?php
    if(count($searchdata) > 0)
    {
      // echo 'yes more than zero'; 
      // echo '<br>';
      // echo '<pre>';
      // print_r($searchdata);
      // exit;
        $ft=1;
      foreach($searchdata as $flight)
      {
        ?>
        <div class="mainflight-search-section">
			  <?php
			  if(count($flight['itineraries']) > 0)  
			  {
				  $it=1;
				  $dutime = 0;
				  $hr=0;
				  $min = 0;
				 
				  foreach($flight['itineraries'] as $itinerary)
				  {
					  $duration = str_replace("PT","",$itinerary['duration']);
					  $hours = 0;
					  $mins = 0;
					  if (strpos($duration, 'H') !== false) {
						$durationArr = explode("H",$duration);
						$hours = strtolower($durationArr[0]);
            $newdurationmin = (array_key_exists(1,$durationArr)) ? (int)str_replace("M","",$durationArr[1]) : 0;
						$mins = strtolower(str_replace("M","",$newdurationmin));
					  }
					  else
					  {
						$mins = strtolower($duration);
					  }
					  $sectiontitle = ($it == 1) ? "Departure" : "Return";
            $stopages = $itinerary['stopage'];
            // if(count($itinerary['segments']) > 0) 
            // {
            //   $sg=1;  
            //   $newhr = 0;
            //   $newmin =0;                                   
              // foreach($itinerary['segments'] as $segment)
              // {
              //     $segduration = str_replace("H",":",str_replace("PT","",$segment['duration']));
              //     $segduration = date("H:i:s",strtotime(str_replace("M",":00",$segduration)));
              //     $hr = $hr+date("H",strtotime($segduration));
              //     $hr1 = $hr+date("H",strtotime($segduration));
              //     $min = $min+date("i",strtotime($segduration));
              //     $min1 = $min+date("i",strtotime($segduration));
              //     $newduration = str_replace("PT","",$segment['duration']);
              //     //echo  $newduration."====".$segment['duration']."<br>";
              //     if (strpos($newduration, 'H') !== false) {
              //     $newdurationarr = explode("H",$newduration);
              //     $newdurationhrs = (int)$newdurationarr[0];
              //     $newdurationmin = (int)str_replace("M","",$newdurationarr[1]);
              //     }
              //     else
              //     {
              //          $newdurationhrs = 0;
              //          $newdurationmin = (int)str_replace("M","",$newdurationarr);
              //     }
              //     //echo $newdurationhrs."=======".$newdurationmin;
              //     $newhr = $newhr+$newdurationhrs;
              //     $newmin = $newmin+$newdurationmin;
              //     //$secs = strtotime($segduration)-strtotime("00:00:00");
                  //$dutime= $dutime+strtotime($segduration);
                  //echo date("H:i:s",strtotime($dutime+$secs))."=============".$secs."<br>";
                  ///echo $segduration."==========<b>";
                  //echo $segment['duration']."=====".date("H:i",$dutime)."======".$dutime."=======".strtotime($segduration)."======".$segduration;
                              
          
				          ?>
				          <div class="row">
				             <div class="col-md-9">
				                <div class="row align-items-center border-bottom-custom border-right">
                                  <div class="col-sm">
                                    <div class="airline-name">
                                      <p><?php //echo ($sg == 1) ? $sectiontitle : ""; ?></p>
                                      <h3><?php 
					  $sg=0;
					  foreach($itinerary['segments'] as $segment)
					  {
						  if($sg == 0)
						  {
							  echo $segment['carrierName']; 
						  }
							
					   $sg++;
					  }
					  ?></h3> 
                                      <p>Flight <?php echo $itinerary['aircraft_number']; ?></p>
                                    </div>
                                  </div>
                
                                  <div class="col-sm col-4">
                                    <div class="airline-time">
                                      <h3><?php echo date('D, M d',strtotime($itinerary['origin_departure_time'])) ?></h3>
                                      <p class="air-date"><?php echo date('h:i a',strtotime($itinerary['origin_departure_time'])) ?></p>
                                      <p class="air-port-name d-none d-lg-block"><?php echo $itinerary['origin_iataname']; ?> <?php echo $itinerary['origin_iatacode']; ?> </p>
                                      <p class="d-lg-none d-block air-port-name"><?php echo !empty($itinerary['origin_city']) ? $itinerary['origin_city']."," : ""; ?></p>
                                    </div>
                                  </div>
                                  <div class="col-sm col-4">
                                    <div class="flight-brief-layovers">
                                      <div class="flight-brief-layovers__flight_time">
                                        <span class="formatted_time"><?php echo $hours; ?>h</span> &nbsp;<span class="formatted_time"> <?php echo ($mins > 0) ? $mins."m" : ""; ?></span>
                                       
                                      </div>
                                      <main class="flight-brief-layovers__list">
                                        <div class="flight-brief-layovers__list-wrapper">
                                        <?php
                                            if(count($stopages) > 0)
                                            {
                                              
                                                  foreach($stopages as $key => $stopage)
                                                  {
                                                    // echo '<pre>';
                                                    //print_r($stopage);
                                                    //echo '</pre>';
                                                ?>
                                              <div class="flight-brief-layover">
                                                <div class="flight-brief-layover__iata">
                                                  <span><?php echo $key ?></span>
                                                </div>
                                              </div>
                                              <?php
                                                }
                                            }
                                          ?>
                                                                                                                                                                    
                                        </div>
                                      </main>
                                    </div>
                                  </div>
                
                                  <div class="col-sm col-4">
                                    <div class="airline-time text-right">
                                      <h3><?php echo date('D, M d',strtotime($itinerary['destination_departure_time'])) ?></h3>
                                      <p class="air-date"><?php echo date('h:i a',strtotime($itinerary['destination_departure_time'])) ?></p>
                                      <p class="air-port-name d-none d-lg-block"><?php echo $itinerary['destination_iataname']; ?> <?php echo $itinerary['destination_iatacode']; ?></p>
                                      <p class="d-lg-none d-block air-port-name"><?php echo !empty($itinerary['destination_city']) ? $itinerary['destination_city']."," : ""; ?></p>
                                    </div>
                                  </div>
                
                                 
                                  
                                  
                                  </div>
				             </div>
				             <?php
                                  if($it == 1){?>
				             <div class="col-md-3 rt-block-book-details">
				                <!--<div class="col-sm">-->
                                    <div class="airline-book text-center">
                                        <h3>$<?php echo $flight['price']['grandTotal'] ?></h3>
                                        <p>avg price per person</p>
                                        <a class="book_now" class="btn" href="javascript:void(0);" rel="<?php echo $flight['id']; ?>">Book</a>
                                      </div>
                                  <!--</div>-->
				             </div>
				              <?php } ?>
				          </div>
				         
                  
				          <?php $it++; 


                  //$sg++;
             // }

            //}
                  
          }
        }
        ?>
                 
              </div>
              <textarea name="offer_details" style="display:none;" id="offer_details_<?php echo $flight['id']; ?>"><?php echo $flight['offerdetails'] ?></textarea>
              <?php
              $ft++;
      }
    }
          

        
          else
          {
          ?>
          <div class="right-block">
                     <div class="select-list-bg">
                        <div class="row">
                           <div class="col-md-12 text-center">
                                 <div class="ticket-scroll-container error">
                                    <div class="ticket-details">
                                        <div class="api_response_error">Sorry! Something went wrong. Please search your flight and choose a suitable flight offer price.</div>
                                    </div>
                                 </div>
                           </div>                           
                        </div>
                     </div>			  
				      </div>
          <?php  
          }
        ?>
        

    

      </div>
      </div>
  </div>
</section>
<script>
         <?php
            if(empty($searchprogress))
            {
            //echo $originLocationCode."=========".$destinationLocationCode."=========".$destinationLocationCode;

            ?>
               document.getElementById('loading_container').style.display ='block';
               document.getElementById('travel-search-content2').style.display ='none';
               document.getElementById('search_results').style.display ='none';
               //document.getElementById('menul').style.display ='none';
              // document.getElementById('menu2').style.display ='none';
               //document.getElementById('menu3').style.display ='none';
               //document.getElementById('menu4').style.display ='none';
               //document.getElementById('menu5').style.display ='none';
               //document.getElementById('menu6').style.display ='none';
               document.route_search_frm.submit();
            <?php
            }
            ?>
            
            
      </script>
      
      
      