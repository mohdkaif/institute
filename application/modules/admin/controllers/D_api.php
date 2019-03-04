<?php defined('BASEPATH') OR exit('No direct script access allowed');

class D_api extends API_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('dashboard_model'));
	}	
	
	public function dashboard_count_get()
	{	
		$admin			=	$this->session->userdata('admin');
		
		$students	=	$this->dashboard_model->get_students();		
		$enquiries	=	$this->dashboard_model->get_enquiries();		
		$batches	=	$this->dashboard_model->get_batches();	
		$courses	=	$this->dashboard_model->get_courses();		
		
		$tasks 		=	array('students'=>$students->students,'enquiries'=>$enquiries->enquiries,'batches'=>$batches->batches,'courses'=>$courses->courses);
		
		///echo '<pre>'; print_r($tasks);die;
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		}
	}	
	
	public function revenue_get(){
		$startDate = new DateTime('first day of this month - 11 months');
		$endDate   = new DateTime('this month + 1 months');//$endDate   = new DateTime('this month');
		$interval  = new DateInterval('P1M'); // P1M => 1 month per iteration
		
		$datePeriod = new DatePeriod($startDate, $interval, $endDate);
		
		foreach($datePeriod as $dt) {
		// $data['new Date('. $dt->format('Y').', '. $dt->format('m') .')']	= 	$this->dashboard_model->get_revenue($dt->format('m'),$dt->format('Y'));
		$data[$dt->format('M')]	= 	$this->dashboard_model->get_revenue($dt->format('m'),$dt->format('Y'));
		 // echo $dt->format('m');
		 // echo '/'.$dt->format('Y');
		  //echo '<br>';
		  //array_push($months, $dt->format('M'));
		}
		//echo '<pre>'; print_r($data);die;
		$i=0;
		foreach($data as $key	=> $val){
			//echo '<pre>';print_r($val);
			$tasks[$i]['date']	= $key;	//new Date(2012, 11)
			$tasks[$i]['duration']	= $val['value'];	
		$i++;}
	//	echo '<pre>'; print_r($tasks);die;
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		}
	}
	
	public function todo_get(){
		$tasks	= 	$this->dashboard_model->get_todos();
		//echo '<pre>'; print_r($tasks);die;
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		} else {
			$this->response([], 404); // return empty
		}
	}
	
	public function events_get(){
		$events	= 	$this->dashboard_model->get_events();
		//echo '<pre>'; print_r($tasks);die;
		$i=0;
		foreach($events as $new){
				$tasks[$i]['title']	=	$new->title;
				$tasks[$i]['start']	=	date("Y-m-d", strtotime($new->date));
				//$tasks[$i]['start']	=	$new->date;
				$tasks[$i]['color']	=	'#005562';
				$tasks[$i]['allDay']=true;
			$i++;
		}
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		}
	}
	
	
	public function students_get(){
		$startDate = new DateTime('first day of this month - 11 months');
		$endDate   = new DateTime('this month + 1 months');
		$interval  = new DateInterval('P1M'); // P1M => 1 month per iteration
		//echo date('Y-m-d', strtotime($endDate));
		$datePeriod = new DatePeriod($startDate, $interval, $endDate);
		
		foreach($datePeriod as $dt) {
		// $data['new Date('. $dt->format('Y').', '. $dt->format('m') .')']	= 	$this->dashboard_model->get_revenue($dt->format('m'),$dt->format('Y'));
		$data[$dt->format('M')]	= 	$this->dashboard_model->get_studentsCount($dt->format('m'),$dt->format('Y'));
		 // echo $dt->format('m');
		 // echo '/'.$dt->format('Y');
		  //echo '<br>';
		  //array_push($months, $dt->format('M'));
		}
		//echo '<pre>'; print_r($data);die;
		$i=0;
		foreach($data as $key	=> $val){
			//echo '<pre>';print_r($val);
			$tasks[$i]['date']	= $key;	//new Date(2012, 11)
			$tasks[$i]['duration']	= $val['value'];	
		$i++;}
	//	echo '<pre>'; print_r($tasks);die;
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		}
	}
		
}

?>