<?php

class Expanses_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all()
	{
		$this->db->select('E.*,EC.name category');
		$this->db->order_by('E.date','DESC');
		$this->db->join('expanses_category EC', 'EC.id = E.category_id', 'LEFT');
		$query = $this->db->get('expanses E');
		return $query->result();
	}
	public function get_task($id)
	{
		$this->db->where('E.id',$id);
		$this->db->select('E.*,EC.name category');
		$this->db->join('expanses_category EC', 'EC.id = E.category_id', 'LEFT');
		$query = $this->db->get('expanses E');
		return $query->result();
	}
	
	public function delete_task($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('expanses');
	}
	
	public function update_task($id, $data)
	{
		$this->db->where('id',$id);
		$this->db->update('expanses',$data);
	}
}