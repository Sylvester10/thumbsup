<?php
defined('BASEPATH') or exit('Direct access to script not allowed');

/* ===== Documentation ===== 
Name: unit_model
Role: Model
Description: Controls the DB processes of units from super admin panel
Controller: unit
Author: Sylvester Nmakwe
Date Created: 6th June, 2021
*/


class Units_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}




	public function get_unit_details($id) {
		return $this->db->get_where('units', array('id' => $id))->row();
	}


	public function get_all_units() {
		$this->db->order_by("date_added","desc");
		return $this->db->get_where('units')->result();
	}

	public function get_all_unit_options() {
		$this->db->select("*");
		$this->db->where("type",'structure');
		$this->db->where('under','ADU');
		return $query = $this->db->get('org_structure')->result();
	}


    public function count_all_units() { 
		return $this->db->get_where('units')->num_rows();
	}


	public function count_published_units() { 
		return $this->db->get_where('units', array('published' => 'true'))->num_rows();
	}


	public function count_unpublished_units() { 
		return $this->db->get_where('units', array('published' => 'false'))->num_rows();
	}

	public function get_recent_published_units($limit) { //recent units for homepage
		$this->db->order_by('date', 'DESC');
		$this->db->limit($limit); 
		return $this->db->get_where('units', array('published' => 'true'))->result();
	}

	public function add_new_unit() {
		$name = ucwords($this->input->post('name', TRUE));
		$description = ucfirst($this->input->post('description', TRUE));
		$date_added = time();
		
		$data = array (
			'name' => $name,
			'description' => $description, 
			'date_added' => $date_added,  
		);
		return $this->db->insert('units', $data);
	}

	public function edit_unit($unit_id) {
		$name = ucwords($this->input->post('name', TRUE));
		$description = ucfirst($this->input->post('description', TRUE));
		$date_added = time();
		
		$data = array (
			'name' => $name,
			'description' => $description,  
			'date_added' => $date_added,
		);
		$this->db->where('id', $unit_id);
		return $this->db->update('units', $data);
	}


	public function publish_unit($unit_id) { 
		$data = array (
			'published' => 'true',
		);
		$this->db->where('id', $unit_id);
		return $this->db->update('units', $data);
	}


	public function unpublish_unit($unit_id) { 
		$data = array (
			'published' => 'false',
		);
		$this->db->where('id', $unit_id);
		return $this->db->update('units', $data);
	}


	public function delete_unit($unit_id)	{
		$this->db->delete('units', array('id' => $unit_id));
	}

	
	public function bulk_actions_units() {
		$selected_rows = count($this->input->post('check_bulk_action', TRUE)); 
		$bulk_action_type = $this->input->post('bulk_action_type', TRUE);		
		$row_id = $this->input->post('check_bulk_action', TRUE);
		$units = ($selected_rows == 1) ? 'unit' : 'units';
		foreach ($row_id as $unit_id) {
			switch ($bulk_action_type) {
				case 'publish':
					$this->publish_unit($unit_id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} {$units} published successfully.");
				break;
				case 'unpublish':
					$this->unpublish_unit($unit_id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} {$units} unpublished successfully.");
				break;
				case 'delete':
					$this->delete_unit($unit_id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} {$units} deleted successfully.");
				break;
			}
		} 
	}



}