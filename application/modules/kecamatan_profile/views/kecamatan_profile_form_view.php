 	<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
 	<link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" >
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>


    <style type="text/css">
    	div.form-control{
    		opacity: 0.3;
    	}
    </style>

<form id="form_data" method="post" action="<?php echo site_url("$this->controller/$action"); ?>" role="form"> 
	<div class="row">
	<div class="col-md-12">
		<div class="box box-primary" >
			<div class="box-header with-border" >
				<h3 class="box-title">
					Data Camat
				</h3>
			</div>
			<div class="box-body" >
				<div class="form-group" >
					<label >Nama</label>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="text" name="nama_camat" class="form-control" placeholder="Nama Camat . ." id="nama_camat" value="<?php echo $nama_camat; ?>">
				</div>
				<div class="form-group">
					<label>NIP</label>
					<input type="text" name="nip_camat" placeholder="NIP Camat" class="form-control" id="nip_camat" value="<?php echo $nip_camat; ?>">
				</div>
				<div class="form-group">
					<label>Jabatan</label>
					<input type="text" name="jabatan_camat" placeholder="Jabatan Camat" class="form-control" id="jabatan_camat" value="<?php echo $jabatan_camat; ?>">
				</div>
			</div>
		</div>
		<!--  -->
		
		
		<div class="form-group">
					<div class="col-md-6">
					<button  id="tombolsubmitupdate" class="btn btn-block btn-primary btn-lg">Simpan</button>
					</div>
					<div class="col-md-6">
              		<a href="<?php echo site_url('kecamatan'); ?>" class="btn btn-danger btn-lg btn-block"> Batal</a>
              		</div>
				</div>
		
	</div>
	</div>
</form>





<?php 
$this->load->view($this->controller.'_form_view_js');
?>