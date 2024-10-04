<?php
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Make your best holiday planning with our expertise, Infinity Travel mate, for all ocassions.">
	
	<meta property="og:title" content="Make your best holiday planning with our expertise, Infinity Travel mate, for all ocassions." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo $url; ?>" />
    <meta property="og:image" content="<?php echo $url; ?>assets/images/logo-header-b.png" />
    <meta property="og:site_name" content="Make your best holiday planning with our expertise, Infinity Travel mate, for all ocassions." />
    <meta property="og:description" content="Make your best holiday planning with our expertise, Infinity Travel mate, for all ocassions." />
    
	<meta name="author" content="Traveller Buddy">
    <title><?php echo $this->Site_Model->websitename; ?></title>

    <link rel="shortcut icon" href="<?php echo base_url('assets/images/fav-icon.png');?>" type="img/x-png">
	<link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/flight.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/hotel.css');?>" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/rangeslider.css');?>">
	<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css">
	<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-regular.css">
	<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-light.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
	<style>
		.formonbanner .home-banner-form .ui-autocomplete-loading { background: url('<?php echo base_url('assets/images/loading.svg'); ?>') right no-repeat, linear-gradient( transparent 100%, rgba(0, 0, 0, 0.5)100%) !important;z-index: 99999999999;}
		.quote_frm_validate {
    			border: 1px solid red !important;
		}
		/* .ui-menu .ui-menu-item {
    margin: 0;
    cursor: pointer;
    list-style-image: url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7);
    z-index: 99999999999;
} */
		
	</style>
</head>

<body>
<div class="layer"></div>
	<!-- Mobile menu overlay mask -->

	<!-- Header================================================== -->
	<header class="<?php echo !empty($userheader) ? $userheader : ""; ?> <?php echo !empty($pageflightres) ? $pageflightres : ""; ?> headercontentturkish">
    
		<div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-2 col-9">
                    <div id="logo_home">
                    	<h1><a href="<?php echo base_url('/'); ?>" title="logo"><img src="<?php echo base_url('assets/images/logo-header.png');?>" alt="logo"></a></h1>
                    </div>
                </div>
                <nav class="col-lg-6 col-3 text-lg-center">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#">  <span>Menu mobile</span></a>
                    <div class="main-menu">
                        <div id="header_menu">
                            <img src="<?php echo base_url('assets/images/logo-header-b.png');?>" width="160" height="34" alt="logo">
                        </div>
                        <a href="#" class="open_close" id="close_in"><i class="fa fa-times"></i></a>
                        <?php
						include("menu.php");
						?>
                    </div>
                </nav>

				<!-- <div class="col-lg-4 col-12 text-lg-right text-center">
					<ul id="top_links">
						<li><a href="tel:<?php //echo $this->Site_Model->support_phone_link; ?>" class="hd-ph"><i class="fa fa-phone"></i> <strong><?php //echo $this->Site_Model->support_phone; ?></strong></a></li>
						<li><a href="mailto:<?php //echo $this->Site_Model->support_email; ?>" class="email hd-email"> <i class="fa fa-envelope"></i> <strong><?php //echo $this->Site_Model->support_email; ?></strong></a></li>
					</ul>
				</div> -->
            </div>
        </div>
	</header>
	<!-- End Header -->
	<?php echo $contents; ?>
	
	<footer class="<?php echo !empty($pageflightres) ? $pageflightres : ""; ?> headercontentturkish">
        <div class="container border-bottom pt-4">
            <div class="row">
				<div class="col-md-12">
				<div class="row">
				<div class="col-sm-3 col-12">
					<div class="footer-wtgt">
					<h3>Quick Links</h3>
                       <ul>
						<li><a href="<?php echo base_url('about'); ?>">About Us</a></li>
						<li><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
						<li><a href="<?php echo base_url('refund-policy'); ?>">Cancelation Policy</a></li>
						<li><a href="<?php echo base_url('privacy-policy'); ?>">Privacy Policy</a></li>
						<!-- <li><a href="<?php //echo base_url('mybooking'); ?>">My Booking</a></li> -->
						<li><a href="<?php echo base_url('taxes-and-fees'); ?>">Taxes & Fees</a></li>
						<li><a href="<?php echo base_url('online-check-in'); ?>">Online Check-In</a></li>
						<li><a href="<?php echo base_url('terms-and-conditions'); ?>">Terms and Conditions</a></li>
						<li><a href="<?php echo base_url('blog'); ?>">Blog</a></li>
					   </ul>
                        
                    </div>
					<hr>
                </div>
				<div class="col-sm-3 col-12">
					<div class="footer-wtgt">
					<h3>Top Airlines</h3>
                       <ul>
						<li><a href="<?php echo base_url('alaska-airlines'); ?>">Alaska airlines</a></li>
						<li><a href="<?php echo base_url('allegient-airlines'); ?>">Allegiant Airlines</a></li>
						<li><a href="<?php echo base_url('american-airlines'); ?>">American Airlines</a></li>
						<li><a href="<?php echo base_url('hawaii-airlines'); ?>">Hawaii Airlines</a></li>
						<li><a href="<?php echo base_url('frontiar-airlines'); ?>">Frontier Airlines</a></li>
						<li><a href="<?php echo base_url('sprite-airlines'); ?>">Spirit Airlines</a></li>
						<li><a href="<?php echo base_url('jetBlue-airlines'); ?>">JetBlue Airlines</a></li>
						<li><a href="<?php echo base_url('southwest-airlines'); ?>">Southwest Airlines</a></li>
					   </ul>
                    </div>
					<hr>
                </div>


				<div class="col-sm-3 col-12">
				<div class="footer-wtgt">
					<h3>Top Destinations</h3>
                       <ul>
						<li><a href="<?php echo base_url('montreal'); ?>">Montreal</a></li>
						<li><a href="<?php echo base_url('lake-tahoe'); ?>">Lake Tahoe</a></li>
						<li><a href="<?php echo base_url('philadelphia'); ?>">Philadelphia</a></li>
						<li><a href="<?php echo base_url('Kitchener'); ?>">Kitchener</a></li>
						<li><a href="<?php echo base_url('massachusetts'); ?>">Massachusetts</a></li>
						<li><a href="<?php echo base_url('Savannah'); ?>">Savannah</a></li>
						<li><a href="<?php echo base_url('houston'); ?>">Houston</a></li>
						<li><a href="<?php echo base_url('chicago'); ?>">Chicago</a></li>
					</ul>
                        
                    </div>
					
                </div>

				<div class="col-sm-3 col-12">
                    <div class="footer-wtgt">
					<h3>Top Hotels</h3>
                       <ul>
						<li><a href="<?php echo base_url('hotel-details/729145184'); ?>">Sin City Las Vegas</a></li>
						<li><a href="<?php echo base_url('hotel-details/561017'); ?>">Central Park New York</a></li>
						<li><a href="<?php echo base_url('hotel-details/133927'); ?>">Maingate Florida Orlando</a></li>
						<li><a href="<?php echo base_url('hotel-details/110113'); ?>">Freehand Miami</a></li>
						<li><a href="<?php echo base_url('hotel-details/2337138144'); ?>">Boutique Hostel Los Angeles</a></li>
						<li><a href="<?php echo base_url('hotel-details/540979'); ?>">Downtowner Boutique Las Vegas</a></li>
						<li><a href="<?php echo base_url('hotel-details/425346'); ?>">Bowery Grand New York</a></li>
					   </ul> 
                    </div>
                </div>

				</div>
	<!-- end row -->

				</div>
	
			</div>
		
		</div>
     <!-- </div>
            
</div> -->

        <div class="footer-bottm pb-4 pt-4">
            <div class="container">
				
				<div class="row">
				
					<div class="col-sm-8 text-left font12footer-btn">
						<p><b>Disclaimer</b>- Please do note that <?php echo $this->Site_Model->websitename; ?> is an independent travel website. All of the data that has been supplied is generic in nature. The data on this page is provided merely for informational reasons. To guarantee that the data provided on the website is accurate and current, all essential steps have been taken. However, we make no representations or warranties, implied or otherwise, about the accuracy of the information under any circumstances. Completeness or accuracy of the data presented on the website. Feel free to <a href="<?php echo base_url('contact'); ?>">contact us</a> any time.
					</p>							
					</div>
					<div class="col-sm-4 col-12">
                    	<div class="footer-wtgt ">
                        <div id="logo_home">
                    		<h1><a href="<?php echo base_url('/'); ?>" title="logo"><img src="<?php echo base_url('assets/images/logo-header-b.png');?>" alt="logo"></a></h1>
                    	</div>
                        <!-- <div class="contact-info mt-3">
                            <div class="contact-line color-grey-1 footer-contact"><span><?php //echo $this->Site_Model->website_address; ?></span></div>
                            <div class="contact-line color-grey-1 footer-contact1"><a href="tel:<?php //echo $this->Site_Model->support_phone_link; ?>"><?php //echo $this->Site_Model->support_phone; ?></a></div>
                            <div class="contact-line color-grey-1 footer-contact2"><a href="mailto:<?php //echo $this->Site_Model->support_email; ?>"><?php //echo $this->Site_Model->support_email; ?></a></div>	
                        </div> -->
                    	</div>
                	</div>


				
				

				</div>
				</div>
				</div>


				<div class="footer-bottm1 py-2">
           			<div class="container">
						<div class="row align-items-center"> 
							<div class="col-sm-6 col-12">
								<p class="copy-right"><b>© Copyright <?php echo date("Y"); ?> <span class="colorred"><?php echo $this->Site_Model->websitename; ?></span> | All Rights Reserved.</b></p>
							</div>			
						</div>
            		</div>
        		</div>

		
    </footer>

    <!-- <div class="ph-fixed <?php //echo !empty($pageflightres) ? $pageflightres : ""; ?> headercontentturkish text-center pt-3 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="tel:<?php //echo $this->Site_Model->support_phone_link; ?>" class="text-white"><i class="fa fa-phone"></i> <?php //echo $this->Site_Model->support_phone; ?></a> 
                </div>
            </div>
        </div>
    </div> -->


    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Launch static backdrop modal
</button> -->

<!-- Modal -->
<div class="modal fade cuspopup" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
       
             <div class="col-md-12">
                 <div class="flight-form">
					 <div class="container1">
						 <form class="hotel-filter1" action="https://skytravelguru.com/welcome/send_request_quote" name="quotefrm" id="quotefrm" method="post">
						 <div class="baner-bar cars-bar banner-top1">
						
							 <div class="row">
								<div class="col-md-12 form-group">
									<label class="radio-inline">
									<input type="radio" id="roundtrip" value="Roundtrip" class="ge_travel_type" checked="checked" name="travel_type">
										<strong>Roundtrip</strong>
									  </label>
									  <label class="radio-inline">
									  <input type="radio" id="one-way" value="One way" class="ge_travel_type" name="travel_type">
										<strong>One way</strong>
									  </label>	
								</div>
								 <div class="col-md-12">
									 <div class="hotels-block">
									 <!--<h4>Origin</h4>-->
										 <div class="input-style-1">
											 <img src="https://skytravelguru.com/assects/img/loc_icon_small_grey.png" alt="">
											 <input type="text" class="quote_frm" autocomplete="off" id="georigincode" name="georigincode[]" placeholder="From">
										 </div>
										 
									 </div>	
									 </div>
							 
							 
									 <div class="col-md-12">
									 <div class="hotels-block">
									 <!--<h4>Destination</h4>-->
										 <div class="input-style-1">
											 <img src="https://skytravelguru.com/assects/img/loc_icon_small_grey.png" alt="">
											 <input type="text" class="quote_frm" autocomplete="off" id="gedestinationcode" name="gedestinationcode[]" placeholder="To">											 
										 </div>
									 </div>	
									 </div>
		 
							 <!-- <div class="timePiker dtpicker-overlay dtpicker-mobile"><div class="dtpicker-bg"><div class="dtpicker-cont"><div class="dtpicker-content"><div class="dtpicker-subcontent"></div></div></div></div></div> -->
							 
								<div class="col-md-6">
								 <div class="hotels-block">
								 <!--<h4>Departure Date</h4>-->
									 <div class="input-style-1">
										 <img src="https://skytravelguru.com/assects/img/calendar_icon_grey.png" alt="">
										 <input type="text" class="quote_frm" autocomplete="off" name="ge_date_from" id="ge_date_from" value="" placeholder="DD/MM/YY"> 
									 </div>
								 </div>
								 </div>
								 <div class="col-md-6">
									 <div class="hotels-block">
									 <!--<h4>Return Date</h4>-->
										 <div class="input-style-1">
											 <img src="https://skytravelguru.com/assects/img/calendar_icon_grey.png" alt="">
											 <input type="text" class="quote_frm" autocomplete="off" name="ge_date_to" id="ge_date_to" placeholder="DD/MM/YY">
										 </div>
										 
									 </div>	
								 </div>
								 <div class="col-md-12">
									 <div class="hotels-block">
									     <div class="input-style-1">
									         <img src="https://skytravelguru.com/assects/img/car_icon_3.png" alt="">
									 <input type="text" class="quote_frm" autocomplete="off" id="gename" name="gename" placeholder="Name">
										 </div>
									 </div>	
								 </div>
								 <div class="col-md-12">
									 <div class="hotels-block">
									     <div class="input-style-1">
									         <img src="https://skytravelguru.com/assects/img/phone_icon_dark.png" alt="">
									 <input type="text" class="quote_frm" autocomplete="off" id="gephone" name="gephone" placeholder="Phone">
										 </div>
									 </div>	
								 </div>
								 <div class="col-md-12">
									 <div class="hotels-block">
									     <div class="input-style-1">
									         <img src="https://skytravelguru.com/assects/img/mail_icon_dark.png" alt="">
									<input type="text" class="quote_frm" autocomplete="off" id="geemail" name="geemail" placeholder="E-mail">
										 </div>
									 </div>	
								 </div>
								 <div class="col-md-12">
									 <div class="submit1">
									 <input class="c-button b-60 bg-white hv-orange w-100" type="submit" value="Get a Free quotes">
									 </div>
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
  </div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/js/common_scripts_min.js');?>"></script>
<script src="<?php echo base_url('assets/js/functions.js');?>"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="<?php echo base_url('assets/js/rangeslider.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.cardcheck.js');?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.min.js"></script>
     <!-- SWITCHER  -->
    <script src="<?php echo base_url('assets/js/switcher.js');?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
	
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>		
    <script>
function GetFlightAutocomplete(selector)
{
  //debugger
	if($("#"+selector).length > 0)
	{       
		jQuery("#"+selector).autocomplete({                
			source: function (request, response) {
        //debugger
				jQuery.ajax({
					url: '<?php echo base_url('airport-city-lookup');  ?>',
					type: "GET",
				    data:{'q':request.term},
					success: function (data) {
                        if(data != "")
    					 {
    						//return false;
    						 response(jQuery.map(JSON.parse(data), function (item) {
    							 return {
    								label: item.iataCode+" : "+item.name,
    									value: item.iataCode,
    									iataCode: item.iataCode,
    									cityName: item.cityName,
    									countryName: item.countryName,
    									countryCode: item.countryCode,
    									detailedName: item.detailedName
    							};
    						 }));
    					 }
					}
				});
			},
			minLength: 2,
			select: function (event, ui) {
					jQuery("#"+selector).val(ui.item.value);
					jQuery("#"+selector).attr("type","hidden");
					jQuery("#"+selector).parent().find(".iata_code_city").val(ui.item.cityName+" , "+ui.item.countryName);
					jQuery("#"+selector).parent().find(".iata_code_city").attr("type","text");
          			jQuery("#"+selector).parent().find(".cityname").val(ui.item.cityName);
					var pagename = $("#page").val();
					if(selector == "routedestinationcode")
					{
						if(pagename == "hotel-flight")
						{
							GetHotelDestination(ui.item.cityName);
							$("#hotel_city").val(ui.item.cityName);
						}
					}
					// $(this).parent().find(".searchfield").attr("type","hidden");
					// $(this).parent().find(".searchcontainer").show();
					// $(this).parent().find(".searchcontainer").html(ui.item.cityName);
					// $(this).parent().find(".cityname").val(ui.item.cityName);
					// $(this).parent().find(".countryname").val(ui.item.countryName);
					// $(this).parent().find(".countrycode").val(ui.item.countryCode);
					// $(this).parent().find(".searchicon").hide();
					// $(this).parent().find(".code").html(ui.item.iataCode+", "+ui.item.label);
					//$("#new_product_Id").val(ui.item.value);
			}                    
		}).data("ui-autocomplete")._renderItem = function( ul, item ) {
		return $( "<li>" )
		.append( "<div class='item_container'><div class='item_details'>" + item.cityName + " , "+item.countryName+"<br>"+item.label+"</div><div class='item_code'>" + item.iataCode + "</div></div>" )
		.appendTo( ul );
		};
	}
}
function GetHotelDestination(cityname)
{
	jQuery.ajax({
				url: '<?php echo base_url('hotel-city-suggestion');?>',
				 type: "GET",
				 data:{'q':cityname},
				 success: function (data) {
					 //alert("ddd");
					 //$("#resp").html(data);
					 if(data != "")
					 {
						 var hotelobj = JSON.parse(data);
						 debugger
						 $(hotelobj).each(function(i,item){
							 if(i==0)
							 {
								debugger
								 $("#destinationId").val(item.destinationId);
								 
							 }
						 })
						 //return false;
						//  response(jQuery.map(JSON.parse(data), function (item) {
						// 	 return {
						// 		label: item.destinationId+" : "+item.caption,
						// 			value: item.destinationId,
						// 			geoId: item.geoId,
						// 			type: item.type,
						// 			latitude: item.latitude,
						// 			longitude: item.longitude,
						// 			caption: item.caption,
						// 			name: item.name
						// 	};
						//  }));
					 }
				 }
			 });
}
function GetHolteCitySuggestion(selector)
{
	if(jQuery("#"+selector).length > 0)
	{
	jQuery("#"+selector).autocomplete({                
		source: function (request, response) {
			jQuery.ajax({
				url: '<?php echo base_url('hotel-city-suggestion');?>',
				 type: "GET",
				 data:{'q':request.term},
				 success: function (data) {
					 //alert("ddd");
					 //$("#resp").html(data);
					 if(data != "")
					 {
						 //return false;
						 response(jQuery.map(JSON.parse(data), function (item) {
							 return {
								label: item.destinationId+" : "+item.caption,
									value: item.destinationId,
									geoId: item.geoId,
									type: item.type,
									latitude: item.latitude,
									longitude: item.longitude,
									caption: item.caption,
									name: item.name
							};
						 }));
					 }
				 }
			 });
		},
		minLength: 1,
		select: function (event, ui) { 
			//jQuery("#"+selector).val(ui.item.value);
			//$("#new_product_Id").val(ui.item.value);
			jQuery("#"+selector).val(ui.item.value);
			jQuery("#"+selector).attr("type","hidden");
			jQuery("#"+selector).parent().find(".hoteldestination").val(ui.item.caption);
			jQuery("#"+selector).parent().find(".hoteldestination").attr("type","text");

			
		 }                    
	}).data("ui-autocomplete")._renderItem = function( ul, item ) {
		
		if(item.stateCode == '')
		{
			return $( "<li>" )
			.append( "<div class='item_container'><div class='item_details'>" + item.value + " , "+item.caption+"</div></div>" )
			.appendTo( ul );
		}
		else
		{
			return $( "<li>" )
			.append( "<div class='item_container'><div class='item_details'>" + item.value + " , "+item.caption+"</div></div>" )
			.appendTo( ul );
		}		
		
		};
	}
}
  function checktraveltype(traveltype)
  {
           
          if(traveltype == "One way")
          {
              // alert(traveltype);
              //$("#date_to").attr("readonly","readonly");
              $( "#date_to" ).datepicker( "option", "disabled", true );
              $('#date_to').addClass('input-disabled');
              $( "#date_to" ).attr("disabled",true);
              $('#date_to').removeClass('quote_frm');
			  $('#date_to').removeClass('quote_frm_validate');
          }
          else
          {
             $( "#date_to" ).datepicker( "option", "disabled", false );
             $('#date_to').removeClass('input-disabled');
             $( "#date_to" ).removeAttr("disabled");
			 $('#date_to').addClass('quote_frm');
			 
          }
  }
  function calculatetotaltraveller()
{
	var totaltraveller = 0;
	$(".traveller_no").each(function(){
		var avl = $(this).val();
        //alert(avl);
		totaltraveller = totaltraveller+ parseInt(avl); 
		$("#traveller").val(totaltraveller);
		var txt = (totaltraveller > 1) ? " passengers" : " passenger";
        var travelClass = $("#fare_class").val();
			travelClass = travelClass.toLowerCase();
			travelClass = travelClass.replace("_"," ");
			travelClass = travelClass.toLowerCase().replace(/\b[a-z]/g, function(letter) {
    			return letter.toUpperCase();
			});
		//$("#travellerinfo").val(totaltraveller+' '+txt+"<br>"+travelClass);
        $(".travelerselectbox").html(totaltraveller+' '+txt+" "+travelClass);
	});
}
  jQuery(document).ready(function(){
	$(".searchflight").click(function(){
		var searchflight = '<?php echo base_url('search-flight-lookup'); ?>'
		$("#hotel_search_frm").attr("action",searchflight)
		document.hotel_search_frm.submit();
	});
	$(".searchhotel").click(function(){
		var searchflight = '<?php echo base_url('search-hotel-lookup'); ?>'
		$("#hotel_search_frm").attr("action",searchflight);
		document.hotel_search_frm.submit();
	});
    $("#passenger_btn").on("click",function(){
            //alert($(this).parent().parent().parent().parent().parent().parent().parent().attr('class'));
			$(this).parent().parent().parent().parent().parent().parent().parent().removeClass('show');
		});
    $(".travelClass").on("change",function(){
			var travelClass = $("#fare_class").val();
			travelClass = travelClass.toLowerCase();
			travelClass = travelClass.replace("_"," ");
			travelClass = travelClass.toLowerCase().replace(/\b[a-z]/g, function(letter) {
    			return letter.toUpperCase();
			});
            var totaltraveller = 0;
            $(".traveller_no").each(function(){
                var avl = $(this).val();
                //alert(avl);
                totaltraveller = totaltraveller+ parseInt(avl); 
                $("#traveller").val(totaltraveller);
                var txt = (totaltraveller > 1) ? " passengers" : " passenger";
                $(".travelerselectbox").html(totaltraveller+' '+txt+" "+travelClass);
	        });
			//$("#travellerinfo").val(trainfo+"\n"+travelClass);
			// var traveller = $("#traveller").val();
			// if(traveller < 9)
			// {
			// 	var notraveller = parseInt($(this).parent().parent().find(".traveller_no").val());
			// 	notraveller = notraveller+1;
			// 	$(this).parent().parent().find(".traveller_no").val(notraveller);
			// 	$(this).parent().parent().find(".traveller_txt").html(notraveller);
			// }	
			// calculatetotaltraveller();	
		});
		$(".add_traveller").on("click",function(){
			var traveller = $("#traveller").val();
			if(traveller < 9)
			{
				var notraveller = parseInt($(this).parent().parent().find(".traveller_no").val());
				notraveller = notraveller+1;
				$(this).parent().parent().find(".traveller_no").val(notraveller);
				$(this).parent().parent().find(".traveller_txt").html(notraveller);
			}	
			calculatetotaltraveller();	
		});
		$(".remove_traveller").on("click",function(){
			var notraveller = parseInt($(this).parent().parent().find(".traveller_no").val());
			var boxId = $(this).parent().parent().find(".traveller_no").attr("id");		
			if(boxId == "no_of_adults")
			{
				notraveller = (notraveller > 1) ?  notraveller-1 : 1;
			}
			if(boxId == "no_of_child")
			{
				notraveller = (notraveller > 0) ?  notraveller-1 : 0;
			}
			if(boxId == "no_of_infant")
			{
				notraveller = (notraveller > 0) ?  notraveller-1 : 0;
			}
			$(this).parent().parent().find(".traveller_no").val(notraveller);
			$(this).parent().parent().find(".traveller_txt").html(notraveller);	
			calculatetotaltraveller();	
		});
    //   $("#travellerinfo").focus(function(){
    //       $(this).parent().find(".dropdown-menu").addClass("show");
    //   });
    //   $("#travellerinfo").blur(function(){
    //     $(this).parent().find(".dropdown-menu").addClass("hide");
    //   });
    $(".book_flight").click(function(){
        //alert("ssss");
          var origin = $(this).attr("rel");
          var origincity = $(this).attr("org");
          var destination = $(this).attr("data");
          var destinationcity = $(this).attr("dep");
          var depdate = $(this).attr("depdate");
          $("#date_from").val(depdate);
          $("#routedestinationcode").val(destination);
          $("#routedestinationcode").attr("type","hidden");
          $("#destination_iata_code_city").val(destinationcity);
          $("#destination_iata_code_city").attr("type","text")
          $("#routeorigincode").val(origin);
          $("#routeorigincode").attr("type","hidden");
          $("#origin_iata_code_city").val(origincity);
          $("#origin_iata_code_city").attr("type","text")
          $("#one-way").prop("checked",true);
          document.route_search_frm.submit();
      });
	jQuery("#contact").validate({
		rules : {			             
			name: {
				required: true
			},
			email: {
				required: true,
				email: true
			},
			phone_number: {
				required: true
			},
			message: {
				required: true
			},
			captcha: {
				required: true
			}
		},
		submitHandler: function (form) {
			document.contact.submit();
		}
  });
      $("#passenger_frm").on("submit",function(){
			var flag=1;
		$(".passenger_row").find(".validate_field").each(function(){
			$(this).parent().find(".validtxt").remove();
			if($(this).val() == '')
			{
				//$(this).after('<label class="validtxt">This field is require</label>');
				$(this).addClass("validate_field_error");
			}
			else
			{
				$(this).addClass("validated_field");				
			}
		});
		$(".travellerdetails").each(function(){
			$(this).parent().find(".validtxt").remove();
			if($(this).val() == '')
			{
				//$(this).after('<label class="validtxt">This field is require</label>');
				$(this).addClass("validate_field_error");
			}
			else
			{
				$(this).addClass("travellerdetails_validated");				
			}
		});
		//alert($(".passenger_row").find(".validate_field").length+"==========="+$(".passenger_row").find(".validated_field").length)
		//alert($(".travellerdetails").length+"==========="+$(".travellerdetails_validated").length)
		if($(".passenger_row").find(".validate_field").length != $(".passenger_row").find(".validated_field").length)
		{
			flag=0;
		}
		if($(".travellerdetails").length != $(".travellerdetails_validated").length)
		{
			flag=0;
		}
		if(flag == 0)
		{
			return false;
		}
		
	})
      jQuery(".flitersearch").on("click",function(){
			var airline = "";
			jQuery(".flitersearch").each(function(){
				var inptype = $(this).attr("type");
				var inpval = $(this).val();
				//alert(inptype);
				//alert(inpval);
				if(inptype == "radio")
				{
					if($(this).prop("checked") == true)
					{
						$("#nonStop").val(inpval);
					}
				}
				if(inptype == "checkbox")
				{
					if($(this).prop("checked") == true)
					{
                		if(airline != '')
						{
							airline +=",";
						}
						airline += inpval;
            		}					
					$("#includedAirlineCodes").val(airline);
				}
			});
			$("#searchprogress").val("");
			document.route_search_frm.submit();
		});
		$(".clear_filter_option").on("click",function(){
			$("#nonStop").val('all');
			$("#includedAirlineCodes").val('');
			$("#maxPrice").val('');
			$("#searchprogress").val("");
			document.route_search_frm.submit();
		});
		$('input[type="range"]').rangeslider({
  			polyfill: false
		});
		$('#relationship-status-slider').on('change input', function() {
			var currentval = $(this).val();
			$('#relationship-status-output').text("$"+currentval);
			$("#maxPrice").val(currentval);
			setTimeout(() => {
				$("#searchprogress").val("");
				document.route_search_frm.submit();
			}, 3000);
			
		});
      jQuery(".route_travel_type").click(function(){
          var traveltype = $(this).val();
          checktraveltype(traveltype);
      });
      jQuery("#hotel_booking_frm").validate({
		rules : {
			booking_date_from: {
				required: true
			},
			booking_date_to: {
				required: true
			},			             
			booking_name: {
				required: true
			},
			booking_email: {
				required: true,
				email: true
			},
			booking_phone: {
				required: true
			}			
		},
		submitHandler: function (form) {
			document.hotel_booking_frm.submit();
		}
		});
    // If JavaScript is enabled, hide fallback select field
    jQuery('.no-js').removeClass('no-js').addClass('js');
        
        // When the user focuses on the credit card input field, hide the status
        jQuery('.card input').bind('focus', function() {
            jQuery('.card .status').hide();
        });
        
        // When the user tabs or clicks away from the credit card input field, show the status
        jQuery('.card input').bind('blur', function() {
            jQuery('.card .status').show();
        });
        
        // Run jQuery.cardcheck on the input
        jQuery('#traveller_card_number').cardcheck({
            callback: function(result) {
                
                var status = (result.validLen && result.validLuhn) ? 'valid' : 'invalid',
                    message = '',
                    types = '';
                
                // Get the names of all accepted card types to use in the status message.
                for (i in result.opts.types) {
                    types += result.opts.types[i].name + ", ";
                }
                types = types.substring(0, types.length-2);
                
                // Set status message
                if (result.len < 1) {
                    message = 'Please provide a credit card number.';
                } else if (!result.cardClass) {
                    message = 'We accept the following types of cards: ' + types + '.';
                } else if (!result.validLen) {
                    message = 'Please check that this number matches your ' + result.cardName + ' (it appears to be the wrong number of digits.)';
                } else if (!result.validLuhn) {
                    message = 'Please check that this number matches your ' + result.cardName + ' (did you mistype a digit?)';
                } else {
                    message = 'Great, looks like a valid ' + result.cardName + '.';
                }
                
                // Show credit card icon
                jQuery('.card .CreditCardImg').removeClass().addClass('CreditCardImg ' + result.cardClass);
                
                // Show status message
                jQuery('.card .status').removeClass('invalid valid').addClass(status).children('.status_message').text(message);
            }
        });
    $("#route_search_frm").on("submit",function(){
			var flag=1;
			$(this).find(".quote_frm").each(function(){
				$(this).parent().find(".validtxt").remove();
				if($(this).val() == '')
				{
					//$(this).after('<label class="validtxt">This field is require</label>');
					$(this).removeClass("quote_frm_validated");
					$(this).addClass("quote_frm_validate");
				}
				else
				{
					$(this).removeClass("quote_frm_validate");
					$(this).addClass("quote_frm_validated");				
				}
			});
			//alert($(this).find(".quote_frm").length);
			///alert($(this).find(".quote_frm_validated").length);
			if($(this).find(".quote_frm").length != $(this).find(".quote_frm_validated").length)
			{
				flag=0;
			}
			//alert(flag);
			if(flag == 0)
			{
				return false;
				//alert("ddd");
			}
			else
			{
				$("#searchprogress").val("");
				document.route_search_frm.submit();
			}
		});
    $(".book_now").on("click",function(){
		var offerId = $(this).attr('rel');
		var offerdetails = $("#offer_details_"+offerId).val();
		var carriers = $("#carriers").val();
		var locations = $("#locations").val();
		var aircraft = $("#aircraft").val();
		//var site_url = $("#site_url").val();
		//var travel_type = $("#travel_type").val();
		var origin = $("#routeorigincode").val();
		var origincity = $("#origin_iata_code_city").val();
		var destination = $("#routedestinationcode").val();
		var depcity = $("#destination_iata_code_city").val();
		var departureDate = $("#date_from").val();
		var returndate = $("#date_to").val();
		var passengerclass = $("#fare_class").val();
		var adults = $("#no_of_adults").val();
		var child = $("#no_of_child").val();
		var infants = $("#no_of_infant").val();

		var nonStop = $("#nonStop").val();
		var includedAirlineCodes = $("#includedAirlineCodes").val();
		var maxPrice = $("#maxPrice").val();
		var  traveller = parseInt(adults)+parseInt(child)+parseInt(infants);
		var maxPrice = $("#maxPrice").val();
		var travel_type = "Roundtrip";
		$(".route_travel_type").each(function(){
			if($(this).is(":checked"))
			{
				travel_type = $(this).val();
			}
		});
		//alert(returndate);
		//return false;
		//alert(offerId+"=="+offerdetails+"===="+carriers+"===="+locations+"===="+aircraft+"===="+origin);
		jQuery.ajax({
				url: '<?php echo base_url('flight-prepared-booking');?>',
				type: "POST",
				data:{'offerId':offerId,
				'offer_details':offerdetails,
				'carriers':carriers,
				'locations':locations,
				'aircraft':aircraft,
				'origin':origin,
				'origincity':origincity,
				'destination':destination,
				'depcity':depcity,
				'departureDate':departureDate,
				'returndate':returndate,
				'traveller':traveller,
				'class':passengerclass,
				'adults':adults,
				'child':child,
				'infants':infants,
				'nonStop':nonStop,
				'includedAirlineCodes':includedAirlineCodes,
				'maxPrice':maxPrice,
				'travel_type':travel_type
			},
				success: function (resp) {
					//alert(resp);
					//return false;
					window.location='<?php echo base_url('review-flight');?>';
				}
			});
		//alert(offerId)
		//alert(offerdetails)
	});
  jQuery( "#passenger_dob,#passenger_issue_date" ).datepicker({
	  		maxDate: 0,
			changeMonth: true,
            changeYear: true,
			yearRange: "-50:+50"
		});
		jQuery( "#passenger_passport_exp" ).datepicker({
	  		minDate: 0,
			changeMonth: true,
            changeYear: true,
			yearRange: "-50:+50"
		});
    if($("#destinationId").length > 0)
		{
			GetHolteCitySuggestion("destinationId");
		}
    jQuery(".hoteldestination").on("focus",function(){
			jQuery(this).attr("type","hidden");
			jQuery(this).parent().find(".destinationId").attr("type","text");
			jQuery(this).parent().find(".destinationId").val('');
			jQuery(this).parent().find(".destinationId").focus();
		}) 
    jQuery(".iata_code_city").on("focus",function(){
			jQuery(this).attr("type","hidden");
			jQuery(this).parent().find(".iata_code").attr("type","text");
			jQuery(this).parent().find(".iata_code").val('');
			jQuery(this).parent().find(".iata_code").focus();
		})
  jQuery("#contact").validate({
		rules : {			             
			name: {
				required: true
			},
			email: {
				required: true,
				email: true
			},
			phone_number: {
				required: true
			},
			message: {
				required: true
			}
		},
		submitHandler: function (form) {
			document.contact.submit();
		}
  });
  jQuery("#registerfrm").validate({
		rules : {			             
			email: {
				required: true,
				email:true
			},
			name: {
				required: true
			},
			phone_number: {
				required: true
			},
			address: {
				required: true
			},
			postcode: {
				required: true
			}
		},
		submitHandler: function (form) {
			document.registerfrm.submit();
		}
  });
  $("#resetpassfrm").validate({
        rules: {          
            rpassword: {
                required: true,
                minlength: 6
            },
            crpassword: {
                required: true,
                minlength: 6,
                equalTo: "#rpassword"
            }             
            
        }
  });
  jQuery("#hotel_search_frm").validate({
		rules : {			             
			destinationId: {
				required: true
			},
			hotel_city: {
				required: true
			},
			date_from: {
				required: true
			},
			date_to: {
				required: true
			}
		},
		errorPlacement: function() {
			return false;
		},
		submitHandler: function (form) {
			document.hotel_search_frm.submit();
		}
  });
    jQuery("#date_from,#booking_date_from").datepicker({
	  minDate: 0,
	  onSelect: function(date) {
		jQuery("#date_to,#booking_date_to").datepicker('option', 'minDate', date);
	  }
	});
	jQuery( "#date_to,#booking_date_to" ).datepicker({
	  minDate: 0,
	});
  var selectdata = $("#date_from").val();
  jQuery("#date_to").datepicker('option', 'minDate', selectdata);
  //alert($("#routeorigincode").length);
  if($("#routedestinationcode").length > 0)
		{
			GetFlightAutocomplete("routedestinationcode");
		}
    if($("#routeorigincode").length > 0)
		{
			GetFlightAutocomplete("routeorigincode");
		}
  });
</script>
	<script>
		

		$(document).ready(function(){
			$("#foprgotpassfrm").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }               
                
            }
        });
			$("#loginfrm").validate({
            rules: {
                password: "required",                
                email: {
                    required: true,
                    email: true
                }               
                
            }
        });
		$("#customer_reg_from").validate({
            rules: {
                firstName: "required",
                lastName: "required",
                password: {
                    required: true,
                    minlength: 6
                },
                cpassword: {
                    required: true,
                    minlength: 6,
                    equalTo: "#upassword"
                },
                email: {
                    required: true,
                    email: true
                },
                cxPhone: "required"
            },
			submitHandler: function (form) {
			    var  isValid= true

                var emailrow = $("#emailrow").val();
                if(emailrow > 0)
                {
                    isValid= false
                }
                if(isValid) {
                    //alert(isValid);
                    document.customer_reg_from.submit();
                }
					
			}
        });
        $('#upassword').keyup(function () {  
			$('#password-strength-status').html(checkStrength($('#upassword').val()))  
		})  
		  jQuery("#contactfrm").validate({
			rules : {
			  Name: {
				required: true
			  },
			  lname: {
				required: true
			  },
			  email: {
				required: true,
				email: true
			  },
			  phone: {
				required: true
			  },
			  message: {
				required: true
			  }
			},
			errorPlacement: function()
			{
			  return false;
			},
			submitHandler: function (form) {
			  document.contactfrm.submit();
			}
		  });
		
		  jQuery("#footercontactfrm").validate({
			rules : {
			  Name: {
				required: true
			  },
			  email: {
				required: true,
				email: true
			  },
			  phone: {
				required: true
			  },
			  message: {
				required: true
			  }
			},
			errorPlacement: function()
			{
			  var error=$(this).siblings('i');
							error.addClass("fa-thumbs-up").css('color', 'red');
			  return false;
			},
			submitHandler: function (form) {
			   document.footercontactfrm.submit();
			}
		  });
		
		});
		function checkStrength(password) {  
        var strength = 0  
        if (password.length < 6) {  
            $('#password-strength-status').removeClass()  
            $('#password-strength-status').addClass('Short')  
            return 'Too short'  
        }  
        if (password.length > 7) strength += 1  
        // If password contains both lower and uppercase characters, increase strength value.  
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1  
        // If it has numbers and characters, increase strength value.  
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1  
        // If it has one special character, increase strength value.  
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1  
        // If it has two special characters, increase strength value.  
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1  
        // Calculated strength value, we can return messages  
        // If value is less than 2  
        if (strength < 2) {  
            $('#password-strength-status').removeClass()  
            $('#password-strength-status').addClass('Weak')  
            return 'Weak'  
        } else if (strength == 2) {  
            $('#password-strength-status').removeClass()  
            $('#password-strength-status').addClass('Good')  
            return 'Good'  
        } else {  
            $('#password-strength-status').removeClass()  
            $('#password-strength-status').addClass('Strong')  
            return 'Strong'  
        }  
    }
		</script>
		<script>
			$(function(){
var overlay = $('<div id="overlay"></div>');
overlay.show();
overlay.appendTo(document.body);
$('.popup-onload').show();
$('.close').click(function(){
$('.popup-onload').hide();
overlay.appendTo(document.body).remove();
return false;
});
 

$('.x').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});
});


$(document).ready(function(){
	$(".closespan").click(function(){
	$(".responsivecall").removeClass('d-block');
	$(".responsivecall").addClass('d-none');
	$(".turkisshbtn").click();
	$(".headercontentturkish").removeClass('pageflightres');
	
	});
});
		</script>
		
		<script>
		$('.customer_reviewslider').owlCarousel({
			loop:true,
			margin:10,
			nav:true,
			dots:false,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				1000:{
					items:3
				}
			}
		});
		$('.top_destinationslider').owlCarousel({
			loop:true,
			margin:10,
			nav:true,
			dots:false,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				1000:{
					items:4
				}
			}
		})
	</script>	
    </body>
</html>