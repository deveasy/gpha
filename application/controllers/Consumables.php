<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consumables extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')){
            redirect('auth','refresh');
        }

		$this->load->model('consumables_model');
	}

	public function index()
	{
		$data['location_name'] = '';
		$data['location_id'] = '';
		$data['locations'] = $this->consumables_model->get_locations();
		$data['consumables'] = null /*$this->assets_model->get_assets()*/;
		$this->load->view('consumables/consumables',$data);
	}

	public function location_assets(){
		if($this->input->post('location') == 'all'){
			redirect('consumables');
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
		$data['location_name'] = $this->consumables_model->get_location_name($location_id)->location_name;
		$data['locations'] = $this->consumables_model->get_locations();
		$data['consumables'] = $this->consumables_model->get_location_consumables($location_id);

		$this->load->view('view_location_consumables', $data);
	}

	public function consumable_categories(){
		$data['categories'] = $this->consumables_model->get_consumable_categories();
		$this->load->view('add_consumable_category', $data);
	}

	public function add_category(){
		$this->consumables_model->add_consumable_category();

		redirect('consumables/consumable_categories');
	}

	public function new_consumable(){
		$this->load->view('consumables/add_consumable');
	}

	public function add_consumable(){
		$this->consumables_model->add_consumable();
		$this->session->set_flashdata('consumable_add','consumable successfully added');
		
		//add the new consumable to location inventory
		$add_option = $this->input->post('add_option');
		if($add_option == 'all'){
			$locations = $this->consumables_model->get_locations();
			foreach($locations as $location){
				$this->consumables_model->add_consumable_to_location($location->location_id, 2000);
			}
		}
		else{
			$this->consumables_model->add_consumable_to_location($add_option, 2000);
		}
		
		redirect('consumables');
	}

	public function assign(){
		$this->load->view('consumables/assign_consumable');
	}

	private function new_consumable_code(){
		$current_code = $this->consumables_model->get_latest_code()->consumable_code;
		$str1 = substr($current_code, 0, 5);
		$str2 = substr($current_code, 5);
		$sum = $str2 + 1;
		
		return $str1.$sum;
	}

	public function edit_consumable($id){
		$data['consumable'] = $this->consumables_model->get_consumable($id);
		$data['locations'] = $this->consumables_model->get_locations();
		$this->load->view('edit_consumable',$data);
	}

	function edit_location_consumable($consumable_code, $location_id){
		$data['location_id'] = $location_id;
		$data['consumable'] = $this->consumables_model->get_location_consumable($consumable_code, $location_id);
		$this->load->view('edit_location_consumable', $data);
	}

	public function update_consumable($consumable_code){
		$update_option = $this->input->post('update_option');
		
		if(!empty($update_option)){
			if($update_option == 'all'){
				$this->consumables_model->update_price($consumable_code);
				$this->session->set_flashdata('consumable_update','consumable has been updated successfully.');
				redirect('consumables');
			}
			else{
				$this->consumables_model->update_location_price($consumable_code, $update_option);
				$this->session->set_flashdata('consumable_update','consumable has been updated successfully.');
				redirect('consumables');
			}
		}
		else{
			$this->consumables_model->update_consumable($consumable_code);
			$this->consumables_model->update_price($consumable_code);
			$this->session->set_flashdata('consumable_update','consumable has been updated successfully.');
			redirect('consumables');
		}
	}

	function update_location_consumable($consumable_code, $location_id){
		$this->consumables_model->update_location_price($consumable_code, $location_id);
		$this->session->set_flashdata('consumable_update','consumable has been updated successfully.');
		redirect('consumables/location_consumables/'.$location_id);
	}

	//update the quantities for each consumable in location
	//after taking of stock with csv file
	public function update_quantities(){
		if(isset($_POST['submit'])){
			$filename = $_FILES['file']['tmp_name'];

			if($_FILES['file']['size'] > 0){
				$file = fopen($filename, 'r');

				while(($getData = fgetcsv($file, 10000,',')) !== FALSE){
					$this->consumables_model->update_location_consumable_quantity($getData[0], $getData[1], $getData[2]);
				}
				fclose($file);
			}
		}
		redirect('consumables');
	}

	function import_consumables(){
	    if(isset($_POST['submit'])){
	        $filename = $_FILES['file']['tmp_name'];

	        if($_FILES['file']['size'] > 0){
	            $file = fopen($filename, 'r');

	            while(($getData = fgetcsv($file, 10000, ',')) !== FALSE){
	                $this->consumables_model->import_consumables($getData[0], $getData[1], $getData[2], $getData[3]);
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

		$results = $this->consumables_model->get_data_from_database();
		foreach($results as $result){
			fputcsv($output, $result);
		}
		fclose($output);
	}

	public function update_prices(){
		$locations = $this->consumables_model->get_locations();
		$consumables = $this->consumables_model->get_consumables();

		foreach($consumables as $consumable){
			$this->consumables_model->update_prices($consumable->consumable_code, $consumable->unit_price);
			redirect('consumables');
		}
	}
}

/* End of file consumables.php */
/* Location: ./application/controllers/consumables.php */