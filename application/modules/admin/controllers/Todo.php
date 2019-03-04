<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Todo extends API_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('todo_model'));
	}
    
	
	public function tasks_get($id=false)
	{
		if(! $id)
		{
			$tasks = $this->todo_model->get_all(); // return all record
		} else {
			$tasks = $this->todo_model->get_task($id); // return a record based on id
		}
	 
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		} else {
			$this->response([], 404); // return empty
		}
	}
	
	public function tasks_post()
	{	
		$_POST = json_decode(file_get_contents("php://input"), true);
		///echo '<pre>'; print_r($_POST);die;
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
		if($this->post('id')){
			$this->todo_model->update_task($this->post('id'), $data);
		}else{
			$this->db->insert('todo',$data);
			if($this->db->insert_id() > 0)
			{
				$message = array('id' => $this->db->insert_id(), 'title' => $this->post('title'));
				$this->response($message, 200);
			}
		}	
	}
	
	public function todo_post()
	{	
		//$_POST = json_decode(file_get_contents("php://input"), true);
		//echo '<pre>'; print_r($_POST);die;
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
		if($this->post('id')){
			$this->todo_model->update_task($this->post('id'), $data);
		}else{
			$this->db->insert('todo',$data);
			if($this->db->insert_id() > 0)
			{
				$message = array('id' => $this->db->insert_id(), 'title' => $this->post('title'));
				$this->response($message, 200);
			}
		}	
	}
	
	public function tasks_put()
	{
		$_POST = $this->put();
		//echo '<pre>'; print_r($_POST);die;
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
	 
		$this->todo_model->update_task($this->post('id'), $data);
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
			$this->todo_model->delete_task($id);
			$message = array('id' => $id, 'message' => 'DELETED!');
			$this->response($message, 200);
		}
	}
	
}

?>