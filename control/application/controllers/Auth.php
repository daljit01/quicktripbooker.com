<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Auth_model','auth_model');
		
	}

	public function login()
	{
		//echo 'autho';
		if(($this->session->userdata('user_id'))){
			redirect(base_url().'dashboard');
		}
		$data = array();
		$this->authtemplate->set('title', 'APP:Login');
		$this->authtemplate->load('authTemplate', 'contents' , 'login' , $data);
	}

	public function do_login()
	{
		$response = array();
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$login_data = $this->auth_model->web_login($username, $password);
		if($login_data!=0){
			$userdata['user_id'] = $login_data['id'];
			$userdata['username'] = $login_data['username'];
			$userdata['email'] = $login_data['email'];
			$userdata['name'] = $login_data['name'];
			$userdata['designation'] = $login_data['designation'];
			$userdata['rank'] = $login_data['desig_nation'];
			//$userdata['teamName'] = $login_data['teamName'];
			$this->session->set_userdata($userdata);
			$this->auth_model->update_login($login_data['id'], 1);

			$uname = $this->session->userdata('name');
			//$logdata['lead_orderid'] = $lead_id;
			$logdata['type'] = 'User Login';
			$logdata['notes'] = 'user Login- '.$uname.' On '.date('Y-m-d h:i:s');
			$logdata['modified_by'] = $this->session->userdata('user_id');
			$logdata['modified_at'] = date('Y-m-d h:i:s');
			//$logdata['customerid'] = $customerId;
			$this->auth_model->insert_log($logdata);
			//$response = array('status'=>1, 'data'=>$login_data, 'msg'=>'Login Successful!');
			redirect(base_url('admindashboard'));
		} else {
			$this->session->set_flashdata('status', 0);
			$this->session->set_flashdata('msg', 'Please Enter Valid Credentials');
			redirect(base_url('/'));
		}
	}

	public function logout()
	{
		$uname = $this->session->userdata('name');
		//$logdata['lead_orderid'] = $lead_id;
		$logdata['type'] = 'User Logout';
		$logdata['notes'] = 'user Logout- '.$uname.' On '.date('Y-m-d h:i:s');
		$logdata['modified_by'] = $this->session->userdata('user_id');
		$logdata['modified_at'] = date('Y-m-d h:i:s');
		//$logdata['customerid'] = $customerId;
		$this->auth_model->insert_log($logdata);

		$login_id = $this->session->userdata('user_id');
		$this->auth_model->update_login($login_id, 0);
		$this->session->sess_destroy();
		redirect(base_url('/'));
	}

	public function changepassword()
	{
		if(!$this->session->userdata('user_id')){
			redirect(base_url().'admin-login');
		}
		$data = array();
		$this->authtemplate->set('title', 'App:Change Password');
		$this->authtemplate->load('authTemplate', 'contents' , 'changepassword' , $data);
	}

	public function save_password(){
		$response = array();

		//editor1
		//echo $editor1 = $this->input->post('editor1'); exit;
		$login_id = $this->session->userdata('user_id');
		$currentpassword = $this->input->post('currentpassword');
		$passwprd = $this->input->post('passwprd');
		$confirmpassword = $this->input->post('confirmpassword');
		
		$userdata = $this->auth_model->check_User_password($currentpassword,$login_id);
		if($userdata != 0)
		{
			if($passwprd  == $confirmpassword )
			{
				$userdata = $this->auth_model->update_password($login_id,$passwprd);
				if($userdata > 0)
				{
					$this->session->set_flashdata('status', 1);
					$this->session->set_flashdata('msg', 'Password changed successfully');
				}
				else
				{
					$this->session->set_flashdata('status', 0);
					$this->session->set_flashdata('msg', 'Failed to update password');
				}
				
			}
			else
			{
				$this->session->set_flashdata('status', 0);
				$this->session->set_flashdata('msg', 'Password And confirm password Does not matched');
				
			}
		}
		else
		{
			$this->session->set_flashdata('status', 0);
			$this->session->set_flashdata('msg', 'Current password does not matched');
		}
		//echo '<pre>';
		//print_r($response);
		//echo '</pre>';die;
		redirect(base_url('admin-password'));
	}

	//comingsoon
	public function comingsoon()
	{
		
		$data = array();
		$this->authtemplate->set('title', 'App:Page Under Development');
		$this->authtemplate->load('authTemplate', 'contents' , 'comingsoon' , $data);
	}

	
}
