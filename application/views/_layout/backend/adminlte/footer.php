</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.3.8
  </div>
  <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
  reserved.
</footer>

<!-- Control Sidebar -->
<!-- <aside class="control-sidebar control-sidebar-dark">


</aside>

Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<script src="<?= base_url() ?>adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= base_url() ?>adminlte/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url() ?>adminlte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>adminlte/plugins/fastclick/fastclick.js"></script>
<script src="<?= base_url() ?>adminlte/plugins/morris/morris.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>adminlte/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>adminlte/dist/js/demo.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!-- page script -->
<?php if (isset($script)): ?>
<script src="<?= base_url('assets/js/').$script.'.js'  ?>"></script>
<?php endif; ?>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

  });

</script>

<?php if (isset($pengaduan_chart)): ?>
<script>
var line = new Morris.Line({
  element: 'line-chart',
  resize: true,
  data: [
    <?php for ($i=1; $i <= 12 ; $i++) { ?>
      {
        m: '2017-<?= $i  ?>',
        a: <?= count($this->load_data_admin->pengaduan_perbulan($alamat['id_kab'],$i)) ?>,
      },
    <?php } ?>
   ],
xkey: 'm',
ykeys: ['a'],
labels: ['Total'],

});

var bar = new Morris.Bar({
  element: 'bar-chart',
  resize: true,
  data: [

    <?php foreach ($kategori as $key): ?>
      {y: '<?= $key['nama_kategori']  ?>', a: <?= count($this->load_data_admin->pengaduan_kategori($alamat['id_kab'],$key['id_kategori'])) ?>,},
    <?php endforeach; ?>
  ],
  barColors: ['#00a65a'],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['Total '],
  hideHover: 'auto',
  parseTime: false,
});
</script>
<?php endif; ?>

</body>
</html>
