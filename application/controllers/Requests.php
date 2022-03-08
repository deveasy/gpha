<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requests extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')){
            redirect('auth','refresh');
        }

        $this->session_data = $this->session->userdata('logged_in');
		$this->staff_id = $this->session->userdata['logged_in']['staff_id'];
		$this->staff_name = $this->session->userdata['logged_in']['firstname'];

		$this->load->model('requests_model');
	}

	public function index(){
        $this->load->view('requests/requests');
	}

	function new(){
		$data['asset_types'] = $this->requests_model->get_asset_types();
		$data['consumables'] = $this->requests_model->get_consumables();
		$this->load->view('requests/new_request', $data);
	}

	public function add_request(){
		$this->requests_model->add_request();
		redirect('requests');
	}

}

/* End of file Welcome.php */
/* Location: ./application/controllers/Welcome.php */