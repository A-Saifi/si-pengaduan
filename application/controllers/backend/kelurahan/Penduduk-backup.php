<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends Backend {

	public function __construct()
	{
		parent::__construct();
    $this->is_rw();
    $this->load->model('Penduduk_model');

	}

	public function index()
	{
    	$rt = $this->session->userdata('admin');

			$this->load->model('Riwayat_alamat_model');
			$alamat = $this->Riwayat_alamat_model->get_alamat($rt['id_pdk']);

			$erte = $this->Riwayat_alamat_model->get_rt_di_rw($alamat['id_rw']);

			foreach ($erte as $i) {
				$penduduk[$i['id_rt']] = $this->Penduduk_model->get_all_penduduk_rt($i['id_rt']);
			}

      $data = [
				'sidebar' => 2,
        'tittle' => 'Daftar Penduduk',
        'daftar_penduduk' => $penduduk,
				'rt' => $erte,
				'header' => 'daftar penduduk',
				'small' => 'Wilayah RW-'.ucwords(strtolower($alamat['nama_rw'])).', '.ucwords(strtolower($alamat['nama_dusun'])).', '.ucwords(strtolower($alamat['nama_kel'])).', Kecamatan '.ucwords(strtolower($alamat['nama_kec'])),
				'crumb' => [
													['label'=>'Ketua RW','link'=>'admin/rw'],
													['label'=>'Daftar Penduduk','link'=>'admin/rw/penduduk'],
												],
				'script' => [
													['nama' => 'datatables', ],
									],

			];

  		$this->layout->load_backend('backend/rw/penduduk/daftar', $data);

	}

}
