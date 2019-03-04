<?php defined('BASEPATH') OR exit('No direct script access allowed');

class B_api extends API_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('batch_model'));
		$this->load->model(array('course_model'));
		$this->load->model(array('faculty_model'));
	}
	
	function notifications_all_get(){
		$data		=	array();
		$batches	=	$this->batch_model->get_notifications();
		$i=0;
		foreach($batches as $new){
				$data[$i]['template']	=	$new->title.' ending on '.date('d/m/Y', strtotime($new->end_date));
				$ids[]			=	$new->id;
		$i++;}
		if(!empty($ids)){
			$this->batch_model->update_notifications($ids);
		}
		//echo '<pre>'; print_r($ids);die;
		if($data)
		{
			$this->response($data, 200); // return success code if record exist
		}
	}
	function notifications_get(){
		$data		=	array();
		$batches	=	$this->batch_model->get_notifications();
		$i=0;
		foreach($batches as $new){
				$data[$i]['template']	=	$new->title.' ending on '.date('d/m/Y', strtotime($new->end_date));
		$i++;}
		if($data)
		{
			$this->response($data, 200); // return success code if record exist
		}
	}
	
	function new_notifications_get(){
		$data		=	array();
		$batches	=	$this->batch_model->get_notifications_new();
		$i=0;
		foreach($batches as $new){
				$data[$i]['template']	=	$new->title.' ending on '.date('d/m/Y', strtotime($new->end_date));
				$ids[]			=	$new->id;
		$i++;}
	
		//echo '<pre>'; print_r($batches);die;
		if($data)
		{
			$this->response($data, 200); // return success code if record exist
		} 
	}
	
	public function report_get($id=false){
		//$batch	=	$this->batch_model->get_task($id);	
		$batch	=	$this->batch_model->get_batch_fees($id);
		//$amount	=	$batch[0]->fees;
		$totfees	=	$batch->students*$batch->fees;
	//	echo '<pre>-->'; print_r($batch);die;
		$r_fees	=	$totfees-$batch->paid;
		$tot_per	=	  $batch->paid/$totfees*100;
		$r_per		=	  $r_fees/$totfees*100;
		$data['report']		=	array(intval($batch->paid),intval($r_fees));
		
		$data['label']		=	array("Paid:".intval($tot_per)."%","Remaining:".intval($r_per)."%");
		
		//echo '<pre>'; print_r($data);die;
		if($data)
		{
			$this->response($data, 200); // return success code if record exist
		} else {
			$this->response([], 404); // return empty
		}
	}
 	function getEndDate_get($cid,$start_date){
		$course = $this->course_model->get_task($cid); // Get A Course
		if(!empty($course[0]->duration)){
			$date	=	 date('Y-m-d', strtotime($start_date. ' + '.$course[0]->duration.' days'));
		}else{
			$date	=	date("Y-m-d");
		}
		if($date)
		{
			$this->response($date, 200); // return success code if record exist
		} else {
			$this->response([], 404); // return empty
		}
	}
	public function select_faculty_get($id=false)
	{
		$tasks = $this->batch_model->get_task($id); // return a record based on id
		foreach($tasks as $task){
			$task	=	$task;
		}
		$fids	  =	json_decode($task->faculties);
		if(!empty($fids)){
			$tasks = $this->batch_model->get_faulty_by_batch($fids); // return all record
		}else{
		
			$tasks	=	array();
		}	 
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		} else {
			$this->response([], 404); // return empty
		}
	}   
	
	public function tasks_get($id=false)
	{
		if(! $id)
		{
			$tasks = $this->batch_model->get_all(); // return all record
		} else {
			$tasks = $this->batch_model->get_task($id); // return a record based on id
		}/*
			$t=array();
			$i=0;
			foreach($tasks as $ind	=> $task){
					$fids	=	json_decode($task->faculties);
				//$tasks[]	=	$task;
				
				$t[$ind]['task']	=	$task;
				if(!empty($fids)){
					$t[$ind]['task']->faculties	=	$this->batch_model->get_faculties($fids);
				}
			$i++;}*/
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		}
	}
	
	public function tasks_post()
	{	//$_POST = json_decode(file_get_contents("php://input"), true);
		//echo '<pre>'; print_r($_GET);
		
		//echo '<pre>'; print_r(json_decode($_POST['oldcases']));die;
		//echo '<pre>'; print_r($class);die;
		
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('category_id', 'Course Category', 'trim|required');
		$this->form_validation->set_rules('course_id', 'Course', 'trim|required');
		$this->form_validation->set_rules('fees', 'Fees', 'trim|required');
		$this->form_validation->set_rules('duration', 'Duration', 'trim|required');
		$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
		$this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
		$this->form_validation->set_rules('faculty_id', 'Faculty', 'required');
		//$this->form_validation->set_rules('faculties', 'Faculties', 'required');
		
		if(!$this->form_validation->run()) { 
		  $this->response(array('error' => validation_errors()), 400);	
		}else{
			
			$data['title']			=	$this->post('title');
			$data['category_id']	=	$this->post('category_id');
			$data['course_id']		=	$this->post('course_id');
			$data['fees']			=	$this->post('fees');
			$data['duration']		=	$this->post('duration');
			$data['description']	=	$this->post('description');
			$data['batch_time']		=	$this->post('batch_time');
			$data['start_date']		=	$this->post('start_date');
			$data['end_date']		=	$this->post('end_date');
			$data['faculty_id']		=	$this->post('faculty_id');
			$data['agreed_fee']		=	$this->post('agreed_fee');
			//$data['faculties']		=	json_encode($facs);
					
		}
		//echo '<pre>'; print_r($data);die;
		if($this->post('id')){
			$this->batch_model->update_task($this->post('id'), $data);
		}else{
			$this->db->insert('batches',$data);
			if($this->db->insert_id() > 0)
			{
				$message = array('id' => $this->db->insert_id(), 'name' => $this->post('name'));
				$this->response($message, 200);
			}
		}	
	}
	
	public function tasks_delete($id=NULL)
	{
		if($id == NULL)
		{
			$message = array('error' => 'Missing delete data: id');
			$this->response($message, 400);
		} else {
			$this->batch_model->delete_task($id);
			$message = array('id' => $id, 'message' => 'DELETED!');
			$this->response($message, 200);
		}
	}
	
	
	public function students_get($id=false)
	{
		$tasks = $this->batch_model->get_all_studentsByBatach($id); // return all record
		
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		} else {
			$this->response([], 404); // return empty
		}
	}
	
	
}

?>