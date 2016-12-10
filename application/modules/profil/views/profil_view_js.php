<script type="text/javascript">




$(document).on('click', '#tombolsubmit', function(){
    // $('#form_data').submit();
    // return false;

    $.ajax({
                url : '<?php echo site_url("$this->controller/simpan") ?>',
                data : $("#change_password").serialize(),
                type : 'post',
                dataType : 'json',
                success  : function(ret){
                    console.log(ret);


                if(ret.error == false) { 
                    BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: ret.message // ,
                                
            
                            }
                            ); 
                }
                else {
                    BootstrapDialog.alert({
                                                type: BootstrapDialog.TYPE_DANGER,
                                                title: 'Error',
                                                message: ret.message
                                                 
                                            }); 
                    }
                }
            });


    return false;



            

});

    


</script>