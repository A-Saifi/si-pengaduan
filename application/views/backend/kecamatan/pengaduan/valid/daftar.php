
<section class="content">
  <div class="row">
    <div class="col-md-12">
  <div class="box">
    <div class="box-header">

    </div>
    <!-- /.box-header -->
    <div class="box-body">

          <?php if ($pengaduan!=null): ?>
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th style="10%">No. </th>

            		<th>Kategori Pengaduan</th>
            		<th>Judul Pengaduan</th>
            		<th>Waktu Pengaduan</th>
                <th>Pengaduan Masuk</th>
                <th>catatan</th>
                <th>Dari</th>
            		<th>Operasi</th>


              </tr>
              </thead>
              <tbody>
            <?php $no=0;
              foreach($pengaduan as $p){ ?>



              <tr>
              <td><?= $no+=1; ?></td>

          		<td><?= ucwords(strtolower($p['nama_kategori']))  ?></td>
              <td><?= ucwords(strtolower($p['judul_pengaduan'])) ?></td>
          		<td><?= date('G:i:s - d M Y', strtotime($p['waktu_pengaduan'].' '.$p['tanggal_pengaduan'])) ?></td>
              <td><?= date('G:i:s - d M y', strtotime($p['tanggal_disposisi'].' '.$p['waktu_disposisi'])) ?></td>
              <td><?= $p['catatan_disposisi'] ?></td>
              <td>
                <?php $jabatan = $this->load_data_admin->show_jabatan('asal', $p['id_disposisi']);
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
              </td>

          		<td>
                      <a class="btn btn-block btn-success btn-xs" href="<?= base_url('admin/kecamatan/pengaduan/detail/').$p['id_pengaduan'] ?>">Detail</a>
                  </td>
              </tr>
          	<?php } ?>
          </tbody>
          <!-- <tfoot>
          <tr>
            <th style="10%">No. </th>
            <th>Nama</th>
            <th>Kategori Pengaduan</th>
            <th>Judul Pengaduan</th>
            <th>Waktu Pengaduan</th>
            <th>Catatan</th>
            <th>Operasi</th>
          </tr>
          </tfoot> -->
        </table>
          <?php else: ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                Tidak ada pengaduan di <?= strtolower($header) ?>.
              </div>
          <?php endif; ?>

    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->


    </div>
  </div>
</section>
