<?php
/**
 *
 */
class Cari extends Frontend
{

  function __construct()
  {
    parent::__construct();
  }

  function pengaduan()
  {
    $this->load->model('Kategori_pengaduan_model');
    $this->load->model('Laporan_pengaduan_model');

    if ($this->input->get('keyword')!=null) {
      $pengaduan = $this->Laporan_pengaduan_model->search($this->input->get('keyword'));

  		$kategori = $this->Kategori_pengaduan_model->get_all_kategori_pengaduan();

  		$data = array(
  			'tittle' => 'Beranda',
  			'kategori' => $kategori,
  			'pengaduan' => $pengaduan,
  			'nav' => 1,
  		);
      $this->layout->load_frontend('frontend/cari/hasil.php', $data);
    }
  }

}

 ?>
