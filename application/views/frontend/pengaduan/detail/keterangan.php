<div class="modal fade" id="myModal" role="dialog" >
  <div class="modal-dialog">
              <div class="modal-content" style="background: #ecf0f5;">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span></button>
                  <h4 class="modal-title"><i class="fa fa-tasks"></i> Status Pengaduan</h4>
                </div>
                <div class="modal-body">

                  <?php if ($status!=null): ?>

                    <ul class="timeline">
                      <?php $tanggal=''; ?>
                    <?php foreach ($status as $item): ?>
                      <!-- timeline time label -->
                      <?php if ($item['tanggal_status']!=$tanggal): ?>
                        <li class="time-label">
                              <span class="bg-red">
                                <?= date('d M Y', strtotime($item['tanggal_status']))  ?>
                              </span>
                        </li>
                      <?php endif; ?>
                      <?php $tanggal = $item['tanggal_status']; ?>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->

                      <li>
                        <i class="fa fa-check bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> <?= date('G:i', strtotime($item['waktu_status'])) ?></span>

                          <h3 class="timeline-header no-border"><a href="#"><?= ucwords($item['kategori'])  ?>: </a> <?= $item['nama_status']  ?></h3>
                        </div>
                      </li>
                      <!-- END timeline item -->
                    <?php endforeach; ?>

                    <li>
                      <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                  </ul>

                  <?php else: ?>

                  <?php endif; ?>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
</div>


<div class="box box-primary">
      <div class="box-header with-border">
        <!-- <h3 class="box-title">Detail Pengaduan</h3> -->
        <div class="user-block">
          <img class="img-circle" src="<?= base_url('assets/image/avatars/users/').$this->load_data->avatar($pengaduan['id_pdk'])  ?>" alt="User Image">
          <span class="username"><a href="<?= base_url('penduduk/profile/'.$pengaduan['id_pdk'])  ?>"><?= ucwords(strtolower($pengaduan['nama_pdk']))  ?></a></span>
          <span class="description"><?= date('G:i', strtotime($pengaduan['waktu_pengaduan'])) ?> - <?= date('d M Y', strtotime($pengaduan['tanggal_pengaduan'])) ?> - <?= ucwords($alamat['nama_kel']) ?></span>
        </div>
        <div class="box-tools pull-right">
          <?php  if ($pengaduan['status_pengaduan']=="belum valid") {
            echo '<button type="button" class="btn btn-warning btn-xs">Belum valid</button>';
          }
          if ($pengaduan['status_pengaduan']=="valid" || $pengaduan['status_pengaduan']=="ok") {
              echo '<a href="#" type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal">Lihat Status</a>';
          }
          if ($pengaduan['status_pengaduan']=="tidak valid") {
              echo '<button type="button" class="btn btn-danger btn-xs">Tidak valid</button>';
          }
            ?>
          <?php if ($pengaduan['id_pdk']==$pengguna['id_pdk'] && $pengaduan['status_pengaduan']=="belum valid"): ?>
            <button type="button" class="btn btn-box-tool" onclick="location.href=<?= '\''.base_url().'pengaduan/edit/'.$pengaduan['id_pengaduan'].'\''  ?>"><i class="fa fa-edit"> Edit</i></button>
          <?php endif; ?>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <p>
          <b>
          <?= ucwords(strtolower($pengaduan['judul_pengaduan']))  ?>
          </b>
        </p>

        <p><?=  $pengaduan['isi_pengaduan'] ?></p>
      </div>
      <div class="box-footer">
        <i class="fa fa-tag"></i> Kategori : <?= ucwords(strtolower($pengaduan['nama_kategori']))  ?>
      </div>
      <!-- /.box-body -->
    </div>
