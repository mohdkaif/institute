<?php

class Dashboard_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_students()
	{
		$this->db->where('user_role',3);
		$this->db->select('count(id) as students');
		$query = $this->db->get('users');
		return $query->row();
	}
	
	public function get_enquiries()
	{
		$this->db->select('count(id) as enquiries');
		$query = $this->db->get('enquiries');
		return $query->row();
	}
	
	
	public function get_batches()
	{
		//$this->db->where('start_date <=', date('Y-m-d'));
		$this->db->where('end_date >=', date('Y-m-d'));
		
		$this->db->select('count(id) as batches');
		$query = $this->db->get('batches');
		return $query->row();
	}
	public function get_courses()
	{
		$this->db->select('count(id) as courses');
		$query = $this->db->get('courses');
		return $query->row();
	}
	
	function get_todos(){
		$this->db->where('date >=',date('Y-m-d'));
		$this->db->where('status',1);
		$this->db->order_by('date', 'ASC');
		$this->db->select('title as text,date');
		$query = $this->db->get('todo',10);
		return $query->result();
	}
	
	function get_events(){
		$this->db->order_by('date', 'DESC');
		$this->db->where('status',1);
		$query = $this->db->get('todo');
		return $query->result();
	}
	
	function get_revenue($m,$y){
				$this->db->where('month(date)', $m);
				$this->db->where('year(date)', $y);
				$this->db->select('sum(amount) value');
		return $this->db->get('receipts')->row_array();
	}	
	
	function get_studentsCount($m,$y){
				$this->db->where('user_role',3);
				$this->db->where('month(added)', $m);
				$this->db->where('year(added)', $y);
				$this->db->select('count(id) value');
		return $this->db->get('users')->row_array();
	}
}