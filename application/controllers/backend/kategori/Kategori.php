<?php
/**
 *
 */
class Kategori extends Backend
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Kategori_pengaduan_model');
  }

  public function index()
  {

    if ($this->cek_jabatan->jabatan()=='kabupaten') {
      $kategori = $this->Kategori_pengaduan_model->get_all_kategori_pengaduan_kabupaten();
    }else {
      $kategori = $this->Kategori_pengaduan_model->get_all_kategori_pengaduan();
    }
    $data = [
      'kategori' => $kategori,
      'data' => $this->session->userdata('admin'),
      'sidebar' => 10,
      'header' => 'Kategori',
      'small' => 'Daftar Kategori',
      'crumb' =>  [
                    ['label'=>'Kategori','link'=>'admin/kategori'],
                    ['label'=>'Kategori','link'=>'admin/kategori'],
                      ],
    ];
    if ($this->cek_jabatan->jabatan()=='kabupaten') {
      $this->layout->load_backend('backend/kategori/daftar', $data);
    }else {
      $this->layout->load_backend('backend/kategori/index', $data);
    }

  }

  public function setujui($id_kategori)
  {
    if ($this->cek_jabatan->jabatan()=='kabupaten') {
      $data = [
        'status' => 'Y',
      ];
      $this->alert($this->Kategori_pengaduan_model->update_kategori_pengaduan($id_kategori, $data), base_url('admin/kategori'));
    }else {
      $this->alert('Anda bukan petugas kabupaten', base_url());
    }
  }

  public function hapus($id_kategori)
  {
    if ($this->cek_jabatan->jabatan()=='kabupaten') {
      $this->alert($this->Kategori_pengaduan_model->delete_kategori_pengaduan($id_kategori), base_url('admin/kategori'));
    }else {
      $this->alert('Anda bukan petugas kabupaten', base_url());
    }
  }

  function tambah()
  {
            $tmpFilePath = $_FILES['gambar']['tmp_name'];

            if($tmpFilePath != "")
            {

                $shortname = $this->input->post('nama').$_FILES['gambar']['name'];

                $filePath =
                FCPATH."assets\image\kategori\\" .
                $this->input->post('nama').$_FILES['gambar']['name'];

                if(move_uploaded_file($tmpFilePath, $filePath))
                {
                    $files[] = $shortname;
                    $kategori = array(
                      'nama_kategori' => $this->input->post('nama'),
                      'keterangan_kategori' => $this->input->post('keterangan'),
				              'icon_kategori' => $shortname,
                      'status' => 'N',
                    );
                    $this->Kategori_pengaduan_model->add_kategori_pengaduan($kategori);
                    $this->alert('Berhasil dan menunggu persetujuan', base_url('admin/kategori'));
                }
            }
  }


}

 ?>
