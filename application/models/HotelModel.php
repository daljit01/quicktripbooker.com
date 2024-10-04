<?php
class HotelModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
        header("Content-Type: text/html; charset=UTF-8",true);
		$this->load->database();
		$this->load->model('auth');
		$this->load->model('Site_Model');
		$this->load->model('FlightModel');
	}
    function GetHotelCitySuggestion($searchtxt="")
	{
		$resp=array();
		if(!empty($searchtxt))
		{
			$data= array();
            $data['q'] = $searchtxt;
            $data['locale'] = "en_US";
            $data['currency'] = "USD";
            $url ="https://hotels4.p.rapidapi.com/locations/v3/search";
			$airportlookupdetails = $this->auth->MakeHotelAPICall("Get",$url,$data);
			
            // if(count($airportlookupdetails->suggestions) > 0)
			// {
			// 	$i=0;
			// 	foreach($airportlookupdetails->suggestions as $suggestion)
			// 	{
            //         if(count($suggestion->entities) > 0)
            //         {
            //             foreach($suggestion->entities as $entities)
            //             {
            //                 $geoId = $entities->geoId;
            //                 $resp[$i]['geoId'] = !empty($geoId) ? $geoId : "";
            //                 $resp[$i]['destinationId'] = !empty($entities->destinationId) ? $entities->destinationId : "";
            //                 $resp[$i]['type'] = !empty($entities->type) ? strtolower($entities->type) : "";
            //                 $resp[$i]['latitude'] = !empty($entities->latitude) ? $entities->latitude : "";
            //                 $resp[$i]['longitude'] = !empty($entities->longitude) ? $entities->longitude : "";
            //                 $resp[$i]['caption'] = !empty($entities->caption) ? $this->strip_tags_content($entities->caption) : "";
            //                 $resp[$i]['name'] = !empty($entities->name) ? $this->strip_tags_content($entities->name) : "";                           
            //                 $i++;
            //             }
            //         }
					
			// 	}
			// }

			if(count($airportlookupdetails->sr) > 0)
			{
				$i=0;
        //         echo '<pre>';
		// print_r($airportlookupdetails->sr);
		// echo '</pre>';
				foreach($airportlookupdetails->sr as $suggestion)
				{
                    $geoId = !empty($suggestion->gaiaId) ? $suggestion->gaiaId : "";
                    $resp[$i]['geoId'] = !empty($geoId) ? $geoId : "";
                    $resp[$i]['destinationId'] = !empty($suggestion->gaiaId) ? $suggestion->gaiaId : "";
                    $resp[$i]['type'] = !empty($suggestion->type) ? strtolower($suggestion->type) : "";
                    $resp[$i]['latitude'] = !empty($suggestion->coordinates->lat) ? $suggestion->coordinates->lat : "";
                    $resp[$i]['longitude'] = !empty($suggestion->coordinates->long) ? $suggestion->coordinates->long : "";
                    $resp[$i]['caption'] = !empty($suggestion->regionNames->displayName) ? $this->strip_tags_content($suggestion->regionNames->displayName) : "";
                    $resp[$i]['name'] = !empty($suggestion->regionNames->shortName) ? $this->strip_tags_content($suggestion->regionNames->shortName) : "";                           
                    $i++;					
				}
			}
		}
    //    echo '<pre>';
	// 		print_r($resp);
	// 		echo '</pre>';
		return $resp;
	}
    function strip_tags_content($string) { 
        // ----- remove HTML TAGs ----- 
        $string = preg_replace ('/<[^>]*>/', '', $string); 
        // ----- remove control characters ----- 
        $string = str_replace("\r", '', $string);
        $string = str_replace("\n", '', $string);
        $string = str_replace("\t", '', $string);
        // ----- remove multiple spaces ----- 
        $string = trim(preg_replace('/ {2,}/', '', $string));
        return $string; 
    
    }
    public function getHotelOffers($searchdata = array()){
        
        $hoteloffers = array();
        $filterdata = array();
		if($searchdata['destinationId'] > 0 && $searchdata['adults1'] > 0)
		{
            // if(!empty($searchdata['destinationId'] && array_key_exists('destinationId',$searchdata)))
            // {
            //     $filterdata['destinationId'] = $searchdata['destinationId'] ;
            // }
            // if(!empty($searchdata['checkIn'] && array_key_exists('checkIn',$searchdata)))
            // {
            //     $filterdata['checkIn'] = $searchdata['checkIn'] ;
            // }
            // if(!empty($searchdata['checkOut'] && array_key_exists('checkOut',$searchdata)))
            // {
            //     $filterdata['checkOut'] = $searchdata['checkOut'] ;
            // }
            // if(!empty($searchdata['adults1'] && array_key_exists('adults1',$searchdata)))
            // {
            //     $filterdata['adults1'] = $searchdata['adults1'] ;
            // }
            // if(!empty($searchdata['starRating'] && array_key_exists('starRating',$searchdata)))
            // {
            //     $filterdata['starRatings'] = $searchdata['starRating'] ;
            // }
            // if(!empty($searchdata['guestRatingMin'] && array_key_exists('guestRatingMin',$searchdata)))
            // {
            //     $filterdata['guestRatingMin'] = $searchdata['guestRatingMin'] ;
            // }
            // if(!empty($searchdata['landmarkIds'] && array_key_exists('landmarkIds',$searchdata)))
            // {
            //     $filterdata['landmarkIds'] = $searchdata['landmarkIds'] ;
            // }
            $filterdata['sortOrder'] = 'PRICE';
            $filterdata['pageNumber'] = 1;
            $filterdata['pageSize'] = 100;
            $filterdata['currency'] = "USD";
            $filterdata = array();
            $filterdata['currency'] = "USD";
            $filterdata['eapid'] = 1;
            $filterdata['locale'] = "en_US";
            $filterdata['siteId'] = 300000001;
            if(!empty($searchdata['destinationId'] && array_key_exists('destinationId',$searchdata)))
            {
                $filterdata['destination'] = array();;
                $filterdata['destination']['regionId'] = $searchdata['destinationId'];
            }
            if(!empty($searchdata['checkIn'] && array_key_exists('checkIn',$searchdata)))
            {
                $filterdata['checkInDate'] = array();;
                $filterdata['checkInDate']['day'] = (int)date("d",strtotime($searchdata['checkIn']));
                $filterdata['checkInDate']['month'] = (int)date("m",strtotime($searchdata['checkIn']));
                $filterdata['checkInDate']['year'] = (int)date("Y",strtotime($searchdata['checkIn']));
            }
            if(!empty($searchdata['checkOut'] && array_key_exists('checkOut',$searchdata)))
            {
                $filterdata['checkOutDate'] = array();;
                $filterdata['checkOutDate']['day'] = (int)date("d",strtotime($searchdata['checkOut']));
                $filterdata['checkOutDate']['month'] = (int)date("m",strtotime($searchdata['checkOut']));
                $filterdata['checkOutDate']['year'] = (int)date("Y",strtotime($searchdata['checkOut']));
            }
            $filterdata['rooms'] = array();;
            $filterdata['rooms'][0]['adults'] = 1;
            $filterdata['resultsStartingIndex'] = 0;
            $filterdata['sort'] = "PRICE_LOW_TO_HIGH";
            $filterdata['resultsSize'] = 50;

            // $requestjson = '{
            //     "currency":"USD",
            //     "eapid":1,
            //     "locale":"en_US",
            //     "siteId":300000001,
            //     "destination":{
            //        "regionId":"'.$searchdata['destinationId'].'"
            //     },
            //     "checkInDate":{
            //        "day":'.(int)date("d",strtotime($searchdata['checkIn'])).',
            //        "month":'.(int)date("m",strtotime($searchdata['checkIn'])).',
            //        "year":'.(int)date("Y",strtotime($searchdata['checkIn'])).'
            //     },
            //     "checkOutDate":{
            //         "day":'.(int)date("d",strtotime($searchdata['checkOut'])).',
            //         "month":'.(int)date("m",strtotime($searchdata['checkOut'])).',
            //         "year":'.(int)date("Y",strtotime($searchdata['checkOut'])).'
            //     },
            //     "rooms":[
            //        {
            //           "adults":1
            //        }
            //     ],
            //     "resultsStartingIndex":0,
            //     "resultsSize":200,
            //     "sort":"PRICE_LOW_TO_HIGH"
            //  }';

            // echo '<pre>';
            // print_r($searchdata);
            // echo '</pre>';

            // echo '<pre>';
            // print_r($filterdata);
            // echo '</pre>';
            // echo $requestjson;
            //die;
            $url ="https://hotels4.p.rapidapi.com/properties/v2/list";
            $filterdatastr = json_encode($filterdata);
            $hotelresults = $this->auth->MakeHotelAPICall("POST",$url,$filterdatastr);
            // echo '<pre>';
            // print_r($hotelresults);
            // echo '</pre>';
            // die;
            if(!property_exists($hotelresults,"errors"))
            {
                if(count($hotelresults->data->propertySearch->properties) > 0)
			    {
                    $h=0;
                    $starRating = array();
                    $results = $hotelresults->data;
                    $results->filters = $hotelresults->data->propertySearch->filterMetadata;
                    $starRating = (array_key_exists("starRating",(array)$results->filters)) ? (array)$results->filters->starRating->items : array();
                    $hoteloffers['starRating'] = $starRating;
                    $starRatingapplied = (array_key_exists("starRating",(array)$results->filters)) ? $results->filters->applied : "";
                    $guestRatingmin = (array_key_exists("guestRating",(array)$results->filters)) ? $results->filters->guestRating->range->min->defaultValue : 0;
                    $guestRatingmax = (array_key_exists("guestRating",(array)$results->filters)) ? $results->filters->guestRating->range->max->defaultValue : 0;
                    $hoteloffers['guestRatingmin'] = $guestRatingmin;
                    $hoteloffers['guestRatingmax'] = $guestRatingmax;
                    $landmarks = (array_key_exists("landmarks",(array)$results->filters)) ? (array)$results->filters->landmarks->items : array();
                    $hoteloffers['landmarks'] = $landmarks;
                    $landmarkselectedOrders = (array_key_exists("landmarks",(array)$results->filters)) ? $results->filters->landmarks->selectedOrder : array();
                    $hoteloffers['landmarkapplied'] = $landmarkselectedOrders;
                    
                    $neighbourhoods = (array_key_exists("neighbourhood",(array)$results->filters)) ? (array)$results->filters->neighbourhood->items : array();
                    $hoteloffers['neighbourhoods'] = $neighbourhoods;
                    $hoteloffers['neighbourhoodsapplied'] = (array_key_exists("neighbourhood",(array)$results->filters)) ? $results->filters->neighbourhood->applied : false;
                   
                    $accommodationType = (array_key_exists("accommodationType",(array)$results->filters)) ? (array)$results->filters->accommodationType->items : array();
                    $hoteloffers['accommodationtype'] = $accommodationType;
                    $hoteloffers['accommodationtypeapplied'] = (array_key_exists("accommodationtype",(array)$results->filters)) ? $results->filters->accommodationType->applied : false;
             

                    $facilities = (array_key_exists("facilities",(array)$results->filters)) ? (array)$results->filters->facilities->items : array();
                    $hoteloffers['facilities'] = $facilities;
                    $hoteloffers['facilitiesapplied'] = (array_key_exists("facilities",(array)$results->filters)) ? $results->filters->facilities->applied : false;
             
                    $themesAndTypes = (array_key_exists("themesAndTypes",(array)$results->filters)) ? (array)$results->filters->themesAndTypes->items : array();
                    $hoteloffers['themesAndTypes'] = $themesAndTypes;
                    $hoteloffers['themesAndTypesapplied'] = (array_key_exists("themesAndTypes",(array)$results->filters)) ? $results->filters->themesAndTypes->applied : false;
             
                    $pricemin = (array_key_exists("price",(array)$results->filters)) ? (array)$results->filters->price->range->min->defaultValue : 0;
                    $pricemax = (array_key_exists("price",(array)$results->filters)) ? (array)$results->filters->price->range->max->defaultValue : 0;
                    $hoteloffers['pricemin'] = $pricemin;
                    $hoteloffers['pricemax'] = $pricemax;
                   
                    foreach($hotelresults->data->propertySearch->properties as $data)
                    {
                        $hoteloffers['hoteldetails'][] = $this->GetHoteldata($data);
                    }
                }
            }
            // echo '<pre>';
            // print_r($hoteloffers);
            // echo '</pre>';
           //echo '<pre>';
           // print_r($hotelresults);
           //echo '</pre>';
        }
        return $hoteloffers;
    }
    public function GetHoteldata($data)
    {
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        $hoteloffers = array();
        if(count((array)$data) > 0)
        {
            $hoteloffers['offerdetails'] = json_encode($data);
            $hoteloffers['id'] = !empty($data->id) ? $data->id : "";
            $hoteloffers['name'] = !empty($data->name) ? $data->name : "";
            $hoteloffers['starRating'] = !empty($data->star) ? $data->star : "";
            $defaultaddress = $this->getaddress($data->mapMarker->latLong->latitude,$data->mapMarker->latLong->longitude);
           
            $hoteloffers['address'] = $defaultaddress;
            $hoteloffers['guestReviewsrating'] = !empty($data->reviews->total) ?$data->reviews->total : 0;
            $hoteloffers['TotalguestReviews'] = !empty($data->reviews->total) ? $data->reviews->total : 0;
            $hoteloffers['badgeText'] = !empty($data->badgeText) ? $data->badgeText : "";
            $landmarks = "";
            $landmarkarr = array();
            $landmarkarr[] = $data->destinationInfo->distanceFromDestination->__typename." ".$data->destinationInfo->distanceFromDestination->value." ".$data->destinationInfo->distanceFromDestination->unit;
            // if(count($data->landmarks))
            // {
            //     foreach($data->landmarks as $landmark)
            //     {
            //         $landmarkarr[] = $landmark->distance." ".$landmark->label;
            //     }
            //     //$landmarks = implode("<br>", $landmarkarr);
            // }
            $landmarks = implode("<br>", $landmarkarr);
            $hoteloffers['landmarks'] = $landmarkarr;
            $hoteloffers['price'] = !empty($data->price->options[0]->formattedDisplayPrice) ? $data->price->options[0]->formattedDisplayPrice : 0;
            $hoteloffers['priceinfo'] = "";
            $offerSummary="";
            $offerSummaryarr = array();
            if(count($data->offerSummary->messages) > 0)
            {
                foreach($data->offerSummary->messages as $summary)
                {
                    $offerSummaryarr[] = $summary->message;
                }
                $offerSummary = implode("<br>", $landmarkarr);
            }
            $hoteloffers['info'] = $offerSummary;
            $hoteloffers['fullyBundledPricePerStay'] = !empty($data->neighborhood->name) ? "Near by ".$data->neighborhood->name : "";
            $freeCancellation = 0;
            if(count($data->offerSummary->attributes) > 0)
            {
                foreach($data->offerSummary->attributes as $attribute)
                {
                    if($attribute->type == "FREE_CANCELLATION")
                    {
                        $freeCancellation = 1;
                    }
                }
            }
            $hoteloffers['freeCancellation'] = ($freeCancellation == 1) ? $freeCancellation : "";
            // $hoteloffers['paymentPreference'] = !empty($data->ratePlan->features->paymentPreference) ? $data->ratePlan->features->paymentPreference : "";
            // $hoteloffers['noCCRequired'] = !empty($data->ratePlan->features->noCCRequired) ? $data->ratePlan->features->noCCRequired : "";
            $hoteloffers['latitute'] = !empty($data->mapMarker->latLong->latitude) ? $data->mapMarker->latLong->latitude : "";
            $hoteloffers['longitute'] = !empty($data->mapMarker->latLong->longitude) ? $data->mapMarker->latLong->longitude : "";
            // $hoteloffers['supplierHotelId'] = !empty($data->coordinate->supplierHotelId) ? $data->coordinate->supplierHotelId : "";
            $hoteloffers['image'] = !empty($data->propertyImage->image->url) ? $data->propertyImage->image->url : "";
        //     echo '<pre>';
        // print_r($hoteloffers);
        // echo '</pre>';
        }
        
        return $hoteloffers;
    }
    function getaddress($lat,$lng)
    {
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false&key=AIzaSyDeH2iXXSECIQVwio0fT6qhbc5ck8qfO7I';
        $json = @file_get_contents($url);
        $data=json_decode($json);
        $status = $data->status;
        if($status=="OK")
        {
        return $data->results[0]->formatted_address;
        }
        else
        {
        return "";
        }
    }
    public function getHotelDetails($searchdata = array())
    {
        $hoteldata = array();
        if($searchdata['id'] > 0)
        {
            // $filterdata['id'] = $searchdata['id'];
            // $filterdata['currency'] = "USD";
            $filterdata = array();
            $filterdata['currency'] = "USD";
            $filterdata['eapid'] = 1;
            $filterdata['locale'] = "en_US";
            $filterdata['siteId'] = 300000001;
            $filterdata['propertyId'] = $searchdata['id'];
            $url ="https://hotels4.p.rapidapi.com/properties/v2/detail";
            $filterstr = json_encode($filterdata);
            $hotelresults = $this->auth->MakeHotelAPICall("POST",$url,$filterstr);
            // echo '<pre>';
            // print_r($hotelresults);
            // echo '</pre>';
            $hotelbody = $hotelresults->data->propertyInfo;
            $hoteldata['summary']= $hotelbody->summary;
            $hoteldata['propertyGallery']= $hotelbody->propertyGallery;
            $hoteldata['reviewInfo']= $hotelbody->reviewInfo;
            $hoteldata['propertyContentSectionGroups']= $hotelbody->propertyContentSectionGroups;
        }
        return $hoteldata;
    }
    public function SaveHotelBookingData($data)
    {
        $resp = $this->PreparedHotelBookingData($data);
        return $resp;
    }
    public function PreparedHotelBookingData($data)
    {
    //    echo '<pre>';
    //    print_r($data);
    //    echo '</pre>';
    //    die;
        $resp = array();
        $errmsg = '';
        $validatehoteldata = $this->ValidateHotelData($data);
        if($validatehoteldata['isvalid'] == 1)
        {
    //            echo '<pre>';
    //    print_r($data);
    //    echo '</pre>';
    //         die;
            $name = $data['name'];
    		$this->db->select("*");
    	    $this->db->from("cxdetail");
    	    $this->db->where("email='".$data['email']."'");
    	    $rsuser = $this->db->get();
    	    if($rsuser->num_rows() > 0)
    	    {
    	        $rowuser = $rsuser->row();
    	        $cxid = $rowuser->cxId;
    	    }
    	    else
    	    {
    	        $nameArr = explode(" ",$name);
    	        $password = $this->FlightModel->getPassword(8);
    	        $cxid = time();
    	        $userarr = array(
    	            'cxId' => $cxid,
    	            'cxName' => $name,
    	            'email' => $data['email'],
    	            'cxPhone' => $data['phone_number'],
    	            'cxAltPhone' => $data['altphone'],
    	            'password' => md5($password),
    	            'firstName' => $nameArr[0],
    	            'lastName' => $nameArr[1],
    	            );
    	       $this->db->insert("cxdetail",$userarr);
    	       //$userId = $this->db->insert_id();
    	       //$to = $data['email'];
                $to = $this->Site_Model->support_email;
        	    $subject = "Account Details";
        	    $form = $data['email'];
        	    $this->load->library('email');
        		$str ="";
        		$str .="Dear ".$name."<br>";
        		$str .="Congratulations! You have successfully register in ".$this->Site_Model->websitename."<br> Your account details is given bellow<br>";
        		$str .="Email : ".$data['email']."<br>";
        		$str .="Password : ".$password."<br>";
        		$str ."Than You";
                
                $content = $this->flightmodel->GetEmailTemplate($str);

                $emaildata = array();
                $emaildata['form'] = $form;
                $emaildata['to'] = $to;
                $emaildata['subject'] = $subject;
                $emaildata['content'] = $content;
                $emaildata['cc'] = "";//$this->Site_Model->support_email;
                $emailjson = json_encode($emaildata);
                $bookingobj = $this->auth->MakeLeadAPICall("POST","flight/sendmail",$emailjson);
                $this->Site_Model->sendzohomail($to,$subject,$content);
                // $input_data= array();
                // $input_data['content'] = $str;
                // $input_data['form'] = $form;
                // $input_data['to'] =$to;
                // $input_data['subject'] = $subject;
                // $this->auth->sendemail($input_data);

        		// $this->email->from($form)
        		//  ->to($to)
        		//  ->subject($subject)
        		//  ->message($str)
        		//  ->set_mailtype('html')
        		//  ->send();
    	    }
    	    $reqdata = array();
    	    $reqdata['type'] = "hotel";
    		$reqdata['origin'] = "";
    		$reqdata['destination'] = $data['hotel_city'];
    		$reqdata['fly_date'] = $data['CheckIn'];
    		if(!empty($ReturnDate))
    		{
    		   $reqdata['return_date'] = $data['Checkout'];
    		}
    		$reqdata['cxname'] = $name;
    		$reqdata['email'] = $data['email'];
    		$reqdata['phone'] = $data['phone_number'];
    		$reqdata['altphone'] = $data['altphone'];
    		$reqdata['website'] = $this->Site_Model->websitename;
    		$reqjson = json_encode($reqdata);
    		$bookingobj = $this->auth->MakeLeadAPICall("POST","flight/lead",$reqjson);
    	    if($cxid > 0)
	        {
    	       	$this->db->select("*");
    	       	$this->db->from("travellerhotelinfo");
    	       	$this->db->where("cxId",$cxid);
    	       	$this->db->where("HotelId",$data['hotelid']);
    	       	$rshotelinfo = $this->db->get();
    	       	if($rshotelinfo->num_rows() > 0)
    	       	{
    	       	    $errmsg .= 'You already requested for booking this holtel';
    	       	}
    	       	else
    	       	{
    	       	    $BookingId = "FTH".time();
    	       	    $hoteldata = array();
    	       	    $hoteldata['cxId'] = $cxid;
    	       	    $hoteldata['BookingId'] = $BookingId;
    	       	    $hoteldata['HotelId'] = $data['hotelid'];
    	       	    $hoteldata['HotelName'] = $data['hotel_name'];
    	       	    $hoteldata['HotelAddress'] = $data['hotel_address'];
    	       	    $hoteldata['HotelRating'] = $data['hotel_rating'];
    	       	    $hoteldata['CheckIn'] = $data['CheckIn'];
    	       	    $hoteldata['Checkout'] = $data['Checkout'];
    	       	    $hoteldata['HotelCity'] = $data['hotel_city'];
    	       	    $hoteldata['TravellerName'] = $data['name'];
    	       	    $hoteldata['TravellerEmail'] = $data['email'];
    	       	    $hoteldata['TravellerPhone'] = $data['phone_number'];
    	       	    $hoteldata['Createdate'] = date("Y-m-d H:i:s");
    	       	    if(!empty($data['altphone']))
    	       	    {
    	       	        $hoteldata['TravellerAltPhone'] = $data['altphone'];
    	       	    }
           	         $this->db->insert("travellerhotelinfo",$hoteldata);
           	         $this->flightmodel->SenFreeQuotedMail($data);
           	         $resp['BookingId']= $BookingId; 
           	         $resp['status']= 1; 
                     $resp['message'] = "Hotel booking requested successfully"; 
    	       	}
    	       	
	        }
        }
        else
        {
            $errmsg .= $validatehoteldata['message'];
        }
        if(!empty($errmsg))
        {
             $resp['BookingId']="";
             $resp['status']= 0; 
             $resp['message'] = $errmsg; 
        }
        //die;
        return $resp;
    }
    public function ValidateHotelData($data)
    {
        $resp = array();
        if(empty($data['name']))
        {
           $resp['isvalid']=0; 
           $resp['status']=0; 
           $resp['message']="Name is required"; 
           return $resp;
        }
        if(empty($data['email']))
        {
           $resp['isvalid']=0; 
           $resp['status']=0; 
           $resp['message']="Email is required"; 
           return $resp;
        }
        if(empty($data['phone_number']))
        {
           $resp['isvalid']=0; 
           $resp['status']=0; 
           $resp['message']="Phone is required"; 
           return $resp;
        }
         if(empty($data['hotelid']))
        {
           $resp['isvalid']=0; 
           $resp['status']=0; 
           $resp['message']="Hotelid is required"; 
           return $resp;
        }
         $resp['isvalid']=1; 
        return $resp;
    }
    //SavecarBookingData
    public function SavecarBookingData($data)
    {
        $resp = $this->PreparedcarBookingData($data);
        return $resp;
    }

    public function PreparedcarBookingData($data)
    {
    //    echo '<pre>';
    //    print_r($data);
    //    echo '</pre>';
    //    die;
        $resp = array();
        $errmsg = '';
        $validatehoteldata = $this->ValidateCarData($data);
        if($validatehoteldata['isvalid'] == 1)
        {
            $name = $data['name'];
    		$this->db->select("*");
    	    $this->db->from("cxdetail");
    	    $this->db->where("email='".$data['email']."'");
    	    $rsuser = $this->db->get();
    	    if($rsuser->num_rows() > 0)
    	    {
    	        $rowuser = $rsuser->row();
    	        $cxid = $rowuser->cxId;
    	    }
    	    else
    	    {
    	        $nameArr = explode(" ",$name);
    	        $password = $this->FlightModel->getPassword(8);
    	        $cxid = time();
    	        $userarr = array(
    	            'cxId' => $cxid,
    	            'cxName' => $name,
    	            'email' => $data['email'],
    	            'cxPhone' => $data['phone_number'],
    	            'cxAltPhone' => $data['altphone'],
    	            'password' => md5($password),
    	            'firstName' => $nameArr[0],
    	            'lastName' => $nameArr[1],
    	            );
    	       $this->db->insert("cxdetail",$userarr);
    	       //$userId = $this->db->insert_id();
    	       //$to = $data['email'];
                $to = $this->Site_Model->support_email;
        	    $subject = "Account Details";
        	    $form = $data['email'];
        	    $this->load->library('email');
        		$str ="";
        		$str .="Dear ".$name."<br>";
        		$str .="Congratulations! You have successfully register in ".$this->Site_Model->websitename."<br> Your account details is given bellow<br>";
        		$str .="Email : ".$data['email']."<br>";
        		$str .="Password : ".$password."<br>";
        		$str ."Than You";
                
                $content = $this->flightmodel->GetEmailTemplate($str);

                $emaildata = array();
                $emaildata['form'] = $form;
                $emaildata['to'] = $to;
                $emaildata['subject'] = $subject;
                $emaildata['content'] = $content;
                $emaildata['cc'] = "";//$this->Site_Model->support_email;
                $emailjson = json_encode($emaildata);
                $bookingobj = $this->auth->MakeLeadAPICall("POST","flight/sendmail",$emailjson);
                $this->Site_Model->sendzohomail($to,$subject,$content);
               
    	    }
    	    $reqdata = array();
    	    $reqdata['type'] = "car";
            $reqdata['origin'] = $data['pickupplace'];
            $reqdata['fly_date'] = date("Y-m-d",strtotime($data['pickupdate']));
            $reqdata['cxname'] = $name;
    		$reqdata['cxname'] = $name;
    		$reqdata['email'] = $data['email'];
    		$reqdata['phone'] = $data['phone_number'];
    		$reqdata['website'] = $this->Site_Model->websitename;
    		$reqjson = json_encode($reqdata);
    		$bookingobj = $this->auth->MakeLeadAPICall("POST","flight/lead",$reqjson);
    	    if($cxid > 0)
	        {
    	        $BookingId = "FTH".time();
                // $hoteldata = array();
                // $hoteldata['cxId'] = $cxid;
                // $hoteldata['BookingId'] = $BookingId;
                // $hoteldata['pickuplocation'] = $data['pickuplocation'];
                // $hoteldata['pickupdate'] = $data['pickupdate'];
                // $hoteldata['pickuptime'] = $data['pickuptime'];
                // $hoteldata['name'] = $data['name'];
                // $hoteldata['Phone'] = $data['phone_number'];
                // $hoteldata['Createdate'] = date("Y-m-d H:i:s");
                
                // $this->db->insert("travellerhotelinfo",$hoteldata);
                
                $this->flightmodel->SenFreeQuotedMail($data);
                $resp['BookingId']= $BookingId; 
                $resp['status']= 1; 
                $resp['message'] = "Hotel booking requested successfully"; 
    	       	
    	       	
	        }
        }
        else
        {
            $errmsg .= $validatehoteldata['message'];
        }
        if(!empty($errmsg))
        {
             $resp['BookingId']="";
             $resp['status']= 0; 
             $resp['message'] = $errmsg; 
        }
        //die;
        return $resp;
    }


     public function ValidateCarData($data)
    {
        $resp = array();
        if(empty($data['name']))
        {
           $resp['isvalid']=0; 
           $resp['status']=0; 
           $resp['message']="Name is required"; 
           return $resp;
        }
        if(empty($data['email']))
        {
           $resp['isvalid']=0; 
           $resp['status']=0; 
           $resp['message']="Email is required"; 
           return $resp;
        }
        if(empty($data['phone_number']))
        {
           $resp['isvalid']=0; 
           $resp['status']=0; 
           $resp['message']="Phone is required"; 
           return $resp;
        }
         $resp['isvalid']=1; 
        return $resp;
    }
    

}