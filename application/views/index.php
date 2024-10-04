<div class="formonbanner mt-5 pt-3">
        <div class="bannerform-sec home"> 
            <div class="container">
                <div class="home-banner-form ">
                <?php
                  include("flight-search.php");
                  ?>
                </div>
            </div>
        </div> 
    </div>
    
    
    
    <div id="search_container_2">
        <div class="opacity-mask"></div>
        <div class="container">
          <!-- <div class='popup-onload'>
          <div class='cnt223'>
          <a href='' class='close'><i class="fa fa-times text-dark" aria-hidden="true"></i></a>
          <p>
          Your data is safe with infinitytravelmate.com <span><img src="<?php echo base_url('assets/images/verified.png');?>" width="30px" alt="verified"></span>
          <br/>
          </p>
          <ul class="text-dark">
            <li>We restrict sharing your infomation</li>
            <li>Wedo use your personal information for any promotional activity</li>
          </ul>
          </div>
          </div> -->
            <div class="row">
              <div class="col-md-8">
                  <div class="banner-rt-top  text-white">
                    <h2 class="text-white">Always say <span class="colorred">‘YES’</span> to new adventures!<br>
                    Make travelling happen today
                  </h2>
                    <p class="text-white"> Reach out to us here <i class="fa fa-long-arrow-down"></i>  <br><a href="<?php echo base_url('contact'); ?>"  class="mt-5"><strong>Get In Touch</strong> </a></p>
                </div>
              </div>
            </div>
            
        </div>
    </div>



    <section class="bg-light-gray customer-support-sec pb-2">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="cust-img-home shadow p-3 d-md-flex bg-white mb-4">
              <img src="<?php echo base_url('assets/images/best_deal.png');?>" width="60" alt="NewYork-des">
              <div class="cust-info-home">
                <h3>Save big by booking today </h3>
                <p>Get massive discounts by booking flights/hotels now</p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="cust-img-home shadow p-3 d-md-flex bg-white mb-4">
              <img src="<?php echo base_url('assets/images/Safety-protocol.png');?>" width="60" alt="NewYork-des">
              <div class="cust-info-home">
                <h3>Safety protocols ensured </h3>
                <p>Fly with more ease as we guarantee your safety </p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="cust-img-home shadow p-3 d-md-flex bg-white mb-4">
              <img src="<?php echo base_url('assets/images/assistance.png');?>" width="60" alt="NewYork-des">
              <div class="cust-info-home">
                <h3>24/7 assistance for you</h3>
                <p>Reach out to us anytime and from anywhere for your next trip!</p>
              </div>
            </div>
          </div>


        </div>
      </div>
    </section>


    

    <section class="flighthotel-tab-sec mb-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row justify-content-end">
                    <div class="col-md-12 mb-4">
                            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-hotel fonticon-big"></i></a>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-plane fonticon-big"></i></a>
                                </li>
                                
                              </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-title mb-5 text-center">
                                <h2>Fly to your dream destination today!</h2>
                                <p class="mb-4">Taste the essence of flying to places that has been in your wish list and make be ready to grab the special discounts that are waiting for you! </p>
                            </div>
                        </div>
                       
                    </div>
                    
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
        
                      <div class="col-md-4">
                          <div class="card home-flight-version">
                            <div class="card-header">                
                              <span class="home-flight-time"><?php echo date("D d M",strtotime($departureDate)); ?></span>
                              <span class="home-flight-neme">JFK</span>
                              <span class="boder-home-flight"></span>                
                              <span class="home-flight-neme">LAX</span>
                            </div>
                            <div class="card-body">
                              <ul>
                                  <li>United Airlines <br><span>Indirect</span></li>                     
                                  <li><a href="javascript:void(0);" class="book_flight" rel="JFK" org="New York , United States Of America" data="LAX" dep="Los Angeles , United States Of America" depdate="<?php echo $departureDate; ?>">Book <i class="fa fa-arrow-right"></i></a></li>
                              </ul>
                            </div>
                          </div>
                      </div> 
         
                      
                      
                      <div class="col-md-4">
                          <div class="card home-flight-version mb-4">
                            <div class="card-header">                 
                              <span class="home-flight-time"><?php echo date("D d M",strtotime($departureDate)); ?></span>
                              <span class="home-flight-neme">LGA</span>
                              <span class="boder-home-flight"></span>                 
                              <span class="home-flight-neme">ORD</span>
                            </div>
                            <div class="card-body">
                              <ul>
                                  <li>Jetblue Airways <br><span>Indirect</span></li>                    
                                  <li><a href="javascript:void(0);" class="book_flight" rel="LGA" org="New York,United States Of America" data="ORD" dep="Chicago,United States Of America" depdate="<?php echo $departureDate; ?>">Book <i class="fa fa-arrow-right"></i></a></li>
                              </ul>
                            </div>
                          </div>
                      </div>
              
                      <div class="col-md-4">
                          <div class="card home-flight-version">
                            <div class="card-header">                
                              <span class="home-flight-time"><?php echo date("D d M",strtotime($departureDate)); ?></span>
                              <span class="home-flight-neme">LAX</span>
                              <span class="boder-home-flight"></span>                 
                              <span class="home-flight-neme">ORD</span>
                            </div>
                            <div class="card-body">
                              <ul>
                                  <li>United Airlines <br><span>Direct</span></li>                     
                                  <li><a href="javascript:void(0);" class="book_flight" rel="LAX" org="Los Angeles,United States Of America" data="ORD" dep="Chicago,United States Of America" depdate="<?php echo $departureDate; ?>">Book <i class="fa fa-arrow-right"></i></a></li>
                              </ul>
                            </div>
                          </div>
                      </div>
                      
                      <div class="col-md-4">
                          <div class="card home-flight-version">
                            <div class="card-header">                 
                              <span class="home-flight-time"><?php echo date("D d M",strtotime($departureDate)); ?></span>
                              <span class="home-flight-neme">ATL</span>
                              <span class="boder-home-flight"></span>                 
                              <span class="home-flight-neme">MCO</span>
                            </div>
                            <div class="card-body">
                              <ul>
                                  <li>Frontier Airlines <br><span>Direct</span></li>                     
                                  <li><a href="javascript:void(0);" class="book_flight" rel="ATL" org="Atlanta , United States Of America" data="MCO" dep="Orlando , United States Of America" depdate="<?php echo $departureDate; ?>">Book <i class="fa fa-arrow-right"></i></a></li>
                              </ul>
                            </div>
                          </div>
                      </div>
                      
                      <div class="col-md-4">
                          <div class="card home-flight-version mb-4">
                            <div class="card-header">                 
                              <span class="home-flight-time"><?php echo date("D d M",strtotime($departureDate)); ?></span>
                              <span class="home-flight-neme">LAS</span>
                              <span class="boder-home-flight"></span>                 
                              <span class="home-flight-neme">LAX</span>
                            </div>
                            <div class="card-body">
                              <ul>
                                  <li>Spirit Airlines <br><span>Direct</span></li>                     
                                  <li><a href="javascript:void(0);" class="book_flight" rel="LAS" org="Las Vegas , United States Of America" data="LAX" dep="Los Angeles , United States Of America" depdate="<?php echo $departureDate; ?>">Book <i class="fa fa-arrow-right"></i></a></li>
                              </ul>
                            </div>
                          </div>
                      </div>
                      
                      <div class="col-md-4">
                          <div class="card home-flight-version">
                            <div class="card-header">                
                              <span class="home-flight-time"><?php echo date("D d M",strtotime($departureDate)); ?></span>
                              <span class="home-flight-neme">LAX</span>
                              <span class="boder-home-flight"></span>                 
                              <span class="home-flight-neme">SEA</span>
                            </div>
                            <div class="card-body">
                              <ul>
                                  <li>Frontier Airlines <br><span>Indirect</span></li>
                                  <!--<li>One way from <span class="home-flight-price"><b>₹ 26,090</b></span></li>-->
                                  <li><a href="javascript:void(0);" class="book_flight" rel="LAX" org="Los Angeles,United States Of America" data="SEA" dep="Seattle , United States Of America" depdate="<?php echo $departureDate; ?>">Book <i class="fa fa-arrow-right"></i></a></li>
                              </ul>
                            </div>
                          </div>
                      </div>
                      
                      
                      
                      <div class="col-md-4">
                          <div class="card home-flight-version">
                            <div class="card-header">                
                              <span class="home-flight-time"><?php echo date("D d M",strtotime($departureDate)); ?></span>
                              <span class="home-flight-neme">ATL</span>
                              <span class="boder-home-flight"></span>
                              <!-- <span><img src="<?php //echo base_url('assects/img/download.svg');?>"  width="15px" alt="flight logo"></span> -->
                              <span class="home-flight-neme">LGA</span>
                            </div>
                            <div class="card-body">
                              <ul>
                                  <li>Frontier Airlines<br><span>Indirect</span></li>                     
                                  <li><a href="javascript:void(0);" class="book_flight" rel="ATL" org="Atlanta , United States Of America" data="LGA" dep="New York , United States Of America" depdate="<?php echo $departureDate; ?>">Book <i class="fa fa-arrow-right"></i></a></li>
                              </ul>
                            </div>
                          </div>
                      </div>
         
         
     </div>
  </div>
 <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
 <section class="include-hotel-sec mt-0">
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
                      <a href="<?php echo base_url('hotel-details/116021'); ?>"><img src="<?php echo base_url('assets/images/LAS-VEGAS/boulder_station_hotel_and_casino.webp');?>" alt="flight hotel"></a>
                        <div class="hotel-list-content">
                          <h2>Boulder Station Hotel and Casino</h2>
                          <a href="<?php echo base_url('hotel-details/116021'); ?>" class="get-btn">Get Best Deal</a>
                        </div>
                      </div>
                  </div>

                <div class="col-md-4">
                    <div class="hotel-list mb-3">
                    <a href="<?php echo base_url('hotel-details/457275'); ?>"><img src="<?php echo base_url('assets/images/LAS-VEGAS/bungalows_hostel.webp');?>" alt="flight hotel"></a>
                      <div class="hotel-list-content">
                        <h2>Bungalows Hostel</h2>
                        <a href="<?php echo base_url('hotel-details/457275'); ?>" class="get-btn">Get Best Deal</a>
                      </div>
                    </div>
                </div>

                <div class="col-md-4">
                  <div class="hotel-list mb-3">
                  <a href="<?php echo base_url('hotel-details/130152'); ?>"><img src="<?php echo base_url('assets/images/LAS-VEGAS/golden_gate_hotel_and_casino.webp');?>" alt="flight hotel"></a>
                    <div class="hotel-list-content">
                      <h2>Golden Gate Hotel and Casino</h2>
                      <a href="<?php echo base_url('hotel-details/130152'); ?>" class="get-btn">Get Best Deal</a>
                    </div>
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="hotel-list mb-3">
                  <a href="<?php echo base_url('hotel-details/193214'); ?>"><img src="<?php echo base_url('assets/images/LAS-VEGAS/mardi_gras_hotel_&_casino.webp');?>" alt="flight hotel"></a>
                    <div class="hotel-list-content">
                      <h2>Mardi Gras Hotel & Casino</h2>
                      <a href="<?php echo base_url('hotel-details/193214'); ?>" class="get-btn">Get Best Deal</a>
                    </div>
                  </div>
              </div>

              <div class="col-md-4">
                <div class="hotel-list mb-3">
                <a href="<?php echo base_url('hotel-details/129410'); ?>"><img src="<?php echo base_url('assets/images/LAS-VEGAS/sahara_las_vegas.webp');?>" alt="flight hotel"></a>
                  <div class="hotel-list-content">
                    <h2>Sahara Las Vegas</h2>
                    <a href="<?php echo base_url('hotel-details/129410'); ?>" class="get-btn">Get Best Deal</a>
                  </div>
                </div>
            </div>

            <div class="col-md-4">
              <div class="hotel-list mb-3">
                <a href="<?php echo base_url('hotel-details/193218'); ?>"><img src="<?php echo base_url('assets/images/LAS-VEGAS/silver_sevens_hotel_&_casino.webp');?>" alt="flight hotel"></a>
                <div class="hotel-list-content">
                  <h2>Silver Sevens Hotel & Casino</h2>
                  <a href="<?php echo base_url('hotel-details/193218'); ?>" class="get-btn">Get Best Deal</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="newyork" role="tabpanel" aria-labelledby="newyork-tab">

            <div class="row">
                  <div class="col-md-4">
                      <div class="hotel-list mb-3">
                      <a href="<?php echo base_url('hotel-details/112993'); ?>"><img src="<?php echo base_url('assets/images/NEW-YORK/airport_plaza_hotel_jfk_airport.webp');?>" alt="flight hotel"></a>
                        <div class="hotel-list-content">
                          <h2>Airport Plaza Hotel Jfk Airport</h2>
                          <a href="<?php echo base_url('hotel-details/112993'); ?>" class="get-btn">Get Best Deal</a>
                        </div>
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="hotel-list mb-3">
                    <a href="<?php echo base_url('hotel-details/2114280064'); ?>"><img src="<?php echo base_url('assets/images/NEW-YORK/hotel_ninety_five.webp');?>" alt="flight hotel"></a>
                      <div class="hotel-list-content">
                        <h2>Hotel Ninety Five</h2>
                        <a href="<?php echo base_url('hotel-details/2114280064'); ?>" class="get-btn">Get Best Deal</a>
                      </div>
                    </div>
                </div>

                <div class="col-md-4">
                  <div class="hotel-list mb-3">
                  <a href="<?php echo base_url('hotel-details/2159513600'); ?>"><img src="<?php echo base_url('assets/images/NEW-YORK/hotel_pergola_jfk_airport.webp');?>" alt="flight hotel"></a>
                    <div class="hotel-list-content">
                      <h2>Hotel Pergola Jfk Airport</h2>
                      <a href="<?php echo base_url('hotel-details/2159513600'); ?>" class="get-btn">Get Best Deal</a>
                    </div>
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="hotel-list mb-3">
                  <a href="<?php echo base_url('hotel-details/326002'); ?>"><img src="<?php echo base_url('assets/images/NEW-YORK/jazz_on_the_park_hostel.webp');?>" alt="flight hotel"></a>
                    <div class="hotel-list-content">
                      <h2>Jazz On The Park Hostel</h2>
                      <a href="<?php echo base_url('hotel-details/326002'); ?>" class="get-btn">Get Best Deal</a>
                    </div>
                  </div>
              </div>

              <div class="col-md-4">
                <div class="hotel-list mb-3">
                <a href="<?php echo base_url('hotel-details/539303'); ?>"><img src="<?php echo base_url('assets/images/NEW-YORK/motel_6_elizabeth_nj_newark_liberty_intl_airport.webp');?>" alt="flight hotel"></a>
                  <div class="hotel-list-content">
                    <h2>Motel 6 Elizabeth Nj Newark Liberty Intl Airport</h2>
                    <a href="<?php echo base_url('hotel-details/539303'); ?>" class="get-btn">Get Best Deal</a>
                  </div>
                </div>
            </div>

            <div class="col-md-4">
              <div class="hotel-list mb-3">
              <a href="<?php echo base_url('hotel-details/2652576800'); ?>"><img src="<?php echo base_url('assets/images/NEW-YORK/the_local.webp');?>" alt="flight hotel"></a>
                <div class="hotel-list-content">
                  <h2>The Local</h2>
                  <a href="<?php echo base_url('hotel-details/2652576800'); ?>" class="get-btn">Get Best Deal</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="tab-pane fade" id="orlando" role="tabpanel" aria-labelledby="orlando-tab">
            <div class="row">
                  <div class="col-md-4">
                      <div class="hotel-list mb-3">
                      <a href="<?php echo base_url('hotel-details/139286'); ?>"><img src="<?php echo base_url('assets/images/ORLANDO/clarion_inn_&_suites_kissimmee_lake_buena_vista_south.webp');?>" alt="flight hotel"></a>
                        <div class="hotel-list-content">
                          <h2>Clarion Inn & Suites Kissimmee Lake Buena Vista South</h2>
                          <a href="<?php echo base_url('hotel-details/139286'); ?>" class="get-btn">Get Best Deal</a>
                        </div>
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="hotel-list mb-3">
                    <a href="<?php echo base_url('hotel-details/1641558272'); ?>"><img src="<?php echo base_url('assets/images/ORLANDO/clarion_inn_international_drive.webp');?>" alt="flight hotel"></a>
                      <div class="hotel-list-content">
                        <h2>Clarion Inn International Drive</h2>
                        <a href="<?php echo base_url('hotel-details/1641558272'); ?>" class="get-btn">Get Best Deal</a>
                      </div>
                    </div>
                </div>

                <div class="col-md-4">
                  <div class="hotel-list mb-3">
                  <a href="<?php echo base_url('hotel-details/203438'); ?>"><img src="<?php echo base_url('assets/images/ORLANDO/knights_inn_maingate_kissimmee_orlando.webp');?>" alt="flight hotel"></a>
                    <div class="hotel-list-content">
                      <h2>Knights Inn Maingate Kissimmee Orlando</h2>
                      <a href="<?php echo base_url('hotel-details/203438'); ?>" class="get-btn">Get Best Deal</a>
                    </div>
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="hotel-list mb-3">
                  <a href="<?php echo base_url('hotel-details/374299'); ?>"><img src="<?php echo base_url('assets/images/ORLANDO/monte_carlo_inn.webp');?>" alt="flight hotel"></a>
                    <div class="hotel-list-content">
                      <h2>Monte Carlo Inn</h2>
                      <a href="<?php echo base_url('hotel-details/374299'); ?>" class="get-btn">Get Best Deal</a>
                    </div>
                  </div>
              </div>

              <div class="col-md-4">
                <div class="hotel-list mb-3">
                <a href="<?php echo base_url('hotel-details/2666807616'); ?>"><img src="<?php echo base_url('assets/images/ORLANDO/road_way_inn.webp');?>" alt="flight hotel"></a>
                  <div class="hotel-list-content">
                    <h2>Road Way Inn</h2>
                    <a href="<?php echo base_url('hotel-details/2666807616'); ?>" class="get-btn">Get Best Deal</a>
                  </div>
                </div>
            </div>

            <div class="col-md-4">
              <div class="hotel-list mb-3">
              <a href="<?php echo base_url('hotel-details/129104'); ?>"><img src="<?php echo base_url('assets/images/ORLANDO/rodeway_inn_maingate_central.webp');?>" alt="flight hotel"></a>
                <div class="hotel-list-content">
                  <h2>Rodeway Inn Maingate Central</h2>
                  <a href="<?php echo base_url('hotel-details/129104'); ?>" class="get-btn">Get Best Deal</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="tab-pane fade" id="orlando1" role="tabpanel" aria-labelledby="orlando-tab1">



              <div class="row">
                  <div class="col-md-4">
                      <div class="hotel-list mb-3">
                      <a href="<?php echo base_url('hotel-details/1716555104'); ?>"><img src="<?php echo base_url('assets/images/Miami/bposhtels_hollywood_florida.webp');?>" alt="flight hotel"></a>
                        <div class="hotel-list-content">
                          <h2>Bposhtels Hollywood Florida</h2>
                          <a href="<?php echo base_url('hotel-details/1716555104'); ?>" class="get-btn">Get Best Deal</a>
                        </div>
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="hotel-list mb-3">
                    <a href="<?php echo base_url('hotel-details/690609696'); ?>"><img src="<?php echo base_url('assets/images/Miami/costa_norte_boutique_hotel.webp');?>" alt="flight hotel"></a>
                      <div class="hotel-list-content">
                        <h2>Costa Norte Boutique Hotel</h2>
                        <a href="<?php echo base_url('hotel-details/690609696'); ?>" class="get-btn">Get Best Deal</a>
                      </div>
                    </div>
                </div>

                <div class="col-md-4">
                  <div class="hotel-list mb-3">
                  <a href="<?php echo base_url('hotel-details/406047'); ?>"> <img src="<?php echo base_url('assets/images/Miami/knights_inn_hallandale.webp');?>" alt="flight hotel"></a>
                    <div class="hotel-list-content">
                      <h2>Knights Inn Hallandale</h2>
                      <a href="<?php echo base_url('hotel-details/406047'); ?>" class="get-btn">Get Best Deal</a>
                    </div>
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="hotel-list mb-3">
                  <a href="<?php echo base_url('hotel-details/1930236192'); ?>"> <img src="<?php echo base_url('assets/images/Miami/ocean_spray_hotel_by_rabbu.webp');?>" alt="flight hotel"></a>
                    <div class="hotel-list-content">
                      <h2>Ocean Spray Hotel by Rabbu</h2>
                      <a href="<?php echo base_url('hotel-details/1930236192'); ?>" class="get-btn">Get Best Deal</a>
                    </div>
                  </div>
              </div>

              <div class="col-md-4">
                <div class="hotel-list mb-3">
                <a href="<?php echo base_url('hotel-details/427527'); ?>"> <img src="<?php echo base_url('assets/images/Miami/posh_south_beach_hostel.webp');?>" alt="flight hotel"></a>
                  <div class="hotel-list-content">
                    <h2>Posh South Beach Hostel</h2>
                    <a href="<?php echo base_url('hotel-details/427527'); ?>" class="get-btn">Get Best Deal</a>
                  </div>
                </div>
            </div>

            <div class="col-md-4">
              <div class="hotel-list mb-3">
              <a href="<?php echo base_url('hotel-details/708726368'); ?>"><img src="<?php echo base_url('assets/images/Miami/south_beach_rooms_and_hostel.webp');?>" alt="flight hotel"></a>
                <div class="hotel-list-content">
                  <h2>South Beach Rooms and Hostel</h2>
                  <a href="<?php echo base_url('hotel-details/708726368'); ?>" class="get-btn">Get Best Deal</a>
                </div>
              </div>
            </div>
          </div>




        </div>
        <div class="tab-pane fade" id="orlando2" role="tabpanel" aria-labelledby="orlando-tab2">

              <div class="row">
                  <div class="col-md-4">
                      <div class="hotel-list mb-3">
                      <a href="<?php echo base_url('hotel-details/532979'); ?>"><img src="<?php echo base_url('assets/images/LOS-ANGELES/central_inn_motel.webp');?>" alt="flight hotel"></a>
                        <div class="hotel-list-content">
                          <h2>Central Inn Motel</h2>
                          <a href="<?php echo base_url('hotel-details/532979'); ?>" class="get-btn">Get Best Deal</a>
                        </div>
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="hotel-list mb-3">
                    <a href="<?php echo base_url('hotel-details/1054137088'); ?>"><img src="<?php echo base_url('assets/images/LOS-ANGELES/del_mar_motel.webp');?>" alt="flight hotel"></a>
                      <div class="hotel-list-content">
                        <h2>Del Mar Motel</h2>
                        <a href="<?php echo base_url('hotel-details/1054137088"'); ?>" class="get-btn">Get Best Deal</a>
                      </div>
                    </div>
                </div>

                <div class="col-md-4">
                  <div class="hotel-list mb-3">
                  <a href="<?php echo base_url('hotel-details/523154400'); ?>"><img src="<?php echo base_url('assets/images/LOS-ANGELES/freehand_los_angeles.webp');?>" alt="flight hotel"></a>
                    <div class="hotel-list-content">
                      <h2>Freehand Los Angeles</h2>
                      <a href="<?php echo base_url('hotel-details/523154400'); ?>" class="get-btn">Get Best Deal</a>
                    </div>
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="hotel-list mb-3">
                  <a href="<?php echo base_url('hotel-details/259524'); ?>"><img src="<?php echo base_url('assets/images/LOS-ANGELES/lambert_inn.webp');?>" alt="flight hotel"></a>
                    <div class="hotel-list-content">
                      <h2>Lambert Inn</h2>
                      <a href="<?php echo base_url('hotel-details/259524'); ?>" class="get-btn">Get Best Deal</a>
                    </div>
                  </div>
              </div>

              <div class="col-md-4">
                <div class="hotel-list mb-3">
                <a href="<?php echo base_url('hotel-details/451454'); ?>"><img src="<?php echo base_url('assets/images/LOS-ANGELES/motel_6_rowland_heights.webp');?>" alt="flight hotel"></a>
                  <div class="hotel-list-content">
                    <h2>Motel 6 Rowland Heights</h2>
                    <a href="<?php echo base_url('hotel-details/451454'); ?>" class="get-btn">Get Best Deal</a>
                  </div>
                </div>
            </div>

            <div class="col-md-4">
              <div class="hotel-list mb-3">
              <a href="<?php echo base_url('hotel-details/699820'); ?>"><img src="<?php echo base_url('assets/images/LOS-ANGELES/podShare_venice.webp');?>" alt="flight hotel"></a>
                <div class="hotel-list-content">
                  <h2>PodShare Venice</h2>
                  <a href="<?php echo base_url('hotel-details/699820'); ?>" class="get-btn">Get Best Deal</a>
                </div>
              </div>
            </div>
          </div>




        </div>
      </div>

  </div>
</section>
                      
                      </div>
                </div>
                
            </div>
        </div>
    </section>

    <div class="page-title text-center mt-5 pt-5 mb-5">
        <h2>Explore wonders of the world today!</h2>
        <p><?php echo $this->Site_Model->websitename; ?> Let’s take you around the world</p>
    </div>


    <section class="join-club-sec position-relative">
      <div class="middle-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 border-left">
                    <div class="join-club-text">
                        <h2>One Click Closer to Your Dream Land. Book Now!</h2>
                        <p>Be ready to grab the best deals with ‘Anatripgo’ & get-</p>
                        <ul>
                          <li><i class="fa fa-check-square-o" aria-hidden="true"></i> <span>Top Airlines  </span>  </li>
                          <li><i class="fa fa-check-square-o" aria-hidden="true"></i> <span>Major discounts on hotels and flights</span></li>
                          <li><i class="fa fa-check-square-o" aria-hidden="true"></i> <span>Secured payment process</span> </li>
                          <li><i class="fa fa-check-square-o" aria-hidden="true"></i> <span>Instant notification on latest flights</span> </li>
                        </ul>
                        <a href="<?php echo base_url('hotel-flight'); ?>">Start Now</a>
                    </div>
                </div>

               

            </div>
        </div>
    </section>

    <?php 
    include("explore-destinations.php");
    ?>
   