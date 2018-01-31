<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

  public function __construct(){
    parent::__construct();       
    $this->load->library('session');
    $this->load->model('m_login');
  }

  public function login()
  {
    if ('login') {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $hasil = $this->m_login->autentikasi($username, $password);
      if ($hasil > 0) {
        $array = $this->m_login->getData($username);
        $_SESSION['iduser'] = $array[0]['iduser'];
        $_SESSION['username'] = $array[0]['username'];
        $_SESSION['password'] = $array[0]['password'];
         $_SESSION['idlevel'] = $array[0]['idlevel'];    
      echo '<script type="text/javascript">alert("Anda Berhasil Login!.")</script>';
      redirect('Welcome/login');
    } else {
      echo "Salah Login";
    }
  }

}

public function logout()
{
  $this->session->unset_userdata('data');
  unset(
    $_SESSION['idlevel'] 
  );
  redirect('Welcome');
}
}
