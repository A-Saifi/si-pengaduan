<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends Backend {

	public function __construct()
	{
		parent::__construct();
    $this->is_kabupaten();
    $this->load->model('Penduduk_model');

	}

	public function index()
	{
    	$rt = $this->session->userdata('admin');

			$this->load->model('Riwayat_alamat_model');
			$alamat = $this->Riwayat_alamat_model->get_alamat($rt['id_pdk']);

			$penduduk = $this->Penduduk_model->get_all_penduduk_jabatan('kabupaten', $alamat['id_kab']);


      $data = [
				'sidebar' => 2,
        'tittle' => 'Daftar Penduduk',
        'daftar_penduduk' => $penduduk,
				'header' => 'daftar penduduk',
				'small' => 'Wilayah Kabupaten '.ucwords(strtolower($alamat['nama_kab']).', Provinsi '),
				'crumb' => [
													['label'=>'Petugas Kabupaten','link'=>'admin/kabupaten'],
													['label'=>'Daftar Penduduk','link'=>'admin/kabupaten/penduduk'],
												],
				'script' => [
													['nama' => 'datatables', ],
									],

			];

  		$this->layout->load_backend('backend/kabupaten/penduduk/daftar', $data);

	}

}
