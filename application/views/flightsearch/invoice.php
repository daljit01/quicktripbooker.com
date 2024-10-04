<?php
if(array_key_exists("itineraries",$fligh_details))
{

	$origincity ="";
	$origincountry="";
	$destinationcity ="";
	$destinationcountry="";
	$departtime ="";
	$departreturnt="";
	$origin="";
	$k=0;
	$isdomestic = 1;
	$departstr= "";
	foreach($fligh_details['itineraries'] as $itin)
	{
		if($k == 0)
		{
			$origincity = $itin['origin_city'];
			$destinationcity = $itin['destination_city'];
		}					
		if($origin == $itin['destination_iatacode'])
		{
			$origin_departure_terminal = (!empty($itin['origin_departure_terminal'])) ? "Terminal ".$itin['origin_departure_terminal'] : "";
			$destination_departure_terminal = (!empty($itin['destination_departure_terminal'])) ? "Terminal ".$itin['destination_departure_terminal'] : "";
			
			$departstr .= " <br> <strong>Return </strong>: ".$itin['origin_iatacode']." ".$itin['origin_iataname']." ".$origin_departure_terminal." - ".$itin['destination_iatacode']." ".$itin['destination_iataname']." ".$destination_departure_terminal;
		}
		else
		{
			$origin_departure_terminal = (!empty($itin['origin_departure_terminal'])) ? "Terminal ".$itin['origin_departure_terminal'] : "";
			$destination_departure_terminal = (!empty($itin['destination_departure_terminal'])) ? "Terminal ".$itin['destination_departure_terminal'] : "";
			$departstr .= "<strong>Departure</strong> : ".$itin['origin_iatacode']." ".$itin['origin_iataname']." ".$origin_departure_terminal." - ".$itin['destination_iatacode']." ".$itin['destination_iataname']." ".$destination_departure_terminal;
		}
		$origin = $itin['origin_iatacode'];
		if($itin['origin_country_Code'] == $itin['destination_country_Code'])
		{
			$isdomestic = 1;
		}
		else
		{
			$isdomestic = 0;
		}
		$k++;
	}
}

?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Booking Confirmation</title>
	</head>
	<body>
		<header>
            <!-- <h1>Invoice</h1> -->
            <address>
				<a href="<?php echo base_url(); ?>"><img alt="" src="<?php echo base_url(); ?>assects/image/logo/Airlinestrip-Logo-194-by-59.png"></a>
				<?php
					if(array_key_exists("itineraries",$fligh_details))
					{
				?>
				<p><?php echo $departstr; ?></p>
				<p>Registration No. <?php echo urldecode($booking_details->data->id); ?></p>
				<?php
					}
				?>
			</address>
			<table class="meta">
				
				<tr>
					<td><span style="float: right;font-size: 13px;
						line-height: 18px;" ><strong><?php echo date("F j Y") ?></strong></span></td>

				</tr>
				<!--<tr>-->
				<!--	<th><span style="font-size: 12px;-->
				<!--		line-height: 18px;text-align: right;" >-->
				<!--		<p>Ecosuite Business Tower Suite# 301</p>-->
				<!--	<p>3rd Floor Plot No-II, D/22, AAII, Newtown, Kolkata</p>-->
				<!--	<p>West Bengal 700136</p></span></th>-->
				<!--</tr>-->
			</table>
		</header>
		<?php
		if(array_key_exists("itineraries",$fligh_details))
		{
		?>
		<article>
			<h1>Recipient</h1>		
			<table class="inventory">
				<h3 style="    font-size: 18px;
				font-weight: 700;
				margin-bottom: 20px;line-height: 25px;">BOOKING REFERENCE 
				<!-- <img src="Flight-01.svg" width="25px"> -->
				</h3>
				<thead>
					<tr>
						<th><span  >Reservation Number</span></th>
						<th><span  >Address</span></th>
					</tr>
				</thead>
				<tbody>					
					<tr>
						<td>
						<?php
							if(count($booking_details->data->associatedRecords) > 0)
							{
								foreach($booking_details->data->associatedRecords as $associatedRecord)
								{
							?>
							<span  style="border: 1px solid #003c83;
							display: inline-block;
							padding: 8px 12px;
							color: #003c83;
							font-size: 20px;
							font-weight: 600;"><?php echo urldecode($associatedRecord->reference); ?></span>							
							<br><br>
							<span style="font-size: 16px;
							color: #000;
							font-weight: 600;
							line-height: 20px;">Date: </span><span style="display: inline-block; font-size: 14px;line-height: 20px;margin-left: 30px;"><?php echo date("D d Y",strtotime($associatedRecord->creationDate)) ?></span>
						<?php
								}
							}
						?>
						</td>
						<td>
						<?php
							if(count($booking_details->data->contacts) > 0)
							{
								foreach($booking_details->data->contacts as $contacts)
								{
							?>
							<span  style="line-height: 20px;"><span style="	font-weight:bold;">Name: </span><span style="display: inline-block;"><?php echo $contacts->addresseeName->firstName; ?></span><br><?php echo (count($contacts->address->lines)) ? implode(",",$contacts->address->lines) : ""; ?><br>							
							<?php echo $contacts->address->cityName; ?> <?php echo $contacts->address->postalCode; ?> <?php echo $contacts->address->countryCode; ?>
							<?php echo !empty($contacts->phones[0]->number) ? "<br><strong>".ucwords(strtolower($contacts->phones[0]->deviceType))."</strong> :".$contacts->phones[0]->countryCallingCode.$contacts->phones[0]->number : ""; ?>
							<?php echo !empty($contacts->emailAddress) ? "<br><strong>Email:</strong> :".$contacts->emailAddress : ""; ?>
							</span>
							<?php
								}
							}
						?>
						</td>						
					</tr>					
				</tbody>
			</table>

			<table class="itinary">
				<h3 style="    font-size: 18px;
				font-weight: 700;
				margin-bottom: 20px;line-height: 25px;">YOUR ITINERARY 
				<!-- <img src="Flight-01.svg" width="25px"> -->
			</h3>
				<thead>
					<tr>
						<th>Departure Date</th>
						<th>Arival Date</th>
						<th>Flight Details</th>
						<th>Duration</th>
						<th>Deperting</th>
						<th>Arriving</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(count($fligh_details['itineraries']) > 0)
					{
						foreach($fligh_details['itineraries'] as $itritem)
						{
							$aircraft ="";
							if(!empty($itritem['aircraft_name']))
							{
								$aircraft .= $itritem['aircraft_name']."(".$itritem['aircraft_code'].")";
							}
							else
							{
								$aircraft .= $itritem['aircraft_code'];
							}
							$aircraft .="<br>";
							$duration = str_replace("M","",str_replace("PT","",$itritem['duration']));
							$durationArr = explode("H",$duration);
							$hours = strtolower($durationArr[0]);
							$mins = strtolower($durationArr[1]);	
					?>
					<tr>
						<td><span style="line-height: 18px;"><?php echo date("D d M Y",strtotime($itritem['origin_departure_time'])); ?> - <?php echo date("H:i a",strtotime($itritem['origin_departure_time'])); ?></span></td>
						<td><span style="line-height: 18px;"><?php echo date("D d M Y",strtotime($itritem['destination_departure_time'])); ?> - <?php echo date("H:i a",strtotime($itritem['destination_departure_time'])); ?></span></td>
						<td>
						<span style="line-height: 18px;"><?php echo $aircraft; ?><strong>Number</strong> : <?php echo $itritem['aircraft_number']; ?></span></td>
						<td><span style="line-height: 18px;"><?php echo $hours." hr ".$mins." mins"; ?></td>						
						<td><span style="font-size: 18px;color: #000;font-weight: 700;line-height: 18px;"><?php echo $itritem['origin_city']; ?></span><br><span style="line-height: 16px;"><?php echo $itritem['origin_iatacode'] ?> - <?php echo $itritem['origin_iataname'] ?> <?php echo $itritem['origin_country'] ?></span></td>
						<td><span  style="font-size: 18px;color: #000;font-weight: 700;line-height: 18px;"><?php echo $itritem['destination_city']; ?></span><br><span style="line-height: 16px;"><?php echo $itritem['destination_iatacode'] ?> - <?php echo $itritem['destination_iataname'] ?> <?php echo $itritem['destination_country'] ?></span></td>
					</tr>
					<?php
						}
					}
					?>
				</tbody>
			</table>
			<!-- <br><br>
			<p style="color: #002a4d;font-weight: 700;font-size: 13px;font-style: italic;">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> -->
		<br><br>

		<table class="inventory1">
			<h3 style="    font-size: 18px;
			font-weight: 700;
			margin-bottom: 20px;line-height: 25px;">PASSANGER DETAILS 
			<!-- <img src="Flight-01.svg" width="25px"> -->
		</h3>
			<thead>
				<tr>
					<th><span  >Name</span></th>
					<th><span  >Gender</span></th>
					<th><span  >Dob</span></th>
					<th><span  >Nationality</span></th>
					<th><span  >Passport No</span></th>
					<th><span  >Passport Exp</span></th>
				</tr>
			</thead>
			<tbody>
			<?php
					if(count($booking_details->data->travelers) > 0)
					{
						foreach($booking_details->data->travelers as $traveler)
						{
					?>
				<tr>
					<td><?php echo $traveler->name->firstName." ".$traveler->name->lastName ?></td>
					<td><?php echo $traveler->gender; ?></td>
					<td><?php echo date("d/m/Y",strtotime($traveler->dateOfBirth)); ?></td>
				    <td><?php echo (property_exists($traveler,"documents")) ? $traveler->documents[0]->nationality : "--" ?></td>
					<td><?php echo (property_exists($traveler,"documents")) ? $traveler->documents[0]->number : "--"; ?></td>
					<td><?php echo (property_exists($traveler,"documents")) ? date("d/m/Y",strtotime($traveler->documents[0]->expiryDate)) : "--"; ?></td>
				</tr>
				<?php
						}
					}
				?>
			</tbody>
		</table>
		<br><br>
			<table class="balance">
				<tr><th><span style=" font-size: 18px;color: #002a4d;font-weight: 700;
					margin-bottom: 15px;">Base Fare</span></th><tr>
				<?php
					$totaltaxandfee = 0 ;
					if(count($fligh_details['travelerPricings']) > 0)
					{
						foreach($fligh_details['travelerPricings'] as $kye => $traveller)
						{
							$totaltaxandfee = $totaltaxandfee + $traveller['totaltaxes'];
							$travellrtype = ucwords(strtolower(str_replace("HELD_","",$kye)));
					?>
				<tr>
					<th><span><?php echo (($traveller['passengercount']) > 1) ? $travellrtype."(s)" : $travellrtype; ?>  (<?php echo $traveller['passengercount'] ?> X <?php echo $fligh_details['price']['currency_symbol']." ".number_format($traveller['eachbase'],2) ?>)</span></th>
					<td><span data-prefix><?php echo $fligh_details['price']['currency_symbol']; ?></span><span><?php echo number_format($traveller['totalbase'],2) ?></span></td>
				</tr>
				<?php
					}
				}
				?>				
				<tr>
					<th><span  style=" font-size: 16px;color: #000;" ><strong>Free Surcharges</strong></span></th>
					<td><span  style=" font-size: 16px;color: #000;" ><?php echo $fligh_details['price']['currency_symbol']; ?></span><span  style=" font-size: 16px;color: #000;"  ><?php echo number_format($totaltaxandfee,2); ?></span></td>
				</tr>
				<tr>
					<th><span style=" font-size: 16px;color: #000;" ><strong>Charity</strong></span></th>
					<td><span  style=" font-size: 16px;color: #000;" ><?php echo $fligh_details['price']['currency_symbol']; ?></span><span  style=" font-size: 16px;color: #000;" ><?php echo number_format($charity_amt,2); ?></span></td>
				</tr>
				<tr>
					<th style="border-top: 1px solid #ddd;"><span style=" font-size: 18px;color: #000;" ><strong>Total Amount:</strong></span></th>
					<td style="border-top: 1px solid #ddd;"> <span  style=" font-size: 18px;color: #000;"><?php echo $fligh_details['price']['currency_symbol']; ?></span><span  style=" font-size: 18px;color: #000;"><?php echo number_format((floatval(str_replace(',', '', $fligh_details['price']['total']))+$charity_amt),2); ?></span></td>
				</tr>
			</table>
		</article>
		<?php
		}
		else
		{
			if(count((array)$booking_details) > 0)
			{
				if(count($booking_details->errors) > 0)
				{
					foreach($booking_details->errors as $errors)
					{
					?>
					<h3 style="font-size: 18px;font-weight: 700;
					line-height: 25px;text-align: center;">
						<?php echo $errors->detail;  ?>
					</h3>
					<div style="text-align:center;margin-top:10%;color:#52add2;font-weight:bold;"><a href="<?php echo base_url('/'); ?>">Back To Home</a></div>				
					<?php
					}
				}
			}
			else
			{
			?>
				<h3 style="font-size: 18px;font-weight: 700;
					line-height: 25px;text-align: center;">
						Request parameter already expired
				</h3>
					<div style="text-align:center;margin-top:10%;color:#52add2;font-weight:bold;"><a href="<?php echo base_url('/'); ?>">Back To Home</a></div>		
			<?php	
			}
		}
		?>
		<aside>
			<h1></h1>
			<div class="bottomtext"  >
				<!--<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>-->
				<img alt="" src="App-Store-Google-Play-Icons.png" class="italogo">
			</div>
		</aside>
	</body>
</html>
<style>

*
{
	border: 0;
	box-sizing: content-box;
	color: inherit;
	font-family: inherit;
	font-size: inherit;
	font-style: inherit;
	font-weight: inherit;
	line-height: inherit;
	list-style: none;
	margin: 0;
	padding: 0;
	text-decoration: none;
	vertical-align: top;
}


*[ ] { border-radius: 0.25em; min-width: 1em; outline: 0; }

*[ ] { cursor: pointer; }

*[ ]:hover, *[ ]:focus, td:hover *[ ], td:focus *[ ], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }

/* span[ ] { display: inline-block; } */
.bottomtext{text-align: center;}
h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

table { font-size: 75%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
th, td { border-radius: 0.25em; border-style: solid; }
th { background: none; border-color: #BBB; }
td { border-color: #DDD; }


html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
html { background: #999; cursor: default; }

body { box-sizing: border-box; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

header { margin: 0 0 3em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background:#541f12; color: #fff; margin: 0 0 1em; padding: 0.5em 0; }
header address { float: none; font-size: 75%; font-style: normal; line-height: 1.25; width: 50%;
    display: inline-block;
}
	/* margin: 17px 1em 1em 0; */
 }
header address p { margin: 0 0 0.25em; }
table.balance {
    background: #f0f6fc;
}
header span { 
	/* margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; */
	 position: relative; font-size: 16px; }
header img { max-height: 100%; max-width: 100%;margin-bottom: 10px;}
header input { cursor: pointer; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }


article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

article address { float: left; font-size: 125%; font-weight: bold; }

table.meta, table.balance { float: right; width: 45%;    border-collapse: collapse; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }


table.meta th { width: 40%; border: inherit; }
table.meta td { width: 60%; border: inherit; }

table.inventory{ clear: both; width: 100%;    border-collapse: collapse; }
table.inventory1{ clear: both; width: 100%;    border-collapse: collapse; }
table.itinary { clear: both; width: 100%;}
table.inventory th { 
	font-weight: bold;
    border: inherit;
    background: #1b6099;
    border-radius: inherit;
    color: #fff;
    font-size: 14px;}
	table.itinary th{
		font-weight: bold;
    border: inherit;
    background: #1b6099;
    border-radius: inherit;
    color: #fff;
    font-size: 14px;
	}
table.inventory1 th { 
	font-weight: bold;
    border: inherit;
    background: #1b6099;
    border-radius: inherit;
    color: #fff;
    font-size: 14px;}
	/* table.inventory th{
		font-weight: bold;
    border: inherit;
    background: #002a4d;
    border-radius: inherit;
    color: #fff;
    font-size: 14px;
	} */
	table.itinary td{ width: 26%;background: #f0f6fc;
    border: inherit; border-radius: inherit;}
	table.inventory1 td{ width: 26%;background: #f0f6fc;
    border: inherit; border-radius: inherit;}
table.inventory td:nth-child(1) { width: 26%;background: #f0f6fc;
    border: inherit; }
table.inventory td:nth-child(2) { width: 38%;background: #f0f6fc;
    border: inherit; }
table.inventory td:nth-child(3) { text-align: center; width: 12%; }
table.inventory td:nth-child(4) { text-align: center; width: 12%; }
table.inventory td:nth-child(5) { text-align: center; width: 12%; }
.bottomtext p{text-align: center;}

table.balance th, table.balance td { width: 50%; border: inherit;}
table.balance td { text-align: right; }

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
aside h1 {border-color: #045083;border-bottom-style: solid;padding: 10px 0; }

strong {
    font-weight: 700;
}
.add, .cut
{
	border-width: 1px;
	display: block;
	font-size: .8rem;
	padding: 0.25em 0.5em;	
	float: left;
	text-align: center;
	width: 0.6em;
}
img.italogo {
	margin-top: 20px;
}
.add, .cut
{
	background: #9AF;
	box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
	background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
	border-radius: 0.5em;
	border-color: #0076A3;
	color: #FFF;
	cursor: pointer;
	font-weight: bold;
	text-shadow: 0 -1px 2px rgba(0,0,0,0.333);
}

.add { margin: -2.5em 0 0; }

.add:hover { background: #00ADEE; }

.cut { opacity: 0; position: absolute; top: 0; left: -1.5em; }
.cut { -webkit-transition: opacity 100ms ease-in; }

tr:hover .cut { opacity: 1; }

@media print {
	* { -webkit-print-color-adjust: exact; }
	html { background: none; padding: 0; }
	body { box-shadow: none; margin: 0; }
	span:empty { display: none; }
	.add, .cut { display: none; }
}

@page { margin: 0; }
</style>