<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

public function __construct(){
	parent::__construct();       
        $this->load->library('session');
        $this->load->model('m_login');

}
	public function index()
	{
			$this->load->view('login');
	
	}
	public function login()
	{
		$idlevel = $_SESSION['idlevel'];
		if ($idlevel==1){
			$this->load->view('kasir/v_dasboardkasir');
		} elseif ($idlevel==2) {
			$this->load->view('produksi/v_dasboardproduksi');
		} 
		elseif ($idlevel==3) {
			$this->load->view('pengadaan/v_dasboardpengadaan');
		} else{
			$this->load->view('pimpinan/v_dasboardpimpinan');
		}
	}
}
