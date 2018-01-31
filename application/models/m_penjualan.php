<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penjualan extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	function penjualan(){
		$query = $this->db->query('SELECT idpenjualan, date_format(tanggal_jual, \'%d %m %Y\') as tanggal, date_format(tanggal_jual, \'%T\') as jam, total, bayar, kembalian  FROM penjualan')->result_array();
		return $query;
	}
	public function get_id($id)
    {
        $this->db->where('idDetail', $id);
        return $this->db->get('detail_transaksi')->result_array()[0];
    }
	public function simpan_barang($data)
    {    
        return $this->db->insert('penjualanroti',$data);
    }
    function penjualanroti() {
        return $this->db->query("SELECT * FROM penjualanroti pr join roti r on pr.idroti=r.idroti where pr.idpenjualan = 0 order by pr.idpenjroti asc" )->result_array();
    }
    function selesai_belanja($data)
    {   
        $this->db->insert('penjualan',$data);    
        $last_id= $this->db->query("SELECT max(idpenjualan) as idpenjualan from penjualan ")->result_array();
        // printf($last_id[0]['id_transaksi']);
        $this->db->query("update penjualanroti set idpenjualan='".$last_id[0]['idpenjualan']."' where idpenjualan='0' ");
        return $last_id[0]['idpenjualan'];
    }

    function peramalan(){
        date_default_timezone_set("Asia/Jakarta");
        $d = strtotime("yesterday");
        $tanggal = date("Y-m-d", $d);
        return $this->db->query("SELECT pr.jumlah from penjualan p join penjualanroti pr on pr.idpenjualan = p.idpenjualan where DATE_FORMAT(p.tanggal_jual, \"%Y-%m-%d\") = '".$tanggal."'")->result_array();
    }

    function edit($id){
     
        return $this->db->query("SELECT * FROM roti r join penjualanroti pr on r.idroti=pr.idroti join penjualan p on pr.idpenjualan=p.idpenjualan  WHERE pr.idpenjualan = $id")->result_array();
    }
    public function detailpenjualan($id)
	{
		$data = $this->db->query('SELECT * FROM penjualan WHERE idpenjualan = '.$id)->result_array();
		return $data[0];
	}
}