<section class="content">
 <div class="row">

   <div class="col-md-3">
     <?php $this->view('frontend/nav'); ?>
   </div>

   <div class="col-md-5">

          <?php $this->view('frontend/home/buttonLaporkan') ?>

          <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php if ($status): ?>
                  <h4><i class="icon fa fa-home"></i> <?= $judul  ?></h4>
                <?php else: ?>
                  <h4><i class="icon fa fa-home"></i> Pengaduan Sekitar Saya</h4>
                <?php endif; ?>
                <?= 'Desa '.$alamat['nama_kel'].', Kecamatan '.$alamat['nama_kec'].', Kabupaten '.$alamat['nama_kab']  ?>
          </div>

          <?php $this->view('frontend/pengaduan/post') ?>

          <div class="text-center" style="margin-bottom: 10px;">
            <?= form_open(base_url('home/index/')) ?>
                  <input type="text" name="page" value="<?= $page+1 ?>" hidden>
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
                <li><a href="<?= base_url('sekitar/kategori/'.$kategori['id_kategori']) ?>"><i class="fa fa-tag text-light-blue"></i> <?= ucwords(strtolower($kategori['nama_kategori']))  ?> [<?= $this->load_data->jumlah_post_kategori($kategori['id_kategori']) ?>]</a></li>
                <?php endforeach; ?>
              </ul>
            </div>
            <!-- /.box-body -->
    </div>
   </div>
 </div>
</section>
