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

<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="23%" align="center"><img src="<?php echo base_url()."assets/images/bangka_barat.png"; ?>" width="50" height="60" align="right" /></td>
    <td width="54%" align="center"><p><span class="judul">PEMERINTAH KABUPATEN <?php echo $kabupaten; ?><br />
      KECAMATAN <?php echo $kecamatan; ?><br />
      KANTOR PEMERINTAH DESA <?php echo $desa; ?></span></p>
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

<br/>
<br/> 

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
    <td width="98%" height="24" align="justify"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Batas-batas ditunjuk oleh pemilik tanah dan tetangga yang berbatasan :.</p></td>
  </tr>
</table>
<br/>
<br/>
<table width="100%">
  <tr>
    <td width="98%" height="24" align="justify"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Setelah diadakan pengukuran, hasilnya sebagai berikut :.</p></td>
  </tr>
</table>
<br/>
<br/>
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
    <td width="98%" height="24" align="justify"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menurut pengakuan/keterangan yang bersangkutan dan saksi-saksi bahwa memang benar tanah tersebut milik <strong><?php 
    foreach ($dt_pihak_pertama as $row) {
      echo $row['nama'].', '; } ?></strong>dan sampai sekarang tanah tersebut tidak bermasalah serta tidak ada gugatan dari pihak lain (tidak dalam sengketa).</p></td>
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
<br/>
<br/>
<br/>
<br/>
<table width="100%" border="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="55%">Saksi Perbatasan</td>
    <td width="42%"><?php echo $desa_tanah.', '.tgl_indo(flipdate($tgl_berita_acara)); ?></td>
  </tr>
</table>

<table width="100%" border="0">
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
    <td><?php echo $nama_kades; ?></td>
  </tr>
</table>
<!-- </div> end of wrap -->
</body>

</html>
