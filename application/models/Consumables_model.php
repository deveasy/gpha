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
}