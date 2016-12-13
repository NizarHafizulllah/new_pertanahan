<?php 
class pelepasan_tanah_desa extends desa_controller{
	var $controller;
	function pelepasan_tanah_desa(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model('pelepasan_tanah_model','dm');
        $this->load->model("coremodel","cm");
         $this->load->helper("tanggal");
		
		//$this->load->helper("serviceurl");
		
	}



function index(){
        $userdata = $this->session->userdata('desa_login');
        $kecamatan = $userdata['kecamatan'];
		$data_array=array();


        $data_array['arr_desa'] = $this->cm->arr_dropdown3("tiger_desa", "id", "desa", "desa", "id_kecamatan", $kecamatan);

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

        $userdata = $this->session->userdata('kec_login');
        $kecamatan = $userdata['kecamatan'];
        // show_array($userdata);
        $temp_id_surat = $this->session->userdata("temp_id_surat"); 


        if($temp_id_surat == "") {
            $xx = md5(date("dmyhis").round(0,100)); 
            $this->session->set_userdata("temp_id_surat",$xx);
            $temp_id_surat = $this->session->userdata("temp_id_surat"); 
        }

        // echo $this->session->userdata("temp_lap_a_id");  exit;
        $data_array['json_url_surat'] = site_url("$this->controller/temp_get_surat");
        $data_array['json_url_saksi'] = site_url("$this->controller/temp_get_saksi");
        //$this->session->unset_userdata("temp_lap_a_id");
        $data_array['temp_id_surat']=$temp_id_surat;
        $data_array['surat_add_url'] = site_url("$this->controller/tmp_surat_simpan");
        $data_array['saksi_pelepasan_add_url'] = site_url("$this->controller/tmp_saksi_simpan");
        $data_array['surat_pelepasan_add_url'] = site_url("$this->controller/tmp_surat_pelepasam_simpan");
        $data_array['arr_jk'] = array('l' => 'Laki-laki', 'p' => 'Perempuan');
        $data_array['arr_kawin'] = array('k' => 'Kawin', 'tk' => 'Tidak Kawin');

        // show_array($temp_tanah_id);

        $data_array['arr_provinsi'] = $this->cm->arr_dropdown("tiger_provinsi", "id", "provinsi", "provinsi");
        $data_array['arr_kota'] = array("" => "- Pilih Provinsi Terlebih Dahulu -");
        $data_array['arr_kecamatan'] = array("" => "- Pilih Kota/Kabupaten Terlebih Dahulu -");
        $data_array['arr_desa'] = array("" => "- Pilih Kecamatan Terlebih Dahulu -");

        // exit();
        $data_array['action'] = 'simpan';
        $content = $this->load->view($this->controller."_form_view",$data_array,true);
        $data_array['arr_desa_tanah'] = $this->cm->arr_dropdown3("tiger_desa", "id", "desa", "desa", "id_kecamatan", $kecamatan);

        // $data_array['arr_kecamatan'] = $this->cm->arr_dropdown3("tiger_kecamatan", "id", "kecamatan", "kecamatan", "id_kota", "19_5");
       
        $content = $this->load->view($this->controller."_form_view",$data_array,true);

        $this->set_subtitle("Kecamatan");
        $this->set_title("SURAT PENYERAHAN / PELEPASAN HAK ATAS TANAH");
        $this->set_content($content);
        $this->cetak();
}





function get_no_surat(){
    $userdata = $this->session->userdata("kec_login");
    // show_array($userdata);
    $kecamatan = $userdata['kecamatan'];

    $post = $this->input->post();
    $date = flipdate($post['tanggal']);
    $date = DateTime::createFromFormat("Y-m-d", $date);
    // echo $date->format("Y");
    $tahun = $date->format("Y");

    $this->db->where('tahun', $tahun);
    $this->db->where('id_kecamatan', $kecamatan);
    $rs = $this->db->get('seting_kecamatan_pelepasan');

    if ($rs->num_rows()==0) {
        $data = array();
        $data['id_kecamatan'] = $kecamatan;
        $data['tahun'] = $tahun;
        $data['number'] = 0;
        $this->db->insert('seting_kecamatan_pelepasan', $data);
    }else{
    $hs = $rs->row_array();
    // show_array($hs);
    $number = $hs['number']+1;
    $tahun2 = $tahun+4;

    $no_surat = '592.23/'.$number.'/LEG/01/'.$tahun;
    
    }



     $this->load->library('form_validation');
        $this->form_validation->set_rules('tanggal','Tanggal Pelepasan','required');
        // $this->form_validation->set_rules('no_mesin','No. Mesin','required');     
         
        $this->form_validation->set_message('required', 'Untuk Mendapatkan No. Surat Field %s Harus Diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

    if($this->form_validation->run() == TRUE ) { 

        $arr = array("error"=>false);
        
        // $rs = $this->db->where('id', $)
        $arr['no_surat'] = $no_surat;

        
       
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
        
  
        $nama_pihak_pertama = $_REQUEST['columns'][1]['search']['value'];
        $nama_pihak_kedua = $_REQUEST['columns'][2]['search']['value'];
        $no_surat = $_REQUEST['columns'][3]['search']['value'];
        $desa = $_REQUEST['columns'][4]['search']['value'];
        

        $userdata = $this->session->userdata('desa_login');
        $id_desa = $userdata['desa'];

        // $this->db->where('desa_tanah', $desa);
        


        


      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
				"nama_pihak_pertama" => $nama_pihak_pertama,
                "nama_pihak_kedua" => $nama_pihak_kedua,
                "no_surat" => $no_surat,
                "desa" => $id_desa,
                "id_desa" => $id_desa,
				
				 
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
        
        

        

            
            $action = "<div class='btn-group'>
                              <button type='button' class='btn btn-success'>Action</button>
                              <button type='button' class='btn btn-success dropdown-toggle' data-toggle='dropdown'>
                                <span class='caret'></span>
                                <span class='sr-only'>Toggle Dropdown</span>
                              </button>
                              <ul class='dropdown-menu' role='menu'>
                                <li><a href='#'  onclick=\"printsurat('$id')\"><i class='fa fa-print'></i> Print Surat</a></li>
                                <li><a href='#' onclick=\"hapus('$id')\" ><i class='fa fa-trash'></i> Hapus</a></li>
                                <li><a href='pelepasan_tanah/editdata?id=$id'><i class='fa fa-edit'></i> Edit</a></li>

                              </ul>
                            </div>";
     	
        $row['tanggal'] = flipdate($row['tanggal']);
        	 
        	$arr_data[] = array(
                $row['tanggal'],
                $row['no_surat'],
        		$row['nama_pihak_pertama'], 
                $row['nama_pihak_kedua'], 
                $row['nm_desa'],     		 
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

function get_saksi_detail($id){

    $data = $this->dm->get_saksi_detail($id);
    // show_array($data);
    // $data['tgl_lahir'] = flipdate($data['tgl_lahir']);
    echo json_encode($data);
}

 function get_saksi() {

        
        // show_array($userdata);

        $draw = $_REQUEST['draw']; // get the requested page 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        
        

        $userdata = $this->session->userdata('kec_login');
        $kecamatan = $userdata['kecamatan'];



        // $this->db->where('desa_tanah', $desa);
        

        $id_surat = $this->session->userdata('id_surat');
        


      //  order[0][column]
        $req_param = array (
                "sort_by" => $sidx,
                "sort_direction" => $sord,
                "limit" => null,
                "id_surat" => $id_surat,
                "kecamatan" => $kecamatan,
                
                 
        );     
           
        $row = $this->dm->get_saksi($req_param)->result_array();
        
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->get_saksi($req_param)->result_array();
        

       
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
                                <li><a href='#' onclick=\"hapus_saksi('$id')\" ><i class='fa fa-trash'></i> Hapus</a></li>
                                <li><a href='#' onclick=\"saksi_edit('$id')\" ><i class='fa fa-edit'></i> Edit</a></li>
                              </ul>
                            </div>";

            
            
       
            
        // $row['tgl_register_desa'] = flipdate($row['tgl_register_desa']);
             
            $arr_data[] = array(
                $row['nama'],
                $row['jabatan'],
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


 function temp_get_saksi() {

        
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
           
        $row = $this->dm->temp_get_saksi($req_param)->result_array();
        
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->temp_get_saksi($req_param)->result_array();
        

       
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
                                <li><a href='#' onclick=\"hapus_saksi('$id')\" ><i class='fa fa-trash'></i> Hapus</a></li>
                                <li><a href='#' onclick=\"saksi_edit('$id')\" ><i class='fa fa-edit'></i> Edit</a></li>
                              </ul>
                            </div>";

            
            
       
            
        // $row['tgl_register_desa'] = flipdate($row['tgl_register_desa']);
             
            $arr_data[] = array(
                $row['nama'],
                $row['jabatan'],
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

     function get_surat() {

        
        // show_array($userdata);

        $draw = $_REQUEST['draw']; // get the requested page 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        
        

        $userdata = $this->session->userdata('kec_login');
        $kecamatan = $userdata['kecamatan'];



        // $this->db->where('desa_tanah', $desa);
        

        $id_surat = $this->session->userdata('id_surat');
        


      //  order[0][column]
        $req_param = array (
                "sort_by" => $sidx,
                "sort_direction" => $sord,
                "limit" => null,
                "id_surat" => $id_surat,
                "kecamatan" => $kecamatan,
                
                 
        );     
           
        $row = $this->dm->get_surat($req_param)->result_array();
        
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->get_surat($req_param)->result_array();
        

       
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
    	 $pelepasan = $this->db->get('pelepasan');
    	 $data = $pelepasan->row_array();
         $this->session->set_userdata("id_surat",$id);
         $data['json_url_surat'] = site_url("$this->controller/get_surat");
        $data['json_url_saksi'] = site_url("$this->controller/get_saksi");
        //$this->session->unset_userdata("temp_lap_a_id");
        // $data['id']=$id;
        $data['surat_add_url'] = site_url("$this->controller/surat_simpan");
        $data['saksi_pelepasan_add_url'] = site_url("$this->controller/saksi_simpan");
        $data['surat_pelepasan_add_url'] = site_url("$this->controller/surat_pelepasam_simpan");
        $data['arr_jk'] = array('l' => 'Laki-laki', 'p' => 'Perempuan');
        $data['arr_kawin'] = array('k' => 'Kawin', 'tk' => 'Tidak Kawin');

        // show_array($temp_tanah_id);

        $data['arr_provinsi_pertama'] = $this->cm->arr_dropdown("tiger_provinsi", "id", "provinsi", "provinsi");
        $data['arr_kota_pertama'] = $this->cm->arr_dropdown3("tiger_kota", "id", "kota", "kota", "id_provinsi", $data['provinsi_pihak_pertama']);
        $data['arr_kecamatan_pertama'] = $this->cm->arr_dropdown3("tiger_kecamatan", "id", "kecamatan", "kecamatan", "id_kota", $data['kabupaten_pihak_pertama']);
        $data['arr_desa_pertama'] = $this->cm->arr_dropdown3("tiger_desa", "id", "desa", "desa", "id_kecamatan", $data['kecamatan_pihak_pertama']);

        $data['arr_provinsi_kedua'] = $this->cm->arr_dropdown("tiger_provinsi", "id", "provinsi", "provinsi");
        $data['arr_kota_kedua'] = $this->cm->arr_dropdown3("tiger_kota", "id", "kota", "kota", "id_provinsi", $data['provinsi_pihak_kedua']);
        $data['arr_kecamatan_kedua'] = $this->cm->arr_dropdown3("tiger_kecamatan", "id", "kecamatan", "kecamatan", "id_kota", $data['kabupaten_pihak_kedua']);
        $data['arr_desa_kedua'] = $this->cm->arr_dropdown3("tiger_desa", "id", "desa", "desa", "id_kecamatan", $data['kecamatan_pihak_kedua']);

        $data['arr_desa_tanah'] = $this->cm->arr_dropdown3("tiger_desa", "id", "desa", "desa", "id_kecamatan", $data['kecamatan']);

        $data['tanggal'] = flipdate($data['tanggal']);
        $data['action'] = 'update';
         
		$content = $this->load->view("pelepasan_tanah_form_view",$data,true);

       

		$this->set_subtitle("Edit Surat Pelepasan");
		$this->set_title("Edit Surat Pelepasan");
		$this->set_content($content);
		$this->cetak();

    }

 function get_kota(){
    $data = $this->input->post();

    $id_provinsi = $data['id_provinsi'];
    $this->db->where("id_provinsi",$id_provinsi);
    $this->db->order_by("kota");
    $rs = $this->db->get("tiger_kota");
    foreach($rs->result() as $row ) :
        echo "<option value=$row->id>$row->kota </option>";
    endforeach;


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

 function get_desa(){
    $data = $this->input->post();

    $id_kecamatan = $data['id_kecamatan'];
    $this->db->where("id_kecamatan",$id_kecamatan);
    $this->db->order_by("desa");
    $rs = $this->db->get("tiger_desa");
    foreach($rs->result() as $row ) :
        echo "<option value=$row->id>$row->desa </option>";
    endforeach;


}



 

function surat_update(){
    $post = $this->input->post();

     $this->load->library('form_validation');

        $this->form_validation->set_rules('surat','Surat ','required'); 
                 
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

    if ($this->form_validation->run() == TRUE) {
        $this->db->where('id', $post['id']);
        $res = $this->db->update('surat_pelepasan', $post);
        if($res){
           $arr = array('error' => false, 'message' => 'BERHASIL DIPERBAHARUI');
        }else{
            $arr = array('error' => true, 'message' => 'GAGAL DIPERBAHARUI');
        }
    }else{
        $arr = array("error"=>true,'message'=>validation_errors());
    }
    echo json_encode($arr);
}

function saksi_update(){
    $post = $this->input->post();

     $this->load->library('form_validation');

        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('jabatan','Jabatan','required'); 
                 
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

    if ($this->form_validation->run() == TRUE) {
        $this->db->where('id', $post['id']);
        $res = $this->db->update('saksi_pelepasan', $post);
        if($res){
           $arr = array('error' => false, 'message' => 'BERHASIL DIPERBAHARUI ');
        }else{
            $arr = array('error' => true, 'message' => 'GAGAL DIPERBAHARUI');
        }
    }else{
        $arr = array("error"=>true,'message'=>validation_errors());
    }
    echo json_encode($arr);
}


function simpan(){
    $post = $this->input->post();
    $userdata = $this->session->userdata('desa_login');

    //show_array($userdata); exit;

    $post['kecamatan'] = $userdata['kecamatan'];
    $date = flipdate($post['tanggal']);
        $date = DateTime::createFromFormat("Y-m-d", $date);
        // echo $date->format("Y");
        $tahun = $date->format("Y");

    $this->db->where('id', $post['kecamatan']);
    $dt_kecamatan = $this->db->get('tiger_kecamatan')->row_array();


    $post['nama_camat'] = $dt_kecamatan['nama_camat'];
    $post['jabatan_camat'] = $dt_kecamatan['jabatan_camat'];
    $post['nip_camat'] = $dt_kecamatan['nip_camat'];
    $post['tanggal'] = flipdate($post['tanggal']);
    $post['biaya_ganti_rugi'] = bersih($post['biaya_ganti_rugi']);

     $regis = $post['no_surat']; 
        $panjang = strlen($regis);
        // echo $substring;
        // exit;
        if ($panjang==20) {
            $val = substr($regis, 7, 1);
        }else if ($panjang==21) {
            $val = substr($regis, 7, 2);
        }else if ($panjang==22) {
            $val = substr($regis, 7, 3);
        }else if ($panjang==23) {
            $val = substr($regis, 7, 4);
        }else{
            $val = '';
        }


        $seting_data = array('number' => $val, );

    $temp_id_surat = $this->session->userdata('temp_id_surat');
    // echo $val.'<br/>';
    // // echo $temp_tanah_id;
    // show_array($post);
    // show_array($seting_data);
    // exit();
    unset($post['surat_length']);
    unset($post['saksi_length']);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_pihak_pertama','Nama Pihak Pertama','required');   
        // $this->form_validation->set_rules('pelaksana_nip','NIP','required'); 

         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

if($this->form_validation->run() == TRUE ) { 
        

        $post['id_desa'] = $userdata['desa'];
        $post['desa'] = $userdata['desa'];

        $res = $this->db->insert('pelepasan', $post); 
        $pelepasan_id = $this->db->insert_id();
        if($res){
            $this->db->where('tahun', $tahun);
            $this->db->where('id_kecamatan', $userdata['kecamatan']);
            $this->db->update('seting_kecamatan_pelepasan', $seting_data);

            
            $arr_update = array('id_surat' => $pelepasan_id);

            $saksi_arr = array('id_pelepasan' => $pelepasan_id, );

            $this->db->where('temp_id_surat', $temp_id_surat);
            $this->db->update('surat_pelepasan', $arr_update);

            $this->db->where('temp_id_surat', $temp_id_surat);
            $this->db->update('saksi_pelepasan', $saksi_arr);


            $this->session->unset_userdata("temp_id_surat");
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


function saksi_simpan(){

    $userdata = $this->session->userdata('kec_login');
    
    $post = $this->input->post();
    //     $post['nama_surat'] = "Penyerahan/Pelepasan Hak Atas Tanah";
    // $post['jenis_surat'] = "Pelepasan";

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama','Nama','required'); 
        $this->form_validation->set_rules('jabatan','Jabatan','required');  
        
    $id_surat = $this->session->userdata('id_surat');
    // echo $temp_id_surat;
    // exit();
    $post['id_pelepasan'] = $id_surat;
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');
       
        
        // show_array($post);
        // exit();

       unset($post['id']); //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        // $userdata = $this->session->userdata('desa_login');
        // $post['kades'] = $userdata['kepala_desa'];
        // $post['tgl_surat_kec'] = flipdate($post['tgl_surat_kec']);
        
        $res = $this->db->insert('saksi_pelepasan', $post); 
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


function tmp_saksi_simpan(){

    $userdata = $this->session->userdata('kec_login');
    
    $post = $this->input->post();
    //     $post['nama_surat'] = "Penyerahan/Pelepasan Hak Atas Tanah";
    // $post['jenis_surat'] = "Pelepasan";

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama','Nama','required'); 
        $this->form_validation->set_rules('jabatan','Jabatan','required');  
        
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
        
        $res = $this->db->insert('saksi_pelepasan', $post); 
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


function surat_pelepasam_simpan(){

    $userdata = $this->session->userdata('kec_login');
    
    $post = $this->input->post();
    //     $post['nama_surat'] = "Penyerahan/Pelepasan Hak Atas Tanah";
    // $post['jenis_surat'] = "Pelepasan";

        $this->load->library('form_validation');
        $this->form_validation->set_rules('surat','Surat','required');   
        
    $id_surat = $this->session->userdata('id_surat');
    // echo $temp_id_surat;
    // exit();
    $post['id_surat'] = $id_surat;
         
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


function update(){
     $post = $this->input->post();
    $userdata = $this->session->userdata('kec_login');
    $post['kecamatan'] = $userdata['kecamatan'];
    $date = flipdate($post['tanggal']);
        $date = DateTime::createFromFormat("Y-m-d", $date);
        // echo $date->format("Y");
        $tahun = $date->format("Y");

    $this->db->where('id', $post['kecamatan']);
    $dt_kecamatan = $this->db->get('tiger_kecamatan')->row_array();


    $post['nama_camat'] = $dt_kecamatan['nama_camat'];
    $post['jabatan_camat'] = $dt_kecamatan['jabatan_camat'];
    $post['nip_camat'] = $dt_kecamatan['nip_camat'];
    $post['tanggal'] = flipdate($post['tanggal']);
    $post['biaya_ganti_rugi'] = bersih($post['biaya_ganti_rugi']);

     

    $id_surat = $this->session->userdata('id_surat');
    // echo $val.'<br/>';
    // // echo $temp_tanah_id;
    // show_array($post);
    // show_array($seting_data);
    // exit();
    unset($post['surat_length']);
    unset($post['saksi_length']);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_pihak_pertama','Nama Pihak Pertama','required');   
        // $this->form_validation->set_rules('pelaksana_nip','NIP','required'); 

         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

if($this->form_validation->run() == TRUE ) { 
        $this->db->where('id', $id_surat );
        $res = $this->db->update('pelepasan', $post); 
        
        if($res){
           

            $this->session->unset_userdata("id_surat");
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



    function hapusdata_saksi(){
    	$get = $this->input->post();
    	$id = $get['id'];

    	$data = array('id' => $id, );

    	$res = $this->db->delete('saksi_pelepasan', $data);
        if($res){
            $arr = array("error"=>false,"message"=>"DATA BERHASIL DIHAPUS");
        }
        else {
            $arr = array("error"=>true,"message"=>"DATA GAGAL DIHAPUS ".mysql_error());
        }
    	//redirect('sa_birojasa_user');
        echo json_encode($arr);
    }

       function hapusdata_surat(){
        $get = $this->input->post();
        $id = $get['id'];

        $data = array('id' => $id, );

        $res = $this->db->delete('surat_pelepasan', $data);
        if($res){
            $arr = array("error"=>false,"message"=>"DATA BERHASIL DIHAPUS");
        }
        else {
            $arr = array("error"=>true,"message"=>"DATA GAGAL DIHAPUS ".mysql_error());
        }
        //redirect('sa_birojasa_user');
        echo json_encode($arr);
    }




  function pdf() {

    $get = $this->input->get(); 
    $id = $get['id'];

    
    $this->db->where('id', $id);
    $data = $this->db->get('pelepasan')->row_array();
    $data['tanggal'] = flipdate($data['tanggal']);
    
    $this->db->where('id_surat', $id);
    $data['dt_surat'] = $this->db->get('surat_pelepasan')->result_array();
    $this->db->where('id_pelepasan', $id);
    $data['dt_saksi'] = $this->db->get('saksi_pelepasan')->result_array();
    $data['biaya_ganti_rugi'] = rupiah($data['biaya_ganti_rugi']);

    $rs = $this->dm->datawilayah('id', 'tiger_provinsi', $data['propinsi'], 'provinsi')->row();
    $data['propinsi'] = $rs->provinsi;

    $rs = $this->dm->datawilayah('id', 'tiger_kota', $data['kabupaten'], 'kota')->row();
    $data['kabupaten'] = $rs->kota;
    $rs = $this->dm->datawilayah('id', 'tiger_kecamatan', $data['kecamatan'], 'kecamatan')->row();
    $data['kecamatan'] = $rs->kecamatan;
     $rs = $this->dm->datawilayah('id', 'tiger_desa', $data['desa'], 'desa')->row();
    $data['desa'] = $rs->desa;

    $rs = $this->dm->datawilayah('id', 'tiger_kota', $data['kabupaten_pihak_kedua'], 'kota')->row();
    $data['kabupaten_pihak_kedua'] = $rs->kota;
    $rs = $this->dm->datawilayah('id', 'tiger_kota', $data['kabupaten_pihak_pertama'], 'kota')->row();
    $data['kabupaten_pihak_pertama'] = $rs->kota;

    $rs = $this->dm->datawilayah('id', 'tiger_provinsi', $data['provinsi_pihak_pertama'], 'provinsi')->row();
    $data['provinsi_pihak_pertama'] = $rs->provinsi;

    $rs = $this->dm->datawilayah('id', 'tiger_provinsi', $data['provinsi_pihak_kedua'], 'provinsi')->row();
    $data['provinsi_pihak_kedua'] = $rs->provinsi;

    $rs = $this->dm->datawilayah('id', 'tiger_kecamatan', $data['kecamatan_pihak_pertama'], 'kecamatan')->row();
    $data['kecamatan_pihak_pertama'] = $rs->kecamatan;

    $rs = $this->dm->datawilayah('id', 'tiger_desa', $data['desa_pihak_pertama'], 'desa')->row();
    $data['desa_pihak_pertama'] = $rs->desa;

    $rs = $this->dm->datawilayah('id', 'tiger_kecamatan', $data['kecamatan_pihak_kedua'], 'kecamatan')->row();
    $data['kecamatan_pihak_kedua'] = $rs->kecamatan;

    $rs = $this->dm->datawilayah('id', 'tiger_desa', $data['desa_pihak_kedua'], 'desa')->row();
    $data['desa_pihak_kedua'] = $rs->desa;
    // show_array($data);
    // exit();

    $data['controller'] = get_class($this);
    $data['header'] = "Surat Penyerahan / Pelepasan Hak Atas Tanah";
    $data['title'] = $data['header'];
    $this->load->library('pdf_pelepasan');
        $pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle( $data['header']);
     
        $pdf->SetMargins(20, 10, 20);
        // $pdf->SetHeaderMargin(10);
        // $pdf->SetFooterMargin(10);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetAutoPageBreak(true,10);
        $pdf->SetAuthor('PKPD  taujago@gmail.com');
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);    
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

         // add a page
        $pdf->AddPage('P');

        $pdf->SetFont('times', '', 12);

         $html = $this->load->view("pelepasan_pdf_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}


 


 


}

?>