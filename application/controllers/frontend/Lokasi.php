<?php
/**
 *
 */
class Lokasi extends Frontend
{

  function __construct()
  {
    parent::__construct();
  }

  public function pengaduan()
  {

    $this->load->model('Kategori_pengaduan_model');
		$kategori = $this->Kategori_pengaduan_model->get_all_kategori_pengaduan();

    $this->load->model('Riwayat_alamat_model');
    $kelurahan = $this->Riwayat_alamat_model->get_kelurahan();

    $this->load->model('Laporan_pengaduan_model');
    if ($this->input->get('tampil')!=null) {
      $pengaduan = $this->Laporan_pengaduan_model->laporan_pengaduan_berdasarkan($this->input->get('kelurahan'), $this->input->get('kategori'), $this->input->get('bulan'), $this->input->get('tahun'));
    }else {
      $pengaduan = $this->Laporan_pengaduan_model->laporan_pengaduan_berdasarkan('all', 'all', 'all', 2017);
    }

		$data = array(
			'tittle' => 'Peta Pengaduan',
			'kategori' => $kategori,
			'pengaduanku' => $pengaduan,
      'kelurahan' => $kelurahan,
			'nav' => 3,
		);


    $this->layout->load_frontend('frontend/lokasi/pengaduan.php', $data);
  }
}

 ?>
