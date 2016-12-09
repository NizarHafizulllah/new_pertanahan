<?php 


class desa extends desa_controller {
	
	var $controller;
	public function desa(){
		parent::__construct();
		$this->controller = get_class($this);
	}
	
		function index(){
		



		$data_array=array();

		$data_array = array(
								);
		// $content = "Hello";

		$content = $this->load->view("desa/index_view",$data_array,true);

		$this->set_subtitle("Dashboard");
		$this->set_title("Selamat Datang");
		$this->set_content($content);
		$this->cetak();


				
			
		
	}


}
?>