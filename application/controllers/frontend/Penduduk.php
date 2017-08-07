<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Penduduk extends Frontend
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Penduduk_model');
  }

  public function profile($nik_pdk)
  {
    $penduduk = $this->Penduduk_model->get_penduduk_nik($nik_pdk);

    $this->load->model('Laporan_pengaduan_model');

    $pengaduan = $this->Laporan_pengaduan_model->laporan_pengaduan_penduduk($penduduk['id_pdk']);

    $data = array(
      'tittle' => $penduduk['nama_pdk'],
      'profile' => $penduduk,
      'pengaduan' => $pengaduan,
      'nav' => 2,
    );

    $this->layout->load_frontend('frontend/penduduk/profile.php', $data);
  }

  public function gal()
	{
		$this->load->view('gal');
	}

}

?>
