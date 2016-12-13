 <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>

 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">


        <!-- Content Header (Page header) -->
        

          <!-- Default box -->

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">SURAT PENYERAHAN / PELEPASAN HAK ATAS TANAH</h3>
              <div class="box-tools pull-right">
              <a href="<?php echo site_url("$this->controller/baru"); ?>"><button type="button" class="btn btn-primary form-control"><i class="fa fa fa-plus-circle "></i> Tambah Surat</button></a>
              </div>
            </div>
            <div class="box-body">

            <div class="row">
            <form role="form" action="" id="btn-cari" >
            <div class="col-md-2">
              <div class="form-group">
                <label for="nama">No. Surat</label>
                <input id="no_surat" name="no_surat" type="text" class="form-control" placeholder="No. Surat"></input>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="nama">Pihak Pertama</label>
                <input id="nama_pihak_pertama" name="nama_pihak_pertama" type="text" class="form-control" placeholder="Nama"></input>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="nama">Pihak Kedua</label>
                <input id="nama_pihak_kedua" name="nama_pihak_kedua" type="text" class="form-control" placeholder="Nama"></input>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="nama">Desa/Kelurahan</label>
                <?php echo form_dropdown("id_desa",$arr_desa,isset($id_desa)?$id_desa:"",'id="id_desa" class="form-control"'); ?>
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



<table width="100%" border="0" id="pelepasan" class="table table-striped 
             table-bordered table-hover dataTable no-footer" role="grid">
<thead>
  <tr  >
      <th width="10%">Tgl. Surat</th>
        <th width="20%">No. Surat</th>
        <th width="20%">Pihak Pertama </th>
        <th width="20%">Pihak Kedua </th>
        <th width="15%">Desa/Kelurahan Tanah</th>
        <th width="15%">#</th>
    </tr>
  
</thead>
</table>
            </div>
            </div>



<?php 
$this->load->view($this->controller."_view_js");
?>