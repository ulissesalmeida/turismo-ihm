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
	
	public function price_br($prop){
		return 'R$ '.round($this->$prop,2);
	}
	
	public function price_total_br($adults, $childrens ){
		return 'R$ '.round(($this->price_adult*$adults)+($this->price_children*$childrens),2);
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
	
	public function list_by_local($local_id){
		$this->db->select('*');
		$this->db->from('tour');
		$this->db->where('local_id',$local_id);
		$query = $this->db->get();
		return $query->result('Tour');
	}
	
	
}

/* End of file tour.php */
/* Location: ./application/models/tour.php */
