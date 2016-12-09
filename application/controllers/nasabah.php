<?php 


class nasabah extends nasabah_controller {
  
  var $controller;
  public function nasabah(){
    parent::__construct();
    $this->controller = get_class($this);
  }
  
    function index(){
    



    $data_array=array();

    $data_array = array(
                );

    $content = $this->load->view("nasabah/index_view",$data_array,true);

    $this->set_subtitle("DASHBOARD");
    $this->set_title("DASHBOARD");
    $this->set_content($content);
    $this->cetak();


        
      
    
  }


}
?>