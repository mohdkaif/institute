<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Course_category extends Admin_Controller 
{

	function __construct()
	{
		parent::__construct();
		//$this->load->model(array('dashboard_model'));
	}
    
	
	function index()
	{
        $data['page_title'] = 'Course Category';
		$this->load->view('course_category/index',$data);
	}
	
	
	function add()
	{
        $data['page_title'] = 'Add Course Category';
		$this->load->view('course_category/add',$data);
	}
	function edit()
	{
        $data['page_title'] = 'Edit Course Category';
		$this->load->view('course_category/edit',$data);
	}
	

}

?>