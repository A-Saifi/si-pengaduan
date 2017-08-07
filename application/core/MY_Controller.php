<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Frontend extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->CI =& get_instance();
    // Library
    $this->CI->load->library('load_data_admin');
    $this->CI->load->library('logincheck');
    $this->CI->load->library('waktu');
    $this->CI->load->library('load_data');
    // End Library
    $this->CI->logincheck->is_logged_in();
  }

  function alert($pesan, $url) {
    echo "<script>alert('".
          $pesan.
          "') ; window.location.href = '".
          $url.
          "'</script>";
  }

}


/**
 *
 */
class Backend extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->CI =& get_instance();
    // Library
    $this->CI->load->library('logincheck');
    $this->CI->load->library('cek_jabatan');
    $this->CI->load->library('waktu');
    $this->CI->load->library('badge');
    $this->CI->load->library('load_data_admin');
    // End Library
    $this->CI->logincheck->is_admin();

  }

  function alert($pesan, $url) {
    echo "<script>alert('".
          $pesan.
          "') ; window.location.href = '".
          $url.
          "'</script>";
  }

  function is_rt()
  {
    if ($this->cek_jabatan->jabatan()!='rt') {
      $this->alert('Anda bukan ketua RT', base_url('admin'));
    }
  }

  function is_rw()
  {
    if ($this->cek_jabatan->jabatan()!='rw') {
      $this->alert('Anda bukan ketua RW', base_url('admin'));
    }
  }

  function is_kelurahan()
  {
    if ($this->cek_jabatan->jabatan()!='kelurahan') {
      $this->alert('Anda bukan petugas kelurahan', base_url('admin'));
    }
  }

  function is_kecamatan()
  {
    if ($this->cek_jabatan->jabatan()!='kecamatan') {
      $this->alert('Anda bukan petugas kecamatan', base_url('admin'));
    }
  }

  function is_kabupaten()
  {
    if ($this->cek_jabatan->jabatan()!='kabupaten') {
      $this->alert('Anda bukan petugas kabupaten', base_url('admin'));
    }
  }

  function is_admin()
  {
    if ($this->cek_jabatan->jabatan()!='admin') {
      $this->alert('Anda bukan petugas admin', base_url('admin'));
    }
  }



}


?>
