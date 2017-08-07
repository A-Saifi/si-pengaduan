
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Beri Tanggapan atau Klarifikasi</h3>
          <div class="box-tools pull-right">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            <span class="label label-primary">
              <?php
              switch (strtolower($userdata['nama_j'])) {
                case 'rt':
                  echo "Ketua RT";
                break;
                case 'rw':
                  echo "Ketua RW";
                break;
                case 'kelurahan':
                  echo "Petugas Kelurahan";
                break;
                case 'kecamatan':
                  echo "Petugas Kecamatan";
                break;
                case 'kabupaten':
                  echo "Petugas Kabupaten";
                break;

                default:
                  # code...
                  break;
              }
               ?>
            </span>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
          <form class="" action="<?= base_url('admin/kelurahan/tanggapan/tambah/'.$pengaduan['id_pengaduan'].'?rj='.$userdata['id_rj']) ?>" method="post">
            <div class="form-group">
                              <!-- <label>Beri Tanggapan atau klarifikasi</label> -->
                              <textarea name="tanggapan" class="form-control" rows="3" placeholder="Ketik disini ..."></textarea>
            </div>
          <button type="submit" class="btn btn-success btn-sm pull-left" data-toggle="tooltip" title="" data-original-title="Tanggapi pengaduan" onclick="return confirm('Yakin ingin memberi tanggapan pada pengaduan ini ?');">
          <i class="fa  fa-send-o"></i> Kirim</button></form>
        </div><!-- /.box-body -->

      </div><!-- /.box -->
