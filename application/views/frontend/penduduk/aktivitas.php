<?php date_default_timezone_set("Asia/Bangkok"); ?>
<div class="active tab-pane" id="activity">
  <!-- Post -->
  <?php foreach ($pengaduan as $p): ?>
    <div class="post clearfix">
      <div class="user-block" onclick="location.href=<?= '\''.base_url().'pengaduan/detail/'.$p['id_pengaduan'].'\''  ?>">
        <img class="img-circle img-bordered-sm" src="<?= base_url('assets/image/avatars/users/').$this->load_data->avatar($p['id_pdk'])  ?>" alt="User Image">
            <span class="username">
              <a href="#"><?= $p['nama_pdk'] ?></a>

              <?php  if ($p['status_pengaduan']=="belum valid") {
                echo '<button type="button" class="pull-right btn btn-warning btn-xs">Belum valid</button>';
              }
              if ($p['status_pengaduan']=="valid" || $p['status_pengaduan']=="ok") {
                  echo '<a href="#" type="button" class="pull-right btn btn-success btn-xs">Lihat Status</a>';
              }
              if ($p['status_pengaduan']=="tidak valid") {
                  echo '<button type="button" class="pull-right btn btn-danger btn-xs">Tidak valid</button>';
              }

              if ($p['status_pengaduan']=="spam") {
                  echo '<button type="button" class="pull-right btn btn-danger btn-xs">Merupakan Spam</button>';
              }
                ?>
            </span>
        <span class="description"><?= $p['nama_kategori'] ?> - <?= $this->waktu->elapsedTime(strtotime($p['tanggal_pengaduan'].' '.$p['waktu_pengaduan'])); ?> yang lalu</span>
      </div>
      <!-- /.user-block -->
      <p><b><?= $p['judul_pengaduan'] ?></b></p>
      <p>
        <?= $p['isi_pengaduan'] ?>
      </p>

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

      <ul class="list-inline">
        <!-- <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li> -->
        <li><a href="#" class="btn btn-default btn-xs"><i class="fa fa-share margin-r-5"></i> share</a>
        </li>
        <li class="pull-right">
          <?php $total = $this->load_data->total_komentar($p['id_pengaduan']) ?>
          <a href="#" class="link-black text-sm">Komentar
            (<?= $total['total']  ?>)</a></li>
      </ul>
      <!-- <form class="form-horizontal">
        <div class="form-group margin-bottom-none">
          <div class="col-sm-9">
            <input class="form-control input-sm" placeholder="Response">
          </div>
          <div class="col-sm-3">
            <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
          </div>
        </div>
      </form> -->
    </div>
  <?php endforeach; ?>
  <!-- /.post -->

</div>
