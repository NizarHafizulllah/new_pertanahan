<?php 
class profil_desa extends desa_controller{
	
    var $controller;
	function profil_desa(){
		parent::__construct();

		$this->controller = get_class($this);
        $this->load->model("coremodel","cm");
		
		//$this->load->helper("serviceurl");
		
	}


   


function index(){

        $userdata = $this->session->userdata('desa_login');
        $id = $userdata['desa'];

        

         $this->db->where('id',$id);
         $rs = $this->db->get('tiger_desa');
         $data_array = $rs->row_array();

         $data_array['arr_jenis_wilayah'] = array('desa' => 'Desa',
                                    'kelurahan' => 'kelurahan' );

         // show_array($data_array);exit;

         $data_array['action'] = 'update';
         

		
		$content = $this->load->view("profil_desa_form_view",$data_array,true);

		$this->set_subtitle("Pengaturan");
		$this->set_title("Pengaturan");
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

        
        $this->form_validation->set_rules('nama_kades','Nama Kades / Lurah','required');


                 
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        


        $this->db->where("id",$post['id']);
        $res = $this->db->update('tiger_desa', $post);

        
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