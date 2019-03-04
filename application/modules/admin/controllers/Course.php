<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Course extends Admin_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('course_model'));
	}
    
	
	function index()
	{
        $data['page_title'] = 'Course';
		$this->load->view('course/index',$data);
	}
	
	
	function add()
	{
        $data['page_title'] = 'Add Course';
		$this->load->view('course/add',$data);
	}
	function edit()
	{
        $data['page_title'] = 'Edit Course';
		$this->load->view('course/edit',$data);
	}
	function details()
	{
        $data['page_title'] = 'Course';
		$this->load->view('course/details',$data);
	}
	function export(){
		$data['course'] = $this->course_model->get_all();
		$this->load->view('course/export', $data);	
	}	
	
	function pdf(){
		$this->load->helper('dompdf_helper');
		$this->load->helper('download');
		$data['course'] = $this->course_model->get_all();
		//$data['body'] = 'invoice/pdf';
		$html = $this->load->view('course/pdf', $data,true);		
		pdf_create($html, 'Courses');
		

	}	
	
	function add_material()
	{
        $data['page_title'] = ' Course Study Material';
		$this->load->view('course/add_material',$data);
	}
	function edit_material()
	{
        $data['page_title'] = ' Course Study Material';
		$this->load->view('course/edit_material',$data);
	}

}

?>