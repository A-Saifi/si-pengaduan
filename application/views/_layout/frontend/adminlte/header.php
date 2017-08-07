<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    <?php if (isset($tittle)) {
      echo $tittle;
    }else {
      echo "New Page";
    } ?>
  </title>

  <link rel="icon" href="<?=base_url()?>/favicon.ico" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?= base_url() ?>adminlte/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Fuckin' Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>adminlte/dist/css/AdminLTE.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>adminlte/dist/css/skins/_all-skins.min.css">


  <script src="<?= base_url() ?>adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>

  	<link href="<?= base_url('assets/nano/')  ?>css/nanogallery.css" rel="stylesheet" type="text/css">

  	<link href="<?= base_url('assets/nano/')  ?>css/themes/clean/nanogallery_clean.css" rel="stylesheet" type="text/css">

  	<link href="<?= base_url('assets/nano/')  ?>css/themes/light/nanogallery_light.css" rel="stylesheet" type="text/css">

  	<script type="text/javascript" src="<?= base_url('assets/nano/')  ?>jquery.nanogallery.js"></script>

    <?php if (isset($fungsi)): ?>
      <script type="text/javascript" src="<?= $fungsi ?>"></script>
    <?php endif; ?>



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="layout-top-nav skin-blue layout-boxed">
  <div class="wrapper">

    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="<?= base_url() ?>" class="navbar-brand"><b>LAPOR</b>KAN</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">

            <form class="navbar-form navbar-left" role="search" action="<?= base_url('cari/pengaduan')  ?>" method="get">
              <div class="input-group input-group-sm">
                <input type="text" class="form-control" name="keyword">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i></button>
                    </span>
              </div>
            </form>
          </div>
          <!-- /.navbar-collapse -->
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- /.messages-menu -->

              <!-- Notifications Menu -->

              <!-- Tasks Menu -->

              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?= base_url('assets/image/avatars/users/').$this->load_data->avatar($userdata['id_pdk'])  ?>" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <?php $arr = explode(' ',trim($userdata['nama_pdk'])); ?>
                  <span class="hidden-xs"><?= ucwords(strtolower($arr[0])) ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="<?= base_url('assets/image/avatars/users/').$this->load_data->avatar($userdata['id_pdk'])  ?>" class="img-circle" alt="User Image">

                    <p>
                      <?= ucwords(strtolower($userdata['nama_pdk'])) ?>
                      <small><?= ucwords(strtolower($userdata['pekerjaan_pdk'])) ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- <li class="user-body">
                    <div class="row">
                      <div class="col-xs-4 text-center">
                        <a href="#">Follows</a>
                        <center>1</center>
                      </div>
                      <div class="col-xs-4 text-center">

                      </div>
                      <div class="col-xs-4 text-center">
                        <a href="#">Followers</a>
                        <center>123</center>
                      </div>
                    </div> -->
                    <!-- /.row -->
                  <!-- </li> -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?= base_url() ?>penduduk/profile/<?= $userdata['nik_pdk'] ?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?= base_url() ?>logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
