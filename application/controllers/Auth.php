<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('auth_model');
	}

	private $role;
	
	public function index()
	{
		$this->load->view('login_view');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('auth');
	}

	function login(){
		$this->form_validation->set_rules('username','Username', 'required');
		$this->form_validation->set_rules('password','Password', 'required|callback_check_database');
		if($this->form_validation->run() == FALSE){
			$this->load->view('login_view');
		}
		else{
			$role = $this->session->userdata['logged_in']['role'];
			if($role == 3 || $role == 4){
				redirect('products');
			}
			elseif($role == 5){
			    redirect('inventory');
            }
			else{
				redirect('dashboard');
			}
		}
	}

	function check_database($password){
		$username = $this->input->post('username');

		$result = $this->auth_model->login($username, $password);
		// $locations = $this->auth_model->get_locations();
		// $warehouses = $this->auth_model->get_warehouses();

		if($result){
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'staff_id' => $row->staff_id,
					'firstname' => $row->firstname,
					'lastname' => $row->lastname,
					'role' => $row->role_id,
					'location' => $row->location_id
				);
				$this->session->set_userdata('logged_in',$sess_array);
			}
		//	$this->session->set_userdata('locations', $locations);
		//	$this->session->set_userdata('warehouses', $warehouses);
			return true;
		}
		else{
			$this->form_validation->set_message('check_database','Invalid username or password');
			return false;
		}
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */