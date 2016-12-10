<script type="text/javascript">
	
	$(document).ready(function() {

		$(".tanggal").datepicker().on('changeDate', function(ev){                 
             $('.tanggal').datepicker('hide');
        });

        $(".select2").select2();


        




   $("#tombolsubmitupdate").click(function(){
 console.log('tests');

    $.ajax({
        url:'<?php echo site_url("kecamatan_profile/update"); ?>',
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
                      $("#nama_camat").val('');
                      $("#nip_camat").val('');
                      $("#jabatan_camat").val('');
                      window.location = "<?php echo site_url("kecamatan"); ?>";
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
</script>