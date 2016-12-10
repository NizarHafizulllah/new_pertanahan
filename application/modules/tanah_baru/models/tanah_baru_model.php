<?php 

class tanah_baru_model extends CI_Model {


	function tanah_baru_model(){
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


		

		 
		 $this->db->where("desa_tanah", $desa);


		 

		 if(!empty($nama_pemilik)) {
		 	$this->db->like("nama_pemilik",$nama_pemilik);
		 }

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('tanah');
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


	


}

?>