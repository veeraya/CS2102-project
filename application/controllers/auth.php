<?php 
class Auth extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('AuthModel');
	}

	public function login(){
		$data['errorMsg'] = $this->session->flashdata('errorMsg');
		$this->load->view('auth/login', $data);
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
}
 ?>