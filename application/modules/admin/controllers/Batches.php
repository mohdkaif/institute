<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Batches extends Admin_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('batch_model'));
	}
    
	
	function index()
	{
        $data['page_title'] = 'Batches';
		$this->load->view('batches/index',$data);
	}
	
	function notifications(){
        $data['page_title'] = 'Batches';
		$this->load->view('batches/notifications',$data);
	}	
	
	function add()
	{
        $data['page_title'] = 'Add Batch';
		$this->load->view('batches/add',$data);
	}
	function edit()
	{
        $data['page_title'] = 'Edit Faculty';
		$this->load->view('batches/edit',$data);
	}
	function details()
	{
        $data['page_title'] = 'Batches';
		$this->load->view('batches/details',$data);
	}
	function export(){
		$data['batches'] = $this->batch_model->get_all();
		$this->load->view('batches/export', $data);	
	}	
	
	function pdf(){
		$this->load->helper('dompdf_helper');
		$this->load->helper('download');
		$data['batches'] = $this->batch_model->get_all();
		//$data['body'] = 'invoice/pdf';
		$html = $this->load->view('batches/pdf', $data,true);		
		pdf_create($html, 'batches');
	}	
	
}

?>