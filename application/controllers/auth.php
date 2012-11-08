<?php 
class Auth extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('AuthModel');
	}

	public function login(){
		$data['errorMsg'] = $this->session->flashdata('errorMsg');

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		
		if ($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('auth/login', $data);
			$this->load->view('templates/footer');
		}
		else{
			$user = $this->UserModel->create();
			$this->session->set_userdata($user);
			redirect('users/view/'.$user[username]);
		}

		
	}

	public function processLogin(){
		$username = $this->AuthModel->validate();
		if ($username){
			redirect('users/view/'.$username);
		}
		else {
			$errorMsg = "Wrong email/password combination<br />";
			$this->session->set_flashdata('errorMsg', $errorMsg);
			redirect('auth/login');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('auth/login');
	}

	public function unauthorized(){
		$this->load->view('templates/header');
		$this->load->view('auth/unauthorized');
		$this->load->view('templates/footer');
	}
}
 ?>