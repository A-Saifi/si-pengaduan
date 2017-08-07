<?php
  /**
   * library yang digunakan untuk memuat template
   */
  class Layout
  {

    function __construct()
        {
            $this->CI =& get_instance();
        }

    public function load_backend($view, $data=array())
    {

      $user = array('userdata' => $this->CI->session->userdata('admin'),);

      $result = array_merge($data, $user);

      $this->CI->load->view("_layout/backend/adminlte/header", $result);

      $this->CI->load->view("_layout/backend/adminlte/sidebar", $result);

      $this->CI->load->view($view, $data);

      $this->CI->load->view("_layout/backend/adminlte/footer", $data);
    }

    public function load_frontend($view, $data=array())
    {

      $user = array('userdata' => $this->CI->session->userdata('pengguna'),);

      $result = array_merge($data, $user);

      $this->CI->load->view("_layout/frontend/adminlte/header", $result);

      $this->CI->load->view($view, $result);

      $this->CI->load->view("_layout/frontend/adminlte/footer", $data);
    }

    public function load_login($data=array())
    {
      $this->CI->load->view("_layout/frontend/login", $data);
    }

    public function load_admin($data=array())
    {
      $this->CI->load->view("_layout/backend/login", $data);
    }

  }

?>
