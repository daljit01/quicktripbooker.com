<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('auth');
		$this->load->model('FlightModel', 'flightmodel');
		$this->load->model('HotelModel', 'hotelmodel');
		$this->load->library('session');
		$this->load->helper('url');		
	}
    public function index()
	{
		$page = $this->uri->segment(1);
		$data['page'] = $page;
		$date = date("Y-m-d");
		$date = strtotime($date);
		$date = strtotime("+7 day", $date);
		$departureDate = date("m/d/Y",$date);
		$data['date_from'] = $departureDate;
        $searchprogress ="";
		//$this->session->sess_destroy();
		if(!empty($this->input->post('searchflag')))
		{
			$searchprogress = $this->input->post('searchflag');
		}	
        $data['searchflag'] = $searchprogress;	
		$data['destinationId'] = "";
		$data['hotel_city'] = "";
		$data['date_to'] = "";
		$this->default_template->load('defaultTemplate', 'contents' , 'hotel/hotel',$data);
	}
	public function search_package_lookup()
	{
		$page = $this->uri->segment(1);
		$data['page'] = $page;
		$data['userheader'] ="login-hd";
        $searchprogress ="";
		$flightfare = 0;
		if(!empty($this->input->post('searchflag')))
		{
			$searchprogress = $this->input->post('searchflag');
		}	
		//echo $searchprogress."=====<br>";
        $data['searchprogress'] = $searchprogress;
		$originLocationCode ="";
		if(!empty($this->input->post('origincode')))
		{
			$originLocationCode = $this->input->post('origincode');
		}
		else
		{
			if(!empty($this->session->userdata('origin')))
			{
				$originLocationCode = $this->session->userdata('origin');
			}
		}
		$destinationLocationCode ="";
		if(!empty($this->input->post('destinationcode')))
		{
			$destinationLocationCode = $this->input->post('destinationcode');
		}
		else
		{
			if(!empty($this->session->userdata('destinationcode')))
			{
				$destinationLocationCode = $this->session->userdata('destinationcode');
			}
		}
		$origincity ="";
		if(!empty($this->input->post('origin_iata_code_city')))
		{
			$origincity = $this->input->post('origin_iata_code_city');
		}
		else
		{
			if(!empty($this->session->userdata('origincity')))
			{
				$origincity = $this->session->userdata('origincity');
			}
		}
		$depcity ="";
		if(!empty($this->input->post('destination_iata_code_city')))
		{
			$depcity = $this->input->post('destination_iata_code_city');
		}
		else
		{
			if(!empty($this->session->userdata('depcity')))
			{
				$depcity = $this->session->userdata('depcity');
			}
		}
		$departuredate ="";
		if(!empty($this->input->post('date_from')))
		{
			$departuredate = $this->input->post('date_from');
		}
		else
		{
			if(!empty($this->session->userdata('departureDate')))
			{
				$departuredate = $this->session->userdata('departureDate');
			}
		}
		$departuredate = date("Y-m-d",strtotime($departuredate));
		$returndate ="";
		if(!empty($this->input->post('date_to')))
		{
			$returndate = $this->input->post('date_to');
			//echo $returndate."!!!!!!";
		}
		// else
		// {
		// 	if(!empty($this->session->userdata('returndate')))
		// 	{
		// 		$returndate = $this->session->userdata('returndate');
		// 		echo $returndate."============";
		// 	}
		// }
		
		$returndate =!empty($returndate) ? date("Y-m-d",strtotime($returndate)) : "";
		$travel_type ="";
		if(!empty($this->input->post('travel_type')))
		{
			$travel_type = $this->input->post('travel_type');
		}
		
		$adults ="1";
		
		if(!empty($this->input->post('no_of_adults')))
		{
			$adults = $this->input->post('no_of_adults');
		}
		else
		{
			if(!empty($this->session->userdata('adults')))
			{
				$adults = $this->session->userdata('adults');
			}
		}
		$child ="0";		
		if($this->input->post('no_of_child') != null)
		{
			$child = $this->input->post('no_of_child');
		}
		else
		{
			if(!empty($this->session->userdata('child')))
			{
				$child = $this->session->userdata('child');
			}
		}
		$infants ="0";
		if(!empty($this->input->post('no_of_infant')))
		{
			$infants = $this->input->post('no_of_infant');
		}
		// else
		// {
		// 	if(!empty($this->session->userdata('infants')))
		// 	{
		// 		$infants = $this->session->userdata('infants');
		// 	}
		// }
		//echo $infants;
		$totaltraveller = 1;
		if(!empty($this->input->post('traveller')))
		{
			$totaltraveller = $this->input->post('traveller');
		}
		else
		{
			if(!empty($this->session->userdata('traveller')))
			{
				$totaltraveller = $this->session->userdata('traveller');
			}
		}
		
		$class ="ECONOMY";
		if(!empty($this->input->post('fare_class')))
		{
			$class = $this->input->post('fare_class');
		}
		else
		{
			if(!empty($this->session->userdata('class')))
			{
				$class = $this->session->userdata('class');
			}
		}	
		$destinationId ="";
		if(!empty($this->input->post('destinationId')))
		{
			$destinationId = $this->input->post('destinationId');
		}	
        $data['destinationId'] = $destinationId;
		$hotel_city ="";
		if(!empty($this->input->post('hotel_city')))
		{
			$hotel_city = $this->input->post('hotel_city');
		}	
        $data['hotel_city'] = $hotel_city;	

		$date_from ="";
		if(!empty($this->input->post('date_from')))
		{
			$date_from = $this->input->post('date_from');
		}
		else
		{
			$date = date("Y-m-d");
			$date = strtotime($date);
			$date = strtotime("+7 day", $date);
			$date_from = date("m/d/Y",$date);
		}	
        $data['date_from'] = date("m/d/Y",strtotime($date_from));

		$date_to ="";
		if(!empty($this->input->post('date_to')))
		{
			$date_to = $this->input->post('date_to');
		}	
		else
		{
			$date = date("Y-m-d");
			$date = strtotime($date);
			$date = strtotime("+7 day", $date);
			$date = strtotime("+7 day", $date);
			$date_to = date("m/d/Y",$date);
		}	
        $data['date_to'] = date("m/d/Y",strtotime($date_to));

		$no_of_adults ="";
		if(!empty($this->input->post('no_of_adults')))
		{
			$no_of_adults = $this->input->post('no_of_adults');
		}	
        $data['no_of_adults'] = $no_of_adults;

		$starrating =array();
		$starratingstr = "";
		if(!empty($this->input->post('starrating')))
		{
			$starrating = $this->input->post('starrating');
			if(count($starrating) > 0)
			{
				$starratingstr = implode(",",$starrating);
			}
		}	
        $data['selectedstarrating'] = $starrating;
		$guestRatingMin = 0;
		if(!empty($this->input->post('guestRatingMin')))
		{
			$guestRatingMin = $this->input->post('guestRatingMin');			
		}	
        $data['guestRatingMin'] = $guestRatingMin;

		$landmarkIds =array();
		$landmarkIdsstr = "";
		if(!empty($this->input->post('landmarkIds')))
		{
			$landmarkIds = $this->input->post('landmarkIds');
			if(count($landmarkIds) > 0)
			{
				$landmarkIdsstr = implode(",",$landmarkIds);
			}
		}	
        $data['selectedandmarkIds'] = $landmarkIds;
		$amenityIds =array();
		$amenityIdsstr = "";
		if(!empty($this->input->post('amenityIds')))
		{
			$amenityIds = $this->input->post('amenityIds');
			if(count($amenityIds) > 0)
			{
				$amenityIdsstr = implode(",",$amenityIds);
			}
		}	
        $data['selectedamenityIds'] = $amenityIds;
		$accommodationIds =array();
		$accommodationIdsstr = "";
		if(!empty($this->input->post('accommodationIds')))
		{
			$accommodationIds = $this->input->post('accommodationIds');
			if(count($accommodationIds) > 0)
			{
				$accommodationIdsstr = implode(",",$accommodationIds);
			}
		}	
        $data['selectedaccommodationIds'] = $accommodationIds;
		$themeIds =array();
		$themeIdsstr = "";
		if(!empty($this->input->post('themeIds')))
		{
			$themeIds = $this->input->post('themeIds');
			if(count($themeIds) > 0)
			{
				$themeIdsstr = implode(",",$themeIds);
			}
		}	
        $data['selectedthemeIds'] = $themeIds;
		if(!empty($searchprogress))
		{
			$this->session->set_userdata("hotel_city",$hotel_city);
			$this->session->set_userdata("destinationId",$destinationId);	
			$this->session->set_userdata("date_to",$date_to);	
			$this->session->set_userdata("date_from",$date_from);	
			$this->session->set_userdata("adults1",$no_of_adults);	
			$searchdata = array(
				'destinationId' => $destinationId,
				'checkIn' => date("Y-m-d",strtotime($date_from)),
				'checkOut' => date("Y-m-d",strtotime($date_to)),
				'adults1' => $no_of_adults,
				'starRating' => $starratingstr,
				'guestRatingMin' => $guestRatingMin,
				'landmarkIds' => $landmarkIdsstr,
				'amenityIds' => $amenityIdsstr,
				'accommodationIds' => $accommodationIdsstr,
				'themeIds' => $themeIdsstr
				);
				//echo '<pre>';
				//print_r($searchdata);
				//echo '</pre>';
			$results = $this->hotelmodel->getHotelOffers($searchdata);
			$travelreturndate = empty($returndate) ? null : $returndate;
			$isnonstop = !empty($nonStop) ? $nonStop : "";
			$includeairlines = !empty($includedAirlineCodes) ? $includedAirlineCodes : "";
			$maxPrice = !empty($maximumPrice) ? (int)$maximumPrice : 0;
			$searchdata = array(
				'originLocationCode' => $originLocationCode,
				'destinationLocationCode' => $destinationLocationCode,
				'departureDate' => $departuredate,
				'returnDate' => $travelreturndate,
				'adults' => $adults,
				'children' => $child,
				'infants' => $infants,
				'travelClass' => $class,
				'isnonstop' => $isnonstop,
				'includeairlines' => $includeairlines,
				'maxPrice' => $maxPrice,
				'maxItem' => 1
				);
				// echo '<pre>';
				// print_r($searchdata);
				// echo '</pre>';
				// echo '<pre>';
				// print_r($_REQUEST);
				// echo '</pre>';
				// die;
			$flightresults = $this->flightmodel->getFlightOffers($searchdata);
			
			if(property_exists((object)$flightresults,"flightdetails"))
			{
				if(count($flightresults['flightdetails']) > 0)
				{
					$item = $flightresults['flightdetails'][0];
					if(property_exists((object)$item,"price"))
					{
						if(property_exists((object)$item['price'],"grandTotal"))
						{
							$flightfare = $item['price']['grandTotal'];
						}
					}

				}
			}
				// echo '<pre>';
				// print_r($flightresults);
				// echo '</pre>';
				//echo $flightfare;
				//exit;
		}
		else
		{
			$results=array();
		}
		$data['destinationId'] = $destinationId;
		$data['flightfare'] = $flightfare;
		$data['flightfare'] = $flightfare;
		$data['originLocationCode'] = $originLocationCode;
		$data['origincity'] = $origincity;
		$data['destinationLocationCode'] = $destinationLocationCode;	
		$data['depcity'] = $depcity;	
		$data['departureDate'] = date("m/d/Y",strtotime($departuredate));
		$data['returnDate'] = !empty($travelreturndate)  ? date("m/d/Y",strtotime($travelreturndate)) : "";
		$data['hoteldata'] = $results;
		$data['totaltraveller'] = $totaltraveller;
		$data['adults'] = $adults;
		$data['child'] = $child;
		$data['infants'] = $infants;
		$data['travelClass'] = $class;
		$data['travel_type'] = $travel_type;
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// die;
		$this->default_template->load('defaultTemplate', 'contents' , 'package/packages',$data);
	}
	public function hotel_details($hotelid=0)
	{
		$page = $this->uri->segment(1);
		$data['page'] = $page;
		$data['userheader'] ="login-hd";
		$hotel_city = $this->session->userdata('hotel_city');
		$data['hotel_city'] = $hotel_city;
		$destinationId = $this->session->userdata('destinationId');
		$data['destinationId'] = $destinationId;
		$date_from = $this->session->userdata('date_from');
		$data['date_from'] = $date_from;
		$date_to = $this->session->userdata('date_to');
		$data['date_to'] = $date_to;
		$adults1 = $this->session->userdata('adults1');
		$data['adults1'] = $adults1;

		$searchdata = array(
			'id' => $hotelid
			);
			// echo '<pre>';
			// print_r($searchdata);
			// echo '</pre>';
		$results = $this->hotelmodel->getHotelDetails($searchdata);
		$data['hotel'] = $results;
		// echo '<pre>';
		// print_r($results);
		// echo '</pre>';

		$this->default_template->load('defaultTemplate', 'contents' , 'hotel/hotel-details',$data);
	}
	public function hotelcitysuggestion()
	{
		$searchtxt = !empty($this->input->get('q')) ? $this->input->get('q') : "";
		$results = $this->hotelmodel->GetHotelCitySuggestion($searchtxt);
		$serarchrows = json_encode($results);
		echo $serarchrows;
	}
	public function send_hotel_booking_offer()
	{
		$booking_name = !empty($this->input->post('booking_name')) ? $this->input->post('booking_name') : "";
		$booking_email = !empty($this->input->post('booking_email')) ? $this->input->post('booking_email') : "";
		$booking_phone = !empty($this->input->post('booking_phone')) ? $this->input->post('booking_phone') : "";
		$booking_altphone = !empty($this->input->post('booking_altphone')) ? $this->input->post('booking_altphone') : "";
		$booking_date_to = !empty($this->input->post('booking_date_to')) ? $this->input->post('booking_date_to') : "";
		$booking_date_from = !empty($this->input->post('booking_date_from')) ? $this->input->post('booking_date_from') : "";
		$hotel_city = !empty($this->input->post('hotel_city')) ? $this->input->post('hotel_city') : "";
		$hotelid = !empty($this->input->post('hotelid')) ? $this->input->post('hotelid') : "";
		$hotel_name = !empty($this->input->post('hotel_name')) ? $this->input->post('hotel_name') : "";
		$hotel_address = !empty($this->input->post('hotel_address')) ? $this->input->post('hotel_address') : "";
		$hotel_rating = !empty($this->input->post('hotel_rating')) ? $this->input->post('hotel_rating') : "";
		$emaildata = array();
		$emaildata['name'] =  $booking_name;
		$emaildata['email'] =  $booking_email;
		$emaildata['phone_number'] =  $booking_phone;
		$emaildata['altphone'] =  $booking_altphone;
		$emaildata['CheckIn'] =  date("Y-m-d",strtotime($booking_date_from));
		$emaildata['Checkout'] =  date("Y-m-d",strtotime($booking_date_to));
		$emaildata['hotel_city'] =  $hotel_city;
		$emaildata['hotelid'] =  $hotelid;
		$emaildata['hotel_name'] =  $hotel_name;
		$emaildata['hotel_address'] =  $hotel_address;
		$emaildata['hotel_rating'] =  $hotel_rating;
		//$emaildata['subject'] =  "Hotel Booking Enquery";
	//	$eresp = $this->flightmodel->SenFreeQuotedMail($emaildata);
	    $eresp = $this->hotelmodel->SaveHotelBookingData($emaildata);
		//echo "Email send successfully";
		//die;
		if(!empty($eresp['BookingId']))
		{
		    echo "<script>window.location='".base_url('booking-confirmation/').$eresp['BookingId']."'</script>";
		}
		else
		{
		    $this->session->set_flashdata('status', $eresp['status']);
		    $this->session->set_flashdata('msg', $eresp['message']);
		     echo "<script>window.location='".base_url('hotel-details/').$hotelid."'</script>";
		}
	}
}