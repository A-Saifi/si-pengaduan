<div class="content">
  <div class="row">
    <div class="col-md-3">
      <?php $this->view('frontend/nav'); ?>
    </div>
    <div class="col-md-9">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Donut Chart</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body chart-responsive">
          <!-- <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div> -->
          <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                Masih dalam proses rekonstruksi.
              </div>
        </div>
        <!-- /.box-body -->
      </div>

      <!-- <?php foreach ($kecamatan as $k): ?>
        <?php echo $k['nama_kec'].' : '.$this->load_data->hitung_pengaduan_kecamatan($k); ?>
      <?php endforeach; ?> -->
    </div>
  </div>
</div>
