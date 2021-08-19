<?php
defined('BASEPATH') or exit('Direct access to script not allowed');


class Profile_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}





   public function get_profile_by_rank() { //get all profile
		$this->db->order_by('date_added', 'DESC');
		return $this->db->get_where('profile')->result();
	}


	public function count_profiles() { //get all staff
		return $this->db->get_where('profile')->num_rows();
	}
	

	public function add_new_staff($photo, $photo_thumb) { 
		$title = ucwords($this->input->post('title', TRUE)); 
		$fullname = ucwords($this->input->post('fullname', TRUE)); 
		$email = strtolower($this->input->post('email', TRUE)); 
		$sex = $this->input->post('sex', TRUE); 
		$description = $this->input->post('description', TRUE);
		$organisation = $this->input->post('organisation', TRUE);
		$position_main = ucwords($this->input->post('position_main', TRUE));
		$position_other = implode(", ", $this->input->post('position_other', TRUE));
		$facebook = $this->input->post('facebook', TRUE);
		$twitter = $this->input->post('twitter', TRUE);
		$instagram = $this->input->post('instagram', TRUE);
		$linkedin = $this->input->post('linkedin', TRUE);
		$date_added = time();

        $hash_key = sha1($email); // generating hash_key
		
		$data = array (
			'title' => $title,
			'fullname' => $fullname,
			'hash_key' => $hash_key,
			'email' => $email,
			'sex' => $sex,
			'description' => $description,
			'organisation' => $organisation,
			'position_main' => $position_main,
			'position_other' => $position_other,
			'facebook' => $facebook,
			'twitter' => $twitter,
			'instagram' => $instagram,
			'linkedin' => $linkedin,
			'photo' => $photo,
			'photo_thumb' => $photo_thumb,
			'date_added' => $date_added,
		);
		$this->db->insert('profile', $data);
	}
	
	
	public function edit_profile($id, $photo, $photo_thumb) { 
		$title = ucwords($this->input->post('title', TRUE)); 
		$fullname = ucwords($this->input->post('fullname', TRUE)); 
		$email = strtolower($this->input->post('email', TRUE)); 
		$sex = $this->input->post('sex', TRUE); 
		$description = $this->input->post('description', TRUE);
		$organisation = $this->input->post('organisation', TRUE);
		$position_main = ucwords($this->input->post('position_main', TRUE));
		$position_other = implode(", ", $this->input->post('position_other', TRUE));
		$facebook = $this->input->post('facebook', TRUE);
		$twitter = $this->input->post('twitter', TRUE);
		$instagram = $this->input->post('instagram', TRUE);
		$linkedin = $this->input->post('linkedin', TRUE);
		$date_added = time();

        $hash_key = sha1($email); // generating hash_key
		
		$data = array (
			'title' => $title,
			'fullname' => $fullname,
			'hash_key' => $hash_key,
			'email' => $email,
			'sex' => $sex,
			'description' => $description,
			'organisation' => $organisation,
			'position_main' => $position_main,
			'position_other' => $position_other,
			'facebook' => $facebook,
			'twitter' => $twitter,
			'instagram' => $instagram,
			'linkedin' => $linkedin,
			'photo' => $photo,
			'photo_thumb' => $photo_thumb,
			'date_added' => $date_added,
		);
		$this->db->where('id', $id);
		return $this->db->update('profile', $data);
	}
	
		
	public function message_staff($staff_id) {
		$message = nl2br(ucfirst($this->input->post('message', TRUE))); 
		$subject = 'Message from Admin';
		$y = $this->common_model->get_staff_details_by_id($staff_id);
		return email_user($y->email, $subject, $message); //email staff
    } 
	
	
	public function delete_profile_photo($id) {
		$y = $this->common_model->get_profile_details_by_id($id);
		if ($y->photo != NULL && $y->photo_thumb != NULL) {
			unlink('./assets/uploads/photos/profile/'.$y->photo); //delete the photo
			unlink('./assets/uploads/photos/profile/'.$y->photo_thumb); //delete the thumbnail
		}
    } 
	
	
	public function delete_profile($id) {
		$y = $this->common_model->get_profile_details_by_id($id);
		$this->delete_profile_photo($id); //remove image files from server
		return $this->db->delete('profile', array('id' => $id));
    }


    public function bulk_actions_profile() {
		$selected_rows = count($this->input->post('check_bulk_action', TRUE)); 
		$bulk_action_type = $this->input->post('bulk_action_type', TRUE);		
		$row_id = $this->input->post('check_bulk_action', TRUE);
		foreach ($row_id as $id) {
			switch ($bulk_action_type) {
				case 'delete':
					$this->delete_profile($id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} profile(s) deleted successfully.");
				break;
			}
		} 
	}

	public function get_image($val){
		$val = trim($val);
		$this->db->select("*");
		$this->db->from('profile');
		$this->db->or_where("id",$val);
		$this->db->or_where("fullname",$val);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			$image = $query->result()[0]->photo;
		}else{
			$image = "user.png";
		}

		return $image;


	}


}