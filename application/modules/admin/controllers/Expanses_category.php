<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Expanses_category extends Admin_Controller 
{

	function __construct()
	{
		parent::__construct();
		
	}
    
	
	function index()
	{
        $data['page_title'] = 'Expanses Category';
		$this->load->view('expanses_category/index',$data);
	}
	
	
	function add()
	{
        $data['page_title'] = 'Add Expanses Category';
		$this->load->view('expanses_category/add',$data);
	}
	function edit()
	{
        $data['page_title'] = 'Edit Expanses Category';
		$this->load->view('expanses_category/edit',$data);
	}
	

}

?>