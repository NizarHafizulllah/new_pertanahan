 	<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
 	<link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" >
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>

<form id="form_data" method="post" action="<?php echo site_url("$this->controller/$action"); ?>" role="form"> 
	<div class="row">
	<div class="col-md-12">
		
		<!--  -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					Data Admin Desa
				</h3>
			</div>
			<div class="box-body">
				<div class="form-group">
					<label>Desa</label>
					<?php echo form_dropdown("desa",$arr_desa,'','id="id_desa" class="form-control select2" style="width: 100%;"'); ?>
				</div>
				<div class="form-group">
					<label>Nama Admin</label>
					<input type="text" name="nama" class="form-control" placeholder="Nama Admin . ." id="nama">
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" placeholder="Username" class="form-control" id="username">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="pass1" placeholder="Password" class="form-control" id="pass1">
				</div>
				<div class="form-group">
					<label>Ulangi Password</label>
					<input type="password" name="pass2" placeholder="Ulangi Password" class="form-control" id="pass2">
				</div>


			</div>

		</div>
		
		<div class="form-group">
					<div class="col-md-6">
					<button style="border-radius: 9px;" id="tombolsubmitsimpan" class="btn btn-block btn-primary btn-lg">Simpan</button>
					</div>
					<div class="col-md-6">
              		<a href="<?php echo site_url('kecamatan_add_desa'); ?>" class="btn btn-danger btn-lg btn-block" style="border-radius: 9px;" > Batal</a>
              		</div>
				</div>
		
	</div>
	</div>
</form>





<?php 
$this->load->view('kecamatan_add_desa_form_view_js');
?>