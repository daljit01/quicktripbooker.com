<?php
class Flight_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save_flight_page_info($data) {
        $this->db->insert('flight_page_info', $data);
        return $this->db->insert_id(); // Return the newly inserted flight_page_info_id
    }

    public function save_flights($flights,$flight_page_id) {
        // Truncate the flights table before inserting new data
        $this->db->truncate('flights');
        // echo json_encode($flights);die;
        // Insert new flight data
        foreach ($flights as $flight) {
            $flight_data = [
                'airline_code' => $flight['airline_code'],
                'airline_name' => $flight['airline_name'],
                'airline_logo' => $flight['airline_logo'],
                'departure_date' => $flight['departure_date'],
                'departure_location' => $flight['departure_location'],
                'departure_iata_code_city' => $flight['departure_iata_code_city'],
                'departure_city_name' => $flight['departure_city_name'],
                'arrival_location' => $flight['arrival_location'],
                'arrival_iata_code_city' => $flight['arrival_iata_code_city'],
                'arrival_city_name' => $flight['arrival_city_name'],
                'arrival_date' => $flight['arrival_date'],
                'price' => $flight['price'],
                'flight_page_info_id'=>$flight_page_id,
            ];
            $this->db->insert('flights', $flight_data);
        }
    }
    
    public function save_destinations($destinations,$flight_page_id) {
        // Truncate the destinations table before inserting new data
        // echo json_encode($destinations);die;
        $this->db->truncate('destinations');
    
        // Path to save uploaded images
        $imagePath = 'uploads/flight/';
    
        // Ensure the directory exists
        if (!is_dir($imagePath)) {
            mkdir($imagePath, 0777, true);
        }
    
        foreach ($destinations as $destination) {
            // Check if the image is a Base64 string
            if (isset($destination['image']) && preg_match('/^data:image\/(\w+);base64,/', $destination['image'], $type)) {
                $data = substr($destination['image'], strpos($destination['image'], ',') + 1);
                $data = base64_decode($data);
                $fileType = strtolower($type[1]);
                $fileName = time() . '_' . uniqid() . '.' . $fileType; // Unique file name
                $filePath = $imagePath . $fileName;
    
                // Save the image file
                if (file_put_contents($filePath, $data)) {
                    // Prepare destination data
                    $destination_data = [
                        'title' => $destination['title'],
                        'description' => $destination['description'],
                        'image' => $filePath, // Store the image filename
                        'flight_page_info_id'=>$flight_page_id,
                    ];
    
                    // Insert destination data into the database
                    $this->db->insert('destinations', $destination_data);
                } else {
                    log_message('error', 'Failed to save Base64 image for destination: ' . $destination['title']);
                }
            } else {
                // Handle the case when no valid image data is provided
                $destination_data = [
                    'title' => $destination['title'],
                    'description' => $destination['description'],
                    'image' => $destination['image'], // Set to null if no image provided
                    'flight_page_info_id'=>$flight_page_id,
                ];
                $this->db->insert('destinations', $destination_data);
            }
        }
    
        // Optionally, return success response
       // echo json_encode(['status' => 'success', 'message' => 'Destinations saved successfully']);
    }
    
    
        
    
    public function save_reviews($reviews,$flight_page_id) {
        // Truncate the reviews table before inserting new data
        $this->db->truncate('reviews');
        
        // Insert new review data
        foreach ($reviews as $review) {
            $review_data = [
                'name' => $review['name'],
                'star_rating' => $review['star_rating'],
                'description' => $review['description'],
                'flight_page_info_id'=>$flight_page_id,
            ];
            $this->db->insert('reviews', $review_data);
        }
    }
    

    public function update_flight_page_info($data, $flight_page_id) {
        // echo json_encode($data);die;
        $this->db->where('id', $flight_page_id);
        $this->db->update('flight_page_info', $data);
    }

    public function get_flight_page_info() {
        $this->db->select('fpi.*, 
                           fpi.id as fpi_id,
                           f.*, 
                           d.*, 
                           r.id as review_id,
                           r.name AS reviewer_name, 
                           r.star_rating, 
                           r.description AS review_description');
        
        $this->db->from('flight_page_info fpi');
    
        // Add a WHERE clause to filter for flight_page_info with id = 1
        $this->db->where('fpi.id', 1);
    
        // Join with flights table
        $this->db->join('flights f', 'f.flight_page_info_id = fpi.id', 'left');
    
        // Join with destinations table
        $this->db->join('destinations d', 'd.flight_page_info_id = fpi.id', 'left');
    
        // Join with reviews table
        $this->db->join('reviews r', 'r.flight_page_info_id = fpi.id', 'left');
    
        $query = $this->db->get();
    
        // Initialize an array to hold structured data
        $result = [];
    
        // Initialize a variable to hold flight_page_info details
        $flight_page_info = null;
    
        foreach ($query->result_array() as $row) {
            // If flight_page_info has not been set, set it
            if (is_null($flight_page_info)) {
                $flight_page_info = [
                    'id' => $row['fpi_id'],
                    'top_title' => $row['top_title'],
                    'top_desc' => $row['top_desc'],
                    'cust_support_title' => $row['cust_support_title'],
                    'cust_support_desc' => $row['cust_support_desc'],
                    'cust_support_title1' => $row['cust_support_title1'],
                    'cust_support_desc1' => $row['cust_support_desc1'],
                    'cust_support_file1' => $row['cust_support_file1'],
                    'cust_support_title2' => $row['cust_support_title2'],
                    'cust_support_desc2' => $row['cust_support_desc2'],
                    'cust_support_file2' => $row['cust_support_file2'],
                    'cust_support_title3' => $row['cust_support_title3'],
                    'cust_support_desc3' => $row['cust_support_desc3'],
                    'cust_support_file3' => $row['cust_support_file3'],
                    'special_offer_title' => $row['special_offer_title'],
                    'special_offer_desc' => $row['special_offer_desc'],
                    'special_offer_link1' => $row['special_offer_link1'],
                    'special_offer_desc1' => $row['special_offer_desc1'],
                    'special_offer_image1' => $row['special_offer_image1'],
                    'special_offer_link2' => $row['special_offer_link2'],
                    'special_offer_desc2' => $row['special_offer_desc2'],
                    'special_offer_image2' => $row['special_offer_image2'],
                    'special_offer_link3' => $row['special_offer_link3'],
                    'special_offer_desc3' => $row['special_offer_desc3'],
                    'special_offer_image3' => $row['special_offer_image3'],
                    'flight_title' => $row['flight_title'],
                    'flight_desc' => $row['flight_desc'],
                    'destination_title' => $row['destination_title'],
                    'destination_desc' => $row['destination_desc'],
                    'review_title' => $row['review_title'],
                    'club_section' => $row['club_section'],
                    'flight_deal' => $row['flight_deal'],
                    'destinations' => [], // Initialize as an array for multiple destinations
                    'reviews' => [],
                    'flights' => [], // Initialize as an array for multiple flights
                ];
            }
    
            // Add flight details if available and check for uniqueness
            if (!empty($row['airline_code'])) {
                $flight_exists = array_filter($flight_page_info['flights'], function($flight) use ($row) {
                    return $flight['airline_code'] === $row['airline_code']; // Check if flight already exists
                });
    
                if (empty($flight_exists)) {
                    $flight_page_info['flights'][] = [
                        'airline_code' => $row['airline_code'],
                        'airline_name' => $row['airline_name'],
                        'airline_logo' => $row['airline_logo'],
                        'departure_date' => $row['departure_date'],
                        'departure_location' => $row['departure_location'],
                        'arrival_location' => $row['arrival_location'],
                        'arrival_date' => $row['arrival_date'],
                        'price' => $row['price'],
                        'departure_iata_code_city' => $row['departure_iata_code_city'],
                        'arrival_iata_code_city' => $row['arrival_iata_code_city'],
                        'departure_city_name' => $row['departure_city_name'],
                        'arrival_city_name' => $row['arrival_city_name'],
                    ];
                }
            }
    
            // Add destination details if available and check for uniqueness
            if (!empty($row['id']) && !empty($row['title'])) {
                $destination_exists = array_filter($flight_page_info['destinations'], function($destination) use ($row) {
                    return $destination['title'] === $row['title']; // Check if destination already exists
                });
    
                if (empty($destination_exists)) {
                    $flight_page_info['destinations'][] = [
                        'title' => $row['title'],
                        'description' => $row['description'],
                        'image' => $row['image'],
                    ];
                }
            }
    
            // Add review details if available and check for uniqueness
            if (!empty($row['review_id'])) {
                $review_exists = array_filter($flight_page_info['reviews'], function($review) use ($row) {
                    return $review['id'] === $row['review_id']; // Check if review already exists
                });
    
                if (empty($review_exists)) {
                    $flight_page_info['reviews'][] = [
                        'id' => $row['review_id'],
                        'name' => $row['reviewer_name'],
                        'star_rating' => $row['star_rating'],
                        'description' => $row['review_description'],
                    ];
                }
            }
        }
    
        // Add the populated flight_page_info to the result
        if ($flight_page_info) {
            $result[] = $flight_page_info;
        }
    
        return $result; // Return the structured array
    }
    
    
    
    
}
