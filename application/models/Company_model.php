<?php

class Company_model extends CI_Model{
	
	public function add_company_info(){
		$data = array(
			'company_name' => $this->input->post('company_name'),
			'email' => $this->input->post('email_address'),
			'website' => $this->input->post('website'),
			'postal_address' => $this->input->post('postal_address'),
			'headquarters' => $this->input->post('headquarters')
		);
		$this->db->insert('company_information',$data);
	}

	public function get_company_name(){
		$this->db->select('company_name');

		$query = $this->db->get('company_information');
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function get_company_info(){
		$query = $this->db->get('company_information');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}
}