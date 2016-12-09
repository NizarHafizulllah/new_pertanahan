<?php
class user_controller extends CI_Controller {

 
	function user_controller() {
		parent::__construct();  

		 $datalogin = $this->session->userdata("user_login");

		 if( $datalogin['login'] == false ) {
		 	redirect('login/');
		 } 
		
	 
		// sleep(1);
		
	}

	function set_content($str) {
		$this->content['content'] = $str;
	}
	
	function set_title($str) {
		$this->content['title'] = $str;
	}
	
	function set_subtitle($str) {
		$this->content['subtitle'] = $str;
	}
	
	function cetak(){
		$arr = array();	
		$this->load->view('user/user_theme',$this->content);
		
	}


	 

function execute_service($url,$method,$json_data) {

	// echo $json_data; exit;
	$req_url = $url."/".$method;
	// echo $req_url;  exit;
 	$ch = curl_init();

	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $req_url);
	curl_setopt($ch,CURLOPT_POST, 1);
	curl_setopt($ch,CURLOPT_POSTFIELDS, $json_data);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

	//execute post
	$result = curl_exec($ch);
	// echo $result;  

	$obj  = json_decode($result);
	$array = (array) $obj;

	$info = curl_getinfo($ch);

	$error = ($info['http_code']=="200")?false:true;
	// show_array($array); exit;
	curl_close($ch);
	return array("data"=>$array,"error"=>$error);
}




function execute_service2($url,$method,$json_data) {


	// echo $json_data; exit;

	// echo $json_data; exit;
	$req_url = $url."/".$method;
 	$ch = curl_init();

 	//print_r($json_data); exit;
	//set the url, number of POST vars, POST data



	curl_setopt($ch,CURLOPT_URL, $req_url);
	//curl_setopt($ch,CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($ch,CURLOPT_POST, 1);
	curl_setopt($ch,CURLOPT_POSTFIELDS, $json_data);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLINFO_HEADER_OUT, true); // enable tracking
	curl_setopt($ch,CURLOPT_VERBOSE,true);
	//execute post
	$result = curl_exec($ch);


// $headerSent = curl_getinfo($ch, CURLINFO_HEADER_OUT ); // request headers

// echo $headerSent; exit;

	// $obj  = json_decode($result);
	// $array = (array) $obj;
	// 
	curl_close($ch);
	// return $array;
	return $result;
}




function kirim($tujuan,$subjek,$pesan,$debug=false){
		$username = "taujago@gmail.com";
		$sender_email = "taujago@zahiraccounting.com";
		$user_password = "T0z4QX015EII5ARyOIDkyQ";
		$subject = $subjek;
		$message = $pesan;
		$config['protocol'] = 'smtp';
		// SMTP Server Address for Gmail.
		$config['smtp_host'] = 'smtp.mandrillapp.com';
		// SMTP Port - the port that you is required
		$config['smtp_port'] = "587";
		// SMTP Username like. (abc@gmail.com)
		$config['smtp_user'] = $username;
		// SMTP Password like (abc***##)
		$config['smtp_pass'] = $user_password;


		$config['mailtype'] = 'html';
		$config['crlf'] = "\r\n";
		$config['newline'] = "\r\n";


		// Load email library and passing configured values to email library
		$this->load->library('email', $config);
		// Sender email address
		$this->email->from($sender_email, $username);
		// Receiver email address.for single email
		//$this->email->to($receiver_email);
		//send multiple email
		$this->email->to($tujuan);
		// Subject of email
		$this->email->subject($subject);
		// Message in email
		$this->email->message($message);
		// It returns boolean TRUE or FALSE based on success or failure
		$send = $this->email->send(); 
		echo  ($debug==true)?$this->email->print_debugger():"";
	}



}

?>
