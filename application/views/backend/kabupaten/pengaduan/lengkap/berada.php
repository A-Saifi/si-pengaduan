<div class="modal modal-default fade in" id="<?= $data['id_pengaduan']  ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php
        switch ($data['nama_j']) {
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

         ?> </h4>
      </div>
      <div class="modal-body">
              

              <strong><i class="fa fa-credit-card margin-r-5"></i> NIK</strong>

              <p class="text-muted">
                <?= ucwords(strtolower($data['nik_pdk']))  ?>
              </p>

              <hr>

              <strong><i class="fa fa-user margin-r-5"></i> Nama Lengkap</strong>

              <p class="text-muted">
                <?= ucwords(strtolower($data['nama_pdk']))  ?>
              </p>

              <hr>

              <strong><i class="fa fa-home margin-r-5"></i> Alamat Lengkap</strong>

              <p class="text-muted">
                <?= 'RT-'.ucwords(strtolower($data['nama_rt'])).
                    ' / RW-'.ucwords(strtolower($data['nama_rw'])).
                    ', '.ucwords(strtolower($data['nama_dusun'])).
                    ', '.ucwords(strtolower($data['nama_kel'])).
                    ', Kecamatan '.ucwords(strtolower($data['nama_kec'])).
                    ', Kabupaten '.ucwords(strtolower($data['nama_kab'])).
                    ', '.ucwords(strtolower($data['nama_prov']))
                     ?>
              </p>

              <hr>

              <strong><i class="fa fa-mobile-phone margin-r-5"></i> Nomor Telepon</strong>

              <p class="text-muted"><?= ucwords(strtolower($data['hp_pdk']))  ?></p>

              <!-- <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p> -->





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
