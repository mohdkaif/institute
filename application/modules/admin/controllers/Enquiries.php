<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Enquiries extends Admin_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('enquiry_model'));
	}
    
	
	function index()
	{
        $data['page_title'] = 'Enquiry';
		$this->load->view('enquiries/index',$data);
	}
	
	
	function add()
	{
        $data['page_title'] = 'Add Enquiry';
		$this->load->view('enquiries/add',$data);
	}
	function edit()
	{
        $data['page_title'] = 'Edit Enquiry';
		$this->load->view('enquiries/edit',$data);
	}
	function view()
	{
        $data['page_title'] = 'Enquiries';
		$this->load->view('enquiries/view',$data);
	}
	function export(){
		$data['enquiries'] = $this->enquiry_model->get_all();
		$this->load->view('enquiries/export', $data);	
	}	
	
	function pdf(){
		$this->load->helper('dompdf_helper');
		$this->load->helper('download');
		$data['enquiries'] = $this->enquiry_model->get_all();
		//$data['body'] = 'invoice/pdf';
		$html = $this->load->view('enquiries/pdf', $data,true);		
		pdf_create($html, 'Enquiries');
		

	}	
	

}

?>