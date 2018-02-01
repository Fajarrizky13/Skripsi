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
}