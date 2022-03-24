<?php

class Tickets_model extends CI_Model{
	
	public function get_tickets(){
		$query = $this->db->get('tickets');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function add_ticket(){
		$data = array(
			'problem_type' => $this->input->post('problemType'),
			'problem_description' => $this->input->post('problemDescription'),
			'reported_by' => $this->session->get_userdata('logged_in')->staff_id,
			'assigned_to' => $this->input->post('vehicle-number'),
			'report_date' => date('Y-m-d'),
            'status' => 'Pending'
		);
		$this->db->insert('tickets', $data);
    }

    public function get_ticket($ticket_id){
		$this->db->where('ticket_id', $ticket_id);
		$query = $this->db->get('tickets');

		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
    }

	public function delete_ticket($ticket_id){
		
	}

	public function get_departments(){
		$this->db->order_by('department_name','ASC');
		$query = $this->db->get('departments');
		return $query->result();
	}

}