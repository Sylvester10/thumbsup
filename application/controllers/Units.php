<?php
defined('BASEPATH') or die('Direct access not allowed');


/* ===== Documentation ===== 
Name: unit
Role: Controller
Description: Controls access to units pages and functions in super admin panel
Model: unit_model
Author: Sylvester Esso Nmakwe
Date Created: 6th June, 2021
*/



class Units extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->admin_restricted(); //allow only logged in super admins to access this class
		$this->load->model('units_model');
		$this->admin_details = $this->common_model->get_admin_details($this->session->admin_email);
	}




	/* ====== Contact units ====== */
	public function index() {
		$total_records = $this->units_model->count_all_units();
		$inner_page_title = 'Units (' . $total_records . ')'; 
		$this->admin_header('Units', $inner_page_title);	
		$data['total_records'] = $this->units_model->count_all_units();
        $data['units'] = $this->units_model->get_all_units();
        $data['unit_options'] = $this->units_model->get_all_unit_options();
		$this->load->view('admin/units/all_units', $data);
        $this->admin_footer();
	}
	
	

	public function add_new_unit_ajax() {	
		$this->form_validation->set_rules('name', 'Name', 'trim|is_unique[units.name]|required', 
			array('is_unique' => 'This Unit is already exists.')
		);
		$this->form_validation->set_rules('description', 'Description', 'required');
		if ($this->form_validation->run())  {		
			$this->units_model->add_new_unit();
			echo 1;	
		} else { 
			echo validation_errors();
		}
    }

	public function edit_unit_action($unit_id) {
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run())  {		
			$this->units_model->edit_unit($unit_id);
			$this->session->set_flashdata('status_msg', "Unit Updated successfully.");
			echo 1;	
		} else { 
			echo validation_errors();
		}
	}

	public function publish_unit($unit_id) { 
		$this->units_model->publish_unit($unit_id);
		$this->session->set_flashdata('status_msg', 'Unit published successfully.');
		redirect($this->agent->referrer());
	}
	

	public function unpublish_unit($unit_id) { 
		//check photo exists
		$this->check_data_exists($unit_id, 'id', 'units', 'admin');
		$this->units_model->unpublish_unit($unit_id);
		$this->session->set_flashdata('status_msg', 'Unit Unpublished successfully.');
		redirect($this->agent->referrer());
	}
	
	public function delete_unit($unit_id) { 
		$this->units_model->delete_unit($unit_id);
		$this->session->set_flashdata('status_msg', 'Unit deleted successfully.');
		redirect($this->agent->referrer());
	}
	
	
	public function bulk_actions_units() { 
		$this->form_validation->set_rules('check_bulk_action', 'Bulk Select', 'trim');
		$selected_rows = count($this->input->post('check_bulk_action', TRUE)); 
		if ($this->form_validation->run()) {
			if ($selected_rows > 0) {
				$this->units_model->bulk_actions_units();
			} else {
				$this->session->set_flashdata('status_msg_error', 'No item selected.');
			}
		} else {
			$this->session->set_flashdata('status_msg_error', 'Bulk action failed!');
		}
		redirect($this->agent->referrer());
	}







	public function generate_edit_unit_form($id){

		$unit = $this->units_model->get_unit_details($id);

		$data['id'] = $unit->id;
		$data['name'] = $unit->name;
		$data['description'] = $unit->description;
		$data['action'] = base_url("units/edit_unit_action/".$unit->id);

		echo $this->template->single_load('edit_unit_form.php',$data);

	}


































}