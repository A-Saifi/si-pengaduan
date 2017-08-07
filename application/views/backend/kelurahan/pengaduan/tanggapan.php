<div class="box box-default">
       <div class="box-header with-border">
         <i class="fa fa-bullhorn"></i>

         <h3 class="box-title">Klarifikasi</h3>

         <div class="box-tools">
           <?php $jabatan = $this->session->userdata('admin'); ?>
           <?php foreach ($tanggapan as $t): ?>
             <?php if ($t['id_rj']==$jabatan['id_rj']): ?>
               <?php $this->view('backend/kelurahan/tanggapan/form_edit', ['tanggapan' => $t,]) ?>
               <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#<?= $t['id_tanggapan']  ?>"><i class="fa fa-edit"> Edit Tanggapan</i></button>
             <?php endif; ?>
           <?php endforeach; ?>
         </div>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <?php foreach ($tanggapan as $tanggapan): ?>
           <blockquote>
                  <p><?= $tanggapan['isi_tanggapan'] ?></p>
                  <small><?php
                  switch (strtolower($tanggapan['nama_j'])) {
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
