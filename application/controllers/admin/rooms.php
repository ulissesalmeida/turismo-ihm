<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rooms extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	
	public function form_new($hostel_id)
	{	$this->load->helper('form');
		$this->load->model('hostel');
	
		$data['hostel'] =  $this->hostel->get($hostel_id);
	
		$this->load->view('layout/admin/header');
		$this->load->view('admin/hostel/rooms/new',$data);
		$this->load->view('layout/admin/footer');
	}
	
	public function edit($id){
		$this->load->helper('form');
		$this->load->model('room');		
		
		$data['room'] = $this->room->get($id);
	
		$this->load->view('layout/admin/header');
		$this->load->view('admin/hostel/rooms/edit',$data);
		$this->load->view('layout/admin/footer');
	
	}
	
	public function create(){
		$this->load->model('room');
		$this->room->description = $this->input->post('description');
		$this->room->double_beds = $this->input->post('double_beds');
		$this->room->single_beds = $this->input->post('single_beds');
		$this->room->price = $this->input->post('price');
		$this->room->hostel_id = $this->input->post('hostel_id');
		
		$this->room->create();
		
		redirect('/admin/hostels/edit/'.$this->room->hostel_id);
	}	
	
	public function update(){
		$this->load->model('room');
		$this->room->id = $this->input->post('id');
		$this->room->description = $this->input->post('description');
		$this->room->double_beds = $this->input->post('double_beds');
		$this->room->single_beds = $this->input->post('single_beds');
		$this->room->price = $this->input->post('price');
		$this->room->hostel_id = $this->input->post('hostel_id');
		$this->room->save();
		
		redirect('/admin/hostels/edit/'.$this->room->hostel_id);
	}
	
	public function delete($id){
		$this->load->helper('form');
		$this->load->model('room');
		$room =  $this->room->get($id);
		$this->room->delete($id);
		
		redirect('/admin/hostels/edit/'.$room->hostel_id);
	}
	
	
}

/* End of file hostels.php */
/* Location: ./application/controllers/rooms.php */
