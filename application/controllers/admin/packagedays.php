<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PackageDays extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	
	public function form_new($package_id)
	{	$this->load->helper('form');
		$this->load->model('package');
		$this->load->model('room');
		
		$package = $this->package->get($package_id);
		$data['package'] = $package;
		$data['rooms'] = $this->room->list_by_local($package->destination_id);
	
		$this->load->view('layout/admin/header');
		$this->load->view('admin/package/days/new',$data);
		$this->load->view('layout/admin/footer');
	}
	
	public function edit($id){
		$this->load->helper('form');
		$this->load->model('packageday');
		$this->load->model('package');
		$this->load->model('room');
		
		$package_day = $this->packageday->get($id);
		$package = $this->package->get($package_day->tour_package);		
		
		$data['package_day'] = $package_day;
		$data['rooms'] = $this->room->list_by_local($package->destination_id);
		
	
		$this->load->view('layout/admin/header');
		$this->load->view('admin/package/days/edit',$data);
		$this->load->view('layout/admin/footer');
	
	}
	
	public function create(){
		$this->load->model('packageday');
		
		$date = explode("/",$this->input->post('date'));
		$this->packageday->date = $date[2].'-'.$date[1].'-'.$date[0];
		$this->packageday->rooms = $this->input->post('rooms');	
		$this->packageday->tour_package = $this->input->post('tour_package');		
		$this->packageday->create();		
		redirect('/admin/packages/edit/'.$this->packageday->tour_package);
	}	
	
	public function update(){
		$this->load->model('packageday');
		
		$date = explode("/",$this->input->post('date'));
		$this->packageday->id	= $this->input->post('id');	
		$this->packageday->date = $date[2].'-'.$date[1].'-'.$date[0];
		$this->packageday->rooms = $this->input->post('rooms');	
		$this->packageday->tour_package = $this->input->post('tour_package');	
		$this->packageday->save();
		
		redirect('/admin/packages/edit/'.$this->packageday->tour_package);
	}
	
	public function delete($id){
		$this->load->helper('form');
		$this->load->model('packageday');
		$packageday =  $this->packageday->get($id);
		$this->packageday->delete($id);
		
		redirect('/admin/hostels/edit/'.$packageday->hostel_id);
	}
	
	
}

/* End of file hostels.php */
/* Location: ./application/controllers/packagedays.php */
