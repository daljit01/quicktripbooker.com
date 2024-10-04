<style>
  section.bannerform-sec.single-form.single-form1.flighttop-form{
    background: url('<?php echo base_url('assets/images/hotel/search_banner.jpg'); ?>');
    background-size: cover;
    padding: 60px 0px 59px 0px;
    margin-top: 0%;
    margin-bottom: 40px;
    background-position: center;
  }
  section.single-page-bg.position-relative.packege-hotel-details form button{
    margin: 24px 0px 0px 0px;
  }
  section.single-page-bg.position-relative.packege-hotel-details{
     margin-top:0px !important;
  }
  .card{
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
  }
  .img-single-hotel-details {
    border-radius: 8px;
    overflow: hidden;
    height: 415px;
  }
  .img-single-hotel-details img{
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  h1{
    font-weight: 900;
  }
  h1 span{
    color: var(--prim-color);
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
  .form-control{
    padding-left: 40px !important;
    border: 1px solid #ddd;
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

<section class="pt-0 pb-5 single-content-bg mb-0">
  <div class="container">
    <div class="row mt-5 gy-3">

      <div class="col-md-8">
        <div class="img-single-hotel-details">
          <img src="<?php echo $hotel['propertyGallery']->images[0]->image->url; ?>" alt="" class="w-100">
        </div>
      </div>
      <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div>
            <h5 class="hoteldetails-rt-title"><?php echo $hotel['summary']->name; ?></h5>
            <div class="star-rating-hotel">
                <?php
                    if($hotel['summary']->overview->propertyRating->rating > 0)
                    {
                      $totalrate = 5;
                      if($hotel['summary']->overview->propertyRating->rating > 0)
                      {
                        for($r=1;$r<=$hotel['summary']->overview->propertyRating->rating;$r++)
                        {
                        ?>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <?php  
                        }
                      }
                      $remrate = $totalrate - (int)$hotel['summary']->overview->propertyRating->rating;
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
            </div>
          </div>
          <div>
            
          </div>
                    
          <?php
             if(property_exists((object)$hotel,"summary") && count((array)$hotel) > 0)
             {
              if(property_exists((object)$hotel['summary'],"address") && count((array)$hotel['summary']) > 0)
              {
            ?>
            <div class="price-hotel-details w-100">
              <p class="text-left"><?php echo $hotel['summary']->location->address->addressLine; ?></p>
              </div>
            <?php
              }
            }
            ?>
          <div class="hoteldetails-rt d-flex">
            <!-- <ul class="prmRoomFacilities w-100" style="list-style: none;"> -->
                <?php
                // if(property_exists((object)$hotel,"reviewInfo") && count((array)$hotel) > 0)
                // {
                //   if(property_exists((object)$hotel['reviewInfo'],"summary") && count((array)$hotel['reviewInfo']) > 0)
                //   {
                //     if(property_exists((object)$hotel['reviewInfo']->summary,"overallScoreWithDescriptionA11y") && !empty((array)$hotel['reviewInfo']->summary->overallScoreWithDescriptionA11y))
                //     {
                //       if(!empty($hotel['reviewInfo']->summary->overallScoreWithDescriptionA11y->value))
                //       {
                // ?>
                <!-- <li>
                  <p class="rt-hotel-rating mb-0">
                    <a href="#"> <?php //echo $hotel['reviewInfo']->summary->overallScoreWithDescriptionA11y->value; ?></a>
                  </p>
                </li> -->
                <?php
                    //   }
                    // }
                    // if(property_exists((object)$hotel['reviewInfo']->summary,"highlightMessage"))
                    // {
                    //   if(property_exists((object)$hotel['reviewInfo']->summary->highlightMessage,"subtitle"))
                    //   {
                ?>
                <!-- <li><b style="font-size: 12px;"><?php //echo $hotel['reviewInfo']->summary->highlightMessage->subtitle->text; ?></b></li> -->
                <?php
                //      }
                //     }
                //   }
                // }
                ?>
            </ul>
            <?php
             if(!empty($price))
             {
            ?>
            <div class="price-hotel-details" style="width: 100%;">
            <?php
                 if(!empty($price))
                  {
                ?>
                <ul>
                  <li><p>Per Night</p></li>
                  <li><p class="hotel-rt-price"><strong>Total</strong></p></li>
                  <li><p class="text-end"><?php echo $price; ?></p></li>
                  <li><p class="hotel-rt-price text-end"><strong><?php echo $price; ?></strong></p></li>
                </ul>
                <?php
                  }
              ?>
            </div>
            <?php
             }
            ?>
          </div>
         <div class="border-top">
         <a href="tel:<?php echo $this->Site_Model->support_phone_link; ?>" class="card-link1 mt-2">
          <i class="fa fa-volume-control-phone" aria-hidden="true"></i> <?php echo $this->Site_Model->support_phone; ?></a>
         </div>
          
        </div>
      </div>
        
      <div class="home-banner-form11 home-banner-form112 card box-shadow mt-2 p-3">
                <?php if ($this->session->flashdata('status') == 0 && !empty($this->session->flashdata('msg'))) { ?>
				<h6 class="checkusererror"><?php echo $this->session->flashdata('msg'); ?></h6>
			<?php } 
			if ($this->session->flashdata('status') == 1 && !empty($this->session->flashdata('msg'))) { ?>
				?>
				<h6 class="checkusersuccess"><?php echo $this->session->flashdata('msg'); ?></h6>
				<?php
			}
			?>
			<a href="tel:<?php echo $this->Site_Model->support_phone_link; ?>" class="card-link1 mt-2">
                 <button class="btn btn-secondary w-100 home-search-btn">CALL NOW</button>
			</a>
           </div>
      </div>    
    </div>
<div class="contant-alloverview">
  <h1 class="text-center mt-2">OVER<span>VIEW</span></h1>
  <p style="font-weight: 300; text-align: center;">About <?php echo $hotel['summary']->name; ?></p>

  <div class="row">
    
    <?php
   if(property_exists((object)$hotel,"summary") && count((array)$hotel) > 0)
   {
    if(property_exists((object)$hotel['summary'],"amenities") && count((array)$hotel['summary']->amenities) > 0)
     {
      if(property_exists((object)$hotel['summary']->amenities,"topAmenities") && count((array)$hotel['summary']->amenities) > 0)
      {
  ?>
 
    <?php
    $heading =$hotel['summary']->amenities->topAmenities->header->text;
   
    if(!empty($heading))
    {
    ?>
   
     <div class="col-xl-4 col-md-6 col-12 mb-4">
      <div class="wrapper">
        <p><?php echo $heading; ?></p>
        <?php
        }
        if(property_exists((object)$hotel['summary']->amenities->topAmenities,"items") && count((array)$hotel['summary']->amenities->topAmenities) > 0)
        {
          if(count((array)$hotel['summary']->amenities->topAmenities->items) > 0)
          {        
        ?>
        <ul>
          <?php
            foreach($hotel['summary']->amenities->topAmenities->items as $overview)
            {
            ?>
            <li><?php echo  $overview->text; ?></li>
            <?php
            }
          ?>
        </ul>
      </div>
    </div>
  
  <?php
      }
    }
      }
      

      if(property_exists((object)$hotel['summary']->amenities,"takeover") && count((array)$hotel['summary']->amenities->takeover) > 0)
      {
        if(property_exists((object)$hotel['summary']->amenities->takeover,"property") && count((array)$hotel['summary']->amenities->takeover->property) > 0)
      {
        foreach($hotel['summary']->amenities->takeover->property as $property)
        {
  ?>
 
    <?php
    $heading =$property->header->text;
   
    if(!empty($heading))
    {
    ?>
   
     <div class="col-xl-4 col-md-6 col-12 mb-4">
      <div class="wrapper">
        <p><?php echo $heading; ?></p>
        <?php
        }
        if(property_exists((object)$hotel['summary']->amenities->topAmenities,"items") && count((array)$hotel['summary']->amenities->topAmenities) > 0)
        {
          if(count((array)$hotel['summary']->amenities->topAmenities->items) > 0)
          {        
        ?>
        <ul>
          <?php
            foreach($property->items as $item)
            {
            ?>
            <li><?php echo  $item->text; ?></li>
            <?php
            }
          ?>
        </ul>
      </div>
    </div>
  
  <?php
      }
    }
      }
    }
    }

     }
   }
  ?>
    </div>
    </div> 
 <div class="row">
   <?php
   if(property_exists((object)$hotel,"propertyGallery") && count((array)$hotel) > 0)
   {
     if(count((array)$hotel['propertyGallery']->images) > 0)
     {
   ?>
   <div class="col-md-6 mt-3 mb-5">
   <h1 class="mb-3">GAL<span>LERY</span></h1>
      <div class="fotorama" data-nav="thumbs" data-allowfullscreen="true" data-width="100%" data-maxheight="450">
        <?php
         foreach($hotel['propertyGallery']->images as $roomimg)
         {
        ?>
            <img src="<?php echo $roomimg->image->url;?>" class="roomimg w-100" alt="">
        <?php
         }
        ?>
      </div>
   </div>
   <?php
     }
   }
   ?>
   <div class="col-md-6">
   <?php
if(property_exists((object)$hotel,"summary") && count((array)$hotel) > 0)
{
  if(property_exists((object)$hotel['summary'],"location") && count((array)$hotel['summary']) > 0)
  {
    if(property_exists((object)$hotel['summary']->location,"coordinates") && count((array)$hotel['summary']->location->coordinates) > 0)
    {
  ?>
<div class="map mt-3 mb-5">
<h1 class="mb-3">LOCA<span>TION</span></h1>  <iframe width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
  src="https://maps.google.com/maps?q=<?php echo $hotel['summary']->location->coordinates->latitude; ?>,<?php echo $hotel['summary']->location->coordinates->longitude; ?>&hl=es&z=14&amp;output=embed"
 >
 </iframe>
</div>
<?php
    }
  }
}
?>
   </div>
 </div> 
<?php
  //if(property_exists((object)$hotel['propertyContentSectionGroups'],"policies") && count((array)$hotel['propertyContentSectionGroups']->policies) > 0)
  //{
?>
 <!-- <div class="contant-alloverview"> -->
  <!-- <h3><?php //echo $hotel['propertyContentSectionGroups']->policies->sectionName; ?></h3> -->
  <?php
  //if(property_exists((object)$hotel['propertyContentSectionGroups']->policies,"sections") && count((array)$hotel['propertyContentSectionGroups']->policies->sections) > 0)
  // {
  //   foreach($hotel['propertyContentSectionGroups']->policies->sections as $section)
  //   {
  ?>
    <!-- <p><b><?php //echo $section->header->text; ?></b></p> -->
    <?php
  // if(property_exists((object)$section,"bodySubSections") && count((array)$section->bodySubSections) > 0)
  // {
  //   foreach($section->bodySubSections as $subsection)
  //   {
  //     if(property_exists((object)$subsection,"elements") && count((array)$subsection->elements) > 0)
  //     {
  //       foreach($subsection->elements as $elements)
  //       {
  ?>
    <!-- <div class="ps-2 col-sm col-6"> -->

      <!-- <p><b><?php //echo $elements->header->text ?></b></p> -->
      <?php
      // if(property_exists((object)$elements,"items") && count((array)$elements->items) > 0)
      // {
      //   foreach($elements->items as $item)
      //   {
      //     if(!empty($item->content->text))
      //     {
      ?>
      <!-- <p><?php //echo $item->content->text; ?></p> -->
      <?php
      //     }
      //     if(!empty($item->content->primary->value))
      //     {
               ?>
             <!-- <p><?php //echo $item->content->primary->value; ?></p> -->
             <?php
      //     }
      //   }
      // }
      ?>
    <!-- </div> -->
  <?php
  //       }
  //     }
  //   }
  // }
  //   }
  // }
  ?>
<!-- </div> -->
<?php
  // }
?>

<h1 class="mb-3 text-center">Facilities at <span><?php echo $hotel['summary']->name; ?></span></h1>

<div class="row1 no-gutters1">
  <div class="">
<?php
if(property_exists((object)$hotel['summary'],"amenities") && count((array)$hotel['summary']) > 0)
{
  if(count((array)$hotel['summary']->amenities) > 0)
  {
    foreach($hotel['summary']->amenities->amenities as $amenities)
    {
  ?>
  <div class="col-md-1211 mt-3">
    <p class="pb-2 mb-0"><span class="fclty__header--iconWrapper appendRight12">
    <?php  

    if (strpos(strtolower($amenities->title),'property') !== false) 
    {
    ?>
    <img src="<?php echo base_url() ?>assets/images/hotel.png" alt="Bar">
    <?php
    }
    elseif (strpos(strtolower($amenities->title),'room') !== false) 
    {
    ?>
    <img src="<?php echo base_url() ?>assets/images/room.png" alt="Bar">
    <?php
    }
    else
    {
      ?>
      <img src="<?php echo base_url() ?>assets/images/aminity.png" alt="Bar">
      <?php  
    }
    ?>
    
    </span>
    <span class="latoBold font16"><b><?php echo $amenities->title; ?></b></span></p>
    <div class="row no-gutters border-bottom">
    <?php
    if(property_exists((object)$amenities,"contents") && count((array)$amenities->contents) > 0)
    {
      foreach($amenities->contents as $listitem)
      {
    ?>
    
  <div class="col-md-3 mb-3">
    <div class="facility-hotel-details">
      <h4><?php echo $listitem->header->text ?></h4>
      <?php
      if(property_exists((object)$listitem,"items") && count((array)$listitem->items) > 0)
      {
      ?>
      <ul>
        <?php
        foreach($listitem->items as $item)
        {
        ?>
        <li><?php echo $item->text; ?></li>
        <?php
        }
        ?>
      </ul>
      <?php
      }
      ?>
    </div>
    </div>
  
    <?php
      }
    }
    ?>
      </div>
  </div>
  <?php
    }
  }
}
  ?>
</div>

<!-- <div class="row">
  <div class="col-md-12">
    <div class="user-review mt-5">
      <p><b>User Ratings & Reviews</b> <br>
      Important information that you need to know before you book!</p>
    </div>
  </div>
  <div class="col-md-5">
    <div class="user-review "> -->
      <?php
        //if(property_exists((object)$hotel,"reviewInfo") && count((array)$hotel) > 0)
        //{
   
          // if(property_exists((object)$hotel['reviewInfo'],"summary") && count((array)$hotel['reviewInfo']->summary) > 0)
          // {
      
          //   if(property_exists((object)$hotel['reviewInfo']->summary,"overallScoreWithDescriptionA11y") && count((array)$hotel['reviewInfo']->summary->overallScoreWithDescriptionA11y) > 0)
          //   {
        
          //     if(!empty($hotel['reviewInfo']->summary->overallScoreWithDescriptionA11y->value))
          //     {
      ?>
      <!-- <p class="rt-hotel-rating"><?php //echo $hotel['reviewInfo']->summary->overallScoreWithDescriptionA11y->value ?></p> -->
      <?php
        //   }
        // }
      ?>
      <?php
        // if(property_exists((object)$hotel['reviewInfo']->summary->highlightMessage,"subtitle"))
        // {
      ?>
      <!-- <p><b><?php //echo $hotel['reviewInfo']->summary->highlightMessage->subtitle->text ?></b> </p> -->
      <?php
            // }
        ?>
      <?php
          // }
        // }
      ?>
    <!-- </div>
  </div>
</div> -->

</div>

  </div>
</section>

