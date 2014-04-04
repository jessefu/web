<?php
class Site extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}

	function member_area()
	{
		$this->load->helper('url');
		$data['username'] =  $this->session->userdata('name');
		//$this->load->view('personal', $data);
		redirect('personalmanage');
	}

	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo 'You dont have permission to access this page. <a href="../login">Login</a> ';
			die();
		}
	}

}
