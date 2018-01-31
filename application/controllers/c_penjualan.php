<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_penjualan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_penjualan');
		$this->load->library('session');
		$this->load->model('m_pemesanan');

	}

	public function penjualan() // menampilkan tabel penjualan
	{
		$data = $this->m_penjualan->penjualan();
		$this->load->view('kasir/v_penjualan', array('penjualan' => $data));
	}
	public function penjualan_Pimpinan() // menampilkan tabel penjualan oleh pimpinan
	{
		//$data = $this->m_pemesanan->pemesanan();
		$this->load->view('pimpinan/v_penjualan');
	}
	public function formTambahPenjualan() {
		$data=array(
			'roti'=>$this->m_pemesanan->roti(),
			'penjualanroti'=>$this->m_penjualan->penjualanroti()
			); 
		$this->load->view('kasir/v_tambahpenjualan', $data);
	}
	public function simpan_penjualan(){
		$data = $this->input->post();
		$sukses = $this->m_penjualan->simpan_barang($data);

		if ($sukses){
			redirect(site_url('c_penjualan/formTambahPenjualan'));
		}else{
			echo "Salah";
		}     
	}
	
	public function selesai_belanja_kasir(){
		$tanggal=date('Y-m-d H:i:s');
		$total = $this->input->post('total_harga');
		$bayar = $this->input->post('bayar');
		$kembalian = $this->input->post('kembalian');
		   
		$data=array(
			'tanggal_jual'=>$tanggal,                        
			'total'=>$total,
			'bayar'=>$bayar,
			'kembalian'=>$kembalian
		);
		// $data['id']=$id;

		$id = $this->m_penjualan->selesai_belanja($data);
		$dataPenjualan = $this->m_penjualan->detailpenjualan($id);

	   	if ($id){
			// $this->load->view('kasir/v_penjualan', $dataPenjualan);
			redirect(site_url('c_penjualan/penjualan'));
		}else{
			echo "Salah";
		}     
	}
}