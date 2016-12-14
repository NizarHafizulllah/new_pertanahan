<?php
class coremodel extends CI_Model {
        function coremodel() {
                parent::__construct();
        }
        
var $arr_bulan = array(1=>"JANUARI","FEBRUARI","MARET","APRIL","MEI","JUNI","JULI",
  "AGUSTUS","SEPTERMBER","OKTOBER","NOVEMBER","DESEMBER");


        function get_arr_leasing(){
                // get data leasing
                $data['method']='get_data_leasing';
                $url = service_url($data);
                
                $xml = file_get_contents($url);
                $arr = xml_to_array($xml);
                echo "<pre>";
                print_r($arr);
                echo "</pre>";
        }

  var  $arr_status =  array(
            0=>"Pilih Status",
            "Level 2",
            "Menunggu Blokir",
            "Gagal Blokir",
            "Berhasil Blokir");

  var  $arr_status2 =  array(
            0=>"- SEMUA STATUS - ",
            "Level 2",
            "Menunggu Blokir",
            "Gagal Blokir",
            "Berhasil Blokir");

function arr_dropdown($vTable, $vINDEX, $vVALUE, $vORDERBY){
    $this->db->order_by($vORDERBY);
    $res  = $this->db->get($vTable);

    $ret = array();
    foreach($res->result_array() as $row) : 
            $ret[$row[$vINDEX]] = $row[$vVALUE];
    endforeach;
    return $ret;

}



        function arr_dropdown2($vTable, $vINDEX, $vVALUE, $vORDERBY, $vCONDITION, $vWHERE){
                $this->db->where($vCONDITION, $vWHERE);
                $this->db->where('level', 3);
                $this->db->order_by($vORDERBY);
                $res  = $this->db->get($vTable);
        //echo $this->db->last_query(); exit;

                $ret = array();
                foreach($res->result_array() as $row) : 
                        $ret[$row[$vINDEX]] = $row[$vVALUE];
                endforeach;
                return $ret;

        }

        function arr_dropdown3($vTable, $vINDEX, $vVALUE, $vORDERBY, $vCONDITION, $vWHERE){
                $this->db->where($vCONDITION, $vWHERE);
                $this->db->order_by($vORDERBY);
                $res  = $this->db->get($vTable);
        //echo $this->db->last_query(); exit;

                $ret = array(''=>'Pilih Satu');

                foreach($res->result_array() as $row) : 
                        $ret[$row[$vINDEX]] = $row[$vVALUE];
                endforeach;
                return $ret;

        }


        

        function arr_level() {
                $arr = array(1=>"Level 1","Level 2","Level 3");
                return $arr;
        }


  // function arr_dropdown($vTable, $vINDEX, $vVALUE, $vORDERBY){
  //               $this->db->order_by($vORDERBY);
  //               $res  = $this->db->get($vTable);
  //       //echo $this->db->last_query(); exit;

  //               $ret = array();
  //               foreach($res->result_array() as $row) : 
  //                       $ret[$row[$vINDEX]] = $row[$vVALUE];
  //               endforeach;
  //               return $ret;

  //       }

function umur($tanggal) {
    $from = new DateTime($tanggal);
    $to   = new DateTime('today');
    return $from->diff($to)->y;
}

}
?>
