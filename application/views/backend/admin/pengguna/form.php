<div id="<?= $data['id_pdk'].'111'  ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?= ucwords(strtolower($data['nama_pdk'])) ?> Diangkat Sebagai</h4>
        <h4><small>RT<?php echo $data['nama_rt']; ?> /
        RW<?php echo $data['nama_rw']; ?>
        <?php echo $data['nama_dusun']; ?>,
        <?php echo $data['nama_kel']; ?>, Kecamatan
        <?php echo $data['nama_kec']; ?></small></h4>
      </div>
      <form role="form" action="<?= base_url('admin/admin/jabatan/angkat/'.$data['id_pdk'].'.html') ?>" method="get" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label>Tanggal Mulai</label>
            <input type="date" class="form-control" name="mulai" required>
          </div>
          <div class="form-group">
            <label>Tanggal Akhir</label>
            <input type="date" class="form-control" name="akhir" required>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Jabatan</label>
            <select class="form-control" name="jabatan">
                    <option value="1">Ketua RT <?= $data['nama_rt'].'/'.$data['nama_rw'] ?></option>
                    <option value="2">Ketua RW <?= $data['nama_rw'].', '.$data['nama_dusun'] ?></option>
                    <option value="3">Petugas Kelurahan <?= $data['nama_kel']  ?></option>
                    <option value="4">Petugas Kecamatan <?= $data['nama_kec']  ?></option>
                    <option value="5">Petugas Kabupaten <?= $data['nama_kab']  ?></option>
            </select>
            <p class="help-block">Pilih jabatan yang akan dijabat.</p>
          </div>

        </div>
        <!-- /.box-body -->

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin ingin mengangkat penduduk ini?');">Submit</button>
        </div>
      </form>
    </div>

  </div>
</div>
