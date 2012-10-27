<?php 
class Reviews extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('ReviewModel');
		$this->load->model('RestaurantModel');
	}

	public function index(){

		$data['reviews'] = $this->ReviewModel->getAllReviews();
		$this->load->view('templates/header');
		$this->load->view('reviews/index', $data);
		$this->load->view('templates/footer');
	}

	public function viewByRestaurant($restaurantUrl){
			$data['restaurant'] = $this->RestaurantModel->getRestaurantByUrl($restaurantUrl);
			$data['reviews'] = $this->ReviewModel->getReviewsByRestaurant($restaurantUrl);
			$this->load->view('templates/header');
			$this->load->view('restaurants/reviews', $data);
			$this->load->view('templates/footer');
		}

	public function create($restaurantUrl){
			$data['restaurantUrl'] = $restaurantUrl;
			$this->load->view('templates/header');
			$this->load->view('restaurants/createReview', $data);
			$this->load->view('templates/footer');
		}

	public function processCreate($restaurantUrl){
		$restaurant = $this->RestaurantModel->getRestaurantByUrl($restaurantUrl);
		$this->ReviewModel->create($restaurant['name'], $restaurant['postal_code']);
		redirect('restaurants/'.$restaurant['url'].'/reviews');
	}



}
 ?>