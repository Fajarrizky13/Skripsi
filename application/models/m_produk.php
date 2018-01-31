<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function produk(){
		$query = $this->db->query('SELECT * FROM roti')->result_array();
		return $query;
	}
	
	public function detailproduk($id)
    {
        $data = $this->db->query('SELECT * FROM roti WHERE idroti = '.$id)->result_array();
        return $data[0];
    }

	function tambahproduk($namaroti,$harga)
	{
		$data = array(
			'idroti' => null,
			'namaroti' => $namaroti,
			'harga' => $harga,
		);
		$this->db->insert('roti', $data);
		redirect('c_produk/produk');
	}

	 public function ubahproduk($id,$namaroti,$harga)
    {
        $this->db->set('namaroti', $namaroti);
        $this->db->set('harga', $harga);
        $this->db->where('idroti', $id);
        $this->db->update('roti');
        redirect('c_produk/produk');
    }

	 public function hapusproduk($id,$tabel)
    {
        $this->db->where($id);
        $this->db->delete($tabel);
        
    }	

}
