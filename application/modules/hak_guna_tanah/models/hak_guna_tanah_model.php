<?php 

class hak_guna_tanah_model extends CI_Model {


	function hak_guna_tanah_model(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 

		 $kolom = array(0=>	"id",
		 					"tgl_register_desa",
		 					"no_register_desa",
							"nama_pemilik",
							"status"							 
		 	);


		

		 
		 $this->db->where("id_desa", $desa);
		 if (!empty($pembuat_pernyataan)) {
		 	$this->db->where("pembuat_pernyataan", $pembuat_pernyataan);
		 }


		 

		 // if(!empty($nama_pemilik)) {
		 // 	$this->db->like("nama_pemilik",$nama_pemilik);
		 // }

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('utama');
		// echo $this->db->last_query(); exit;
 		return $res;
	}

function get_pemilik_detail($id){

	$this->db->select(
		't.* '
		)->from('pemilik_tanah t');
	$this->db->where("t.id",$id);
	$res = $this->db->get();
	return $res->row_array();
}

function get_saksi_detail($id){

	$this->db->select(
		't.* '
		)->from('saksi_hak_guna_tanah t');
	$this->db->where("t.id",$id);
	$res = $this->db->get();
	return $res->row_array();
}

	 function temp_get_saksi($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 

		 $kolom = array(0=>	"id",
		 					"temp_tanah_id",
		 												 
		 	);


		

		 
		 $this->db->where("temp_id_surat", $temp_tanah_id);


		 
		

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('saksi_hak_guna_tanah');
		// echo $this->db->last_query(); exit;
 		return $res;
	}

	 function temp_get_pemilik($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 

		 $kolom = array(0=>	"id",
		 					"temp_tanah_id",
		 												 
		 	);


		

		 
		 $this->db->where("temp_id_tanah", $temp_tanah_id);


		 
		

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('pemilik_tanah');
		// echo $this->db->last_query(); exit;
 		return $res;
	}

	 function temp_get_posisi($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 

		 $kolom = array(0=>	"id",
		 					"temp_tanah_id",
		 												 
		 	);


		

		 
		 $this->db->where("temp_id_tanah", $temp_tanah_id);


		 

		

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('batas_barat');
		// echo $this->db->last_query(); exit;
 		return $res;
	}


 function temp_get_posisi_timur($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 

		 $kolom = array(0=>	"id",
		 					"temp_tanah_id",
		 												 
		 	);


		

		 
		 $this->db->where("temp_id_tanah", $temp_tanah_id);


		 

		

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('batas_timur');
		// echo $this->db->last_query(); exit;
 		return $res;
	}

	function temp_get_posisi_selatan($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 

		 $kolom = array(0=>	"id",
		 					"temp_tanah_id",
		 												 
		 	);


		

		 
		 $this->db->where("temp_id_tanah", $temp_tanah_id);


		 

		

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('batas_selatan');
		// echo $this->db->last_query(); exit;
 		return $res;
	}

	function temp_get_posisi_utara($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 

		 $kolom = array(0=>	"id",
		 					"temp_tanah_id",
		 												 
		 	);


		

		 
		 $this->db->where("temp_id_tanah", $temp_tanah_id);


		 

		

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('batas_utara');
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


		

		 
		 $this->db->where("id_surat", $id_surat);


		 

		

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('saksi_hak_guna_tanah');
		// echo $this->db->last_query(); exit;
 		return $res;
	}

	function get_pemilik($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 

		 $kolom = array(0=>	"id",
		 					"tanah_id",
		 												 
		 	);


		

		 
		 $this->db->where("id_tanah", $tanah_id);


		 

		

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('pemilik_tanah');
		// echo $this->db->last_query(); exit;
 		return $res;
	}

function get_posisi_timur($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 

		 $kolom = array(0=>	"id",
		 					"id_tanah",
		 												 
		 	);


		

		 
		 $this->db->where("id_tanah", $id_tanah);


		 

		

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('batas_timur');
		// echo $this->db->last_query(); exit;
 		return $res;
	}


function get_posisi_selatan($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 

		 $kolom = array(0=>	"id",
		 					"id_tanah",
		 												 
		 	);


		

		 
		 $this->db->where("id_tanah", $id_tanah);


		 

		

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('batas_selatan');
		// echo $this->db->last_query(); exit;
 		return $res;
	}


function get_posisi_barat($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 

		 $kolom = array(0=>	"id",
		 					"id_tanah",
		 												 
		 	);


		

		 
		 $this->db->where("id_tanah", $id_tanah);


		 

		

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('batas_barat');
		// echo $this->db->last_query(); exit;
 		return $res;
	}



function get_posisi_utara($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 

		 $kolom = array(0=>	"id",
		 					"id_tanah",
		 												 
		 	);


		

		 
		 $this->db->where("id_tanah", $id_tanah);


		 

		

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('batas_utara');
		// echo $this->db->last_query(); exit;
 		return $res;
	}


	


}

?>