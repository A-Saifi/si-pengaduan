<?php
/**
 *
 */
class Avatar_penduduk_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  function getAvatar($id_pdk)
  {
    $this->db->select('gambar_avatar');

    $this->db->from('avatar_penduduk');

    $this->db->where('id_pdk', $id_pdk);

    return $this->db->get()->row_array();
  }

}

?>
