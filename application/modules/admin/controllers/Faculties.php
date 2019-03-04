<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Faculties extends Admin_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('faculty_model','setting_model'));
	}
    
	
	function index()
	{
        $data['page_title'] = 'Faculties';
		$this->load->view('faculties/index',$data);
	}
	
	
	function add()
	{
        $data['page_title'] = 'Add Faculty';
		$this->load->view('faculties/add',$data);
	}
	function edit()
	{
        $data['page_title'] = 'Edit Faculty';
		$this->load->view('faculties/edit',$data);
	}
	function details()
	{
        $data['page_title'] = 'Faculties';
		$this->load->view('faculties/details',$data);
	}
	function export(){
		$data['faculties'] = $this->faculty_model->get_all();
		$this->load->view('faculties/export', $data);	
	}	
	
	function pdf(){
		$this->load->helper('dompdf_helper');
		$this->load->helper('download');
		$data['faculties'] = $this->faculty_model->get_all();
		//$data['body'] = 'invoice/pdf';
		$html = $this->load->view('faculties/pdf', $data,true);		
		pdf_create($html, 'Faculties');
	}	
	
	function course_fee()
	{
        $data['page_title'] = 'Course Fee';
		$this->load->view('faculties/course_fee_add',$data);
	}
	
	function edit_courseFee()
	{
        $data['page_title'] = 'Edit Course Fee';
		$this->load->view('faculties/course_fee_edit',$data);
	}
	
	function add_receipt()
	{
        $data['page_title'] = 'Add Receipt';
		$this->load->view('faculties/add_receipt',$data);
	}
	
	function edit_receipt()
	{
        $data['page_title'] = 'Edit Receipt';
		$this->load->view('faculties/edit_receipt',$data);
	}
	function receipt()
	{
        $data['page_title'] = 'Receipt';
		$this->load->view('faculties/receipt',$data);
	}
	
	function receiptdownload($id){
		$this->load->helper('dompdf_helper');
		$this->load->helper('download');
		$st = $this->setting_model->get_task(1); // return a record based on id
		$rs 	=   $this->faculty_model->get_receipt($id); // return a record based on id
		$data['task']	=	$rs[0];
		$data['setting']	=	$st[0];
		$html = $this->load->view('faculties/pdfrecceipt', $data,true);		
		pdf_create($html, $data['task']->receipt_no);
	}
	
	function edit_notes()
	{
        $data['page_title'] = 'Edit Notes';
		$this->load->view('faculties/edit_notes',$data);
	}
	
	function add_files()
	{
        $data['page_title'] = 'Add Files';
		$this->load->view('faculties/add_files',$data);
	}
	
	function edit_files()
	{
        $data['page_title'] = 'Edit File';
		$this->load->view('faculties/edit_files',$data);
	}

}

?>