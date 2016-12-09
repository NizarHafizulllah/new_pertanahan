<?php 

class kecamatan_model_desa extends CI_Model {


	function kecamatan_model_desa(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"id",
							"pengguna",
							"desa",
							"nama"							 
		 	);


		
		 $this->db->select('admin.*, admin.id as id, admin.username as pengguna, k.desa as desa,');
		 $this->db->from('admin_desa admin');
		 $this->db->join('tiger_desa k','admin.desa = k.id');
		 
		 

		 $this->db->where('kecamatan', $kecamatan);
		 

		 if(!empty($pengguna)) {
		 	$this->db->like("admin.username",$pengguna);
		 }

		 if(!empty($desa)) {
		 	$this->db->like("tiger_desa.desa",$desa);
		 }

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('');
		// echo $this->db->last_query(); exit;
 		return $res;
	}


	


}

?>