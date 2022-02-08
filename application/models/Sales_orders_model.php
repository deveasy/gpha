<?php

class Sales_orders_model extends CI_Model{
	
	public function get_sales_orders(){
		$query = $this->db->get('sales_orders');
		if($query->num_rows() > 1){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_all_sales(){
		$this->db->select('order_id, order_total, firstname, order_date');
		$this->db->from('sales_orders');
		$this->db->join('staff','sales_orders.staff_id = staff.staff_id','inner');

		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	function get_sales_by_date($order_date){
		$this->db->select('order_id, order_total, firstname, order_date');
		$this->db->join('staff','sales_orders.staff_id = staff.staff_id', 'inner');
		$this->db->where('order_date', $order_date);

		$query = $this->db->get('sales_orders');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	function get_sales_order($invoice_number){
		$this->db->join('staff','sales_orders.staff_id = staff.staff_id','inner');
		$this->db->where('order_id', $invoice_number);
		$query = $this->db->get('sales_orders');
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	function get_sales_order_details($invoice_number){
		$this->db->select('product_name, quantity, sales_order_details.unit_price, extended_price');
		$this->db->from('sales_order_details');
		$this->db->join('products','products.product_code = sales_order_details.product_code','inner');
		$this->db->where('order_id', $invoice_number);

		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}
}