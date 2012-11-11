<?php
class Users extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->model('UserModel');
	}

	public function index(){
		if ($this->session->userdata('account_type') == "admin"){
			$data['users'] = $this->UserModel->getAllUsers();
			$this->load->view('templates/header');
			$this->load->view('users/index', $data);
		}
		else redirect('auth/unauthorized');

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
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			if ($this->UserModel->usernameExists($username)){
				$errorMsg = "The username ".$username." is already taken.<br />";
				$this->session->set_flashdata('errorMsg', $errorMsg);
				redirect('auth/login');
			}
			elseif( $this->UserModel->emailExists($email)){
				$errorMsg = $email." is already used to sign up. Please use another email.<br />";
				$this->session->set_flashdata('errorMsg', $errorMsg);
				redirect('auth/login');
			}
			else {
				$user = $this->UserModel->create();
				$this->session->set_userdata($user);
				redirect('users/view/'.$user['username']);
			}
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
			redirect('users/view/'.$user['username']);
		}
	}

	public function delete($username){
		$this->UserModel->delete($username);
		redirect('users/index');
	}
}
 ?>