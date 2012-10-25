<?php 
class Auth extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('AuthModel');
	}

	public function login($errorMsg = NULL){
		$data['errorMsg'] = $errorMsg;
		$this->load->view('auth/login', $data);
	}

	public function processLogin(){
		$username = $this->AuthModel->validate();
		if ($username){
			redirect('users/view/'.$username);
		}
		else {
			$errorMsg = "Wrong email/password combination<br />";
			$this->login($errorMsg);
		}
	}
}
 ?>