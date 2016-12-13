<?php 
class hak_guna_tanah extends desa_controller{
	var $controller;
	function hak_guna_tanah(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model($this->controller.'_model','dm');
        $this->load->model("coremodel","cm");
        $this->load->helper("tanggal");
		
		//$this->load->helper("serviceurl");
		
	}








function index(){
		$data_array=array();
        $content = $this->load->view($this->controller."_view",$data_array,true);

        $this->set_subtitle("Hak Guna Tanah");
        $this->set_title("Hak Guna Tanah");
        $this->set_content($content);
        $this->cetak();
}






function baru(){
        $data_array=array();

        // $userdata = $this->session->userdata('admin_login');
        // $username1 = $userdata['username'];

        $userdata = $this->session->userdata('desa_login');

        
        $temp_tanah_id = $this->session->userdata("temp_tanah_id"); 

        if($temp_tanah_id == "") {
            $xx = md5(date("dmyhis").round(0,100)); 
            $this->session->set_userdata("temp_tanah_id",$xx);
            $temp_tanah_id = $this->session->userdata("temp_tanah_id"); 
        }

        // echo $this->session->userdata("temp_lap_a_id");  exit;
        $data_array['json_url_pemilik'] = site_url("$this->controller/temp_get_pemilik");
        $data_array['json_url_saksi'] = site_url("$this->controller/temp_get_saksi");
        $data_array['json_url_posisi_barat'] = site_url("$this->controller/temp_get_posisi_barat");
        $data_array['json_url_posisi_timur'] = site_url("$this->controller/temp_get_posisi_timur");
        $data_array['json_url_posisi_utara'] = site_url("$this->controller/temp_get_posisi_utara");
        $data_array['json_url_posisi_selatan'] = site_url("$this->controller/temp_get_posisi_selatan");
        //$this->session->unset_userdata("temp_lap_a_id");
        $data_array['temp_tanah_id']=$temp_tanah_id;
        $data_array['pemilik_add_url'] = site_url("$this->controller/tmp_pemilik_simpan");
        $data_array['saksi_add_url'] = site_url("$this->controller/tmp_saksi_simpan");
         $data_array['posisi_add_barat_url'] = site_url("$this->controller/tmp_barat_simpan");
         $data_array['posisi_add_selatan_url'] = site_url("$this->controller/tmp_selatan_simpan");
         $data_array['posisi_add_timur_url'] = site_url("$this->controller/tmp_timur_simpan");
         $data_array['posisi_add_utara_url'] = site_url("$this->controller/tmp_utara_simpan");
        // show_array($temp_tanah_id);

        // exit();
        $data_array['action'] = 'simpan';
        $content = $this->load->view($this->controller."_form_view",$data_array,true);


        $data_array['arr_kecamatan'] = $this->cm->arr_dropdown3("tiger_kecamatan", "id", "kecamatan", "kecamatan", "id_kota", "19_5");
       
        $content = $this->load->view($this->controller."_form_view",$data_array,true);
        // echo $temp_tanah_id;
        $this->set_subtitle("Desa");
        $this->set_title("Register Pertanahan");
        $this->set_content($content);
        $this->cetak();
}



// function get_no_regis(){
//     $data = $this->input->post();

//     $tahun = $data['tgl_register_desa'];
//     // $tahun = $tahun('Y');
//     echo $tahun;

// }




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

function tmp_saksi_simpan(){

    $userdata = $this->session->userdata('desa_login');

    $post = $this->input->post();
        

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama','Nama Pemilik','required');   
        

         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        



       unset($post['id']); //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        // $userdata = $this->session->userdata('desa_login');
        // $post['kades'] = $userdata['kepala_desa'];
        $post['tgl_lahir'] = flipdate($post['tgl_lahir']);
        $post['umur'] = date_diff(date_create($post['tgl_lahir']), date_create('today'))->y;
        $res = $this->db->insert('saksi_hak_guna_tanah', $post); 
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


function tmp_pemilik_simpan(){

    $userdata = $this->session->userdata('desa_login');

    $post = $this->input->post();
        

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama','Nama Pemilik','required');   
        

         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        



       unset($post['id']); //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        // $userdata = $this->session->userdata('desa_login');
        // $post['kades'] = $userdata['kepala_desa'];
        $post['tgl_lahir'] = flipdate($post['tgl_lahir']);
        
        $res = $this->db->insert('pemilik_tanah', $post); 
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


function saksi_simpan(){

    $userdata = $this->session->userdata('desa_login');

    $post = $this->input->post();
        

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama','Nama Pemilik','required');   
        

        $data = $this->session->userdata('id_surat');
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        // echo $data;
        $post['id_surat'] = $data;
        // exit();

       unset($post['id']); //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        // $userdata = $this->session->userdata('desa_login');
        // $post['kades'] = $userdata['kepala_desa'];
        $post['tgl_lahir'] = flipdate($post['tgl_lahir']);
        $post['umur'] = date_diff(date_create($post['tgl_lahir']), date_create('today'))->y;
        $res = $this->db->insert('saksi_hak_guna_tanah', $post); 
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

function pemilik_simpan(){

    $userdata = $this->session->userdata('desa_login');

    $post = $this->input->post();
        

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama','Nama Pemilik','required');   
        

        $data = $this->session->userdata('tanah_id');
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        // echo $data;
        $post['id_tanah'] = $data;
        // exit();

       unset($post['id']); //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        // $userdata = $this->session->userdata('desa_login');
        // $post['kades'] = $userdata['kepala_desa'];
        $post['tgl_lahir'] = flipdate($post['tgl_lahir']);
        
        $res = $this->db->insert('pemilik_tanah', $post); 
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


function saksi_update(){

    $userdata = $this->session->userdata('desa_login');

    $post = $this->input->post();
    $id = $post['id']; 

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama','Nama Pemilik','required');   
        

         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        
        // show_array($post);
        // exit();


        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        // $userdata = $this->session->userdata('desa_login');
        // $post['kades'] = $userdata['kepala_desa'];
        $post['tgl_lahir'] = flipdate($post['tgl_lahir']);
        $post['umur'] = date_diff(date_create($post['tgl_lahir']), date_create('today'))->y;
        $this->db->where('id', $id);
        $res = $this->db->update('saksi_hak_guna_tanah', $post); 
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

function pemilik_update(){

    $userdata = $this->session->userdata('desa_login');

    $post = $this->input->post();
    $id = $post['id']; 

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama','Nama Pemilik','required');   
        

         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        
        // show_array($post);
        // exit();


        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        // $userdata = $this->session->userdata('desa_login');
        // $post['kades'] = $userdata['kepala_desa'];
        $post['tgl_lahir'] = flipdate($post['tgl_lahir']);
        $this->db->where('id', $id);
        $res = $this->db->update('pemilik_tanah', $post); 
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


function simpan(){



    $userdata = $this->session->userdata('desa_login');

    $post = $this->input->post();
     unset($post['pemilik_length']);
        $regis = $post['no_register_desa']; 
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
          
        $temp_tanah_id = $this->session->userdata('temp_tanah_id');

        


        // show_array($data_tanah);exit();
        


        $this->load->library('form_validation');
        $this->form_validation->set_rules('jln_tanah','Jalan Tanah','required');   
        // $this->form_validation->set_rules('pelaksana_nip','NIP','required'); 

         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        $date = flipdate($post['tgl_register_desa']);
        $date = DateTime::createFromFormat("Y-m-d", $date);
        // echo $date->format("Y");
        $tahun = $date->format("Y");
        $post['no_ket_desa'] = $val.'/KET/'.$tahun.'/2020';
        $post['no_berita_acara_desa'] = $val.'/BA/'.$tahun.'/2020';

        $this->db->where('id', $userdata['desa']);
        $ls = $this->db->get('tiger_desa')->row_array();
        $post['kades'] = $ls['nama_kades'];
        // $post['jabatan_kades'] = $ls['jabatan'];
       
        $seting_data = array('number' => $val, );

        



        // $post['tgl_lhr_pemilik'] = flipdate($post['tgl_lhr_pemilik']);
        $post['tgl_pernyataan'] = flipdate($post['tgl_pernyataan']);
        $post['tgl_register_desa'] = flipdate($post['tgl_register_desa']);
        
        $post['desa_tanah'] = $userdata['desa'];
        $post['kec_tanah'] = $userdata['kecamatan'];
        
        unset($post['no_registrasi_desa']);
        // $post['no_ket_desa'] = $post['no_data_desa'].''.$userdata['format_ket'];
        // $post['no_berita_acara_desa'] = $post['no_data_desa'].''.$userdata['format_berita'];
        // $post['nama_batas_u'] = $post['saksi_satu_nama'];
        // $post['nama_batas_b'] = $post['saksi_dua_nama'];
        // $post['nama_batas_t'] = $post['saksi_tiga_nama'];
        // $post['nama_batas_s'] = $post['saksi_empat_nama'];

        $post['status'] = '1';
        $data_tanah = array('jln_tanah' => $post['jln_tanah'],
                            'rt_tanah' => $post['rt_tanah'],
                            'rw_tanah' => $post['rw_tanah'],
                            'dusun_tanah' => $post['dusun_tanah'],
                            'kab_tanah' => $post['kab_tanah'],
                            'status_tanah' => $post['status_tanah'],
                            'sejak_kuasa_tanah' => $post['sejak_kuasa_tanah'],
                            'guna_tanah' => $post['guna_tanah'],
                            'tanaman' => $post['tanaman'],
                            'desa_tanah' =>  $post['desa_tanah'],
                            'kec_tanah' =>  $post['kec_tanah'],
                            'no_surat_terakhir' => $post['no_ket_desa'],
                            'kegiatan_terakhir' => 'Pengakuan Atas Tanah');

        $data_surat = array('nama_pengukur_satu' =>  $post['saksi_lima_nama'],
                            'umur_pengukur_satu' =>  $post['saksi_lima_umur'],
                            'pekerjaan_pengukur_satu' =>  $post['saksi_lima_pekerjaan'],
                            'jabatan_pengukur_satu' =>  $post['saksi_lima_jabatan'],
                            'alamat_pengukur_satu' =>  $post['saksi_lima_alamat'],
                            'nama_pengukur_dua' =>  $post['saksi_enam_nama'],
                            'umur_pengukur_dua' =>  $post['saksi_enam_umur'],
                            'pekerjaan_pengukur_dua' =>  $post['saksi_enam_pekerjaan'],
                            'jabatan_pengukur_dua' =>  $post['saksi_enam_jabatan'],
                            'alamat_pengukur_dua' =>  $post['saksi_enam_alamat'],
                            'tgl_register_desa' =>  $post['tgl_register_desa'],
                            'no_register_desa' =>  $post['no_register_desa'],
                            'no_ket_desa' =>  $post['no_ket_desa'],
                            'no_berita_acara_desa' =>  $post['no_berita_acara_desa'],
                            'nama_kades' =>  $post['kades'],
                            'id_desa' =>  $post['desa_tanah'],
                            'id_kecamatan' =>  $post['kec_tanah'],
                            'status' =>  $post['status'],
                            'pembuat_pernyataan' =>  $post['pembuat_pernyataan'],
                            'nama_batas_timur' =>  $post['nama_batas_timur'],
                            'nama_batas_selatan' =>  $post['nama_batas_selatan'],
                            'nama_batas_barat' =>  $post['nama_batas_barat'],
                            'nama_batas_utara' =>  $post['nama_batas_utara'],
                            'panjang_batas_timur' =>  $post['panjang_batas_timur'],
                            'panjang_batas_barat' =>  $post['panjang_batas_barat'],
                            'panjang_batas_selatan' =>  $post['panjang_batas_selatan'],
                            'panjang_batas_utara' =>  $post['panjang_batas_utara'],
                            'tgl_pernyataan' =>  $post['tgl_pernyataan'],
                            );

        //show_array($data);
        // show_array($data_surat);
        // show_array($data_tanah);
         // show_array($post);exit();
if($this->form_validation->run() == TRUE ) { 

        // $userdata = $this->session->userdata('desa_login');
        // $post['kades'] = $userdata['kepala_desa'];

        
        $res = $this->db->insert('tanah', $data_tanah); 
        $tanah_id = $this->db->insert_id();
        if($res){
            $this->db->where('tahun', $tahun);
            $this->db->where('id_desa', $userdata['desa']);
            $this->db->update('seting_desa', $seting_data);

            $data_surat['id_tanah'] = $tanah_id;
            $this->db->insert('utama', $data_surat);
            $id_surat = $this->db->insert_id();
            $arr_update = array('id_tanah' => $tanah_id);

            $saksi_arr = array('id_surat' => $id_surat, );

            $this->db->where('temp_id_tanah', $temp_tanah_id);
            $this->db->update('pemilik_tanah', $arr_update);

            $this->db->where('temp_id_surat', $temp_tanah_id);
            $this->db->update('saksi_hak_guna_tanah', $saksi_arr);

            // $this->db->where('emp_id_tanah', $temp_tanah_id);
            // $this->db->update('batas_barat', $arr_update);

            // $this->db->where('temp_id_tanah', $temp_tanah_id);
            // $this->db->update('batas_timur', $arr_update);

            // $this->db->where('temp_id_tanah', $temp_tanah_id);
            // $this->db->update('batas_selatan', $arr_update);

            // $this->db->where('temp_id_tanah', $temp_tanah_id);
            // $this->db->update('batas_utara', $arr_update);

            $this->session->unset_userdata("temp_tanah_id");
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
        
  
        $pembuat_pernyataan = $_REQUEST['columns'][1]['search']['value'];
        

        $userdata = $this->session->userdata('desa_login');
        $desa = $userdata['desa'];

        // $this->db->where('desa_tanah', $desa);
        


        


      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
				"pembuat_pernyataan" => $pembuat_pernyataan,
                "desa" => $desa,
				
				 
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
                                <li><a href='$this->controller/editdata?id=$id'><i class='fa fa-edit'></i> Edit</a></li>
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


        if ($row['status_jual']==0&&$row['status_waris']==0) {
            $status = '<span class="badge">Tidak Dijual Atau Diwariskan</span>';
        }else if ($row['status_jual']==0&&$row['status_waris']==1) {
            $status = '<span class="badge">Telah Diwariskan</span>';
        }else if ($row['status_jual']==1&&$row['status_waris']==0) {
            $status = '<span class="badge">Telah Di Jual</span>';
        }
        	
        $row['tgl_register_desa'] = flipdate($row['tgl_register_desa']);
        	 
        	$arr_data[] = array(
                $row['tgl_register_desa'],
                $row['no_register_desa'],
                $row['pembuat_pernyataan'],
        		$status,   		 
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

function get_pemilik_detail($id){

    $data = $this->dm->get_pemilik_detail($id);
    // show_array($data);
    $data['tgl_lahir'] = flipdate($data['tgl_lahir']);
    echo json_encode($data);
}


function get_saksi_detail($id){

    $data = $this->dm->get_saksi_detail($id);
    // show_array($data);
    $data['tgl_lahir'] = flipdate($data['tgl_lahir']);
    echo json_encode($data);
}

 function get_posisi_barat() {

        
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
                "id_tanah" => $tanah_id,
                "desa" => $desa,
                
                 
        );     
           
        $row = $this->dm->get_posisi_barat($req_param)->result_array();
        
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->get_posisi_barat($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
        $id = $row['id'];
        
        $action = " ± ".rupiah($row['panjang'])." Meter dengan ".$row['jenis']." milik ".$row['nama_pemilik_tanah']." &nbsp;&nbsp;<a href='#' onclick=\"hapus_barat('$id')\" ><i class='fa fa-times butuh-hover'></i></a>";
            $arr_data[] = array(         
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

    function get_posisi_timur() {

        
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
                "id_tanah" => $tanah_id,
                "desa" => $desa,
                
                 
        );     
           
        $row = $this->dm->get_posisi_timur($req_param)->result_array();
        
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->get_posisi_timur($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
        $id = $row['id'];
        
        $action = " ± ".rupiah($row['panjang'])." Meter dengan ".$row['jenis']." milik ".$row['nama_pemilik_tanah']." &nbsp;&nbsp;<a href='#' onclick=\"hapus_timur('$id')\" ><i class='fa fa-times butuh-hover'></i></a>";
            $arr_data[] = array(         
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

     function get_posisi_selatan() {

        
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
                "id_tanah" => $tanah_id,
                "desa" => $desa,
                
                 
        );     
           
        $row = $this->dm->get_posisi_selatan($req_param)->result_array();
        
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->get_posisi_selatan($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
        $id = $row['id'];
        
        $action = " ± ".rupiah($row['panjang'])." Meter dengan ".$row['jenis']." milik ".$row['nama_pemilik_tanah']." &nbsp;&nbsp;<a href='#' onclick=\"hapus_selatan('$id')\" ><i class='fa fa-times butuh-hover'></i></a>";
            $arr_data[] = array(         
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

     function get_posisi_utara() {

        
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
                "id_tanah" => $tanah_id,
                "desa" => $desa,
                
                 
        );     
           
        $row = $this->dm->get_posisi_utara($req_param)->result_array();
        
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->get_posisi_utara($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
        $id = $row['id'];
        
        $action = " ± ".rupiah($row['panjang'])." Meter dengan ".$row['jenis']." milik ".$row['nama_pemilik_tanah']." &nbsp;&nbsp;<a href='#' onclick=\"hapus_utara('$id')\" ><i class='fa fa-times butuh-hover'></i></a>";
            $arr_data[] = array(         
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

 function temp_get_posisi_barat() {

        
        // show_array($userdata);

        $draw = $_REQUEST['draw']; // get the requested page 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        
        

        $userdata = $this->session->userdata('desa_login');
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
           
        $row = $this->dm->temp_get_posisi($req_param)->result_array();
        
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->temp_get_posisi($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
        $id = $row['id'];
        
        $action = " ± ".rupiah($row['panjang'])." Meter dengan ".$row['jenis']." milik ".$row['nama_pemilik_tanah']." &nbsp;&nbsp;<a href='#' onclick=\"hapus_barat('$id')\" ><i class='fa fa-times butuh-hover'></i></a>";


       // $action = '<span class="badge" style="font-size : 17px; background-color: #3498db;"> ± '.rupiah($row['panjang']).' Meter dengan '.$row['jenis'].' milik '.$row['nama_pemilik_tanah'].' &nbsp;&nbsp;<a href="#" onclick=\"hapus_barat('$id')\" ><i class="fa fa-times butuh-hover"></i></a></span>';
            
    // $action = '<div class="callout callout-info" id="hide">
    //         <h4> '.$row['nama_pemilik_tanah'].'</h4>
    // </div>';
            
            // $action = "<div class='btn-group'>
            //                   <button type='button' class='btn btn-primary'>Action</button>
            //                   <button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown'>
            //                     <span class='caret'></span>
            //                     <span class='sr-only'>Toggle Dropdown</span>
            //                   </button>
            //                   <ul class='dropdown-menu' role='menu'>
            //                     <li><a href='#' onclick=\"hapus('$id')\" ><i class='fa fa-trash'></i> Hapus</a></li>
            //                     <li><a href='#' onclick=\"pemilik_edit('$id')\" ><i class='fa fa-edit'></i> Edit</a></li>
            //                   </ul>
            //                 </div>";

            
            
       
            
        // $row['tgl_register_desa'] = flipdate($row['tgl_register_desa']);
             
            $arr_data[] = array(         
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


    function temp_get_posisi_timur() {

        
        // show_array($userdata);

        $draw = $_REQUEST['draw']; // get the requested page 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        
        

        $userdata = $this->session->userdata('desa_login');
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
           
        $row = $this->dm->temp_get_posisi_timur($req_param)->result_array();
        
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->temp_get_posisi_timur($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
        $id = $row['id'];
        
        $action = " ± ".rupiah($row['panjang'])." Meter dengan ".$row['jenis']." milik ".$row['nama_pemilik_tanah']." &nbsp;&nbsp;<a href='#' onclick=\"hapus_timur('$id')\" ><i class='fa fa-times butuh-hover'></i></a>";


       // $action = '<span class="badge" style="font-size : 17px; background-color: #3498db;"> ± '.rupiah($row['panjang']).' Meter dengan '.$row['jenis'].' milik '.$row['nama_pemilik_tanah'].' &nbsp;&nbsp;<a href="#" onclick=\"hapus_barat('$id')\" ><i class="fa fa-times butuh-hover"></i></a></span>';
            
  
             
            $arr_data[] = array(         
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

    function temp_get_posisi_selatan() {

        
        // show_array($userdata);

        $draw = $_REQUEST['draw']; // get the requested page 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        
        

        $userdata = $this->session->userdata('desa_login');
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
           
        $row = $this->dm->temp_get_posisi_selatan($req_param)->result_array();
        
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->temp_get_posisi_selatan($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
        $id = $row['id'];
        
        $action = " ± ".rupiah($row['panjang'])." Meter dengan ".$row['jenis']." milik ".$row['nama_pemilik_tanah']." &nbsp;&nbsp;<a href='#' onclick=\"hapus_selatan('$id')\" ><i class='fa fa-times butuh-hover'></i></a>";


       // $action = '<span class="badge" style="font-size : 17px; background-color: #3498db;"> ± '.rupiah($row['panjang']).' Meter dengan '.$row['jenis'].' milik '.$row['nama_pemilik_tanah'].' &nbsp;&nbsp;<a href="#" onclick=\"hapus_barat('$id')\" ><i class="fa fa-times butuh-hover"></i></a></span>';
            
  
             
            $arr_data[] = array(         
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

    function temp_get_posisi_utara() {

        
        // show_array($userdata);

        $draw = $_REQUEST['draw']; // get the requested page 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        
        

        $userdata = $this->session->userdata('desa_login');
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
           
        $row = $this->dm->temp_get_posisi_utara($req_param)->result_array();
        
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->temp_get_posisi_utara($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
        $id = $row['id'];
        
        $action = " ± ".rupiah($row['panjang'])." Meter dengan ".$row['jenis']." milik ".$row['nama_pemilik_tanah']." &nbsp;&nbsp;<a href='#' onclick=\"hapus_utara('$id')\" ><i class='fa fa-times butuh-hover'></i></a>";


       // $action = '<span class="badge" style="font-size : 17px; background-color: #3498db;"> ± '.rupiah($row['panjang']).' Meter dengan '.$row['jenis'].' milik '.$row['nama_pemilik_tanah'].' &nbsp;&nbsp;<a href="#" onclick=\"hapus_barat('$id')\" ><i class="fa fa-times butuh-hover"></i></a></span>';
            
  
             
            $arr_data[] = array(         
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
        
  
        
        

        $userdata = $this->session->userdata('desa_login');
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



 function temp_get_pemilik() {

        
        // show_array($userdata);

        $draw = $_REQUEST['draw']; // get the requested page 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        
        

        $userdata = $this->session->userdata('desa_login');
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

       function get_saksi() {

        
        // show_array($userdata);

        $draw = $_REQUEST['draw']; // get the requested page 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        
        

        $userdata = $this->session->userdata('desa_login');
        $desa = $userdata['desa'];



        // $this->db->where('desa_tanah', $desa);
        

        $id_surat = $this->session->userdata('id_surat');
        


      //  order[0][column]
        $req_param = array (
                "sort_by" => $sidx,
                "sort_direction" => $sord,
                "limit" => null,
                "id_surat" => $id_surat,
                "desa" => $desa,
                
                 
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
    	 $biro_jasa = $this->db->get('utama');
         $ms = $biro_jasa->row();
    	 $data = $biro_jasa->row_array();
         $id_tanah = $ms->id_tanah;
         $this->session->set_userdata("tanah_id",$id_tanah);
         $this->session->set_userdata("id_surat",$id);
         // echo $id_tanah;
         // exit();

         // $data['tgl_lhr_pemilik'] = flipdate($data['tgl_lhr_pemilik']);
         $data['tgl_pernyataan'] = flipdate($data['tgl_pernyataan']);
         $data['tgl_register_desa'] = flipdate($data['tgl_register_desa']);
         $data['json_url_pemilik'] = site_url("$this->controller/get_pemilik");
         $data['json_url_saksi'] = site_url("$this->controller/get_saksi");
         $data['json_url_posisi_barat'] = site_url("$this->controller/get_posisi_barat");
        $data['json_url_posisi_timur'] = site_url("$this->controller/get_posisi_timur");
        $data['json_url_posisi_utara'] = site_url("$this->controller/get_posisi_utara");
        $data['json_url_posisi_selatan'] = site_url("$this->controller/get_posisi_selatan");
        $data['posisi_add_barat_url'] = site_url("$this->controller/barat_simpan");
         $data['posisi_add_selatan_url'] = site_url("$this->controller/selatan_simpan");
         $data['posisi_add_timur_url'] = site_url("$this->controller/timur_simpan");
         $data['posisi_add_utara_url'] = site_url("$this->controller/utara_simpan");
        // show_array($temp_tanah_id);
         $data['pemilik_add_url'] = site_url("$this->controller/pemilik_simpan");
         $data['saksi_add_url'] = site_url("$this->controller/saksi_simpan");
        $data['arr_kecamatan'] = $this->cm->arr_dropdown3("tiger_kecamatan", "id", "kecamatan", "kecamatan", "id_kota", "19_5");
       $this->db->where('id', $id_tanah);
         $tanah = $this->db->get('tanah')->row_array();
         // $data = $tanah;
         $data = array_merge($data,$tanah);
         // array_push($data, $tanah);
         // show_array($tanah);
         // show_array($data);exit();


        $data['action'] = 'update';
        $data['id'] = $id;
		$content = $this->load->view($this->controller."_form_view",$data,true);

       

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



function update(){

    $post = $this->input->post();
    $id_tanah = $this->session->userdata('tanah_id');
    $userdata = $this->session->userdata('desa_login');
   // echo $id_tanah;

    $this->db->where('id', $userdata['desa']);
        $ls = $this->db->get('tiger_desa')->row_array();
        $post['kades'] = $ls['nama_kades'];
 $post['desa_tanah'] = $userdata['desa'];
        $post['kec_tanah'] = $userdata['kecamatan'];
   $data_tanah = array('jln_tanah' => $post['jln_tanah'],
                            'rt_tanah' => $post['rt_tanah'],
                            'rw_tanah' => $post['rw_tanah'],
                            'dusun_tanah' => $post['dusun_tanah'],
                            'kab_tanah' => $post['kab_tanah'],
                            'status_tanah' => $post['status_tanah'],
                            'sejak_kuasa_tanah' => $post['sejak_kuasa_tanah'],
                            'guna_tanah' => $post['guna_tanah'],
                            'tanaman' => $post['tanaman'],);

     $data_surat = array('nama_pengukur_satu' =>  $post['saksi_lima_nama'],
                            'umur_pengukur_satu' =>  $post['saksi_lima_umur'],
                            'pekerjaan_pengukur_satu' =>  $post['saksi_lima_pekerjaan'],
                            'jabatan_pengukur_satu' =>  $post['saksi_lima_jabatan'],
                            'alamat_pengukur_satu' =>  $post['saksi_lima_alamat'],
                            'nama_pengukur_dua' =>  $post['saksi_enam_nama'],
                            'umur_pengukur_dua' =>  $post['saksi_enam_umur'],
                            'pekerjaan_pengukur_dua' =>  $post['saksi_enam_pekerjaan'],
                            'jabatan_pengukur_dua' =>  $post['saksi_enam_jabatan'],
                            'alamat_pengukur_dua' =>  $post['saksi_enam_alamat'],
                            'tgl_register_desa' =>  flipdate($post['tgl_register_desa']),
                            'nama_kades' =>  $post['kades'],
                            'id_desa' =>  $post['desa_tanah'],
                            'id_kecamatan' =>  $post['kec_tanah'],
                            'pembuat_pernyataan' =>  $post['pembuat_pernyataan'],
                            'nama_batas_timur' =>  $post['nama_batas_timur'],
                            'nama_batas_selatan' =>  $post['nama_batas_selatan'],
                            'nama_batas_barat' =>  $post['nama_batas_barat'],
                            'nama_batas_utara' =>  $post['nama_batas_utara'],
                            'panjang_batas_timur' =>  $post['panjang_batas_timur'],
                            'panjang_batas_barat' =>  $post['panjang_batas_barat'],
                            'panjang_batas_selatan' =>  $post['panjang_batas_selatan'],
                            'panjang_batas_utara' =>  $post['panjang_batas_utara'],
                            'tgl_pernyataan' =>  flipdate($post['tgl_pernyataan']),
                            );

// show_array($data_surat);
// show_array($data_tanah);
       
// show_array($post);exit();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('pembuat_pernyataan','Nama Pembuat Pernyataan','required'); 
                 
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        

        $this->db->where("id",$post['id']);
        $res = $this->db->update('utama', $data_surat); 
        if($res){
             $this->db->where("id",$id_tanah);
            $res = $this->db->update('tanah', $data_tanah); 
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



    function hapusdata(){
    	$get = $this->input->post();
    	$id = $get['id'];

    	$data = array('id' => $id, );

    	$res = $this->db->delete('utama', $data);
        if($res){
            $arr = array("error"=>false,"message"=>"DATA BERHASIL DIHAPUS");
        }
        else {
            $arr = array("error"=>true,"message"=>"DATA GAGAL DIHAPUS ".mysql_error());
        }
    	//redirect('sa_birojasa_user');
        echo json_encode($arr);
    }

        function hapusdata_saksi(){
        $get = $this->input->post();
        $id = $get['id'];

        $data = array('id' => $id, );

        $res = $this->db->delete('saksi_hak_guna_tanah', $data);
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



function get_data_penduduk(){
    $post  = $this->input->post();
    //show_array($post);

    $this->db->where("nik",$post['nik_posisi']);
    $data_penduduk  = $this->db->get("pemilik_tanah");

    // echo $this->db->last_query();
    // exit();
    if ($data_penduduk->num_rows()==0) {
        $this->db->where("nik",$post['nik_posisi']);
        $data2 = $this->db->get("saksi_hak_guna_tanah");
        if ($data2->num_rows()==0) {
            $this->db->where("nik",$post['nik_posisi']);
            $data3 = $this->db->get("batas_timur");
            if ($data3->num_rows()==0) {
                $this->db->where("nik",$post['nik_posisi']);
                $data4 = $this->db->get("batas_selatan");
                if ($data4->num_rows()==0) {
                    $this->db->where("nik",$post['nik_posisi']);
                    $data5 = $this->db->get("batas_utara");
                    if ($data5->num_rows()==0) {
                         $hasil = array('nama_pemilik_tanah' => '', 'tempat_lahir' => '', 'pekerjaan' => '', 'tgl_lahir' => '', 'alamat' => '');
                    }else
                        $hasil = $data5->row_array();
                }else{
                    $hasil = $data4->row_array();
                }
            }else{
                $hasil = $data3->row_array();
            }
        }else{
            $hasil = $data2->row_array();
            $hasil['nama_pemilik_tanah'] = $hasil['nama'];
        }
    }else {
        $hasil = $data_penduduk->row_array();
        $hasil['nama_pemilik_tanah'] = $hasil['nama'];
    }
    $hasil['tgl_lahir'] = flipdate($hasil['tgl_lahir']);
    // show_array($hasil);
    // exit();

   //  $data = $data_polda->id_key . date("Ymd") . "APMDATA". $post['no_rangka'];

   //  // echo "data before signature " . $data . '<hr />';

   //  $signature = sha1($data);

   //   // echo "data after signature " .$signature . '<hr />';

   //  $arr = array(
   //      "Fn" => "APMDATA",
   //      "ClientID" => $data_polda->id,
   //      "Param" => array(
   //          "Signature" => $signature, 
   //          "NoRangka"  => $post['no_rangka']
   //          )

   //      );


   //  $json_data = json_encode($arr); 

   // // echo $json_data . '<br />';  


   //  // show_array($data_polda);

   

   //  $hasil = $this->execute_service($data_polda->url, $json_data) ;

   //  $arr = json_decode($hasil);

   //  $arr->Data->TglFaktur = flipdate(todate2($arr->Data->TglFaktur)); 

   // show_array($arr);


    if (!empty($hasil)) {
        echo json_encode($hasil);
    }

        

 

    

    // echo "hasilnya mana ? " . $hasil;
}


  function pdfper() {

    $get = $this->input->get(); 
    $id = $get['id'];

    
    $userdata = $this->session->userdata('desa_login');
    

    $this->db->where('id', $id);
    $rs = $this->db->get('utama');
    $data = $rs->row_array();
    extract($data);
    $this->db->where('id', $id_tanah);
         $tanah = $this->db->get('tanah')->row_array();
         // $data = $tanah;
         $data = array_merge($data,$tanah);

    $this->db->where('id', $id_desa);
    $qr = $this->db->get('tiger_desa');
    $rs = $qr->row_array();
    $data['desa_tanah'] = $rs['desa'];
    $this->db->where('id_tanah', $id_tanah);
        $data['pemilik'] = $this->db->get('pemilik_tanah')->result();
    $this->db->where('id', $id_kecamatan);
    $qr = $this->db->get('tiger_kecamatan');
    $rs = $qr->row_array();
    $data['kec_tanah'] = $rs['kecamatan'];

    $this->db->where('id', '19_5');
    $qr = $this->db->get('tiger_kota');
    $rs = $qr->row_array();
    $data['kab_tanah'] = $rs['kota'];
    $this->db->where('id_surat', $id);
        $data['saksi'] = $this->db->get('saksi_hak_guna_tanah')->result();
    // show_array($data);
    // exit();


    $this->db->where('id', $userdata['desa']);
    $qr = $this->db->get('tiger_desa')->row_array();
    $data['jenis_wilayah'] = $qr['jenis_wilayah'];

    $data['controller'] = get_class($this);
    $data['header'] = "Surat Pernyataan";
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
    $rs = $this->db->get('utama');
    $data = $rs->row_array();
    extract($data);
    $this->db->where('id', $id_tanah);
         $tanah = $this->db->get('tanah')->row_array();
         // $data = $tanah;
         $data = array_merge($data,$tanah);

    $this->db->where('id', $id_desa);
    $qr = $this->db->get('tiger_desa');
    $rs = $qr->row_array();
    $data['desa_tanah'] = $rs['desa'];
    $this->db->where('id_tanah', $id_tanah);
        $data['pemilik'] = $this->db->get('pemilik_tanah')->result();
    $this->db->where('id', $id_kecamatan);
    $qr = $this->db->get('tiger_kecamatan');
    $rs = $qr->row_array();
    $data['kec_tanah'] = $rs['kecamatan'];

    $this->db->where('id', '19_5');
    $qr = $this->db->get('tiger_kota');
    $rs = $qr->row_array();
    $data['kab_tanah'] = $rs['kota'];
    $this->db->where('id_surat', $id);
        $data['saksi'] = $this->db->get('saksi_hak_guna_tanah')->result();
    // show_array($data);
    // exit();


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

    
    $userdata = $this->session->userdata('desa_login');
    
    $this->db->where('id', $id);
    $rs = $this->db->get('utama');
    $data = $rs->row_array();
    extract($data);
    $this->db->where('id', $id_tanah);
         $tanah = $this->db->get('tanah')->row_array();
         // $data = $tanah;
         $data = array_merge($data,$tanah);

    $this->db->where('id', $id_desa);
    $qr = $this->db->get('tiger_desa');
    $rs = $qr->row_array();
    $data['desa_tanah'] = $rs['desa'];
    $this->db->where('id_tanah', $id_tanah);
        $data['pemilik'] = $this->db->get('pemilik_tanah')->result();
    $this->db->where('id', $id_kecamatan);
    $qr = $this->db->get('tiger_kecamatan');
    $rs = $qr->row_array();
    $data['kec_tanah'] = $rs['kecamatan'];

    $this->db->where('id', '19_5');
    $qr = $this->db->get('tiger_kota');
    $rs = $qr->row_array();
    $data['kab_tanah'] = $rs['kota'];
    $this->db->where('id_surat', $id);
        $data['saksi'] = $this->db->get('saksi_hak_guna_tanah')->result();
    // show_array($data);
    // exit();


    $this->db->where('id', $userdata['desa']);
    $qr = $this->db->get('tiger_desa')->row_array();
    $data['jenis_wilayah'] = $qr['jenis_wilayah'];

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


// simpan pemilik bagian barat
function barat_simpan(){

    $userdata = $this->session->userdata('desa_login');

    $post = $this->input->post();
    // show_array($post);
    $data['id_tanah'] = $this->session->userdata('tanah_id');
        $tgl_lahir = flipdate($post['tgl_lahir_posisi']);
        $data['umur'] = date_diff(date_create($tgl_lahir), date_create('today'))->y;
        $data['nama_pemilik_tanah'] = $post['nama_posisi'];
        $data['panjang'] = $post['panjang']; 
        $data['tempat_lahir'] = $post['tempat_lahir_posisi'];
        $data['pekerjaan'] = $post['pekerjaan_posisi'];
        $data['alamat'] = $post['alamat_posisi'];
        $data['jenis'] = $post['jenis'];
        $data['tgl_lahir'] = $tgl_lahir;
        $data['nik'] = $post['nik_posisi'];
        // show_array($data);
        // exit();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_posisi','Nama Pemilik','required');   
        

         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        
        
        // unset($post['bagian']);



       unset($post['id']); //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        // $userdata = $this->session->userdata('desa_login');
        
        $res = $this->db->insert('batas_barat', $data); 
        if($res){
            // echo $umur;
        // exit();
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


function timur_simpan(){

    $userdata = $this->session->userdata('desa_login');

    $post = $this->input->post();
    // show_array($post);
    $data['id_tanah'] = $this->session->userdata('tanah_id');
        $tgl_lahir = flipdate($post['tgl_lahir_posisi']);
        $data['umur'] = date_diff(date_create($tgl_lahir), date_create('today'))->y;
        $data['nama_pemilik_tanah'] = $post['nama_posisi'];
        $data['panjang'] = $post['panjang']; 
        $data['tempat_lahir'] = $post['tempat_lahir_posisi'];
        $data['pekerjaan'] = $post['pekerjaan_posisi'];
        $data['alamat'] = $post['alamat_posisi'];
        $data['jenis'] = $post['jenis'];
        $data['tgl_lahir'] = $tgl_lahir;
        $data['nik'] = $post['nik_posisi'];
        // show_array($data);
        // exit();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_posisi','Nama Pemilik','required');   
        

         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        
        
        // unset($post['bagian']);



       unset($post['id']); //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        // $userdata = $this->session->userdata('desa_login');
        
        $res = $this->db->insert('batas_timur', $data); 
        if($res){
            // echo $umur;
        // exit();
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

function selatan_simpan(){

    $userdata = $this->session->userdata('desa_login');

    $post = $this->input->post();
    // show_array($post);
    $data['id_tanah'] = $this->session->userdata('tanah_id');
        $tgl_lahir = flipdate($post['tgl_lahir_posisi']);
        $data['umur'] = date_diff(date_create($tgl_lahir), date_create('today'))->y;
        $data['nama_pemilik_tanah'] = $post['nama_posisi'];
        $data['panjang'] = $post['panjang']; 
        $data['tempat_lahir'] = $post['tempat_lahir_posisi'];
        $data['pekerjaan'] = $post['pekerjaan_posisi'];
        $data['alamat'] = $post['alamat_posisi'];
        $data['jenis'] = $post['jenis'];
        $data['tgl_lahir'] = $tgl_lahir;
        $data['nik'] = $post['nik_posisi'];
        // show_array($data);
        // exit();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_posisi','Nama Pemilik','required');   
        

         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        
        
        // unset($post['bagian']);



       unset($post['id']); //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        // $userdata = $this->session->userdata('desa_login');
        
        $res = $this->db->insert('batas_selatan', $data); 
        if($res){
            // echo $umur;
        // exit();
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
function utara_simpan(){

    $userdata = $this->session->userdata('desa_login');

    $post = $this->input->post();
    // show_array($post);
    $data['id_tanah'] = $this->session->userdata('tanah_id');
        $tgl_lahir = flipdate($post['tgl_lahir_posisi']);
        $data['umur'] = date_diff(date_create($tgl_lahir), date_create('today'))->y;
        $data['nama_pemilik_tanah'] = $post['nama_posisi'];
        $data['panjang'] = $post['panjang']; 
        $data['tempat_lahir'] = $post['tempat_lahir_posisi'];
        $data['pekerjaan'] = $post['pekerjaan_posisi'];
        $data['alamat'] = $post['alamat_posisi'];
        $data['jenis'] = $post['jenis'];
        $data['tgl_lahir'] = $tgl_lahir;
        $data['nik'] = $post['nik_posisi'];
        // show_array($data);
        // exit();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_posisi','Nama Pemilik','required');   
        

         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        
        
        // unset($post['bagian']);



       unset($post['id']); //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        // $userdata = $this->session->userdata('desa_login');
        
        $res = $this->db->insert('batas_utara', $data); 
        if($res){
            // echo $umur;
        // exit();
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



function tmp_barat_simpan(){

    $userdata = $this->session->userdata('desa_login');

    $post = $this->input->post();
    // show_array($post);
    
        $tgl_lahir = flipdate($post['tgl_lahir_posisi']);
        $data['umur'] = date_diff(date_create($tgl_lahir), date_create('today'))->y;
        $data['nama_pemilik_tanah'] = $post['nama_posisi'];
        $data['panjang'] = $post['panjang']; 
        $data['tempat_lahir'] = $post['tempat_lahir_posisi'];
        $data['pekerjaan'] = $post['pekerjaan_posisi'];
        $data['alamat'] = $post['alamat_posisi'];
        $data['jenis'] = $post['jenis'];
        $data['tgl_lahir'] = $tgl_lahir;
        $data['nik'] = $post['nik_posisi'];
        $data['temp_id_tanah'] = $post['temp_id_tanah'];
        // show_array($data);
        // exit();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_posisi','Nama Pemilik','required');   
        

         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        
        
        // unset($post['bagian']);



       unset($post['id']); //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        // $userdata = $this->session->userdata('desa_login');
        
        $res = $this->db->insert('batas_barat', $data); 
        if($res){
            // echo $umur;
        // exit();
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


function tmp_timur_simpan(){

    $userdata = $this->session->userdata('desa_login');

    $post = $this->input->post();
    // show_array($post);
    
            $tgl_lahir = flipdate($post['tgl_lahir_posisi']);
        $data['umur'] = date_diff(date_create($tgl_lahir), date_create('today'))->y;
        $data['nama_pemilik_tanah'] = $post['nama_posisi'];
        $data['panjang'] = $post['panjang']; 
        $data['tempat_lahir'] = $post['tempat_lahir_posisi'];
        $data['pekerjaan'] = $post['pekerjaan_posisi'];
        $data['alamat'] = $post['alamat_posisi'];
        $data['jenis'] = $post['jenis'];
        $data['temp_id_tanah'] = $post['temp_id_tanah'];
        $data['tgl_lahir'] = $tgl_lahir;
        $data['nik'] = $post['nik_posisi'];
        // show_array($data);
        // exit();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_posisi','Nama Pemilik','required');   
        

         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        
        
        // unset($post['bagian']);



       unset($post['id']); //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        // $userdata = $this->session->userdata('desa_login');
        
        $res = $this->db->insert('batas_timur', $data); 
        if($res){
            // echo $umur;
        // exit();
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

function tmp_selatan_simpan(){

    $userdata = $this->session->userdata('desa_login');

    $post = $this->input->post();
    // show_array($post);
    
            $tgl_lahir = flipdate($post['tgl_lahir_posisi']);
        $data['umur'] = date_diff(date_create($tgl_lahir), date_create('today'))->y;
        $data['nama_pemilik_tanah'] = $post['nama_posisi'];
        $data['panjang'] = $post['panjang']; 
        $data['tempat_lahir'] = $post['tempat_lahir_posisi'];
        $data['pekerjaan'] = $post['pekerjaan_posisi'];
        $data['alamat'] = $post['alamat_posisi'];
        $data['jenis'] = $post['jenis'];
        $data['temp_id_tanah'] = $post['temp_id_tanah'];
        $data['tgl_lahir'] = $tgl_lahir;
        $data['nik'] = $post['nik_posisi'];

        // show_array($data);
        // exit();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_posisi','Nama Pemilik','required');   
        

         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        
        
        // unset($post['bagian']);



       unset($post['id']); //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        // $userdata = $this->session->userdata('desa_login');
        
        $res = $this->db->insert('batas_selatan', $data); 
        if($res){
            // echo $umur;
        // exit();
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

function tmp_utara_simpan(){

    $userdata = $this->session->userdata('desa_login');

    $post = $this->input->post();
    // show_array($post);
    
            $tgl_lahir = flipdate($post['tgl_lahir_posisi']);
        $data['umur'] = date_diff(date_create($tgl_lahir), date_create('today'))->y;
        $data['nama_pemilik_tanah'] = $post['nama_posisi'];
        $data['panjang'] = $post['panjang']; 
        $data['tempat_lahir'] = $post['tempat_lahir_posisi'];
        $data['pekerjaan'] = $post['pekerjaan_posisi'];
        $data['alamat'] = $post['alamat_posisi'];
        $data['jenis'] = $post['jenis'];
        $data['temp_id_tanah'] = $post['temp_id_tanah'];
        $data['tgl_lahir'] = $tgl_lahir;
        $data['nik'] = $post['nik_posisi'];
        // show_array($data);
        // exit();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_posisi','Nama Pemilik','required');   
        

         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        
        
        // unset($post['bagian']);



       unset($post['id']); //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        // $userdata = $this->session->userdata('desa_login');
        
        $res = $this->db->insert('batas_utara', $data); 
        if($res){
            // echo $umur;
        // exit();
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


}

?>