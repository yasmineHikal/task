<?php

class User_model extends CI_Model
{
	public function register($enc_password)
	{
		// User data array
		$email = $this->input->post('email');
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => $enc_password,
		);
		// Insert user
		$this->db->insert('users', $data);
		return $this->login($email , $enc_password);
	}

	// Log user in
	public function login($email, $password)
	{
		// Validate
		$this->db->where('email', $email);
		$this->db->where('password', $password);

		$result = $this->db->get('users');

		if ($result->num_rows() == 1) {
			return $result->row(0)->id;
		} else {
			return false;
		}
	}


	// Check email exists
	public function check_email_exists($email)
	{
		$query = $this->db->get_where('users', array('email' => $email));
		if (empty($query->row_array())) {
			return true;
		} else {
			return false;
		}
	}


	//get users
	public function get_users()
	{
		$this->db->order_by('created_at');
		$query = $this->db->get('users');
		return $query->result_array();
	}

	//create user
	public function create_user()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			);

		return $this->db->insert('users', $data);
	}

	//show user
	public function get_user($id)
	{
		$query = $this->db->get_where('users', array('id' => $id));
		return $query->row();
	}


	//update user
	public function update_user()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
		);

		if($this->input->post('password')){
			$date['password'] = md5($this->input->post('password'));
		}

		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('users', $data);

	}

	//delete user
	public function delete_user($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('users');
		return true;
	}
}
