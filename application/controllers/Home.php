<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('blog_model');
		$this->load->model('events_model');
		$this->load->model('gallery_model');
		$this->load->model('testimonial_model');
		$this->load->model('message_model');
		$this->load->model('my_model');
		$this->load->model('org_structures');
		$this->load->model('volunteer_model');
		$this->load->model('profile_model');
		$this->load->model('sponsor_model');
	}





	public function index()
	{
		$this->header('Thumbsup Initiative');		
		$data['testimony'] = $this->testimonial_model->get_recent_published_testimonials(10);
		$data['sponsors'] = $this->sponsor_model->get_recent_published_sponsors(10);
		$data['near_upcoming_events'] = $this->events_model->get_near_upcoming_event(3);
		$data['profiles'] = $this->common_model->get_user_profiles(4);
		$this->load->view('home', $data);
		$this->footer();
	}

	/* About Us */
	public function about()
	{
		$this->about_header('About Us');
		$data['units'] = $this->units_accordion();		
		$this->load->view('about', $data);
		$this->footer();
	}

	public function units_accordion() {
		//get all publisheed UNITS
		$this->db->select("*");
		$this->db->where("published","true");
		$units = $this->db->get("units");
		$html ='';
		if($units->num_rows() > 0){
			$units = $units->result();
			
			foreach ($units as $unit) {
				$html .= $this->single_accordion($unit);	
			}

			


		}

		return $html;

	}

	public function single_accordion($unit){

		$name = $unit->name;
		$description = $unit->description;
		$id = $unit->id;
		$abbr = $this->org_structures->get_abbr($name);

		$accordion ='<button class="accordion"><b>'.$name.'</b></button>
			<div class="panel">';
		$accordion .='<div>'.$description.'</div>';

		//getting positions under each units
		$this->db->select("*");
		$this->db->where(['under'=>$abbr,'type'=>'position']);
		$this->db->order_by('rank','DESC');
		$positions = $this->db->get('org_structure');

		$string ='';
		
		if ($positions->num_rows() > 0) {
			$positions = $positions->result();
			

			foreach($positions as $position){

				$fullname = $position->fullname;
				$position_abbr = $this->org_structures->get_abbr($fullname);
				$string .= '<p><b>'.$position->fullname.'</b></p>';
				//getting profiles holding the positions
				$this->db->select("*");
				$this->db->where('position_main',$fullname);
				$this->db->or_like('position_other',$position_abbr);
				
				$profiles = $this->db->get("profile");

				if($profiles->num_rows() > 0){
					
					$string .='<ul>';
					foreach($profiles->result() as $profile){
						$string .= '<li>'.$profile->fullname.'</li>';
					}
					$string .='</ul>';
				}
			}
		}

		$accordion .='<div>'.$string.'</div>';




		$accordion .='</div>';

		return $accordion;

	}

	public function arms()
	{
		$this->arms_header('Arms');		
		$this->load->view('arms');
		$this->footer();
	}

	public function board()
	{
		$this->board_header('Board');
		$data['profiles'] = $this->common_model->get_user_profiles();		
		$this->load->view('board', $data);
		$this->footer();
	}

	/* ====== Events ====== */
	public function events() {
		$this->event_header('All Events');	
		//config for pagination
        $config = array();
		$per_page = 3;  //number of items to be displayed per page
        $uri_segment = 3;  //pagination segment id
		$config["base_url"] = base_url('home/events');
        $config["total_rows"] = $this->events_model->count_published_upcoming_events();
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
		$data["events"] = $this->events_model->get_near_upcoming_event($per_page, $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links); //explode the links 1 2 3 4 into distinct items for styling.
		$data['total_records'] = $this->events_model->count_published_upcoming_events();
		$this->load->view('publications/events/all_events', $data);
		$this->footer();
	}


	public function single_event($event_id)
	{	
		//check news exists
		$this->check_data_exists($event_id, 'id', 'events', 'home/events');
		$this->event_header('Event Details');
		$event_details = $this->events_model->get_event_details($event_id);
		$event_details = $this->events_model->make_single_event($event_details);
		$data['event_details'] = $event_details;
		$this->load->view('publications/events/single_event', $data);
		$this->footer();
	}

	/* ====== Gallery ====== */
	public function gallery()
	{
		$this->gallery_header('Our Gallery');
		//config for pagination
        $config = array();
		$per_page = 6;  //number of items to be displayed per page
        $uri_segment = 3;  //pagination segment id
		$config["base_url"] = base_url('home/gallery');
        $config["total_rows"] = $this->gallery_model->count_published_photos();
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
		$data["photos"] = $this->gallery_model->get_published_photos($per_page, $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links); //explode the links 1 2 3 4 into distinct items for styling.
		$data['total_records'] = $this->gallery_model->count_published_photos();		
		$this->load->view('gallery/gallery', $data);
		$this->footer();
	}


	/* ====== Volunteer ====== */
	public function volunteer()
	{
		$this->volunteer_header('Volunteer');		
		$this->load->view('volunteers');
		$this->footer();
	}


	public function volunteer_ajax() { 
		//form validation rules
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('state', 'Satet of Origin', 'required');
		$this->form_validation->set_rules('residence[]', 'Volunteer State', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('availability', 'Date of Availability', 'required');
		$this->form_validation->set_rules('qualification[]', 'Educational Qualification', 'required');
		$this->form_validation->set_rules('language[]', 'Language', 'trim|required');
		$this->form_validation->set_rules('f_name', 'Reffree Firstname', 'trim|required');
		$this->form_validation->set_rules('m_name', 'Reffree Middle Name', 'trim|required');
		$this->form_validation->set_rules('l_name', 'Reffree last Name', 'trim|required');
		$this->form_validation->set_rules('r_phone', 'Reffree Phone', 'trim|required');
		$this->form_validation->set_rules('r_email', 'Reffree Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('place_of_employment', 'Place of Employment', 'required');
		$this->form_validation->set_rules('position', 'Position', 'required');
		$this->form_validation->set_rules('office_phone', 'Office Phone', 'trim|required');

		if ($this->form_validation->run())  {	
			$this->volunteer_model->add_volunteer(); //insert the data into db
			echo 1;
		} else { 
			echo validation_errors();
		}
	}


	public function volunteer_check() {
		$check = "The list = ";
		if(isset($_POST['r_phone'])){
			$check .= "r_phone (".$_POST['r_phone'].") ";
		}
		if(isset($_POST['phone'])){
			$check .= "phone (".$_POST['phone'].") ";
		}
		if(isset($_POST['office_phone'])){
			$check .= "office_phone (".$_POST['office_phone'].") ";
		}
		echo $check;
	}


	/* ====== Contact ====== */
	public function contact()
	{
		$this->contact_header('Contact Us');		
		$this->load->view('contact');
		$this->footer();
	}

	public function contact_us_ajax() { 
		//form validation rules
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');

		if ($this->form_validation->run())  {	
			$this->message_model->contact_us(); //insert the data into db
			echo 1;
		} else { 
			echo validation_errors();
		}
	}


	public function test()
	{	
		$data['name'] = "Peter Grifin";
		echo $this->template->single_load('volunteer_mail.php', $data);
		
	}






}