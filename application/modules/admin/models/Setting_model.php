<?php

class Setting_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	
	public function get_task($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('settings');
		return $query->result();
	}
	
	public function delete_task($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('settings');
	}
	
	public function update_task($id,$data)
	{
		//echo '<pre>'; print_r($data);die;
		$this->db->where('id',$id);
		$this->db->update('settings',$data);
	}
}