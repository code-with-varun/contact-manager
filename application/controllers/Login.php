<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
	
	}

	function user_login()
	{
		 $data['user_name'] = $this->input->post('user_name');
		 $data['password'] = md5($this->input->post('password'));

		$check_user = $this->Users_model->get_user_list($data);
		if ($check_user == 1) {
			//echo 'one use found';
			$specific_user_fetch_login = $this->Users_model->specific_user_fetch_login($data);
			foreach ($specific_user_fetch_login as $row) {

				$user_id = $row->user_id;
				$user_name = $row->user_name;
				
				$sesdata = array(
					'user_id'  => $user_id,
					'user_name'  => $user_name
					);


				$this->session->set_userdata('pbk_sess', $sesdata);
				redirect('dashboard', 'location');
			
				
			}
		} else {
			 // Redirect back to login with an error message
			 $this->session->set_flashdata('error', 'Invalid username or password');
			redirect('home', 'location');
		}
	}

	function user_logout()
	{
		$this->session->unset_userdata('pbk_sess');
		redirect('home', 'location');
	}

	

}
