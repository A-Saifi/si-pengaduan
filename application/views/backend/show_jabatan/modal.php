<?php
echo '<div class="modal fade" id="'.$p['id_pengaduan'].'" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Nama : '.ucwords(strtolower($jabatan['nama_pdk'])).'</h4>
            </div>
            <div class="modal-body">
              <p>'.'RT-'.ucwords(strtolower($jabatan['nama_rt'])).
                  ' / RW-'.ucwords(strtolower($jabatan['nama_rw'])).
                  ', '.ucwords(strtolower($jabatan['nama_dusun'])).
                  ', Kelurahan '.ucwords(strtolower($jabatan['nama_kel'])).
                  ', Kecamatan '.ucwords(strtolower($jabatan['nama_kec'])).
                  ', Kabupaten '.ucwords(strtolower($jabatan['nama_kab'])).
                  ', '.ucwords(strtolower($jabatan['nama_prov'])).'</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
          </div>

        </div>
      </div>';

switch ($jabatan['nama_j']) {
  case 'rt':
    echo '<button type="button" class="btn btn-block btn-success btn-xs" data-toggle="modal" data-target="#'.$p['id_pengaduan'].'">Ketua RT</button>';
  break;
  case 'rw':
    echo '<button type="button" class="btn btn-block btn-success btn-xs" data-toggle="modal" data-target="#'.$p['id_pengaduan'].'">Ketua RW</button>';
  break;
  case 'kelurahan':
    echo '<button type="button" class="btn btn-block btn-success btn-xs" data-toggle="modal" data-target="#'.$p['id_pengaduan'].'">Petugas Kelurahan</button>';
  break;
  case 'kecamatan':
    echo '<button type="button" class="btn btn-block btn-success btn-xs" data-toggle="modal" data-target="#'.$p['id_pengaduan'].'">Petugas Kecamatan</button>';
  break;
  case 'kabupaten':
    echo '<button type="button" class="btn btn-block btn-success btn-xs" data-toggle="modal" data-target="#'.$p['id_pengaduan'].'">Petugas Kabupaten</button>';
  break;

  default:
    # code...
    break;
}
 ?>
