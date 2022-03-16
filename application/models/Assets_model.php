<?php

class Assets_model extends CI_Model{
	

	public function get_asset_categories(){
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->join('asset_types','asset_types.asset_category = categories.category_id','left');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_assets($asset_type_id){
		$this->db->select('*');
		$this->db->from('assets');
		$this->db->where('asset_type', $asset_type_id);
		$this->db->join('suppliers','assets.supplier_id = suppliers.supplier_id','left');
		$this->db->join('asset_types', 'assets.asset_type = asset_types.asset_type_id');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_asset_types(){
		return $this->db->get('asset_types')->result();
	}

	public function count_asset_type($asset_type_id){
		$this->db->where('asset_type', $asset_type_id);
		$this->db->from('assets');

		return $this->db->count_all_results();
	}

	public function count_available_assets(){
		$this->db->where('status', 'available');
		$this->db->from('assets');

		return $this->db->count_all_results();
	}

	public function get_asset_type_name($asset_type_id){
		$this->db->select('type_name');
		$this->db->where('asset_type_id', $asset_type_id);

		return $this->db->get('asset_types')->row();
	}

	public function get_faulty_assets(){
		$this->db->where('assets.status', 'faulty');
		$this->db->join('suppliers','assets.supplier_id = suppliers.supplier_id','left');
		$this->db->join('asset_types', 'assets.asset_type = asset_types.asset_type_id');
		$this->db->join('users', 'assets.assigned_by = users.staff_id');
		
		return $this->db->get('assets')->result();
	}

	public function get_discarded_assets(){
		$this->db->where('assets.status', 'discarded');
		$this->db->join('suppliers','assets.supplier_id = suppliers.supplier_id','left');
		$this->db->join('asset_types', 'assets.asset_type = asset_types.asset_type_id');
		$this->db->join('users', 'assets.assigned_by = users.staff_id');
		
		return $this->db->get('assets')->result();
	}

	public function get_available_assets(){
		$this->db->where('assets.status', 'available');
		$this->db->join('suppliers','assets.supplier_id = suppliers.supplier_id','left');
		$this->db->join('asset_types', 'assets.asset_type = asset_types.asset_type_id');
		
		return $this->db->get('assets')->result();
	}

	public function get_assigned_assets(){
		$this->db->where('assets.status', 'assigned');
		$this->db->join('suppliers','assets.supplier_id = suppliers.supplier_id','left');
		$this->db->join('asset_types', 'assets.asset_type = asset_types.asset_type_id');
		$this->db->join('users', 'assets.assigned_by = users.staff_id');
		
		return $this->db->get('assets')->result();
	}

	public function get_categories(){
		return $this->db->get('categories')->result();
	}

	function get_location_assets($location_id){
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

	public function add_asset_category(){
		$data = array(
			'category_name' => strtoupper($this->input->post('category_name')),
			'category_description' => $this->input->post('category_description')
		);
		$this->db->insert('categories', $data);
	}

	public function add_asset($asset_type){
		$data = array(
			'asset_type' => $asset_type,
			'brand' => $this->input->post('brand'),
			'model' => $this->input->post('model'),
			'wireless_mac' => $this->input->post('wirelessMac'),
			'lan_mac' => $this->input->post('lanMac'),
			'os' => $this->input->post('os'),
			'hard_disk' => $this->input->post('hardDisk'),
			'processor' => $this->input->post('processor'),
			'memory' => $this->input->post('memory'),
			'network_hub' => $this->input->post('networkHub'),
			'serial_number' => $this->input->post('serialNumber'),
			'colour' => $this->input->post('colour'),
			'warranty_date' => $this->input->post('warrantyDate'),
			'supplier_id' => $this->input->post('supplier'),
			'purchase_date' => $this->input->post('purchaseDate'),
			'status' => 'available'
		);
		$this->db->insert('assets',$data);
	}

	public function update_asset_status(){
		$data = array(
			'asset_id' => '',
		);
		$this->db->insert('status', $data);
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
		$this->db->where('asset_id',$id);
		$this->db->join('asset_types', 'assets.asset_type = asset_types.asset_type_id');
		$this->db->join('suppliers','assets.supplier_id = suppliers.supplier_id','left');

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

	public function update_asset($id, $asset_type){
		$data = array(
			'asset_type' => $asset_type,
			'brand' => $this->input->post('brand'),
			'model' => $this->input->post('model'),
			'wireless_mac' => $this->input->post('wirelessMac'),
			'lan_mac' => $this->input->post('lanMac'),
			'os' => $this->input->post('os'),
			'hard_disk' => $this->input->post('hardDisk'),
			'processor' => $this->input->post('processor'),
			'memory' => $this->input->post('memory'),
			'network_hub' => $this->input->post('networkHub'),
			'serial_number' => $this->input->post('serialNumber'),
			'colour' => $this->input->post('colour'),
			'warranty_date' => $this->input->post('warrantyDate'),
			'supplier_id' => $this->input->post('supplier'),
			'purchase_date' => $this->input->post('purchaseDate')
		);
		$this->db->where('asset_id',$id);
		$this->db->update('assets',$data);
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

	public function get_users(){
		$query = $this->db->get('users');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function assign_asset($asset_id){
		$data = array(
			'asset_id' => $asset_id,
			'staff_id' => $this->input->post('staff'),
			'computer_tag' => $this->input->post('computer_tag'),
			'asset_tag' => $this->input->post('asset_tag'),
			'barcode' => $this->input->post('barcode'),
			'date_assigned' => $this->input->post('date'),
			'location' => $this->input->post('location'),
		);
		$this->db->insert('user_asset', $data);
	}
}