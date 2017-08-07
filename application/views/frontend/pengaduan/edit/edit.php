<?php $this->view('frontend/pengaduan/cssMap') ?>
<section class="content">
	<div class="row">
    <?php echo form_open_multipart('pengaduan/edit/'.$pengaduan['id_pengaduan'], array('name' => 'pengaduan', 'onsubmit' => 'return validate()')); ?>
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Pengaduan</h3>
        </div>
        <div class="box-body">

                    <!-- <label for="kategori">Id Kategori : </label> -->


                    <!-- <label for="type">TYPE : </label> -->
                    <input class="form-control" type="hidden" name="TYPE" value="Pengaduan" />

                    <input class="form-control" type="hidden" name="LAT" id="latbox2" value="<?= $pengaduan['LAT']  ?>">

                    <input class="form-control" type="hidden" name="LNG" id="lngbox2" value="<?= $pengaduan['LNG']  ?>">

                    <div class="form-group">
                      <label >Judul Pengaduan</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
              					<input class="form-control" type="text" name="judul_pengaduan" value="<?= $pengaduan['judul_pengaduan']  ?>" placeholder="Judul Pengaduan" id="judul" />
                      </div>
                    </div>

                    <div class="form-group">
                      <label >Kategori Pengaduan</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                        <select class="form-control" name="id_kategori">
                          <?php foreach ($kategori as $k): ?>
                            <?php if ($pengaduan['id_kategori']==$k['id_kategori']): ?>
                              <option value="<?= $k['id_kategori'] ?>" selected><?= $k['nama_kategori'] ?></option>
                            <?php else: ?>
                              <option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
                            <?php endif; ?>
                          <?php endforeach; ?>

                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label >Isi Pengaduan</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>
                      <textarea class="form-control" name="isi_pengaduan" rows="5%"><?= $pengaduan['isi_pengaduan']  ?></textarea>
                    </div>
            				</div>


        </div>
      </div>

      <div class="box">
            <div class="box-header">
            <h3 class="box-title">Daftar Gambar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

							<?php if ($this->load_data->gambar($pengaduan['id_pengaduan'])!=null) {
								$this->view('frontend/pengaduan/edit/tabelGambar');
							} ?>

              <div class="form-group">
                <label for="gambar">Tambahkan Foto <small>(Optional)</small></label>
                <div class="input-group">
                  <label class="btn btn-default btn-file">
                      Pilih Photo <input multiple="1" onchange="readURL(this);" id="uploadedImages" name="gambar[]" type="file" hidden>
                  </label> <small class="text-red"> Per-file max 2MB</small>


                </div>
              </div>

              <hr>
              <div id ="up_images" class="text-center"></div>

            <script type="text/javascript">

              var readURL = function(input) {
                  $('#up_images').empty();
                  var number = 0;
                  $.each(input.files, function(value) {
                      var reader = new FileReader();
                      reader.onload = function (e) {
                          var id = (new Date).getTime();
                          number++;
                          $('#up_images').prepend(
                            '<img id='+id+
                            ' src='+e.target.result+' width="220px" height="220px" data-index='+number+
                            ' onclick="removePreviewImage('+id+')" class="img-thumbnail" style="margin:10px 10px 10px 10px" />'
                          )
                      };
                      reader.readAsDataURL(input.files[value]);
                      });
                }

            </script>

              <hr>

              <div class="form-group">

								<script type="text/javascript">
									function AlertIt() {
									var answer = confirm ("Yakin untuk menghapus pengaduan ini ?")
									if (answer)
									window.location.href="<?= base_url('pengaduan/hapus/').$pengaduan['id_pengaduan'] ?>";
									}
								</script>

								<a href="javascript:AlertIt();" class="btn btn-danger pull-right">Hapus</a>
                <button type="submit" class="btn btn-primary pull-left">Simpan</button>

								<script type="text/javascript">
								 function validate(){
										//check whether browser fully supports all File API
										if (window.File && window.FileReader && window.FileList && window.Blob)
										{
												//get the file size and file type from file input field
												var fsize = $('#uploadedImages')[0].files[0].size;

												if(fsize>1048576) //do something if file size more than 1 mb (1048576)
												{
														alert("Gambar dengan ukuran "+ fsize +" bites\nTerlalu besar! Silahkan mengganti dengan yang lebih kecil");
														return false;
												}else{
														//alert(fsize +" bites\nYou are good to go!");
														return true;
												}
										}else{
												alert("Please upgrade your browser, because your current browser lacks some new features we need!");
												return true;
										}
									}
								</script>
              </div>

            </div>
            <!-- /.box-body -->
          </div>
  <?php echo form_close(); ?>

		</div>

    <div class="col-md-6">

      	<?php $this->view('frontend/pengaduan/edit/map'); ?>

		</div>

	</div>
</section>
<?php $this->view('frontend/pengaduan/edit/mapJS'); ?>
