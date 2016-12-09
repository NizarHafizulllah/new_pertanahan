
<script type="text/javascript">

$(document).ready(function(){

	 var dt = $("#regis_desa").DataTable(
		 	{
		 		// "order": [[ 0, "desc" ]],
		 		// "iDisplayLength": 50,
				"columnDefs": [ { "targets": 0, "orderable": false } ],
				"processing": true,
		        "serverSide": true,
		        "ajax": '<?php echo site_url("regis_desa/get_data") ?>'
		 	});

		 
		 $("#regis_desa_filter").css("display","none");  
	
	 
		 $("#btn_submit").click(function(){
		 	  // alert('hello');
		 	  

		 	  dt.column(1).search($("#nama_pemilik").val())
				 .draw();

				 return false;
		 });


		 $("#btn_reset").click(function(){
			$("#nama_pemilik").val('');

			$("#btn_submit").click();
		 });


});
	
function printper(id){
  
   
  window.open('<?php echo site_url("regis_desa/pdfper?id=") ?>'+id);
  
}

function printket(id){
  
   
  window.open('<?php echo site_url("regis_desa/pdfket?id=") ?>'+id);
  
}

function printber(id){
  
   
  window.open('<?php echo site_url("regis_desa/pdfberita?id=") ?>'+id);
  
}



function hapus(id){



BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA BIRO JASA. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA  BIRO JASA',
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
                  	url : '<?php echo site_url("$this->controller/hapusdata") ?>',
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

                  			$('#regis_desa').DataTable().ajax.reload();		
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


 		 




</script>