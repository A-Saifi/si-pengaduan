<?php
/**
 *
 */
class Disposisi extends Backend
{

  function __construct()
  {
    parent::__construct();
		$this->is_kelurahan();
    date_default_timezone_set("Asia/Bangkok");
  }

  public function pengaduan($id_pengaduan)
  {
    $asal = $this->session->userdata('admin');

    if ($this->input->post('jabatan')!=null) {

      $this->load->model('Jabatan_model');
      $this->load->model('Riwayat_alamat_model');

      switch ($this->input->post('jabatan')) {
        case 'rt':
          $jabatan = $this->Jabatan_model->get_rt_setempat($this->Riwayat_alamat_model->get_alamat($asal['id_pdk']));
        break;
        case 'rw':
          $jabatan = $this->Jabatan_model->get_rw_setempat($this->Riwayat_alamat_model->get_alamat($asal['id_pdk']));
        break;
        case 'kelurahan':
          $jabatan = $this->Jabatan_model->get_kelurahan_setempat($this->Riwayat_alamat_model->get_alamat($asal['id_pdk']));
        break;
        case 'kecamatan':
          $jabatan = $this->Jabatan_model->get_kecamatan_setempat($this->Riwayat_alamat_model->get_alamat($asal['id_pdk']));
        break;
        case 'kabupaten':
          $jabatan = $this->Jabatan_model->get_kabupaten_setempat($this->Riwayat_alamat_model->get_alamat($asal['id_pdk']));
        break;

        default:
          # code...
          break;
      }

      $disposisi = [
          'id_pengaduan' => $id_pengaduan,
          'asal' => $asal['id_rj'],
          'tujuan' => $jabatan['id_rj'],
          'waktu_disposisi' => date('G:i:s'),
          'tanggal_disposisi' => date('Y-m-d'),
          'catatan_disposisi' => $this->input->post('catatan'),
          'status' => 'belum',
        ];

      //echo "<pre>".print_r($disposisi, 1)."</pre>";
      $this->load->model('Disposisi_pengaduan_model');

      $this->Disposisi_pengaduan_model->ubah(['status' => 'sudah',], $id_pengaduan, $asal['id_rj']);
      $this->Disposisi_pengaduan_model->simpan($disposisi);

      $status = [
        'id_status' => "",
        'id_pengaduan' => $id_pengaduan,
        'kategori' => 'disposisi',
        'waktu_status' => date('G:i:s'),
        'tanggal_status' => date('Y-m-d'),
        'nama_status' => 'Telah didisposisikan oleh Petugas Kelurahan',
        'dibaca' => 'belum',
      ];

      $this->load->model('Status_pengaduan_model');
      $this->Status_pengaduan_model->add_riwayat($status);

      $this->alert('Berhasil Didisposisikan', base_url('admin/kelurahan/pengaduan/disposisi/'));
    }else {
        $this->alert('Maaf tidak lengkap', base_url('admin/kelurahan/pengaduan/detail/'.$id_pengaduan));
    }

  }
}

 ?>
