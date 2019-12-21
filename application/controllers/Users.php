<?php
	class Users extends CI_Controller{
		// Register user
		public function register()
		{
			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else {
				// Encrypt password
				$enc_password = md5($this->input->post('password'));

				$email = $this->input->post('email');

				$user_id  = $this->user_model->register($enc_password);

				if ($user_id) {
					// Create session
					$user_data = array(
						'user_id' => $user_id,
						'email' => $email,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					// Set message
					$this->session->set_flashdata('user_loggedin', 'You are now logged in');

					redirect('posts/index');
				} else {
					// Set message
					$this->session->set_flashdata('login_failed', 'Login is invalid');

					redirect('users/login');
				}
			}
		}

		// Log in user
		public function login(){
			$data['title'] = 'Sign In';

			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');


			if($this->form_validation->run() === FALSE){

				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			} else {

				// Get email
				$email = $this->input->post('email');
				// Get and encrypt the password
				$password = md5($this->input->post('password'));

				// Login user
				$user_id = $this->user_model->login($email, $password);


				if($user_id){
					// Create session
					$user_data = array(
						'user_id' => $user_id,
						'email' => $email,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					// Set message
					$this->session->set_flashdata('user_loggedin', 'You are now logged in');

					redirect('posts/index');
				}
			}
		}

		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			// Set message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');

			redirect('users/login');
		}

		// Check if email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}

		/**
		 * CURD FOR USER
		 */

		//get all users ....
		public function index($offset = 0)
		{
			// Pagination Config
			$config['base_url'] = base_url() . 'users/index/';
			$config['total_rows'] = $this->db->count_all('users');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'pagination-link');


			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'Latest Users';

			$data['users'] = $this->user_model->get_users($config['per_page'], $offset);

			$this->load->view('templates/header');
			$this->load->view('users/index', $data);
			$this->load->view('templates/footer');
		}

		//delete user
		public function delete($id){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->user_model->delete_user($id);

			// Set message
			$this->session->set_flashdata('user_deleted', 'Your user has been deleted');

			redirect('users/index');
		}

		// edit user
		public function edit($id){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['user'] = $this->user_model->get_user($id);
			$data['title'] = 'Edit User';

			$this->load->view('templates/header');
			$this->load->view('users/edit', $data);
			$this->load->view('templates/footer');
		}

		// update user ......
		public function update(){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if ($this->form_validation->run() === FALSE) {
				redirect('users/edit/'. $this->input->post('id'));
			} else {


			$this->user_model->update_user();

			// Set message
			$this->session->set_flashdata('user_updated', 'User has been updated');

			redirect('users/index');
			}

		}
	}
