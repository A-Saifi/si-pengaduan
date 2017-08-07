
<section class="content">
  <div class="row">
    <div class="col-md-3">

        <?php $this->view('frontend/nav') ?>

    </div>

    <div class="col-md-5">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#activity" data-toggle="tab">Aktivitas Pengaduan</a></li>
          <li><a href="#settings" data-toggle="tab">Pengaturan</a></li>
        </ul>
        <div class="tab-content">
            <?php $this->view('frontend/penduduk/aktivitas')  ?>

            <?php $this->view('frontend/penduduk/pengaturan') ?>
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>

    <div class="col-md-4">
      <?php $this->view('frontend/penduduk/biodata', ['data' => $profile]) ?>
    </div>


  </div>
</section>
