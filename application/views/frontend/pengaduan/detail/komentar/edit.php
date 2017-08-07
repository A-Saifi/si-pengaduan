<div class="modal fade" id="<?= $komentar['id_komentar']  ?>" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Koemntar</h4>
        </div>
        <?= form_open(base_url('komentar/edit/'.$komentar['id_komentar'].'.html?pengaduan='.$komentar['id_pengaduan'] ));  ?>
        <div class="modal-body">
          <div class="form-group">
            <label>Komentar</label>
            <textarea class="form-control" rows="4" placeholder="" name="komentar"><?= $komentar['isi_komentar']  ?></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <!-- <button type="submit" class="btn btn-danger pull-left" data-dismiss="modal">Batalkan</button> -->
          <a href="<?= base_url('komentar/hapus/'.$komentar['id_komentar'].'.html?pengaduan='.$komentar['id_pengaduan'])  ?>" class="btn btn-danger pull-left" onclick="return confirm('Yakin ingin menghapus komenta ini?');">Hapus</a>
          <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin ingin mengubah komentar ini?');">Ubah</button>
        </div>
        <?= form_close();  ?>
      </div>

    </div>
  </div>
