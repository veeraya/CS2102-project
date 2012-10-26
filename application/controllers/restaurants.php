<?php 
class Restaurants extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('RestaurantModel');
	}

	public function index(){

		$data['restaurants'] = $this->RestaurantModel->getAllRestaurants();
		$this->load->view('restaurants/index', $data);
	}

	public function view($url){
		$data['restaurant'] = $this->RestaurantModel->getRestaurantByUrl($url);
		$this->load->view('restaurants/view', $data);
	}

	public function create(){
		$this->load->view('restaurants/create');
	}

	public function createRestaurant(){
		$url = $this->RestaurantModel->create();
		redirect('restaurants/view/'.$url);
	}

}
 ?>