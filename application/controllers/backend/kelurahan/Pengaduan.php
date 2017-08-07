<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends Backend {

	public function __construct()
	{
		parent::__construct();
		$this->is_kelurahan();
		$this->load->model('Laporan_pengaduan_model');
		date_default_timezone_set("Asia/Bangkok");
	}

	public function index()
	{
		$kelurahan = $this->session->userdata('admin');

		$this->load->model('Riwayat_alamat_model');
		$alamat = $this->Riwayat_alamat_model->get_alamat($kelurahan['id_pdk']);

		$this->load->model('Disposisi_pengaduan_model');
		$pengaduan = $this->Disposisi_pengaduan_model->get_disposisi_valid($kelurahan['id_rj']);

		$data = [
			'sidebar' => 4,
			'tittle' => 'Pengaduan Masuk',
			'pengaduan' => $pengaduan,
			'header' => 'Pengaduan Masuk',
			'small' => 'Wilayah Kelurahan '.ucwords(strtolower($alamat['nama_kel'])).', '.ucwords(strtolower($alamat['nama_kec'])),
			'crumb' => [
												['label'=>'Petugas Kelurahan','link'=>'admin/kelurahan'],
												['label'=>'Pengaduan','link'=>'admin/kelurahan/pengaduan'],
											],

		];

		$this->layout->load_backend('backend/kelurahan/pengaduan/valid/daftar', $data);
	}

	public function valid()
	{
		$rt = $this->session->userdata('admin');

		$this->load->model('Riwayat_alamat_model');
		$alamat = $this->Riwayat_alamat_model->get_alamat($rt['id_pdk']);

		$this->load->model('Disposisi_pengaduan_model');
		$pengaduan = $this->Disposisi_pengaduan_model->get_disposisi_valid($rt['id_rj']);

		$data = [
			'sidebar' => 4,
			'tittle' => 'Daftar Pengaduan',
			'pengaduan' => $pengaduan,
			'header' => 'daftar pengaduan',
			'small' => 'Wilayah RT-'.$alamat['nama_rt'].' / RW-'.ucwords(strtolower($alamat['nama_rw'])).', '.ucwords(strtolower($alamat['nama_kel'])).', '.ucwords(strtolower($alamat['nama_kec'])),
			'crumb' => [
												['label'=>'Ketua RT','link'=>'admin/rt'],
												['label'=>'Pengaduan','link'=>'admin/rt/pengaduan'],
												['label'=>'Valid','link'=>'admin/rt/pengaduan/valid'],
											],

		];

		$this->layout->load_backend('backend/rt/pengaduan/valid/daftar', $data);
	}

	public function spam()
	{
		$rt = $this->session->userdata('admin');

		$this->load->model('Riwayat_alamat_model');
		$alamat = $this->Riwayat_alamat_model->get_alamat($rt['id_pdk']);

		$this->load->model('Disposisi_pengaduan_model');
		$pengaduan = $this->Disposisi_pengaduan_model->get_disposisi_spam($rt['id_rj']);

		$data = [
			'sidebar' => 6,
			'tittle' => 'Daftar Spam',
			'pengaduan' => $pengaduan,
			'header' => 'daftar spam',
			'small' => 'Wilayah RT-'.$alamat['nama_rt'].' / RW-'.ucwords(strtolower($alamat['nama_rw'])).', '.ucwords(strtolower($alamat['nama_kel'])).', '.ucwords(strtolower($alamat['nama_kec'])),
			'crumb' => [
												['label'=>'Ketua RT','link'=>'admin/rt'],
												['label'=>'Pengaduan','link'=>'admin/rt/pengaduan'],
												['label'=>'Spam','link'=>'admin/rt/pengaduan/spam'],
											],
		];

		$this->layout->load_backend('backend/rt/pengaduan/spam/daftar', $data);
	}

	public function detail($id_pengaduan)
	{
		$pengaduan = $this->Laporan_pengaduan_model->detail($id_pengaduan);

		$this->load->model('Gambar_pengaduan_model');
		$gambar = $this->Gambar_pengaduan_model->get_gambar($pengaduan['id_pengaduan']);

		$this->load->model('Komentar_pengaduan_model');
		$komentar = $this->Komentar_pengaduan_model->getKomentar($pengaduan['id_pengaduan']);
		$jumlah = $this->Komentar_pengaduan_model->getTotalKomentar($pengaduan['id_pengaduan']);

		$this->load->model('Riwayat_alamat_model');
		$alamat = $this->Riwayat_alamat_model->get_alamat($pengaduan['id_pdk']);

		$data = [
			'sidebar' => 3,
			'tittle' => 'Detail Pengaduan',
			'crumb' => [
												['label'=>'Petugas Kelurahan','link'=>'admin/kelurahan'],
												['label'=>'Pengaduan','link'=>'admin/kelurahan/pengaduan'],
												['label'=>'Detail Pengaduan','link'=>'admin/kelurahan/pengaduan/detail/'.$id_pengaduan]


									],
			'header' => 'detail pengaduan',
			'small' => ucwords(strtolower($pengaduan['nama_kategori'])),
			'pengaduan' => $pengaduan,
			'alamat' => $alamat,
			'gambar' => $gambar,
			'komentar' => $komentar,
			'jumlah' => $jumlah['total'],
			'fungsi' => 'http://viralpatel.net/blogs/demo/jquery/jquery.shorten.1.0.js',
		];

		$this->layout->load_backend('backend/kelurahan/pengaduan/detail', $data);
	}

	public function disposisi()
	{
		$kelurahan = $this->session->userdata('admin');

		$this->load->model('Disposisi_pengaduan_model');
		$pengaduan = $this->Disposisi_pengaduan_model->get_disposisi_disposisi($kelurahan['id_rj']);
		$data = [
      'sidebar' => 5,
      'header' => 'Disposisi',
      'crumb' =>  [
                    ['label'=>'Petugas Kelurahan','link'=>'admin/kelurahan'],
										['label'=>'Pengaduan','link'=>'admin/kelurahan/pengaduan'],
                    ['label'=>'Disposisi','link'=>'admin/kelurahan/disposisi'],
                      ],
      'small' => 'Daftar Pengaduan Yang Telah Didisposisikan',
			'disposisi' => $pengaduan,
    ];

		$this->layout->load_backend('backend/kelurahan/pengaduan/disposisi/daftar', $data);
	}

	public function daftar()
	{
		$admin = $this->session->userdata('admin');

		$this->load->model('Riwayat_alamat_model');
		$alamat = $this->Riwayat_alamat_model->get_alamat($admin['id_pdk']);

		$this->load->model('Disposisi_pengaduan_model');
		$pengaduan = $this->Disposisi_pengaduan_model->get_disposisi_ok($admin['id_rj']);
		$data = [
      'sidebar' => 6,
      'header' => 'Daftar Pengaduan',
      'crumb' =>  [
                    ['label'=>'Petugas Kelurahan','link'=>'admin/kelurahan'],
										['label'=>'Pengaduan','link'=>'admin/kelurahan/pengaduan'],
                    ['label'=>'Daftar Pengaduan','link'=>'admin/kelurahan/pengaduan/daftar'],
                      ],
      'small' => 'Daftar Pengaduan Pada Wilayah Kelurahan '.ucwords(strtolower($alamat['nama_kel'])).', '.ucwords(strtolower($alamat['nama_kec'])),
			'pengaduan' => $pengaduan,
    ];

		$this->layout->load_backend('backend/kelurahan/pengaduan/ok/daftar', $data);
	}

	public function hello()
	{

	}


}
