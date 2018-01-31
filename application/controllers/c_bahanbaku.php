<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_bahanbaku extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_bahanbaku');
		$this->load->library('session');
	}

	public function bahanbaku()
	{
		$data = $this->m_bahanbaku->bahanbaku();
		$this->load->view('pengadaan/v_bahanbaku', array('bahanbaku' => $data));
	}
	public function kebutuhanbahan()
	{
		$data = array( 
			'resep1'=> $this->m_bahanbaku->resep(1),
			'resep2'=> $this->m_bahanbaku->resep(2),
			'resep3'=> $this->m_bahanbaku->resep(3)
			);
		$this->load->view('pimpinan/v_kebutuhanbahan', $data);
	}
}