<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pertanahan Kab. Bangka Barat</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/form-elements.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrapValidator.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-57-precomposed.png">

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-dialog.min.css">



 

    </head>

    <body>




<div class="modal fade bs-example-modal-sm" id="myPleaseWait" tabindex="-1"
    role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <span class="glyphicon glyphicon-time">
                    </span>Sedang memproses. Harap Tunggu...
                 </h4>
            </div>
            <div class="modal-body">
                <div class="progress">
                    <div class="progress-bar progress-bar-info
                    progress-bar-striped active"
                    style="width: 100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal ends Here -->





        <!-- Top content -->
      <div class="top-content">
          
            <div class="inner-bg">
                <div class="container">
                  
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1 >Sistem Informasi <strong>Pertanahan</strong></h1>
                            <div class="description">
                              <p>Pemerintah Kab. Bangka Barat</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-5">
                          
                          <div class="form-box">
                            <div class="form-top">
                              <div class="form-top-left">
                                <h2>Masuk </h2>
                              </div>
                              <div class="form-top-right">
                                <i class="fa fa-lock"></i>
                              </div>
                              </div>
                              <div class="form-bottom">
                            <form role="form" action="" method="post" class="login-form">
                              <div class="form-group">
                                <label class="sr-only" for="form-username">Nama Pengguna</label>
                                  <input type="text" name="form-username" placeholder="Nama Pengguna..." class="form-username form-control" id="form-username">
                                </div>
                                <div class="form-group">
                                  <label class="sr-only" for="form-password">Kata Sandi</label>
                                  <input type="password" name="form-password" placeholder="Kata Sandi..." class="form-password form-control" id="form-password">
                                
                                        <input type="hidden" id="mask" name="mask" />
                                        
                                        </div>
                                <button type="submit" class="btn">Masuk !</button>
                                       <!-- <a href="<?php echo site_url('lupa_password'); ?>"><u>Lupa Password</u></a> -->
                                      
                            </form>
                          </div>
                        </div>
                    
                          
                        </div>
                        
                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>


                        <!-- <div class="col-md-5">
                          <h2>Selamat Datang</h2>
                        </div> -->
                          
                        <div class="col-sm-5">
                          
                          <div class="form-box">
                            <div class="form-top">
                              <div class="form-top-left">
                                <h2>Selamat Datang </h2>
                      
                                <h4>Silahkan Login Untuk Melanjutkan</h4>
                              </div>
                              <div class="form-top-right">
                                <i class="fa fa-user"></i>
                              </div>
                              </div>
                              
                          </div>
                          
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>

        <!-- Footer -->
        <footer>
          <div class="container">
            <div class="row">
              
              <div class="col-sm-8 col-sm-offset-2">
                <div class="footer-border"></div>
                <p>Dikelola oleh <a href="http://tigapilarmandiri.com/" target="_blank"><strong>Pusat Konsultasi Pemerinta Daerah (PKPD)</strong></a> 
                  hak cipta dilindungi undang undang. </p>
              </div>
              
            </div>
          </div>
        </footer>

        <!-- Javascript -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.backstretch.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.md5.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-dialog.min.js"></script>
        
        <?php 
        $this->load->view("login_view_js");
        ?>        
        <!--[if lt IE 10]>
            <script src="<?php echo base_url(); ?>assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>