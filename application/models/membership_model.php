<?php

class Membership_model extends CI_Model {

	 function __construct()
    {
        parent::__construct();
    }

	function validate()
	{
		$this->db->where('name',$this->input->post('username'));
		$this->db->where('password',md5($this->input->post('password')));
		$query = $this->db->get('account');

		if($query->num_rows = 1)
		{
			return true;
		}
		return false;
	}

	function create_member()		
	{
		$new_member_insert_data = array(
			'name' => $this->input->post('username'), 
			#'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email_address'),
			#'username' => $this->input->post('username'),
			#'password' => md5($this->input->post('password'))
		);

		$insert = $this->db->insert('account',$new_member_insert_data);
		return $insert;
	}

}
