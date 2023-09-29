<?php
defined('BASEPATH') or die('Direct access not allowed');



class Profiles extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->admin_restricted(); //allow only logged in users to access this class
		//$this->admin_role_restricted('User Manager'); //only admin with this role can access this module
		$this->load->model('profile_model');
		$this->load->model('org_structures');
		$this->admin_details = $this->common_model->get_admin_details($this->session->email);
	}



	/* ========== All Staff ========== */
	public function index() {
		$inner_page_title = 'Profiles (' . count($this->common_model->get_profile()) . ')'; 
		$this->admin_header('Admin', $inner_page_title);
		$data['profiles'] = $this->common_model->get_profile();
		$this->load->view('admin/profile/all_profiles', $data);
        $this->admin_footer();
	}


	/* ========== New Profile ========== */
	public function new_profile($error = array('error' => '')) {
		$this->admin_header('Admin', 'Add Profile');
		$this->load->view('admin/profile/new_profile', $error);
        $this->admin_footer();
	}
	
	
	public function new_profile_action($error = array('error' => '')) { 

		try{
				// validation rules
				$this->form_validation->set_rules('title', 'Title', 'trim');
				$this->form_validation->set_rules('fullname', 'Last Name', 'required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[profile.email]', 
					array('is_unique' => 'This email address is already registered exists.')
				);
				$this->form_validation->set_rules('sex', 'Sex', 'required');
				$this->form_validation->set_rules('description', 'Description', 'trim|min_length[2]|max_length[500]');
				$this->form_validation->set_rules('organisation', 'Organisation', 'required');
				$this->form_validation->set_rules('position_main', 'Main Position');
				$this->form_validation->set_rules('position_other[]', 'Other Positions');
				$this->form_validation->set_rules('facebook', 'Facebook', 'required');
				$this->form_validation->set_rules('twitter', 'Twitter', 'required');
				$this->form_validation->set_rules('instagram', 'Instagram', 'required');
				$this->form_validation->set_rules('linkedin', 'Linkedin', 'required');
				
			
							
				
				//checking form validation firts and throwing errors back to the user
				if (!$this->form_validation->run())  {
					throw new Exception(validation_errors(), 1);
				}



				// doing the upload if and only if an image was provided
				if ( $_FILES['photo']['name'] != ""  and $_POST['fullname'] != ""){
					//geting the file extention
					$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
					$image_name = image_name($_POST['fullname'],$ext);

					//config for file uploads
			        $config['upload_path']          = './assets/uploads/photos/profile'; //path to save the files
			        $config['allowed_types']        = 'jpg|JPG|jpeg|JPEG';  //extensions which are allowed
			        $config['max_size']             = 2048; //filesize cannot exceed 2MB
			        $config['file_ext_tolower']     = TRUE; //force file extension to lower case
				    $config['remove_spaces']        = TRUE; //replace space in file names with underscores to avoid break
				    $config['detect_mime']          = TRUE; //detect type of file to avoid code injection
				    $config['file_name']          	= $image_name;

				    $this->load->library('upload', $config);

						    // display errors regarding the upload
						    if(!$this->upload->do_upload('photo')){
						    	throw new Exception($this->upload->display_errors(), 1);
						    }else{
						    	// if no errors uploading the image, insert the data into the database
						    	//generate a square-sized 100x100 photo_thumb
								$photo = $this->upload->data('file_name');
								$photo_thumb = generate_image_thumb($photo, '400', '400');
								$this->profile_model->add_new_staff($photo, $photo_thumb); //insert the data into db

								echo 1;
						    }
				}else{
				//	throw new Exception("Photo not selected!", 1);	
					$this->profile_model->add_new_staff('user.png', 'user.png');
				}



		}catch(Exception $e)
            {
                echo $e->getMessage();
            } 
	}







	/* ========== Staff Edit ========== */
	public function edit_profile($id, $error = array('error' => '')) {
		//check staff exists
		$this->check_data_exists($id, 'id', 'profile', 'admin');
		$profile_details = $this->common_model->get_profile_details_by_id($id);
		$page_title = 'Edit Profile: '  . $profile_details->fullname;
		$this->admin_header('Admin', $page_title);
		$data['y'] = $this->common_model->get_profile_details_by_id($id);
		$data['upload_error'] = $error;
		$this->load->view('admin/profile/edit_profile', $data);
        $this->admin_footer();
	}


	public function edit_profile_action($id, $error = array('error' => '')) {
		try{
				//check staff exists
				$this->check_data_exists($id, 'id', 'profile', 'admin');

				// validation rules
				$this->form_validation->set_rules('title', 'Title', 'trim');
				$this->form_validation->set_rules('fullname', 'Last Name', 'required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('sex', 'Sex', 'required');
				$this->form_validation->set_rules('description', 'Description', 'trim|min_length[2]|max_length[500]');
				$this->form_validation->set_rules('organisation', 'Organisation');
				$this->form_validation->set_rules('position_main', 'Position (Main)');
				$this->form_validation->set_rules('position_other[]', 'Position (Other)');
				$this->form_validation->set_rules('facebook', 'Facebook', 'required');
				$this->form_validation->set_rules('twitter', 'Twitter', 'required');
				$this->form_validation->set_rules('instagram', 'Instagram', 'required');
				$this->form_validation->set_rules('linkedin', 'Linkedin', 'required');


				$valid_ext = ["jpg","jpeg"];// allowed images extenstions

				
				$y = $this->common_model->get_profile_details_by_id($id);


				//checking form validation firts and throwing errors back to the user
				if (!$this->form_validation->run())  {
					throw new Exception(validation_errors(), 1);
				}



				if ( $_FILES['photo']['name'] != ""){

					$ext = get_extension($_FILES['photo']['name']);
					$size = bytes_KB($_FILES['photo']['size']);


					if(!in_array($ext,$valid_ext)){
						throw new Exception("Invalid FileType, please provide photo with .jpg or .jpeg", 1);
					}

					if($size > 2048 ){
						throw new Exception("Photo size is more than the accepted size (2MB)", 1);						
					}

					$this->profile_model->delete_profile_photo($id);// deleting previous profile photo

					$image_name = create_filename($_POST['fullname'],$ext); // getting the image name

					//config for file uploads
			        $config['upload_path']          = './assets/uploads/photos/profile'; //path to save the files
			        $config['allowed_types']        = 'jpg|JPG|jpeg|JPEG';  //extensions which are allowed
			        $config['max_size']             = 2048; //filesize cannot exceed 2MB
			        $config['file_ext_tolower']     = TRUE; //force file extension to lower case
				    $config['remove_spaces']        = TRUE; //replace space in file names with underscores to avoid break
				    $config['detect_mime']          = TRUE; //detect type of file to avoid code injection
				    $config['file_name']          	= $image_name;

				    $this->load->library('upload', $config);

						    // display errors regarding the upload
						    if(!$this->upload->do_upload('photo')){
						    	throw new Exception($this->upload->display_errors(), 1);
						    }else{
						    	// if no errors uploading the image,
						    	//generate a square-sized 100x100 photo_thumb
								$photo = $this->upload->data('file_name');
								$photo_thumb = generate_image_thumb($photo, '400', '400');
						    }

				}



				if(!isset($photo)){
					$photo = $y->photo;
					$photo_thumb = $y->photo_thumb;
				}

				$this->profile_model->edit_profile($id, $photo, $photo_thumb);

				echo 1;




		}catch(Exception $e)
            {
                echo $e->getMessage();
            } 


	}
	
	
	
	
	/* ========== View Profile ========== */
	public function view_profile($id) {
		//check staff exists
		$this->check_data_exists($id, 'id', 'profile', 'admin');
		$profile_details = $this->common_model->get_profile_details_by_id($id);
		$page_title = 'Profile: '  . $profile_details->fullname;
		$this->admin_header('Admin', $page_title);
		$data['y'] = $profile_details;
		$this->load->view('admin/profile/view_profile', $data);
        $this->admin_footer();
	}
	
	
	
	public function message_staff($staff_id) { 
		//check admin exists
		$this->check_data_exists($staff_id, 'id', 'staff', 'admin');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');
		$y = $this->common_model->get_staff_details_by_id($staff_id);
		if ($this->form_validation->run())  {		
			$this->school_staff_model->message_staff($staff_id);
			$this->session->set_flashdata('status_msg', "Message successfully sent to {$y->name}.");
		} else {
			$this->session->set_flashdata('status_msg_error', 'Error sending message to staff.');
		}
		redirect($this->agent->referrer());
	}
	
	
	public function delete_profile($id) { 
		//check admin exists
		$this->check_data_exists($id, 'id', 'profile', 'admin');
		$this->profile_model->delete_profile($id);
		$this->session->set_flashdata('status_msg', 'Profile deleted successfully.');
		redirect($this->agent->referrer());
	}
	
	
	public function bulk_actions_profile() { 
		$this->form_validation->set_rules('check_bulk_action', 'Bulk Select', 'trim');
		$selected_rows = count($this->input->post('check_bulk_action', TRUE)); 
		if ($this->form_validation->run()) {
			if ($selected_rows > 0) {
				$this->profile_model->bulk_actions_profile();
			} else {
				$this->session->set_flashdata('status_msg_error', 'No item selected.');
			}
		} else {
			$this->session->set_flashdata('status_msg_error', 'Bulk action failed!');
		}
		redirect($this->agent->referrer());
	}

	

	
	
}