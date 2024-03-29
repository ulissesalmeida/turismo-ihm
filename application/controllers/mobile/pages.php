<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('layout/mobile/header');
		$this->load->view('mobile/pages/index');
		$this->load->view('layout/mobile/footer');
	}
	
	public function about()
	{
		$this->load->view('layout/mobile/header');
		$this->load->view('mobile/pages/about');
		$this->load->view('layout/mobile/footer');
	}
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */
