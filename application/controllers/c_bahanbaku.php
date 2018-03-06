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
<<<<<<< HEAD
		$data["stat"] = $this->m_rencanaproduksi->getStatusRencanaProduksi($id, $tanggal);
=======
>>>>>>> 54cdfbad7b125a5aed801ecdbd4e7d94616a7427
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
<<<<<<< HEAD
		$data["datatahun"] = $this->m_rencanaproduksi->tahun();
		$this->load->view('pimpinan/v_kebutuhanstok', array('data'=> $data));
	}
	public function peramalanbulanan()
	{
		$roti=$this->m_produk->jumlahjenis();
		$penjualan=$this->m_produk->penjualan();
		$data["datatahun"] = $this->m_rencanaproduksi->tahun();
		$data["dataaktual"] = $this->m_rencanaproduksi->bulanan($_POST["bulan"]-1, $_POST["tahun"]);
		$data["dataramal"] = $this->m_bahanbaku->lihatkebutuhan($_POST["bulan"]-1, $_POST["tahun"]);
		$data["dataramalbulanini"] = $this->m_bahanbaku->lihatkebutuhan($_POST["bulan"], $_POST["tahun"]);
		// $data["pesananbulanan"] = $this->m_rencanaproduksi->pesananbulanan($_POST["bulan"], $_POST["tahun"]);
		// var_dump($data["pesananbulanan"]);
		// exit();
		if (count($data["dataramal"]) == 0) {
			# code...
		}

		$alpha = 0.9;
		$data["ramal"] = array();
		$data["pesanan"] = array();
		$ramalan = "";
		// var_dump(count($data["dataramal"]));
		// exit();
		for ($i=0; $i < count($data["dataaktual"]) ; $i++) {
			if (count($data["dataramal"]) == 0) {
				$ramalan = ($alpha * $data["dataaktual"][$i]['totalbulanan']) + (1 - $alpha) * $data["dataaktual"][$i]['totalbulanan'];
				$data["ramal"][] = $ramalan;
			} else {
				$ramalan = ($alpha * $data["dataaktual"][$i]['totalbulanan']) + (1 - $alpha) * $data["dataramal"][$i]['totalbulanan'];
				$data["ramal"][] = $ramalan;
			}
			if (count($data["dataramalbulanini"]) == 0) {
				$datakebutuhan["idroti"] = $data["dataaktual"][$i]["idroti"];
				$datakebutuhan["ramalan"] = $ramalan;
				$datakebutuhan["bulan"] = $_POST["tahun"]."-".$_POST["bulan"]."-01";
				$this->m_bahanbaku->tambahkebutuhan($datakebutuhan);
			}

			$pesananbulanan = $this->m_rencanaproduksi->pesananbulanan($_POST["bulan"], $_POST["tahun"],$data["dataaktual"][$i]["idroti"]);
			if (is_null($pesananbulanan[0]["totalbulanan"])) {
				$data["pesanan"][] = "0";
			} else {
				$data["pesanan"][] = $pesananbulanan[0]["totalbulanan"];
			}
		}
		$bulan=$_POST["bulan"];
		$tahun= $_POST["tahun"];
		
		// print_r($data["dataaktual"][0]['totalbulanan']);
		$bln=[31,28,31,30,31,30,31,30,31,30,31,30];
		$bulan2 = 0;
		for ($i=1; $i <13 ; $i++) { 
			if ($_POST["bulan"]==$i) {
				$bulan2 = $bln[$i-2];# code...
			}
		}
		$jumlahjenis=count($roti->result_array());
		$data['roti']=array();
		$data['id']=array();
		$data['harian']=array();
		
		$row=$roti->result_array();
		
		$i=0;
		foreach ($row as $row) {
			$data['roti'][$i] = $data["dataaktual"][$i]['totalbulanan'];
			$data['id'][$i] = $row['idroti']; 
			$i++;
		}
		$xi2[]=array();
		$harian="";
		$jmlharian=array();
		$jumlah=0;
		$xi2a=array();
		$xi2b=array();
		$stdiv=array();
		$safetyfactor=1.28;
		$data['safetystock']=array();

		for ($i=0; $i <$jumlahjenis ; $i++) { 
			$idroti=$data['id'][$i];
			$a=0;
			$harian=$this->m_produk->harian($idroti,$bulan);
			$jumlah=0;

			foreach ($harian as $row) {
			$jmlharian[$i]=$row->jumlah;
					
			$xi2[$i][$a]=$jmlharian[$i]*$jmlharian[$i];

			$jumlah+=$jmlharian[$i];
			$a++;
			}
			
			$xi2a[$i]=array_sum($xi2[$i]);
			// print_r($xi2a[$i]);
			$xi2b[$i]=$jumlah*$jumlah;
			// print_r($xi2b);
			// print_r($bulan2);
		
			$stdiv[$i]=sqrt(abs(($bulan2*($xi2a[$i]-$xi2b[$i])))/($bulan2*($bulan2-1)));
			// print_r($xi2a);
			// print_r($xi2b);
			// print_r($stdiv);
			// print_r($bulan);
			
			$data['safetystock'][$i]=number_format(($stdiv[$i]*$safetyfactor),2);
			// print_r($data['safetystock']); 
		
		}
		$data2 = array(
			'data' => $data,
			'tahun' => $tahun,
			'bulan'	=> $bulan,
			);
		
		$this->load->view('pimpinan/v_kebutuhanstok', $data2);
=======
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
>>>>>>> 54cdfbad7b125a5aed801ecdbd4e7d94616a7427
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