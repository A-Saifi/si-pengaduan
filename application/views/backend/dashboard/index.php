
<div class="content">
  <div class="row">

        <?php if ($this->cek_jabatan->jabatan()=='rt'): ?>
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?= count($jumlah_baru)  ?></h3>

                <p>Pengaduan Baru</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-paper-outline"></i>
              </div>
              <a href="<?= base_url('admin/'.$this->cek_jabatan->jabatan().'/pengaduan') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php endif; ?>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php $jumlah = $this->badge->pengaduan($userdata['id_rj']); echo $jumlah['jumlah']; ?></h3>

              <p>Pengaduan Masuk</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-paper-outline"></i>
            </div>
            <a href="<?= base_url('admin/'.$this->cek_jabatan->jabatan().'/pengaduan/valid') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= count($jumlah_pengaduan) ?><sup style="font-size: 20px"></sup></h3>

              <p>Daftar Pengaduan</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-paper-outline"></i>
            </div>
            <a href="<?= base_url('admin/'.$this->cek_jabatan->jabatan().'/pengaduan/daftar') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $jumlah_penduduk  ?></pre></h3>

              <p>Penduduk</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="<?= base_url('admin/'.$this->cek_jabatan->jabatan().'/penduduk') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <?php if ($this->cek_jabatan->jabatan()!='rt'): ?>
          <?php if ($this->cek_jabatan->jabatan()=='kabupaten'): ?>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?= count($jumlah_semua) ?></h3>

                  <p>Semua Pengaduan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-folder"></i>
                </div>

                <a href="<?= base_url('admin/'.$this->cek_jabatan->jabatan().'/pengaduan/lengkap') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          <?php else: ?>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?= count($jumlah_disposisi) ?></h3>

                  <p>Disposisi Pengaduan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-email"></i>
                </div>

                <a href="<?= base_url('admin/'.$this->cek_jabatan->jabatan().'/pengaduan/disposisi') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          <?php endif; ?>
        <?php endif; ?>

        <!-- ./col -->
      </div>


        <div class="row">

          <div class="col-md-6">
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?= ucwords($userdata['nama_pdk'])  ?></h3>
              <h5 class="widget-user-desc">
                <?php
                switch ($userdata['nama_j']) {
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

                  default:
                    # code...
                    break;
                }

                 ?>
              </h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="<?= base_url() ?>assets/image/avatars/users/<?= $this->badge->avatar($userdata['id_pdk']) ?>" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                    <span class="description-text">Penduduk</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                    <span class="description-text">Tanggapan</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                    <span class="description-text">Disposisi</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>

          <div class="box box-info">
            <div class="box-header with-border">
              <i class="fa fa-inbox"></i>
              <h3 class="box-title">Grafik Pengaduan di Kabupaten Sukoharjo 2017</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="line-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>

          </div>

          <?php if ($this->cek_jabatan->jabatan()=='rt'): ?>
            <div class="col-md-6">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <i class="fa fa-bookmark"></i>
                  <h3 class="box-title">Pengaduan Baru</h3>
                </div>
                <div class="box-body">
                  <div class="table-responsive">
                    <?php $counter=1 ?>
                    <?php if (count($jumlah_baru)!=0): ?>
                      <table class="table no-margin">
                        <thead>
                        <tr>
                          <th>Kategori</th>
                          <th>Judul</th>
                          <th>Tanggal Masuk</th>
                          <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($jumlah_baru as $baru ): ?>
                          <tr>
                            <td><?= $baru['nama_kategori']  ?></td>
                            <td><?= $baru['judul_pengaduan']  ?></td>
                            <td><?= date('d M Y', strtotime($baru['tanggal_pengaduan']))  ?></td>
                            <td><a href="<?= base_url('admin/'.$this->cek_jabatan->jabatan().'/pengaduan/detail/'.$baru['id_pengaduan'])  ?>" class="label label-success">Detail</a></td>
                          </tr>
                          <?php
                          if ($counter==10) {
                            break;
                          }else {
                            $counter+=1;
                          }

                           ?>
                        <?php endforeach; ?>
                        </tbody>
                      </table>
                    <?php else: ?>
                      <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-info"></i> Info!</h4>
                        Tidak ada pengaduan yang perlu ditinjau
                      </div>
                    <?php endif; ?>
                </div>

                <div class="box-footer clearfix">
                  <?php if ($counter>10): ?>
                    <a href="<?= base_url('admin/'.$this->cek_jabatan->jabatan().'/pengaduan')  ?>" class="btn btn-sm btn-default pull-right">Lihat Semua</a>
                  <?php endif; ?>
                </div>
                </div>
              </div>
            </div>
          <?php else: ?>
            <div class="col-md-6">
              <div class="box box-info">
                <div class="box-header with-border">
                  <i class="fa fa-bookmark"></i>
                  <h3 class="box-title">Pengaduan Yang Perlu Ditinjau</h3>
                </div>
                <div class="box-body">
                  <div class="table-responsive">
                    <?php $counter=1 ?>
                    <?php if (count($daftar_pengaduan)!=0): ?>
                      <table class="table no-margin">
                        <thead>
                        <tr>
                          <th>Kategori</th>
                          <th>Judul</th>
                          <th>Tanggal Masuk</th>
                          <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($daftar_pengaduan as $baru ): ?>
                          <tr>
                            <td><?= $baru['nama_kategori']  ?></td>
                            <td><?= $baru['judul_pengaduan']  ?></td>
                            <td><?= date('d M Y', strtotime($baru['tanggal_pengaduan']))  ?></td>
                            <td><a href="<?= base_url('admin/'.$this->cek_jabatan->jabatan().'/pengaduan/detail/'.$baru['id_pengaduan'])  ?>" class="label label-success">Detail</a></td>
                          </tr>
                          <?php
                          if ($counter==10) {
                            break;
                          }else {
                            $counter+=1;
                          }

                           ?>
                        <?php endforeach; ?>
                        </tbody>
                      </table>
                    <?php else: ?>
                      <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-info"></i> Info!</h4>
                        Tidak ada pengaduan yang perlu ditinjau
                      </div>
                    <?php endif; ?>
                </div>

                <div class="box-footer clearfix">
                  <?php if ($counter>10): ?>
                    <a href="<?= base_url('admin/'.$this->cek_jabatan->jabatan().'/pengaduan')  ?>" class="btn btn-sm btn-default pull-right">Lihat Semua</a>
                  <?php endif; ?>
                </div>
                </div>
              </div>
            </div>
          <?php endif; ?>

        </div>

        <div class="row">
          <div class="col-md-12">

          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <i class="fa fa-bar-chart"></i>
                <h3 class="box-title">Pengaduan Berdasarkan Kategori di Kabupaten Sukoharjo 2017</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body chart-responsive">
                <div class="chart" id="bar-chart" style="height: 300px;"></div>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>

      <!-- <div class="row">
        <div class="col-md-12">
          <?php //'<pre>'.print_r($data, 1).'<pre>'  ?>
        </div>
      </div> -->
</div>
