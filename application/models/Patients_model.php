<?php

class Patients_model extends CI_Model{

	//get last patient id to generat new id
	public function get_last_patient_id(){
		$this->db->select('patient_id');
		$query = $this->db->get('med_patients');

		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	//check if no patient exists in db
	public function no_patient(){
		$query = $this->db->get('med_patients');
		if($query->num_rows() == 0){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function get_patients(){
		$query = $this->db->get('med_patients');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_patient($patient_id){
		$this->db->where('patient_id', $patient_id);

		$query = $this->db->get('med_patients');
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			
			return false;
		}
	}

	public function add_new_patient(){
		$data = array(
			//'patient_id' => $this->input->post('patient_id'),
			'firstname' => $this->input->post('firstname'),
			'middlename' => $this->input->post('middlename'),
			'lastname' => $this->input->post('lastname'),
			'gender' => $this->input->post('gender'),
			'birthdate' => $this->input->post('birthdate'),
			'address1' => $this->input->post('address1'),
			'ghanapost' => $this->input->post('ghanapost'),
			'city_village' => $this->input->post('city_village'),
			'state_region' => $this->input->post('state_region'),
			'country' => $this->input->post('country'),
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'date_created' => date("Y-m-d")
		);
		$this->db->insert('med_patients', $data);
	}

	public function update_patient($patient_id){
	    $data = array();
	    $this->db->where('patient_id', $patient_id);
	    $this->db->update('med_patients', $data);
    }

	public function delete_patient($patient_id){
		$this->db->where('patient_id', $patient_id);
		$this->db->delete('med_patients');
	}

	public function get_patient_vitals($patient_id){
		$this->db->where('patient_id', $patient_id);

		$query = $this->db->get('med_patient_vitals');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function add_patient_vitals($patient_id){
        $data = array(
            'patient_id' => $patient_id,
            'height' => $this->input->post('height'),
            'weight' => $this->input->post('weight'),
            'bmi' => $this->input->post('bmi'),
            'temperature' => $this->input->post('temperature'),
            'pulse' => $this->input->post('pulse'),
            'respiratory_rate' => $this->input->post('respiratory_rate'),
            'blood_pressure' => $this->input->post('blood_pressure'),
            'blood_oxygen_satur' => $this->input->post('blood_oxygen'),
            'date_recorded' => date("Y-m-d"),
        );
        $this->db->insert('med_patient_vitals', $data);
	}

	public function delete_patient_vitals($patient_id){
		$this->db->where('patient_id', $patient_id);
		$this->db->delete('med_patient_vitals');
	}

	public function get_patient_relations($patient_id){
		$this->db->where('patient_id', $patient_id);
		$query = $this->db->get('med_patient_relatives');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_patient_relation($patient_id){
		$this->db->where('patient_id', $patient_id);

		$query = $this->db->get('med_patient_relatives');
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function add_patient_relation(){
		$data = array(
			'patient_id' => $this->input->post('patient_id'),
			'relation' => $this->input->post('relation'),
			'name' => $this->input->post('relation_name')
		);
		$this->db->insert('med_patient_relatives', $data);
	}

	public function delete_patient_relation($patient_id){
		$this->db->where('patient_id', $patient_id);
		$this->db->delete('med_patient_relatives');
	}

	public function add_patient_appointment($patient_id){
	    $data = array(
            'patient_id' => $patient_id,
            'appointment_date' => $this->input->post('appointment_date'),
            'reason' => $this->input->post('reason'),
            'note' => $this->input->post('note')
        );
	    $this->db->insert('med_patient_appointments', $data);
    }

	public function get_patient_appointments(){
		$this->db->join('med_patients','med_patients.patient_id = med_patient_appointments.patient_id');
		$query = $this->db->get('med_patient_appointments');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_patient_appointment($appointment_id){
		$this->db->where('appointment_id', $appointment_id);
		$query = $this->db->get('med_patient_appointments');
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function delete_patient_appointment($patient_id){
		$this->db->where('patient_id', $patient_id);
		$this->db->delete('med_patient_appointments');
	}

    public function add_patient_allergy($patient_id){
        $data = array(
            'patient_id' => $patient_id,
            'allergy_type' => $this->input->post('allergy'),
            'allergy_desc' => $this->input->post('allergy_desc')
        );
        $this->db->insert('med_patient_allergies', $data);
    }

	public function get_patient_allergies($patient_id){
		$this->db->join('med_patients','med_patients.patient_id = med_patient_allergies.patient_id');
		$this->db->where('med_patient_allergies.patient_id', $patient_id);
		$query = $this->db->get('med_patient_allergies');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_patient_allergy($allergy_id){
	    $this->db->where('allergy_id', $allergy_id);
	    $query = $this->db->get('med_patient_allergies');
	    if($query->num_row() > 0){
	        return $query->row();
        }
        else{
	        return false;
        }
    }

	public function get_patient_relatives($patient_id){
		$this->db->join('med_patients','med_patients.patient_id = med_patient_relatives.patient_id');
		$this->db->where('patient_id', $patient_id);
		$query = $this->db->get('med_patient_relatives');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function add_patient_diagnosis($patient_id){
	    $data = array(
            'patient_id' => $patient_id,
            'short_desc' => $this->input->post('short_desc'),
            'long_desc' => $this->input->post('long_desc')
        );
	    $this->db->insert('med_patient_diagnoses', $data);
    }

	public function get_patient_diagnoses($patient_id){
		$this->db->where('patient_id', $patient_id);
		$query = $this->db->get('med_patient_diagnoses');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_patient_diagnosis($patient_id){
		$this->db->where('patient_id', $patient_id);
		$query = $this->db->get('med_patient_diagnoses');
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function add_patient_observation($patient_id){
        $data = array(
            'patient_id' => $patient_id,
            'observation' => $this->input->post('observation'),
            'remark' => $this->input->post('remark')
        );
        $this->db->insert('med_patient_observations', $data);
    }

	public function get_patient_observations($patient_id){
		$this->db->where('patient_id', $patient_id);
		$query = $this->db->get('med_patient_observations');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function add_patient_condition($patient_id){
        $data = array(
            'patient_id' => $patient_id,
            'patient_condition' => $this->input->post('patient_condition'),
            'remark' => $this->input->post('remark')
        );
        $this->db->insert('med_patient_conditions', $data);
    }

	public function get_patient_conditions($patient_id){
		$this->db->where('patient_id', $patient_id);
		$query = $this->db->get('med_patient_conditions');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_last_prescription_id(){
		$this->db->select('prescription_id');
		$query = $this->db->get('med_patient_prescriptions');
		if($query->num_rows() > 0){
			return $query->last_row();
		}
		else{
			return false;
		}
	}

	public function get_prescriptions($patient_id){
		$this->db->where('patient_id', $patient_id);
	    $query = $this->db->get('med_patient_prescriptions');
	    if($query->num_rows() > 0){
	        return $query->result();
        }
        else{
	        return false;
        }
    }

    public function add_prescription($patient_id, $prescription_id){
    	$data = array(
    		'prescription_id' => $prescription_id,
    		'patient_id' => $patient_id,
    		'prescription_date' => date("Y-m-d"),
    		'prescribed_by' => $_SESSION['logged_in']['staff_id'],
    	);

    	$this->db->insert('med_patient_prescriptions', $data);
    }

    public function add_prescription_details($patient_id, $prescription_id){
    	$post_count = sizeof($this->input->post())/2;

		for($i = 1; $i < $post_count; $i++){
			$data = array(
				'prescription_id' => $prescription_id,
				'patient_id' => $patient_id,
				'medicine' => $this->input->post($i),
				'dosage' => $this->input->post('dosage'.$i)
			);
			$this->db->insert('med_patient_prescription_details', $data);
		}
    }

    public function get_prescription($prescription_id){
	    $this->db->where('prescription_id', $prescription_id);
	    $query = $this->db->get('med_patient_prescriptions');
	    if($query->num_rows() > 0){
	        return $query->row();
        }
        else{
	        return false;
        }
    }

    public function get_prescription_details($prescription_id){
        $this->db->join('med_patient_prescriptions','med_patient_prescriptions.prescription_id = med_patient_prescription_details.prescription_id');
        $this->db->where('med_patient_prescription_details.prescription_id', $prescription_id);
        $query = $this->db->get('med_patient_prescription_details');
        if($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function add_patient_visit($patient_id){
        $data = array(
            'patient_id' => $patient_id
        );
        $this->db->insert('med_patient_visits', $data);
    }

    public function get_patient_visits($patient_id){
        $this->db->where('patient_id', $patient_id);
        $query = $this->db->get('med_patient_visits');
        if($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function get_patient_visit($visit_id){
        $this->db->where('visit_id', $visit_id);
        $query = $this->db->get('med_patient_visits');
        if($query->num_rows() > 0){
            return $query->row();
        }
        else{
            return false;
        }
    }

    public function add_presenting_complaint($patient_id){
    	$data = array(
    		'patient_id'=>$patient_id,
    		'presenting_complaint'=>$this->input->post('presenting_complaint')
    	);
    	$this->db->insert('med_presenting_complaint', $data);
    }

    public function get_presenting_complaint($patient_id){
    	$this->db->where('patient_id', $patient_id);
    	$query = $this->db->get('med_presenting_complaint');
    	if($query->num_rows() > 0){
    		return $query->row();
    	}
    	else{
    		return false;
    	}
    }

    public function get_medicines(){
    	$this->db->select('product_code, product_name');
    	$query = $this->db->get('products');
    	if($query -> num_rows() > 0){
    		return $query->result();
    	}
    	else{
    		return false;
    	}
    }

    public function add_lab_test($patient_id){
    	$data = array(
    		'patient_id' => $patient_id,
    		'test' => $this->input->post('lab-test'),
    		'result' => $this->input->post('lab-result'),
    		'date_tested' => date("Y-m-d")
    	);
    	$this->db->insert('med_lab_tests', $data);
    }

    public function get_lab_tests($patient_id){
    	$this->db->where('patient_id', $patient_id);
    	$query = $this->db->get('med_lab_tests');
    	if($query->num_rows() > 0){
    		return $query->result();
    	}
    	else{
    		return false;
    	}
    }
}