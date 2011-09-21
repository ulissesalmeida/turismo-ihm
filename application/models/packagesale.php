<?php
class PackageSale extends CI_Model {
	var $tour_package_id;
	var $user_email;
	var $adults;
	var $childrens;
	var $price_total;
	var $payment_status;
	var $sale_code;
	var $date_time;
			
	public function __construct()
	{
		parent::__construct();
		$this->load->database('default');
	}
	
	public function get_payment_status(){
		return array( 1 => 'Aguardando liberação do cartão', 2 => 'Pago');
	}
	
	public function get_payment_status_str(){
		$types =  $this->get_payment_status();
		return $types[$this->payment_status];
	}
	
	
	public function get_package(){
		$this->load->model('package');
		return $this->package->get_detail($this->tour_package_id);
	}
	
	public function get_tours(){
		$this->load->model('tour');
		$this->db->select('t.id, t.local_id, t.name, t.price_adult, t.price_children, t.description');
		$this->db->from('tour t');
		$this->db->join('package_day_sale_tour psdt','psdt.tour_id = t.id');
		$this->db->join('package_day pd','psdt.package_day_id = pd.id');
		$this->db->where('psdt.tour_package_sale_id',$this->id);
		$this->db->order_by('pd.date','asc');
		$query = $this->db->get();
		return $query->result('Tour');
	}	
	
	public function create(){
		$this->db->insert('tour_package_sale',$this);
		$id = $this->db->insert_id();
		if(isset($this->tours)){
			$package = $this->package->get($this->tour_package_id);
			$days = $package->get_package_days();
						
			for($i =0; $i < count($days); $i++){
				$this->db->set('tour_package_sale_id',$id);
				$this->db->set('package_day_id',$days[$i]->id);
				$this->db->set('tour_id',$this->tours[$i]);
				$this->db->insert('package_day_sale_tour');
			}
		}
		
		return $id;
	}
	
	
	public function save(){
		$this->db->where('id',$this->id);
		return $this->db->update('tour_package_sale',$this);
	}

	public function delete($id){
		$this->db->where('id',$id);
		return $this->db->delete('tour_package_sale');
	}
	
	public function get($id){
		$this->db->select('*');
		$this->db->from('tour_package_sale');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row(0,'PackageSale');
	}
	
	public function get_by_sale_code($sale_code){
		$this->db->select('*');
		$this->db->from('tour_package_sale');
		$this->db->where('sale_code',$sale_code);
		$query = $this->db->get();
		return $query->row(0,'PackageSale');
	}
		
	public function list_all(){
		$this->db->select('*');
		$this->db->from('tour_package_sale');
		$query = $this->db->get();
		return $query->result('PackageSale');
	}	
}

/* End of file packagesale.php */
/* Location: ./application/models/packagesale.php */
