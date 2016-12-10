<?php
class home extends master_controller  {
	var $controller;
	function __consruct(){
		parent::__construct();
		$this->controller = get_class('$this');
	}
	
	
	function index(){
		$this->set_subtitle("DASHBOARD");
		$this->set_title("DASHBOARD");
		$this->set_content("wellcome");
		$this->render();
	}
}
?> 