<style>
      #map {
        height: 300px;
        width: 100%;
       }
    </style>
<?php date_default_timezone_set("Asia/Bangkok"); ?>
<div class="content">
  <div class="row">

    <div class="col-md-3">
      <?php $this->view('frontend/nav'); ?>
    </div>

    <div class="col-md-5">

      <!-- Disini pengaduan  -->
      <?php $this->view('frontend/pengaduan/detail/keterangan', ['status' => $status]); ?>

      <!-- Disini foto pengaduan -->
      <?php if ($gambar!=null) {
        $this->view('frontend/pengaduan/detail/foto');
      } ?>

      <!-- Disini Komentar -->
      <?php $this->view('frontend/pengaduan/detail/komentar'); ?>

    </div>

    <?php if ($tanggapan!=null): ?>
      <div class="col-md-4">
        <?php $this->view('frontend/pengaduan/detail/tanggapan', ['tanggapan'=>$tanggapan]) ?>
      </div>
    <?php endif; ?>

    <div class="col-md-4">
      <?php $this->view('frontend/pengaduan/detail/lokasi'); ?>
    </div>
  </div>
</div>
