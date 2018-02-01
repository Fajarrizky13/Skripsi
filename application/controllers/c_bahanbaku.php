<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_bahanbaku extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_bahanbaku');
		$this->load->model('m_rencanaproduksi');
		$this->load->model('m_produk');
		$this->load->library('session');
	}

	public function bahanbaku()
	{
		$data = $this->m_bahanbaku->bahanbaku();
		$this->load->view('pengadaan/v_bahanbaku', array('bahanbaku' => $data));
	}
	public function kebutuhanbahan()
	{
	    $id = $_GET["id"];
	    $tanggal = $_GET["tanggal"];
//		$data = array(
//			'resep1'=> $this->m_bahanbaku->resep(1),
//			'resep2'=> $this->m_bahanbaku->resep(2),
//			'resep3'=> $this->m_bahanbaku->resep(3)
//			);
        $data["resep"] = $this->m_bahanbaku->resep($id);
        $data["roti"] = $this->m_produk->detailproduk($id);
        $data["kebutuhan"] = $this->m_rencanaproduksi->getJumlahRencanaProduksi($id, $tanggal);
		$this->load->view('pimpinan/v_kebutuhanbahan', array('data' => $data));
	}
}