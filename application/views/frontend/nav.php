<div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?= ucwords(strtolower($userdata['nama_pdk'])) ?></h3>
              <h5 class="widget-user-desc"><?= ucwords(strtolower($userdata['pekerjaan_pdk'])) ?></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="<?= base_url() ?>assets/image/avatars/users/<?= $this->load_data->avatar($userdata['id_pdk']) ?>" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li class="<?php if ($nav == 1) { echo 'active'; } ?>">
                    <a href="<?= base_url() ?>"><i class="fa fa-newspaper-o"></i> Beranda</a>
                  </li>
                  <li class="<?php if ($nav == 4) { echo 'active'; } ?>">
                    <a href="<?= base_url('sekitar') ?>"><i class="fa fa-map-marker"></i> Sekitar Saya</a>
                  </li>
                  <li class="<?php if ($nav == 2) { echo 'active'; } ?>">
                    <a href="<?= base_url('penduduk/profile/'.$userdata['nik_pdk']) ?>"><i class="fa fa-user"></i> Profile</a>
                  </li>
                  <li class="<?php if ($nav == 3) { echo 'active'; } ?>">
                    <a href="<?= base_url('lokasi/pengaduan') ?>"><i class="fa fa-map-o"></i> Peta Pengaduan</a>
                  </li>
                  <li class="<?php if ($nav == 5) { echo 'active'; } ?>">
                    <a href="<?= base_url('grafik') ?>"><i class="fa fa-bar-chart-o"></i> Grafik Pengaduan </a>
                  </li>
                  <li class="<?php if ($nav == 6) { echo 'active'; } ?>">
                    <a href="<?= base_url('panduan') ?>"><i class="fa fa-book"></i> Panduan</a>
                  </li>
                </ul>
              </div>
              <hr>
                <a href="<?= base_url('logout')  ?>" class="btn btn-danger btn-block" onclick="return confirm('Yakin ingin keluar?');"><i class="fa fa-sign-out"></i> Sign Out</a>

            </div>
          </div>
