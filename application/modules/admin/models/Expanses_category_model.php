<?php

class Expanses_category_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all()
	{
		$query = $this->db->get('expanses_category');
		return $query->result();
	}
	
	public function get_task($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('expanses_category');
		return $query->result();
	}
	
	public function delete_task($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('expanses_category');
	}
	
	public function update_task($id, $data)
	{
		$this->db->where('id',$id);
		$this->db->update('expanses_category',$data);
	}
}