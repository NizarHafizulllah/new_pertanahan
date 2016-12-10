<?php 
class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper("tanggal");
		$this->load->helper("url");
		$this->load->helper("kirimemail");
		//$this->load->helper("serviceurl");
		
	}
	
	function index(){
		$msg = '';

		$psn_login = array('msg' => $msg );
		$this->load->view("login_view", $psn_login);
	}
	
	
	function logout_admin(){
		$this->session->unset_userdata("admin_login",true);
		redirect("login");
	}
	function logout_kecamatan(){
		$this->session->unset_userdata("kec_login",true);
		redirect("login");
	}
	function logout_desa(){
		$this->session->unset_userdata("desa_login",true);
		redirect("login");
	}
	

	
function cekusername($username) {
	$this->db->where("username",$username);
	$jumlah = $this->db->get("admin")->num_rows();
	if($jumlah > 0) {
		$this->form_validation->set_message('cek_username', "Username $username sudah terdaftar  ");
		return false;
	}
}
	




function cek_password($password) {
	 $password2 = $_POST['password2'];

	 if($password == "" or $password2=="") {
	 	$this->form_validation->set_message('cek_password', 'Password harus diisi dengan benar ');
		return false;
	 }

	 if($password <> $password2 ) {
	 	$this->form_validation->set_message('cek_password', 'Password Harus sama');
		return false;
	 }


}

// function ceklogin(){

// 		 $data = $this->input->post();
// 		 $username = $data['form-username'];
// 		 $password = $data['mask'];

// 		 $this->db->select('p.*,d.nama as dealer')->from('pengguna p')
// 		 ->join('dealer d','p.id_dealer = d.id','left');
// 		 $this->db->where("p.email",$username);
// 		 $this->db->where("p.password",$password);
// 		 $res = $this->db->get();
// 		 // echo $this->db->last_query();exit;
// 		 if($res->num_rows()==0) {

		 	
// 		 	$ret = array("error"=>true,"message"=>"Kombinasi Email Dan Password Tidak Dikenali");

// 		 }
// 		 else {

// 		 	$member = $res->row_array();
// 		 	// show_array($member);
// 		 	// echo $member['level'];
// 		 	// exit;

// 		 	$member['login'] = true;
// 		 	if($member['level'] == 1) {
		 		
				

// 				$this->session->set_userdata('admin_login', $member);
// 		 		$datalogin = $this->session->userdata("admin_login");
// 		 		// redirect('admin');

// 		 		$ret = array("error"=>false,"message"=>"Anda Login Sebagai Super Admin", "level"=>1);

		 		
				


// 		 	}
// 		 	else if ($member['level'] == 2) {
		 		
// 		 		$this->session->set_userdata('dealer_login', $member);
// 		 		$datalogin = $this->session->userdata("dealer_login");
// 		 		// redirect('biro_jasa');
// 		 		$ret = array("error"=>false,"message"=>"Anda Login Sebagai Admin Dealer", "level"=>2);
// 		 	}

// 		 	else if ($member['level'] == 3) {

// 		 		$this->session->set_userdata('user_login', $member);

// 		 		$datalogin = $this->session->userdata("user_login");
// 		 		$ret = array("error"=>false,"message"=>"Anda Login Sebagai User Dealer", "level"=>3);
// 		 		// redirect('user');
// 		 	}

// 		 	else {
// 		 		$ret = array("error"=>true,"message"=>"NOT An Option");
// 		 	}

// 		 }


// 		 echo json_encode($ret);
 
		 
		 
// 	}







	function ceklogin(){

		 $data = $this->input->post();
		 // show_array($data);
		 // exit();
		 $username = $data['form-username'];
		 $password = $data['mask'];

		 

		 
		 $this->db->where("username",$username);
		 $this->db->where("password",$password);
		 $res = $this->db->get('admin');

		 if($res->num_rows()==1) {

		 	$member = $res->row_array();
		 	// show_array($member);
		 	// exit;

		 	$member['login'] = true;
		 	$this->session->set_userdata('admin_login', $member);

		 	$datalogin = $this->session->userdata("admin_login");
		 	// show_array($datalogin);
		 	// exit();
		 	$ret = array("error"=>false,"message"=>"Selamat Datang ".$member['username'].".", "level"=>1);



		 }
		 else {



		 	$this->db->where("username", $username);
		 	$this->db->where("password", $password);
		 	$res = $this->db->get("admin_kecamatan");

		 	if($res->num_rows()==1){
		 		$member = $res->row_array();
		 		
		 		$member["login"] = true;
		 		$this->session->set_userdata('kec_login', $member);
		 		$datalogin = $this->session->userdata('kec_login');
		 		$ret = array("error"=>false,"message"=>"Selamat Datang ".$member['nama'].".", "level"=>2);
		 		
		 	}else{

		 		$this->db->where("username", $username);
		 		$this->db->where("password", $password);
		 		$res = $this->db->get("admin_desa");

		 		if ($res->num_rows()==1) {
		 			$member = $res->row_array();

		 			$member["login"] = true;

		 			$this->session->set_userdata("desa_login", $member);
		 			$datalogin = $this->session->userdata("desa_login");
		 			// show_array($datalogin);
		 			// exit();
		 			$ret = array("error"=>false,"message"=>"Selamat Datang ".$member['nama'].".", "level"=>3);
		 		}else{

		 			$ret = array("error"=>true,"message"=>"Kombinasi Email Dan Password Tidak Dikenali");
		 		}

		 	
		 	}
		 	
		}

		echo json_encode($ret);	 
	}





	
		function cekEmail(){
		$email = $this->input->post('email');
		$valid = true;
		$query = $this->db->where('email', $email);
		$jumlah = $this->db->get("members")->num_rows();	
		if($jumlah > 0) {
			$valid = false;
		}
		
		echo json_encode(array('valid' => $valid));
	
	}

	
	


}

?>