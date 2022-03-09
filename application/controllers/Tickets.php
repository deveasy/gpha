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
		$this->load->view('assets/view_assets_categories');
	}

	public function new(){
		$this->load->view('issues/new_ticket');
	}
	

	public function add_ticket(){
		$this->tickets_model->add_ticket();
		redirect('tickets');
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

	public function new_category(){
		$data['categories'] = $this->assets_model->get_categories();
		$this->load->view('assets/add_asset_category', $data);
	}

	public function add_category(){
		$this->assets_model->add_asset_category();

		redirect('assets/new_category');
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
}

/* Version 1.1 */
/* End of file Assets.php */
/* Location: ./application/controllers/Assets.php */