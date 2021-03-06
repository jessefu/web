<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {

	
	public function index()
	{
//		$this->output->enable_profiler(TRUE);
		$this->load->database();
		$this->load->helper('url');
		$data['main_content'] = 'login_form';
	//	$this->load->view('includes/template',$data);
		$this->load->view('login');
		//echo "e";
	}

	function validate_credentials()
	{
		$this->load->helper('url');
		$this->load->model('membership_model');
		$query = $this->membership_model->validate();

		if($query) //if the user's credentials validated...
		{
			$data = array(
				'name' => $this->input->post('username'),
				'is_logged_in' => true
			);

			$this->session->set_userdata($data);
			redirect('site/member_area');
			//$this->load->view(login);
			
		}

		else 
		{
			$this->index();
		}	
	}

	function signup()
	{
		$this->load->helper('url');
		$data['main_content'] = 'signup_form';
//		$this->load->view('includes/template',$data);
		$this->load->view('signup');
	}

	function create_member()
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		//field name, error message, validation rules

		#$this->form_validation->set_rules('first_name','Name','trim|required');
		#$this->form_validation->set_rules('last_name','Last Name','trim|required');
		$this->form_validation->set_rules('email_address','Email Address','trim|required|valid_email');
		$this->form_validation->set_rules('username','Userame','trim|required|min_length[4]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2','Password Confirmation','trim|required|matches[password]');

		if($this->form_validation->run() == FALSE)
		{
			$this->signup();
		}
		else
		{
			$this->load->model('membership_model');
			if($query = $this->membership_model->create_member())
			{
				$data['main_content'] = 'signup_successful';
				//$this->load->view('includes/template',$data);
				$this->load->view('signup');
			}	
			else
			{
				//$this->load->view('signup_form');
				$this->load->view('signup');
			}	
		}	
	}

	function logout()  
	{  
    $this->session->sess_destroy();  
    redirect('site/member_area'); 
	} 
}
