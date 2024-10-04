    <div id="search_container_2" class="h-400 hotelbanner">
        <div class="opacity-mask"></div>
        <!-- <div class="container"> -->
            
            <div class="formonbanner pt-5">
                <div class="bannerform-sec home packagetop-res-margin pt-5"> 
                    <div class="container">
                        <div class="home-banner-form ">
                        <?php
                          $filtersearchurl = "search-flight-lookup";
                          if($page == "hotel-flight")
                          {
                            $filtersearchurl = "search-package-lookup";
                          }
                          ?>
                          <form method="post" action="<?php echo base_url($filtersearchurl) ?>" name="hotel_search_frm" id="hotel_search_frm">
                          <input type="hidden" name="page" id="page" value="<?php echo $page; ?>">                                    
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
                                      <div class="col-md-4">
                                        Class
                                      </div>
                                      <div class="col-md-8">
                                        <select name="fare_class" class="travelClass" id="fare_class">
                                          <option value="ECONOMY" <?php echo ($travelClass == "ECONOMY") ? "selected='selected'" : ""; ?>>Economy</option>
                                          <option value="PREMIUM_ECONOMY" <?php echo ($travelClass == "PREMIUM_ECONOMY") ? "selected='selected'" : ""; ?>>Premium Economy</option>
                                          <option value="BUSINESS" <?php echo ($travelClass == "BUSINESS") ? "selected='selected'" : ""; ?>>Business</option>
                                          <option value="FIRST" <?php echo ($travelClass == "FIRST") ? "selected='selected'" : ""; ?>>First</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="row mb-4">
                                      <div class="col-md-8">
                                        Adults
                                      </div>
                                      <div class="col-md-4 col-xs-5">
                                        <div class="row">
                                          <div class="col-md-2 col-xs-2 text-center">																											
                                            <a href="javascript:void(0);" class="remove_traveller"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                          </div>
                                        <div class="col-md-4 col-xs-4 text-center">
                                          <input type="hidden" name="no_of_adults" id="no_of_adults" class="traveller_no" value="<?php echo $adults; ?>">
                                          <span id="adult_traveller_txt" class="traveller_txt"><?php echo $adults; ?></span>
                                        </div>
                                        <div class="col-md-2 col-xs-2 text-center">
                                        <a href="javascript:void(0);" class="add_traveller"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row mb-4">
                                      <div class="col-md-8 col-xs-6">
                                        Children under 12 years
                                      </div>
                                      <div class="col-md-4 col-xs-5">
                                        <div class="row">
                                          <div class="col-md-2 col-xs-2 text-center">																										
                                          <a href="javascript:void(0);" class="remove_traveller"><i class="fa fa-minus" aria-hidden="true"></i></a>		
                                          </div>
                                        <div class="col-md-4 col-xs-4 text-center">
                                        <input type="hidden" name="no_of_child" id="no_of_child" class="traveller_no" value="<?php echo $child; ?>">
                                        <span id="child_traveller_txt" class="traveller_txt"><?php echo $child; ?></span>
                                        </div>
                                        <div class="col-md-2 col-xs-2 text-center">
                                          <a href="javascript:void(0);" class="add_traveller"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row mb-4">
                                      <div class="col-md-8 col-xs-6">
                                        Infants under 2 years	
                                      </div>
                                      <div class="col-md-4 col-xs-5">
                                        <div class="row">
                                          <div class="col-md-2 col-xs-2 text-center">
                                          <a href="javascript:void(0);" class="remove_traveller"><i class="fa fa-minus" aria-hidden="true"></i></a>		
                                          </div>
                                        <div class="col-md-4 col-xs-4 text-center">
                                        <input type="hidden" name="no_of_infant" id="no_of_infant" class="traveller_no" value="<?php echo $infants; ?>">
                                        <span id="infants_traveller_txt" class="traveller_txt"><?php echo $infants; ?></span>
                                        </div>
                                        <div class="col-md-2 col-xs-2 text-center">																										
                                          <a href="javascript:void(0);" class="add_traveller"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="container">
                                  <div class="rowcontainer btncontainer text-center">
                                    <div class='col-md-12 done-bg'>
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
              <input type="hidden" class="hoteldestination quote_frm form-control routeorigincode" autocomplete="off" id="hotel_city" name="hotel_city" value="<?php echo $hotel_city; ?>" placeholder="City / Hotel / Area">
                                         <input type="hidden" class="destinationId form-control quote_frm" autocomplete="off" value="<?php echo $destinationId; ?>" id="destinationId" name="destinationId">
                                        
                                    <input type="hidden" name="searchflag" id="searchflag" value="1">  
                        </form>
                        </div>
                    </div>
                </div> 
            </div>
            <!-- <div class="banner-rt-top1  text-white text-center">
                <h2 class="text-white">Where would you love to go? </h2>
                <p class="text-white">Make travelling happen today. <br>Call us here <a href="tel:+18867854320" class="text-white"><strong>(886) 785 4320</strong> </a></p>
            </div> -->

        <!-- </div> -->
    </div>
    <?php 
if(!empty($searchprogress))
{
?>
<section class="hotel-sec">
  <div class="container">
  <?php
    //  echo '<pre>';
    //   print_r($hoteldata['hoteldetails']);
    //   echo '</pre>';
      if(array_key_exists("hoteldetails",$hoteldata) && count((array)$hoteldata['hoteldetails']) > 0)
      {
        foreach($hoteldata['hoteldetails'] as $hotel)
        {
      ?>
        <div class="row no-gutters mb-5 justify-content-center align-items-center">
          
            <div class="col-md-4">
            <div class="hotel-info">
            <a target="_blank" href="<?php echo base_url('hotel-details/'.$hotel['id']); ?>">
            <div class="hotel-img">
            <img src="<?php echo $hotel['image'] ?>" style="height:340px;" alt="hotel image">
            <div class="hotel-text">
            <!-- <h2>BED & BREAKFAST, ALL INCLUSIVE</h2> -->
            <h3><?php echo $hotel['name'] ?></h3>
            </div>
            </div></a>
            </div>

            </div>

            <div class="col-md-8">
            <div class="hotelrt pb-2">

            <div class="row no-gutters align-items-center">
            <div class="col-md-6">
            <h2><?php echo $hotel['name'] ?></h2>
            <ul>
            <li><a href="javascript:void(0);" class="searchflight"><i class="fa fa-plane"></i><p>Flight</p></a></li>
            <li><a href="javascript:void(0);" class="searchhotel"><i class="fa fa-hotel"></i><p>Hotel</p></a></li>
            <!-- <li><i class="fa fa-cutlery"></i><p>Meal</p></li>
            <li><i class="fa fa-wheelchair-alt"></i><p>Activity</p></li> -->
            </ul>

            <ul class="itinerary-listt mt-2">
            <li><i class="fa fa-calendar"></i> <?php echo date("M d,Y",strtotime($date_from)); ?> / <?php echo ucwords($hotel['fullyBundledPricePerStay']); ?></li>
            <li><i class="fa fa-plane"></i> <a href="#" class="text-dark">Origin</a></li>
            <li><i class="fa fa-ellipsis-v"></i></li>
            <li><i class="fa fa-plane"></i> <a href="#" class="text-dark">Destination</a></li>
            <li><i class="fa fa-plane"></i> <?php echo $depcity; ?> Airport</li>
            <li><i class="fa fa-address-card"></i> <?php echo $hotel['address']; ?></li>
            <?php echo ($hotel['freeCancellation'] == 1) ? "<li><i class='fa fa-check' aria-hidden='true'></i>FREE cancellation</li>" : ""; ?> 
            <?php echo ($hotel['paymentPreference'] == 1) ? "<li><i class='fa fa-check' aria-hidden='true'></i>No prepayment needed</li>" : ""; ?></li>           
            <!-- <li><i class="fa fa-spoon"></i> Bed &amp; Breakfast, All Inclusive</li> -->
            <li class="d-none"><i class="fa fa-plane"></i> London Heathrow - <a href="#">See alternate flights <i class="fa fa-angle-right"></i></a></li>
            <li class="d-none"><i class="fa fa-spoon"></i> Bed &amp; Breakfast, All Inclusive - <a href="#">See more room types <i class="fa fa-angle-right"></i></a></li>
            </ul>
            </div>
            <div class="col-md-6">
            <div class="itinerary_btn bdr1 text-center border p-1 m-2">
            <div class="package-include text-left">
              <h3> What's Included</h3>
                <ul>
                  <li><i class="fa fa-check-square-o"></i> <span>5 Nights / 6 Days stay.</span> </li>
                  <li><i class="fa fa-check-square-o"></i> <span>Fly with Emirates - Direct flight.</span></li>
                  <li><i class="fa fa-check-square-o"></i> <span>15% Early booking discount applied.</span></li>
                  <li><i class="fa fa-check-square-o"></i> <span>Enjoy our rooftop pool, kids’ club, and spa.</span></li>
                  <li><i class="fa fa-check-square-o"></i> <span>Free shuttle will take you to the beach and nearby mall.</span></li>
                  <!-- <li>44th-floor retro American diner with a bowling alley.</li>
                  <li>Private airport transfers.</li>
                  <li>Meals included.</li> -->
                </ul>
            </div>
            <p>for <span> <?php 
            $hotelprice = (float)str_replace("$","",$hotel['price']);
            $price = $hotelprice+$flightfare;
            echo "$".ceil($price); ?></span></p>
            <div class="star-rating-hotel">
            <?php
                    if($hotel['starRating'] > 0)
                    {
                      $totalrate = 5;
                      if($hotel['starRating'] > 0)
                      {
                        for($r=1;$r<=$hotel['starRating'];$r++)
                        {
                        ?>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <?php  
                        }
                      }
                      $remrate = $totalrate - (int)$hotel['starRating'];
                      //echo $totalrate."=====".$hotel['starRating']."======".$remrate;
                      if($remrate > 0)
                      {
                        for($er=1;$er<=$remrate;$er++)
                        {
                        ?>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <?php  
                        }
                      }
                    }
                    ?>
           <a target="_blank" href="<?php echo base_url('hotel-details/'.$hotel['id']); ?>">view details</a>

           <a class="m-0 text-decoration-none text-white text-center pt-1" href="<?php echo base_url('hotel-details/'.$hotel['id']); ?>"><button class="btn btn-primary btn-sm home-search-btn1 text-center pt-1">Book Now</button></a>
            <!--<a class="m-0 text-decoration-none text-white d-inline btnEnquire" href="#"><button class="btn btn-secondary btn-sm">Enquire Now <i class="fa fa-angle-right"></i></button></a>-->
            </div>
            </div>
            </div>


            <!-- <div class="incllud">
            <p><i class="fa fa-check-circle-o"></i> <strong>What's Included</strong></p>
            <ul class="listt">
            <li class="">New York &amp; Cancun<br>3 Nights at 4 - RIU Plaza Hotel<br>7 Nights at 5 - Now Emerald Cancun Hotel &amp; Resort<br>11nights from 1299pp<br>Book now with a low deposit of only 49pp</li><span class="toggle-included text-primary less d-none">Show less</span>
            </ul>
            </div> -->



            </div>
            </div>
            </div>
           
            </div>
        <?php
        }
      }
      else
      {
      ?>
      <div class="col-md-12 text-center">
        <label style="font-weight:bold;">Search your hotel in your favorite destination and get cheapest hotel price or avail the best offers by reaching out to us. Call us now here in the toll free number <a style="color: #ffa500 !important;" href="tel:<?php echo $this->Site_Model->support_phone_link; ?>"><?php echo $this->Site_Model->support_phone; ?></a></label>
      </div>
      <?php
      }
      ?>
</div>
</section>
<?php
}
else
{
?>
<section class="pt-5 pb-5 single-content-bg">
<div class="container">
    <div class="row">
    <div class="col-md-12 text-center">
      <label style="font-weight:bold;">Search your hotel in your faviourite destination and get chipest hotel price or get best offer price  Call toll free number <a style="color: #ffa500 !important;" href="tel:<?php echo $this->Site_Model->support_phone_link; ?>"><?php echo $this->Site_Model->support_phone; ?></a></label>
    </div>
    </div>
</div>
</section>
<?php   
}
?>
<section class="include-hotel-sec">
  <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="Vegas-tab" data-toggle="tab" href="#Vegas" role="tab" aria-controls="Vegas" aria-selected="true">Las Vegas</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="newyork-tab" data-toggle="tab" href="#newyork" role="tab" aria-controls="newyork" aria-selected="false">New York</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="orlando-tab" data-toggle="tab" href="#orlando" role="tab" aria-controls="orlando" aria-selected="false">Orlando</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="orlando-tab1" data-toggle="tab" href="#orlando1" role="tab" aria-controls="orlando1" aria-selected="false">Miami</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="orlando-tab2" data-toggle="tab" href="#orlando2" role="tab" aria-controls="orlando2" aria-selected="false">Los Angeles</a>
          </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="Vegas" role="tabpanel" aria-labelledby="Vegas-tab">    
              <div class="row">
                  <div class="col-md-4">
                      <div class="hotel-list mb-3">
                        <img src="<?php echo base_url('assets/images/LAS-VEGAS/Sin-City-Hostel-Las-Vegas.webp');?>" alt="flight hotel">
                        <div class="hotel-list-content">
                          <h2>Sin City Hostel Las Vegas</h2>
                          <a href="<?php echo base_url('hotel-details/729145184'); ?>" class="get-btn">Get Best Deal</a>
                        </div>
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="hotel-list mb-3">
                      <img src="<?php echo base_url('assets/images/LAS-VEGAS/Hostel-Cat.webp');?>" alt="flight hotel">
                      <div class="hotel-list-content">
                        <h2>Hostel Cat</h2>
                        <a href="<?php echo base_url('hotel-details/457275'); ?>" class="get-btn">Get Best Deal</a>
                      </div>
                    </div>
                </div>

                <div class="col-md-4">
                  <div class="hotel-list mb-3">
                    <img src="<?php echo base_url('assets/images/LAS-VEGAS/Silver-Sevens-Hotel-Casino.webp');?>" alt="flight hotel">
                    <div class="hotel-list-content">
                      <h2>Silver Sevens Hotel & Casino</h2>
                      <a href="<?php echo base_url('hotel-details/193218'); ?>" class="get-btn">Get Best Deal</a>
                    </div>
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="hotel-list mb-3">
                    <img src="<?php echo base_url('assets/images/LAS-VEGAS/Serene-Vegas-Boutique-Hotel.webp');?>" alt="flight hotel">
                    <div class="hotel-list-content">
                      <h2>Serene Vegas Boutique Hotel</h2>
                      <a href="<?php echo base_url('hotel-details/669640'); ?>" class="get-btn">Get Best Deal</a>
                    </div>
                  </div>
              </div>

              <div class="col-md-4">
                <div class="hotel-list mb-3">
                  <img src="<?php echo base_url('assets/images/LAS-VEGAS/the-Las-Vegas.webp');?>" alt="flight hotel">
                  <div class="hotel-list-content">
                    <h2>the D Las Vegas</h2>
                    <a href="<?php echo base_url('hotel-details/110925'); ?>" class="get-btn">Get Best Deal</a>
                  </div>
                </div>
            </div>

            <div class="col-md-4">
              <div class="hotel-list mb-3">
                <img src="<?php echo base_url('assets/images/LAS-VEGAS/Downtowner-Boutique-Hotel.webp');?>" alt="flight hotel">
                <div class="hotel-list-content">
                  <h2>Downtowner Boutique Hotel</h2>
                  <a href="<?php echo base_url('hotel-details/540979'); ?>" class="get-btn">Get Best Deal</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="newyork" role="tabpanel" aria-labelledby="newyork-tab">

            <div class="row">
                  <div class="col-md-4">
                      <div class="hotel-list mb-3">
                        <img src="<?php echo base_url('assets/images/NEW-YORK/Kamway-Lodge-Travel.webp');?>" alt="flight hotel">
                        <div class="hotel-list-content">
                          <h2>Kamway Lodge & Travel</h2>
                          <a href="<?php echo base_url('hotel-details/1263761664'); ?>" class="get-btn">Get Best Deal</a>
                        </div>
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="hotel-list mb-3">
                      <img src="<?php echo base_url('assets/images/NEW-YORK/Central-Park-West-Hostel.webp');?>" alt="flight hotel">
                      <div class="hotel-list-content">
                        <h2>Central Park West Hostel</h2>
                        <a href="<?php echo base_url('hotel-details/561017'); ?>" class="get-btn">Get Best Deal</a>
                      </div>
                    </div>
                </div>

                <div class="col-md-4">
                  <div class="hotel-list mb-3">
                    <img src="<?php echo base_url('assets/images/NEW-YORK/NY-Moore-Hostel.webp');?>" alt="flight hotel">
                    <div class="hotel-list-content">
                      <h2>NY Moore Hostel</h2>
                      <a href="<?php echo base_url('hotel-details/453028'); ?>" class="get-btn">Get Best Deal</a>
                    </div>
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="hotel-list mb-3">
                    <img src="<?php echo base_url('assets/images/NEW-YORK/31-Street-Broadway-Hotel.webp');?>" alt="flight hotel">
                    <div class="hotel-list-content">
                      <h2>31 Street Broadway Hotel</h2>
                      <a href="<?php echo base_url('hotel-details/634418464'); ?>" class="get-btn">Get Best Deal</a>
                    </div>
                  </div>
              </div>

              <div class="col-md-4">
                <div class="hotel-list mb-3">
                  <img src="<?php echo base_url('assets/images/NEW-YORK/Bowery-Grand-Hotel.webp');?>" alt="flight hotel">
                  <div class="hotel-list-content">
                    <h2>Bowery Grand Hotel</h2>
                    <a href="<?php echo base_url('hotel-details/425346'); ?>" class="get-btn">Get Best Deal</a>
                  </div>
                </div>
            </div>

            <div class="col-md-4">
              <div class="hotel-list mb-3">
                <img src="<?php echo base_url('assets/images/NEW-YORK/Cozy-and-Quiet.webp');?>" alt="flight hotel">
                <div class="hotel-list-content">
                  <h2>Cozy and Quiet</h2>
                  <a href="<?php echo base_url('hotel-details/765552384'); ?>" class="get-btn">Get Best Deal</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="tab-pane fade" id="orlando" role="tabpanel" aria-labelledby="orlando-tab">
            <div class="row">
                  <div class="col-md-4">
                      <div class="hotel-list mb-3">
                        <img src="<?php echo base_url('assets/images/ORLANDO/Maingate-Lakeside-Resort.webp');?>" alt="flight hotel">
                        <div class="hotel-list-content">
                          <h2>Maingate Lakeside Resort</h2>
                          <a href="<?php echo base_url('hotel-details/152745'); ?>" class="get-btn">Get Best Deal</a>
                        </div>
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="hotel-list mb-3">
                      <img src="<?php echo base_url('assets/images/ORLANDO/Maingate-Florida-Hotel.webp');?>" alt="flight hotel">
                      <div class="hotel-list-content">
                        <h2>Maingate Florida Hotel</h2>
                        <a href="<?php echo base_url('hotel-details/133927'); ?>" class="get-btn">Get Best Deal</a>
                      </div>
                    </div>
                </div>

                <div class="col-md-4">
                  <div class="hotel-list mb-3">
                    <img src="<?php echo base_url('assets/images/ORLANDO/Ambassador-Inn.webp');?>" alt="flight hotel">
                    <div class="hotel-list-content">
                      <h2>Ambassador Inn</h2>
                      <a href="<?php echo base_url('hotel-details/481466'); ?>" class="get-btn">Get Best Deal</a>
                    </div>
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="hotel-list mb-3">
                    <img src="<?php echo base_url('assets/images/ORLANDO/stayable-suites-kissimmee-east.webp');?>" alt="flight hotel">
                    <div class="hotel-list-content">
                      <h2>Stayable Suites Kissimmee East</h2>
                      <a href="<?php echo base_url('hotel-details/405956768'); ?>" class="get-btn">Get Best Deal</a>
                    </div>
                  </div>
              </div>

              <div class="col-md-4">
                <div class="hotel-list mb-3">
                  <img src="<?php echo base_url('assets/images/ORLANDO/Knights-Inn-Maingate-Kissimmee-Orlando.webp');?>" alt="flight hotel">
                  <div class="hotel-list-content">
                    <h2>Knights Inn Maingate Kissimmee Orlando</h2>
                    <a href="<?php echo base_url('hotel-details/203438'); ?>" class="get-btn">Get Best Deal</a>
                  </div>
                </div>
            </div>

            <div class="col-md-4">
              <div class="hotel-list mb-3">
                <img src="<?php echo base_url('assets/images/ORLANDO/Weekend-Getaway-Studio-Near-Theme-Parks-and-Golf-Courses.webp');?>" alt="flight hotel">
                <div class="hotel-list-content">
                  <h2>Weekend Getaway Studio Near Theme Parks and Golf Courses</h2>
                  <a href="<?php echo base_url('hotel-details/2229490944'); ?>" class="get-btn">Get Best Deal</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="tab-pane fade" id="orlando1" role="tabpanel" aria-labelledby="orlando-tab1">



              <div class="row">
                  <div class="col-md-4">
                      <div class="hotel-list mb-3">
                        <img src="<?php echo base_url('assets/images/Miami/South-Beach-Rooms-and-Hostel.webp');?>" alt="flight hotel">
                        <div class="hotel-list-content">
                          <h2>South Beach Rooms and Hostel</h2>
                          <a href="<?php echo base_url('hotel-details/708726368'); ?>" class="get-btn">Get Best Deal</a>
                        </div>
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="hotel-list mb-3">
                      <img src="<?php echo base_url('assets/images/Miami/posh-south-beach-hostel,a-south-beach-group-hotel.webp');?>" alt="flight hotel">
                      <div class="hotel-list-content">
                        <h2>Posh South Beach Hostel, a South Beach Group Hotel</h2>
                        <a href="<?php echo base_url('hotel-details/427527'); ?>" class="get-btn">Get Best Deal</a>
                      </div>
                    </div>
                </div>

                <div class="col-md-4">
                  <div class="hotel-list mb-3">
                    <img src="<?php echo base_url('assets/images/Miami/Bikini-Hostel-Cafe-Beer-Garden.webp');?>" alt="flight hotel">
                    <div class="hotel-list-content">
                      <h2>Bikini Hostel, Cafe & Beer Garden</h2>
                      <a href="<?php echo base_url('hotel-details/447405'); ?>" class="get-btn">Get Best Deal</a>
                    </div>
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="hotel-list mb-3">
                    <img src="<?php echo base_url('assets/images/Miami/Bedsn-Drinks-Hostel.webp');?>" alt="flight hotel">
                    <div class="hotel-list-content">
                      <h2>Beds n' Drinks Hostel</h2>
                      <a href="<?php echo base_url('hotel-details/478065'); ?>" class="get-btn">Get Best Deal</a>
                    </div>
                  </div>
              </div>

              <div class="col-md-4">
                <div class="hotel-list mb-3">
                  <img src="<?php echo base_url('assets/images/Miami/Freehand-Miami.webp');?>" alt="flight hotel">
                  <div class="hotel-list-content">
                    <h2>Freehand Miami</h2>
                    <a href="<?php echo base_url('hotel-details/110113'); ?>" class="get-btn">Get Best Deal</a>
                  </div>
                </div>
            </div>

            <div class="col-md-4">
              <div class="hotel-list mb-3">
                <img src="<?php echo base_url('assets/images/Miami/gorgeous-apartment-walking-distance-to-beach.webp');?>" alt="flight hotel">
                <div class="hotel-list-content">
                  <h2>Gorgeous Apartment Walking Distance to Beach!!</h2>
                  <a href="<?php echo base_url('hotel-details/1205197216'); ?>" class="get-btn">Get Best Deal</a>
                </div>
              </div>
            </div>
          </div>




        </div>
        <div class="tab-pane fade" id="orlando2" role="tabpanel" aria-labelledby="orlando-tab2">

              <div class="row">
                  <div class="col-md-4">
                      <div class="hotel-list mb-3">
                        <img src="<?php echo base_url('assets/images/LOS-ANGELES/Boutique-Hostel.webp');?>" alt="flight hotel">
                        <div class="hotel-list-content">
                          <h2>Boutique Hostel</h2>
                          <a href="<?php echo base_url('hotel-details/2337138144'); ?>" class="get-btn">Get Best Deal</a>
                        </div>
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="hotel-list mb-3">
                      <img src="<?php echo base_url('assets/images/LOS-ANGELES/LAX-guest-house.webp');?>" alt="flight hotel">
                      <div class="hotel-list-content">
                        <h2>Freehand Los Angeles</h2>
                        <a href="<?php echo base_url('hotel-details/523154400"'); ?>" class="get-btn">Get Best Deal</a>
                      </div>
                    </div>
                </div>

                <div class="col-md-4">
                  <div class="hotel-list mb-3">
                    <img src="<?php echo base_url('assets/images/LOS-ANGELES/The-Irolo-House.webp');?>" alt="flight hotel">
                    <div class="hotel-list-content">
                      <h2>The Irolo House</h2>
                      <a href="<?php echo base_url('hotel-details/2348443616"'); ?>" class="get-btn">Get Best Deal</a>
                    </div>
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="hotel-list mb-3">
                    <img src="<?php echo base_url('assets/images/LOS-ANGELES/The-Rumi-Hostel.webp');?>" alt="flight hotel">
                    <div class="hotel-list-content">
                      <h2>The Rumi Hostel</h2>
                      <a href="<?php echo base_url('hotel-details/1846327776'); ?>" class="get-btn">Get Best Deal</a>
                    </div>
                  </div>
              </div>

              <div class="col-md-4">
                <div class="hotel-list mb-3">
                  <img src="<?php echo base_url('assets/images/LOS-ANGELES/8th-and-Ardmore-Hostel.webp');?>" alt="flight hotel">
                  <div class="hotel-list-content">
                    <h2>8th and Ardmore - Hostel</h2>
                    <a href="<?php echo base_url('hotel-details/1268959712'); ?>" class="get-btn">Get Best Deal</a>
                  </div>
                </div>
            </div>

            <div class="col-md-4">
              <div class="hotel-list mb-3">
                <img src="<?php echo base_url('assets/images/LOS-ANGELES/Melrose-Hostel.webp');?>" alt="flight hotel">
                <div class="hotel-list-content">
                  <h2>Melrose Hostel</h2>
                  <a href="<?php echo base_url('hotel-details/710406272'); ?>" class="get-btn">Get Best Deal</a>
                </div>
              </div>
            </div>
          </div>




        </div>
      </div>

  </div>
</section>


<section class="joinclub-flighthotel-sec">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="join-club-text text-left text-white">
                      <h2>WHY WOULD YOU SELECT THE BEST TRAVEL PARTNER NOW?</h2>
                      <p>Feeling too baffled of why to choose us? Here is the list of the reasons that shall make you feel connected with us and also select us to ensure that you are able to embark into some of the best and the exotic destinations of the globe which are as follows: </p>
                      <ul>
                          <li><i class="fa fa-check-square-o" aria-hidden="true"></i> <span>Top airlines available</span> </li>
                          <li><i class="fa fa-check-square-o" aria-hidden="true"></i> <span>Massive discounts available for hotels and flights</span>  </li>
                          <li><i class="fa fa-check-square-o" aria-hidden="true"></i> <span>Easy and hassle free bookings available</span> </li>
                          <li><i class="fa fa-check-square-o" aria-hidden="true"></i> <span>Easy and secured payments</span> </li>
                      </ul>
                      <P><img src="<?php echo base_url('assets/images/flight-hotel-style.jpg');?>"  class="flight-hotel-round" alt="flight hotel"> INSPIRED BY TRAVEL + <?php echo $this->Site_Model->websitename; ?></P>
                  </div>
              </div>
          </div>
      </div>
  </section>

<section class="midle-ph-sec mt-5 mb-5">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="join-club-text text-center">
                      <h2>MAKE EASY BOOKINGS HAPPEN NOW</h2>
                      <a href="tel:<?php echo $this->Site_Model->support_phone_link; ?>"><?php echo $this->Site_Model->support_phone; ?></a>
                      <p>Your travel experts are here to make each trip of yours more memorable and exciting </p>
                  </div>
              </div>
          </div>
      </div>
  </section>



<section class="join-club-register-sec mt-5 mb-5">
    <div class="container-fluid">
        <div class="row align-items-center no-gutters">
          <div class="col-md-3">
            <img src="<?php echo base_url('assets/images/flight-middle.webp');?>" width="w-100" alt="midle image">
          </div>
            <div class="col-md-9">
                <div class="join-club-text join-club-register-bg pl-5 text-white">
                    <h2>BE A PART OF OUR ELITE CLUB </h2>
                    <p>Pamper yourself by flying to best places of the globe with massive discounts on hotels/ flights </p>
                    <a href="tel:<?php echo $this->Site_Model->support_phone_link; ?>">Start Free call</a>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="waytoexplore-sec">
  <div class="container">
      <div class="row align-items-center no-gutters">
        <div class="col-md-3">
          <h2>Popular Hotels </h2>
        </div>
          <div class="col-md-9">
            <div class="row mb-5">
              <div class="col-md-4">
                <div class="row align-items-center">
                  <div class="col-md-5">
                    <div class="popular-airlines">
                      <a href="<?php echo base_url('washington'); ?>"><img src="<?php echo base_url('assets/images/Madrid.webp');?>" width="w-100" alt="midle image"></a>
                    </div>
                  </div>
    
                  <div class="col-md-7">
                    <div class="popular-airlines">
                      <h6><b><a href="<?php echo base_url('washington'); ?>" class="text-dark">Washington</a></b></h6>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="row align-items-center">
                  <div class="col-md-5">
                    <div class="popular-airlines">
                    <a href="<?php echo base_url('philadelphia'); ?>"><img src="<?php echo base_url('assets/images/Paris-des.jpg');?>" width="w-100" alt="midle image"></a>
                    </div>
                  </div>
    
                  <div class="col-md-7">
                    <div class="popular-airlines">
                      <h6><b><a href="<?php echo base_url('philadelphia'); ?>" class="text-dark">Philadelphia</a></b></h6>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-4">
                <div class="row align-items-center">
                  <div class="col-md-5">
                    <div class="popular-airlines">
                    <a href="<?php echo base_url('houston'); ?>"><img src="<?php echo base_url('assets/images/Dubai-des.jpg');?>" width="w-100" alt="midle image"></a>
                    </div>
                  </div>
    
                  <div class="col-md-7">
                    <div class="popular-airlines">
                      <h6><b><a href="<?php echo base_url('houston'); ?>" class="text-dark">Houston</a></b></h6>
                    </div>
                  </div>
                </div>
              </div>


            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="row align-items-center">
                  <div class="col-md-5">
                    <div class="popular-airlines">
                    <a href="<?php echo base_url('chicago'); ?>"><img src="<?php echo base_url('assets/images/California .webp');?>" width="w-100" alt="midle image"></a>
                    </div>
                  </div>
    
                  <div class="col-md-7">
                    <div class="popular-airlines">
                      <h6><b><a href="<?php echo base_url('chicago'); ?>" class="text-dark">Chicago</a></b></h6>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="row align-items-center">
                  <div class="col-md-5">
                    <div class="popular-airlines">
                    <a href="<?php echo base_url('san-francisco'); ?>"><img src="<?php echo base_url('assets/images/grece.webp');?>" width="w-100" alt="midle image"></a>
                    </div>
                  </div>
    
                  <div class="col-md-7">
                    <div class="popular-airlines">
                      <h6><b><a href="<?php echo base_url('san-francisco'); ?>" class="text-dark">San Francisco</a></b></h6>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-4">
                <div class="row align-items-center">
                  <div class="col-md-5">
                    <div class="popular-airlines">
                    <a href="<?php echo base_url('miami'); ?>"><img src="<?php echo base_url('assets/images/Phoenix .webp');?>" width="w-100" alt="midle image"></a>
                    </div>
                  </div>
    
                  <div class="col-md-7">
                    <div class="popular-airlines">
                      <h6><b><a href="<?php echo base_url('miami'); ?>" class="text-dark">Miami</a></b></h6>
                    </div>
                  </div>
                </div>
              </div>


            </div>
            

            
              <!-- <div class="join-club-text join-club-register-bg pl-5 text-white">
                  <h2>JOIN TRAVEL + LEISURE CLUB</h2>
                  <p>Bring your travel dreams to life with up to 60% off on hotels and resorts.</p>
                  <a href="#">Start Free call</a>
              </div> -->
          </div>
      </div>
  </div>
</section>
