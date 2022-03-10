<?php

class Dashboard_model extends CI_Model{

	function __construct(){
		parent::__construct();

		date_default_timezone_set('GMT');
	}

	public function get_updates(){
		$query = $this->db->get('gpha_updates');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function add_update(){
		$data = array(
			'title' => $this->input->post('title'),
			'body' => $this->input->post('body'),
			'date_written' => date('Y-m-d')
		);
		$this->db->insert('gpha_updates', $data);
	}
}