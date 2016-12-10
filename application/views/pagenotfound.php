<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Biro Jasa </title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

  <link href="<?php echo base_url(); ?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/icheck/flat/green.css" rel="stylesheet">


  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

  <div class="container body">

    <div class="main_container">

      <!-- page content -->
      <div class="col-md-12">
        <div class="col-middle">
          <div class="text-center text-center">
            <h1 class="error-number">404</h1>
            <h2>Halaman Yang Anda Cari Tidak Ada</h2>
            <p>Silahkan Cek Kembali Link Yang Anda Masukkan
            </p>
            <p><a href="<?php echo site_url('birojasa'); ?>"></a></p>
            <div class="mid_center">
              <h3>Search</h3>
              <form>
                <div class="col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->

    </div>
    <!-- footer content -->
  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

  <!-- bootstrap progress js -->
  <script src="<?php echo base_url(); ?>assets/js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="<?php echo base_url(); ?>assets/js/icheck/icheck.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
  <!-- pace -->
  <script src="<?php echo base_url(); ?>assets/js/pace/pace.min.js"></script>
  <!-- /footer content -->
</body>

</html>
