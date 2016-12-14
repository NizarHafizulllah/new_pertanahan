 	<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
 	<link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" >
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>

    <script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/autoNumeric.js"></script>

 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">


<form id="form_data" class="form-horizontal" method="post" action="<?php echo site_url("$this->controller/$action"); ?>" role="form"> 
<form role="form">
<div class="row">

<style type="text/css">
  .butuh-hover:hover{
    color: black;
    cursor: pointer;
  }
</style>

<?php $tanah_id = $this->session->userdata('tanah_id');
    
       // echo $temp_tanah_id;
 ?>

<!-- KOLOM KIRI -->

			<div class="col-md-12">
              <!-- general form elements -->
              <!-- Kolom Kanan -->

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Pihak Pertama</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                    <!-- text input -->

                    <div class="form-group">
                      <label class="col-md-2">Nama</label>
                      <div class="col-md-10"><input type="text" name="nama_pihak_pertama" class="form-control" placeholder="Nama . . . " value="<?php echo isset($nama_pihak_pertama)?$nama_pihak_pertama:''; ?>"></div>
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                      <label class="col-md-2">Umur</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Umur ..." name="umur_pihak_pertama" value="<?php echo isset($umur_pihak_pertama)?$umur_pihak_pertama:''; ?>">
                      </div>
                    </div>

                   

                    <div class="form-group">
                      <label class="col-md-2">Warga Negara</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Warga Negara" name="wn_pihak_pertama" value="<?php echo isset($wn_pihak_pertama)?$wn_pihak_pertama:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Jenis Kelamin</label>
                      <div class="col-md-10">
                      <?php echo form_dropdown("jenis_kelamin_pihak_pertama",$arr_jk,isset($jenis_kelamin_pihak_pertama)?$jenis_kelamin_pihak_pertama:"",'id="jenis_kelamin_pihak_pertama" class="form-control"'); ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Status Kawin</label>
                      <div class="col-md-10">
                      <?php echo form_dropdown("status_kawin_pihak_pertama",$arr_kawin,isset($status_kawin_pihak_pertama)?$status_kawin_pihak_pertama:"",'id="status_kawin_pihak_pertama" class="form-control"'); ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Nama Pasangan </label>
                      <div class="col-md-10">
                      <input type="text" class="form-control" placeholder="Di Isi Jika Sudah Menikah ..." name="nama_pasangan_pihak_pertama" value="<?php echo isset($nama_pasangan_pihak_pertama)?$nama_pasangan_pihak_pertama:''; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Pekerjaan</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Pekerjaan ..." name="pekerjaan_pihak_pertama" value="<?php echo isset($pekerjaan_pihak_pertama)?$pekerjaan_pihak_pertama:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Provinsi</label>
                      <div class="col-md-10">

                      <?php 
                      if ($action=='simpan') {
                        echo form_dropdown("provinsi_pihak_pertama",$arr_provinsi,isset($provinsi_pihak_pertama)?$provinsi_pihak_pertama:"",'id="provinsi_pihak_pertama" class="form-control"');
                      }else{
                        echo form_dropdown("provinsi_pihak_pertama",$arr_provinsi_pertama,isset($provinsi_pihak_pertama)?$provinsi_pihak_pertama:"",'id="provinsi_pihak_pertama" class="form-control"');
                      }
                      
                      

                    
                       ?>
                      
                      <!-- <input type="text" class="form-control" placeholder="Provinsi ..." name="provinsi" value="<?php echo isset($provinsi)?$provinsi:''; ?>"></div> -->
                    </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2">Kota/Kabupaten</label>
                      <div class="col-md-10">
                        <?php 
                          if ($action=='simpan') {
                        echo form_dropdown("kabupaten_pihak_pertama",$arr_kota,isset($kabupaten_pihak_pertama)?$kabupaten_pihak_pertama:"",'id="kabupaten_pihak_pertama" class="form-control"'); 
                      }else{
                        echo form_dropdown("kabupaten_pihak_pertama",$arr_kota_pertama,isset($kabupaten_pihak_pertama)?$kabupaten_pihak_pertama:"",'id="kabupaten_pihak_pertama" class="form-control"'); 
                      }
                        ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2">kecamatan</label>
                      <div class="col-md-10">
                      <?php  
                        if ($action=='simpan') {
                        echo form_dropdown("kecamatan_pihak_pertama",$arr_kecamatan,isset($kecamatan_pihak_pertama)?$kecamatan_pihak_pertama:"",'id="kecamatan_pihak_pertama" class="form-control"'); 
                      }else{
                        echo form_dropdown("kecamatan_pihak_pertama",$arr_kecamatan_pertama,isset($kecamatan_pihak_pertama)?$kecamatan_pihak_pertama:"",'id="kecamatan_pihak_pertama" class="form-control"');
                      }
                      ?>
                    </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2">Desa/Kelurahan</label>
                      <div class="col-md-10">
                        <?php 
                        if ($action=='simpan') {
                         echo form_dropdown("desa_pihak_pertama",$arr_desa,isset($desa_pihak_pertama)?$desa_pihak_pertama:"",'id="desa_pihak_pertama" class="form-control"');
                      }else{
                         echo form_dropdown("desa_pihak_pertama",$arr_desa_pertama,isset($desa_pihak_pertama)?$desa_pihak_pertama:"",'id="desa_pihak_pertama" class="form-control"');
                      }
                        ?>
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Alamat</label>
                      <div class="col-md-10"><textarea class="form-control" rows="3" placeholder="Alamat ..." name="alamat_pihak_pertama"><?php echo isset($alamat_pihak_pertama)?$alamat_pihak_pertama:''; ?></textarea></div>
                    </div>
                </div><!-- /.box-body -->
              </div>

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Pihak Kedua</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                    <!-- text input -->

                    <div class="form-group">
                      <label class="col-md-2">Nama</label>
                      <div class="col-md-10"><input type="text" name="nama_pihak_kedua" class="form-control" placeholder="Nama . . . " value="<?php echo isset($nama_pihak_kedua)?$nama_pihak_kedua:''; ?>"></div>
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                      <label class="col-md-2">Umur</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Umur ..." name="umur_pihak_kedua" value="<?php echo isset($umur_pihak_kedua)?$umur_pihak_kedua:''; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Warga Negara</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Warga Negara" name="wn_pihak_kedua" value="<?php echo isset($wn_pihak_kedua)?$wn_pihak_kedua:''; ?>"></div>
                    </div>

               

                    <div class="form-group">
                      <label class="col-md-2">Pekerjaan</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Pekerjaan ..." name="pekerjaan_pihak_kedua" value="<?php echo isset($pekerjaan_pihak_kedua)?$pekerjaan_pihak_kedua:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Provinsi</label>
                      <div class="col-md-10">
                      <?php 
                      if ($action=='simpan') {
                         echo form_dropdown("provinsi_pihak_kedua",$arr_provinsi,isset($provinsi_pihak_kedua)?$provinsi_pihak_kedua:"",'id="provinsi_pihak_kedua" class="form-control"');
                      }else{
                         echo form_dropdown("provinsi_pihak_kedua",$arr_provinsi_kedua,isset($provinsi_pihak_kedua)?$provinsi_pihak_kedua:"",'id="provinsi_pihak_kedua" class="form-control"');
                      }
                       ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2">Kota/Kabupaten</label>
                      <div class="col-md-10">
                        <?php 
                        if ($action=='simpan') {
                         echo form_dropdown("kabupaten_pihak_kedua",$arr_kota,isset($kabupaten_pihak_kedua)?$kabupaten_pihak_kedua:"",'id="kabupaten_pihak_kedua" class="form-control"');
                      }else{
                         echo form_dropdown("kabupaten_pihak_kedua",$arr_kota_kedua,isset($kabupaten_pihak_kedua)?$kabupaten_pihak_kedua:"",'id="kabupaten_pihak_kedua" class="form-control"');
                      }
                         ?>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2">kecamatan</label>
                      <div class="col-md-10">
                      <?php 
                          if ($action=='simpan') {
                         echo form_dropdown("kecamatan_pihak_kedua",$arr_kecamatan,isset($kecamatan_pihak_kedua)?$kecamatan_pihak_kedua:"",'id="kecamatan_pihak_kedua" class="form-control"');
                      }else{
                         echo form_dropdown("kecamatan_pihak_kedua",$arr_kecamatan_kedua,isset($kecamatan_pihak_kedua)?$kecamatan_pihak_kedua:"",'id="kecamatan_pihak_kedua" class="form-control"');
                      }
                       ?></div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2">Desa/Kelurahan</label>
                      <div class="col-md-10">
                        <?php 
                        if ($action=='simpan') {
                         echo form_dropdown("desa_pihak_kedua",$arr_desa,isset($desa_pihak_kedua)?$desa_pihak_kedua:"",'id="desa_pihak_kedua" class="form-control"');
                      }else{
                         echo form_dropdown("desa_pihak_kedua",$arr_desa_kedua,isset($desa_pihak_kedua)?$desa_pihak_kedua:"",'id="desa_pihak_kedua" class="form-control"');
                      }
                         ?>
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Alamat</label>
                      <div class="col-md-10"><textarea class="form-control" rows="3" placeholder="Alamat ..." name="alamat_pihak_kedua"><?php echo isset($alamat_pihak_kedua)?$alamat_pihak_kedua:''; ?></textarea></div>
                    </div>
                </div><!-- /.box-body -->
              </div>

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Surat-surat</h3>
                  <div class="pull-right"><a href="javascript:surat_pelepasan_add();" id="add_surat_pelepasan" class="btn btn-primary">Tambah Surat</a></div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                    <!-- text input -->
                    <br>
                    <table width="100%"  border="0" class="table table-striped table-bordered table-hover dataTable no-footer" id="surat" role="grid">
                        <thead>
                          <tr >
                            <th width="80%">Surat</th>
                            <th width="20%">#</th>
                            </tr>   
                        </thead>
                      </table>

                    
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Saksi-Saksi</h3>
                  <div class="pull-right"><a href="javascript:saksi_pelepasan_add();" id="add_saksi_pelepasan" class="btn btn-primary">Tambah Saksi</a></div>
                </div>
                <div class="box-body">
                  
                    <!-- text input -->
                    <br>
                    <table width="100%"  border="0" class="table table-striped table-bordered table-hover dataTable no-footer" id="saksi" role="grid">
                        <thead>
                          <tr >
                            <th width="30%">Nama</th>
                            <th width="50%">Jabatan</th>
                            <th width="20%">#</th>
                            </tr>   
                        </thead>
                      </table>

                    
                </div><!-- /.box-body -->
              </div><!-- /.box -->

           




              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Letak Tanah</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                    <!-- text input -->


                    <div class="form-group">
                      <label class="col-md-2">Panjang Batas Barat</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Panjang Batas Barat(Satuan Meter) ..." name="panjang_batas_barat" value="<?php echo isset($panjang_batas_barat)?$panjang_batas_barat:''; ?>"></div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2">Nama Batas Barat</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Nama Batas Barat(Satuan Meter) ..." name="nama_batas_barat" value="<?php echo isset($nama_batas_barat)?$nama_batas_barat:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Panjang Batas Timur</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Panjang Batas Timur(Satuan Meter) ..." name="panjang_batas_timur" value="<?php echo isset($panjang_batas_timur)?$panjang_batas_timur:''; ?>"></div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2">Nama Batas Timur</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Nama Batas Timur(Satuan Meter) ..." name="nama_batas_timur" value="<?php echo isset($nama_batas_timur)?$nama_batas_timur:''; ?>"></div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2">Panjang Batas Selatan</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Panjang Batas Selatan(Satuan Meter) ..." name="panjang_batas_selatan" value="<?php echo isset($panjang_batas_selatan)?$panjang_batas_selatan:''; ?>"></div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2">Nama Batas Selatan</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Nama Batas Selatan(Satuan Meter) ..." name="nama_batas_selatan" value="<?php echo isset($nama_batas_selatan)?$nama_batas_selatan:''; ?>"></div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2">Panjang Batas Utara</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Panjang Batas Utara(Satuan Meter) ..." name="panjang_batas_utara" value="<?php echo isset($panjang_batas_utara)?$panjang_batas_utara:''; ?>"></div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2">Nama Batas Utara</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Nama Batas Utara(Satuan Meter) ..." name="nama_batas_utara" value="<?php echo isset($nama_batas_utara)?$nama_batas_utara:''; ?>"></div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-md-2">Wilayah</label>
                      <div class="col-md-10">
                      <textarea class="form-control" rows="3" placeholder="Wilayah ..." name="wilayah"><?php echo isset($wilayah)?$wilayah:''; ?></textarea></div>
                    </div>

                    



                    <input type="hidden" name="kabupaten" value="19_5">
                    <input type="hidden" name="propinsi" value="19">
                  

                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->

           


             

              
            </div>








<!-- KOLOM KANAN -->


            <div class="col-md-12">
              <!-- general form elements -->
              <!-- Kolom Kiri -->
              

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Pelepasan</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                    <!-- text input -->

                    <div class="form-group">
                      <label class="col-md-2">Tanggal Pelepasan</label>
                      <div class="col-md-10"><input type="text" id="tanggal" name="tanggal" class="tanggal ui-datepicker form-control" placeholder="Tanggal Pelepasan"  data-date-format="dd-mm-yyyy" value="<?php echo isset($tanggal)?$tanggal:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Biaya Ganti Rugi</label>
                      <div class="col-md-10"><input type="text" id="biaya_ganti_rugi" name="biaya_ganti_rugi" required="required" class="form-control rp" placeholder="Biaya Ganti Rugi" data-a-sign="" data-a-dec="," data-a-sep="." value="<?php echo isset($biaya_ganti_rugi)?$biaya_ganti_rugi:""; ?>"></div>
                    </div>

                    <?php
                    if ($action=='simpan') { ?>
                      
                    </div><!-- /.box-body -->
                    </div><!-- /.box -->
              
                    <button style="border-radius: 9px;" id="tombolsubmitsimpan" class="btn btn-block btn-primary btn-lg">Simpan</button>
                    <a style="border-radius: 9px;" href="<?php echo site_url('pelepasan_tanah'); ?>" class='btn btn-block btn-danger btn-lg'>Batal</a>;
<?php 
                    }else{ ?>
                      
              
              <button style="border-radius: 9px;" id="tombolsubmitupdate" class="btn btn-block btn-primary btn-lg">Simpan</button>
              <a style="border-radius: 9px;" href="<?php echo site_url('pelepasan_tanah'); ?>" class='btn btn-block btn-danger btn-lg'>Batal</a>
                    </div>
                    <?php 
                    }
                     ?>
                    
                    
                    <!-- textarea -->
                    
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <!-- 
              <button style="border-radius: 9px;" id="tombolsubmitsimpan" class="btn btn-block btn-primary btn-lg">Simpan</button> -->

              <!-- <a style="border-radius: 9px;" href="<?php echo site_url('regis_desa'); ?>" class='btn btn-block btn-danger btn-lg'>Batal</a> -->
              
              
              <!-- <div class="form-group">
                      <label class="col-md-2">No. Surat Pelepasan</label>
                      <div class="col-md-10">
                      <input type="text" name="no_surat" id="no_surat" class="form-control" placeholder="No. Surat Pelepasan ..."  >
                      </div>
                    </div> -->

            </div><!--/.col (right) -->

            

        </div>
        </form>


<div class="modal fade" id="saksi_pelepasan_modal" tabindex="-1" role="dialog" aria-labelledby="PelepasanModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="SaksiModal">Tambah Surat</h4>
      </div>
      <div class="modal-body">
        <form action="" id="form_saksi_pelepasan" method="post">
          <table width="100%"  class='table table-bordered'>
          <tr>
            <td width="30%">Nama</td>
            <td>
            <input type="hidden" name="id" id="id_saksi" />
            <input type="text" name="nama" class="form-control" id="nama_saksi" placeholder="Nama" />
          
            </td>
          </tr>   
          <tr>
            <td width="30%">Jabatan</td>
            <td>
            <input type="text" name="jabatan" class="form-control" id="jabatan_saksi" placeholder="Jabatan" />
          
            </td>
          </tr>
            </table>   
          </form>   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="button" id="btn_simpan_saksi_pelepasan" class="btn btn-primary" onclick="saksi_pelepasan_update()">Simpan</button>
        </div>
      </div>
    </div>
  </div>


      


  <div class="modal fade" id="surat_pelepasan_modal" tabindex="-1" role="dialog" aria-labelledby="PelepasanModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="PelepasanModal">Tambah Surat</h4>
      </div>
      <div class="modal-body">
        <form action="" id="form_surat_pelepasan" method="post">
          <table width="100%"  class='table table-bordered'>
          <tr>
            <td width="30%">Surat</td>
            <td>
            <textarea name="surat" id="isi_surat" class="form-control" ></textarea>

            <input type="hidden" name="id" id="id_surat" />

              <!-- <input type="text" name="surat" id="surat" class="form-control" placeholder="Surat"> -->
            </td>
          </tr>   
            </table>   
          </form>   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="button" id="btn_simpan_surat_pelepasan" class="btn btn-primary" onclick="surat_pelepasan_update()">Simpan</button>
        </div>
      </div>
    </div>
  </div>





<?php 
$this->load->view($this->controller.'_form_view_js');
?>
