<?php 

class admin_add_kecamatan_model extends CI_Model {


	function admin_add_kecamatan_model(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"id",
							"pengguna",
							"kecamatan"							 
		 	);


		
		 $this->db->select('admin.*, admin.id as id, admin.username as pengguna, k.kecamatan as kecamatan,');
		 $this->db->from('admin_kecamatan admin');
		 $this->db->join('tiger_kecamatan k','admin.kecamatan = k.id');
		 
		 


		 

		 if(!empty($pengguna)) {
		 	$this->db->like("admin.username",$pengguna);
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