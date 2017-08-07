<?php /**
 *
 */
class Tanggapan_pengaduan_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function insert($data)
  {
    $this->db->insert('tanggapan_pengaduan',$data);
    return $this->db->insert_id();
  }

  public function show($id_pengaduan)
  {
    $this->db->select('*');

    $this->db->from('tanggapan_pengaduan');

    $this->db->join('riwayat_jabatan', 'tanggapan_pengaduan.id_rj = riwayat_jabatan.id_rj');
    $this->db->join('jabatan', 'riwayat_jabatan.id_j = jabatan.id_j');

    $this->db->where('tanggapan_pengaduan.id_pengaduan', $id_pengaduan);

    $this->db->order_by("tanggapan_pengaduan.id_tanggapan", "desc");

    return $this->db->get()->result_array();
  }

  public function get_tanggapan($id_rj)
  {
    $this->db->select('*');

    $this->db->from('tanggapan_pengaduan');

    $this->db->join('riwayat_jabatan', 'tanggapan_pengaduan.id_rj = riwayat_jabatan.id_rj');
    $this->db->join('jabatan', 'riwayat_jabatan.id_j = jabatan.id_j');
    $this->db->join('laporan_pengaduan', 'tanggapan_pengaduan.id_pengaduan = laporan_pengaduan.id_pengaduan');

    $this->db->where('tanggapan_pengaduan.id_rj', $id_rj);

    $this->db->order_by("tanggapan_pengaduan.id_tanggapan", "desc");

    return $this->db->get()->result_array();
  }

  public function search_by_id($id_pengaduan, $field, $value)
  {
    $this->db->select('*');

    $this->db->from('tanggapan_pengaduan');

    $this->db->where('id_pengaduan', $id_pengaduan);
    $this->db->where($field, $value);

    return $this->db->get()->row_array();
  }

  function delete_tanggapan($id_tanggapan)
  {
      $response = $this->db->delete('tanggapan_pengaduan',array('id_tanggapan'=>$id_tanggapan));
      if($response)
      {
          return "tanggapan deleted successfully";
      }
      else
      {
          return "Error occuring while deleting tanggapan";
      }
  }

  function update_tanggapan($id_tanggapan,$params)
  {
      $this->db->where('id_tanggapan',$id_tanggapan);
      $response = $this->db->update('tanggapan_pengaduan',$params);
      if($response)
      {
          return "tanggapan updated successfully";
      }
      else
      {
          return "Error occuring while updating tanggapan";
      }
  }

}
 ?>
