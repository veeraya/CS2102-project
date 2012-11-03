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
		$date = date('Y-m-d-H-i-s');
		$url = url_title($userEmail." ".$restaurantName." ".$restaurantPostalCode." ".$date, 'dash', TRUE);	
		$queryString = "INSERT INTO reviews (restaurant_name, restaurant_postal_code,".
			"user_email, title, content, food_rating,".
			"service_rating, recommend, url)".
			"VALUE(?, ?, ?, ?, ?, ?, ?, ?,?)";
		$reviewParam = array($restaurantName, $restaurantPostalCode, $userEmail,
					$title, $content, $foodRating, $serviceRating, $recommend, $url);	
		$this->db->query($queryString, $reviewParam);		
	}

	public function edit(){
		$title =  $this->input->post('title');
		$content =  $this->input->post('content');
		$foodRating =  $this->input->post('foodRating');
		$serviceRating =  $this->input->post('serviceRating');
		$recommend =  $this->input->post('recommend');
		$userEmail = $this->input->post('userEmail');
		$restaurantName = $this->input->post('restaurantName');
		$restaurantPostalCode = $this->input->post('restaurantPostalCode');
		$updatedOn = $this->input->post('updatedOn');

		$queryString ="UPDATE reviews ".
		"SET title= ?, content = ?, food_rating = ?, service_rating = ?, recommend = ? ".
		"WHERE user_email = ? AND restaurant_name = ? AND restaurant_postal_code = ? AND updated_on = ?";
		$reviewParam = array($title, $content, $foodRating, $serviceRating, $recommend, $userEmail, $restaurantName, $restaurantPostalCode, $updatedOn);
		$this->db->query($queryString, $reviewParam);
		return $this->input->post('url');
	}

	public function getReviewByUrl($url){
		$queryString = "SELECT * FROM reviews WHERE url = ?";
		$query = $this->db->query($queryString, array($url));
		return $query->row_array();
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