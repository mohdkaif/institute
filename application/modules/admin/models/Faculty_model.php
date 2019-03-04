<?php

class Faculty_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	function get_received_payment($faculty,$batch){
		$this->db->where('user_id',$faculty);
		$this->db->where('batch_id',$batch);
		$this->db->select_sum('amount');
		return $this->db->get('faculty_receipt')->row();
	}
	public function get_receiptNo()
	{
		$this->db->select_max('receipt_no');
		$query = $this->db->get('faculty_receipt');
		return $query->row();
	}
	
	function delete_receipt($id){
		$this->db->where('id',$id);
		$this->db->delete('faculty_receipt');
	}
	
	function update_receipt($id,$save){
		//echo '<pre>'; print_r($save);die;
		$this->db->where('id',$id);
		$this->db->update('faculty_receipt',$save);
	}
	
	public function get_batches($id)
	{
		//$this->db->like('B.faculties',$id);
		$this->db->where('B.faculty_id',$id);
		$this->db->order_by('B.id','DESC');
		$this->db->select('B.*,CC.name category,C.title course');
		$this->db->join('course_category CC', 'CC.id = B.category_id', 'LEFT');
		$this->db->join('courses C', 'C.id = B.course_id', 'LEFT');
		$query = $this->db->get('batches B');
		return $query->result();
	}
	
	function get_faculties(){
		$this->db->where('user_role',2);
		$this->db->select('id, name as label');
		$query = $this->db->get('users');
		return $query->result();
	}	
	public function get_all()
	{
		$admin			=	$this->session->userdata('admin');
		if($admin['user_role']==2){	//STUDENTS
			$this->db->where('id',$admin['id']);
		}
		//$this->db->order_by('E.id','DESC');
		//$this->db->select('E.*,C.title course,ES.name estatus');
		//$this->db->join('courses C', 'C.id = E.course_id', 'LEFT');
		$this->db->where('user_role',2);
		$query = $this->db->get('users');
		return $query->result();
	}
	function get_facultyCourse($ids)  //Get Course By course ids
	{
			   $this->db->where_in('id',$ids);
			   $this->db->select('GROUP_CONCAT(C.title) as courses');	
		return $this->db->get('courses C')->row();
		
	}
	public function get_task($id)
	{
		$admin			=	$this->session->userdata('admin');
		if($admin['user_role']==2){	//STUDENTS
			$this->db->where('id',$admin['id']);
		}
		$this->db->where('id',$id);
		$query = $this->db->get('users');
		return $query->result();
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
	
	public function update_course_fee($id, $data)
	{
		$this->db->where('id',$id);
		$this->db->update('course_fee',$data);
	}
	
	function get_courseFee($id)
	{
		$this->db->where('faculty_id',$id);
		return $this->db->get('course_fee')->result();
	}
	public function delete_fees($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('course_fee');
	}
	
	function get_fees($id){
		$this->db->where('id',$id);
		return $this->db->get('course_fee')->result();
	}
	
	public function get_receipts($id){
		$this->db->where('R.user_id',$id);
		$this->db->select('R.*,B.title batch');
		$this->db->join('batches B', 'B.id = R.batch_id', 'LEFT');
		return $this->db->get('faculty_receipt R')->result();
	}
	
	public function get_receipt($id){
		$this->db->where('R.id',$id);
		$this->db->select('R.*,B.title batch,U.name faculty');
		$this->db->join('batches B', 'B.id = R.batch_id', 'LEFT');
		$this->db->join('users U', 'U.id = R.user_id', 'LEFT');
		return $this->db->get('faculty_receipt R')->result();
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