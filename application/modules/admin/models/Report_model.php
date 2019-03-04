<?php

class Report_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
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
	
	
	
}