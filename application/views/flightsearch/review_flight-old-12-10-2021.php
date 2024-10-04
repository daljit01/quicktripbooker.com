<link rel="stylesheet" href="<?php echo base_url(); ?>assects/css/reviewflights.css">
<link href="<?php echo base_url(); ?>assects/css/subscribe.css" rel="stylesheet" media="screen">
<style>
		.continue_cta {
			width: auto !important;
			height: auto !important;
			line-height: 42px!important;
			box-shadow: 0 1px 7px 0 rgba(0, 0, 0, .2)!important;
			background-image: linear-gradient( 
  95deg
  , #943b94, #47293f) !important;
			border: 0!important;
			padding: 0px 20px 17px!important;
			border-radius: 0 !important;
		}
		.continue_cta span {
			font-size: 9px;
			color: #fff;
			margin-bottom: 0;
			line-height: 10px;
			display: block;
		}
         .search-list-mainblock {
            border: 1px solid #dcdcdc;
            padding: 15px;
         }
		.right-block{
			/* border: 1px solid #dcdcdc;
			box-shadow: 0px 0px 8px 1px #dfdfdf; */
			margin-bottom: 30px;
			position: relative;
			/* border-bottom: 1px dashed #6b6b6b; */
			border-radius: 0px;
			background-color: #f9f9f9;
			color: #4a4a4a;
			border: .9px solid #00000005;
		} 
         .search-list-mainblock h2{
         font-size: 12px;
         letter-spacing: 0;color: #0b082e;font-weight: 600;}
         .tooltip{opacity: 1;}
         .airlines-namelist span{color: #943b94;}
         .airlines-baggagelist i{color: #943b94;}
         .airlines-timelist p{
            font-size: 11px;
            color: #000;margin-bottom:7px}
         .select-list-bg{
            padding: 15px;
         }
         button.btn.btn-primary.btn-setect-list{
            background: #943b94;
            border: #ba3e22;
            padding: 10px 60px;
            border-radius: 0;
            outline: 0 !important;
			color: #fff;
         }
		 .clear_option{
            background: #943b94;
            border: #ba3e22;
			padding: 6px 10px;
		
			margin-bottom: 30px;
         }
         button.btn.btn-primary.btn-setect-list i {font-size: 10px;}
         .price-list span{font-size: 18px;color: #943b94;;color: #943b94; font-weight: 700;}
         .airlines-baggagelist p {
            font-size: 13px;
            font-weight: 600;
         }
		 label.form-check-label {
			font-size: 14px;
			font-weight: 600;
			margin-left: 10px;
		}
		.search-list-sec{padding: 60px 0;}
		.form-checkedlist{
			border: 1px solid #ddd;
			padding: 15px;
			margin-bottom: 30px;
		}
		.date-list li{
			display: inline-block;
			border: 1px solid #ddd;
			padding: 15px 26px;
			margin-right: -4px;
		}
		.date-list{margin-bottom: 30px;border: 1px solid #ddd;
			padding: 15px 12px;}
		.date-list  a{font-size: 12px;font-weight: 600;}
		.col2{
			width: 14.28%;
			position: relative;
			min-height: 1px;
			padding-left: 15px;  
			float: left;
		}
		.totaal-time {
			text-align: center;
			position: absolute;
			bottom: 30%;
			left: 50%;
			transform: translate(-50%, -50%);
			background: #ededed;
			font-size: 13px;
			padding: 1px;
		}
		.totaal-time p{margin-bottom: 0;}
		.airlines-timelistportorigin span.airportname-res, .airlines-timelistportdes span.airportname-res{
				display: inline-block;
			}
			.max_price_range{font-size: 16px;margin-bottom: 10px;color: #000;}
			.airlines-timelistportdes span, .airlines-timelistportorigin .timelist-res{display: none;}
		.res-date-list th{border: 1px solid #ddd;padding: 10px;}
		.res-date-list table{width: 100%;}
		.res-date-list{margin-bottom: 20px;}
		.dnone{display: none;}
		.airlines-namelist h3{display: none;}
		.airlines-baggagelist-paymentpage p{font-size:12px;}
		.airlines-baggagelist-paymentpage i{font-size:10px;;color: #943b94;}
		.totaal-time-listbg{background: #ddd;margin-top: 15px;}
		.search-list-mainblock {padding: 15px 15px 0;}
		@media screen and (max-width: 767px) {
			.prepend_top70 {
				margin-top: 100px!important;
			}
			.timelist-res-view{display: none;}
			.container-fluid{padding-right:0 !important;padding-left:0 !important;}
			.price-list p{font-size:12px;}
			.dnone{display: block;}
			/* .tvlr-Gst-sctn {padding: 10px 5px;} */
			.travel-search-content2 .travl-search-advanced .button-submit {
				margin-top: -50px;
				margin-right: 0px;
			}
			.fareSmry-row{font-size:11px;}
			.fareSmry-hdng {
				font-size: 11px;
			}
			.fareSmry-wrap {
				padding: 5px 5px 5px 5px;
			}
			.font16 {
				font-size: 12px;
				line-height: 16px;
			}
			.fareSmry-header{padding: 0 5px;}
			.totaal-time-listbg{background: transparent;}
			.search-list-mainblock {
				border: inherit;
				padding: 15px;
				border-bottom: 1px dashed #8a8a8a;
			}
			.text-fare{
				margin-top: -10px !important;
				background: #943b94;
				color: #fff;
				padding: 5px !important;
				font-size: 15px !important;
			}
			[data-tooltip]:hover:before, [data-tooltip]:hover:after, [data-tooltip]:focus:before, [data-tooltip]:focus:after, .tooltip:hover:before, .tooltip:hover:after, .tooltip:focus:before, .tooltip:focus:after, .tooltip-top:hover:before, .tooltip-top:hover:after, .tooltip-top:focus:before, .tooltip-top:focus:after{
				-webkit-transform:translate(100px, 0px);
    			-moz-transform: translate(100px, 0px);
    			transform: translate(100px, 0px);
			}
			.continue_cta { margin-top: -150px;}
			.airlines-timelistportorigin span.airportname-res, .airlines-timelistportdes span.airportname-res{
				display: none;
			}
			.airlines-timelistportorigin{
				display: inline-block;
				width: 50%;
				float: left;
				position: relative;
			}
			.right-block {
				margin-top: 0px;
				background: #fff !important;
			}
			.mrtop40{margin-top:-40px;}
			.airlines-timelistportorigin::after{content: '\f178';position: absolute;width: 50px;height: 1px;color: #959595;font-family: 'FontAwesome'; top: 8px;left: 110px;}
			.airlines-namelist p{display: none;}
			.airlines-timelistportdes span, .airlines-timelistportorigin .timelist-res{display: inline-block; margin-right: 10px;}
			.airlines-timelistportorigin p, .airlines-timelistportdes p{color: #000; font-weight: bold;}
			.airlines-baggagelist{display: none;}
			button.btn.btn-primary.btn-setect-list {
				padding: 8px 8px;
				outline: 0 !important;
				position: absolute;
				top: 18px;
				right: 0;
				font-size: 12px;
			}
			span.totaal-time-airportneme {
				display: none;
			}
			.totaal-time {
				padding: 0;
				bottom: 30%;
			}
			.totaal-time i{display: none;}
			/* .res-date-list{overflow-x:auto;} */
			.res-date-list th{padding: 1px;text-align: center;color: #000;font-weight: 500;}
			.clear_option {
				padding: 7px 10px;
				width: 26%;
			}
			.airlines-namelist h5 {
				margin-top: 10px;
			}
			.airlines-baggagelist-paymentpage{text-align:left !important;}
			.filter{  
				/* width: 50%;float: left; */
				margin: 16px 15px 16px 0px;}
			.form-checkedlist, .filter-control-container{border: inherit;}
			.form-checkedlist, .filter-control-container {
				border: transparent;}	
				.travel-search-content2 {margin-top: 33%;}
				.search-list-sec {
					padding: 0px 0;
				}
				.travel-search-content2 .travl-search-advanced{padding: 22px 0;}
				.search-list-mainblock {padding: 5px 15px 10px 15px;}
			.include-airlines{display: none;}
			.form-checkedlist{margin-bottom: 0;padding: 0;}
			.panel-body{padding: 15px 15px 0;}
			.res-date-list  th span{font-size: 20px;}
			.totaal-time-list {
				position: absolute;
				top: -40px;
				right: 0;
			}
			.airlines-namelist h3{
				display: inline-block;
				position: absolute;
				bottom: -60px;
				font-size: 12px;
				letter-spacing: 0;
				font-weight: 700;
				transform: translate(-50%, -50%);
				top: 47%;
				right: 0;
			}
			.trvl-formfield-col1.w-100.col-md-4.form-group, .trvl-formfield-col1.col-md-6.w-100 {
				padding: 0;
			}
			div#Country\ Code {
				padding: 0;
				width: 100%;
			}
			/* .tvlrDtls-section {
				padding: 3px 5px;
			} */
			.append_bottom15 {margin-bottom: 5px;}
			.w-100{width: 100%;}
			.rvw-heading {font-size: 19px;padding: 0px 0;}
			input#traveller_mobile, input#traveller_address {margin-bottom: 15px;}
			}

			i.arrwright{float: right;}

			.clear_option {
				width: 30%;
			}
			.container-fluid{padding-right: 90px;
    		padding-left: 90px;}
			.pl0{padding-left:0}
</style>
<div class="container-fluid">

  <div class="review-page">
	<div class="hsw" id="rev-header">
		<div class="fli-intl-container">
			<div class="make_flex hrtlCenter spaceBetween">
				<div class="make_flex alC">
					<h4 class="font22 latoBold whiteText headerTitle">Review your booking</h4>
				</div>
				<ul class="reviewStatus step2">
					<li><span class="numbering completed">1</span><span class="reviewText grayText font12 ">Flight Selected</span></li>
					<li><span class="numbering onpage">2</span><span class="reviewText grayText font12 active">Review</span></li>
					<!-- <li><span class="numbering ">3</span><span class="reviewText grayText font12 ">Traveller Details</span></li>
					<li><span class="numbering ">4</span><span class="reviewText grayText font12 ">Make Payment</span></li> -->
				</ul>
			</div>
		</div>
	</div>
	<?php
	if(!array_key_exists("errors",(array) $offers_price_response))
	{
	?>
	<form action="<?php echo base_url(); ?>create-flight-booking" name="passenger_frm" id="passenger_frm" method="post">
	<textarea name="serachdata" id="serachdata"  style="display:none;"><?php echo json_encode($serachdata); ?></textarea>
    <textarea name="offers_price_response" id="offers_price_response" style="display:none;"><?php echo json_encode($offers_price_response); ?></textarea>
    <textarea name="review_flight" id="review_flight" style="display:none;"><?php echo json_encode($review_flight); ?></textarea>
	<input type="hidden" name="offers_price_type" id="offers_price_type" value="<?php echo $offers_price_type ?>">
	<div class="fix_header_mar_top" style="margin-top: 0px;">
	    <div class="row1">




	<div class="fli-intl-container1 prepend_top70 clearfix ">
			<div class="fli-intl-lhs1 pull-left col-md-9"><div>
	<p class="rvw-heading LatoBold">Itinerary</p>

	<div class="row">
		<div class="col-md-12">	
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
			?>
				<div class="right-block right-block-margin">
                  <div class="select-list-bg">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="price-list"><span>$ <?php echo $review_flight['price']['grandTotal'] ?></span> <br>
						   <a href="#" class="tooltip-top" data-tooltip="Easy cancellation within 24 hours for a fee by calling our 24x7 support team."><p><font color="#00A19C">Easy Cancellation within 24 hr</font></p></a>
						 </div>
                        </div>
                        <div class="col-md-6"><div class="text-right mrtop40"><p><?php echo !empty($review_flight['price']['cabin']) ? ucwords(strtolower(str_replace("_"," ",$review_flight['price']['cabin']))) : ""; ?></p>
						
						</div></div>
                     </div>
                  </div>
                  <?php
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
						$newdurationmin = (array_key_exists(1,$newdurationarr)) ? (int)str_replace("M","",$newdurationarr[1]) : 0;
						//echo $newdurationhrs."=======".$newdurationmin;
						$newhr = $newhr+$newdurationhrs;
						$newmin = $newmin+$newdurationmin;
						//$secs = strtotime($segduration)-strtotime("00:00:00");
						//$dutime= $dutime+strtotime($segduration);
						//echo date("H:i:s",strtotime($dutime+$secs))."=============".$secs."<br>";
						///echo $segduration."==========<b>";
						//echo $segment['duration']."=====".date("H:i",$dutime)."======".$dutime."=======".strtotime($segduration)."======".$segduration;
			   		?>
                  <div class="search-list-mainblock">
                     <h2><?php echo ($sg == 1) ? $sectiontitle : ""; ?></h2>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="airlines-namelist">
                              <h5><b><?php echo $segment['carrierName']; ?></b></h5>
							  <p>Flight <?php echo $segment['aircraft_number']; ?> | EQP-<?php echo $segment['aircraft_code']; ?> <a href="#" class="tooltip-top" data-tooltip="<?php echo $segment['aircraft_name']; ?>"><i class="fa fa-exclamation-circle"></i></a></p>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="airlines-namelist">
							   <h3><?php echo date('D, M d',strtotime($segment['departure_time'])) ?></h3>
                              <p><b><?php echo date('h:i a',strtotime($segment['departure_time'])) ?>,</b> <span><?php echo date('D, M d',strtotime($segment['departure_time'])) ?></span><br>
                                <b><?php echo date('h:i a',strtotime($segment['arrival_time'])) ?>,</b> <?php echo date('D, M d',strtotime($segment['arrival_time'])) ?></p>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="airlines-timelist">
								<div class="airlines-timelistportorigin">
                              		<p><span class="timelist-res"><?php echo date('h:i a',strtotime($segment['departure_time'])) ?></span> <?php echo $segment['departure_iatacode']; ?>  <span class="airportname-res"><?php echo !empty($segment['origin_city']) ? $segment['origin_city']."," : ""; ?> <?php echo $segment['origin_iataname']; ?></span></p>
							  	</div>
								  <div class="airlines-timelistportdes">
									<p><span class="timelist-res"><?php echo date('h:i a',strtotime($segment['arrival_time'])) ?></span><?php echo $segment['arrival_iataCode']; ?> <span class="airportname-res"><?php echo !empty($segment['destination_city']) ? $segment['destination_city']."," : ""; ?> <?php echo $segment['destination_iataname']; ?></span></p>
								  </div>
							   
                           </div>
                        </div>
                     
                        <div class="col-md-2">
							<div class="airlines-baggagelist-paymentpage text-right">

								<!-- <p><a href="#" data-tooltip="I’m the tooltip, yo." class="tooltip-bottom">
									<i class="fa fa-suitcase" aria-hidden="true"></i></a> 
									Check-in Baggage: 25K
								</p> -->

								<?php
									if(count($review_flight['travelerPricings']) > 0)
									{
										foreach($review_flight['travelerPricings'] as $travelerPricing)
										{
											if(!empty($travelerPricing['includedCheckedBags']) && array_key_exists("includedCheckedBags",$travelerPricing))
											{
												$tooltips = "Class :". $travelerPricing['class']."\n";
												$tooltips .= "Included Checked Bags :". $travelerPricing['includedCheckedBags'];
												?>
												<a href="#" href="#" data-tooltip="<?php echo $tooltips; ?>"  class="tooltip-bottom">
													<i class="fa fa-suitcase" aria-hidden="true"></i>
												</a> 
												Check-in Baggage: <?php echo $travelerPricing['includedCheckedBags']; ?>
												<?php
											}
										}
									}
                                ?>

							 </div>
                        </div>
                     </div>
					 <!-- <div class="totaal-time"><i class="fa fa-clock-o"></i> <span class="totaal-time-hr">4 hr 20 min</span> <span class="totaal-time-airportneme">layover in Mumbai (BOM)</span></div> -->
					 <?php
						if($sg == count($itinerary['segments']))
						{
							// $secs = strtotime($time2)-strtotime("00:00:00");
							//$result = date("H:i:s",strtotime($time)+$secs);
							$mintxt = 0;
							if($newmin >= 60)
							{
								$minites = intval($newmin/60);
								$newhr = $newhr + $minites;
								$mintxt =  $newmin%60;
							}
							else
							{
								$mintxt =  $newmin;
							}
							// echo $hr."========".$min;
							$totalflighttimehr = $newhr;
							$totalflighttimemin = $mintxt;
							//echo $hr.":".$mintxt."=======".$totalflighttimehr."======".$totalflighttimemin;
						?>
						<div class="row totaal-time-listbg">
							<div class="col-md-4"><div class="totaal-time-list timelist-res-view">
								<i class="fa fa-clock-o"></i> 
								<span class="totaal-time-hr">Flight Duration: <?php echo ($totalflighttimehr > 0) ? $totalflighttimehr."h" : ""; ?> <?php echo ($totalflighttimemin > 0) ? $totalflighttimemin."m" : ""; ?></span></div></div>
							<div class="col-md-4">
								<div class="totaal-time-list">
									<i class="fa fa-clock-o"></i> 
									<span class="totaal-time-hr"><?php echo strtolower(str_replace("H","H ",str_replace("PT","",$segment['duration']))); ?></span></div></div>
							<div class="col-md-4"><div class="totaal-time-list timelist-res-view"><i class="fa fa-clock-o"></i> <span class="totaal-time-hr">Total Trip Time: <?php echo ($hours > 0) ? $hours."h" : ""; ?> <?php echo ($mins > 0) ? $mins."m" : ""; ?></span> </div></div>
						</div> 
						<?php
						}
						else
						{
						?>
								<div class="totaal-time"><i class="fa fa-clock-o"></i> <span class="totaal-time-hr"><?php echo strtolower(str_replace("H","H ",str_replace("PT","",$segment['duration']))); ?></span></div>                                    
						<?php
						}
						?>
                  </div>
				  <?php
				  	$sg++;
					 }
					}
				  ?>
				</div>
				<?php
				 $it++;
				}
			}
				?>
			</div>
		</div>




				
					<!-- <div>
						<?php 
						// if(count($review_flight['itineraries']) > 0)
						// {
						// 	$origin="";
						// 	$destination="";
						// 	foreach($review_flight['itineraries'] as $itinerary)
						// 	{
						// 		$duration = str_replace("M","",str_replace("PT","",$itinerary['duration']));
						// 		$durationArr = explode("H",$duration);
						// 		$hours = strtolower($durationArr[0]);
						// 		$mins = strtolower($durationArr[1]);							
						// 		$destination = $itinerary['destination_iatacode'];
						// 		$depart = ($origin == $itinerary['destination_iatacode']) ? "RETURN" : "DEPART";
						// 		$origin = $itinerary['origin_iatacode'];

									
						?>
						<div class="rvw-sctn append_bottom15 " id="journey_card_CCUBBI2021-04-24">
							<div class="itnry-flt-header make_relative" style="padding: 10px 10px 10px 0px; align-items: center;">
								<div class="make_flex alC">
									<div class="rvw-labelView-block" style="background-image: linear-gradient(294deg, rgb(82, 82, 82), rgb(23, 23, 23));">
										<p style="font-size: 18px; margin-bottom: 2px; font-family: lato-light, arial, helvetica, sans-serif;"><?php echo $depart; ?></p>
										<p style="font-family: lato-bold, arial, helvetica, sans-serif; font-size: 14px;"><?php echo date("D d M",strtotime(str_replace("T"," ",$itinerary['origin_departure_time']))) ?></p>
									</div>
									<div>
										<p style="color: rgb(74, 74, 74); font-size: 18px; margin-bottom: 2px;"><span style="font-family: lato-bold, arial, helvetica, sans-serif;"><?php echo $itinerary['origin_iatacode']; ?>-<?php echo $itinerary['destination_iatacode']; ?></span></p>
										<p style="font-family: lato-bold, arial, helvetica, sans-serif; font-size: 14px;"><?php echo $hours." hr ".$mins." mins"; ?> | <?php echo strtolower($review_flight['price']['cabin']); ?></p>
										<p style="font-family: lato-bold, arial, helvetica, sans-serif; font-size: 14px;">Non stop | 1 hr 10 mins | Business</p>
									</div>
								</div>
								<div class="make_flex alC">
									<a href="#" class="tooltip-top" data-tooltip="I’m the tooltip, yo."><p class="refundTag marR15" style="background-image: linear-gradient(to right, rgb(205, 246, 232), rgb(191, 228, 224));"><font color="#00A19C">Easy Cancellation within 24 hr</font></p></a>
									<p class="fare-rules-info-btn"><span class="font16 LatoBold"> Check-in Baggage</span><a href="#" class="tooltip-bottom" data-tooltip="I’m the tooltip, yo."><span class="info-icon-black marL5 cursor_pointer"></span></p></a>
								</div>
							</div>
							<div>
							<?php
									// if(count($itinerary['segments']) > 0)
									// {
									// 	foreach($itinerary['segments'] as $segment)
									// 	{
									// 	$duration = str_replace("M","",str_replace("PT","",$segment['duration']));
									// 	$durationArr = explode("H",$duration);
									// 	$hours = strtolower($durationArr[0]);
									// 	$mins = strtolower($durationArr[1]);
									?>
								<div>
									
									<div>
										<div class="itnry-flt-body fli-list clearfix">
											<div class="airline-info pull-left airline-info-main">
												<div>
													<span class="arln-logo pull-left"></span>
													<div class="pull-left airways-info-sect" style="height: 40px;">
														<p class="append_bottom5 font14 LatoBold" style="color: rgb(0, 0, 0);"><?php //echo $segment['carrierName']; ?></p>
														<p class="font11" style="color: rgb(74, 74, 74);"><?php //echo $segment['carrierCode']; ?>-<?php //echo $segment['aircraft_number']; ?></p>
														<p class="font11" style="color: rgb(74, 74, 74);"><?php //echo $segment['aircraft_name']; ?></p>
													</div>
												</div>
											</div>
											<div class="pull-left">
												
												<div class="fli-time-section pull-left">
													<p class="reaching-time append_bottom3"><?php //echo date("H:i",strtotime(str_replace("T"," ",$segment['departure_time']))) ?></p>
													<p class="font14 append_bottom3 LatoBold"><?php //echo date("D d M y",strtotime(str_replace("T"," ",$segment['departure_time']))) ?></p>
													<p class="arrival-city"><span class="LatoBold"><?php //echo $segment['origin_city']; ?> <?php //echo $segment['origin_country']; ?></span><br> <font color="#4a4a4a"><?php //echo $segment['origin_iataname']; ?></font><br><font color="#9b9b9b"><?php //echo !empty($segment['origin_departure_terminal']) ? "Terminal ".$segment['origin_departure_terminal'] : ""; ?></font></p>
												</div>
												<p class="fli-stops pull-left"><?php //echo $hours." hr ".$mins." mins"; ?></p>
												<div class="fli-time-section pull-left">
													<div class="dept-time append_bottom3 make_relative"><?php //echo date("H:i",strtotime(str_replace("T"," ",$segment['arrival_time']))) ?></div>
													<p class="font14 append_bottom3 LatoBold"><?php //echo date("D d M y",strtotime(str_replace("T"," ",$segment['arrival_time']))) ?></p>
													<p class="dept-city"><span class="LatoBold"><?php //echo $segment['destination_city']; ?> <?php //echo $segment['destination_country']; ?></span><br><font color="#4a4a4a"><?php //echo $segment['destination_iataname']; ?></font><br><font color="#9b9b9b"><?php //echo !empty($segment['destination_departure_terminal']) ? "Terminal ".$segment['destination_departure_terminal'] : ""; ?></font></p>
												</div>
											</div>
											<div class="pull-left m-res-0" style="max-width: 180px; margin-left: 15px;">
												<p class="append_bottom5 LatoBold">Fare Type</p>
												<div>
													<div class="LatoBold append_bottom5">
														<span class="font14"><?php //echo ucwords(strtolower($review_flight['price']['cabin'])); ?></span>
														<div class="multifareToolTip">
															<span class="multifareInfo bgProperties" style="background-image: url(&quot;info-blue.png&quot;);"></span>
															<div class="fli-green-tooltip font12 text-left top arrow-left">
																<p class="font12 LatoBold append_bottom5"><?php //echo ucwords(strtolower($review_flight['price']['cabin'])); ?></p>
																<p class="LatoRegular">Cabin baggage Check-in baggage included, No airline cancellation fee, Free date change allowed, Free seats available</p>
															</div>
														</div>
													</div>
													<p class="font11"></p>
												</div>
											</div>
										</div>										
									</div>								   
								</div>
								<div class="itnry-flt-footer">
									<div class="flexOne">
										<p class="text-uppercase LatoBold itnry-flt-footer-row header-row">
											<span class="itnry-flt-footer-col text-black">BAGGAGE : </span>
											<span class="itnry-flt-footer-col text-black">CHECK IN</span>
											<span class="itnry-flt-footer-col text-black">CLASS</span>
											<span class="itnry-flt-footer-col text-black">CABIN</span>
										</p>
										<?php
										//if(count($review_flight['travelerPricings']) > 0)
										//{
											//foreach($review_flight['travelerPricings'] as $key => $travelerPricings)
											//{
										?>
										<p class="itnry-flt-footer-row">
											<span class="itnry-flt-footer-col"><?php //echo ucwords(strtolower(str_replace("HELD_","",$key))); ?></span>
											<span class="itnry-flt-footer-col text-center"><?php //echo ucwords(strtolower($travelerPricings['includedCheckedBags'])); ?></span>
											<span class="itnry-flt-footer-col"><?php //echo $travelerPricings['class']; ?></span>
											<span class="itnry-flt-footer-col"><?php //echo ucwords(strtolower($travelerPricings['cabin'])); ?></span>
										</p>
										<?php
											//}
										//}
										?>
									</div>
								</div> 
								<?php
								   //}
								//}
								   ?>
							</div>
						</div>
					   <?php									
						//}
						//}
					   ?>
					</div> -->
				</div>
				<div class="col-md-121">
				<div class="row1">
					<p class="tvlr-heading make_flex space_between alC LatoBold"><span>Traveller Details</span></p>
					<div class="append_bottom15">
						<div class="tvlrDtls-wrapper make_relative" id="paxDetails">
							<?php
							if(count($review_flight['travelerPricings']) > 0)
							{
								$travr=0;
								foreach($review_flight['travelerPricings'] as $travelertype => $traveler)
								{
							?>
								<?php $passtype = ucwords(strtolower(str_replace("HELD_","",$travelertype))); ?>
								<div class="tvlr-row" id="wrapper_ADULT">
									<div class="error_txt" id="<?php echo $passtype; ?>_selected_error" style="display: none;">&nbsp;</div>
									<div class="tvlrDtls-header">
										<p class="make_flex space_between alC"><span class="tvlrDtls-heading-txt"><span class="text-uppercase"><?php echo $passtype; ?></span></span><span class="font16 LatoMedium text-green"><?php echo $traveler['passengercount']; ?> / <span id="<?php echo $passtype; ?>_selected_count"><?php echo $traveler['passengercount']; ?></span> selected</span></p>
									</div>
									<?php
									if($traveler['passengercount'] > 0)
									{
										$k=1;
										for($i=0;$i<$traveler['passengercount'];$i++)
										{
									?>
									<div class="passenger_row <?php echo $passtype; ?>">
										<div class="tvlr-sctn append_bottom15 make_relative" id="MANUAL_9039d06a-4293-4668-aaa5-2ce1bf428877">
											<div class="tvlrDtls-heading make_relative">
												<div class="make_flex alC">
													<p class="tvlrDtls-heading-txt">														
														<label for="ADULT_MANUAL_9039d06a-4293-4668-aaa5-2ce1bf428877" class="make_flex alC">
															<span class="LatoBold passenger_box_heading"><?php //echo $passtype; ?> <?php //echo $k; ?></span></label>
													</p>
												</div>
												<span class="make_flex alC"></span>
											</div>
											<div class="collapse in">
												<div class="tvlrDtls-section">
													<?php
													$infomsg="";
													
														//if($review_flight['isInternational'] == 0)
														//{
															//$infomsg = "<b>IMPORTANT:</b> Enter your name as it is mentioned on your passport or any government approved ID.";
														//}
														//else
														//{
															//$infomsg = "<b>IMPORTANT:</b> Enter your name as it is mentioned on your passport. For International Travel, passport should be valid for minimum 6 months from the date of travel. If you are travelling to the USA and/or Canada, please ensure that you enter the correct passport details for every passenger. In case you fail to do so, you may not be allowed to enter the USA and/or Canada.";
														//}
																								
													?>
													<input type="hidden" name="passenger_type[]" id="passenger_type" class="passenger_type" value="<?php echo $passtype; ?>">
													<input type="hidden" name="passengercount[]" id="passengercount" class="passengercount" value="<?php echo $traveler['passengercount']; ?>">
													<!-- <p class="LatoMedium tvlrDtls-topInfo"><?php //echo $infomsg; ?></p> -->
													<div class="trvl-formfield-row">
														<div class="trvl-formfield-col" style="width: 20%;">
															<div class="tvlrFormField make_relative name">
															<!-- <label>Title</label> -->
															<select name="passenger_title[]" id="passenger_title" class="form-control title validate_field" aria-invalid="false">
																<option value="Mr.">Mr.</option>
																<option value="Mrs.">Mrs.</option>
																<option value="Miss.">Miss.</option>
																<option value="Mstr.">Mstr.</option>
															</select>
															</div>
														</div>
														<div class="trvl-formfield-col" style="width: 24%;">
															<div class="tvlrFormField make_relative name">
															<!-- <label>Name</label> -->
																<input autocomplete="off" placeholder="Name" class="form-control name validate_field" name="passenger_name[]" id="passenger_name" pattern="[a-zA-Z ]+$" class="tvlrInput" type="text" value="">
															</div>
														</div>
														<div class="trvl-formfield-col" style="width: 24%;">
															<div class="tvlrFormField make_relative gender">
															<!-- <label>Gender</label> -->
															<select name="passenger_gender[]" id="passenger_gender" class="form-control gender validate_field" aria-invalid="false">
																	<option value="MALE">Male</option>
																	<option value="FEMALE">Female</option>
															</select>
															</div>
														</div>
														<!-- <div class="trvl-formfield-col" style="width: 24%;">
															<div class="tvlrFormField make_relative name">
															 <label>Name</label> 
																<input autocomplete="off" placeholder="DOB" class="form-control name validate_field" name="passenger_name[]" id="passenger_name" pattern="[a-zA-Z ]+$" class="tvlrInput" type="text" value="">
															</div>
														</div> -->
														<div class="trvl-formfield-col" style="width: 24%;">
															<div class="tvlrFormField make_relative dob">
																<!-- <label>Date of birth</label> -->
																<input autocomplete="off" placeholder="Date of birth" name="passenger_dob[]" id="passenger_dob" class="form-control dob validate_field" type="text" value="">
															</div>
														</div>
														<?php
														//$fligh_details['isInternational'] = 1;
														if($review_flight['isInternational'] == 1)
														{
														?>
														<div class="trvl-formfield-col" style="width: 20%;">
															<div class="tvlrFormField make_relative dob">
																<!-- <label>Birth Place</label> -->
																<input autocomplete="off" placeholder="Birth Place" name="passenger_dop[]" id="passenger_dop" class="form-control dob validate_field" type="text" value="">
															</div>
														</div>
														
														<div class="trvl-formfield-col" style="width:24%;">
															<div class="tvlrFormField make_relative nationality">															
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
														<div class="trvl-formfield-col" style="width: 24%;">
															<div class="tvlrFormField make_relative dob">
																<input autocomplete="off" placeholder="Passport No" name="passenger_passportno[]" id="passenger_passportno" class="form-control validate_field" type="text" value="">
															</div>
														</div>
														<div class="trvl-formfield-col" style="width: 24%;">
															<div class="tvlrFormField make_relative dob">																
																<input autocomplete="off" placeholder="Passport Issue Place" name="passenger_issue_place[]" id="passenger_issue_place" class="form-control validate_field" type="text" value="">
															</div>
														</div>
														<div class="trvl-formfield-col" style="width: 24%;">
															<div class="tvlrFormField make_relative dob">															
																<input autocomplete="off" placeholder="Passport Issue date" name="passenger_issue_date[]" id="passenger_issue_date" class="form-control validate_field" type="text" value="">
															</div>
														</div>
														<div class="trvl-formfield-col" style="width: 24%;">
															<div class="tvlrFormField make_relative dob">																
																<input autocomplete="off" placeholder="Passport Expiry Date" name="passenger_passport_exp[]" id="passenger_passport_exp" class="form-control validate_field" type="text" value="">
															</div>
														</div>
														<div class="trvl-formfield-col" style="width:20%;">
															<div class="tvlrFormField make_relative passport_country">															
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
														$k++;
														}
														?>													
													</div>
												</div>
											</div>
											<div class="nameCnf-overlay make_relative slideDown">
												<span class="zc-close"></span>
												<div class="nameCnf-overlay-sctn">
													<p class="nameCnf-overlay-title LatoLight">Name Confirmation</p>
													<div class="make_flex">
														<div class="nameCnf-cards-wrap custom-scroll"></div>
														<div class="nameCnf-overlay-col nameCnf-cta">
															<p><a class="btn fli_primary_btn text-uppercase continue_cta">Done</a></p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php
										$k++;
										}
									}
									?>
									<p class="viewAll-trvlr"><a class="font14 text-uppercase LatoBold"></a></p>
									<!-- <a class="font14 LatoBold text-uppercase paddLR15 addMore" data="<?php //echo $traveler['passengercount']; ?>" rel="<?php //echo ucwords(strtolower(str_replace("HELD_","",$travelertype))); ?>">+ Add <?php //echo ucwords(strtolower(str_replace("HELD_","",$travelertype))); ?></a> -->
								</div>
							<?php
								$travr++;
								}
							}
							?>
						</div>
					</div>
				</div>
				
				<div id="paymentDetailsCard" class="row1">
					<p class="tvlr-heading LatoBold">Payment information</p>
					<div class="tvlr-sctn append_bottom15 tvlr-Gst-sctn">						
						<div class="payment_info row">
						<!-- <div class="trvl-formfield-col1 col-md-12">
								<div class="tvlrFormField make_relative MOBILE_NUMBER">
								<p class="paymentcard-icon">&nbsp;</p>
								</div>
							</div> -->
							<div class="trvl-formfield-col1 col-md-6">
								<div class="tvlrFormField make_relative card-reader card">
									<!-- <label class="LatoBold">Credit / Debit Card Number</label> -->
									<span id="CreditCardImg" class="CreditCardImg"></span>
									<input placeholder="Card Number" class="tvlrInput travellerdetails" name="traveller_card_number" id="traveller_card_number" type="text" value="">
									<br>
									<small>(Pay with credit or debit card)</small>
									
									<div style="clear:both;"></div>
									<p class="status"> 
										<span class="status_icon"></span>
										<span class="status_message"></span> 
									</p>
								</div>
							</div>
							<div class="trvl-formfield-col1 col-md-6">
								<div class="tvlrFormField make_relative">
									<!-- <label class="LatoBold">Card Holder's Name</label> -->
									<input placeholder="Card Holder's Name" class="tvlrInput travellerdetails" name="traveller_name_on_card" id="traveller_name_on_card" type="text" value=""><br>
									<small>(As it appears on your credit card)</small> 
								</div>
							</div>
							<div class="trvl-formfield-col1 col-md-6">
								<div class="tvlrFormField make_relative">
									<!-- <label class="LatoBold">Expiration Date*</label> -->
									<select class="form-control travellerdetails payment_exp_date" name="traveller_exp_month" id="traveller_exp_month">
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
									<select class="form-control travellerdetails payment_exp_date" name="traveller_exp_year" id="traveller_exp_year">
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
							<div class="trvl-formfield-col1 col-md-6">
								<div class="tvlrFormField make_relative">
									<!-- <label class="LatoBold">Card Verification Number</label> -->
									<input placeholder="cvv" class="tvlrInput travellerdetails payment_exp_date" name="traveller_cvv" id="traveller_cvv" type="text" value="">
									3 digit number from your card &nbsp <img src="<?php echo base_url(); ?>assects/images/card.gif" >
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="contactDetailsCard" class="row1">
					<p class="tvlr-heading LatoBold">Billing Information</p>
					<div class="tvlr-sctn append_bottom15 tvlr-Gst-sctn">
						<!-- <p class="tvlr-Gst-sctn-subtitle append_bottom15">Your ticket and flights information will be sent here.</p> -->
						<div class="trvl-formfield-row">
										
						<div class="trvl-formfield-col1 col-md-4 w-100 pl0 form-group">
							<div class="tvlrFormField make_relative">
							<!-- <label>Country</label> -->
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
						</div>
						<div class="trvl-formfield-col1 col-md-4 pl0 w-100 form-group">
							<div class="tvlrFormField make_relative">
							<!-- <label>State</label> -->
							<select id="traveller_state" name="traveller_state" class="form-control travellerdetails">
								<option value="">Select country first</option>
							</select>
							</div>
						</div>						
						<div class="trvl-formfield-col1 col-md-4 pl0 w-100 form-group">
							<!-- <div class="tvlrFormField make_relative"><label class="LatoBold">Zipcode</label> -->
							<input autocomplete="none" placeholder="Zipcode" class="tvlrInput travellerdetails" name="traveller_postcode" id="traveller_postcode" type="text" value="">
						</div>

						<div class="trvl-formfield-col1 col-md-6 pl0 w-100">
							<!-- <div class="tvlrFormField make_relative"><label class="LatoBold">Addrress</label> -->
							<input autocomplete="none" placeholder="Addrress" class="tvlrInput travellerdetails" name="traveller_address" id="traveller_address" type="text" value="">
						</div>
						
						<div class="trvl-formfield-col1 col-md-6 pl0 w-100">
							<!-- <div class="tvlrFormField make_relative"><label class="LatoBold">City</label> -->
							<input autocomplete="none" placeholder="City" class="tvlrInput travellerdetails" name="traveller_city" id="traveller_city" type="text" value="">
						</div>		

						</div>	

						</div>
					</div>
				
				<div id="contactDetailsCard" class="row1">
					<p class="tvlr-heading LatoBold">Contact information</p>
					<div class="tvlr-sctn append_bottom15 tvlr-Gst-sctn">
						<!-- <p class="tvlr-Gst-sctn-subtitle append_bottom15">Your ticket and flights information will be sent here.</p> -->
						<div class="trvl-formfield-row">
							<div class="trvl-formfield-col1 col-md-6 w-100 pl0 form-group">
								<!-- <div class="tvlrFormField make_relative MOBILE_NUMBER"><label class="LatoBold">Name</label> -->
								<input autocomplete="none" placeholder="Name" class="tvlrInput travellerdetails" name="traveller_name" id="traveller_name" type="text" value="">
							</div>
														
							<div class="trvl-formfield-col1 col-md-6 pl0 form-group" id="Country Code">
								<div class="tvlrFormField COUNTRY_NAME">
									<!-- <label class="LatoBold">Code</label> -->
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
							<div class="trvl-formfield-col1  col-md-6 pl0 w-100" id="Mobile No">
								<!-- <div class="tvlrFormField make_relative MOBILE_NUMBER"><label class="LatoBold">Mobile No</label> -->
								<input autocomplete="none" placeholder="Mobile No" class="tvlrInput travellerdetails" name="traveller_mobile" id="traveller_mobile" type="text" value="">
							</div>
							
							
							<div class="trvl-formfield-col1  col-md-6 pl0 w-100" id="Email">
								<!-- <div class="tvlrFormField make_relative EMAIL"><label class="LatoBold">Email</label> -->
								<input autocomplete="none" placeholder="Email" name="traveller_email" id="traveller_email" class="tvlrInput travellerdetails" type="email" value="">
							</div>

							</div>
						</div>
					</div>
			
				
				<div class="append_bottom15 make_relative blocked_traveller_booking text-center"><button id="review-continue" class="fli_primary_btn btn text-uppercase continue_cta ">Confirm & Book Now<br><span>Your payment details are secured via 256<br> Bit encryption</span></button></div>
				<!-- <div class="fare-families-overlay make_relative slideDown" style="z-index: 100;"><span class="zc-close"></span>loading</div> -->
			</div></div>
			<div class="fli-intl-rhs1 pull-left col-md-3">
				<div>
					<p class="rvw-heading LatoBold text-fare">Fare Summary</p>
					<div class="rvw-sctn append_bottom15 make_relative" style="z-index: 1;">
					   
							<div class="fareSmry-sctn">
								<div class="fareSmry-header LatoBold">
									<p class="fareSmry-hdng"><span class="fareSmry-expand-icon cursor_pointer marR15 open"></span><span>Base Fare</span></p>
								</div>
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
							<span style="font-size: 16px; text-align: right; line-height: normal;"><span><?php echo $review_flight['price']['currency_symbol']." <span id='grand_total'>".number_format((floatval(str_replace(',', '', $review_flight['price']['total']))+$charity_amt),2)."</span>"; ?></span></span></span></p>
						</div>
					</div>
				</div>
				<input type="hidden" name="currency" id="currency" value="<?php echo $review_flight['price']['currency_symbol']; ?>">
			</div>
		</div>
		</div>
		<div class="flexible-time-overlay make_relative"></div>
	</div>
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
</div>
</div>