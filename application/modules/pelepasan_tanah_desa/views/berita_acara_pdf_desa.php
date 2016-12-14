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

<?php $userdata = $this->session->userdata('kec_login'); 
?>

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
          <u>PEMERIKSAAN FISIK BIDANG TANAH</u><br/></strong></div></td>
  </tr>
</table>


<br/>
<br/>

<table width="100%">
<tr>
  <td width="98%" height="24" align="justify"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada tanggal <?php echo tgl_indo(flipdate($tanggal)); ?> telah dilakukan pengukuran ulang sebidang tanah yang terletak di <?php echo $wilayah.' Desa '.$desa.' Kecamatan '.$kecamatan.' Kabupaten '.$kabupaten; ?> dilakukan pemeriksaan atas fisik tanah berdasarkan permohonan dari : </p></td>
</tr>
</table>


    <table width="100%">
    <?php foreach ($dt_pihak_pertama as $row) {
      
     ?>
	     <tr>
        <td width="3%" >&nbsp;</td>
      <td width="22%" >Nama</td>
      <td width="75%">: <?php echo $row['nama']; ?> </td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >Tempat Tanggal Lahir</td>
        <td>: <?php echo $row['tempat_lahir'].', '.tgl_indo(flipdate($row['tgl_lahir'])); ?> </td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >Pekerjaan</td>
        <td>: <?php echo $row['pekerjaan']; ?></td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >No. KTP</td>
        <td>: <?php echo $row['nik']; ?></td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >Alamat/Tempat Tinggal</td>
        <td>: <?php echo $row['alamat'] ?>, Kelurahan/Desa <?php echo $row['nama_desa'] ?>, Kecamatan <?php echo $row['nama_kecamatan'] ?>, Kabupaten/Kota <?php echo $row['nama_kota'] ?></td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <?php } ?>
    </table>

<br/>
<br/>
<table width="100%">
  <tr>
    <td width="98%" height="18" align="justify"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Batas-batas ditunjuk oleh pemilik tanah dan tetangga yang berbatasan :.</p></td>
  </tr>
</table>
<br/>
<br/>
<table width="100%">
<?php 
  $no = 0;
foreach ($dt_perbatasan as $row) {
  $no = $no+1;

?>
  <tr>
    <td width="2%" height="18">&nbsp;</td>
    <td width="4%" height="18"><?php echo $no; ?>.</td>
    <td width="28%"><?php echo $row['nama']; ?></td>
    <td width="66%">(tetangga yang berbatasan)</td>
  </tr>
 <?php } ?> 
</table>
<br/>
<br/>
<table width="100%">
  <tr>
    <td width="98%" height="18" align="justify"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Setelah diadakan pengukuran, hasilnya sebagai berikut :.</p></td>
  </tr>
</table>

<table width="100%" border="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="22%">Sebelah Utara</td>
    <td width="75%">: <?php echo $panjang_batas_utara.' berbatasan dengan '.$nama_batas_utara; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Sebelah Selatan</td>
    <td>: <?php echo $panjang_batas_selatan.' berbatasan dengan '.$nama_batas_selatan; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Sebelah Timur</td>
    <td>: <?php echo $panjang_batas_timur.' berbatasan dengan '.$nama_batas_timur; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="22%">Sebelah Barat</td>
    <td width="75%">: <?php echo $panjang_batas_barat.' berbatasan dengan '.$nama_batas_barat; ?> </td>
  </tr>
</table>
<br/>
<br/>
<table width="100%">
  <tr>
    <td width="98%" height="18" align="justify"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menurut pengakuan/keterangan yang bersangkutan dan saksi-saksi bahwa memang benar tanah tersebut milik <strong><?php 
    foreach ($dt_pihak_pertama as $row) {
      echo $row['nama'].', '; } ?></strong>dan sampai sekarang tanah tersebut tidak bermasalah serta tidak ada gugatan dari pihak lain (tidak dalam sengketa).</p></td>
  </tr>
</table>
<br/>
<br/>
<table width="100%">
  <tr>
    <td width="98%" height="18" align="justify"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian berita acara pengukuran ini dibuat dengan sebenar-benarnya.</p></td>
  </tr>
</table>
<br/>
<br/>

<?php if($jumlah_pihak_pertama<=1){ ?>
<table width="100%" border="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="25%" align="center">Di Ukur Oleh :</td>
    <td width="14%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="57%" align="center">Pemilik Tanah</td>
  </tr>
<?php  foreach($dt_pihak_pertama as $row){
  ?>
<tr>
    <td>&nbsp;</td>
    <td colspan="2"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><strong><?php echo $pengukur; ?></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><?php echo $row['nama']; ?> </td>
  </tr>
<?php } ?>
<?php }else{ ?>
<table width="100%" border="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="25%" align="center">Di Ukur Oleh :</td>
    <td width="14%">&nbsp;</td>
    <td colspan="2" align="center">Pemilik Tanah</td>
  </tr>

<?php foreach($dt_pihak_pertama as $row){ ?>
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="25%" align="center">&nbsp;</td>
    <td width="14%">&nbsp;</td>
    <td width="10%" align="left"><?php echo $row['nama'] ?></td>
    <td width="28%" align="right">.........................</td>
  </tr>  

<?php } ?>
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="25%" align="center"><?php echo $pengukur ?></td>
    <td width="14%">&nbsp;</td>
    <td width="10%" align="left">&nbsp;</td>
    <td width="28%" align="right">&nbsp;</td>
  </tr>  
</table>
<?php } ?>
<!-- <table width="100%" border="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="25%" align="center">Di Ukur Oleh :</td>
    <td width="14%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="57%" align="center">Pemilik Tanah</td>
  </tr> -->
 <!--  <?php  
  if($jumlah_pihak_pertama<=1){
      foreach($dt_pihak_pertama as $row){
  ?> -->
 <!--  <tr>
    <td>&nbsp;</td>
    <td colspan="2"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr> -->
  <!-- <tr>
    <td>&nbsp;</td>
    <td align="center"><strong><?php echo $pengukur; ?></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><?php echo $row['nama']; ?> </td>
  </tr> -->
  <!-- <?php } }else{ 
    foreach($dt_pihak_pertama as $row){
  ?>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php echo $row['nama']; ?></td>
  </tr>
  

  
  


  <?php } ?> 
  <tr>
    <td>&nbsp;</td>
    <td align="center"><strong><?php echo $pengukur; ?></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp; </td>
  </tr>
  <?php } ?>
</table> -->
<br/>

<table width="100%" border="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="55%"><u>Saksi saksi</u></td>
    <td width="42%">&nbsp;</td>
  </tr>
</table>

<table width="100%" border="0">
<?php $no = 0;
foreach ($dt_saksi_pengukuran as $row) {
  $no =$no+1;
 ?>
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="2%"><?php echo $no; ?>. </td>
    <?php if($row['jenis']=='t'){ ?>

    <td width="35%"><?php echo $row['nama']; ?></td>


   <?php }else{ ?>
      <td width="35%"><?php echo $row['nama'].' ('.$row['sebagai'].') '; ?></td>
  <?php } ?>
    
    
   
      <td width="42%">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
   
    
  </tr>
  <?php } ?>
  
</table>
<br/>&nbsp;
<br/>&nbsp;
<table width="100%" border="0">
<tr>
    <td width="100%" align="center">Mengetahui</td>
  </tr>
  <tr>
    <td width="100%" align="center">Kepala Desa/Lurah <?php echo $desa; ?></td>
  </tr>
  <tr>
    <td width="100%">&nbsp;</td>
  </tr>
  <tr>
    <td width="100%">&nbsp;</td>
  </tr>
  <tr>
    <td width="100%">&nbsp;</td>
  </tr>
  <tr>
    <td width="100%" align="center"><?php echo $nama_kades; ?></td>
  </tr>
</table>
<!-- </div> end of wrap -->
</body>

</html>
