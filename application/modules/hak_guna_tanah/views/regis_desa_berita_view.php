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
?>

<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="23%" align="center"><img src="<?php echo base_url()."assets/images/bangka_barat.png"; ?>" width="50" height="60" align="right" /></td>
    <td width="54%" align="center"><p><span class="judul">PEMERINTAH KABUPATEN <?php echo $kab_tanah; ?><br />
      KECAMATAN <?php echo $kec_tanah; ?><br />
      KANTOR PEMERINTAH DESA <?php echo $desa_tanah; ?></span></p>
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
    NO : <?php echo $no_berita_acara_desa; ?></strong></div></td>
  </tr>
</table>


<br/>
<br/>

<table width="100%">
<tr>
  <td width="98%" height="24" align="justify"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada tanggal <?php echo flipdate($tgl_register_desa); ?> telah dilakukan pengukuran ulang sebidang tanah yang terletak di <?php echo $dusun_tanah.' Desa '.$desa_tanah.' Kecamatan '.$kec_tanah.' Kabupaten '.$kab_tanah; ?> dilakukan pemeriksaan atas fisik tanah berdasarkan permohonan dari : </p></td>
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
        <td>: <?php echo $row->tempat_lahir.', '.$row->tgl_lahir; ?> </td>
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
    <td width="98%" height="24" align="justify"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bahwa setelah dilakukan pemeriksaan dan pengukuran yang di saksikan masing - masing sebelah menyebelah membenarkan tanah yang diakui oleh <strong><?php echo $pembuat_pernyataan; ?></strong> tidak bermasalah (sengketa). Dengan batas - batas sebagai berikut.</p></td>
  </tr>
</table>
<br/>
<br/>
<table width="100%" border="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="22%">Sebelah Utara</td>
    <td width="75%">: <?php echo $panjang_batas_utara.' berbatasan dengan tanah '.$nama_batas_utara; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Sebelah Selatan</td>
    <td>: ± <?php echo $panjang_batas_selatan.' berbatasan dengan tanah '.$nama_batas_selatan; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Sebelah Timur</td>
    <td>: ± <?php echo $panjang_batas_timur.' berbatasan dengan tanah '.$nama_batas_timur; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="22%">Sebelah Barat</td>
    <td width="75%">: ± <?php echo $panjang_batas_barat.' berbatasan dengan tanah '.$nama_batas_barat; ?> </td>
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
<br/>
<br/>
<br/>
<br/>
<table width="100%" border="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="55%">Saksi Perbatasan</td>
    <td width="42%"><?php echo $desa_tanah.', '.$tgl_pernyataan ?></td>
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
