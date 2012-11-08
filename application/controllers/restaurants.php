<?php 
class Restaurants extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('RestaurantModel');
	}

	public function index(){
		$data['restaurants'] = $this->RestaurantModel->getAllRestaurants();
		$this->load->view('templates/header');
		$this->load->view('restaurants/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($url){
		$data['restaurant'] = $this->RestaurantModel->getRestaurantByUrl($url);
		$this->load->view('templates/header');
		$this->load->view('restaurants/view', $data);
		$this->load->view('templates/footer');
	}

	public function create(){
		if ($this->session->userdata('username')){
			$this->load->view('templates/header');
			$this->load->view('restaurants/create');
			$this->load->view('templates/footer');
		}
		else {
			$errorMsg = "You need to log-in to view this page<br />";
			$this->session->set_flashdata('errorMsg', $errorMsg);
			redirect('auth/login');
		}
	}

	public function createRestaurant(){
		$url = $this->RestaurantModel->create();
		redirect('restaurants/'.$url);
	}

	public function edit($url){
		$data['restaurant'] = $this->RestaurantModel->getRestaurantByUrl($url);
		$this->load->view('templates/header');
		$this->load->view('restaurants/edit', $data);
		$this->load->view('templates/footer');
	}

	public function processEdit(){
		$url = $this->RestaurantModel->edit();
		redirect('restaurants/'.$url);
	}

	public function best(){
		$data['bestFoodRating'] = $this->RestaurantModel->bestFoodRating();
		$data['bestServiceRating'] = $this->RestaurantModel->bestServiceRating();
		$data['bestRecommend'] = $this->RestaurantModel->bestRecommend();
		$this->load->view('templates/header');
		$this->load->view('restaurants/best', $data);
		$this->load->view('templates/footer');
	}

	public function delete($url){
		$this->RestaurantModel->delete($url);
		redirect('restaurants');
	}
}
 ?>