<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tickets extends CI_Controller {

	private $date;

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')){
            redirect('auth','refresh');
        }

		$this->load->model('tickets_model');
		$this->load->database();
	}

	public function index()
	{
		$data['issues'] = $this->tickets_model->get_tickets();
		$this->load->view('tickets/tickets', $data);
	}

	public function new(){
		$this->load->view('tickets/new_ticket');
	}
	

	public function add_ticket(){
		$this->tickets_model->add_ticket();
		redirect('tickets');
	}

	public function edit($ticket_id){
		$this->load->view('tickets/add_asset');
	}

	public function solve($ticket_id){
		$this->load->view('tickets/solve');
	}

	//function to export from the database
	public function export(){
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=data.csv');

		$output = fopen('php://output', 'w');
		fputcsv($output, array('ID', 'first name','last name'));

		$results = $this->assets_model->get_data_from_database();
		foreach($results as $result){
			fputcsv($output, $result);
		}
		fclose($output);
	}
}

/* Version 1.1 */
/* End of file Tickets.php */
/* Location: ./application/controllers/Tickets.php */