<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Komentar extends Frontend
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Komentar_pengaduan_model');
  }

  public function index()
  {
    redirect(base_url());
  }

  public function tambah($id)
  {
    date_default_timezone_set("Asia/Bangkok");
    $penduduk =  $this->session->userdata('pengguna');

          $params = array(
        'id_komentar' => "",
        'id_pengaduan' => $id,
        'id_pdk' => $penduduk['id_pdk'],
        'waktu_komentar' => date('G:i:s'),
        'tanggal_komentar' => date('Y-m-d'),
        'isi_komentar' => $this->input->post('isi_komentar'),
            );

    $this->Komentar_pengaduan_model->simpan($params);

    redirect(base_url('pengaduan/detail/'.$id));

  }

  public function edit($id_komentar)
  {
    if ($this->input->get('pengaduan')!=null && $this->input->post('komentar')!=null) {
      $data = [
        'isi_komentar' => $this->input->post('komentar'),
      ];
      $this->alert($this->Komentar_pengaduan_model->update_komentar($id_komentar, $data),base_url('pengaduan/detail/'.$this->input->get('pengaduan')));
    }else {
      $this->alert('Tidak ada yang dapat diedit', base_url());
    }
  }

  public function hapus($id_komentar)
  {
    if ($this->input->get('pengaduan')!=null) {
      $penduduk =  $this->session->userdata('pengguna');
      $komentar = $this->Komentar_pengaduan_model->search($id_komentar);

      if ($penduduk['id_pdk']==$komentar['id_pdk']) {
        $this->alert($this->Komentar_pengaduan_model->delete_komentar($id_komentar),  base_url('pengaduan/detail/'.$this->input->get('pengaduan')));
      }else {
        $this->alert('Gagal menghapus komentar', base_url('pengaduan/detail/'.$this->input->get('pengaduan')));
      }
    }else {
       $this->alert('Gagal menghapus komentar', base_url());
    }
  }


}
 ?>
