<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')){
            redirect('auth','refresh');
        }
		$this->load->model('Search_model');
	}
	public function index()
	{
		$this->load->view('search_results');
	}
}

/* End of file Welcome.php */
/* Location: ./application/controllers/Search.php */