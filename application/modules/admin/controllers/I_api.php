<?php defined('BASEPATH') OR exit('No direct script access allowed');

class I_api extends API_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('inventory_model'));
	}	
	public function tasks_get($id=false)
	{
		if(! $id)
		{
			$tasks = $this->inventory_model->get_all(); // return all record
		} else {
			$tasks = $this->inventory_model->get_task($id); // return a record based on id
		}
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		} 
	}	
	public function tasks_post()
	{	//echo '<pre>'; print_r($_POST);die;
		
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', '');
		$this->form_validation->set_rules('qty', 'Quantity', '');
		
		
		if(!$this->form_validation->run()) { 
		  $this->response(array('error' => validation_errors()), 400);	
		}else{
			
			$data['title']			=	$this->post('title');
			$data['description']	=	$this->post('description');
			$data['price']			=	$this->post('price');
			$data['qty']			=	$this->post('qty');
			
				
		}
		//echo '<pre>'; print_r($data);die;
		if($this->post('id')){
			$data['updated']		=	date('Y-m-d H:i:s');
			$this->inventory_model->update_task($this->post('id'), $data);
		}else{
			$data['added']		=	date('Y-m-d H:i:s');
			
			$this->db->insert('inventory',$data);
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
			$this->inventory_model->delete_task($id);
			$message = array('id' => $id, 'message' => 'DELETED!');
			$this->response($message, 200);
		}
	}
	
	
}

?>