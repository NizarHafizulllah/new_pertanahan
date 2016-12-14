<script type="text/javascript">
	
function surat_add() {
     
    $('#surat_modal').modal('show');
                $("#SuratModal").html('TAMBAH DATA SURAT');
                          $('#nama').val('');
                         $('#nik').val('');
                         $('#tempat_lahir').val('');
                         $('#pekerjaan').val('');
                         $('#tgl_lahir').val('');
                         $('#id').val('');
                         $('#alamat').val('');
  document.getElementById( "btn_simpan_surat" ).setAttribute( "onClick", "javascript: surat_simpan();" ); 
  $("#form_surat").attr('action','<?php echo $surat_add_url; ?>');
    
    

}




function pihak_pertama_add() {
     
    $('#pihak_pertama_modal').modal('show');
    $("#PihakPertamaModal").html('TAMBAH DATA PIHAK PERTAMA');
                         //  $('#nama_saksi').val('');
                         // $('jabatan_saksi').val('');
      $("#nik").val('');
      $("#id_pihak_pertama").val('');
      $("#nama").val('');
      $("#tempat_lahir").val('');
      $("#status_kawin").val('');
      $("#jk").val('');
      $("#tgl_lahir").val('');
      $("#pekerjaan").val('');
      $("#warga_negara").val('');
      $("#status_kawin").val('');
      $("#tgl_ktp").val('');
      $("#tgl_berlaku_ktp").val('');
      $("#alamat").val('');
      $("#tersangka_id_provinsi").val('');
      $("#status_kawin").val('');
      $("#id_kecamatan").html('');
      $("#id_desa").html('');
      $("#tersangka_id_kota").html('');
      
 
  $("#form_pihak_pertama").attr('action','<?php echo $pihak_pertama_add_url; ?>');
    
    

}

function saksi_pelepasan_add() {
     
    $('#saksi_pelepasan_modal').modal('show');
                $("#SaksiModal").html('TAMBAH DATA SAKSI');
                          $('#nama_saksi').val('');
                         $('jabatan_saksi').val('');
  document.getElementById( "btn_simpan_saksi_pelepasan" ).setAttribute( "onClick", "javascript: saksi_pelepasan_simpan();" ); 
  $("#form_saksi_pelepasan").attr('action','<?php echo $saksi_pelepasan_add_url; ?>');
    
    

}


function perbatasan_pelepasan_add() {
     
    $('#perbatasan_pelepasan_modal').modal('show');
                $("#PerbatasanModal").html('TAMBAH DATA SAKSI PENGUKURAN');
                          $('#nama_perbatasan').val('');
                         $('id_perbatasan').val('');
  document.getElementById( "btn_simpan_perbatasan_pelepasan" ).setAttribute( "onClick", "javascript: perbatasan_pelepasan_simpan();" ); 
  $("#form_perbatasan_pelepasan").attr('action','<?php echo $perbatasan_pelepasan_add_url; ?>');
    
    

}


function surat_pelepasan_add() {
     
    $('#surat_pelepasan_modal').modal('show');
                $("#PelepsanModal").html('TAMBAH DATA SURAT');
                          $('#nama').val('');
                         $('#nik').val('');
                         $('#tempat_lahir').val('');
                         $('#pekerjaan').val('');
                         $('#tgl_lahir').val('');
                         $('#id').val('');
                         $('#alamat').val('');
  document.getElementById( "btn_simpan_surat_pelepasan" ).setAttribute( "onClick", "javascript: surat_pelepasan_simpan();" ); 
  $("#form_surat_pelepasan").attr('action','<?php echo $surat_pelepasan_add_url; ?>');
    
    

}

function perbatasan_pelepasan_simpan(){

    $('#myPleaseWait').modal('show');
        
        $.ajax({
            url : $("#form_perbatasan_pelepasan").attr('action'),
            data : $("#form_perbatasan_pelepasan").serialize(),
            dataType : 'json',
            type : 'post',
            success : function(obj) {
                $('#myPleaseWait').modal('hide');
                 console.log(obj);
                if(obj.error==false){
                         
                         BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message,
                             
                        });   
                         
                        $("#perbatasan_pelepasan_modal").modal('hide'); 
                        $('#perbatasan').DataTable().ajax.reload();                       
                        $('#form_perbatasan_pelepasan')[0].reset();
                        $('#nama_perbatasan').val('');
                         $('#jabatan_perbatasan').val('');
                            
                         
                    }
                    else {
                         BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            title: 'Error',
                            message: obj.message ,
                             
                        }); 
                    }
            }
        });
        return false;
}


function saksi_pelepasan_simpan(){

    $('#myPleaseWait').modal('show');
        
        $.ajax({
            url : $("#form_saksi_pelepasan").attr('action'),
            data : $("#form_saksi_pelepasan").serialize(),
            dataType : 'json',
            type : 'post',
            success : function(obj) {
                $('#myPleaseWait').modal('hide');
                 console.log(obj);
                if(obj.error==false){
                         
                         BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message,
                             
                        });   
                         
                        $("#saksi_pelepasan_modal").modal('hide'); 
                        $('#saksi').DataTable().ajax.reload();                       
                        $('#form_saksi_pelepasan')[0].reset();
                        $('#nama_saksi').val('');
                         $('#jabatan_saksi').val('');
                            
                         
                    }
                    else {
                         BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            title: 'Error',
                            message: obj.message ,
                             
                        }); 
                    }
            }
        });
        return false;
}





function pihak_pertama_simpan(){

  // alert('pihak pertamasimpan');

    $('#myPleaseWait').modal('show');
        
        $.ajax({
            url : $("#form_pihak_pertama").attr('action'),
            data : $("#form_pihak_pertama").serialize(),
            dataType : 'json',
            type : 'post',
            success : function(obj) {
                $('#myPleaseWait').modal('hide');
                 console.log(obj);
                if(obj.error==false){
                         
                         BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message,
                             
                        });   
                         
                        $("#pihak_pertama_modal").modal('hide'); 
                        $('#pihak_pertama').DataTable().ajax.reload();                       
                        $('#form_pihak_pertama')[0].reset();
                        // $('#nama_saksi').val('');
                        //  $('#jabatan_saksi').val('');
                            
                         
                    }
                    else {
                         BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            title: 'Error',
                            message: obj.message ,
                             
                        }); 
                    }
            }
        });
        return false;
}


function surat_pelepasan_simpan(){

    $('#myPleaseWait').modal('show');
        
        $.ajax({
            url : $("#form_surat_pelepasan").attr('action'),
            data : $("#form_surat_pelepasan").serialize(),
            dataType : 'json',
            type : 'post',
            success : function(obj) {
                $('#myPleaseWait').modal('hide');
                 console.log(obj);
                if(obj.error==false){
                         
                         BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message,
                             
                        });   
                         
                        $("#surat_pelepasan_modal").modal('hide'); 
                        $('#surat').DataTable().ajax.reload();                       
                        $('#form_surat_pelepasan')[0].reset();
                        $('#pihak_pertama').val('');
                         $('#pihak_kedua').val('');
                         $('#tgl_surat_kec').val('');
                         $('#no_surat_kecamatan').val('');       
                         
                    }
                    else {
                         BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            title: 'Error',
                            message: obj.message ,
                             
                        }); 
                    }
            }
        });
        return false;
}
     

function surat_simpan(){

    $('#myPleaseWait').modal('show');
        
        $.ajax({
            url : $("#form_surat").attr('action'),
            data : $("#form_surat").serialize(),
            dataType : 'json',
            type : 'post',
            success : function(obj) {
                $('#myPleaseWait').modal('hide');
                 console.log(obj);
                if(obj.error==false){
                         
                         BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message,
                             
                        });   
                         
                        $("#surat_modal").modal('hide'); 
                        $('#surat').DataTable().ajax.reload();                       
                        $('#form_pemilik')[0].reset();
                        $('#nama_posisi').val('');
                         $('#nik_posisi').val('');
                         $('#tempat_lahir_posisi').val('');
                         $('#pekerjaan_posisi').val('');
                         $('#tgl_lahir_posisi').val('');
                         $('#jenis').val('');
                         $('#id_posisi').val('');
                         $('#alamat_posisi').val('');        
                         
                    }
                    else {
                         BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            title: 'Error',
                            message: obj.message ,
                             
                        }); 
                    }
            }
        });
        return false;
}

	$(document).ready(function() {

    $(".rp").autoNumeric('init'); 

    
         $(".tanggal").datepicker().on('changeDate', function(ev){                 
             $('.tanggal').datepicker('hide');
        });

        $(".select2").select2();

     
     var dt = $("#surat").DataTable(
            {

                "columnDefs": [ { "targets": 0, "orderable": false } ],
                "processing": true,
                "serverSide": true,
                "ajax": '<?php echo $json_url_surat ?>'
            });

     var dt = $("#saksi").DataTable(
            {

                "columnDefs": [ { "targets": 0, "orderable": false } ],
                "processing": true,
                "serverSide": true,
                "ajax": '<?php echo $json_url_saksi ?>'
            });


     var dt = $("#pihak_pertama").DataTable(
            {

                "columnDefs": [ { "targets": 0, "orderable": false } ],
                "processing": true,
                "serverSide": true,
                "ajax": '<?php echo $json_url_pihak_pertama ?>'
            });

     var dt = $("#perbatasan").DataTable(
            {

                "columnDefs": [ { "targets": 0, "orderable": false } ],
                "processing": true,
                "serverSide": true,
                "ajax": '<?php echo $json_url_perbatasan ?>'
            });


       


        $("#id_kota").change(function(){

    	$.ajax({

            url : '<?php echo site_url("$this->controller/get_kecamatan") ?>',
            data : { id_kota : $(this).val() },
            type : 'post', 
            success : function(result) {
                $("#id_kecamatan").html(result)
            }
      });

    });



   $("#provinsi_pihak_pertama").change(function(){

    $.ajax({

            url : '<?php echo site_url("$this->controller/get_kota") ?>',
            data : { id_provinsi : $(this).val() },
            type : 'post', 
            success : function(result) {
                $("#kabupaten_pihak_pertama").html(result)
            }
      });

    });

   $("#kabupaten_pihak_pertama").change(function(){

    $.ajax({

            url : '<?php echo site_url("$this->controller/get_kecamatan") ?>',
            data : { id_kota : $(this).val() },
            type : 'post', 
            success : function(result) {
                $("#kecamatan_pihak_pertama").html(result)
            }
      });

    });


   $("#kecamatan_pihak_pertama").change(function(){

    $.ajax({

            url : '<?php echo site_url("$this->controller/get_desa") ?>',
            data : { id_kecamatan : $(this).val() },
            type : 'post', 
            success : function(result) {
                $("#desa_pihak_pertama").html(result)
            }
      });

    });

  $("#provinsi_pihak_kedua").change(function(){

    $.ajax({

            url : '<?php echo site_url("$this->controller/get_kota") ?>',
            data : { id_provinsi : $(this).val() },
            type : 'post', 
            success : function(result) {
                $("#kabupaten_pihak_kedua").html(result)
            }
      });

    });

   $("#kabupaten_pihak_kedua").change(function(){

    $.ajax({

            url : '<?php echo site_url("$this->controller/get_kecamatan") ?>',
            data : { id_kota : $(this).val() },
            type : 'post', 
            success : function(result) {
                $("#kecamatan_pihak_kedua").html(result)
            }
      });

    });


   $("#kecamatan_pihak_kedua").change(function(){

    $.ajax({

            url : '<?php echo site_url("$this->controller/get_desa") ?>',
            data : { id_kecamatan : $(this).val() },
            type : 'post', 
            success : function(result) {
                $("#desa_pihak_kedua").html(result)
            }
      });

    });



$('#no_surat').focus(function(){
    console.log('test');

    $.ajax({
        url : '<?php echo site_url("$this->controller/get_no_surat") ?>',
        data :  $("#form_data").serialize(), 
        type : 'post',
        dataType : 'json',
        success : function(obj) {

            console.log(obj.error);

            if(obj.error == false) { // berhasil 

                // alert('hooooo.. error false');
                     console.log(obj.error);
            $("#no_surat").val(obj.no_surat);
           
            
            }
            else {
                 BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            title: 'Error',
                            message: obj.message 
                             
                        });
                        // $("#rp_daftar_stnk").val(obj.rp_daftar_stnk);
            
            }

            
        }
    });
    return false;

});


   $("#tombolsubmitsimpan").click(function(){
 console.log('tests');

    $.ajax({
        url:'<?php echo site_url("$this->controller/simpan"); ?>',
        data : $('#form_data').serialize(),
        type : 'post',
        dataType : 'json',
        success : function(obj){

            console.log(obj.error);

            if(obj.error == false) { // berhasil 

                // alert('hooooo.. error false');
                     BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message,
                            
                            callback: function(result) {
                                                  location.href='<?php echo site_url("$this->controller"); ?>';
                            }
                             
                              });   
                          
                      // $('#form_data').data('bootstrapValidator').resetForm(true);
                      
            }
            else {
                 BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            title: 'Error',
                            message: obj.message 
                             
                        }); 
            }
        }
    });

    return false;
});

   $("#nik_posisi").blur(function(){
       // alert('hell yea..');

       $.ajax({
            url : '<?php echo site_url("$this->controller/get_data_penduduk") ?>',
           dataType : 'json',
            type : 'post',
            data : { nik_posisi : $("#nik_posisi").val()  },
            success : function(obj) {
                // console.log(obj);
               
                // alert(obj.nama_pemilik_tanah);
                // var type = [obj.Data.KodeDealer, obj.Data.NamaDealer];
                $('#nama_posisi').val(obj.nama_pemilik_tanah);
                $('#tempat_lahir_posisi').val(obj.tempat_lahir);
                $('#pekerjaan_posisi').val(obj.pekerjaan);
                $('#tgl_lahir_posisi').val(obj.tgl_lahir);
                
                
                $('#alamat_posisi').val(obj.alamat);

               

               
                // $.ajax({
                //     url : '<?php echo site_url("$this->controller/model") ?>',
                //     data : {Merk : obj.Data.Model},
                //     type : 'post', 
                //         success : function(result) {
                //         $("#id_model").html(result)
                //     }
                // });

                // $("#kode_dealer").val(obj.Data.KodeDealer);
                // alert(obj.Data.KodeDealer);


            }

       });


       
 });

   $("#nik").blur(function(){
       // alert('hell yea..');

       $.ajax({
            url : '<?php echo site_url("$this->controller/get_data_penduduk") ?>',
           dataType : 'json',
            type : 'post',
            data : { nik_posisi : $("#nik").val()  },
            success : function(obj) {
                // console.log(obj);
               
                // alert(obj.nama_pemilik_tanah);
                // var type = [obj.Data.KodeDealer, obj.Data.NamaDealer];
                $('#nama').val(obj.nama_pemilik_tanah);
                $('#tempat_lahir').val(obj.tempat_lahir);
                $('#pekerjaan').val(obj.pekerjaan);
                $('#tgl_lahir').val(obj.tgl_lahir);
                
                
                $('#alamat').val(obj.alamat);

               

               
                // $.ajax({
                //     url : '<?php echo site_url("$this->controller/model") ?>',
                //     data : {Merk : obj.Data.Model},
                //     type : 'post', 
                //         success : function(result) {
                //         $("#id_model").html(result)
                //     }
                // });

                // $("#kode_dealer").val(obj.Data.KodeDealer);
                // alert(obj.Data.KodeDealer);


            }

       });


       
 });



    $("#tombolsubmitupdate").click(function(){
 console.log('tests');

    $.ajax({
        url:'<?php echo site_url("$this->controller/update"); ?>',
        data : $('#form_data').serialize(),
        type : 'post',
        dataType : 'json',

        success : function(obj){

            console.log(obj.error);

            if(obj.error == false) { // berhasil 

                // alert('hooooo.. error false');
                     BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message,
                            
                            callback: function(result) {
                                                  location.href='<?php echo site_url("$this->controller"); ?>';
                            }
                             
                        });   
                      $('#form_data').data('bootstrapValidator').resetForm(true);
            }
            else {
                 BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            title: 'Error',
                            message: obj.message 
                             
                        }); 
            }
        }
    });

    return false;
});

});







function perbatasan_hapus(id){



BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA SAKSI PENGUKURAN. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA SAKSI PENGUKURAN',
            draggable: true,
            buttons : [
              {
                label : 'YA',
                cssClass : 'btn-primary',
                hotkey: 13,
                action : function(dialogItself){


                  dialogItself.close();
                  $('#myPleaseWait').modal('show'); 
                  $.ajax({
                    url : '<?php echo site_url("$this->controller/hapusdata_perbatasan") ?>',
                    type : 'post',
                    data : {id : id},
                    dataType : 'json',
                    success : function(obj) {
                        $('#myPleaseWait').modal('hide'); 
                        if(obj.error==false) {
                                BootstrapDialog.alert({
                                      type: BootstrapDialog.TYPE_PRIMARY,
                                      title: 'Informasi',
                                      message: obj.message,
                                       
                                  });   

                            $('#perbatasan').DataTable().ajax.reload();     
                        }
                        else {
                            BootstrapDialog.alert({
                                  type: BootstrapDialog.TYPE_DANGER,
                                  title: 'Error',
                                  message: obj.message,
                                   
                              }); 
                        }
                    }
                  });

                }
              },
              {
                label : 'TIDAK',
                cssClass : 'btn-danger',
                action: function(dialogItself){
                    dialogItself.close();
                }
              }
            ]
          });

}



function hapus_pihak_pertama(id){



BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA PIHAK PERTAMA. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA PIHAK PERTAMA',
            draggable: true,
            buttons : [
              {
                label : 'YA',
                cssClass : 'btn-primary',
                hotkey: 13,
                action : function(dialogItself){


                  dialogItself.close();
                  $('#myPleaseWait').modal('show'); 
                  $.ajax({
                    url : '<?php echo site_url("$this->controller/hapus_pihak_pertama") ?>',
                    type : 'post',
                    data : {id : id},
                    dataType : 'json',
                    success : function(obj) {
                        $('#myPleaseWait').modal('hide'); 
                        if(obj.error==false) {
                                BootstrapDialog.alert({
                                      type: BootstrapDialog.TYPE_PRIMARY,
                                      title: 'Informasi',
                                      message: obj.message,
                                       
                                  });   

                            $('#pihak_pertama').DataTable().ajax.reload();     
                        }
                        else {
                            BootstrapDialog.alert({
                                  type: BootstrapDialog.TYPE_DANGER,
                                  title: 'Error',
                                  message: obj.message,
                                   
                              }); 
                        }
                    }
                  });

                }
              },
              {
                label : 'TIDAK',
                cssClass : 'btn-danger',
                action: function(dialogItself){
                    dialogItself.close();
                }
              }
            ]
          });

}


function hapus(id){



BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA SURAT. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA  SURAT',
            draggable: true,
            buttons : [
              {
                label : 'YA',
                cssClass : 'btn-primary',
                hotkey: 13,
                action : function(dialogItself){


                  dialogItself.close();
                  $('#myPleaseWait').modal('show'); 
                  $.ajax({
                    url : '<?php echo site_url("$this->controller/hapusdata_surat") ?>',
                    type : 'post',
                    data : {id : id},
                    dataType : 'json',
                    success : function(obj) {
                        $('#myPleaseWait').modal('hide'); 
                        if(obj.error==false) {
                                BootstrapDialog.alert({
                                      type: BootstrapDialog.TYPE_PRIMARY,
                                      title: 'Informasi',
                                      message: obj.message,
                                       
                                  });   

                            $('#surat').DataTable().ajax.reload();     
                        }
                        else {
                            BootstrapDialog.alert({
                                  type: BootstrapDialog.TYPE_DANGER,
                                  title: 'Error',
                                  message: obj.message,
                                   
                              }); 
                        }
                    }
                  });

                }
              },
              {
                label : 'TIDAK',
                cssClass : 'btn-danger',
                action: function(dialogItself){
                    dialogItself.close();
                }
              }
            ]
          });

}

function perbatasan_edit(id){


    $('#perbatasan_pelepasan_modal').modal('show');
    $("#form_perbatasan").attr('action','<?php echo site_url("$this->controller/tmp_perbatasan_update") ?>'); 


    $.ajax({
    url : '<?php echo site_url("$this->controller/get_perbatasan_detail/"); ?>/'+id,
    dataType : 'json',
    success : function(jsonData) {
    $("#perbatasan_pelepasan_modal").modal('show');
       $("#PerbatasanModal").html('EDIT DATA SAKSI PENGUKURAN');
       $(".tombol").prop('value','UPDATE DATA SAKSI PENGUKURAN');

      $("#nama_perbatasan").val(jsonData.nama);
      $("#jenis").val(jsonData.jenis);
      $("#sebagai").val(jsonData.sebagai);
      
      $("#id_perbatasan").val(jsonData.id);

      document.getElementById( "btn_simpan_perbatasan_pelepasan" ).setAttribute( "onClick", "javascript: perbatasan_update();" );
      
    }
  });
}


function surat_edit(id){


    $('#surat_pelepasan_modal').modal('show');
    $("#form_surat").attr('action','<?php echo site_url("$this->controller/tmp_surat_update") ?>'); 


    $.ajax({
    url : '<?php echo site_url("$this->controller/get_surat_detail/"); ?>/'+id,
    dataType : 'json',
    success : function(jsonData) {
    $("#surat_pelepasan_modal").modal('show');
       $("#PelepasanModal").html('EDIT DATA SURAT');
       $(".tombol").prop('value','UPDATE DATA SURAT');

      $("#isi_surat").val(jsonData.surat);
      $("#id_surat").val(jsonData.id);
      
      $("#id").val(jsonData.id);

      document.getElementById( "btn_simpan_surat_pelepasan" ).setAttribute( "onClick", "javascript: surat_update();" );
      
    }
  });
}

function pihak_pertama_edit(id){


    $('#pihak_pertama_modal').modal('show');
    $("#form_pihak_pertama").attr('action','<?php echo site_url("$this->controller/tmp_pihak_pertama_update") ?>'); 


    $.ajax({
    url : '<?php echo site_url("$this->controller/get_pihak_pertama_detail/"); ?>/'+id,
    dataType : 'json',
    success : function(jsonData) {
    $("#pihak_pertama_modal").modal('show');
       $("#PihakPertamaModal").html('EDIT DATA PIHAK PERTAMA');
       $(".tombol").prop('value','UPDATE DATA PIHAK PERTAMA');

      $("#nik").val(jsonData.nik);
      $("#id_pihak_pertama").val(jsonData.id);
      $("#nama").val(jsonData.nama);
      $("#tempat_lahir").val(jsonData.tempat_lahir);
      $("#tgl_lahir").val(jsonData.tgl_lahir);
      $("#pekerjaan").val(jsonData.pekerjaan);
      $("#warga_negara").val(jsonData.warga_negara);
      $("#status_kawin").val(jsonData.status_kawin);
      $("#tgl_ktp").val(jsonData.tgl_ktp);
      $("#tgl_berlaku_ktp").val(jsonData.tgl_berlaku_ktp);
      $("#alamat").val(jsonData.alamat);
      $("#id_desa").val(jsonData.id_desa);
      $("#status_kawin").val(jsonData.status_kawin);
      $("#nama_pasangan").val(jsonData.nama_pasangan);
      $("#jk").val(jsonData.jk);
      // $("#id_kecamatan").val(jsonData.id_kecamatan);
      $("#tersangka_id_provinsi").val(jsonData.id_provinsi);
      $.ajax({

            url : '<?php echo site_url("$this->controller/get_kota") ?>',
            data : { id_provinsi : jsonData.id_provinsi },
            type : 'post', 
            success : function(result) {
                $("#tersangka_id_kota").html(result)
                $("#tersangka_id_kota").val(jsonData.id_kota);
            }
      });

      $.ajax({

            url : '<?php echo site_url("$this->controller/get_kecamatan") ?>',
            data : { id_kota : jsonData.id_kota },
            type : 'post', 
            success : function(result) {
                $("#id_kecamatan").html(result)
                $("#id_kecamatan").val(jsonData.id_kecamatan);
            }
      });

      $.ajax({

            url : '<?php echo site_url("$this->controller/get_desa") ?>',
            data : { id_kecamatan : jsonData.id_kecamatan },
            type : 'post', 
            success : function(result) {
                $("#id_desa").html(result)
                $("#id_desa").val(jsonData.id_desa);
            }
      });
      
      

      document.getElementById( "btn_simpan_pemilik" ).setAttribute( "onClick", "javascript: pihak_update();" );
      
    }
  });
}






function saksi_edit(id){


    $('#saksi_pelepasan_modal').modal('show');
    $("#form_saksi_pelepasan").attr('action','<?php echo site_url("$this->controller/tmp_saksi_update") ?>'); 


    $.ajax({
    url : '<?php echo site_url("$this->controller/get_saksi_detail/"); ?>/'+id,
    dataType : 'json',
    success : function(jsonData) {
    $("#modal_saksi").modal('show');
       $("#SaksiModal").html('EDIT DATA SAKSI');
       $(".tombol").prop('value','UPDATE DATA SAKSI');
      $("#nama_saksi").val(jsonData.nama);
      $("#jabatan_saksi").val(jsonData.jabatan);
      $("#id_saksi").val(jsonData.id);
      

      document.getElementById( "btn_simpan_saksi" ).setAttribute( "onClick", "javascript: saksi_update();" );
      
    }
  });
}

function saksi_pelepasan_update(){
   $('#myPleaseWait').modal('show');
        
        $.ajax({
            url : '<?php echo site_url("$this->controller/saksi_update"); ?>',
            data : $("#form_saksi_pelepasan").serialize(),
            dataType : 'json',
            type : 'post',
            success : function(obj) {
                $('#myPleaseWait').modal('hide');
                 console.log(obj);
                if(obj.error==false){
                         
                         BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message,
                             
                        });   
                         
                        $("#saksi_pelepasan_modal").modal('hide'); 
                        $('#saksi').DataTable().ajax.reload();                       
                        $('#form_saksi_pelepasan')[0].reset();
                                
                         
                    }
                    else {
                         BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            title: 'Error',
                            message: obj.message ,
                             
                        }); 
                    }
            }
        });
        return false;
}

function pihak_update(){
   $('#myPleaseWait').modal('show');
        
        $.ajax({
            url : '<?php echo site_url("$this->controller/pihak_pertama_update"); ?>',
            data : $("#form_pihak_pertama").serialize(),
            dataType : 'json',
            type : 'post',
            success : function(obj) {
                $('#myPleaseWait').modal('hide');
                 console.log(obj);
                if(obj.error==false){
                         
                         BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message,
                             
                        });   
                         
                        $("#pihak_pertama_modal").modal('hide'); 
                        $('#pihak_pertama').DataTable().ajax.reload();                       
                        $('#form_pihak_pertama')[0].reset();
                                
                         
                    }
                    else {
                         BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            title: 'Error',
                            message: obj.message ,
                             
                        }); 
                    }
            }
        });
        return false;
}

function perbatasan_update(){
   $('#myPleaseWait').modal('show');
        
        $.ajax({
            url : '<?php echo site_url("$this->controller/perbatasan_update"); ?>',
            data : $("#form_perbatasan_pelepasan").serialize(),
            dataType : 'json',
            type : 'post',
            success : function(obj) {
                $('#myPleaseWait').modal('hide');
                 console.log(obj);
                if(obj.error==false){
                         
                         BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message,
                             
                        });   
                         
                        $("#perbatasan_pelepasan_modal").modal('hide'); 
                        $('#perbatasan').DataTable().ajax.reload();                       
                        $('#form_perbatasan_pelepasan')[0].reset();
                                
                         
                    }
                    else {
                         BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            title: 'Error',
                            message: obj.message ,
                             
                        }); 
                    }
            }
        });
        return false;
}


function surat_update(){
   $('#myPleaseWait').modal('show');
        
        $.ajax({
            url : '<?php echo site_url("$this->controller/surat_update"); ?>',
            data : $("#form_surat_pelepasan").serialize(),
            dataType : 'json',
            type : 'post',
            success : function(obj) {
                $('#myPleaseWait').modal('hide');
                 console.log(obj);
                if(obj.error==false){
                         
                         BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message,
                             
                        });   
                         
                        $("#surat_pelepasan_modal").modal('hide'); 
                        $('#surat').DataTable().ajax.reload();                       
                        $('#form_surat_pelepasan')[0].reset();
                                
                         
                    }
                    else {
                         BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            title: 'Error',
                            message: obj.message ,
                             
                        }); 
                    }
            }
        });
        return false;
}

</script>