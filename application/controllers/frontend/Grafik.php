<?php
/**
 *
 */
class Grafik extends Frontend
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {

    $this->load->model('Riwayat_alamat_model');
    $kecamatan = $this->Riwayat_alamat_model->get_kecamatan();
    
    $admin = $this->session->userdata('pengguna');

    $this->load->model('Riwayat_alamat_model');
    $alamat = $this->Riwayat_alamat_model->get_alamat($admin['id_pdk']);
    
    $data = [
			'tittle' => 'Grafik',
			'pengaduan_grafik' => 'ya',
			'nav' => 5,
      'kecamatan' => $kecamatan,
      'alamat' => $alamat, 
		];
    $this->layout->load_frontend('frontend/grafik/index', $data);
    // echo "<pre>".print_r($semua, 1)."</pre>";
  }

  public function lokasi($lokasi)
  {

  }
}

?>
