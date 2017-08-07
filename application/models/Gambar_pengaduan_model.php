<?php
/**
 *
 */
class Gambar_pengaduan_model extends CI_Model
{

  function __construct()
  {
      parent::__construct();
  }

  function simpan($gambar)
  {
    $this->db->insert('gambar_pengaduan',$gambar);
    return $this->db->insert_id();
  }

  function get_gambar($id_pengaduan)
  {

    $this->db->select('*');

    $this->db->from('gambar_pengaduan');

    $this->db->where('id_pengaduan', $id_pengaduan);

    return $this->db->get()->result_array();
  }

  function get_gambar_limit($id_pengaduan, $limit)
  {

    $this->db->select('*');

    $this->db->from('gambar_pengaduan');

    $this->db->where('id_pengaduan', $id_pengaduan);

    $this->db->limit($limit, 0);

    return $this->db->get()->result_array();
  }

  function delete_gambar_pengaduan($id_gambar)
    {
        $response = $this->db->delete('gambar_pengaduan',array('id_gambar'=>$id_gambar));
        if($response)
        {
            return "gambar_pengaduan deleted successfully";
        }
        else
        {
            return "Error occuring while deleting gambar_pengaduan";
        }
    }

}

?>
