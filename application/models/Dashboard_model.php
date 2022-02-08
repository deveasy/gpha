<?php

class Dashboard_model extends CI_Model{

	function __construct(){
		parent::__construct();

		date_default_timezone_set('GMT');
	}
	
	public function get_total_sales_orders(){
		$this->db->select_sum('order_total');

		$query = $this->db->get('sales_orders');
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function get_total_daily_sales_orders($date){
		$this->db->select_sum('order_total');
		$this->db->where('order_date', $date);

		$query = $this->db->get('sales_orders');
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function get_total_daily_products($date){
		$this->db->select_sum('quantity');
		$this->db->join('sales_order_details','sales_order_details.order_id = sales_orders.order_id');
		$this->db->where('order_date', $date);

		$query = $this->db->get('sales_orders');
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	//total products for all locations 
	//displayed in donut chart on the dashboard
	public function get_total_products_for_each_location($date){
		$this->db->select('location_name AS label', false);
		$this->db->select_sum('quantity','value');
		$this->db->join('sales_orders', 'sales_order_details.order_id = sales_orders.order_id');
		$this->db->join('locations', 'sales_orders.location_id = locations.location_id');
		$this->db->where('sales_orders.order_date', $date);
		$this->db->group_by('locations.location_id');

		$query = $this->db->get('sales_order_details');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	//total products for specific location to be displayed on the dashboard
	public function get_total_products_for_location($location_id){
		$date = date('Y-m-d');
		$this->db->select('location_name');
		$this->db->select_sum('quantity');
		$this->db->join('location_orders', 'location_orders.location_id = locations.location_id');
		$this->db->join('sales_order_details', 'sales_order_details.order_id = location_orders.order_id');
		$this->db->where('locations.location_id', $location_id);
		$this->db->where('location_orders.order_date', $date);

		$query = $this->db->get('locations');
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function get_total_location_orders($location_id){
		$date = date('Y-m-d');
		$this->db->select('locations.location_id, location_name');
		$this->db->select_sum('order_total');
		$this->db->from('sales_orders');
		$this->db->join('location_orders','sales_orders.order_id = location_orders.order_id','inner');
		$this->db->join('locations','locations.location_id = location_orders.location_id','inner');
		$this->db->where('locations.location_id', $location_id);
		$this->db->where('sales_orders.order_date', $date);

		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
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

	public function get_location($id){
		$this->db->select('*');
		$this->db->where('location_id',$id);
		$this->db->from('locations');

		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	//10 best selling products for a given day
	public function best_selling_products($date){
		$this->db->select('product_name');
		$this->db->select_sum('quantity','quantity');
		$this->db->join('products','products.product_code = sales_order_details.product_code','inner');
		$this->db->join('sales_orders','sales_orders.order_id = sales_order_details.order_id','inner');
		$this->db->where('sales_orders.order_date', $date);
		$this->db->group_by('sales_order_details.product_code');
		$this->db->order_by('quantity','desc');
		$this->db->limit(10);

		$query = $this->db->get('sales_order_details');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function location_best_selling_products($location_id, $date){
		$this->db->select('quantity, product_name');
		$this->db->join('products','products.product_code = sales_order_details.product_code','inner');
		$this->db->join('sales_orders','sales_orders.order_id = sales_order_details.order_id','inner');
		$this->db->where('sales_orders.order_date', $date);
		$this->db->order_by('quantity','desc');
		$this->db->limit(10);

		$query = $this->db->get('sales_order_details');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	function get_location_orders(){
		$query = $this->db->get('location_orders');
		if($query){
			return $query->result();
		}
	}
}