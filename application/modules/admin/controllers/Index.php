<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends Admin_Controller 
{

	function __construct()
	{
		parent::__construct();
		//$this->load->model(array('dashboard_model'));
	}
    
	
	function index()
	{
        $data['page_title'] = 'Dashboard';
		//$value['users']	=	$this->users_model->count_users();
		
       //$this->render('dashboard/dashboard', $data);
    	$this->load->view('index_main',$data);
	}
	
	function dash()
	{
        $data['page_title'] = 'Dashboard';
		$this->load->view('dashboard/dashboard',$data);
	}
	function contentTop()
	{
        $data['page_title'] = 'contentTop';
		$this->load->view('dashboard/contentTop',$data);
	}
	function msgCenter()
	{
        $data['page_title'] = 'msgCenter';
		$this->load->view('dashboard/msgCenter/msgCenter',$data);
	}
	function ba_sidebar(){
			$admin			=	$this->session->userdata('admin');
		$data['user']	=	$this->auth->get_admin($admin['id']);
		$data['page_title'] = '';
		$this->load->view('dashboard/ba-sidebar',$data);
	}
	function pageTop(){
		$admin			=	$this->session->userdata('admin');
		$data['user']	=	$this->auth->get_admin($admin['id']);
		$data['page_title'] = '';
		$this->load->view('dashboard/pageTop',$data);
	}
	
	function piechart()
	{
        $data['page_title'] = 'Dashboard';
		$this->load->view('dashboard/dashboardPieChart/dashboardPieChart',$data);
	}
	
	function map()
	{
        $data['page_title'] = 'Dashboard';
		$this->load->view('dashboard/dashboardMap/dashboardMap',$data);
	}
	function popular()
	{
        $data['page_title'] = 'Dashboard';
		$this->load->view('dashboard/popularApp/popularApp',$data);
	}
	
	function trafficchart()
	{
        $data['page_title'] = 'Dashboard';
		$this->load->view('dashboard/trafficChart/trafficChart',$data);
	}
	function todo()
	{
        $data['page_title'] = 'Dashboard';
		$this->load->view('dashboard/dashboardTodo/dashboardTodo',$data);
	}
	
	function calendar()
	{
        $data['page_title'] = 'Dashboard';
		$this->load->view('dashboard/dashboardCalendar/dashboardCalendar',$data);
	}
	
	function linechart()
	{
        $data['page_title'] = 'Dashboard';
		$this->load->view('dashboard/dashboardLineChart/dashboardLineChart',$data);
	}
	function feed()
	{
        $data['page_title'] = 'Dashboard';
		$this->load->view('dashboard/blurFeed/blurFeed',$data);
	}
	
	
	function todos()
	{
        $data['page_title'] = 'To Do';
		$this->load->view('todo/todo',$data);
	}
	
	function add_todo()
	{
        $data['page_title'] = 'To Do';
		$this->load->view('todo/add',$data);
	}
	
	function edit_todo()
	{
        $data['page_title'] = 'To Do';
		$this->load->view('todo/edit',$data);
	}
	
	function view_todo()
	{
        $data['page_title'] = 'To Do';
		$this->load->view('todo/view',$data);
	}
	
	
	
    

}

?>