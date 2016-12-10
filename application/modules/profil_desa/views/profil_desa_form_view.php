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
			<div class="box-body" id="bg">
				<div class="form-group">
					<label>Nama Kepala Desa/Lurah</label>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="text" name="nama_kades" class="form-control" placeholder="Nama Kepala Desa / Lurah . ." id="nama_kades" value="<?php echo $nama_kades; ?>">
				</div>
				<div class="form-group">
					<label>Jabatan</label>
					<input type="text" name="jabatan" placeholder="Jabatan" class="form-control" id="jabatan" value="<?php echo $jabatan; ?>">
				</div>
				<div class="form-group">
					<label>Jenis Wilayah</label>
					<?php echo form_dropdown("jenis_wilayah",$arr_jenis_wilayah,'','id="jenis_wilayah" class="form-control select2" style="width: 100%;"'); ?>
				</div>
			</div>
		</div>
		<!--  -->
		
		
		<div class="form-group">
					<div class="col-md-6">
					<button style="border-radius: 9px;" id="tombolsubmitupdate" class="btn btn-block btn-primary btn-lg">Simpan</button>
					</div>
					<div class="col-md-6">
              		<a href="<?php echo site_url('desa'); ?>" class="btn btn-danger btn-lg btn-block" style="border-radius: 9px;" > Batal</a>
              		</div>
				</div>
		
	</div>
	</div>
</form>





<?php 
$this->load->view($this->controller.'_form_view_js');
?>