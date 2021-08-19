<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Volunteers extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('volunteer_model');
		$this->admin_details = $this->common_model->get_admin_details($this->session->email);
	}





	public function index() {
		$inner_page_title = 'Volunteers (' . count($this->volunteer_model->get_volunteers()) . ')'; 
		$this->admin_header('Admin', $inner_page_title);
		$data['volunteers'] = $this->volunteer_model->get_volunteers();
		$this->load->view('admin/volunteers/all_volunteers', $data);
        $this->admin_footer();
	}

	public function view_volunteer($id) {
		//check staff exists
		$this->check_data_exists($id, 'id', 'volunteers', 'admin');
		$volunteer_details = $this->volunteer_model->get_volunteer_details_by_id($id);
		$page_title = 'Volunteer: '  . $volunteer_details->name;
		$this->admin_header('Admin', $page_title);
		$data['y'] = $volunteer_details;
		$this->load->view('admin/volunteers/view_volunteer', $data);
        $this->admin_footer();
	}


	public function delete_volunteer($id) { 
		//check admin exists
		$this->check_data_exists($id, 'id', 'volunteers', 'admin');
		$this->volunteer_model->delete_volunteer($id);
		$this->session->set_flashdata('status_msg', 'Volunteer deleted successfully.');
		redirect($this->agent->referrer());
	}
	
	
	public function bulk_actions_volunteer() { 
		$this->form_validation->set_rules('check_bulk_action', 'Bulk Select', 'trim');
		$selected_rows = count($this->input->post('check_bulk_action', TRUE)); 
		if ($this->form_validation->run()) {
			if ($selected_rows > 0) {
				$this->volunteer_model->bulk_actions_volunteer();
			} else {
				$this->session->set_flashdata('status_msg_error', 'No item selected.');
			}
		} else {
			$this->session->set_flashdata('status_msg_error', 'Bulk action failed!');
		}
		redirect($this->agent->referrer());
	}



}