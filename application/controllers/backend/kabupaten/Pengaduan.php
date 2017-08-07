<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends Backend {

	public function __construct()
	{
		parent::__construct();
		$this->is_kabupaten();
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
			'tittle' => 'Daftar Pengaduan',
			'pengaduan' => $pengaduan,
			'header' => 'daftar pengaduan',
			'small' => 'Wilayah Kabupaten '.ucwords(strtolower($alamat['nama_kab'])).', Provinsi '.ucwords(strtolower($alamat['nama_prov'])),
			'crumb' => [
												['label'=>'Petugas Kabupaten','link'=>'admin/kabupaten'],
												['label'=>'Pengaduan','link'=>'admin/kabupaten/pengaduan'],
											],

		];

		$this->layout->load_backend('backend/kabupaten/pengaduan/valid/daftar', $data);
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
												['label'=>'Petugas Kabupaten','link'=>'admin/kabupaten'],
												['label'=>'Pengaduan','link'=>'admin/kabupaten/pengaduan'],
												['label'=>'Detail Pengaduan','link'=>'admin/kabupaten/pengaduan/detail/'.$id_pengaduan]


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

		$this->layout->load_backend('backend/kabupaten/pengaduan/detail', $data);
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
                    ['label'=>'Petugas kecamatan','link'=>'admin/kecamatan'],
										['label'=>'Pengaduan','link'=>'admin/kecamatan/pengaduan'],
                    ['label'=>'Disposisi','link'=>'admin/kecamatan/disposisi'],
                      ],
      'small' => 'Daftar Pengaduan Yang Telah Didisposisikan',
			'disposisi' => $pengaduan,
    ];

		$this->layout->load_backend('backend/kecamatan/pengaduan/disposisi/daftar', $data);
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
                    ['label'=>'Petugas Kabupaten','link'=>'admin/kabupaten'],
										['label'=>'Pengaduan','link'=>'admin/kabupaten/pengaduan'],
                    ['label'=>'Daftar Pengaduan','link'=>'admin/kabupaten/pengaduan/daftar'],
                      ],
      'small' => 'Daftar Pengaduan Pada Wilayah Kabupaten '.ucwords(strtolower($alamat['nama_kab'])).', Provinsi '.ucwords(strtolower($alamat['nama_prov'])),
			'pengaduan' => $pengaduan,
    ];

		$this->layout->load_backend('backend/kabupaten/pengaduan/ok/daftar', $data);
	}

	public function lengkap()
	{
		$admin = $this->session->userdata('admin');

		$this->load->model('Riwayat_alamat_model');
		$alamat = $this->Riwayat_alamat_model->get_alamat($admin['id_pdk']);

		$this->load->model('Disposisi_pengaduan_model');
		$pengaduan = $this->Disposisi_pengaduan_model->get_disposisi_ok_all($alamat['id_kab']);
		$data = [
      'sidebar' => 5,
      'header' => 'Daftar Pengaduan Lengkap',
      'crumb' =>  [
                    ['label'=>'Petugas Kabupaten','link'=>'admin/kabupaten'],
										['label'=>'Pengaduan','link'=>'admin/kabupaten/pengaduan'],
                    ['label'=>'Daftar Pengaduan Lengkap','link'=>'admin/kabupaten/pengaduan/lengkap'],
                      ],
      'small' => 'Pada Wilayah Kabupaten '.ucwords(strtolower($alamat['nama_kab'])).', Provinsi '.ucwords(strtolower($alamat['nama_prov'])),
			'pengaduan' => $pengaduan,
    ];

		$this->layout->load_backend('backend/kabupaten/pengaduan/lengkap/daftar', $data);
	}

	public function detaillengkap($id_pengaduan)
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
				'tittle' => 'Detail Pengaduan Lengkap',
				'crumb' => [
													['label'=>'Petugas Kabupaten','link'=>'admin/kabupaten'],
													['label'=>'Pengaduan','link'=>'admin/kabupaten/pengaduan'],
													['label'=>'Detail Pengaduan','link'=>'admin/kabupaten/pengaduan/detail/'.$id_pengaduan]


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

			$this->layout->load_backend('backend/kabupaten/pengaduan/lengkap/detail', $data);
	}
	
	public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "laporan_pengaduan.xls";
        $judul = "laporan_pengaduan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Pdk");
	xlsWriteLabel($tablehead, $kolomhead++, "Waktu Pengaduan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Pengaduan");
	xlsWriteLabel($tablehead, $kolomhead++, "Judul Pengaduan");
	xlsWriteLabel($tablehead, $kolomhead++, "Isi Pengaduan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kategori");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Pengaduan");
	xlsWriteLabel($tablehead, $kolomhead++, "LAT");
	xlsWriteLabel($tablehead, $kolomhead++, "LNG");
	xlsWriteLabel($tablehead, $kolomhead++, "TYPE");
    $pengaduan = $this->Disposisi_pengaduan_model->get_disposisi_ok_all_ex($alamat['id_kab']);
	foreach ($pengaduan as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_pdk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->waktu_pengaduan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_pengaduan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->judul_pengaduan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->isi_pengaduan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kategori);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_pengaduan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->LAT);
	    xlsWriteLabel($tablebody, $kolombody++, $data->LNG);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TYPE);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }


}
