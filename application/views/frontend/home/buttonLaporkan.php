<div class="box box-default">
       <div class="box-header ui-sortable-handle">
         <i class="fa fa-file-text-o"></i>

         <h3 class="box-title">Laporan Pengaduan Masyarakat</h3>
       </div>

       <div class="box-body">
         <div class="post">
           <button type="button" class="btn btn-block bg-primary" data-toggle="modal" data-target="#myModal">Memiliki Keluhan ? Laporkan Sekarang!</button>
           <!-- Menu Kategori -->
           <div id="myModal" class="modal fade" role="dialog">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title">Pilih Kategori Pengaduan</h4>
                 </div>
                 <div class="modal-body">
                   <ul class="users-list clearfix">
                     <?php foreach ($kategori as $k): ?>

                     <li>
                       <a href="<?= base_url('pengaduan/tambah/').$k['id_kategori'] ?>"><img src="<?= base_url()  ?>assets/image/kategori/<?= $k['icon_kategori'] ?>" alt="User Image" width="128" height="128"></a>
                       <a class="users-list-name" href="<?= base_url('pengaduan/tambah/').$k['id_kategori'] ?>">Pilih</a>
                       <span class="users-list-date"><?= $k['nama_kategori'] ?></span>
                     </li>

                     <?php endforeach; ?>
                   </ul>
                 </div>
                 <div class="modal-footer">
                   <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>

                 </div>
               </div>

             </div>

           </div>
          <!-- Akhir Menu Kategori -->
         </div>

         <!-- Pengaduan -->



         <!-- Akhir Pengaduan -->
       </div>

</div>
