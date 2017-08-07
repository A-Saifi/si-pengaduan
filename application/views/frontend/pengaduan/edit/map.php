<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Edit Lokasi <small>(Optional)</small></h3>
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

         <div class="col-md-12">
           <div class="alert alert-info alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
             <h4><i class="icon fa fa-info"></i> Informasi</h4>
             Disini akan diisi informasi tentang cara menggunakan google map api.

           </div>
         </div>

  </div>
</div>
