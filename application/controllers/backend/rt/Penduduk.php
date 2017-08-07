<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends Backend {

	public function __construct()
	{
		parent::__construct();
    $this->is_rt();
    $this->load->model('Penduduk_model');

	}

	public function index()
	{
    	$rt = $this->session->userdata('admin');

			$this->load->model('Riwayat_alamat_model');
			$alamat = $this->Riwayat_alamat_model->get_alamat($rt['id_pdk']);

			$penduduk = $this->Penduduk_model->get_all_penduduk_rt($alamat['id_rt']);

      $data = [
				'sidebar' => 2,
        'tittle' => 'Daftar Penduduk',
        'daftar_penduduk' => $penduduk,
				'header' => 'daftar penduduk',
				'small' => 'Wilayah RT-'.$alamat['nama_rt'].' / RW-'.ucwords(strtolower($alamat['nama_rw'])).', '.ucwords(strtolower($alamat['nama_dusun'])).', '.ucwords(strtolower($alamat['nama_kel'])).', Kecamatan '.ucwords(strtolower($alamat['nama_kec'])),
				'crumb' => [
													['label'=>'Ketua RT','link'=>'admin/rt'],
													['label'=>'Daftar Penduduk','link'=>'admin/rt/penduduk'],
												],
				'script' => [
													['nama' => 'datatables', ],
									],

			];

  		$this->layout->load_backend('backend/rt/penduduk/daftar', $data);

	}

}
