<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends Backend {

	public function __construct()
	{
		parent::__construct();
    $this->is_kelurahan();
    $this->load->model('Penduduk_model');

	}

	public function index()
	{
    	$rt = $this->session->userdata('admin');

			$this->load->model('Riwayat_alamat_model');
			$alamat = $this->Riwayat_alamat_model->get_alamat($rt['id_pdk']);

			$penduduk = $this->Penduduk_model->get_all_penduduk_jabatan('kelurahan', $alamat['id_kel']);


      $data = [
				'sidebar' => 2,
        'tittle' => 'Daftar Penduduk',
        'daftar_penduduk' => $penduduk,
				'header' => 'daftar penduduk',
				'small' => 'Wilayah '.ucwords(strtolower($alamat['nama_kel'])).', Kecamatan '.ucwords(strtolower($alamat['nama_kec'])),
				'crumb' => [
													['label'=>'Petugas Kelurahan','link'=>'admin/kelurahan'],
													['label'=>'Daftar Penduduk','link'=>'admin/kelurahan/penduduk'],
												],
				'script' => [
													['nama' => 'datatables', ],
									],

			];

  		$this->layout->load_backend('backend/kelurahan/penduduk/daftar', $data);

	}

}
