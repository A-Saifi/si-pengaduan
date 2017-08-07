<div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Pengajuan</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="<?= base_url('admin/kategori/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" class="form-control" placeholder="Masukan nama kategori" name="nama" required>
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" rows="3" placeholder="Masukan keterangan ..." name="keterangan"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Gambar</label>
            <input type="file" name="gambar">
            <p class="help-block">Pilih gambar yang nantinya dijadikan icon untuk kategori pengaduan.</p>
          </div>

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin ingin menambahkan kategori ini?');">Submit</button>
        </div>
      </form>
    </div>
