<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiController extends CI_Controller {

    public function getAirlineList() {
        $url =$api_url = $this->config->item('ariline_api_url'); 
        $data = [
            "user_id" => "infinitytravels_testAPI",
            "user_password" => "infinitytravelsTest@2024",
            "access" => "Test",
            "ip_address" => "125.21.141.126"
        ];

        // Initialize CURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);
        curl_close($ch);

        // Return the response as JSON
        echo $response;
    }
}
