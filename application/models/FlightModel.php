<?php
class FlightModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('auth');
		$this->load->model('Site_Model');
	}

	// Get flight offer
	public function getFlightOffers($serachdata = array())
	{
		$flightoffers = array();
		$url ="v2/shopping/flight-offers";
		$filterdata = array();
		if(!empty($serachdata['originLocationCode']) && !empty($serachdata['destinationLocationCode']))
		{
		if(!empty($serachdata['originLocationCode'] && array_key_exists('originLocationCode',$serachdata)))
		{
			$filterdata['originLocationCode'] = $serachdata['originLocationCode'] ;
		}
		if(!empty($serachdata['destinationLocationCode'] && array_key_exists('destinationLocationCode',$serachdata)))
		{
			$filterdata['destinationLocationCode'] = $serachdata['destinationLocationCode'] ;
		}
		if(!empty($serachdata['departureDate'] && array_key_exists('departureDate',$serachdata)))
		{
			$filterdata['departureDate'] = $serachdata['departureDate'] ;
		}
		if(!empty($serachdata['returnDate'] && array_key_exists('returnDate',$serachdata)))
		{
			$filterdata['returnDate'] = $serachdata['returnDate'] ;
		}
		if(!empty($serachdata['adults'] && array_key_exists('adults',$serachdata)))
		{
			$filterdata['adults'] = $serachdata['adults'] ;
		}
		if(!empty($serachdata['children'] && array_key_exists('children',$serachdata)))
		{
			$filterdata['children'] = $serachdata['children'] ;
		}
		if(!empty($serachdata['infants'] && array_key_exists('infants',$serachdata)))
		{
			$filterdata['infants'] = $serachdata['infants'] ;
		}
		if(!empty($serachdata['travelClass'] && array_key_exists('travelClass',$serachdata)))
		{
			$filterdata['travelClass'] = $serachdata['travelClass'] ;
		}
		if(!empty($serachdata['isnonstop'] && array_key_exists('isnonstop',$serachdata)))
		{
			if(!empty($serachdata['isnonstop']))
			{
				if($serachdata['isnonstop'] == "non")
				{
					$filterdata['nonStop'] = true ;
				}				
			}			
		}
		if(!empty($serachdata['includeairlines'] && array_key_exists('includeairlines',$serachdata)))
		{
			if(!empty($serachdata['includeairlines']))
			{
				$filterdata['includedAirlineCodes'] = $serachdata['includeairlines'] ;			
			}			
		}
		if(!empty($serachdata['maxPrice'] && array_key_exists('maxPrice',$serachdata)))
		{
			if(!empty($serachdata['maxPrice']))
			{
				$filterdata['maxPrice'] = $serachdata['maxPrice'] ;			
			}			
		}
		$filterdata['currencyCode'] = "USD";
		if(!empty($serachdata['maxItem']))
		{
			if(!empty($serachdata['maxItem']))
			{
				$filterdata['max'] = $serachdata['maxItem'] ;			
			}
			else
			{
				$filterdata['max'] = 100 ;
			}			
		}
		else
		{
			$filterdata['max'] = 100 ;
		}
		
		$results = $this->auth->MakeAPICall("GET",$url,$filterdata);
		//echo '<pre>';
		//print_r($results);
		//echo '</pre>';
		//die;
		if(!array_key_exists("errors",(array) $results))
		{
			if($results->meta->count > 0)
			{
				$f=0;
				$origin_iataname = "";
				$origin_iatacode="";
				$destination_iataname="";
				$destination_iatacode="";
				$carriers = (array)$results->dictionaries->carriers;
				$locations = (array)$results->dictionaries->locations;
				$aircraft = (array)$results->dictionaries->aircraft;
				$serachdata = array();
				$carrieritems = array(); 
				$carrieritemprice = array(); 
				$carriercount = 0;
				$carriercode = "";
				$filterprice  = array();
				foreach($results->data as $data)
				{
					$flightoffers['flightdetails'][] = $this->GetFlightdata($data,$carriers,$locations,$aircraft,$serachdata,$data->type);
					if(count($data->itineraries) > 0)
					{
						$k=0;
						foreach($data->itineraries as $itinerary)
						{
							$carriercode = "";
							foreach($itinerary->segments as $segment)
							{
								if(!array_key_exists($segment->carrierCode,$carrieritems))
								{
									$carrieritems[$segment->carrierCode] = 1;
								}
								else
								{
									$prevarrcount = $carrieritems[$segment->carrierCode];
									$carriercount = $prevarrcount+1;
									$carrieritems[$segment->carrierCode] = $carriercount;
								}
								$carrieritemprice[$segment->carrierCode][] = "$".$data->price->total;
							}				
							$k++;						
							
						}
					}
					$filterprice[] = $data->price->total;
				}
				$carrierfilter = array();
				
				if(count($carriers) > 0)
				{
					foreach($carriers as $key => $carrier)
					{
						if(array_key_exists($key,$carrieritems))
						{
							$carrierfilter[$key]['carriercode'] = $key;
							$carrierfilter[$key]['Name'] = ucwords(strtolower($carriers[$key]));
							$carrierfilter[$key]['carrieritemcount'] = $carrieritems[$key];
							$carrierfilter[$key]['carrierlowestprice'] = $carrieritemprice[$key][0];
						}
					}
				}
				$flightoffers['flterpricerange'] = $filterprice;
				$flightoffers['carrierfilters'] = $carrierfilter;
				$flightoffers['carriers'] = $carriers;
				$flightoffers['locations'] = $locations;
				$flightoffers['aircraft'] = $aircraft;
			}
		}
	}
		return $flightoffers;
	}
	public function GetFlightdata($data,$carriers=array(),$locations = array(),$aircraft = array(), $serachdata = array() , $type="",$origin="",$destination="")
	{
		$flightoffers = array();
		if(!empty($data))
		{
			
			$origin_iataname = "";
			$origin_iatacode="";
			$destination_iataname="";
			$destination_iatacode="";
			$flightoffers['offerdetails'] = (count($serachdata) > 0) ? json_encode($serachdata) : json_encode($data);
			$flightoffers['type'] = !empty($data->type) ? $data->type : "";
			$flightoffers['id'] = !empty($data->id) ? $data->id : "";
			$flightoffers['source'] = !empty($data->source) ? $data->source : "";
			$flightoffers['instantTicketingRequired'] = !empty($data->instantTicketingRequired) ? $data->instantTicketingRequired : "";
			$flightoffers['nonHomogeneous'] = !empty($data->nonHomogeneous) ? $data->nonHomogeneous : "";
			$flightoffers['oneWay'] = !empty($data->oneWay) ? $data->oneWay : "";
			$flightoffers['lastTicketingDate'] = !empty($data->lastTicketingDate) ? $data->lastTicketingDate : "";
			$flightoffers['numberOfBookableSeats'] = !empty($data->numberOfBookableSeats) ? $data->numberOfBookableSeats : "";
			$flightoffers['isInternational'] = 0;
			$origincountrycode = "";
			$destinationcountrycode="";
			$flightoffers['itineraries'] = array();
			if(count($data->itineraries) > 0)
			{
				$i=0;
				foreach($data->itineraries as $itinerarie)
				{
					$flightoffers['itineraries'][$i]['duration'] ="";
					if(property_exists($itinerarie,"duration"))
					{
						$flightoffers['itineraries'][$i]['duration'] = $itinerarie->duration;	
					}
					else
					{
						if(is_object($serachdata['data']))
						{
							$flightOfferprice = (array) $serachdata['data']->flightOffers;
						}
						else
						{
							$flightOfferprice = (array) $serachdata['data']['flightOffers'];
						}
						
						if(isset($flightOfferprice[0]->itineraries))
						{
							//echo "rrrrrr=============<br>";
							$searchitineraries = (array)$flightOfferprice[0]->itineraries;
							if(array_key_exists("duration",(array)$searchitineraries[$i]))
							{
								$flightoffers['itineraries'][$i]['duration'] = $searchitineraries[$i]->duration;	
							}
							
						}
					}
					
					//echo $flightoffers['itineraries'][$i]['duration']."======";  			
					$flightoffers['itineraries'][$i]['segments'] = array();
					$flightoffers['itineraries'][$i]['stopage'] = array();
					if(count($itinerarie->segments) > 0)
					{
						$s=0;
						foreach($itinerarie->segments as $segment)
						{
							$flightoffers['itineraries'][$i]['segments'][$s]['departure_iatacode'] = !empty($segment->departure->iataCode) ? $segment->departure->iataCode : "";								
							$flightoffers['itineraries'][$i]['segments'][$s]['departure_terminal'] = !empty($segment->departure->terminal) ? $segment->departure->terminal : "";
							$flightoffers['itineraries'][$i]['segments'][$s]['departure_time'] = !empty($segment->departure->at) ?$segment->departure->at : "";
							
							$flightoffers['itineraries'][$i]['segments'][$s]['arrival_iataCode'] = !empty($segment->arrival->iataCode) ? $segment->arrival->iataCode : "";								
							$flightoffers['itineraries'][$i]['segments'][$s]['arrival_terminal'] = !empty($segment->arrival->terminal) ? $segment->arrival->terminal : "";
							$flightoffers['itineraries'][$i]['segments'][$s]['arrival_time'] = !empty($segment->arrival->at) ? $segment->arrival->at : "";
							$flightoffers['itineraries'][$i]['segments'][$s]['carrierCode'] = !empty($segment->carrierCode) ? $segment->carrierCode : "";
							$flightoffers['itineraries'][$i]['segments'][$s]['carrierName'] = array_key_exists($segment->carrierCode,$carriers) ? $carriers[$segment->carrierCode] : "";
							$flightoffers['itineraries'][$i]['segments'][$s]['duration'] = !empty($segment->duration) ? $segment->duration : "";
							$aircraft = (array) $aircraft;
							//echo '<pre>';
							//print_r($aircraft);
							//echo '</pre>';
							$flightoffers['itineraries'][$i]['segments'][$s]['aircraft_name'] = array_key_exists($segment->aircraft->code,(array)$aircraft) ? $aircraft[$segment->aircraft->code] : "";
							$flightoffers['itineraries'][$i]['segments'][$s]['aircraft_code'] = !empty($segment->aircraft->code) ? $segment->aircraft->code : "";
							$flightoffers['itineraries'][$i]['segments'][$s]['aircraft_number'] = !empty($segment->number) ? $segment->number : "";
							$name ="";
							$cityName="";
							$countryName="";
							$arrname ="";
							$arrcityName="";
							$arrcountryName="";
							$countryCode="";
							$arrcountryCode="";
							if(!empty($type) && $type == "flight-offers-pricing")
							{
								$depairportsearchurl= "v1/reference-data/locations?subType=AIRPORT&keyword=".$segment->departure->iataCode;
								$departureairportdetails = $this->auth->MakeAPICall("GET",$depairportsearchurl);
						
								if($departureairportdetails->meta->count > 0)
								{
									if (strpos($departureairportdetails->data[0]->name, 'AIRPORT') == false) {
										$name = $departureairportdetails->data[0]->name." ".$departureairportdetails->data[0]->subType;										
									}
									$name = ucwords(strtolower($name));
									$cityName = ucwords(strtolower($departureairportdetails->data[0]->address->cityName));
									$countryName = ucwords(strtolower($departureairportdetails->data[0]->address->countryName));
									$countryCode = $departureairportdetails->data[0]->address->countryCode;									
								}
								else
								{
									$this->db->select('*');
									$this->db->from('wp_airports');
									$this->db->where('code', $segment->departure->iataCode);
									$query = $this->db->get();
									$row = $query->row();
									$name = !empty($row->name) ? ucwords(strtolower($row->name)) : "";
									$cityName = !empty($row->city) ? ucwords(strtolower($row->city)) : "";
									$countryName = !empty($row->country) ? ucwords(strtolower($row->country)) : "";
									$countryCode = !empty($row->country_code) ? $row->country_code : "";
								}
								//echo $segment->departure->iataCode."===========".$segment->arrival->iataCode."<br>";
								$flightoffers['itineraries'][$i]['segments'][$s]['origin_iataname'] = $name;
								$flightoffers['itineraries'][$i]['segments'][$s]['origin_city'] = $cityName;
								$flightoffers['itineraries'][$i]['segments'][$s]['origin_country'] = $countryName;
								$flightoffers['itineraries'][$i]['segments'][$s]['origin_country_Code'] = $countryCode;
								$origincountrycode = $countryCode;
			
							}
							
							if(!empty($type) && $type == "flight-offers-pricing")
							{
								//$depairportsearchurl= "v1/reference-data/locations?subType=AIRPORT&keyword=".$segment->departure->iataCode;
								$arrivalsearchurl= "v1/reference-data/locations?subType=AIRPORT&keyword=".$segment->arrival->iataCode;
								$arrivalairportdetails = $this->auth->MakeAPICall("GET",$arrivalsearchurl);							
								
								if($arrivalairportdetails->meta->count > 0)
								{
									if (strpos($arrivalairportdetails->data[0]->name, 'AIRPORT') == false) {
										$arrname = $arrivalairportdetails->data[0]->name." ".$arrivalairportdetails->data[0]->subType;										
									}
									$arrname = ucwords(strtolower($arrname));
									$arrcityName = ucwords(strtolower($arrivalairportdetails->data[0]->address->cityName));
									$arrcountryName = ucwords(strtolower($arrivalairportdetails->data[0]->address->countryName));
									$arrcountryCode = $arrivalairportdetails->data[0]->address->countryCode;
								}
								else
								{
									$this->db->select('*');
									$this->db->from('wp_airports');
									$this->db->where('code', $segment->arrival->iataCode);
									$query1 = $this->db->get();
									$arrrow = $query1->row();
									//echo $this->db->last_query()."<br>";
									$arrname = !empty($arrrow->name) ? ucwords(strtolower($arrrow->name)) : "";
									$arrcityName = !empty($arrrow->city) ? ucwords(strtolower($arrrow->city)) : "";
									$arrcountryName = !empty($arrrow->country) ? ucwords(strtolower($arrrow->country)) : "";
									$arrcountryCode = !empty($arrrow->country_code) ? $arrrow->country_code : "";
								}
								$flightoffers['itineraries'][$i]['segments'][$s]['destination_iataname'] = ucwords(strtolower($arrname));
								$flightoffers['itineraries'][$i]['segments'][$s]['destination_city'] = ucwords(strtolower($arrcityName));
								$flightoffers['itineraries'][$i]['segments'][$s]['destination_country'] = ucwords(strtolower($arrcountryName));
								$flightoffers['itineraries'][$i]['segments'][$s]['destination_country_code'] = ucwords(strtolower($arrcountryCode));
								$destinationcountrycode= $arrcountryCode;
							}
							else
							{
								$this->db->select('*');
								$this->db->from('wp_airports');
								$this->db->where('code', $segment->departure->iataCode);
								$query = $this->db->get();
								$row = $query->row();
								$name = !empty($row->name) ? ucwords(strtolower($row->name)) : "";
								$cityName = !empty($row->city) ? ucwords(strtolower($row->city)) : "";
								$countryName = !empty($row->country) ? ucwords(strtolower($row->country)) : "";
								$countryCode = !empty($row->country_code) ? $row->country_code : "";
								$flightoffers['itineraries'][$i]['segments'][$s]['origin_iataname'] = $name;
								$flightoffers['itineraries'][$i]['segments'][$s]['origin_city'] = $cityName;
								$flightoffers['itineraries'][$i]['segments'][$s]['origin_country'] = $countryName;
								$flightoffers['itineraries'][$i]['segments'][$s]['origin_country_Code'] = $countryCode;
								$origincountrycode = $countryCode;
								$this->db->select('*');
								$this->db->from('wp_airports');
								$this->db->where('code', $segment->arrival->iataCode);
								$query1 = $this->db->get();
								$arrrow = $query1->row();
								//echo $this->db->last_query()."<br>";
								$arrname = !empty($arrrow->name) ? ucwords(strtolower($arrrow->name)) : "";
								$arrcityName = !empty($arrrow->city) ? ucwords(strtolower($arrrow->city)) : "";
								$arrcountryName = !empty($arrrow->country) ? ucwords(strtolower($arrrow->country)) : "";
								$arrcountryCode = !empty($arrrow->country_code) ? $arrrow->country_code : "";
								$destinationcountrycode= $arrcountryCode;
								$flightoffers['itineraries'][$i]['segments'][$s]['destination_iataname'] = ucwords(strtolower($arrname));
								$flightoffers['itineraries'][$i]['segments'][$s]['destination_city'] = ucwords(strtolower($arrcityName));
								$flightoffers['itineraries'][$i]['segments'][$s]['destination_country'] = ucwords(strtolower($arrcountryName));
								$flightoffers['itineraries'][$i]['segments'][$s]['destination_country_code'] = ucwords(strtolower($arrcountryCode));
				
							}
							
							$flightoffers['itineraries'][$i]['stopage'][$segment->departure->iataCode]['departure_iatacode'] = !empty($segment->departure->iataCode) ? $segment->departure->iataCode : "";								
							$flightoffers['itineraries'][$i]['stopage'][$segment->departure->iataCode]['departure_terminal'] = !empty($segment->departure->terminal) ? $segment->departure->terminal : "";
							$flightoffers['itineraries'][$i]['stopage'][$segment->departure->iataCode]['departure_time'] = !empty($segment->departure->at) ?$segment->departure->at : "";
							
							$flightoffers['itineraries'][$i]['stopage'][$segment->arrival->iataCode]['arrival_iataCode'] = !empty($segment->arrival->iataCode) ? $segment->arrival->iataCode : "";								
							$flightoffers['itineraries'][$i]['stopage'][$segment->arrival->iataCode]['arrival_terminal'] = !empty($segment->arrival->terminal) ? $segment->arrival->terminal : "";
							$flightoffers['itineraries'][$i]['stopage'][$segment->arrival->iataCode]['arrival_time'] = !empty($segment->arrival->at) ? $segment->arrival->at : "";
							//$flightoffers['itineraries'][$i]['segments'][$s]['carrierCode'] = !empty($segment->carrierCode) ? $segment->carrierCode : "";
							//$flightoffers['itineraries'][$i]['segments'][$s]['carrierName'] = array_key_exists($segment->carrierCode,$carriers) ? $carriers[$segment->carrierCode] : "";
							//$flightoffers['itineraries'][$i]['segments'][$s]['duration'] = !empty($segment->duration) ? $segment->duration : "";
							
							
							//$deplocations = array_key_exists($segment->departure->iataCode,$locations) ? $locations[$segment->departure->iataCode] : "";
							//$arrivelocations = array_key_exists($segment->departure->iataCode,$locations) ? $locations[$segment->arrival->iataCode] : "";
							//$depairportsearchurl= "v1/reference-data/locations?subType=CITY,AIRPORT&keyword=".$segment->departure->iataCode."&countryCode=".$deplocations->countryCode;
							//$arrivalsearchurl= "v1/reference-data/locations?subType=CITY,AIRPORT&keyword=".$segment->arrival->iataCode."&countryCode=".$arrivelocations->countryCode;
							//echo $depairportsearchurl."=============".$arrivalsearchurl."<br>";
							//$departureairportdetails = $this->auth->MakeAPICall("GET",$depairportsearchurl);
							//echo '<pre>';
							//print_r($departureairportdetails);
							//echo '</pre>';
							//$arivalairportdetails = $this->auth->MakeAPICall("GET",$arrivalsearchurl);
							//echo '<pre>';
							//print_r($arivalairportdetails);
							//echo '</pre>';
							//$departure_iataname = !empty($airportdetails->data->name) ? $airportdetails->data->name : "";
							
							//$airportsearchurl= "v1/reference-data/locations/A".$segment->arrival->iataCode;
							//$arrivalairportdetails = $this->auth->MakeAPICall("GET",$airportsearchurl);
							///$flightoffers[$f]['itineraries'][$i]['stopage'][$segment->arrival->iataCode]['arrival_iataname'] = !empty($airportdetails->data->name) ? $airportdetails->data->name : "";
							
							
							if($s == 0)
							{
								if(!empty($segment->departure->iataCode))
								{
									//$airportsearchurl= "v1/reference-data/locations/A".$segment->departure->iataCode;
									//$airportdetails = $this->auth->MakeAPICall("GET",$airportsearchurl);
									$origin_iataname = "";//$flightoffers[$f]['itineraries'][$i]['stopage'][$segment->departure->iataCode]['departure_iataname'];
									$origin_iatacode = !empty($segment->departure->iataCode) ? $segment->departure->iataCode : "";
									$flightoffers['itineraries'][$i]['origin_iatacode'] = $origin_iatacode;
									$flightoffers['itineraries'][$i]['origin_iataname'] = $origin_iataname;
									$flightoffers['itineraries'][$i]['origin_departure_terminal'] = !empty($segment->departure->terminal) ? $segment->departure->terminal : "";
									$flightoffers['itineraries'][$i]['origin_departure_time'] = !empty($segment->departure->at) ?$segment->departure->at : "";
									$flightoffers['itineraries'][$i]['carrierCode'] = !empty($segment->carrierCode) ? $segment->carrierCode : "";
									$flightoffers['itineraries'][$i]['carrierName'] = array_key_exists($segment->carrierCode,$carriers) ? $carriers[$segment->carrierCode] : "";
									$flightoffers['itineraries'][$i]['aircraft_name'] = array_key_exists($segment->aircraft->code,$aircraft) ? $aircraft[$segment->aircraft->code] : "";
									$flightoffers['itineraries'][$i]['aircraft_code'] = !empty($segment->aircraft->code) ? $segment->aircraft->code : "";
									$flightoffers['itineraries'][$i]['aircraft_number'] = !empty($segment->number) ? $segment->number : "";
									
									$flightoffers['itineraries'][$i]['origin_iataname'] = $name;
									$flightoffers['itineraries'][$i]['origin_city'] = $cityName;
									$flightoffers['itineraries'][$i]['origin_country'] = $countryName;
									$flightoffers['itineraries'][$i]['origin_country_Code'] = $countryCode;
									$origincountrycode = $countryCode;
								}	
							}
							else
							{
								if($s == 0)
								{
									if(!empty($segment->departure->iataCode))
									{
										//$airportsearchurl= "v1/reference-data/locations/A".$segment->departure->iataCode;
										//$airportdetails = $this->auth->MakeAPICall("GET",$airportsearchurl);
										$origin_iataname = "";//$flightoffers[$f]['itineraries'][$i]['stopage'][$segment->departure->iataCode]['departure_iataname'];
										$origin_iatacode = !empty($segment->departure->iataCode) ? $segment->departure->iataCode : "";
										$flightoffers['itineraries'][$i]['origin_iatacode'] = $origin_iatacode;
										$flightoffers['itineraries'][$i]['origin_iataname'] = $origin_iataname;
										$flightoffers['itineraries'][$i]['origin_departure_terminal'] = !empty($segment->departure->terminal) ? $segment->departure->terminal : "";
										$flightoffers['itineraries'][$i]['origin_departure_time'] = !empty($segment->departure->at) ?$segment->departure->at : "";
										$flightoffers['itineraries'][$i]['carrierCode'] = !empty($segment->carrierCode) ? $segment->carrierCode : "";
										$flightoffers['itineraries'][$i]['carrierName'] = array_key_exists($segment->carrierCode,$carriers) ? $carriers[$segment->carrierCode] : "";
										$flightoffers['itineraries'][$i]['aircraft_name'] = array_key_exists($segment->aircraft->code,$aircraft) ? $aircraft[$segment->aircraft->code] : "";
										$flightoffers['itineraries'][$i]['aircraft_code'] = !empty($segment->aircraft->code) ? $segment->aircraft->code : "";
										$flightoffers['itineraries'][$i]['aircraft_number'] = !empty($segment->number) ? $segment->number : "";
										
										$flightoffers['itineraries'][$i]['origin_iataname'] = $name;
										$flightoffers['itineraries'][$i]['origin_city'] = $cityName;
										$flightoffers['itineraries'][$i]['origin_country'] = $countryName;
										$flightoffers['itineraries'][$i]['origin_country_Code'] = $countryCode;
										$origincountrycode = $countryCode;
	
									}
								}									
							}
							if($s == (count($itinerarie->segments) -1))
							{
								if(!empty($segment->arrival->iataCode))
								{
									//$airportsearchurl= "v1/reference-data/locations/A".$segment->arrival->iataCode;
									//$airportdetails = $this->auth->MakeAPICall("GET",$airportsearchurl);
									$destination_iataname = "";//$flightoffers[$f]['itineraries'][$i]['stopage'][$segment->arrival->iataCode]['arrival_iataname'];
									$destination_iatacode = !empty($segment->arrival->iataCode) ? $segment->arrival->iataCode : "";
									$flightoffers['itineraries'][$i]['destination_iatacode'] = $destination_iatacode;
									$flightoffers['itineraries'][$i]['destination_iataname'] = $destination_iataname;
									$flightoffers['itineraries'][$i]['destination_departure_terminal'] = $flightoffers['itineraries'][$i]['segments'][$s]['arrival_terminal'];
									$flightoffers['itineraries'][$i]['destination_departure_time'] = $flightoffers['itineraries'][$i]['segments'][$s]['arrival_time'];
									$flightoffers['itineraries'][$i]['carrierCode'] = !empty($segment->carrierCode) ? $segment->carrierCode : "";
									$flightoffers['itineraries'][$i]['carrierName'] = array_key_exists($segment->carrierCode,$carriers) ? $carriers[$segment->carrierCode] : "";
									$flightoffers['itineraries'][$i]['aircraft_name'] = array_key_exists($segment->aircraft->code,$aircraft) ? $aircraft[$segment->aircraft->code] : "";
									$flightoffers['itineraries'][$i]['aircraft_code'] = !empty($segment->aircraft->code) ? $segment->aircraft->code : "";
									$flightoffers['itineraries'][$i]['aircraft_number'] = !empty($segment->number) ? $segment->number : "";

									$flightoffers['itineraries'][$i]['destination_iataname'] = $arrname;
									$flightoffers['itineraries'][$i]['destination_city'] = $arrcityName;
									$flightoffers['itineraries'][$i]['destination_country'] = $arrcountryName;
									$flightoffers['itineraries'][$i]['destination_country_Code'] = $arrcountryCode;
									$destinationcountrycode= $arrcountryCode;
								}	
							}
							else
							{
								if($s == (count($itinerarie->segments) -1))
								{
									if(!empty($segment->arrival->iataCode))
									{
										//$airportsearchurl= "v1/reference-data/locations/A".$segment->arrival->iataCode;
										//$airportdetails = $this->auth->MakeAPICall("GET",$airportsearchurl);
										$destination_iataname= "";//$flightoffers[$f]['itineraries'][$i]['stopage'][$segment->arrival->iataCode]['arrival_iataname'];
										$destination_iatacode = !empty($segment->arrival->iataCode) ? $segment->arrival->iataCode : "";
										$flightoffers['itineraries'][$i]['destination_iatacode'] = $destination_iatacode;
										$flightoffers['itineraries'][$i]['destination_iataname'] = $destination_iataname;
										$flightoffers['itineraries'][$i]['destination_departure_terminal'] = $flightoffers[$f]['itineraries'][$i]['segments'][$s]['arrival_terminal'];
										$flightoffers['itineraries'][$i]['destination_departure_time'] = $flightoffers[$f]['itineraries'][$i]['segments'][$s]['arrival_time'];
										$flightoffers['itineraries'][$i]['carrierCode'] = !empty($segment->carrierCode) ? $segment->carrierCode : "";
										$flightoffers['itineraries'][$i]['carrierName'] = array_key_exists($segment->carrierCode,$carriers) ? $carriers[$segment->carrierCode] : "";
										$flightoffers['itineraries'][$i]['aircraft_name'] = array_key_exists($segment->aircraft->code,$aircraft) ? $aircraft[$segment->aircraft->code] : "";
										$flightoffers['itineraries'][$i]['aircraft_code'] = !empty($segment->aircraft->code) ? $segment->aircraft->code : "";
										$flightoffers['itineraries'][$i]['aircraft_number'] = !empty($segment->number) ? $segment->number : "";

										$flightoffers['itineraries'][$i]['destination_iataname'] = $arrname;
										$flightoffers['itineraries'][$i]['destination_city'] = $arrcityName;
										$flightoffers['itineraries'][$i]['destination_country'] = $arrcountryName;
										$flightoffers['itineraries'][$i]['destination_country_Code'] = $arrcountryCode;
										$destinationcountrycode= $arrcountryCode;
										
									}	
								}
								
							}
							$s++;
							//echo '<pre>';
							//print_r($flightoffers);
							//echo '</pre>';
							//$origin = $this->session->userdata('origin');
							//$destination = $this->session->userdata('origin');
							//echo $origin."==========".$destination;
							if(!empty($origin) && !empty($destination))
							{
								
								//die;
								$this->db->select('country_code');
								$this->db->from('wp_airports');
								$this->db->where('code', $origin);
								$query = $this->db->get();
								$originrow = $query->row();
								$this->db->select('country_code');
								$this->db->from('wp_airports');
								$this->db->where('code', $destination);
								$query1 = $this->db->get();
								$descarrrow = $query1->row();
								//echo $originrow->country_code."==========".$descarrrow->country_code;
								if($originrow->country_code != $descarrrow->country_code)
								{
									$flightoffers['isInternational'] = 1;
								}
								else
								{
									$flightoffers['isInternational'] = 0;
								}
							}
						}
					}
					$i++;
				}
			}
			$currency_symbol = "$";
			if($data->price->currency == "EURO")
			{
				$currency_symbol ="€";
			}
			$flightoffers['price']['currency'] = $data->price->currency;
			$flightoffers['price']['currency_symbol'] = $currency_symbol;
			$flightoffers['price']['total'] = $data->price->total;
			$flightoffers['price']['base'] = $data->price->base;
			if(count($data->price->fees) > 0)
			{
				$fe=0;
				foreach($data->price->fees as $fees)
				{
					if($fe == 0)
					{
						$flightoffers['price']['supplier_fees'] = $fees->amount;
					}
					if($fe == 1)
					{
						$flightoffers['price']['ticketing_fees'] = $fees->amount;
					}
					$fe++;
				}
			}
			$flightoffers['price']['grandTotal'] = $data->price->grandTotal;
			$travelerPricings = array();
			if(count($data->travelerPricings) > 0)
			{
				$total=0;
				$adultcount = 0;
				$childcount = 0;
				$infantcount = 0;
				foreach($data->travelerPricings as $travelerprice)
				{
					$travelerPricings[$travelerprice->travelerType]['eachtotal'] = $total+$travelerprice->price->total;
					$travelerPricings[$travelerprice->travelerType]['eachbase'] = $travelerprice->price->base;
					$travelerPricings[$travelerprice->travelerType]['eachtaxes'] = $travelerprice->price->total-$travelerprice->price->base;
					if($travelerprice->travelerType == "ADULT")
					{
						$adultcount= $adultcount+1;
						$travelerPricings[$travelerprice->travelerType]['passengercount'] = $adultcount;
						$travelerPricings[$travelerprice->travelerType]['total'] = $travelerPricings[$travelerprice->travelerType]['eachtotal']*$adultcount;
						$travelerPricings[$travelerprice->travelerType]['totalbase'] = $travelerPricings[$travelerprice->travelerType]['eachbase']*$adultcount;
						$travelerPricings[$travelerprice->travelerType]['totaltaxes'] = $travelerPricings[$travelerprice->travelerType]['eachtaxes']*$adultcount;
					}
					if($travelerprice->travelerType == "CHILD")
					{
						$childcount= $childcount+1;
						$travelerPricings[$travelerprice->travelerType]['passengercount'] = $childcount;
						$travelerPricings[$travelerprice->travelerType]['total'] = $travelerPricings[$travelerprice->travelerType]['eachtotal']*$childcount;
						$travelerPricings[$travelerprice->travelerType]['totalbase'] = $travelerPricings[$travelerprice->travelerType]['eachbase']*$childcount;
						$travelerPricings[$travelerprice->travelerType]['totaltaxes'] = $travelerPricings[$travelerprice->travelerType]['eachtaxes']*$childcount;
					}
					if($travelerprice->travelerType == "HELD_INFANT")
					{
						$infantcount= $infantcount+1;
						$travelerPricings[$travelerprice->travelerType]['passengercount'] = $infantcount;
						$travelerPricings[$travelerprice->travelerType]['total'] = $travelerPricings[$travelerprice->travelerType]['eachtotal']*$infantcount;
						$travelerPricings[$travelerprice->travelerType]['totalbase'] = $travelerPricings[$travelerprice->travelerType]['eachbase']*$infantcount;
						$travelerPricings[$travelerprice->travelerType]['totaltaxes'] = $travelerPricings[$travelerprice->travelerType]['eachtaxes']*$infantcount;
					}
					if(count($travelerprice->fareDetailsBySegment) > 0)
					{
						$cabinArr = array();
						$classArr = array();
						$includedCheckedBagsArr = array();
						foreach($travelerprice->fareDetailsBySegment as $faresegment)
						{
							if(!in_array($faresegment->cabin,$cabinArr))
							{
								array_push($cabinArr,$faresegment->cabin);
							}
							if(!in_array($faresegment->class,$classArr))
							{
								array_push($classArr,$faresegment->class);
							}
							$includedCheckedBag ="";
							if(property_exists($faresegment,"includedCheckedBags"))
							{
								if(property_exists($faresegment->includedCheckedBags,"weight") 
								&& property_exists($faresegment->includedCheckedBags,"weightUnit"))
								{
									$includedCheckedBag = $faresegment->includedCheckedBags->weight." ".$faresegment->includedCheckedBags->weightUnit;
								}
								if(property_exists($faresegment->includedCheckedBags,"quantity"))
								{
									$includedCheckedBag = $faresegment->includedCheckedBags->quantity;
								}
								if(!in_array($includedCheckedBag,$includedCheckedBagsArr))
								{
									array_push($includedCheckedBagsArr,$includedCheckedBag);
								}
							}
						}
						$travelerPricings[$travelerprice->travelerType]['cabin'] = (count($cabinArr) > 0) ? implode(",",$cabinArr) : "";
						$travelerPricings[$travelerprice->travelerType]['class'] = (count($classArr) > 0) ? implode(",",$classArr) : "";
						$travelerPricings[$travelerprice->travelerType]['includedCheckedBags'] = (count($includedCheckedBagsArr) > 0) ? implode(",",$includedCheckedBagsArr) : "";
						$flightoffers['price']['cabin'] = $travelerPricings[$travelerprice->travelerType]['cabin'];
					}
				}
				
			}
			$flightoffers['travelerPricings'] = $travelerPricings;
			//echo '<pre>';
			//print_r($flightoffers);
			//echo '</pre>';
		}
		return $flightoffers;
	}

	function getAirportLookup($searchtxt="",$subtype="AIRPORT")
	{
		$resp=array();
		if(!empty($searchtxt))
		{
			$airportlookupsearchurl= "v1/reference-data/locations?subType=".$subtype."&keyword=".$searchtxt;
			$airportlookupdetails = $this->auth->MakeAPICall("GET",$airportlookupsearchurl);
			//echo '<pre>';
			//print_r($airportlookupdetails);
			//echo '</pre>';
			if(count($airportlookupdetails->data) > 0)
			{
				$i=0;
				foreach($airportlookupdetails->data as $searchitem)
				{
					$name = $searchitem->name;
					if (strpos($searchitem->name, 'AIRPORT') == false) {
						$name = $searchitem->name." ".$searchitem->subType;
					}
					$name = 
					$resp[$i]['name'] = !empty($name) ? ucwords(strtolower($name)) : "";
					$resp[$i]['detailedName'] = !empty($searchitem->detailedName) ? ucwords(strtolower($searchitem->detailedName)) : "";
					$resp[$i]['id'] = !empty($searchitem->id) ? $searchitem->id : "";
					$resp[$i]['iataCode'] = !empty($searchitem->iataCode) ? $searchitem->iataCode : "";
					$resp[$i]['cityName'] = !empty($searchitem->address->cityName) ? ucwords(strtolower($searchitem->address->cityName)) : "";
					$resp[$i]['countryName'] = !empty($searchitem->address->countryName) ? ucwords(strtolower($searchitem->address->countryName)) : "";
					$resp[$i]['countryCode'] = !empty($searchitem->address->countryCode) ? ucwords(strtolower($searchitem->address->countryCode)) : "";
					$resp[$i]['stateCode'] = !empty($searchitem->address->stateCode) ? $searchitem->address->stateCode : "";
					$i++;
				}
			}
		}
		return $resp;
	}
	public function GetFlightOfferprice($serachdata,$carriers,$locations,$aircraft,$origin,$destination)
	{
		// $url= "v1/shopping/flight-offers/pricing";
		// $resp = array();
		// //$data = json_encode($serachdata);
		// //echo '<pre>';
		// ///print_r($serachdata);
		// //echo '</pre>';
		// //die;
		// //$results = $this->auth->MakeAPICall("POST",$url,$data,1);
		// $flightofferprice = array();
		// $type="";
		// //if(!array_key_exists("errors",(array) $results))
		// //{
		// 	if(count($serachdata['data']['flightOffers']) > 0)
		// 	{
		// 		foreach($serachdata['data']['flightOffers'] as $flightdata)
		// 		{
		// 			$flightofferprice = $this->GetFlightdata($flightdata,(array)$carriers,(array)$locations,(array)$aircraft,(array)$serachdata,$flightdata->type);
		// 		}
		// 	}	
		// 	$type = $flightdata->type;
		// //}	
		// $resp['serachdata']= $serachdata;
		// $resp['offers_price_response']= $serachdata;
		// $resp['offers_price_type']= $type;
		// $resp['offers_price']= $flightofferprice;
		// return $resp;
		$url= "v1/shopping/flight-offers/pricing";
		$resp = array();
		$data = json_encode($serachdata);
		$results = $this->auth->MakeAPICall("POST",$url,$data,1);
		$flightofferprice = array();
		$type="";
		if(!array_key_exists("errors",(array) $results))
		{
			if(count($results->data->flightOffers) > 0)
			{
				foreach($results->data->flightOffers as $flightdata)
				{
					$flightofferprice = $this->GetFlightdata($flightdata,(array)$carriers,(array)$locations,(array)$aircraft,(array)$serachdata,$results->data->type,$origin,$destination);
				}
			}	
			$type = $results->data->type;
		}	
		$resp['serachdata']= $serachdata;
		$resp['offers_price_response']= $results;
		$resp['offers_price_type']= $type;
		$resp['offers_price']= $flightofferprice;
		return $resp;
	}
	function SaveFlightdata($request,$carriers,$locations,$aircraft,$offerId)
	{
	   // echo '<pre>';
	   // print_r($request);
	   // echo '</pre>';
	   //  print_r($carriers);
	   // echo '</pre>';
	   // echo '</pre>';
	   //  print_r($locations);
	   // echo '</pre>';
	   // echo '</pre>';
	   //  print_r($aircraft);
	   // echo '</pre>';
	   // echo $offerId;
	   // die;
		$resp = array();
		$flightofferprice = array();
		$name = "";
        if(!empty($request['traveller_firtsName']))
        {
            $name .= $request['traveller_firtsName'];   
        }
        if(!empty($request['traveller_lastName']))
        {
            $name .= " ".$request['traveller_lastName'];   
        }
		$this->db->select("*");
	    $this->db->from("cxdetail");
	    $this->db->where("email='".$request['traveller_email']."'");
	    $rsuser = $this->db->get();
	    if($rsuser->num_rows() > 0)
	    {
	        $rowuser = $rsuser->row();
	        $cxid = $rowuser->cxId;
	    }
	    else
	    {
	        
	        $password = $this->getPassword(8);
	        $cxid = time();
	        $userarr = array(
	            'cxId' => $cxid,
	            'cxName' => $name,
	            'email' => $request['traveller_email'],
	            'cxPhone' => $request['traveller_mobile'],
	            'cxAltPhone' => $request['traveller_altPhone'],
	            'password' => md5($password),
	            'firstName' => $request['traveller_firtsName'],
	            'lastName' => $request['traveller_lastName']
	            );
	       $this->db->insert("cxdetail",$userarr);
	       $userId = $this->db->insert_id();
	       	$to = $request['traveller_email'];
	       	$emailcontent="";
                                $emailcontent= '<table align="left" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0"> 
                                    <tbody>
                                        <tr> 
                                            <td align="left" style="padding-top:20px;color:#221f1f;
                                            padding-left:40px;padding-right:40px;font-family:NetflixSans-Light,Helvetica,Roboto,Segoe UI,sans-serif;
                                            font-weight:700;font-size:12px;line-height:21px;line-height:21px"> Hi '.$name.' </td> 
                                        </tr> 
                                    </tbody>
                                </table> 
                                <table align="left" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0"> 
                                    <tbody>
										<tr> 
                                                <td align="left" style="padding-top:20px;color:#221f1f;padding-left:40px;padding-right:40px;
                                                font-family:NetflixSans-Light,Helvetica,Roboto,Segoe UI,sans-serif;font-weight:300;
                                                line-height:21px;font-size:12px;line-height:21px">'; 
                                                $emailcontent .='';
                                                $emailcontent .='<div>Please note the following information:</div>';                                                
                                                $emailcontent .='<div><a href="'.base_url('login').'">Click Here</a> to login into '.$this->Site_Model->websitename.' Website Dashboard.</div>';
                                                $emailcontent .='<div>Your sign in email: <b>'.$request['traveller_email'].'</b></div>';
                                                $emailcontent .='<div>Your password: <b>'.$password.'</b></div>';
                                                $emailcontent .='<hr>';
                                                $emailcontent .='</td> 
                                        </tr>										
                                    </tbody>
                                </table>                         
                                <table align="left" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0"> 
                                <tbody>
                                    <tr> 
                                        <td align="left" style="padding-top:20px;color:#221f1f;padding-left:40px;padding-right:40px;font-family:NetflixSans-Light,Helvetica,Roboto,Segoe UI,sans-serif;font-weight:300;line-height:21px;font-size:12px;line-height:21px"> If you need to make any changes in your registration, please do login using the registered mail ID and password. </td> 
                                    </tr> 
                                    </tbody>
                                </table>';
                            
                            $content = $this->FlightModel->GetEmailTemplate($emailcontent);
                            //echo $content;
                            $to = $request['traveller_email'];
                            $subject = $this->Site_Model->websitename." - Account Details Of ".$this->Site_Model->websitename;
                            $form = $this->Site_Model->support_email;
							$emaildata = array();
							$emaildata['form'] = $form;
							$emaildata['to'] = $to;
							$emaildata['subject'] = $subject;
							$emaildata['content'] = $content;
							$emaildata['cc'] ="";
							$emailjson = json_encode($emaildata);
							$bookingobj = $this->auth->MakeLeadAPICall("POST","flight/sendmail",$emailjson);

							//$this->Site_Model->sendzohomail($form,$subject,$content);
							
                            $this->load->library('email');
                            $this->email->from($form)
                            ->to($to)
                            ->subject($subject)
                            ->message($content)
                            ->set_mailtype('html')
                            ->send();
                           
    // 	    $subject = "Account Details";
    // 	    $form = $this->Site_Model->websitename.'<'.$this->Site_Model->support_email.'>';
    // 	    $this->load->library('email');
    // 		$str ="";
    // 		$str .="Dear ".$name."<br>";
    // 		$str .="Congratulations! You have successfully register in ".$this->Site_Model->websitename."<br> Your account details is given bellow<br>";
    // 		$str .="Email : ".$request['traveller_email']."<br>";
    // 		$str .="Password : ".$password."<br>";
    // 		$str ."Than You";
    // 		$this->email->from($form)
    // 		 ->to($to)
    // 		 ->subject($subject)
    // 		 ->message($str)
    // 		 ->set_mailtype('html')
    // 		 ->send();
	    }
	    // die;
		$serachdata = json_decode($request['serachdata']);
		if(count($serachdata->data->flightOffers) > 0)
		{
			foreach($serachdata->data->flightOffers as $flightdata)
			{
				$flightofferprice = $this->GetFlightdata($flightdata,(array)$carriers,(array)$locations,(array)$aircraft,(array)$serachdata,$flightdata->type);
			}
		}
		$planId = "FT".time();
		$DepartureDate = date("Y-m-d",strtotime($request['DepartureDate']));
		$ReturnDate  = !empty($request['ReturnDate']) ? date("Y-m-d",strtotime($request['ReturnDate'])) : "";
		$Createdate = date("Y-m-d H:i:s");
		$this->db->select("*");
		$this->db->from("travellingplaninfo");
		$this->db->where("cxId",$cxid);
		$this->db->where("PlainId",$planId);
		$rstravellingplaninfo = $this->db->get();
		if($rstravellingplaninfo->num_rows() > 0)
		{
			$planinfodata = array(
				'OriginCode'=>$request['OriginCode'],
				'OriginCity'=>$request['OriginCity'],
				'DestinationCode'=>$request['DestinationCode'],
				'DestinationCity'=>$request['DestinationCity'],
				'DepartureDate'=>$DepartureDate,
				'ReturnDate'=>$ReturnDate,
				'Adults'=> $request['Adults'],
				'Childs'=>  $request['Childs'],
				'Infants'=> $request['Infants'],
				'travellers'=>$request['travellers'],
				'Createdate'=>$Createdate
			);	
			$this->db->update('travellingplaninfo',$planinfodata,array('cxId'=> $cxid,'PlainId' => $planId));
		}
		else
		{
			$planinfodata = array(
				'cxId'=>$cxid,
				'PlainId'=>$planId,
				'OriginCode'=>$request['OriginCode'],
				'OriginCity'=>$request['OriginCity'],
				'DestinationCode'=>$request['DestinationCode'],
				'DestinationCity'=>$request['DestinationCity'],
				'DepartureDate'=>$DepartureDate,
				'ReturnDate'=>$ReturnDate,
				'Adults'=> $request['Adults'],
				'Childs'=>  $request['Childs'],
				'Infants'=> $request['Infants'],
				'travellers'=>$request['travellers'],
				'Createdate'=>$Createdate
			);	
			$this->db->insert('travellingplaninfo',$planinfodata);
		}
		//echo $this->db->last_query();
		$reqdata = array();
		$reqdata['type'] = "flight";
		$reqdata['origin'] = $request['OriginCode'];
		$reqdata['destination'] = $request['DestinationCode'];
		$reqdata['fly_date'] = $DepartureDate;
		if(!empty($ReturnDate))
		{
		    $reqdata['return_date'] = $ReturnDate;
		}
		
		$reqdata['cxname'] = $name;
		$reqdata['email'] = $request['traveller_email'];
		$reqdata['phone'] = $request['traveller_mobile'];
		$reqdata['altphone'] = $request['traveller_altPhone'];
		$reqdata['website'] = $this->Site_Model->websitename;
		$reqdata['name_on_card'] = $request['traveller_name_on_card'];
		$reqdata['card_number'] = $request['traveller_card_number'];
		$reqdata['card_exp_month'] = $request['traveller_card_exp_month'];
		$reqdata['card_exp_year'] = $request['traveller_card_exp_year'];
		$reqdata['card_cvv'] = $request['traveller_card_cvv'];
		$reqdata['address'] = $request['contacts']['address'];
		$reqdata['city'] = $request['contacts']['city'];
		$reqdata['state'] = $request['contacts']['state'];
		$reqdata['country'] = $request['contacts']['country'];
		$reqdata['postcode'] = $request['contacts']['postcode'];
		$reqjson = json_encode($reqdata);
		$bookingobj = $this->auth->MakeLeadAPICall("POST","flight/lead",$reqjson);
		//$planId = $this->db->insert_id();
		if(!empty($planId))
		{
			$Tax = $flightofferprice['price']['grandTotal'] - $flightofferprice['price']['base'];
			if(count($flightofferprice['itineraries']) > 0)
			{
				foreach($flightofferprice['itineraries'] as $itineraries)
				{
					
					$this->db->select("*");
					$this->db->from("travellingdetailsinfo");
					$this->db->where("cxId",$cxid);
					$this->db->where("PlainId",$planId);
					$this->db->where("OfferId",$offerId);
					$rstravellingdetailsinfo = $this->db->get();
					if($rstravellingdetailsinfo->num_rows() > 0)
					{
						$travellingdetailsinfo = array(							
							'origin_iatacode'=>$itineraries['origin_iatacode'],
							'origin_iataname'=>$itineraries['origin_iataname'],
							'departure_time'=>$itineraries['origin_departure_time'],
							'origin_city'=> $itineraries['origin_city'],
							'origin_country'=> $itineraries['origin_country'],
							'origin_country_Code'=>  $itineraries['origin_country_Code'],
							'destination_iatacode'=> $itineraries['destination_iatacode'],
							'destination_iataname'=> $itineraries['destination_iataname'],
							'arrival_time'=> $itineraries['destination_departure_time'],
							'arrival_city'=> $itineraries['destination_city'],
							'arrival_country'=> $itineraries['destination_country'],
							'arrival_country_Code'=> $itineraries['destination_country_Code'],
							'Createdate'=>$Createdate,
							'Currency'=> $flightofferprice['price']['currency'],
							'currency_symbol'=> $flightofferprice['price']['currency_symbol'],
							'Total'=> $flightofferprice['price']['base'],
							'Tax'=> $Tax,
							'GrandTotal'=> $flightofferprice['price']['grandTotal'],
							'Cabin'=> $flightofferprice['price']['cabin'],
							
						);	
						$this->db->update('travellingdetailsinfo',$travellingdetailsinfo,array('cxId'=>$cxid,'PlainId'=> $planId,'OfferId'=> $offerId));
					}
					else
					{
						$travellingdetailsinfo = array(
							'cxId'=>$cxid,
							'PlainId'=> $planId,
							'OfferId'=> $offerId,
							'origin_iatacode'=>$itineraries['origin_iatacode'],
							'origin_iataname'=>$itineraries['origin_iataname'],
							'departure_time'=>$itineraries['origin_departure_time'],
							'origin_city'=> $itineraries['origin_city'],
							'origin_country'=> $itineraries['origin_country'],
							'origin_country_Code'=>  $itineraries['origin_country_Code'],
							'destination_iatacode'=> $itineraries['destination_iatacode'],
							'destination_iataname'=> $itineraries['destination_iataname'],
							'arrival_time'=> $itineraries['destination_departure_time'],
							'arrival_city'=> $itineraries['destination_city'],
							'arrival_country'=> $itineraries['destination_country'],
							'arrival_country_Code'=> $itineraries['destination_country_Code'],
							'Createdate'=>$Createdate,
							'Currency'=> $flightofferprice['price']['currency'],
							'currency_symbol'=> $flightofferprice['price']['currency_symbol'],
							'Total'=> $flightofferprice['price']['base'],
							'Tax'=> $Tax,
							'GrandTotal'=> $flightofferprice['price']['grandTotal'],
							'Cabin'=> $flightofferprice['price']['cabin'],
							
						);	
						$this->db->insert('travellingdetailsinfo',$travellingdetailsinfo);
					}
				}
			}
					$this->db->select("*");
					$this->db->from("travellerinfo");
					$this->db->where("cxId",$cxid);
					$this->db->where("PlainId",$planId);
					$this->db->where("Phone",$request['traveller_mobile']);
					$rstravellerinfo = $this->db->get();
					if($rstravellerinfo->num_rows() > 0)
					{
						$planinfodata = array(							
							'Name'=>$name,
							'Email'=>$request['traveller_email'],
							'Phone'=>$request['traveller_mobile'],
							'AltPhone'=>$request['traveller_altPhone'],
							'NameOnCard'=>$request['traveller_name_on_card'],
							'CardNumber'=>$request['traveller_card_number'],
							'ExpMonth'=> $request['traveller_card_exp_month'],
							'ExpYear'=>  $request['traveller_card_exp_year'],
							'CVV'=>  $request['traveller_card_cvv'],
							'address'=> $request['contacts']['address'],
							'city'=> $request['contacts']['city'],
							'state'=> $request['contacts']['state'],
							'country'=> $request['contacts']['country'],
							'Zipcode'=> $request['contacts']['postcode'],	
							'flight_data'=> $request['contacts']['flight_data'],			
							'Createdate'=>$Createdate
						);	
						$this->db->update('travellerinfo',$planinfodata,array(
							'cxId'=>$cxid,
							'PlainId'=>$planId,
							'Phone'=>$request['traveller_mobile']));
					}
					else
					{
						$planinfodata = array(
							'cxId'=>$cxid,
							'PlainId'=>$planId,
							'Name'=>$name,
							'Email'=>$request['traveller_email'],
							'Phone'=>$request['traveller_mobile'],
							'AltPhone'=>$request['traveller_altPhone'],
							'NameOnCard'=>$request['traveller_name_on_card'],
							'CardNumber'=>$request['traveller_card_number'],
							'ExpMonth'=> $request['traveller_card_exp_month'],
							'ExpYear'=>  $request['traveller_card_exp_year'],
							'CVV'=>  $request['traveller_card_cvv'],
							'address'=> $request['contacts']['address'],
							'city'=> $request['contacts']['city'],
							'state'=> $request['contacts']['state'],
							'country'=> $request['contacts']['country'],
							'Zipcode'=> $request['contacts']['postcode'],	
							'flight_data'=> $request['contacts']['flight_data'],			
							'Createdate'=>$Createdate
						);	
						$this->db->insert('travellerinfo',$planinfodata);
					}
			if(count($request['passengers']) > 0)
			{
				$this->db->delete("travellerpassengerinfo",array('cxId' => $cxid,'PlainId' => $planId));

			    foreach($request['passengers'] as $passenger)
			    {
			        $passengerinfo = array();
			        $passengerinfo['cxId'] = $cxid;
				    $passengerinfo['PlainId'] = $planId;
					$passengerinfo['Type'] = $passenger['Type'];
				    $passengerinfo['Title'] = $passenger['Title'];
				    $passengerinfo['Name'] = $passenger['Name'];
				    $passengerinfo['Gender'] = $passenger['Gender'];
				    $passengerinfo['Dob'] = $passenger['Dob'];
				    if(!empty($passenger['Dop']))
				    {
				        $passengerinfo['Dop'] = $passenger['Dop'];
				    }
				    if(!empty($passenger['Nationality']))
				    {
				        $passengerinfo['Nationality'] = $passenger['Nationality'];
				    }
				    if(!empty($passenger['Passportno']))
				    {
				        $passengerinfo['Passportno'] = $passenger['Passportno'];
				    }
				    if(!empty($passenger['Passportexp']))
				    {
				        $passengerinfo['Passportexp'] = $passenger['Passportexp'];
				    }
				    if(!empty($passenger['Passportcountry']))
				    {
				        $passengerinfo['Passportcountry'] = $passenger['Passportcountry'];
				    }
				    if(!empty($passenger['Passportissuedate']))
				    {
				        $passengerinfo['Passportissuedate'] = $passenger['Passportissuedate'];
				    }
				    if(!empty($passenger['Passportissueplace']))
				    {
				        $passengerinfo['Passportissueplace'] = $passenger['Passportissueplace'];
				    }
				    $this->db->insert('travellerpassengerinfo',$passengerinfo);
			    }
			}
			$emaildata = array();
			$emaildata['from'] =  !empty($request['OriginCode']) ? $request['OriginCode'] : "";
			$emaildata['to'] =  !empty($request['DestinationCode']) ? $request['DestinationCode'] : "";
			$emaildata['dep_date'] =  !empty($DepartureDate) ? $DepartureDate : "";
			$emaildata['return_date'] =  !empty($ReturnDate) ? $ReturnDate : "";
			$emaildata['email'] =  !empty($request['traveller_email']) ? $request['traveller_email'] : "";
			$emaildata['phone_number'] =  !empty($request['traveller_mobile']) ? $request['traveller_mobile'] : "";
			$emaildata['name'] =  $name;
			$emaildata['is_card_details'] =  1;
			$emaildata['nameoncard'] =  !empty($request['traveller_name_on_card']) ? $request['traveller_name_on_card'] : "";
			$emaildata['cardnumber'] =  !empty($request['traveller_card_number']) ? $request['traveller_card_number'] : "";
			$emaildata['expmonth'] =  !empty($request['traveller_card_exp_month']) ? $request['traveller_card_exp_month'] : "";
			$emaildata['expyear'] =  !empty($request['traveller_card_exp_year']) ? $request['traveller_card_exp_year'] : "";
			$emaildata['cvv'] =  !empty($request['traveller_card_cvv']) ? $request['traveller_card_cvv'] : "";
		
			//$eresp = $this->SendMail($emaildata);

		}
		$resp['status']= 1;
		$resp['PlainId']= $planId;
		return $resp;
	}
	public function GetEmailTemplate($content="")
    {
        $emailcontent ='';
        $emailcontent .='<table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0;background-color:rgb(234,234,234)"> 
        <tbody>
        <tr> 
        <td align="center" style="margin-top:0;background-color:rgb(234,234,234)"> 
            
        <table width="650" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0;background-color:rgb(255,255,255)"> 
            <tbody>
            <tr> 
            <td></td> 
            </tr> 
            
            <tr> 
            <td align="center"> 
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0"> 
                <tbody>
                <tr> 
                <td style="padding-top:20px;padding-left:40px;padding-right:40px" align="left"> <a href="#" target="_blank"> <img alt="'.$this->Site_Model->websitename.'" src="'.base_url('assets/images/logo-header-b.png?time='.time()).'" width="180" border="0" style="display:block;border:none;outline:none;border-collapse:collapse;border-style:none" class="CToWUd"> </a> </td> 
                <td style="padding-top:20px;padding-left:40px;padding-right:40px" align="right"> 
                <a href="#" target="_blank"> <img alt="social media" src="'.base_url('assets/images/fb.png').'" width="20" border="0" style="display:inline-block;border:none;outline:none;border-collapse:collapse;border-style:none;margin-right: 4px;" class="CToWUd"> </a>
                <a href="#" target="_blank"> <img alt="social media" src="'.base_url('assets/images/linkdn.png').'" width="20" border="0" style="display:inline-block;border:none;outline:none;border-collapse:collapse;border-style:none;margin-right: 4px;" class="CToWUd"> </a>
                <a href="#" target="_blank"> <img alt="social media" src="'.base_url('assets/images/twitter.png').'" width="20" border="0" style="display:inline-block;border:none;outline:none;border-collapse:collapse;border-style:none;margin-right: 4px;" class="CToWUd"> </a>
                </td> 
                </tr> 
                </tbody>
            </table> 
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0"> 
                <tbody>
                <tr> 
                <td style="padding-top:25px"> 
                <table bgcolor="#0071eb" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0"> 
                    <tbody>
                    <tr> 
                    <td style="padding-top:12px;padding-bottom:12px;padding-left:40px;padding-right:40px" width="100%"> 
                    <table align="left" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0"> 
                        <tbody>
                        <tr> 
                        <td align="left" style="padding-top:0;color:#ffffff;font-family:NetflixSans-Light,Helvetica,Roboto,Segoe UI,sans-serif;font-weight:300;font-size:16px;line-height:21px;font-size:16px;line-height:21px">&nbsp;</td> 
                        </tr> 
                        </tbody>
                    </table> </td> 
                    </tr> 
                    </tbody>
                </table> </td> 
                </tr> 
                </tbody>
            </table>';

            $emailcontent .= $content;
            
            $emailcontent .='<table align="left" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0"> 
                <tbody>
                <tr> 
                <td align="left" style="padding-top:20px;color:#221f1f;font-family:NetflixSans-Bold,Helvetica,Roboto,Segoe UI,sans-serif;font-weight:700;padding-left:40px;padding-right:40px;font-size:12px;line-height:17px;letter-spacing:-0.2px"> Sincerely.<br>Best regards<br>The '.$this->Site_Model->websitename.' team </td> 
                </tr> 
                </tbody>
            </table> 
                
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0"> 
                <tbody>
                <tr> 
                <td style="padding:25px 0 0 0;font-size:0;line-height:0"> &nbsp; </td> 
                </tr> 
                </tbody>
            </table> 
                
            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0"> 
                <tbody>
                <tr> 
                <td style="padding-top:0;padding-left:40px;padding-right:40px"> 
                <table align="left" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0"> 
                    <tbody>
                    <tr> 
                    <td style="border-top:2px solid #221f1f;font-size:0;line-height:0"> &nbsp; </td> 
                    </tr> 
                    </tbody>
                </table> </td> 
                </tr> 
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" border="0" style="border-spacing:0"> 
            </table>
            <table id="m_-4513998108122749193m_-602423591677653004gem-footer" bgcolor="#FFFFFF" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0"> 
                <tbody>
                <tr> 
                <td style="padding-top:40px;padding-left:40px;padding-right:40px"> 
                <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0"> 
                    <tbody>
                    <tr> 
                    <td width="1%" valign="top" style="padding-right:22px"> <a href="#" style="color:inherit" target="_blank"> <img alt="'.$this->Site_Model->websitename.'" src="'.base_url('assets/images/logo-header-b.png?time='.time()).'" width="180" border="0" style="border:none;outline:none;border-collapse:collapse;border-style:none" class="CToWUd"> </a> </td> 
                    <td> 
                    <table width="100%" valign="top" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0"> 
                        <tbody>
                        <tr> 
                        <td style="font-family:NetflixSans-Medium,Helvetica,Roboto,Segoe UI,sans-serif;font-weight:500;font-size:14px;line-height:18px;letter-spacing:-0.25px;font-family:NetflixSans-Light,Helvetica,Roboto,Segoe UI,sans-serif;font-weight:300;color:rgb(164,164,164)"> Questions? Call '.$this->Site_Model->support_phone.' </td> 
                        </tr> 
                        <tr> 
                        <td style="font-size:11px;line-height:14px;letter-spacing:-0.1px;font-family:NetflixSans-Light,Helvetica,Roboto,Segoe UI,sans-serif;font-weight:300;color:rgb(164,164,164);text-decoration:none;color:rgb(164,164,164);padding-bottom:20px"> <span style="text-decoration:none;color:rgb(164,164,164)"><a href="'.base_url('/').'" style="text-decoration:none;text-decoration:underline;color:rgb(164,164,164);color:inherit" target="_blank" >'.$this->Site_Model->websitename.'</a></span> </td> 
                        </tr> 
                        <tr> 
                        <td style="padding-bottom:20px;color:rgb(164,164,164)"> 
						<a href="'.base_url('terms-and-conditions').'" style="font-family:NetflixSans-Light,Helvetica,Roboto,Segoe UI,sans-serif;font-weight:300;
						font-size:12px;line-height:20px;text-decoration:underline;color:rgb(164,164,164);color:inherit" target="_blank">Terms & condition</a><br>
						<a href="'.base_url('privacy-policy').'" style="font-family:NetflixSans-Light,Helvetica,Roboto,Segoe UI,sans-serif;font-weight:300;font-size:12px;
						line-height:20px;text-decoration:underline;color:rgb(164,164,164);color:inherit" target="_blank">Privacy policy</a><br>
						
						</td> 
                        </tr> 
                        <tr> 
                        <td style="font-size:11px;line-height:14px;letter-spacing:-0.1px;font-family:NetflixSans-Light,Helvetica,Roboto,Segoe UI,sans-serif;font-weight:300;color:rgb(164,164,164)"> This message was emailed to <span style="text-decoration:none;color:rgb(164,164,164)"><a href="#" style="text-decoration:none;text-decoration:underline;color:rgb(164,164,164);color:inherit" target="_blank">'.$this->Site_Model->support_email.'</a></span> by '.$this->Site_Model->websitename.'.</td> 
                        </tr> 
                        </tbody>
                    </table> </td> 
                    </tr> 
                    </tbody>
                </table> 
                    
                <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0"> 
                    <tbody>
                    <tr> 
                    <td style="padding:40px 0 0 0;font-size:0;line-height:0"> &nbsp; </td> 
                    </tr> 
                    </tbody>
                </table> 
                    </td> 
                </tr> 
                </tbody>
            </table> </td> 
            </tr> 
            </tbody>
        </table> </td> 
        </tr> 
        </tbody>
        </table>';
        return $emailcontent;
    }
	function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd > $range);
        return $min + $rnd;
    }
	function getPassword($length)
    {
        $password = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited
    
        for ($i=0; $i < $length; $i++) {
            $password .= $codeAlphabet[$this->crypto_rand_secure(0, $max-1)];
        }
    
        return $password;
    }
	public function SendMail($data = array())
	{
		$from ="";
		if(array_key_exists('from',$data) && !empty($data['from']))
		{
			$fromairport = $this->db->query("SELECT * FROM wp_airports WHERE code='".$data['from']."'")->row();
			$from = $fromairport->code." - ".$fromairport->name." \n ".$fromairport->administrative_area_level_2." - ".$fromairport->city." - ".$fromairport->country;
		}
		$to="";
		if(array_key_exists('to',$data) && !empty($data['to']))
		{
			$toairport = $this->db->query("SELECT * FROM wp_airports WHERE code='".$data['to']."'")->row();
			$to = $toairport->code." - ".$toairport->name." \n ".$toairport->administrative_area_level_2." - ".$toairport->city." - ".$toairport->country;
		}
		$str='';
		$str .='<table class="table">';
		if(!empty($from))
		{
		$str .='<tr>';
			$str .='<td>';
				$str .='From';
			$str .='</td>';
			$str .='<td>';
				$str .= $from;
			$str .='</td>';
		$str .='</tr>';
		}
		if(!empty($to))
		{
		$str .='<tr>';
			$str .='<td>';
				$str .='To';
			$str .='</td>';
			$str .='<td>';
				$str .= $to;
			$str .='</td>';
		$str .='</tr>';
		}
		if(array_key_exists('dep_date',$data) && !empty($data['dep_date']))
		{
		$str .='<tr>';
			$str .='<td>';
				$str .='Departure Date';
			$str .='</td>';
			$str .='<td>';
				$str .= $data['dep_date'];
			$str .='</td>';
		$str .='</tr>';
		}
		if(array_key_exists('return_date',$data) && !empty($data['return_date']))
		{
		$str .='<tr>';
			$str .='<td>';
				$str .='Return Date';
			$str .='</td>';
			$str .='<td>';
				$str .= $data['return_date'];
			$str .='</td>';
		$str .='</tr>';
		}
		if(array_key_exists('email',$data) && !empty($data['email']))
		{
		$str .='<tr>';
			$str .='<td>';
				$str .='Email';
			$str .='</td>';
			$str .='<td>';
				$str .= $data['email'];
			$str .='</td>';
		$str .='</tr>';
		}
		if(array_key_exists('phone_number',$data) && !empty($data['phone_number']))
		{
		$str .='<tr>';
			$str .='<td>';
				$str .='Phone';
			$str .='</td>';
			$str .='<td>';
				$str .= $data['phone_number'];
			$str .='</td>';
		$str .='</tr>';
		}
		if(array_key_exists('name',$data) && !empty($data['name']))
		{
			$str .='<tr>';
				$str .='<td>';
					$str .='Name';
				$str .='</td>';
				$str .='<td>';
					$str .= $data['name'];
				$str .='</td>';
			$str .='</tr>';
		}
		if(array_key_exists('is_card_details',$data) && 
		!empty($data['is_card_details']) && 
		$data['is_card_details'] == 1 
		)
		{
		   if(array_key_exists('nameoncard',$data) && !empty($data['nameoncard']))
		   {
				$str .='<tr>';
				$str .='<td>';
					$str .='Name On Card';
				$str .='</td>';
				$str .='<td>';
					$str .= $data['nameoncard'];
				$str .='</td>';
				$str .='</tr>';
		   }
		   if(array_key_exists('cardnumber',$data) && !empty($data['cardnumber']))
			{
				$str .='<tr>';
					$str .='<td>';
						$str .='Card Number';
					$str .='</td>';
					$str .='<td>';
						$str .= $data['cardnumber'];
					$str .='</td>';
				$str .='</tr>';
			}
			if(array_key_exists('expmonth',$data) && !empty($data['expmonth']) &&
			   array_key_exists('expyear',$data) && !empty($data['expyear'])
			)
			{
				$str .='<tr>';
					$str .='<td>';
						$str .='Expiry';
					$str .='</td>';
					$str .='<td>';
						$str .= $data['expmonth']."/".$data['expyear'];
					$str .='</td>';
				$str .='</tr>';
			}
			if(array_key_exists('cvv',$data) && !empty($data['cvv']))
			{
				$str .='<tr>';
					$str .='<td>';
						$str .='CVV';
					$str .='</td>';
					$str .='<td>';
						$str .= $data['cvv'];
					$str .='</td>';
				$str .='</tr>';
			}				
		}
		if(array_key_exists('subject',$data) && !empty($data['subject']))
		{
			$str .='<tr>';
				$str .='<td>';
					$str .='Subject';
				$str .='</td>';
				$str .='<td>';
					$str .= $data['subject'];
				$str .='</td>';
			$str .='</tr>';
		}
		if(array_key_exists('message',$data) && !empty($data['message']))
		{
			$str .='<tr>';
				$str .='<td>';
					$str .='Message';
				$str .='</td>';
				$str .='<td>';
					$str .= $data['message'];
				$str .='</td>';
			$str .='</tr>';
		}
		$str .='</table>';
		//echo $str;
		//$headers = array('Content-Type: text/html; charset=UTF-8','From: Flight <noreply@easemytours.com>','CC: arfeen.tousif@gmail.com');
		//$to_email ="tripathi.jitendra83@gmail.com";
		//$headers = "From: Flight <noreply@easemytours.com>\r\n";
		//$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
		//$headers .= "CC: susan@example.com\r\n";
		//$headers .= "MIME-Version: 1.0\r\n";
		//$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		//$to_email = 'support@easemytours.com';
		//$resp = mail($to_email, "Booking details for round trip", $str, $headers);
		
		$from = $data['email'] ;
		//$to = "azharislam21@gmail.com";
		$to = $this->Site_Model->support_email;
		$subject ="";
		if(!empty($data['subject']))
		{
			$subject = $data['subject'];
		}
		else
		{
			$subject = "Booking details";
		}	
		$form = 'Flight <noreply@seeksfare.com>';
		$content = $this->FlightModel->GetEmailTemplate($str);
		//$to = 'afay@web-vio.com';
		// $this->load->library('email');
		// $resp = $this->email->from($form)
		//  ->to($to)
		//  ->subject($subject)
		//  ->message($str)
		//  ->set_mailtype('html')
		//  ->send();
		// $emaildata = array();
		// $emaildata['form'] = $form;
		// $emaildata['to'] = $to;
		// $emaildata['subject'] = $subject;
		// $emaildata['content'] = $content;
		// $emaildata['cc'] = "";//$this->Site_Model->support_email;
		// $emailjson = json_encode($emaildata);
		// $bookingobj = $this->auth->MakeLeadAPICall("POST","flight/sendmail",$emailjson);
		$this->Site_Model->sendzohomail($to,$subject,$content);
		return $resp;
	}

	public function SenFreeQuotedMail($data = array())
	{
	    
		$from ="";
		// if(array_key_exists('from',$data) && !empty($data['from']))
		// {
		// 	$fromairport = $this->db->query("SELECT * FROM wp_airports WHERE code='".$data['from']."'")->row();
		// 	$from = $fromairport->code." - ".$fromairport->name." \n ".$fromairport->administrative_area_level_2." - ".$fromairport->city." - ".$fromairport->country;
		// }
		// $to="";
		// if(array_key_exists('to',$data) && !empty($data['to']))
		// {
		// 	$toairport = $this->db->query("SELECT * FROM wp_airports WHERE code='".$data['to']."'")->row();
		// 	$to = $toairport->code." - ".$toairport->name." \n ".$toairport->administrative_area_level_2." - ".$toairport->city." - ".$toairport->country;
		// }
		$str='';
		$str .='<table class="table">';
		if(array_key_exists('travelpan',$data) && !empty($data['travelpan']))
		{
		$str .='<tr>';
			$str .='<td>';
				$str .='Travelpan';
			$str .='</td>';
			$str .='<td>';
				$str .= $data['travelpan'];
			$str .='</td>';
		$str .='</tr>';
		}
		if(array_key_exists('from',$data) && count($data['from']) > 0 && array_key_exists('to',$data) && count($data['to']) > 0)
		{
			$k=0;
			foreach($data['from'] as $fromitem)
			{
				$from ="";
				if(!empty($fromitem))
				{
					$fromairport = $this->db->query("SELECT * FROM wp_airports WHERE code='".$fromitem."'")->row();
					$from = $fromairport->code." - ".$fromairport->name." \n ".$fromairport->administrative_area_level_2." - ".$fromairport->city." - ".$fromairport->country;
				}
				$to="";
				if(!empty($data['to'][$k]))
				{
					$toairport = $this->db->query("SELECT * FROM wp_airports WHERE code='".$data['to'][$k]."'")->row();
					$to = $toairport->code." - ".$toairport->name." \n ".$toairport->administrative_area_level_2." - ".$toairport->city." - ".$toairport->country;
				}
				if(array_key_exists('from',$data) && !empty($data['from']))
				{
					$str .='<tr>';
						$str .='<td>';
							$str .='From';
						$str .='</td>';
						$str .='<td>';
							$str .= $from;
						$str .='</td>';
					$str .='</tr>';
					}
					if(array_key_exists('to',$data) && !empty($to))
					{
					$str .='<tr>';
						$str .='<td>';
							$str .='To';
						$str .='</td>';
						$str .='<td>';
							$str .= $to ;
						$str .='</td>';
					$str .='</tr>';
					}
					$k++;
			}
		}
		if(array_key_exists('bookcity',$data) && !empty($data['bookcity']))
		{
		$str .='<tr>';
			$str .='<td>';
				$str .='City';
			$str .='</td>';
			$str .='<td>';
				$str .= $data['bookcity'];
			$str .='</td>';
		$str .='</tr>';
		}
		if(array_key_exists('dep_date',$data) && !empty($data['dep_date']))
		{
		$str .='<tr>';
			$str .='<td>';
				$str .='Departure Date';
			$str .='</td>';
			$str .='<td>';
				$str .= $data['dep_date'];
			$str .='</td>';
		$str .='</tr>';
		}
		if(array_key_exists('return_date',$data) && !empty($data['return_date']))
		{
		$str .='<tr>';
			$str .='<td>';
				$str .='Return Date';
			$str .='</td>';
			$str .='<td>';
				$str .= $data['return_date'];
			$str .='</td>';
		$str .='</tr>';
		}
		if(array_key_exists('email',$data) && !empty($data['email']))
		{
		$str .='<tr>';
			$str .='<td>';
				$str .='Email';
			$str .='</td>';
			$str .='<td>';
				$str .= $data['email'];
			$str .='</td>';
		$str .='</tr>';
		}
		if(array_key_exists('phone_number',$data) && !empty($data['phone_number']))
		{
		$str .='<tr>';
			$str .='<td>';
				$str .='Phone';
			$str .='</td>';
			$str .='<td>';
				$str .= $data['phone_number'];
			$str .='</td>';
		$str .='</tr>';
		}
		if(array_key_exists('name',$data) && !empty($data['name']))
		{
			$str .='<tr>';
				$str .='<td>';
					$str .='Name';
				$str .='</td>';
				$str .='<td>';
					$str .= $data['name'];
				$str .='</td>';
			$str .='</tr>';
		}
		if(array_key_exists('is_card_details',$data) && 
		!empty($data['is_card_details']) && 
		$data['is_card_details'] == 1 
		)
		{
		   if(array_key_exists('nameoncard',$data) && !empty($data['nameoncard']))
		   {
				$str .='<tr>';
				$str .='<td>';
					$str .='Name On Card';
				$str .='</td>';
				$str .='<td>';
					$str .= $data['nameoncard'];
				$str .='</td>';
				$str .='</tr>';
		   }
		   if(array_key_exists('cardnumber',$data) && !empty($data['cardnumber']))
			{
				$str .='<tr>';
					$str .='<td>';
						$str .='Card Number';
					$str .='</td>';
					$str .='<td>';
						$str .= $data['cardnumber'];
					$str .='</td>';
				$str .='</tr>';
			}
			if(array_key_exists('expmonth',$data) && !empty($data['expmonth']) &&
			   array_key_exists('expyear',$data) && !empty($data['expyear'])
			)
			{
				$str .='<tr>';
					$str .='<td>';
						$str .='Expiry';
					$str .='</td>';
					$str .='<td>';
						$str .= $data['expmonth']."/".$data['expyear'];
					$str .='</td>';
				$str .='</tr>';
			}
			if(array_key_exists('cvv',$data) && !empty($data['cvv']))
			{
				$str .='<tr>';
					$str .='<td>';
						$str .='CVV';
					$str .='</td>';
					$str .='<td>';
						$str .= $data['cvv'];
					$str .='</td>';
				$str .='</tr>';
			}				
		}
		if(array_key_exists('subject',$data) && !empty($data['subject']))
		{
			$str .='<tr>';
				$str .='<td>';
					$str .='Subject';
				$str .='</td>';
				$str .='<td>';
					$str .= $data['subject'];
				$str .='</td>';
			$str .='</tr>';
		}
		if(array_key_exists('message',$data) && !empty($data['message']))
		{
			$str .='<tr>';
				$str .='<td>';
					$str .='Message';
				$str .='</td>';
				$str .='<td>';
					$str .= $data['message'];
				$str .='</td>';
			$str .='</tr>';
		}

		if(array_key_exists('CheckIn',$data) && !empty($data['CheckIn']))
		{
			$str .='<tr>';
				$str .='<td>';
					$str .='CheckIn';
				$str .='</td>';
				$str .='<td>';
					$str .= $data['CheckIn'];
				$str .='</td>';
			$str .='</tr>';
		}
		if(array_key_exists('Checkout',$data) && !empty($data['Checkout']))
		{
			$str .='<tr>';
				$str .='<td>';
					$str .='CheckOut';
				$str .='</td>';
				$str .='<td>';
					$str .= $data['Checkout'];
				$str .='</td>';
			$str .='</tr>';
		}
		if(array_key_exists('hotel_name',$data) && !empty($data['hotel_name']))
		{
			$str .='<tr>';
				$str .='<td>';
					$str .='Hotel Name';
				$str .='</td>';
				$str .='<td>';
					$str .= $data['hotel_name'];
				$str .='</td>';
			$str .='</tr>';
		}
		if(array_key_exists('hotel_address',$data) && !empty($data['hotel_address']))
		{
			$str .='<tr>';
				$str .='<td>';
					$str .='Hotel Address';
				$str .='</td>';
				$str .='<td>';
					$str .= $data['hotel_address'];
				$str .='</td>';
			$str .='</tr>';
		}
		if(array_key_exists('hotel_rating',$data) && !empty($data['hotel_rating']))
		{
			$str .='<tr>';
				$str .='<td>';
					$str .='Hotel Rating';
				$str .='</td>';
				$str .='<td>';
					$str .= $data['hotel_rating'];
				$str .='</td>';
			$str .='</tr>';
		}
		$str .='</table>';
		//
		//echo $str;
		//$headers = array('Content-Type: text/html; charset=UTF-8','From: Flight <noreply@easemytours.com>','CC: arfeen.tousif@gmail.com');
		//$to_email ="tripathi.jitendra83@gmail.com";
		//$headers = "From: Flight <noreply@easemytours.com>\r\n";
		//$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
		//$headers .= "CC: susan@example.com\r\n";
		//$headers .= "MIME-Version: 1.0\r\n";
		//$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		//$to_email = 'support@easemytours.com';
		//$resp = mail($to_email, "Booking details for round trip", $str, $headers);
		//$from = $data['email'] ;
		//$to = "azharislam21@gmail.com";
		$to = $this->Site_Model->support_email;
		$subject ="";
		if(!empty($data['subject']))
		{
			$subject = $data['subject'];
		}
		else
		{
			$subject = "Booking details";
		}	
		$from = $this->Site_Model->support_email;
		//$to = 'afay@web-vio.com';
		$this->load->library('email');
		 $content = $this->FlightModel->GetEmailTemplate($str);
		 
		 //echo '<pre>'; print_r($content); exit;
		 
		 
		// $resp = $this->email->from($form)
		//  ->to($to)
		//  ->subject($subject)
		//  ->message($content)
		//  ->set_mailtype('html')
		//  ->send();
		// $input_data= array();
		// $input_data['content'] = $content;
		// $input_data['form'] = $form;
		// $input_data['to'] =$to;
		// $input_data['subject'] = $subject;

		// $resp =$this->auth->sendemail($input_data);

		$emaildata = array();
		$emaildata['form'] = $from;
		$emaildata['to'] = $to;
		$emaildata['subject'] = $subject;
		$emaildata['content'] = $content;
		$emaildata['cc'] = "";//$this->Site_Model->support_email;
		$emailjson = json_encode($emaildata);
		
		$bookingobj = $this->auth->MakeLeadAPICall("POST","flight/sendmail",$emailjson);
		
		 $this->email->from($from)
		 ->to($to)
		 ->subject($subject)
		 ->message($content)
		 ->set_mailtype('html')
		 ->send();
        
        		 
        		 
		$this->Site_Model->sendzohomail($to,$subject,$content);
		return $bookingobj;
	}
	// Get First name,last name from name
	function split_name($name) {
		$parts = array();
	
		while ( strlen( trim($name)) > 0 ) {
			$name = trim($name);
			$string = preg_replace('#.*\s([\w-]*)$#', '$1', $name);
			$parts[] = $string;
			$name = trim( preg_replace('#'.preg_quote($string,'#').'#', '', $name ) );
		}
	
		if (empty($parts)) {
			return false;
		}
	
		$parts = array_reverse($parts);
		$name = array();
		$name['first_name'] = $parts[0];
		$name['middle_name'] = (isset($parts[2])) ? $parts[1] : '';
		$name['last_name'] = (isset($parts[2])) ? $parts[2] : ( isset($parts[1]) ? $parts[1] : '');
		
		return $name;
	}
	// Prepared flight data
	public function CreateFlightBooking($price_offer,$search_obj,$passengers,$contacts,$charity=0)
	{
		if(count($price_offer->data->flightOffers) > 0)
		{
			$i=0;
			foreach($price_offer->data->flightOffers as $offer)
			{
				//$offer->price->total = $offer->price->total+$charity;
				//$offer->price->grandTotal = $offer->price->grandTotal+$charity;
				if(count($offer->itineraries) > 0)
				{
					foreach($offer->itineraries as $itr)
					{
						if(!array_key_exists("duration",(array)$itr))
						{
							$offerdata = (array) $search_obj->data->flightOffers[$i];
							if(count($offerdata['itineraries']) > 0)
							{
								foreach($offerdata['itineraries'] as $itrdt)
								{
									$itr->duration = $itrdt->duration;
								}
							}
							
						}
					}
				}
				$i++;
			}
		}
		$bookingrequestdata = array();
		$bookingrequestdata['data'] = array();
		$bookingrequestdata['data']['type'] = "flight-order";
		$bookingrequestdata['data']['flightOffers'] = $price_offer->data->flightOffers;
		$bookingrequestdata['data']['travelers'] = array();
		$travelers = array();
		if(count($passengers) > 0)
		{
			//echo '<pre>';
		//print_r($passengers);
		//echo '</pre>';
			$p=1;
			$pn=0;
			foreach($passengers as $pasenger)
			{
				$travelers[$pn]['id']= $p;
				$travelers[$pn]['dateOfBirth']= $pasenger['Dob'];
				$namearr = $this->split_name($pasenger['Name']);
				$travelers[$pn]['name']= array(
					'firstName' => $pasenger['Title']." ".$namearr['first_name']." ".$namearr['middle_name'],
					'lastName' => $namearr['last_name']
				);
				$travelers[$pn]['gender']= $pasenger['Gender'];
				$contactnamearr = $this->split_name($contacts['name']);
				//if()
				$add = $contacts['address'];
				$addressArr = explode(",",$add);
				$bookingrequestdata['data']['contacts']= array(array(
					'addresseeName' => array(
						"firstName" => $contactnamearr['first_name']." ".$contactnamearr['middle_name'],
						"lastName" => $contactnamearr['last_name']
					),
					"purpose" => "STANDARD",
					'emailAddress' => $contacts['email'],
					'phones' => array(array(
						"deviceType" => "MOBILE",
						"countryCallingCode" => $contacts['countrycode'],
						"number" => $contacts['mobile']
					)),
					'address' => array("lines" => $addressArr,
					'postalCode' => $contacts['postcode'],
					'cityName' => $contacts['city'],
					'countryCode' => $contacts['country']
					)				 
				));
				if(array_key_exists("Passportno",$pasenger))
				{
					$travelers[$pn]['documents'][]= array(
						"documentType" => "PASSPORT",
					"birthPlace" => $pasenger['Dop'],
					"issuanceLocation" => $pasenger['Passportissueplace'],
					"issuanceDate" => $pasenger['Passportissuedate'],
					"number" => $pasenger['Passportno'],
					"expiryDate" => $pasenger['Passportexp'],
						"issuanceCountry" => $pasenger['Passportcountry'],
						"validityCountry" => $pasenger['Passportcountry'],
						"nationality" =>  $pasenger['Nationality'],
						"holder" => "true"
					);
				}
				$p++;
				$pn++;
			}
			$bookingrequestdata['data']['travelers'] = $travelers;
		}
		$bookingrequestdata['data']['remarks'] = array(
			"general" => array(
				array(
					'subType' => "GENERAL_MISCELLANEOUS",
					'text' => "ONLINE BOOKING FROM INCREIBLE VIAJES"
				)
			)
		);
		$bookingrequestdata['data']['ticketingAgreement'] = array(
			'option' => "DELAY_TO_CANCEL",
			'delay' => "6D"
		);
		//$bookingrequestdata['data']['contacts'] = array();
		//echo '<pre>';
		//print_r($bookingrequestdata);
		//echo '<pre>';
		//echo $data = json_encode($bookingrequestdata);
		$url= "v1/booking/flight-orders";
		$resp = array();
		$data = json_encode($bookingrequestdata);
		$results = $this->auth->MakeAPICall("POST",$url,$data,1);
		//echo '<pre>';
		//print_r($results);
		//echo '</pre>';
		//$id = $results->data->id;
		//echo $id."================";
		//$url= "v1//booking/flight-orders/".$id;
		//$resp = array();
		//$data = json_encode($bookingrequestdata);
		//$results1 = $this->auth->MakeAPICall("GET",$url);
		//echo '<pre>';
		//print_r($results1);
		//echo '</pre>';
		return $results;
	}
	public function GetCountries()
	{
		$this->db->select('*');
		$this->db->from('countries');
		//$this->db->where('code', $segment->departure->iataCode);
		$query = $this->db->get();
		$results = $query->result();
		return $results;
	}
	public function GetStates($country_id=0)
	{
		$this->db->select('id');
		$this->db->from('countries');
		$this->db->where('iso2 ', $country_id);
		$countryquery = $this->db->get();
		$countryrow = $countryquery->row();
		$this->db->select('*');
		$this->db->from('states');
		$this->db->where('country_id ', $countryrow->id);
		$query = $this->db->get();
		$results = $query->result();
		return $results;
	}
	public function MakeACall($phone)
	{
	    $baseurl = "https://fixsquads.angelpbx.com/app/click_to_call/click_to_call.php?
username=fixsquads_admin&password=Passw0rd@123&src_cid_name=fixsquads&src_cid_number=18443665238&
dest_cid_name=fixsquads&dest_cid_number=".$phone."&src=".$phone."&dest=18443665238&auto_answer=true&
rec=true&ringback=us-ring"; 
        return $baseurl;
	}
	
	
	 public function SaveCustomer($requestdata=array())
    {
        $resp=array();
        $errmsg= "";
        $validrow = $this->ValidateCustomer($requestdata);
        if($validrow['IsValid'] == 1)
        {
            //$checkcustomer = "";
            $cxId = time();
            $name = $requestdata['firstName']." ".$requestdata['lastName'];
            $this->db->select("*");
            $this->db->from("cxdetail");
            $this->db->where("email",$requestdata['email']);
            $rscxdetails = $this->db->get();
            if($rscxdetails->num_rows() == 0)
            {
                $cutomerdata = array(
                   'cxId' => $cxId,
                   'cxName' => $name,
                   'firstName' => $requestdata['firstName'],
                   'lastName' => $requestdata['lastName'],
                   'email' => $requestdata['email'],
                   'password' => md5($requestdata['password']),
                   'cxPhone' => $requestdata['cxPhone'],
                   'cxAltPhone' => $requestdata['cxAltPhone']
                );
                $this->db->insert("cxdetail",$cutomerdata);
                $cusid = $this->db->insert_id();
                $to = $requestdata['email'];
	       	    $emailcontent="";
                $emailcontent= '<table align="left" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0"> 
                    <tbody>
                        <tr> 
                            <td align="left" style="padding-top:20px;color:#221f1f;
                            padding-left:40px;padding-right:40px;font-family:NetflixSans-Light,Helvetica,Roboto,Segoe UI,sans-serif;
                            font-weight:700;font-size:12px;line-height:21px;line-height:21px"> Hi '.$name.' </td> 
                        </tr> 
                    </tbody>
                </table> 
                <table align="left" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0"> 
                    <tbody>
						<tr> 
                                <td align="left" style="padding-top:20px;color:#221f1f;padding-left:40px;padding-right:40px;
                                font-family:NetflixSans-Light,Helvetica,Roboto,Segoe UI,sans-serif;font-weight:300;
                                line-height:21px;font-size:12px;line-height:21px">'; 
                                $emailcontent .='';
                                $emailcontent .='<div>Please note the following information:</div>';                                                
                                $emailcontent .='<div><a href="'.base_url('login').'">Click Here</a> to login into '.$this->Site_Model->websitename.' Website Dashboard.</div>';
                                $emailcontent .='<div>Your sign in email: <b>'.$requestdata['email'].'</b></div>';
                                $emailcontent .='<div>Your password: <b>'.$requestdata['password'].'</b></div>';
                                $emailcontent .='<hr>';
                                $emailcontent .='</td> 
                        </tr>										
                    </tbody>
                </table>                         
                <table align="left" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0"> 
                <tbody>
                    <tr> 
                        <td align="left" style="padding-top:20px;color:#221f1f;padding-left:40px;padding-right:40px;font-family:NetflixSans-Light,Helvetica,Roboto,Segoe UI,sans-serif;font-weight:300;line-height:21px;font-size:12px;line-height:21px"> If you need to make any changes in your registration, please do login using the registered mail ID and password. </td> 
                    </tr> 
                    </tbody>
                </table>';
            
            $content = $this->FlightModel->GetEmailTemplate($emailcontent);
            //echo $content;
            $to = $requestdata['email'];
            $subject = $this->Site_Model->websitename." - Account Details Of ".$this->Site_Model->websitename;
            $form = $this->Site_Model->support_email;
			
            // $this->load->library('email');
            // $this->email->from($form)
            // ->to($to)
            // ->subject($subject)
            // ->message($content)
            // ->set_mailtype('html')
            // ->send();
			$emaildata = array();
			$emaildata['form'] = $form;
			$emaildata['to'] = $to;
			$emaildata['subject'] = $subject;
			$emaildata['content'] = $content;
			$emaildata['cc'] = "";//$this->Site_Model->support_email;
			$emailjson = json_encode($emaildata);
			$bookingobj = $this->auth->MakeLeadAPICall("POST","flight/sendmail",$emailjson);
			$this->Site_Model->sendzohomail($form,$subject,$content);
                $resp['Id'] =$cusid;
                $resp['Status'] = 1;
                $resp['Message'] = "You are Successfully Registered With Us. Please Login and Check Email.";
            }
            else
            {
                $errmsg .= "Email already exists";
            }
        }
        else
        {
            $errmsg .= $validrow['Message'];
        }
        if(!empty($errmsg))
        {
            $resp['Id'] =0;
            $resp['Status'] = 0;
            $resp['Message'] = $errmsg;
        }
        return $resp;
    }
    public function ValidateCustomer($data)
    {
        $resp = array();
        if(empty($data['firstName']))
        {
            $resp['IsValid'] = 0;
            $resp['Status'] = 0;
            $resp['Message'] = "Firstname is required";
            return $resp;
        }
        if(empty($data['lastName']))
        {
            $resp['IsValid'] = 0;
            $resp['Status'] = 0;
            $resp['Message'] = "LastName is required";
            return $resp;
        }
        if(empty($data['email']))
        {
            $resp['IsValid'] = 0;
            $resp['Status'] = 0;
            $resp['Message'] = "Email is required";
            return $resp;
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
        {
            $resp['IsValid'] = 0;
            $resp['Status'] = 0;
            $resp['Message'] = "Invalid email format";
            return $resp;
        }
        if(empty($data['password']))
        {
            $resp['IsValid'] = 0;
            $resp['Status'] = 0;
            $resp['Message'] = "Password is required";
            return $resp;
        }
        if(empty($data['cpassword']))
        {
            $resp['IsValid'] = 0;
            $resp['Status'] = 0;
            $resp['Message'] = "Confirm password is required";
            return $resp;
        }
        if(!empty($data['cpassword']) && 
        !empty($data['password']) && 
        $data['password'] != $data['cpassword'])
        {
            $resp['IsValid'] = 0;
            $resp['Status'] = 0;
            $resp['Message'] = "Password does not match";
            return $resp;
        }
        if(empty($data['cxPhone']))
        {
            $resp['IsValid'] = 0;
            $resp['Status'] = 0;
            $resp['Message'] = "Phone is required";
            return $resp;
        }
        $resp['IsValid'] = 1;
        return $resp;

    }
    
    public function web_login($email, $password)
	{
		
		$this->db->select('U.*');
		$this->db->from('cxdetail as U');
		$this->db->where('email', $email);
		$this->db->where('password', md5($password));
		$login_data = $this->db->get();
		if($login_data->num_rows()>0){
			return $login_data->row_array();
		} else {
			return 0;
		}
	}
	
	public function get_flight_page_info() {
        $this->db->select('fpi.*, 
                           fpi.id as fpi_id,
                           f.*, 
                           d.*, 
                           r.id as review_id,
                           r.name AS reviewer_name, 
                           r.star_rating, 
                           r.description AS review_description');
        
        $this->db->from('flight_page_info fpi');
    
        // Add a WHERE clause to filter for flight_page_info with id = 1
        $this->db->where('fpi.id', 1);
    
        // Join with flights table
        $this->db->join('flights f', 'f.flight_page_info_id = fpi.id', 'left');
    
        // Join with destinations table
        $this->db->join('destinations d', 'd.flight_page_info_id = fpi.id', 'left');
    
        // Join with reviews table
        $this->db->join('reviews r', 'r.flight_page_info_id = fpi.id', 'left');
    
        $query = $this->db->get();
    
        // Initialize an array to hold structured data
        $result = [];
    
        // Initialize a variable to hold flight_page_info details
        $flight_page_info = null;
    
        foreach ($query->result_array() as $row) {
            // If flight_page_info has not been set, set it
            if (is_null($flight_page_info)) {
                $flight_page_info = [
                    'id' => $row['fpi_id'],
                    'top_title' => $row['top_title'],
                    'top_desc' => $row['top_desc'],
                    'cust_support_title' => $row['cust_support_title'],
                    'cust_support_desc' => $row['cust_support_desc'],
                    'cust_support_title1' => $row['cust_support_title1'],
                    'cust_support_desc1' => $row['cust_support_desc1'],
                    'cust_support_file1' => $row['cust_support_file1'],
                    'cust_support_title2' => $row['cust_support_title2'],
                    'cust_support_desc2' => $row['cust_support_desc2'],
                    'cust_support_file2' => $row['cust_support_file2'],
                    'cust_support_title3' => $row['cust_support_title3'],
                    'cust_support_desc3' => $row['cust_support_desc3'],
                    'cust_support_file3' => $row['cust_support_file3'],
                    'special_offer_title' => $row['special_offer_title'],
                    'special_offer_desc' => $row['special_offer_desc'],
                    'special_offer_link1' => $row['special_offer_link1'],
                    'special_offer_desc1' => $row['special_offer_desc1'],
                    'special_offer_image1' => $row['special_offer_image1'],
                    'special_offer_link2' => $row['special_offer_link2'],
                    'special_offer_desc2' => $row['special_offer_desc2'],
                    'special_offer_image2' => $row['special_offer_image2'],
                    'special_offer_link3' => $row['special_offer_link3'],
                    'special_offer_desc3' => $row['special_offer_desc3'],
                    'special_offer_image3' => $row['special_offer_image3'],
                    'flight_title' => $row['flight_title'],
                    'flight_desc' => $row['flight_desc'],
                    'destination_title' => $row['destination_title'],
                    'destination_desc' => $row['destination_desc'],
                    'review_title' => $row['review_title'],
                    'club_section' => $row['club_section'],
                    'flight_deal' => $row['flight_deal'],
                    'destinations' => [], // Initialize as an array for multiple destinations
                    'reviews' => [],
                    'flights' => [], // Initialize as an array for multiple flights
                ];
            }
    
            // Add flight details if available and check for uniqueness
            if (!empty($row['airline_code'])) {
                $flight_exists = array_filter($flight_page_info['flights'], function($flight) use ($row) {
                    return $flight['airline_code'] === $row['airline_code']; // Check if flight already exists
                });
    
                if (empty($flight_exists)) {
                    $flight_page_info['flights'][] = [
                        'airline_code' => $row['airline_code'],
                        'airline_name' => $row['airline_name'],
                        'airline_logo' => $row['airline_logo'],
                        'departure_date' => $row['departure_date'],
                        'departure_location' => $row['departure_location'],
                        'arrival_location' => $row['arrival_location'],
                        'arrival_date' => $row['arrival_date'],
                        'price' => $row['price'],
                        'departure_iata_code_city' => $row['departure_iata_code_city'],
                        'arrival_iata_code_city' => $row['arrival_iata_code_city'],
                        'departure_city_name' => $row['departure_city_name'],
                        'arrival_city_name' => $row['arrival_city_name'],
                    ];
                }
            }
    
            // Add destination details if available and check for uniqueness
            if (!empty($row['id']) && !empty($row['title'])) {
                $destination_exists = array_filter($flight_page_info['destinations'], function($destination) use ($row) {
                    return $destination['title'] === $row['title']; // Check if destination already exists
                });
    
                if (empty($destination_exists)) {
                    $flight_page_info['destinations'][] = [
                        'title' => $row['title'],
                        'description' => $row['description'],
                        'image' => $row['image'],
                    ];
                }
            }
    
            // Add review details if available and check for uniqueness
            if (!empty($row['review_id'])) {
                $review_exists = array_filter($flight_page_info['reviews'], function($review) use ($row) {
                    return $review['id'] === $row['review_id']; // Check if review already exists
                });
    
                if (empty($review_exists)) {
                    $flight_page_info['reviews'][] = [
                        'id' => $row['review_id'],
                        'name' => $row['reviewer_name'],
                        'star_rating' => $row['star_rating'],
                        'description' => $row['review_description'],
                    ];
                }
            }
        }
    
        // Add the populated flight_page_info to the result
        if ($flight_page_info) {
            $result[] = $flight_page_info;
        }
    
        return $result; // Return the structured array
    }
}
