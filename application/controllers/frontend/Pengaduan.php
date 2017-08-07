<?php
/**
 *
 */
class Pengaduan extends Frontend
{

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Bangkok");
    $this->load->model('Laporan_pengaduan_model');

  }

  public function hapus($id_pengaduan)
  {
    $pengguna = $this->session->userdata('pengguna');

    $pengaduan = $this->Laporan_pengaduan_model->detail($id_pengaduan);

    if ($pengaduan['id_pdk']==$pengguna['id_pdk']) {
      $this->alert($this->Laporan_pengaduan_model->delete_laporan_pengaduan($id_pengaduan), base_url('penduduk/profile/'.$pengguna['nik_pdk']));
    }else {
      redirect(base_url());
    }
  }

  public function tambah($kategori)
  {
    $lokasi = $this->session->userdata('pengguna');
    if(isset($_POST) && count($_POST) > 0)
       {

         $this->load->model('Riwayat_jabatan_model');

         $ketuaRT = $this->Riwayat_jabatan_model->get_ketua_rt($lokasi['id_rt']);

         if ($ketuaRT['id_rj']==null) {
          $this->alert('Anda tidak memiliki Ketua RT', base_url());
        }else {

                   $params = array(
                 'id_pengaduan' => "",
                 'id_pdk' => $lokasi['id_pdk'],
                 'waktu_pengaduan' => date('G:i:s'),
                 'tanggal_pengaduan' => date('Y-m-d'),
                 'judul_pengaduan' => $this->input->post('judul_pengaduan'),
                 'isi_pengaduan' => $this->input->post('isi_pengaduan'),
                 'id_kategori' => $this->input->post('id_kategori'),
                 'status_pengaduan' => 'belum valid',
                 'LAT' => $this->input->post('LAT'),
                 'LNG' => $this->input->post('LNG'),
                 'TYPE' => $this->input->post('TYPE'),
                     );



                      $laporan_pengaduan_id = $this->Laporan_pengaduan_model->add_laporan_pengaduan($params);

                      $pengaduan = $this->Laporan_pengaduan_model->get_pengaduan($params['waktu_pengaduan'], $params['tanggal_pengaduan']);

                      $this->simpanGambar($pengaduan['id_pengaduan']);

                      //$this->simpanGambar_CI($pengaduan['id_pengaduan']);

                      $disposisi = array(
                					'id_pengaduan' => $pengaduan['id_pengaduan'],
                          'tujuan' => $ketuaRT['id_rj'],
                					'waktu_disposisi' => $pengaduan['waktu_pengaduan'],
                					'tanggal_disposisi' => $pengaduan['tanggal_pengaduan'],
                					'catatan_disposisi' => 'Pengaduan Baru',
                          'status' => 'belum',
                        );

                      $this->load->model('Disposisi_pengaduan_model');

                      $this->Disposisi_pengaduan_model->simpan($disposisi);

                      $this->alert('Pengaduan telah disimpan', base_url());
        }

       }
       else
       {
         $this->load->model('Kategori_pengaduan_model');
         $kategorinya = $this->Kategori_pengaduan_model->get_kategori_pengaduan($kategori);
         $data = array(
           'tittle' => 'Buat Pengaduan',
           'kategori' => $kategorinya,
           'lokasi' => $lokasi,
           'fungsi' => base_url('assets/js/pengaduanValidation.js'),
           'fileinput' => true,
         );

         $this->layout->load_frontend('frontend/pengaduan/form.php', $data);

       }
  }

  function simpanGambar($id_pengaduan)
  {
    $this->load->model('Gambar_pengaduan_model');

    if(count($_FILES['gambar']['name']) > 0)
    {
        for($i=0; $i<count($_FILES['gambar']['name']); $i++)
        {

            $tmpFilePath = $_FILES['gambar']['tmp_name'][$i];

            if($tmpFilePath != "")
            {

                $shortname = strtotime(date('G:i:s')).'-'.$id_pengaduan.'-'.$_FILES['gambar']['name'][$i];

                // $filePath =
                // FCPATH."assets\image\pengaduan\\".strtotime(date('G:i:s')).'-'.$id_pengaduan.'-'.$_FILES['gambar']['name'][$i];
                $filePath =
                FCPATH."./././assets/image/pengaduan/".strtotime(date('G:i:s')).'-'.$id_pengaduan.'-'.$_FILES['gambar']['name'][$i];

                if(move_uploaded_file($tmpFilePath, $filePath))
                {
                    $files[] = $shortname;
                    $gambar = array(
                      'id_pengaduan' => $id_pengaduan,
				              'nama_gambar' => $shortname,
                    );
                    $this->Gambar_pengaduan_model->simpan($gambar);
                }
            }

        }
    }

  }

  public function simpanGambar_CI($id_pengaduan)
  {
    $this->load->library('upload');

    if (count($_FILES['gambar']['name']) > 0) {
      $number_of_files_uploaded = count($_FILES['gambar']['name']);
      for ($i=0; $i < $number_of_files_uploaded; $i++) {
        $_FILES['userfile']['name']     = $_FILES['gambar']['name'][$i];
        $_FILES['userfile']['type']     = $_FILES['gambar']['type'][$i];
        $_FILES['userfile']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
        $_FILES['userfile']['error']    = $_FILES['gambar']['error'][$i];
        $_FILES['userfile']['size']     = $_FILES['gambar']['size'][$i];

        $config = array(
        'file_name'     => $this->input->post('tanggal_pengaduan').'-'.$this->input->post('judul_pengaduan').'-'.$id_pengaduan.'-'.$_FILES['gambar']['name'][$i],
        'allowed_types' => 'jpg|jpeg|png|gif',
        'max_size'      => 3000,
        'overwrite'     => FALSE,

        /* real path to upload folder ALWAYS */
        'upload_path'
            => './assets/image/pengaduan/',
        );

        $this->upload->initialize($config);

        if ($this->upload->do_upload()) {
          $gambar = array(
            'id_pengaduan' => $id_pengaduan,
            'nama_gambar' => $config['file_name'],
          );
          $this->Gambar_pengaduan_model->simpan($gambar);
        }else {
          //$this->alert('gagal upload', base_url());
          echo $config['upload_path'];
          echo $this->upload->display_errors();
        }
      }
    }

  }

  public function detail($id)
  {
     $pengguna = $this->session->userdata('pengguna');

     $pengaduan = $this->Laporan_pengaduan_model->detail($id);
     $gambar = $this->Gambar_pengaduan_model->get_gambar($id);

     $this->load->model('Komentar_pengaduan_model');

     $komentar = $this->Komentar_pengaduan_model->getKomentar($id);

     $this->load->model('Tanggapan_pengaduan_model');

     $tanggapan = $this->Tanggapan_pengaduan_model->show($id);

     $this->load->model('Status_pengaduan_model');

     $status = $this->Status_pengaduan_model->get_riwayat($id);

     $this->load->model('Riwayat_alamat_model');

     $alamat = $this->Riwayat_alamat_model->get_alamat($pengaduan['id_pdk']);

     $data = array(
       'tittle' => 'Detail : '.$pengaduan['nama_kategori'],
       'tanggapan' => $tanggapan,
       'pengaduan' => $pengaduan,
       'gambar' => $gambar,
       'komentar' => $komentar,
       'pengguna' => $pengguna,
       'alamat' => $alamat,
       'fungsi' => 'http://viralpatel.net/blogs/demo/jquery/jquery.shorten.1.0.js',
       'nav' => 1,
       'status' => $status,
     );

     if ($pengaduan['id_pengaduan']==null) {
      redirect(base_url());
     }else {
       $this->layout->load_frontend('frontend/pengaduan/detail/detail.php', $data);
     }

  }

  public function edit($id)
  {

    if (isset($_POST) && count($_POST) > 0) {

      $params = array(
					'judul_pengaduan' => $this->input->post('judul_pengaduan'),
					'id_kategori' => $this->input->post('id_kategori'),
					'LAT' => $this->input->post('LAT'),
					'LNG' => $this->input->post('LNG'),
					'TYPE' => $this->input->post('TYPE'),
					'isi_pengaduan' => $this->input->post('isi_pengaduan'),
                );

                $this->Laporan_pengaduan_model->update_laporan_pengaduan($id,$params);
                $this->simpanGambar($id);
                //$this->simpanGambar_CI($id);
                redirect(base_url('pengaduan/detail/'.$id));

    }else {

      $pengguna = $this->session->userdata('pengguna');

      $pengaduan = $this->Laporan_pengaduan_model->detail($id);

      $this->load->model('Komentar_pengaduan_model');

      $komentar = $this->Komentar_pengaduan_model->getKomentar($id);

      $this->load->model('Kategori_pengaduan_model');

      $kategori = $this->Kategori_pengaduan_model->get_all_kategori_pengaduan();

      $data = array(
        'tittle' => 'Edit : '.$pengaduan['judul_pengaduan'],
        'pengaduan' => $pengaduan,
        'komentar' => $komentar,
        'pengguna' => $pengguna,
        'kategori' => $kategori,
      );
      if ($pengguna['id_pdk']==$pengaduan['id_pdk'] && $pengaduan['status_pengaduan']=="belum valid") {
        $this->layout->load_frontend('frontend/pengaduan/edit/edit.php', $data);
      }else {
        redirect(base_url());
      }

    }

  }

  public function kategori($id_kategori)
  {
    if (isset($_GET['page'])) {
			$page =  $_GET['page'];
		}else {
			$page = 1;
		}
    $this->load->model('Laporan_pengaduan_model');

		$pengaduan = $this->Laporan_pengaduan_model->get_laporan_by_kategori($id_kategori);

    $this->load->model('Kategori_pengaduan_model');

		$kategori = $this->Kategori_pengaduan_model->get_all_kategori_pengaduan();

    $judul = $this->Kategori_pengaduan_model->get_kategori_pengaduan($id_kategori);

		$data = array(
			'tittle' => 'Beranda : '.$judul['nama_kategori'],
			'kategori' => $kategori,
			'pengaduan' => $pengaduan,
			'page' => $page,
			'nav' => 1,
		);
    $this->layout->load_frontend('frontend/home/home.php', $data);
  }

}

?>
