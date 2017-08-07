          <div class="box box-danger">
            <div class="box-header  ">
              <h3 class="box-title">Cari Penduduk</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <?= form_open(base_url('admin/rt/cari/penduduk')); ?>
                <div class="col-xs-6">
                  <input type="text" class="form-control" placeholder="Masukan keyword..." name="keyword">
                </div>
                <div class="col-xs-4">
                  <select class="form-control" name="kategori">
                    <option value="nama">Nama Penduduk</option>
                    <option value="nik">NIK Penduduk</option>
                  </select>
                </div>
                <div class="col-xs-2">
                  <button type="submit" class="btn btn-info btn-block">Cari</button>
                </div>
                <?= form_close(); ?>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
