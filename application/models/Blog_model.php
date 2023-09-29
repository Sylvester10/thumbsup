<?php
defined('BASEPATH') or exit('Direct access to script not allowed');


class Blog_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}



	/* ===== blog ===== */
	public function get_blog_details($id)	{ 
		return $this->db->get_where('blog', array('id' => $id))->row();
	}


	public function get_blog($limit, $offset) {		
		$this->db->limit($limit, $offset); //limit to be used as per_page, offset to be used as pagination segment
		$this->db->order_by("date", "DESC"); //order by date DESC i.e. latest blogletters first
		$query = $this->db->get_where('blog');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
            return false;
    }


    public function get_published_blog($limit, $offset) {		
		$this->db->limit($limit, $offset); //limit to be used as per_page, offset to be used as pagination segment
		$this->db->order_by("date", "DESC"); //order by date DESC i.e. latest blogletters first
		$query = $this->db->get_where('blog', array('published' => 'true'));
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
            return false;
    }


    public function count_blog() { 
		return $this->db->get_where('blog')->num_rows();
	}
	
	
	public function count_published_blog() { 
		return $this->db->get_where('blog', array('published' => 'true'))->num_rows();
	}
	
	
	public function count_unpublished_blog() { 
		return $this->db->get_where('blog', array('published' => 'false'))->num_rows();
	}


	public function get_recent_published_blog($limit) { //recent blog for homepage and sidebar
		$this->db->order_by('date', 'DESC');
		$this->db->limit($limit); 
		return $this->db->get_where('blog', array('published' => 'true'))->result();
	}


	public function check_blog_is_published($post_id) { 
		$query = $this->get_blog_details($post_id);
		$published = $query->published;
		return ($published == 'true') ? TRUE : redirect('home/blog');  
    }






	/* ========== Admin Actions: blog ============= */
	
	public function create_blog($featured_image, $thumbnail) { 
		/*
		//For snippet, mb_strimwidth is used get the first 300 xters from the content and append ...
		//strip_tags is used to remove html tags when post is shared
		//For slug, the title is processed to replace spaces with hyphen, and remove special xters that are not url-friendly.
		*/
		$title = ucwords($this->input->post('title', TRUE)); 
		$slug = get_slug($title); 
		$content = ucfirst($this->input->post('body', TRUE));		
		$snippet = mb_strimwidth(strip_tags($content), 0, 300, "...");
		$body = nl2br($content);
		
		$data = array (
			'title' => $title,
			'slug' => $slug,
			'snippet' => $snippet,
			'body' => $body,
			'featured_image' => $featured_image,
			'featured_image_thumb' => $thumbnail,
			'published' => 'true',
		);
		return $this->db->insert('blog', $data);
	}
	
	
	public function edit_blog($id, $featured_image, $thumbnail) { 
		/*
		//For snippet, mb_strimwidth is used get the first 300 xters from the content and append ...
		//strip_tags is used to remove html tags when post is shared
		//For slug, the title is processed to replace spaces with hyphen, and remove special xters that are not url-friendly.
		*/
		$title = ucwords($this->input->post('title', TRUE)); 
		$slug = get_slug($title); 
		$content = ucfirst($this->input->post('body', TRUE));		
		$snippet = mb_strimwidth(strip_tags($content), 0, 300, "...");
		$body = nl2br($content);
		
		$data = array (
			'title' => $title,
			'slug' => $slug,
			'snippet' => $snippet,
			'body' => $body,
			'featured_image' => $featured_image,
			'featured_image_thumb' => $thumbnail,
			'published' => 'true',
		);
		$this->db->where('id', $id);
		return $this->db->update('blog', $data);
	}
	
	
	public function publish_blog($id) { 
		$data = array (
			'published' => 'true',
		);
		$this->db->where('id', $id);
		return $this->db->update('blog', $data);
	}
	
	
	public function unpublish_blog($id) { 
		$data = array (
			'published' => 'false',
		);
		$this->db->where('id', $id);
		return $this->db->update('blog', $data);
	}
	
	
	public function delete_blog_featured_image($id) {
		$y = $this->get_blog_details($id);
		unlink('./assets/uploads/blog/'.$y->featured_image); //delete the featured image
		unlink('./assets/uploads/blog/'.$y->featured_image_thumb); //delete the thumbnail
    } 
	
	
	public function delete_blog($id) {
		$y = $this->get_blog_details($id);
		$this->delete_blog_featured_image($id); //remove image files from server
		return $this->db->delete('blog', array('id' => $id));
    } 
	
	
	public function bulk_actions_blog() {
		$selected_rows = count($this->input->post('check_bulk_action', TRUE)); 
		$bulk_action_type = $this->input->post('bulk_action_type', TRUE);		
		$row_id = $this->input->post('check_bulk_action', TRUE);
		foreach ($row_id as $id) {
			switch ($bulk_action_type) {
				case 'publish':
					$this->publish_blog($id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} blog article published successfully.");
				break;
				case 'unpublish':
					$this->unpublish_blog($id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} blog article unpublished successfully.");
				break;
				case 'delete':
					$this->delete_blog($id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} blog article deleted successfully.");
				break;
			}
		} 
	}


	
	/* ===== Comments ===== */
	public function get_comment_details($comment_id)	{ 
		return $this->db->get_where('comments', array('id' => $comment_id))->row();
	}


	public function get_comments_by_post_id($post_id, $limit, $offset) {		
		$this->db->limit($limit, $offset); //limit to be used as per_page, offset to be used as pagination segment
		$this->db->order_by("date", "DESC"); //order by date DESC i.e. latest commentsletters first
		$this->db->where('post_id', $post_id);
		$query = $this->db->get('comments');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
       	return FALSE;
    }


    public function count_post_comments($post_id) { 
    	$this->db->where('post_id', $post_id);
		return $this->db->get('comments')->num_rows();
	}
	
	
	public function create_comment($post_id) { 
		$name = ucwords($this->input->post('name', TRUE)); 
		$email = $this->input->post('email', TRUE); 
		$comment = ucfirst($this->input->post('comment', TRUE));		
		$comment = nl2br($comment);
		
		$data = array (
			'post_id' => $post_id,
			'name' => $name,
			'email' => $email,
			'comment' => $comment,
		);
		return $this->db->insert('comments', $data);
	}


	/* ========== Admin Actions: Comments ============= */
	public function delete_comment($comment_id) {
		return $this->db->delete('comments', array('id' => $comment_id));
    } 


}