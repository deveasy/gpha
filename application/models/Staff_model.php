<?php

class Staff_model extends CI_Model{
	
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

	public function add_staff(){
		$data = array(
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'dob' => $this->input->post('dob'),
			'location_id' => $this->input->post('locations'),
			'address' => $this->input->post('address'),
			'gender' => $this->input->post('gender'),
			'nationality' => $this->input->post('nationality'),
			'city' => $this->input->post('city'),
			'mobile_phone' => $this->input->post('mobile_phone'),
			'username' => $this->input->post('username'),
			'role_id' => $this->input->post('role'),
			'password' => md5($this->input->post('password'))
		);
		$this->db->insert('staff', $data);
	}

	public function get_locations(){
		$query = $this->db->get('locations');
		if($query->num_rows() > 0){
			return $query->result();
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