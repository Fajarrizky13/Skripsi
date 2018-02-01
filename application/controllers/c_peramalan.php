<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_peramalan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        //$this->load->model('m_peramalan');
        $this->load->model('m_penjualan');
        $this->load->model('m_pemesanan');
        $this->load->model('m_rencanaproduksi');
        $this->load->model('m_produk');
        $this->load->library('session');
    }

    // melihat halaman peramalan
    public function viewHalamanPeramalan()
    {
        $data["roti"] = $this->m_produk->produk();
        $this->load->view('pimpinan/v_peramalan', array('data' => $data));
    }

    // menampilkan permalan idroti tertentu
    public function peramalanRoti()
    {
        $alpha = 0.5;
        $data["ramal"] = array();
        $data["peramalan"] = $this->m_penjualan->peramalan($_POST["idroti"]);
        $index = 0;
        foreach ($data["peramalan"] as $ramal) {

            if ($index == 0) {
                $data["ramal"][] = 0;
            } else {
                $data["ramal"][] = ($alpha * $ramal["total"]) + (1 - $alpha) * $data["ramal"][$index - 1];
            }
            $pesanan = $this->m_pemesanan->peramalan($ramal["bulan"]);
            if ($pesanan[0]["total"] == null) {
                $data["pesanan"][] = 0;
            } else {
                $data["pesanan"][] = $pesanan[0]["total"];
            }

            $rencana = $data["ramal"][$index] + $data["pesanan"][$index];

            $tanggal = (new DateTime($ramal["bulan"]))->add(new DateInterval("P1D"))->format('Y-m-d');
            $dataRencana = array(
                'idroti' => $_POST["idroti"],
                'jumlah' => $rencana,
                'tanggal' => $tanggal,
            );
            $chekTanggal = $this->m_rencanaproduksi->chekrencana($tanggal, $_POST["idroti"]);
            if (sizeof($chekTanggal) == 0) {
                $this->m_rencanaproduksi->simpanrencana($dataRencana);
            }
            $index++;
        }
//        var_dump($dataRencana);
//        exit();
        $data["roti"] = $this->m_produk->produk();
        $this->load->view('pimpinan/v_peramalan', array('data' => $data));
    }
}