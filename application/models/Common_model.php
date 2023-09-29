<?php
defined('BASEPATH') or exit('Direct access to script not allowed');


class Common_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}



	/* ===== Last Login ===== */
	public function update_last_login($user_id, $table) {
		$data = array (
			'last_login' => date('Y-m-d H:i:s'), //curent timestamp	 
		);		 
        $this->db->where('id', $user_id);			
		return $this->db->update($table, $data);
	}


	public function get_last_login_stats($period, $period_type, $table) {
		$period_type = strtoupper($period_type);
		$where = 	"last_login IS NOT NULL AND 
					last_login > DATE_SUB(CURRENT_TIMESTAMP, INTERVAL {$period} {$period_type})";
	    $this->db->where($where);
		$query = $this->db->get($table)->num_rows();
		return $query;	
	}
	



	
	/* =================== Admins ====================== */
	public function get_admin_details($email) { //get admin info by email
		return $this->db->get_where('admins', array('email' => $email))->row();
	}
	
	
	public function get_admin_details_by_id($id) { //get admin info	id
		return $this->db->get_where('admins', array('id' => $id))->row();
	}
	
	
	public function get_admins() { //get all admins
		return $this->db->get_where('admins')->result();
	}


	/* =================== Admins ====================== */
	public function get_staff_details($email) { //get admin info by email
		return $this->db->get_where('admins', array('email' => $email))->row();
	}
	
	
	public function get_staff_details_by_id($id) { //get admin info	id
		return $this->db->get_where('admins', array('id' => $id))->row();
	}
	
	
	public function get_staff() { //get all admins
		return $this->db->get_where('admins')->result();
	}


	/* =================== profile ====================== */
	public function get_profile_details($email) { //get profile info by email
		return $this->db->get_where('profile', array('email' => $email))->row();
	}
	
	
	public function get_profile_details_by_id($id) { //get profile info by id
		return $this->db->get_where('profile', array('id' => $id))->row();
	}
	
	
	public function get_profile() { //get all profile
		$this->db->order_by('date_added', 'DESC');
		return $this->db->get_where('profile')->result();
	}

	public function get_profiles($limit) { //get all profile
		$this->db->order_by('date_added', 'DESC');
		$this->db->limit($limit);  
		return $this->db->get_where('profile')->result();
	}

	public function get_user_profiles($limit = ""){
		$this->db->select("profile.fullname, profile.position_main, profile.description, profile.facebook, profile.instagram, profile.twitter, profile.linkedin, profile.photo, profile.email, profile.title");
		$this->db->from("profile");

		if ($limit != "") {		

			$this->db->limit($limit); 

		};

		$this->db->join("org_structure", "org_structure.fullname = profile.position_main");
		$this->db->where("organisation", "Yes");
		$this->db->order_by("org_structure.rank", "DESC");
        $query = $this->db->get();

        return $query->result();
	}

	public function get_activated_profile() { //get all profile
		return $this->db->get_where('profile', array('active' => 'true'))->result();
	}

	public function get_sponsors() { //get all profile
		$this->db->order_by('date_added', 'DESC');
		return $this->db->get_where('sponsors')->result();
	}
	
}