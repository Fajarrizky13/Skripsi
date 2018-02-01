<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pemesanan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_pemesanan');
		$this->load->library('session');
	}

	public function pemesanan() // menampilkan tabel pemesanan
	{
		$data = $this->m_pemesanan->pemesanan();
		$this->load->view('kasir/v_pemesanan', array('pemesanan' => $data));
		// print_r($data);
	}
	public function formTambahPemesanan() {
		$data=array(
			'roti'=>$this->m_pemesanan->roti(),
			'pemesananroti'=>$this->m_pemesanan->pemesananroti()
			); 
		$this->load->view('kasir/v_tambahpemesanan', $data);
	}

	public function tambahPemesanan() // fungsi untuk menambah pemesanan
	{
		if ('submit') {
			$tanggal_ambil = $_POST['tanggal_ambil'];
			$roti = $_POST['roti'];
			$jumlah = $_POST['jumlah'];
			$atas_nama = $_POST['atas_nama'];
			$this->m_pemesanan->tambahpemesanan($tanggal_ambil,$roti,$jumlah,$atas_nama);
		}
	}
	public function formUbahPemesanan($id) //menampilkan detail pemesanan
	{
		$data = $this->m_pemesanan->roti();
		$detail = $this->m_pemesanan->detailpemesanan($id);
		$this->load->view('kasir/v_ubahpemesanan', array('detail' => $detail, 'roti' => $data));
	}
	public function ubahPemesanan($id) // fungsi untuk menambah pemesanan
	{
		if ('update') {
			$tanggal_ambil = $_POST['tanggal_ambil'];
			$roti = $_POST['roti'];
			$jumlah = $_POST['jumlah'];
			$atas_nama = $_POST['atas_nama'];
			$this->m_pemesanan->ubahpemesanan($id,$tanggal_ambil,$roti,$jumlah,$atas_nama);
		}
	}
	public function pemesanan_Pimpinan() // menampilkan tabel pemesanan oleh pimpinan
	{
		
		$data = $this->m_pemesanan->pemesanan();
		$this->load->view('kasir/v_pemesanan', array('pemesanan' => $data));
	}
	public function simpan_pemesanan(){
		$data = $this->input->post();
		$sukses = $this->m_pemesanan->simpan_barang($data);

		if ($sukses){
			redirect(site_url('c_pemesanan/formTambahPemesanan'));
		}else{
			echo "Salah";
		}     
	}
	public function selesai_pesan_kasir(){
	    date_default_timezone_set("Asia/Jakarta");
		$tanggal_pesan=date('Y-m-d H:i:s');
		$total = $this->input->post('total_harga');
		$bayar = $this->input->post('bayar');
		$kembalian = $this->input->post('kembalian');
		$tanggal_ambil = $this->input->post('tanggal_ambil');
		$atas_nama = $this->input->post('atas_nama');
		   
		$data=array(
			'tanggal_pesan'=>$tanggal_pesan,                        
			'total'=>$total,
			'bayar'=>$bayar,
			'kembalian'=>$kembalian,
			'tanggal_ambil' =>$tanggal_ambil,
			'atas_nama' =>$atas_nama
		);
		// $data['id']=$id;

		$id = $this->m_pemesanan->selesai_pesan($data);
		$dataPemesanan = $this->m_pemesanan->detailpemesanan($id);

	   	if ($id){
			// $this->load->view('kasir/v_penjualan', $dataPenjualan);
			redirect(site_url('c_pemesanan/pemesanan'));
		}else{
			echo "Salah";
		}     
	}
}