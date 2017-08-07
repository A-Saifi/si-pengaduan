<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	 {
			 parent::__construct();
       $this->load->model('Penduduk_model');
			 $this->load->model('Avatar_penduduk_model');
			 $this->load->model('Riwayat_alamat_model');
       if ($this->session->userdata('pengguna') != null) {
         redirect(base_url());
       }
	 }

	public function index()
	{
    $data = array('tittle' => 'Login Laporkan', );
    $this->layout->load_login($data);
	}

  public function check()
  {
    $penduduk = $this->Penduduk_model->login(
        $this->input->post('nik'),
        md5($this->input->post('password'))
      );

    if ( $penduduk==null )
    {
        echo "<script type='text/javascript'>
                alert('NIK atau Password salah');
              </script>";

        $this->index();
    }
    else {
				$alamat = $this->Riwayat_alamat_model->get_alamat($penduduk['id_pdk']);
				$pengguna = array_merge($penduduk, $alamat);
        $this->session->set_userdata('pengguna', $pengguna);
        redirect(base_url());
    }
  }

}
