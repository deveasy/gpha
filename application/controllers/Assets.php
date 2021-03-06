<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assets extends CI_Controller {

	private $date;

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')){
            redirect('auth','refresh');
        }

		$this->load->model('assets_model');
		$this->load->database();
	}

	public function search(){
		$term = $this->input->get('term');
		$this->db->like('type_name', $term);
		$data = $this->db->get('asset_types')->result();
		echo json_encode($data);
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

	public function get_models($brand_id){
		$data = $this->assets_model->get_models($brand_id);
		echo json_encode($data);
	}

	public function new_asset($asset_type){
		$data['suppliers'] = $this->assets_model->get_suppliers();
		$data['asset_type'] = $asset_type;
		$data['categories'] = $this->assets_model->get_asset_types();
		$this->load->view('assets/add_asset', $data);
	}

	public function add_asset($asset_type){
		$this->assets_model->add_asset($asset_type);
		$this->session->set_flashdata('asset_add','Asset successfully added');
		
		redirect('assets/view_assets/'.$asset_type);
	}

	public function edit($asset_id, $asset_type){
		$data['suppliers'] = $this->assets_model->get_suppliers();
		$data['brands'] = $this->assets_model->get_brands();
		$data['asset_id'] = $asset_id;
		$data['asset_type'] = $asset_type;
		$data['asset'] = $this->assets_model->get_asset($asset_id);
		$data['categories'] = $this->assets_model->get_asset_types();
		$this->load->view('assets/edit_asset', $data);
	}

	public function update_asset($asset_id, $asset_type){
		$this->assets_model->update_asset($asset_id, $asset_type);
		$this->session->set_flashdata('asset_update','Asset has been updated successfully.');
		redirect('assets/view_assets/' . $asset_type);
	}

	public function assign($asset_type, $asset_id){
		$data['asset_type'] = $asset_type;
		$data['users'] = $this->assets_model->get_users();
		$data['asset_id'] = $asset_id;
		$this->load->view('assets/assign_asset', $data);
	}

	public function assign_asset($asset_type, $asset_id){
		$this->assets_model->assign_asset($asset_id);
		redirect('assets/view_assets/'.$asset_type);
	}

	public function delete($asset_type, $asset_id){
		$this->assets_model->delete_asset($asset_id);
		redirect('assets/view_assets/'.$asset_type);
	}

	public function asset_history($asset_id){
		$data['history'] = $this->assets_model->asset_history($asset_id);
		$this->load->view('assets/history', $data);
	}

	public function reassign(){
		$this->assets_model->reassign();
	}

	public function discard(){
		$this->assets_model->discard();
	}

	public function release_to_supplier($asset_id){
		$this->db->where('asset_id', $asset_id);
		$this->db->delete('assets');
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