<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Backend And Frontend Controllers Seperating Controller
**/
require APPPATH.'/libraries/REST_Controller.php';
class API_Controller extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        
    }
    
}

class Front_Controller extends CI_Controller
{
	
    function __construct()
    {
        parent::__construct();
        
        //if SSL is enabled in config force it here.
        if (config_item('ssl_support') && (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == 'off'))
		{
			$CI =& get_instance();
			$CI->config->config['base_url'] = str_replace('http://', 'https://', $CI->config->config['base_url']);
			redirect($CI->uri->uri_string());
		}

    }
    
}


class Customer_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
    }
    
}


class Manager_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
    }
}


class Admin_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        //if SSL is enabled in config force it here.
        if (config_item('ssl_support') && (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == 'off'))
		{
			$CI =& get_instance();
			$CI->config->config['base_url'] = str_replace('http://', 'https://', $CI->config->config['base_url']);
			redirect($CI->uri->uri_string());
		}
		/*
			$CI =& get_instance();
          $CI->load->model('setting_model');
		  $settings	=	$CI->setting_model->get_setting();
       
		if(!empty($settings->timezone)){
			date_default_timezone_set($settings->timezone);
		}
		*/
		//check if user is logged in
       $this->check_login_status();
    	
	}

    // redirect user to login page if not logged in
    protected function check_login_status() 
    {
     	/*   
        $this->load->library('admin_auth_check');
		if(!$this->admin_auth_check->check_access('Admin')){
			redirect(base_url(''));
		}*/
		$this->CI =& get_instance();
		 $admin = $this->CI->session->userdata('admin');
        if(!$admin)
        {
			$this->CI->session->set_flashdata('error', 'Sign In To Access This Page');
            redirect(site_url('admin/login'));
        }
		
    }    
	
	public function render($page=false,$data=false)
	{
		$data	=	array();
		//$data['admin_session'] = $this->session->userdata('admin'); 
		$this->CI =& get_instance();
		//$admin = $this->CI->session->userdata('admin');
			//					$this->CI->db->where('id',$admin['id']);
		//$data['adminUser']	=	$this->CI->db->get('users')->row();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view($page,$data);
		$this->load->view('template/footer',$data);
	}
}


?>