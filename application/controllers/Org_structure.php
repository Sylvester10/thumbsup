<?php
defined('BASEPATH') or die('Direct access not allowed');



class Org_structure extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->admin_restricted(); //allow only logged in users to access this class
		//$this->admin_role_restricted('User Manager'); //only admin with this role can access this module
		$this->load->model('org_structure_model');
		$this->load->model('org_structures');
		$this->admin_details = $this->common_model->get_admin_details($this->session->email);
	}




	
	public function index() {
		$inner_page_title = 'Add Structure'; 
		$this->admin_header('Admin', $inner_page_title);
		$data['structures'] = $this->org_structure_model->structures();
		$this->load->view('admin/org_structure/add_structure', $data);
        $this->admin_footer();
	}
	

	
	public function all_structures() {
		$total = $this->org_structures->count_structures();
		$inner_page_title = 'All Structures (' . $total . ')'; 
		$this->admin_header('Admin', $inner_page_title);
		$data['structures'] = $this->org_structures->get_structures();
		$this->load->view('admin/org_structure/all_structures', $data);
        $this->admin_footer();
	}



	public function all_positions() {
		$total = $this->org_structures->count_positions();
		$inner_page_title = 'All Positions (' . $total . ')'; 
		$this->admin_header('Admin', $inner_page_title);
		$data['structures'] = $this->org_structures->get_positions();
		$this->load->view('admin/org_structure/all_structures', $data);
        $this->admin_footer();
	}



	public function add_structure_ajax() {	
		$this->form_validation->set_rules('type', 'Type', 'trim|required');
		$this->form_validation->set_rules('amount', 'Amount', 'trim');
		$this->form_validation->set_rules('fullname', 'Name', 'trim|required|is_unique[org_structure.fullname]', 
			array('is_unique' => 'Structure already exists')
		);		
		$this->form_validation->set_rules('abbr', 'Abbreviation', 'trim|required|is_unique[org_structure.abbr]', 
			array('is_unique' => 'Abbreviation already used')
		);		
		$this->form_validation->set_rules('under', 'Under', 'trim|required');
		$this->form_validation->set_rules('rank', 'Rank', 'trim|required');
		if ($this->form_validation->run())  {		
			//$this->org_structure_model->add_new_structure();
			
			$type = strtolower($this->input->post('type', TRUE)); 
			$amount = $this->input->post('amount', TRUE); 
			$fullname = ucwords($this->input->post('fullname', TRUE)); 
			$abbr = strtoupper($this->input->post('abbr', TRUE)); 
			$under = strtoupper($this->input->post('under', TRUE)); 
			$rank = $this->input->post('rank', TRUE); 
			


			$this->load->model('org_structures', 'org');
			if($type=="structure"){
			$add = $this->org->add_structure($fullname,$abbr,$under,$rank);
			}elseif($type=="position"){
				$add = $this->org->add_position($fullname,$abbr,$under,$rank,$amount);
			}else{
				$add=false;
			}

			if ($add) {
				$this->session->set_flashdata('status_msg', ucfirst($type).' added successfully');
				redirect(site_url('org_structure'));
			}elseif(!$add){
				$this->session->set_flashdata('status_msg_error', 'Something went wrong');
				redirect(site_url('org_structure'));
			}
			
		} else { 
			$this->session->set_flashdata('status_msg_error', validation_errors());
			redirect(site_url('org_structure'));
		}
    }


	public function edit_structure($id) {
		//check admin exists
		$this->check_data_exists($id, 'id', 'org_structure', 'admin');
		$y = $this->org_structures->get_details($id);
		$page_title = 'Edit: ' . $y->fullname; 
		$this->admin_header('Admin', $page_title);
		$data['y'] = $y;
		$this->load->view('admin/org_structure/edit_structure', $data);
        $this->admin_footer();
	}


	public function edit_position($id) {
		//check admin exists
		$this->check_data_exists($id, 'id', 'org_structure', 'admin');
		$y = $this->org_structures->get_details($id);
		$page_title = 'Edit: ' . $y->fullname; 
		$this->admin_header('Admin', $page_title);
		$data['y'] = $y;
		$this->load->view('admin/org_structure/edit_position', $data);
        $this->admin_footer();
	}



	public function edit_ajax($id) {	
		//check admin exists
		$this->check_data_exists($id, 'id', 'org_structure', 'admin');
		$this->form_validation->set_rules('type', 'Type', 'trim|required');
		$this->form_validation->set_rules('amount', 'Amount', 'trim');
		$this->form_validation->set_rules('fullname', 'Name', 'trim|required|is_unique[org_structure.fullname]', 
			array('is_unique' => 'Structure already exists')
		);		
		$this->form_validation->set_rules('abbr', 'Abbreviation', 'trim|required|is_unique[org_structure.abbr]', 
			array('is_unique' => 'Abbreviation already used')
		);		
		$this->form_validation->set_rules('under', 'Under', 'trim|required');
		$this->form_validation->set_rules('rank', 'Rank', 'trim|required');
		if ($this->form_validation->run())  {		
			//$this->org_structure_model->add_new_structure();
			
			$type = strtolower($this->input->post('type', TRUE)); 
			$amount = $this->input->post('amount', TRUE); 
			$fullname = ucwords($this->input->post('fullname', TRUE)); 
			$abbr = strtoupper($this->input->post('abbr', TRUE)); 
			$under = strtoupper($this->input->post('under', TRUE)); 
			$rank = $this->input->post('rank', TRUE); 
			


			$this->load->model('org_structures', 'org');
			if($type=="structure"){
			$add = $this->org->add_structure($fullname,$abbr,$under,$rank);
			}elseif($type=="position"){
				$add = $this->org->add_position($fullname,$abbr,$under,$rank,$amount);
			}else{
				$add=false;
			}

			if ($add) {
				$this->session->set_flashdata('status_msg', ucfirst($type).' added successfully');
				redirect(site_url('org_structure'));
			}elseif(!$add){
				$this->session->set_flashdata('status_msg_error', 'Something went wrong');
				redirect(site_url('org_structure'));
			}
			
		} else { 
			$this->session->set_flashdata('status_msg_error', validation_errors());
			redirect(site_url('org_structure'));
		}
    }


    public function message_admin($id) { 
		//check admin exists
		$this->check_data_exists($id, 'id', 'admins', 'admin');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');
		$y = $this->common_model->get_admin_details_by_id($id);
		if ($this->form_validation->run())  {		
			$this->admin_users_model->message_admin($id);
			$this->session->set_flashdata('status_msg', "Message successfully sent to {$y->name}.");
		} else {
			$this->session->set_flashdata('status_msg_error', 'Error sending message to admin.');
		}
		redirect($this->agent->referrer());
	}






	public function delete($id) { 
		//check admin exists
		$this->check_data_exists($id, 'id', 'org_structure', 'admin');
		//$this->admin_users_model->check_admin_level($id);
		$this->org_structures->delete($id);
		$this->session->set_flashdata('status_msg', 'Structure deleted successfully.');
		redirect($this->agent->referrer());
	}
	

    public function delete_bulk_admins() { 
		$this->form_validation->set_rules('check_bulk_action', 'Bulk Select', 'trim');
		$selected_rows = count($this->input->post('check_bulk_action', TRUE)); 
		if ($this->form_validation->run()) {
			if ($selected_rows > 0) {
				$this->admin_users_model->delete_bulk_admins();
			} else {
				$this->session->set_flashdata('status_msg_error', 'No item selected.');
			}
		} else {
			$this->session->set_flashdata('status_msg_error', 'Bulk action failed!');
		}
		redirect($this->agent->referrer());
	}
	public function test() {
		$this->load->model("org_structures","org");
			$type = ""; 
			$amount = "100"; 
			$fullname = "Tet"; 
			$abbr = "TET"; 
			$under = "BOT"; 
			$rank = 50; 

		var_dump($this->org->add_position($fullname,$abbr,$under,$rank,$amount));
	}



}
