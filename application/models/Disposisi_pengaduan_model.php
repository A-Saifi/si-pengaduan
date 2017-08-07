<?php
/**
 *
 */
class Disposisi_pengaduan_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  function simpan($disposisi)
  {
    $this->db->insert('disposisi_pengaduan',$disposisi);
    return $this->db->insert_id();
  }

  function get_disposisi($id_rj)
  {
    $this->db->select('*');

    $this->db->from('disposisi_pengaduan');

    $this->db->join('laporan_pengaduan', 'disposisi_pengaduan.id_pengaduan = laporan_pengaduan.id_pengaduan');
    $this->db->join('penduduk', 'laporan_pengaduan.id_pdk = penduduk.id_pdk');
    $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');

    $this->db->where('disposisi_pengaduan.status', 'belum');
    $this->db->where('laporan_pengaduan.status_pengaduan', 'belum valid');
    $this->db->where('disposisi_pengaduan.tujuan', $id_rj);
    $this->db->order_by("laporan_pengaduan.id_pengaduan", "desc");

    return $this->db->get()->result_array();
  }

  function get_disposisi_valid($id_rj)
  {
    $this->db->select('*');

    $this->db->from('disposisi_pengaduan');

    $this->db->join('laporan_pengaduan', 'disposisi_pengaduan.id_pengaduan = laporan_pengaduan.id_pengaduan');
    $this->db->join('penduduk', 'laporan_pengaduan.id_pdk = penduduk.id_pdk');
    $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');

    $this->db->where('disposisi_pengaduan.status', 'belum');
    $this->db->where('laporan_pengaduan.status_pengaduan', 'valid');
    $this->db->where('disposisi_pengaduan.tujuan', $id_rj);
    $this->db->order_by("laporan_pengaduan.id_pengaduan", "desc");

    return $this->db->get()->result_array();
  }

  function get_disposisi_spam($id_rj)
  {
    $this->db->select('*');

    $this->db->from('disposisi_pengaduan');

    $this->db->join('laporan_pengaduan', 'disposisi_pengaduan.id_pengaduan = laporan_pengaduan.id_pengaduan');
    $this->db->join('penduduk', 'laporan_pengaduan.id_pdk = penduduk.id_pdk');
    $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');

    $this->db->where('disposisi_pengaduan.status', 'belum');
    $this->db->where('laporan_pengaduan.status_pengaduan', 'tidak valid');
    $this->db->where('disposisi_pengaduan.tujuan', $id_rj);
    $this->db->order_by("laporan_pengaduan.id_pengaduan", "desc");

    return $this->db->get()->result_array();
  }

  function get_disposisi_disposisi($id_rj)
  {
    $this->db->select('*');

    $this->db->from('disposisi_pengaduan');

    $this->db->join('laporan_pengaduan', 'disposisi_pengaduan.id_pengaduan = laporan_pengaduan.id_pengaduan');
    $this->db->join('penduduk', 'laporan_pengaduan.id_pdk = penduduk.id_pdk');
    $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');


    $this->db->where('disposisi_pengaduan.asal', $id_rj);
    $this->db->order_by("laporan_pengaduan.id_pengaduan", "desc");

    return $this->db->get()->result_array();
  }

  function get_disposisi_ok($id_rj)
  {
    $this->db->select('*');

    $this->db->from('disposisi_pengaduan');

    $this->db->join('laporan_pengaduan', 'disposisi_pengaduan.id_pengaduan = laporan_pengaduan.id_pengaduan');
    $this->db->join('penduduk', 'laporan_pengaduan.id_pdk = penduduk.id_pdk');
    $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');
    $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
    $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
    $this->db->join('rw', 'rt.id_rw = rw.id_rw');
    $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
    $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
    $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
    $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
    $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');

    $this->db->where('riwayat_alamat.stts_ra', 'aktif');
    $this->db->where('laporan_pengaduan.status_pengaduan !=', 'belum valid');
    $this->db->where('laporan_pengaduan.status_pengaduan !=', 'tidak valid');
    $this->db->where('disposisi_pengaduan.tujuan', $id_rj);
    $this->db->order_by("laporan_pengaduan.id_pengaduan", "desc");

    return $this->db->get()->result_array();
  }

  function get_disposisi_jabatan($jabatan, $field, $id)
  {
    $this->db->select('*');

    $this->db->from('disposisi_pengaduan');

    $this->db->join('laporan_pengaduan', 'disposisi_pengaduan.id_pengaduan = laporan_pengaduan.id_pengaduan');
    $this->db->join('penduduk', 'laporan_pengaduan.id_pdk = penduduk.id_pdk');
    $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');
    $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
    $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
    $this->db->join('rw', 'rt.id_rw = rw.id_rw');
    $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
    $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
    $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
    $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
    $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');


    $this->db->where('laporan_pengaduan.status_pengaduan !=', 'belum valid');
    $this->db->where('laporan_pengaduan.status_pengaduan !=', 'tidak valid');
    $this->db->where($jabatan.'.id_'.$field, $id);
    $this->db->order_by("laporan_pengaduan.id_pengaduan", "desc");

    return $this->db->get()->result_array();
  }

  function jumlah_baru($id_rj)
  {
    $this->db->select('COUNT(*) as jumlah');

    $this->db->from('disposisi_pengaduan');

    $this->db->join('laporan_pengaduan', 'disposisi_pengaduan.id_pengaduan = laporan_pengaduan.id_pengaduan');
    $this->db->join('penduduk', 'laporan_pengaduan.id_pdk = penduduk.id_pdk');
    $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');

    $this->db->where('disposisi_pengaduan.status', 'belum');
    $this->db->where('laporan_pengaduan.status_pengaduan', 'belum valid');
    $this->db->where('disposisi_pengaduan.tujuan', $id_rj);
    $this->db->order_by("laporan_pengaduan.id_pengaduan", "desc");

    return $this->db->get()->row_array();
  }

  function jumlah($id_rj)
  {
    $this->db->select('COUNT(*) as jumlah');

    $this->db->from('disposisi_pengaduan');

    $this->db->join('laporan_pengaduan', 'disposisi_pengaduan.id_pengaduan = laporan_pengaduan.id_pengaduan');
    $this->db->join('penduduk', 'laporan_pengaduan.id_pdk = penduduk.id_pdk');
    $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');

    $this->db->where('disposisi_pengaduan.status', 'belum');
    $this->db->where('laporan_pengaduan.status_pengaduan', 'valid');
    $this->db->where('disposisi_pengaduan.tujuan', $id_rj);
    $this->db->order_by("laporan_pengaduan.id_pengaduan", "desc");

    return $this->db->get()->row_array();
  }

  function ubah($params, $id_pengaduan, $tujuan)
  {
    $this->db->where('tujuan',$tujuan);
    $this->db->where('id_pengaduan',$id_pengaduan);
    $response = $this->db->update('disposisi_pengaduan',$params);
    if($response)
    {
        return "penduduk updated successfully";
    }
    else
    {
        return "Error occuring while updating penduduk";
    }
  }

  function get_info($field, $id_disposisi)
  {
    $this->db->select('*');

    $this->db->from('disposisi_pengaduan');

    $this->db->join('riwayat_jabatan', 'disposisi_pengaduan.'.$field.' = riwayat_jabatan.id_rj');
    $this->db->join('jabatan', 'riwayat_jabatan.id_j = jabatan.id_j');
    $this->db->join('penduduk', 'riwayat_jabatan.id_pdk = penduduk.id_pdk');
    $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
    $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
    $this->db->join('rw', 'rt.id_rw = rw.id_rw');
    $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
    $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
    $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
    $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
    $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');

    $this->db->where('riwayat_alamat.stts_ra', 'aktif');
    $this->db->where('disposisi_pengaduan.id_disposisi', $id_disposisi);
    return $this->db->get()->row_array();
  }

  function get_info_id_pengaduan($id_pengaduan)
  {
    $this->db->select('*');

    $this->db->from('disposisi_pengaduan');

    $this->db->join('riwayat_jabatan', 'disposisi_pengaduan.tujuan = riwayat_jabatan.id_rj');
    $this->db->join('jabatan', 'riwayat_jabatan.id_j = jabatan.id_j');

    $this->db->where('disposisi_pengaduan.id_pengaduan', $id_pengaduan);

    $tujuan = $this->session->userdata('admin');

    $this->db->where('disposisi_pengaduan.status', 'belum');
    $this->db->where('disposisi_pengaduan.tujuan', $tujuan['id_rj']);

    return $this->db->get()->row_array();
  }

  function get_disposisi_ok_all($id_kab)
  {
    $this->db->select('*');

    $this->db->from('laporan_pengaduan');


    $this->db->join('penduduk', 'laporan_pengaduan.id_pdk = penduduk.id_pdk');
    $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');
    $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
    $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
    $this->db->join('rw', 'rt.id_rw = rw.id_rw');
    $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
    $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
    $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
    $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
    $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');

    $this->db->where('riwayat_alamat.stts_ra', 'aktif');
    $this->db->where('laporan_pengaduan.status_pengaduan !=', 'belum valid');
    $this->db->where('laporan_pengaduan.status_pengaduan !=', 'tidak valid');
    $this->db->where('kabupaten.id_kab', $id_kab);

    $this->db->order_by("laporan_pengaduan.id_pengaduan", "desc");

    return $this->db->get()->result_array();
  }

  function get_last_disposisi($id_pengaduan)
  {

      $this->db->select('*');

      $this->db->from('disposisi_pengaduan');

      $this->db->join('riwayat_jabatan', 'disposisi_pengaduan.tujuan = riwayat_jabatan.id_rj');
      $this->db->join('jabatan', 'riwayat_jabatan.id_j = jabatan.id_j');
      $this->db->join('laporan_pengaduan', 'disposisi_pengaduan.id_pengaduan = laporan_pengaduan.id_pengaduan');
      $this->db->join('penduduk', 'riwayat_jabatan.id_pdk = penduduk.id_pdk');
      $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');
      $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
      $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
      $this->db->join('rw', 'rt.id_rw = rw.id_rw');
      $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
      $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
      $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
      $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
      $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');

      $this->db->where('riwayat_alamat.stts_ra', 'aktif');
      $this->db->where('laporan_pengaduan.status_pengaduan !=', 'belum valid');
      $this->db->where('laporan_pengaduan.status_pengaduan !=', 'tidak valid');
      $this->db->where('disposisi_pengaduan.id_pengaduan', $id_pengaduan);

      $this->db->order_by("disposisi_pengaduan.id_disposisi", "desc");

      $this->db->limit(1, 0);

      return $this->db->get()->row_array();

  }

  //SELECT * FROM `laporan_pengaduan` WHERE tanggal_pengaduan >= '20170701' AND tanggal_pengaduan < '20170801'

  public function get_by_bulan($id_kab, $bulan)
  {
    $this->db->select('*');

    $this->db->from('laporan_pengaduan');


    $this->db->join('penduduk', 'laporan_pengaduan.id_pdk = penduduk.id_pdk');
    $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');
    $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
    $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
    $this->db->join('rw', 'rt.id_rw = rw.id_rw');
    $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
    $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
    $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
    $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
    $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');

    $this->db->where('riwayat_alamat.stts_ra', 'aktif');
    $this->db->where('laporan_pengaduan.status_pengaduan !=', 'belum valid');
    $this->db->where('laporan_pengaduan.status_pengaduan !=', 'tidak valid');
    $this->db->where('kabupaten.id_kab', $id_kab);
    $this->db->where('laporan_pengaduan.tanggal_pengaduan >=', '2017'.sprintf("%02d", $bulan).'01');
    $this->db->where('laporan_pengaduan.tanggal_pengaduan <', '2017'.sprintf("%02d", $bulan+1).'01');

    $this->db->order_by("laporan_pengaduan.id_pengaduan", "desc");

    return $this->db->get()->result_array();
  }

  public function get_by_kategori($id_kab, $id_kategori)
  {
    $this->db->select('*');

    $this->db->from('laporan_pengaduan');


    $this->db->join('penduduk', 'laporan_pengaduan.id_pdk = penduduk.id_pdk');
    $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');
    $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
    $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
    $this->db->join('rw', 'rt.id_rw = rw.id_rw');
    $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
    $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
    $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
    $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
    $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');

    $this->db->where('riwayat_alamat.stts_ra', 'aktif');
    $this->db->where('laporan_pengaduan.status_pengaduan !=', 'belum valid');
    $this->db->where('laporan_pengaduan.status_pengaduan !=', 'tidak valid');
    $this->db->where('kabupaten.id_kab', $id_kab);
    $this->db->where('laporan_pengaduan.id_kategori', $id_kategori);

    $this->db->order_by("laporan_pengaduan.id_pengaduan", "desc");

    return $this->db->get()->result_array();
  }
  
  function get_disposisi_ok_all_ex($id_kab)
  {
    $this->db->select('*');

    $this->db->from('laporan_pengaduan');


    $this->db->join('penduduk', 'laporan_pengaduan.id_pdk = penduduk.id_pdk');
    $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');
    $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
    $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
    $this->db->join('rw', 'rt.id_rw = rw.id_rw');
    $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
    $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
    $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
    $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
    $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');

    $this->db->where('riwayat_alamat.stts_ra', 'aktif');
    $this->db->where('laporan_pengaduan.status_pengaduan !=', 'belum valid');
    $this->db->where('laporan_pengaduan.status_pengaduan !=', 'tidak valid');
    $this->db->where('kabupaten.id_kab', $id_kab);

    $this->db->order_by("laporan_pengaduan.id_pengaduan", "desc");

    return $this->db->get()->result();
  }

}


?>
