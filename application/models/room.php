<?php
class Room extends CI_Model {
	var $hostel_id;
	var $description;
	var $price;
	var $single_beds;
	var $double_beds;
		
	public function __construct()
	{
		parent::__construct();
		$this->load->database('default');
	}	
	
	public function create(){
		$this->db->insert('hostel_room',$this);
		return $this->db->insert_id();
	}
	
	public function save(){
		$this->db->where('id',$this->id);
		return $this->db->update('hostel_room',$this);
	}
	
	public function delete($id){
		$this->db->where('id',$id);
		return $this->db->delete('hostel_room');
	}
	
	public function get($id){
		$this->db->select('*');
		$this->db->from('hostel_room');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row(0,'Room');
	}
	
	public function list_all(){
		$this->db->select('*');
		$this->db->from('hostel_room');
		$query = $this->db->get();
		return $query->result('Room');
	}
	
	
}

/* End of file hostel.php */
/* Location: ./application/models/hostel.php */