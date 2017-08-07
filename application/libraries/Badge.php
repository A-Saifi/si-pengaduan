<?php
/**
 *
 */
class Badge
{

  function __construct()
  {
    $this->CI =& get_instance();
  }

  function pengaduan_baru($id_rj)
  {
    $this->CI->load->model('Disposisi_pengaduan_model');
    return $this->CI->Disposisi_pengaduan_model->jumlah_baru($id_rj);
  }

  function pengaduan($id_rj)
  {
    $this->CI->load->model('Disposisi_pengaduan_model');
    return $this->CI->Disposisi_pengaduan_model->jumlah($id_rj);
  }

  function avatar($id_pdk)
  {
    $this->CI->load->model('Avatar_penduduk_model');
    if ($this->CI->Avatar_penduduk_model->getAvatar($id_pdk)==null) {
      $avatar = array(
        'gambar_avatar' => 'user-11.png',
      );
    }else {
      $avatar = $this->CI->Avatar_penduduk_model->getAvatar($id_pdk);
    }

    return $avatar['gambar_avatar'];
  }
}

 ?>
