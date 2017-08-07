<?php
/**
 *
 */
class Validasi extends Backend
{

  function __construct()
  {
    parent::__construct();
    $this->is_rt();
    date_default_timezone_set("Asia/Bangkok");
  }

  public function pengaduan($id_pengaduan)
  {
    $this->load->model('Laporan_pengaduan_model');

    if ($this->Laporan_pengaduan_model->detail($id_pengaduan)==null) {

      $this->alert('Tidak ada yang dapat di validasi', base_url('admin/rt/pengaduan/'));

    }else {

      $this->load->model('Status_pengaduan_model');
      if ($this->Status_pengaduan_model->cari_kategori($id_pengaduan, 'validasi')==null) {

        $params = [
          'status_pengaduan' => 'valid',
        ];

        $this->Laporan_pengaduan_model->update_laporan_pengaduan($id_pengaduan, $params);

        $status = [
          'id_status' => "",
          'id_pengaduan' => $id_pengaduan,
          'kategori' => 'validasi',
          'waktu_status' => date('G:i:s'),
          'tanggal_status' => date('Y-m-d'),
          'nama_status' => 'Validasi oleh Ketua RT',
          'dibaca' => 'belum',
        ];

        $this->Status_pengaduan_model->add_riwayat($status);

        $this->alert('Pengaduan berhasil di validasi', base_url('admin/rt/pengaduan/valid/'));

      }else {

        $this->alert('Pengaduan ini telah di validasi', base_url('admin/rt/pengaduan/detail/'.$id_pengaduan));

      }

    }

  }

  public function urungkan($id_pengaduan)
  {
    $this->load->model('Laporan_pengaduan_model');

    if ($this->Laporan_pengaduan_model->detail($id_pengaduan)==null) {
      $this->alert('Tidak ada yang dapat di urungkan', base_url('admin/rt/pengaduan/valid'));
    }else {
      $this->load->model('Status_pengaduan_model');
      if ($this->Status_pengaduan_model->cari_kategori($id_pengaduan, 'validasi')==null) {
        $this->alert('Tidak ada yang dapat di urungkan', base_url('admin/rt/pengaduan/valid'));
      }else {
        $params = [
          'status_pengaduan' => 'belum valid',
        ];
        $this->Laporan_pengaduan_model->update_laporan_pengaduan($id_pengaduan, $params);

        $this->alert($this->Status_pengaduan_model->hapus($id_pengaduan, 'validasi'), base_url('admin/rt/pengaduan/'));
      }
    }

  }

}

?>
