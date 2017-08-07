<div class="box box-default">
       <div class="box-header ui-sortable-handle">
         <i class="fa fa-file-text-o"></i>

         <h3 class="box-title">Hasil Pencarian Pengaduan</h3>
       </div>

       <div class="box-body">
         <div class="post">

           <p>Keyword : <?= $this->input->get('keyword') ?></p>

           <?php if ($pengaduan==null): ?>
             <center><h4>Tidak ditemukan</h4></center>
           <?php endif; ?>

         </div>

         <!-- Pengaduan -->



         <!-- Akhir Pengaduan -->
       </div>

</div>
