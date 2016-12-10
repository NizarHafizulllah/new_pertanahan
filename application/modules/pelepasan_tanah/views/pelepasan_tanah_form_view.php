 	<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
 	<link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" >
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>

    <script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>

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

<?php $temp_tanah_id = $this->session->userdata('temp_tanah_id');
    
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
                      <label class="col-md-2">Tgl. Lahir</label>
                      <div class="col-md-10">
                      <input type="text" id="tanggal" name="tgl_lahir_pihak_pertama" class="tanggal ui-datepicker form-control" placeholder="Tanggal Pernyataan"  data-date-format="dd-mm-yyyy" value="<?php echo isset($tgl_lahir_pihak_pertama)?$tgl_lahir_pihak_pertama:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Warga Negara</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Warga Negara" name="wn_pihak_pertama" value="<?php echo isset($wn_pihak_pertama)?$wn_pihak_pertama:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Jenis Kelamin</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Jenis Kelamin ..." name="jenis_kelamin_pihak_pertama" value="<?php echo isset($jenis_kelamin_pihak_pertama)?$jenis_kelamin_pihak_pertama:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Status Kawin</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Status Kawin ..." name="status_kawin_pihak_pertama" value="<?php echo isset($status_kawin_pihak_pertama)?$status_kawin_pihak_pertama:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Pekerjaan</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Pekerjaan ..." name="pekerjaan_pihak_pertama" value="<?php echo isset($pekerjaan_pihak_pertama)?$pekerjaan_pihak_pertama:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Provinsi</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Provinsi ..." name="provinsi" value="<?php echo isset($provinsi)?$provinsi:''; ?>"></div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2">Kota/Kabupaten</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Kota/Kabupaten ..." name="kabupaten_pihak_pertama" value="<?php echo isset($kabupaten_pihak_pertama)?$kabupaten_pihak_pertama:''; ?>"></div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2">kecamatan</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="kecamatan ..." name="kecamatan_pihak_pertama" value="<?php echo isset($kecamatan_pihak_pertama)?$kecamatan_pihak_pertama:''; ?>"></div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2">Desa/Kelurahan</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Desa/Kelurahan ..." name="desa_pihak_pertama" value="<?php echo isset($desa_pihak_pertama)?$desa_pihak_pertama:''; ?>"></div>
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
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Provinsi ..." name="provinsi_pihak_kedua" value="<?php echo isset($provinsi_pihak_kedua)?$provinsi_pihak_kedua:''; ?>"></div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2">Kota/Kabupaten</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Kota/Kabupaten ..." name="kabupaten_pihak_kedua" value="<?php echo isset($kabupaten_pihak_kedua)?$kabupaten_pihak_kedua:''; ?>"></div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2">kecamatan</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="kecamatan ..." name="kecamatan_pihak_kedua" value="<?php echo isset($kecamatan_pihak_kedua)?$kecamatan_pihak_kedua:''; ?>"></div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2">Desa/Kelurahan</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Desa/Kelurahan ..." name="desa_pihak_kedua" value="<?php echo isset($desa_pihak_kedua)?$desa_pihak_kedua:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Alamat</label>
                      <div class="col-md-10"><textarea class="form-control" rows="3" placeholder="Alamat ..." name="alamat_pihak_kedua"><?php echo isset($alamat_pihak_kedua)?$alamat_pihak_kedua:''; ?></textarea></div>
                    </div>
                </div><!-- /.box-body -->
              </div>


              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Pernyataan</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                    <!-- text input -->

                    
                    <div class="form-group">
                    <div class="col-md-2">
                      <label>Yang Membuat Pernyataan</label>
                    </div>
                      <div class="col-md-10">
                      <input type="text" name="pembuat_pernyataan" class="form-control" placeholder="Yang Membuat Pernyataan ..." value="<?php echo isset($pembuat_pernyataan)?$pembuat_pernyataan:''; ?>">
                      <input type="hidden" name="id"  value="<?php echo isset($id)?$id:''; ?>">
                      </div>
                    </div>
                    <!-- textarea -->
                    <div class="form-group">
                    <div class="col-md-2">
                      <label>Tanggal Pernyataan</label>
                    </div>
                      <div class="col-md-10">
                      <input type="text" id="tanggal" name="tgl_pernyataan" class="tanggal ui-datepicker form-control" placeholder="Tanggal Pernyataan"  data-date-format="dd-mm-yyyy" value="<?php echo isset($tgl_pernyataan)?$tgl_pernyataan:''; ?>"></div>
                    </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Surat-surat</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                    <!-- text input -->
                    <div class="col-sm-3"><a href="javascript:surat_pelepasan_add();" id="add_surat_pelepasan" class="btn btn-primary">Tambah Surat</a></div><br>
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
                      <label class="col-md-2">Jalan</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Jalan..." name="jln_tanah" value="<?php echo isset($jln_tanah)?$jln_tanah:''; ?>"></div>
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                      <label class="col-md-2">RT</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="RT ..." name="rt_tanah" value="<?php echo isset($rt_tanah)?$rt_tanah:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">RW</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="RW ..." name="rw_tanah" value="<?php echo isset($rw_tanah)?$rw_tanah:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Lingkungan</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Lingkungan ..." name="dusun_tanah" value="<?php echo isset($dusun_tanah)?$dusun_tanah:''; ?>"> </div>
                    </div>



                    <input type="hidden" name="kab_tanah" value="19_5">

                    

                    <div class="form-group">
                      <label class="col-md-2">Status Tanah</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Status Tanah ..." name="status_tanah" value="<?php echo isset($status_tanah)?$status_tanah:''; ?>"></div>
                    </div>
                    
                     <div class="form-group">
                      <label class="col-md-2">Sejak Kuasa</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Sejak Kuasa..." name="sejak_kuasa_tanah" value="<?php echo isset($sejak_kuasa_tanah)?$sejak_kuasa_tanah:''; ?>"></div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2">Dipergunakan Untuk</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Dipergunakan Untuk ..." name="guna_tanah" value="<?php echo isset($guna_tanah)?$guna_tanah:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Yang Terdapat Di Perkarangan</label>
                      <div class="col-md-10"><textarea class="form-control" rows="3" placeholder="Yang Terdapat Di Perkarangan ..." name="tanaman"><?php echo isset($tanaman)?$tanaman:''; ?></textarea></div>
                    </div>
                  

                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->

           


             

              
            </div>








<!-- KOLOM KANAN -->


            <div class="col-md-12">
              <!-- general form elements -->
              <!-- Kolom Kiri -->
              

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Register</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                    <!-- text input -->

                    <div class="form-group">
                      <label class="col-md-2">Tanggal Registrasi</label>
                      <div class="col-md-10"><input type="text" id="tanggal" name="tgl_register_desa" class="tanggal ui-datepicker form-control" placeholder="Tanggal Registrasi"  data-date-format="dd-mm-yyyy" value="<?php echo isset($tgl_register_desa)?$tgl_register_desa:''; ?>"></div>
                    </div>

                    <?php
                    if ($action=='simpan') { ?>
                      <div class="form-group">
                      <label class="col-md-2">No. Registrasi</label>
                      <div class="col-md-10">
                      <input type="text" name="no_register_desa" id="no_register_desa" class="form-control" placeholder="No Registrasi ..."  >
                      <input type="hidden" name="no_ket_desa" id="no_ket_desa"   >
                      <input type="hidden" name="no_berita_acara_desa" id="no_berita_acara_desa" ></div>
                    </div>
                    </div><!-- /.box-body -->
                    </div><!-- /.box -->
              
                    <button style="border-radius: 9px;" id="tombolsubmitsimpan" class="btn btn-block btn-primary btn-lg">Simpan</button>
                    <a style="border-radius: 9px;" href="<?php echo site_url('regis_desa'); ?>" class='btn btn-block btn-danger btn-lg'>Batal</a>;
<?php 
                    }else{ ?>
                      <div class="form-group">
                      <label class="col-md-2">No. Registrasi</label>
                      <div class="col-md-10">
                      <input type="text" name="no_register_desa" id="no_register_desa" class="form-control" placeholder="No Registrasi ..." value="<?php echo isset($no_register_desa)?$no_register_desa:''; ?>" disabled>
                      </div><!-- /.box-body -->
              </div><!-- /.box -->
              
              <button style="border-radius: 9px;" id="tombolsubmitupdate" class="btn btn-block btn-primary btn-lg">Simpan</button>
              <a style="border-radius: 9px;" href="<?php echo site_url('regis_desa'); ?>" class='btn btn-block btn-danger btn-lg'>Batal</a>
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
              
              


            </div><!--/.col (right) -->

            

        </div>
        </form>


        <div class="modal fade" id="surat_modal" tabindex="-1" role="dialog" aria-labelledby="SuratModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="SuratModal">Tambah Surat</h4>
      </div>
      <div class="modal-body">
        <form action="" id="form_surat" method="post">
          <table width="100%"  class='table table-bordered'>
              <tr>
                <td width="30%" >Diketahui </td>
                <TD>
                <input type="text" id="yang_mengetahui_desa" name="yang_mengetahui_desa" class="form-control" placeholder="Diketahui" >
                  
                </TD>
              </tr>
              <tr>
                <td width="30%" >Tgl. Surat</td>
                <TD>
                <input type="text" id="tgl_surat_kec" name="tgl_surat_kec" class="tanggal ui-datepicker form-control" placeholder="Tanggal Surat"  data-date-format="dd-mm-yyyy">
                  
                </TD>
              </tr>
              
              <tr>
                <td>No. Surat </td>
                <TD>
                  <input type="text" class="form-control" name="no_surat_kecamatan" id="no_surat_kecamatan" placeholder="No. Surat" />
                  <input type="hidden" name="temp_id_surat" value="<?php echo $temp_id_surat; ?>"  id="temp_id_surat"  />
                </TD>
              </tr>
              
              
            </table>   
          </form>   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="button" id="btn_simpan_surat" class="btn btn-primary" onclick="surat_update()">Simpan</button>
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



  <div class="modal fade" id="saksi_modal" tabindex="-1" role="dialog" aria-labelledby="PosisiModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="SaksiModal">Tambah Saksi</h4>
      </div>
      <div class="modal-body">
        <form action="" id="form_saksi" method="post">
          <table width="100%"  class='table table-bordered'>
            <!--  <tr>
                <td width="30%" >Panjang</td>
                <TD>
                  <input type="text" class="form-control" name="panjang" id="panjang" placeholder="Panjang Tanah (Dalam Satuan Meter 00,00)" /> -->
                  <!-- <input type="hidden" class="form-control" name="id" id="id" value="<?php  ?>" /> -->
                  <!-- <input type="hidden" class="form-control" name="bagian" id="bagian"  />
                </TD>
              </tr>
              <tr>
                <td width="30%" >Jenis</td>
                <TD>
                  <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis" />
                </TD>
              </tr> -->
              <tr>
                <td width="30%" >NIK</td>
                <TD>
                  <input type="text" class="form-control" name="nik" id="nik_posisi" placeholder="NIK" />
                  <input type="hidden" class="form-control" name="id" id="id_posisi" value="<?php  ?>" />
                </TD>
              </tr>
              <tr>
                <td width="30%" >Nama Pemilik</td>
                <TD>
                  <input type="text" class="form-control" name="nama" id="nama_posisi" placeholder="Nama Pemilik" />
                </TD>
              </tr>
              <tr>
                <td width="30%" >Tempat Lahir</td>
                <TD>
                  <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir_posisi" placeholder="Tempat Lahir" />
                </TD>
              </tr>
              <tr>
                <td width="30%" >Tgl. Lahir</td>
                <TD>
                <input type="text" id="tgl_lahir_posisi" name="tgl_lahir" class="tanggal ui-datepicker form-control" placeholder="Tanggal Lahir"  data-date-format="dd-mm-yyyy">
                  
                </TD>
              </tr>
              <tr>
                <td width="30%" >Pekerjaan</td>
                <TD>
                  <input type="text" class="form-control" name="pekerjaan" id="pekerjaan_posisi" placeholder="Pekerjaan" />
                </TD>
              </tr>
              <tr>
                <td>Alamat </td>
                <TD>
                  <input type="text" class="form-control" name="alamat" id="alamat_posisi" placeholder="Alamat" />
                  <input type="hidden" name="temp_id_surat" value="<?php echo $temp_tanah_id; ?>"  id="temp_id_tanah"  />
                </TD>
              </tr>
              
              
            </table>   
          </form>   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="button" id="btn_simpan_saksi" class="btn btn-primary" onclick="pemilik_update()">Simpan</button>
        </div>
      </div>
    </div>
  </div>

<?php 
$this->load->view($this->controller.'_form_view_js');
?>
