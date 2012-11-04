<?php 
class Search extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->
load->database();
	}

	public function index(){
		//how to do pagination???
		$name =  $this->input->post('Name');
		$cuisine =  $this->input->post('cuisine');
		$location =  $this->input->post('location');
		
		$queryString = "SELECT * FROM restaurants WHERE ";
		if (!$this->IsNullOrEmptyString($name) && !$this->IsNullOrEmptyString($cuisine) && !$this->IsNullOrEmptyString($location)){
			$name = "%".$name."%";
			$queryString = "SELECT * FROM restaurants WHERE name LIKE ? AND cuisine = ? AND location = ?";
			$query = $this->db->query($queryString, array($name, $cuisine, $location));
		}
		else if ($this->IsNullOrEmptyString($name) && !$this->IsNullOrEmptyString($cuisine) && !$this->IsNullOrEmptyString($location)){
			$queryString = "SELECT * FROM restaurants WHERE cuisine = ? AND location = ?";
			$query = $this->db->query($queryString, array($cuisine, $location));
		}
		else if (!$this->IsNullOrEmptyString($name) && $this->IsNullOrEmptyString($cuisine) && !$this->IsNullOrEmptyString($location)){
			$name = "%".$name."%";
			$queryString = "SELECT * FROM restaurants WHERE name LIKE ? AND location = ?";
			$query = $this->db->query($queryString, array($name, $location));
		}
		else if (!$this->IsNullOrEmptyString($name) && !$this->IsNullOrEmptyString($cuisine) && $this->IsNullOrEmptyString($location)){
			$name = "%".$name."%";
			$queryString = "SELECT * FROM restaurants WHERE name LIKE ? AND cuisine = ?";
			$query = $this->db->query($queryString, array($name, $cuisine));
		}
		else if ($this->IsNullOrEmptyString($name) && $this->IsNullOrEmptyString($cuisine) && !$this->IsNullOrEmptyString($location)){
			$queryString = "SELECT * FROM restaurants WHERE location = ?";
			$query = $this->db->query($queryString, array($location));
		}
		else if ($this->IsNullOrEmptyString($name) && !$this->IsNullOrEmptyString($cuisine) && $this->IsNullOrEmptyString($location)){
			$queryString = "SELECT * FROM restaurants WHERE cuisine = ? ";
			$query = $this->db->query($queryString, array($cuisine));
		}
		else if (!$this->IsNullOrEmptyString($name) && $this->IsNullOrEmptyString($cuisine) && $this->IsNullOrEmptyString($location)){
			$name = "%".$name."%";
			$queryString = "SELECT * FROM restaurants WHERE name LIKE ?";
			$query = $this->db->query($queryString, array($name));
		}
		else {
			redirect('/');
		}

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
		$data['restaurants'] = $results;
		$this->load->view('templates/header');
		$this->load->view('restaurants/index', $data);
		$this->load->view('templates/footer');
	}

	public function freeTextSearch(){
		$searchQuery =  "%".$this->input->post('freeTextSearch')."%";
		$queryString = "SELECT * FROM restaurants WHERE name LIKE ? OR address LIKE ? OR cuisine LIKE ? OR postal_code LIKE ? OR location LIKE ?";
		$query = $this->db->query($queryString, array($searchQuery,$searchQuery,$searchQuery,$searchQuery,$searchQuery));
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
		$data['restaurants'] = $results;
		$this->load->view('templates/header');
		$this->load->view('restaurants/index', $data);
		$this->load->view('templates/footer');
	}
	public function IsNullOrEmptyString($input){
	    return (!isset($input) || trim($input)=='');
	}
}
 ?>