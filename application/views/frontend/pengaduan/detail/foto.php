  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-image"></i> Foto Pengaduan</h3>
      <div class="box-tools pull-right">
        <!-- Buttons, labels, and many other things can be placed here! -->
        <!-- Here is a label for example -->
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
      <script>
      $(document).ready(function () {
      jQuery("#gambar").nanoGallery({thumbnailWidth: 'auto', thumbnailHeight: 250,
        itemsBaseURL: "<?= base_url() ?>assets/image/pengaduan",
        thumbnailHoverEffect:[{'name':'scaleLabelOverImage','duration':300},{'name':'borderLighter'}],
        colorScheme:'light',
        locationHash: false,
        thumbnailLabel:{display:true,position:'overImageOnTop', align:'center'},
        viewerDisplayLogo:true,
        thumbnailLabel:{display:true,position:'overImageOnMiddle', align:'center'}
      });
       });
      </script>

      <div id="gambar" >
        <?php foreach ($gambar as $photo): ?>
          <a href="<?= $photo['nama_gambar']  ?>" data-ngthumb="<?= $photo['nama_gambar']  ?>">Photo</a>
        <?php endforeach; ?>
      </div>

    </div><!-- /.box-body -->
    <!-- <div class="box-footer">
      The footer of the box
    </div> -->
    <!-- box-footer -->
  </div><!-- /.box -->
