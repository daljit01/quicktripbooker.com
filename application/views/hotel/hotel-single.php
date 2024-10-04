<section class="homebanner-bg about-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="hotel-single-banner-text text-white text-left">
          <h1>Top Las Vegas offer <br>8 Nights</h1>
        </div>
        </div>
        <div class="col-md-12">
        <div class="hotel-single-banner-rt text-right">
          <h2><span class="banner-pr d-block">$620 pp</span> For Instant Deal Call Us at <span class="d-block"><a href="tel:+1234567890"><img src="images/call-center.png" width="35px" alt="call icon">1234567890</a></span>
        
        </h2>
        </div>
    </div>
  </div>
</section>


</div>

<section class="hotel-sec">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-8">
     

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
            <?php
              foreach($hotel['roomImages'] as $roomimg)
              {
                if(property_exists((object)$roomimg,"images") && count((array)$roomimg) > 0)
                {
                  foreach($roomimg->images as $img)
                  {
              ?>
                  <div class="carousel-item">
                  <img src="<?php echo str_replace("{size}","w",$img->baseUrl);?>" class="roomimg" alt="">
                  </div>
              <?php
              
                  }
                }
              }
              ?>
              <!-- <div class="carousel-item active">
                <img src="images/Sydney-des.jpg"  class="d-block w-100" alt="hotel image">
              </div>
              <div class="carousel-item">
                <img src="images/Sydney-des.jpg"  class="d-block w-100" alt="hotel image">
              </div>
              <div class="carousel-item">
                <img src="images/Sydney-des.jpg"  class="d-block w-100" alt="hotel image">
              </div> -->
            </div>
           
          </div>

        <div class="shadow mgn-btm-20 sub-hotel mt-5">
            <div class="d-flex moresuboffer mb-2 position-relative flex-column flex-md-row">
               <div class="image-container bg-dark">
                  <img src="images/Sydney-des.jpg" alt="Hotel Riu Plaza New York Times Square">
               </div>
               <div class="row1 pad10 header-container flex-column">
                  <div class="flex-column ">
                     <h5 class="text-blue font-weight-bold">Hotel Riu Plaza New York Times Square</h5>
                     <hr class="mb-2">
                     <div class="stars d-flex justify-content-start mb-2">
                        <i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i>                                                            
                     </div>
                     <div class="location mb-2">
                        <span><i class="fa fa-map-marker"></i> New York, NY, United States</span>
                     </div>
                     <div class="roomtype mb-2">
                        <span><i class="fa fa-bed"></i> Double/Twin Room</span>
                     </div>
                     <div class="mealplan mb-2">
                        <span><i class="fa fa-cutlery"></i> Bed &amp; Breakfast</span>
                     </div>
                  </div>
                  <div class="circle-night">
                     <span class="num">3</span>
                     <span class="night">nights</span>
                  </div>
                  <div class="show-detail">
                     <button class="btn btn-primary btn-sm home-search-btn" type="button" data-bs-toggle="collapse" data-bs-target="#sub-1319" aria-expanded="false"> Hotel Details</button>
                  </div>
               </div>
            </div>
         </div>
         <br><br>



        <h6><b>YOUR FLIGHT IS INCLUDED!</b></h6>
        <br>
        <div class="shadow row" style="margin:auto">
            <div class="row flight_list" data-offer-multi="true">
                <div class="col-sm-12 col-md-1"><img src="images/AA.png" class="lt"></div>
                <div class="col-md-2 d-none d-lg-inline"><strong>Outbound</strong><br /><span class="text-grey ms-md-0 fw-normal">American Airlines</span></div>
                <div class="col-4 col-sm-5 col-md-3"><strong>LON</strong><br /><span class="text-grey fw-normal">London All Airports</span></div>
                <div class="col-4 col-sm-5 col-md-3"><strong>JFK</strong><br /><span class="text-grey fw-normal">John F Kennedy International Airport</span> </div>
                <div class="col-md-1 text-center ps-lg-0 fw-normal"></div>
            </div>
            <div class="row flight_list" data-offer-multi="true">
                <div class="col-sm-12 col-md-1"><img src="images/AA.png" class="lt"></div>
                <div class="col-md-2 d-none d-lg-inline"><strong>Inbound</strong><br /><span class="text-grey ms-md-0 fw-normal">American Airlines</span></div>
                <div class="col-4 col-sm-5 col-md-3"><strong>JFK</strong><br /><span class="text-grey fw-normal">John F Kennedy International Airport</span></div>
                <div class="col-4 col-sm-5 col-md-3"><strong>LON</strong><br /><span class="text-grey fw-normal">London All Airports</span> </div>
                <div class="col-md-1 text-center ps-lg-0 fw-normal"></div>
            </div>
        </div>

        <br><br>
        <h6><b>FACILITIES INCLUDED</b></h6>
   
        <div class="anchor w-100" id="facility">
            <div class="sub-hotel-facilities">
                <div class="shadow row" style="margin:auto">
                    <div class="row11 flight_list">
                        <div class="flight_list_heading"><i class="fa fa-info-circle"></i> General</div>
                        <ul>
                            <li>Rooms Total (647)</li>
                            <li>Recommended (4)</li>
                            <li>Official (4)</li>
                            <li>Lifts</li>
                            <li>Centralheating</li>
                            <li>Kingsizedbeds</li>
                        </ul>
                    </div>
                    <div class="row11 flight_list">
                        <div class="flight_list_heading"><i class="fa fa-wifi"></i> Internet</div>
                        <ul>
                            <li>Internet</li>
                            <li>Wlan</li>
                        </ul>
                    </div>
                    <div class="row11 flight_list">
                        <div class="flight_list_heading"><i class="fa fa-car"></i> Parking</div>
                        <ul>
                            <li>Carpark</li>
                        </ul>
                    </div>
                    <div class="row11 flight_list">
                        <div class="flight_list_heading"><i class="fa fa-bell"></i> Services</div>
                        <ul>
                            <li>Laundryservice</li>
                            <li>Safe</li>
                            <li>Roomservice</li>
                        </ul>
                    </div>
                    <div class="row11 flight_list">
                        <div class="flight_list_heading"><i class="fa fa-bed"></i> Room</div>
                        <ul>
                            <li>Aircon</li>
                            <li>Tv</li>
                            <li>Fridge</li>
                        </ul>
                    </div>
                    <div class="row11 flight_list">
                        <div class="flight_list_heading"><i class="fa fa-suitcase"></i> Business &amp; Events</div>
                        <ul>
                            <li>Conferenceroom</li>
                        </ul>
                    </div>
                    <div class="row11 flight_list">
                        <div class="flight_list_heading"><i class="fa fa-glass"></i> Food &amp; Drink</div>
                        <ul>
                            <li>Restaurants</li>
                        </ul>
                    </div>
                    <div class="row11 flight_list">
                        <div class="flight_list_heading"><i class="fa fa-shower"></i> Bath</div>
                        <ul>
                            <li>Hairdryer</li>
                            <li>Bathtub</li>
                            <li>Shower</li>
                        </ul>
                    </div>
                    <div class="row11 flight_list">
                        <div class="flight_list_heading"><i class="fa fa-heartbeat"></i> Wellness</div>
                        <ul>
                            <li>Gym</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        


        

      </div>

      <div class="col-md-4">
        <div class="hotelrt pb-3">
          <h2>Inclusions</h2>
          <ul>
            <li><i class="fa fa-plane"></i><p>Flight</p></li>
            <li><i class="fa fa-hotel"></i><p>Hotel</p></li>
            <li><i class="fa fa-cutlery"></i><p>Meal</p></li>
            <li><i class="fa fa-wheelchair-alt"></i><p>Activity</p></li>
          </ul>
          <ul class="itinerary-listt  mt-2">
            <li><i class="fa fa-calendar"></i> Mar 04, 2022 / 10 Nights</li>
            <li><i class="fa fa-plane"></i> London All Airports</li>
            <li><i class="fa fa-spoon"></i> Bed &amp; Breakfast, All Inclusive</li>
            <li class="d-none"><i class="fa fa-plane"></i> London Heathrow - <a href="#">See alternate flights <i class="fa fa-angle-right"></i></a></li>
            <li class="d-none"><i class="fa fa-spoon"></i> Bed &amp; Breakfast, All Inclusive - <a href="#">See more room types <i class="fa fa-angle-right"></i></a></li>
          </ul>

          <div class="incllud">
            <p><i class="fa fa-check-circle-o"></i> <strong>What's Included</strong></p>
            <ul class="listt">
                <li class="">New York &amp; Cancun<br>3 Nights at 4* - RIU Plaza Hotel<br>7 Nights at 5* - Now Emerald Cancun Hotel &amp; Resort<br>11nights from 1299pp<br>Book now with a low deposit of only 49pp</li><span class="toggle-included text-primary less d-none">Show less</span> 
            </ul> 
          </div>

          <div class="itinerary_btn bdr1 text-center border p-1 m-2">
            <p>for <span> £1299</span> pp</p>
            <a href="#">view details</a>
           
            <a class="m-0 text-decoration-none text-white d-inline" href="#"><button class="btn btn-primary btn-sm home-search-btn"><i class="fa fa-phone"></i> 020 7725 7090 </button></a>
            <a class="m-0 text-decoration-none text-white d-inline btnEnquire" href="#"><button class="btn btn-secondary btn-sm">Enquire Now <i class="fa fa-angle-right"></i></button></a>
        </div>
        </div>
          <div class="shadow pad10 mgn-btm-20 mt-4 hotelrt">
              <h6><b>Why Book with us?</b></h6>
              <ul class="itinerary-listt">
                  <li><i class="fa fa-shield"></i> No-hassle best price guarantee</li>
                  <li><i class="fa fa-headphones"></i> Customer care available 24/7</li>
                  <li><i class="fa fa-star"></i> Hand-picked Tours &amp; Activities</li>
                  <!-- <li><i class="fa fa-shield"></i> Free Travel Insurance</li> -->
              </ul>
          </div>

          <div class="pad10 mgn-btm-20 help-widget hotelrt">
              <h6><b>Get a Question?</b></h6>
              <p>Do not hesitage to give us a call. We are an expert team and we are happy to talk to you.</p>
              <ul class="itinerary-listt">
              <li><a href="tel:020 7725 7090" class="text-dark"><i class="fa fa-phone"></i> <b>020 7725 7090</b></a></li>
              <li><a href="mailto:info@farebytravel.com" class="text-dark"><i class="fa fa-envelope"></i> <b>info@farebytravel.com</b></a></li>
              </ul>
          </div>

          <div class="enquiry_book_with_us shadow hotelrt mt-4"><br>
              <h5><b>Book with Confidence</b></h5>
              <ul class="itinerary-listt mt-3 pb-3">
                  <li class="d-inline"><img class="p-2" src="images/gaf-abta.png" width="100px" alt="gaf-abta"></li>
                  <li class="d-inline"><img src="images/atol-color.png" width="70px" alt="atol-color"></li>
                  <li class="d-inline"><img src="images/iata-color.png" width="70px" alt="iata-color"></li>
              </ul>
          </div>

      </div>
      
    </div>
 
  </div>
</section>

<section class="whybook">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="whybook-info text-center">
          <div class="whybook-img"><img src="images/Cheap-Flight-01.svg" width="100" alt=""></div>
          <h3>Cheap Flight Tickets</h3>
          <p>Lorem Ipsum is simply dummy text of the <br>printing and typesetting industry</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="whybook-info text-center">
          <div class="whybook-img"><img src="images/Experience-01.svg" width="100" alt=""></div>
          <h3>Cheap Flight Tickets</h3>
          <p>Lorem Ipsum is simply dummy text of the <br> printing and typesetting industry</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="whybook-info text-center">
          <div class="whybook-img"><img src="images/Payment saftey-01.svg" width="100" alt=""></div>
          <h3>Cheap Flight Tickets</h3>
          <p>Lorem Ipsum is simply dummy text of  <br>the printing and typesetting industry</p>
        </div>
      </div>

    </div>
  </div>
</section>