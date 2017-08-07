<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Frontend {

	function __construct()
	 {
			 parent::__construct();
			 $this->load->model('Kategori_pengaduan_model');
			 $this->load->model('Laporan_pengaduan_model');
			 date_default_timezone_set("Asia/Bangkok");
	 }

	public function index()
	{
		if (isset($_POST['page'])) {
			$page =  $_POST['page'];
		}else {
			$page = 1;
		}
		$pengaduan = $this->Laporan_pengaduan_model->laporan_pengaduan_home();

		$kategori = $this->Kategori_pengaduan_model->get_all_kategori_pengaduan();

		$data = array(
			'tittle' => 'Beranda',
			'kategori' => $kategori,
			'pengaduan' => $pengaduan,
			'page' => $page,
			'nav' => 1,
		);
    $this->layout->load_frontend('frontend/home/home.php', $data);
	}


}

?>
