<?php
class Reviews extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('ReviewModel');
		$this->load->model('RestaurantModel');
		$this->load->model('CommentModel');
	}

	public function index(){
		if ($this->session->userdata('account_type') == "admin"){
			$data['reviews'] = array();
			$reviews = $this->ReviewModel->getAllReviews();
			foreach ($reviews as $review){
				$review['comments'] = $this->CommentModel->getCommentsByReviewUrl($review['url']);
				array_push($data['reviews'], $review);
			}
			$this->load->view('templates/header');
			$this->load->view('reviews/index', $data);
			$this->load->view('templates/footer');
		}
		else {
			redirect('auth/unauthorized');
		}
	}

	public function view($url){
		$data['review'] = $this->ReviewModel->getReviewByUrl($url);
		$this->load->view('templates/header');
		$this->load->view('reviews/view', $data);
		$this->load->view('templates/footer');
	}

	public function viewByRestaurant($restaurantUrl){
			$data['reviews'] = array();
			$data['restaurant'] = $this->RestaurantModel->getRestaurantByUrl($restaurantUrl);
			$reviews = $this->ReviewModel->getReviewsByRestaurant($restaurantUrl);
			foreach ($reviews as $review){
				$review['comments'] = $this->CommentModel->getCommentsByReviewUrl($review['url']);
				array_push($data['reviews'], $review);
			}
			$this->load->view('templates/header');
			$this->load->view('restaurants/reviews', $data);
			$this->load->view('templates/footer');
	}

	public function create($restaurantUrl){
		if ($this->session->userdata('username')){
			$data['restaurantUrl'] = $restaurantUrl;
			$this->load->view('templates/header');
			$this->load->view('reviews/create', $data);
			$this->load->view('templates/footer');
	}
		else {
			$errorMsg = "You need to log-in to view this page<br />";
			$this->session->set_flashdata('errorMsg', $errorMsg);
			redirect('auth/login');
		}
	}

	public function processCreate($restaurantUrl){
		$restaurant = $this->RestaurantModel->getRestaurantByUrl($restaurantUrl);
		$this->ReviewModel->create($restaurant['name'], $restaurant['postal_code']);
		redirect('restaurants/'.$restaurant['url'].'/reviews');
	}

	public function edit($url){
		$data['review'] = $this->ReviewModel->getReviewByUrl($url);
		$this->load->view('templates/header');
		$this->load->view('reviews/edit', $data);
		$this->load->view('templates/footer');
	}

	public function processEdit(){
		$url = $this->ReviewModel->edit();
		redirect('reviews/view/'.$url);
	}

	public function delete($url){
		$this->ReviewModel->delete($url);
		if (strpos($_SERVER['HTTP_REFERER'], "reviews/view") === FALSE)
			redirect($_SERVER['HTTP_REFERER']);
		else
			redirect('/');
	}
}
 ?>