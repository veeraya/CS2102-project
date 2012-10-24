<?php 
class User extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('UserModel');
	}

	public function index(){
		$data['users'] = $this->UserModel->getAllUsers();
		$this->load->view('users/index', $data);
	}

	public function view($username){
		$data['user'] = $this->UserModel->getUserByUsername($username);
		$this->load->view('users/view', $data);
	}
}
 ?>