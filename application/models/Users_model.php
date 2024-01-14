<?php

class Users_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	
	}


	public function get_user_list($data)
	{
		
		$result = $this->db->select('*')
			->where('user_name', $data['user_name'])
			->where('password', $data['password'])
			->get('users')
			->row();
		if (!empty($result)) {
			return true;
		} else {
			return false;
		}
	}

	public function specific_user_fetch_login($data)
	{

		return $this->db->select('*')
			->where('user_name', $data['user_name'])
			->from('users')
			->get()
			->result();
	}



	// modal ends here
}
