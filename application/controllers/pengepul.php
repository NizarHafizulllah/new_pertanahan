<?php 


class pengepul extends pengepul_controller {
  
  var $controller;
  public function pengepul(){
    parent::__construct();
    $this->controller = get_class($this);
  }
  
    function index(){
    



    $data_array=array();

    $data_array = array(
                );

    $content = $this->load->view("pengepul/index_view",$data_array,true);

    $this->set_subtitle("DASHBOARD");
    $this->set_title("DASHBOARD");
    $this->set_content($content);
    $this->cetak();


        
      
    
  }


}
?>