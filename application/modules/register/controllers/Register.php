<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	
	
	function index()
	{	
		if ($this->db->table_exists('users'))
		{
					$this->db->where('user_role',1);
					$admin  = $this->db->get('users')->row();
					
					if(!empty($admin)){
						$this->session->set_flashdata('error', 'Page Not Found');
						redirect(site_url('admin/login'));
					}
		}
	
		
	
	
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Name', 'required');
		     $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]|is_unique[users.email]');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
			$this->form_validation->set_rules('conf', 'Confirm Password', 'required|matches[password]');
		   
			if ($this->form_validation->run()==true)
            {
				//$save['id'] = 1;
				$save['name'] = $this->input->post('name');
				$save['username'] = $this->input->post('username');
                $save['password'] = sha1($this->input->post('password'));
				$save['email'] = $this->input->post('email');
			  	$save['user_role'] = 1;
             	//echo '<pre>'; print_r($save);die;
				$this->auth->save($save);
             	$this->session->set_flashdata('message', 'Registration Success');
				redirect('admin/login');
			}
		}		

		
		$this->load->view('register');	
	}
	
	

}