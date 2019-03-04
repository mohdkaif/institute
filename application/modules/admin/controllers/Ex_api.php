<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ex_api extends API_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('expanses_model'));
	}	
	public function tasks_get($id=false)
	{
		if(! $id)
		{
			$tasks = $this->expanses_model->get_all(); // return all record
		} else {
			$tasks = $this->expanses_model->get_task($id); // return a record based on id
		}
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		}
	}	
	public function tasks_post()
	{	//echo '<pre>'; print_r($_POST);die;
		
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		$this->form_validation->set_rules('category_id', 'Expanses Category', 'required');
		
		if(!$this->form_validation->run()) { 
		  $this->response(array('error' => validation_errors()), 400);	
		}else{
			$data['date']			=	$this->post('date');
			$data['title']			=	$this->post('title');
			$data['description']	=	$this->post('description');
			$data['amount']			=	$this->post('amount');
			$data['payment_method']	=	$this->post('payment_method');
			$data['status']			=	$this->post('status');
			$data['category_id']	=	$this->post('category_id');
				
		}
		//echo '<pre>'; print_r($data);die;
		if($this->post('id')){
			$this->expanses_model->update_task($this->post('id'), $data);
		}else{
			
			$this->db->insert('expanses',$data);
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
			$this->expanses_model->delete_task($id);
			$message = array('id' => $id, 'message' => 'DELETED!');
			$this->response($message, 200);
		}
	}
	
	
}

?>