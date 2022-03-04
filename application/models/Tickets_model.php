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
			'problem_type' => $this->input->post('problem-type'),
			'problem_description' => $this->input->post('problem-description'),
			'reported_by' => $this->input->post('vehicle-number'),
			'assigned_to' => $this->input->post('vehicle-number'),
			'report_date' => date('Y-m-d'),
            'status' => 'staff_id'
		);
		$this->db->insert('tickets', $data);
    }

    //to be used for transfer issues in warehouse
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

}