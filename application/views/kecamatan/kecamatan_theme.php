
<?php 
$userdata = $this->session->userdata('kec_login');
?>

<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title><?php echo $title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
	  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
	  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome -->
	  <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Theme style -->
	  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
	  
	  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/select2.min.css'); ?>">
        
       <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrapValidator.min.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
folder instead of downloading all of them to reduce the load. -->
	  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css'); ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->




<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-dialog.min.css">


    
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <!-- mask -->
    <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/plugins/fastclick/fastclick.min.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/dist/js/app.min.js'); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('assets/dist/js/demo.js'); ?>"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap-dialog.min.js"></script>



	</head>
	<body class="hold-transition skin-blue sidebar-mini">
	  <!-- Site wrapper -->
	  <div class="wrapper"> 

		<header class="main-header">
        <!-- Logo -->
		  <a href="<?php echo site_url('kecamatan'); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><b>K</b>c</span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><b>Kecamatan </b></span>
		  </a>
        <!-- Header Navbar: style can be found in header.less -->
		  <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			</a>
			<div class="navbar-custom-menu">
			  <ul class="nav navbar-nav">
				  <!-- User Acount -->
				  <li class="dropdown user user-menu">
				  	<a href="#" class="dropdown-toggle" data-toggle = "dropdown"><i class="glyphicon glyphicon-user"></i><span class="hidden-xs"><?php echo $userdata['nama'] ?></span></a>
				  	<ul class="dropdown-menu">
					  <li class="user-header">
							<p><?php echo $userdata['nama'] ?>
						  	<small><?php echo $userdata['username'] ?></small>
								</p>
								<p><h2 style="color: white;">Admin Kecamatan</h2></p>
						</li>	
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo site_url('kecamatan_profile'); ?>" class="btn btn-default btn-flat">Pengaturan</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo site_url('login/logout_kecamatan'); ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
					  </ul>
				  </li>
				  
						
				  <!-- Control Sidebar Toggle Button -->
				  <li>
					<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
				  </li>
			  </ul>
			</div>
		  </nav>
		</header>

      
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="<?php echo site_url('kecamatan'); ?>">
                <i class="fa fa-home"></i> <span>Dashboard</span></i>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('regis_kec'); ?>"><i class="fa fa-folder"></i> Data Pertanahan</a></li>
                <li><a href="<?php echo site_url('pelepasan_tanah'); ?>"><i class="fa fa-folder"></i> Pelepasan Tanah</a></li>
                <li><a href="<?php echo site_url('kecamatan_add_desa'); ?>"><i class="fa fa-user-plus"></i> Tambah Admin Desa</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

	 

	 <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title; ?>
            <small><?php echo $subtitle; ?></small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <?php echo $content; ?>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
