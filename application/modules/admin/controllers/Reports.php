<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends Admin_Controller 
{

	function __construct()
	{	
		parent::__construct();
		$this->load->model(array('batch_model'));
	}
    
	
	function index()
	{
        $data['page_title'] = 'Reports';
		$this->load->view('reports/index',$data);
	}
	
	
}

?>