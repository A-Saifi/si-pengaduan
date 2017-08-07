<?php
class Jabatan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get jabatan by id_jabatan
     * Custom
     */
    function get_jabatan($id_jabatan)
    {
        return $this->db->get_where('jabatan',array('id_j'=>$id_jabatan))->row_array();
    }

    /*
     * Get all jabatan
     */
    function get_all_jabatan()
    {
        return $this->db->get('jabatan')->result_array();
    }

    /*
     * function to add new jabatan
     */
    function add_jabatan($params)
    {
        $this->db->insert('jabatan',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update jabatan
     */
    function update_jabatan($id_jabatan,$params)
    {
        $this->db->where('id_j',$id_jabatan);
        $response = $this->db->update('jabatan',$params);
        if($response)
        {
            return "jabatan updated successfully";
        }
        else
        {
            return "Error occuring while updating jabatan";
        }
    }

    /*
     * function to delete jabatan
     */
    function delete_jabatan($id_jabatan)
    {
        $response = $this->db->delete('jabatan',array('id_j'=>$id_jabatan));
        if($response)
        {
            return "jabatan deleted successfully";
        }
        else
        {
            return "Error occuring while deleting jabatan";
        }
    }

    function get_rt_setempat($alamat)
    {
      $this->db->select('*');

      $this->db->from('riwayat_jabatan');

      $this->db->join('jabatan', 'riwayat_jabatan.id_j = jabatan.id_j');
      $this->db->join('penduduk', 'penduduk.id_pdk = riwayat_jabatan.id_pdk');
      $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
      $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
      $this->db->join('rw', 'rt.id_rw = rw.id_rw');
      $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
      $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
      $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
      $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
      $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');

      $this->db->where('riwayat_jabatan.stts_rj', 'aktif');
      $this->db->where('riwayat_alamat.stts_ra', 'aktif');
      $this->db->where('jabatan.nama_j', 'rt');
      $this->db->where('rt.id_rt', $alamat['id_rt']);

      return $this->db->get()->row_array();

    }

    function get_rw_setempat($alamat)
    {
      $this->db->select('*');

      $this->db->from('riwayat_jabatan');

      $this->db->join('jabatan', 'riwayat_jabatan.id_j = jabatan.id_j');
      $this->db->join('penduduk', 'penduduk.id_pdk = riwayat_jabatan.id_pdk');
      $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
      $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
      $this->db->join('rw', 'rt.id_rw = rw.id_rw');
      $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
      $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
      $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
      $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
      $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');

      $this->db->where('riwayat_jabatan.stts_rj', 'aktif');
      $this->db->where('riwayat_alamat.stts_ra', 'aktif');
      $this->db->where('jabatan.nama_j', 'rw');
      $this->db->where('rw.id_rw', $alamat['id_rw']);

      return $this->db->get()->row_array();

    }

    function get_kelurahan_setempat($alamat)
    {
      $this->db->select('*');

      $this->db->from('riwayat_jabatan');

      $this->db->join('jabatan', 'riwayat_jabatan.id_j = jabatan.id_j');
      $this->db->join('penduduk', 'penduduk.id_pdk = riwayat_jabatan.id_pdk');
      $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
      $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
      $this->db->join('rw', 'rt.id_rw = rw.id_rw');
      $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
      $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
      $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
      $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
      $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');

      $this->db->where('riwayat_jabatan.stts_rj', 'aktif');
      $this->db->where('riwayat_alamat.stts_ra', 'aktif');
      $this->db->where('jabatan.nama_j', 'kelurahan');
      $this->db->where('kelurahan.id_kel', $alamat['id_kel']);

      return $this->db->get()->row_array();

    }

    function get_kecamatan_setempat($alamat)
    {
      $this->db->select('*');

      $this->db->from('riwayat_jabatan');

      $this->db->join('jabatan', 'riwayat_jabatan.id_j = jabatan.id_j');
      $this->db->join('penduduk', 'penduduk.id_pdk = riwayat_jabatan.id_pdk');
      $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
      $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
      $this->db->join('rw', 'rt.id_rw = rw.id_rw');
      $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
      $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
      $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
      $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
      $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');

      $this->db->where('riwayat_jabatan.stts_rj', 'aktif');
      $this->db->where('riwayat_alamat.stts_ra', 'aktif');
      $this->db->where('jabatan.nama_j', 'kecamatan');
      $this->db->where('kecamatan.id_kec', $alamat['id_kec']);

      return $this->db->get()->row_array();

    }

    function get_kabupaten_setempat($alamat)
    {
      $this->db->select('*');

      $this->db->from('riwayat_jabatan');

      $this->db->join('jabatan', 'riwayat_jabatan.id_j = jabatan.id_j');
      $this->db->join('penduduk', 'penduduk.id_pdk = riwayat_jabatan.id_pdk');
      $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
      $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
      $this->db->join('rw', 'rt.id_rw = rw.id_rw');
      $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
      $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
      $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
      $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
      $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');

      $this->db->where('riwayat_jabatan.stts_rj', 'aktif');
      $this->db->where('riwayat_alamat.stts_ra', 'aktif');
      $this->db->where('jabatan.nama_j', 'kabupaten');
      $this->db->where('kabupaten.id_kab', $alamat['id_kab']);

      return $this->db->get()->row_array();

    }


}
