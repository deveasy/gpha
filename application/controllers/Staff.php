<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')){
            redirect('auth','refresh');
        }

		$this->load->model('staff_model');
	}

	public function index()
	{
		$data['roles'] = $this->staff_model->get_roles();
		$data['staffs'] = $this->staff_model->get_staffs();
		//$data['shops'] = $this->staff_model->get_shops();
		$this->load->view('view_staff',$data);
	}

	public function add_staff(){
		$this->staff_model->add_staff();
		redirect('staff');
	}

	public function view_staff_details($staff_id){
		$data['staff_details'] = $this->staff_model->get_staff($staff_id);
		$this->load->view('view_staff', $data);
	}

	public function import_staff(){
	}

	public function import_staff_data(){
	}

	function delete_staff($staff_id){
	    $this->staff_model->delete_staff($staff_id);
    }
}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */