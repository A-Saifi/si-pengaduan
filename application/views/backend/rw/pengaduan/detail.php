<div class="content">
  <div class="row">

    <?php if (!$this->load_data_admin->cek_disposisi($pengaduan['id_pengaduan'])): ?>
      <div class="col-md-12">
        <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Informasi!</h4>
                Pengaduan ini telah di disposisi.
              </div>
      </div>
    <?php endif; ?>

    <div class="col-md-6">

      <?php $this->view('backend/rt/penduduk/detail', ['data' => array_merge($pengaduan, $alamat)]) ?>

      <div class="box box-default">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="<?= base_url() ?>assets/image/avatars/users/<?= $this->badge->avatar($pengaduan['id_pdk']) ?>" alt="User Image">
                <span class="username"><a href="" data-toggle="modal" data-target="#<?= $pengaduan['nik_pdk'] ?>"><?= ucwords(strtolower($pengaduan['nama_pdk']))  ?></a></span>
                <span class="description"><?= ucwords(strtolower($pengaduan['nama_kategori']))  ?> - <?= $this->waktu->elapsedTime(strtotime($pengaduan['tanggal_pengaduan'].' '.$pengaduan['waktu_pengaduan'])); ?> yang lalu</span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <?php if ($pengaduan['status_pengaduan']=='belum valid'): ?>
                  <a href="<?= base_url('admin/rt/spam/pengaduan/'.$pengaduan['id_pengaduan'])  ?>" type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" title="" data-original-title="Tandai sebagai spam" onclick="return confirm('Yakin ingin menandai pengaduan ini sebagai spam?');">
                  <i class="fa fa-trash-o"></i> Spam</a>
                    &nbsp; &nbsp;
                  <a href="<?= base_url('admin/rt/validasi/pengaduan/'.$pengaduan['id_pengaduan'])  ?>" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" title="" data-original-title="Menyatakan bahwa pengaduan ini benar" onclick="return confirm('Yakin ingin memvalidasi pengaduan ini?');">
                  <i class="fa fa-check"></i> Validasi</a>
                <?php endif; ?>
                <?php if ($pengaduan['status_pengaduan']=='valid' && $this->load_data_admin->cek_disposisi($pengaduan['id_pengaduan'])): ?>

                  <div class="modal fade" id="disposisi" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Akan Didisposisikan Kepada Siapa ?</h4>
                        </div>
                        <?= form_open(base_url('admin/rw/disposisi/pengaduan/'.$pengaduan['id_pengaduan']));  ?>
                        <div class="modal-body">
                          <div class="form-group">
                            <label>Kepada : </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="jabatan" id="optionsRadios1" value="kelurahan">
                                Petugas Kelurahan
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="jabatan" id="optionsRadios1" value="kecamatan">
                                Petugas Kecamatan
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="jabatan" id="optionsRadios1" value="kabupaten">
                                Petugas Kabupaten
                              </label>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Catatan</label>
                            <textarea class="form-control" rows="3" placeholder="Beri catatan ..." name="catatan"></textarea>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="submit" class="btn btn-danger pull-left" data-dismiss="modal">Batalkan</button>
                          <button type="submit" class="btn btn-primary" >Kirim</button>
                        </div>
                        <?= form_close();  ?>
                      </div>

                    </div>
                  </div>

                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#disposisi">
                  <i class="fa fa-arrow-circle-up"></i> Disposisi</button>
                    &nbsp; &nbsp;
                  <!-- <a href="<?= base_url('admin/rt/validasi/urungkan/'.$pengaduan['id_pengaduan'])  ?>" type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" title="" data-original-title="Urungkan untuk mengembalikan pengaduan" onclick="return confirm('Yakin ingin mengembalikan pengaduan ini?');">
                  <i class="fa fa-retweet"></i> Urungkan</a> -->
                <?php endif; ?>
                <?php if ($pengaduan['status_pengaduan']=='tidak valid'): ?>
                  <a href="<?= base_url('admin/rt/spam/urungkan/'.$pengaduan['id_pengaduan'])  ?>" type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" title="" data-original-title="Urungkan untuk mengembalikan pengaduan" onclick="return confirm('Yakin ingin mengembalikan pengaduan ini?');">
                  <i class="fa fa-retweet"></i> Urungkan</a>
                <?php endif; ?>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- post text -->
              <p><b><?= ucwords(strtolower($pengaduan['judul_pengaduan']))  ?></b></p>

              <p><?= $pengaduan['isi_pengaduan'] ?></p>

              <?php if ($gambar!=null): ?>
                <?php $this->view('backend/rw/pengaduan/foto', ['gambar' => $gambar]); ?>
              <?php endif; ?>

              <!-- Social sharing buttons -->
              <!-- <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button> -->
              <span class="pull-right text-muted"><?= $jumlah  ?> komentar</span>
            </div>
            <!-- /.box-body -->
            <?php if ($komentar!=null): ?>
              <?php $this->view('backend/rw/pengaduan/komentar', ['komentar' => $komentar,]); ?>
            <?php endif; ?>
            <!-- /.box-footer -->
            <!-- <div class="box-footer">
              <form action="#" method="post">
                <img class="img-responsive img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="Alt Text">

                <div class="img-push">
                  <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                </div>
              </form>
            </div> -->
            <!-- /.box-footer -->
          </div>
    </div>
    <?php if ($pengaduan['status_pengaduan']=='valid' || $pengaduan['status_pengaduan']=='ok'): ?>
    <div class="col-md-6">


            <?php if ($this->load_data_admin->cek_tanggapan_rt($pengaduan['id_pengaduan'], $userdata['id_rj']) && $this->load_data_admin->cek_status_disposisi($pengaduan['id_pengaduan'])): ?>
              <?php $this->view('backend/rw/pengaduan/valid/form_klarifikasi', ['pengaduan' => $pengaduan]) ?>
            <?php endif; ?>


            <?php if ($this->load_data_admin->load_tanggapan($pengaduan['id_pengaduan'])!=null): ?>
              <?php $this->view('backend/rw/pengaduan/tanggapan', ['tanggapan' => $this->load_data_admin->load_tanggapan($pengaduan['id_pengaduan'])]); ?>
            <?php endif; ?>


    </div>
  <?php endif; ?>
    <div class="col-md-6">
      <?php $this->view('backend/rw/pengaduan/lokasi', ['pengaduan' => $pengaduan]) ?>
    </div>
  </div>
</div>
