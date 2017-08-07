<?php
/**
 *
 */
class Komentar_pengaduan_model extends CI_MOdel
{

  function __construct()
  {
    parent::__construct();
  }

  public function simpan($params)
  {
    $this->db->insert('komentar_pengaduan',$params);
    return $this->db->insert_id();
  }

  public function search($id_komentar)
  {
    $this->db->select('*');

    $this->db->from('komentar_pengaduan');

    $this->db->join('penduduk', 'komentar_pengaduan.id_pdk = penduduk.id_pdk');

    $this->db->where('komentar_pengaduan.id_komentar', $id_komentar);

    return $this->db->get()->row_array();

  }

  function getKomentar($id)
  {
    $this->db->select('*');

    $this->db->from('komentar_pengaduan');

    $this->db->join('penduduk', 'komentar_pengaduan.id_pdk = penduduk.id_pdk');

    $this->db->order_by("komentar_pengaduan.id_komentar", "desc");

    $this->db->where('komentar_pengaduan.id_pengaduan', $id);

    return $this->db->get()->result_array();
  }

  function getKomentarLimit($id)
  {
    $this->db->select('*');

    $this->db->from('komentar_pengaduan');

    $this->db->join('penduduk', 'komentar_pengaduan.id_pdk = penduduk.id_pdk');

    $this->db->order_by("komentar_pengaduan.id_komentar", "desc");

    $this->db->where('komentar_pengaduan.id_pengaduan', $id);

    $this->db->limit(2, 0);

    return $this->db->get()->result_array();
  }

  function getTotalKomentar($id)
  {
    $this->db->select('COUNT(*) as total');

    $this->db->from('komentar_pengaduan');

    $this->db->where('komentar_pengaduan.id_pengaduan', $id);

    return $this->db->get()->row_array();
  }

  function update_komentar($id_komentar,$params)
  {
      $this->db->where('id_komentar',$id_komentar);
      $response = $this->db->update('komentar_pengaduan',$params);
      if($response)
      {
          return "Komentar berhasil diubah";
      }
      else
      {
          return "Error occuring while updating komentar";
      }
  }

  function delete_komentar($id_komentar)
  {
      $response = $this->db->delete('komentar_pengaduan',array('id_komentar'=>$id_komentar));
      if($response)
      {
          return "komentar deleted successfully";
      }
      else
      {
          return "Error occuring while deleting komentar";
      }
  }



}

?>
