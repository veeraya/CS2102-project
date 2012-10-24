<?php
class UserModel extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	public function getUserByUsername($username){
		$queryString = "SELECT * FROM user WHERE username = '".$username."'";
		$query = $this->db->query($queryString);
		return $query->row_array();

	}

	public function getAllUsers(){
		$query = $this->db->query("SELECT * FROM user");
		return $query->result_array();
	}
}
?>