<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tours extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	public function index(){
		$this->load->model('tour');
		$data['tours'] = $this->tour->list_all();
		
		$this->load->view('layout/admin/header');
		$this->load->view('admin/tour/index', $data);
		$this->load->view('layout/admin/footer');
	}

	public function form_new()
	{	$this->load->helper('form');
		$this->load->model('local');
	
		$data['places'] =  $this->local->list_all();
		$this->load->view('layout/admin/header');
		$this->load->view('admin/tour/new',$data);
		$this->load->view('layout/admin/footer');
	}
	
	public function edit($id){
		$this->load->helper('form');
		$this->load->model('tour');
		$this->load->model('local');
	
		$data['places'] =  $this->local->list_all();
		$data['tour'] = $this->tour->get($id);
	
		$this->load->view('layout/admin/header');
		$this->load->view('admin/tour/edit',$data);
		$this->load->view('layout/admin/footer');
	
	}
	
	public function create(){
		$this->load->model('tour');
		$this->tour->name = $this->input->post('name');
		$this->tour->local_id = $this->input->post('local');
		$this->tour->price_adult = $this->input->post('price_adult');
		$this->tour->price_children = $this->input->post('price_children');
		$this->tour->description = $this->input->post('description');
		$this->tour->create();
		
		redirect('/admin/tours');
	}	
	
	public function update(){
		$this->load->model('tour');
		$this->tour->id = $this->input->post('id');
		$this->tour->name = $this->input->post('name');
		$this->tour->local_id = $this->input->post('local');
		$this->tour->price_adult = $this->input->post('price_adult');
		$this->tour->price_children = $this->input->post('price_children');
		$this->tour->description = $this->input->post('description');
		$this->tour->save();
		
		redirect('/admin/tours');
	}
	
	public function delete($id){
		$this->load->helper('form');
		$this->load->model('tour');
		$this->tour->delete($id);
		
		redirect('/admin/tours');
	}
	
	
}

/* End of file tours.php */
/* Location: ./application/controllers/tours.php */
