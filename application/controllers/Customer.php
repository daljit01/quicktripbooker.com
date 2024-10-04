<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends CI_Controller {

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
		$this->load->helper('url');
		$this->load->model('Customer_Model');
		$this->load->model('Site_Model');
		$this->load->library('session');
	}
	public function login()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$data['title'] = "Grab the cheapest flights to land to your dream destination";
		$data['keywords'] = "";
		$data['description'] = "Are you looking for the best flight deals to fly high to your favorite land? Come, find the best deals here at Infinity Travels now, and save big.";
		$data['image'] = base_url()."assects/image/logo-footer.png";
		$data['userheader'] ="login-hd";
		$this->default_template->load('defaultTemplate', 'contents' , 'customer/login',$data);
	}	
	public function do_login()
	{
		$response = array();
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$login_data = $this->Customer_Model->web_login($email, $password);
		if($login_data!=0){
			$userdata['user_logged_id'] = $login_data['id'];
			$userdata['cxId'] = $login_data['cxId'];
			$userdata['name'] = $login_data['firstName'];
			$userdata['email'] = $login_data['email'];
			$this->session->set_userdata($userdata);
			
			redirect(base_url('myprofile'));
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
		redirect(base_url('login'));
	}
	public function signup()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$data['title'] = "Grab the cheapest flights to land to your dream destination";
		$data['keywords'] = "";
		$data['description'] = "Are you looking for the best flight deals to fly high to your favorite land? Come, find the best deals here at Infinity Travels now, and save big.";
		$data['image'] = base_url()."assects/image/logo-footer.png";
		$data['userheader'] ="login-header";
		$data['Countries'] = $this->Customer_Model->GetCountries();
		$data['userheader'] ="login-hd";
		$this->default_template->load('defaultTemplate', 'contents' , 'customer/signup',$data);
	}
	public function check_customer_email()
	{
		$checkpnr = 0;
		$fieldvalue = !empty($this->input->post('email')) ? $this->input->post('email') : "";
		//echo $fieldname."=====".$fieldvalue;
		if(!empty($fieldvalue))
		{
			$checkpnr= $this->Customer_Model->check_customer_email($fieldvalue);			
		}
		echo  $checkpnr;
	}
	public function register_customer()
	{
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
		$resp = $this->Customer_Model->SaveCustomer($requestdata);
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
	public function forget_password()
	{
		$page = $this->uri->segment(1);
		$data['page'] = $page;
		$data['userheader'] ="login-hd";
		$this->default_template->load('defaultTemplate', 'contents' , 'customer/forget-password',$data);
	}
	public function send_reset_password()
	{
		$email = $this->input->post('email');
		$resp = $this->Customer_Model->send_reset_password($email);
		$this->session->set_flashdata('status', $resp['Status']);
		$this->session->set_flashdata('msg', $resp['Message']);
		redirect(base_url('forget-password'));
	}
	public function reset_password($user="")
	{
		$page = $this->uri->segment(1);
		$data['page'] = $page;
		$data['userdata'] = $user;
		$this->default_template->load('defaultTemplate', 'contents' , 'customer/reset-password',$data);
	}
	public function save_reset_password()
	{
		$rpassword = $this->input->post('rpassword');
		$crpassword = $this->input->post('crpassword');
		$userdata = $this->input->post('userdata');
		$req = array();
		$req['Password'] = $rpassword;
		$req['Crpassword'] = $crpassword;
		$req['Userdata'] = $userdata;
		$resp = $this->Customer_Model->save_reset_password($req);
		$this->session->set_flashdata('status', $resp['Status']);
		$this->session->set_flashdata('msg', $resp['Message']);
		if($resp['Status'] == 0)
		{
			redirect(base_url('forget-password'));
		}
		else
		{
			redirect(base_url('login'));
		}
		
	}
	public function mybooking() 
	{
		if(!$this->session->userdata('user_logged_id')){
			redirect(base_url('login'));
        }
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$data['title'] = "Grab the cheapest flights to land to your dream destination";
		$data['keywords'] = "";
		$data['description'] = "Are you looking for the best flight deals to fly high to your favorite land? Come, find the best deals here at Infinity Travels now, and save big.";
		$data['image'] = base_url()."assects/image/logo-footer.png";
		$customerbookings =$this->Customer_Model->GetCustomerBookings();
		$data['customerbookings']= $customerbookings;
		$this->default_template->load('userTemplate', 'contents' , 'customer/mybooking',$data);
		//$this->load->view('mybooking',$data);
	}
	public function viewbooking($bookingid="")
	{
		if(!$this->session->userdata('user_logged_id')){
			redirect(base_url('login'));
        }
		$page = $this->uri->segment(1);
		$data['page']= $page;
		$customerbookings = $this->Customer_Model->GetFlightBookingDetails($bookingid);
		
		$data['details']= $customerbookings;
		$this->default_template->load('userTemplate', 'contents' , 'customer/viewbooking',$data);
	}
	public function myhotelbooking() 
	{
		if(!$this->session->userdata('user_logged_id')){
			redirect(base_url('login'));
        }
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$data['title'] = "Grab the cheapest flights to land to your dream destination";
		$data['keywords'] = "";
		$data['description'] = "Are you looking for the best flight deals to fly high to your favorite land? Come, find the best deals here at Infinity Travels now, and save big.";
		$data['image'] = base_url()."assects/image/logo-footer.png";
		$customerbookings =$this->Customer_Model->GetCustomerHotelBookings();
		$data['customerhotelbookings']= $customerbookings;
		$this->default_template->load('userTemplate', 'contents' , 'customer/myhotelbooking',$data);
		//$this->load->view('mybooking',$data);
	}
	
	public function dashboard() 
	{
		if(!$this->session->userdata('user_logged_id')){
			redirect(base_url('login'));
        }
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$data['userheader'] ="login-hd";
		$data['title'] = "Grab the cheapest flights to land to your dream destination";
		$data['keywords'] = "";
		$data['description'] = "Are you looking for the best flight deals to fly high to your favorite land? Come, find the best deals here at Infinity Travels now, and save big.";
		$data['image'] = base_url()."assects/image/logo-footer.png";
		//$this->load->view('dashboard',$data);
		$this->default_template->load('userTemplate', 'contents' , 'customer/dashboard',$data);
	}
	public function changepassword() 
	{
		if(!$this->session->userdata('user_logged_id')){
			redirect(base_url('login'));
        }
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$data['title'] = "Grab the cheapest flights to land to your dream destination";
		$data['keywords'] = "";
		$data['description'] = "Are you looking for the best flight deals to fly high to your favorite land? Come, find the best deals here at Infinity Travels now, and save big.";
		$data['image'] = base_url()."assects/image/logo-footer.png";
		$this->default_template->load('userTemplate', 'contents' , 'customer/changepassword',$data);
	}
	public function save_password_change()
	{
		if(!$this->session->userdata('user_logged_id')){
			redirect(base_url('login'));
        }
		$password = $this->input->post('cpassword');
		$cpassword = $this->input->post('conpassword');
		$reqdata = array();
		$reqdata['password'] = $password;
		$reqdata['cpassword'] = $cpassword;
		$reqdata['cxId'] = $this->session->userdata('cxId');
		$resp = $this->Customer_Model->update_password($reqdata);
		$this->session->set_flashdata('status', $resp['Status']);
		$this->session->set_flashdata('msg',  $resp['Message']);
		redirect(base_url('changepassword'));
		
	}
	public function myprofile() 
	{
		if(!$this->session->userdata('user_logged_id')){
			redirect(base_url('login'));
        }
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$data['title'] = "Grab the cheapest flights to land to your dream destination";
		$data['keywords'] = "";
		$data['description'] = "Are you looking for the best flight deals to fly high to your favorite land? Come, find the best deals here at Infinity Travels now, and save big.";
		$data['image'] = base_url()."assects/image/logo-footer.png";
		$userid = $this->session->userdata('cxId');
		$customerdetails = $this->Customer_Model->GetCutomerDetails($userid);
		$data['customerdetails']= $customerdetails;
		$this->default_template->load('userTemplate', 'contents' , 'customer/myprofile',$data);
	}
	public function update_profie()
	{
		if(!($this->session->userdata('user_logged_id'))){
			redirect(base_url().'login');
		}
		$firstName = $this->input->post('firstName');
		$lastName = $this->input->post('lastName');
		$email = $this->input->post('email');
		$cxPhone = $this->input->post('cxPhone');
		$cxAltPhone = $this->input->post('cxAltPhone');
		$reqdata = array();
		$reqdata['firstName'] = $firstName;
		$reqdata['lastName'] = $lastName;
		$reqdata['firstName'] = $firstName;
		$reqdata['lastName'] = $lastName;
		$reqdata['email'] = $email;
		$reqdata['cxPhone'] = $cxPhone;
		$reqdata['cxAltPhone'] = $cxAltPhone;
		$reqdata['cxId'] = $this->session->userdata('cxId');
		$resp = $this->Customer_Model->update_profie($reqdata);
		$this->session->set_flashdata('status', $resp['Status']);
		$this->session->set_flashdata('msg',  $resp['Message']);
		redirect(base_url('myprofile'));
	}
	
}
