<style>
      #map {
        height: 300px;
        width: 100%;
       }
    </style>
<div class="box box-default">
       <div class="box-header with-border">
         <i class="fa fa-map-marker"></i>

         <h3 class="box-title">Lokasi Kejadian</h3>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <?php if ($pengaduan['LAT']!=null && $pengaduan['LNG']!=null): ?>
         <div id="map"></div>
          <script>
            function initAutocomplete() {
              var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: <?= $pengaduan['LAT'] ?>, lng: <?= $pengaduan['LNG'] ?>},
                zoom: 17,
                mapTypeId: 'roadmap'
              });
              var infowindow = new google.maps.InfoWindow();
              var service = new google.maps.places.PlacesService(map);

              service.getDetails({
                placeId: 'ChIJN1t_tDeuEmsRUsoyG83frY4'
              }, function(place, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                  var marker = new google.maps.Marker({
                    map: map,
                    position: {lat: <?= $pengaduan['LAT'] ?>, lng: <?= $pengaduan['LNG'] ?>}
                  });
                  google.maps.event.addListener(marker, 'click', function() {
                    infowindow.setContent("<div><strong>[<?= $pengaduan['nama_kategori'] ?>]</strong>"+
                    " <?= ucwords(strtolower($pengaduan['judul_pengaduan'])) ?>"+
                    "<br><?= $pengaduan['isi_pengaduan'] ?></div>");
                    infowindow.open(map, this);
                  });
                }
              });

            }
          </script>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsO0a7uaY6KybdAWClaecdjoEtrJQCh14&libraries=places&callback=initAutocomplete"
               async defer></script>

               <hr>

               <div class="col-md-6">
                 <div class="form-group">
                   <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                     <input class="form-control" type="text" name="LAT2" id="latbox" readonly="readonly" value="<?= $pengaduan['LAT']  ?>">
                   </div>
                   </div>
               </div>
               <div class="col-md-6">
                 <div class="form-group">
                   <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                     <input class="form-control" type="text" name="LNG2" id="lngbox" readonly="readonly" value="<?= $pengaduan['LNG']  ?>">
                   </div>
                 </div>
               </div>
              <?php else: ?>
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-info"></i> Maaf!</h4>
                    Lokasi kejadian tidak dicantumkan.
                  </div>
              <?php endif; ?>

       </div>
       <!-- /.box-body -->
</div>
