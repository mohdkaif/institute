<?php defined('BASEPATH') OR exit('No direct script access allowed');

class F_api extends API_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('faculty_model','batch_model','student_model'));
		$this->load->model(array('course_model'));
	}
    
	
	public function preport_get($id=false){
		$batch	=	$this->batch_model->get_task($id);	
				
		$paid	=	$this->faculty_model->get_received_payment($batch[0]->faculty_id,$id);	
		$r_amount	=	$batch[0]->agreed_fee-$paid->amount;
		
		$paid_per	=	$paid->amount/$batch[0]->agreed_fee*100;
		$r_per		=	$r_amount/$batch[0]->agreed_fee*100;
		$paid		=	$paid->amount;
		$remaining	=	$r_amount."($r_per)";
		$data['report']		=	array(intval($paid),intval($r_amount));
		
		$data['label']		=	array("Paid:".intval($paid_per)."%","Remaining:".intval($r_per)."%");
		
		//echo '<pre>'; print_r($data);die;
		if($data)
		{
			$this->response($data, 200); // return success code if record exist
		}
	}
	function getPayment_get($fid,$bid){
				
				$batch	=	$this->batch_model->get_task($bid);	
				
				$paid	=	$this->faculty_model->get_received_payment($fid,$bid);	
				$r_amount	=	$batch[0]->agreed_fee-$paid->amount;
				//echo '<pre>'; print_r($paid);die;
				$tasks	=	array('r_amount'	=> $r_amount,'agreed_fee'	=> $batch[0]->agreed_fee);
				if($tasks)
				{
					$this->response($tasks, 200); // return success code if record exist
				}	
	}
	
	public function receiptNo_get(){
				$setting	=	$this->student_model->get_setting();	
				$fac		=	$this->faculty_model->get_receiptNo();
				if($fac->receipt_no==0){
					$receipt_no	=	$setting->faculty_receipt_no;
				}else{
					$receipt_no	=	$fac->receipt_no + 1;
				}
				
				if($receipt_no)
				{
					$this->response($receipt_no, 200); // return success code if record exist
				}		
				
	
	}
	
	public function faculties_get($id=false)
	{
		$tasks = $this->faculty_model->get_faculties(); // return all record
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		} 
	}
	
	
	public function tasks_get($id=false)
	{
		if(! $id)
		{
			$tasks = $this->faculty_model->get_all(); // return all record
		} else {
			$tasks = $this->faculty_model->get_task($id); // return a record based on id
		}
	//echo '<pre>'; print_r($tasks);
	 		$t=array();
			$i=0;
			foreach($tasks as $ind	=> $task){
					$cids	=	json_decode($task->courses);
				//$tasks[]	=	$task;
				
				$t[$ind]['task']	=	$task;
				$t[$ind]['task']->facultycourse	=	$this->faculty_model->get_facultyCourse($cids);
			$i++;}
			//echo '<pre>'; print_r($t);die;
		if($t)
		{
			$this->response($tasks, 200); // return success code if record exist
		}
	}
	
	public function tasks_post()
	{	//$_POST = json_decode(file_get_contents("php://input"), true);
		//echo '<pre>'; print_r($_GET);
		
		//echo '<pre>'; print_r(json_decode($_POST['oldcases']));die;
		//echo '<pre>'; print_r($_POST);die;
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
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('fname', 'Father Name', 'required');
		$this->form_validation->set_rules('dob', 'DOB', 'required');
		$this->form_validation->set_rules('highest_quali', 'Highest Qualification', 'required');
		$this->form_validation->set_rules('year_of_exp', 'Year Of Expriance', 'required');
		$this->form_validation->set_rules('join_as', 'Join As', 'required');
		//$this->form_validation->set_rules('course', 'Courses', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
		
		if(!$this->post('id')){
			$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[32]|is_unique[users.username]');
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
			$classes	=	json_decode($_POST['oldclass']);
			if(!empty($classes)){
				foreach($classes as $cl){
					$course[]	=	$cl->id;
				}
			}
			
			
			if ($this->post('password') != '' || !$this->post('id'))
			{
				$data['password']	= sha1($this->post('password'));
			}
			
			$data['name']	=$this->post('name');
			$data['username']	=$this->post('username');
			$data['email']	=$this->post('email');
			$data['mobile']	=$this->post('mobile');
			$data['fname']	=$this->post('fname');
			
			if('undefined' != $this->post('image')){
				$data['image']	=$this->post('image');
			}
			
			$data['gender']	=$this->post('gender');
			$data['dob']	=$this->post('dob');
			$data['current_address']	=$this->post('current_address');
			$data['highest_quali']	=$this->post('highest_quali');
			$data['year_of_exp']	=$this->post('year_of_exp');
			$data['join_date']	=$this->post('join_date');
			$data['join_as']	=$this->post('join_as');
			$data['courses']	=json_encode($course);
			$data['user_role']	=2;
				
		}
		//echo '<pre>'; print_r($data);die;
		if($this->post('id')){
			$this->faculty_model->update_task($this->post('id'), $data);
		}else{
			$this->db->insert('users',$data);
			if($this->db->insert_id() > 0)
			{
				$message = array('id' => $this->db->insert_id(), 'name' => $this->post('name'));
				$this->response($message, 200);
			}
		}	
	}
	
	public function courseFee_get($id)
	{
			$tasks = $this->faculty_model->get_courseFee($id); // return a record based on id
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
		} else {
			$this->response([], 404); // return empty
		}
	}
	
	public function get_Fees_get($id)
	{
			$tasks = $this->faculty_model->get_fees($id); // return a record based on id
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
		} else {
			$this->response([], 404); // return empty
		}
	}
	
	public function select_classes_get($id=false)
	{
		$tasks = $this->faculty_model->get_fees($id); // return a record based on id
		foreach($tasks as $task){
			$task	=	$task;
		}
		$fcids	  =	json_decode($task->courses);
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
	
	public function course_fee_post()
	{	//echo '<pre>'; print_r($_POST);die;
		//echo '<pre>'; print_r(json_decode($_POST['oldcases']));die;
		//echo '<pre>'; print_r($class);die;
		
		$this->form_validation->set_rules('oldclass', 'Course', 'trim|required');
		$this->form_validation->set_rules('payout', 'Payout', 'required');
		
		if(!$this->form_validation->run()) { 
		  // $this->output->set_output(validation_errors()); 
		  $this->response(array('error' => validation_errors()), 400);	
			//$this->response(array('error' => 'Missing post data: title'), 400);	
		}else{
			$classes	=	json_decode($_POST['oldclass']);
			if(!empty($classes)){
				foreach($classes as $cl){
					$course[]	=	$cl->id;
				}
			}
			
			
			$data['faculty_id']	=	$this->post('faculty_id');
			$data['payout'	]	=	$this->post('payout');
			$data['salary']		=	$this->post('salary');
			$data['percent']	=	$this->post('percent');
			$data['date']		=	date('Y-m-d');
			
				
		}
		//echo '<pre>'; print_r($data);die;
		if($this->post('id')){
			$this->faculty_model->update_course_fee($this->post('id'), $data);
		}else{
			$data['courses']	=	json_encode($course);
			$this->db->insert('course_fee',$data);
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
	 
		$this->faculty_model->update_task($this->post('id'), $data);
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
			$this->faculty_model->delete_task($id);
			$message = array('id' => $id, 'message' => 'DELETED!');
			$this->response($message, 200);
		}
	}
	
	
	function deleteFees_delete($id)
	{
		if($id == NULL)
		{
			$message = array('error' => 'Missing delete data: id');
			$this->response($message, 400);
		} else {
			$this->faculty_model->delete_fees($id);
			$message = array('id' => $id, 'message' => 'DELETED!');
			$this->response($message, 200);
		}
	}
	
	public function batches_get($id=false)
	{
			$tasks = $this->faculty_model->get_batches($id); // return all record
			/*$t=array();
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
		} else {
			$this->response([], 404); // return empty
		}
	}
	
	public function receipts_post($id=false)
	{	
		//echo '<pre>'; print_r($_POST);die;
		$this->form_validation->set_rules('batch_id', 'Batch', 'required');
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		$this->form_validation->set_rules('payment_method', 'Payment Method', 'required');
		if($this->post('receipt_no') == $this->post('oldreceipt_no')) {
		  	$this->form_validation->set_rules('receipt_no', 'Receipt No', 'required');
		} else {
		  $this->form_validation->set_rules('receipt_no', 'Receipt No', 'required|is_unique[faculty_receipt.receipt_no]');
		}
		if(!$this->form_validation->run()) { 
		  
		  $this->response(array('error' => validation_errors()), 400);	
			
		}else{
				$save_receipt['receipt_no']		=	$this->post('receipt_no');
				$save_receipt['user_id']		=	$this->post('faculty_id');
				$save_receipt['batch_id']		=	$this->post('batch_id');
				$save_receipt['amount']			=	$this->post('amount');
				$save_receipt['remark']			=	$this->post('remark');
				$save_receipt['payment_method']			=	$this->post('payment_method');
				$save_receipt['date']			=	$this->post('date');
		}
		//echo '<pre>'; print_r($data);die;
		if($this->post('id')){
			$this->faculty_model->update_receipt($this->post('id'), $save_receipt);
			
		}else{
				
				$this->db->insert('faculty_receipt',$save_receipt);
				if($this->db->insert_id() > 0)
				{
					$message = array('id' => $this->db->insert_id(), 'name' => $this->post('name'));
					$this->response($message, 200);
				}
			
		}	
	}
	
	public function receipts_get($id=false)
	{
		$tasks = $this->faculty_model->get_receipts($id); // return a record based on id
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		}
	}	
	public function receipt_get($id=false)
	{
		$tasks = $this->faculty_model->get_receipt($id); // return a record based on id
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		} else {
			$this->response([], 404); // return empty
		}
	}
	
	public function receipts_delete($id=NULL)
	{
		if($id == NULL)
		{
			$message = array('error' => 'Missing delete data: id');
			$this->response($message, 400);
		} else {
			$this->faculty_model->delete_receipt($id);
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
				$save_notes['user_id']			=	$this->post('faculty_id');
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
			$data['user_id']			=	$this->post('faculty_id');
			$data['title']			=	$this->post('title');
			$data['uploaded_by']	=	1;
			if('undefined' != $this->post('image')){
				$data['file_name']	=$this->post('image');
			}
			
				
		}
		//echo '<pre>'; print_r($data);die;
		if($this->post('id')){
			
			$this->faculty_model->update_files($this->post('id'), $data);
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
		$tasks = $this->faculty_model->get_files($id); // return a record based on id
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		}
	}
	
	public function file_get($id=false)
	{
		$tasks = $this->faculty_model->get_file($id); // return a record based on id
		if($tasks)
		{
			$this->response($tasks, 200); // return success code if record exist
		} else {
			$this->response([], 404); // return empty
		}
	}
	
	public function files_delete($id=NULL)
	{
		if($id == NULL)
		{
			$message = array('error' => 'Missing delete data: id');
			$this->response($message, 400);
		} else {
			$tasks = $this->faculty_model->get_file($id); // return a record based on id
			$this->faculty_model->delete_files($id);
			$path	= './assets/bluradmin/uploads/files/';
			unlink($path.'/'.$tasks[0]->file_name);
			$message = array('id' => $id, 'message' => 'DELETED!');
			$this->response($message, 200);
		}
	}
}

?>