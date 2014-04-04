<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personalmanage extends CI_Controller {

	public function index() {
		$this->load->helper('url');	
		$this->load->view('personal');
	}

	public function publisherinfo() {
		$this->load->helper('url');
		$this->load->view('publisherInfo');
	}

	public function create_member()
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		//field name, error message, validation rules

		$data =  $this->session->userdata('name');

		$this->form_validation->set_rules('publisher','Company Name','');
		$this->form_validation->set_rules('description','Description','');
		$this->form_validation->set_rules('address','Address','');
		$this->form_validation->set_rules('phone','Telephone','');
		$this->form_validation->set_rules('homepage','Homepage','');

		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$da = $this->do_upload();
			$this->load->model('publisherinfo');
			if($query = $this->publisherinfo->create_member($data, $da))
			{
				$this->index();
			}	
			else
			{
				$this->index();
			}	
		}	
	}

	public function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2097152';	//2M
		$config['max_width']  = '1800';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
		   $error = array('error' => $this->upload->display_errors());
		   //$this->load->view('upload_form', $error);
		} 
		else
		{
		   //$data = array('upload_data' => $this->upload->data());
		   $data = $this->upload->data();

		   return $data;
		}
	}

}