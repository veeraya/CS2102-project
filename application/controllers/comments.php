<?php
class Comments extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('CommentModel');
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

    public function create($reviewUrl){
        $this->CommentModel->create($reviewUrl);
        redirect($_SESSION['HTTP_REFERER']);
    }


    public function delete($restaurantName, $restaurantPostalCode, $name){
        var_dump(array($restaurantName, $restaurantPostalCode, $name));
        $this->MenuModel->delete($restaurantName, $restaurantPostalCode, $name);
        redirect('restaurants/'.url_title($restaurantName." ".$restaurantPostalCode, 'dash', TRUE));
    }


}
 ?>