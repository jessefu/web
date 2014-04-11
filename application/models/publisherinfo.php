<?php

class Publisherinfo extends CI_Model {

	 function __construct()
    {
        parent::__construct();
    }

	function get_row($para)
	{
		$this->db->where('name',$para);
		
		$query = $this->db->get('publisherinfo');

		$row = $query->row;

		  //echo $row->name;
		  //echo $row->publisher;
		  //echo $row->logo;
		  //echo $row->description;
		  //echo $row->phone;
		  //echo $row->homepage;
		  //echo $row->address;
	}

	function create_member($para1, $para2)
	{
		$new_member_insert_data = array(
			'name' => $para1,
			'publisher' => $this->input->post('name'), 
			'logo' => $para2['full_path'],
			'description' => $this->input->post('description'),
			'phone' => $this->input->post('companyPhone'),
			'address' => $this->input->post('address'),
			'homepage' => $this->input->post('homePage'),
		);

		$insert = $this->db->insert('publisherinfo',$new_member_insert_data);
		return $insert;
	}

}
