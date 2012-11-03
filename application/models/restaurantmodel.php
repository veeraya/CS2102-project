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
		$queryString = "INSERT INTO restaurants (name, postal_code, url, address, location, phone, website, timing, cuisine) VALUE(?,?,?,?,?,?,?,?,?)";
		$this->db->query($queryString, array($name, $postalCode, $url, $address, $location, $phone, $website, $timing, $cuisine));
		return $url;
	}

	public function getRestaurantByUrl($url){
		$queryString = "SELECT * FROM restaurantsview WHERE url = '".$url."'";
		$query = $this->db->query($queryString, array($url));
		return $query->row_array();
	}

	public function getAllRestaurants(){
		$queryString = "SELECT * FROM restaurantsview";
		$query = $this->db->query($queryString);
		return $query->result_array();	
	}

	public function bestFoodRating(){
		$queryString = "SELECT r.name, r.food_rating, r.url ".
		"FROM restaurantsview r ORDER BY r.food_rating DESC LIMIT 5";
		$query = $this->db->query($queryString);
		return $query->result_array();
	}

	public function bestServiceRating(){
		$queryString = "SELECT r.name, r.service_rating, r.url ".
		"FROM restaurantsview r ORDER BY r.service_rating DESC LIMIT 5";
		$query = $this->db->query($queryString);
		return $query->result_array();
	}

	public function bestRecommend(){
		$queryString = "SELECT r.name, r.recommend_percent, r.url ".
		"FROM restaurantsview r ORDER BY r.recommend_percent DESC LIMIT 5";
		$query = $this->db->query($queryString);
		return $query->result_array();
	}

}
 ?>