<?php 

class pelepasan_tanah_model extends CI_Model {


	function pelepasan_tanah_model(){
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


		

		 
		 $this->db->where("desa_tanah", $kecamatan);


		 

		 if(!empty($nama_pemilik)) {
		 	$this->db->like("nama_pihak_pertama",$nama_pemilik);
		 }

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('pelepasann');
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

	


	


}

?>