<?php
defined('BASEPATH') or exit('Direct access to script not allowed');


class Volunteer_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->model('email_model');
	}





	public function get_volunteers() { 
		$this->db->order_by('date_added', 'ASC');
		return $this->db->get_where('volunteers')->result();
	}


	public function get_volunteer_details_by_id($id) { //get profile info by id
		return $this->db->get_where('volunteers', array('id' => $id))->row();
	}


	public function count_volunteers() { //get all staff
		return $this->db->get_where('volunteers')->num_rows();
	}
	

	public function add_volunteer() { 
		$name = ucwords($this->input->post('name', TRUE)); 
		$address = ucfirst($this->input->post('address', TRUE)); 
		$state = ucwords($this->input->post('state', TRUE));
		$residence = implode(", ", $this->input->post('residence', TRUE));
		$phone = $this->input->post('phone', TRUE);
		$email = strtolower($this->input->post('email', TRUE)); 
		$availability = $this->input->post('availability', TRUE);
		$qualification = implode(", ", $this->input->post('qualification', TRUE));
		$language = implode(", ", $this->input->post('language', TRUE));
		$f_name = ucfirst($this->input->post('f_name', TRUE));
		$m_name = ucfirst($this->input->post('m_name', TRUE));
		$l_name = ucfirst($this->input->post('l_name', TRUE));
		$r_phone = $this->input->post('r_phone', TRUE);
		$r_email = strtolower($this->input->post('r_email', TRUE)); 
		$place_of_employment = ucfirst($this->input->post('place_of_employment', TRUE));
		$position = ucfirst($this->input->post('position', TRUE));
		$office_phone = $this->input->post('office_phone', TRUE);
		$date_added = time();
		
		$data = array (
			'name' => $name,
			'address' => $address,
			'state' => $state,
			'residence' => $residence,
			'phone' => $phone,
			'email' => $email,
			'availability' => $availability,
			'qualification' => $qualification,
			'language' => $language,
			'f_name' => $f_name,
			'm_name' => $m_name,
			'l_name' => $l_name,
			'r_phone' => $r_phone,
			'r_email' => $r_email,
			'place_of_employment' => $place_of_employment,
			'position' => $position,
			'office_phone' => $office_phone,
			'date_added' => $date_added,
		);
		$this->db->insert('volunteers', $data);

		$data['name'] = $name;
		$message = $this->template->single_load('volunteer_mail.php', $data);
		$subject = 'Volunteer Registration';

		$status = $this->email_model->send_mail($email, $subject, $message);
	}
	
	
	
	
	public function delete_volunteer($id) {
		$y = $this->volunteer_model->get_volunteer_details_by_id($id);
		return $this->db->delete('volunteers', array('id' => $id));
    }


    public function bulk_actions_volunteer() {
		$selected_rows = count($this->input->post('check_bulk_action', TRUE)); 
		$bulk_action_type = $this->input->post('bulk_action_type', TRUE);		
		$row_id = $this->input->post('check_bulk_action', TRUE);
		foreach ($row_id as $id) {
			switch ($bulk_action_type) {
				case 'delete':
					$this->delete_volunteer($id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} Volunteer(s) deleted successfully.");
				break;
			}
		} 
	}



}