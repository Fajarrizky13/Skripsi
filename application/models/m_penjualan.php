<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penjualan extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	function penjualan(){
		$query = $this->db->query('SELECT idpenjualan, date_format(tanggal_jual, \'%d %m %Y\') as tanggal, date_format(tanggal_jual, \'%T\') as jam, total, bayar, kembalian  FROM penjualan order by idpenjualan desc')->result_array();
		return $query;
	}
    function detailp($id){
        $query = $this->db->query('SELECT * FROM penjualanroti p join roti r on p.idroti=r.idroti where idpenjualan=' .$id)->result_array();
        return $query;
    }
    public function rekap($id){
        $query = $this->db->query('SELECT * , date_format(tanggal_jual, \'%d %m %Y\') as tanggal FROM penjualan where idpenjualan = ' .$id)->result_array();
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
    function cekRoti($id){
        $query = $this->db->query("SELECT * FROM `penjualanroti` WHERE idpenjualan = 0 AND idroti = ".$id);
        return $query->num_rows();
    }
    function getRoti($id){
        return $this->db->query("SELECT jumlah FROM `penjualanroti` WHERE idpenjualan = 0 AND idroti = ".$id)->result_array()[0];
    }
    function tambahRoti($id, $jumlah) {
        return $this->db->query("UPDATE penjualanroti SET jumlah = ".$jumlah." where idroti = ".$id." AND idpenjualan = 0");   
    }
    function ubahpenjualanroti($id, $jumlah) {
        return $this->db->query("UPDATE penjualanroti SET jumlah = ".$jumlah." where idpenjroti = ".$id);   
    }
    function selesai_belanja($data)
    {   
        $this->db->insert('penjualan',$data);    
        $last_id= $this->db->query("SELECT max(idpenjualan) as idpenjualan from penjualan ")->result_array();
        // printf($last_id[0]['id_transaksi']);
        $this->db->query("update penjualanroti set idpenjualan='".$last_id[0]['idpenjualan']."' where idpenjualan='0' ");
        return $last_id[0]['idpenjualan'];
    }

    function peramalan($idroti){
        return $this->db->query("SELECT pr.idroti as id_roti, DATE_FORMAT(p.tanggal_jual, \"%d %M %Y\") as tanggal, SUM(pr.jumlah) as total from penjualan p join penjualanroti pr on pr.idpenjualan = p.idpenjualan where pr.idroti = ".$idroti." group by DATE_FORMAT(p.tanggal_jual, \"%d\") ORDER BY DATE_FORMAT(p.tanggal_jual, \"%d\") ASC")->result_array();
    }

    function edit($id){
     
        return $this->db->query("SELECT * FROM roti r join penjualanroti pr on r.idroti=pr.idroti join penjualan p on pr.idpenjualan=p.idpenjualan  WHERE pr.idpenjualan = $id")->result_array();
    }
    public function detailpenjualan($id)
	{
		$data = $this->db->query('SELECT * FROM penjualan WHERE idpenjualan = '.$id)->result_array();
		return $data[0];
	}
    public function delete($id)
    {
        $this->db->where('idpenjroti', $id);
        return $this->db->delete('penjualanroti');
    }
}