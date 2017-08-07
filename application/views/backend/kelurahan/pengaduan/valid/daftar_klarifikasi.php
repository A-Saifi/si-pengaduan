<div class="box box-default">
       <div class="box-header with-border">
         <i class="fa fa-bullhorn"></i>

         <h3 class="box-title">Klarifikasi</h3>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <?php foreach ($tanggapan as $tanggapan): ?>
           <blockquote>
                  <p><?= $tanggapan['isi_tanggapan'] ?></p>
                  <small><?php
                  switch ($tanggapan['nama_j']) {
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
                   ?></small>
                </blockquote>
         <?php endforeach; ?>
       </div>
       <!-- /.box-body -->
</div>
