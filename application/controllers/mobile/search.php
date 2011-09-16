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
		$this->load->view('layout/mobile/header');
		$this->load->view('mobile/search/result');
		$this->load->view('layout/mobile/footer');
	}
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */
