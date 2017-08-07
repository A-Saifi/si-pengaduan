<?php /**
 *
 */
class Sekitar extends Frontend
{

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Bangkok");
  }

  public function index()
  {
    if (isset($_POST['page'])) {
			$page =  $_POST['page'];
		}else {
			$page = 1;
		}

    $this->load->model('Laporan_pengaduan_model');
		$pengaduan = $this->Laporan_pengaduan_model->laporan_pengaduan_sekitar($this->session->userdata('pengguna'));

    $this->load->model('Kategori_pengaduan_model');
		$kategori = $this->Kategori_pengaduan_model->get_all_kategori_pengaduan();

    $alamat = $this->session->userdata('pengguna');

		$data = array(
			'tittle' => 'Seitar Saya',
			'kategori' => $kategori,
			'pengaduan' => $pengaduan,
			'page' => $page,
			'nav' => 4,
      'alamat' => $alamat,
      'status' => false,
		);
    $this->layout->load_frontend('frontend/sekitar/index', $data);
  }

  public function kategori($id_kategori)
  {
    if (isset($_GET['page'])) {
			$page =  $_GET['page'];
		}else {
			$page = 1;
		}
    $this->load->model('Laporan_pengaduan_model');

		$pengaduan = $this->Laporan_pengaduan_model->laporan_pengaduan_sekitar_kategori($this->session->userdata('pengguna'), $id_kategori);

    $this->load->model('Kategori_pengaduan_model');
		$kategori = $this->Kategori_pengaduan_model->get_all_kategori_pengaduan();

    $judul = $this->Kategori_pengaduan_model->get_kategori_pengaduan($id_kategori);

    $alamat = $this->session->userdata('pengguna');
		$data = array(
			'tittle' => 'Sekitar Saya : '.$judul['nama_kategori'],
			'kategori' => $kategori,
			'pengaduan' => $pengaduan,
			'page' => $page,
			'nav' => 4,
      'alamat' => $alamat,
      'status' => true,
      'judul' => $judul['nama_kategori']
		);
    $this->layout->load_frontend('frontend/sekitar/index.php', $data);
  }


}
  ?>
