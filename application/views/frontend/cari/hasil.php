<section class="content">
 <div class="row">

   <div class="col-md-3">
     <?php $this->view('frontend/nav'); ?>
   </div>

   <div class="col-md-5">

          <?php $this->view('frontend/cari/judul_cari', ['pengaduan' => $pengaduan]) ?>

          <?php $this->view('frontend/pengaduan/post') ?>

          <div class="text-center" style="margin-bottom: 10px;">
            <?= form_open(base_url('home/index/')) ?>
                  <input type="text" name="page" value="" hidden>
                  <button type="submit" class="btn btn-success btn-flat">Load More</button>

            <?= form_close(); ?>
          </div>

   </div>
   <div class="col-md-4">
     <div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-tags"></i>

              <h3 class="box-title">Kategori</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <?php foreach ($kategori as $kategori): ?>
                <li><a href="#"><i class="fa fa-tag text-light-blue"></i> <?= ucwords(strtolower($kategori['nama_kategori']))  ?> [<?= $this->load_data->jumlah_post_kategori($kategori['id_kategori']) ?>]</a></li>
                <?php endforeach; ?>
              </ul>
            </div>
            <!-- /.box-body -->
    </div>
   </div>
 </div>
</section>
