<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Expanses extends Admin_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('expanses_model'));
	}
    
	
	function index()
	{
        $data['page_title'] = 'Expanses';
		$this->load->view('expanses/index',$data);
	}
	
	
	function add()
	{
        $data['page_title'] = 'Add Expanses';
		$this->load->view('expanses/add',$data);
	}
	function edit()
	{
        $data['page_title'] = 'Edit Expanses';
		$this->load->view('expanses/edit',$data);
	}
	function view()
	{
        $data['page_title'] = 'Expanses';
		$this->load->view('expanses/view',$data);
	}
	function export(){
		$data['expanses'] = $this->expanses_model->get_all();
		$this->load->view('expanses/export', $data);	
	}	
	
	function pdf(){
		$this->load->helper('dompdf_helper');
		$this->load->helper('download');
		$data['expanses'] = $this->expanses_model->get_all();
		//$data['body'] = 'invoice/pdf';
		$html = $this->load->view('expanses/pdf', $data,true);		
		pdf_create($html, 'Expanses');
		
	}	
	

}

?>