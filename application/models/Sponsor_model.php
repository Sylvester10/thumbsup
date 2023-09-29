<?php
defined('BASEPATH') or exit('Direct access to script not allowed');

/* ===== Documentation ===== 
Name: Sponsor_model
Role: Model
Description: Controls the DB processes of Sponsors from super admin panel
Controller: Sponsor
Author: Sylvester Nmakwe
Date Created: 6th June, 2021
*/


class Sponsor_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}




	public function get_sponsor_details($id) {
		return $this->db->get_where('sponsors', array('id' => $id))->row();
	}


	public function get_all_sponsors() {
		$this->db->order_by('date_added','DESC');
		return $this->db->get_where('sponsors')->result();
	}


    public function count_all_sponsors() { 
		return $this->db->get_where('sponsors')->num_rows();
	}


	public function count_published_sponsors() { 
		return $this->db->get_where('sponsors', array('published' => 'true'))->num_rows();
	}


	public function count_unpublished_sponsors() { 
		return $this->db->get_where('sponsors', array('published' => 'false'))->num_rows();
	}

	public function get_recent_published_sponsors($limit) { //recent sponsors for homepage
		$this->db->order_by('date_added', 'DESC');
		$this->db->limit($limit); 
		return $this->db->get_where('sponsors', array('published' => 'true'))->result();
	}

	public function add_new_sponsor($photo, $photo_thumb) {
		$name = ucwords($this->input->post('name', TRUE));
		$date_added = time();
		
		$data = array (
			'name' => $name,
			'photo' => $photo,
			'photo_thumb' => $photo_thumb, 
			'date_added' => $date_added,
		);
		return $this->db->insert('sponsors', $data);
	}

	public function edit_sponsor($sponsor_id, $photo, $photo_thumb) {
		$name = ucwords($this->input->post('name', TRUE));
		$date_added = time();

		if($photo){

			$data = array (
			'name' => $name,
			'photo' => $photo,
			'photo_thumb' => $photo_thumb, 
			'date_added' => $date_added,
			);
				$this->db->where('id', $sponsor_id);
				return $this->db->update('sponsors', $data);

		}else{

			$data = array (
			'name' => $name,
			'date_added' => $date_added,
			);
				$this->db->where('id', $sponsor_id);
				return $this->db->update('sponsors', $data);

		}


		
		
	}


	public function publish_sponsor($sponsor_id) { 
		$data = array (
			'published' => 'true',
		);
		$this->db->where('id', $sponsor_id);
		return $this->db->update('sponsors', $data);
	}


	public function unpublish_sponsor($sponsor_id) { 
		$data = array (
			'published' => 'false',
		);
		$this->db->where('id', $sponsor_id);
		return $this->db->update('sponsors', $data);
	}


	public function delete_sponsor_photo($sponsor_id) {
		$y = $this->get_sponsor_details($sponsor_id);
		if ($y->photo != NULL && $y->photo_thumb != NULL) {
			unlink('./assets/uploads/sponsors/'.$y->photo); //delete the photo
			unlink('./assets/uploads/sponsors/'.$y->photo_thumb); //delete the thumbnail
		}
    } 


	public function delete_sponsor($sponsor_id)	{
		$y = $this->get_sponsor_details($id);
		$this->delete_sponsor_photo($id); //remove image files from server
		$this->db->delete('sponsors', array('id' => $sponsor_id));
	}

	
	public function bulk_actions_sponsors() {
		$selected_rows = count($this->input->post('check_bulk_action', TRUE)); 
		$bulk_action_type = $this->input->post('bulk_action_type', TRUE);		
		$row_id = $this->input->post('check_bulk_action', TRUE);
		$sponsors = ($selected_rows == 1) ? 'sponsor' : 'sponsors';
		foreach ($row_id as $sponsor_id) {
			switch ($bulk_action_type) {
				case 'publish':
					$this->publish_sponsor($sponsor_id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} {$sponsors} published successfully.");
				break;
				case 'unpublish':
					$this->unpublish_sponsor($sponsor_id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} {$sponsors} unpublished successfully.");
				break;
				case 'delete':
					$this->delete_sponsor($sponsor_id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} {$sponsors} deleted successfully.");
				break;
			}
		} 
	}



}