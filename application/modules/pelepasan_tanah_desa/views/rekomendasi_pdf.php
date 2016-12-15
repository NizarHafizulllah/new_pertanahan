
<?php 
$data_desa = $this->cm->get_data_desa();
//show_array($data_desa); exit;
?>
<html>
  <head>
    <title>
      <?php echo   $title; ?>
    </title>

 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/print_style.css"></head>

<body>

<!-- <div id="wrap" style="width:1024; margin:0px auto" >  -->


<style>
* {
  font-size:10px;
}
.judul {
  font-size:12px;
  font-weight:bold;
   text-align:center;
}

#gambar {
  width:50px;
  position:fixed;
  top:10px;
  float:left;
}

#kop {
  text-align:center;
}
</style>

<?php 
$userdata = $this->session->userdata('desa_login'); 
?>

<table width="100%" border="0" cellpadding="3">
  
  <tr>
    <td width="23%" align="center"><img src="<?php echo base_url()."assets/images/bangka_barat.png" ?>" width="50" height="60" align="right" /></td>
    <td width="54%" align="center"><p><span class="judul">PEMERINTAH KABUPATEN <?php echo $data_desa['kota'] ;?><br />
      KECAMATAN <?php echo $data_desa['kecamatan'] ;?><br><?php echo $data_desa['nama_lembaga']. " ".$data_desa['desa']; ?>
      <br />
      </span></p>
    </td>
    <td width="23%" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><hr /></td>
  </tr>

</table>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="100%" align="center"><span class="judul"><U>REKOMENDASI</U> </span></td>
  </tr>
  <tr>
    <td width="100%" align="center"><?php echo $no_surat ?></td>
  </tr>
</table>

<br/>&nbsp;

<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="100%" align="center"><span class="judul">TENTANG </span></td>
  </tr>
  <tr>
    <td width="100%" align="center"><span class="judul">PELEPASAN SEBAGIAN TANAH</span></td>
  </tr>
</table>
<br/>&nbsp;
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="100%" align="justify">Dengan ini kami sampaikan hal-hal sebagai berikut :</td>
  </tr>
</table>

<table width="100%" border="0" cellpadding="2">
 <?php 
 $no = 0;
 $no_romawi = range('a', 'z');
 if ($jumlah_pihak_pertama==1) {
 foreach ($dt_pihak_pertama as $row) {
  $no = $no+1;
    
      if($row['jk']=='p'&&$row['status_kawin']=='k'){
        $jenis_pasangan = '(mengetahui suami'.$row['nama_pasangan'].')';
      }else if ($row['jk']=='l'&&$row['status_kawin']=='k') {
        $jenis_pasangan = '(mengetahui istri'.$row['nama_pasangan'].')';
      }else{
        $jenis_pasangan = '';
      }
    ?>

   <tr>
     <td width="5%"><strong>&nbsp;</strong></td>
     <td width="25%">Nama</td>
     <td width="2%">:</td>
    <td width="68%" align="justify"><?php echo $row['nama'].' '.$jenis_pasangan; ?></td> 
    </tr>
   <tr>
     <td width="5%"><strong>&nbsp;</strong></td>
     <td width="25%">Tempat/Tgl lahir</td>
     <td width="2%">:</td>
    <td width="68%" align="justify"><?php echo $row['tempat_lahir'].', '.flipdate($row['tgl_lahir']) ?></td> 
   </tr>
    
   <tr>
     <td width="5%"><strong>&nbsp;</strong></td>
     <td width="25%">Pekerjaan</td>
     <td width="2%">:</td>
    <td width="68%" align="justify"><?php echo $row['pekerjaan'] ?></td> 
   </tr>
   <tr>
     <td width="5%"><strong>&nbsp;</strong></td>
     <td width="25%">No. KTP</td>
     <td width="2%">:</td>
    <td width="68%" align="justify"><?php echo $row['nik'] ?></td> 
   </tr>
   <tr>
     <td width="5%"><strong>&nbsp;</strong></td>
     <td width="25%">Alamat</td>
     <td width="2%">:</td>
    <td width="68%" align="justify"><?php echo $row['alamat'] ?>, Kelurahan/Desa <?php echo $row['nama_desa'] ?>, Kecamatan <?php echo $row['nama_kecamatan'] ?></td> 
   </tr>
  <?php } } else { 
    foreach ($dt_pihak_pertama as $row) {
  $no = $no+1;
  ?>
  <tr>
     <td width="5%"><strong><?php echo $no ?></strong></td>
     <td width="25%">Nama</td>
     <td width="2%">:</td>
    <td width="68%" align="justify"><?php echo $row['nama'] ?></td> 
    </tr>
   <tr>
     <td width="5%"><strong>&nbsp;</strong></td>
     <td width="25%">Tempat/Tgl lahir</td>
     <td width="2%">:</td>
    <td width="68%" align="justify"><?php echo $row['tempat_lahir'].', '.flipdate($row['tgl_lahir']) ?></td> 
   </tr> 
   <tr>
     <td width="5%"><strong>&nbsp;</strong></td>
     <td width="25%">Pekerjaan</td>
     <td width="2%">:</td>
    <td width="68%" align="justify"><?php echo $row['pekerjaa'] ?></td> 
   </tr>
   <tr>
     <td width="5%"><strong>&nbsp;</strong></td>
     <td width="25%">No. KTP</td>
     <td width="2%">:</td>
    <td width="68%" align="justify"><?php echo $row['nik'] ?></td> 
   </tr>
   <tr>
     <td width="5%"><strong>&nbsp;</strong></td>
     <td width="25%">Alamat</td>
     <td width="2%">:</td>
    <td width="68%" align="justify"><?php echo $row['alamat'] ?>, Kelurahan/Desa <?php echo $row['nama_desa'] ?>, Kecamatan <?php echo $row['nama_kecamatan'] ?></td> 
   </tr>
  <?php
    
    }
   } ?>


</table>

<br/>&nbsp;
<br/>&nbsp;


<table width="100%" border="0" cellpadding="3">
  <tr>
    <td colspan="2" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berdasarkan surat tanah yang dimiliki </td>
  </tr>
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="96%" align="justify">
    <table width="100%" border="0">
      <?php $no = -1;
        $alphabet = range('a', 'z');
        foreach ($dt_surat as $row) {
        $no =$no+1;
        ?>
        <tr>
         <td width="3%" height="24"><?php echo $alphabet[$no]; ?>. </td>
        <td width="97%" align="justify"><?php echo $row['surat']; ?></td>
  </tr>
  <?php } ?>
  </table>
  


       <table width="100%" border="0">
         <tr>
         <td width="4%">&nbsp;</td>
           <td width="92%">Bermaksud hendak menyelesaikan Surat Penyerahan / Pelepasan Sebagian Tanah hak miliknya berikut segala tanaman tumbuh ang ada di tanah tersebut yang terletak di <?php echo $wilayah ?> sebagaimana surat tanah terlampir dengan ukuran sebagai berikut </td>
         </tr>
       </table>
       <table width="100%" border="0">
         <tr>
         <td width="4%">&nbsp;</td>
           <td width="30%">Utara</td>
           <td width="2%">:</td>
           <td width="65%"><?php echo $panjang_batas_utara.' berbatas dengan '.$nama_batas_utara ?></td>
         </tr>
         <tr>
         <td width="4%">&nbsp;</td>
           <td width="30%">Timur</td>
           <td width="2%">:</td>
           <td width="65%"><?php echo $panjang_batas_timur.' berbatas dengan '.$nama_batas_timur ?></td>
         </tr>
         <tr>
         <td width="4%">&nbsp;</td>
           <td width="30%">Selatan</td>
           <td width="2%">:</td>
           <td width="65%"><?php echo $panjang_batas_selatan.' berbatas dengan '.$nama_batas_selatan ?></td>
         </tr>
         <tr>
         <td width="4%">&nbsp;</td>
           <td width="30%">Barat</td>
           <td width="2%">:</td>
           <td width="65%"><?php echo $panjang_batas_barat.' berbatas dengan '.$nama_batas_barat ?></td>
         </tr>
       </table>    </td>
  </tr>
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="96%" align="justify">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">Kepada seseorang yang mengaku bernama : </td>
    <?php if ($biaya_ganti_rugi!=0.00) {
      $spasi = ''
      ?>
    <?php }else{ 
          $spasi = '<br/>&nbsp;<br/>&nbsp;'
      ?>
    <?php      } ?>
  </tr>
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="96%" align="justify"><table width="100%" border="0">
      <tr>
        <td width="29%">Nama</td>
        <td width="2%">:</td>
        <td width="69%"><?php echo $nama_pihak_kedua; ?></td>
      </tr>
      <tr>
        <td width="29%">Tempat / Tgl. Lahir </td>
        <td width="2%">:</td>
        <td width="69%"><?php echo flipdate($tgl_lahir_pihak_kedua); ?></td>
      </tr>
      <tr>
        <td width="29%">Pekerjaan</td>
        <td width="2%">:</td>
        <td width="69%"><?php echo $pekerjaan_pihak_kedua ?></td>
      </tr>
      <tr>
        <td width="29%">Nomor KTP </td>
        <td width="2%">:</td>
        <td width="69%">&nbsp;</td>
      </tr>
      <tr>
        <td>Alamat </td>
        <td>: </td>
        <td><?php echo $alamat_pihak_kedua ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="96%" align="justify">&nbsp;</td>
  </tr>
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="96%" align="justify">yang diberikan / dilepaskan dengan ganti rugi sebesar : Rp <?php echo $biaya_ganti_rugi; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="justify">Demikian surat rekomendasi ini dibuat untuk dapat diteruskan ke Kantor Camat <?php echo $data_desa['kecamatan'];  ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="50%">&nbsp;</td>
    <td width="50%"><div align="center"><?php echo ucwords(strtolower($data_desa['desa'])).', '.tgl_indo(flipdate($tanggal)); ?></div></td>
  </tr>
  <tr>
    <td rowspan="5" valign="top">&nbsp;</td>
    <td><div align="center">
      <?php 
	  echo $data_desa['jabatan'];
	/*if($data_desa['jenis_wilayah']=="desa"){
		echo "Kepala Desa ". ucwords(strtolower($desa_tanah));
	}
	else {
	echo "Lurah ". ucwords(strtolower($desa_tanah));
	}
	*/
	?>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><u><?php echo $nama_kades; ?></u></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td align="center"><?php 
		if($data_desa['jenis_wilayah'] == "kelurahan"){
			echo  $data_desa['pangkat'];
		}
	?></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td align="center"><?php 
		if($data_desa['jenis_wilayah'] == "kelurahan"){
			echo "NIP. ".$data_desa['nip'];
		}
	?></td>
  </tr>
</table>
<p><br/>
  &nbsp;
  <br/>
  &nbsp;
  <!-- 
      RIDUAN ZAHRI, S.Sos
      Pembina 
               NIP.19621104 198303 1 004 -->
  
  <!-- </div> end of wrap -->
</p>
</body>


</html>