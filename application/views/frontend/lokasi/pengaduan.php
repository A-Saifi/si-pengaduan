<div class="row">
  <div class="content">
    <div class="col-md-3">
      <?php $this->view('frontend/nav'); ?>
    </div>
    <div class="col-md-9">
      <div class="row">
        <div class="col-md-12">
          <?php $this->view('frontend/lokasi/map', array('pengaduan' => $pengaduan, )); ?>
        </div>
      </div>
    </div>

  </div>
</div>
