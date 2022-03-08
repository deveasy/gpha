<?php

class Requests_model extends CI_Model{
	
	public function get_requests(){
		$query = $this->db->get('requests');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_asset_types(){
		$query = $this->db->get('asset_types');

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_consumables(){
		$query = $this->db->get('consumables');

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function add_request(){
		$data = array(
			'asset_type' => $this->input->post('asset_type'),
			'source' => $this->input->post('unit'),
			'quantity' => $this->input->post('quantity')
		);
		$this->db->insert('requests', $data);
	}
}