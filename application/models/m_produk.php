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
    public function jumlahjenis(){
    	$query=$this->db->query('SELECT idroti FROM roti');
    	return $query;
    }
    public function penjualan(){
        $query=$this->db->query('SELECT * FROM penjualan')->result_array();
        return $query;
    }
    public function harian($id, $bulan){
        
        $idjual=$this->db->query('SELECT idpenjualan FROM penjualan where MONTH(tanggal_jual) ='.($bulan-1))->result_array();
        // print_r($idjual);
        $query2=array();
        $i=0;
        foreach ($idjual as $key) {
    	$query2[$i]=$this->db->query('SELECT pr.jumlah FROM penjualan p join penjualanroti pr on p.idpenjualan = pr.idpenjualan where pr.idroti='.$id.' and pr.idpenjualan ='.$key['idpenjualan'])->row();
            # code...
        // print_r($query2[$i]);
        $i++;
        }
        // exit();
        $query=array_merge($query2);
        // var_dump($query);
    	return $query;
    }	

}
