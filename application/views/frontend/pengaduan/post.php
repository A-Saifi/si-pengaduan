<?php foreach ($pengaduan as $p): ?>

<div class="box box-widget">
        <div class="box-header with-border" onclick="location.href=<?= '\''.base_url().'pengaduan/detail/'.$p['id_pengaduan'].'\''  ?>">
          <div class="user-block">
            <img class="img-circle" src="<?= base_url() ?>assets/image/avatars/users/<?= $this->load_data->avatar($p['id_pdk']) ?>" alt="User Image">
            <span class="username"><a href="#"><?= ucwords(strtolower($p['nama_pdk']))  ?></a></span>
            <span class="description"><?= $p['nama_kategori'] ?> - <?= date('d M Y', strtotime($p['tanggal_pengaduan'])) ?> </span>
          </div>
          <!-- /.user-block -->
          <div class="box-tools">
            <i class="fa fa-clock-o"></i> <?= $this->waktu->elapsedTime(strtotime($p['tanggal_pengaduan'].' '.$p['waktu_pengaduan'])); ?>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- post text -->
          <p><b><?= $p['judul_pengaduan'] ?></b></p>
            <p><?= strlen($p['isi_pengaduan']) >= 250 ? substr($p['isi_pengaduan'], 0, 250) . '.. <a href="'.base_url('pengaduan/detail/'.$p['id_pengaduan']).'">[Read more]</a>' : $p['isi_pengaduan']; ?></p>

            <?php if ($this->load_data->gambar($p['id_pengaduan'])!=NULL): ?>
              <script>
              $(document).ready(function () {
              jQuery("<?= '#'.$p['id_pengaduan']  ?>").nanoGallery({thumbnailWidth:'auto',thumbnailHeight:250,
                itemsBaseURL: "<?= base_url() ?>assets/image/pengaduan",
                 thumbnailHoverEffect: 'labelSlideUp,borderLighter',
                colorScheme:'light',
                locationHash: false,
                thumbnailLabel:{display:true,position:'overImageOnTop', align:'center'},
                viewerDisplayLogo:true,
                thumbnailLabel:{display:true,position:'overImageOnMiddle', align:'center'},

              });
               });
              </script>

              <div id="<?= $p['id_pengaduan']  ?>">
                <?php foreach ($this->load_data->gambar_limit($p['id_pengaduan'], 2) as $gambar): ?>
                  <a href="<?= $gambar['nama_gambar']  ?>" data-ngthumb="<?= $gambar['nama_gambar']  ?>" >Photo</a>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

          <!-- Social sharing buttons -->
          <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
          <!-- <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button> -->
          <?php $total = $this->load_data->total_komentar($p['id_pengaduan']) ?>
          <span class="pull-right text-muted"><?= $total['total']  ?> komentar</span>
        </div>
        <!-- /.box-body -->


          <?php if ($this->load_data->komentar($p['id_pengaduan'])!=NULL): ?>
            <div class="box-footer box-comments">
            <?php foreach ($this->load_data->komentar($p['id_pengaduan']) as $komentar): ?>
              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="<?= base_url('assets/image/avatars/users/').$this->load_data->avatar($komentar['id_pdk'])  ?>" alt="User Image">

                <div class="comment-text">
                      <span class="username">
                        <?= ucwords(strtolower($komentar['nama_pdk'])) ?>
                        <span class="text-muted pull-right"><?= $this->waktu->elapsedTime(strtotime($komentar['tanggal_komentar'].' '.$komentar['waktu_komentar'])); ?></span>
                      </span><!-- /.username -->
                  <?= strlen($komentar['isi_komentar']) > 100 ? substr($komentar['isi_komentar'], 0, 100) . '...' : $komentar['isi_komentar']; ?>
                </div>
                <!-- /.comment-text -->
              </div>
            <?php endforeach; ?>
            </div>
          <?php endif; ?>


        <!-- /.box-footer -->
        <div class="box-footer">
          <?= form_open(base_url('komentar/tambah/'.$p['id_pengaduan']), 'class="form-horizontal"') ?>
            <img class="img-responsive img-circle img-sm" src="<?= base_url('assets/image/avatars/users/').$this->load_data->avatar($userdata['id_pdk'])  ?>" alt="Alt Text">
            <!-- .img-push is used to add margin to elements next to floating images -->
            <div class="img-push">

              <input class="form-control input-sm" placeholder="Ketik komentar disini..." name="isi_komentar">
            </div>
          <?= form_close(); ?>
        </div>
        <!-- /.box-footer -->
      </div>
      <?php endforeach; ?>
