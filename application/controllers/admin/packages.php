<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Packages extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	public function index(){
		$this->load->model('package');
		$data['packages'] = $this->package->list_all_detail();
		
		$this->load->view('layout/admin/header');
		$this->load->view('admin/package/index', $data);
		$this->load->view('layout/admin/footer');
	}

	public function form_new()
	{	$this->load->helper('form');
		$this->load->model('local');
		$this->load->model('package');
	
		$data['places'] =  $this->local->list_all();
		$data['transport_types'] = $this->package->get_transport_types(); 
		$this->load->view('layout/admin/header');
		$this->load->view('admin/package/new',$data);
		$this->load->view('layout/admin/footer');
	}
	
	public function edit($id){
		$this->load->helper('form');
		$this->load->model('package');
		$this->load->model('local');
	
		$data['places'] =  $this->local->list_all();
		$data['transport_types'] = $this->package->get_transport_types(); 
		$data['package'] = $this->package->get($id);
	
		$this->load->view('layout/admin/header');
		$this->load->view('admin/package/edit',$data);
		$this->load->view('layout/admin/footer');
	
	}
	
	public function create(){
		$this->load->model('package');
		$this->package->destination_id = $this->input->post('local');
		$this->package->transport_type = $this->input->post('transport');;
		$this->package->passage_price_adult = $this->input->post('passage_price_adult');
		$this->package->passage_price_children = $this->input->post('passage_price_children');
		$this->package->estimated_adult = $this->input->post('estimated_adult');
		$this->package->estimated_children = $this->input->post('estimated_children');
		$this->package->create();		
		redirect('/admin/packages');
	}	
	
	public function update(){
		$this->load->model('package');
		$this->package->id = $this->input->post('id');
		$this->package->destination_id = $this->input->post('local');
		$this->package->transport_type = $this->input->post('transport');;
		$this->package->passage_price_adult = $this->input->post('passage_price_adult');
		$this->package->passage_price_children = $this->input->post('passage_price_children');
		$this->package->estimated_adult = $this->input->post('estimated_adult');
		$this->package->estimated_children = $this->input->post('estimated_children');
		$this->package->save();		
		redirect('/admin/packages');
	}
	
	public function delete($id){
		$this->load->helper('form');
		$this->load->model('package');
		$this->package->delete($id);
		
		redirect('/admin/packages');
	}
	
	
}

/* End of file packages.php */
/* Location: ./application/controllers/packages.php */
