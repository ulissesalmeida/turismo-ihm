<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('layout/admin/header');
		$this->load->view('admin/index');
		$this->load->view('layout/admin/footer');
	}
}

/* End of file pages.php */
/* Location: ./application/controllers/admin/pages.php */
