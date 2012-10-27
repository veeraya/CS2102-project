<?php 
class Reviews extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('ReviewModel');
		$this->load->model('RestaurantModel');
	}

	public function viewByRestaurant($restaurantUrl){
			$data['restaurant'] = $this->RestaurantModel->getRestaurantByUrl($restaurantUrl);
			$data['reviews'] = $this->ReviewModel->getReviewsByRestaurant($restaurantUrl);
			$this->load->view('restaurants/reviews', $data);
		}

	public function create($restaurantUrl){
			$data['restaurantUrl'] = $restaurantUrl;
			$this->load->view('restaurants/createReview', $data);
		}

	public function processCreate($restaurantUrl){
		echo "in processCreate";
		$restaurant = $this->RestaurantModel->getRestaurantByUrl($restaurantUrl);
		$this->ReviewModel->create($restaurant['name'], $restaurant['postal_code']);
		redirect('restaurants/'.$restaurant['url'].'/reviews');
	}



}
 ?>