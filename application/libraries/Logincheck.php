<?php
/**
 *
 */
class Logincheck
{

  function __construct()
      {
            $this->CI =& get_instance();
      }

  function is_logged_in()
  {

    if ($this->CI->session->userdata('pengguna') == null || $this->CI->session->userdata('pengguna') < 1) {
        redirect(base_url('login'));
    }
  }
  function is_admin()
  {
    if ($this->CI->session->userdata('admin') == null || $this->CI->session->userdata('admin') < 1) {
        redirect(base_url('login'));
    }
  }
}

?>
