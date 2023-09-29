<?php
defined('BASEPATH') or die('Direct access not allowed');


/* ===== Documentation ===== 
Name: Testimonial
Role: Controller
Description: Controls access to testimonial pages and functions in super admin panel
Model: Testimonial_model
Author: Sylvester Esso Nmakwe
Date Created: 6th June, 2021
*/



class Testimonial extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->admin_restricted(); //allow only logged in super admins to access this class
		$this->load->model('testimonial_model');
		$this->admin_details = $this->common_model->get_admin_details($this->session->admin_email);
	}




	/* ====== Contact testimonials ====== */
	public function index() {
		$total_records = $this->testimonial_model->count_all_testimonials();
		$inner_page_title = 'Testimonials (' . $total_records . ')'; 
		$this->admin_header('Testimonials', $inner_page_title);	
		$data['total_records'] = $this->testimonial_model->count_all_testimonials();
        $data['testimony'] = $this->testimonial_model->get_all_testimonials();
		$this->load->view('admin/testimonials/all_testimonials', $data);
        $this->admin_footer();
	}
	
	

	public function add_new_testimonial_ajax() {	
		$this->form_validation->set_rules('name', 'Name', 'trim|min_length[2]|max_length[500]required');
		$this->form_validation->set_rules('position', 'Position', 'trim|required');
		$this->form_validation->set_rules('testimony', 'Testimony', 'trim|required');

		//config for file uploads
        $config['upload_path']          = 'assets/uploads/testimonials'; //path to save the files
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
				$this->testimonial_model->add_new_testimonial($photo, $photo_thumb);
				echo 1;	
			}
			
		}
    }

    public function test() {
    	print_p($_FILES);
    	echo "<hr>";
    	print_p($_POST);
    }

	public function edit_testimonial_action($testimonial_id) {
		$this->form_validation->set_rules('name', 'Name', 'trim|min_length[2]|max_length[500]|required');
		$this->form_validation->set_rules('position', 'Position', 'trim|required');
		$this->form_validation->set_rules('testimony', 'Testimony', 'trim|required');

		//config for file uploads
        $config['upload_path']          = 'assets/uploads/testimonials'; //path to save the files
        $config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';  //extensions which are allowed
        $config['max_size']             = 1024 * 4; //filesize cannot exceed 4MB
        $config['file_ext_tolower']     = TRUE; //force file extension to lower case
	    $config['remove_spaces']        = TRUE; //replace space in file names with underscores to avoid break
	    $config['detect_mime']          = TRUE; //detect type of file to avoid code injection
		
		$this->load->library('upload', $config);
		
		if ($this->form_validation->run())  {

			if($_FILES['photo']['name'] != "" ){

				//delete old photo and photo_thumb from server
				$this->testimonial_model->delete_testimonial_photo($testimonial_id);

				$this->upload->do_upload('photo');

				$photo = $this->upload->data('file_name');

				//generate thumbnail of the image with dimension 500x500
				$photo_thumb = generate_image_thumb($photo, '400', '400');

				$this->testimonial_model->edit_testimonial($testimonial_id, $photo, $photo_thumb);
				echo 1;			
				
			}else{

				$photo = false;
				$photo_thumb = false;

				$this->testimonial_model->edit_testimonial($testimonial_id, $photo, $photo_thumb);
				echo 1;	

			}

			







			
			// if ( $_FILES['photo']['name'] == "" ) { //file is not selected
			// 	echo 'No file selected.';
				
			// } elseif ( ( ! $this->upload->do_upload('photo')) && ($_FILES['photo']['name'] != "") ) { 	
			// 	echo validation_errors();
				
			// } else { //file is selected, upload happens, everyone is happy
			// 	//delete old photo and photo_thumb from server
			// 	$this->testimonial_model->delete_testimonial_photo($testimonial_id);
			// 	$photo = $this->upload->data('file_name');
			// 	//generate thumbnail of the image with dimension 500x500
			// 	$photo_thumb = generate_image_thumb($photo, '400', '400');
			// 	$this->testimonial_model->edit_testimonial($testimonial_id, $photo, $photo_thumb);
			// 	echo 1;	
			// }
			
		}
	}

	public function publish_testimonial($testimonial_id) { 
		$this->testimonial_model->publish_testimonial($testimonial_id);
		$this->session->set_flashdata('status_msg', 'Testimonial published successfully.');
		redirect($this->agent->referrer());
	}
	

	public function unpublish_testimonial($testimonial_id) { 
		//check photo exists
		$this->check_data_exists($testimonial_id, 'id', 'testimonials', 'testimonial');
		$this->testimonial_model->unpublish_testimonial($testimonial_id);
		$this->session->set_flashdata('status_msg', 'Testimonial Unpublished successfully.');
		redirect($this->agent->referrer());
	}

	
	public function delete_testimonial($testimonial_id) { 
		$this->testimonial_model->delete_testimonial($testimonial_id);
		$this->session->set_flashdata('status_msg', 'Testimonial deleted successfully.');
		redirect($this->agent->referrer());
	}
	
	
	public function bulk_actions_testimonials() { 
		$this->form_validation->set_rules('check_bulk_action', 'Bulk Select', 'trim');
		$selected_rows = count($this->input->post('check_bulk_action', TRUE)); 
		if ($this->form_validation->run()) {
			if ($selected_rows > 0) {
				$this->testimonial_model->bulk_actions_testimonials();
			} else {
				$this->session->set_flashdata('status_msg_error', 'No item selected.');
			}
		} else {
			$this->session->set_flashdata('status_msg_error', 'Bulk action failed!');
		}
		redirect($this->agent->referrer());
	}





}