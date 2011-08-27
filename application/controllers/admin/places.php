<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Places extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	public function index(){
		$this->load->model('local');
		$data['places'] = $this->local->list_all();
		
		$this->load->view('layout/admin/header');
		$this->load->view('admin/local/index', $data);
		$this->load->view('layout/admin/footer');
	}

	public function form_new()
	{	$this->load->helper('form');
		$this->load->view('layout/admin/header');
		$this->load->view('admin/local/new');
		$this->load->view('layout/admin/footer');
	}
	
	public function edit($id){
		$this->load->helper('form');
		$this->load->model('local');
		$data['local'] = $this->local->get($id);
	
		$this->load->view('layout/admin/header');
		$this->load->view('admin/local/edit',$data);
		$this->load->view('layout/admin/footer');
	
	}
	
	public function create(){
		$this->load->model('local');
		$this->local->city = $this->input->post('city');
		$this->local->state = $this->input->post('state');
		$this->local->country = $this->input->post('country');
		$this->local->create();
		
		redirect('/admin/places');
	}	
	
	public function update(){
		$this->load->model('local');
		$this->local->id = $this->input->post('id');
		$this->local->city = $this->input->post('city');
		$this->local->state = $this->input->post('state');
		$this->local->country = $this->input->post('country');
		$this->local->save();
		
		redirect('/admin/places');
	}
	
	public function delete($id){
		$this->load->helper('form');
		$this->load->model('local');
		$this->local->delete($id);
		
		redirect('/admin/places');
	}
	
	
}

/* End of file places.php */
/* Location: ./application/controllers/places.php */