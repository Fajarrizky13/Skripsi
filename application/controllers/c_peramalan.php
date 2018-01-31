<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_peramalan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		//$this->load->model('m_peramalan');
		$this->load->model('m_penjualan');
		$this->load->library('session');
	}

	public function peramalan()
	{
		$alpha=0.5;
		$data = $this->m_penjualan->peramalan();
		var_dump($data);
		exit();
		$this->load->view('pimpinan/v_peramalan');
	}
}