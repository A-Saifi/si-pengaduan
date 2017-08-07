<?php
/**
 *
 */
class Load_data_admin
{

  function __construct()
  {
    $this->CI =& get_instance();
  }

  // RT Start
  public function status_spam($id_pengaduan, $field)
  {
    $this->CI->load->model('Status_pengaduan_model');
    $status = $this->CI->Status_pengaduan_model->status_spam($id_pengaduan);

    if ($status!=null) {
      return $status[$field];
    }else {
      return 'kosong';
    }

  }

  public function cek_tanggapan_rt($id_pengaduan, $id_rj)
  {
    $this->CI->load->model('Tanggapan_pengaduan_model');
    $tanggapan = $this->CI->Tanggapan_pengaduan_model->search_by_id($id_pengaduan, 'id_rj', $id_rj);
    if ($tanggapan!=null) {
      return false;
    }else {
      return true;
    }
  }

  //RT End

  public function load_tanggapan($id_pengaduan)
  {
    $this->CI->load->model('Tanggapan_pengaduan_model');

    return $this->CI->Tanggapan_pengaduan_model->show($id_pengaduan);
  }

  public function show_jabatan($field, $id_disposisi)
  {
    $this->CI->load->model('Disposisi_pengaduan_model');

    $jabatan = $this->CI->Disposisi_pengaduan_model->get_info($field ,$id_disposisi);

    return $jabatan;
  }

  public function cek_disposisi($id_pengaduan)
  {
    $admin = $this->CI->session->userdata('admin');

    $this->CI->load->model('Disposisi_pengaduan_model');

    $jabatan = $this->CI->Disposisi_pengaduan_model->get_info_id_pengaduan($id_pengaduan);

    if ($jabatan['id_rj']==$admin['id_rj']) {
      return true;
    }else {
      return false;
    }
  }

  public function cek_status_disposisi($id_pengaduan)
  {
    $this->CI->load->model('Disposisi_pengaduan_model');

    $status = $this->CI->Disposisi_pengaduan_model->get_info_id_pengaduan($id_pengaduan);

    if ($status['status']=='belum') {
      return true;
    }else {
      return false;
    }
  }

  public function load_asal_pengaduan($id_pengaduan)
  {
    $this->CI->load->model('Disposisi_pengaduan_model');

    $asal = $this->CI->Disposisi_pengaduan_model->get_last_disposisi($id_pengaduan);

    return $asal;
  }


  public function pengaduan_perbulan($alamat, $bulan)
  {
    $this->CI->load->model('Disposisi_pengaduan_model');

    $pengaduan = $this->CI->Disposisi_pengaduan_model->get_by_bulan($alamat, $bulan);

    return $pengaduan;

  }

  public function pengaduan_kategori($alamat, $id_kategori)
  {
    $this->CI->load->model('Disposisi_pengaduan_model');

    $pengaduan = $this->CI->Disposisi_pengaduan_model->get_by_kategori($alamat, $id_kategori);

    return $pengaduan;

  }

  public function list_kecamatan()
  {
    $this->CI->load->model('Riwayat_alamat_model');
    $kecamatan = $this->CI->Riwayat_alamat_model->get_kecamatan();
    return $kecamatan;
  }

  public function get_jabatan($id_pdk)
  {
    $this->CI->load->model('Riwayat_jabatan_model');
    $jabatan = $this->CI->Riwayat_jabatan_model->get_jabatan_penduduk($id_pdk);
    return $jabatan['nama_j'];
  }


}

 ?>
