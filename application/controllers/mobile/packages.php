<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Packages extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
	}
	
	public function show($id){
		$this->load->model('package');
		$this->load->model('tour');
		
		$package = $this->package->get_detail($id);
		
		$data['package'] = $package;
		$data['tours'] = $this->tour->list_by_local($package->local_id);
		
		$this->load->view('layout/mobile/header');
		$this->load->view('mobile/packages/show',$data);
		$this->load->view('layout/mobile/footer');
	}
	
}

/* End of file packages.php */
/* Location: ./application/controllers/packages.php */
