<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Locations extends CI_Controller {

	function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')){
            redirect('auth','refresh');
        }
        $this->load->model('locations_model');
	}
	
	public function index()
	{
		$data['locations'] = $this->locations_model->get_locations();
		$this->load->view('view_locations', $data);
	}

	public function new_location(){
		$this->load->view('add_new_location');
	}

	public function waybill(){
		$data['shops'] = $this->customers_model->get_shops();
		$data['warehouses'] = $this->customers_model->get_warehouses();
		$data['products'] = $this->customers_model->get_products();
		$this->load->view('customer_waybill', $data);
	}

	public function orders(){
		$data['location_orders'] = $this->locations_model->get_location_orders();
		$this->load->view('view_location_orders', $data);
	}

	public function order($order_id){
		$data['location_order'] = $this->locations_model->get_location_order($order_id);
		$data['order_details'] = $this->locations_model->get_location_order_details($order_id);
		$this->locations_model->update_order_as_seen($order_id);

		$this->load->view('view_location_order', $data);
	}
}

/* End of file Welcome.php */
/* Location: ./application/controllers/Welcome.php */