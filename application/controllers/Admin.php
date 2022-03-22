<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')){
            redirect('auth','refresh');
        }
	}
	
	public function index()
	{
		$data['suppliers'] = $this->suppliers_model->get_suppliers();
		$data['departments'] = $this->admin_model->get_departments();
		$data['brands'] = $this->admin_model->get_brands();
		$data['models'] = $this->admin_model->get_models();
		$this->load->view('pages/admin', $data);
	}

	public function new_supplier(){
		$data['suppliers'] = $this->admin_model->get_suppliers();
		$this->load->view('add_new_supplier', $data);
	}

	public function add_supplier(){
		$this->suppliers_model->add_supplier();
		$this->session->set_flashdata('supplier','Supplier successfully added.');
		redirect('suppliers');
    }

	public function new_department(){
		$data['departments'] = $this->admin_model->get_departments();
		$this->load->view('pages/departments', $data);
	}

	public function add_department(){
		$this->admin_model->add_department();
		$this->session->set_flashdata('department','Department successfully added.');
		redirect('admin');
	}

	public function new_model(){
		$data['models'] = $this->admin_model->get_models();
		$this->load->view('pages/models', $data);
	}

	public function add_model(){
		$this->admin_model->add_model();
		$this->session->set_flashdata('model','Model successfully added.');
		redirect('admin');
	}

	public function new_brand(){
		$data['brands'] = $this->admin_model->get_brands();
		$this->load->view('pages/brands', $data);
	}

	public function add_brand(){
		$this->admin_model->add_brand();
		$this->session->set_flashdata('brand','Brand successfully added.');
		redirect('admin');
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */