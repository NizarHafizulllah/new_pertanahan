<?php 


class biro_jasa extends biro_jasa_controller {
	
	var $controller;
	public function biro_jasa(){
		parent::__construct();
		$this->controller = get_class($this);
	}
	
		function index(){
		



		$data_array=array();
		$content = $this->load->view("bj/index_view",$data_array,true);
			
		$this->set_subtitle("DASHBOARD");
		$this->set_title("DASHBOARD");
		$this->set_content($content);
		$this->cetak();


				
			
		
	}


}
?>