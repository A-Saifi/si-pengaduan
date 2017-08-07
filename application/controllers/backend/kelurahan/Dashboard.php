<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Dashboard extends Backend
{

  function __construct()
  {
    parent::__construct();
    $this->is_kelurahan();
  }

  public function index()
  {

        $this->load->model('Penduduk_model');

        $admin = $this->session->userdata('admin');

        $this->load->model('Riwayat_alamat_model');
        $alamat = $this->Riwayat_alamat_model->get_alamat($admin['id_pdk']);

        $penduduk = $this->Penduduk_model->count_all_penduduk_jabatan('kelurahan', $alamat['id_kel']);

        $this->load->model('Disposisi_pengaduan_model');
    		$pengaduan = $this->Disposisi_pengaduan_model->get_disposisi_ok($admin['id_rj']);


        $this->load->model('Kategori_pengaduan_model');
        $kategori = $this->Kategori_pengaduan_model->get_all_kategori_pengaduan();

        $disposisi = $this->Disposisi_pengaduan_model->get_disposisi_disposisi($admin['id_rj']);

        $daftar_pengaduan = $this->Disposisi_pengaduan_model->get_disposisi_valid($admin['id_rj']);

        $data = [
          'kategori' => $kategori,
          'data' => $this->session->userdata('admin'),
          'sidebar' => 1,
          'jumlah_penduduk' => $penduduk['jumlah'],
          'jumlah_pengaduan' => $pengaduan,
          'jumlah_disposisi' => $disposisi,
          'daftar_pengaduan' => $daftar_pengaduan,
          'alamat' => $alamat,
          'header' => 'Dashboard',
          'crumb' =>  [
                        ['label'=>'Petugas Kabupaten','link'=>'admin/kabupaten'],
                        ['label'=>'Dashboard','link'=>'admin/kabupaten/dashboard'],
                          ],
          'pengaduan_chart' => 'hahah',
        ];
        $this->layout->load_backend('backend/dashboard/index', $data);
  }
}

?>
