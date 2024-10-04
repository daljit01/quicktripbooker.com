<style>
    section.bg-light-gray.customer-support-sec {
        padding: 40px 0px 24px 0px;
        background: #f5f5f5;
    }
</style>
<div class="formonbanner pt-5">
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
<div id="search_container_2" class="flightbanner">


    <div class="opacity-mask"></div>
    <div class="container">



        <div class="banner-rt-top  text-white text-center">
            <h2 class="text-white"><?php echo htmlspecialchars($flight_details['top_title']); ?></h2>
            <p class="text-white"><?php echo htmlspecialchars($flight_details['top_desc']); ?></p>
        </div>



    </div>
</div>



<!-- 
<section class="joinclub-flighthotel-sec1 mt-5">
      <div class="container">
          <div class="row joinclub-flighthotel-sec">
              <div class="col-md-7 offset-md-3">
                  <div class="join-club-text text-left text-white">
                      <h2>One Click Closer to Your Dream Land. Book Now!</h2>
                      <p>Be ready to grab the best deals with ‘Anatripgo’ & get-</p>
                      <ul>
                          <li><i class="fa fa-check-square-o" aria-hidden="true"></i> <span>Top Airlines </span> </li>
                          <li><i class="fa fa-check-square-o" aria-hidden="true"></i> <span>Major discounts on hotels and flights</span>  </li>
                          <li><i class="fa fa-check-square-o" aria-hidden="true"></i> <span>Secured payment process</span> </li>
                          <li><i class="fa fa-check-square-o" aria-hidden="true"></i> <span>Instant notification on latest flights</span> </li>
                      </ul>
                     
                  </div>
              </div>
             

            
          </div>
      </div>
  </section> -->
  <section class="bg-light-gray customer-support-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="cust-img-home shadow p-3 d-md-flex bg-white mb-4">
              <img src="<?php echo !empty($flight_details['cust_support_file1']) ? base_url('control/'.$flight_details['cust_support_file1']) : base_url('assets/images/best_deal.png'); ?>" width="60" alt="NewYork-des">
              <div class="cust-info-home">
                <h3><?php echo htmlspecialchars($flight_details['cust_support_title1']); ?></h3>
                <p><?php echo htmlspecialchars($flight_details['cust_support_desc1']); ?></p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="cust-img-home shadow p-3 d-md-flex bg-white mb-4">
            <img src="<?php echo !empty($flight_details['cust_support_file2']) ? base_url('control/'.$flight_details['cust_support_file2']) : base_url('assets/images/best_deal.png'); ?>" width="60" alt="NewYork-des">
              <div class="cust-info-home">
                <h3><?php echo htmlspecialchars($flight_details['cust_support_title2']); ?></h3>
                <p><?php echo htmlspecialchars($flight_details['cust_support_desc2']); ?></p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="cust-img-home shadow p-3 d-md-flex bg-white mb-4">
            <img src="<?php echo !empty($flight_details['cust_support_file3']) ? base_url('control/'.$flight_details['cust_support_file3']) : base_url('assets/images/best_deal.png'); ?>" width="60" alt="NewYork-des">
              <div class="cust-info-home">
                <h3><?php echo htmlspecialchars($flight_details['cust_support_title3']); ?></h3>
                <p><?php echo htmlspecialchars($flight_details['cust_support_desc3']); ?></p>
              </div>
            </div>
          </div>


        </div>
      </div>
    </section>
<!--why choose us section-->
<!-- <section class="why_chooseus_section">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-4 col-12">
                <div class="main_wraper">
                    <div class="icon_box">
                        <img src="<?php echo base_url('assets/images/flight/reward.png'); ?>" alt="reward">
                    </div>
                    <div class="text_wraper">
                        <h5>Best Price Guarantee</h5>
                        <p>
                            We offer our customers absolute unpublished fares for flights domestically and internationally.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-12">
                <div class="main_wraper">
                    <div class="icon_box">
                        <img src="<?php echo base_url('assets/images/flight/online-booking.png'); ?>" style="width:65px;" alt="online-booking">
                    </div>
                    <div class="text_wraper">
                        <h5>Easy & Quick Booking</h5>
                        <p>
                            Book your flight tickets over a call within a few minutes.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-12">
                <div class="main_wraper">
                    <div class="icon_box">
                        <img src="<?php echo base_url('assets/images/flight/24-hours-support.png'); ?>" style="width:65px;" alt="24-hours-support">
                    </div>
                    <div class="text_wraper">
                        <h5>Customer Care 24/7</h5>
                        <p>
                            Our local travel experts are available on call round the clock, 365 days.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--end-->
<!--spacial offer section-->
<section class="spacial_offer_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading_box">
                    <h2><?php echo htmlspecialchars($flight_details['special_offer_title']); ?></h2>
                    <p>
                    <?php echo htmlspecialchars($flight_details['special_offer_desc']); ?>
                    </p>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-12">
                <div class="main_imagewraper">
                    <div class="text_box">
                        <h4><?php echo htmlspecialchars($flight_details['special_offer_desc1']); ?></h4>
                        <a href="<?php echo htmlspecialchars($flight_details['special_offer_link1']); ?>">Learn More</a>
                    </div>
                    <img src="<?php echo !empty($flight_details['special_offer_image1']) ? base_url('/control/'.$flight_details['special_offer_image1']) : base_url('assets/images/flight/spacial_offerimg1.jpg'); ?>" class="postion_img" alt="spacial_offerimg">
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-12">
                <div class="main_imagewraper">
                    <div class="text_box">
                        <h4><?php echo htmlspecialchars($flight_details['special_offer_desc2']); ?></h4>
                        <a href="<?php echo htmlspecialchars($flight_details['special_offer_link2']); ?>">Learn More</a>
                    </div>
                    <img src="<?php echo !empty($flight_details['special_offer_image2']) ? base_url('/control/'.$flight_details['special_offer_image2']) : base_url('assets/images/flight/spacial_offerimg1.jpg'); ?>" class="postion_img" alt="spacial_offerimg">
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-12">
                <div class="main_imagewraper">
                    <div class="text_box">
                        <h4><?php echo htmlspecialchars($flight_details['special_offer_desc3']); ?></h4>
                        <a href="<?php echo htmlspecialchars($flight_details['special_offer_link3']); ?>">Learn More</a>
                    </div>
                    <img src="<?php echo !empty($flight_details['special_offer_image3']) ? base_url('/control/'.$flight_details['special_offer_image3']) : base_url('assets/images/flight/spacial_offerimg1.jpg'); ?>" class="postion_img" alt="spacial_offerimg">
                </div>
            </div>
        </div>
    </div>
</section>
<!--end-->
<!--Flight Recommendations section start-->
<section class="Recommendations_flight">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading_box">
                    <h2><?php echo htmlspecialchars($flight_details['flight_title']); ?></h2>
                    <p>
                    <?php echo htmlspecialchars($flight_details['flight_desc']); ?>
                    </p>
                </div>
            </div>
            <?php foreach ($flight_details['flights'] as $recommendation): ?>
            <div class="col-xl-6 col-md-12 col-12">
                <div class="main_wraper">
                    <div class="row center_row">
                        <div class="col-sm-2">
                            <div class="image_box">
                                <img src="<?php echo !empty($recommendation['airline_logo']) ? $recommendation['airline_logo'] : base_url('assets/images/airlinelogo/b6.gif'); ?>" alt="flight logo">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="left_textbox">
                                <span><?php echo htmlspecialchars($recommendation['departure_date']); ?></span>
                                <h5><?php echo htmlspecialchars($recommendation['departure_location']); ?></h5>
                                <span><?php echo htmlspecialchars($recommendation['departure_city_name']); ?></span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="border_line">
                                <i class="fa-solid fa-plane-departure"></i>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="right_textwraper">
                                <span><?php echo htmlspecialchars($recommendation['arrival_date']); ?></span>
                                <h5><?php echo htmlspecialchars($recommendation['arrival_location']); ?></h5>
                                <span><?php echo htmlspecialchars($recommendation['arrival_city_name']); ?></span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="price_box">
                                <span>US$<?php echo htmlspecialchars($recommendation['price']); ?></span> <br>
                               <a href="javascript:" 
                                class="book-now" 
                                data-departure-date="<?php echo htmlspecialchars($recommendation['departure_date']); ?>" 
                                data-departure-location="<?php echo htmlspecialchars($recommendation['departure_location']); ?>" 
                                data-departure-city-name="<?php echo htmlspecialchars($recommendation['departure_city_name']); ?>" 
                                data-arrival-date="<?php echo htmlspecialchars($recommendation['arrival_date']); ?>" 
                                data-arrival-location="<?php echo htmlspecialchars($recommendation['arrival_location']); ?>" 
                                data-arrival-city-name="<?php echo htmlspecialchars($recommendation['arrival_city_name']); ?>" 
                                data-departure-iata-code-city="<?php echo htmlspecialchars($recommendation['departure_iata_code_city']); ?>" 
                                data-arrival-iata-code-city="<?php echo htmlspecialchars($recommendation['arrival_iata_code_city']); ?>" 
                                data-price="<?php echo htmlspecialchars($recommendation['price']); ?>">
                                    Book Now <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
           
        </div>
    </div>
</section>
<!--end-->
<!--top Destination-->
<section class="top_destination">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading_box">
                    <h2><?php echo htmlspecialchars($flight_details['destination_title']); ?></h2>
                    <p>
                    <?php echo htmlspecialchars($flight_details['destination_desc']); ?>
                    </p>
                </div>
            </div>
            <div class="top_destinationslider owl-carousel owl-theme">
            <?php foreach ($flight_details['destinations'] as $destination): ?>
                <div class="item">
                    <div class="col-xl-12 col-md-12 col-12">
                        <div class="main_wraper">
                            <img src="<?php echo base_url('control/'.$destination['image']); ?>" class="postion_img" alt="<?php echo htmlspecialchars($destination['title']); ?>">
                            <div class="text_box">
                                <h5><?php echo htmlspecialchars($destination['title']); ?></h5>
                                <p><?php echo htmlspecialchars($destination['description']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>    
            
        </div>
    </div>
</section>
<!--end-->
<!--cta-->
<section class="join-club-sec position-relative">
    <div class="middle-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 border-left">
            <?php echo $flight_details['club_section']; ?>
            </div>
        </div>
    </div>
</section>
<!--end-->
<!--flight hotel deals-->
    <section class="flight_hotel_deals">
        <div class="container">
            <div class="row">
            <?php echo $flight_details['flight_deal']; ?>
            </div>
        </div>
    </section>
<!--end-->
<!--client review section code start-->
<section class="client_reviewsc">
    <div class="container">
        <div class="col-12">
            <div class="heading_box">
                <h2> <?php echo htmlspecialchars($flight_details['review_title']); ?></h2>
            </div>
        </div>

        <div class="customer_reviewslider owl-carousel owl-theme">
           
            <?php foreach ($flight_details['reviews'] as $review): ?>
            <div class="item">
                <div class="client_reviewbox">
                    <?php
                        // Define the star rating value (e.g., 3 out of 5 stars)
                        $starRating = $review['star_rating']; 
                        // Generate the star rating HTML
                        echo '<div class="star_box">';
                        // Loop to generate filled stars
                        for ($i = 0; $i < $starRating; $i++) {
                            echo '<i class="fa-solid fa-star"></i>'; // Filled star
                        }
                        // Loop to generate empty stars for the remaining out of 5
                        for ($i = $starRating; $i < 5; $i++) {
                            echo '<i class="fa-solid fa-star" style="color: #ccc;"></i>'; // Empty star (light color for empty)
                        }
                        echo '</div>';
                    ?>
                    <div class="text_con">
                        <h5><?php echo htmlspecialchars($review['name']); ?></h5>
                        <p><?php echo htmlspecialchars($review['description']); ?>
                        </p>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<!--client review section code end-->
<!--Articles section code start-->
    <section class="articles_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading_box">
                        <h2> <?php echo htmlspecialchars($flight_details['cust_support_title']); ?></h2>
                        <p>
                        <?php echo htmlspecialchars($flight_details['cust_support_desc']); ?>
                        </p>
                    </div>
                </div>
                <?php
                            if(count((array)$blogs) > 0)
                            {
                            foreach($blogs as $blogsrow){
                                $id = $blogsrow->id;
                        ?>
                    <div class="col-xl-6 col-md-6 col-12">
                    <div class="main_wraper">
                        <div class="image_box">
                        <img loading="lazy" src="<?php echo base_url('control/assets/images/blog/'.$blogsrow->thumb); ?>" alt="<?php echo $blogsrow->alttag; ?>" width="383" height="402">
                        </div>
                        <div class="text_wraper">
                            <h5> <?php echo date("M-d-Y", strtotime($blogsrow->date)); ?></h5>
                            <h3> <?php echo $blogsrow->subject; ?></h3>
                            <p>
                            <?php echo substr(strip_tags($blogsrow->description),0,65); ?>...
                            </p>
                            <a href="<?php echo base_url('blog/'.$blogsrow->s_url); ?>">Read More <i class="fa-solid fa-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
                    <?php }  ?> 
                    <?php }else{ ?>
                                <div class="col-xl-6 col-md-6 col-12"> <h4 class="text-center">Blog Not Found</h4></div>
                            <?php } 
                            ?>
                
            </div>
            <form id="fl_frm" method="POST">
    <!-- Hidden fields for flight data will be added here -->
</form>
        </div>
    </section>
<!--end-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('click', '.book-now', function() {
        // Collect flight data from the clicked recommendation
        var departureDate = $(this).data('departure-date');
        var departureLocation = $(this).data('departure-location');
        var departureCityName = $(this).data('departure-city-name');
        var arrivalDate = $(this).data('arrival-date');
        var arrivalLocation = $(this).data('arrival-location');
        var arrivalCityName = $(this).data('arrival-city-name');
        var origin_iata_code_city = $(this).data('departure-iata-code-city');
        var destination_iata_code_city = $(this).data('arrival-iata-code-city');
        var price = $(this).data('price');
console.log(departureDate);
        // Prepare the action URL for the form
        var searchFlightUrl = '<?php echo base_url('search-flight-lookup'); ?>';
        $("#fl_frm").attr("action", searchFlightUrl);
        $("#fl_frm").html('');
        // Add hidden fields to the form
        $("#fl_frm").append('<input type="hidden" name="searchprogress" value="searchprogress">');
        $("#fl_frm").append('<input type="hidden" name="nonStop" value="all">');
        $("#fl_frm").append('<input type="hidden" name="includedAirlineCodes" value="">');
        $("#fl_frm").append('<input type="hidden" name="maxPrice" value="0">');
        $("#fl_frm").append('<input type="hidden" name="travel_type" value="One way">');
        $("#fl_frm").append('<input type="hidden" name="origincode" value="' + departureLocation + '">');
        $("#fl_frm").append('<input type="hidden" name="origin_iata_code_city" value="' + origin_iata_code_city + '">');
        $("#fl_frm").append('<input type="hidden" name="origin_cityname" value="' + departureCityName + '">');
        $("#fl_frm").append('<input type="hidden" name="destinationcode" value="' + arrivalLocation + '">');
        $("#fl_frm").append('<input type="hidden" name="destination_iata_code_city" value="' + destination_iata_code_city + '">');
        $("#fl_frm").append('<input type="hidden" name="destination_cityname" value="' + arrivalCityName + '">');
        $("#fl_frm").append('<input type="hidden" name="date_from" value="' + departureDate + '">');
        $("#fl_frm").append('<input type="hidden" name="date_to" value="' + arrivalDate + '">');
        $("#fl_frm").append('<input type="hidden" name="traveller" value="1">');
        $("#fl_frm").append('<input type="hidden" name="fare_class" value="ECONOMY">');
        $("#fl_frm").append('<input type="hidden" name="no_of_adults" value="1">');
        $("#fl_frm").append('<input type="hidden" name="no_of_child" value="0">');
        $("#fl_frm").append('<input type="hidden" name="no_of_infant" value="0">');

        // Submit the form
        $("#fl_frm").submit();
    });
</script>




<!-- <//?php
include("flight-assistant.php");
?> -->