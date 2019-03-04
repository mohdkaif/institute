<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Enquiries_status extends Admin_Controller 
{

	function __construct()
	{
		parent::__construct();
		//$this->load->model(array('dashboard_model'));
	}
    
	
	function index()
	{
        $data['page_title'] = 'Enquiries_status';
		$this->load->view('enquiries_status/index',$data);
	}
	
	
	function add()
	{
        $data['page_title'] = 'Add Enquiries status';
		$this->load->view('enquiries_status/add',$data);
	}
	function edit()
	{
        $data['page_title'] = 'Edit Enquiries status';
		$this->load->view('enquiries_status/edit',$data);
	}
	

}

?>