<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">

        </div>
        <div class="box-body">
          <?php if ($disposisi!=null): ?>
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th style="10%">No. </th>
                <th>Judul Pengaduan</th>
            		<th>Kategori Pengaduan</th>
            		<th>Waktu Disposisi</th>
                <th>Kepada</th>
            		<th>Catatan</th>
            		<th>Operasi</th>
              </tr>
              </thead>
              <tbody>
            <?php $no=0;
              foreach($disposisi as $p){ ?>

              <tr>
              <td><?= $no+=1; ?></td>
          		<td><?= ucwords(strtolower($p['judul_pengaduan'])) ?></td>
          		<td><?= ucwords(strtolower($p['nama_kategori']))  ?></td>
          		<td><?= date('G:i:s - d M y', strtotime($p['tanggal_disposisi'].' '.$p['waktu_disposisi'])) ?></td>
              <td>
                <?php $jabatan = $this->load_data_admin->show_jabatan('tujuan', $p['id_disposisi']);
                $this->view('backend/show_jabatan/modal', ['p' => $p, 'jabatan' => $jabatan]);
                ?>
              </td>
          		<td><?= $p['catatan_disposisi']; ?></td>

          		<td>
                      <a class="btn btn-block btn-success btn-xs" href="<?= base_url('admin/rw/pengaduan/detail/').$p['id_pengaduan'] ?>">Detail</a>
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
                Tidak ada pengaduan di daftar <?= strtolower($header) ?>.
              </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
