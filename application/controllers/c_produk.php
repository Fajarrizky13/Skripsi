<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_produk extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('m_produk');
    $this->load->library('session');
  }

  public function produk() // menampilkan tabel produk
  {
    $data = $this->m_produk->produk();
    $this->load->view('pimpinan/v_produk', array('produk' => $data));

  } 
  public function formTambahProduk() // menampilkan form tambah produk
  {

    $this->load->view('pimpinan/v_tambahproduk');
    
  } 

  public function tambahProduk() // fungsi untuk menambah produk 
  {
    if ('submit') {
      $namaroti = $_POST['namaroti'];
      $harga = $_POST['harga'];
      $this->m_produk->tambahproduk($namaroti,$harga);
    }
  } 

  public function detailProduk($id) //menampilkan detail produk
  {
    // $data = $this->m_produk->detailproduk($id);
    $this->load->view('pimpinan/v_detailproduk');
  }
  public function hapusProduk($id) // menghapus produk
  {
    $data = array('idproduk' =>$id);
    $this->m_produk->hapusproduk($data,'dataproduk');
    redirect('c_produk/produk');
  }

    public function formUbahProduk($id) // menampilkan form tambah produk
    {

      $detail = $this->m_produk->detailproduk($id);
      $this->load->view('pimpinan/v_ubahproduk', array('detail' => $detail));
    }

    public function ubahProduk($id)
    {
      if ('update') {
        $namaroti = $_POST['namaroti'];
        $harga = $_POST['harga'];
        $this->m_produk->ubahproduk($id,$namaroti,$harga);  
      }
    }
}