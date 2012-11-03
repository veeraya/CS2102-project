<?php 
class Users extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->model('UserModel');
	}

	public function index(){
		$data['users'] = $this->UserModel->getAllUsers();
		$this->load->view('templates/header');
		$this->load->view('users/index', $data);

	}

	public function view($username){
		if ($this->session->userdata('username')){
		$data['user'] = $this->UserModel->getUserByUsername($username);
		$this->load->model('ReviewModel');
		$data['reviews'] = $this->ReviewModel->getReviewsByUser($data['user']['email']);
		$this->load->view('templates/header');
		$this->load->view('users/view', $data);
		$this->load->view('templates/footer');

		}
		else{
			$errorMsg = "You need to log-in to view this page<br />";
			$this->session->set_flashdata('errorMsg', $errorMsg);
			redirect('auth/login');
		}
	}

	public function create(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('users/create');
			$this->load->view('templates/footer');

		}
		else{
			$user = $this->UserModel->create();
			$this->session->set_userdata($user);
			redirect('users/view/'.$user[username]);
			
		}
	}

	public function edit($username){

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		
		$data['user'] = $this->UserModel->getUserByUsername($username);
		if ($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('users/edit', $data);
			$this->load->view('templates/footer');

		}
		else{
			$user = $this->UserModel->edit();
			$this->session->set_userdata($user);
			redirect('users/view/'.$user[username]);
		}
	}
}
 ?>