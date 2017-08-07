<style>
      #map {
        height: 500px;
        width: 100%;
       }
    </style>
<div class="box box-default">
       <div class="box-header with-border">
         <i class="fa fa-map-o"></i>

         <h3 class="box-title">Lokasi Pengaduan masyarakat</h3>
       </div>
       <!-- /.box-header -->
       <div class="box-body">


         <form class="" action="<?= base_url('lokasi/pengaduan') ?>" method="get">
           <div class="row">
               <div class="col-xs-3">
                 <label for="">Kelurahan</label>
                 <select class="form-control" name="kelurahan">
                   <option value="all">Semua</option>
                   <?php foreach ($kelurahan as $kel): ?>
                     <?php if ($this->input->get('kelurahan')!=null){
                       $selected = ($this->input->get('kelurahan') == $kel['id_kel']) ? 'selected' : '';
                     } ?>
                     <option <?= $selected  ?> value="<?= $kel['id_kel']  ?>"><?= $kel['nama_kel']  ?></option>
                   <?php endforeach; ?>
                 </select>
               </div>
                <div class="col-xs-3">
                  <label for="">Kategori</label>
                  <select class="form-control" name="kategori">
                    <option value="all">Semua</option>
                    <?php foreach ($kategori as $key): ?>
                      <?php if ($this->input->get('kategori')!=null){
                        $selected2 = ($this->input->get('kategori') == $key['id_kategori']) ? 'selected' : '';
                      } ?>
                        <option <?= $selected2  ?> value="<?= $key['id_kategori']  ?>"><?= ucwords(strtolower($key['nama_kategori']))  ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-xs-2">
                  <label for="">Bulan</label>

                    <!-- displaying the dropdown list -->
                    <select name="bulan" class="form-control">
                      <option value="all">Semua</option>
                      <?php

                        $month = strtotime('january');
                        $end = strtotime('december');
                        while($month < $end){
                            if ($this->input->get('bulan')!=null) {
                              $selected3 = ($this->input->get('bulan')==date('n', $month))? ' selected' :'';
                            }
                            //$selected = (date('F', $month)==date('F'))? ' selected' :'';
                            echo '<option '.$selected3.' value="'.date('n', $month).'">'.date('F', $month).'</option>'."\n";
                            $month = strtotime("+1 month", $month);
                        }


                      ?>
                    </select>

                </div>
                <div class="col-xs-2">
                  <label for="">Tahun</label>
                  <select class="form-control" name="tahun">
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                  </select>
                </div>

                <div class="col-xs-2">
                  <label for="">_</label>
                  <button type="submit" name="tampil" value="ya" class="btn btn-block btn-primary">Tampilkan</button>
                </div>

              </div>

         </form>
         <hr>
         <div id="map"></div>
          <script>
            function initAutocomplete() {
              var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -7.6483506, lng: 110.8552919},
                zoom: 12,
                mapTypeId: 'roadmap'
              });
              var infowindow = new google.maps.InfoWindow();
              var service = new google.maps.places.PlacesService(map);

              var myIcon = new google.maps.MarkerImage('http://www.myiconfinder.com/uploads/iconsets/256-256-a5485b563efc4511e0cd8bd04ad0fe9e.png', null, null, null, new google.maps.Size(33,30));

              <?php foreach ($pengaduanku as $pengaduan): ?>
              <?php if ($pengaduan['LAT1']!=null): ?>

              marker<?= $pengaduan['id_pengaduan']  ?> = new google.maps.Marker({
                map:map,
                // draggable:true,
                // animation: google.maps.Animation.DROP,
                position: new google.maps.LatLng(<?= $pengaduan['LAT1'] ?>, <?= $pengaduan['LNG1'] ?>),
                icon: myIcon  // null = default icon
              });

              var contentString<?= $pengaduan['id_pengaduan']  ?> = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h3 id="firstHeading" class="firstHeading"><?= $pengaduan['judul_pengaduan'] ?> <small><?= $pengaduan['nama_kategori'] ?></small></h3>'+
            '<div id="bodyContent">'+
            '<p><?= $pengaduan['isi_pengaduan'] ?>... <a href="<?= base_url('pengaduan/detail/'.$pengaduan['id_pengaduan']) ?>">lihat selengkapnya</a></p>'+
            '</div>'+
            '</div>';

              var infowindow<?= $pengaduan['id_pengaduan']  ?> = new google.maps.InfoWindow({
                content: contentString<?= $pengaduan['id_pengaduan']  ?>
              });

              marker<?= $pengaduan['id_pengaduan']  ?>.addListener('click', function() {
                infowindow<?= $pengaduan['id_pengaduan']  ?>.open(map, marker<?= $pengaduan['id_pengaduan']  ?>);
              });

              <?php endif; ?>
              <?php endforeach; ?>

            }
          </script>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsO0a7uaY6KybdAWClaecdjoEtrJQCh14&libraries=places&callback=initAutocomplete"
               async defer></script>
       </div>


       <!-- /.box-body -->
</div>
