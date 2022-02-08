<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suppliers extends CI_Controller {

	function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')){
            redirect('auth','refresh');
        }
	}
	
	public function index()
	{
		$data['suppliers'] = $this->suppliers_model->get_suppliers();
		$this->load->view('view_suppliers', $data);
	}

	public function new_supplier(){
		$this->load->view('add_new_supplier');
	}

	public function add_supplier(){
		$this->suppliers_model->add_supplier();
		redirect('suppliers');
    }
}

/* End of file Welcome.php */
/* Location: ./application/controllers/Welcome.php */