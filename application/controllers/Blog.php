<?php
defined('BASEPATH') or die('Direct access not allowed');


class Blog extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->admin_restricted(); //allow only logged in users to access this class
		//$this->admin_role_restricted('blog Manager'); //only admin with this role can access this module
		$this->load->model('blog_model');
		$this->admin_details = $this->common_model->get_admin_details($this->session->email);
	}



	/* ====== blog ====== */
	public function blog_articles() {
		$inner_page_title = 'Blog (' . $this->blog_model->count_blog() . ')';
		$this->admin_header('Admin', $inner_page_title);
		//config for pagination
        $config = array();
		$per_page = 5;  //number of items to be displayed per page
        $uri_segment = 3;  //pagination segment id
		$config["base_url"] = base_url('blog/blog_articles');
        $config["total_rows"] = $this->blog_model->count_blog();
        $config["per_page"] = $per_page;
		$config["uri_segment"] = $uri_segment;
		$config['cur_tag_open'] = '<a class="pagination-active-page" href="#!">';	//disable click event of current link
        $config['cur_tag_close'] = '</a>';
        $config['first_link'] = 'First';
        $config['next_link'] = '&raquo;';	// >>
        $config['prev_link'] = '&laquo;';	// <<
		$config['last_link'] = 'Last';
		$config['display_pages'] = TRUE; //show pagination link digits
		$config['num_links'] = 3; //number of digit links
        $this->pagination->initialize($config);
		$page = $this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 0;
		$data["blog"] = $this->blog_model->get_blog($config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links); //explode the links 1 2 3 4 into distinct items for styling.
		$data['total_records'] = $this->blog_model->count_blog();
		$data['total_published'] = $this->blog_model->count_published_blog();
		$data['total_unpublished'] = $this->blog_model->count_unpublished_blog();
		$this->load->view('admin/publications/blog/blog_articles', $data);
		$this->admin_footer();
	}
	
	
	public function single_blog($post_id, $slug) {
		//check blog exists
		$this->check_data_exists($post_id, 'id', 'blog', 'blog/blog_articles');
		$this->check_data_exists($slug, 'slug', 'blog', 'blog/blog_articles');
		$blog_details = $this->blog_model->get_blog_details($post_id);
		$total_comments = $this->blog_model->count_post_comments($post_id);
		$title = $blog_details->title;
		$this->admin_header($title, $title);

		//config for comment pagination
        $config = array();
		$per_page = 2;  //number of items to be displayed per page
        $uri_segment = 5;  //pagination segment id
		$config["base_url"] = base_url('blog/single_blog/'.$post_id.'/'.$slug);
        $config["total_rows"] = $total_comments;
        $config["per_page"] = $per_page;
		$config["uri_segment"] = $uri_segment;
		$config['cur_tag_open'] = '<a class="pagination-active-page" href="#!">';	//disable click event of current link
        $config['cur_tag_close'] = '</a>';
        $config['first_link'] = 'First';
        $config['next_link'] = '&raquo;';	// >>
        $config['prev_link'] = '&laquo;';	// <<
		$config['last_link'] = 'Last';
		$config['display_pages'] = TRUE; //show pagination link digits
		$config['num_links'] = 3; //number of digit links

		//initize config using the pagination library
        $this->pagination->initialize($config);

		$page = $this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 0;
		$data["comments"] = $this->blog_model->get_comments_by_post_id($post_id, $per_page, $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links); //explode the links 1 2 3 4 into distinct items for styling.
		$data['total_comments'] = $total_comments;
		$data['y'] = $blog_details;
		$data['post_id'] = $post_id;
		$this->load->view('admin/publications/blog/single_blog', $data);
		$this->admin_footer();
	}
	
	
	public function create_blog($error = array('error' => '')) { 
		$this->admin_header('Admin', 'Add blog');
		$this->load->view('admin/publications/blog/create_blog', $error);
		$this->admin_footer();
	}
	
	
	public function create_blog_action() {	
		$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[120]');
		$this->form_validation->set_rules('body', 'Body', 'trim|required');
        
		//config for file uploads
        $config['upload_path']          = './assets/uploads/blog'; //path to save the files
        $config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';  //extensions which are allowed
        $config['max_size']             = 1024 * 2; //filesize cannot exceed 2MB
        $config['file_ext_tolower']     = TRUE; //force file extension to lower case
	    $config['remove_spaces']        = TRUE; //replace space in file names with underscores to avoid break
	    $config['detect_mime']          = TRUE; //detect type of file to avoid code injection
		
		$this->load->library('upload', $config);
		
		if ($this->form_validation->run())  {	
			
			if ( $_FILES['featured_image']['name'] == "" ) { //file is not selected
				$this->session->set_flashdata('status_msg_error', 'No file selected.');
				redirect(site_url('blog/create_blog'));
				
			} elseif ( ( ! $this->upload->do_upload('featured_image')) && ($_FILES['featured_image']['name'] != "") ) { 	
				//upload does not happen when file is selected
				$error = array('error' => $this->upload->display_errors());
				$this->create_blog($error); //reload page with upload errors
				
			} else { //file is selected, upload happens, everyone is happy
				$featured_image = $this->upload->data('file_name');
				//generate thumbnail of the image with dimension 85x75
				$thumbnail = generate_image_thumb($featured_image, '85', '75');		
				$this->blog_model->create_blog($featured_image, $thumbnail);
				$this->session->set_flashdata('status_msg', 'blog article created and published successfully.');
				redirect(site_url('blog/blog_articles')); 
			}
			
		} else { 
			$this->create_blog(); //validation fails, reload page with validation errors
		}
    }
	
	
	public function edit_blog($post_id, $error = array('error' => '')) { 
		//check blog exists
		$this->check_data_exists($post_id, 'id', 'blog', 'blog/blog_articles');
		$this->admin_header('Admin', 'Edit blog');
		$data['y'] = $this->blog_model->get_blog_details($post_id);	
		$data['upload_error'] = $error;
		$this->load->view('admin/publications/blog/edit_blog', $data);
		$this->admin_footer();
	}
	
	
	public function edit_blog_action($post_id, $error = array('error' => '')) {	
		//check blog exists
		$this->check_data_exists($post_id, 'id', 'blog', 'blog/blog_articles');
		$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[120]');
		$this->form_validation->set_rules('body', 'Body', 'trim|required');
        
		//config for file uploads
        $config['upload_path']          = './assets/uploads/blog'; //path to save the files
        $config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';  //extensions which are allowed
        $config['max_size']             = 1024 * 2; //filesize cannot exceed 2MB
        $config['file_ext_tolower']     = TRUE; //force file extension to lower case
	    $config['remove_spaces']        = TRUE; //replace space in file names with underscores to avoid break
	    $config['detect_mime']          = TRUE; //detect type of file to avoid code injection
		
		$this->load->library('upload', $config);
		
		$y = $this->blog_model->get_blog_details($post_id);	
		if ($this->form_validation->run())  {	
			
			if ( $_FILES['featured_image']['name'] == "" ) { //file is not selected
			
				$featured_image = $y->featured_image; //old featured image
				$thumbnail = $y->featured_image_thumb; //old thumbnail
				$this->blog_model->edit_blog($post_id, $featured_image, $thumbnail);
				$this->session->set_flashdata('status_msg', 'blog article updated successfully.');
				redirect(site_url('blog/edit_blog/'.$post_id)); 
				
			} elseif ( ( ! $this->upload->do_upload('featured_image')) && ($_FILES['featured_image']['name'] != "") ) { 	
				//upload does not happen when file is selected
				$error = array('error' => $this->upload->display_errors());
				$this->edit_blog($post_id, $error); //reload page with upload errors
				
			} else { //file is selected, upload happens, everyone is happy
				
				//delete old featured image and thumbnail from server
				$this->blog_model->delete_blog_featured_image($post_id);
				
				$featured_image = $this->upload->data('file_name');
				//generate thumbnail of the image with dimension 85x75
				$thumbnail = generate_image_thumb($featured_image, '85', '75');		
				$this->blog_model->edit_blog($post_id, $featured_image, $thumbnail);
				$this->session->set_flashdata('status_msg', 'blog article updated successfully.');
				redirect(site_url('blog/edit_blog/'.$post_id)); 
			}
			
		} else { 
			$this->edit_blog($post_id, $error); //validation fails, reload page with validation errors
		}
    }
	
	
	public function publish_blog($post_id) { 
		$this->blog_model->publish_blog($post_id);
		$this->session->set_flashdata('status_msg', 'blog article published successfully.');
		redirect($this->agent->referrer());
	}
	
	
	public function unpublish_blog($post_id) { 
		$this->blog_model->unpublish_blog($post_id);
		$this->session->set_flashdata('status_msg', 'blog article unpublished successfully.');
		redirect($this->agent->referrer());
	}
	
	
	public function delete_blog($post_id) { 
		$this->blog_model->delete_blog($post_id);
		$this->session->set_flashdata('status_msg', 'blog article deleted successfully.');
		redirect($this->agent->referrer());
	}
	
	
	public function bulk_actions_blog() { 
		$this->form_validation->set_rules('check_bulk_action', 'Bulk Select', 'trim');
		$selected_rows = count($this->input->post('check_bulk_action', TRUE)); 
		if ($this->form_validation->run()) {
			if ($selected_rows > 0) {
				$this->blog_model->bulk_actions_blog();
			} else {
				$this->session->set_flashdata('status_msg_error', 'No item selected.');
			}
		} else {
			$this->session->set_flashdata('status_msg_error', 'Bulk action failed!');
		}
		redirect($this->agent->referrer());
	}



	/* ========== Comments ============= */
	public function delete_comment($comment_id) { 
		$post_id = $this->get_comment_details($comment_id)->post_id;
		$slug = $this->get_blog_details($post_id)->slug;
		$this->blog_model->delete_comment($comment_id);
		$this->session->set_flashdata('status_msg', 'Comment deleted successfully.');
		redirect('blog/single_blog/'.$post_id.'/'.$slug);
	}
	
	


}



