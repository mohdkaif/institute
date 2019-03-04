<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends Admin_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('batch_model'));
	}
    
	
	function index()
	{
        $data['page_title'] = 'Settings';
		$this->load->view('settings/index',$data);
	}
	
}

?>