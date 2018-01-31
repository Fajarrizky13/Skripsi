<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function autentikasi($username, $password){
        $sql = $this->db->query('SELECT * from user WHERE username = "'.$username.'" AND password = "'.$password.'"')->num_rows();
        return $sql;
    }
    public function getData($username){
        $sql = $this->db->query('SELECT * from user WHERE username = "'.$username.'"');
        return $sql->result_array();
    }
}