<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
$ip = $_SERVER['REMOTE_ADDR'];
$ur = $_SERVER['REQUEST_URI'];
$ur = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
 //$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
//echo $details->country; 



if ( $ip != "103.250.84.10") //WebvioBittel
//if ( $ip != "122.185.239.90") //Webvio Airtel

{	
$dtt = date("Y-m-d");


{



$result1 ='';
$result2='';

    if (getenv('HTTP_X_FORWARDED_FOR')) {
        $pipaddress = getenv('HTTP_X_FORWARDED_FOR');
        $ipaddress = getenv('REMOTE_ADDR');

    } else {
        $ipaddress = getenv('REMOTE_ADDR');
   
    }
	

	  $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ipaddress));

    if($ip_data && $ip_data->geoplugin_countryName != null)
    {
        $result = $ip_data->geoplugin_countryName;
    }

if($ip_data && $ip_data->geoplugin_city != null)
    {
        $result1 = $ip_data->geoplugin_city;
    }
	
	
	if($ip_data && $ip_data->geoplugin_regionName != null)
    {
        $result2 = $ip_data->geoplugin_regionName;
    }
	
	
$to = "wasif@webviotechnologies.com";
$subject = "Unauthorize Access Of Blog Webvio Admin Panel";
$txt = "User Trying To Access HRMS from IP :" .$ip . "\r\n" .      
       "web url : " . $ur . "\r\n" .
	   "Browser Info : " . $_SERVER['HTTP_USER_AGENT'] . "\r\n" .
	   "Location : " .  $result1 . " , " . $result2 . " , " . $result ;
	   " - " . var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR'])));

$headers = "From: info@webviotechnologies.com" . "\r\n" .
"CC: arfeen@adeebagroup.com";
//mail($to,$subject,$txt,$headers);

}
header('Location:https://webviotechnologies.com/');
exit();
}

?>
