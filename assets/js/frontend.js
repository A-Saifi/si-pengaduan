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
