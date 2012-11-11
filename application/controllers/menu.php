<?php
class Menu extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('MenuModel');
		$this->load->model('RestaurantModel');
	}

	public function index(){
		if ($this->session->userdata('account_type') == "admin"){
			$data['reviews'] = $this->ReviewModel->getAllReviews();
			$this->load->view('templates/header');
			$this->load->view('reviews/index', $data);
			$this->load->view('templates/footer');
		}
		else {
			redirect('auth/unauthorized');
		}
	}

	public function create($restaurantUrl){
		if ($this->session->userdata('username')){
			$data['restaurantUrl'] = $restaurantUrl;
			$this->load->view('templates/header');
			$this->load->view('menu/create', $data);
			$this->load->view('templates/footer');
	}
		else {
			$errorMsg = "You need to log-in to view this page<br />";
			$this->session->set_flashdata('errorMsg', $errorMsg);
			redirect('auth/login');
		}
	}

	public function processCreate($restaurantUrl){
		$this->MenuModel->create($restaurantUrl);
		redirect('restaurants/'.$restaurantUrl);
	}

	public function delete($restaurantName, $restaurantPostalCode, $name){
		var_dump(array($restaurantName, $restaurantPostalCode, $name));
		$this->MenuModel->delete($restaurantName, $restaurantPostalCode, $name);
		redirect('restaurants/'.url_title($restaurantName." ".$restaurantPostalCode, 'dash', TRUE));
	}


}
 ?>