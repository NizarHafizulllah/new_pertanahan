
<?php 
class regis_kec extends kecamatan_controller{
	var $controller;
	function regis_kec(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model('regis_kec_model','dm');
        $this->load->model("coremodel","cm");
		
		//$this->load->helper("serviceurl");
		
	}







function index(){
		$data_array=array();
        $userdata = $this->session->userdata('kec_login');
        $kecamatan = $userdata['kecamatan'];
        $data_array['arr_desa'] = array('' => '- Semua Desa - ', );
        $data_array['arr_desa'] = $this->cm->arr_dropdown3("tiger_desa", "id", "desa", "desa", "id_kecamatan", $kecamatan);
        $content = $this->load->view($this->controller."_view",$data_array,true);

        $this->set_subtitle("Registrasi Pertanahan");
        $this->set_title("Kecamatan");
        $this->set_content($content);
        $this->cetak();
}




    function get_data() {

    	
    	// show_array($userdata);

    	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        $pembuat_pernyataan = $_REQUEST['columns'][1]['search']['value'];
        $desa = $_REQUEST['columns'][2]['search']['value'];

        $userdata = $this->session->userdata('kec_login');
        $kecamatan = $userdata['kecamatan'];
        

        // $this->db->where('desa_tanah', $desa);
        


        


      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
				"pembuat_pernyataan" => $pembuat_pernyataan,
                "desa" => $desa,
                "kecamatan" => $kecamatan,
				
				 
		);     
           
        $row = $this->dm->data($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->data($req_param)->result_array();
        
       

       
        $arr_data = array();
        foreach($result as $row) : 
        $id = $row['id'];
        
        

        if ($row['status'] == 1) {
            

            
            $action = "<div class='btn-group'>
                              <button type='button' class='btn btn-danger'>Pending</button>
                              <button type='button' class='btn btn-danger dropdown-toggle' data-toggle='dropdown'>
                                <span class='caret'></span>
                                <span class='sr-only'>Toggle Dropdown</span>
                              </button>
                              <ul class='dropdown-menu' role='menu'>
                                <li><a href='#' onclick=\"approved('$id')\" ><i class='fa fa-trash'></i> Menyetujui</a></li>
                                <li><a href='regis_kec/detail?id=$id'><i class='fa fa-edit'></i> Detail</a></li>
                              </ul>
                            </div>";
            
        }else {

            
            $action = '<div class="btn-group">
                              <button type="button" class="btn btn-success">Selsai</button>
                              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                              </ul>
                            </div>';
        }
        	
        $row['tgl_register_desa'] = flipdate($row['tgl_register_desa']);
        	 
        	$arr_data[] = array(
                $row['tgl_register_desa'],
                $row['no_register_desa'],
        		$row['pembuat_pernyataan'],     		 
        		$action,
        		
         			 
        		  				);
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
    }

    function get_no_regis(){
    $userdata = $this->session->userdata("kec_login");
    // show_array($userdata);
    $kecamatan = $userdata['kecamatan'];

    $post = $this->input->post();
    $date = flipdate($post['tgl_register_kec']);
    $date = DateTime::createFromFormat("Y-m-d", $date);
    // echo $date->format("Y");
    $tahun = $date->format("Y");

    $this->db->where('tahun', $tahun);
    $this->db->where('kecamatan', $kecamatan);
    $rs = $this->db->get('seting_desa');

    if ($rs->num_rows()==0) {
        $data = array();
        $data['kecamatan'] = $kecamatan;
        $data['tahun'] = $tahun;
        $data['number'] = 0;
        $this->db->insert('seting_kecamatan', $data);
        $no_register_kec = '1/REG/'.$tahun.'/2020';
    }else{
    $hs = $rs->row_array();
    // show_array($hs);
    $number = $hs['number']+1;
    // $tahun2 = $tahun+4;

    $no_register_kec = $number.'/REG/'.$tahun.'/2020';
    }



     $this->load->library('form_validation');
        $this->form_validation->set_rules('tgl_register_desa','Tanggal Register Desa','required');
        // $this->form_validation->set_rules('no_mesin','No. Mesin','required');     
         
        $this->form_validation->set_message('required', 'Untuk Mendapatkan No. Registrasi Field %s Harus Diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

    if($this->form_validation->run() == TRUE ) { 

        $arr = array("error"=>false);
        
        // $rs = $this->db->where('id', $)
        $arr['no_registrasi_desa'] = $no_registrasi_desa;

        
       
}
else {
    $arr = array("error"=>true,'message'=>validation_errors());
}


    echo json_encode($arr);

}


    function detail(){
    	 $get = $this->input->get(); 
    	 $id = $get['id'];

    	 $this->db->where('id',$id);
    	 $biro_jasa = $this->db->get('utama');
    	 $data = $biro_jasa->row_array();

        $this->db->where('id', $id);
        $rs = $this->db->get('utama');
        $data = $rs->row_array();
        extract($data);

        


        $this->db->where('id', $id_tanah);
        $data['tanah'] = $this->db->get('tanah')->row_array();
        $data  = array_merge($data, $data['tanah']);


        $this->db->where('id', $id_desa);
        $qr = $this->db->get('tiger_desa');
        $rs = $qr->row_array();
        $data['desa_tanah'] = $rs['desa'];

        $this->db->where('id', $id_kecamatan);
        $qr = $this->db->get('tiger_kecamatan');
        $rs = $qr->row_array();
        $data['kec_tanah'] = $rs['kecamatan'];

        $this->db->where('id', '19_5');
        $qr = $this->db->get('tiger_kota');
        $rs = $qr->row_array();
        $data['kab_tanah'] = $rs['kota'];
         // $data['tgl_lhr_pemilik'] = flipdate($data['tgl_lhr_pemilik']);
         $data['tgl_pernyataan'] = flipdate($data['tgl_pernyataan']);
         $data['tgl_register_desa'] = flipdate($data['tgl_register_desa']);

        $userdata = $this->session->userdata('kec_login');
         $this->db->where('id_kecamatan', $userdata['kecamatan']);
         $this->db->where('status', 2);
        $rs = $this->db->get('utama');
        $data['no_data_kec'] = $rs->num_rows()+1;

        $data['arr_kecamatan'] = $this->cm->arr_dropdown3("tiger_kecamatan", "id", "kecamatan", "kecamatan", "id_kota", "19_5");

        $this->db->where('id_tanah', $id_tanah);
        $data['pemilik'] = $this->db->get('pemilik_tanah')->result();

        
        $this->db->where('id_tanah', $id_tanah);
        $data['barat'] = $this->db->get('batas_barat')->result();

        $this->db->where('id_tanah', $id_tanah);
        $data['utara'] = $this->db->get('batas_utara')->result();

        $this->db->where('id_tanah', $id_tanah);
        $data['selatan'] = $this->db->get('batas_selatan')->result();

        $this->db->where('id_tanah', $id_tanah);
        $data['timur'] = $this->db->get('batas_timur')->result();

        $this->db->where('id_surat', $id);
        $data['saksi'] = $this->db->get('saksi_hak_guna_tanah')->result();

        // show_array($data);
        // exit();
        $data['id'] = $id;
        $date = flipdate($data['tgl_register_desa']);
        // echo $data['tgl_register_desa'];exit();
        $date = DateTime::createFromFormat("Y-m-d", $date);
    // echo $date->format("Y");
        $tahun = $date->format("Y");

        $this->db->where('id_kecamatan', '19_5_1');
        $this->db->where('tahun', $tahun);
        $rs = $this->db->get('seting_kecamatan');

        if ($rs->num_rows()==0) {
                $seting_kecamatan = array('id_kecamatan' => '19_5_1', 'tahun' => $tahun);
                // $seting_kecamatan['kecamatan'] = '19_5_1';
                // $seting_kecamatan['tahun'] = $tahun;
                $this->db->insert('seting_kecamatan', $seting_kecamatan);
                $data['no_register_kec'] = '1/REG/'.$tahun.'/2020';
            }else{
               $hs = $rs->row_array();
                // show_array($hs);
                $number = $hs['number']+1;
                $tahun2 = $tahun+4;

                $data['no_register_kec'] = $number.'/REG/'.$tahun.'/2020';
            }    

        // $data['no_register_kec'] = $tahun.'/2020';
       
            // show_array($data);

        $data['action'] = 'update';
         
		$content = $this->load->view("regis_kec_view_form_detail",$data,true);

       

		$this->set_subtitle("");
		$this->set_title("Detail Registrasi Pertanahan");
		$this->set_content($content);
		$this->cetak();

    }




function cek_no_reg($no_register_kec){
    $this->db->where("no_register_kec",$no_register_kec);

    if(empty($no_register_kec)){
         $this->form_validation->set_message('cek_no_reg', ' No Registrasi Harus Di Isi');
         return false;
    }
    if($this->db->get("tanah")->num_rows() > 0)
    {
         $this->form_validation->set_message('cek_no_reg', ' Sudah Ada Data Dengan No Registrasi Ini');
         return false;
    }
}



function update(){

    $post = $this->input->post();
   
       $regis = $post['no_register_kecamatan']; 
        $panjang = strlen($regis);
        // echo $substring;
        // exit;
        if ($panjang==15) {
            $val = substr($regis, 0, 1);
        }else if ($panjang==16) {
            $val = substr($regis, 0, 2);
        }else if ($panjang==17) {
            $val = substr($regis, 0, 3);
        }else if ($panjang==18) {
            $val = substr($regis, 0, 4);
        }else{
            $val = '';
        }

        $date = flipdate($post['tgl_register_kec']);
        $date = DateTime::createFromFormat("Y-m-d", $date);
    // echo $date->format("Y");
        $tahun = $date->format("Y");


        $this->load->library('form_validation');

        $this->form_validation->set_rules('tgl_register_kec','Tanggal Registrasi','required'); 
        $userdata = $this->session->userdata('kec_login');

        $this->db->where('id', $userdata['kecamatan']);
        $ls = $this->db->get('tiger_kecamatan')->row_array();
        
        $post['nama_camat'] = $ls['nama_camat'];
        $post['jabatan_camat'] = $ls['jabatan_camat'];
        $post['nip_camat'] = $ls['nip_camat'];
        $post['no_ket_kec'] = $val.'/KET/'.$tahun.'/2020';
        
        // show_array($post);
        // exit();



        
                
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     
        

       

 //        show_array($post);
 // exit();
if($this->form_validation->run() == TRUE ) { 

        

        $post['tgl_register_kecamatan'] = flipdate($post['tgl_register_kec']);
        $post['status'] = 2;

        unset($post['tgl_register_kec']);


        $this->db->where("id",$post['id']);
        $res = $this->db->update('utama', $post); 
        if($res){
            $seting_kecamatan = array('number' => $val, );
            $this->db->update('seting_kecamatan', $seting_kecamatan);
            $arr = array("error"=>false,'message'=>"Register Kecamatan Berhasil");
        }
        else {
             $arr = array("error"=>true,'message'=>"Register Kecamatan Gagal");
        }
}
else {
    $arr = array("error"=>true,'message'=>validation_errors());
}
        echo json_encode($arr);
}




     function approved(){
    	$get = $this->input->post();
    	$id = $get['id'];

    	$userdata = $this->session->userdata();

    	

    	$this->db->where("id",$post['id']);
    	$res = $this->db->update('tanah', $post);
        if($res){
            $arr = array("error"=>false,"message"=>$this->db->last_query()." DATA BERASIL DI SETUJUI");
        }
        else {
            $arr = array("error"=>true,"message"=>"DATA GAGAL DISETUJUI ".mysql_error());
        }
    	//redirect('sa_birojasa_user');
        echo json_encode($arr);
    }


}

?>