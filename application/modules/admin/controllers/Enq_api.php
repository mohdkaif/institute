<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Enq_api extends API_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('enquiry_model'));
	}
    
	
	public function tasks_get($id=false)
	{
		if(! $id)
		{
			$tasks = $this->enquiry_model->get_all(); // return all record
		} else {
			$tasks = $this->enquiry_model->get_task($id); // return a record based on id
		}
	 
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		} 
	}
	
	public function tasks_post()
	{	
		//$_POST = json_decode(file_get_contents("php://input"), true);
		//echo '<pre>'; print_r($_POST);die;
		$this->form_validation->set_rules('date_time', 'Date Time', 'required');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('course_id', 'Course', 'required');
		if(!$this->form_validation->run()) { 
		  // $this->output->set_output(validation_errors()); 
		  $this->response(array('error' => validation_errors()), 400);	
			//$this->response(array('error' => 'Missing post data: title'), 400);	
		}else{
			$data = array(
				'date_time' => $this->post('date_time'),
				'name' => $this->post('name'),
				'mobile' => $this->post('mobile'),
				'preferred_time' => $this->post('preferred_time'),
				'status' => $this->post('status'),
				'course_id' => $this->post('course_id'),
				'gender' => $this->post('gender'),
				'dob' => $this->post('dob'),
				'remark' => $this->post('remark'),
				'handeled_by' => $this->post('handeled_by'),
			);
		}
		if($this->post('id')){
			$this->enquiry_model->update_task($this->post('id'), $data);
		}else{
			$this->db->insert('enquiries',$data);
			if($this->db->insert_id() > 0)
			{
				$message = array('id' => $this->db->insert_id(), 'name' => $this->post('name'));
				$this->response($message, 200);
			}
		}	
	}
	
	public function tasks_put()
	{
		$_POST = $this->put();
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		if(!$this->form_validation->run()) { 
		  // $this->output->set_output(validation_errors()); 
		  $this->response(array('error' => validation_errors()), 400);	
			//$this->response(array('error' => 'Missing post data: title'), 400);	
		}else{
			$data = array(
				'title' => $this->post('title'),
				'status' => $this->post('status'),
				'date' => $this->post('date'),
				'description' => $this->post('description')
			);
		}
		
		if(! $this->put('title'))
		{
			$this->response(array('error' => 'Task title is required'), 400);
		}
	 
		$this->enquiry_model->update_task($this->post('id'), $data);
		$message = array('success' => $this->post('title').' Updated!');
		$this->response($message, 200);
	}		
	
	public function tasks_delete($id=NULL)
	{
		if($id == NULL)
		{
			$message = array('error' => 'Missing delete data: id');
			$this->response($message, 400);
		} else {
			$this->enquiry_model->delete_task($id);
			$message = array('id' => $id, 'message' => 'DELETED!');
			$this->response($message, 200);
		}
	}
	
}

?>