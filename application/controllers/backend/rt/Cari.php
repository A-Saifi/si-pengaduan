<?php
/**
 *
 */
class Cari extends Backend
{

  function __construct()
  {
    parent::__construct();
    $this->is_rt();
  }

  public function penduduk()
  {
    $this->load->model('Penduduk_model');

    $admin = $this->session->userdata('admin');

    $this->load->model('Riwayat_alamat_model');
    $alamat = $this->Riwayat_alamat_model->get_alamat($admin['id_pdk']);

    if ($this->input->post('keyword')!=null) {


      if ($this->input->post('kategori')=='nama') {
        $penduduk = $this->Penduduk_model->cari_nama($this->input->post('keyword'), 'rt', $alamat['id_rt']);
      }

      if ($this->input->post('kategori')=='nik') {
        $penduduk = $this->Penduduk_model->cari_nik($this->input->post('keyword'), 'rt', $alamat['id_rt']);
      }

      if ($penduduk!=null) {
        echo "<pre>".print_r($penduduk, 1)."</pre>";
      }else {
        $this->alert('Tidak ditemukan penduduk dengan keyword: '.$this->input->post('keyword'), base_url('admin/rt/penduduk'));
      }

    }else {
      echo "null";
    }
  }
}

?>
