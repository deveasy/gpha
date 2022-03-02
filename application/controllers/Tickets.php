<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tickets extends CI_Controller {

	private $date;

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')){
            redirect('auth','refresh');
        }

		$this->load->model('assets_model');
		$this->load->database();
	}

	public function index()
	{
		$asset_count = array();
		$available_count = array();

		$assets = $this->assets_model->get_asset_categories();
		$data['assets'] = $this->assets_model->get_asset_categories();

		//get the total number of assets in a type
		foreach($assets as $asset){
			$asset_count[$asset->asset_type_id] = $this->assets_model->count_asset_type($asset->asset_type_id);
		}

		$data['asset_count'] = $asset_count;

		//get the total number of available assets in a type
		foreach($assets as $asset){
			$available_count[$asset->asset_type_id] = $this->assets_model->count_available_assets($asset->asset_type_id);
		}
		$data['available_assets'] = $available_count;

		$this->load->view('assets/view_assets_categories', $data);
	}
	

	public function view_assets($asset_type_id){
		$data['asset_type'] = $asset_type_id;
		$data['assets'] = $this->assets_model->get_assets($asset_type_id);
		$data['type_name'] = $this->assets_model->get_asset_type_name($asset_type_id)->type_name;
		$data['discarded_assets'] = $this->assets_model->get_discarded_assets();
		$data['faulty_assets'] = $this->assets_model->get_faulty_assets();
		$data['assigned_assets'] = $this->assets_model->get_assigned_assets();
		$data['available_assets'] = $this->assets_model->get_available_assets();

		$this->load->view('assets/view_assets', $data);
	}

	public function new_asset($asset_type){
		$data['asset_type'] = $asset_type;
		$data['categories'] = $this->assets_model->get_categories();
		$data['locations'] = $this->assets_model->get_locations();
		$this->load->view('assets/add_asset', $data);
	}

	public function add_asset($asset_type){
		$this->assets_model->add_asset($asset_type);
		$this->session->set_flashdata('asset_add','Asset successfully added');
		
		redirect('assets/view_assets/'.$asset_type);
	}

	public function edit_asset($asset_id){
		$data['asset'] = $this->assets_model->get_asset($asset_id);
		$data['locations'] = $this->assets_model->get_locations();
		$this->load->view('edit_asset',$data);
	}

	public function assign_asset($asset_id){

	}

	public function delete_asset($asset_id){

	}

	public function asset_history($asset_id){

	}

	public function release_to_supplier($assetid){

	}

	public function location_assets(){
		if($this->input->post('location') == 'all'){
			redirect('assets');
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
		$data['location_name'] = $this->assets_model->get_location_name($location_id)->location_name;
		$data['locations'] = $this->assets_model->get_locations();
		$data['assets'] = $this->assets_model->get_location_assets($location_id);

		$this->load->view('view_location_assets', $data);
	}

	public function new_category(){
		$data['categories'] = $this->assets_model->get_categories();
		$this->load->view('assets/add_asset_category', $data);
	}

	public function add_category(){
		$this->assets_model->add_asset_category();

		redirect('assets/new_category');
	}

	function edit_location_asset($asset_code, $location_id){
		$data['location_id'] = $location_id;
		$data['asset'] = $this->assets_model->get_location_asset($asset_code, $location_id);
		$this->load->view('edit_location_asset', $data);
	}

	public function update_asset($asset_code){
		$update_option = $this->input->post('update_option');
		
		if(!empty($update_option)){
			if($update_option == 'all'){
				$this->assets_model->update_price($asset_code);
				$this->session->set_flashdata('asset_update','Asset has been updated successfully.');
				redirect('assets');
			}
			else{
				$this->assets_model->update_location_price($asset_code, $update_option);
				$this->session->set_flashdata('asset_update','Asset has been updated successfully.');
				redirect('assets');
			}
		}
		else{
			$this->assets_model->update_asset($asset_code);
			$this->assets_model->update_price($asset_code);
			$this->session->set_flashdata('asset_update','Asset has been updated successfully.');
			redirect('assets');
		}
	}

	function update_location_asset($asset_code, $location_id){
		$this->assets_model->update_location_price($asset_code, $location_id);
		$this->session->set_flashdata('asset_update','Asset has been updated successfully.');
		redirect('assets/location_assets/'.$location_id);
	}

	//update the quantities for each asset in location
	//after taking of stock with csv file
	public function update_quantities(){
		if(isset($_POST['submit'])){
			$filename = $_FILES['file']['tmp_name'];

			if($_FILES['file']['size'] > 0){
				$file = fopen($filename, 'r');

				while(($getData = fgetcsv($file, 10000,',')) !== FALSE){
					$this->assets_model->update_location_asset_quantity($getData[0], $getData[1], $getData[2]);
				}
				fclose($file);
			}
		}
		redirect('assets');
	}

	function import_assets(){
	    if(isset($_POST['submit'])){
	        $filename = $_FILES['file']['tmp_name'];

	        if($_FILES['file']['size'] > 0){
	            $file = fopen($filename, 'r');

	            while(($getData = fgetcsv($file, 10000, ',')) !== FALSE){
	                $this->assets_model->import_assets($getData[0], $getData[1], $getData[2], $getData[3]);
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

		$results = $this->assets_model->get_data_from_database();
		foreach($results as $result){
			fputcsv($output, $result);
		}
		fclose($output);
	}

	public function update_prices(){
		$locations = $this->assets_model->get_locations();
		$assets = $this->assets_model->get_assets();

		foreach($assets as $asset){
			$this->assets_model->update_prices($asset->asset_code, $asset->unit_price);
			redirect('assets');
		}
	}
}

/* Version 1.1 */
/* End of file Assets.php */
/* Location: ./application/controllers/Assets.php */