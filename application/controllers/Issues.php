<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Issues extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')){
            redirect('auth','refresh');
        }

		$this->load->model('tickets_model');
	}

	public function index()
	{
		$data['issues'] = $this->tickets_model->get_tickets();
		$this->load->view('issues/issues',$data);
	}

	public function location_issues(){
		if($this->input->post('location') == 'all'){
			redirect('issues');
		}
		else{
			if($this->uri->segment(3)){
				$location_id = $this->uri->segment(3);
			}
			else{
				$location_id = $this->input->post('location');
			}
		}

		$data['location_id'] = $location_id;
		$data['location_name'] = $this->tickets_model->get_location_name($location_id)->location_name;
		$data['locations'] = $this->tickets_model->get_locations();
		$data['issues'] = $this->tickets_model->get_location_issues($location_id);

		$this->load->view('view_location_issues', $data);
	}

	public function issues_categories(){
		$data['categories'] = $this->tickets_model->get_issues_categories();
		$this->load->view('add_issues_category', $data);
	}

	public function add_category(){
		$this->tickets_model->add_issues_category();

		redirect('tickets/issues_categories');
	}

	public function add_new_issues(){
		$data['issues_code'] = $this->new_issues_code();
		$data['categories'] = $this->tickets_model->get_issues_categories();
		$data['locations'] = $this->tickets_model->get_locations();
		$this->load->view('add_issues', $data);
	}

	public function add_issues(){
		$this->tickets_model->add_issues();
		$this->session->set_flashdata('issues_add','issues successfully added');
		
		//add the new issues to location inventory
		$add_option = $this->input->post('add_option');
		if($add_option == 'all'){
			$locations = $this->tickets_model->get_locations();
			foreach($locations as $location){
				$this->tickets_model->add_issues_to_location($location->location_id, 2000);
			}
		}
		else{
			$this->tickets_model->add_issues_to_location($add_option, 2000);
		}
		
		redirect('issues');
	}

	private function new_issues_code(){
		$current_code = $this->tickets_model->get_latest_code()->issues_code;
		$str1 = substr($current_code, 0, 5);
		$str2 = substr($current_code, 5);
		$sum = $str2 + 1;
		
		return $str1.$sum;
	}

	public function edit_issues($id){
		$data['issues'] = $this->tickets_model->get_issues($id);
		$data['locations'] = $this->tickets_model->get_locations();
		$this->load->view('edit_issues',$data);
	}

	function edit_location_issues($issues_code, $location_id){
		$data['location_id'] = $location_id;
		$data['issues'] = $this->tickets_model->get_location_issues($issues_code, $location_id);
		$this->load->view('edit_location_issues', $data);
	}

	public function update_issues($issues_code){
		$update_option = $this->input->post('update_option');
		
		if(!empty($update_option)){
			if($update_option == 'all'){
				$this->tickets_model->update_price($issues_code);
				$this->session->set_flashdata('issues_update','issues has been updated successfully.');
				redirect('issues');
			}
			else{
				$this->tickets_model->update_location_price($issues_code, $update_option);
				$this->session->set_flashdata('issues_update','issues has been updated successfully.');
				redirect('issues');
			}
		}
		else{
			$this->tickets_model->update_issues($issues_code);
			$this->tickets_model->update_price($issues_code);
			$this->session->set_flashdata('issues_update','issues has been updated successfully.');
			redirect('issues');
		}
	}

	function update_location_issues($issues_code, $location_id){
		$this->tickets_model->update_location_price($issues_code, $location_id);
		$this->session->set_flashdata('issues_update','issues has been updated successfully.');
		redirect('issues/location_issues/'.$location_id);
	}

	//update the quantities for each issues in location
	//after taking of stock with csv file
	public function update_quantities(){
		if(isset($_POST['submit'])){
			$filename = $_FILES['file']['tmp_name'];

			if($_FILES['file']['size'] > 0){
				$file = fopen($filename, 'r');

				while(($getData = fgetcsv($file, 10000,',')) !== FALSE){
					$this->issues_model->update_location_issues_quantity($getData[0], $getData[1], $getData[2]);
				}
				fclose($file);
			}
		}
		redirect('issues');
	}

	function import_issues(){
	    if(isset($_POST['submit'])){
	        $filename = $_FILES['file']['tmp_name'];

	        if($_FILES['file']['size'] > 0){
	            $file = fopen($filename, 'r');

	            while(($getData = fgetcsv($file, 10000, ',')) !== FALSE){
	                $this->issues_model->import_issues($getData[0], $getData[1], $getData[2], $getData[3]);
                }
                fclose($file);
            }
        }
    }

	//function to export from the database
	public function export(){
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=data.csv');

		$output = fopen('php://output', 'w');
		fputcsv($output, array('ID', 'first name','last name'));

		$results = $this->issues_model->get_data_from_database();
		foreach($results as $result){
			fputcsv($output, $result);
		}
		fclose($output);
	}

	public function update_prices(){
		$locations = $this->issues_model->get_locations();
		$issues = $this->issues_model->get_issues();

		foreach($issues as $issues){
			$this->issues_model->update_prices($issues->issues_code, $issues->unit_price);
			redirect('issues');
		}
	}
}

/* End of file issues.php */
/* Location: ./application/controllers/issues.php */