<?php
defined('BASEPATH') or die('Direct access not allowed');


/* ===== Documentation ===== 
Name: Sponsor
Role: Controller
Description: Controls access to Sponsor pages and functions in super admin panel
Model: Sponsor_model
Author: Sylvester Esso Nmakwe
Date Created: 6th June, 2021
*/



class Sponsor extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->admin_restricted(); //allow only logged in super admins to access this class
		$this->load->model('sponsor_model');
		$this->admin_details = $this->common_model->get_admin_details($this->session->admin_email);
	}




	/* ====== Sponsors ====== */
	public function index() {
		$total_records = $this->sponsor_model->count_all_sponsors();
		$inner_page_title = 'Sponsors (' . $total_records . ')'; 
		$this->admin_header('Sponsors', $inner_page_title);	
		$data['total_records'] = $this->sponsor_model->count_all_sponsors();
        $data['sponsors'] = $this->sponsor_model->get_all_sponsors();
		$this->load->view('admin/sponsors/all_sponsors', $data);
        $this->admin_footer();
	}
	
	

	public function add_new_sponsor_ajax() {	
		$this->form_validation->set_rules('name', 'Name', 'trim|min_length[2]|max_length[500]required');

		//config for file uploads
        $config['upload_path']          = 'assets/uploads/sponsors'; //path to save the files
        $config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';  //extensions which are allowed
        $config['max_size']             = 1024 * 4; //filesize cannot exceed 4MB
        $config['file_ext_tolower']     = TRUE; //force file extension to lower case
	    $config['remove_spaces']        = TRUE; //replace space in file names with underscores to avoid break
	    $config['detect_mime']          = TRUE; //detect type of file to avoid code injection
		
		$this->load->library('upload', $config);
		
		if ($this->form_validation->run())  {	
			
			if ( $_FILES['photo']['name'] == "" ) { //file is not selected
				echo 'No file selected.';
				
			} elseif ( ( ! $this->upload->do_upload('photo')) && ($_FILES['photo']['name'] != "") ) { 	
				echo validation_errors();
				
			} else { //file is selected, upload happens, everyone is happy
				$photo = $this->upload->data('file_name');
				//generate thumbnail of the image with dimension 500x500
				$photo_thumb = generate_image_thumb($photo, '400', '400');
				$this->sponsor_model->add_new_sponsor($photo, $photo_thumb);
				echo 1;	
			}
			
		}
    }

    public function test() {
    	print_p($_FILES);
    	echo "<hr>";
    	print_p($_POST);
    }

	public function edit_sponsor_action($sponsor_id) {
		$this->form_validation->set_rules('name', 'Name', 'trim|min_length[2]|max_length[500]|required');

		//config for file uploads
        $config['upload_path']          = 'assets/uploads/sponsors'; //path to save the files
        $config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';  //extensions which are allowed
        $config['max_size']             = 1024 * 4; //filesize cannot exceed 4MB
        $config['file_ext_tolower']     = TRUE; //force file extension to lower case
	    $config['remove_spaces']        = TRUE; //replace space in file names with underscores to avoid break
	    $config['detect_mime']          = TRUE; //detect type of file to avoid code injection
		
		$this->load->library('upload', $config);
		
		if ($this->form_validation->run())  {

			if($_FILES['photo']['name'] != "" ){

				//delete old photo and photo_thumb from server
				$this->sponsor_model->delete_sponsor_photo($sponsor_id);

				$this->upload->do_upload('photo');

				$photo = $this->upload->data('file_name');

				//generate thumbnail of the image with dimension 500x500
				$photo_thumb = generate_image_thumb($photo, '400', '400');

				$this->sponsor_model->edit_sponsor($sponsor_id, $photo, $photo_thumb);
				echo 1;			
				
			}else{

				$photo = false;
				$photo_thumb = false;

				$this->sponsor_model->edit_sponsor($sponsor_id, $photo, $photo_thumb);
				echo 1;	

			}

			







			
			// if ( $_FILES['photo']['name'] == "" ) { //file is not selected
			// 	echo 'No file selected.';
				
			// } elseif ( ( ! $this->upload->do_upload('photo')) && ($_FILES['photo']['name'] != "") ) { 	
			// 	echo validation_errors();
				
			// } else { //file is selected, upload happens, everyone is happy
			// 	//delete old photo and photo_thumb from server
			// 	$this->sponsor_model->delete_sponsor_photo($sponsor_id);
			// 	$photo = $this->upload->data('file_name');
			// 	//generate thumbnail of the image with dimension 500x500
			// 	$photo_thumb = generate_image_thumb($photo, '400', '400');
			// 	$this->sponsor_model->edit_sponsor($sponsor_id, $photo, $photo_thumb);
			// 	echo 1;	
			// }
			
		}
	}

	public function publish_sponsor($sponsor_id) { 
		$this->sponsor_model->publish_sponsor($sponsor_id);
		$this->session->set_flashdata('status_msg', 'Sponsor published successfully.');
		redirect($this->agent->referrer());
	}
	

	public function unpublish_sponsor($sponsor_id) { 
		//check photo exists
		$this->check_data_exists($sponsor_id, 'id', 'sponsors', 'sponsor');
		$this->sponsor_model->unpublish_sponsor($sponsor_id);
		$this->session->set_flashdata('status_msg', 'Sponsor Unpublished successfully.');
		redirect($this->agent->referrer());
	}

	
	public function delete_sponsor($sponsor_id) { 
		$this->sponsor_model->delete_sponsor($sponsor_id);
		$this->session->set_flashdata('status_msg', 'Sponsor deleted successfully.');
		redirect($this->agent->referrer());
	}
	
	
	public function bulk_actions_sponsors() { 
		$this->form_validation->set_rules('check_bulk_action', 'Bulk Select', 'trim');
		$selected_rows = count($this->input->post('check_bulk_action', TRUE)); 
		if ($this->form_validation->run()) {
			if ($selected_rows > 0) {
				$this->sponsor_model->bulk_actions_sponsors();
			} else {
				$this->session->set_flashdata('status_msg_error', 'No item selected.');
			}
		} else {
			$this->session->set_flashdata('status_msg_error', 'Bulk action failed!');
		}
		redirect($this->agent->referrer());
	}





}