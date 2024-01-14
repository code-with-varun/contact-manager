<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

    public function get_contacts() {
        // Fetch all contacts from the database
        $query = $this->db->get('contacts');
        return $query->result();
    }

    public function get_contact_by_id($contact_id) {
        // Fetch a specific contact by ID from the database
        $query = $this->db->get_where('contacts', array('id' => $contact_id));
        return $query->row();
    }

	

    public function add_contact($data) {
        // Insert a new contact into the database
        $this->db->insert('contacts', $data);
    }

    public function update_contact($contact_id, $data) {
        // Update a specific contact in the database
        $this->db->where('id', $contact_id);
        $this->db->update('contacts', $data);
    }

    public function delete_contact($contact_id) {
        // Delete a specific contact from the database
        $this->db->delete('contacts', array('id' => $contact_id));
    }
}
