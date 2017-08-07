
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
            		<th>Nama</th>
            		<th>Kategori Pengaduan</th>
            		<th>Judul Pengaduan</th>
            		<th>Waktu Pengaduan</th>
            		<th>Alamat</th>
            		<th>Operasi</th>
              </tr>
              </thead>
              <tbody>
            <?php $no=0;
              foreach($pengaduan as $p){ ?>



              <tr>
              <td><?= $no+=1; ?></td>
          		<td><?= ucwords(strtolower($p['nama_pdk'])) ?></td>
          		<td><?= ucwords(strtolower($p['nama_kategori']))  ?></td>
              <td><?= ucwords(strtolower($p['judul_pengaduan'])) ?></td>
          		<td><?= date('G:i:s - d M y', strtotime($p['tanggal_pengaduan'].' '.$p['waktu_pengaduan'])) ?></td>
          		<td><?= 'RT'.$p['nama_rt'].'/RW'.$p['nama_rw']; ?></td>

          		<td>
                <a class="btn btn-block btn-success btn-xs" href="<?= base_url('admin/kelurahan/pengaduan/detail/').$p['id_pengaduan'] ?>">Detail</a>
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
