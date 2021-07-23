<?php 

class Dashboard extends CI_Controller{
	public function index()
	{
		$this->load->view('templates_kredit/header');
		$this->load->view('templates_kredit/sidebar');
		$this->load->view('bagiankredit/dashboard');
		$this->load->view('templates_kredit/footer');
	}
}