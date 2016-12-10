 	<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
 	<link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" >
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>

    <script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>

 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">


<form id="form_data" class="form-horizontal" method="post" action="<?php echo site_url("$this->controller/$action"); ?>" role="form"> 
<form role="form">
<div class="row">


<?php $temp_tanah_id = $this->session->userdata('temp_tanah_id');
    
       // echo $temp_tanah_id;
 ?>

<!-- KOLOM KIRI -->

			<div class="col-md-12">
              <!-- general form elements -->
              <!-- Kolom Kanan -->

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
                  <h3 class="box-title">Data Pemilik</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                    <!-- text input -->
                    <a href="javascript:pemilik_add();" id="add_pemilik" class="btn btn-primary">Tambah Data Pemilik </a><br><br>
                    <table width="100%"  border="0" class="table table-striped table-bordered table-hover dataTable no-footer" id="pemilik" role="grid">
                        <thead>
                          <tr >
                            <th width="15%">NIK </th>
                            <th width="15%">NAMA</th>
                            <th width="10%">TEMPAT LAHIR</th>
                            <th width="15%">TGL. LAHIR</th>
                            <th width="10%">PEKERJAAN</th>
                            <th width="25%">ALAMAT</th>
                            <th width="10%">#</th>
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
                      <label class="col-md-2">Dipergunakan Untuk</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Dipergunakan Untuk ..." name="guna_tanah" value="<?php echo isset($guna_tanah)?$guna_tanah:''; ?>"></div>
                    </div>

                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Tanah</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                    <!-- text input -->

                    <div class="form-group">
                      <label class="col-md-2">Sejak Kuasa</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Sejak Kuasa..." name="sejak_kuasa_tanah" value="<?php echo isset($sejak_kuasa_tanah)?$sejak_kuasa_tanah:''; ?>"></div>
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                      <label class="col-md-2">Batas Utara </label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Batas Utara ..." name="batas_u" value="<?php echo isset($batas_u)?$batas_u:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Batas Selatan</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Batas Selatan ..." name="batas_s" value="<?php echo isset($batas_s)?$batas_s:''; ?>"></div>
                    </div>

                    
                    <div class="form-group">
                      <label class="col-md-2">Batas Timur</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Batas Timur ..." name="batas_t" value="<?php echo isset($batas_t)?$batas_t:''; ?>"></div>
                    </div>

                    

                    <div class="form-group">
                      <label class="col-md-2">Batas Barat</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Batas Barat ..." name="batas_b" value="<?php echo isset($batas_b)?$batas_b:''; ?>"></div>
                    </div>


                    <div class="form-group">
                      <label class="col-md-2">Yang Terdapat Di Perkarangan</label>
                      <div class="col-md-10"><textarea class="form-control" rows="3" placeholder="Yang Terdapat Di Perkarangan ..." name="tanaman"><?php echo isset($tanaman)?$tanaman:''; ?></textarea></div>
                    </div>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->

               <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Pemilik Tanah Bagian Utara</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                    <!-- text input -->
                    

                    <div class="form-group">
                      <label class="col-md-2">Nama Pemilik Tanah</label>
                      <div class="col-md-10"><input type="text" name="saksi_satu_nama" class="form-control" placeholder="Nama . . . " value="<?php echo isset($saksi_satu_nama)?$saksi_satu_nama:''; ?>"></div>
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                      <label class="col-md-2">Umur Pemilik Tanah</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Umur ..." name="saksi_satu_umur" value="<?php echo isset($saksi_satu_umur)?$saksi_satu_umur:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Pekerjaan Pemilik Tanah</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Pekerjaan ..." name="saksi_satu_pekerjaan" value="<?php echo isset($saksi_satu_pekerjaan)?$saksi_satu_pekerjaan:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Jabatan Pemilik Tanah</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Jabatan ..." name="saksi_satu_jabatan" value="<?php echo isset($saksi_satu_jabatan)?$saksi_satu_jabatan:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Alamat Pemilik Tanah</label>
                      <div class="col-md-10"><textarea class="form-control" rows="3" placeholder="Alamat ..." name="saksi_satu_alamat"><?php echo isset($saksi_satu_alamat)?$saksi_satu_alamat:''; ?></textarea></div>
                    </div>
                </div><!-- /.box-body -->
              </div>


              
            </div>








<!-- KOLOM KANAN -->


            <div class="col-md-12">
              <!-- general form elements -->
              <!-- Kolom Kiri -->

             

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Pemilik Tanah Bagian Barat</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                    <!-- text input -->

                    <div class="form-group">
                      <label class="col-md-2">Nama</label>
                      <div class="col-md-10"><input type="text" name="saksi_dua_nama" class="form-control" placeholder="Nama . . . " value="<?php echo isset($saksi_dua_nama)?$saksi_dua_nama:''; ?>"></div>
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                      <label class="col-md-2">Umur</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Umur ..." name="saksi_dua_umur" value="<?php echo isset($saksi_dua_umur)?$saksi_dua_umur:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Pekerjaan</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Pekerjaan ..." name="saksi_dua_pekerjaan" value="<?php echo isset($saksi_dua_pekerjaan)?$saksi_dua_pekerjaan:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Jabatan</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Jabatan ..." name="saksi_dua_jabatan" value="<?php echo isset($saksi_dua_jabatan)?$saksi_dua_jabatan:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Alamat</label>
                      <div class="col-md-10"><textarea class="form-control" rows="3" placeholder="Alamat ..." name="saksi_dua_alamat"><?php echo isset($saksi_dua_alamat)?$saksi_dua_alamat:''; ?></textarea></div>
                    </div>
                </div><!-- /.box-body -->
              </div>

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Pemilik Tanah Bagian Timur</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                    <!-- text input -->

                    <div class="form-group">
                      <label class="col-md-2">Nama</label>
                      <div class="col-md-10"><input type="text" name="saksi_tiga_nama" class="form-control" placeholder="Nama . . . " value="<?php echo isset($saksi_tiga_nama)?$saksi_tiga_nama:''; ?>"></div>
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                      <label class="col-md-2">Umur</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Umur ..." name="saksi_tiga_umur" value="<?php echo isset($saksi_tiga_umur)?$saksi_tiga_umur:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Pekerjaan</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Pekerjaan ..." name="saksi_tiga_pekerjaan" value="<?php echo isset($saksi_tiga_pekerjaan)?$saksi_tiga_pekerjaan:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Jabatan</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Jabatan ..." name="saksi_tiga_jabatan" value="<?php echo isset($saksi_tiga_jabatan)?$saksi_tiga_jabatan:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Alamat</label>
                      <div class="col-md-10"><textarea class="form-control" rows="3" placeholder="Alamat ..." name="saksi_tiga_alamat"><?php echo isset($saksi_tiga_alamat)?$saksi_tiga_alamat:''; ?></textarea></div>
                    </div>
                </div><!-- /.box-body -->
              </div>

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Pemilik Tanah Bagian Selatan</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                    <!-- text input -->

                    <div class="form-group">
                      <label class="col-md-2">Nama</label>
                      <div class="col-md-10"><input type="text" name="saksi_empat_nama" class="form-control" placeholder="Nama . . . " value="<?php echo isset($saksi_empat_nama)?$saksi_empat_nama:''; ?>"></div>
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                      <label class="col-md-2">Umur</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Umur ..." name="saksi_empat_umur" value="<?php echo isset($saksi_empat_umur)?$saksi_empat_umur:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Pekerjaan</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Pekerjaan ..." name="saksi_empat_pekerjaan" value="<?php echo isset($saksi_empat_pekerjaan)?$saksi_empat_pekerjaan:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Jabatan</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Jabatan ..." name="saksi_empat_jabatan" value="<?php echo isset($saksi_empat_jabatan)?$saksi_empat_jabatan:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Alamat</label>
                      <div class="col-md-10"><textarea class="form-control" rows="3" placeholder="Alamat ..." name="saksi_empat_alamat"><?php echo isset($saksi_empat_alamat)?$saksi_empat_alamat:''; ?></textarea></div>
                    </div>
                </div><!-- /.box-body -->
              </div>


              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Pengukur 1</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                    <!-- text input -->

                    <div class="form-group">
                      <label class="col-md-2">Nama</label>
                      <div class="col-md-10"><input type="text" name="saksi_lima_nama" class="form-control" placeholder="Nama . . . " value="<?php echo isset($saksi_lima_nama)?$saksi_lima_nama:''; ?>"></div>
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                      <label class="col-md-2">Umur</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Umur ..." name="saksi_lima_umur" value="<?php echo isset($saksi_lima_umur)?$saksi_lima_umur:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Pekerjaan</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Pekerjaan ..." name="saksi_lima_pekerjaan" value="<?php echo isset($saksi_lima_pekerjaan)?$saksi_lima_pekerjaan:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Jabatan</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Jabatan ..." name="saksi_lima_jabatan" value="<?php echo isset($saksi_lima_jabatan)?$saksi_lima_jabatan:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Alamat</label>
                      <div class="col-md-10"><textarea class="form-control" rows="3" placeholder="Alamat ..." name="saksi_lima_alamat"><?php echo isset($saksi_lima_alamat)?$saksi_lima_alamat:''; ?></textarea></div>
                    </div>
                </div><!-- /.box-body -->
              </div>


              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Pengukur 2</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                    <!-- text input -->

                    <div class="form-group">
                      <label class="col-md-2">Nama</label>
                      <div class="col-md-10"><input type="text" name="saksi_enam_nama" class="form-control" placeholder="Nama . . . " value="<?php echo isset($saksi_enam_nama)?$saksi_enam_nama:''; ?>"></div>
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                      <label class="col-md-2">Umur</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Umur ..." name="saksi_enam_umur" value="<?php echo isset($saksi_enam_umur)?$saksi_enam_umur:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Pekerjaan</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Pekerjaan ..." name="saksi_enam_pekerjaan" value="<?php echo isset($saksi_enam_pekerjaan)?$saksi_enam_pekerjaan:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Jabatan</label>
                      <div class="col-md-10"><input type="text" class="form-control" placeholder="Jabatan ..." name="saksi_enam_jabatan" value="<?php echo isset($saksi_enam_jabatan)?$saksi_enam_jabatan:''; ?>"></div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2">Alamat</label>
                      <div class="col-md-10"><textarea class="form-control" rows="3" placeholder="Alamat ..." name="saksi_enam_alamat"><?php echo isset($saksi_enam_alamat)?$saksi_enam_alamat:''; ?></textarea></div>
                    </div>
                </div><!-- /.box-body -->
              </div>

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


        <div class="modal fade" id="pemilik_modal" tabindex="-1" role="dialog" aria-labelledby="PemilikModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="PemilikModal">Tambah Pemilik</h4>
      </div>
      <div class="modal-body">
        <form action="" id="form_pemilik" method="post">
          <table width="100%"  class='table table-bordered'>
             <tr>
                <td width="30%" >NIK</td>
                <TD>
                  <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" />
                  <input type="hidden" class="form-control" name="id" id="id" value="<?php  ?>" />
                </TD>
              </tr>
              <tr>
                <td width="30%" >Nama Pemilik</td>
                <TD>
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pemilik" />
                </TD>
              </tr>
              <tr>
                <td width="30%" >Tempat Lahir</td>
                <TD>
                  <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" />
                </TD>
              </tr>
              <tr>
                <td width="30%" >Tgl. Lahir</td>
                <TD>
                <input type="text" id="tgl_lahir" name="tgl_lahir" class="tanggal ui-datepicker form-control" placeholder="Tanggal Lahir"  data-date-format="dd-mm-yyyy">
                  
                </TD>
              </tr>
              <tr>
                <td width="30%" >Pekerjaan</td>
                <TD>
                  <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" />
                </TD>
              </tr>
              <tr>
                <td>Alamat </td>
                <TD>
                  <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" />
                  <input type="hidden" name="temp_id_tanah" value="<?php echo $temp_tanah_id; ?>"  id="temp_id_tanah"  />
                </TD>
              </tr>
              
              
            </table>   
          </form>   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="button" id="btn_simpan_pemilik" class="btn btn-primary" onclick="pemilik_update()">Simpan</button>
        </div>
      </div>
    </div>
  </div>

<?php 
$this->load->view($this->controller.'_form_view_js');
?>
