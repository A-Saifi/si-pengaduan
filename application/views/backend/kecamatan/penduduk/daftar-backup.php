<section class="content">
  <div class="row">
    <div class="col-md-12">

      <?php foreach ($rt as $i): ?>
        <div class="box">
          <div class="box-header">
            <i class="fa fa-home"></i>
            <h3 class="box-title">RT<?= $i['nama_rt'] ?>/RW<?= $i['nama_rw'] ?></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="tabel" class="table table-bordered table-hover">
              <thead>
              <tr>
            		<th>NIK</th>
            		<th>Nama</th>
            		<th>Gender</th>
            		<th>Tempat Lahir</th>
            		<th>Tanggal Lahir</th>
            		<th>Pendidikan</th>
                <th>Pekerjaan</th>
            		<th>Operasi</th>
              </tr>
              </thead>
              <tbody>

                <?php foreach($daftar_penduduk[$i['id_rt']] as $p){ ?>

                  <?php $this->view('backend/rt/penduduk/detail', ['data' => $p,]) ?>

                  <tr>

              		<td><?php echo $p['nik_pdk']; ?></td>
              		<td><?php echo $p['nama_pdk']; ?></td>
              		<td><?php echo $p['jk_pdk']; ?></td>
              		<td><?php echo $p['tmp_lahir_pdk']; ?></td>
              		<td><?php echo $p['tgl_lahir_pdk']; ?></td>
              		<td><?php echo $p['pendidikan_pdk']; ?></td>
              		<td><?php echo $p['pekerjaan_pdk']; ?></td>

              		<td>
                        <a class="btn btn-block btn-success btn-xs" data-toggle="modal" data-target="#<?= $p['nik_pdk'] ?>"> Detail</a>
                      </td>
                  </tr>
              	<?php } ?>

              </tbody>
              <!-- <tfoot>
              <tr>
                <th>NIK</th>
            		<th>Nama</th>
            		<th>Gender</th>
            		<th>Tempat Lahir</th>
            		<th>Tanggal Lahir</th>
            		<th>Pendidikan</th>
                <th>Pekerjaan</th>
            		<th>Operasi</th>
              </tr>
              </tfoot> -->
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      <?php endforeach; ?>

    </div>
  </div>
</section>
