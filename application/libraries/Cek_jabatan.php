<?php
/**
 *
 */
class Cek_jabatan
{

  function __construct()
  {
    $this->CI =& get_instance();
    $this->CI->load->model('Jabatan_model');
  }

  public function jabatan()
  {
      $admin = $this->CI->session->userdata('admin');
      $jabatan = $this->CI->Jabatan_model->get_jabatan($admin['id_j']);
      switch (strtolower($jabatan['nama_j'])) {
        case 'rt':
          return "rt";
          break;

        case 'rw':
          return "rw";
          break;

        case 'kelurahan':
          return "kelurahan";
          break;

        case 'kecamatan':
          return "kecamatan";
          break;

        case 'kabupaten':
          return "kabupaten";
          break;

          case 'admin':
          return "admin";
          break;

        default:
          redirect(base_url());
          break;
      }

  }

}

?>
