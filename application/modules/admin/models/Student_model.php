<?php

class Student_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function save_batch($save){
		$this->db->insert('rel_student_batch',$save);
		return $this->db->insert_id();
	}
	public function update_batch($id,$save){
		$this->db->where('id',$id);
		$this->db->update('rel_student_batch',$save);
	}
	public function delete_batch($id){
		$this->db->where('id',$id);
		$this->db->delete('rel_student_batch');
	}
	function get_batches($id){
		$this->db->where('R.student_id',$id);
		$this->db->order_by('R.added','DESC');
		$this->db->select('R.*,C.title course,B.title batch,C.id course_id,B.id batch_id');
		$this->db->join('courses C', 'C.id = R.course_id', 'LEFT');
		$this->db->join('batches B', 'B.id = R.batch_id', 'LEFT');
		$this->db->join('users U', 'C.id = R.student_id', 'LEFT');
		return  $this->db->get('rel_student_batch R')->result();
	}
	
	function get_batch($id){
		$this->db->where('R.id',$id);
		$this->db->select('R.*,C.title course,B.title batch');
		$this->db->join('courses C', 'C.id = R.course_id', 'LEFT');
		$this->db->join('batches B', 'B.id = R.batch_id', 'LEFT');
		$this->db->join('users U', 'C.id = R.student_id', 'LEFT');
		return  $this->db->get('rel_student_batch R')->result();
	}
	
	function get_batchById($id){
		$this->db->where('id',$id);
		return  $this->db->get('batches')->result();
	}
	
	function get_received_payment($student,$batch){
		$this->db->where('user_id',$student);
		$this->db->where('batch_id',$batch);
		$this->db->select_sum('amount');
		return $this->db->get('receipts')->row();
	}
	public function get_all()
	{
		$admin			=	$this->session->userdata('admin');
		if($admin['user_role']==3){	//STUDENTS
			$this->db->where('U.id',$admin['id']);
		}
		$this->db->where('U.user_role',3);
		$this->db->order_by('U.id','DESC');
		$this->db->select('U.*,');
		$query = $this->db->get('users U');
		return $query->result();
	}
	public function get_task($id)
	{
		$admin			=	$this->session->userdata('admin');
		if($admin['user_role']==3){	//STUDENTS
			$this->db->where('U.id',$admin['id']);
		}
		$this->db->where('U.id',$id);
		$query = $this->db->get('users U');
		return $query->result();
	}
	
	function get_batches_by_course($id){
			$this->db->where('course_id',$id);
		$query = $this->db->get('batches');
		return $query->result();
	}
	public function get_setting()
	{
		$this->db->where('id',1);
		$query = $this->db->get('settings');
		return $query->row();
	}
	public function get_registrationNo()
	{
		$this->db->select_max('registration_no');
		$query = $this->db->get('users');
		return $query->row();
	}
	
	public function get_receiptNo()
	{
		$this->db->select_max('receipt_no');
		$query = $this->db->get('receipts');
		return $query->row();
	}
	
	public function delete_task($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('users');
	}
	
	public function update_task($id, $data)
	{
		$this->db->where('id',$id);
		$this->db->update('users',$data);
	}
	
	function update_receipt($id,$save){
		$this->db->where('id',$id);
		$this->db->update('receipts',$save);
	}
	public function get_receipts($id){
		$this->db->where('R.user_id',$id);
		$this->db->select('R.*,B.title batch');
		$this->db->join('batches B', 'B.id = R.batch_id', 'LEFT');
		return $this->db->get('receipts R')->result();
	}
	
	public function get_receipt($id){
		$this->db->where('R.id',$id);
		$this->db->select('R.*,B.title batch,U.name student');
		$this->db->join('batches B', 'B.id = R.batch_id', 'LEFT');
		$this->db->join('users U', 'U.id = R.user_id', 'LEFT');
		return $this->db->get('receipts R')->result();
	}
	
	function delete_receipt($id){
		$this->db->where('id',$id);
		$this->db->delete('receipts');
	}
	
	public function update_certificate($id,$save){
		$this->db->where('id',$id);
		$this->db->update('certificates',$save);
	}
	
	function get_certificates($id){
		$this->db->where('user_id',$id);
		return $this->db->get('certificates')->result();
	}
	function get_certificate($id){
		$this->db->where('id',$id);
		return $this->db->get('certificates')->result();
	}
	
	function delete_certificate($id){
		$this->db->where('id',$id);
		$this->db->delete('certificates');
	}
	
	public function update_notes($id,$save){
		$this->db->where('id',$id);
		$this->db->update('notes',$save);
	}
	public function get_notes($id){
		$this->db->where('user_id',$id);
		return $this->db->get('notes')->result();
	}
	public function get_note($id){
		$this->db->where('id',$id);
		return $this->db->get('notes')->result();
	}
	
	function delete_notes($id){
		$this->db->where('id',$id);
		$this->db->delete('notes');
	}
	
	public function update_files($id,$save){
		$this->db->where('id',$id);
		$this->db->update('files',$save);
	}
	public function delete_files($id){
		$this->db->where('id',$id);
		$this->db->delete('files');
	}
	
	public function get_files($id){
		$this->db->where('user_id',$id);
		return $this->db->get('files')->result();
	}
	public function get_file($id){
		$this->db->where('id',$id);
		return $this->db->get('files')->result();
	}
}