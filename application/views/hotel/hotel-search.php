<style>
  .hotelForm .form-group{
    padding-bottom: 0;
  }
  .hotelForm .form-group i{
    bottom: 8px;
  }
  .hotelForm{
    background: #000;
    margin: 60px 0px 0px 0px;
  }
  button.btn.btn-secondary.home-search-btn{
    margin-top: 0px;
  }
  .home-banner-form .form-control{
    width: 90%;
  }
  @media (max-width:991px) {
    .home-banner-form .form-control{
      width: 100%;
    }
  }
</style>
<form method="post" action="<?php echo base_url('search-hotel-lookup') ?>" name="hotel_search_frm" id="hotel_search_frm" class="travl-search-advanced clearfix">
       
      <div class="row no-gutters">
        <div class="col-xl-4 col-12">
            <div class="form-group form-style">
          <label class="level-home-form">City / Hotel / Area</label>
            <!-- <input type="text" class="date_from iata_code quote_frm form-control ui-autocomplete-input" autocomplete="off" id="routeorigincode" name="origincode" placeholder="Add departure"> -->
            <!-- <input type="text" class="date_from iata_code quote_frm form-control routeorigincode" autocomplete="off" id="routeorigincode" name="origincode" placeholder="Add departure">
            <input type="hidden" class="date_fromt iata_code_city quote_frm form-control" autocomplete="off" id="origin_iata_code_city" name="origin_iata_code_city" placeholder="Add departure">
            <input type="hidden" class="cityname" autocomplete="off" id="origin_cityname" name="origin_cityname">
            -->
            <input type="text" class="hoteldestination quote_frm form-control routeorigincode" autocomplete="off" value="<?php echo $hotel_city; ?>" id="hotel_city" name="hotel_city" placeholder="City / Hotel / Area">
            <input type="hidden" class="destinationId form-control quote_frm" autocomplete="off" value="<?php echo $destinationId; ?>" id="destinationId" name="destinationId">
            <i class="fa-solid fa-tree-city"></i>
          </div>
        
        </div>
      
        <div class="col-xl-3 col-12">
            <div class="form-group form-style">
                <label class="level-home-form">Check-in date</label>
                <input type="text" class="quote_frm form-control quote_frm" autocomplete="off" name="date_from" id="date_from1" value="<?php echo $date_from; ?>"  placeholder="Check-in date"> 
                <i class="fa-solid fa-calendar-days"></i>
            </div>
        </div>
        <div class="col-xl-3 col-12">
            <div class="form-group form-style">
                <label class="level-home-form">Check-out date</label>
                <input type="text" class="quote_frm form-control quote_frm"  autocomplete="off" name="date_to" id="date_to1" value="<?php echo $date_to; ?>" placeholder="Check-out date">
                <i class="fa-solid fa-calendar-days"></i>
            </div>
        </div>
      
        <div class="col-xl-2 col-12 mt-auto">
            <div class="form-group1 form-btn-style form-btn-style-search text-right">
            <button class="btn btn-secondary home-search-btn w-100 h-auto"><i class="fa fa-search"></i> Search</button>
            </div>
        </div>
      </div>        
        <input type="hidden" name="no_of_adults" id="no_of_adults" value="1">
        <input type="hidden" name="searchflag" id="searchflag" value="1">
  </form>