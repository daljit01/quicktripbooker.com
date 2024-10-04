<?php
date_default_timezone_set('America/Los_Angeles');
//include("stripe-php/init.php");
require './vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Site_Model extends CI_Model
{
    public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('FlightModel');
        $this->load->model('FlightModel');
        $this->adminemail ='contact@anatripgo.com';
       	$this->support_email ='contact@anatripgo.com';
		$this->support_phone ='(888) 667 6295';
		$this->support_phone_link ='+18886676295 ';
		$this->website_address ='17875 Von Karman Ave, Suite 150, Irvine, CA 92614';
		$this->websitename ='QuickTripBooker';
		$this->noreply ='QuickTripBooker<contact@anatripgo.com>';
		$this->load->library('pagination');
	}
    public function SenFreeQuotedMail($data = array())
	{
		require './vendor/autoload.php';
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
		if(array_key_exists('address',$data) && !empty($data['address']))
		{
			$str .='<tr>';
				$str .='<td>';
					$str .='Address';
				$str .='</td>';
				$str .='<td>';
					$str .= $data['address'];
				$str .='</td>';
			$str .='</tr>';
		}
		if(array_key_exists('postcode',$data) && !empty($data['postcode']))
		{
			$str .='<tr>';
				$str .='<td>';
					$str .='Postal Code';
				$str .='</td>';
				$str .='<td>';
					$str .= $data['postcode'];
				$str .='</td>';
			$str .='</tr>';
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
		$content = $this->FlightModel->GetEmailTemplate($str);
		$to = $this->support_email;
		$subject ="";
		if(!empty($data['subject']))
		{
			$subject = $data['subject'];
		}
		else
		{
			$subject = "Booking details";
		}	
		$form = $this->noreply;
		$this->sendzohomail($to,$subject,$content);
		// $resp = $this->email->from($form)
		//  ->to($to)
		//  ->cc($cc)
		//  ->subject($subject)
		//  ->message($str)
		//  ->set_mailtype('html')
		//  ->send();
		//  $emaildata = array();
		//  $emaildata['form'] = $form;
		//  $emaildata['to'] = "info@travellermate.com";//$to;
		//  $emaildata['subject'] = $subject;
		//  $emaildata['content'] = $content;
		//  $emaildata['cc'] = $this->Site_Model->support_email;
		//  echo '<pre>';
		//  print_r($emaildata);
		//  echo '</pre>';
		// $emailjson = json_encode($emaildata);
		// // die;
		// //  echo '<pre>';
		// //  print_r(json_decode($emailjson));
		// //  echo '</pre>';
		//  $bookingobj = $this->auth->MakeLeadAPICall("POST","flight/sendmail",$emailjson);
		//  echo '<pre>';
		//  print_r($bookingobj);
		//  echo '</pre>';
		// die;

		
		// echo '<pre>';
		// print_r($mail);
		// echo '</pre>';

		//$to = 'afay@web-vio.com';
	// 	$sender = 'info@thetravellerbuddy.com';
	// 	$senderName = 'thetravellerbuddy';
	// 	$recipient = $this->Site_Model->support_email;
	// 	$usernameSmtp = 'AKIAQH4MSFEDYBUBV5H3';
	// 	$passwordSmtp = 'BJChnXdBiYEJuctRyQ+AwoLiP+gBOHAwrrZu07FU+um5';
	// 	$host = 'email-smtp.us-east-1.amazonaws.com';
	// 	$port = 587;
	// 	//$subject = 'Subject';
	// 	$bodyText =  "body....";
	// 	$bodyHtml = $str;

	// 	$mail = new PHPMailer(true);
	// 	// Specify the SMTP settings.
	// 	$mail->isSMTP();
	// 	$mail->setFrom($sender, $senderName);
	// 	$mail->Username   = $usernameSmtp;
	// 	$mail->Password   = $passwordSmtp;
	// 	$mail->Host       = $host;
	// 	$mail->Port       = $port;
	// 	$mail->SMTPAuth   = true;
	// 	$mail->SMTPSecure = 'tls';
	// //  $mail->addCustomHeader('X-SES-CONFIGURATION-SET', $configurationSet);

	// 	// Specify the message recipients.
	// 	$mail->addAddress($recipient);
	// 	// You can also add CC, BCC, and additional To recipients here.

	// 	// Specify the content of the message.
	// 	$mail->isHTML(true);
	// 	$mail->Subject    = $subject;
	// 	$mail->Body       = $bodyHtml;
	// 	//$mail->AltBody    = $bodyText;
	// 	$mail->Send();
		//echo "Email sent!" , PHP_EOL;

	}
	function sendzohomail($to,$subject,$content)
	{
		$this->load->library('email');
		$form = 'contact@anatripgo.com';
		$this->email->from($form)
        		 ->to($to)
        		 ->subject($subject)
        		 ->message($content)
        		 ->set_mailtype('html')
        		 ->send();
	// 	$sender = 'connect@travellogie.com';
	// 	$senderName = 'Travellogie';
	// 	$recipient = $to;
	// 	$usernameSmtp = 'AKIA552PNTKTORIU3WFQ';
	// 	$passwordSmtp = 'BCjaMFWq1z/0Ea6iyXG6hArkP14eJulC9xqklN12qB/E';
	// 	$host = 'email-smtp.us-east-1.amazonaws.com';
	// 	$port = 587;
	// 	//$subject = 'Subject';
	// 	$bodyText =  "body....";
	// 	$bodyHtml = $content;

	// 	$mail = new PHPMailer(true);
	// 	// Specify the SMTP settings.
	// 	$mail->isSMTP();
	// 	$mail->setFrom($sender, $senderName);
	// 	$mail->Username   = $usernameSmtp;
	// 	$mail->Password   = $passwordSmtp;
	// 	$mail->Host       = $host;
	// 	$mail->Port       = $port;
	// 	$mail->SMTPAuth   = true;
	// 	$mail->SMTPSecure = 'tls';
	// //  $mail->addCustomHeader('X-SES-CONFIGURATION-SET', $configurationSet);

	// 	// Specify the message recipients.
	// 	$mail->addAddress($recipient);
	// 	// You can also add CC, BCC, and additional To recipients here.

	// 	// Specify the content of the message.
	// 	$mail->isHTML(true);
	// 	$mail->Subject    = $subject;
	// 	$mail->Body       = $bodyHtml;
	// 	//$mail->AltBody    = $bodyText;
	// 	$resp = $mail->Send();
	}

	public function GetBlogSearchCategories()
    {
        $resp = array();
        $this->db->select('blogcategories.*');
        $this->db->from('blog');
        $this->db->join('blogcategories','blog.Category = blogcategories.id');
        $this->db->group_by('blog.Category');
        $rsblogcategories = $this->db->get();
        if($rsblogcategories->num_rows() > 0)
        {
            $resp = $rsblogcategories->result();
        }
        return $resp;
    }
	public function GetLatestBlog()
	{
		$this->db->select("*");
		$this->db->from("blog");
		$this->db->order_by("date desc");
        $this->db->limit(3);  
		$msblog = $this->db->get();
        //echo $this->db->last_query();
		$rowblogs = $msblog->result();
		return $rowblogs;
	}

	public function allBlogs($searchdata=array())
	{
        $resp = array();
		$page = !empty($this->input->get('per_page')) ? $this->input->get('per_page') : "";
        $limit_per_page = $searchdata['limit'];
        $pageNumber = !empty($searchdata['page1']) ? $searchdata['page1'] : 1;
        $start_from = ($pageNumber-1) * $limit_per_page;
       // echo $start_from;exit;
        
		$this->db->select("*");
		$this->db->from("blog");
        $this->db->where('status','1');
        if(!empty($searchdata['searchcriteria']))
        {
            $this->db->where("
            (alttag like '%".$searchdata['searchcriteria']."%') OR 
            (subject like '%".$searchdata['searchcriteria']."%') OR 
            (s_url like '%".$searchdata['searchcriteria']."%') OR 
            (description like '%".$searchdata['searchcriteria']."%') OR 
            (metakeywords like '%".$searchdata['searchcriteria']."%') OR 
            (metadescription like '%".$searchdata['searchcriteria']."%')
            "); 
        }
        if(!empty($searchdata['searchby']))
        {
            if($searchdata['searchby'] == "category")
            {
                if(!empty($searchdata['search']))
                {
                    $this->db->where("Category IN (SELECT id FROM blogcategories WHERE slug='".$searchdata['search']."')");
                }
            }
            if($searchdata['searchby'] == "tag")
            {
                if(!empty($searchdata['search']))
                {
                    $this->db->where("id IN (SELECT blog_id FROM blogtagrelationship as br,blogtags as bt WHERE br.tag_id = bt.id  and bt.slug='".$searchdata['search']."')");
                }
            }
        }
		$this->db->order_by("date desc");        
		$this->db->limit($limit_per_page,$start_from);
		$msblog = $this->db->get();
        //echo $this->db->last_query();die;
		$rowblogs = $msblog->result();
        $resp['result'] = $rowblogs;
        $this->db->select("*");
		$this->db->from("blog");
        $this->db->where('status','1');
        if(!empty($searchdata['searchcriteria']))
        {
            $this->db->where("
            (alttag like '%".$searchdata['searchcriteria']."%') OR 
            (subject like '%".$searchdata['searchcriteria']."%') OR 
            (s_url like '%".$searchdata['searchcriteria']."%') OR 
            (description like '%".$searchdata['searchcriteria']."%') OR 
            (metakeywords like '%".$searchdata['searchcriteria']."%') OR 
            (metadescription like '%".$searchdata['searchcriteria']."%')
            "); 
        }
        if(!empty($searchdata['searchby']))
        {
            if($searchdata['searchby'] == "category")
            {
                if(!empty($searchdata['search']))
                {
                    $this->db->where("Category IN (SELECT id FROM blogcategories WHERE slug='".$searchdata['search']."')");
                }
            }
            if($searchdata['searchby'] == "tag")
            {
                if(!empty($searchdata['search']))
                {
                    $this->db->where("id IN (SELECT blog_id FROM blogtagrelationship as br,blogtags as bt WHERE br.tag_id = bt.id  and bt.slug='".$searchdata['search']."')");
                }
            }
        }
		$this->db->order_by("date desc");        
		//$this->db->limit($limit_per_page,$start_from);
		$rowsblog = $this->db->get();
        $resp['totalblog'] = $rowsblog->num_rows();
		return $resp;
	}
	public function getBlogSearchTag()
    {
        $resp = array();
        $this->db->select('blogtags.*');
        $this->db->from('blog');
        $this->db->join('blogtagrelationship','blogtagrelationship.blog_id = blog.id');
        $this->db->join('blogtags','blogtags.id = blogtagrelationship.tag_id');        
        $this->db->group_by('blogtagrelationship.tag_id');
        $rsblogcategories = $this->db->get();
        if($rsblogcategories->num_rows() > 0)
        {
            $resp = $rsblogcategories->result();
        }
        return $resp;
    }

	public function blogMoreDetails($slug="")
	{
		$this->db->select("*");
		$this->db->from("blog");
		$this->db->where('s_url',$slug);
		$msblog = $this->db->get();
        //echo $this->db->last_query();exit;
		$rowblogs = $msblog->row();
		return $rowblogs;
	}
    
}
?>