

<?php 
class tanah extends desa_controller{
	var $controller;
	function tanah(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model('tanah_model','dm');
        $this->load->model("coremodel","cm");
		
		//$this->load->helper("serviceurl");
		
	}







function index(){
		$data_array=array();
        $userdata = $this->session->userdata('desa_login');
        $desa = $userdata['desa'];
        $data_array['arr_desa'] = array('' => '- Semua Desa - ', );
        // $data_array['arr_desa'] = $this->cm->arr_dropdown3("tiger_desa", "id", "desa", "desa", "id_kecamatan", $kecamatan);
        $content = $this->load->view($this->controller."_view",$data_array,true);

        $this->set_subtitle("Data Tanah");
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
        
       // show_array($result);

       
        $arr_data = array();
        foreach($result as $row) : 
        $id = $row['id'];
        
        


            
            $action = "<div class='btn-group'>
                              <button type='button' class='btn btn-primary'>Pending</button>
                              <button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown'>
                                <span class='caret'></span>
                                <span class='sr-only'>Toggle Dropdown</span>
                              </button>
                              <ul class='dropdown-menu' role='menu'>
                                <li><a href='#' onclick=\"approved('$id')\" ><i class='fa fa-trash'></i> Jual</a></li>
                                <li><a href='regis_kec/detail?id=$id'><i class='fa fa-edit'></i> Waris</a></li>
                              </ul>
                            </div>";
            
        
        	
       
        	 
        	$arr_data[] = array(
                $row['no_surat_terakhir'],
                $row['dusun_tanah'],
        		$row['guna_tanah'],
        		$row['kegiatan_terakhir'],     		 
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








}

?>