<?php

$date = date('Y-m-d');

class Locations_model extends CI_Model{
	
	public function get_locations(){
		$query = $this->db->get('locations');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_location($location_id){
		$this->db->select('*');
		$this->db->from('location');
		$this->db->where('location_id',$id);

		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function add_location($location_id){
		$data = array(
			'location_id' => $location_id,
			'location_name' => $this->input->post('location_name'),
			'physical_address' => $this->input->post('physical_address'),
			'location_type' => $this->input->post('location_type'),
			'longitude' => $this->input->post('longitude'),
			'latitude' => $this->input->post('latitude'),
			'phone' => $this->input->post('phone_number')
		);
		$this->db->insert('customer_waybills', $data);
	}

	public function get_location_orders(){
		$this->db->join('locations','locations.location_id = location_orders.location_id');
		$query = $this->db->get('location_orders');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_location_order($order_id){
		$this->db->where('order_id', $order_id);
		$query = $this->db->get('location_orders');

		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function get_location_order_details($order_id){
		$this->db->join('assets','assets.asset_code = location_order_details.asset_code');
		$this->db->where('order_id', $order_id);
		$query = $this->db->get('location_order_details');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function update_order_as_seen($order_id){
		$this->db->set('status', 'seen');
		$this->db->where('order_id', $order_id);
		$this->db->update('location_orders');
	}

	public function get_shops(){
		$query = $this->db->get('shop');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_warehouses(){
		$query = $this->db->get('warehouse');
		if($query->num_rows() >0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	// check if there are no transfers in the asset
	// transfers table
	public function no_transfer(){
		$query = $this->db->count_all('asset_transfers');
		
		if($query == 0){
			return true;
		}
		else{
			return false;
		}
	}

	//get the last transfer id to generate new transfer id
	public function last_transfer_id(){
		$this->db->select('transfer_id');
		$this->db->order_by('transfer_id', 'desc');
		$this->db->limit(1);

		return $query = $this->db->get('asset_transfers')->row();
	}

	public function get_all_transfers(){
		$this->db->select('transfer_id, transfer_date, warehouse_name, shop_name');
		$this->db->join('warehouse','asset_transfers.source = warehouse.warehouse_id');
		$this->db->join('shop','asset_transfers.destination = shop.location_id');
		$this->db->order_by('transfer_id','desc');
		$query = $this->db->get('asset_transfers');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_transfer($transfer_id){
		$this->db->select('transfer_id, transfer_date, shop_name, warehouse_name');
		$this->db->join('shop','asset_transfers.destination = shop.location_id');
		$this->db->join('warehouse','asset_transfers.source = warehouse.warehouse_id');
		$this->db->where('transfer_id',$transfer_id);

		$query = $this->db->get('asset_transfers');
		if($query->num_rows > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function get_transfer_details($transfer_id){
		$this->db->select('asset_transfer_details.asset_code, asset_transfer_details.quantity, location_inventory.unit_price, assets.asset_name');
		$this->db->from('product_transfer_details');
		$this->db->join('location_inventory','product_transfer_details.product_code = location_inventory.product_code');
		$this->db->join('products','product_transfer_details.product_code = products.product_code');
		$this->db->where('transfer_id', $transfer_id);

		//MAKE THE TRUE SHOP ID IS ENTERED IN THIS WHERE CLAUSE
		//$this->db->where('location_id', 'S1');

		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function receive_products(){

	}
}