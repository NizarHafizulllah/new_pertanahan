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
            $("#no_register_desa").val(obj.no_registrasi_desa);
            $("#no_ket_desa").val(obj.no_ket_desa);
            $("#no_berita_acara_desa").val(obj.no_berita_acara_desa);
            
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
                            message: obj.message
                             
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
                            message: obj.message
                             
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
    $("#form_pemilik").attr('action','<?php echo site_url("regis_desa/tmp_pemilik_update") ?>'); 


    $.ajax({
    url : '<?php echo site_url("regis_desa/get_pemilik_detail/"); ?>/'+id,
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

function pemilik_update(){
   $('#myPleaseWait').modal('show');
        
        $.ajax({
            url : '<?php echo site_url('regis_desa/pemilik_update'); ?>',
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