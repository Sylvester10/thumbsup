<?php
defined('BASEPATH') or exit('Direct access to script not allowed');


class Org_structure_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->admin_details = $this->common_model->get_admin_details($this->session->admin_email);
	}
	


	public function add_new_structure() { 
		$type = strtolower($this->input->post('type', TRUE)); 
		$amount = ucwords($this->input->post('amount', TRUE)); 
		$fullname = ucwords($this->input->post('fullname', TRUE)); 
		$abbr = strtoupper($this->input->post('abbr', TRUE)); 
		$under = strtoupper($this->input->post('under', TRUE)); 
		$rank = $this->input->post('rank', TRUE); 

		$get_address = $this->db->get_where('org_structure', array('abbr'=>$under))->result()[0]->address;
        $address = $get_address."/".$abbr;
        $date_added = time();

		$data = array (
			'type' => $type,
			'amount' => $amount,
			'fullname' => $fullname,
			'abbr' => $abbr,
			'under' => $under,
			'rank' => $rank,
			'address' => $address,
			'date_added' => $date_added
		);
		$this->db->insert('org_structure', $data);


	}
	
	

	
		
	public function structures(){

		$this->db->order_by('rank', 'DESC');
		return $this->db->get_where('org_structure', array('type'=>'structure'))->result();
	}
	
	
	public function delete_admin_photo($id) {
		$y = $this->common_model->get_admin_details_by_id($id);
		if ($y->photo != NULL && $y->photo_thumb != NULL) {
			unlink('./assets/uploads/photos/admins/'.$y->photo); //delete the photo
			unlink('./assets/uploads/photos/admins/'.$y->photo_thumb); //delete the thumbnail
		}
    } 
	
	
	public function delete($id) {
		$y = $this->common_model->get_admin_details_by_id($id);
		return $this->db->delete('org_structure', array('id' => $id));
    }



	public function check_admin_level($id) {
    	$y = $this->common_model->get_admin_details_by_id($id);
    	$admin_level = $y->level;
    	if ($admin_level != 1) { //fire on
			return TRUE;
		} else { //ooops! that's probably a bad idea...
			$this->session->set_flashdata('status_msg_error', 'You cannot delete a chief admin.');
			redirect($this->agent->referrer());
		}
    }  




}