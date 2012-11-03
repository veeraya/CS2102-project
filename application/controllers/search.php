<?php 
class Search extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function index(){
		//how to do pagination???
		$name =  $this->input->post('Name');
		$cuisine =  $this->input->post('cuisine');
		$location =  $this->input->post('location');
		
		$queryString = "SELECT * FROM restaurants WHERE ";
		if (!$this->IsNullOrEmptyString($name) && !$this->IsNullOrEmptyString($cuisine) && !$this->IsNullOrEmptyString($location)){
			$name = "%".$name."%";
			$queryString = "SELECT * FROM restaurants WHERE name LIKE ? AND cuisine = ? AND location = ?";
			$query = $this->db->query($queryString, array($name, $cuisine, $location));
		}
		else if ($this->IsNullOrEmptyString($name) && !$this->IsNullOrEmptyString($cuisine) && !$this->IsNullOrEmptyString($location)){
			$queryString = "SELECT * FROM restaurants WHERE cuisine = ? AND location = ?";
			$query = $this->db->query($queryString, array($cuisine, $location));
		}
		else if (!$this->IsNullOrEmptyString($name) && $this->IsNullOrEmptyString($cuisine) && !$this->IsNullOrEmptyString($location)){
			$name = "%".$name."%";
			$queryString = "SELECT * FROM restaurants WHERE name LIKE ? AND location = ?";
			$query = $this->db->query($queryString, array($name, $location));
		}
		else if (!$this->IsNullOrEmptyString($name) && !$this->IsNullOrEmptyString($cuisine) && $this->IsNullOrEmptyString($location)){
			$name = "%".$name."%";
			$queryString = "SELECT * FROM restaurants WHERE name LIKE ? AND cuisine = ?";
			$query = $this->db->query($queryString, array($name, $cuisine));
		}
		else if ($this->IsNullOrEmptyString($name) && $this->IsNullOrEmptyString($cuisine) && !$this->IsNullOrEmptyString($location)){
			$queryString = "SELECT * FROM restaurants WHERE location = ?";
			$query = $this->db->query($queryString, array($location));
		}
		else if ($this->IsNullOrEmptyString($name) && !$this->IsNullOrEmptyString($cuisine) && $this->IsNullOrEmptyString($location)){
			$queryString = "SELECT * FROM restaurants WHERE cuisine = ? ";
			$query = $this->db->query($queryString, array($cuisine));
		}
		else if (!$this->IsNullOrEmptyString($name) && $this->IsNullOrEmptyString($cuisine) && $this->IsNullOrEmptyString($location)){
			$name = "%".$name."%";
			$queryString = "SELECT * FROM restaurants WHERE name LIKE ?";
			$query = $this->db->query($queryString, array($name));
		}
		else {
			redirect('/');
		}

		$data['restaurants'] = $query->result_array();	

		$this->load->view('templates/header');
		$this->load->view('restaurants/index', $data);
		$this->load->view('templates/footer');
	}

	public function freeTextSearch(){

	}

	public function IsNullOrEmptyString($input){
	    return (!isset($input) || trim($input)=='');
	}
}
 ?>