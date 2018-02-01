<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemesanan extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function pemesanan()
    {
        $query = $this->db->query('SELECT * FROM pemesanan')->result_array();
        return $query;
    }

    function roti()
    {
        $query = $this->db->query('SELECT * FROM roti')->result_array();
        return $query;
    }

    function pemesananroti()
    {
        return $this->db->query("SELECT * FROM pemesananroti pr join roti r on pr.idroti=r.idroti where pr.idpemesanan = 0 order by pr.idpemroti asc")->result_array();
    }

    function tambahpemesanan($tanggal_ambil, $roti, $jumlah, $atas_nama)
    {
        $data = array(
            'idpemesanan' => null,
            'tanggal_ambil' => $tanggal_ambil,
            'idroti' => $roti,
            'jumlah' => $jumlah,
            'atas_nama' => $atas_nama,
        );
        $this->db->insert('pemesanan', $data);
        redirect('c_pemesanan/pemesanan');
    }

    public function detailpemesanan($id)
    {
        $data = $this->db->query('SELECT * FROM pemesananroti pr join roti r ON (pr.idroti = r.idroti) WHERE idpemroti = ' . $id)->result_array();
        return $data[0];
    }

    function ubahpemesanan($id, $tanggal_ambil, $roti, $jumlah, $atas_nama)
    {
        $this->db->set('tanggal_ambil', $tanggal_ambil);
        $this->db->set('idroti', $roti);
        $this->db->set('jumlah', $jumlah);
        $this->db->set('atas_nama', $atas_nama);
        $this->db->where('idpemesanan', $id);
        $this->db->update('pemesanan');
        redirect('c_pemesanan/pemesanan');
    }

    function selesai_pesan($data)
    {
        $this->db->insert('pemesanan', $data);
        $last_id = $this->db->query("SELECT max(idpemesanan) as idpemesanan from pemesanan ")->result_array();
        // printf($last_id[0]['id_transaksi']);
        $this->db->query("update pemesananroti set idpemesanan='" . $last_id[0]['idpemesanan'] . "' where idpemesanan='0' ");
        return $last_id[0]['idpemesanan'];
    }

    public function simpan_barang($data)
    {
        return $this->db->insert('pemesananroti', $data);
    }

    public function peramalan($tanggal)
    {
        $date = (new DateTime($tanggal))->add(new DateInterval("P1D"))->format('d F Y');
	    return $this->db->query("SELECT SUM(pr.jumlah) as total FROM pemesanan p join pemesananroti pr on p.idpemesanan = pr.idpemesanan where DATE_FORMAT(p.tanggal_ambil, '%d %M %Y') = '".$date."'")->result_array();
    }
}