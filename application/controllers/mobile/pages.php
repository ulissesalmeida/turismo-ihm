<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('layout/mobile/header');
		$this->load->view('mobile/index');
		$this->load->view('layout/mobile/footer');
	}
	
	public function search()
	{
		$this->load->helper('url');
		$this->load->view('layout/mobile/header');
		$this->load->view('mobile/search');
		$this->load->view('layout/mobile/footer');
	}
	
	public function result()
	{
		$this->load->helper('url');
		$this->load->view('layout/mobile/header');
		$this->load->view('mobile/search_result');
		$this->load->view('layout/mobile/footer');
	}
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */