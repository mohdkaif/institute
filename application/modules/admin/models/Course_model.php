<?php

class Course_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all()
	{
				$this->db->select('C.*,CC.name category,(select count(student_id) from rel_student_batch where rel_student_batch.course_id=C.id) as students,(select count(id) from batches where batches.course_id=C.id ) as batches,(select count(faculty_id) from batches where batches.faculty_id !=0 AND batches.course_id=C.id ) as faculties');
				$this->db->join('course_category CC', 'CC.id = C.category_id', 'LEFT');
				
		$query = $this->db->get('courses C');
		return $query->result();
	}
	public function get_courses()
	{
				$this->db->select('C.id id,C.title label');
		$query = $this->db->get('courses C');
		return $query->result();
	}
	public function get_course_by_category($id)
	{
				$this->db->where('C.category_id', $id);
				
		$query = $this->db->get('courses C');
		return $query->result();
	
	}
	public function get_faculty($id)
	{
				$this->db->where('id',$id);
		$query = $this->db->get('users');
		return $query->row();
	}
	
	function get_courses_by_faculty($cids){
			$this->db->where_in('id',$cids);
			$this->db->select('C.id id,C.title label');
		$query = $this->db->get('courses C');
		return $query->result();
		
	}
	
	public function get_task($id)
	{
		$this->db->where('C.id',$id);
		$this->db->select('C.*,CC.name category,(select count(student_id) from rel_student_batch where rel_student_batch.course_id=C.id) as students,(select count(id) from batches where batches.course_id=C.id ) as batches,(select count(faculty_id) from batches where batches.faculty_id !=0 AND batches.course_id=C.id ) as faculties');
		$this->db->join('course_category CC', 'CC.id = C.category_id', 'LEFT');
		$query = $this->db->get('courses C');
		return $query->result();
	}
	
	public function delete_task($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('courses');
	}
	
	public function get_students($id)
	{
		$admin			=	$this->session->userdata('admin');
		$this->db->where('U.user_role',3);
		$this->db->where('R.course_id',$id);
		$this->db->order_by('U.id','DESC');
		$this->db->group_by('U.id');
		$this->db->select('U.*,');
		$this->db->join('rel_student_batch R', 'U.id = R.student_id', 'LEFT');
		$query = $this->db->get('users U');
		return $query->result();
	}
	
	function get_faculties($id){
		$this->db->where('user_role',2);
		$this->db->like('courses', $id);
		$query = $this->db->get('users');
		return $query->result();
	}	
	
	function get_materials($id){
		$this->db->where('course_id', $id);
		$query = $this->db->get('study_material');
		return $query->result();
	}
	
	function get_material($id){
		$this->db->where('id', $id);
		$query = $this->db->get('study_material');
		return $query->result();
	}
	
	function delete_material($id){
		$this->db->where('id', $id);
		$this->db->delete('study_material');
	}
	
	public function update_material($id, $data)
	{
		$this->db->where('id',$id);
		$this->db->update('study_material',$data);
	}
	
	public function get_batches($id)
	{
		$admin			=	$this->session->userdata('admin');
		if($admin['user_role']==2){	//STUDENTS
			$this->db->where('F.id',$admin['id']);
		}
		$this->db->where('B.course_id',$id);
		$this->db->order_by('B.id','DESC');
		$this->db->select('B.*,CC.name category,C.title course,F.name faculty');
		$this->db->join('course_category CC', 'CC.id = B.category_id', 'LEFT');
		$this->db->join('courses C', 'C.id = B.course_id', 'LEFT');
		$this->db->join('users F', 'F.id = B.faculty_id', 'LEFT');
		$query = $this->db->get('batches B');
		return $query->result();
	}
	
	public function get_enquries($id)
	{
		$this->db->where('E.course_id',$id);
		$this->db->order_by('E.id','DESC');
		$this->db->select('E.*,C.title course,ES.name estatus');
		$this->db->join('courses C', 'C.id = E.course_id', 'LEFT');
		$this->db->join('enquires_status ES', 'ES.id = E.status', 'LEFT');
		$query = $this->db->get('enquiries E');
		return $query->result();
	}	
	public function update_task($id, $data)
	{
		$this->db->where('id',$id);
		$this->db->update('courses',$data);
	}
}