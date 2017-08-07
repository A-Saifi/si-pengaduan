<?php
/**
 * tidak dipakai terlalu berat
 */
class Load_data
{

  function __construct()
  {
    $this->CI =& get_instance();
    $this->CI->load->model('Penduduk_model');
    $this->CI->load->model('Gambar_pengaduan_model');
    $this->CI->load->model('Komentar_pengaduan_model');
    $this->CI->load->model('Kategori_pengaduan_model');
    $this->CI->load->model('Avatar_penduduk_model');

  }

  public function user()
  {
    return $this->CI->Penduduk_model->get_penduduk($this->CI->session->userdata('pengguna'));
  }

  public function gambar($id_pengaduan)
  {
    return $this->CI->Gambar_pengaduan_model->get_gambar($id_pengaduan);
  }

  public function komentar($id_pengaduan)
  {
    return $this->CI->Komentar_pengaduan_model->getKomentarLimit($id_pengaduan);
  }

  public function total_komentar($id_pengaduan)
  {
    return $this->CI->Komentar_pengaduan_model->getTotalKomentar($id_pengaduan);
  }

  public function gambar_limit($id_pengaduan, $limit)
  {
    return $this->CI->Gambar_pengaduan_model->get_gambar_limit($id_pengaduan, $limit);
  }

  public function kategori($id_kategori)
  {
    return $this->CI->Kategori_pengaduan_model->get_kategori_pengaduan($id_kategori);
  }

  public function avatar($id_pdk)
  {
    if ($this->CI->Avatar_penduduk_model->getAvatar($id_pdk)==null) {
      $avatar = array(
        'gambar_avatar' => 'user-11.png',
      );
    }else {
      $avatar = $this->CI->Avatar_penduduk_model->getAvatar($id_pdk);
    }

    return $avatar['gambar_avatar'];
  }

  public function jumlah_post_kategori($id_kategori)
  {
    $jumlah = $this->CI->Kategori_pengaduan_model->getJumlah($id_kategori);
    return $jumlah['jumlah'];
  }

  public function jumlah_post_kategori_sekitar($id_kategori)
  {
    $jumlah = $this->CI->Kategori_pengaduan_model->getJumlah_sekitar($id_kategori, $this->CI->session->userdata('pengguna'));
    return $jumlah['jumlah'];
  }

  public function hitung_pengaduan_kecamatan($lokasi)
  {
    $this->CI->load->model('Laporan_pengaduan_model');
    $jumlah = count($this->CI->Laporan_pengaduan_model->laporan_pengaduan_kecamatan($lokasi));
    return $jumlah;
  }

}

?>
