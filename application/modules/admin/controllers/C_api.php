<?php defined('BASEPATH') OR exit('No direct script access allowed');

class C_api extends API_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('course_model','faculty_model'));
	}
	
	public function enquries_get($id=false)
	{
		$tasks = $this->course_model->get_enquries($id); // return a record based on id
	 
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		} 
	}
	public function students_get($id=false)
	{
		$tasks = $this->course_model->get_students($id); // return a record based on id
	 
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		} 
	}
	
	public function faculties_get($id=false)
	{
		$tasks = $this->course_model->get_faculties($id); // return a record based on id
	 			$t=array();
			$i=0;
			foreach($tasks as $ind	=> $task){
					$cids	=	json_decode($task->courses);
				//$tasks[]	=	$task;
				
				$t[$ind]['task']	=	$task;
				$t[$ind]['task']->facultycourse	=	$this->faculty_model->get_facultyCourse($cids);
			$i++;}
		
		if($t)
		{
			$this->response($tasks, 200); // return success code if record exist
		} 
	}
	
	public function batches_get($id=false)
	{
		$tasks = $this->course_model->get_batches($id); // return a record based on id
	 
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		} 
	}
	
	public function materials_get($id=false)
	{
		$tasks = $this->course_model->get_materials($id); // return a record based on id
	 
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		} 
	}
	
	public function material_get($id=false)
	{
		$tasks = $this->course_model->get_material($id); // return a record based on id
	 
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		} 
	}
	
	public function material_post()
	{	
		//echo '<pre>'; print_r(json_decode($_POST['oldcases']));die;
		//echo '<pre>'; print_r($_FILES);die;
		
		if(!empty($_POST['is_file'])){
				if($_FILES['file'] ['name'] !='')
					{ 
						$config['upload_path'] = './assets/bluradmin/uploads/files';
						$config['allowed_types'] = '*';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
				
						$this->load->library('upload', $config);
				
						if ( !$img = $this->upload->do_upload('file'))
							{
	
							}
							else
							{
								$img_data = array('upload_data' => $this->upload->data());
								$image = $img_data['upload_data']['file_name'];
								//echo json_encode($image);	
								$message = array('image' => $image, 'message' => 'Image Uploaded!');
								$this->response($message, 200);
							}
						exit;
					}
		}
		
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		
		if(!$this->form_validation->run()) { 
		  $this->response(array('error' => validation_errors()), 400);	
		}else{
			
			//echo '<pre>'; print_r($stu_reg);die;
			$data['course_id']			=	$this->post('course_id');
			$data['title']			=	$this->post('title');
			
			if('undefined' != $this->post('image')){
				$data['file_name']	=$this->post('image');
			}
			
				
		}
		//echo '<pre>'; print_r($data);die;
		if($this->post('id')){
			
			$this->course_model->update_material($this->post('id'), $data);
		}else{
			$this->db->insert('study_material',$data);
			if($this->db->insert_id() > 0)
			{
				$message = array('id' => $this->db->insert_id(), 'name' => $this->post('title'));
				$this->response($message, 200);
			}
		}	
	}
	
	public function c_by_category_get($id)
    {
		if(! $id)
		{
			$tasks = $this->course_model->get_courses(); // return all record
		} else {
			$tasks = $this->course_model->get_course_by_category($id); // return a record based on id
		}
	 
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		} else {
			$this->response([], 404); // return empty
		}
	}
	public function classes_get($id=false)
	{
		if(! $id)
		{
			$tasks = $this->course_model->get_courses(); // return all record
		} else {
			$tasks = $this->course_model->get_task($id); // return a record based on id
		}
	 
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		} else {
			$this->response([], 404); // return empty
		}
	}
	
	public function select_classes_get($id=false)
	{
		$faculty = $this->course_model->get_faculty($id); // return a record based on id
		$fcids	=	json_decode($faculty->courses);
		if(!empty($fcids)){
			$tasks = $this->course_model->get_courses_by_faculty($fcids); // return all record
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
			$tasks = $this->course_model->get_all(); // return all record
		} else {
			$tasks = $this->course_model->get_task($id); // return a record based on id
		}
	 
	 	if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		}
	}
	
	public function tasks_post()
	{	
		$_POST = json_decode(file_get_contents("php://input"), true);
		//echo '<pre>'; print_r($_POST);die;
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('category_id', 'Course Category', 'trim|required');
		if(!$this->form_validation->run()) { 
		  // $this->output->set_output(validation_errors()); 
		  $this->response(array('error' => validation_errors()), 400);	
			//$this->response(array('error' => 'Missing post data: title'), 400);	
		}else{
			$data = array(
				'title' => $this->post('title'),
				'category_id' => $this->post('category_id'),
				'duration' => $this->post('duration'),
				'duration_type' => $this->post('duration_type'),
				'fees' => $this->post('fees'),
				'description' => $this->post('description'),
			);
		}
		if($this->post('id')){
			$this->course_model->update_task($this->post('id'), $data);
		}else{
			$this->db->insert('courses',$data);
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
	 
		$this->course_model->update_task($this->post('id'), $data);
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
			$this->course_model->delete_task($id);
			$message = array('id' => $id, 'message' => 'DELETED!');
			$this->response($message, 200);
		}
	}
	
	public function material_delete($id=NULL)
	{
		if($id == NULL)
		{
			$message = array('error' => 'Missing delete data: id');
			$this->response($message, 400);
		} else {
			$this->course_model->delete_material($id);
			$message = array('id' => $id, 'message' => 'DELETED!');
			$this->response($message, 200);
		}
	}
	
}

?>