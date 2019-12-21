<?php
	class Post_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_posts($limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}

				$this->db->order_by('posts.id', 'DESC');
				$query = $this->db->get('posts');
				return $query->result_array();

		}

		public function create_post($post_image){

			$data = array(
				'title' => $this->input->post('title'),
				'body' => $this->input->post('body'),
				'user_id' => $this->session->userdata('user_id'),
				'post_image' => $post_image
			);

			return $this->db->insert('posts', $data);
		}


	}
