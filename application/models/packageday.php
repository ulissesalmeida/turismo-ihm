<?php
class PackageDay extends CI_Model {
	var $tour_package;
	var $date;
		
	public function __construct()
	{
		parent::__construct();
		$this->load->database('default');
	}
	
	public function date_br(){
		$date = explode('-',$this->date);
		return $date[2].'/'.$date[1].'/'.$date[0];
	}	
	
	public function create(){
		$this->db->insert('package_day',$this);
		$id = $this->db->insert_id();
		
		if(isset($this->rooms)){
			$this->update_rooms($id);
		}
		return $id;
	}
		
	public function save(){
		$this->db->where('id',$this->id);
		$updated = $this->db->update('package_day',$this);
		
		if(isset($this->rooms)){
			$this->update_rooms($this->id);
		}
		
		return $updated;
	}
	
	public function delete($id){
		$this->db->where('id',$id);
		return $this->db->delete('package_day');
	}
	
	public function update_rooms($id){
		$this->db->where('package_day_id',$id);
		$this->db->delete('package_day_room');
		
		foreach($this->rooms as $room){
				$this->db->set('package_day_id',$id);
				$this->db->set('hostel_room_id',$room);
				$this->db->insert('package_day_room');
		}
	}
	
	public function get($id){
		$this->db->select('*');
		$this->db->from('package_day');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row(0,'PackageDay');
	}
	
	public function list_all(){
		$this->db->select('*');
		$this->db->from('package_day');
		$query = $this->db->get();
		return $query->result('PackageDay');
	}
	
	public function rooms_first(){
		$this->load->model('room');
		$this->db->select('hr.id,hr.hostel_id,hr.description,hr.price,hr.single_beds,hr.double_beds');
		$this->db->from('hostel_room hr');
		$this->db->join('package_day_room pdr','pdr.hostel_room_id = hr.id');
		$this->db->where('pdr.package_day_id',$this->id);
		$query = $this->db->get();
		return $query->row(0,'Room');
	}	
}

/* End of file packageday.php */
/* Location: ./application/models/packageday.php */
