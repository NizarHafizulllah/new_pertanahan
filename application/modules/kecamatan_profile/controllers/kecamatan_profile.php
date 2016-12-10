<?php 
class kecamatan_profile extends kecamatan_controller{
	
    var $controller;
	function kecamatan_profile(){
		parent::__construct();

		$this->controller = get_class($this);
        $this->load->model("coremodel","cm");
		
		//$this->load->helper("serviceurl");
		
	}


   


function index(){

        $userdata = $this->session->userdata('kec_login');
        $kecamatan = $userdata['kecamatan'];

        


         $this->db->where('id', $kecamatan);
         $rs = $this->db->get('tiger_kecamatan');
         $data_array = $rs->row_array();

         

         $data_array['action'] = 'update';
         $data_array['arr_desa'] = $this->cm->arr_dropdown3("tiger_desa", "id", "desa", "desa", "id_kecamatan", $kecamatan);

         
        // show_array($rs);exit;

		
		$content = $this->load->view($this->controller."_form_view",$data_array,true);

		$this->set_subtitle("Profil");
		$this->set_title("Profil");
		$this->set_content($content);
		$this->cetak();
}



function cek_passwd($pass1){
    $pass2 = $this->input->post('pass2');

    if(empty($pass1) or empty($pass2)){
         $this->form_validation->set_message('cek_passwd', ' Password harus diisi');
         return false;
    }
    if($pass1 <> $pass2) {
        $this->form_validation->set_message('cek_passwd', ' Password tidak sama');
         return false;
    }
}


 
function update(){

    $post = $this->input->post();
   
       


       $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_camat','Nama Camat','required'); 
                 
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');
                 
         
        
        
    
        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        


        $this->db->where("id",$post['id']);
        $res = $this->db->update('tiger_kecamatan', $post);
        if($res){
            $arr = array("error"=>false,'message'=>"BERHASIL DIUPDATE");
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DIUPDATE");
        }
}
else {
    $arr = array("error"=>true,'message'=>validation_errors());
}
        echo json_encode($arr);
}








}

?>