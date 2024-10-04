<link href="<?php echo base_url('assects/css/main.css'); ?>" rel="stylesheet">
<!-- <link href="https://seeksfare.com/assects/css/bootstrap.min.css" rel="stylesheet" type="text/css"> -->
<style>
	.travel-search-content2 .travl-search-advanced .search-item.date p {
        color: #909090;
        font-weight: 500;
        margin: -6px 0 0 0;
        font-size: 12px;
        line-height: 18px;
    }
    .totaal-time-listbg{
      background: #ddd;
      padding: 2px;
      text-align: center;
    }
    .travel-search-content2 {
        margin-top: 12%;
        margin-bottom: 0;
       /* border: 1px solid #ccc;*/
        border-radius: 13px;
        /* margin-left: -6%; */
    } 
    .so-page-builder
    {
        width: 100%;
        /* margin-left: 2%; */
    } 
      @media (max-width: 767px) {
        .TPWL-widget .ticket-scroll-container {
            -js-display: inherit;
            display: inherit;
        }
        .TPWL-widget .flight-brief {
            -js-display: inherit;
            display: inherit;;
        }
        .TPWL-widget .flight-brief-departure {
            margin-bottom: 30px;
        }
        .TPWL-widget .flight-brief-arrival {
            margin-top: 30px;
        }
      }

/* ----new style----- */

[data-tooltip],
.tooltip {
  position: relative;
  cursor: pointer;
}

/* Base styles for the entire tooltip */
[data-tooltip]:before,
[data-tooltip]:after,
.tooltip:before,
.tooltip:after {
  position: absolute;
  visibility: hidden;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
  opacity: 0;
  -webkit-transition: 
    opacity 0.2s ease-in-out,
    visibility 0.2s ease-in-out,
    -webkit-transform 0.2s cubic-bezier(0.71, 1.7, 0.77, 1.24);
  -moz-transition:    
    opacity 0.2s ease-in-out,
    visibility 0.2s ease-in-out,
    -moz-transform 0.2s cubic-bezier(0.71, 1.7, 0.77, 1.24);
  transition:         
    opacity 0.2s ease-in-out,
    visibility 0.2s ease-in-out,
    transform 0.2s cubic-bezier(0.71, 1.7, 0.77, 1.24);
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform:    translate3d(0, 0, 0);
  transform:         translate3d(0, 0, 0);
  pointer-events: none;
}

/* Show the entire tooltip on hover and focus */
[data-tooltip]:hover:before,
[data-tooltip]:hover:after,
[data-tooltip]:focus:before,
[data-tooltip]:focus:after,
.tooltip:hover:before,
.tooltip:hover:after,
.tooltip:focus:before,
.tooltip:focus:after {
  visibility: visible;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
  opacity: 1;
}

/* Base styles for the tooltip's directional arrow */
.tooltip:before,
[data-tooltip]:before {
  z-index: 1001;
  border: 6px solid transparent;
  background: transparent;
  content: "";
}

/* Base styles for the tooltip's content area */
.tooltip:after,
[data-tooltip]:after {
  z-index: 1000;
  padding: 8px;
  width: 160px;
  background-color: #000;
  background-color: hsla(0, 0%, 20%, 0.9);
  color: #fff;
  content: attr(data-tooltip);
  font-size: 14px;
  line-height: 1.2;
}

/* Directions */

/* Top (default) */
[data-tooltip]:before,
[data-tooltip]:after,
.tooltip:before,
.tooltip:after,
.tooltip-top:before,
.tooltip-top:after {
  bottom: 100%;
  left: 50%;
}

[data-tooltip]:before,
.tooltip:before,
.tooltip-top:before {
  margin-left: -6px;
  margin-bottom: -12px;
  border-top-color: #000;
  border-top-color: hsla(0, 0%, 20%, 0.9);
}

/* Horizontally align top/bottom tooltips */
[data-tooltip]:after,
.tooltip:after,
.tooltip-top:after {
  margin-left: -80px;
}

[data-tooltip]:hover:before,
[data-tooltip]:hover:after,
[data-tooltip]:focus:before,
[data-tooltip]:focus:after,
.tooltip:hover:before,
.tooltip:hover:after,
.tooltip:focus:before,
.tooltip:focus:after,
.tooltip-top:hover:before,
.tooltip-top:hover:after,
.tooltip-top:focus:before,
.tooltip-top:focus:after {
  -webkit-transform: translateY(-12px);
  -moz-transform:    translateY(-12px);
  transform:         translateY(-12px); 
}



/* Bottom */
.tooltip-bottom:before,
.tooltip-bottom:after {
  top: 100%;
  bottom: auto;
  left: 50%;
}

.tooltip-bottom:before {
  margin-top: -12px;
  margin-bottom: 0;
  border-top-color: transparent;
  border-bottom-color: #000;
  border-bottom-color: hsla(0, 0%, 20%, 0.9);
}

.tooltip-bottom:hover:before,
.tooltip-bottom:hover:after,
.tooltip-bottom:focus:before,
.tooltip-bottom:focus:after {
  -webkit-transform: translateY(12px);
  -moz-transform:    translateY(12px);
  transform:         translateY(12px); 
}

/* Move directional arrows down a bit for left/right tooltips */
.tooltip-left:before,
.tooltip-right:before {
  top: 3px;
}

/* Vertically center tooltip content for left/right tooltips */
.tooltip-left:after,
.tooltip-right:after {
  margin-left: 0;
  margin-bottom: -16px;
}
         .search-list-mainblock {
            border: 1px solid #dcdcdc;
            padding: 15px 15px 0px 15px;
            position: relative;
         }
		.right-block{
			border: 1px solid #dcdcdc;
			box-shadow: 0px 0px 8px 1px #dfdfdf;
			margin-bottom: 30px;
			position: relative;
         overflow: hidden;
			/* border-bottom: 1px dashed #6b6b6b; */
		} 
         .search-list-mainblock h2{
         font-size: 18px;
         letter-spacing: 0;color: #0b082e;font-weight: 600;}
         .tooltip{opacity: 1;}
         .airlines-namelist span{color: #943b94;}
         .airlines-baggagelist i{color: #943b94;}
         .airlines-timelist p{
            font-size: 11px;
            color: #000;}
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
            border: #943b94;
			padding: 6px 10px;
		
			margin-bottom: 30px;
         }
         button.btn.btn-primary.btn-setect-list i {font-size: 10px;}
         .price-list span{font-size: 18px;color: #943b94; font-weight: 700;}
         .airlines-baggagelist p {
            font-size: 11px;
            font-weight: 600;
            line-height:18px;
         }
         .airlines-baggagelist{margin-bottom: 10px;}
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
			/* bottom: 37%; */
			left: 50%;
			transform: translate(-50%, -50%);
			background: #ededed;
			font-size: 13px;
			padding: 1px;
         z-index: 9;
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
		@media screen and (max-width: 767px) {
         .instantoffer span {
               font-size: 12px !important;
            }
         .instantoffer{display: block !important;background:#03713e;text-align:center;color: #fff;
    white-space: nowrap;
    padding: 10px 0;}
         .instantoffer a, .instantoffer span{color:#fff}
         .instantoffer a{font-size: 18px;}
         .exclu-btn h2 {
            font-size: 12px;
            margin-bottom: 20px;
         }
         .right-block-new h3 {
            margin-bottom: 0;
         }
         .right-block-new p {
            font-size: 10px;
         }
         .right-block-new-price {
            margin-top: -64px !important;
         }
         .special-airport{margin: 10px 0 0;}
         .right-block-new-price span{display: none;}
         .exclu-btn a {
    padding: 5px 10px;}
    .right-block-departure small{display: none;}
    .right-block-departure-arrow img{width:100%;}
    .exclusive-ph{display:none}
         .totaal-time-list .total-time-res, .totaal-time-list i {display: none;}
			.dnone{display: block;}
         .totaal-time-list{
            position: absolute;
            top: -25px;
            width: 100%;
            right: -135px;
            color: #000;
         }
         .totaal-time-listbg {background: transparent;}
			.travel-search-content2 .travl-search-advanced .button-submit {
				margin-top: -29px;
            margin-right: 16px;
			}
         .prices__date {color:#000;}
			.airlines-timelistportorigin span.airportname-res, .airlines-timelistportdes span.airportname-res{
				display: none;
			}
			.airlines-timelistportorigin{
				display: inline-block;
				width: 50%;
				float: left;
				position: relative;
			}
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
            z-index: 99;
			}
			span.totaal-time-airportneme {
				display: none;
			}
			.totaal-time {
				bottom: 10%;
				right: -95px;
				transform: inherit;
				background: transparent;
				font-size: 9px;
				font-weight: bold;
				padding: 0;
			}
			.totaal-time i{display: none;}
			/* .res-date-list{overflow-x:auto;} */
			.res-date-list th{padding: 1px;text-align: center;color: #000;font-weight: 500;}
			.clear_option {
				padding: 7px 10px;
				width: 32%;
			}
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
				.search-list-mainblock {padding: 0px 15px 0px 15px;}
			.include-airlines{display: none;}
			.form-checkedlist{margin-bottom: 0;padding: 0;}
			.panel-body{padding: 15px 15px 0;}
			.res-date-list  th span{font-size: 20px;}
         .airlines-namelist h5{font-size:12px;letter-spacing:0;}
			.airlines-namelist h3{
				display: inline-block;
				position: absolute;
				bottom: -50px;
				font-size: 12px;
				letter-spacing: 0;
				font-weight: 700;
				transform: translate(-50%, -50%);
				top: 50%;
				right:46px;
			}
         .search-list-mainblock h2 {font-size: 12px;}

			}

			i.arrwright{float: right;}

			.clear_option {
				text-align: center;
			}
         .label_container {
            margin-bottom: 10px;
            margin-top: 10px;
         }
         .sliderstartcontainer {
            display: inline-block;
            vertical-align: bottom;
            font-weight: 600;
         }
         .slidercontainer {
            position: relative;
            width: 60%;
            display: inline-block;
            text-align: center;
         }
         .sliderendtcontainer {
            display: inline-block;
            vertical-align: bottom;
            font-weight: 600;
            float: right;
         }
         .rangeslider--horizontal {
            height: 10px;
         }
         .rangeslider--horizontal .rangeslider__handle {
            top: -4px;
         }
         .rangeslider__fill {
               background: #2db2ff;
         }
         .rangeslider__handle {
            width: 20px;
            height: 20px;
         }

         /* ---right-block-new */
         .right-block-new h2{font-size: 12px;}
         .right-block-new h3{    
            font-size: 14px;
            font-weight: 700;
            color: #943b94;
         }
         .right-block-new p{
            font-size: 11px;
            color: #000;
            text-transform: uppercase;
         }
         .right-block-new-price{
            float: right;
            margin-top: -80px;
         }
         .right-block-departure p {
            margin-bottom: 0px;
            font-size: 14px;
            color: #943b94;
            font-weight: 700;
            text-transform: uppercase;
         }
         .right-block-new.right-block.p-3 {position: relative;}
         .exclusive-ph{
            margin: 16px 0;
            text-align: right;
            text-align: center;
            position: absolute;
            top: 28px;
            width: 100%;
            left: 0%;
            transform: translate(0%, -50%);
            }
         .exclu-btn a{
            background: #003f48;
            padding: 5px 20px;
            border-radius: 40px;
            color: #fff;
            font-size: 12px;
         }
         .exclu-btn h2{
            color: #003f48;
            font-weight: 700;
            font-size: 17px;
         }
         .exclu-btn h3 a{ background:inherit;
            padding: 0;
            border-radius: 0px;
            color: #943b94;
            font-size: 14px;}
         .exclusive-ph p a{
            color: #003f48;
            font-weight: 600;
            font-size: 12px;
         }
         .instantoffer{display: block !important;background:#03713e;text-align:center;color: #fff;
    white-space: nowrap;
    padding: 10px 0;margin-top: 15px;}
         .instantoffer a, .instantoffer span{color:#fff;font-size: 16px;}
         .ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active, a.ui-button:active, .ui-button:active, .ui-button.ui-state-active:hover {
            border: 1px solid #943b94;
            background: #943b94;
            font-weight: normal;
            color: #fff;
         }
         .ui-accordion .ui-accordion-content
         {
            padding: 1em 0.7em;
         }
	</style>
    
    
		<!-- Main Container  -->        
		<div class="container main_contain">
			<div class="so-page-builder">
				<div class="travel-search-content2" id="travel-search-content2">
					<div class="container page-builder-ltr">
						<div class="row">
							<form method="post" action="" name="route_search_frm" id="route_search_frm" class="travl-search-advanced clearfix">
								<input type="hidden" name="searchprogress" id="searchprogress" value="searchprogress">
                        <input type="hidden" name="nonStop" id="nonStop" value="<?php echo !empty($nonStop) ? $nonStop : "all"; ?>">
                        <input type="hidden" name="includedAirlineCodes" id="includedAirlineCodes" value="<?php echo $includedAirlineCodes ?>">
                        <input type="hidden" name="maxPrice" id="maxPrice" value="<?php echo $maxPrice ?>">
                        <div class="row">
									<div class="col-md-3">
										<div class="search-item city form-group">
											<p>Origin</p>
											<input type="hidden" class="tour-search-input iata_code" autocomplete="off" id="origincode" name="origincode" value="<?php echo $originLocationCode; ?>" name="origincode" placeholder="From">
											<input type="text" class="tour-search-input iata_code_city" autocomplete="off" id="origin_iata_code_city" name="origin_iata_code_city" value="<?php echo $origincity; ?>" placeholder="From">
										</div>
									</div>
									<div class="col-md-3">
										<div class="search-item city form-group">
											<p>Destinations</p>											
											<input type="hidden" class="tour-search-input iata_code" autocomplete="off" id="destinationcode" name="destinationcode" value="<?php echo $destinationLocationCode; ?>" name="destinationcode" placeholder="To">
											<input type="text" class="tour-search-input iata_code_city" autocomplete="off" id="destination_iata_code_city" value="<?php echo $depcity; ?>" name="destination_iata_code_city" placeholder="To">

										</div>
									</div>

									<div class="col-md-3">
										<div class="search-item date departuredate form-group">
											<p>Departure</p>
											<input type="text" autocomplete="off" class="tour-search-input" autocomplete="off" id="date_from" name="date_from" value="<?php echo $departureDate; ?>"  placeholder="DD/MM/YY">
										</div>
										
									</div>

									<div class="col-md-3">
										<div class="search-item date returndate form-group">
											<p>Return</p>
											<input type="text" class="tour-search-input" autocomplete="off" id="date_to" name="date_to" value="<?php echo $returnDate; ?>" placeholder="DD/MM/YY">
										</div>
									</div>

									<div class="col-md-3">
										<div class="search-item item-select ">
											<p></p>
											<select name="no_of_adults" id="no_of_adults">
												<option value="1" <?php echo ($adults == 1) ? "selected='selected'" : ""; ?>>1 Adult</option>
												<option value="2" <?php echo ($adults == 2) ? "selected='selected'" : ""; ?>>2 Adults</option>
												<option value="3" <?php echo ($adults == 3) ? "selected='selected'" : ""; ?>>3 Adults</option>
												<option value="4" <?php echo ($adults == 4) ? "selected='selected'" : ""; ?>>4 Adults</option>
												<option value="5" <?php echo ($adults == 5) ? "selected='selected'" : ""; ?>>5 Adults</option>
												<option value="6" <?php echo ($adults == 6) ? "selected='selected'" : ""; ?>>6 Adults</option>
												<option value="7" <?php echo ($adults == 7) ? "selected='selected'" : ""; ?>>7 Adults</option>
												<option value="8" <?php echo ($adults == 8) ? "selected='selected'" : ""; ?>>8 Adults</option>
												<option value="9" <?php echo ($adults == 9) ? "selected='selected'" : ""; ?>>9 Adults</option>
											</select>
										</div>
									</div>

									<div class="col-md-3">
										<div class="search-item item-select">
											<p></p>
											<select name="no_of_child" id="no_of_child">
												<option value="0">Select Child</option>
												<option value="1" <?php echo ($child == 1) ? "selected='selected'" : ""; ?>>1 Child</option>
												<option value="2" <?php echo ($child == 2) ? "selected='selected'" : ""; ?>>2 Childs</option>
												<option value="3" <?php echo ($child == 3) ? "selected='selected'" : ""; ?>>3 Childs</option>
												<option value="4" <?php echo ($child == 4) ? "selected='selected'" : ""; ?>>4 Childs</option>
												<option value="5" <?php echo ($child == 5) ? "selected='selected'" : ""; ?>>5 Childs</option>
												<option value="6" <?php echo ($child == 6) ? "selected='selected'" : ""; ?>>6 Childs</option>
											</select>
										</div>
									</div>

									<div class="col-md-3">
										<div class="search-item item-select">
											<p></p>
											<select name="no_of_infant" id="no_of_infant">
												<option value="0">Select Infant</option>
												<option value="1" <?php echo ($infants == 1) ? "selected='selected'" : ""; ?>>1 Infant</option>
												<option value="2" <?php echo ($infants == 2) ? "selected='selected'" : ""; ?>>2 Infants</option>
												<option value="3" <?php echo ($infants == 3) ? "selected='selected'" : ""; ?>>3 Infants</option>
												<option value="4" <?php echo ($infants == 4) ? "selected='selected'" : ""; ?>>4 Infants</option>
												<option value="5" <?php echo ($infants == 5) ? "selected='selected'" : ""; ?>>5 Infants</option>
												<option value="6" <?php echo ($infants == 6) ? "selected='selected'" : ""; ?>>6 Infants</option>
											</select>
										</div>
									</div>

									<div class="col-md-3">
										<div class="search-item item-select">
											<p></p>
                                            <select name="fare_class" id="fare_class">
												<option value="ECONOMY" <?php echo ($travelClass == "ECONOMY") ? "selected='selected'" : ""; ?>>Economy</option>
												<option value="PREMIUM_ECONOMY" <?php echo ($travelClass == "PREMIUM_ECONOMY") ? "selected='selected'" : ""; ?>>Premium Economy</option>
												<option value="BUSINESS" <?php echo ($travelClass == "BUSINESS") ? "selected='selected'" : ""; ?>>Business</option>
												<option value="FIRST" <?php echo ($travelClass == "FIRST") ? "selected='selected'" : ""; ?>>First</option>
											</select>
										</div>
									</div>

									<div class="col-md-12">
										<div class="button-submit">
											<button type="submit" class="button"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>         
		</div>



      <div class="loading_container" id="loading_container" style="display:none;">
         <div class="image-top pt72">   
         </div>
         <section class="image-top pt72">
            <div class="container">
               <div class="fromto">
                     <h2><?php echo $origincity; ?> to <?php echo $depcity; ?> <span>Wed, <?php echo date("D, M d,Y",strtotime($departureDate)); ?></span></h2>
                     <p>Prices are <?php echo !empty($returnDate) ? 'ROUNDTRIP' : "ONEWAY" ?> per person, include all taxes and fees, but do not include baggage fees</p>
               </div>
               <div class="wait">
               <p>Please wait....While we search the cheapest airfares for you,from over 500 Airlines. </p>
               </div>
                  <img src="<?php echo base_url('assects/images/Flight_GIF_Blue.gif'); ?>" alt="tour" class="img-responsive center-img">
                  
                  <div class="row">
                     <div class="col-md-2"></div>
                     <div class="col-md-3">
                     <div class="starting-point text-center">
                           <h3><?php echo $originLocationCode; ?></h3>
                           <h2><?php echo $origincity; ?> to <?php echo $depcity; ?> <span><?php echo date("D, M d,Y",strtotime($departureDate)); ?></span></h2>
                           <p><?php echo date("D, d/m/Y",strtotime($departureDate)); ?></p>
                     </div>
                     </div>
                     <div class="col-md-2 starting-point"><img src="<?php echo base_url('assects/images/arrow-both.svg'); ?>" alt="tour" width="30px" class="img-responsive center-img"></div>
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


      <section class="search-list-sec" id="search_results">
         <div class="container">
            <div class="row">

               <div class="col-md-3">
            <div id="accordion">
               <h3>Filter Options</h3>
               <div>
               <div class="clear_option"><a class="clear_filter_option">Reset Filter</a></div>
               <div class="filters-search">
                     <div class="filter">
                     <!--if-->
                     
                        <div class="filter-control-container">
                        <div class="control control--expanded" role="filter-body">
                           
                           <div class="row">
                              <div class="col-md-12 col-lg-12">
                                 <div class="form-check">
                                 <input class="form-check-input flitersearch" type="radio" name="stopfiltertype" checked="checked" id="stopfiltertype1" value="all">
                                 <label class="form-check-label" for="stoptype1">
                                    All Stop
                                 </label>
                                 </div>
                              </div>
                              <div class="col-md-12 col-lg-12">	
                                 <div class="form-check">
                                 <input class="form-check-input flitersearch" type="radio" name="stopfiltertype" id="stopfiltertype2" value="non">
                                 <label class="form-check-label" for="stoptype2">
                                    Non Stop
                                 </label>
                                 </div>
                           </div>		
                        </div>												
                        </div>
                        </div>
                        </div>

                        <div class="lft-style">
                        <div class="form-group">
                           <label for="customRange1" class="max_price_range">Maximam Price</label>
                           <div style="clear:both;"></div>
                           <div class="label_container">
                              <div id="tPrice" class="sliderstartcontainer">$<?php echo $lowestflterprice;?></div>
                              <div class="slidercontainer" style="position:relative;">
                                 <div id="relationship-status-output" class="relationship-status-output color-default">$<?php echo $maxPrice; ?></div>                                                   
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
                        <div class="panel panel-default dnone">
                           <div class="panel-heading">
                              <h4 class="panel-title"
                                 data-toggle="collapse" 
                                 data-target="#collapseOne">
                                 Filter By Airlines <i class="fa fa-angle-down arrwright" aria-hidden="true"></i>
                              </h4>
                           </div>
                           <div id="collapseOne" class="panel-collapse collapse">
                              <div class="panel-body">
                                 <div class="form-checkedlist">
                                 <?php                                                
                                    $optn=1;
                                    foreach($carrierfilters as $key => $carrierfilter)
                                    {
                                    ?>
                                    <div class="form-group">
                                       <!-- <p class="custom-control-label max_price_range form-group" for="customCheck1"><b>Included Airline</b> </p> -->
                                       <div class="form-group form-check">
                                          <input type="checkbox" class="form-check-input flitersearch" <?php echo in_array($carrierfilter['carriercode'],$includedAirlineCodesArr) ?  "checked='checked'" : ""; ?> value="<?php echo  $carrierfilter['carriercode'] ?>" name="includecarrieroption[]" id="includecarrieroption_<?php echo $optn; ?>">
                                          <label class="form-check-label" for="exampleCheck1"><?php echo  $carrierfilter['Name']; ?></label>
                                       </div>
                                    </div>											
                                    <?php
                                       $optn++;
                                       }
                                    ?>
                                    <!-- <div class="form-group">
                                       <div class="form-group form-check">
                                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                          <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                       </div>
                                    </div> -->
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php
                        }
                        if(count($carrierfilters) > 0)
                        {
                        ?>
                        <div class="form-checkedlist include-airlines">
                           <div class="form-group">
                              <p class="custom-control-label1 max_price_range form-group"><b>Included Airline</b> </p>
                              <?php                                                
                              $optn=1;
                              foreach($carrierfilters as $key => $carrierfilter)
                              {
                              ?>
                              <div class="form-group form-check">
                                 <input type="checkbox" class="form-check-input flitersearch" <?php echo in_array($carrierfilter['carriercode'],$includedAirlineCodesArr) ?  "checked='checked'" : ""; ?> value="<?php echo  $carrierfilter['carriercode'] ?>" name="includecarrieroption[]" id="includecarrieroption_<?php echo $optn; ?>">
                                 <label class="form-check-label" for="exampleCheck1"><?php echo  $carrierfilter['Name']; ?></label>
                              </div>
                              <?php
                              $optn++;
                              }
                              ?>
                           </div>										
                  
                           <!-- <div class="form-group">
                              <div class="form-group form-check">
                                 <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                 <label class="form-check-label" for="exampleCheck1">Check me out</label>
                              </div>
                           </div> -->
                        </div>
                        <?php
                        }
                        ?>
                  </div>
                  </div>
               </div>
               </div>
            </div>
            <div class="col-md-9">
				<div class="res-date-list table-responsive">

					<table class="table table-curved">
						<tbody class="text-nowrap">
						  <tr>
							<th class="info bold-italic col-md-3" scope="row">
                        <a class="prices__date  searchday" href="javascript:void(0);" rel="<?php echo $prev3depday; ?>" data="<?php echo $prev3returbday; ?>"> <?php echo $prev3date; ?>, <?php echo $prev3day; ?> </a>
                     </th>							
							<th class="info bold-italic col-md-3" scope="row">
                        <a class="prices__date searchday" href="javascript:void(0);" rel="<?php echo $prev2depday; ?>" data="<?php echo $prev2returbday; ?>"> <?php echo $prev2date; ?>, <?php echo $prev2day; ?> </a>
                     </th>
							<th class="info bold-italic col-md-3" scope="row">
                        <a class="prices__date searchday" href="javascript:void(0);" rel="<?php echo $prev1depday; ?>" data="<?php echo $prev1returbday; ?>"> <?php echo $prev1date; ?>, <?php echo $prev1day; ?> </a>
                     </th>
							<th class="info bold-italic col-md-3 current" scope="row">
                        <a class="prices__date searchday" href="javascript:void(0);" 
                        rel="<?php echo $currentdepday; ?>" 
                        data="<?php echo $currentreturbday; ?>"> 
                        <?php echo $currentdate; ?>, <?php echo $currentday; ?> 
                        <?php
                        if(count($searchdata) > 0)
                        {
                           $lowestprice = $searchdata[0]['price']['grandTotal'];
                           echo "<br>$&nbsp".$lowestprice;
                        }
                        ?>
                     </a>
                     </th>
							<th class="info bold-italic col-md-3" scope="row">
                        <a class="prices__date searchday" href="javascript:void(0);" rel="<?php echo $next1depday; ?>" data="<?php echo $next1returbday; ?>"> <?php echo $next1date; ?>, <?php echo $next1day; ?> </a>
                     </th>
							<th class="info bold-italic col-md-3" scope="row">
                        <a class="prices__date searchday" href="javascript:void(0);" rel="<?php echo $next2depday; ?>" data="<?php echo $next2returbday; ?>"> <?php echo $next2date; ?>, <?php echo $next2day; ?> </a>
                     </th>
							<th class="info bold-italic col-md-3" scope="row">
                        <a class="prices__date searchday" href="javascript:void(0);" rel="<?php echo $next3depday; ?>" data="<?php echo $next3returbday; ?>"> <?php echo $next3date; ?>, <?php echo $next3day; ?> </a>
                     </th>
						  </tr>
						 
						</tbody>
					  </table>
					
					</div>
               <textarea name="carriers" style="display:none;" id="carriers"><?php echo $carriers; ?></textarea>
               <textarea name="locations" style="display:none;" id="locations"><?php echo $locations; ?></textarea>
               <textarea name="aircraft" style="display:none;" id="aircraft"><?php echo $aircraft; ?></textarea>


               <?php
               if(count($searchdata) > 0)
               {
               ?>
               <div class="right-block-new right-block p-3">
               
                  <div class="exclu-btn">
                     <h2>Limited Time Offer  <a href="tel:+18447341746"><i class="fa fa-phone"></i> 1-844-734-1746</a> </h2>
                     <h3><a href="tel:+18447341746"> Call Now For Exclusiv Fares Deals </a></h3>
                     <p class="special-airport">Special Fare For <b><?php echo $origincity; ?> - <?php echo $depcity; ?></b></p>
                  </div>
                 <div class="right-block-new-price"><span>From</span><h3>$<?php echo ($searchdata[0]['price']['grandTotal']-20); ?>*</h3><small>price per adult</small></div>
                  <div class="right-block-travel">
                     <?php
                     $it=1;
                     if(count($searchdata[0]['itineraries']) > 0)  
                     {
                        foreach($searchdata[0]['itineraries'] as $itinerary)
                        {
                          
                           foreach($itinerary['segments'] as $segment)
                           {
                     ?>
                     <div class="row">
                        <div class="col-3">

                           <div class="right-block-departure">
                              <span><?php echo $addsectiontitle; ?></span>  
                              <span>Departure On</span>  
                              <p><?php echo $segment['departure_iatacode']; ?> 
                           </p> 
                              <small><?php echo $segment['origin_iataname']; ?></small></div>
                        </div>
                        <div class="col-3">
                           <div class="right-block-departure-arrow text-center">
                              <img src="<?php echo base_url('assects/images/arrow-right.png');?>"   width="30%">
                           </div>
                        </div>
                        <div class="col-3">
                           <div class="right-block-departure"><span>Arrival On</span>  <p><?php echo $segment['arrival_iataCode']; ?></p> <small><?php echo $segment['destination_iataname']; ?></small></div>
                        </div>
                        <div class="col-md-3">
                           <p class="right-block-newdate"><b>D: <?php echo date('h:i a',strtotime($segment['departure_time'])) ?>  ,</b> <span><?php echo date('D, M d',strtotime($segment['departure_time'])) ?></p>
                           <p class="right-block-newdate"><b>A: <?php echo date('h:i a',strtotime($segment['arrival_time'])) ?>,</b> <?php echo date('D, M d',strtotime($segment['arrival_time'])) ?></p>
                        <!-- <div class="exclusive-ph">
                           <p><a href="tel:+18447341746"> <img src="<?php echo base_url('assects/images/call-lady.svg');?>" width="20" height="20"> Exclusive phone only deals</a></p>
                        </div> -->
						      </div>                     
                     </div>
                     <?php
                           }
                           $it++;
                        }
                        
                     }
                     ?>

                     <div class="instantoffer"><span>Call now for a instant Offer </span><a href="tel:+18447341746">1-844-734-1746</a></div>
                  </div>
                  
                  <!-- <small>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum</small> -->
               </div>
               
               <?php
               }
               ?>


               <?php
                  if(count($searchdata) == 0  && !empty($searchprogress))
                  {
                  ?>
                  <div class="right-block">
                     <div class="select-list-bg">
                        <div class="row">
                           <div class="col-md-12 text-center">
                                 <div class="ticket-scroll-container error">
                                    <div class="ticket-details">
                                        <div class="api_response_error">Sorry! Something went wrong. Please search your flight and choose a suitable flight offer price.<br> Call toll free number <a href="tel:+18447341746">1-844-734-1746</a> for instant booking and $50.00 discount </div>
                                    </div>
                                 </div>
                           </div>                           
                        </div>
                     </div>			  
				      </div>
                  <?php
                  }
                  else
                  {
                     
                     if(count($searchdata) > 0)
                     {
                        foreach($searchdata as $flight)
                        {  
                           //echo '<pre>';
                              //print_r($flight);
                           //echo '</pre>';
                                     
                     ?>                                                   
                        <div class="right-block">
                           <div class="select-list-bg">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="price-list"><span>$ <?php echo $flight['price']['grandTotal'] ?></span>  (<?php echo "$".number_format($flight['price']['total']); ?> + <?php echo "$".number_format(($flight['price']['total']-$flight['price']['base']),2); ?> taxes)<br>
                                    Price per adult (taxes & fees included)</div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="text-right">
                                    <a class="book_now" role="main-proposal-link" href="javascript:void(0);" rel="<?php echo $flight['id']; ?>"><button class="btn btn-primary btn-setect-list">Select <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                       <i class="fa fa-chevron-right" aria-hidden="true"></i></button></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
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
                                    $mins = strtolower(str_replace("M","",$durationArr[1]));
                                 }
                                 else
                                 {
                                    $mins = strtolower($duration);
                                 }
                                 $sectiontitle = ($it == 1) ? "Departure" : "Return";
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
                                             <p><b><?php echo date('h:i a',strtotime($segment['departure_time'])) ?>  ,</b> <span><?php echo date('D, M d',strtotime($segment['departure_time'])) ?></span><br>
                                             <b><?php echo date('h:i a',strtotime($segment['arrival_time'])) ?>,</b> <?php echo date('D, M d',strtotime($segment['arrival_time'])) ?></p>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="airlines-timelist">
                                       <div class="airlines-timelistportorigin">
                                                   <p><span class="timelist-res"><?php echo date('h:i a',strtotime($segment['departure_time'])) ?></span> 
                                                   <?php echo $segment['departure_iatacode']; ?> 
                                                   <span class="airportname-res"><?php //echo !empty($segment['origin_city']) ? $segment['origin_city']."," : ""; ?> <?php echo $segment['origin_iataname']; ?></span></p>
                                       </div>
                                       <div class="airlines-timelistportdes">
                                          <p><span class="timelist-res"><?php echo date('h:i a',strtotime($segment['arrival_time'])) ?></span><?php echo $segment['arrival_iataCode']; ?>  <span class="airportname-res"><?php echo !empty($segment['destination_city']) ? $segment['destination_city']."," : ""; ?> <?php echo $segment['destination_iataname']; ?></span></p>
                                       </div>
                                       
                                          </div>
                                       </div>
                                    
                                       <div class="col-md-12">
                                          <div class="airlines-baggagelist">
                                             <p>
                                                <!-- <i class="fa fa-suitcase" aria-hidden="true"></i> Non Stop<br> -->
                                                <?php echo !empty($flight['price']['cabin']) ? ucwords(strtolower(str_replace("_"," ",$flight['price']['cabin']))) : ""; ?><br>
                                                <?php
                                                      if(count($flight['travelerPricings']) > 0)
                                                      {
                                                         foreach($flight['travelerPricings'] as $travelerPricing)
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
                                             </p>
                                          </div>
                                       </div>
                                    </div>
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
                                       <div class="col-md-4 col-xs-5"><div class="totaal-time-list">
                                          <i class="fa fa-clock-o"></i> 
                                          <span class="totaal-time-hr  total-time-res">Flight Duration: <?php echo ($totalflighttimehr > 0) ? $totalflighttimehr."h" : ""; ?> <?php echo ($totalflighttimemin > 0) ? $totalflighttimemin."m" : ""; ?></span></div></div>
                                       <div class="col-md-4 col-xs-2">
                                          <div class="totaal-time-list">
                                             <i class="fa fa-clock-o"></i> 
                                             <span class="totaal-time-hr"><?php echo strtolower(str_replace("H","H ",str_replace("PT","",$segment['duration']))); ?></span></div></div>
                                       <div class="col-md-4 col-xs-5"><div class="totaal-time-list"><i class="fa fa-clock-o"></i> <span class="totaal-time-hr  total-time-res">Total Trip Time: <?php echo ($hours > 0) ? $hours."h" : ""; ?> <?php echo ($mins > 0) ? $mins."m" : ""; ?></span> </div></div>
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
                                 $it++;
                              }
                           }
                           ?>
                           
                        </div>
                        <textarea name="offer_details" style="display:none;" id="offer_details_<?php echo $flight['id']; ?>"><?php echo $flight['offerdetails'] ?></textarea>
                 <?php
                             
                        }
                     }
                  }
                 ?>
         </div>
      </section>

      <!-- <div class="TPWL-widget">
            <div class="TPWL-template-search-results" is="search_results">
                        <div class="layout-manager">
                           <div class="TPWL-fade" role="fade"></div>
                              <div class="search_results-wrapper js-results-inner-wrapper">
                              <div class="search_results-wrapper-tickets search_results-wrapper-tickets--right" role="right-column">
                                 <div role="calendar_line_round_trip" is="calendar_line_round_trip"></div>
                                 <div role="calendar" is="calendar" class="hidden"></div>
                                 <div role="calendar_one_way" is="calendar_one_way"></div>
                                 <div id="div-gpt-ad-1603115806013-0" class="google-ad" style="width: 714px; height: 235px; margin-bottom: 20px; display: none;" data-google-query-id="COfI3uGJjPACFcu7jwodLncGRA">
                                   
                                    <div id="google_ads_iframe_/68258039/729x250_Top_JR_0__container__" style="border: 0pt none; width: 714px; height: 235px;"></div>
                                 </div>
                                 <?php
                                //if(count($searchdata) == 0  && !empty($searchprogress))
                                //{
                                    ?>
                                    <div class="ticket-scroll-container error">
                                    <div class="ticket-details">
                                        <div class="api_response_error">Sorry! Something went wrong. Please search your flight and choose a suitable flight offer price.<br> Call toll free number <a href="tel:+18883595205">1-888-359-5205</a> for instant booking and $50.00 discount </div>
                                    </div>
                                    </div>
                                    <?php
                                //}
                                //else
                               // {
                                ?>
                                 <div class="search-results js-search-results" role="search-results">
                                    <div role="ad-top-container" id="ad_top_container"></div>
                                    <div class="tickets-container js-tickets-container">
                                       <div class="" role="tickets_container">
                                       <textarea name="carriers" style="display:none;" id="carriers"><?php //echo $carriers; ?></textarea>
                                       <textarea name="locations" style="display:none;" id="locations"><?php //echo $locations; ?></textarea>
                                       <textarea name="aircraft" style="display:none;" id="aircraft"><?php //echo $aircraft; ?></textarea>
                                       <?php
                                       //   if(count($searchdata) > 0)
                                       //   {
                                       //      foreach($searchdata as $flight)
                                       //      {
                                               
                                          ?>
                                          <div class="ticket    ticket--with-labels   ticket--one_label_baggage" role="ticket-container">
                                             <div class="ticket-scroll-container">
                                                <div class="ticket-action">
                                                   <div class="ticket-action-buy">
                                                      <div class="tariffs">
                                                         <div class="tariffs__item tariffs__item--active " role="otherBaggage">
                                                                                                                   
                                                         </div>                                                         
                                                      </div>
                                                   </div>                                             
                                                   <div class="ticket-action__container">
                                                      <div class="ticket-action-button ticket-action-button--">
                                                         <div class="ticket-action-button-tooltip"><span class="currency_font currency_font--usd"><?php //echo $flight['price']['grandTotal'] ?></span></div>
                                                         <a class="ticket-action-button-deeplink ticket-action-button-deeplink-- book_now" role="main-proposal-link" href="javascript:void(0);" rel="<?php //echo $flight['id']; ?>">
                                                            <span class="ticket-action-button-deeplink-text">
                                                               <span class="ticket-action-button-deeplink-text__not-mobile">Book</span> 
                                                               <span class="ticket-action-button-deeplink-text__not-mobile"> <br></span>
                                                               <strong class="ticket-action-button-deeplink-text__price--not-mobile">
                                                               <span class="currency_font currency_font--usd"><?php //echo $flight['price']['grandTotal'] ?></span></strong>
                                                            </span>
                                                         </a>
                                                      </div>                                                     
                                                   </div>
                                                </div>
                                                <div class="ticket-details" role="ticket-details"> 
                                                <?php
                                                   // if(count($flight['itineraries']))
                                                   // {
                                                   //    foreach($flight['itineraries']  as $itinerarie)
                                                   //    {
                                                   //       $segments = $itinerarie['segments'];
                                                       
                                                   //       $duration = str_replace("PT","",$itinerarie['duration']);
                                                   //       if (strpos($duration, 'H') !== false) {
                                                   //          $durationArr = explode("H",$duration);
                                                   //          $hours = strtolower($durationArr[0]."h");
                                                   //          $mins = strtolower($durationArr[1]);
                                                   //       }
                                                   //       else
                                                   //       {
                                                   //          $mins = strtolower($duration);
                                                   //       }
                                                   //       $stopages = $itinerarie['stopage'];
                                                   ?>                                                 
                                                    <div class="flight flight--depart">
                                                      <div class="flight-header"><span class="flight-header__direction">Depart · </span>
                                                      <span class="flight-header__date"><?php //echo date('d M',strtotime($itinerarie['origin_departure_time'])) ?></span>
                                                      <span class="flight-header__mobile_time">
                                                      <span class="formatted_time"><?php //echo $durationArr[0] ?>h</span> &nbsp;<span class="formatted_time"><?php //echo $durationArr[1] ?></span>
                                                      </span>
                                                      </div>
                                                      <div class="flight-brief">                                                         
                                                         <div class="flight-brief-departure">
                                                            <time class="flight-brief-time"><?php //echo date('h:i a',strtotime($itinerarie['origin_departure_time'])) ?>                                                            
                                                            <span class="flight-brief-time__meridiem"></span></time>
                                                            <div class="flight-brief-date">
                                                            <span class="flight-brief-date__day"><?php //echo date('d',strtotime($itinerarie['origin_departure_time'])) ?></span>
                                                            <?php //echo date('M',strtotime($itinerarie['origin_departure_time'])) ?>                                                            
                                                        </div>
                                                            <div class="flight-brief-city" title="Manchester">
                                                                <span class="flight-brief-city__name"><?php //echo $itinerarie['origin_iatacode']; ?></span>
                                                                <?php
                                                                //if(!empty($itinerarie['origin_city'])) 
                                                                //{
                                                                ?>
                                                                    <span class="flight-brief-city__iata"><?php //echo $itinerarie['origin_city']; ?></span>
                                                                <?php    
                                                               // }
                                                                ?>
                                                                
                                                            </div>
                                                         </div>
                                                         <section class="flight-brief-layovers">
                                                            <header class="flight-brief-layovers__flight_time">
                                                            <span class="formatted_time"><?php //echo $hours; ?></span> &nbsp;<span class="formatted_time"><?php //echo $mins; ?></span>
                                                            </header>
                                                            <main class="flight-brief-layovers__list">
                                                               <div class="flight-brief-layovers__list-wrapper">                                                                                                                                 
                                                               <?php
                                                               // if(count($stopages) > 0)
                                                               // {                                                                 
                                                               //      foreach($stopages as $key => $stopage)
                                                               //      {
                                                               ?>
                                                               <div class="flight-brief-layover">
                                                                     <div class="flight-brief-layover__iata">
                                                                         <span><?php //echo $key ?></span>
                                                                        </div> 
                                                                        <?php
                                                                     // if((array_key_exists("depairport",$stopage) 
                                                                     // && !empty($stopage['depairport'])) || 
                                                                     // (array_key_exists("depairportcity",$stopage) 
                                                                     // && !empty($stopage['depairportcity'])) || 
                                                                     // (array_key_exists("arivalairport",$stopage) 
                                                                     // && !empty($stopage['arivalairport'])) || 
                                                                     // (array_key_exists("arivalcity",$stopage) 
                                                                     // && !empty($stopage['arivalcity']))
                                                                     // )
                                                                     // {
                                                                     ?>
                                                                     <div class="flight-brief-layover-tooltip">
                                                                        <div class="flight-brief-layover-tooltip__airport_name"><?php 
                                                                        // $depairport ="";
                                                                        // if((array_key_exists("depairport",$stopage)                                                                         
                                                                        // && !empty($stopage['depairport'])) && (array_key_exists("depairportcity",$stopage)                                                                         
                                                                        // && !empty($stopage['depairportcity'])))
                                                                        // {
                                                                        //    $depairport .= $stopage['depairport']." - ".$stopage['depairportcity'];
                                                                        //    echo $depairport;
                                                                        // }
                                                                        // if((array_key_exists("arivalairport",$stopage)                                                                         
                                                                        // && !empty($stopage['arivalairport'])) && (array_key_exists("arivalcity",$stopage)                                                                         
                                                                        // && !empty($stopage['arivalcity'])))
                                                                        // {
                                                                        //    $depairport .= $stopage['arivalairport']." - ".$stopage['arivalcity'];
                                                                        //    echo $depairport;
                                                                        // }
                                                                        ?></div>
                                                                     </div>
                                                                     <?php
                                                                     //}
                                                                     ?>                                                                                                                                      
                                                                </div>
                                                                <?php
                                                                    // }
                                                                  //}
                                                                ?>                                                                                                                              
                                                               </div>
                                                            </main>
                                                            
                                                         </section>
                                                         <div class="flight-brief-arrival">
                                                            <div class="flight-brief-date">
                                                               <span class="flight-brief-date__day"><?php //echo date('d',strtotime($itinerarie['destination_departure_time'])) ?></span><?php //echo date('M',strtotime($itinerarie['destination_departure_time'])) ?>                                                            </div>
                                                            <time class="flight-brief-time">
                                                            <?php //echo date('h:i a',strtotime($itinerarie['destination_departure_time'])) ?>                                                
                                                            </time>
                                                            <div class="flight-brief-city" title="<?php //echo $itinerarie['destination_iatacode']; ?>"><span class="flight-brief-city__name"><?php //echo $itinerarie['destination_iatacode']; ?></span>
                                                            <?php
                                                            //if(!empty($itinerarie['destination_city']))
                                                            //{
                                                            ?>
                                                             <span class="flight-brief-city__iata"><?php //echo $itinerarie['destination_city']; ?></span>
                                                            <?php    
                                                           // }
                                                            ?>                                                           
                                                        </div>
                                                         </div>
                                                      </div>                                                     
                                                   </div>                                                  
                                                   <?php
                                                     // }
                                                  // }
                                                   ?>                                                 
                                                   <div class="flight-baggage-terms">
                                                      <sup>*</sup>
                                                      <p class="flight-baggage-terms__info">Baggage allowances may vary according to route, cabin class or fare family – for clarification, please contact the airline</p>
                                                   </div>
                                                   <div class="ticket-details-toggler"></div>
                                                </div>
                                             </div>
                                          </div>
                                          <textarea name="offer_details" style="display:none;" id="offer_details_<?php echo $flight['id']; ?>"><?php echo $flight['offerdetails'] ?></textarea>
                                          <?php
                                            //}
                                         ?>
                                         <?php   
                                         //}
                                         ?>
                                    </div>
                                 </div>
                                <?php
                               // }
                                ?>
                              </div>
                              <!-- <div id="div-gpt-ad-1584004567577-0" class="google-ad" style="width: 160px; height: 600px; margin-top: 20px; margin-left: 20px;" data-google-query-id="CKK93-GJjPACFcu7jwodLncGRA">
                                 <div id="google_ads_iframe_/68258039/160x600-JR_0__container__" style="border: 0pt none;"><iframe id="google_ads_iframe_/68258039/160x600-JR_0" title="3rd party ad content" name="google_ads_iframe_/68258039/160x600-JR_0" width="160" height="600" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" sandbox="allow-forms allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-top-navigation-by-user-activation" allow="conversion-measurement 'src'" srcdoc="" style="border: 0px; vertical-align: bottom;" data-google-container-id="2" data-load-complete="true"></iframe></div>
                                 </div>
                              
                           </div>
                        </div>
                     </div>
                                             </div>
			</div>
		</div> -->

   </div>

        
		<!-- //Main Container -->
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