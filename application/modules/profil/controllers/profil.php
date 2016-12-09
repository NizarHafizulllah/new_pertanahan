<?php
class profil extends user_controller{
	var $controller;
	function profil(){
		$this->controller = get_class($this);
		parent::__construct();
	}
	
	
	function index(){
		$data_array=array();
		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_subtitle("Profil");
		$this->set_title("profil");
		$this->set_content($content);
		$this->cetak();
	}

	function cek_password($password){

		$userdata = $this->session->userdata('login');

		
		$pswd = md5($password);
		$id_user = $userdata['id_user'];
		
		$this->db->where('id', $id_user);
		$this->db->where('password', $pswd);	
		$data = $this->db->get('members');

		$member = $data->num_rows();


		if ($member < 1)
		 {
		 	
			$this->form_validation->set_message('cek_password','Password Lama Yang Anda Masukkan Salah');
			return false;		
		}
	}

	function cek_password_baru($cek_password_baru){
		$post = $this->input->post();
		$pswd_baru = $post['pswd_baru'];
		$repswd_baru = $post['repswd_baru'];

		if ($pswd_baru != $repswd_baru) {
			$this->form_validation->set_message('cek_password_baru', 'Pengulangan Password Tidak Sama');

			return false;
		}

	}

	function simpan(){
		$post = $this->input->post();

        $this->load->library('form_validation');
         $this->form_validation->set_rules('pswd_lama','Cek Password','callback_cek_password');

  		$this->form_validation->set_rules('cek_password_baru','Password Baru','callback_cek_password_baru');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) {  // validasi berhasil 

			$password_baru = md5($post['pswd_baru']);

			$data = array('password' => $password_baru);

			$login = $this->session->userdata("login");
			$user_id = $login['id_user'];

			$this->db->where('id', $user_id);
			$res = $this->db->update("members",$data);
			if(!$res){
				$ret = array("error"=>true,"message"=>"gagal " . $this->db->last_query(). " " . mysql_error() );
			}
			else {
				$ret = array("error"=>false,"message"=>"Password Berhasil Di Ubah");

			}
		}
		else { // validasi gagal 
			$ret = array("error"=>true,"message"=>validation_errors());
		}


		echo json_encode($ret);
	}


}
?>