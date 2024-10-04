<?php
date_default_timezone_set('America/Los_Angeles');
//include("stripe-php/init.php");
class Customer_Model extends CI_Model
{
    public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('FlightModel');
        $this->load->model('FlightModel');
        $this->support_email ='contact@anatripgo.com';
		$this->support_phone ='(855) 534 8537';
		$this->support_phone_link ='+18555348537 ';
		$this->website_address ='17901 Von Karman Ave Suite 600, Irvine, CA 92614';
		$this->websitename ='Anatripgo';
		$this->noreply ='Anatripgo<contact@anatripgo.com>';
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
                <td style="padding-top:20px;padding-left:40px;padding-right:40px" align="left"> <a href="#" target="_blank"> <img alt="Infinitybackup" src="'.base_url('assects/img/logo.png').'" width="180" border="0" style="display:block;border:none;outline:none;border-collapse:collapse;border-style:none" class="CToWUd"> </a> </td> 
                <td style="padding-top:20px;padding-left:40px;padding-right:40px" align="right"> 
                <a href="#" target="_blank"> <img alt="social media" src="'.base_url('assects/img/fb.png').'" width="20" border="0" style="display:inline-block;border:none;outline:none;border-collapse:collapse;border-style:none;margin-right: 4px;" class="CToWUd"> </a>
                <a href="#" target="_blank"> <img alt="social media" src="'.base_url('assects/img/insta.png').'" width="20" border="0" style="display:inline-block;border:none;outline:none;border-collapse:collapse;border-style:none;margin-right: 4px;" class="CToWUd"> </a>
                <a href="#" target="_blank"> <img alt="social media" src="'.base_url('assects/img/linkdn.png').'" width="20" border="0" style="display:inline-block;border:none;outline:none;border-collapse:collapse;border-style:none;margin-right: 4px;" class="CToWUd"> </a>
                <a href="#" target="_blank"> <img alt="social media" src="'.base_url('assects/img/twitter.png').'" width="20" border="0" style="display:inline-block;border:none;outline:none;border-collapse:collapse;border-style:none;margin-right: 4px;" class="CToWUd"> </a>
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
                <td align="left" style="padding-top:20px;color:#221f1f;font-family:NetflixSans-Bold,Helvetica,Roboto,Segoe UI,sans-serif;font-weight:700;padding-left:40px;padding-right:40px;font-size:12px;line-height:17px;letter-spacing:-0.2px"> Sincerely.<br>Best regards<br>The Infinitybackup team </td> 
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
                    <td width="1%" valign="top" style="padding-right:22px"> <a href="#" style="color:inherit" target="_blank"> <img alt="Infinitybackup" src="'.base_url('assects/img/logo.png').'" width="180" border="0" style="border:none;outline:none;border-collapse:collapse;border-style:none" class="CToWUd"> </a> </td> 
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
						<a href="'.base_url('terms-condition').'" style="font-family:NetflixSans-Light,Helvetica,Roboto,Segoe UI,sans-serif;font-weight:300;
						font-size:12px;line-height:20px;text-decoration:underline;color:rgb(164,164,164);color:inherit" target="_blank">Terms & condition</a><br>
						<a href="'.base_url('privacy-poticy').'" style="font-family:NetflixSans-Light,Helvetica,Roboto,Segoe UI,sans-serif;font-weight:300;font-size:12px;
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
    public function web_login($email, $password)
	{
		//$this->db->select('U.*, D.designation as desig_nation');
		$this->db->select('U.*');
		$this->db->from('cxdetail as U');
		//$this->db->join('designation as D', 'D.id=U.designation', 'left');
		$this->db->where('email', $email);
		$this->db->where('password', md5($password));
		$login_data = $this->db->get();
		//echo $this->db->last_query();
		if($login_data->num_rows()>0){
			return $login_data->row_array();
		} else {
			return 0;
		}
	}
    public function send_reset_password($email="")
    {
        $resp = array();
        if(!empty($email))
        {
            $this->db->select("*");
            $this->db->from("cxdetail");
            $this->db->where("email",$email);
            $rscustomer = $this->db->get();
            if($rscustomer->num_rows() > 0)
            {
                $rowcustomer = $rscustomer->row();
                $customerinfo = array();
                $customerinfo['cxId'] = $rowcustomer->cxId;
                //$customerinfo['email'] = $rowcustomer->email;
                $customerinfojson = json_encode($customerinfo);
                $customerinfolink = base64_encode($customerinfojson);
                $resetpasslink = base_url('reset-password/'.$customerinfolink);
                $emailcontent ='';
                $emailcontent .='<table align="left" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0"> 
                <tbody>
                <tr> 
                <td align="left" style="padding-top:20px;color:#221f1f;
                padding-left:40px;padding-right:40px;font-family:NetflixSans-Light,Helvetica,Roboto,Segoe UI,sans-serif;
                font-weight:700;font-size:12px;line-height:21px;line-height:21px"> Hi User</td> 
                </tr> 
                </tbody>
                </table> 
                <table align="left" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0"> 
                    <tbody>
                    <tr> 
                    <td align="left" style="padding-top:20px;color:#221f1f;padding-left:40px;padding-right:40px;font-family:NetflixSans-Light,Helvetica,Roboto,Segoe UI,sans-serif;font-weight:300;line-height:21px;font-size:12px;line-height:21px"> 
                        <p>Someone has requested a password reset for the following account:</p>
                        <p>'; 
                        $emailcontent .='<p>Customer details information</p>';
                        $emailcontent .='<p>Site Name: <b>'.$this->Site_Model->websitename.'</b></p>';
                        $emailcontent .='<p>Email : <b>'.$email.'</b></p>';
                        $emailcontent .='</td> 
                    </tr> 
                    <tr> 
                    <td align="left" style="padding-top:20px;color:#221f1f;padding-left:40px;padding-right:40px;font-family:NetflixSans-Light,Helvetica,Roboto,Segoe UI,sans-serif;font-weight:300;line-height:21px;font-size:12px;line-height:21px"> 
                        <p>If this was a mistake, ignore this email and nothing will happen.</p>';
                        $emailcontent .='<p>To reset your password, visit the following address:</p>';
                        $emailcontent .='<p><a href="'.$resetpasslink.'">'.$resetpasslink.'</a></p>';
                        $emailcontent .='</td> 
                    </tr>
                </tbody>
                </table> ';
                //echo $emailcontent;
                $content = $this->FlightModel->GetEmailTemplate($emailcontent);
                //echo $content;
                $to = $email;
                $subject = $this->Site_Model->websitename." - Password Reset";
                $form = $this->noreply;
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
                //$this->Site_Model->sendzohomail($cc,$subject,$content);

                // $this->email->from($form)
                // ->to($this->support_email)
                // ->subject($subject)
                // ->message($content)
                // ->set_mailtype('html')
                // ->send();
                $resp['Status'] = 0;
                $resp['Message'] = "Check your email for the confirmation link, then visit the <a href='".base_url('login')."'>login page</a>.";


    //             $sender = 'info@thetravellerbuddy.com';
	// 	$senderName = 'thetravellerbuddy';
	// 	$recipient = 'info@thetravellerbuddy.com';
	// 	$usernameSmtp = 'AKIAQH4MSFEDYBUBV5H3';
	// 	$passwordSmtp = 'BJChnXdBiYEJuctRyQ+AwoLiP+gBOHAwrrZu07FU+um5';
	// 	$host = 'email-smtp.us-east-1.amazonaws.com';
	// 	$port = 587;
	// 	//$subject = 'Subject';
	// 	$bodyText =  "body....";
	// 	$bodyHtml = $emailcontent;

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


            }
            else
            {
                $resp['Status'] = 0;
                $resp['Message'] = "There is no account with that email address.";
            }
        }
        else
        {
            $resp['Status'] = 0;
            $resp['Message'] = "Email address is require";
        }
        return $resp;

    }
    public function save_reset_password($data)
    {
        $resp = array();
        $validdata = $this->ValidatePassworddata($data);
        if($validdata['IsValid'] = 1)
        {
            $userdata = json_decode(base64_decode($data['Userdata']));
            if(!empty($userdata->cxId))
            {
                $this->db->select("*");
                $this->db->from("cxdetail");
                $this->db->where("cxId",$userdata->cxId);
                $rscustomer = $this->db->get();
                if($rscustomer->num_rows() > 0)
                {
                    
                    $reqparam = array(
                        'password' => md5($data['Password'])
                    );
                    $this->db->update("cxdetail",$reqparam,array('cxId'=>$userdata->cxId));
                    //echo $this->db->last_query();
                    //die;
                    //echo $data['Password']."====";die;
                    $resp['Status'] = 1;
                    $resp['Message'] = "Password reset successfully";
                }
                else
                {
                    $resp['Status'] = 0;
                    $resp['Message'] = "Customer information not exists";
                }
            }
            else
            {
                $resp['Status'] = 0;
                $resp['Message'] = "Customer information is require";
            }
        }
        return $resp;
    }
    public function ValidatePassworddata($data)
    {
        $resp = array();
        if(!array_key_exists("Password",$data) && empty($data['Password']))
        {
            $resp['IsValid'] = 0;
            $resp['Status'] = 0;
            $resp['Message'] = "Password is require";
        }
        if(!array_key_exists("Crpassword",$data) && empty($data['Crpassword']))
        {
            $resp['IsValid'] = 0;
            $resp['Status'] = 0;
            $resp['Message'] = "Confirm Password is require";
        }
        if(!empty($data['Password']) && !empty($data['Crpassword']) && ($data['Crpassword'] != $data['Password']))
        {
            $resp['IsValid'] = 0;
            $resp['Status'] = 0;
            $resp['Message'] = "Confirm Password is require";
        }
        if(!array_key_exists("userdata",$data) && empty($data['userdata']))
        {
            $resp['IsValid'] = 0;
            $resp['Status'] = 0;
            $resp['Message'] = "Invalid customer details";
        }
        $resp['IsValid'] = 1;
        return $resp;
    }
    function update_login($u_id, $status)
	{
		$data['loginStatus'] = $status;
		$this->db->where('userId', $u_id);
		$this->db->update('userdetail', $data);
		$result = $this->db->affected_rows();
		return $result;
	}
    function split_name($name) {
        $name = trim($name);
        $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $first_name = trim( preg_replace('#'.preg_quote($last_name,'#').'#', '', $name ) );
        return array($first_name, $last_name);
    }
    public function update_profie($data = array())
    {
        $resp= array();
        $validdata = $this->Validateprofile($data);
        if($validdata['isvalid'] == 1)
        {
            $reqarra = array();
            $this->db->select("*");
            $this->db->from("cxdetail");
            $this->db->where("email",$data['email']);
            $this->db->where("cxId !='".$data['cxId']."'");
            $rscxdetails = $this->db->get();
            if($rscxdetails->num_rows() == 0)
            {
                $reqarra['cxName'] = $data['firstName']." ".$data['lastName'];
                $reqarra['email'] = $data['email'];
                $reqarra['cxPhone'] = $data['cxPhone'];
                $reqarra['cxAltPhone'] = $data['cxAltPhone'];
                $reqarra['firstName	'] = $data['firstName'];
                $reqarra['lastName'] = $data['lastName'];
                $this->db->update("cxdetail",$reqarra,array('cxId' => $data['cxId']));
                //echo $this->db->last_query();
               // die;
                $resp['Id'] =0;
                $resp['Status'] = 1;
                $resp['Message'] = "Profile updated successfully";
            }
            else
            {
                $resp['Id'] =0;
                $resp['Status'] = 1;
                $resp['Message'] = "Email already used by another customer";
            }
        }
        else
        {
            $errmsg .= $validrow['errormessage'];
        }
        if(!empty($errmsg))
        {
            $resp['Id'] =0;
            $resp['Status'] = 0;
            $resp['Message'] = $errmsg;
        }
        return $resp;
    }
    public function Validateprofile($data=array())
    {
        $resp = array();
        if(!array_key_exists("firstName",$data) && empty($data['firstName']))
        {
            $resp['isvalid']=0; 
            $resp['status']=0; 
            $resp['errormessage']="First name is require"; 
            return $resp;
        }
        if(!array_key_exists("lastName",$data) && empty($data['lastName']))
        {
            $resp['isvalid']=0; 
            $resp['status']=0; 
            $resp['errormessage']="Last name is require"; 
            return $resp;
        }
        if(!array_key_exists("email",$data) && empty($data['email']))
        {
            $resp['isvalid']=0; 
            $resp['status']=0; 
            $resp['errormessage']="Email is require"; 
            return $resp;
        }
        if(!array_key_exists("cxPhone",$data) && empty($data['cxPhone']))
        {
            $resp['isvalid']=0; 
            $resp['status']=0; 
            $resp['errormessage']="Phone is require"; 
            return $resp;
        }
        $resp['isvalid']=1; 
        return $resp;
    }
    public function update_password($data = array())
    {
        $resp= array();
        $validdata = $this->Validatepassword($data);
        if($validdata['isvalid'] == 1)
        {
            $reqarra = array();
            $reqarra['password'] = md5($data['password']);
            $this->db->update("cxdetail",$reqarra,array('cxId' => $data['cxId']));
            //echo $this->db->last_query();
           // die;
            $resp['Id'] =0;
            $resp['Status'] = 1;
            $resp['Message'] = "Password updated successfully";
        }
        else
        {
            $errmsg .= $validrow['errormessage'];
        }
        if(!empty($errmsg))
        {
            $resp['Id'] =0;
            $resp['Status'] = 0;
            $resp['Message'] = $errmsg;
        }
        return $resp;
    }
    public function Validatepassword($data=array())
    {
        $resp = array();
        if(!array_key_exists("password",$data) && empty($data['password']))
        {
            $resp['isvalid']=0; 
            $resp['status']=0; 
            $resp['errormessage']="Password is require"; 
            return $resp;
        }
        if(!array_key_exists("cpassword",$data) && empty($data['cpassword']))
        {
            $resp['isvalid']=0; 
            $resp['status']=0; 
            $resp['errormessage']="Confirm password is require"; 
            return $resp;
        }
        if(!array_key_exists("cpassword",$data) 
        && !empty($data['password'])
        && $data['password'] != $data['password']
        )
        {
            $resp['isvalid']=0; 
            $resp['status']=0; 
            $resp['errormessage']="Confirm password does not match with password"; 
            return $resp;
        }        
        $resp['isvalid']=1; 
        return $resp;
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
    public function check_customer_email($fieldvalue)
	{
		$invdetail = 0;
		if(!empty($fieldvalue))
		{
			$this->db->select('*');
			$this->db->from('cxdetail');
			$this->db->where("email",$fieldvalue);
			$inv = $this->db->get();
			$invdetail = $inv->num_rows();
			//echo $this->db->last_query();	
		}
		return $invdetail;
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
                                $emailcontent .='<div><a href="'.base_url('login').'">Click Here</a> to login into '.$this->websitename.' Website Dashboard.</div>';
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
            $subject = $this->Site_Model->websitename." - Account Details Of ".$this->websitename;
            $form = $this->support_email;
            $this->load->library('email');
            $this->email->from($form)
            ->to($to)
            ->subject($subject)
            ->message($content)
            ->set_mailtype('html')
            ->send();
			
			$resp['Id'] =$cusid;
			$resp['Status'] = 1;
			$resp['Message'] = "You are Successfully Registered With Us. Please Login and Check Email.";
			

            /*$emaildata = array();
            $emaildata['form'] = $form;
            $emaildata['to'] = $this->support_email;
            $emaildata['subject'] = $subject;
            $emaildata['content'] = $content;
            $emaildata['cc'] = "";
            $emailjson = json_encode($emaildata);
            $bookingobj = $this->auth->MakeLeadAPICall("POST","flight/sendmail",$emailjson);

            $this->Site_Model->sendzohomail($form,$subject,$content);*/

            /*$this->email->from($form)
            ->to($this->support_email)
            ->subject($subject)
            ->message($content)
            ->set_mailtype('html')
            ->send();*/
            
			//for api call
            /*$emaildata = array();
            $emaildata['form'] = $form;
            $emaildata['to'] = $this->support_email;
            $emaildata['subject'] = $subject;
            $emaildata['content'] = $content;
            $emaildata['cc'] = $this->Site_Model->support_email;
            $emailjson = json_encode($emaildata);
            $bookingobj = $this->auth->MakeLeadAPICall("POST","flight/sendmail",$emailjson);*/

                


           
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
    public function GetCutomerDetails($customerid=0)
    {
       $customerobj = array();
        if($customerid > 0)
        {
            $this->db->select("*");
            $this->db->from("cxdetail");
            $this->db->where("cxId",$customerid);
            $rscustomer = $this->db->get();
            //echo $this->db->last_query();
            if($rscustomer->num_rows() > 0)
            {
                $rowcustomer = $rscustomer->row();
                $customerobj = $rowcustomer;
            }
        }
        return $customerobj;
    }
    public function GetCustomerBookings()
	{
	    $cxId = $this->session->userdata('cxId');
	    $resp = array();
	    if($cxId > 0)
	    {
	        $this->db->select("*");
	        $this->db->from("travellingplaninfo");
	        $this->db->where("cxId",$cxId);
            $this->db->order_by("Createdate DESC");
	        $rsbookings =  $this->db->get();
	        $resp = $rsbookings->result();
	    }
	    return $resp;
	}
    public function GetCustomerHotelBookings()
	{
	    $cxId = $this->session->userdata('cxId');
	    $resp = array();
	    if($cxId > 0)
	    {
	        $this->db->select("*");
	        $this->db->from("travellerhotelinfo");
	        $this->db->where("cxId",$cxId);
            $this->db->order_by("Createdate DESC");
	        $rsbookings =  $this->db->get();
	        $resp = $rsbookings->result();
	    }
	    return $resp;
	}
    public function GetFlightBookingDetails($bookingid=0)
    {
        $resp= array();
        $this->db->select("*");
        $this->db->from("travellingplaninfo");
        $this->db->where("PlainId",$bookingid);
        $rstravellingplaninfo = $this->db->get();
        $resp = $rstravellingplaninfo->row();
        $resp->travellerinfo = null;
        $this->db->select("*");
        $this->db->from("travellerinfo");
        $this->db->where("PlainId",$bookingid);
        $rstravellerinfo = $this->db->get();
        $travelllerinfo = $rstravellerinfo->row();
        $resp->travellerinfo = $travelllerinfo;
        $resp->travellerinfo->Flightdetails = null;
        $resp->travellerinfo->flightdetails = json_decode($travelllerinfo->flight_data);

        $this->db->select("*");
        $this->db->from("travellerpassengerinfo");
        $this->db->where("PlainId",$bookingid);
        $rstravellerpassengerinfo = $this->db->get();
        $travelllerpassengerinfo = $rstravellerpassengerinfo->result();
        $resp->passengerinfo = $travelllerpassengerinfo;
        return $resp;

    }
    
}
?>