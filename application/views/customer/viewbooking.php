 
         <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom custompadd">
        <h1 class="h5">Booking Details</h1>
      </div>
<?php
//die;
$review_flight = $details->travellerinfo->flightdetails;
$emailcontent ='';
$emailcontent .='<div class="table-responsive bookindetails">
<table class="table table-striped table-sm">
  <tbody>
   <tr>
      <td><b>Booking Id :</b>&nbsp;'.$details->PlainId.'</td>
      <td class="text-right"><h6>'.date("F j Y").'</h6></td>     
    </tr> ';
    $emailcontent .='<tr>
            <td colspan="2">
            <hr>
            <h5>Itinerary</h5>
            <hr>
            </td>
    </tr>';
    if(count($review_flight->itineraries) > 0)
    {
        $origin="";
        $destination="";
        foreach($review_flight->itineraries as $itinerary)
        {
            $duration = str_replace("M","",str_replace("PT","",$itinerary->duration));
            $durationArr = explode("H",$duration);
            $hours = strtolower($durationArr[0]);
            $mins = strtolower($durationArr[1]);							
            $destination = $itinerary->destination_iatacode;
            $depart = ($origin == $itinerary->destination_iatacode) ? "RETURN" : "DEPART";
            $origin = $itinerary->origin_iatacode;

    $emailcontent .=' <tr>
    <td colspan="2">
        <table class="table table-striped table-sm itinerary-box">
        <tbody>
            <tr>
                <td><b>'. $depart.'</b></span><br>'.date("D d M",strtotime(str_replace("T"," ",$itinerary->origin_departure_time))).'</td>
                <td><span><b>'.$itinerary->origin_iatacode." - ".$itinerary->destination_iatacode.'</b></span><br>'.$hours." hr ".$mins." mins".' | '.strtolower($review_flight->price->cabin).'</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>';
            if(count($itinerary->segments) > 0)
            {
                foreach($itinerary->segments as $segment)
                {
                    $duration = str_replace("M","",str_replace("PT","",$segment->duration));
                    $durationArr = explode("H",$duration);
                    $hours = strtolower($durationArr[0]);
                    $mins = (array_key_exists(1,$durationArr)) ? strtolower($durationArr[1]) : 0;
                    $emailcontent .='<tr>
                    <td colspan="2">
                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                            <tr>
                                <td><span><b>'.$segment->carrierName.'</b></span><br>'.$segment->carrierCode.'-'.$segment->aircraft_number.'<br>'.$segment->aircraft_name.'</td>
                                <td><span><b>'.date("H:i a",strtotime(str_replace("T"," ",$segment->departure_time))).'</b></span><br>'.date("D d M y",strtotime(str_replace("T"," ",$segment->departure_time))).'<br>'.$segment->origin_city.' '.$segment->origin_country.'<br>'.$segment->origin_iataname.'<br>'.(!empty($segment->origin_departure_terminal) ? "Terminal ".$segment->origin_departure_terminal : "").'</td>
                                <td>'.$hours." hr ".$mins." mins".'</td>
                                <td><span>'.date("H:i a",strtotime(str_replace("T"," ",$segment->arrival_time))).'</span><br>'.date("D d M y",strtotime(str_replace("T"," ",$segment->arrival_time))).'<br>'.$segment->destination_city.' '.$segment->destination_country.'<br>'.$segment->destination_iataname.'<br>'.(!empty($segment->destination_departure_terminal) ? "Terminal ".$segment->destination_departure_terminal : "").'</td>
                                <td>Fare Type<br>'.strtolower($review_flight->price->cabin).'</td>
                            </tr>
                        </tbody>
                        </table>
                    </td>
                    </tr>';
                }
            }                        
            $emailcontent .='</tbody>
        </table>
    </td>
    </tr>';
        }
    }
    $emailcontent .='<tr>
    <td colspan="2">';
    $p=0;
        $passenger_type = "";
        foreach($details->passengerinfo as $pasenger)
        {
            if($passenger_type != $pasenger->Type)
            {

            $emailcontent .='<h3>'.$pasenger->Type.'</h3>
            <table class="table table-striped table-sm passenger-box">
            <tr>
                <th class="passenger-heading">Name</th>
                <th class="passenger-heading">Gender</th>
                <th class="passenger-heading">Date of birth</th>
                <th class="passenger-heading">Birth Place</th>
                <th class="passenger-heading">Nationality</th>
                <th class="passenger-heading">Passport</th>
                <th class="passenger-heading">Issue Place</th>
                <th class="passenger-heading">Issue Date</th>
                <th class="passenger-heading">Expiry</th>
                <th class="passenger-heading">Issuing Country</th>
            </tr>';
            }
            $emailcontent .=' <tr>
                <td class="passenger-heading">'.$pasenger->Title.' '.$pasenger->Name.'</td>
                <td class="passenger-heading">'.$pasenger->Gender.'</td>
                <td class="passenger-heading">'.$pasenger->Dob.'</td>
                <td class="passenger-heading">'.(!empty($pasenger->Dop) ? $pasenger->Dop : "&nbsp;").'</td>
                <td class="passenger-heading">'.(!empty($pasenger->Nationality) ? $pasenger->Nationality : "&nbsp;").'</td>
                <td class="passenger-heading">'.(!empty($pasenger->Passportno) ? $pasenger->Passportno : "&nbsp;").'</td>
                <td class="passenger-heading">'.(!empty($pasenger->Passportexp) ? $pasenger->Passportexp : "&nbsp;").'</td>
                <td class="passenger-heading">'.(!empty($pasenger->Passportcountry) ? $pasenger->Passportcountry : "&nbsp;").'</td>
                <td class="passenger-heading">'.(!empty($pasenger->Passportissuedate) ? $pasenger->Passportissuedate : "&nbsp;").'</td>
                <td class="passenger-heading">'.(!empty($pasenger->Passportissueplace) ? $pasenger->Passportissueplace : "&nbsp;").'</td>
            </tr>';
            if($p == 0)
            {
                $emailcontent .='</table>';
            }
            $p++;
            $passenger_type = $pasenger->Type;
        }
    $emailcontent .='</td>
    </tr>';    
    $emailcontent .='</td>
    </tr>
    <tr>
     <td colspan="2">
        
        <table class="table table-striped table-sm">
        <tr>
            <td>
                <h3>Billing Information</h3>
                <table class="table table-striped table-sm traveller-box">
                <tr>
                    <td><b>Name</b></td>
                    <td>'.$details->travellerinfo->Name.'</td>
                </tr>
                <tr>
                    <td><b>Mobile No</b></td>
                    <td>'.$details->travellerinfo->Phone.'</td>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td>'.$details->travellerinfo->Email.'</td>
                </tr>
                <tr>
                    <td><b>Addrress</b></td>
                    <td>'.$details->travellerinfo->address.'</td>
                </tr>
                <tr>
                    <td><b>City</b></td>
                    <td>'.$details->travellerinfo->city.'</td>
                </tr>
                <tr>
                    <td><b>State</b></td>
                    <td>'.$details->travellerinfo->state.'</td>
                </tr>
                <tr>
                    <td><b>Country</b></td>
                    <td>'.$details->travellerinfo->country.'</td>
                </tr>
                <tr>
                    <td><b>Zipcode</b></td>
                    <td>'.$details->travellerinfo->Zipcode.'</td>
                </tr>
                </table>
            </td>
            <td>
                <h3>Payment Information</h3>
                <table class="table table-striped table-sm traveller-box">';
                $totaltaxandfee = 0 ;
                if(count((array)$review_flight->travelerPricings) > 0)
                {
                    foreach($review_flight->travelerPricings as $kye => $traveller)
                    {
                        $totaltaxandfee = $totaltaxandfee + $traveller->totaltaxes;
                        $travellrtype = ucwords(strtolower(str_replace("HELD_","",$kye)));
                        $pastype = (($traveller->passengercount) > 1) ? $travellrtype."(s)" : $travellrtype;
                        $emailcontent .='<tr>
                            <td><b>'.$pastype.'('.$traveller->passengercount.' X '.$review_flight->price->currency_symbol." ".number_format($traveller->eachbase,2).')'.'</b></td>
                            <td>'.$review_flight->price->currency_symbol.number_format($traveller->totalbase,2).'</td>
                        </tr>';
                    }
                }
                $emailcontent .='<tr>
                    <td><b>Fee & Surcharges:</b></b></td>
                    <td>'.$review_flight->price->currency_symbol.number_format($totaltaxandfee,2).'</td>
                </tr>
                <tr>
                    <td><b>Total Amount:</b></td>
                    <td>'.$review_flight->price->currency_symbol.number_format((floatval(str_replace(',', '', $review_flight->price->total))),2).'</td>
                </tr>
                <tr>
                    <td><b>Credit / Debit Card Number:</b></td>
                    <td>'.preg_replace('~[+\d-](?=[\d-]{4})~', '*', $details->travellerinfo->CardNumber).'</td>
                </tr>
                <tr>
                    <td><b>Card Holders Name:</b></td>
                    <td>'.$details->travellerinfo->NameOnCard.'</td>
                </tr>
                <tr>
                    <td><b>Expiration Date:</b></td>
                    <td>'.preg_replace('~[+\d]~', '*', $details->travellerinfo->ExpMonth)."/".preg_replace('~[+\d]~', '*', $details->travellerinfo->ExpYear).'</td>
                </tr>
                <tr>
                    <td><b>Card Verification Number:</b></td>
                    <td>'.preg_replace('~[+\d]~', '*', $details->travellerinfo->CVV).'</td>
                </tr>
                <tr>
                    <td>&nbsp</td>
                    <td>&nbsp</td>
                </tr>
                </table>
            </td>
        </tr>
        </table>
     </td>
    </tr>';
$emailcontent .='</tbody>
</table>
</div>';
echo $emailcontent;
?>

</main>