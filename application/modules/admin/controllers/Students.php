<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Students extends Admin_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('student_model','setting_model'));
	}
    
	
	function index()
	{
        $data['page_title'] = 'Students';
		$this->load->view('students/index',$data);
	}
	
	
	function add()
	{
        $data['page_title'] = 'Add Student';
		$this->load->view('students/add',$data);
	}
	function edit()
	{
        $data['page_title'] = 'Edit Student';
		$this->load->view('students/edit',$data);
	}
	function details()
	{
        $data['page_title'] = 'Student Detail';
		$this->load->view('students/details',$data);
	}
	function export(){
		$data['students'] = $this->student_model->get_all();
		$this->load->view('students/export', $data);	
	}	
	
	function pdf(){
		$this->load->helper('dompdf_helper');
		$this->load->helper('download');
		$data['students'] = $this->student_model->get_all();
		//$data['body'] = 'invoice/pdf';
		$html = $this->load->view('students/pdf', $data,true);		
		pdf_create($html, 'students');
	}	
	
	function add_batch()
	{
        $data['page_title'] = 'Add Student Batch';
		$this->load->view('students/add_batch',$data);
	}
	
	function edit_batch()
	{
        $data['page_title'] = 'Edit Student Batch';
		$this->load->view('students/edit_batch',$data);
	}
	
	function add_receipt()
	{
        $data['page_title'] = 'Add Receipt';
		$this->load->view('students/add_receipt',$data);
	}
	
	function edit_receipt()
	{
        $data['page_title'] = 'Edit Receipt';
		$this->load->view('students/edit_receipt',$data);
	}
	
	function receipt()
	{
        $data['page_title'] = 'Receipt';
		$this->load->view('students/receipt',$data);
	}
	
	function receiptdownload($id){
		$this->load->helper('dompdf_helper');
		$this->load->helper('download');
		$st = $this->setting_model->get_task(1); // return a record based on id
		$rs 	=   $this->student_model->get_receipt($id); // return a record based on id
		$data['task']	=	$rs[0];
		$data['setting']	=	$st[0];
		$html = $this->load->view('students/pdfreceipt', $data,true);		
		pdf_create($html, $data['task']->receipt_no);
	}
	function add_certificate()
	{
        $data['page_title'] = 'Add Certificate';
		$this->load->view('students/add_certificate',$data);
	}
	function edit_certificate()
	{
        $data['page_title'] = 'Edit Certificate';
		$this->load->view('students/edit_certificate',$data);
	}
	
	function edit_notes()
	{
        $data['page_title'] = 'Edit Notes';
		$this->load->view('students/edit_notes',$data);
	}
	function add_files()
	{
        $data['page_title'] = 'Add Files';
		$this->load->view('students/add_files',$data);
	}
	function edit_files()
	{
        $data['page_title'] = 'Edit Files';
		$this->load->view('students/edit_files',$data);
	}
}
?>