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

}


