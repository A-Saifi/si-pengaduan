<div class="box-footer box-comments">
  <?php foreach ($komentar as $komentar): ?>
    <div class="box-comment">
      <!-- User image -->
      <img class="img-circle img-sm" src="<?= base_url() ?>assets/image/avatars/users/<?= $this->badge->avatar($komentar['id_pdk']) ?>" alt="User Image">
      <div class="comment-text">
            <span class="username">
              <?= $komentar['nama_pdk']  ?>
              <span class="text-muted pull-right"><?= $this->waktu->elapsedTime(strtotime($komentar['tanggal_komentar'].' '.$komentar['waktu_komentar'])); ?> yang lalu</span>
            </span><!-- /.username -->
            <bas><?= $komentar['isi_komentar']  ?></bas>
            <script type="text/javascript">
              $(document).ready(function() {

                $("bas").shorten();

              });
            </script>
      </div>
      <!-- /.comment-text -->
    </div>
  <?php endforeach; ?>
</div>
