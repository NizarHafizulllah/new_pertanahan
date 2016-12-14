
	<?php 
$userdata = $this->session->userdata('kecamatan_login'); 
?>

<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-dialog.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrapValidator.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-dialog.min.css">


  <script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap-dialog.min.js"></script>


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

 <table width="100%">
	<tr>
		<td width="100%" align="center" style="font-size: 30px;">SURAT PENYERAHAN / PELEPASAN HAK ATAS TANAH</td>
	</tr>
</table>
<br/>&nbsp;
<br/>&nbsp;

<div class="row">
<div class="col-md-6">

<div class="box">
    <div class="box-header">
      <h3 class="box-title">Pihak Pertama</h3>
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
        foreach ($dt_pihak_pertama as $row) {
         $no = $no+1;
         ?>
        <tr>
          <td><?php echo $no; ?>.</td>
          <td>NIK</td>
          <td><?php echo $row['nik'] ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Nama</td>
          <td><?php echo $row['nama'] ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Tempat/Tgl Lahir</td>
          <td><?php echo $row['tempat_lahir'].', '.flipdate($row['tgl_lahir']); ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Jenis Kelamin</td>
          <td><?php if($row['jk']=="l"){ echo "Laki - Laki"; }else if($row['jk']=="p"){ echo "Perempuan"; } ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Alamat</td>
          <td><?php echo $row['alamat'].' Kelurahan '.$row['nama_desa'].' Kecamatan '.$row['nama_kecamatan'].' Kabupaten '.$row['nama_kota'].' Provinsi '.$row['nama_provinsi'] ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Umur</td>
          <td><?php echo $row['umur']; ?> Tahun</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Status Perkawinan</td>
          <td><?php if($row['status_kawin']=="k"){ echo "Kawin"; }else if($row['status_kawin']=="tk"){ echo "Tidak Kawin"; }else if ($row['status_kawin']=="ch"){ echo "Cerai Hidup"; }else {echo "Cerai Mati"; } ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <?php } ?>
      </table>
    </div><!-- /.box-body -->
  </div>

<div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Surat</h3>
    </div><!-- /.box-header -->
    <div class="box-body no-padding">
      <table class="table">
        <tr>
          <th style="width: 10px">#</th>
          <th style="width: 180px">Field</th>
          <th>Data</th>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>No. Surat</td>
          <td><?php echo $no_surat ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Tanggal</td>
          <td><?php echo $tanggal ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Biaya Ganti Rugi</td>
          <td>Rp. <?php echo $biaya_ganti_rugi; ?>,00;-</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Camat Yang Menyetujui</td>
          <td><?php echo $nama_camat; ?></td>
        </tr>
        
      </table>
    </div><!-- /.box-body -->
  </div>

   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Surat-surat</h3>
    </div><!-- /.box-header -->
    <div class="box-body no-padding">
      <table class="table">
        <tr>
          <th style="width: 10px">#</th>
          <th>Data</th>
        </tr>
        <?php 
        $no = 0;
        foreach ($dt_surat as $row) {
         $no = $no+1;
         ?>
        <tr>
          <td><?php echo $no; ?>.</td>
          <td><?php echo $row['surat'] ?></td>
        </tr>
        
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <?php } ?>
      </table>
    </div><!-- /.box-body -->
  </div>

	</div>
  <div class="col-md-6">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title">Pihak Kedua</h3>
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
          <td>Nama</td>
          <td><?php echo $nama_pihak_kedua ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Umur</td>
          <td><?php echo $umur_pihak_kedua ?> Tahun</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Kewarganegaraan</td>
          <td><?php echo $wn_pihak_kedua ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Status Perkawinan</td>
          <td><?php if($status_kawin_pihak_kedua=="k"){ echo "Kawin"; }else{ echo "Belum Kawin"; } ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Pekerjaan</td>
          <td><?php echo $pekerjaan_pihak_kedua ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Tempat tinggal</td>
          <td><?php echo $alamat_pihak_kedua ?>, Kelurahan <?php echo $desa_pihak_kedua ?>, Kecamatan <?php echo $kecamatan_pihak_kedua ?>, Kabupaten <?php echo $kabupaten_pihak_kedua ?></td>
        </tr>
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
          <td>&nbsp;</td>
          <td>Alamat Tanah</td>
          <td><?php echo $wilayah.' Desa '.$desa.' Kecamatan '.$kecamatan.' Kabupaten '.$kabupaten.' Provinsi '.$propinsi ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Batas Utara</td>
          <td><?php echo $panjang_batas_utara.' Berbatasan Dengan '.$nama_batas_utara ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Batas Selatan</td>
          <td><?php echo $panjang_batas_selatan.' Berbatasan Dengan '.$nama_batas_selatan ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Batas Timur</td>
          <td><?php echo $panjang_batas_timur.' Berbatasan Dengan '.$nama_batas_timur ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Batas Barat</td>
          <td><?php echo $panjang_batas_barat.' Berbatasan Dengan '.$nama_batas_barat ?></td>
        </tr>

      </table>
    </div><!-- /.box-body -->
  </div>

<div class="box">
    <div class="box-header">
      <h3 class="box-title">Saksi - Saksi</h3>
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
        foreach ($dt_saksi as $row) {
         $no = $no+1;
         ?>
        <tr>
          <td><?php echo $no; ?>.</td>
          <td>Nama</td>
          <td><?php echo $row['nama'] ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Jabatan</td>
          <td><?php echo $row['jabatan'] ?></td>
        </tr>
        <?php } ?>
      </table>
    </div><!-- /.box-body -->
  </div>
  <div class="col-md-12">
  <?php if ($status==1) { ?>
     <a href="<?php echo site_url($this->controller) ?>"><button id="batal" class="btn btn-danger col-md-5">Batal</button></a>

<?php }else{ ?>

     <button id="menyetujui" class="btn btn-primary col-md-5" onclick="setujui(<?php echo $id ?>)">Menyetujui</button>
    <div class="col-md-2">&nbsp;</div>
      <a href="<?php echo site_url($this->controller) ?>"><button id="batal" class="btn btn-danger col-md-5">Batal</button></a>
<?php    } ?>
     
    
  </div>

  
  </div>
	</div>







	
<?php 
$this->load->view($this->controller.'_aprove_form_js');
?>
			