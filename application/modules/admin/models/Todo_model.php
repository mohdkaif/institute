<?php

class Todo_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all()
	{
		$this->db->order_by('date', 'DESC');
		$query = $this->db->get('todo');
		return $query->result();
	}
	
	public function get_task($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('todo');
		return $query->result();
	}
	
	public function delete_task($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('todo');
	}
	
	public function update_task($id, $data)
	{
		$this->db->where('id',$id);
		$this->db->update('todo',$data);
	}
}