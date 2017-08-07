<div id="<?= $kategori['id_kategori']  ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Icon Kategori</h4>
      </div>
      <div class="modal-body" >
        <center><img class="img-responsive" src="<?= base_url()  ?>assets/image/kategori/<?= $kategori['icon_kategori'] ?>" alt="Photo"></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>
