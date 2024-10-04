<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flight extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Flight_model');
        $this->load->helper(array('form', 'url'));
    }

    // Index method for displaying the flight page
    public function index() {
        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect(base_url().'/');
        }

        // Initialize empty variables (these can be used for other purposes later)
        $data = array();
        $data['date'] = "";
        $data['subject'] = "";
        $data['s_url'] = "";
        $data['thumb'] = "";
        $data['alttag'] = "";
        $data['metakeywords'] = "";
        $data['metadescription'] = "";
        $data['description'] = "";
        $data['front_url'] = $this->config->item('front_url');
        // Optionally fetch any message from the URL and format it
        $msg = !empty($this->input->get('msg')) ? str_replace("-", " ", $this->input->get('msg')) : "";
        $data['msg'] = $msg;
		$flight_data = $this->Flight_model->get_flight_page_info();
		// echo json_encode($flight_data);die;
		$data['flight_details']=$flight_data;
        // Set the page title and load the view with the template
        $this->authtemplate->set('title', 'APP:Flight Details');
        $this->authtemplate->load('defaultTemplate', 'contents', 'flight/index', $data);
    }
	public function save_flight() {
        if (!($this->session->userdata('user_id'))) {
            redirect(base_url() . '/');
        }
    
        $upload_path = 'uploads/flight/';
    
        // Create directory if it doesn't exist
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }
    
        // Handling file uploads
        $cust_support_file1 = $this->do_upload('cust_support_file1', $upload_path);
        $cust_support_file2 = $this->do_upload('cust_support_file2', $upload_path);
        $cust_support_file3 = $this->do_upload('cust_support_file3', $upload_path);
        $special_offer_image1 = $this->do_upload('special_offer_image1', $upload_path);
        $special_offer_image2 = $this->do_upload('special_offer_image2', $upload_path);
        $special_offer_image3 = $this->do_upload('special_offer_image3', $upload_path);
    
        $data = array(
            'top_title' => $this->input->post('banner_top_title'),
            'top_desc' => $this->input->post('banner_top_desc'),
            'cust_support_title' => $this->input->post('cust_support_title'),
            'cust_support_desc' => $this->input->post('cust_support_desc'),
            'cust_support_title1' => $this->input->post('cust_support_title1'),
            'cust_support_desc1' => $this->input->post('cust_support_desc1'),
            'cust_support_file1' => $cust_support_file1,
            'cust_support_title2' => $this->input->post('cust_support_title2'),
            'cust_support_desc2' => $this->input->post('cust_support_desc2'),
            'cust_support_file2' => $cust_support_file2,
            'cust_support_title3' => $this->input->post('cust_support_title3'),
            'cust_support_desc3' => $this->input->post('cust_support_desc3'),
            'cust_support_file3' => $cust_support_file3,
            'special_offer_title' => $this->input->post('special_offer_title'),
            'special_offer_desc' => $this->input->post('special_offer_desc'),
            'special_offer_link1' => $this->input->post('special_offer_link1'),
            'special_offer_desc1' => $this->input->post('special_offer_desc1'),
            'special_offer_image1' => $special_offer_image1,
            'special_offer_link2' => $this->input->post('special_offer_link2'),
            'special_offer_desc2' => $this->input->post('special_offer_desc2'),
            'special_offer_image2' => $special_offer_image2,
            'special_offer_link3' => $this->input->post('special_offer_link3'),
            'special_offer_desc3' => $this->input->post('special_offer_desc3'),
            'special_offer_image3' => $special_offer_image3,
            'flight_title' => $this->input->post('flight_title'),
            'flight_desc' => $this->input->post('flight_desc'),
            'destination_title' => $this->input->post('destination_title'),
            'destination_desc' => $this->input->post('destination_desc'),
            'review_title' => $this->input->post('review_title'),
            'club_section' => $this->input->post('club_section'),
            'flight_deal' => $this->input->post('flight_deal')
        );
    
        // Check if flight_page_info_id exists
        $flight_page_info_id = $this->input->post('flight_page_info_id');
        if (empty($flight_page_info_id)) {
            // Insert new flight page info
            $flight_page_id = $this->Flight_model->save_flight_page_info($data);
        } else {
            // Prepare update data by filtering out empty values
            $update_data = array_filter($data, function($value) {
                return !empty($value);
            });
            
            // Update existing flight page info
            $flight_page_id = $flight_page_info_id;
            $this->Flight_model->update_flight_page_info($update_data, $flight_page_id);
        }
    
        // Handle flights, destinations, and reviews
        $flights = json_decode($this->input->post('flights'), true);
        $destinations = json_decode($this->input->post('destinations'), true);
        $reviews = json_decode($this->input->post('reviews'), true);
   
        // Save or update associated data
        $this->Flight_model->save_flights($flights,$flight_page_id);
        $this->Flight_model->save_destinations($destinations,$flight_page_id);
        $this->Flight_model->save_reviews($reviews,$flight_page_id);
    
        $response = [
            'status' => 'success',
            'message' => 'Flight Details Saved Successfully',
        ];
        echo json_encode($response);
    }
        

    private function do_upload($field_name, $upload_path) {
        if (!empty($_FILES[$field_name]['name'])) {
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = time() . '_' . $_FILES[$field_name]['name'];
            $this->load->library('upload', $config);

            if ($this->upload->do_upload($field_name)) {
                return $upload_path . $this->upload->data('file_name');
            }
        }
        return null;
    }
}
