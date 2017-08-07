<?php
class Penduduk_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get penduduk by nik and password
     */
    public function login($nik,$password)
    {
        return $this->db->get_where('penduduk',array('nik_pdk'=>$nik,'pass_pdk'=>$password))->row_array();
    }

    /*
     * Get penduduk by nik
     */
    function get_penduduk_nik($nik_pdk)
    {
      $this->db->select('*');

      $this->db->from('penduduk');

      $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
      $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
      $this->db->join('rw', 'rt.id_rw = rw.id_rw');
      $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
      $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
      $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
      $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
      $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');

      $this->db->where('penduduk.nik_pdk', $nik_pdk);
      $this->db->where('riwayat_alamat.stts_ra', 'aktif');

      return $this->db->get()->row_array();
    }

    /*
     * Get penduduk by id_pdk
     */
    function get_penduduk($id_pdk)
    {
        return $this->db->get_where('penduduk',array('id_pdk'=>$id_pdk))->row_array();
    }

    /*
     * Get all penduduk
     */
    function get_all_penduduk()
    {
        return $this->db->get('penduduk')->result_array();
    }

    /*
     * Get all penduduk by rt
     */
    function get_all_penduduk_rt($id_rt)
    {
      $this->db->select('*');

      $this->db->from('penduduk');

      $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
      $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
      $this->db->join('rw', 'rt.id_rw = rw.id_rw');
      $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
      $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
      $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
      $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
      $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');

      $this->db->where('rt.id_rt', $id_rt);
      $this->db->where('riwayat_alamat.stts_ra', 'aktif');

      return $this->db->get()->result_array();

    }

    function get_all_penduduk_jabatan($jabatan, $id)
    {
      $this->db->select('*');

      $this->db->from('penduduk');

      $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
      $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
      $this->db->join('rw', 'rt.id_rw = rw.id_rw');
      $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
      $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
      $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
      $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
      $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');

      switch ($jabatan) {
        case 'rt':
          $this->db->where($jabatan.'.id_'.$jabatan, $id);
        break;
        case 'rw':
          $this->db->where($jabatan.'.id_'.$jabatan, $id);
        break;
        case 'kelurahan':
          $this->db->where($jabatan.'.id_kel', $id);
        break;
        case 'kecamatan':
          $this->db->where($jabatan.'.id_kec', $id);
        break;
        case 'kabupaten':
          $this->db->where($jabatan.'.id_kab', $id);
        break;

        default:
          # code...
          break;
      }

      $this->db->where('riwayat_alamat.stts_ra', 'aktif');

      return $this->db->get()->result_array();

    }

    /*
     * function to add new penduduk
     */
    function add_penduduk($params)
    {
        $this->db->insert('penduduk',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update penduduk
     */
    function update_penduduk($id_pdk,$params)
    {
        $this->db->where('id_pdk',$id_pdk);
        $response = $this->db->update('penduduk',$params);
        if($response)
        {
            return "penduduk updated successfully";
        }
        else
        {
            return "Error occuring while updating penduduk";
        }
    }

    /*
     * function to delete penduduk
     */
    function delete_penduduk($id_pdk)
    {
        $response = $this->db->delete('penduduk',array('id_pdk'=>$id_pdk));
        if($response)
        {
            return "penduduk deleted successfully";
        }
        else
        {
            return "Error occuring while deleting penduduk";
        }
    }

    public function cari_nama($nama, $jabatan, $id)
    {

      $this->db->select('*');

      $this->db->from('penduduk');

      $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
      $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
      $this->db->join('rw', 'rt.id_rw = rw.id_rw');
      $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
      $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
      $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
      $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
      $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');

      switch ($jabatan) {
        case 'rt':
          $this->db->where($jabatan.'.id_'.$jabatan, $id);
        break;
        case 'rw':
          $this->db->where($jabatan.'.id_'.$jabatan, $id);
        break;
        case 'kelurahan':
          $this->db->where($jabatan.'.id_kel', $id);
        break;
        case 'kecamatan':
          $this->db->where($jabatan.'.id_kec', $id);
        break;
        case 'kabupaten':
          $this->db->where($jabatan.'.id_kab', $id);
        break;

        default:
          # code...
          break;
      }

      $this->db->where('riwayat_alamat.stts_ra', 'aktif');
      $this->db->like('nama_pdk', $nama);

      return $this->db->get()->result_array();
    }

    public function cari_nik($nik, $jabatan, $id)
    {
      $this->db->select('*');

      $this->db->from('penduduk');

      $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
      $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
      $this->db->join('rw', 'rt.id_rw = rw.id_rw');
      $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
      $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
      $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
      $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
      $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');

      //$this->db->where($jabatan.'.id_'.$jabatan, $id);
      switch ($jabatan) {
        case 'rt':
          $this->db->where($jabatan.'.id_'.$jabatan, $id);
        break;
        case 'rw':
          $this->db->where($jabatan.'.id_'.$jabatan, $id);
        break;
        case 'kelurahan':
          $this->db->where($jabatan.'.id_kel', $id);
        break;
        case 'kecamatan':
          $this->db->where($jabatan.'.id_kec', $id);
        break;
        case 'kabupaten':
          $this->db->where($jabatan.'.id_kab', $id);
        break;

        default:
          # code...
          break;
      }
      $this->db->where('riwayat_alamat.stts_ra', 'aktif');
      $this->db->like('nik_pdk', $nik);

      return $this->db->get()->result_array();
    }

    function count_all_penduduk_jabatan($jabatan, $id)
    {
      $this->db->select('COUNT(*) as jumlah');

      $this->db->from('penduduk');

      $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
      $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
      $this->db->join('rw', 'rt.id_rw = rw.id_rw');
      $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
      $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
      $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
      $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
      $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');

      switch ($jabatan) {
        case 'rt':
          $this->db->where($jabatan.'.id_'.$jabatan, $id);
        break;
        case 'rw':
          $this->db->where($jabatan.'.id_'.$jabatan, $id);
        break;
        case 'kelurahan':
          $this->db->where($jabatan.'.id_kel', $id);
        break;
        case 'kecamatan':
          $this->db->where($jabatan.'.id_kec', $id);
        break;
        case 'kabupaten':
          $this->db->where($jabatan.'.id_kab', $id);
        break;

        default:
          # code...
          break;
      }

      $this->db->where('riwayat_alamat.stts_ra', 'aktif');

      return $this->db->get()->row_array();

    }

    function get_all_penduduk_admin()
    {
      $this->db->select('*');

      $this->db->from('penduduk');

      $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
      $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
      $this->db->join('rw', 'rt.id_rw = rw.id_rw');
      $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
      $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
      $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
      $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
      $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');
      //$this->db->join('riwayat_jabatan', 'penduduk.id_pdk = riwayat_jabatan.id_pdk', 'left');
      //$this->db->join('jabatan', 'riwayat_jabatan.id_j = jabatan.id_j', 'left');

      $this->db->where('riwayat_alamat.stts_ra', 'aktif');
      //$this->db->where('riwayat_jabatan.stts_ra', 'aktif');

      $this->db->order_by("riwayat_alamat.id_ra", "asc");

      return $this->db->get()->result_array();

    }

    function get_all_penduduk_admin_jabatan($jabatan)
    {
      $this->db->select('*');

      $this->db->from('penduduk');

      $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
      $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
      $this->db->join('rw', 'rt.id_rw = rw.id_rw');
      $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
      $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
      $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
      $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
      $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');
      $this->db->join('riwayat_jabatan', 'penduduk.id_pdk = riwayat_jabatan.id_pdk');
      $this->db->join('jabatan', 'riwayat_jabatan.id_j = jabatan.id_j');

      $this->db->where('riwayat_alamat.stts_ra', 'aktif');
      $this->db->where('riwayat_jabatan.stts_rj', 'aktif');
      $this->db->where('jabatan.nama_j', $jabatan);


      $this->db->order_by("riwayat_jabatan.id_rj", "desc");

      return $this->db->get()->result_array();

    }

    function cari_jabatan_alamat($field, $alamat, $jabatan)
    {
      $this->db->select('*');

      $this->db->from('penduduk');

      $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
      $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
      $this->db->join('rw', 'rt.id_rw = rw.id_rw');
      $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
      $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
      $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
      $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
      $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');
      $this->db->join('riwayat_jabatan', 'penduduk.id_pdk = riwayat_jabatan.id_pdk');
      $this->db->join('jabatan', 'riwayat_jabatan.id_j = jabatan.id_j');

      $this->db->where('riwayat_alamat.stts_ra', 'aktif');
      $this->db->where('riwayat_jabatan.stts_rj', 'aktif');
      $this->db->where('jabatan.nama_j', $jabatan);
      $this->db->where($field, $alamat);

      $this->db->order_by("riwayat_jabatan.id_rj", "desc");

      return $this->db->get()->result_array();

    }

    function get_all_penduduk_admin_kecamatan($id_kec)
    {
      $this->db->select('*');

      $this->db->from('penduduk');

      $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
      $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
      $this->db->join('rw', 'rt.id_rw = rw.id_rw');
      $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
      $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
      $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
      $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
      $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');
      //$this->db->join('riwayat_jabatan', 'penduduk.id_pdk = riwayat_jabatan.id_pdk', 'left');
      //$this->db->join('jabatan', 'riwayat_jabatan.id_j = jabatan.id_j', 'left');

      $this->db->where('riwayat_alamat.stts_ra', 'aktif');
      $this->db->where('kecamatan.id_kec', $id_kec);
      //$this->db->where('riwayat_jabatan.stts_ra', 'aktif');

      $this->db->order_by("riwayat_alamat.id_ra", "asc");

      return $this->db->get()->result_array();

    }
}
