<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Local extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function form_new()
	{		
		$this->load->view('layout/mobile/header');
		$this->load->view('mobile/index');
		$this->load->view('layout/mobile/footer');
	}
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */