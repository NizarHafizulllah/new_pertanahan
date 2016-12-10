 <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>

 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">


        <!-- Content Header (Page header) -->
        

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Desa</h3>
              <div class="box-tools pull-right">
              <a href="<?php echo site_url("$this->controller/baru"); ?>"><button type="button" class="btn btn-primary form-control"><i class="fa fa fa-plus-circle "></i> Tambah Admin Desa</button></a>
              </div>
            </div>
            <div class="box-body">

<div class="row">
  <div class="col-md-12">
  <div class="callout callout-info" id="hide">
            <h4>Data Desa!</h4>
            <p>Anda dapat MENAMBAHKAN admin desa dengan cara click tombol "Tambah Admin Desa" pada pojok kanan layar.</p>
            <p>Anda juga mendapat wewenang untuk menghapus atau mengedit data dari admin desa dengan cara click pada bagian ACTION pada baris desa yang ingin di HAPUS/EDIT akunnya. Click untuk menghilangkan pesan ini.</p>
    </div>
    </div>
</div>

<div class="row">
            <form role="form" action="" id="btn-cari" >
            <div class="col-md-3">
              <div class="form-group">
                <label for="nama">Username</label>
                <input id="pengguna" name="pengguna" type="text" class="form-control" placeholder="Username"> <!-- <input type="text" name="desa" id="desa" class="form-control" placeholder="Desa"> -->
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <label></label>
                <button type="submit" class="btn btn-primary form-control" id="btn_submit"><i class="fa">Cari</i></button>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <label></label>
                <button type="reset" class="btn btn-danger form-control" id="btn_reset"><i class="fa">Reset</i></button>
              </div>
            </div>
            </form>
  </div>          
<div class="row">
<div class="col-md-12">
<table width="100%" border="0" id="desa" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid">
<thead>
  <tr>


        
        <th width="10%">ID</th>
        <th width="30%">Username</th>
        <th width="20%">Nama Admin</th>
        <th width="20%">Desa</th>
        <th width="20%">#</th>
    </tr>
  
</thead>
</table>
</div>
</div>
            </div>
            </div>



<?php 
$this->load->view("kecamatan_add_desa_view_js");
?>