<?php
class Hostel extends CI_Model {
	var $name;
	var $local_id;
		
	public function __construct()
	{
		parent::__construct();
		$this->load->database('default');
	}	
	
	public function create(){
		$this->db->insert('hostel',$this);
		return $this->db->insert_id();
	}
	
	public function save(){
		$this->db->where('id',$this->id);
		return $this->db->update('hostel',$this);
	}
	
	public function delete($id){
		$this->db->where('id',$id);
		return $this->db->delete('hostel');
	}
	
	public function get($id){
		$this->db->select('*');
		$this->db->from('hostel');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row(0,'Hostel');
	}
	
	public function list_all(){
		$this->db->select('*');
		$this->db->from('hostel');
		$query = $this->db->get();
		return $query->result('Hostel');
	}
	
	
}

/* End of file hostel.php */
/* Location: ./application/models/hostel.php */