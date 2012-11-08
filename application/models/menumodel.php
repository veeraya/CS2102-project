<?php 
class MenuModel extends CI_Model {
	
	public function __construct(){
		$this->load->database();
		$this->load->model('RestaurantModel');
	}

	public function create($restaurantUrl){
		$restaurant = $this->RestaurantModel->getRestaurantByUrl($restaurantUrl);
		$name =  $this->input->post('name');
		$price = $this->input->post('price');
		$type =  $this->input->post('type');
		$cuisine =  $this->input->post('cuisine');
		$description =  $this->input->post('description');
		$restaurantName =  $restaurant['name'];
		$restaurantPostalCode =   $restaurant['postal_code'];
		$queryString = "INSERT INTO menu (name, price, type, cuisine, description, restaurant_name, restaurant_postal_code) VALUE(?,?,?,?,?,?,?)";
		$this->db->query($queryString, array($name, $price, $type, $cuisine, $description, $restaurantName, $restaurantPostalCode));
	}

	public function getMenuByRestaurant($restaurantName, $restaurantPostalCode){
		$queryString = "SELECT * FROM menu WHERE restaurant_name = ? AND restaurant_postal_code = ?";
		$query = $this->db->query($queryString, array($restaurantName, $restaurantPostalCode));
		return $query->result_array();
	}

}
 ?>