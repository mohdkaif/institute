<?php

class Enquiry_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all()
	{
		$this->db->order_by('E.id','DESC');
		$this->db->select('E.*,C.title course,ES.name estatus');
		$this->db->join('courses C', 'C.id = E.course_id', 'LEFT');
		$this->db->join('enquires_status ES', 'ES.id = E.status', 'LEFT');
		$query = $this->db->get('enquiries E');
		return $query->result();
	}
	
	
	public function get_task($id)
	{
		$this->db->where('E.id',$id);
		$this->db->select('E.*,C.title course,ES.name estatus');
		$this->db->join('courses C', 'C.id = E.course_id', 'LEFT');
		$this->db->join('enquires_status ES', 'ES.id = E.status', 'LEFT');
		$query = $this->db->get('enquiries E');
		return $query->result();
	}
	
	public function delete_task($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('enquiries');
	}
	
	public function update_task($id, $data)
	{
		$this->db->where('id',$id);
		$this->db->update('enquiries',$data);
	}
}