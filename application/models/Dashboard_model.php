<?php

class Dashboard_model extends CI_Model{

	function __construct(){
		parent::__construct();

		date_default_timezone_set('GMT');
	}

	public function get_posts(){
		$this->db->limit(5);
		$query = $this->db->get('posts');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function add_post(){
		$data = array(
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content'),
			'date_written' => date('Y-m-d')
		);
		$this->db->insert('posts', $data);
	}

	public function get_post($post_id){
		$this->db->where('post_id', $post_id);
		$query = $this->db->get('posts');
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}
}