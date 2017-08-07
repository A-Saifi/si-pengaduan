
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
  <li class="header">MENU</li>

  <?php if ($this->cek_jabatan->jabatan()!='admin'): ?>
    <li class="treeview <?php if ($this->cek_jabatan->jabatan()=='rt') {echo 'active';} ?>">
      <a href="#">
        <i class="fa fa-institution"></i> <span>Ketua RT</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li <?php if ($this->cek_jabatan->jabatan()=='rt' && $sidebar==1) {echo 'class="active"';} ?>>
          <a href="<?= base_url('admin/rt/')  ?>" >
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <!-- <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span> -->
          </a>
        </li>
        <li <?php if ($this->cek_jabatan->jabatan()=='rt' && $sidebar==2) {echo 'class="active"';} ?>><a href="<?= base_url('admin/rt/penduduk') ?>"><i class="fa fa-users"></i> Daftar Penduduk</a></li>
        <li class="treeview <?php if ($this->cek_jabatan->jabatan()=='rt' && $sidebar>2 && $sidebar<8) {echo 'active';} ?>">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>Pengaduan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if ($this->cek_jabatan->jabatan()=='rt' && $sidebar==3) {echo 'class="active"';} ?>><a href="<?= base_url('admin/rt/pengaduan') ?>"><i class="fa fa-book"></i> Pengaduan Baru
            <span class="pull-right-container">
              <small class="label pull-right bg-red">
                <?php $jumlah = $this->badge->pengaduan_baru($userdata['id_rj']); echo $jumlah['jumlah']; ?>
              </small>
            </span></a></li>
            <li <?php if ($this->cek_jabatan->jabatan()=='rt' && $sidebar==4) {echo 'class="active"';} ?>><a href="<?= base_url('admin/rt/pengaduan/valid') ?>"><i class="fa fa-book"></i> Pengaduan Valid
              <span class="pull-right-container">
                <small class="label pull-right bg-blue">
                  <?php $jumlah = $this->badge->pengaduan($userdata['id_rj']); echo $jumlah['jumlah']; ?>
                </small>
              </span>
            </a></li>
            <li <?php if ($this->cek_jabatan->jabatan()=='rt' && $sidebar==7) {echo 'class="active"';} ?>><a href="<?= base_url('admin/rt/pengaduan/daftar') ?>"><i class="fa fa-list-ul"></i> Daftar Pengaduan</a></li>
            <li <?php if ($this->cek_jabatan->jabatan()=='rt' && $sidebar==5) {echo 'class="active"';} ?>><a href="<?= base_url('admin/rt/pengaduan/disposisi') ?>"><i class="fa fa-envelope"></i> Disposisi</a></li>
            <li <?php if ($this->cek_jabatan->jabatan()=='rt' && $sidebar==6) {echo 'class="active"';} ?>><a href="<?= base_url('admin/rt/pengaduan/spam') ?>"><i class="fa fa-trash"></i> Spam</a></li>
          </ul>
        </li>
        <li <?php if ($this->cek_jabatan->jabatan()=='rt' && $sidebar==8) {echo 'class="active"';} ?>><a href="<?= base_url('admin/rt/tanggapan') ?>"><i class="fa fa-commenting"></i> Tanggapan</a></li>
        <li <?php if ($this->cek_jabatan->jabatan()=='rt' && $sidebar==10) {echo 'class="active"';} ?>><a href="<?= base_url('admin/rt/kategori') ?>"><i class="fa fa-tags"></i> Kategori</a></li>
      </ul>
    </li>

    <li class="treeview <?php if ($this->cek_jabatan->jabatan()=='rw') {echo 'active';} ?>">
      <a href="#">
        <i class="fa fa-institution"></i> <span>Ketua RW</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li <?php if ($this->cek_jabatan->jabatan()=='rw' && $sidebar==1) {echo 'class="active"';} ?>>
          <a href="<?= base_url('admin/rw')  ?>" >
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <!-- <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span> -->
          </a>
        </li>
        <li <?php if ($this->cek_jabatan->jabatan()=='rw' && $sidebar==2) {echo 'class="active"';} ?>><a href="<?= base_url('admin/rw/penduduk') ?>"><i class="fa fa-users"></i> Daftar Penduduk</a></li>
        <li class="treeview <?php if ($this->cek_jabatan->jabatan()=='rw' && $sidebar>2 && $sidebar<7) {echo 'active';} ?>">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>Pengaduan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <!-- <small class="label pull-right bg-red">
                <?php $jumlah = $this->badge->pengaduan($userdata['id_rj']); echo $jumlah['jumlah']; ?>
              </small> -->
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if ($this->cek_jabatan->jabatan()=='rw' && $sidebar==4) {echo 'class="active"';} ?>><a href="<?= base_url('admin/rw/pengaduan') ?>"><i class="fa fa-book"></i> Pengaduan
              <span class="pull-right-container">
                <small class="label pull-right bg-red">
                  <?php $jumlah = $this->badge->pengaduan($userdata['id_rj']); echo $jumlah['jumlah']; ?>
                </small>
              </span>
            </a></li>
            <li <?php if ($this->cek_jabatan->jabatan()=='rw' && $sidebar==6) {echo 'class="active"';} ?>><a href="<?= base_url('admin/rw/pengaduan/daftar') ?>"><i class="fa fa-list-ul"></i> Daftar Pengaduan</a></li>
            <li <?php if ($this->cek_jabatan->jabatan()=='rw' && $sidebar==5) {echo 'class="active"';} ?>><a href="<?= base_url('admin/rw/pengaduan/disposisi') ?>"><i class="fa fa-envelope"></i> Disposisi</a></li>

          </ul>
        </li>
        <li <?php if ($this->cek_jabatan->jabatan()=='rw' && $sidebar==7) {echo 'class="active"';} ?>><a href="<?= base_url('admin/rw/tanggapan') ?>"><i class="fa fa-commenting"></i> Tanggapan</a></li>
        <li <?php if ($this->cek_jabatan->jabatan()=='rw' && $sidebar==10) {echo 'class="active"';} ?>><a href="<?= base_url('admin/rw/kategori') ?>"><i class="fa fa-tags"></i> Kategori</a></li>
      </ul>
    </li>

    <li class="treeview <?php if ($this->cek_jabatan->jabatan()=='kelurahan') {echo 'active';} ?>">
      <a href="#">
        <i class="fa fa-institution"></i> <span>Kelurahan</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li <?php if ($this->cek_jabatan->jabatan()=='kelurahan' && $sidebar==1) {echo 'class="active"';} ?>>
          <a href="<?= base_url('admin/kelurahan')  ?>" >
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <!-- <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span> -->
          </a>
        </li>
        <li <?php if ($this->cek_jabatan->jabatan()=='kelurahan' && $sidebar==2) {echo 'class="active"';} ?>><a href="<?= base_url('admin/kelurahan/penduduk') ?>"><i class="fa fa-users"></i> Daftar Penduduk</a></li>
        <li class="treeview <?php if ($this->cek_jabatan->jabatan()=='kelurahan' && $sidebar>2 && $sidebar<7) {echo 'active';} ?>">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>Pengaduan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <!-- <small class="label pull-right bg-red">
                <?php $jumlah = $this->badge->pengaduan($userdata['id_rj']); echo $jumlah['jumlah']; ?>
              </small> -->
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if ($this->cek_jabatan->jabatan()=='kelurahan' && $sidebar==4) {echo 'class="active"';} ?>><a href="<?= base_url('admin/kelurahan/pengaduan') ?>"><i class="fa fa-book"></i> Pengaduan
              <span class="pull-right-container">
                <small class="label pull-right bg-red">
                  <?php $jumlah = $this->badge->pengaduan($userdata['id_rj']); echo $jumlah['jumlah']; ?>
                </small>
              </span>
            </a></li>
            <li <?php if ($this->cek_jabatan->jabatan()=='kelurahan' && $sidebar==6) {echo 'class="active"';} ?>><a href="<?= base_url('admin/kelurahan/pengaduan/daftar') ?>"><i class="fa fa-list-ul"></i> Daftar Pengaduan</a></li>
            <li <?php if ($this->cek_jabatan->jabatan()=='kelurahan' && $sidebar==5) {echo 'class="active"';} ?>><a href="<?= base_url('admin/kelurahan/pengaduan/disposisi') ?>"><i class="fa fa-envelope"></i> Disposisi</a></li>

          </ul>
        </li>
        <li <?php if ($this->cek_jabatan->jabatan()=='kelurahan' && $sidebar==7) {echo 'class="active"';} ?>><a href="<?= base_url('admin/kelurahan/tanggapan') ?>"><i class="fa fa-commenting"></i> Tanggapan</a></li>
        <li <?php if ($this->cek_jabatan->jabatan()=='kelurahan' && $sidebar==10) {echo 'class="active"';} ?>><a href="<?= base_url('admin/kelurahan/kategori') ?>"><i class="fa fa-tags"></i> Kategori</a></li>
      </ul>
    </li>

    <li class="treeview <?php if ($this->cek_jabatan->jabatan()=='kecamatan') {echo 'active';} ?>">
      <a href="#">
        <i class="fa fa-institution"></i> <span>Kecamatan</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li <?php if ($this->cek_jabatan->jabatan()=='kecamatan' && $sidebar==1) {echo 'class="active"';} ?>>
          <a href="<?= base_url('admin/kecamatan')  ?>" >
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <!-- <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span> -->
          </a>
        </li>
        <li <?php if ($this->cek_jabatan->jabatan()=='kecamatan' && $sidebar==2) {echo 'class="active"';} ?>><a href="<?= base_url('admin/kecamatan/penduduk') ?>"><i class="fa fa-users"></i> Daftar Penduduk</a></li>
        <li class="treeview <?php if ($this->cek_jabatan->jabatan()=='kecamatan' && $sidebar>2 && $sidebar<7) {echo 'active';} ?>">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>Pengaduan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <!-- <small class="label pull-right bg-red">
                <?php $jumlah = $this->badge->pengaduan($userdata['id_rj']); echo $jumlah['jumlah']; ?>
              </small> -->
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if ($this->cek_jabatan->jabatan()=='kecamatan' && $sidebar==4) {echo 'class="active"';} ?>><a href="<?= base_url('admin/kecamatan/pengaduan') ?>"><i class="fa fa-book"></i> Pengaduan
              <span class="pull-right-container">
                <small class="label pull-right bg-red">
                  <?php $jumlah = $this->badge->pengaduan($userdata['id_rj']); echo $jumlah['jumlah']; ?>
                </small>
              </span>
            </a></li>
            <li <?php if ($this->cek_jabatan->jabatan()=='kecamatan' && $sidebar==6) {echo 'class="active"';} ?>><a href="<?= base_url('admin/kecamatan/pengaduan/daftar') ?>"><i class="fa fa-list-ul"></i> Daftar Pengaduan</a></li>
            <li <?php if ($this->cek_jabatan->jabatan()=='kecamatan' && $sidebar==5) {echo 'class="active"';} ?>><a href="<?= base_url('admin/kecamatan/pengaduan/disposisi') ?>"><i class="fa fa-envelope"></i> Disposisi</a></li>

          </ul>
        </li>
        <li <?php if ($this->cek_jabatan->jabatan()=='kecamatan' && $sidebar==7) {echo 'class="active"';} ?>><a href="<?= base_url('admin/kecamatan/tanggapan') ?>"><i class="fa fa-commenting"></i> Tanggapan</a></li>
        <li <?php if ($this->cek_jabatan->jabatan()=='kecamatan' && $sidebar==10) {echo 'class="active"';} ?>><a href="<?= base_url('admin/kecamatan/kategori') ?>"><i class="fa fa-tags"></i> Kategori</a></li>
      </ul>
    </li>

    <li class="treeview <?php if ($this->cek_jabatan->jabatan()=='kabupaten') {echo 'active';} ?>">
      <a href="#">
        <i class="fa fa-institution"></i> <span>Kabupaten</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li <?php if ($this->cek_jabatan->jabatan()=='kabupaten' && $sidebar==1) {echo 'class="active"';} ?>>
          <a href="<?= base_url('admin/kabupaten')  ?>" >
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <!-- <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span> -->
          </a>
        </li>
        <li <?php if ($this->cek_jabatan->jabatan()=='kabupaten' && $sidebar==2) {echo 'class="active"';} ?>><a href="<?= base_url('admin/kabupaten/penduduk') ?>"><i class="fa fa-users"></i> Daftar Penduduk</a></li>
        <li class="treeview <?php if ($this->cek_jabatan->jabatan()=='kabupaten' && $sidebar>2 && $sidebar<7) {echo 'active';} ?>">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>Pengaduan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <!-- <small class="label pull-right bg-red">
                <?php $jumlah = $this->badge->pengaduan($userdata['id_rj']); echo $jumlah['jumlah']; ?>
              </small> -->
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if ($this->cek_jabatan->jabatan()=='kabupaten' && $sidebar==4) {echo 'class="active"';} ?>><a href="<?= base_url('admin/kabupaten/pengaduan') ?>"><i class="fa fa-book"></i> Pengaduan
              <span class="pull-right-container">
                <small class="label pull-right bg-red">
                  <?php $jumlah = $this->badge->pengaduan($userdata['id_rj']); echo $jumlah['jumlah']; ?>
                </small>
              </span>
            </a></li>
            <li <?php if ($this->cek_jabatan->jabatan()=='kabupaten' && $sidebar==6) {echo 'class="active"';} ?>><a href="<?= base_url('admin/kabupaten/pengaduan/daftar') ?>"><i class="fa fa-list-ul"></i> Daftar Pengaduan</a></li>
            <li <?php if ($this->cek_jabatan->jabatan()=='kabupaten' && $sidebar==5) {echo 'class="active"';} ?>><a href="<?= base_url('admin/kabupaten/pengaduan/lengkap') ?>"><i class="fa fa-folder"></i> Pengaduan Lengkap</a></li>

          </ul>
        </li>
        <li <?php if ($this->cek_jabatan->jabatan()=='kabupaten' && $sidebar==7) {echo 'class="active"';} ?>><a href="<?= base_url('admin/kabupaten/tanggapan') ?>"><i class="fa fa-commenting"></i> Tanggapan</a></li>
        <li <?php if ($this->cek_jabatan->jabatan()=='kabupaten' && $sidebar==10) {echo 'class="active"';} ?>><a href="<?= base_url('admin/kategori') ?>"><i class="fa fa-tags"></i> Kategori</a></li>
      </ul>
    </li>
  <?php endif; ?>
  <?php if ($this->cek_jabatan->jabatan()=='admin'): ?>
    <li class="treeview <?php if ($this->cek_jabatan->jabatan()=='admin') {echo 'active';} ?>">
      <a href="#">
        <i class="fa fa-institution"></i> <span>admin</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="treeview <?php if ($this->cek_jabatan->jabatan()=='admin' && $sidebar>6) {echo 'active';} ?>">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Kecamatan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <!-- <small class="label pull-right bg-red">
                <?php $jumlah = $this->badge->pengaduan($userdata['id_rj']); echo $jumlah['jumlah']; ?>
              </small> -->
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if ($this->cek_jabatan->jabatan()=='admin' && $sidebar==7) {echo 'class="active"';} ?>><a href="<?= base_url('admin/admin') ?>"><i class="fa fa-users"></i> Semua</a></li>
            <?php foreach ($this->load_data_admin->list_kecamatan() as $kecamatan): ?>
                <li <?php if ($this->cek_jabatan->jabatan()=='admin' && $sidebar==(10+$kecamatan['id_kec'])) {echo 'class="active"';} ?>><a href="<?= base_url('admin/admin/pengguna/kecamatan/'.$kecamatan['id_kec'].'.html?kecamatan='.$kecamatan['nama_kec']) ?>"><i class="fa fa-users"></i> <?= ucwords(strtolower($kecamatan['nama_kec'])) ?></a></li>
            <?php endforeach; ?>
          </ul>
        </li>
    </li>
        <li class="treeview <?php if ($this->cek_jabatan->jabatan()=='admin' && $sidebar>1 && $sidebar<7) {echo 'active';} ?>">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Admin Sistem</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <!-- <small class="label pull-right bg-red">
                <?php $jumlah = $this->badge->pengaduan($userdata['id_rj']); echo $jumlah['jumlah']; ?>
              </small> -->
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if ($this->cek_jabatan->jabatan()=='admin' && $sidebar==2) {echo 'class="active"';} ?>><a href="<?= base_url('admin/admin/jabatan/rt') ?>"><i class="fa fa-user"></i> Ketua RT</a></li>
            <li <?php if ($this->cek_jabatan->jabatan()=='admin' && $sidebar==3) {echo 'class="active"';} ?>><a href="<?= base_url('admin/admin/jabatan/rw') ?>"><i class="fa fa-user"></i> Ketua RW</a></li>
            <li <?php if ($this->cek_jabatan->jabatan()=='admin' && $sidebar==4) {echo 'class="active"';} ?>><a href="<?= base_url('admin/admin/jabatan/kelurahan') ?>"><i class="fa fa-user"></i> Petugas Kelurahan</a></li>
            <li <?php if ($this->cek_jabatan->jabatan()=='admin' && $sidebar==5) {echo 'class="active"';} ?>><a href="<?= base_url('admin/admin/jabatan/kecamatan') ?>"><i class="fa fa-user"></i> Petugas Kecamatan</a></li>
            <li <?php if ($this->cek_jabatan->jabatan()=='admin' && $sidebar==6) {echo 'class="active"';} ?>><a href="<?= base_url('admin/admin/jabatan/kabupaten') ?>"><i class="fa fa-user"></i> Petugas Kabupaten</a></li>

          </ul>
        </li>

      </ul>
    </li>
  <?php endif; ?>
    <!-- <li class="header">LABELS</li>
    <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
    <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
    <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
</ul>
</section>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <section class="content-header">
    <h1>
      <?= ucwords(strtolower($header));  ?>
      <small><?php if (isset($small)) {
        echo $small;
      } ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-dashboard"></i> Admin</a></li>
      <?php foreach ($crumb as $c) {
          echo '<li><a href="'.base_url($c['link']).'">'.$c['label'].'</a></li>';
      }  ?>

    </ol>
  </section>
