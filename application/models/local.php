<?php
class Local extends CI_Model {
	var $city;
	var $state;
	var $country;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database('default');
	}

	public function get_description(){
		return $this->city.' - '.$this->state.' - '.$this->country;
	}
	
	public function create(){
		$this->db->insert('local',$this);
		return $this->db->insert_id();
	}
	
	public function save(){
		$this->db->where('id',$this->id);
		return $this->db->update('local',$this);
	}
	
	public function delete($id){
		$this->db->where('id',$id);
		return $this->db->delete('local');
	}
	
	public function get($id){
		$this->db->select('*');
		$this->db->from('local');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row(0,'Local');
	}
	
	public function list_all(){
		$this->db->select('*');
		$this->db->from('local');
		$query = $this->db->get();
		return $query->result('Local');
	}
	
	public function list_countries(){
		$this->db->distinct();
		$this->db->select('country');
		$this->db->from('local');
		$query = $this->db->get();
		return $query->result('Local');
	}
	
	
}

/* End of file local.php */
/* Location: ./application/models/local.php */
