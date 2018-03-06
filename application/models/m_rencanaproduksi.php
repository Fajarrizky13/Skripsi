<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_rencanaproduksi extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function simpanrencana($data)
    {
        return $this->db->insert('rencanaproduksi', $data);
    }

    public function chekrencana($tanggal, $id)
    {
        return $this->db->query("SELECT idrencana FROM rencanaproduksi WHERE tanggal = '" . $tanggal . "' AND idroti=" . $id)->result_array();
    }

    public function getJumlahRencanaProduksi($id, $tanggal)
    {
        $tanggal = (new DateTime($tanggal))->add(new DateInterval("P1D"))->format('Y-m-d');
        return $this->db->query("SELECT SUM(jumlah) as total FROM rencanaproduksi WHERE idroti=" . $id. " AND tanggal='".$tanggal."'")->result_array();
    }
<<<<<<< HEAD

    public function getStatusRencanaProduksi($id, $tanggal)
    {
        $tanggal = (new DateTime($tanggal))->add(new DateInterval("P1D"))->format('Y-m-d');
        return $this->db->query("SELECT status as stat FROM rencanaproduksi WHERE idroti=" . $id. " AND tanggal='".$tanggal."'")->result_array();
    }

    public function bulanan($bulan, $tahun){
        $query = $this->db->query("SELECT SUM(jumlah) as totalbulanan ,  month (p.tanggal_jual) as bulan, r.idroti  , r.namaroti  FROM penjualan p join penjualanroti pr on p.idpenjualan=pr.idpenjualan join roti r on r.idroti =pr.idroti where month (p.tanggal_jual)='".$bulan."' and year(p.tanggal_jual) = '".$tahun."' group by pr.idroti order by pr.idroti" )->result_array();
        return $query;
    }

    public function tahun(){
        $query = $this->db->query("SELECT DISTINCT(year(tanggal_jual)) as tahun FROM penjualan")->result_array();
        return $query;
    }

    public function pesananbulanan($bulan, $tahun, $idroti){
        $query = $this->db->query("SELECT SUM(jumlah) as totalbulanan ,  month (p.tanggal_ambil) as bulan, r.idroti  , r.namaroti  FROM pemesanan p join pemesananroti pr on p.idpemesanan=pr.idpemesanan join roti r on r.idroti =pr.idroti where month (p.tanggal_ambil)='".$bulan."' and year(p.tanggal_ambil) = '".$tahun."' and pr.idroti='".$idroti."'")->result_array();
=======
    public function bulanan($bulan){
        $query = $this->db->query("SELECT SUM(jumlah) as totalbulanan ,  month (p.tanggal_jual) as bulan, r.idroti  , r.namaroti  FROM penjualan p join penjualanroti pr on p.idpenjualan=pr.idpenjualan join roti r on r.idroti =pr.idroti where month (p.tanggal_jual)='".$bulan."' group by pr.idroti" )->result_array();
>>>>>>> 54cdfbad7b125a5aed801ecdbd4e7d94616a7427
        return $query;
    }

    public function setujuiRencana($tanggal, $idroti){
        return $this->db->query("UPDATE rencanaproduksi SET status = 'sudah' where tanggal = '".$tanggal."' AND idroti = ".$idroti); 
    }
}