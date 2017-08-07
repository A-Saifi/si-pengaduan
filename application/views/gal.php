<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<head>
  <title>nanoGALLERY</title>
	<style>
		* {font-family: sans-serif; color:#fff;}
		a, h1, h2, h3, h4, h5 {text-align:center; color:#eee;}
		body {background:#333;}
	</style>

  <script src="<?= base_url() ?>adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- nanoGALLERY - default theme css file                                                                                 -->
	<link href="<?= base_url('assets/nano/')  ?>css/nanogallery.css" rel="stylesheet" type="text/css">
	<!-- nanoGALLERY - css file for the theme 'clean'                                                                         -->
	<link href="<?= base_url('assets/nano/')  ?>css/themes/clean/nanogallery_clean.css" rel="stylesheet" type="text/css">
	<!-- nanoGALLERY - css file for the theme 'light'                                                                         -->
	<link href="<?= base_url('assets/nano/')  ?>css/themes/light/nanogallery_light.css" rel="stylesheet" type="text/css">
  <!-- #################################################################################################################### -->

  <!-- #################################################################################################################### -->
	<!-- nanoGALLERY javascript                                                                                               -->
  <!--                                                                                                                      -->
	<script type="text/javascript" src="<?= base_url('assets/nano/')  ?>jquery.nanogallery.js"></script>
  <!--                                                                                                                      -->
  <!-- #################################################################################################################### -->

  <script src="<?= base_url('assets/nano/')  ?>nano.js"></script>

</head>

<!-- <body style="background-color:#fff;"> -->
<body>

	<div style="color:#fff;text-align:center;font-size:4.0em;"><span style="color:#fff;">nano</span><span style="color:#6e6;">GALLERY</span></div>
	<div style="text-align:center;font-size:2em;color:#6e6">jQuery plugin - demonstration page</div>
	<div style="color:#eee;text-align:center;font-size:.9em;"><br>Full nanoGALLERY documentation: <a href="http://www.nanogallery.brisbois.fr">www.nanogallery.brisbois.fr</a></div>
	<br><br><br><br>
	<div style="color:#eee;text-align:center;font-size:1.2em;">Look at the page source code to find useful information.</div>

	<br><br><br><br><br><br><br><br><br>
	<h2 style="background:#555;">----- Possible image sources -----</h2>

	<br><br><h2>Sample #1: item list in options</h2>
	<div id="nanoGallery1"></div>
	<br>
	<div style="background:#eee;padding:'10px';margin:auto;max-width:450px;">
		<br>
		<div id="nanoGallery1a"></div>
		<br>
	</div>



	<br><br><h2>Sample #3: Picasa/Google+</h2>
	<!-- <div style="margin:auto;max-width:960px;"> -->
  <button id="btnPicasaOpen" "type="button" style="color:#000;padding:4px;">&nbsp; open image &nbsp;</button>
	<div>
		<div id="nanoGallery3"></div>
	</div>
  <br><br><br>
	<div style="margin:auto;max-width:960px;background:#fff;color:#f00;padding:1px;">
    <div style="margin:10px;">
      <button id="btnReload" "type="button" style="color:#000;padding:4px;">&nbsp; reload &nbsp;</button>
      <button id="btnCountSelected" "type="button" style="color:#000;padding:4px;">&nbsp; count selected items &nbsp;</button>
      <button id="btnUnselect" "type="button" style="color:#000;padding:4px;">&nbsp; Unselect selected items &nbsp;</button>
    </div>
		<br><br><br>
    <div id="nanoGallery3a"></div>
    <br><br><br>
	</div>

	<br><br><h2>Sample #4: Flickr</h2>
	<div style="margin:auto;max-width:600px;">
		<div id="nanoGallery4"></div>
	</div>


	<br><br><br><br><br><br><br><br><br>
	<h2 style="background:#555;">----- Multi-level navigation and pagination (API) -----</h2><br><br>
    <div style="margin:10px;">
      <button id="btnPaginationCount" "type="button" style="color:#000;padding:4px;">&nbsp; Pagination - count &nbsp;</button>
      <button id="btnPaginationNext" "type="button" style="color:#000;padding:4px;">&nbsp; Pagination - next &nbsp;</button>
      <button id="btnPaginationPrevious" "type="button" style="color:#000;padding:4px;">&nbsp; Pagination - previous &nbsp;</button>
      <button id="btnPaginationGoto" "type="button" style="color:#000;padding:4px;">&nbsp; Pagination - goto page 2 &nbsp;</button>
    </div>
	<div id="nanoGalleryMLN"></div>


	<br><br><br><br><br><br><br><br><br>
	<h2 style="background:#555;">----- Thumbnails configuration demo -----</h2><br><br>

	<div id="nanoGalleryAnimation1" style="margin:50px">
    <a href="image_01.jpg" data-ngThumb="image_01ts.jpg" data-ngDesc="Lorem ipsum dolor sit amet, consectetur adipiscing elit.">Image 1</a>
    <a href="image_02.jpg" data-ngThumb="image_02ts.jpg">Image 2</a>
    <a href="image_03.jpg" data-ngThumb="image_03ts.jpg">Image 3</a>
  </div>


	<br><br><h5>by <a href="https://plus.google.com/111186676244625461692?rel=author">Christophe Brisbois</a></h5>
</body>
</body>
</html>
