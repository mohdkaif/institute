<?php defined('BASEPATH') OR exit('No direct script access allowed');

class St_api extends API_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('setting_model'));
	}	
	public function tasks_get($id=false)
	{	
		$id	=	1;
		$tasks = $this->setting_model->get_task($id); // return a record based on id
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		}
	}	
	public function tasks_post()
	{	//echo '<pre>'; print_r($_POST);die;
		
		if(!empty($_POST['is_file'])){
				if($_FILES['file'] ['name'] !='')
					{ 
						$config['upload_path'] = './assets/bluradmin/uploads/images/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
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
		
		$this->form_validation->set_rules('name', 'Company Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('registration_no', 'Student Registration No', 'trim|numeric');
		$this->form_validation->set_rules('receipt_no', 'Student Receipt No', 'trim|numeric');
		$this->form_validation->set_rules('faculty_receipt_no', 'Faculty Receipt No', 'trim|numeric');
		
		if(!$this->form_validation->run()) { 
		  $this->response(array('error' => validation_errors()), 400);	
		}else{
			$save['name']				=	$this->post('name');
			$save['email']				=	$this->post('email');
			$save['phone']				=	$this->post('phone');
			$save['address']			=	$this->post('address');
			$save['registration_no']	=	$this->post('registration_no');
			$save['receipt_no']			=	$this->post('receipt_no');
			$save['faculty_receipt_no']	=	$this->post('faculty_receipt_no');
			$save['batch_alert']		=	$this->post('batch_alert');
			
			if('undefined' != $this->post('logo')){
				$save['logo']	=$this->post('logo');
			}		
		}
	//echo '<pre>'; print_r($data);die;
		if($this->post('id')){
			$this->setting_model->update_task(1, $save);
		}else{
			
			$this->db->insert('settings',$save);
			if($this->db->insert_id() > 0)
			{
				$message = array('id' => $this->db->insert_id(), 'name' => $this->post('name'));
				$this->response($message, 200);
			}
		}	
	}	
	
	public function check_get()
	{	
		$admin			=	$this->session->userdata('admin');
		//echo '<pre>'; print_r($admin);die;
		if($admin['user_role']==1){	//ADMIN
			$tasks	=	array('dashboard','enquiries','expanses','inventory','students','batches','course','todo','faculties','settings','Masters','masters','reports');
		}
		if($admin['user_role']==2){	//FACULTY
			$tasks	=	$tasks	=	array('dashboard','enquiries','students','batches','faculties');
		}
		if($admin['user_role']==3){	//STUDENTS
			$tasks	=	array('dashboard','students');
		}
		
		
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		}
	}
	
	public function dashboard_count_get()
	{	
		$admin			=	$this->session->userdata('admin');
		//echo '<pre>'; print_r($admin);die;
				
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		} 
	}	
		
}

?>