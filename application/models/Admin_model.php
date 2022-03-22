<?php

class Admin_model extends CI_Model{

    public function get_suppliers(){
        $query = $this->db->get('suppliers');
        if($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function add_supplier(){
        $data = array(
            'supplier_name' => $this->input->post('supplier'),
            'contact_person' => $this->input->post('contact'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address')
        );
        $this->db->insert('supplier', $data);
    }

    public function delete_supplier($supplier_id){
        $this->db->where('supplier_id', $supplier_id);
        $this->db->delete('suppliers');
    }

    public function get_brands(){
        $query = $this->db->get('brands');
        if($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function add_brand(){
        $data = array(
            'brand_name' => $this->input->post('company'),
            'brand_description' => $this->input->post('lastname')
        );
        $this->db->insert('brands', $data);
    }

    public function delete_brand($brand_id){
        $this->db->where('brand_id', $brand_id);
        $this->db->delete('brands');
    }

    public function get_departments(){
        $query = $this->db->get('departments');
        if($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function add_department(){
        $data = array(
            'department_name' => $this->input->post('department'),
            'department_location' => $this->input->post('location')
        );
        $this->db->insert('departments', $data);
    }

    public function delete_department($department_id){
        $this->db->where('department_id', $department_id);
        $this->db->delete('departments');
    }

    public function get_models(){
        $query = $this->db->get('models');
        if($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function add_model(){
        $data = array(
            'brand' => $this->input->post('brand'),
            'model' => $this->input->post('model')
        );
        $this->db->insert('brands', $data);
    }

    public function delete_model($model_id){
        $this->db->where('model_id', $model_id);
        $this->db->delete('models');
    }
}