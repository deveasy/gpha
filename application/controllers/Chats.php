<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chats extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')){
            redirect('auth','refresh');
        }

		$this->load->model('dashboard_model');

		date_default_timezone_set('GMT');
	}

    private $chat_id;
    private $user_id;
    private $message;
    private $created_on;

	public function index()
	{
		$data['updates'] = $this->dashboard_model->get_updates();
		$this->load->view('dashboard/dashboard_view', $data);
	}
}

/* End of file Chats.php */
/* Location: ./application/controllers/Welcome.php */