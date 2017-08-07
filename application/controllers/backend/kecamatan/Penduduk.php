<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends Backend {

	public function __construct()
	{
		parent::__construct();
    $this->is_kecamatan();
    $this->load->model('Penduduk_model');

	}

	public function index()
	{
    	$rt = $this->session->userdata('admin');

			$this->load->model('Riwayat_alamat_model');
			$alamat = $this->Riwayat_alamat_model->get_alamat($rt['id_pdk']);

			$penduduk = $this->Penduduk_model->get_all_penduduk_jabatan('kecamatan', $alamat['id_kec']);


      $data = [
				'sidebar' => 2,
        'tittle' => 'Daftar Penduduk',
        'daftar_penduduk' => $penduduk,
				'header' => 'daftar penduduk',
				'small' => 'Wilayah Kecamatan '.ucwords(strtolower($alamat['nama_kec'])).', Kabupaten '.ucwords(strtolower($alamat['nama_kab'])),
				'crumb' => [
													['label'=>'Petugas Kecamatan','link'=>'admin/kecamatan'],
													['label'=>'Daftar Penduduk','link'=>'admin/kecamatan/penduduk'],
												],
				'script' => [
													['nama' => 'datatables', ],
									],

			];

  		$this->layout->load_backend('backend/kecamatan/penduduk/daftar', $data);

	}

}
