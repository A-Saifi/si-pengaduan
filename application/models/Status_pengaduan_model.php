<?php
/**
 *
 */
class Status_pengaduan_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  function add_riwayat($params)
  {
    $this->db->insert('status_pengaduan',$params);
    return $this->db->insert_id();
  }

  function cari_kategori($id_pengaduan, $kategori)
  {
    $this->db->select('*');

    $this->db->from('status_pengaduan');

    $this->db->where('status_pengaduan.kategori', $kategori);
    $this->db->where('status_pengaduan.id_pengaduan', $id_pengaduan);

    return $this->db->get()->row_array();
  }

  function hapus($id_pengaduan, $kategori)
  {
    $response = $this->db->delete('status_pengaduan',array('id_pengaduan'=>$id_pengaduan, 'kategori' => $kategori ));
    if($response)
    {
        return "Sukses";
    }
    else
    {
        return "Error occuring";
    }
  }

  public function status_spam($id_pengaduan)
  {
    $this->db->select('*');
    $this->db->from('status_pengaduan');

    $this->db->where('id_pengaduan', $id_pengaduan);
    $this->db->where('kategori', 'spam');

    return $this->db->get()->row_array();
  }

  public function get_riwayat($id_pengaduan)
  {
    $this->db->select('*');

    $this->db->from('status_pengaduan');

    $this->db->where('status_pengaduan.id_pengaduan', $id_pengaduan);

    return $this->db->get()->result_array();
  }

}

?>
