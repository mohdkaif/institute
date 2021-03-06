<?php

class Course_category_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all()
	{
		$query = $this->db->get('course_category');
		return $query->result();
	}
	
	public function get_task($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('course_category');
		return $query->result();
	}
	
	public function delete_task($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('course_category');
	}
	
	public function update_task($id, $data)
	{
		$this->db->where('id',$id);
		$this->db->update('course_category',$data);
	}
}