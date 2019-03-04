<?php defined('BASEPATH') OR exit('No direct script access allowed');

class S_api extends API_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('student_model','batch_model','enquiry_model','student_model'));
		
	}
	function getFees_get($sid,$bid){
				
				$batch	=	$this->batch_model->get_task($bid);	
				
				$paid	=	$this->student_model->get_received_payment($sid,$bid);	
				$r_amount	=	$batch[0]->fees-$paid->amount;
				//echo '<pre>'; print_r($paid);die;
				$tasks	=	array('r_amount'	=> $r_amount,'fees'	=> $batch[0]->fees);
				if($tasks)
				{
					$this->response($tasks, 200); // return success code if record exist
				}
	}
	public function registrationNo_get(){
				$setting	=	$this->student_model->get_setting();	
				$stu_reg	=	$this->student_model->get_registrationNo();
				if($stu_reg->registration_no==0){
					$registration_no	=	$setting->registration_no;
				}else{
					$registration_no	=	$stu_reg->registration_no + 1;
				}
				
				if($registration_no)
				{
					$this->response($registration_no, 200); // return success code if record exist
				}		
				
	}
	
	public function receiptNo_get(){
				$setting	=	$this->student_model->get_setting();	
				$stu		=	$this->student_model->get_receiptNo();
				if($stu->receipt_no==0){
					$receipt_no	=	$setting->receipt_no;
				}else{
					$receipt_no	=	$stu->receipt_no + 1;
				}
				
				if($receipt_no)
				{
					$this->response($receipt_no, 200); // return success code if record exist
				} 
	
	}
	
	
	public function getBatches_get($id){
		if(! $id)
		{
			$tasks = $this->batch_model->get_all(); // return all record
		} else {
			$tasks = $this->student_model->get_batches_by_course($id); // return a record based on id
		}
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		}
	}
	
	public function batches_get($id){
		if(! $id)
		{
			$tasks = $this->student_model->get_batches($id); // return all record
		} else {
			$tasks = $this->student_model->get_batches($id); // return a record based on id
		}
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		}
	}
	public function tasks_get($id=false)
	{
		if(! $id)
		{
			$tasks = $this->student_model->get_all(); // return all record
		} else {
			$tasks = $this->student_model->get_task($id); // return a record based on id
		}
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		}
	}	
	public function tasks_post(){
			
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
		
		$this->form_validation->set_rules('registration', 'Registration', 'trim|required');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('gardian_name', 'Gardian Name', 'trim|required');
		$this->form_validation->set_rules('gardian_mobile', 'Gardian Mobile', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('dob', 'DOB', 'required');
		//$this->form_validation->set_rules('batch_id', 'Batch', 'required');
		//$this->form_validation->set_rules('course_id', 'Course', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
		
		if(!$this->post('id')){
			$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[32]|is_unique[users.username]');
		}
		//echo $this->post('registration_no').'-->'.$this->post('oldregistration_no');die;
		if($this->post('registration_no') == $this->post('oldregistration_no')) {
		  	$this->form_validation->set_rules('registration_no', 'Registration No', 'required');
		} else {
		  $this->form_validation->set_rules('registration_no', 'Registration No', 'required|is_unique[users.registration_no]');
		}
		
		if ($this->post('password') != '' || $this->post('confirm') != '' || !$this->post('id'))
			{
				$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
				$this->form_validation->set_rules('confirm', 'Confirm Password', 'required|matches[password]');
			}
		if(!$this->form_validation->run()) { 
		  // $this->output->set_output(validation_errors()); 
		  $this->response(array('error' => validation_errors()), 400);	
			//$this->response(array('error' => 'Missing post data: title'), 400);	
		}else{
			
			//echo '<pre>'; print_r($stu_reg);die;
			if ($this->post('password') != '' || !$this->post('id'))
			{
				$data['password']	= sha1($this->post('password'));
			}
			$data['registration']	=	$this->post('registration');
			$data['registration_no']	=	$this->post('registration_no');
			$data['enquiry_id']		=	$this->post('enquiry_id');
			$data['name']			=	$this->post('name');
			$data['gardian_name']	=	$this->post('gardian_name');
			$data['gardian_mobile']	=	$this->post('gardian_mobile');
			$data['username']		=	$this->post('username');
			$data['email']			=	$this->post('email');
			$data['mobile']			=	$this->post('mobile');
			
			if('undefined' != $this->post('image')){
				$data['image']	=$this->post('image');
			}
			
			$data['gender']			=	$this->post('gender');
			$data['dob']			=	$this->post('dob');
			$data['current_address']= 	$this->post('current_address');
			
			$data['user_role']		=	3;
				
		}
		//echo '<pre>'; print_r($data);die;
		if($this->post('id')){
			
			$this->student_model->update_task($this->post('id'), $data);
		}else{
			$data['added']		=	date('Y-m-d');
			
			$this->db->insert('users',$data);
			if($this->db->insert_id() > 0)
			{
				$save_batch['student_id']		=	$this->db->insert_id();
				$save_batch['course_id']		=	$this->post('course_id');
				$save_batch['batch_id']			=	$this->post('batch_id');
				$save_batch['added']			=	date('Y-m-d');
				$this->student_model->save_batch($save_batch);	
				
				//Student From Enquiry
				$enq_id	=	$this->post('enquiry_id');
				if(!empty($enq_id)){
				
					if($enq_id > 0){
						$enq['admitted']		= 1;
						$this->enquiry_model->update_task($enq_id,$enq);				
					}
				}
				
				
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
			$this->student_model->delete_task($id);
			$message = array('id' => $id, 'message' => 'DELETED!');
			$this->response($message, 200);
		}
	}
	
	
	public function batches_post($id=false)
	{	
			
		//echo $id;die;
		$this->form_validation->set_rules('batch_id', 'Batch', 'required');
		$this->form_validation->set_rules('course_id', 'Course', 'required');
		
		if(!$this->form_validation->run()) { 
		  
		  $this->response(array('error' => validation_errors()), 400);	
			
		}else{
				$save_batch['student_id']		=	$this->post('student_id');
				$save_batch['course_id']		=	$this->post('course_id');
				$save_batch['batch_id']			=	$this->post('batch_id');
				
		}
		//echo '<pre>'; print_r($data);die;
		if($this->post('id')){
			$this->student_model->update_batch($this->post('id'), $save_batch);
			
		}else{
				$save_batch['added']			=	date('Y-m-d');
				$pkey	=	$this->student_model->save_batch($save_batch);	
				$message = array('id' => $pkey, 'name' => $this->post('batch_id'));
				$this->response($message, 200);
			
		}	
	}	

	
	
	
	public function batch_get($id=false)
	{
		$tasks = $this->student_model->get_batch($id);
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		}
	}
	
	
	public function batch_delete($id=NULL)
	{
		if($id == NULL)
		{
			$message = array('error' => 'Missing delete data: id');
			$this->response($message, 400);
		} else {
			$this->student_model->delete_batch($id);
			$message = array('id' => $id, 'message' => 'DELETED!');
			$this->response($message, 200);
		}
	}
	
	public function receipts_post($id=false)
	{	
		$this->form_validation->set_rules('batch_id', 'Batch', 'required');
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		$this->form_validation->set_rules('payment_method', 'Payment Method', 'required');
		if($this->post('receipt_no') == $this->post('oldreceipt_no')) {
		  	$this->form_validation->set_rules('receipt_no', 'Receipt No', 'required');
		} else {
		  $this->form_validation->set_rules('receipt_no', 'Receipt No', 'required|is_unique[receipts.receipt_no]');
		}
		if(!$this->form_validation->run()) { 
		  
		  $this->response(array('error' => validation_errors()), 400);	
			
		}else{
				$save_receipt['receipt_no']		=	$this->post('receipt_no');
				$save_receipt['user_id']		=	$this->post('student_id');
				$save_receipt['batch_id']		=	$this->post('batch_id');
				$save_receipt['amount']			=	$this->post('amount');
				$save_receipt['remark']			=	$this->post('remark');
				$save_receipt['payment_method']	=	$this->post('payment_method');
				$save_receipt['date']			=	$this->post('date');
		}
		//echo '<pre>'; print_r($data);die;
		if($this->post('id')){
			$this->student_model->update_receipt($this->post('id'), $save_receipt);
			
		}else{
				
				$this->db->insert('receipts',$save_receipt);
				if($this->db->insert_id() > 0)
				{
					$message = array('id' => $this->db->insert_id(), 'name' => $this->post('name'));
					$this->response($message, 200);
				}
			
		}	
	}
	
	
	public function receipts_get($id=false)
	{
		$tasks = $this->student_model->get_receipts($id); // return a record based on id
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		}
	}	
	public function receipt_get($id=false)
	{
		$tasks = $this->student_model->get_receipt($id); // return a record based on id
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		} 
	}
	
	public function receipts_delete($id=NULL)
	{
		if($id == NULL)
		{
			$message = array('error' => 'Missing delete data: id');
			$this->response($message, 400);
		} else {
			$this->student_model->delete_receipt($id);
			$message = array('id' => $id, 'message' => 'DELETED!');
			$this->response($message, 200);
		}
	}
	
	public function certificates_post()
	{	
		//echo '<pre>'; print_r(json_decode($_POST['oldcases']));die;
		//echo '<pre>'; print_r($_FILES);die;
		
		if(!empty($_POST['is_file'])){
				if($_FILES['file'] ['name'] !='')
					{ 
						$config['upload_path'] = './assets/bluradmin/uploads/certificates';
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
		$this->form_validation->set_rules('issued', 'Issued ON', 'required');
		
		if(!$this->form_validation->run()) { 
		  $this->response(array('error' => validation_errors()), 400);	
		}else{
			
			//echo '<pre>'; print_r($stu_reg);die;
			$data['user_id']			=	$this->post('student_id');
			$data['title']			=	$this->post('title');
			$data['issued']			=	$this->post('issued');
			
			if('undefined' != $this->post('image')){
				$data['file_name']	=$this->post('image');
			}
			
				
		}
		//echo '<pre>'; print_r($data);die;
		if($this->post('id')){
			
			$this->student_model->update_certificate($this->post('id'), $data);
		}else{
			$data['added']			=	date('Y-m-d H:i:s');
			$this->db->insert('certificates',$data);
			if($this->db->insert_id() > 0)
			{
				$message = array('id' => $this->db->insert_id(), 'name' => $this->post('name'));
				$this->response($message, 200);
			}
		}	
	}
	
	public function certificates_get($id=false)
	{
		$tasks = $this->student_model->get_certificates($id); // return a record based on id
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		}
	}
	
	public function certificate_get($id=false)
	{
		$tasks = $this->student_model->get_certificate($id); // return a record based on id
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		}
	}
	
	
	public function certificates_delete($id=NULL)
	{
		if($id == NULL)
		{
			$message = array('error' => 'Missing delete data: id');
			$this->response($message, 400);
		} else {
			$this->student_model->delete_certificate($id);
			$message = array('id' => $id, 'message' => 'DELETED!');
			$this->response($message, 200);
		}
	}	
	
	public function notes_post($id=false)
	{	
		//echo '<pre>'; print_r($_POST);die;
		$this->form_validation->set_rules('notes', 'Notes', 'required');
		if(!$this->form_validation->run()) { 
		  
		  $this->response(array('error' => validation_errors()), 400);	
			
		}else{
				$save_notes['notes']			=	$this->post('notes');
				$save_notes['user_id']			=	$this->post('student_id');
				$save_notes['posted_by']		=	1;
		}
		//echo '<pre>'; print_r($data);die;   
		if($this->post('id')){
			$this->student_model->update_notes($this->post('id'), $save_notes);
			
		}else{
				$save_notes['added']			=	date('Y-m-d H:i:s');
				$this->db->insert('notes',$save_notes);
				if($this->db->insert_id() > 0)
				{
					$message = array('id' => $this->db->insert_id(), 'name' => $this->post('notes'));
					$this->response($message, 200);
				}
			
		}	
	}
	
	public function notes_get($id=false)
	{
		$tasks = $this->student_model->get_notes($id); // return a record based on id
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		}
	}
	
	public function note_get($id=false)
	{
		$tasks = $this->student_model->get_note($id); // return a record based on id
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		}
	}
	public function notes_delete($id=NULL)
	{
		if($id == NULL)
		{
			$message = array('error' => 'Missing delete data: id');
			$this->response($message, 400);
		} else {
			$this->student_model->delete_notes($id);
			$message = array('id' => $id, 'message' => 'DELETED!');
			$this->response($message, 200);
		}
	}
	
	public function files_post()
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
			$data['user_id']			=	$this->post('student_id');
			$data['title']			=	$this->post('title');
			$data['uploaded_by']	=	1;
			if('undefined' != $this->post('image')){
				$data['file_name']	=$this->post('image');
			}
			
				
		}
		//echo '<pre>'; print_r($data);die;
		if($this->post('id')){
			
			$this->student_model->update_files($this->post('id'), $data);
		}else{
			$data['added']			=	date('Y-m-d H:i:s');
			$this->db->insert('files',$data);
			if($this->db->insert_id() > 0)
			{
				$message = array('id' => $this->db->insert_id(), 'name' => $this->post('name'));
				$this->response($message, 200);
			}
		}	
	}
	
	
	public function files_get($id=false)
	{
		$tasks = $this->student_model->get_files($id); // return a record based on id
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		} 
	}
	
	public function file_get($id=false)
	{
		$tasks = $this->student_model->get_file($id); // return a record based on id
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		} 
	}
	
	public function files_delete($id=NULL)
	{
		if($id == NULL)
		{
			$message = array('error' => 'Missing delete data: id');
			$this->response($message, 400);
		} else {
			$tasks = $this->student_model->get_file($id); // return a record based on id
			$this->student_model->delete_files($id);
			$path	= './assets/bluradmin/uploads/files/';
			unlink($path.'/'.$tasks[0]->file_name);
			$message = array('id' => $id, 'message' => 'DELETED!');
			$this->response($message, 200);
		}
	}
	
	
	public function preport_get($id=false){
		$tasks = $this->student_model->get_batchById($id);
		//echo '<pre>'; print_r($tasks);die;
		if(empty($tasks)){
			$data	=	array(0,0);
		}
		$task	=	$tasks[0];
		$data	=	array();
		$endDate	=	date('Y-m-d', strtotime($task->start_date. ' + '.$task->duration.' days'));
		//echo $endDate;
		if($endDate < date("Y-m-d")){
			$data	=	array(100,0);
		}elseif($task->start_date > date("Y-m-d")){
			$data	=	array(0,100);
		}else{
			 $now = time();
			 $your_date = strtotime($task->start_date);
			 $datediff = $now - $your_date;
			 $days	=	 floor($datediff/(60*60*24));
			 $completed	=	$days/$task->duration*100;
			 $remaings	=	100-$completed;
			
			$data	=	array($completed,$remaings);
		}
		
		//echo '<pre>'; print_r($data);die;
		if($data)
		{
			$this->response($data, 200); // return success code if record exist
		} 
	}
}

?>