<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Cek_admin extends Backend
{

  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    //echo "<pre>".print_r($this->session->userdata('admin'), 1)."</pre>";

    $admin = $this->session->userdata('admin');

    switch ($this->cek_jabatan->jabatan()) {
      case 'rt':
        redirect(base_url('admin/rt'));
        break;

      case 'rw':
        redirect(base_url('admin/rw'));
        break;

      case 'kelurahan':
        redirect(base_url('admin/kelurahan'));
        break;

      case 'kecamatan':
        redirect(base_url('admin/kecamatan'));
        break;

      case 'kabupaten':
        redirect(base_url('admin/kabupaten'));
        break;

        case 'admin':
          redirect(base_url('admin/admin'));
        break;

      default:
        redirect(base_url());
        break;
    }
  }

}

?>
