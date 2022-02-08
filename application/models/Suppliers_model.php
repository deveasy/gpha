<?php

class Suppliers_model extends CI_Model{

    public function get_suppliers(){
        $query = $this->db->get('suppliers');
        if($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function get_supplier($id){
        $this->db->where('supplier_id',$id);

        $query = $this->db->get('suppliers');
        if($query->num_rows() > 0){
            return $query->row();
        }
        else{
            return false;
        }
    }

    public function add_supplier(){
        $data = array(
            'company' => $this->input->post('company'),
            'lastname' => $this->input->post('lastname'),
            'dob' => $this->input->post('dob'),
            'shop_id' => $this->input->post('shop'),
            'address' => $this->input->post('address'),
            'gender' => $this->input->post('gender'),
            'nationality' => $this->input->post('nationality'),
            'city' => $this->input->post('city'),
            'mobile_phone' => $this->input->post('mobile_phone'),
            'username' => $this->input->post('username'),
            'role_id' => $this->input->post('role'),
            'password' => md5($this->input->post('password'))
        );
        $this->db->insert('supplier', $data);
    }

    public function get_shops(){
        $query = $this->db->get('shop');
        if($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function get_shop_staff($shop_id){
        $this->db->select('*');
        $this->db->from('staff');
        $this->db->where('shop_id',$shop_id);

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
        if($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function delete_supplier($staff_id){
        $this->db->where('staff_id',$staff_id);
        $this->db->delete('staff');
    }
}