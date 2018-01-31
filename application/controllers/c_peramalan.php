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
            $index++;
        }
//        var_dump($data["ramal"]);
//        exit();
        $data["roti"] = $this->m_produk->produk();
        $this->load->view('pimpinan/v_peramalan', array('data' => $data));
    }
}