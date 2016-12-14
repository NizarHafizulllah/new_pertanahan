
<script type="text/javascript">

$(document).ready(function(){

	 var dt = $("#pelepasan").DataTable(
		 	{
		 	
		 		// "iDisplayLength": 50,
				"columnDefs": [ { "targets": 0, "orderable": false } ],
				"processing": true,
		        "serverSide": true,
		        "ajax": '<?php echo site_url("$this->controller/get_data") ?>'
		 	});

		 
		 $("#regis_desa_filter").css("display","none");  
	
	 
		 $("#btn_submit").click(function(){
		 	  // alert('hello');
		 	  

		 	  dt.column(1).search($("#nama_pihak_pertama").val())
        .column(2).search($("#nama_pihak_kedua").val())
        .column(3).search($("#no_surat").val())
        .column(4).search($("#id_desa").val())
				 .draw();

				 return false;
		 });


		 $("#btn_reset").click(function(){
			$("#nama_pihak_pertama").val('');
      $("#nama_pihak_kedua").val('');
      $("#no_surat").val('');
      $("#id_desa").val('');

			$("#btn_submit").click();
		 });


});
	
function printsurat(id){
  
   
  window.open('<?php echo site_url("pelepasan_tanah_desa/pdf?id=") ?>'+id);
  
}

function printber(id){
  
   
  window.open('<?php echo site_url("pelepasan_tanah_desa/pdfber?id=") ?>'+id);
  
}

function printrek(id){
  
   
  window.open('<?php echo site_url("pelepasan_tanah_desa/pdfrek?id=") ?>'+id);
  
}





function hapus(id){



BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS SURAT PENYERAHAN. ANDA YAKIN  ?  ',
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