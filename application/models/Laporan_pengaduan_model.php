<?php
class Laporan_pengaduan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function laporan_pengaduan_lengkap($page)
    {
      $this->db->select('*');

      $this->db->from('laporan_pengaduan');

      $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');
      $this->db->join('penduduk', 'laporan_pengaduan.id_pdk = penduduk.id_pdk');

      // $offset = 0;
      // $limit = 5 * $page;
      // $this->db->limit($limit, $offset);


      $this->db->order_by("laporan_pengaduan.id_pengaduan", "desc");

      return $this->db->get()->result_array();
    }

    function laporan_pengaduan_home()
    {
      $this->db->select('*');

      $this->db->from('laporan_pengaduan');

      $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');
      $this->db->join('penduduk', 'laporan_pengaduan.id_pdk = penduduk.id_pdk');

      // $offset = 0;
      // $limit = 5 * $page;
      // $this->db->limit($limit, $offset);
      $this->db->where("(laporan_pengaduan.status_pengaduan='valid' OR laporan_pengaduan.status_pengaduan='ok')", NULL, FALSE);
      $this->db->order_by("laporan_pengaduan.id_pengaduan", "desc");

      return $this->db->get()->result_array();
    }

    function laporan_pengaduan_berdasarkan($kelurahan, $kategori, $bulan, $tahun)
    {
      $this->db->select('*, laporan_pengaduan.LAT as LAT1, laporan_pengaduan.LNG as LNG1,');

      $this->db->from('laporan_pengaduan');

      $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');
      $this->db->join('penduduk', 'laporan_pengaduan.id_pdk = penduduk.id_pdk');
      $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
      $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
      $this->db->join('rw', 'rt.id_rw = rw.id_rw');
      $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
      $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
      $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
      $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
      $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');
      // $offset = 0;
      // $limit = 5 * $page;
      // $this->db->limit($limit, $offset);
      if ($kelurahan!='all') {
        $this->db->where('kelurahan.id_kel', $kelurahan);
      }
      if ($kategori!='all') {
        $this->db->where('kategori_pengaduan.id_kategori', $kategori);
      }
      if ($bulan!='all') {
        $this->db->where('laporan_pengaduan.tanggal_pengaduan >=', $tahun.''.sprintf("%02d", $bulan).'01');
        $this->db->where('laporan_pengaduan.tanggal_pengaduan <', $tahun.''.sprintf("%02d", $bulan+1).'01');
      }else {
        $this->db->where('laporan_pengaduan.tanggal_pengaduan >=', $tahun.'0101');
        $this->db->where('laporan_pengaduan.tanggal_pengaduan <', $tahun.'1201');
      }
      $this->db->where("(laporan_pengaduan.status_pengaduan='valid' OR laporan_pengaduan.status_pengaduan='ok')", NULL, FALSE);

      return $this->db->get()->result_array();
    }

    function laporan_pengaduan_penduduk($id)
    {
      $this->db->select('*');

      $this->db->from('laporan_pengaduan');

      $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');
      $this->db->join('penduduk', 'laporan_pengaduan.id_pdk = penduduk.id_pdk');

      // $offset = 0;
      // $limit = 5 * $page;
      // $this->db->limit($limit, $offset);

      $this->db->where('laporan_pengaduan.id_pdk', $id);

      $this->db->order_by("laporan_pengaduan.id_pengaduan", "desc");

      return $this->db->get()->result_array();
    }

    function get_pengaduan($waktu, $tanggal)
    {
        return $this->db->get_where('laporan_pengaduan',array('waktu_pengaduan'=>$waktu, 'tanggal_pengaduan'=>$tanggal))->row_array();
    }

    function detail($id)
    {
      $this->db->select('*');

      $this->db->from('laporan_pengaduan');

      $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');
      $this->db->join('penduduk', 'laporan_pengaduan.id_pdk = penduduk.id_pdk');
      

      $this->db->where('laporan_pengaduan.id_pengaduan', $id);

      return $this->db->get()->row_array();
    }

    /*
     * Get laporan_pengaduan by id_pengaduan
     */
    function get_laporan_pengaduan($id_pengaduan)
    {
        return $this->db->get_where('laporan_pengaduan',array('id_pengaduan'=>$id_pengaduan))->row_array();
    }

    /*
     * Get all laporan_pengaduan
     */
    function get_all_laporan_pengaduan()
    {
        return $this->db->get('laporan_pengaduan')->result_array();
    }

    /*
     * function to add new laporan_pengaduan
     */
    function add_laporan_pengaduan($params)
    {
        $this->db->insert('laporan_pengaduan',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update laporan_pengaduan
     */
    function update_laporan_pengaduan($id_pengaduan,$params)
    {
        $this->db->where('id_pengaduan',$id_pengaduan);
        $response = $this->db->update('laporan_pengaduan',$params);
        if($response)
        {
            return "laporan_pengaduan updated successfully";
        }
        else
        {
            return "Error occuring while updating laporan_pengaduan";
        }
    }

    /*
     * function to delete laporan_pengaduan
     */
    function delete_laporan_pengaduan($id_pengaduan)
    {
        $response = $this->db->delete('laporan_pengaduan',array('id_pengaduan'=>$id_pengaduan));
        if($response)
        {
            return "laporan_pengaduan deleted successfully";
        }
        else
        {
            return "Error occuring while deleting laporan_pengaduan";
        }
    }

    function search($keyword)
    {
      $this->db->select('*');

      $this->db->from('laporan_pengaduan');

      $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');
      $this->db->join('penduduk', 'laporan_pengaduan.id_pdk = penduduk.id_pdk');

      $this->db->like('laporan_pengaduan.isi_pengaduan', $keyword);
      $this->db->where('laporan_pengaduan.status_pengaduan', 'valid');
      $this->db->order_by("laporan_pengaduan.id_pengaduan", "desc");

      return $this->db->get()->result_array();
    }

    function ok($params, $id_pengaduan)
    {
      $this->db->where('id_pengaduan',$id_pengaduan);
      $response = $this->db->update('laporan_pengaduan',$params);
      if($response)
      {
          return "penduduk updated successfully";
      }
      else
      {
          return "Error occuring while updating penduduk";
      }
    }

    function get_laporan_by_kategori($id_kategori)
    {
      $this->db->select('*');

      $this->db->from('laporan_pengaduan');

      $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');
      $this->db->join('penduduk', 'laporan_pengaduan.id_pdk = penduduk.id_pdk');

      // $offset = 0;
      // $limit = 5 * $page;
      // $this->db->limit($limit, $offset);
      $this->db->where('laporan_pengaduan.id_kategori', $id_kategori);
      $this->db->where("(laporan_pengaduan.status_pengaduan='valid' OR laporan_pengaduan.status_pengaduan='ok')", NULL, FALSE);
      $this->db->order_by("laporan_pengaduan.id_pengaduan", "desc");

      return $this->db->get()->result_array();
    }

    function laporan_pengaduan_sekitar($lokasi)
    {
      $this->db->select('*');

      $this->db->from('laporan_pengaduan');

      $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');
      $this->db->join('penduduk', 'laporan_pengaduan.id_pdk = penduduk.id_pdk');
      $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
      $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
      $this->db->join('rw', 'rt.id_rw = rw.id_rw');
      $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
      $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
      $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
      $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
      $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');

      // $offset = 0;
      // $limit = 5 * $page;
      // $this->db->limit($limit, $offset);
      $this->db->where('riwayat_alamat.stts_ra', 'aktif');
      $this->db->where('kelurahan.id_kel', $lokasi['id_kel']);
      $this->db->where("(laporan_pengaduan.status_pengaduan='valid' OR laporan_pengaduan.status_pengaduan='ok')", NULL, FALSE);
      $this->db->order_by("laporan_pengaduan.id_pengaduan", "desc");

      return $this->db->get()->result_array();
    }

    function laporan_pengaduan_sekitar_kategori($lokasi, $id_kategori)
    {
      $this->db->select('*');

      $this->db->from('laporan_pengaduan');

      $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');
      $this->db->join('penduduk', 'laporan_pengaduan.id_pdk = penduduk.id_pdk');
      $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
      $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
      $this->db->join('rw', 'rt.id_rw = rw.id_rw');
      $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
      $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
      $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
      $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
      $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');

      // $offset = 0;
      // $limit = 5 * $page;
      // $this->db->limit($limit, $offset);
      $this->db->where('laporan_pengaduan.id_kategori', $id_kategori);
      $this->db->where('riwayat_alamat.stts_ra', 'aktif');
      $this->db->where('kelurahan.id_kel', $lokasi['id_kel']);
      $this->db->where("(laporan_pengaduan.status_pengaduan='valid' OR laporan_pengaduan.status_pengaduan='ok')", NULL, FALSE);
      $this->db->order_by("laporan_pengaduan.id_pengaduan", "desc");

      return $this->db->get()->result_array();
    }

    function laporan_pengaduan_kecamatan($lokasi)
    {
      $this->db->select('*');

      $this->db->from('laporan_pengaduan');

      $this->db->join('kategori_pengaduan', 'laporan_pengaduan.id_kategori = kategori_pengaduan.id_kategori');
      $this->db->join('penduduk', 'laporan_pengaduan.id_pdk = penduduk.id_pdk');
      $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
      $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
      $this->db->join('rw', 'rt.id_rw = rw.id_rw');
      $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
      $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');
      $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
      $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
      $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov');

      // $offset = 0;
      // $limit = 5 * $page;
      // $this->db->limit($limit, $offset);
      $this->db->where('riwayat_alamat.stts_ra', 'aktif');
      $this->db->where('kecamatan.id_kec', $lokasi['id_kec']);
      $this->db->where("(laporan_pengaduan.status_pengaduan='valid' OR laporan_pengaduan.status_pengaduan='ok')", NULL, FALSE);
      $this->db->order_by("laporan_pengaduan.id_pengaduan", "desc");

      return $this->db->get()->result_array();
    }

}
