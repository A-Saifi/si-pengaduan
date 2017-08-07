<section class="content">
  <div class="row">
    <div class="col-md-12">


        <div class="box">
          <div class="box-header">
            <i class="fa fa-users"></i>
            <!-- <a href="<?= base_url('admin/admin/pengguna/save_download')  ?>" class="btn btn-info pull-right">Cetak</a> -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
            		<th>NIK</th>
            		<th>Nama</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Akhir</th>
                <th>Alamat</th>
                <th>Jabatan</th>
                <th>Operasi</th>

              </tr>
              </thead>
              <tbody>

                <?php foreach($pengguna as $p){ ?>

                  <?php $this->view('backend/admin/pengguna/detail', ['data' => $p,]) ?>

                  <tr>

              		<td><?php echo $p['nik_pdk']; ?></td>
              		<td><a href="#" data-toggle="modal" data-target="#<?= $p['id_pdk'] ?>"><?php echo ucwords(strtolower($p['nama_pdk'])); ?></a></td>
                  <td><?php echo date('d M Y', strtotime($p['tgl_mulai_rj'])); ?></td>
                  <td><?php echo date('d M Y', strtotime($p['tgl_akhir_rj'])); ?></td>
                  <td>RT<?php echo $p['nama_rt']; ?> /
              		RW<?php echo $p['nama_rw']; ?>
                  <?php echo $p['nama_dusun']; ?>,
                  <?php echo $p['nama_kel']; ?>, Kecamatan
                  <?php echo $p['nama_kec']; ?>
              		</td>
                  <td><?php
                  switch ($p['nama_j']) {
                    case 'rt':
                      echo "Ketua RT";
                    break;
                    case 'rw':
                      echo "Ketua RW";
                    break;
                    case 'kelurahan':
                      echo "Petugas Kelurahan";
                    break;
                    case 'kecamatan':
                      echo "Petugas Kecamatan";
                    break;
                    case 'kabupaten':
                      echo "Petugas Kabupaten";
                    break;
                    case 'admin':
                      echo "Administrator";
                    break;

                    default:
                      echo "Masyarakat";
                      break;
                  }
                  ?></td>
                  <td><a href="<?= base_url('admin/admin/jabatan/nonaktif/'.$p['id_rj'])  ?>" class="btn btn-danger">Nonaktifkan</a></td>

                  </tr>
              	<?php } ?>

              </tbody>

            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </div>
  </div>
</section>
