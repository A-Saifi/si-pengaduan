<script type="text/javascript">

  // This example adds a search box to a map, using the Google Place Autocomplete
  // feature. People can enter geographical searches. The search box will return a
  // pick list containing a mix of places and predicted search terms.

  // This example requires the Places library. Include the libraries=places
  // parameter when you first load the API. For example:
  // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

  function initAutocomplete() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: { lat: <?php if ($pengaduan['LAT']!=null) {echo $pengaduan['LAT'];}else { echo $pengguna['LAT']; } ?>,
                lng: <?php if ($pengaduan['LNG']!=null) {echo $pengaduan['LNG'];}else { echo $pengguna['LNG']; } ?>},
      zoom: 15,
      mapTypeId: 'roadmap'
    });

   var marker = new google.maps.Marker({
   position:{ lat: <?php if ($pengaduan['LAT']!=null) {echo $pengaduan['LAT'];}else { echo $pengguna['LAT']; } ?>,
              lng: <?php if ($pengaduan['LNG']!=null) {echo $pengaduan['LNG'];}else { echo $pengguna['LNG']; } ?>},
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
