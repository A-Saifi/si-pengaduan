<div class="modal fade" id="<?= $foto['id_gambar'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?= $foto['nama_gambar'] ?></h4>
      </div>
      <div class="modal-body">
          <img class="img-responsive" src="<?= base_url() ?>assets/image/pengaduan/<?= $foto['nama_gambar'] ?>" alt="Photo">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
