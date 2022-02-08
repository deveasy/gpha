<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')){
            redirect('auth','refresh');
        }

		$this->load->model('company_model');
	}

	public function index()
	{
		$this->load->view('company_setup');
	}

	public function company_setup(){
		$this->load->view('company_setup');
	}

	public function add_shop(){
		$this->company_model->add_shop();
		redirect('company');
	}
	
	public function add_warehouse(){
		$this->company_model->add_warehouse();
		redirect('company');
	}

	public function add_company_information(){
		$this->company_model->add_company_information();
		redirect('company');
	}
}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */