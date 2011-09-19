<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function index()
	{
		$this->load->model('local');
		$data['countries'] = $this->local->list_countries();
		$this->load->view('layout/mobile/header');
		$this->load->view('mobile/search/index',$data);
		$this->load->view('layout/mobile/footer');
	}
	
	public function search_tours()
	{
		$filter['country'] = $this->input->post('country');	
		$this->_search_tours($filter, false);
	}
	
	public function search_tours_g($country)
	{
		$filter['country'] = urldecode($country);
		$this->_search_tours($filter, true);
	}
	
	private function _search_tours($filter, $back_to_home){
		$this->load->model('package');
		
		$data['packages'] = $this->package->list_by_filter($filter);
		$data['back_to_home'] = $back_to_home;
		$this->load->view('layout/mobile/header');
		$this->load->view('mobile/search/result',$data);
		$this->load->view('layout/mobile/footer');
	}
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */
