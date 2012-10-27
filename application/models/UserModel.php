<?php
class UserModel extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	public function getUserByUsername($username){
		$queryString = "SELECT * FROM users WHERE username = '".$username."'";
		$query = $this->db->query($queryString);
		return $query->row_array();

	}

	public function getAllUsers(){
		$query = $this->db->query("SELECT * FROM users");
		return $query->result_array();
	}

	public function create(){

		$data = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
			);

		$queryString = "INSERT INTO users (email, username, password) VALUE ('".$data['email']."','".$data['username']."','".$data['password']."')";
		$this->db->query($queryString);

		return $data;
	}

	public function edit(){
		
		$data = array(
			'oldUsername' => $this->input->post('oldUsername'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
			);

		$queryString = "UPDATE users SET username = '".$data['username']."', email = '".$data['email']."', password = '".$data['password']."' WHERE username = '".$data['oldUsername']."'";  
		$this->db->query($queryString);
		return $data;
	}
}
?>