<?php
/**
 *
 */
class jabatan extends Backend
{

  function __construct()
  {
    parent::__construct();
    $this->is_admin();
    date_default_timezone_set("Asia/Bangkok");
  }

  public function rt()
  {
    $this->load->model('Penduduk_model');
    $pengguna = $this->Penduduk_model->get_all_penduduk_admin_jabatan('rt');
    $data = [
      'tittle' => 'admin',
      'pengguna' => $pengguna,
      'header' => 'Daftar Ketua RT Aktif',
      'small' => 'Kabupaten Sukoharjo',
      'crumb' =>  [
                    ['label'=>'Admin','link'=>'admin/admin'],
                    ['label'=>'Admin Sistem','link'=>'admin/admin/pengguna'],
                    ['label'=>'Ketua RT','link'=>'admin/admin/jabatan/rt'],
                      ],
      'sidebar' => 2,
      'script' => [
                        ['nama' => 'datatables', ],
                ],
    ];
    $this->layout->load_backend('backend/admin/jabatan/daftar_rt', $data);
  }

  public function rw()
  {
    $this->load->model('Penduduk_model');
    $pengguna = $this->Penduduk_model->get_all_penduduk_admin_jabatan('rw');
    $data = [
      'tittle' => 'admin',
      'pengguna' => $pengguna,
      'header' => 'Daftar Ketua RW Aktif',
      'small' => 'Kabupaten Sukoharjo',
      'crumb' =>  [
                    ['label'=>'Admin','link'=>'admin/admin'],
                    ['label'=>'Admin Sistem','link'=>'admin/admin/pengguna'],
                    ['label'=>'Ketua RT','link'=>'admin/admin/jabatan/rt'],
                      ],
      'sidebar' => 3,
      'script' => [
                        ['nama' => 'datatables', ],
                ],
    ];
    $this->layout->load_backend('backend/admin/jabatan/daftar_rw', $data);
  }

  public function kelurahan()
  {
    $this->load->model('Penduduk_model');
    $pengguna = $this->Penduduk_model->get_all_penduduk_admin_jabatan('kelurahan');
    $data = [
      'tittle' => 'admin',
      'pengguna' => $pengguna,
      'header' => 'Daftar Petugas Kelurahan Aktif',
      'small' => 'Kabupaten Sukoharjo',
      'crumb' =>  [
                    ['label'=>'Admin','link'=>'admin/admin'],
                    ['label'=>'Admin Sistem','link'=>'admin/admin/pengguna'],
                    ['label'=>'Ketua RT','link'=>'admin/admin/jabatan/rt'],
                      ],
      'sidebar' => 4,
      'script' => [
                        ['nama' => 'datatables', ],
                ],
    ];
    $this->layout->load_backend('backend/admin/jabatan/daftar_kelurahan', $data);
  }

  public function kecamatan()
  {
    $this->load->model('Penduduk_model');
    $pengguna = $this->Penduduk_model->get_all_penduduk_admin_jabatan('kecamatan');
    $data = [
      'tittle' => 'admin',
      'pengguna' => $pengguna,
      'header' => 'Daftar Petugas Kecamatan Aktif',
      'small' => 'Kabupaten Sukoharjo',
      'crumb' =>  [
                    ['label'=>'Admin','link'=>'admin/admin'],
                    ['label'=>'Admin Sistem','link'=>'admin/admin/pengguna'],
                    ['label'=>'Ketua RT','link'=>'admin/admin/jabatan/rt'],
                      ],
      'sidebar' => 5,
      'script' => [
                        ['nama' => 'datatables', ],
                ],
    ];
    $this->layout->load_backend('backend/admin/jabatan/daftar_kecamatan', $data);
  }

  public function kabupaten()
  {
    $this->load->model('Penduduk_model');
    $pengguna = $this->Penduduk_model->get_all_penduduk_admin_jabatan('kabupaten');
    $data = [
      'tittle' => 'admin',
      'pengguna' => $pengguna,
      'header' => 'Daftar Petugas Kabupaten Aktif',
      'small' => 'Kabupaten Sukoharjo',
      'crumb' =>  [
                    ['label'=>'Admin','link'=>'admin/admin'],
                    ['label'=>'Admin Sistem','link'=>'admin/admin/pengguna'],
                    ['label'=>'Ketua RT','link'=>'admin/admin/jabatan/rt'],
                      ],
      'sidebar' => 6,
      'script' => [
                        ['nama' => 'datatables', ],
                ],
    ];
    $this->layout->load_backend('backend/admin/jabatan/daftar', $data);
  }

  public function nonaktif($id_rj)
  {
    $this->load->model('Riwayat_jabatan_model');
    $data = [
      'stts_rj' => 'tidak aktif',
    ];
    $this->Riwayat_jabatan_model->update_riwayat_jabatan($id_rj, $data);
    $this->alert('Berhasil di nonaktifkan', base_url('admin/admin/jabatan/'.$this->input->get('jabatan')));
  }

  public function angkat($id_pdk)
  {
    $this->load->model('Riwayat_alamat_model');
    $alamat = $this->Riwayat_alamat_model->get_alamat($id_pdk);

    $this->load->model('Jabatan_model');
    $jabatan = $this->Jabatan_model->get_jabatan($this->input->get('jabatan'));

    $this->load->model('Penduduk_model');
    switch ($jabatan['nama_j']) {
      case 'rt':
        $pejabat = $this->Penduduk_model->cari_jabatan_alamat('rt.id_rt', $alamat['id_rt'], 'rt');
        break;

      case 'rw':
        $pejabat = $this->Penduduk_model->cari_jabatan_alamat('rw.id_rw', $alamat['id_rw'], 'rw');
        break;

      case 'kelurahan':
        $pejabat = $this->Penduduk_model->cari_jabatan_alamat('kelurahan.id_kel', $alamat['id_kel'], 'kelurahan');
        break;

      case 'kecamatan':
        $pejabat = $this->Penduduk_model->cari_jabatan_alamat('kecamatan.id_kec', $alamat['id_kec'], 'kecamatan');
        break;

      case 'kabupaten':
        $pejabat = $this->Penduduk_model->cari_jabatan_alamat('kabupaten.id_kab', $alamat['id_kab'], 'kabupaten');
        break;

        case 'admin':
          //redirect(base_url('admin/admin'));
        break;

      default:
        redirect(base_url());
        echo "default";
        break;
    }

    if ($pejabat==null) {
      $this->load->model('Riwayat_jabatan_model');
      $cek = $this->Riwayat_jabatan_model->get_riwayat_jabatan_pdk($id_pdk);
      if ($cek==null) {
        $mulai = $this->input->get('mulai');
        $akhir = $this->input->get('akhir');
        $id_j = $this->input->get('jabatan');
        $data = [
          'tgl_mulai_rj' => $mulai,
          'tgl_akhir_rj' => $akhir,
          'id_j' => $id_j,
          'id_pdk' => $id_pdk,
          'stts_rj' => 'aktif'
        ];
        $this->Riwayat_jabatan_model->add_riwayat_jabatan($data);
        $this->alert('Berhasil diangkat', base_url('admin/admin/jabatan/'.$jabatan['nama_j']));

      }else {
        $jabatanku = $this->Jabatan_model->get_jabatan($cek['id_j']);
        $this->alert('Penduduk ini telah menjabat, silahkan nonaktifkan terlebih dahulu',base_url('admin/admin/jabatan/'.$jabatanku['nama_j']));
      }
    }else {
      $this->alert('Sudah ada yang menjabat, silahkan nonaktifkan terlebih dahulu',base_url('admin/admin/jabatan/'.$jabatan['nama_j']));
    }
  }


}

 ?>
