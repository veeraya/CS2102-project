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
		$queryString = "SELECT * FROM restaurants WHERE url = '".$url."'";
		$query = $this->db->query($queryString, array($url));
		$restaurant = $query->row_array();
		$ratingQueryString = "SELECT r.avg_food_rating, r.avg_service_rating, r.recommend_percent FROM ratings r WHERE restaurant_name = ? AND restaurant_postal_code = ?";
		$ratingQuery  = $this->db->query($ratingQueryString, array($restaurant['name'],$restaurant['postal_code']));
		
		if ($ratingQuery->num_rows() > 0){
			$rating = $ratingQuery->row_array();
			$restaurant['food_rating'] = $rating['avg_food_rating'];
			$restaurant['service_rating'] = $rating['avg_service_rating'];
			$restaurant['recommend_percent'] = $rating['recommend_percent'];
		}
		else {
			$restaurant['food_rating'] = "N/A";
			$restaurant['service_rating'] = "N/A";
			$restaurant['recommend_percent'] =  "N/A";
		}
		return $restaurant;
	}

	public function getAllRestaurants(){
		$queryString = "SELECT * FROM restaurants";
		$query = $this->db->query($queryString);
		$restaurants = $query->result_array();
		$results = array();
		foreach ($restaurants as $restaurant){
			$ratingQueryString = "SELECT r.avg_food_rating, r.avg_service_rating, r.recommend_percent FROM ratings r WHERE restaurant_name = ? AND restaurant_postal_code = ?";
			$ratingQuery  = $this->db->query($ratingQueryString, array($restaurant['name'],$restaurant['postal_code']));
			
			if ($ratingQuery->num_rows() > 0){
				$rating = $ratingQuery->row_array();
				$restaurant['food_rating'] = $rating['avg_food_rating'];
				$restaurant['service_rating'] = $rating['avg_service_rating'];
				$restaurant['recommend_percent'] = $rating['recommend_percent'];
			}
			else {
				$restaurant['food_rating'] = "N/A";
				$restaurant['service_rating'] = "N/A";
				$restaurant['recommend_percent'] =  "N/A";
			}
			array_push($results, $restaurant);
		}
		return $results;
	}

	public function getRandomRestaurants($noOfRestaurants){
		$queryString = "SELECT * FROM restaurants ORDER BY RAND( ) LIMIT ".$noOfRestaurants;
		$query = $this->db->query($queryString);
		$restaurants = $query->result_array();
		$results = array();
		foreach ($restaurants as $restaurant){
			$ratingQueryString = "SELECT r.avg_food_rating, r.avg_service_rating, r.recommend_percent FROM ratings r WHERE restaurant_name = ? AND restaurant_postal_code = ?";
			$ratingQuery  = $this->db->query($ratingQueryString, array($restaurant['name'],$restaurant['postal_code']));
			
			if ($ratingQuery->num_rows() > 0){
				$rating = $ratingQuery->row_array();
				$restaurant['food_rating'] = $rating['avg_food_rating'];
				$restaurant['service_rating'] = $rating['avg_service_rating'];
				$restaurant['recommend_percent'] = $rating['recommend_percent'];
			}
			else {
				$restaurant['food_rating'] = "N/A";
				$restaurant['service_rating'] = "N/A";
				$restaurant['recommend_percent'] =  "N/A";
			}
			array_push($results, $restaurant);
		}
		return $results;

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