<?php
$userdata = $this->session->userdata('login');
?>

      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Profil</h3>
              
            </div>
            <div class="box-body">
              <!-- awal halaman -->

                  <section class="col-lg-5 connectedSortable ui-sortable">
      <!--form-->

                 <form class="form-horizontal" role="form">     
      <div class="box box-primary" id="bagian_form">
            <div class="box-header with-border">
            <i class="fa fa-user"></i>
              <h3 class="box-title">Profil</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>


             
            <div class="box-body">
                
        
    <div class="panel panel-primary">
      <div class="panel-heading">
      <strong><h3 class="panel-title">Detail</h3></strong>

    </div>
    <div class="panel-body" >
    <div class="form-group">
      <label class="col-sm-3 control-label">Nama</label>
      <div class="col-sm-9">
      <input type="hidden" name="id" id="id" value="<?php echo $userdata['id_user']; ?>">
        <input type="text" name="nama" id="nama" class="form-control input-style"  value="<?php echo $userdata['nama'] ?>" disabled>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Email</label>
      <div class="col-sm-9">
      
        <input type="text" id="email" name="email" class="form-control input-style" value="<?php echo $userdata['email'] ?>" disabled>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">ALamat</label>
      <div class="col-sm-9">
      <textarea type="text" id="alamat" name="alamat" class="form-control input-style" disabled=""><?php echo $userdata['alamat'] ?></textarea>
      </div>
    </div>

    
    </div>
  </div>
</form>       
            </div><!-- /.box-body -->
            <div class="box-footer">
            
            </div>
          </div>
      
        </section><!-- /.content -->





        <!--Ubah Password -->

        <section class="col-lg-7 connectedSortable ui-sortable">
      <!--form-->

                 <form id="change_password" class="form-horizontal" method="post" action="<?php echo site_url('profil/cek_password'); ?>" role="form">     
      <div class="box box-primary" id="bagian_form">
            <div class="box-header with-border">
            <i class="fa fa-lock"></i>
              <h3 class="box-title">Keamanan</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>


             
            <div class="box-body">
                
        
    <div class="panel panel-primary">
      <div class="panel-heading">
      <strong><h3 class="panel-title">Ubah Password</h3></strong>

    </div>
    <div class="panel-body" id="data_umum">
    <div class="form-group">
      <label class="col-sm-3 control-label">Password Lama</label>
      <div class="col-sm-9">
        <input type="password" name="pswd_lama" id="pswd_lama" class="form-control input-style" required="required">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Password Baru</label>
      <div class="col-sm-9">
      
        <input type="password" id="pswd_baru" name="pswd_baru" class="form-control input-style" required="required">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Ulang Password Baru</label>
      <div class="col-sm-9">
        <input type="password" id="repswd_baru" name="repswd_baru" class="form-control input-style" required="required">
      </div>
    </div>
    <div class="form-group pull-center">
        <div class="col-sm-offset-3 col-sm-9">
          <button id="tombolsubmit" style="border-radius: 0;" type="submit" class="btn btn-primary"  >Simpan</button>
          <button style="border-radius: 0;" id="reset" type="reset" class="btn btn-danger">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</form>       
            </div><!-- /.box-body -->
            <div class="box-footer">
            
            </div>
          </div>
      
        </section><!-- /.content -->

            </div><!-- /.box-body -->
            <div class="box-footer">
              
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php 
$this->load->view("profil_view_js");
?>



     

