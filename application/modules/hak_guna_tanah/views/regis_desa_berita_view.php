<html>
  <head>
    <title>
      <?php echo   $title; ?>
    </title>

 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/print_style.css">
</head>

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

<?php $userdata = $this->session->userdata('desa_login'); 
$data_desa = $this->cm->get_data_desa();

// if($data_desa['jenis_wilayah'] == "kelurahan"){
//   $jenis_wilayah = ""
// }

?>

<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="23%" align="center"><img src="<?php echo base_url()."assets/images/bangka_barat.png"; ?>" width="50" height="60" align="right" /></td>
    <td width="54%" align="center"><p><span class="judul">PEMERINTAH KABUPATEN <?php echo $kab_tanah; ?><br />
      KECAMATAN <?php echo $kec_tanah; ?><br />
       <?php echo $data_desa['nama_lembaga'] . " ".$desa_tanah; ?></span></p>
      </td>
    <td width="23%" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><hr /></td>
  </tr>
</table>

<!-- <table width="100%">
  <tr>
    <td height="39"><div align="center"><strong>BERITA ACARA</strong><br/>
        <u><strong>PEMERIKSAAN FISIK BIDANG TANAH</strong></u><strong><br />
    NO :  <strong> </div></td>
  </tr>
</table> -->
<table width="100%" border="0">
  <tr>
    <td><div align="center"><strong>BERITA ACARA<br/>
          <u>PEMERIKSAAN FISIK BIDANG TANAH</u><br/>
    NO : </strong><strong><?php echo $no_berita_acara_desa; ?></strong></div></td>
  </tr>
</table>


<br/>
<br/>

<table width="100%">
<tr>
  <td width="98%" height="24" align="justify"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada tanggal <?php echo tgl_indo(flipdate($tgl_register_desa)); ?> telah dilakukan pengukuran atas sebidang tanah yang terletak di <?php echo $jln_tanah." ". " RT ". $rt_tanah. " RW ". $rw_tanah." ".$dusun_tanah. " ".   ucwords($data_desa['jenis_wilayah'])." ".ucwords(strtolower($desa_tanah)).' Kecamatan '.ucwords(strtolower($kec_tanah)).' Kabupaten '.ucwords(strtolower($kab_tanah)); ?> dilakukan pemeriksaan atas fisik tanah berdasarkan permohonan dari : </p></td>
</tr>
</table>

<br/>
<br/> 

    <table width="100%">
    <?php foreach ($pemilik as $row) {
      
     ?>
	     <tr>
        <td width="3%" >&nbsp;</td>
      <td width="22%" >Nama</td>
      <td width="75%">: <?php echo $row->nama; ?> </td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >Tempat Tanggal Lahir</td>
        <td>: <?php echo $row->tempat_lahir.', '.tgl_indo(flipdate($row->tgl_lahir)); ?> </td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >Pekerjaan</td>
        <td>: <?php echo $row->pekerjaan; ?></td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >No. KTP</td>
        <td>: <?php echo $row->nik; ?></td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >Alamat/Tempat Tinggal</td>
        <td>: <?php echo $row->alamat; ?></td>
      </tr>
      <?php } ?>
    </table>

<br/>
<br/>
<table width="100%">
  <tr>
    <td width="98%" height="24" align="justify"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bahwa setelah dilakukan pemeriksaan dan pengukuran yang di saksikan masing - masing sebelah menyebelah membenarkan tanah yang diakui oleh <strong><?php echo $pembuat_pernyataan; ?></strong> tidak bermasalah (sengketa). Dengan ukuran dan  batas - batas sebagai berikut.</p></td>
  </tr>
</table>
<br/>
<br/>
<table width="100%" border="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="22%">Sebelah Utara</td>
    <td width="75%">:  <?php echo $panjang_batas_utara.' berbatasan dengan tanah '.$nama_batas_utara; ?> </td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>Sebelah Timur</td>
    <td>:  <?php echo $panjang_batas_timur.' berbatasan dengan tanah '.$nama_batas_timur; ?> </td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>Sebelah Selatan</td>
    <td>:  <?php echo $panjang_batas_selatan.' berbatasan dengan tanah '.$nama_batas_selatan; ?> </td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td width="22%">Sebelah Barat</td>
    <td width="75%">:  <?php echo $panjang_batas_barat.' berbatasan dengan tanah '.$nama_batas_barat; ?> </td>
  </tr>
</table>
<br/>
<br/>
<table width="100%">
  <tr>
    <td width="98%" height="24" align="justify"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dan ternyata apabila tidak benar serta ada gugatan dan tuntutan dari pihak lain atas tanah tersebut maka saya bersedia dituntut/dihukum oleh yang berwajib.</p></td>
  </tr>
</table>
<br/>
<br/>
<table width="100%">
  <tr>
    <td width="98%" height="24" align="justify"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian berita acara ini kami buat untuk dapat dipergunakan sebagaimana mestinya.</p></td>
  </tr>
</table>
<br/>
<br/>


<table width="100%" border="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="25%">Di Ukur Oleh :</td>
    <td width="14%">&nbsp;</td>
    <td width="16%">&nbsp;</td>
    <td width="42%">Pemilik Tanah</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><?php echo $jabatan_pengukur_satu; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?php echo $nama_pengukur_satu ?></td>
    <td>( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;)</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><?php echo $jabatan_pengukur_dua ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?php echo $nama_pengukur_dua ?></td>
    <td>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;)</td>
    <td>&nbsp;</td>
    <td><?php echo $pembuat_pernyataan ?> </td>
  </tr>
</table>
<p><br/>
  <br/>
</p>
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="50%">Saksi Perbatasan</td>
    <td width="50%"><div align="center"><?php echo ucwords(strtolower($desa_tanah)).', '.tgl_indo(flipdate($tgl_berita_acara)); ?></div></td>
  </tr>
  <tr>
    <td rowspan="5" valign="top"><table width="91%" border="0" cellpadding="0">
      <?php $no = 0;
foreach ($saksi as $row) {
  $no =$no+1;
  if($no % 2 <> 0) {
  	$kanan = "";
	$kiri = "$no ..................";
  }
  else {
  	$kiri = "";
	$kanan = "$no ..................";
  }
 ?>
      
      <tr>
        <td width="5%"><?php echo $no; ?>. </td>
        <td width="40%"><?php echo $row->nama; ?></td>
        <td width="28%" align="left"><?php echo $kiri ?></td>
        <td width="27%" align="right"><?php echo $kanan ?></td>
      </tr>
      
      <?php } ?>
      
    </table></td>
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
			echo  $pangkat_kades;
		}
	?></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td align="center"><?php 
		if($data_desa['jenis_wilayah'] == "kelurahan"){
			echo "NIP. ".$nip_kades;
		}
	?></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br/>
  <!--<br/>
</p>
<table width="100%" border="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="55%">Saksi Perbatasan</td>
    <td width="42%">&nbsp;</td>
  </tr>
</table>

<table width="100%" border="1">
<?php $no = 0;
foreach ($saksi as $row) {
  $no =$no+1;
 ?>
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="2%"><?php echo $no; ?>. </td>
    <td width="23%"><?php echo $row->nama; ?></td>
    <td width="30%">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
    <?php if ($no==1) { ?>
      <td width="42%">Kepala Desa <?php echo $desa_tanah; ?></td>
    <?php } ?>
    
  </tr>
  <?php } ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><br /><br /><br /><br /></td>
  </tr>
</table>-->
<!-- </div> end of wrap -->
</body>

</html>
