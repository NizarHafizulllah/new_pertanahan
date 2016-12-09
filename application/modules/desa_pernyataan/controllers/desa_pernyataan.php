<?php 

class desa_pernyataan extends desa_controller{
	var $controller;
	function desa_pernyataan(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model($this->controller.'_model','dm');
        $this->load->model("coremodel","cm");
        $this->load->helper("tanggal");
	}

	function index(){
		$data_array=array();
        $content = $this->load->view($this->controller."_view",$data_array,true);

        $this->set_subtitle("Surat Penyataan");
        $this->set_title("Surat Pernyataan");
        $this->set_content($content);
        $this->cetak();
	}

	function get_data(){
		
	}
}

?>