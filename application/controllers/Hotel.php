<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller {
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
		// $this->Site_Model->support_phone_link = $this->Site_Model->support_phone_link_hotel;
		// $this->Site_Model->support_phone = $this->Site_Model->support_phone_hotel;
		$this->default_template->load('defaultTemplate', 'contents' , 'hotel/hotel',$data);
	}
	public function search_hotel_lookup()
	{
		$page = $this->uri->segment(1);
		$data['page'] = $page;
		$data['userheader'] ="login-hd";
		// echo '<pre>';
		// print_r($_REQUEST);
		// echo '</pre>';
        $searchprogress ="";
		if(!empty($this->input->post('searchflag')))
		{
			$searchprogress = $this->input->post('searchflag');
		}	
		//echo $searchprogress."=====<br>";
        $data['searchprogress'] = $searchprogress;	
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
		}
		else
		{
			$results=array();
		}
		$data['hoteldata'] = $results;
		// echo '<pre>';
		// print_r($results);
		// echo '</pre>';
		// die;
		// $this->Site_Model->support_phone_link = $this->Site_Model->support_phone_link_hotel;
		// $this->Site_Model->support_phone = $this->Site_Model->support_phone_hotel;
		$this->default_template->load('defaultTemplate', 'contents' , 'hotel/hotel',$data);
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
		$price = $this->input->get('price');
		$searchdata = array(
			'id' => $hotelid
			);
			// echo '<pre>';
			// print_r($searchdata);
			// echo '</pre>';
		$results = $this->hotelmodel->getHotelDetails($searchdata);
		$data['hotel'] = $results;
		$data['price'] = $price;
		// echo '<pre>';
		// print_r($results);
		// echo '</pre>';
		// $this->Site_Model->support_phone_link = $this->Site_Model->support_phone_link_hotel;
		// $this->Site_Model->support_phone = $this->Site_Model->support_phone_hotel;
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

	//send_car_lookup
	public function send_car_lookup()
	{

		$origincode = !empty($this->input->post('origincode')) ? $this->input->post('origincode') : "";

		$pickupdate = !empty($this->input->post('pickupdate')) ? $this->input->post('pickupdate') : "";
		$pickuptime = !empty($this->input->post('pickuptime')) ? $this->input->post('pickuptime') : "";
		$name = !empty($this->input->post('name')) ? $this->input->post('name') : "";
		$email = !empty($this->input->post('email')) ? $this->input->post('email') : "";
		$phone = !empty($this->input->post('phone')) ? $this->input->post('phone') : "";
		

		$emaildata = array();
		$emaildata['name'] =  $name;
		$emaildata['email'] =  $email;
		$emaildata['phone_number'] =  $phone;
		$emaildata['pickupplace'] =  $origincode;
		$emaildata['pickupdate'] =  $pickupdate;
		$emaildata['pickuptime'] =  $pickuptime;
		//$emaildata['subject'] =  "Hotel Booking Enquery";
	//	$eresp = $this->flightmodel->SenFreeQuotedMail($emaildata);
	    //$eresp = $this->hotelmodel->SaveHotelBookingData($emaildata);
		$eresp = $this->hotelmodel->SavecarBookingData($emaildata);
		// echo '<pre>';
		// print_r($eresp);
		// echo '<pre>';
		// //echo "Email send successfully";
		// die;
		if(!empty($eresp['BookingId']))
		{
		    echo "<script>window.location='".base_url('booking-confirmation/').$eresp['BookingId']."'</script>";
		}
		else
		{
		    $this->session->set_flashdata('status', $eresp['status']);
		    $this->session->set_flashdata('msg', $eresp['message']);
		     echo "<script>window.location='".base_url('air-canada-new/')."'</script>";
		}
	}
}