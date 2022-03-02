<?php

class Consumables_model extends CI_Model{
	
	public function get_consumables(){
		$query = $this->db->get('consumables');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	function get_location_consumables($location_id){
		$this->db->select('location_inventory.asset_code, asset_name, asset_category, location_inventory.unit_price');
		$this->db->from('location_inventory');
		$this->db->join('assets','location_inventory.asset_code = assets.asset_code');
		$this->db->where('location_id', $location_id);
		
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function assign(){
		$data = array(
			
		);
	}

	public function get_asset_categories(){
		$query = $this->db->get('asset_categories');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function add_asset_category(){
		$data = array(
			'category_name' => strtoupper($this->input->post('category_name')),
			'category_description' => $this->input->post('category_description')
		);
		$this->db->insert('asset_categories', $data);
	}

	public function get_latest_code(){
		$this->db->select('asset_code');
		$this->db->order_by('id','desc');
		$this->db->limit(1);
		$query = $this->db->get('assets');
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}

	}

	public function add_asset(){
		$asset_name = strtoupper($this->input->post('asset_name'));
		$data = array(
			'asset_code' => $this->input->post('asset_code'),
			'asset_name' => $asset_name,
			'asset_category' => strtoupper($this->input->post('asset_category')),
			'unit_price' => $this->input->post('unit_price'),
			'reorder_level' => $this->input->post('reorder_level')
		);
		$this->db->insert('assets',$data);
	}

	public function add_asset_to_location($location_id, $quantity){
		$data = array(
			'location_id' => $location_id,
			'asset_code' => $this->input->post('asset_code'),
			'unit_price' => $this->input->post('unit_price'),
			'quantity_in_stock' => $quantity
		);
		$this->db->insert('location_inventory', $data);
	}

	public function get_asset($id){
		$this->db->select('*');
		$this->db->from('assets');
		$this->db->where('asset_code',$id);

		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	function get_location_asset($asset_code, $location_id){
		$this->db->select('location_inventory.asset_code, asset_category, asset_name, location_inventory.unit_price, reorder_level');
		$this->db->from('location_inventory');
		$this->db->join('assets','assets.asset_code = location_inventory.asset_code');
		$this->db->where('location_id', $location_id);
		$this->db->where('location_inventory.asset_code', $asset_code);

		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function update_location_asset_quantity($location_id, $code, $qty){
		$data = array(
			'quantity_in_stock' => $qty
		);
		$this->db->where('location_id', $location_id);
		$this->db->where('asset_code', $code);
		$this->db->update('location_inventory', $data);
	}

	public function update_asset($id){
		$data = array(
			'asset_code' => $this->input->post('asset_code'),
			'asset_name' => $this->input->post('asset_name'),
			'asset_category' => $this->input->post('asset_category'),
			'unit_price' => $this->input->post('unit_price'),
			'reorder_level' => $this->input->post('reorder_level')
		);
		$this->db->where('asset_code',$id);
		$this->db->update('assets',$data);
	}

	public function update_price($asset_code){
		$data = array(
			'unit_price' => $this->input->post('unit_price')
		);
		$this->db->where('asset_code',$asset_code);
		$this->db->update('location_inventory',$data);
	}

	public function update_prices($asset_code, $unit_price){
		$data = array(
			'unit_price' => $unit_price
		);
		$this->db->where('asset_code',$asset_code);
		$this->db->update('location_inventory',$data);
	}

	public function update_location_price($asset_code, $location_id){
		$data = array(
			'unit_price' => $this->input->post('unit_price')
		);
		$this->db->where('asset_code',$asset_code);
		$this->db->where('location_id', $location_id);
		$this->db->update('location_inventory',$data);
	}

	public function get_locations(){
		$query = $this->db->get('locations');
		if($query->num_rows() > 1){
			return $query->result();
		}
		else{
			return false;
		}
	}

	function get_location_name($location_id){
		$this->db->select('location_name');
		$this->db->where('location_id', $location_id);

		$query = $this->db->get('location');
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	function add_unit_of_measure(){
		$data = array(
			'short_description' => $this->input->post('short_description'),
			'description' => $this->input->post('description')
		);

		$this->db->insert('units_of_measure');
	}
}