<div class="box box-default">
       <div class="box-header with-border">
         <i class="fa fa-map-marker"></i>

         <h3 class="box-title">Lokasi Kejadian</h3>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
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
       </div>
       <!-- /.box-body -->
</div>
