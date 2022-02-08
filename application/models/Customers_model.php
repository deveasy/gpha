<?php

class Customers_model extends CI_Model{
	
	public function get_customers(){
		$query = $this->db->get('customers');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_customer($id){
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where('customer_id',$id);

		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function add_customer($id){
		$date = date('Y-m-d');
		$data = array(
			'transfer_id' => $id,
			'source' => $this->input->post('source'),
			'destination' => $this->input->post('destination'),
			'transfer_date' => $date
		);
		$this->db->insert('customer_waybills', $data);
	}

	public function add_waybill_details($id){
		$post_items = $this->input->post();
		$data = array();

		foreach($post_items as $key=>$value){
			if($key == 'source' || $key == 'destination' || $key == 'address'){
				continue;
			}
			else{
				$data = array(
					'transfer_id' => $id,
					'product_code' => $key,
					'quantity' => $value
				);
			}
			$this->db->insert('product_transfer_details', $data);
		}
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

	// check if there are no transfers in the product
	// transfers table
	public function no_transfer(){
		$query = $this->db->count_all('product_transfers');
		
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

		return $query = $this->db->get('product_transfers')->row();
	}

	public function get_all_transfers(){
		$this->db->select('transfer_id, transfer_date, warehouse_name, shop_name');
		$this->db->join('warehouse','product_transfers.source = warehouse.warehouse_id');
		$this->db->join('shop','product_transfers.destination = shop.shop_id');
		$this->db->order_by('transfer_id','desc');
		$query = $this->db->get('product_transfers');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_transfer($transfer_id){
		$this->db->select('transfer_id, transfer_date, shop_name, warehouse_name');
		$this->db->join('shop','product_transfers.destination = shop.shop_id');
		$this->db->join('warehouse','product_transfers.source = warehouse.warehouse_id');
		$this->db->where('transfer_id',$transfer_id);

		$query = $this->db->get('product_transfers');
		if($query->num_rows > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function get_transfer_details($transfer_id){
		$this->db->select('product_transfer_details.product_code, product_transfer_details.quantity, shop_inventory.unit_price, products.product_name');
		$this->db->from('product_transfer_details');
		$this->db->join('shop_inventory','product_transfer_details.product_code = shop_inventory.product_code');
		$this->db->join('products','product_transfer_details.product_code = products.product_code');
		$this->db->where('transfer_id', $transfer_id);

		//MAKE THE TRUE SHOP ID IS ENTERED IN THIS WHERE CLAUSE
		//$this->db->where('shop_id', 'S1');

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