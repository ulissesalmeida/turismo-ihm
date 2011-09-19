<?php
class Package extends CI_Model {
	var $destination_id;
	var $transport_type;
	var $passage_price_adult;
	var $passage_price_children;
	var $estimated_adult;
	var $estimated_children;
			
	public function __construct()
	{
		parent::__construct();
		$this->load->database('default');
	}
	
	public function get_transport_types(){
		return array( 1 => 'Aéreo', 2 => 'Rodoviário');
	}
	
	public function date_br($prop){
		$date = explode('-',$this->$prop);
		return $date[2].'/'.$date[1].'/'.$date[0];
	}
	
	public function get_transport_type_str(){
		$types =  $this->get_transport_types();
		return $types[$this->transport_type];
	}	
	
	public function create(){
		$this->db->insert('tour_package',$this);
		return $this->db->insert_id();
	}
	
	public function save(){
		$this->db->where('id',$this->id);
		return $this->db->update('tour_package',$this);
	}

	public function delete($id){
		$this->db->where('id',$id);
		return $this->db->delete('tour_package');
	}
	
	public function get($id){
		$this->db->select('*');
		$this->db->from('tour_package');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row(0,'Package');
	}
	
	public function get_package_days(){
		$this->load->model('packageday');
		$this->db->select('*');
		$this->db->from('package_day');
		$this->db->where('tour_package',$this->id);
		$query = $this->db->get();
		return $query->result('PackageDay');
	}
	
	public function list_all(){
		$this->db->select('*');
		$this->db->from('tour_package');
		$query = $this->db->get();
		return $query->result('Package');
	}
	
	public function list_by_filter($filter){
		$this->db->select('*');
		$this->db->from('package_detail');
		$this->db->where('country',$filter['country']);
		$query = $this->db->get();
		return $query->result('Package');
	}
	
	
}

/* End of file tour.php */
/* Location: ./application/models/package.php */
