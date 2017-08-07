<?php $this->view('backend/kategori/modal_form') ?>
<style media="screen">
  th.dt-center, td.dt-center { text-align: center; }
</style>
<div class="box">
  <div class="box-header">
    <i class="fa fa-tags"></i>
    <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalform">Tambah Kategori</a>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-hover">
      <thead>
      <tr>
        <th>No.</th>
        <th>Nama Kategori</th>
        <th>Keterangan</th>
        <th>Gambar</th>
        <?php if ($this->cek_jabatan->jabatan()=='kabupaten'): ?>
          <th>Operasi</th>
        <?php endif; ?>
      </tr>
      </thead>
      <tbody>
        <?php $no=0; ?>
        <?php foreach($kategori as $k){ ?>
          <?php $this->view('backend/kategori/gambar', ['kategori' => $k]) ?>
          <tr>
            <td class="dt-center"><?= $no+=1 ?></td>
            <td><?= $k['nama_kategori']  ?></td>
            <td><?= $k['keterangan_kategori']  ?></td>
            <td class="dt-center"><button type="button" class="btn btn-block btn-success btn-xs" data-toggle="modal" data-target="#<?= $k['id_kategori']  ?>">Lihat</button></td>
            <?php if ($this->cek_jabatan->jabatan()=='kabupaten'): ?>
              <td style="text-align: center;">
                <?php if ($k['status']=='N'): ?>
                    <a href="<?= base_url('admin/kategori/setujui/'.$k['id_kategori'])  ?>" class="btn btn-primary" onclick="return confirm('Yakin ingin menyetujui kategori ini?');">Konfirmasi</a>
                    <a href="<?= base_url('admin/kategori/hapus/'.$k['id_kategori'])  ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus kategori ini?');">Hapus</a>
                <?php endif; ?>
              </td>
            <?php endif; ?>
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
