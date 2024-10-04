<?php
require './vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
defined('BASEPATH') OR exit('No direct script access allowed');

class Flight extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('easemytour');		
		$this->load->model('auth');
		//$this->load->model('flightmodel');
		$this->load->model('FlightModel', 'flightmodel');
		$this->load->model('Site_Model');
		$this->load->library('session');
		$this->load->helper('url');		
	}
	public function index()
	{
		$page = $this->uri->segment(1);
		$data['page'] = $page;
		$data['userheader'] ="login-hd";
		// $date = date("Y-m-d");
		// $date = strtotime($date);
		// $date = strtotime("+7 day", $date);
		// $departureDate = date("m/d/Y",$date);
		// $data['departureDate'] = $departureDate;
		$searchprogress ="";
		//$this->session->sess_destroy();
		if(!empty($this->input->post('searchprogress')))
		{
			$searchprogress = $this->input->post('searchprogress');
		}
		else
		{
			if(!empty($this->session->userdata('searchprogress')))
			{
				$searchprogress = $this->session->userdata('searchprogress');
			}
		}
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
		}
		// else
		// {
		// 	if(!empty($this->session->userdata('returndate')))
		// 	{
		// 		$returndate = $this->session->userdata('returndate');
		// 	}
		// }
		$travel_type ="";
		if(!empty($this->input->post('travel_type')))
		{
			$travel_type = $this->input->post('travel_type');
		}
		$returndate =!empty($returndate) ? date("Y-m-d",strtotime($returndate)) : "";
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
		$nonStop = "all";
		if(!empty($this->input->post('nonStop')))
		{
			$nonStop = $this->input->post('nonStop');
		}
		$includedAirlineCodes = "";
		if(!empty($this->input->post('includedAirlineCodes')))
		{
			$includedAirlineCodes = $this->input->post('includedAirlineCodes');
		}
		$maximumPrice = 0;
		if(!empty($this->input->post('maxPrice')))
		{
			$maximumPrice = $this->input->post('maxPrice');
		}
		$isnonstop = !empty($nonStop) ? $nonStop : "";
		$includeairlines = !empty($includedAirlineCodes) ? $includedAirlineCodes : "";
		$maxPrice = !empty($maximumPrice) ? (int)$maximumPrice : 0;
		$travelreturndate = empty($returndate) ? null : $returndate;
		if(!empty($searchprogress))
		{
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
				'maxPrice' => $maxPrice
				);
				// echo '<pre>';
				// print_r($searchdata);
				// echo '</pre>';
				// exit;
			$results = $this->flightmodel->getFlightOffers($searchdata);
		}
		else
		{
			$results=array();
		}
		
		//echo '<pre>';
		//print_r($results['flightdetails']);
		//echo '</pre>';	
		//echo $departuredate."=================";
		$data['searchprogress'] = $searchprogress;
		$data['originLocationCode'] = $originLocationCode;
		$data['origincity'] = $origincity;
		$data['destinationLocationCode'] = $destinationLocationCode;	
		$data['depcity'] = $depcity;	
		$data['departureDate'] = date("m/d/Y",strtotime($departuredate));
		$data['returnDate'] = !empty($returndate)  ? date("m/d/Y",strtotime($returndate)) : "";
		$data['totaltraveller'] = $totaltraveller;
		$data['adults'] = $adults;
		$data['child'] = $child;
		$data['infants'] = $infants;
		$data['travelClass'] = $class;
		$data['nonStop'] = $nonStop;
		$data['travel_type'] = $travel_type;
		$data['includedAirlineCodes'] = $includedAirlineCodes;
		$data['maxPrice'] = $maximumPrice;
		$data['searchdata'] = (count($results) > 0) ? $results['flightdetails'] : array();
		$data['carriers'] = (count($results) > 0) ? json_encode($results['carriers']) : array();
		$data['locations'] = (count($results) > 0) ? json_encode($results['locations']) : array();
		$data['aircraft'] = (count($results) > 0) ? json_encode($results['aircraft']) : array();
		if(!empty($includedAirlineCodes))
		{
			$carrierfilters = $this->session->userdata('carrierfilters');
			$flterpricerangelow = $this->session->userdata('flterpricerangelow');
			$flterpricerangehigh = $this->session->userdata('flterpricerangehigh');
		}
		else
		{
			//$this->session->sess_destroy();
			$carrierfilters = (count($results) > 0) ? $results['carrierfilters'] : array();
			$this->session->set_userdata("carrierfilters",$carrierfilters);	
			
			$flterpricerangelow = (count($results) > 0) ? $results['flterpricerange'][0] : 0;
			$this->session->set_userdata("flterpricerangelow",$flterpricerangelow);	

			$flterpricerangehigh = (count($results) > 0) ? end($results['flterpricerange']) : 0;
			$this->session->set_userdata("flterpricerangehigh",$flterpricerangehigh);	
			
		}
		$data['carrierfilters'] = $carrierfilters;
		$data['lowestflterprice'] = $flterpricerangelow;
		$data['highestflterprice'] = $flterpricerangehigh;
		

		$diffday=0;
		if(!empty($travelreturndate))
		{
			$date1 = new DateTime($travelreturndate);
			$date2 = new DateTime($departuredate);
			$interval = $date1->diff($date2);
			$diffday = $interval->days;
		}

		$data['prev3date'] =  date("d M",strtotime('-3 days',strtotime($departuredate)));
		$data['prev3day'] =  date("D",strtotime('-3 days',strtotime($departuredate)));
		$data['prev3depday'] =  date("Y-m-d",strtotime('-3 days',strtotime($departuredate)));
		$data['prev3returbday'] = ($diffday == 0) ? "" : date("Y-m-d",strtotime('+'.$diffday.' days',strtotime($data['prev3depday'])));
		
		$data['prev2date'] =  date("d M",strtotime('-2 days',strtotime($departuredate)));
		$data['prev2day'] = date("D",strtotime('-2 days',strtotime($departuredate)));
		$data['prev2depday'] = date("Y-m-d",strtotime('-2 days',strtotime($departuredate)));
		$data['prev2returbday'] = ($diffday == 0) ? "" : date("Y-m-d",strtotime('+'.$diffday.' days',strtotime($data['prev2depday'])));

		$data['prev1date'] = date("d M",strtotime('-1 day',strtotime($departuredate)));
		$data['prev1day'] = date("D",strtotime('-1 day',strtotime($departuredate)));
		$data['prev1depday'] = date("Y-m-d",strtotime('-1 day',strtotime($departuredate)));
		$data['prev1returbday'] = ($diffday == 0) ? "" : date("Y-m-d",strtotime('+'.$diffday.' days',strtotime($data['prev1depday'])));

		
		$data['currentdate'] = date("d M",strtotime($departuredate));
		$data['currentday'] = date("D",strtotime($departuredate));
		$data['currentdepday'] = date("Y-m-d",strtotime($departuredate));
		$data['currentreturbday'] = ($diffday == 0) ? "" : date("Y-m-d",strtotime('+'.$diffday.' days',strtotime($data['currentdepday'])));


		$data['next1date'] = date("d M",strtotime('+1 day',strtotime($departuredate)));
		$data['next1day'] =date("D",strtotime('+1 day',strtotime($departuredate)));
		$data['next1depday'] = date("Y-m-d",strtotime('+1 day',strtotime($departuredate)));
		$data['next1returbday'] = ($diffday == 0) ? "" : date("Y-m-d",strtotime('+'.$diffday.' days',strtotime($data['next1depday'])));


		$data['next2date'] = date("d M",strtotime('+2 days',strtotime($departuredate)));
		$data['next2day'] =date("D",strtotime('+2 days',strtotime($departuredate)));
		$data['next2depday'] = date("Y-m-d",strtotime('+2 day',strtotime($departuredate)));
		$data['next2returbday'] = ($diffday == 0) ? "" : date("Y-m-d",strtotime('+'.$diffday.' days',strtotime($data['next2depday'])));

		$data['next3date'] = date("d M",strtotime('+3 days',strtotime($departuredate)));
		$data['next3day'] =date("D",strtotime('+3 days',strtotime($departuredate)));
		$data['next3depday'] = date("Y-m-d",strtotime('+3 day',strtotime($departuredate)));
		$data['next3returbday'] = ($diffday == 0) ? "" : date("Y-m-d",strtotime('+'.$diffday.' days',strtotime($data['next3depday'])));
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		// $this->load->view('template/header',$data);
		// $this->load->view('flightsearch/flight-search',$data);
		// $this->load->view('template/footer',$data);
		$this->default_template->load('defaultTemplate', 'contents' , 'flightsearch/flight-search',$data);
		
	}
	public function flight_prepared_booking()
	{
		$offerId = !empty($this->input->post('offerId')) ? $this->input->post('offerId') : "";
	    $offer_details = !empty($this->input->post('offer_details')) ? $this->input->post('offer_details') : "";
		$carriers = !empty($this->input->post('carriers')) ? $this->input->post('carriers') : "";
		$locations = !empty($this->input->post('locations')) ? $this->input->post('locations') : "";
		$aircraft = !empty($this->input->post('aircraft')) ? $this->input->post('aircraft') : "";

		$origin = !empty($this->input->post('origin')) ? $this->input->post('origin') : "";
		$origincity = !empty($this->input->post('origincity')) ? $this->input->post('origincity') : "";
		$origincountrycode = !empty($this->input->post('origincountrycode')) ? $this->input->post('origincountrycode') : "";
		$destination = !empty($this->input->post('destination')) ? $this->input->post('destination') : "";
		$depcity = !empty($this->input->post('depcity')) ? $this->input->post('depcity') : "";

		$depcountrycode = !empty($this->input->post('depcountrycode')) ? $this->input->post('depcountrycode') : "";
		$departureDate = !empty($this->input->post('departureDate')) ? $this->input->post('departureDate') : "";
		$returndate = !empty($this->input->post('returndate')) ? $this->input->post('returndate') : "";

		$traveller = !empty($this->input->post('traveller')) ? $this->input->post('traveller') : "";
		$class = !empty($this->input->post('class')) ? $this->input->post('class') : "";
		$adults = !empty($this->input->post('adults')) ? $this->input->post('adults') : "";
		$child = !empty($this->input->post('child')) ? $this->input->post('child') : "";
		$infants = !empty($this->input->post('infants')) ? $this->input->post('infants') : "";

		$nonStop = !empty($this->input->post('nonStop')) ? $this->input->post('nonStop') : "";
		$includedAirlineCodes = !empty($this->input->post('includedAirlineCodes')) ? $this->input->post('includedAirlineCodes') : "";
		$maxPrice = !empty($this->input->post('maxPrice')) ? $this->input->post('maxPrice') : "";

		$travel_type = !empty($this->input->post('travel_type')) ? $this->input->post('travel_type') : "";
		
		$this->session->set_userdata("offer_details",$offer_details);
		$this->session->set_userdata("offerId",$offerId);
		$this->session->set_userdata("carriers",$carriers);
		$this->session->set_userdata("locations",$locations);
		$this->session->set_userdata("aircraft",$aircraft);

		$this->session->set_userdata("origin",$origin);
		$this->session->set_userdata("origincity",$origincity);

		$this->session->set_userdata("destination",$destination);
		$this->session->set_userdata("depcity",$depcity);

		$this->session->set_userdata("departureDate",$departureDate);
		$this->session->set_userdata("returndate",$returndate);

		$this->session->set_userdata("traveller",$traveller);
		$this->session->set_userdata("class",$class);
		$this->session->set_userdata("adults",$adults);
		$this->session->set_userdata("child",$child);
		$this->session->set_userdata("infants",$infants);

		$this->session->set_userdata("nonStop",$nonStop);
		$this->session->set_userdata("includedAirlineCodes",$includedAirlineCodes);
		$this->session->set_userdata("maxPrice",$maxPrice);

		$this->session->set_userdata("travel_type",$travel_type);

		//echo $this->session->userdata('origin')."==========<br>";
		//echo $this->session->userdata('origincity')."==========<br>";
		
	}
	//review_flight
	public function review_flight()
	{	
		$page = $this->uri->segment(1);	
		//echo $page."=======";die;
		$offer_details = $this->session->userdata('offer_details');
		$carriers = json_decode($this->session->userdata('carriers'));
		//echo '<pre>';
		//print_r($carriers);
		//echo '</pre>';
		$locations = json_decode($this->session->userdata('locations'));
		//echo '<pre>';
		//print_r($locations);
		//echo '</pre>';
		$aircraft = json_decode($this->session->userdata('aircraft'));
		//echo '<pre>';
		//print_r($aircraft);
		//echo '</pre>';
		//echo $this->session->userdata('origin')."==========";
		
		$offerId = $this->session->userdata('offerId');
		$origin = $this->session->userdata('origin');
		$origincity = $this->session->userdata('origincity');
		$destination = $this->session->userdata('destination');
		$depcity = $this->session->userdata('depcity');
		$departureDate = $this->session->userdata('departureDate');
		$returndate = $this->session->userdata('returndate');
		$traveller = $this->session->userdata('traveller');
		$adults = $this->session->userdata('adults');
		$child = $this->session->userdata('child');
		$infants = $this->session->userdata('infants');
		$travelClass = $this->session->userdata('class');

		$nonStop = $this->session->userdata('nonStop');
		$includedAirlineCodes = $this->session->userdata('includedAirlineCodes');
		$maxPrice = $this->session->userdata('maxPrice');
		$travel_type = $this->session->userdata('travel_type');
		//$travel_type = $this->session->userdata('travel_type');
	//	echo $offerId."======";
		$data = array();
		
		$scriptfilename = $this->uri->segment(1);
		$offeronj = json_decode($offer_details);
		$searchdata = array("data"=>array(
			'type' => "flight-offers-pricing",
			'flightOffers' => array($offeronj)
			));
		$results = $this->flightmodel->GetFlightOfferprice($searchdata,$carriers,$locations,$aircraft,$origin,$destination);
		//echo '<pre>';
		//print_r($results);
		//echo '</pre>';
		//die;
		// $charity = 10;
		// //echo $this->session->userdata('charity')."$#$$$$$$";
		// if($this->session->has_userdata('charity'))
		// {
		// 	$charity = $this->session->userdata('charity');
		// 	//echo $this->session->userdata('charity')."#############";
		// }
		//$charity = ($this->session->userdata('charity') != null) ? $this->session->userdata('charity') : 10;
		$data['userheader'] ="login-hd";
		$data['nonStop'] = $nonStop;
		$data['includedAirlineCodes'] = $includedAirlineCodes;
		$data['maxPrice'] = $maxPrice;
		$data['travel_type'] = $travel_type;
		$data['originLocationCode'] = $origin;
		$data['origincity'] = $origincity;
		$data['destinationLocationCode'] = $destination;
		$data['depcity'] = $depcity;
		$data['departureDate'] = $departureDate;
		$data['returnDate'] = $returndate;
		$data['totaltraveller'] = $traveller;
		$data['adults'] = $adults;
		$data['child'] = $child;
		$data['infants'] = $infants;
		$data['travelClass'] = $travelClass;
		$data['page'] = $page;
		$data['charity_amt'] = 0;
		$data['review_flight'] =$results['offers_price'];
		$data['serachdata'] = $results['serachdata'];
		$data['offers_price_response'] =$results['offers_price_response'];
		$data['offers_price_type'] =$results['offers_price_type'];
		$data['scriptfilename'] = $scriptfilename;
		$data['Countries'] = $this->flightmodel->GetCountries();
		//echo '<pre>';
		//print_r($data);
		//echo '</pre>';
		//echo $charity."=================";
		// $this->load->view('template/header',$data);
		// $this->load->view('flightsearch/review_flight',$data);
		// $this->load->view('template/footer',$data);
		//$this->load->view('template/page_header',$data);
		//$this->load->view('review_flight',$data);
		//$this->load->view('template/footer',$data);
		$this->default_template->load('defaultTemplate', 'contents' , 'flightsearch/review_flight',$data);
	}
	function get_states($country_id)
	{
		$str="";
		//$country_id 	= !empty($this->input->post('country_id')) ? $this->input->post('country_id') : "";
		$states =  $this->flightmodel->GetStates($country_id);
		//Display states list
		if(count($states) > 0){
			$str .= '<option value="">Select state</option>';
			foreach($states as $state){
			$state_id = $state->iso2;
			$state_name = $state->name;
			$str .= '<option value="'.$state_id.'">'.$state_name.'</option>';
			}
		}else{
			$str .= '<option value="">State not available</option>';
		}
		echo $str;
	}
	public function flight_passenger()
	{

		$data = array();
		$page = $this->uri->segment(1);	
		$offer_details = $this->session->userdata('offer_details');
		$carriers = json_decode($this->session->userdata('carriers'));
		$locations = json_decode($this->session->userdata('locations'));
		$aircraft = json_decode($this->session->userdata('aircraft'));
		$charity = !empty($this->input->post('charity')) ? $this->input->post('charity') : 0;
		$origin = $this->session->userdata('origin');
		$destination = $this->session->userdata('destination');
		//echo $origin."=============".$destination;
		//echo $charity."==================";
		//$this->session->set_userdata("charity",$charity);
		//$charity = $this->session->userdata('charity');
		$serachdata = !empty($this->input->post('serachdata')) ? $this->input->post('serachdata') : "";
		$this->session->set_userdata("serachdata",$serachdata);
		$offers_price_response = !empty($this->input->post('offers_price_response')) ? $this->input->post('offers_price_response') : "";
		$this->session->set_userdata("offers_price_response",$offers_price_response);
		$offers_price_type = !empty($this->input->post('offers_price_type')) ? $this->input->post('offers_price_type') : "";
		$this->session->set_userdata("offers_price_type",$offers_price_type);
		//echo $carriers."==========";
		$offerId = $this->session->userdata('offerId');
		$price_response = json_decode($offers_price_response);
		$flightofferprice = array();
		$selecteddata = (array)json_decode($serachdata);
		//echo '<pre>';
		//print_r($aircraft);
		//echo '</pre>';
		
		foreach($price_response->data->flightOffers as $flightdata)
		{
			$flightofferprice = $this->flightmodel->GetFlightdata($flightdata,(array)$carriers,(array)$locations,$aircraft,$selecteddata,$offers_price_type,$origin,$destination);
		}
		///echo '<pre>';
		//print_r($flightofferprice);
		//echo '</pre>';
		//$flightofferprice = $this->flightmodel->GetFlightdata(,(array)$carriers,(array)$locations,(array)$aircraft,(array)json_decode($serachdata),$offers_price_type);
		//echo $offer_details."<br>";
		//echo $carriers."<br>";
		//echo $locations."<br>";
		//echo $aircraft."<br>";
		//echo '<pre>';
		//print_r($selecteddata);
		//echo '</pre>';
		//echo '<pre>';
		//print_r($flightofferprice);
		//echo '</pre>';
		//$data['charity'] =$charity;
		//$data['charity_amt'] =$charity;
		$data['page'] = $page;
		
		$data['fligh_details'] =$flightofferprice;
		$this->load->view('template/header',$data);
		$this->load->view('flightsearch/passenger-detail',$data);
		$this->load->view('template/footer',$data);
	}
	public function save_flight_info()
	{
		$carriers = json_decode($this->session->userdata('carriers'));
		$locations = json_decode($this->session->userdata('locations'));
		$aircraft = json_decode($this->session->userdata('aircraft'));
		$offerId = $this->session->userdata('offerId');

		$requestArr = array();
		$requestArr['OriginCode'] = $this->session->userdata('origin');
		$requestArr['OriginCity'] = $this->session->userdata('origincity');
		$requestArr['DestinationCode'] = $this->session->userdata('destination');
		$requestArr['DestinationCity'] = $this->session->userdata('depcity');
		$requestArr['DepartureDate'] = $this->session->userdata('departureDate');
		$requestArr['ReturnDate'] = $this->session->userdata('returndate');
		$requestArr['Adults'] = $this->session->userdata('adults');
		$requestArr['Childs'] = !empty($this->session->userdata('child')) ? $this->session->userdata('child') : 0;
		$requestArr['Infants'] = !empty($this->session->userdata('infants')) ? $this->session->userdata('infants') : 0;
		$requestArr['travellers'] = $this->session->userdata('traveller');
		$requestArr['serachdata'] = !empty($this->input->post('serachdata')) ? $this->input->post('serachdata') : "";
		$requestArr['traveller_name'] = !empty($this->input->post('traveller_name')) ? $this->input->post('traveller_name') : "";
		$requestArr['traveller_email'] = !empty($this->input->post('traveller_email')) ? $this->input->post('traveller_email') : "";
		$requestArr['traveller_mobile'] = !empty($this->input->post('traveller_mobile')) ? $this->input->post('countryCode').$this->input->post('traveller_mobile') : "";
		$requestArr['traveller_name_on_card'] = !empty($this->input->post('traveller_name_on_card')) ? $this->input->post('traveller_name_on_card') : "";
		$requestArr['traveller_card_number'] = !empty($this->input->post('traveller_card_number')) ? $this->input->post('traveller_card_number') : "";
		$requestArr['traveller_card_exp_month'] = !empty($this->input->post('traveller_card_exp_month')) ? $this->input->post('traveller_card_exp_month') : "";
		$requestArr['traveller_card_exp_year'] = !empty($this->input->post('traveller_card_exp_year')) ? $this->input->post('traveller_card_exp_year') : "";
		$requestArr['traveller_card_cvv'] = !empty($this->input->post('traveller_card_cvv')) ? $this->input->post('traveller_card_cvv') : "";
		//$resp = $this->flightmodel->SaveFlightdata($requestArr);
		$results = $this->flightmodel->SaveFlightdata($requestArr,$carriers,$locations,$aircraft,$offerId);
		//echo '<pre>';
		//print_r($requestArr);
		//echo '</pre>';
		//redirect('thank-you', 'refresh');
		echo "<script>window.location='".base_url('thank-you')."'</script>";


	}

	function thank_you()
	{
		$this->load->view('thankyou');
	}
	public function getairportcitylookup()
	{
		$searchtxt = !empty($this->input->get('q')) ? $this->input->get('q') : "";
		$results = $this->flightmodel->getAirportLookup($searchtxt);
		echo json_encode($results);
	}
	public function sendbookingmail()
	{
		//echo '<pre>';
		//print_r($_REQUEST);
		//echo '</pre>';
		$travelpan = "";
		$traveltype = !empty($this->input->post('travel_type')) ? $this->input->post('travel_type') : "";
		if(!empty($traveltype))
		{
			$travelpan = $traveltype;
		}
		$travel_type_pop = !empty($this->input->post('flight_type_pop')) ? $this->input->post('flight_type_pop') : "";
		if(!empty($travel_type_pop))
		{
			$travelpan = $travel_type_pop;
		}
		//echo $travelpan."======================";
		$quote_from = !empty($this->input->post('quote_from')) ? $this->input->post('quote_from') : "";
		$quote_to = !empty($this->input->post('quote_to')) ? $this->input->post('quote_to') : "";
		$dep_date = !empty($this->input->post('dep_date')) ? $this->input->post('dep_date') : "";
		$return_date = !empty($this->input->post('return_date')) ? $this->input->post('return_date') : "";
		$Email = !empty($this->input->post('Email')) ? $this->input->post('Email') : "";
		$Phone = !empty($this->input->post('phone_number')) ? $this->input->post('phone_number') : "";
		$Name = !empty($this->input->post('Name')) ? $this->input->post('Name') : "";

		$emaildata = array();
		$emaildata['travelpan'] =  $travelpan;
		$emaildata['from'] =  $quote_from;
		$emaildata['to'] =  $quote_to;
		$emaildata['dep_date'] =  $dep_date;
		$emaildata['return_date'] =  $return_date;
		$emaildata['email'] =  $Email;
		$emaildata['phone_number'] =  $Phone;
		$emaildata['name'] =  $Name;
		$eresp = $this->flightmodel->SenFreeQuotedMail($emaildata);
		echo "<script>window.location='".base_url('thank-you')."'</script>";
	}

	public function create_flight_booking()
	{
		//echo '<pre>';
		//print_r($_REQUEST);
		//echo '</pre>';
		//die;
		$offer_details = $this->session->userdata('offer_details');
		$serachdata = $this->input->post('serachdata');//$this->session->userdata('serachdata');
		$selecteddata = (array)json_decode($serachdata);
		$offers_price_response = $this->input->post('offers_price_response');//$this->session->userdata('offers_price_response');

		$offers_price_type = $this->session->userdata('offers_price_type');
		$review_flight_data = $this->input->post('review_flight');
		$review_flight = (array)json_decode($review_flight_data);
		//echo '<pre>';
		//print_r($review_flight);
		//echo '</pre>';
		$charity = $this->session->userdata('charity');
		$carriers = json_decode($this->session->userdata('carriers'));
		$locations = json_decode($this->session->userdata('locations'));
		$aircraft = json_decode($this->session->userdata('aircraft'));
		$offerId = $this->session->userdata('offerId');
		$passenger_type = !empty($this->input->post('passenger_type')) ? $this->input->post('passenger_type') : "";
		$passenger_title = !empty($this->input->post('passenger_title')) ? $this->input->post('passenger_title') : "";
		$passenger_name = !empty($this->input->post('passenger_name')) ? $this->input->post('passenger_name') : "";
		$passenger_gender = !empty($this->input->post('passenger_gender')) ? $this->input->post('passenger_gender') : "";
		$passenger_dob = !empty($this->input->post('passenger_dob')) ? $this->input->post('passenger_dob') : "";
		$passenger_dop = !empty($this->input->post('passenger_dop')) ? $this->input->post('passenger_dop') : array();
		$passenger_wheelchair = !empty($this->input->post('passenger_wheelchair')) ? $this->input->post('passenger_wheelchair') : array();
		$passenger_nationality = !empty($this->input->post('passenger_nationality')) ? $this->input->post('passenger_nationality') : array();
		$passenger_passportno = !empty($this->input->post('passenger_passportno')) ? $this->input->post('passenger_passportno') : array();
		$passenger_passport_exp = !empty($this->input->post('passenger_passport_exp')) ? $this->input->post('passenger_passport_exp') : array();
		$passenger_passport_country = !empty($this->input->post('passenger_passport_country')) ? $this->input->post('passenger_passport_country') : array();
		$passenger_issue_place = !empty($this->input->post('passenger_issue_place')) ? $this->input->post('passenger_issue_place') : array();
		$passenger_issue_date = !empty($this->input->post('passenger_issue_date')) ? $this->input->post('passenger_issue_date') : array();
		$price_offer = json_decode($offers_price_response);
		$search_obj = json_decode($serachdata);
		$traveller_name = !empty($this->input->post('traveller_name')) ? $this->input->post('traveller_name') : "";
		$traveller_address = !empty($this->input->post('traveller_address')) ? $this->input->post('traveller_address') : "";
		$traveller_city = !empty($this->input->post('traveller_city')) ? $this->input->post('traveller_city') : "";
		$traveller_state = !empty($this->input->post('traveller_state')) ? $this->input->post('traveller_state') : "";
		$traveller_postcode = !empty($this->input->post('traveller_postcode')) ? $this->input->post('traveller_postcode') : "";
		$traveller_country = !empty($this->input->post('traveller_country')) ? $this->input->post('traveller_country') : "";
		$traveller_email = !empty($this->input->post('traveller_email')) ? $this->input->post('traveller_email') : "";
		$traveller_mobile = !empty($this->input->post('traveller_mobile')) ? $this->input->post('traveller_mobile') : "";
		$traveller_mobile_country_code = !empty($this->input->post('countryCode')) ? $this->input->post('countryCode') : "";
		$traveller_card_number = !empty($this->input->post('traveller_card_number')) ? $this->input->post('traveller_card_number') : "";
		$traveller_name_on_card = !empty($this->input->post('traveller_name_on_card')) ? $this->input->post('traveller_name_on_card') : "";
		$traveller_exp_month = !empty($this->input->post('traveller_card_exp_month')) ? $this->input->post('traveller_card_exp_month') : "";
		$traveller_exp_year = !empty($this->input->post('traveller_card_exp_year')) ? $this->input->post('traveller_card_exp_year') : "";
		$traveller_cvv = !empty($this->input->post('traveller_card_cvv')) ? $this->input->post('traveller_card_cvv') : "";
		
		$firtsName = !empty($this->input->post('firstName')) ? $this->input->post('firstName') : "";
		$lastName = !empty($this->input->post('lastName')) ? $this->input->post('lastName') : "";
		$cxAltPhone = !empty($this->input->post('cxAltPhone')) ? $this->input->post('cxAltPhone') : "";
		
		$passengers= array();
		if(count($passenger_name) > 0)
		{
			$kk=0;
			foreach($passenger_name as $passenger)
			{
				$passengers[$kk]['Type']= $passenger_type[$kk];
				$passengers[$kk]['Title']= $passenger_title[$kk];
				$passengers[$kk]['Name']= $passenger_name[$kk];
				$passengers[$kk]['Gender']= $passenger_gender[$kk];				
				$passengers[$kk]['Dob']= date("Y-m-d",strtotime($passenger_dob[$kk]));
				if(array_key_exists($kk,$passenger_dop))
				{
					$passengers[$kk]['Dop']= $passenger_dop[$kk];
				}
				if(array_key_exists($kk,$passenger_nationality))
				{
					$passengers[$kk]['Nationality']= $passenger_nationality[$kk];
				}
				if(array_key_exists($kk,$passenger_passportno))
				{
					$passengers[$kk]['Passportno']= $passenger_passportno[$kk];
				}
				if(array_key_exists($kk,$passenger_passport_exp))
				{
					$passengers[$kk]['Passportexp']= (array_key_exists($kk,$passenger_passport_exp)) ? date("Y-m-d",strtotime($passenger_passport_exp[$kk])) : ""; 
				}
				if(array_key_exists($kk,$passenger_passport_country))
				{
					$passengers[$kk]['Passportcountry']= $passenger_passport_country[$kk];
				}
				if(array_key_exists($kk,$passenger_issue_date))
				{
					$passengers[$kk]['Passportissuedate']= (array_key_exists($kk,$passenger_issue_date)) ? date("Y-m-d",strtotime($passenger_issue_date[$kk])) : "";
				}
				if(array_key_exists($kk,$passenger_issue_place))
				{
					$passengers[$kk]['Passportissueplace']=(array_key_exists($kk,$passenger_issue_place)) ? date("Y-m-d",strtotime($passenger_issue_place[$kk])) : "";
				}				
				$kk++;
			}
		}
		$contacts = array(
			'countrycode' => $traveller_mobile_country_code,
			'email' => $traveller_email,
			'mobile' => $traveller_mobile,
			'name' => $traveller_name,
			'address' => $traveller_address,
			'city' => $traveller_city,
			'state' => $traveller_state,
			'postcode' => $traveller_postcode,
			'country' => $traveller_country,
			'flight_data' => $review_flight_data,
		);
		$origin = $this->session->userdata('origin');
		$destination = $this->session->userdata('destination');
		$flightofferprice = array();
// 		echo '<pre>';
// 		print_r($_REQUEST);
// 		echo '</pre>';
		$requestArr = array();
		$requestArr['OriginCode'] = $this->session->userdata('origin');
		$requestArr['OriginCity'] = $this->session->userdata('origincity');
		$requestArr['DestinationCode'] = $this->session->userdata('destination');
		$requestArr['DestinationCity'] = $this->session->userdata('depcity');
		$requestArr['DepartureDate'] = $this->session->userdata('departureDate');
		$requestArr['ReturnDate'] = $this->session->userdata('returndate');
		$requestArr['Adults'] = $this->session->userdata('adults');
		$requestArr['Childs'] = !empty($this->session->userdata('child')) ? $this->session->userdata('child') : 0;
		$requestArr['Infants'] = !empty($this->session->userdata('infants')) ? $this->session->userdata('infants') : 0;
		$requestArr['travellers'] = $this->session->userdata('traveller');
		$requestArr['serachdata'] = !empty($this->input->post('serachdata')) ? $this->input->post('serachdata') : "";
		$requestArr['traveller_firtsName'] = !empty($this->input->post('firstName')) ? $this->input->post('firstName') : "";
		$requestArr['traveller_lastName'] = !empty($this->input->post('lastName')) ? $this->input->post('lastName') : "";
		$requestArr['traveller_email'] = !empty($this->input->post('traveller_email')) ? $this->input->post('traveller_email') : "";
		$requestArr['traveller_altPhone'] = !empty($this->input->post('cxAltPhone')) ? $this->input->post('cxAltPhone') : "";
		$requestArr['traveller_mobile'] = !empty($this->input->post('traveller_mobile')) ? $this->input->post('countryCode').$this->input->post('traveller_mobile') : "";
		$requestArr['traveller_name_on_card'] = !empty($this->input->post('traveller_name_on_card')) ? $this->input->post('traveller_name_on_card') : "";
		$requestArr['traveller_card_number'] = !empty($this->input->post('traveller_card_number')) ? $this->input->post('traveller_card_number') : "";
		$requestArr['traveller_card_exp_month'] = !empty($this->input->post('traveller_card_exp_month')) ? $this->input->post('traveller_card_exp_month') : "";
		$requestArr['traveller_card_exp_year'] = !empty($this->input->post('traveller_card_exp_year')) ? $this->input->post('traveller_card_exp_year') : "";
		$requestArr['traveller_card_cvv'] = !empty($this->input->post('traveller_card_cvv')) ? $this->input->post('traveller_card_cvv') : "";
		$requestArr['contacts'] = $contacts;
		$requestArr['passengers'] = $passengers;

		$results = $this->flightmodel->SaveFlightdata($requestArr,$carriers,$locations,$aircraft,$offerId);
		//echo '<pre>';
		// echo '<pre>';
		// print_r($requestArr);
		// echo'</pre>';
// 		die;
// 		$resp = $this->flightmodel->CreateFlightBooking($price_offer,$search_obj,$passengers,$contacts,$charity);
// 		//echo '<pre>';
// 		//print_r($resp);
// 		//echo'</pre>';
// 		if(!property_exists($resp,"errors") && count((array)$resp) > 0)
// 		{
// 			foreach($resp->data->flightOffers as $flightdata)
// 			{
// 				$flightofferprice = $this->flightmodel->GetFlightdata($flightdata,(array)$carriers,(array)$locations,$aircraft,$selecteddata,$offers_price_type,$origin,$destination);
// 			}
// 		}
		$regno ="";
		$pnr ="";
		if(array_key_exists("itineraries",$flightofferprice))
		{
			if(!empty($resp->data->id))
			{
				$regno = urldecode($resp->data->id);
				
			}
			if(count($resp->data->associatedRecords) > 0)
			{
				foreach($resp->data->associatedRecords as $associatedRecord)
				{
					if(!empty($pnr))
					{
						$pnr .=",";
					}
					$pnr .= urldecode($associatedRecord->reference);
				}
			}
		}
		//echo '<pre>';
		//print_r($passengers);
		//echo '</pre>';
		$data['fligh_details'] = $flightofferprice;
		$data['booking_details'] = "";
		$data['charity_amt'] = 0;
		$emailcontent ='';
		$emailcontent .='<table width="95%" cellpadding="0" cellspacing="0" 
		style="border: 1px solid #ccc;padding: 10px;border-radius: 5px; margin: 10px;font-size:12px;">
		<tbody>
		<tr>
         <td style="text-align: left;vertical-align: top;">
           &nbsp;
         </td>
		  <td style="text-align: right;vertical-align: top;    padding-top: 20px">
            <h3>Date : '.date("F j Y").'</h3>
         </td>
      </tr>';
	  if(!empty($regno) && !empty($pnr))
	  {
		$emailcontent .='<tr>
			<td colspan="2">
				<h3>Booking Information</h3>
			</td>
		</tr>	 
		<tr>
			<td colspan="2">
			<table width="100%" cellpadding="0" cellspacing="0" border="0" style="border: 1px solid #ccc;">
					<tr>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;width: 50%;">PNR</td>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">'.$pnr.'</td>
					</tr>
					<tr>
						<td style="padding: 5px;width: 50%;">Registration No</td>
						<td style="padding: 5px;">'.$regno.'</td>
					</tr>
				</table>
			</td>
		</tr>';
	  }
      $emailcontent .='<tr>
         <td colspan="2" style="padding-top: 10px;">
            <h3>Itinerary</h3>
         </td>
      </tr>';
	  if(count($review_flight['itineraries']) > 0)
		{
			$origin="";
			$destination="";
			foreach($review_flight['itineraries'] as $itinerary)
			{
				$duration = str_replace("M","",str_replace("PT","",$itinerary->duration));
				$durationArr = explode("H",$duration);
				$hours = strtolower($durationArr[0]);
				$mins = strtolower($durationArr[1]);							
				$destination = $itinerary->destination_iatacode;
				$depart = ($origin == $itinerary->destination_iatacode) ? "RETURN" : "DEPART";
				$origin = $itinerary->origin_iatacode;

		 $emailcontent .=' <tr>
         <td colspan="2" style=" border: 1px solid #ccc;padding: 10px;border-radius: 5px;">
            <table width="100%" cellpadding="0" cellspacing="0" style="font-size:12px;">
               <tbody>
                  <tr>
                     <td style="width:8%;"><span style="font-weight:bold;">'. $depart.'</span><br>'.date("D d M",strtotime(str_replace("T"," ",$itinerary->origin_departure_time))).'</td>
                     <td><span style="font-weight:bold;">'.$itinerary->origin_iatacode." - ".$itinerary->destination_iatacode.'</span><br>'.$hours." hr ".$mins." mins".' | '.strtolower($review_flight['price']->cabin).'</td>
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
                                 <td style="width:5%;">&nbsp;</td>
                                 <td style="width:14%;vertical-align: top;padding: 5px;"><span style="font-weight:bold;">'.$segment->carrierName.'</span><br>'.$segment->carrierCode.'-'.$segment->aircraft_number.'<br>'.$segment->aircraft_name.'</td>
                                 <td style="width:24%;vertical-align: top;padding: 5px;"><span style="font-weight:bold;font-size: 20px;">'.date("H:i a",strtotime(str_replace("T"," ",$segment->departure_time))).'</span><br>'.date("D d M y",strtotime(str_replace("T"," ",$segment->departure_time))).'<br>'.$segment->origin_city.' '.$segment->origin_country.'<br>'.$segment->origin_iataname.'<br>'.(!empty($segment->origin_departure_terminal) ? "Terminal ".$segment->origin_departure_terminal : "").'</td>
                                 <td style="text-align:center;width:14%;padding: 5px;">'.$hours." hr ".$mins." mins".'</td>
                                 <td style="width:24%;vertical-align: top;padding: 5px;"><span style="font-weight:bold;font-size: 20px;">'.date("H:i a",strtotime(str_replace("T"," ",$segment->arrival_time))).'</span><br>'.date("D d M y",strtotime(str_replace("T"," ",$segment->arrival_time))).'<br>'.$segment->destination_city.' '.$segment->destination_country.'<br>'.$segment->destination_iataname.'<br>'.(!empty($segment->destination_departure_terminal) ? "Terminal ".$segment->destination_departure_terminal : "").'</td>
                                 <td style="width:14%;vertical-align: top;padding: 5px;">Fare Type<br>'.strtolower($review_flight['price']->cabin).'</td>
                                 <td style="width:13%;">&nbsp;</td>
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
		 <td colspan="2" style="padding-top: 10px;border-radius: 5px; margin: 10px;">
			<h3>Traveller Details</h3>
		 </td>
	  </tr>
	  <tr>
		 <td colspan="2" style="padding: 10px;border-radius: 5px; margin: 10px;">';
		 $p=0;
		 foreach($passengers as $pasenger)
		 {
			if($p == 0)
			{

			 $emailcontent .='<h3>'.$passenger_type[$p].'</h3>
			 <table width="100%" cellpadding="0" cellspacing="0" border="0">
			 <tr>
				 <th style="padding: 5px;border: 1px solid #ccc; border-right: none;border-bottom: none;">Name</th>
				 <th style="padding: 5px;border: 1px solid #ccc; border-right: none;border-bottom: none;">Gender</th>
				 <th style="padding: 5px;border: 1px solid #ccc; border-right: none;border-bottom: none;">Date of birth</th>
				 <th style="padding: 5px;border: 1px solid #ccc; border-right: none;border-bottom: none;">Birth Place</th>
				 <th style="padding: 5px;border: 1px solid #ccc; border-right: none;border-bottom: none;">Nationality</th>
				 <th style="padding: 5px;border: 1px solid #ccc; border-right: none;border-bottom: none;">Passport No</th>
				 <th style="padding: 5px;border: 1px solid #ccc; border-right: none;border-bottom: none;">Passport Issue Place</th>
				 <th style="padding: 5px;border: 1px solid #ccc; border-right: none;border-bottom: none;">Passport Issue Date</th>
				 <th style="padding: 5px;border: 1px solid #ccc; border-right: none;border-bottom: none;">Passport Expiry</th>
				 <th style="padding: 5px;border: 1px solid #ccc; border-bottom: none;">Passport Issuing Country</th>
			  </tr>';
			}
			$emailcontent .=' <tr>
				 <td style="padding: 5px;border: 1px solid #ccc;text-align:center;">'.$pasenger['Title'].' '.$pasenger['Name'].'</td>
				 <td style="padding: 5px;border: 1px solid #ccc;text-align:center;">'.$pasenger['Gender'].'</td>
				 <td style="padding: 5px;border: 1px solid #ccc;text-align:center;">'.$pasenger['Dob'].'</td>
				 <td style="padding: 5px;border: 1px solid #ccc;text-align:center;">'.(!empty($pasenger['Dop']) ? $pasenger['Dop'] : "").'</td>
				 <td style="padding: 5px;border: 1px solid #ccc;text-align:center;">'.(!empty($pasenger['Nationality']) ? $pasenger['Nationality'] : "").'</td>
				 <td style="padding: 5px;border: 1px solid #ccc;text-align:center;">'.(!empty($pasenger['Passportno']) ? $pasenger['Passportno'] : "").'</td>
				 <td style="padding: 5px;border: 1px solid #ccc;text-align:center;">'.(!empty($pasenger['Passportexp']) ? $pasenger['Passportexp'] : "").'</td>
				 <td style="padding: 5px;border: 1px solid #ccc;text-align:center;">'.(!empty($pasenger['Passportcountry']) ? $pasenger['Passportcountry'] : "").'</td>
				 <td style="padding: 5px;border: 1px solid #ccc;text-align:center;">'.(!empty($pasenger['Passportissuedate']) ? $pasenger['Passportissuedate'] : "").'</td>
				 <td style="padding: 5px;border: 1px solid #ccc;text-align:center;">'.(!empty($pasenger['Passportissueplace']) ? $pasenger['Passportissueplace'] : "").'</td>
			  </tr>';
			  if($p == 0)
			  {
				$emailcontent .='</table>';
			  }
			$p++;
		 }
		 $emailcontent .='</td>
	  </tr>
	   <tr>
		 <td colspan="2" style="padding-top: 10px;border-radius: 5px; margin: 10px;">
			
			<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td width="45%">
					<h3>Billing Information</h3>
					<table width="100%" cellpadding="0" cellspacing="0" border="0" style="border: 1px solid #ccc;">
					<tr>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;width: 50%;">Name</td>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">'.$traveller_name.'</td>
					</tr>
					<tr>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">Mobile No</td>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">'.$traveller_mobile_country_code.$traveller_mobile.'</td>
					</tr>
					<tr>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">Email</td>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">'.$traveller_email.'</td>
					</tr>
					<tr>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">Addrress</td>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">'.$traveller_address.'</td>
					</tr>
					<tr>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">City</td>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">'.$traveller_city.'</td>
					</tr>
					<tr>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">State</td>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">'.$traveller_state.'</td>
					</tr>
					<tr>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">Country</td>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">'.$traveller_country.'</td>
					</tr>
					<tr>
						<td style="padding: 5px;">Zipcode</td>
						<td style="padding: 5px;">'.$traveller_postcode.'</td>
					</tr>
					</table>
				</td>
				<td width="2%">&nbsp;</td>
				<td style="vertical-align: top;" width="45%">
					<h3>Payment Information</h3>
					<table width="100%" cellpadding="0" cellspacing="0" border="0" style="border: 1px solid #ccc;">';
					$totaltaxandfee = 0 ;
					if(count((array)$review_flight['travelerPricings']) > 0)
					{
						foreach($review_flight['travelerPricings'] as $kye => $traveller)
						{
							$totaltaxandfee = $totaltaxandfee + $traveller->totaltaxes;
							$travellrtype = ucwords(strtolower(str_replace("HELD_","",$kye)));
							$pastype = (($traveller->passengercount) > 1) ? $travellrtype."(s)" : $travellrtype;
							$emailcontent .='<tr>
								<td style="padding: 5px;border-bottom: 1px solid #ccc;width: 50%;">'.$pastype.'('.$traveller->passengercount.' X '.$review_flight['price']->currency_symbol." ".number_format($traveller->eachbase,2).')'.'</td>
								<td style="padding: 5px;border-bottom: 1px solid #ccc;">'.$review_flight['price']->currency_symbol." ".number_format($traveller->totalbase,2).'</td>
							</tr>';
						}
					}
					$emailcontent .='<tr>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">Fee & Surcharges</td>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">'.$review_flight['price']->currency_symbol." ".number_format($totaltaxandfee,2).'</td>
					</tr>
					<tr>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">Total Amount:</td>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">'.$review_flight['price']->currency_symbol.' '.number_format((floatval(str_replace(',', '', $review_flight['price']->total))),2).'</td>
					</tr>
					<tr>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">Credit / Debit Card Number:</td>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">'.$traveller_card_number.'</td>
					</tr>
					<tr>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">Card Holders Name:</td>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">'.$traveller_name_on_card.'</td>
					</tr>
					<tr>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">Expiration Date:</td>
						<td style="padding: 5px;border-bottom: 1px solid #ccc;">'.$traveller_exp_month."/".$traveller_exp_year.'</td>
					</tr>
					<tr>
						<td style="padding: 5px;">Card Verification Number:</td>
						<td style="padding: 5px;">'.$traveller_cvv.'</td>
					</tr>
					</table>
				</td>
			</tr>
			</table>
		 </td>
	  </tr>
		</table>';
		$content = $this->flightmodel->GetEmailTemplate($emailcontent);
	    //echo $content;
		//die;
		//$from = $data['email'] ;
		$to = $traveller_email;
		$cc = $this->Site_Model->support_email;
		//$to = "connect@helotrip.com";
		$subject = "Booking details";	
	    $form = $this->Site_Model->websitename.'<'.$this->Site_Model->support_email.'>';
		//$to = 'afay@web-vio.com';

		 $this->load->library('email');
		// $resp = $this->email->from($form)
		//  ->to($to)
		//  ->cc($cc)
		//  ->subject($subject)
		//  ->message($emailcontent)
		//  ->set_mailtype('html')
		//  ->send();

		$emaildata = array();
		$emaildata['form'] = $form;
		$emaildata['to'] = $to;
		$emaildata['subject'] = $subject;
		$emaildata['content'] = $content;
		$emaildata['cc'] = "";
		$emailjson = json_encode($emaildata);
		$bookingobj = $this->auth->MakeLeadAPICall("POST","flight/sendmail",$emailjson);

		//$this->Site_Model->sendzohomail($cc,$subject,$content);

		 
		 $this->email->from($form)
            ->to($this->Site_Model->support_email)
            ->subject($subject)
            ->message($emailcontent)
            ->set_mailtype('html')
            ->send();

	// 	 $sender = 'info@thetravellerbuddy.com';
	// 	 $senderName = 'thetravellerbuddy';
	// 	 $recipient = 'info@thetravellerbuddy.com';
	// 	 $usernameSmtp = 'AKIAQH4MSFEDRND4PJLM';
	// 	 $passwordSmtp = 'BAzD2IYfDhOIOhoEyQfsDy6OxkfeVAmtDvYV5ys5Ghn3';
	// 	 $host = 'email-smtp.us-east-1.amazonaws.com';
	// 	 $port = 587;
		 
	// 	 $bodyHtml = $emailcontent;
 
	// 	 $mail = new PHPMailer(true);
	// 	 // Specify the SMTP settings.
	// 	 $mail->isSMTP();
	// 	 $mail->setFrom($sender, $senderName);
	// 	 $mail->Username   = $usernameSmtp;
	// 	 $mail->Password   = $passwordSmtp;
	// 	 $mail->Host       = $host;
	// 	 $mail->Port       = $port;
	// 	 $mail->SMTPAuth   = true;
	// 	 $mail->SMTPSecure = 'tls';
	//  //  $mail->addCustomHeader('X-SES-CONFIGURATION-SET', $configurationSet);
 
	// 	 // Specify the message recipients.
	// 	 $mail->addAddress($recipient);
	// 	 // You can also add CC, BCC, and additional To recipients here.
 
	// 	 // Specify the content of the message.
	// 	 $mail->isHTML(true);
	// 	 $mail->Subject    = $subject;
	// 	 $mail->Body       = $bodyHtml;
	// 	 //$mail->AltBody    = $bodyText;
	// 	 $mail->Send();


		//$this->load->view('flightsearch/invoice',$data);
		//$this->session->sess_destroy();
	//	exit;
		echo "<script>window.location='".base_url('booking-confirmation/').$results['PlainId']."'</script>";
		
	}
	
		public function register_customer()
	{
// 		if(($this->session->userdata('user_logged_id'))){
// 			redirect(base_url().'dashboard');
// 		}
		$firstName = $this->input->post('firstName');
		$lastName = $this->input->post('lastName');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$cpassword = $this->input->post('cpassword');
		$cxPhoneCode = $this->input->post('cxPhoneCode');
		$cxPhone = $this->input->post('cxPhone');
		$cxAltPhoneCode = $this->input->post('cxAltPhoneCode');
		$cxAltPhone = $this->input->post('cxAltPhone');
	   
		$requestdata = array(
			'firstName' => $firstName,
			'lastName' => $lastName,
			'email' => $email,
			'password' => $password,
			'cpassword' => $cpassword,
			'cxPhone' => $cxPhoneCode.$cxPhone,
			'cxAltPhone' => $cxAltPhoneCode.$cxAltPhone
		);
// 			 echo '<pre>';
// 	    print_r($_REQUEST);
// 	    echo '</pre>';
// 		 echo '<pre>';
// 	    print_r($requestdata);
// 	    echo '</pre>';
// 	    die;
		$resp = $this->flightmodel->SaveCustomer($requestdata);
		if($resp['Status'] == 1)
		{
		$this->session->set_flashdata('status', $resp['Status']);
			$this->session->set_flashdata('msg', $resp['Message']);
			redirect(base_url('signup'));
		}
		else
		{
			$this->session->set_flashdata('status', $resp['Status']);
			$this->session->set_flashdata('msg', $resp['Message']);
			redirect(base_url('signup'));
		}
	}
	
	public function do_login()
	{
		$response = array();
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$login_data = $this->flightmodel->web_login($email, $password);
		if($login_data!=0){
			$userdata['user_logged_id'] = $login_data['id'];
			$userdata['cxId'] = $login_data['cxId'];
			$userdata['name'] = $login_data['firstName'];
			$userdata['email'] = $login_data['email'];
			$this->session->set_userdata($userdata);
			
			redirect(base_url('dashboard'));
		} else {
			$this->session->set_flashdata('status', 0);
			$this->session->set_flashdata('msg', 'Invalid login credential');
			redirect(base_url('login'));
		}
	}
	
	public function logout()
	{
	
		$login_id = $this->session->userdata('user_logged_id');
		//$this->flightmodel->update_login($login_id, 0);
		$this->session->sess_destroy();
		redirect(base_url('signup'));
	}

	
}
