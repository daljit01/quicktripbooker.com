<style>
  section.bannerform-sec.single-form.single-form1.flighttop-form{
    background: url('<?php echo base_url('assets/images/hotel/search_banner.jpg'); ?>');
    background-size: cover;
    padding: 60px 0px 59px 0px;
    margin-top: 0%;
    margin-bottom: 40px;
    background-position: center;
  }
  @media (max-width: 767px) {
    .home-banner-form-single {
        padding-top: 60px;
    }
    section.bannerform-sec.single-form.single-form1.flighttop-form{
      padding: 20px 0 !important;
    }
    .hotelForm .form-group {
      padding-bottom: 10px !important;
    }
    .hotelForm .form-group i {
      bottom: 18px !important;
    }
  }
  .form-control {
    padding-left: 40px !important;
}
</style>
<section class="bannerform-sec single-form single-form1 flighttop-form hoteltop-res-margin"> 
  <div class="container">
    <div class="home-banner-form home-banner-form-single">
      <div class="hotelForm">
        <?php
          include("hotel-search.php");
        ?>
      </div>
    </div>
  </div>
</section>
  <?php 
if(!empty($searchprogress))
{
?>
<section class="hotel-sec pt-3">
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
    <div class="row no-gutters mb-5 justify-content-center hotel_listbox">
      <div class="col-md-4">
        <div class="hotel-info">
          <a target="_blank" href="<?php echo base_url('hotel-details/'.$hotel['id']); ?>"> 
          <div class="hotel-img">
            <img src="<?php echo $hotel['image'] ?>" style="height:220px;" alt="hotel image">
            <div class="hotel-text">
              <!-- <h2>BED & BREAKFAST, ALL INCLUSIVE</h2> -->
              <h3><?php echo $hotel['name'] ?></h3>
            </div>
          </div></a>
        </div>

      </div>

      <div class="col-md-8">
        <div class="hotelrt">          
          
          <div class="row no-gutters col-12">
            <div class="col-md-8">
              <h2><?php echo $hotel['name'] ?></h2>
              <ul class="hotelSearchIcon">
                <!-- <li><i class="fa fa-plane"></i><p>Flight</p></li> -->
                <li><i class="fa fa-hotel"></i><p>Hotel</p></li>
                <li><i class="fa fa-cutlery"></i><p>Meal</p></li>
                <li><i class="fa fa-wheelchair-alt"></i><p>Activity</p></li>
              </ul>
                
                <ul class="itinerary-listt">
                <li><i class="fa fa-calendar"></i> <?php echo date("M d,Y",strtotime($date_from)); ?> / <?php echo ucwords($hotel['fullyBundledPricePerStay']); ?></li>
                <li><i class="fa fa-plane"></i> <?php echo $hotel_city; ?> Airport</li>
                <li><i class="fa fa-address-card"></i> <?php echo $hotel['address']; ?></li>
                <?php echo ($hotel['freeCancellation'] == 1) ? "<li><i class='fa fa-check' aria-hidden='true'></i>FREE cancellation</li>" : ""; ?> 
                <?php echo (array_key_exists('paymentPreference',$hotel) && $hotel['paymentPreference'] == 1) ? "<li><i class='fa fa-check' aria-hidden='true'></i>No prepayment needed</li>" : ""; ?></li>
                <!-- <li><i class="fa fa-spoon"></i> Bed &amp; Breakfast, All Inclusive</li> -->
                <li class="d-none"><i class="fa fa-plane"></i> London Heathrow - <a href="#">See alternate flights <i class="fa fa-angle-right"></i></a></li>
                <li class="d-none"><i class="fa fa-spoon"></i> Bed &amp; Breakfast, All Inclusive - <a href="#">See more room types <i class="fa fa-angle-right"></i></a></li>
              </ul>
            </div>
            <div class="col-md-4">
              <div class="itinerary_btn bdr1 text-center border p-2 m-2">
                <!-- <h3> What's Included</h3>
                <ul>
                  <li>5 Nights / 6 Days stay.</li>
                  <li>Fly with Emirates - Direct flight.</li>
                  <li>15% Early booking discount applied.</li>
                  <li>Enjoy our rooftop pool, kids’ club, and spa.</li>
                  <li>Free shuttle will take you to the beach and nearby mall.</li>
                  <li>44th-floor retro American diner with a bowling alley.</li>
                  <li>Private airport transfers.</li>
                  <li>Meals included.</li>
                </ul> -->
              
                  <p>for <span> <?php echo $hotel['price']; ?></span></p>
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
                  <a target="_blank" href="<?php echo base_url('hotel-details/'.$hotel['id']); ?>?price=<?php echo $hotel['price']; ?>">view details</a>
                
                  <a class="m-0 text-decoration-none text-white d-inline text-center w-100 pt-1" href="<?php echo base_url('hotel-details/'.$hotel['id']); ?>?price=<?php echo $hotel['price']; ?>"><button class="bookBtn w-100 mt-3 justify-content-center">Book Now</button></a>
                  <!--<a class="m-0 text-decoration-none text-white d-inline btnEnquire" href="#"><button class="btn btn-secondary btn-sm">Enquire Now <i class="fa fa-angle-right"></i></button></a>-->
              </div>
            </div>
          </div>
          

          <!-- <div class="incllud">
            <p><i class="fa fa-check-circle-o"></i> <strong>What's Included</strong></p>
            <ul class="listt">
                <li class="">New York &amp; Cancun<br>3 Nights at 4* - RIU Plaza Hotel<br>7 Nights at 5* - Now Emerald Cancun Hotel &amp; Resort<br>11nights from 1299pp<br>Book now with a low deposit of only 49pp</li><span class="toggle-included text-primary less d-none">Show less</span> 
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
<section class="whybook">
  <div class="container">
    <!-- <div class="title text-center">
      <h2>Why Book With Us</h2>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br> Lorem Ipsum has been the industry's standard dummy text ever since </p>
    </div>  -->
    <div class="row">
      <div class="col-md-4">
        <div class="whybook-info text-center">
          <div class="whybook-img"><img src="<?php echo base_url('assets/images/Cheap-Flight-01.svg');?>" width="100" alt=""></div>
          <h3>Best boarding services</h3>
          <p>We take you into the exclusive boarding schedules with high comfort and luxury amenities. Fall in love with the varied services that is sure to appeal you and also take your expectations to the next level</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="whybook-info text-center">
          <div class="whybook-img"><img src="<?php echo base_url('assets/images/Experience-01.svg');?>" width="100" alt=""></div>
          <h3>Multiple Airlines available</h3>
          <p>Have plans of flying in your favorite flight? Relax as we assure to take you on your favorite destinations with the choice of your own flight today. Worried of missing any flight? Relax as we assure to make you land at your destined land today</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="whybook-info text-center">
          <div class="whybook-img"><img src="<?php echo base_url('assets/images/Payment saftey-01.svg');?>" width="100" alt=""></div>
          <h3>Cheap flight deals for you</h3>
          <p>Wishing to fly to your fantasy land within your own budget? Well, you can fulfill your wish by reaching out to us to plan your next journey comfortably</p>
        </div>
      </div>

    </div>
  </div>
</section>
