<script type="text/javascript">
	
function pemilik_add() {
     
    $('#pemilik_modal').modal('show');
                $("#PemilikModal").html('TAMBAH DATA PEMILIK');
                          $('#nama').val('');
                         $('#nik').val('');
                         $('#tempat_lahir').val('');
                         $('#pekerjaan').val('');
                         $('#tgl_lahir').val('');
                         $('#id').val('');
                         $('#alamat').val('');
  document.getElementById( "btn_simpan_pemilik" ).setAttribute( "onClick", "javascript: pemilik_simpan();" ); 
  $("#form_pemilik").attr('action','<?php echo $pemilik_add_url; ?>');
    
    

}

function saksi_add() {
     
    $('#saksi_modal').modal('show');
                $("#PemilikModal").html('TAMBAH DATA SAKSI');
                          $('#nama').val('');
                         $('#nik').val('');
                         $('#tempat_lahir').val('');
                         $('#pekerjaan').val('');
                         $('#tgl_lahir').val('');
                         $('#id').val('');
                         $('#alamat').val('');
  document.getElementById( "btn_simpan_saksi" ).setAttribute( "onClick", "javascript: saksi_simpan();" ); 
  $("#form_saksi").attr('action','<?php echo $saksi_add_url; ?>');
    
    

}


function posisi_add(bagian) {
     
    $('#posisi_modal').modal('show');
                $("#PosisiModal").html('TAMBAH DATA PEMILIK SEBELAH '+bagian);
                          $('#nama_posisi').val('');
                         $('#nik_posisi').val('');
                         $('#tempat_lahir_posisi').val('');
                         $('#pekerjaan_posisi').val('');
                         $('#tgl_lahir_posisi').val('');
                         $('#jenis').val('');
                         $('#id_posisi').val('');
                         $('#alamat_posisi').val('');
  if (bagian=='BARAT') {
    document.getElementById( "btn_simpan_posisi" ).setAttribute( "onClick", "javascript: posisi_barat_simpan();" );  
    $("#form_posisi").attr('action','<?php echo $posisi_add_barat_url; ?>');
   }else if(bagian=='SELATAN'){
    document.getElementById( "btn_simpan_posisi" ).setAttribute( "onClick", "javascript: posisi_selatan_simpan();" );  
    $("#form_posisi").attr('action','<?php echo $posisi_add_selatan_url; ?>');
  }else if(bagian=='UTARA'){
    document.getElementById( "btn_simpan_posisi" ).setAttribute( "onClick", "javascript: posisi_utara_simpan();" );  
    $("#form_posisi").attr('action','<?php echo $posisi_add_utara_url; ?>');
  }else if(bagian=='TIMUR'){
    document.getElementById( "btn_simpan_posisi" ).setAttribute( "onClick", "javascript: posisi_timur_simpan();" );  
    $("#form_posisi").attr('action','<?php echo $posisi_add_timur_url; ?>');
  }
  
     
  
    
    

}

function posisi_barat_simpan(){

    $('#myPleaseWait').modal('show');
        
        $.ajax({
            url : $("#form_posisi").attr('action'),
            data : $("#form_posisi").serialize(),
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
                         
                        $("#posisi_modal").modal('hide'); 
                        $('#posisi_barat').DataTable().ajax.reload();                       
                        $('#form_posisi')[0].reset();
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



function posisi_timur_simpan(){

    $('#myPleaseWait').modal('show');
        
        $.ajax({
            url : $("#form_posisi").attr('action'),
            data : $("#form_posisi").serialize(),
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
                         
                        $("#posisi_modal").modal('hide'); 
                        $('#posisi_timur').DataTable().ajax.reload();                       
                        $('#form_posisi')[0].reset();
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


function posisi_selatan_simpan(){

    $('#myPleaseWait').modal('show');
        
        $.ajax({
            url : $("#form_posisi").attr('action'),
            data : $("#form_posisi").serialize(),
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
                         
                        $("#posisi_modal").modal('hide'); 
                        $('#posisi_selatan').DataTable().ajax.reload();                       
                        $('#form_posisi')[0].reset();
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

function saksi_simpan(){

    $('#myPleaseWait').modal('show');
        
        $.ajax({
            url : $("#form_saksi").attr('action'),
            data : $("#form_saksi").serialize(),
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
                         
                        $("#saksi_modal").modal('hide'); 
                        $('#saksi').DataTable().ajax.reload();                       
                        $('#form_saksi')[0].reset();
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




function pemilik_simpan(){

    $('#myPleaseWait').modal('show');
        
        $.ajax({
            url : $("#form_pemilik").attr('action'),
            data : $("#form_pemilik").serialize(),
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
                         
                        $("#pemilik_modal").modal('hide'); 
                        $('#pemilik').DataTable().ajax.reload();                       
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

    
         $(".tanggal").datepicker().on('changeDate', function(ev){                 
             $('.tanggal').datepicker('hide');
        });

        $(".select2").select2();

     
     var dt = $("#pemilik").DataTable(
            {
                // "order": [[ 0, "desc" ]],
                // "iDisplayLength": 50,
                // "columnDefs": [ { "targets": 7, "orderable": false } ],
                // "processing": true,
                // "serverSide": true,
                // "bLengthChange": false,
                // "bInfo": false,
                // "ajax": '<?php echo $json_url_pemilik ?>'

                "columnDefs": [ { "targets": 0, "orderable": false } ],
                "processing": true,
                "serverSide": true,
                "ajax": '<?php echo $json_url_pemilik ?>'
            });


     var dt = $("#saksi").DataTable(
            {
                // "order": [[ 0, "desc" ]],
                // "iDisplayLength": 50,
                // "columnDefs": [ { "targets": 7, "orderable": false } ],
                // "processing": true,
                // "serverSide": true,
                // "bLengthChange": false,
                // "bInfo": false,
                // "ajax": '<?php echo $json_url_pemilik ?>'

                "columnDefs": [ { "targets": 0, "orderable": false } ],
                "processing": true,
                "serverSide": true,
                "ajax": '<?php echo $json_url_saksi ?>'
            });


     var dt = $("#posisi_utara").DataTable(
            {
                // "order": [[ 0, "desc" ]],
                // "iDisplayLength": 50,
                // "columnDefs": [ { "targets": 7, "orderable": false } ],
                // "processing": true,
                // "serverSide": true,
                // "bLengthChange": false,
                // "bInfo": false,
                // "ajax": '<?php echo $json_url_pemilik ?>'

                "columnDefs": [ { "targets": 0, "orderable": false } ],
                "processing": true,
                "serverSide": true,
                "ajax": '<?php echo $json_url_posisi_utara ?>'
            });

     var dt = $("#posisi_barat").DataTable(
            {
                // "order": [[ 0, "desc" ]],
                // "iDisplayLength": 50,
                // "columnDefs": [ { "targets": 7, "orderable": false } ],
                // "processing": true,
                // "serverSide": true,
                // "bLengthChange": false,
                // "bInfo": false,
                // "ajax": '<?php echo $json_url_pemilik ?>'

                "columnDefs": [ { "targets": 0, "orderable": false } ],
                "processing": true,
                "serverSide": true,
                "ajax": '<?php echo $json_url_posisi_barat ?>'
            });
     var dt = $("#posisi_selatan").DataTable(
            {
                // "order": [[ 0, "desc" ]],
                // "iDisplayLength": 50,
                // "columnDefs": [ { "targets": 7, "orderable": false } ],
                // "processing": true,
                // "serverSide": true,
                // "bLengthChange": false,
                // "bInfo": false,
                // "ajax": '<?php echo $json_url_pemilik ?>'

                "columnDefs": [ { "targets": 0, "orderable": false } ],
                "processing": true,
                "serverSide": true,
                "ajax": '<?php echo $json_url_posisi_selatan ?>'
            });


        var dt = $("#posisi_timur").DataTable(
            {
                // "order": [[ 0, "desc" ]],
                // "iDisplayLength": 50,
                // "columnDefs": [ { "targets": 7, "orderable": false } ],
                // "processing": true,
                // "serverSide": true,
                // "bLengthChange": false,
                // "bInfo": false,
                // "ajax": '<?php echo $json_url_pemilik ?>'

                "columnDefs": [ { "targets": 0, "orderable": false } ],
                "processing": true,
                "serverSide": true,
                "ajax": '<?php echo $json_url_posisi_timur ?>'
            });

         


         
         // var dt_pemilik = $("#pemilik").DataTable(
         //    {
                
         //        "columnDefs": [{ "targets": 0, "orderable": false }],
         //        "processing": true,
         //        "serverSide": true,
         //        "bLengthChange": false,
         //        "bInfo": false,
         //        "ajax": '<?php echo site_url("regis_desa/get_pemilik") ?>'
         //    });



		
       


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



   $("#id_kecamatan").change(function(){

    $.ajax({

            url : '<?php echo site_url("$this->controller/get_desa") ?>',
            data : { id_kecamatan : $(this).val() },
            type : 'post', 
            success : function(result) {
                $("#id_desa").html(result)
            }
      });

    });

$('#no_register_desa').focus(function(){
    console.log('test');

    $.ajax({
        url : '<?php echo site_url("$this->controller/get_no_regis") ?>',
        data :  $("#form_data").serialize(), 
        type : 'post',
        dataType : 'json',
        success : function(obj) {

            console.log(obj.error);

            if(obj.error == false) { // berhasil 

                // alert('hooooo.. error false');
                     console.log(obj.error);
            // $("#no_register_desa").val(obj.no_registrasi_desa);
            // $("#no_ket_desa").val(obj.no_ket_desa);
            // $("#no_berita_acara_desa").val(obj.no_berita_acara_desa);
            
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

function hapus_barat(id){



BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA PEMILIK TANAH BAGIAN BARAT. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA  PEMILIK TANAH BAGIAN BARAT',
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
                    url : '<?php echo site_url("$this->controller/hapusdata_barat") ?>',
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

                            $('#posisi_barat').DataTable().ajax.reload();     
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


function hapus_timur(id){



BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA PEMILIK TANAH BAGIAN TIMUR. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA  PEMILIK TANAH BAGIAN TIMUR',
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
                    url : '<?php echo site_url("$this->controller/hapusdata_timur") ?>',
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

                            $('#posisi_timur').DataTable().ajax.reload();     
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

function hapus_selatan(id){



BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA PEMILIK TANAH BAGIAN SELATAN. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA  PEMILIK TANAH BAGIAN SELATAN',
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
                    url : '<?php echo site_url("$this->controller/hapusdata_selatan") ?>',
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

                            $('#posisi_selatan').DataTable().ajax.reload();     
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

function hapus_utara(id){



BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA PEMILIK TANAH BAGIAN UTARA. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA  PEMILIK TANAH BAGIAN UTARA',
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
                    url : '<?php echo site_url("$this->controller/hapusdata_utara") ?>',
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

                            $('#posisi_utara').DataTable().ajax.reload();     
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



function hapus_saksi(id){



BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA SAKSI. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA SAKSI',
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
                    url : '<?php echo site_url("$this->controller/hapusdata_saksi") ?>',
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

                            $('#saksi').DataTable().ajax.reload();     
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
            message : 'ANDA AKAN MENGHAPUS DATA PEMILIK TANAH. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA  PEMILIK TANAH',
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
                    url : '<?php echo site_url("$this->controller/hapusdata_pemilik") ?>',
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

                            $('#pemilik').DataTable().ajax.reload();     
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


function pemilik_edit(id){


    $('#pemilik_modal').modal('show');
    $("#form_pemilik").attr('action','<?php echo site_url("$this->controller/tmp_pemilik_update") ?>'); 


    $.ajax({
    url : '<?php echo site_url("$this->controller/get_pemilik_detail/"); ?>/'+id,
    dataType : 'json',
    success : function(jsonData) {
    $("#modal_saksi").modal('show');
       $("#PemilikModal").html('EDIT DATA PEMILIK');
       $(".tombol").prop('value','UPDATE DATA PEMILIK');
      $("#nama").val(jsonData.nama);
      $("#nik").val(jsonData.nik);
      $("#tempat_lahir").val(jsonData.tempat_lahir);
      $("#tgl_lahir").val(jsonData.tgl_lahir);
      $("#pekerjaan").val(jsonData.pekerjaan);
      $("#alamat").val(jsonData.alamat);
      $("#id").val(jsonData.id);

      document.getElementById( "btn_simpan_pemilik" ).setAttribute( "onClick", "javascript: pemilik_update();" );
      
    }
  });
}


function saksi_edit(id){


    $('#saksi_modal').modal('show');
    $("#form_saksi").attr('action','<?php echo site_url("$this->controller/tmp_saksi_update") ?>'); 


    $.ajax({
    url : '<?php echo site_url("$this->controller/get_saksi_detail/"); ?>/'+id,
    dataType : 'json',
    success : function(jsonData) {
    $("#modal_saksi").modal('show');
       $("#SaksiModal").html('EDIT DATA SAKSI');
       $(".tombol").prop('value','UPDATE DATA SAKSI');
      $("#nama_posisi").val(jsonData.nama);
      $("#nik_posisi").val(jsonData.nik);
      $("#tempat_lahir_posisi").val(jsonData.tempat_lahir);
      $("#tgl_lahir_posisi").val(jsonData.tgl_lahir);
      $("#pekerjaan_posisi").val(jsonData.pekerjaan);
      $("#alamat_posisi").val(jsonData.alamat);
      $("#id_posisi").val(jsonData.id);

      document.getElementById( "btn_simpan_saksi" ).setAttribute( "onClick", "javascript: saksi_update();" );
      
    }
  });
}

function saksi_update(){
   $('#myPleaseWait').modal('show');
        
        $.ajax({
            url : '<?php echo site_url("$this->controller/saksi_update"); ?>',
            data : $("#form_saksi").serialize(),
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
                         
                        $("#saksi_modal").modal('hide'); 
                        $('#saksi').DataTable().ajax.reload();                       
                        $('#form_saksi')[0].reset();
                                
                         
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

function pemilik_update(){
   $('#myPleaseWait').modal('show');
        
        $.ajax({
            url : '<?php echo site_url("$this->controller/pemilik_update"); ?>',
            data : $("#form_pemilik").serialize(),
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
                         
                        $("#pemilik_modal").modal('hide'); 
                        $('#pemilik').DataTable().ajax.reload();                       
                        $('#form_pemilik')[0].reset();
                                
                         
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