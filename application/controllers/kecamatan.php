<?php 


class kecamatan extends kecamatan_controller {
	
	var $controller;
	public function kecamatan(){
		parent::__construct();
		$this->controller = get_class($this);
	}
	
		function index(){
		



		$data_array=array();

		$data_array = array(
								);
		// $content = "Hello";

		$content = $this->load->view("kecamatan/index_view",$data_array,true);

		$this->set_subtitle("DASHBOARD");
		$this->set_title("DASHBOARD");
		$this->set_content($content);
		$this->cetak();


				
			
		
	}


}
?>