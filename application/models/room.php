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
	
	public function get_description(){
		return 'Cód:'.$this->id.
				'| Camas[Solteiro:'.$this->single_beds.
				' | Casal: '.$this->double_beds.
				' ] | Preço: '.$this->price;
	}
	
	public function get_room_summary(){
		return $this->name.' | Camas[Solteiro:'.$this->single_beds.
				' | Casal: '.$this->double_beds.
				' ] | Preço: '.$this->price;
	}
	
	public function get_beds_description(){
		$rooms_message = "";
		if($this->single_beds && $this->double_beds)
			$rooms_message = "Quarto com {$this->single_beds} cama(s) de solteiro e {$this->double_beds} de casal";
		else if($this->single_beds)
			$rooms_message = "Quarto com {$this->single_beds} cama(s) de solteiro";
		else if($this->double_beds)
			$rooms_message = "Quarto com {$this->double_beds} cama(s) de casal";
		return $rooms_message;
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
	
	public function list_by_local($local_id){
		$this->db->select('hr.id,hr.hostel_id, hr.description, hr.price, hr.single_beds, hr.double_beds, hostel.name');
		$this->db->from('hostel_room hr');
		$this->db->join('hostel', 'hr.hostel_id = hostel.id');
		$this->db->where('hostel.local_id ',$local_id);
		$query = $this->db->get();
		return $query->result('Room');
	}
	
	
}

/* End of file hostel.php */
/* Location: ./application/models/hostel.php */
