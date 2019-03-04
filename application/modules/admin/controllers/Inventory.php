<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Inventory extends Admin_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('inventory_model'));
	}
    
	
	function index()
	{
        $data['page_title'] = 'Inventory';
		$this->load->view('inventory/index',$data);
	}
	
	
	function add()
	{
        $data['page_title'] = 'Add Inventory';
		$this->load->view('inventory/add',$data);
	}
	function edit()
	{
        $data['page_title'] = 'Edit Inventory';
		$this->load->view('inventory/edit',$data);
	}
	function view()
	{
        $data['page_title'] = 'Inventory';
		$this->load->view('inventory/view',$data);
	}
	function export(){
		$data['inventory'] = $this->inventory_model->get_all();
		$this->load->view('inventory/export', $data);	
	}	
	
	function pdf(){
		$this->load->helper('dompdf_helper');
		$this->load->helper('download');
		$data['inventory'] = $this->inventory_model->get_all();
		//$data['body'] = 'invoice/pdf';
		$html = $this->load->view('inventory/pdf', $data,true);		
		pdf_create($html, 'Inventory');
		

	}	
	

}

?>