<?php
class AuthModel extends CI_Model {

	public function __construct(){
		$this->load->database();
	} 

	public function validate() {
		
		$email = $this->security->xss_clean($this->input->post('email'));
		$password = $this->security->xss_clean($this->input->post('password'));
		$queryString = "SELECT * FROM users WHERE email = ? AND password = ?";
		$query = $this->db->query($queryString, array($email, $password));

		if ($query->num_rows() == 1){
			$user = $query->row_array();
			$this->session->set_userdata($user);
			return $user['username'];
		}
		else {
			return false;
		}
	}
}

?>