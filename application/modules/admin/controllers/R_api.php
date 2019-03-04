<?php defined('BASEPATH') OR exit('No direct script access allowed');

class R_api extends API_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('report_model'));
		
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
			$faculties	=	json_decode($this->post('faculties'));
			$facs	=	array();
			foreach($faculties as $fac){
				$facs[]	= $fac->id;
			}
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
	
	
	
	
}

?>