<?php
  /**
   *
   */
  class Login extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();
      $this->load->model('Penduduk_model');
      $this->load->model('Riwayat_jabatan_model');
      $this->load->model('Jabatan_model');
      $this->load->model('Riwayat_alamat_model');
      if ($this->session->userdata('pengguna') != null) {
          redirect(base_url());
      }
      if ($this->session->userdata('admin') != null) {
          redirect(base_url('admin'));
      }
    }

    public function index()
  	{
      $data = array('tittle' => 'Login Laporkan', );
      $this->layout->load_login($data);
  	}

    public function check()
    {

      if ($this->input->post('sebagai')=='masyarakat') {

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

      if ($this->input->post('sebagai')=='admin') {

          $penduduk = $this->Penduduk_model->login(
              $this->input->post('nik'),
              md5($this->input->post('password'))
            );

          $jabatan = $this->Riwayat_jabatan_model->get_riwayat_jabatan_pdk($penduduk['id_pdk']);

          if ( $penduduk==null )
          {
              echo "<script type='text/javascript'>
                      alert('NIK atau Password salah');
                    </script>";

              $this->index();
          }
          else {
      				if ( $jabatan==null ) {
      		      echo "<script type='text/javascript'>
      		              alert('Anda bukan admin pada sistem LAPORKAN');
      		            </script>";

      		        $this->index();
      		    }else {

      					$nama_jabatan = $this->Jabatan_model->get_jabatan($jabatan['id_j']);

      	        $admin = array_merge($penduduk, $jabatan, $nama_jabatan);

      	        $this->session->set_userdata('admin', $admin);

      					redirect(base_url('admin'));

      				}

          }
      }
    }

  }

 ?>
