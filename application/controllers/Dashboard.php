<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Check if user is logged in, if not, redirect to login
        if (!$this->session->has_userdata('pbk_sess')) {
            redirect('home');
        }
      
    }

    public function index() {
        // Get contacts from the database
        $data['contacts'] = $this->Contact_model->get_contacts();
        
        // Load dashboard view with contact data
        $this->load->view('dashboard_view', $data);
    }

    public function add_contact() {
        // Load a form to add a new contact 
        $this->load->view('add_contact_view');
    }

    public function edit_contact($contact_id) {
        // Get the contact details from the database
        $data['contact'] = $this->Contact_model->get_contact_by_id($contact_id);
        
        // Load a form to edit the contact 
        $this->load->view('edit_contact_view', $data);
    }

	public function save_contact() {
		// Validate form input 
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
	
		if ($this->form_validation->run() == FALSE) {
			// If validation fails, reload the add contact view with error messages
			$this->load->view('add_contact_view');
		} else {
			// If validation passes, save the contact in the database
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone')
			);
			$this->Contact_model->add_contact($data);
	
			// Redirect back to the dashboard
			redirect('dashboard');
		}
	}
	

	public function update_contact($contact_id) {
		// Validate form input 
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
	
		if ($this->form_validation->run() == FALSE) {
			// If validation fails, reload the edit contact view with error messages
			$data['contact'] = $this->Contact_model->get_contact_by_id($contact_id);
			$this->load->view('edit_contact', $data);
		} else {
			// If validation passes, update the contact in the database
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone')
			);
			$this->Contact_model->update_contact($contact_id, $data);
	
			// Redirect back to the dashboard
			redirect('dashboard');
		}
	}
	

    public function delete_contact($contact_id) {
        // Delete the contact from the database
        $this->Contact_model->delete_contact($contact_id);
        
        // Redirect back to the dashboard
        redirect('dashboard');
    }
}
