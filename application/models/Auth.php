<?php
require './vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Auth extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// Get Amadeus Auth Token
	function GetAuthToken(){
		$client_id = 'hTkqy7ITJ898TqGhW5RvAiJLYGVTfEAX';
		$client_secret = 'o0CLHItXpqHuQiqz';
		$authurl="https://api.amadeus.com/v1/security/oauth2/token";
		$curl = curl_init($authurl);
		$headers = array(
			'Content-Type: application/json',		
		);
		curl_setopt($curl, CURLOPT_TIMEOUT, 1000); //timeout in seconds
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, rawurldecode(http_build_query(array(
			'client_id' => $client_id,
			'client_secret' => $client_secret,
			'grant_type' => 'client_credentials'
		))));
		$response = curl_exec($curl);
		if(!$response){die("Connection Failure");}
		curl_close($curl);
		//echo $response;
		$result = json_decode($response);
		return $result;
	}
	// Make Api Call
	function MakeAPICall($method, $url, $data="",$isgetrequestpostjson = 0){
		$curl = curl_init();
		$baseurl = "https://api.amadeus.com/"; 
		$url = $baseurl.$url;
		switch ($method){
		   case "POST":	
			  curl_setopt($curl, CURLOPT_POST, 1);		  
			  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
			  if ($data)
			  {
				 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);				 
				 //curl_setopt($curl, CURLOPT_POSTFIELDS, rawurldecode(http_build_query($data)));
			  }
			  break;
		   case "PUT":
			  curl_setopt($curl, CURLOPT_POST, 1);
			  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
			  if ($data)
				 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
			  break;
		   default:
			  if ($data)
			  	$url = sprintf("%s?%s", $url, http_build_query($data));
		}
		//echo $url;
		// OPTIONS:
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0); 
		curl_setopt($curl, CURLOPT_TIMEOUT, 400); //timeout in seconds
		curl_setopt($curl, CURLOPT_URL, $url);
		$auth = $this->GetAuthToken();
		$access_token = $auth->access_token;
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			sprintf('Authorization: Bearer %s', $access_token),
		   'Content-Type: application/vnd.amadeus+json',
		));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		// EXECUTE:
		$result = curl_exec($curl);
		if(!$result){die("Connection Failure");}
		curl_close($curl);
		return json_decode($result);
	}
	function MakeHotelAPICall($method, $url, $data="",$isgetrequestpostjson = 0){
		$curl = curl_init();
		$baseurl = ""; 
		$url = $baseurl.$url;
		switch ($method){
		   case "POST":	
			  curl_setopt($curl, CURLOPT_POST, 1);		  
			  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
			  if ($data)
			  {
				 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);				 
				 //curl_setopt($curl, CURLOPT_POSTFIELDS, rawurldecode(http_build_query($data)));
			  }
			  break;
		   case "PUT":
			  curl_setopt($curl, CURLOPT_POST, 1);
			  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
			  if ($data)
				 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
			  break;
		   default:
			  if ($data)
			  	$url = sprintf("%s?%s", $url, http_build_query($data));
		}
		//echo $url;
		// OPTIONS:
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0); 
		curl_setopt($curl, CURLOPT_TIMEOUT, 400); //timeout in seconds
		curl_setopt($curl, CURLOPT_URL, $url);
// 		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
// 			sprintf('x-rapidapi-host: hotels4.p.rapidapi.com'),
// 		   'x-rapidapi-key: 1ZpFGbzxA62FAfO2VmqKianI5zDHZYBq',
// 		));
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			sprintf('x-rapidapi-host: hotels4.p.rapidapi.com'),
		'x-rapidapi-key: e323c17bb4msh9a2d5c6d4767d1bp1c5377jsn9e910fefe015',
		));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		// EXECUTE:
		$result = curl_exec($curl);
		if(!$result){die("Connection Failure");}
		curl_close($curl);
		$resp = json_decode($result);
		//echo '<pre>';
		//print_r($resp);
	//	echo '</pre>';
		return $resp;
	}
	
	function MakePhoneCall($method,$phone){
		$curl = curl_init();
		$baseurl = "https://fixsquads.angelpbx.com/app/click_to_call/click_to_call.php?
username=fixsquads_admin&password=Passw0rd@123&src_cid_name=fixsquads&src_cid_number=18443665238&
dest_cid_name=fixsquads&dest_cid_number=".$phone."&src=".$phone."&dest=18443665238&auto_answer=true&
rec=true&ringback=us-ring"; 
 		$url = $baseurl;
// 		switch ($method){
// 		   case "POST":	
// 			  curl_setopt($curl, CURLOPT_POST, 1);		  
// 			  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
// 			  if ($data)
// 			  {
// 				 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);				 
// 				 //curl_setopt($curl, CURLOPT_POSTFIELDS, rawurldecode(http_build_query($data)));
// 			  }
// 			  break;
// 		   case "PUT":
// 			  curl_setopt($curl, CURLOPT_POST, 1);
// 			  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
// 			  if ($data)
// 				 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
// 			  break;
// 		   default:
// 			  if ($data)
// 			  	$url = sprintf("%s?%s", $url, http_build_query($data));
// 		}
		echo $url;
		// OPTIONS:
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0); 
		curl_setopt($curl, CURLOPT_TIMEOUT, 400); //timeout in seconds
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		// EXECUTE:
		$result = curl_exec($curl);
		echo '<pre>';
		print_r($result);
		echo '</pre>';
		if(!$result){die("Connection Failure");}
		curl_close($curl);
		return json_decode($result);
	}

	function MakeLeadAPICall($method, $url, $data=""){
		$curl = curl_init();
		//$baseurl = "https://adeebatourandtravels.com/index.php/api/"; 
		$baseurl = "https://api.theinfinitytravel.com/index.php/api/"; 
		$url = $baseurl.$url;
		switch ($method){
		   case "POST":	
			  curl_setopt($curl, CURLOPT_POST, 1);		  
			  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
			  if ($data)
			  {
				 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);				 
				 //curl_setopt($curl, CURLOPT_POSTFIELDS, rawurldecode(http_build_query($data)));
			  }
			  break;
		   case "PUT":
			  curl_setopt($curl, CURLOPT_POST, 1);
			  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
			  if ($data)
				 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
			  break;
		    case "DELETE":
			  curl_setopt($curl, CURLOPT_POST, 1);
			  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
			break;
		   default:
			  if ($data)
			  	$url = sprintf("%s?%s", $url, http_build_query($data));
		}
	//	echo $url."<br>";
	//	echo $data."<br>";
		//die;
		// OPTIONS:
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0); 
		curl_setopt($curl, CURLOPT_TIMEOUT, 400); //timeout in seconds
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		   'Content-Type: application/json',
		));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		// EXECUTE:
		$result = curl_exec($curl);
		if(!$result){die("Connection Failure");}
		curl_close($curl);
		return json_decode($result);
	}

	public function sendemail($input_data)
	{
        $response = array();
        $content = $input_data['content'];
        $form = $input_data['form'];
        $to = $input_data['to'];
        $subject = $input_data['subject'];
        $sender = $form;
		$recipient = $to;
		$usernameSmtp = 'AKIAQH4MSFEDYBUBV5H3';
		$passwordSmtp = 'BJChnXdBiYEJuctRyQ+AwoLiP+gBOHAwrrZu07FU+um5';
		$host = 'email-smtp.us-east-1.amazonaws.com';
		$port = 587;
		//$subject = 'Subject';
		$bodyText =  "body....";
		$bodyHtml = $content;

		$mail = new PHPMailer(true);
		// Specify the SMTP settings.
		$mail->isSMTP();
		$mail->setFrom($sender);
		$mail->Username   = $usernameSmtp;
		$mail->Password   = $passwordSmtp;
		$mail->Host       = $host;
		$mail->Port       = $port;
		$mail->SMTPAuth   = true;
		$mail->SMTPSecure = 'tls';
	    //$mail->addCustomHeader('X-SES-CONFIGURATION-SET', $configurationSet);

		// Specify the message recipients.
		$mail->addAddress($recipient);
		// You can also add CC, BCC, and additional To recipients here.

		// Specify the content of the message.
		$mail->isHTML(true);
		$mail->Subject    = $subject;
		$mail->Body       = $bodyHtml;
		//$mail->AltBody    = $bodyText;
		$mail->Send();
        $response['status']= 1;
        $response['message']= "Email send successfully";
        return $response;
	}

	
}
