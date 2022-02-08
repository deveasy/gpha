<?php

class Issues_model extends CI_Model{
	
	public function get_issues(){
		$query = $this->db->get('issues');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function warehouse_issues($warehouse_id){
	    $this->db->where('warehouse_id', $warehouse_id);
	    $query = $this->db->get('warehouse_inventory');
	    if($query->num_rows() > 0){
	        return $query->result();
        }
        else{
	        return false;
        }
    }

    //to be used for transfer issues in warehouse
    public function get_location_issues($location_id){
	    $this->db->join('issues','location_inventory.issue_code = issues.issue_code');
        $this->db->where('location_id', $location_id);
        $query = $this->db->get('location_inventory');
        if($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function add_issue_to_warehouse($warehouse_id, $issue_code){
	    $data = array(
	        'issue_code' => $issue_code,
            'warehouse_id' => $warehouse_id
        );
	    $this->db->insert('warehouse_inventory', $data);
    }

    public function add_issue_to_location($location_id, $issue_code, $price){
        $data = array(
            'issue_code' => $issue_code,
            'location_id' => $location_id,
            'unit_price' => $price,
            'quantity_in_stock' => 0
        );
        $this->db->insert('location_inventory', $data);
    }

    //check if the issue exists in the warehouse
    public function check_issue($issue_code, $warehouse_id){
        $this->db->where('issue_code', $issue_code);
        $this->db->where('warehouse_id', $warehouse_id);
        $query = $this->db->get('warehouse_inventory');
        if($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function check_location_issue($issue_code, $location_id){
        $this->db->where('issue_code', $issue_code);
        $this->db->where('location_id', $location_id);
        $query = $this->db->get('location_inventory');
        if($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

	public function get_issue($id){
		$this->db->select('*');
		$this->db->from('issues');
		$this->db->where('issue_code',$id);

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

	public function get_warehouses(){
		$this->db->where('location_type', 'warehouse');
		$query = $this->db->get('locations');
		if($query->num_rows() >0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_warehouse_inventory(){
		$this->db->join('issues','warehouse_inventory.issue_code = issues.issue_code');
		$this->db->order_by('issue_name','asc');

		$query = $this->db->get('warehouse_inventory');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_location_inventory($location_id){
		$this->db->select('issue_name, location_inventory.selling_price, location_inventory.cost_price, quantity_in_stock');
		$this->db->join('issues','location_inventory.issue_code = issues.issue_code');
		$this->db->where('location_id',$location_id);

		$query = $this->db->get('location_inventory');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function reset_location_inventory($location_id){
		$data = array(
			'quantity_in_stock' => 0
		);
		$this->db->where('location_id', $location_id);
		$this->db->update('location_inventory', $data);
	}

	public function reset_warehouse_inventory($warehouse_id){
	    $this->db->where('warehouse_id', $warehouse_id);
	    $this->db->update('warehouse_inventory', array('current_level' => 0));
    }

    public function reset_warehouse_issue_level($issue_code, $warehouse_id){
	    $this->db->where('issue_code', $issue_code);
	    $this->db->where('warehouse_id', $warehouse_id);
	    $this->db->update('warehouse_inventory', array('current_level' => 0));
    }

    public function all_transfers(){
    	return $this->db->get('transfers')->result();
    }

	public function add_issue_transfer($id, $staff_id){
		$date = date('Y-m-d');
		$data = array(
			'transfer_id' => $id,
			'source' => $this->input->post('source'),
			'destination' => $this->input->post('destination'),
			'dispatcher' => $this->input->post('dispatcher'),
			'vehicle_number' => strtoupper($this->input->post('vehicle-number')),
			'transfer_date' => $date,
            'staff_id' => $staff_id
		);
		$this->db->insert('transfers', $data);
	}

	public function add_transfer_details($transfer_id){
		$post_items = $this->input->post();
		$data = array();

		//get quantity and issue code post items for jquery generated forms
		foreach($post_items as $key=>$value){
			if($key == 'source' || $key == 'destination' || $key == 'address'){
				continue;
			}
			else{
				$data = array(
					'transfer_id' => $transfer_id,
					'issue_code' => $key,
					'quantity' => $value
				);
			}
			$this->db->insert('issue_transfer_details', $data);
		}
	}

	//reduce issue quantities when the transfer is done
	public function reduce_issue_quantities($transfer_id, $warehouse_id){
		$transfered_items = $this->get_transfer_details($transfer_id);

		foreach($transfered_items as $item){
			$this->db->set('current_level','current_level - ' . $item->quantity, false);
			$this->db->where('issue_code', $item->issue_code);
			$this->db->where('warehouse_id', $warehouse_id);
			$this->db->update('warehouse_inventory');
		}
	}

	public function reduce_warehouse_issue_quantities($transfer_id, $warehouse_id){
        $transfered_items = $this->get_warehouse_transfer_details($transfer_id, $warehouse_id);

        foreach($transfered_items as $item){
            $this->db->set('current_level','current_level - ' . $item->quantity, false);
            $this->db->where('issue_code', $item->issue_code);
            $this->db->where('warehouse_id', $warehouse_id);
            $this->db->update('warehouse_inventory');
        }
    }

	// check if there are no transfers in the issue
	// transfers table
	public function no_transfer(){
		$query = $this->db->count_all('transfers');
		
		if($query == 0){
			return true;
		}
		else{
			return false;
		}
	}

	//get the last transfer id to generate new transfer id
	public function last_transfer_id(){
		$this->db->select('transfer_id');
		$this->db->order_by('transfer_id', 'desc');
		$this->db->limit(1);

		return $query = $this->db->get('transfers')->row();
	}

	public function get_all_transfers($source_id){
		if(substr($source_id, 0, 1) == 'W'){
			$this->db->select('transfer_id, transfer_date, warehouse_name, location_name, destination');
			$this->db->join('warehouse','transfers.source = warehouse.warehouse_id');
			$this->db->join('locations','transfers.destination = locations.location_id');
		}
		else{
			$this->db->select('transfer_id, transfer_date, location_name, destination');
			$this->db->join('locations','transfers.destination = locations.location_id');
		}
		$this->db->where('source', $source_id);
		$this->db->order_by('transfer_id','desc');
		$query = $this->db->get('transfers');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_transfer($transfer_id){
		$this->db->select('transfer_date, location_name, destination, dispatcher, vehicle_number');
		$this->db->join('locations','transfers.destination = locations.location_id');
		$this->db->where('transfer_id',$transfer_id);

		$query = $this->db->get('transfers');
		if($query->num_rows > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function get_transfer_details($transfer_id, $destination){
		$this->db->select('issue_transfer_details.id, issue_transfer_details.issue_code, issue_transfer_details.quantity, location_inventory.unit_price, issues.issue_name');
		$this->db->from('issue_transfer_details');
		$this->db->join('location_inventory','issue_transfer_details.issue_code = location_inventory.issue_code');
		$this->db->join('issues','issue_transfer_details.issue_code = issues.issue_code');
		$this->db->where('transfer_id', $transfer_id);
		$this->db->where('location_id', $destination);

		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	//function to be used in the reduce warehouse quantities
	public function get_warehouse_transfer_details($transfer_id, $warehouse_id){
        $this->db->select('issue_transfer_details.issue_code, issue_transfer_details.quantity, issues.issue_name');
        $this->db->from('issue_transfer_details');
        $this->db->join('warehouse_inventory','issue_transfer_details.issue_code = warehouse_inventory.issue_code');
        $this->db->join('issues','issue_transfer_details.issue_code = issues.issue_code');
        $this->db->where('transfer_id', $transfer_id);
        $this->db->where('warehouse_id', $warehouse_id);

        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    //delete transfer from transfer table and child tables
    public function delete_transfer($transfer_id){
	    $tables = array('transfers','issue_transfer_details');
	    $this->db->where('transfer_id', $transfer_id);
	    $this->db->delete($tables);
    }

    function get_transfer_details_to_increase($transfer_id){
        $this->db->where('transfer_id', $transfer_id);
        return $this->db->get('issue_transfer_details')->result();
    }

    public function increase_warehouse_issue_quantities_before_delete($transfer_id){
        $items = $this->get_transfer_details_to_increase($transfer_id);

        foreach($items as $item){
            $this->db->set('current_level','current_level + ' . $item->quantity, false);
            $this->db->where('issue_code', $item->issue_code);
            $this->db->update('warehouse_inventory');
        }
    }

    //delete transfer detail from table
    public function delete_transfer_detail($id){
        $this->db->where('id', $id);
        $this->db->delete('issue_transfer_details');
    }

    function get_transfer_item($id){
        $this->db->where('id',$id);
        return $this->db->get('issue_transfer_details')->row();
    }

    //increase the issue quantity after deleting item
    public function increase_warehouse_issue_quantity_before_delete($id){
        $item = $this->get_transfer_item($id);

        $this->db->set('current_level','current_level + ' . $item->quantity, false);
        $this->db->where('issue_code', $item->issue_code);
        $this->db->update('warehouse_inventory');
    }

	public function add_restock($id, $staff_id){
		$date = date('Y-m-d');

		$data = array(
			'restock_id' => $id,
			'warehouse_id' => $this->input->post('warehouse'),
			'waybill_code' => $this->input->post('waybill_code'),
			'supplier_name' => $this->input->post('supplier_name'),
			'staff_id' => $staff_id,
			'date_received' => $date
		);
		$this->db->insert('warehouse_restock', $data);
	}

	public function add_restock_details($id){
		$post_items = $this->input->post();
		$data = array();

		//get issue code and quantity post items for jquery generated form
		foreach($post_items as $key=>$value){
			if($key == 'waybill_code' || $key == 'warehouse' || $key == 'supplier_name'){
				continue;
			}
			else{
				$data = array(
					'restock_id' => $id,
					'issue_code' => $key,
					'quantity_received' => $value
				);
			}
			$this->db->insert('warehouse_restock_details', $data);
		}
	}

	public function last_restock_id(){
		$this->db->select('restock_id');
		$this->db->order_by('restock_id', 'desc');
		$this->db->limit(1);

		return $query = $this->db->get('warehouse_restock')->row();
	}

	public function no_restock(){
		$query = $this->db->count_all('warehouse_restock');
		if($query == 0){
			return true;
		}
		else{
			return false;
		}
	}

	//increase the issue quantities when the restock is done
	public function increase_issue_quantity($id){
		$received_items = $this->get_restock_details($id);

		foreach($received_items as $item){
			$this->db->set('current_level','current_level + '.$item->quantity_received, false);
			$this->db->where('issue_code', $item->issue_code);
			$this->db->update('warehouse_inventory');
		}
	}

	public function get_all_restock(){
		$this->db->join('warehouse','warehouse_restock.warehouse_id = warehouse.warehouse_id');
		$query = $this->db->get('warehouse_restock');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_restock($restock_id){
		$this->db->join('warehouse','warehouse_restock.warehouse_id = warehouse.warehouse_id');
		$this->db->join('staff','warehouse_restock.staff_id = staff.staff_id');
		$this->db->where('restock_id', $restock_id);

		$query = $this->db->get('warehouse_restock');
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function get_restock_details($restock_id){
		$this->db->select('warehouse_restock_details.id, warehouse_restock_details.issue_code, warehouse_restock_details.quantity_received, issues.issue_name');
		$this->db->from('warehouse_restock_details');
		$this->db->join('issues','warehouse_restock_details.issue_code = issues.issue_code');
		$this->db->where('restock_id', $restock_id);

		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	function delete_restock($restock_id){
	    $tables = array('warehouse_restock', 'warehouse_restock_details');
	    $this->db->where('restock_id', $restock_id);
	    $this->db->delete($tables);
    }

    function delete_restock_detail($id){
	    $this->db->where('id', $id);
	    $this->db->delete('warehouse_restock_details');
    }

	function update_location_stock_levels($transfer_id, $destination){
		$details = $this->get_transfer_details($transfer_id, $destination);

		foreach($details as $detail){
			$this->db->set('quantity_in_stock', 'quantity_in_stock +' . $detail->quantity, false);
			$this->db->where('issue_code', $detail->issue_code);
			$this->db->where('location_id', $destination);
			$this->db->update('location_inventory');
		}
	}

	//for warehouse stock update to update the current issue level
	function update_issue_level($warehouse_id, $issue_code){
		$qty = $this->input->post($issue_code.'qty');

		$this->db->set('current_level', 'current_level + '.$qty, false);
		$this->db->where('issue_code', $issue_code);
		$this->db->where('warehouse_id', $warehouse_id);
		$this->db->update('warehouse_inventory');
	}

	function last_warehouse_order_id(){
		$this->db->select('order_id');
		$this->db->order_by('order_id','desc');
		$this->db->limit(1);

		return $this->db->get('warehouse_orders')->row();
	}

	function no_warehouse_order(){
		$query = $this->db->get('warehouse_orders');
		if($query->num_rows() == 0){
			return true;
		}
		else{
			return false;
		}
	}

	function add_warehouse_order($order_id, $staff_id){
		$data = array(
			'order_id' => $order_id,
			'order_total' => '',
			'receipt_number' => $this->input->post('receipt_number'),
			'warehouse_id' => $this->input->post('source'),
			'staff_id' => $staff_id,
			'customer_name' => $this->input->post('customer_name'),
			'dispatcher' => $this->input->post('dispatcher'),
			'vehicle_number' => $this->input->post('vehicle_number'),
			'destination' => $this->input->post('destination')
		);
		$this->db->insert('warehouse_orders', $data);
	}

	//add hidden form details from the warehouse order page
	function add_warehouse_order_details($order_id){
		$post_items = $this->input->post();
		$data = array();

		//get issue code and quantity post items for jquery generated form
		foreach($post_items as $key=>$value){
			if($key == 'source' || $key == 'receipt_number' || $key == 'customer_name' || $key == 'dispatcher' || $key == 'vehicle_number' || $key == 'destination'){
				continue;
			}
			else{
				$data = array(
					'order_id' => $order_id,
					'issue_code' => $key,
					'quantity' => $value
				);
			}
			$this->db->insert('warehouse_order_details', $data);
		}
	}

	function get_warehouse_order_details($order_id){
		$this->db->select('warehouse_order_details.id, warehouse_order_details.issue_code, warehouse_order_details.unit_price, warehouse_order_details.extended_price, warehouse_order_details.quantity, issues.issue_name');
		$this->db->from('warehouse_order_details');
		$this->db->join('warehouse_inventory','warehouse_order_details.issue_code = warehouse_inventory.issue_code');
		$this->db->join('issues','warehouse_order_details.issue_code = issues.issue_code');
		$this->db->where('order_id', $order_id);

		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	//reduce the issue levels after placing the order above
	function reduce_warehouse_issue_levels($order_id, $warehouse_id){
		$details = $this->get_warehouse_order_details($order_id, $warehouse_id);

		foreach($details as $detail){
			$this->db->set('current_level','current_level - '.$detail->quantity, false);
			$this->db->where('issue_code', $detail->issue_code);
			$this->db->where('warehouse_id', $warehouse_id);
			$this->db->update('warehouse_inventory');
		}
	}

	function get_all_warehouse_orders($warehouse_id){
		$this->db->where('warehouse_id', $warehouse_id);
		$query = $this->db->get('warehouse_orders');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	function get_warehouse_order($order_id){
        $this->db->join('staff','warehouse_orders.staff_id = staff.staff_id','inner');
	    $this->db->where('order_id', $order_id);
	    $query = $this->db->get('warehouse_orders');
	    if($query->num_rows() > 0){
	        return $query->row();
        }
        else{
	        return false;
        }
	}

	function delete_warehouse_order($order_id){
	    $tables = array('warehouse_orders', 'warehouse_order_details');
	    $this->db->where('order_id', $order_id);
	    $this->db->delete($tables);
    }

    function get_order_detail($id){
	    $this->db->where('id', $id);
	    return $this->db->get('warehouse_order_details')->row();
    }

    function increase_issue_quantity_before_order_item_delete($id, $warehouse){
	    $item = $this->get_order_detail($id);

	    $this->db->set('current_level','current_level + '.$item->quantity, false);
	    $this->db->where('issue_code', $item->issue_code);
	    $this->db->where('warehouse_id', $warehouse);
	    $this->db->update('warehouse_inventory');
    }

    function delete_warehouse_order_detail($id){
	    $this->db->where('id', $id);
	    $this->db->delete('warehouse_order_details');
    }

    function get_warehouse_order_details_for_delete($order_id){
        $this->db->where('order_id', $order_id);
        return $this->db->get('warehouse_order_details')->result();
    }
    function increase_issue_quantities_before_order_delete($order_id, $warehouse){
        $items = $this->get_warehouse_order_details_for_delete($order_id);

        foreach($items as $item){
            $this->db->set('current_level', 'current_level + '.$item->quantity, false);
            $this->db->where('issue_code', $item->issue_code);
            $this->db->where('warehouse_id', $warehouse);
            $this->db->update('warehouse_inventory');
        }
    }
}