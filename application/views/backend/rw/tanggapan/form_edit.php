<div class="modal fade" id="<?= $tanggapan['id_tanggapan']  ?>" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Tanggapan</h4>
        </div>
        <?= form_open(base_url('admin/rw/tanggapan/edit/'.$tanggapan['id_tanggapan'].'.html?pengaduan='.$tanggapan['id_pengaduan'] ));  ?>
        <div class="modal-body">
          <div class="form-group">
            <label>Tanggapan / Klarifikasi</label>
            <textarea class="form-control" rows="4" placeholder="" name="tanggapan"><?= $tanggapan['isi_tanggapan']  ?></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger pull-left" data-dismiss="modal">Batalkan</button>
          <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin ingin mengubah tanggapan ini?');">Submit</button>
        </div>
        <?= form_close();  ?>
      </div>

    </div>
  </div>
