<?php 
class pelepasan_tanah extends kecamatan_controller{
	var $controller;
	function pelepasan_tanah(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model('pelepasan_tanah_model','dm');
        $this->load->model("coremodel","cm");
        // $this->load->library('tanggal');
		
		//$this->load->helper("serviceurl");
		
	}








function index(){
		$data_array=array();
        $content = $this->load->view($this->controller."_view",$data_array,true);

        $this->set_subtitle("Pelepasan Tanah");
        $this->set_title("Pelepasan Tanah");
        $this->set_content($content);
        $this->cetak();
}






function baru(){
        $data_array=array();

        // $userdata = $this->session->userdata('admin_login');
        // $username1 = $userdata['username'];

        $userdata = $this->session->userdata('desa_login');

        
        $temp_id_surat = $this->session->userdata("temp_id_surat"); 


        if($temp_id_surat == "") {
            $xx = md5(date("dmyhis").round(0,100)); 
            $this->session->set_userdata("temp_id_surat",$xx);
            $temp_id_surat = $this->session->userdata("temp_id_surat"); 
        }

        // echo $this->session->userdata("temp_lap_a_id");  exit;
        $data_array['json_url_surat'] = site_url("$this->controller/temp_get_surat");
        //$this->session->unset_userdata("temp_lap_a_id");
        $data_array['temp_id_surat']=$temp_id_surat;
        $data_array['surat_add_url'] = site_url("$this->controller/tmp_surat_simpan");
        $data_array['surat_pelepasan_add_url'] = site_url("$this->controller/tmp_surat_pelepasam_simpan");
        // show_array($temp_tanah_id);

        // exit();
        $data_array['action'] = 'simpan';
        $content = $this->load->view($this->controller."_form_view",$data_array,true);


        $data_array['arr_kecamatan'] = $this->cm->arr_dropdown3("tiger_kecamatan", "id", "kecamatan", "kecamatan", "id_kota", "19_5");
       
        $content = $this->load->view($this->controller."_form_view",$data_array,true);

        $this->set_subtitle("Desa");
        $this->set_title("Register Pertanahan");
        $this->set_content($content);
        $this->cetak();
}





function get_no_regis(){
    $userdata = $this->session->userdata("desa_login");
    // show_array($userdata);
    $desa = $userdata['desa'];

    $post = $this->input->post();
    $date = flipdate($post['tgl_register_desa']);
    $date = DateTime::createFromFormat("Y-m-d", $date);
    // echo $date->format("Y");
    $tahun = $date->format("Y");

    $this->db->where('tahun', $tahun);
    $this->db->where('id_desa', $desa);
    $rs = $this->db->get('seting_desa');

    if ($rs->num_rows()==0) {
        $data = array();
        $data['id_desa'] = $desa;
        $data['tahun'] = $tahun;
        $data['number'] = 0;
        $this->db->insert('seting_desa', $data);
    }else{
    $hs = $rs->row_array();
    // show_array($hs);
    $number = $hs['number']+1;
    $tahun2 = $tahun+4;

    $no_registrasi_desa = $number.'/REG/'.$tahun.'/2020';
    
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


function hapus_session(){
        
        $this->session->unset_userdata("temp_tanah_id");
    }

    function get_data() {

    	
    	// show_array($userdata);

    	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        $nama_pemilik = $_REQUEST['columns'][1]['search']['value'];
        

        $userdata = $this->session->userdata('kec_login');
        $kecamatan = $userdata['kecamatan'];

        // $this->db->where('desa_tanah', $desa);
        


        


      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
				"nama_pemilik" => $nama_pemilik,
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
                                <li><a href='#' onclick=\"hapus('$id')\" ><i class='fa fa-trash'></i> Hapus</a></li>
                                <li><a href='regis_desa/editdata?id=$id'><i class='fa fa-edit'></i> Edit</a></li>
                              </ul>
                            </div>";
            
        }else {

            
            $action = '<div class="btn-group">
                              <button type="button" class="btn btn-success">Cetak</button>
                              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="#"  onclick=\'printper('.$id.')\'><i class="fa fa-print"></i> Surat Pernyataan</a></li>
                                <li><a href="#"  onclick=\'printket('.$id.')\'><i class="fa fa-print"></i> Surat Keterangan</a></li>
                                <li><a href="#"  onclick=\'printber('.$id.')\'><i class="fa fa-print"></i> Berita Acara</a></li>
                              </ul>
                            </div>';
        }
        	
        $row['tgl_register_desa'] = flipdate($row['tgl_register_desa']);
        	 
        	$arr_data[] = array(
                $row['tgl_register_desa'],
                $row['no_data_desa'],
        		$row['nama_pemilik'],     		 
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

function get_surat_detail($id){

    $data = $this->dm->get_surat_detail($id);
    // show_array($data);
    // $data['tgl_lahir'] = flipdate($data['tgl_lahir']);
    echo json_encode($data);
}


 function temp_get_pemilik() {

        
        // show_array($userdata);

        $draw = $_REQUEST['draw']; // get the requested page 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        
        

        $userdata = $this->session->userdata('kec_login');
        $desa = $userdata['desa'];



        // $this->db->where('desa_tanah', $desa);
        

        $temp_tanah_id = $this->session->userdata('temp_tanah_id');
        


      //  order[0][column]
        $req_param = array (
                "sort_by" => $sidx,
                "sort_direction" => $sord,
                "limit" => null,
                "temp_tanah_id" => $temp_tanah_id,
                "desa" => $desa,
                
                 
        );     
           
        $row = $this->dm->temp_get_pemilik($req_param)->result_array();
        
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->temp_get_pemilik($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
        $id = $row['id'];
        
        

       
            

            
            $action = "<div class='btn-group'>
                              <button type='button' class='btn btn-primary'>Action</button>
                              <button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown'>
                                <span class='caret'></span>
                                <span class='sr-only'>Toggle Dropdown</span>
                              </button>
                              <ul class='dropdown-menu' role='menu'>
                                <li><a href='#' onclick=\"hapus('$id')\" ><i class='fa fa-trash'></i> Hapus</a></li>
                                <li><a href='#' onclick=\"pemilik_edit('$id')\" ><i class='fa fa-edit'></i> Edit</a></li>
                              </ul>
                            </div>";

            
            
       
            
        // $row['tgl_register_desa'] = flipdate($row['tgl_register_desa']);
             
            $arr_data[] = array(
                $row['nik'],
                $row['nama'],
                $row['tempat_lahir'],  
                flipdate($row['tgl_lahir']),   
                $row['pekerjaan'], 
                $row['alamat'],          
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



 function temp_get_surat() {

        
        // show_array($userdata);

        $draw = $_REQUEST['draw']; // get the requested page 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        
        

        $userdata = $this->session->userdata('kec_login');
        $kecamatan = $userdata['kecamatan'];



        // $this->db->where('desa_tanah', $desa);
        

        $temp_id_surat = $this->session->userdata('temp_id_surat');
        


      //  order[0][column]
        $req_param = array (
                "sort_by" => $sidx,
                "sort_direction" => $sord,
                "limit" => null,
                "temp_id_surat" => $temp_id_surat,
                "kecamatan" => $kecamatan,
                
                 
        );     
           
        $row = $this->dm->temp_get_surat($req_param)->result_array();
        
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->temp_get_surat($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
        $id = $row['id'];
        
        

       
            

            
            $action = "<div class='btn-group'>
                              <button type='button' class='btn btn-primary'>Action</button>
                              <button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown'>
                                <span class='caret'></span>
                                <span class='sr-only'>Toggle Dropdown</span>
                              </button>
                              <ul class='dropdown-menu' role='menu'>
                                <li><a href='#' onclick=\"hapus('$id')\" ><i class='fa fa-trash'></i> Hapus</a></li>
                                <li><a href='#' onclick=\"surat_edit('$id')\" ><i class='fa fa-edit'></i> Edit</a></li>
                              </ul>
                            </div>";

            
            
       
            
        // $row['tgl_register_desa'] = flipdate($row['tgl_register_desa']);
             
            $arr_data[] = array(
                $row['surat'], 
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

     function get_pemilik() {

        
        // show_array($userdata);

        $draw = $_REQUEST['draw']; // get the requested page 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        
        

        $userdata = $this->session->userdata('desa_login');
        $desa = $userdata['desa'];



        // $this->db->where('desa_tanah', $desa);
        

        $tanah_id = $this->session->userdata('tanah_id');
        


      //  order[0][column]
        $req_param = array (
                "sort_by" => $sidx,
                "sort_direction" => $sord,
                "limit" => null,
                "tanah_id" => $tanah_id,
                "desa" => $desa,
                
                 
        );     
           
        $row = $this->dm->get_pemilik($req_param)->result_array();
        
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->get_pemilik($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
        $id = $row['id'];
        
        

       
            

            
            $action = "<div class='btn-group'>
                              <button type='button' class='btn btn-primary'>Action</button>
                              <button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown'>
                                <span class='caret'></span>
                                <span class='sr-only'>Toggle Dropdown</span>
                              </button>
                              <ul class='dropdown-menu' role='menu'>
                                <li><a href='#' onclick=\"hapus('$id')\" ><i class='fa fa-trash'></i> Hapus</a></li>
                                <li><a href='#' onclick=\"pemilik_edit('$id')\" ><i class='fa fa-edit'></i> Edit</a></li>
                              </ul>
                            </div>";

            
            
       
            
        // $row['tgl_register_desa'] = flipdate($row['tgl_register_desa']);
             
            $arr_data[] = array(
                $row['nik'],
                $row['nama'],
                $row['tempat_lahir'],  
                flipdate($row['tgl_lahir']),   
                $row['pekerjaan'], 
                $row['alamat'],          
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
    

    function editdata(){
    	 $get = $this->input->get(); 
    	 $id = $get['id'];

    	 $this->db->where('id',$id);
    	 $biro_jasa = $this->db->get('tanah');
    	 $data = $biro_jasa->row_array();
         $this->session->set_userdata("tanah_id",$id);
         $data['tgl_lhr_pemilik'] = flipdate($data['tgl_lhr_pemilik']);
         $data['tgl_pernyataan'] = flipdate($data['tgl_pernyataan']);
         $data['tgl_register_desa'] = flipdate($data['tgl_register_desa']);
         $data['json_url_pemilik'] = site_url("$this->controller/get_pemilik");
         $data['pemilik_add_url'] = site_url("$this->controller/pemilik_simpan");
        $data['arr_kecamatan'] = $this->cm->arr_dropdown3("tiger_kecamatan", "id", "kecamatan", "kecamatan", "id_kota", "19_5");
       


        $data['action'] = 'update';
         
		$content = $this->load->view("regis_desa_form_view",$data,true);

       

		$this->set_subtitle("Edit Registrasi Desa");
		$this->set_title("Edit Registrasi Desa");
		$this->set_content($content);
		$this->cetak();

    }





 function get_kecamatan(){
    $data = $this->input->post();

    $id_kota = $data['id_kota'];
    $this->db->where("id_kota",$id_kota);
    $this->db->order_by("kecamatan");
    $rs = $this->db->get("tiger_kecamatan");
    foreach($rs->result() as $row ) :
        echo "<option value=$row->id>$row->kecamatan </option>";
    endforeach;


}

function surat_update(){
    $post = $this->input->post();
    show_array($post);
    exit();
}



function update(){

    $post = $this->input->post();
   
       


        $this->load->library('form_validation');

        $this->form_validation->set_rules('pembuat_pernyataan','Nama Pembuat Pernyataan','required'); 
                 
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        // $post['tgl_lhr_pemilik'] = flipdate($post['tgl_lhr_pemilik']);
        $post['tgl_pernyataan'] = flipdate($post['tgl_pernyataan']);
        $post['tgl_register_desa'] = flipdate($post['tgl_register_desa']);
        $userdata = $this->session->userdata('desa_login');
        $post['desa_tanah'] = $userdata['desa'];
        $post['kec_tanah'] = $userdata['kecamatan'];
        unset($post['pemilik_length']);
        // $post['no_register_desa'] = $post['no_data_desa'].''.$userdata['format_reg'];
        // $post['no_ket_desa'] = $post['no_data_desa'].''.$userdata['format_ket'];
        // $post['no_berita_acara_desa'] = $post['no_data_desa'].''.$userdata['format_berita'];
        $post['nama_batas_u'] = $post['saksi_satu_nama'];
        $post['nama_batas_b'] = $post['saksi_dua_nama'];
        $post['nama_batas_t'] = $post['saksi_tiga_nama'];
        $post['nama_batas_s'] = $post['saksi_empat_nama'];

        $post['status'] = '1';

        $this->db->where("id",$post['id']);
        $res = $this->db->update('tanah', $post); 
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


function tmp_surat_pelepasam_simpan(){

    $userdata = $this->session->userdata('kec_login');
    
    $post = $this->input->post();
    //     $post['nama_surat'] = "Penyerahan/Pelepasan Hak Atas Tanah";
    // $post['jenis_surat'] = "Pelepasan";

        $this->load->library('form_validation');
        $this->form_validation->set_rules('surat','Surat','required');   
        
    $temp_id_surat = $this->session->userdata('temp_id_surat');
    // echo $temp_id_surat;
    // exit();
    $post['temp_id_surat'] = $temp_id_surat;
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');
       
        
        // show_array($post);
        // exit();

       unset($post['id']); //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        // $userdata = $this->session->userdata('desa_login');
        // $post['kades'] = $userdata['kepala_desa'];
        // $post['tgl_surat_kec'] = flipdate($post['tgl_surat_kec']);
        
        $res = $this->db->insert('surat_pelepasan', $post); 
        if($res){
            
            $arr = array("error"=>false,'message'=>"BERHASIL DISIMPAN");
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DISIMPAN");
        }
}
else {
    $arr = array("error"=>true,'message'=>validation_errors());
}
        echo json_encode($arr);
}

function tmp_surat_simpan(){

    $userdata = $this->session->userdata('kec_login');
    
    $post = $this->input->post();
        $post['nama_surat'] = "Keterangan Jual Beli";
    $post['jenis_surat'] = "jual";

        $this->load->library('form_validation');
        $this->form_validation->set_rules('yang_mengetahui_desa','Yang Mengetahui','required');   
        

         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');
       
        
        // show_array($post);
        // exit();

       unset($post['id']); //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        // $userdata = $this->session->userdata('desa_login');
        // $post['kades'] = $userdata['kepala_desa'];
        $post['tgl_surat_kec'] = flipdate($post['tgl_surat_kec']);
        
        $res = $this->db->insert('surat_pelepasan', $post); 
        if($res){
            
            $arr = array("error"=>false,'message'=>"BERHASIL DISIMPAN");
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DISIMPAN");
        }
}
else {
    $arr = array("error"=>true,'message'=>validation_errors());
}
        echo json_encode($arr);
}



    function hapusdata(){
    	$get = $this->input->post();
    	$id = $get['id'];

    	$data = array('id' => $id, );

    	$res = $this->db->delete('tanah', $data);
        if($res){
            $arr = array("error"=>false,"message"=>"DATA BERHASIL DIHAPUS");
        }
        else {
            $arr = array("error"=>true,"message"=>"DATA GAGAL DIHAPUS ".mysql_error());
        }
    	//redirect('sa_birojasa_user');
        echo json_encode($arr);
    }

       function hapusdata_pemilik(){
        $get = $this->input->post();
        $id = $get['id'];

        $data = array('id' => $id, );

        $res = $this->db->delete('pemilik_tanah', $data);
        if($res){
            $arr = array("error"=>false,"message"=>"DATA BERHASIL DIHAPUS");
        }
        else {
            $arr = array("error"=>true,"message"=>"DATA GAGAL DIHAPUS ".mysql_error());
        }
        //redirect('sa_birojasa_user');
        echo json_encode($arr);
    }




  function pdfper() {

    $get = $this->input->get(); 
    $id = $get['id'];

    
    $this->db->where('id', $id);
    $rs = $this->db->get('tanah');
    $data = $rs->row_array();
    extract($data);

    $this->db->where('id', $desa_tanah);
    $qr = $this->db->get('tiger_desa');
    $rs = $qr->row_array();
    $data['desa_tanah'] = $rs['desa'];

    $this->db->where('id', $kec_tanah);
    $qr = $this->db->get('tiger_kecamatan');
    $rs = $qr->row_array();
    $data['kec_tanah'] = $rs['kecamatan'];

    $this->db->where('id', $kab_tanah);
    $qr = $this->db->get('tiger_kota');
    $rs = $qr->row_array();
    $data['kab_tanah'] = $rs['kota'];

    $userdata = $this->session->userdata('desa_login');

    $this->db->where('id', $userdata['desa']);
    $qr = $this->db->get('tiger_desa')->row_array();
    $data['jenis_wilayah'] = $qr['jenis_wilayah'];

    $data['controller'] = get_class($this);
    $data['header'] = "data";
    $data['title'] = $data['header'];
    $this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle( $data['header']);
     
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetAutoPageBreak(true,10);
        $pdf->SetAuthor('PKPD  taujago@gmail.com');
         
            
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(true);

         // add a page
        $pdf->AddPage('P');

 

         $html = $this->load->view("regis_desa_pdf_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}


 function pdfket() {

    $get = $this->input->get(); 
    $id = $get['id'];
    $userdata = $this->session->userdata('desa_login');

    
    $this->db->where('id', $id);
    $rs = $this->db->get('tanah');
    $data = $rs->row_array();
    extract($data);

    $this->db->where('id', $desa_tanah);
    $qr = $this->db->get('tiger_desa');
    $rs = $qr->row_array();
    $data['desa_tanah'] = $rs['desa'];

    $this->db->where('id', $kec_tanah);
    $qr = $this->db->get('tiger_kecamatan');
    $rs = $qr->row_array();
    $data['kec_tanah'] = $rs['kecamatan'];

    $this->db->where('id', $kab_tanah);
    $qr = $this->db->get('tiger_kota');
    $rs = $qr->row_array();
    $data['kab_tanah'] = $rs['kota'];



    $this->db->where('id', $userdata['desa']);
    $qr = $this->db->get('tiger_desa')->row_array();
    $data['jenis_wilayah'] = $qr['jenis_wilayah'];

    $data['controller'] = get_class($this);
    $data['header'] = "Surat Keterangan";
    $data['title'] = $data['header'];
    $this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle( $data['header']);
     
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetAutoPageBreak(true,10);
        $pdf->SetAuthor('PKPD  taujago@gmail.com');
         
            
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(true);

         // add a page
        $pdf->AddPage('P');

 

         $html = $this->load->view("regis_desa_ket_pdf",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}



 function pdfberita(){

    $get = $this->input->get(); 
    $id = $get['id'];
    
    $this->db->where('id', $id);
    $rs = $this->db->get('tanah');
    $data = $rs->row_array();
    extract($data);

    $this->db->where('id', $desa_tanah);
    $qr = $this->db->get('tiger_desa');
    $rs = $qr->row_array();
    $data['desa_tanah'] = $rs['desa'];

    $this->db->where('id', $kec_tanah);
    $qr = $this->db->get('tiger_kecamatan');
    $rs = $qr->row_array();
    $data['kec_tanah'] = $rs['kecamatan'];

    $this->db->where('id', $kab_tanah);
    $qr = $this->db->get('tiger_kota');
    $rs = $qr->row_array();
    $data['kab_tanah'] = $rs['kota'];


    $data['controller'] = get_class($this);
    $data['header'] = "Berita Acara";
    $data['title'] = $data['header'];
    $this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle( $data['header']);
     
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetAutoPageBreak(true,10);
        $pdf->SetAuthor('PKPD  taujago@gmail.com');
         
            
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(true);

         // add a page
        $pdf->AddPage('P');

 

         $html = $this->load->view("regis_desa_berita_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}



}

?>