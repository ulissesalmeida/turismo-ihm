<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hostels extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	
	public function index(){
		$this->load->model('hostel');
		$data['hostels'] = $this->hostel->list_all();
		
		$this->load->view('layout/admin/header');
		$this->load->view('admin/hostel/index', $data);
		$this->load->view('layout/admin/footer');
	}

	public function form_new()
	{	$this->load->helper('form');
		$this->load->view('layout/admin/header');
		$this->load->view('admin/hostel/new');
		$this->load->view('layout/admin/footer');
	}
	
	public function edit($id){
		$this->load->helper('form');
		$this->load->model('hostel');
		$data['local'] = $this->hostel->get($id);
	
		$this->load->view('layout/admin/header');
		$this->load->view('admin/hostel/edit',$data);
		$this->load->view('layout/admin/footer');
	
	}
	
	public function create(){
		$this->load->model('hostel');
		$this->hostel->city = $this->input->post('city');
		$this->hostel->state = $this->input->post('state');
		$this->hostel->country = $this->input->post('country');
		$this->local->create();
		
		redirect('/admin/hostels');
	}	
	
	public function update(){
		$this->load->model('hostel');
		$this->hostel->id = $this->input->post('id');
		$this->hostel->city = $this->input->post('city');
		$this->hostel->state = $this->input->post('state');
		$this->hostel->country = $this->input->post('country');
		$this->local->save();
		
		redirect('/admin/hostels');
	}
	
	public function delete($id){
		$this->load->helper('form');
		$this->load->model('hostel');
		$this->local->delete($id);
		
		redirect('/admin/hostels');
	}
	
	
}

/* End of file hostels.php */
/* Location: ./application/controllers/hostels.php */