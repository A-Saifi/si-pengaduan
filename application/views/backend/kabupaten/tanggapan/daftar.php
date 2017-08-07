<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">

        </div>
        <div class="box-body">
          <?php if ($tanggapan!=null): ?>
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
            		<th style="width: 5%">No.</th>
                <th>Judul Pengaduan</th>
                <th>Waktu</th>
                <th>Tanggal</th>
                <th>Isi Tanggapan</th>
                <th class="text-center">Operasi</th>
              </tr>
              </thead>
              <tbody>

                <?php foreach($tanggapan as $tanggapan){ ?>

                  <?php $this->view('backend/kabupaten/tanggapan/form_edit', ['tanggapan' => $tanggapan,]) ?>
                  <tr>

              		<td><?= $no+=1; ?></td>
                  <td><?= $tanggapan['judul_pengaduan']  ?></td>
                  <td><?= $tanggapan['waktu_tanggapan']  ?></td>
                  <td><?= date('d M Y', strtotime($tanggapan['tanggal_tanggapan']))  ?></td>
                  <td><?= $tanggapan['isi_tanggapan']  ?></td>
                  <td>
                    <center>
                      <a href="<?= base_url().'admin/kabupaten/tanggapan/hapus/'.$tanggapan['id_pengaduan'].'/'.$tanggapan['id_tanggapan']  ?>" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="" data-original-title="Menghapus Tanggapan" onclick="return confirm('Yakin ingin menghapus tanggapan ini?');">
                      <i class="fa fa-trash-o"></i> Hapus</a>
                      <a href="#" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#<?= $tanggapan['id_tanggapan']  ?>">
                      <i class="fa fa-edit"></i> Edit</a>
                      <a href="<?= base_url().'admin/kabupaten/pengaduan/detail/'.$tanggapan['id_pengaduan']  ?>" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" title="" data-original-title="Detail Tanggapan">
                      <i class="fa fa-file-text-o"></i> Detail</a>
                    </center>
                  </td>
                  </tr>
              	<?php } ?>

              </tbody>
            </table>
          <?php else: ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                Tidak ada tanggapan di daftar <?= strtolower($header) ?>.
            </div>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</div>
