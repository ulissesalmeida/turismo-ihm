<?php
class Tour extends CI_Model {
	var $local_id;
	var $name;
	var $price_adult;
	var $price_children;
	var $description;
			
	public function __construct()
	{
		parent::__construct();
		$this->load->database('default');
	}	
	
	public function create(){
		$this->db->insert('tour',$this);
		return $this->db->insert_id();
	}
	
	public function save(){
		$this->db->where('id',$this->id);
		return $this->db->update('tour',$this);
	}
	
	public function delete($id){
		$this->db->where('id',$id);
		return $this->db->delete('tour');
	}
	
	public function get($id){
		$this->db->select('*');
		$this->db->from('tour');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row(0,'Tour');
	}
	
	public function list_all(){
		$this->db->select('*');
		$this->db->from('tour');
		$query = $this->db->get();
		return $query->result('Tour');
	}
	
	
}

/* End of file tour.php */
/* Location: ./application/models/tour.php */
