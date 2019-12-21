<?php
	class Posts extends CI_Controller{
		public function index($offset = 0){	
			// Pagination Config
			$config['base_url'] = base_url() . 'posts/index/';
			$config['total_rows'] = $this->db->count_all('posts');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'pagination-link');


			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'Latest Posts';

			$data['posts'] = $this->post_model->get_posts($config['per_page'], $offset);

			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['title'] = 'Create Post';

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('posts/create', $data);
				$this->load->view('templates/footer');
			} else {
				// Upload Image
				$config['upload_path'] = './assets/images/posts/';
//				$config['allowed_types'] = 'gif|jpg|png';

				$this->load->library('upload', $config);
				$config['allowed_types'] = 'jpg';
				$config['max_size'] = '100';
				$config['max_width'] = '1024';
				$config['max_height'] = '768';

				if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
//					print_r($errors);
//					die();
					$post_image = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}

				$this->post_model->create_post($post_image);

				// Set message
				$this->session->set_flashdata('post_created', 'Your post has been created');

				redirect('posts/index');
			}
		}


	}
