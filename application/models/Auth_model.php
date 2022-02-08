<?php

class Auth_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function login($username, $password){
		$this->db->select('firstname, lastname, staff_id, role_id, location_id');
		$this->db->from('staff');
		$this->db->where('username',$username);
		$this->db->where('password',md5($password));
		$this->db->limit(1);

		$query = $this->db->get();
		if($query->num_rows() >= 1){
			return $query->result();
		}
		else{
			return false;
		}
	}

	function get_role($username, $password){
		$this->db->select('role_id');
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$query = $this->db->get('staff');
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function get_roles(){
	}

	public function add_role(){
	}

	public function get_permissions(){
		$query = $this->db->get('locations');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_permission($permission_id){
		$this->db->where('permission_id', $permission_id);
		$query = $this->db->get('permissions');
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function add_permission(){
	}

	public function get_warehouses(){
		$query = $this->db->get('warehouse');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}
}