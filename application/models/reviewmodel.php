<?php 
class ReviewModel extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	public function create($restaurantName, $restaurantPostalCode){
		$userEmail = $this->session->userdata('email');

		$title =  $this->input->post('title');
		$content =  $this->input->post('content');
		$foodRating =  $this->input->post('foodRating');
		$serviceRating =  $this->input->post('serviceRating');
		$recommend =  $this->input->post('recommend');

		$queryString = "INSERT INTO reviews (restaurant_name, restaurant_postal_code,".
			"user_email, title, content, food_rating,".
			"service_rating, recommend)".
			"VALUE(?, ?, ?, ?, ?, ?, ?, ?)";
		$reviewParam = array($restaurantName, $restaurantPostalCode, $userEmail,
					$title, $content, $foodRating, $serviceRating, $recommend);	
		$this->db->query($queryString, $reviewParam);		
	}

	public function getAllReviews(){
		$queryString = "SELECT * FROM reviews";
		$query = $this->db->query($queryString);
		return $query->result_array();
	}

	public function getReviewsByRestaurant($restaurantUrl){
		$this->load->model('RestaurantModel');
		$restaurant = $this->RestaurantModel->getRestaurantByUrl($restaurantUrl);
		$queryString = "SELECT * FROM reviews WHERE restaurant_name = ? AND restaurant_postal_code = ?";
		$query = $this->db->query($queryString, array($restaurant['name'], $restaurant['postal_code']));
		return $query->result_array();
	}

	public function getReviewsByUser($userEmail){
		$queryString = "SELECT * from reviews WHERE user_email = ?";
		$query = $this->db->query($queryString, array($userEmail));
		return $query->result_array();
	}
}
 ?>