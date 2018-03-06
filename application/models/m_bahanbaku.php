<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_bahanbaku extends CI_Model {

	function __construct(){
		parent::__construct();
	}


	function bahanbaku(){
		$query = $this->db->query('SELECT * FROM bahan_baku')->result_array();
		return $query;
	}
	function detailreseller($id){
		$query = $this->db->query('SELECT * FROM datareseller where idreseller = '.$id)->result_array();
		return $query[0];
	}
	function tambahreseller($data) {
		$query = $this->db->query("insert into datareseller values (' ','$data[namareseller]','$data[alamatreseller]','$data[notelepon]','$data[email]')");
		return $query;
	}
	function ubahreseller($data,$id) {
		$query = $this->db->query("update datareseller set namareseller = '$data[namareseller]', alamatreseller = '$data[alamatreseller]', notelepon = '$data[notelepon]', email = '$data[email]'");
		return $query;
	}
	function resep($id){
		$query = $this->db->query('SELECT * FROM resep where idroti='.$id)->result_array();
		return $query;
	}

	function validasi($id,$status){
		$this->db->set('status', $status);
		$this->db->where('idrencana', $id);
		$this->db->update('rencanaproduksi');
		redirect('c_bahanbaku/rencanaproduksi');
	}

	function rencanaproduksi(){
		$query = $this->db->query('SELECT * FROM rencanaproduksi where status = "sudah"')->result_array();
		return $query;
	}

	function rencanaproduksiRoti($id){
		$query = $this->db->query('SELECT * FROM rencanaproduksi where status = "sudah" and idroti = '.$id)->result_array();
		return $query;
	}

	function rincianbahan($id){
		$query = $this->db->query('SELECT * FROM rencanaproduksi rp JOIN roti r on rp.idroti = r.idroti where status = "sudah" and rp.idroti = '.$id)->result_array();
		return $query;
	}
<<<<<<< HEAD

	function lihatkebutuhan($bulan, $tahun){
		$query = $this->db->query("SELECT SUM(jumlah) as totalbulanan,  month (k.bulan) as bulan, r.idroti , r.namaroti  FROM kebutuhan k join roti r on k.idroti=r.idroti where month (k.bulan)='".$bulan."' and year(k.bulan) = '".$tahun."' group by r.idroti order by r.idroti" )->result_array();
        return $query;
	}

	function tambahkebutuhan($data){
		$query = $this->db->query("insert into kebutuhan values (' ','$data[idroti]','$data[ramalan]','belum','$data[bulan]',null)" );
        return $query;
	}
=======
>>>>>>> 54cdfbad7b125a5aed801ecdbd4e7d94616a7427
}


