<?php 
class RestaurantModel extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function create(){

		$name =  $this->input->post('name');
		$postalCode = $this->input->post('postalCode');
		$url = url_title($name." ".$postalCode, 'dash', TRUE);	
		$address =  $this->input->post('address');
		$location =  $this->input->post('location');
		$phone =  $this->input->post('phone');
		$website =  $this->input->post('website');
		$timing =  $this->input->post('timing');
		$cuisine =  $this->input->post('cuisine');
		// address, phone, website, timing, cuisine
		$queryString = "INSERT INTO restaurants (name, postal_code, url, address, location, phone, website, timing, cuisine) VALUE(?,?,?,?,?,?,?,?,?)";
		$this->db->query($queryString, array($name, $postalCode, $url, $address, $location, $phone, $website, $timing, $cuisine));
		return $url;
	}

	public function getRestaurantByUrl($url){
		$queryString = "SELECT * FROM restaurants WHERE url = ?";
		$query = $this->db->query($queryString, array($url));
		return $query->row_array();
	}

	public function getAllRestaurants(){
		$queryString = "SELECT * FROM restaurants";
		$query = $this->db->query($queryString);
		return $query->result_array();	
	}
}
 ?>