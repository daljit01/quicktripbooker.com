<?php
date_default_timezone_set('Asia/Kolkata');

class Auth_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function web_login($email, $password)
	{
		$this->db->select('U.*, D.designation as desig_nation');
		$this->db->from('users as U');
		$this->db->join('designation as D', 'D.id=U.designation', 'left');
		$this->db->where('username', $email);
		$this->db->where('password', md5($password));
		$login_data = $this->db->get();
		if($login_data->num_rows()>0){
			return $login_data->row_array();
		} else {
			return 0;
		}
	}

	function email_exists($email)
	{
		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('email', $email);
		$login_data = $this->db->get();
		if($login_data->num_rows()>0){
			return $login_data->row_array();
		} else {
			return 0;
		}
	}

	function update_login($u_id, $status)
	{
		$data['is_logged_in'] = $status;
		$this->db->where('id', $u_id);
		$this->db->update('users', $data);
		$result = $this->db->affected_rows();
		return $result;
	}
	function check_User_password($password,$userId)
	{
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('id', $userId);
		$this->db->where('password', md5($password));
		$user_data = $this->db->get();
		$numrow = $user_data->num_rows();
		return $numrow;
		// if($user_data->num_rows()>0){
		// 	return $user_data->row();
		// } else {
		// 	return 0;
		// }
	}
	function update_password($u_id, $password)
	{
		$data['password'] = md5($password);
		$this->db->where('id', $u_id);
		$this->db->update('users', $data);
		$result = $this->db->affected_rows();
		return $result;
	}

    public function insert_log($logdata)
	{
		$this->db->insert('userlog', $logdata);
		$this->db->insert_id();
		
	}
	
	function MakeAPICall($baseurl,$method, $url, $data="",$isformdata=0){
		//echo $baseurl."====".$method."======".$url."========".$isformdata;
		
		$curl = curl_init();
		//$baseurl = "https://adeebatourandtravels.com/index.php/api/"; 
		$baseurl = $baseurl."/api/"; 
		$url = $baseurl.$url;
		//echo $url;exit;
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
		//echo $url;
		// echo $data;
		// die;
		// OPTIONS:
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0); 
		curl_setopt($curl, CURLOPT_TIMEOUT, 400); //timeout in seconds
		curl_setopt($curl, CURLOPT_URL, $url);
		if($isformdata == 1)
		{   
			
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: multipart/form-data',
			));
		}
		else
		{
			// echo $url;
			// echo $data;
			// die;
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			));
		}
		// echo $url;
		// 	echo $data;
		// 	die;
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		// EXECUTE:
		$result = curl_exec($curl);
		//echo $result;exit;
		if(!$result){die("Connection Failure");}
		curl_close($curl);
		return json_decode($result);
	}

	public function GetWebvioBlogs()
	{
		$this->db->select("*");
		$this->db->from("blog");
		$this->db->order_by("date desc");
		$rswebvioblog = $this->db->get();
		$rowblogs = $rswebvioblog->result();
		return $rowblogs;
	}
	public function GetWebvioBlog($id)
	{
		$this->db->select("*");
		$this->db->from("blog");
		$this->db->where("id='".$id."'");
		$this->db->order_by("date desc");
		$rswebvioblog = $this->db->get();
		$rowblogs = $rswebvioblog->row();
		return $rowblogs;
	}

	
	
}
