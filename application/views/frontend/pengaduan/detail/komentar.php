<div class="box box-success">
  <div class="box-header ui-sortable-handle">
    <h3 class="box-title"><i class="fa fa-comments-o"></i> Komentar Masyarakat</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body chat" id="chat-box" style="overflow: hidden; width: auto; height: auto;">
    <?php if ($komentar!=NULL): ?>
      <?php foreach ($komentar as $k): ?>
        <?php $this->view('frontend/pengaduan/detail/komentar/edit', ['komentar' => $k]); ?>
        <!-- chat item -->
        <div class="item">
          <img src="<?= base_url('assets/image/avatars/users/').$this->load_data->avatar($k['id_pdk'])  ?>" alt="user image" class="online">

          <p class="message">


            <a href="#" class="name" <?php if ($userdata['id_pdk']==$k['id_pdk']): ?>
              <?= 'data-toggle="modal" data-target=\'#'.$k['id_komentar'].'\''  ?>
            <?php endif; ?>>
              <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?= $this->waktu->elapsedTime(strtotime($k['tanggal_komentar'].' '.$k['waktu_komentar'])); ?></small>
              <?= $k['nama_pdk']  ?>
            </a>
            <bas><?= $k['isi_komentar']  ?></bas>
            <script type="text/javascript">
              $(document).ready(function() {

                $("bas").shorten();

              });
            </script>
          </p>
        </div>
        <!-- /.item -->
      <?php endforeach; ?>
    <?php else: ?>

    <?php endif; ?>
      </div>
    <div class="box-footer">
      <?= form_open(base_url('komentar/tambah/'.$pengaduan['id_pengaduan']), 'class="form-horizontal"') ?>
        <div class="input-group">
          <input class="form-control" placeholder="Ketik komentar..." name="isi_komentar">
          <input type="hidden" name="">
          <div class="input-group-btn">
            <button type="submit" class="btn btn-success"><i class="fa fa-commenting"></i></button>
          </div>
        </div>
        <?= form_close(); ?>
    </div>
  <!-- box-footer -->
</div><!-- /.box -->
