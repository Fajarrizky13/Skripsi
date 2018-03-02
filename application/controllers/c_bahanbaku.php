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
		$data["resep"] = $this->m_bahanbaku->resep($id);
		$data["roti"] = $this->m_produk->detailproduk($id);
		$data["kebutuhan"] = $this->m_rencanaproduksi->getJumlahRencanaProduksi($id, $tanggal);
		// $this->load->view('pimpinan/v_kebutuhanbahan', array('data' => $data));
		// return($data['kebutuhan']);
		echo json_encode($data);
	}

	public function rencanaproduksi() // menampilkan tabel produk
	{
		$data = $this->m_bahanbaku->rencanaproduksi();
		$this->load->view('pimpinan/v_rencana', array('rencanaproduksi' => $data));
	} 

	public function validasikebutuhanbahan($id){
		if ('update') {
			$status = 'SUDAH';
			$this->m_bahanbaku->validasi($id,$status);  
		}
	}

	public function kebutuhanstok()
	{
		$this->load->view('pimpinan/v_kebutuhanstok');
	}
	public function peramalanbulanan()
	{
		$data["bulan0"] = $this->m_rencanaproduksi->bulanan($_POST["bulan"]-1);
		$data["bulan1"] = $this->m_rencanaproduksi->bulanan($_POST["bulan"]);

		$alpha = 0.9;
		$data["ramal"] = array();
		for ($i=0; $i < count($data["bulan1"]) ; $i++) { 

			$data["ramal"][] = ($alpha * $data["bulan1"][$i]['totalbulanan']) + (1 - $alpha) * $data["bulan0"][$i]['totalbulanan'];
		}

		$this->load->view('pimpinan/v_kebutuhanstok', array('data' => $data));
	}
	public function produksi() // menampilkan tabel produk
	{
		// $data['rencanaproduksi'] = $this->m_bahanbaku->rencanaproduksi();
		// $data['roti'] = $this->m_produk->produk();
		// $data['idroti'] = 0;
		// $this->load->view('produksi/v_produksi', $data);
		$data['roti'] = $this->m_produk->produk();
		if(isset($_POST["idroti"])){
			$data['rencanaproduksi'] = $this->m_bahanbaku->rencanaproduksiRoti($_POST["idroti"]);
			$data['rincianbahan'] = $this->m_bahanbaku->rincianbahan($_POST["idroti"]);
			$data['idroti'] = $_POST["idroti"];
		} else{
			$data['rencanaproduksi'] = $this->m_bahanbaku->rencanaproduksiRoti(0);
			$data['rincianbahan'] = $this->m_bahanbaku->rincianbahan(0);
			$data['idroti'] = 0;
		}
		$this->load->view('produksi/v_produksi', $data);
	}

	public function getPeramalan() // menampilkan tabel produk
	{
		$data['rencanaproduksi'] = $this->m_bahanbaku->rencanaproduksiRoti($_POST["idroti"]);
		$data['roti'] = $this->m_produk->produk();
		$data['idroti'] = $_POST["idroti"];
		$this->load->view('produksi/v_produksi', $data);
	}
}