<?php 

class pelepasan_tanah_model extends CI_Model {


	function pelepasan_tanah_model(){
		parent::__construct();
	}

	function datawilayah($id, $table, $condition, $nama){
        $this->db->select($nama);
        $this->db->where($id, $condition);
        $this->db->order_by($nama);
        $rs = $this->db->get($table);
        return $rs;

    }


 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 

		 $kolom = array(0=>	"id",
		 					"nama_pihak_pertama",
		 					"nama_pihak_kedua",
							"no_surat",
							"desa",
							"kecamatan"							 
		 	);

		 $this->db->select('p.*, ds.desa as nm_desa');

		 	$this->db->from("pelepasan p");
		 	$this->db->join('tiger_desa ds','p.desa=ds.id','left');
		 	
		 	
		

		 
		 $this->db->where("p.desa", $id_desa);


		 

		 if(!empty($nama_pihak_pertama)) {
		 	$this->db->like("p.nama_pihak_pertama",$nama_pihak_pertama);
		 }

		 if(!empty($nama_pihak_kedua)) {
		 	$this->db->like("p.nama_pihak_kedua",$nama_pihak_kedua);
		 }

		 if(!empty($no_surat)) {
		 	$this->db->like("p.no_surat",$no_surat);
		 }
		 if(!empty($desa)) {
		 	$this->db->like("p.desa",$desa);
		 }


		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		// echo $this->db->last_query(); exit;
 		return $res;
	}




function get_surat_detail($id){

	$this->db->select(
		't.* '
		)->from('surat_pelepasan t');
	$this->db->where("t.id",$id);
	$res = $this->db->get();
	return $res->row_array();
}


function get_pihak_pertama_detail($id){

	$this->db->select(
		't.* '
		)->from('pelepasan_pihak_pertama t');
	$this->db->where("t.id",$id);
	$res = $this->db->get();
	return $res->row_array();
}


function get_saksi_detail($id){

	$this->db->select(
		't.* '
		)->from('saksi_pelepasan t');
	$this->db->where("t.id",$id);
	$res = $this->db->get();
	return $res->row_array();
}

	 function temp_get_surat($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 

		 $kolom = array(0=>	"id",
		 					"temp_id_surat",
		 												 
		 	);


		

		 
		 $this->db->where("temp_id_surat", $temp_id_surat);


		 

		

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('surat_pelepasan');
		// echo $this->db->last_query(); exit;
 		return $res;
	}

	function get_surat($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 

		 $kolom = array(0=>	"id",
		 					"id_surat",
		 												 
		 	);


		

		 
		 $this->db->where("id_surat", $id_surat);


		 

		

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('surat_pelepasan');
		// echo $this->db->last_query(); exit;
 		return $res;
	}


function get_pihak_pertama($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 

		 $kolom = array(0=>	"id",
		 					"id_surat",
		 												 
		 	);


		

		 
		 $this->db->where("id_surat", $id_surat);


		 

		

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('pelepasan_pihak_pertama');
		// echo $this->db->last_query(); exit;
 		return $res;
	}



 function get_saksi($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 

		 $kolom = array(0=>	"id",
		 					"id_surat",
		 												 
		 	);


		

		 
		 $this->db->where("id_pelepasan", $id_surat);


		 

		

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('saksi_pelepasan');
		// echo $this->db->last_query(); exit;
 		return $res;
	}


function temp_get_saksi($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 

		 $kolom = array(0=>	"id",
		 					"temp_id_surat",
		 												 
		 	);


		

		 
		 $this->db->where("temp_id_surat", $temp_id_surat);


		 

		

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('saksi_pelepasan');
		// echo $this->db->last_query(); exit;
 		return $res;
	}


function temp_get_pihak_pertama($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 

		 $kolom = array(0=>	"id",
		 					"nama",
		 					"alamat",
		 					"umur",

		 												 
		 	);


		

		 
		 $this->db->where("temp_id_surat", $temp_id_surat);


		 

		

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('pelepasan_pihak_pertama');
		// echo $this->db->last_query(); exit;
 		return $res;
	}	


	function data_pihak_pertama($id){
		 $this->db->select('p.*, ds.desa as nama_desa, kc.kecamatan as nama_kecamatan, kt.kota as nama_kota' );

		 	$this->db->from("pelepasan_pihak_pertama p");
		 	$this->db->join('tiger_desa ds','p.id_desa=ds.id','left');
		 	$this->db->join('tiger_kecamatan kc','p.id_kecamatan=kc.id','left');
		 	$this->db->join('tiger_kota kt','p.id_kota=kt.id','left');
		 	
		 	
		

		 
		 $this->db->where("p.id_surat", $id);

		 $res = $this->db->get();
		 return $res;
	}
	
// temp_get_pihak_pertama

}

?>