<?php

class Search_model extends CI_Model{
	
	public function get_staffs(){
	    $this->db->join('roles','staff.role_id = roles.role_id','left');
		$query = $this->db->get('staff');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_staff($id){
		$this->db->select('*');
		$this->db->from('staff');
		$this->db->where('staff_id',$id);

		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function get_location_staff($location_id){
		$this->db->select('*');
		$this->db->from('staff');
		$this->db->where('location_id',$location_id);

		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_roles(){
		$query = $this->db->get('roles');
		if($query->num_rows() >0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function delete_staff($staff_id){
	    $this->db->where('staff_id',$staff_id);
	    $this->db->delete('staff');
    }
}