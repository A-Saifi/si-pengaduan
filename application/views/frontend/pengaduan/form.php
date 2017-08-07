<?php $this->view('frontend/pengaduan/cssMap') ?>
<section class="content">
	<div class="row">

    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Form Pengaduan</h3>
        </div>
        <div class="box-body">

              <?php echo form_open_multipart('pengaduan/tambah/'.$kategori['id_kategori'], array('name' => 'pengaduan', 'onsubmit' => 'return validate()')); ?>

                    <!-- <label for="kategori">Id Kategori : </label> -->
          					<input class="form-control" type="hidden" name="id_kategori" value="<?= $kategori['id_kategori'] ?>" />

                    <!-- <label for="type">TYPE : </label> -->
                    <input class="form-control" type="hidden" name="TYPE" value="Pengaduan" />

                    <input class="form-control" type="hidden" name="LAT" id="latbox2" readonly="readonly">

                    <input class="form-control" type="hidden" name="LNG" id="lngbox2" readonly="readonly">

                    <div class="form-group">
                      <label >Judul Pengaduan</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
              					<input class="form-control" type="text" name="judul_pengaduan" value="<?php echo $this->input->post('judul_pengaduan'); ?>" placeholder="Judul Pengaduan" id="judul" />
                      </div>
                    </div>

                    <div class="form-group">
                      <label >Kategori Pengaduan</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-tag"></i></span>
              					<input class="form-control" type="text" name="" value="<?= $kategori['nama_kategori'] ?>"  readonly="readonly"/>
                      </div>
                    </div>

                    <div class="form-group">
                      <label >Isi Pengaduan</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>
                      <textarea class="form-control" name="isi_pengaduan" rows="5%"><?php echo $this->input->post('isi_pengaduan'); ?></textarea>
                    </div>
            				</div>

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
                    <button type="submit" class="btn btn-primary pull-left" id="i_submit">Kirim</button>

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
										<!-- <button class="btn btn-danger pull-right" onclick="window.location.href='<?= base_url() ?>'">Batalkan</button> -->
										<a href="<?= base_url() ?>" class="btn btn-danger pull-right">Batalkan</a>
                  </div>
                  <?php echo form_close(); ?>



        </div>
      </div>

		</div>

    <div class="col-md-6">

           <div class="box">
             <div class="box-header with-border">
               <h3 class="box-title">Pilih Lokasi <small>(Optional)</small></h3>
             </div>
             <div class="box-body">

                 		<div class="form-group">
                      <input id="pac-input" class="form-control" type="text" placeholder="Cari Lokasi">
                 		</div>

                    <div class="form-group">
                      <div id="map" style="width:100%;height:300px;"></div>
                    </div>

                    <hr>

                    <div class="col-md-6">
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                          <input class="form-control" type="text" name="LAT2" id="latbox" readonly="readonly">
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                          <input class="form-control" type="text" name="LNG2" id="lngbox" readonly="readonly">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-info"></i> Informasi</h4>
                        Disini akan diisi informasi tentang cara menggunakan google map api.
                      </div>
                    </div>

             </div>
           </div>

		</div>

	</div>
</section>

<script type="text/javascript">

  // This example adds a search box to a map, using the Google Place Autocomplete
  // feature. People can enter geographical searches. The search box will return a
  // pick list containing a mix of places and predicted search terms.

  // This example requires the Places library. Include the libraries=places
  // parameter when you first load the API. For example:
  // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

  function initAutocomplete() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: <?= $lokasi['LAT'] ?>, lng: <?= $lokasi['LNG'] ?>},
      zoom: 15,
      mapTypeId: 'roadmap'
    });

   var marker = new google.maps.Marker({
   position:{lat: <?= $lokasi['LAT'] ?>, lng: <?= $lokasi['LNG'] ?>},
   map: map,
   draggable: true,
   title: 'Tekan dan tahan untuk memilih lokasi'
   });


  //  google.maps.event.addListener(marker, 'click', function (event) {
  //  document.getElementById("latbox2").value = event.latLng.lat();
  //  document.getElementById("lngbox2").value = event.latLng.lng();
  //  });
   //
  //   google.maps.event.addListener(marker, 'click', function (event) {
  //   document.getElementById("latbox").value = this.getPosition().lat();
  //   document.getElementById("lngbox").value = this.getPosition().lng();
  //   });

    google.maps.event.addListener(marker, 'dragend', function (event) {
    document.getElementById("latbox2").value = event.latLng.lat();
    document.getElementById("lngbox2").value = event.latLng.lng();
    });

     google.maps.event.addListener(marker, 'dragend', function (event) {
     document.getElementById("latbox").value = this.getPosition().lat();
     document.getElementById("lngbox").value = this.getPosition().lng();
     });

    //  document.getElementById('LA').value =  marker.getPosition().lat();
    //  document.getElementById('LN').value =  marker.getPosition().lng();



    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
      searchBox.setBounds(map.getBounds());
    });

    var markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
      var places = searchBox.getPlaces();

      if (places.length == 0) {
        return;
      }

      // Clear out the old markers.
     //  markers.forEach(function(marker) {
     //    marker.setMap(null);
     //  });
     //  markers = [];

      // For each place, get the icon, name and location.
      var bounds = new google.maps.LatLngBounds();
      places.forEach(function(place) {
        if (!place.geometry) {
          console.log("Returned place contains no geometry");
          return;
        }
        var icon = {
          url: place.icon,
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(25, 25)
        };

        // Create a marker for each place.
        // markers.push(new google.maps.Marker({
        //   map: map,
        //   icon: icon,
        //   title: place.name,
        //   position: place.geometry.location
        // }));

        if (place.geometry.viewport) {
          // Only geocodes have viewport.
          bounds.union(place.geometry.viewport);
        } else {
          bounds.extend(place.geometry.location);
        }
        marker.setPosition(place.geometry.location);
        var location = place.geometry.location;
        document.getElementById("latbox2").value = location.lat();
        document.getElementById("lngbox2").value = location.lng();
        document.getElementById("latbox").value = location.lat();
        document.getElementById("lngbox").value = location.lng();
      });

      map.setCenter(bounds.getCenter());
      marker.setMap(map);

    });
  }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsO0a7uaY6KybdAWClaecdjoEtrJQCh14&libraries=places&callback=initAutocomplete"
     async defer></script>
