 	<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
 	<link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" >
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>

<form id="form_edit" method="post" action="<?php echo site_url("$this->controller/$action"); ?>" role="form"> 
	<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					Data Desa
				</h3>
			</div>
			<div class="box-body">
				<div class="form-group">
					<label>Desa</label>
					<?php echo form_dropdown("desa",$arr_desa,$desa,'id="id_desa" class="form-control select2" style="width: 100%;"'); ?>
				</div>
				<div class="form-group">
					<label>Nama Kepala Desa</label>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="text" name="kepala_desa" class="form-control" placeholder="Nama Kepala Desa . ." id="kepala_desa" value="<?php echo $kepala_desa; ?>">
				</div>
				<!-- <div class="form-group">
					<label>NIP Camat</label>
					<input type="text" name="nip_camat" placeholder="NIP Camat" class="form-control" id="nip_camat">
				</div> -->
				<div class="form-group">
					<label>Jabatan Kepala Desa</label>
					<input type="text" name="jabatan_kades" placeholder="Jabatan Kepala Desa" class="form-control" id="jabatan_kades" value="<?php echo $jabatan_kades; ?>">
				</div>
			</div>
		</div>
		<!--  -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					Data Admin Desa
				</h3>
			</div>
			<div class="box-body">
				<div class="form-group">
					<label>Nama Admin</label>
					<input type="text" name="nama" class="form-control" placeholder="Nama Admin . ." id="nama" value="<?php echo $nama; ?>">
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" placeholder="Username" class="form-control" id="username" value="<?php echo $username; ?>">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="pass1" placeholder="Password" class="form-control" id="pass1" >
				</div>
				<div class="form-group">
					<label>Ulangi Password</label>
					<input type="password" name="pass2" placeholder="Ulangi Password" class="form-control" id="pass2">
				</div>


			</div>

		</div>
		
		<div class="form-group">
					<div class="col-md-6">
					<button style="border-radius: 9px;" id="tombolsubmitupdate" class="btn btn-block btn-primary btn-lg">Simpan</button>
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