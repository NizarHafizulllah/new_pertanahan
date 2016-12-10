<?php 

class test extends coba_controller {
	function test(){
		parent::__construct(); 

	}



function kirimemail(){
	$tujuan = 'taujago@gmail.com'; 
	$pesan = '<b> KIRIM EMAIL </b>';
	$subjek = 'subject test email ';
	$debug= false;
	$this->kirim($tujuan,$subjek,$pesan,$debug);
}


}

?>