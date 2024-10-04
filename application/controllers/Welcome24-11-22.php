<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->model('Site_Model');
		$this->load->model('FlightModel');
        $this->load->model('FlightModel');
	}
	public function index()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$date = date("Y-m-d");
		$date = strtotime($date);
		$date = strtotime("+7 day", $date);
		$departureDate = date("m/d/Y",$date);
		$data['departureDate'] = $departureDate;
		$this->default_template->load('defaultTemplate', 'contents' , 'index',$data);
	}
	public function flight()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'flight',$data);
	}
	public function hotel()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'hotel',$data);
	}
	public function hotelflight()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'hotel-flight',$data);
	}
	public function about()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'about',$data);
	}
	public function contact()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'contact',$data);
	}
	public function privacy_policy()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'privacy-policy',$data);
	}
	public function taxes_and_fees()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'taxes-and-fees',$data);
	}
	public function disclaimer()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'disclaimer',$data);
	}
	public function online_check_in()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'online-check-in',$data);
	}
	
	public function refund_policy()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'refund-policy',$data);
	}
	public function terms_and_conditions()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'terms-and-condition',$data);
	}
	public function massachusetts()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'massachusetts',$data);
	}
	public function calgary()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'calgary',$data);
	}
	public function seattle()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'seattle',$data);
	}
	public function montreal()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'montreal',$data);
	}
	public function austin()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'austin',$data);
	}
	public function lake_tahoe()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'lake-tahoe',$data);
	}
	public function Kitchener()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'Kitchener',$data);
	}

	public function philadelphia()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'philadelphia',$data);
	}
	public function Savannah()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'Savannah',$data);
	}
	public function atlanta()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'atlanta',$data);
	}

	public function houston()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'houston',$data);
	}

	public function chicago()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'chicago',$data);
	}

	public function alaska_airlines()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'alaska-airlines',$data);
	}

	public function allegient_airlines()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'allegient-airlines',$data);
	}
	public function american_airlines()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'american-airlines',$data);
	}

	public function air_canada()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'air-canada',$data);
	}


	public function Westjet()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'Westjet',$data);
	}


	public function Lufthansa()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'Lufthansa',$data);
	}

	public function Qatar()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'Qatar',$data);
	}


	public function Turkish()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'Turkish',$data);
	}


	public function British()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'British',$data);
	}

	public function delta_airlines()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'delta-airlines',$data);
	}
	public function frontiar_airlines()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'frontiar-airlines',$data);
	}
	public function hawaii_airlines()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'hawaii-airlines',$data);
	}
	public function jetBlue_airlines()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'jetBlue-airlines',$data);
	}
	public function southwest_airlines()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'southwest-airlines',$data);
	}
	public function sprite_airlines()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$this->default_template->load('defaultTemplate', 'contents' , 'sprite-airlines',$data);
	}
	public function register()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		$data['userheader'] ="login-hd";
		$this->default_template->load('defaultTemplate', 'contents' , 'register',$data);
	}
	public function booking_confirmation($confirmationid = "")
	{
	    $data = array();
		$page = $this->uri->segment(1);
		$data['page'] = $page;
		$data['confirmationid'] = $confirmationid;
		//this->default_template->load('defaultTemplate', 'contents' , 'lufthansa',$data);
   	//$this->default_template->load('defaultTemplate', 'contents' , 'booking-confirmation',$data);
   		$this->load->view('booking-confirmation',$data);
	}
	public function thank_you()
	{
		$page = $this->uri->segment(1);
		$data = array();
		$data['page']= $page;
		//$this->default_template->load('authTemplate', 'contents' , 'thank-you',$data);
		$this->load->view('thank-you',$data);
	}
	public function contactmail()
	{
		//echo '<pre>';
		//print_r($_REQUEST);
		//echo '</pre>';
		$name = !empty($this->input->post('name')) ? $this->input->post('name') : "";
		$email = !empty($this->input->post('email')) ? $this->input->post('email') : "";
		$Phone = !empty($this->input->post('phone_number')) ? $this->input->post('phone_number') : "";
		$message = !empty($this->input->post('message')) ? $this->input->post('message') : "";
		$captcha = !empty($this->input->post('captcha')) ? $this->input->post('captcha') : "";
		$cap_res = !empty($this->input->post('cap_res')) ? $this->input->post('cap_res') : "";
		if($captcha == $cap_res)
		{
    		$emaildata = array();
    		$emaildata['name'] =  $name;
    		$emaildata['email'] =  $email;
    		$emaildata['phone_number'] =  $Phone;
    		$emaildata['message'] =  $message;
    		$emaildata['subject'] =  "Conatct enquery";
    		$eresp = $this->Site_Model->SenFreeQuotedMail($emaildata);
    		//echo "Email send successfully";
    		echo "<script>window.location='".base_url('thank-you')."'</script>";
		}
		else
		{
			$this->session->set_flashdata('status', "0");
			$this->session->set_flashdata('msg', 'Invalid Capcha Code');
		    redirect(base_url('contact'));
		}
	}

	public function sendclubinfo()
	{
		//echo '<pre>';
		//print_r($_REQUEST);
		//echo '</pre>';
		$name = !empty($this->input->post('name')) ? $this->input->post('name') : "";
		$email = !empty($this->input->post('email')) ? $this->input->post('email') : "";
		$Phone = !empty($this->input->post('phone_number')) ? $this->input->post('phone_number') : "";
		$address = !empty($this->input->post('address')) ? $this->input->post('address') : "";
		$postcode = !empty($this->input->post('postcode')) ? $this->input->post('postcode') : "";
		$emaildata = array();
		$emaildata['name'] =  $name;
		$emaildata['email'] =  $email;
		$emaildata['phone_number'] =  $Phone;
		$emaildata['address'] =  $address;
		$emaildata['postcode'] =  $postcode;
		$emaildata['subject'] =  "Conatct enquery";
		$eresp = $this->Site_Model->SenFreeQuotedMail($emaildata);
		//echo "Email send successfully";
		echo "<script>window.location='".base_url('thank-you')."'</script>";
	}

	
}
