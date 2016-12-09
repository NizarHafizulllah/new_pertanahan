
<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-dialog.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrapValidator.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-dialog.min.css">


  <script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap-dialog.min.js"></script>



  <form id="regis_kec" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo site_url("regis_kec/update"); ?>" method="post">
                <div class="modal fade 1" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel2">Register Kecamatan</h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="kembali">Tanggal Register</label>
                              <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                              <input type="text" id="tanggal" name="tgl_register_kec" class="tanggal ui-datepicker form-control" placeholder="Tanggal Register"  data-date-format="dd-mm-yyyy">
                              <label>No. Register Kecamatan</label>
                              <input type="text" name="no_register_kecamatan" value="<?php echo $no_register_kec ?>" class="form-control" placeholder="No. Register Kecamatan">
                              <br/>
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="button" id="btn_submit1" class="btn btn-primary">Konfirmasi</button>
                      </div>

                    </div>
                  </div>
                </div>
                </form>

<br>
<table width="100%">
	<tr>
		<td width="100%" align="center" style="font-size: 30px;">Surat Pernyataan Penguasaan Fisik</td>
	</tr>
	<tr>
		<td width="100%" align="center" style="font-size: 30px;">Bidang Tanah</td>
	</tr>
</table>

<hr> 

<div class="row">
<div class="col-md-6">

<div class="box">
		<div class="box-header">
		  <h3 class="box-title">Data Register Desa</h3>
		</div><!-- /.box-header -->
		<div class="box-body no-padding">
		  <table class="table">
		    <tr>
		      <th style="width: 10px">#</th>
		      <th style="width: 180px">Field</th>
		      <th>Data</th>
		    </tr>
		    <tr>
		      <td>1.</td>
		      <td>No. Register</td>
		      <td><?php echo $no_register_desa; ?></td>
		    </tr>
		    <tr>
		      <td>2.</td>
		      <td>Tanggal Register</td>
		      <td><?php echo flipdate($tgl_register_desa); ?></td>
		    </tr>
		    <tr>
		      <td>3.</td>
		      <td>Kepala Desa</td>
		      <td><?php echo $nama_kades; ?></td>
		    </tr>
		  </table>
		</div><!-- /.box-body -->
	</div>

	<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Pemilik</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th style="width: 180px">Field</th>
                      <th>Data</th>
                    </tr>
                    <?php 
                    $x = 0;
                    foreach ($pemilik as $row) {
                    	$x = $x+1;
                    	?>

                    <tr>
                      <td><?php echo $x ?></td>
                      <td>Nama</td>
                      <td><?php echo $row->nama ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>Tempat Tanggal Lahir</td>
                      <td><?php echo $row->tempat_lahir.' '.flipdate($row->tgl_lahir) ?></td>
                    </tr>
                    <tr>
                      	<td>&nbsp;</td>
						<td>Pekerjaan </td>
						<td><?php echo $row->pekerjaan ?></td>
                    </tr>
                    <tr>
                      	<td>&nbsp;</td>
						<td>No. KTP </td>
						<td><?php echo $row->nik; ?></td>
                    </tr>
                    <tr>
                    	<td>&nbsp;</td>
						<td>Alamat/Tempat Tinggal </td>
						<td><?php echo $row->alamat; ?></td>
                    </tr>
                    <?php
                    } ?>
                  </table>
                </div><!-- /.box-body -->
              </div>

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Tanah</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th style="width: 180px">Field</th>
                      <th>Data</th>
                    </tr>
                    <tr>
                      	<td>1 </td>
						<td>Jalan </td>
						<td><?php echo $jln_tanah ?></td>
                    </tr>
                    <tr>
                     	<td>2 </td>
						<td>RT/RW Lingkungan </td>
						<td><?php echo $rt_tanah.'/'.$rw_tanah.' - '.$dusun_tanah ?></td>
                    </tr>
                    <tr>
                      	<td>3 </td>
						<td>Desa/Kelurahan </td>
						<td><?php echo $desa_tanah ?></td>
                    </tr>
                    <tr>
                      	<td>4 </td>
						<td>Kecamatan </td>
						<td><?php echo $kec_tanah ?></td>
                    </tr>
                    <tr>
                    	<td>5 </td>
						<td>Kabupaten </td>
						<td><?php echo $kab_tanah ?></td>
                    </tr>
                    <tr>
						<td>6 </td>
						<td>Status Tanah </td>
						<td><?php echo $status_tanah ?></td>
					</tr>
					<tr>
						<td>7 </td>
						<td>Dipergunakan Untuk </td>
						<td><?php echo $guna_tanah ?></td>
					</tr>
                  </table>
                </div><!-- /.box-body -->
              </div>
              <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Data Batas Tanah</h3>
		</div><!-- /.box-header -->
		<div class="box-body no-padding">
		  <table class="table">
		    <tr>
		      <th style="width: 10px">#</th>
		      <th style="width: 180px">Field</th>
		      <th>Data</th>
		    </tr>
		    <tr>
		      <td>1.</td>
		      <td>Sebelah Utara</td>
		      <td><?php 
		      	
		      echo $panjang_batas_utara.' berbatasan dengan '.$nama_batas_utara; 
		      

		      ?>
		      	
		      </td>
		    </tr>
		    <tr>
		      <td>2.</td>
		      <td>Sebelah Selatan</td>
		      <td><?php echo $panjang_batas_selatan.' berbatasan dengan tanah '.$nama_batas_selatan; ?></td>
		    </tr>
		    <tr>
		      <td>3.</td>
		      <td>Sebelah Timur</td>
		      <td><?php echo $panjang_batas_timur.' berbatasan dengan tanah '.$nama_batas_timur; ?></td>
		    </tr>
		    <tr>
		      <td>4.</td>
		      <td>Sebelah Barat</td>
		      <td><?php echo $panjang_batas_barat.' berbatasan dengan tanah '.$nama_batas_barat; ?></td>
		    </tr>
		  </table>
		</div><!-- /.box-body -->
	</div>

</div>


<div class="col-md-6">
	

	<div class="box">
		<div class="box-header">
		  <h3 class="box-title">Data Saksi-saksi</h3>
		</div><!-- /.box-header -->
		<div class="box-body no-padding">
		  <table class="table">
		    <tr>
		      <th style="width: 10px">#</th>
		      <th style="width: 180px">Field</th>
		      <th>Data</th>
		    </tr>
		    <?php
		    $no = 0;
		    foreach ($saksi as $row) {
		    	$no = $no+1;
		    
		     ?>
		    <tr>
		      <td><?php echo $no ?>.</td>
		      <td>Nama</td>
		      <td><?php echo $row->nama; ?></td>
		    </tr>
		    <tr>
		      <td></td>
		      <td>Umur</td>
		      <td><?php echo $row->umur; ?> Tahun</td>
		    </tr>
		    <tr>
		      <td></td>
		      <td>Pekerjaan</td>
		      <td><?php echo $row->pekerjaan; ?></td>
		    </tr>
		    <tr>
		      <td></td>
		      <td>Alamat</td>
		      <td><?php echo $row->alamat; ?></td>
		    </tr>
		    <?php } ?>
		    <tr>
		      <td><?php $no = $no+1; echo $no; ?>.</td>
		      <td>Nama</td>
		      <td><?php echo $nama_pengukur_satu; ?></td>
		    </tr>
		    <tr>
		      <td></td>
		      <td>Umur</td>
		      <td><?php echo $umur_pengukur_satu; ?> Tahun</td>
		    </tr>
		    <tr>
		      <td></td>
		      <td>Pekerjaan</td>
		      <td><?php echo $pekerjaan_pengukur_satu; ?></td>
		    </tr>
		    <tr>
		      <td></td>
		      <td>Alamat</td>
		      <td><?php echo $alamat_pengukur_satu; ?></td>
		    </tr>
		    <tr>
		      <td><?php $no = $no+1; echo $no; ?>.</td>
		      <td>Nama</td>
		      <td><?php echo $nama_pengukur_dua; ?></td>
		    </tr>
		    <tr>
		      <td></td>
		      <td>Umur</td>
		      <td><?php echo $umur_pengukur_dua; ?> Tahun</td>
		    </tr>
		    <tr>
		      <td></td>
		      <td>Pekerjaan</td>
		      <td><?php echo $pekerjaan_pengukur_dua; ?></td>
		    </tr>
		    <tr>
		      <td></td>
		      <td>Alamat</td>
		      <td><?php echo $alamat_pengukur_dua; ?></td>
		    </tr>
		  </table>
		</div><!-- /.box-body -->
	</div>

	<div class="col-md-6">
		<button class="btn btn-primary form-control" id="proses" type="button" data-toggle="modal" data-target=".<?php echo $status; ?>">Register Kecamtan</button>
	</div>
	<div class="col-md-6">
		<a href="<?php echo site_url('regis_kec'); ?>"><button class="btn btn-danger form-control">Kembali</button></a>
	</div>

</div>
</div>



	
<?php 
$this->load->view('regis_kec_view_form_detail_js');
?>
			