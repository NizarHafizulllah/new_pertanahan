<?php 

class regis_kec_model extends CI_Model {


	function regis_kec_model(){
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
							"pembuat_pernyataan",
							"status"							 
		 	);


		

		 
		 $this->db->where("id_kecamatan", $kecamatan);

		 


		 

		 if(!empty($pembuat_pernyataan)) {
		 	$this->db->like("pembuat_pernyataan",$pembuat_pernyataan);
		 }

		 if(!empty($desa)) {
		 	$this->db->where("id_desa", $desa);
		 }

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('utama');
		// echo $this->db->last_query(); exit;
 		return $res;
	}


	


}

?>