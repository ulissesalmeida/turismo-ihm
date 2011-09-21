<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
	}
	
	public function checkout(){
		$this->load->model('package');
		$this->load->model('tour');
		
		$package = $this->package->get_detail($this->input->post('package_id'));
		$total_price = $package->min_price;
		
		foreach($this->input->post('tours') as $tour_id){
			$tour = $this->tour->get($tour_id);
			$total_price += ($package->estimated_adult * $tour->price_adult) +  ($package->estimated_children * $tour->price_children);
		}
		
		$data['package'] = $package;
		$data['tours'] = $this->input->post('tours');
		$data['total_price'] = $total_price;
		
		$this->load->view('layout/mobile/header');
		$this->load->view('mobile/client/checkout',$data);
		$this->load->view('layout/mobile/footer');
	}
	
	public function buy(){
		$this->load->model('package');
		$this->load->model('packagesale');
		$this->load->model('tour');
		$this->load->library('encrypt');
		
		$package = $this->package->get_detail($this->input->post('package_id'));
		
		$this->packagesale->tour_package_id = $package->id;
		$this->packagesale->user_email = $this->input->post('email');
		$this->packagesale->adults = $package->estimated_adult;
		$this->packagesale->childrens = $package->estimated_children;
		$this->packagesale->price_total = $this->input->post('total_price');
		$this->packagesale->payment_status = 1;
		$this->packagesale->sale_code = $this->encrypt->sha1($this->packagesale->user_email.'-'
																.time().'-'
																.$package->id);
		$this->packagesale->date_time = date('Y-m-d H:i:s',time());
		$this->packagesale->tours = $this->input->post('tours');
		$this->packagesale->create();
		
		redirect('mobile/client/show_purchase/'.$this->packagesale->sale_code);															
	}
	
	public function find_purchase(){
		$this->load->view('layout/mobile/header');
		$this->load->view('mobile/client/find_purchase');
		$this->load->view('layout/mobile/footer');
	}
	
	public function show_purchase($sale_code){
		$this->_show_purchase($sale_code);		
	}
	
	public function show_purchase_s(){
		$this->_show_purchase($this->input->post('sale_code'));	
	}
	
	private function _show_purchase($sale_code){
		$this->load->model('packagesale');
		$data['package_sale'] = $this->packagesale->get_by_sale_code($sale_code);
		
		$this->load->view('layout/mobile/header');
		$this->load->view('mobile/client/show_purchase',$data);
		$this->load->view('layout/mobile/footer');
	}
	
}

/* End of file client.php */
/* Location: ./application/controllers/client.php */
