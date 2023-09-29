<?php
defined('BASEPATH') or exit('Direct access to script not allowed');


class Events_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->model('profile_model');
	}




	public function get_event_details($id) {
		return $this->db->get_where('events', array('id' => $id))->row();
	}



	/* =========== Upcoming Events ============== */
	public function get_upcoming_events($limit, $offset) {		
		$this->db->limit($limit, $offset); //limit to be used as per_page, offset to be used as pagination segment
		$this->db->order_by("date_unix", "ASC"); //order by date_unix ASC so that the dates appear chronologically
		$date_unix_today = date('Ymd');
		$where = array(
			'date_unix >=' => $date_unix_today, //ensure event date is not in the past
		);
		$this->db->where($where); 
		$query = $this->db->get('events');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
       	return false;
    }


    public function get_published_upcoming_events($limit, $offset) {		
		$this->db->limit($limit, $offset); //limit to be used as per_page, offset to be used as pagination segment
		$this->db->order_by("date_unix", "ASC"); //order by date_unix ASC so that the dates appear chronologically
		$date_unix_today = date('Ymd');
		$where = array(
			'published' => 'true',
			'date_unix >=' => $date_unix_today, //ensure event date is not in the past
		);
		$this->db->where($where); 
		$query = $this->db->get('events');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    public function get_near_upcoming_events($limit, $offset) { //for Events Page
		$this->db->limit($limit, $offset); //limit to be used as per_page, offset to be used as pagination segment
		$date_unix_today = date('Ymd');
		$this->db->order_by('date_unix', 'ASC');
		$this->db->limit($limit);  
		$where = array(
			'published' => 'true',
			'date_unix >=' => $date_unix_today, //ensure event date is not in the past
		);
		$this->db->where($where);  
		return $this->db->get('events')->result();
	}


	public function get_near_upcoming_event($limit) { //for homepage
		$date_unix_today = date('Ymd');
		$this->db->order_by("event_date", "DESC"); //order by date_unix ASC so that the dates appear chronologically
		$this->db->order_by('date_unix', 'ASC');
		$this->db->limit($limit);  
		$where = array(
			'published' => 'true',
		);
		$this->db->where($where);  
		return $this->db->get('events')->result();
	}


	public function count_upcoming_events() { 
		$date_unix_today = date('Ymd');
		$where = array(
			'date_unix >=' => $date_unix_today, //ensure event date is not in the past
		);
		$this->db->where($where);  
		return $this->db->get('events')->num_rows();
	}


    public function count_published_upcoming_events() { 
		$where = array(
			'published' => 'true',
		);
		$this->db->where($where);  
		return $this->db->get('events')->num_rows();
	}


	public function count_unpublished_upcoming_events() { 
		$date_unix_today = date('Ymd');
		$where = array(
			'published' => 'false',
			'date_unix >=' => $date_unix_today, //ensure event date is not in the past
		);
		$this->db->where($where);  
		return $this->db->get('events')->num_rows();
	}



	/* =========== All Events ============== */
	public function get_events_list($limit, $offset) {		
		$this->db->limit($limit, $offset); //limit to be used as per_page, offset to be used as pagination segment
		$this->db->order_by("date_unix", "ASC"); //order by date_unix ASC so that the dates appear chronologically
		$query = $this->db->get_where('events');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
            return false;
    }


    public function get_published_events_list($limit, $offset) {		
		$this->db->limit($limit, $offset); //limit to be used as per_page, offset to be used as pagination segment
		$this->db->order_by("event_date", "DESC"); //order by date_unix ASC so that the dates appear chronologically
		$query = $this->db->get_where('events');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
            return false;
    }


    public function count_events() { 
		return $this->db->get_where('events')->num_rows();
	}


    public function count_published_events() { 
		return $this->db->get_where('events', array('published' => 'true'))->num_rows();
	}


	public function count_unpublished_events() { 
		return $this->db->get_where('events', array('published' => 'false'))->num_rows();
	}





	/* ========== Admin Actions: Events ============= */
	
	public function create_event($featured_image, $thumbnail) { 
		$event_date = $this->input->post('event_date', TRUE); 	
		$end_date = $this->input->post('end_date', TRUE); 
		$time = $this->input->post('time', TRUE); 	
		$end_time = $this->input->post('end_time', TRUE); 
		$caption = ucwords($this->input->post('caption', TRUE)); 	
		$description = nl2br(ucfirst($this->input->post('description', TRUE))); 
		$snippet = mb_strimwidth(strip_tags($description), 0, 50, "...");
		$venue = ucwords($this->input->post('venue', TRUE)); 
		$host = implode(", ", $this->input->post('host', TRUE)); 
		$guest = implode(", ", $this->input->post('guest', TRUE));
		$moderator = implode(", ", $this->input->post('moderator', TRUE));
		$zoom_link = ucwords($this->input->post('zoom_link', TRUE)); 
		$google_form = ucwords($this->input->post('google_form', TRUE)); 
		
		$x_date = explode('/', $event_date);
		$year = $x_date[0]; //year is array index 0 
		$month = $x_date[1]; //month is array index 1
		$day = $x_date[2]; //day is array index 2
		$date_unix = $this->generate_date_unix($event_date);
		$date_created = time();
		
		$data = array (
			'year' => $year, 
			'month' => $month, 
			'day' => $day, 
			'date_unix' => $date_unix, 
			'event_date' => $event_date, 
			'end_date' => $end_date, 
			'time' => $time, 
			'end_time' => $end_time, 
			'caption' => $caption,
			'description' => $description,
			'snippet' => $snippet,
			'venue' => $venue,
			'host' => $host,
			'guest' => $guest,
			'moderator' => $moderator,
			'zoom_link' => $zoom_link,
			'google_form' => $google_form,
			'featured_image' => $featured_image,
			'featured_image_thumb' => $thumbnail,
			'date_created' => $date_created
		);
		return $this->db->insert('events', $data);
	}
	
	
	public function edit_event($id, $featured_image, $thumbnail) { 
		$event_date = $this->input->post('event_date', TRUE); 	
		$end_date = $this->input->post('end_date', TRUE); 
		$time = $this->input->post('time', TRUE); 	
		$end_time = $this->input->post('end_time', TRUE); 
		$caption = ucwords($this->input->post('caption', TRUE)); 	
		$description = nl2br(ucfirst($this->input->post('description', TRUE))); 
		$snippet = mb_strimwidth(strip_tags($description), 0, 50, "...");
		$venue = ucwords($this->input->post('venue', TRUE)); 
		$host = implode(", ", $this->input->post('host', TRUE)); 
		$guest = implode(", ", $this->input->post('guest', TRUE));
		$moderator = implode(", ", $this->input->post('moderator', TRUE));
		$zoom_link = ucwords($this->input->post('zoom_link', TRUE)); 
		$google_form = ucwords($this->input->post('google_form', TRUE)); 
		
		$x_date = explode('/', $event_date);
		$year = $x_date[0]; //year is array index 0 
		$month = $x_date[1]; //month is array index 1
		$day = $x_date[2]; //day is array index 2
		$date_unix = $this->generate_date_unix($event_date);
		$date_created = time();
		
		$data = array (
			'year' => $year, 
			'month' => $month, 
			'day' => $day, 
			'date_unix' => $date_unix, 
			'event_date' => $event_date, 
			'end_date' => $end_date, 
			'time' => $time, 
			'end_time' => $end_time, 
			'caption' => $caption,
			'description' => $description,
			'snippet' => $snippet,
			'venue' => $venue,
			'host' => $host,
			'guest' => $guest,
			'moderator' => $moderator,
			'zoom_link' => $zoom_link,
			'google_form' => $google_form,
			'featured_image' => $featured_image,
			'featured_image_thumb' => $thumbnail,
			'date_created' => $date_created,
		);
		$this->db->where('id', $id);
		return $this->db->update('events', $data);
	}


	public function get_date_unix($date_unix) {
		return $this->db->get_where('events', array('date_unix' => $date_unix))->num_rows();
	}
	
	
	public function generate_date_unix($date) {
		//break date into arrays of day, month and year. Note that "/" must be specified as separator in datepicker initialization and date format must be set as yyyy/mm/dd
		$x_date = explode('/', $date);
		$year = $x_date[0]; //year is array index 0 
		$month = $x_date[1]; //month is array index 1
		$day = $x_date[2]; //day is array index 2
		
		//date unix: required to order the events chronologically when viewed as a list (in the order yyyymmdd)
		$date_unix = $year.$month.$day;
		return $date_unix;
	}


	public function publish_event($id) { 
		$data = array (
			'published' => 'true',
		);
		$this->db->where('id', $id);
		return $this->db->update('events', $data);
	}
	
	
	public function unpublish_event($id) { 
		$data = array (
			'published' => 'false',
		);
		$this->db->where('id', $id);
		return $this->db->update('events', $data);
	}

	
	public function delete_events_featured_image($id) {
		$y = $this->get_event_details($id);
		unlink('./assets/uploads/events/'.$y->featured_image); //delete the featured image
		unlink('./assets/uploads/events/'.$y->featured_image_thumb); //delete the thumbnail
    } 


	public function delete_event($id) {
		$y = $this->get_event_details($id);
		//$this->delete_events_featured_image($id); //remove image files from server
		return $this->db->delete('events', array('id' => $id));
    } 
	
	
	public function clear_events() {
		return $this->db->truncate('events');
    } 


	public function bulk_actions_events() {
		$selected_rows = count($this->input->post('check_bulk_action', TRUE)); 
		$bulk_action_type = $this->input->post('bulk_action_type', TRUE);		
		$row_id = $this->input->post('check_bulk_action', TRUE);
		$events = ($selected_rows == 1) ? 'event' : 'events';
		foreach ($row_id as $id) {
			switch ($bulk_action_type) {
				case 'publish':
					$this->publish_event($id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} {$events} published successfully.");
				break;
				case 'unpublish':
					$this->unpublish_event($id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} {$events} unpublished successfully.");
				break;
				case 'delete':
					$this->delete_event($id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} {$events} deleted successfully.");
				break;
			}
		} 
	}

	public function page_section($title,$profile_arr){
		if ($profile_arr != NULL){
			$page_section ='<div id="epage_section">
	        <div id="epage_section_title_holder"><span id="epage_section_title">'.$title.'</span></div>
	        
	            <div id="profile_container">';
	            $profile_arr = explode(", ", $profile_arr);
	            foreach($profile_arr as $profile){
	            	$page_section.= $this->single_profile($profile);
	            }

          	$page_section .= '</div></div>';

	    } else {
	    	$page_section = '';
	      }

        return $page_section;

	}

	public function single_profile($name){
		$name=trim($name);
		$image = $this->profile_model->get_image($name);

		return '<div data-toggle="tooltip" data-placement="bottom" title="'.$name.'">
                                <img src="'.base_url('assets/uploads/photos/profile/' .$image).'">
                                <span>'.$name.'</span>
                  </div>';
	}

	public function make_single_event($y){
		$links = "";

		if($y->zoom_link != ''){
			$links .='<a href="'.$y->zoom_link.'" data-toggle="tooltip" title="Join the Zoom meeting now!">join Zoom</a>';
		}
		if($y->google_form != ''){
			$links .='<a href="'.$y->google_form.'" data-toggle="tooltip" title="Register Now!!">Register</a>';
		}


		$date_created = is_timestamp($y->date_created)? time_diff($y->date_created).' on the '.date('jS M, Y',$y->date_created): '';
		
		$end_date = ($y->event_date != $y->end_date) ? ' - <span>'.x_day_ordinal($y->end_date).' '.x_month_long($y->end_date).' <span> '.x_year_long($y->end_date).'</span></span>' : '';
		$end_time = ($y->time != $y->end_time) ? ' - '.$y->end_time.'': '';
		$main_page = '<div id="epage">
            <span id="epage_top">Event title</span>

            <h1 id="epage_title">'.$y->caption.'</h1>

            <span id="epage_title_bottom">Published '.$date_created.' By <b>Thumbs-Up Organization</b></span>

            <div id="epage_image_holder"><img src="'.base_url('assets/uploads/events/' .$y->featured_image).'"></div>

            <div id="epage_details_container">
                <div id="epage_details_container_inner">
                    <div id="epage_detail">
                        <h3>Date</h3>
                        <span>'.x_day_ordinal($y->event_date).' '.x_month_long($y->event_date).' <span> '.x_year_long($y->event_date).'</span></span>'.$end_date.'
                    </div>
                    <div id="epage_detail">
                        <h3>Time</h3>
                        <span>'.$y->time. $end_time.'</span>
                    </div>
                    <div id="epage_detail">
                        <h3>Location</h3>
                        <span>'.$y->venue.'</span>
                    </div>
                </div>
                
            </div>

            <div id="epage_section_container">';

            $main_page .= $this->page_section("HOST",$y->host);
            $main_page .= $this->page_section("MODERATOR",$y->moderator);
            $main_page .= $this->page_section("GUEST",$y->guest);



                
         $main_page .=  '</div>

            <div id="epage_description">
                <p>'.$y->description.'</p>
            </div>

            <div id="epage_links">'.$links.'</div>
            
            
        </div>';
        return $main_page;

	}



}