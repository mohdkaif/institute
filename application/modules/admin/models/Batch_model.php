<?php

class Batch_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	function get_setting()
	{
		return $this->db->get('settings')->row();
	}
	
	function get_notifications()
	{
		$this->db->where('end_date <=',date("Y-m-d", strtotime("+".$this->get_setting()->batch_alert." days")));
		$this->db->where('end_date>=',date("Y-m-d"));
		$this->db->order_by('end_date','ASC');
		return  $this->db->get('batches')->result();
	}
	
	function get_notifications_new()
	{
		$this->db->where('end_date <=',date("Y-m-d", strtotime("+".$this->get_setting()->batch_alert." days")));
		$this->db->where('end_date >=',date("Y-m-d"));
		$this->db->where('is_view',0);
		$this->db->order_by('end_date','ASC');
		
		return  $this->db->get('batches')->result();
	}
	
	function update_notifications($ids){
		$this->db->where_in('id', $ids);
		$this->db->set('is_view',1);	
		$this->db->update('batches');
	}
	
	function get_faulty_by_batch($fids){
			$this->db->where_in('id',$fids);
			$this->db->select('F.id id,F.name label');
		$query = $this->db->get('users F');
		return $query->result();
		
	}
	
	
	public function get_batch_fees($id)
	{
		$this->db->where('R.batch_id',$id);
		$this->db->select('count(R.student_id) as students,B.*,(select sum(amount) from receipts where batch_id='.$id.') as paid');
		$this->db->join('rel_student_batch R', 'B.id = R.batch_id', 'LEFT');
		$query = $this->db->get('batches B');
		return $query->row();
	}
	
	
	public function get_all_studentsByBatach($id)
	{
		$this->db->where('R.batch_id',$id);
		$this->db->join('rel_student_batch R', 'U.id = R.student_id', 'LEFT');
		$query = $this->db->get('users U');
		return $query->result();
	}
	
	
	public function get_all()
	{
		$admin			=	$this->session->userdata('admin');
		if($admin['user_role']==2){	//STUDENTS
			$this->db->where('F.id',$admin['id']);
		}
		$this->db->order_by('B.id','DESC');
		$this->db->select('B.*,CC.name category,C.title course,F.name faculty');
		$this->db->join('course_category CC', 'CC.id = B.category_id', 'LEFT');
		$this->db->join('courses C', 'C.id = B.course_id', 'LEFT');
		$this->db->join('users F', 'F.id = B.faculty_id', 'LEFT');
		$query = $this->db->get('batches B');
		return $query->result();
	}
	function get_faculties($ids)  //Get Course By course ids
	{
			   $this->db->where_in('id',$ids);
			   $this->db->select('GROUP_CONCAT(U.name) as facs');	
		return $this->db->get('users U')->row();
		
	}
	public function get_task($id)
	{
		$this->db->where('B.id',$id);
		$this->db->select('B.*,CC.name category,C.title course,F.name faculty');
		$this->db->join('course_category CC', 'CC.id = B.category_id', 'LEFT');
		$this->db->join('courses C', 'C.id = B.course_id', 'LEFT');
		$this->db->join('users F', 'F.id = B.faculty_id', 'LEFT');
		$query = $this->db->get('batches B');
		return $query->result();
	}
	
	public function delete_task($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('batches');
	}
	
	public function update_task($id, $data)
	{
		$this->db->where('id',$id);
		$this->db->update('batches',$data);
	}
	
	
}