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
		$this->load->model('local');
	
		$data['places'] =  $this->local->list_all();
	
		$this->load->view('layout/admin/header');
		$this->load->view('admin/hostel/new',$data);
		$this->load->view('layout/admin/footer');
	}
	
	public function edit($id){
		$this->load->helper('form');
		$this->load->model('hostel');
		$this->load->model('local');		
		
		$data['hostel'] = $this->hostel->get($id);
		$data['places'] =  $this->local->list_all();
	
		$this->load->view('layout/admin/header');
		$this->load->view('admin/hostel/edit',$data);
		$this->load->view('layout/admin/footer');
	
	}
	
	public function create(){
		$this->load->model('hostel');
		$this->hostel->name = $this->input->post('name');
		$this->hostel->local_id = $this->input->post('local');
		$id = $this->hostel->create();
		
		redirect('/admin/hostels/edit/'.$id);
	}	
	
	public function update(){
		$this->load->model('hostel');
		$this->hostel->id = $this->input->post('id');
		$this->hostel->name = $this->input->post('name');
		$this->hostel->local_id = $this->input->post('local');;
		$this->hostel->save();
		
		redirect('/admin/hostels');
	}
	
	public function delete($id){
		$this->load->helper('form');
		$this->load->model('hostel');
		$this->hostel->delete($id);
		
		redirect('/admin/hostels');
	}
	
	
}

/* End of file hostels.php */
/* Location: ./application/controllers/hostels.php */
