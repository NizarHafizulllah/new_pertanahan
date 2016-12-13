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
$userdata = $this->session->userdata('kecamatan_login'); 
?>

<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="100%" align="right">-HALAMAN PERTAMA-</td>
  </tr>
  
  <tr>
    <td width="100%" align="center"><span class="judul">SURAT PENYERAHAN / PELEPASAN HAK ATAS TANAH </span></td>
  </tr>
</table>


<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="100%" align="justify">-----------Pada hari ini, tanggal (<?php echo $tanggal ?>), kami yang bertanda tangan dibawah ini ;-------------- </td>
  </tr>
</table>
<br/>
<table width="100%" border="0" cellpadding="2">
  <tr>
    <td width="5%"><strong>I. </strong></td>
    <td width="95%" align="justify"><strong><?php echo $nama_pihak_pertama ?></strong>, umur <?php echo $umur_pihak_pertama ?> tahun, Kewarganegaraan <?php echo $wn_pihak_pertama ?>, Status Perkawinan <?php if($status_kawin_pihak_pertama=="k"){ echo "Kawin"; }else{ echo "Belum Kawin"; } ?>, Pekerjaan <?php echo $pekerjaan_pihak_pertama ?>, bertempat tinggal di <?php echo $alamat_pihak_pertama ?>, Kelurahan <?php echo $desa_pihak_pertama ?>, Kecamatan <?php echo $kecamatan_pihak_pertama ?>, Kabupaten <?php echo $kabupaten_pihak_pertama ?>;-------------------------------------------</td>
  </tr>
  <tr>
  <td width="5%">&nbsp;</td>
    <td width="95%" align="center" >------------------------------------------ <strong>selanjutnya disebut Pihak Pertama</strong> ------------------------------------------</td>
  </tr>
  <tr>
  <td width="5%">&nbsp;</td>
    <td width="95%" align="center">-------------------------------------------------- <strong>yang menyerahkan hak</strong> --------------------------------------------------</td>
  </tr>
  <tr>
  <td width="5%">&nbsp;</td>
    <td width="95%" align="center">&nbsp;</td>
  </tr>
</table>

<table width="100%" border="0" cellpadding="2">
  <tr>
    <td width="5%"><strong>II. </strong></td>
    <td width="95%" align="justify"><strong><?php echo $nama_pihak_kedua ?></strong>, umur <?php echo $umur_pihak_kedua ?> tahun, Kewarganegaraan <?php echo $wn_pihak_kedua ?>, Pekerjaan <?php echo $pekerjaan_pihak_kedua ?>, bertempat tinggal di <?php echo $alamat_pihak_kedua ?>, Kelurahan <?php echo $desa_pihak_kedua ?>, Kecamatan <?php echo $kecamatan_pihak_kedua ?>, Kabupaten <?php echo $kabupaten_pihak_kedua ?>;----------------------------------------------------------------</td>
  </tr>
  <tr>
    <td width="5%">&nbsp;</td>
    <td width="95%" align="center" >------------------------------------------- <strong>selanjutnya disebut Pihak Kedua</strong> -------------------------------------------</td>
  </tr>
  <tr>
    <td width="5%">&nbsp;</td>
    <td width="95%" align="center">----------------------------------------------------- <strong>yang menerima hak</strong> -----------------------------------------------------</td>
  </tr>
  <tr>
    <td width="5%">&nbsp;</td>
    <td width="95%" align="center">&nbsp;</td>
  </tr>
</table>


<table width="100%" border="0" cellpadding="3">
  <tr>
    <td colspan="2" align="justify">------------------ Masing-masing membuat perjanjian sebagai berikut ;----------------------------------------------------- </td>
  </tr>
  <tr>
    <td width="3%">1. </td>
    <td width="97%" align="justify">Bahwa <strong>Pihak Pertama</strong> berdasarkan;----------------------------------------------------------------------</td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="97%" align="justify">
    <table width="100%" border="0">
      <?php $no = -1;
        $alphabet = range('a', 'z');
        foreach ($dt_surat as $row) {
        $no =$no+1;
        ?>
        <tr>
         <td width="3%"><?php echo $alphabet[$no]; ?>. </td>
        <td width="97%" align="justify"><?php echo $row['surat']; ?>;--------</td>
    
  </tr>
  <?php } ?>
  </table>
  <br>
  <table width="100%" border="0" cellpadding="5">

    <tr>
         <td width="3%">&nbsp; </td>
        <td width="97%" align="justify">dengan ini mengaku dengan sebenarnya telah menyerahkan / melepaskan Hak Atas Tanah kepada <strong>Pihak Kedua</strong> dan <strong>Pihak Kedua</strong> telah menerima dari <strong>Pihak Pertama</strong>;-------------------------</td>
    
  </tr>
  <tr>
         <td width="3%">&nbsp; </td>
        <td width="97%" align="justify">Sebidang tanah berikut segala tanam tumbuh yang ada diatas tanah tersebut yang terletak di <?php echo $wilayah ?>;----------------------------------------</td>
    
  </tr>
      
       </table>
       <br/>
       <table width="100%" border="0">
         <tr>
         <td width="4%">&nbsp;</td>
           <td width="30%">Provinsi</td>
           <td width="2%">:</td>
           <td width="65%"><?php echo $propinsi ?>;------------------------------------</td>
         </tr>
         <tr>
         <td width="4%">&nbsp;</td>
           <td width="30%">Kabupaten</td>
           <td width="2%">:</td>
           <td width="65%"><?php echo $kabupaten ?>;------------------------------------</td>
         </tr>
         <tr>
         <td width="4%">&nbsp;</td>
           <td width="30%">Kecamatan</td>
           <td width="2%">:</td>
           <td width="65%"><?php echo $kecamatan ?>;------------------------------------</td>
         </tr>
         <tr>
         <td width="4%">&nbsp;</td>
           <td width="30%">Kelurahan/Desa</td>
           <td width="2%">:</td>
           <td width="64%"><?php echo $desa ?>;------------------------------------</td>
         </tr>
       </table>
       <br/>
       <br/>
       <table width="100%" border="0">
         <tr>
         <td width="4%">&nbsp;</td>
           <td width="92%">dengan ukuran dan batas-batas sebagai berikut;-------------------------------------------------------------</td>
         </tr>
         
       </table>
       <table width="100%" border="0">
         <tr>
         <td width="4%">&nbsp;</td>
           <td width="30%">Utara</td>
           <td width="2%">:</td>
           <td width="65%"><?php echo $panjang_batas_utara.' berbatas dengan '.$nama_batas_utara ?>;----------------</td>
         </tr>
         <tr>
         <td width="4%">&nbsp;</td>
           <td width="30%">Timur</td>
           <td width="2%">:</td>
           <td width="65%"><?php echo $panjang_batas_timur.' berbatas dengan '.$nama_batas_timur ?>;----------------</td>
         </tr>
         <tr>
         <td width="4%">&nbsp;</td>
           <td width="30%">Selatan</td>
           <td width="2%">:</td>
           <td width="65%"><?php echo $panjang_batas_selatan.' berbatas dengan '.$nama_batas_selatan ?>;----------------</td>
         </tr>
         <tr>
         <td width="4%">&nbsp;</td>
           <td width="30%">Barat</td>
           <td width="2%">:</td>
           <td width="65%"><?php echo $panjang_batas_barat.' berbatas dengan '.$nama_batas_barat ?>;-------</td>
         </tr>
       </table>
    </td>
  </tr>
  <tr>
    <td width="3%">2. </td>
    <td width="97%" align="justify">Bahwa penyerahan / pelepasan hak atas tanah ini meliputi segala tanam tumbuh yang ada diatas tanah tersebut;----------------------------------------------------------------------------------------------------------------</td>
  </tr>
  <tr>
    <td width="3%">3. </td>
    <?php if ($biaya_ganti_rugi!=0.00) {
      $spasi = ''
      ?>
       <td width="97%" align="justify">Bahwa penyerahan / pelepasan hak atas tanah ini terjadi dengan pembayaran ganti rugi berupa uang sebesar Rp. <?php echo $biaya_ganti_rugi ?>;- dari <strong>Pihak Kedua</strong> kepada <strong>Pihak Pertama</strong> yang mana telah diterima dengan cukup dan tunai oleh <strong>Pihak Pertama</strong>, dan Surat Penyerahan/pelepasan Hak Atas Tanah ini berlaku pula sebagai bukti penerimaannya (Kwitansi);-----------------------------------------------------</td>
    <?php }else{ 
          $spasi = '<br/>&nbsp;<br/>&nbsp;'
      ?>
      <td width="97%" align="justify">Bahwa penyerahan / pelepasan hak atas tanah ini tidak terjadi pembayaran ganti rugi berupa apapun juga dari Pihak <strong>Kedua</strong> kepada <strong>Pihak Pertama</strong>, dalam arti kata di serahkan secara Cuma-Cuma tulus dan ikhlas <strong style="color: red;">(DIHIBAHKAN)</strong> dari <strong>Pihak Pertama</strong> kepada <strong>Pihak Kedua</strong>
      </td>
  <?php      } ?>
   
  </tr>
  <tr>
    <td width="3%">4. </td>
    <td width="97%" align="justify">Bahwa untung rugi yang mungkin terjadi atas penyerahan / pelepasan hak atas tanah ini, mulai saat ini menjadi tanggungan <strong>Pihak Kedua</strong>;-----------------------------------------------------------------------------</td>
  </tr>
  <tr>
    <td width="3%">5. </td>
    <td width="97%" align="justify">Bahwa Ahliwaris <strong>Pihak Pertama</strong> tidak mempunyai hak apapun lagi terhadap tanah berikut segala tanam tumbuh  yang ada di atas tanah tersebut, selanjutnya <strong>Pihak Pertama</strong> menjamin bahwa tanah berikut segala tanam tumbuh  yang ada diatas tanah tersebut tidak dikenakan sesuatu sitaan atau tersangkut sebagai tanggungan sesuatu atau diberati dengan beban-beban lainnya;-----------------</td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="97%" align="justify">------- Demikian surat penyerahan / pelepasan hak atas tanah ini dibuat dihadapan saksi-saksi :-------</td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="100%" align="right">-KEHALAMAN KEDUA-</td>
  </tr>
</table>
<?php echo $spasi; ?>
<br/>&nbsp;
<br/>&nbsp;
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="100%" align="right">-HALAMAN KEDUA-</td>
  </tr>
</table>
<table width="100%" border="0">
<?php 
  $no_saksi = 0;
foreach ($dt_saksi as $row) {
  $no_saksi = $no_saksi+1;
  ?>
  <tr>
    <td width="3%"><?php echo $no_saksi; ?></td>
    <td width="92%"><?php echo '<strong>'.$row['nama'].'</strong>, '.$row['jabatan']; ?>;---</td>
  </tr>
  <?php
} ?>
  
</table>

<br/>&nbsp;
<br/>&nbsp;

<?php 
  if ($no_saksi==2) {
    $jumlah_saksi = "kedua-duanya";
  }else if ($no_saksi==3) {
    $jumlah_saksi = "ketiga-tiganya";
  }else if ($no_saksi==4) {
    $jumlah_saksi = "keempat-empatnya";
  }else if ($no_saksi==5) {
    $jumlah_saksi = "kelima-limanya";
  }else if ($no_saksi==6) {
    $jumlah_saksi = "keenam-enamnya";
  }

?>

<table width="100%" border="0" >
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="95%" align="justify">Yang <?php echo $jumlah_saksi ?> turut bertanda tangan dibawah ini dan diketahui oleh Camat Muntok Kabupaten Bangka Barat.---------------------------------</td>
  </tr>
</table>

<br/>&nbsp;
<br/>&nbsp;

<table width="100%" border="0">
  <tr>
    <td align="center" width="30%"><strong>PIHAK KEDUA</strong></td>
    <td align="center" width="40%">&nbsp;</td>
    <td align="center" width="30%"><strong>PIHAK PERTAMA</strong></td>
  </tr>
  <tr>
    <td align="center" width="30%"><strong>YANG MENERIMA HAK</strong></td>
    <td align="center" width="40%">&nbsp;</td>
    <td align="center" width="30%"><strong>YANG MENYERAHKAN HAK</strong></td>
  </tr>
  <tr>
    <td align="center" width="30%"><strong>&nbsp;</strong></td>
    <td align="center" width="40%">&nbsp;</td>
    <td align="center" width="30%"><strong>&nbsp;</strong></td>
  </tr>
  <tr>
    <td align="center" width="30%"><strong>&nbsp;</strong></td>
    <td align="center" width="40%">&nbsp;</td>
    <td align="center" width="30%"><strong>&nbsp;</strong></td>
  </tr>
  <tr>
    <td align="center" width="30%"><strong>&nbsp;</strong></td>
    <td align="center" width="40%">&nbsp;</td>
    <td align="center" width="30%"><strong>&nbsp;</strong></td>
  </tr>
  <tr>
    <td align="center" width="30%"><strong>&nbsp;</strong></td>
    <td align="center" width="40%">&nbsp;</td>
    <td align="center" width="30%"><strong>&nbsp;</strong></td>
  </tr>
  <tr>
    <td align="center" width="30%"><strong>&nbsp;</strong></td>
    <td align="center" width="40%">&nbsp;</td>
    <td align="center" width="30%"><strong>&nbsp;</strong></td>
  </tr>
  <tr>
    <td align="center" width="30%"><strong><?php echo $nama_pihak_kedua ?></strong></td>
    <td align="center" width="40%">&nbsp;</td>
    <td align="center" width="30%"><strong><?php echo $nama_pihak_pertama ?></strong></td>
  </tr>
  <tr>
    <td align="center" width="30%">&nbsp;</td>
    <td align="center" width="40%">&nbsp;</td>
    <td align="center" width="30%">&nbsp;</td>
  </tr>
  <?php if ($status_kawin_pihak_pertama=='k') {
    if ($jenis_kelamin_pihak_pertama=='p') {
      $jenis_pasangan = 'suami';
    }else{
      $jenis_pasangan = 'istri';
    }

    ?>

  <tr>
    <td align="center" width="30%">&nbsp;</td>
    <td align="center" width="40%"><strong>Persetujuan <?php echo $jenis_pasangan ?> Pihak Pertama</strong></td>
    <td align="center" width="30%">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" width="30%">&nbsp;</td>
    <td align="center" width="40%">&nbsp;</td>
    <td align="center" width="30%">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" width="30%">&nbsp;</td>
    <td align="center" width="40%">&nbsp;</td>
    <td align="center" width="30%">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" width="30%">&nbsp;</td>
    <td align="center" width="40%">&nbsp;</td>
    <td align="center" width="30%">&nbsp;</td>
  </tr>

  <tr>
    <td align="center" width="30%">&nbsp;</td>
    <td align="center" width="40%"><strong><?php echo $nama_pasangan_pihak_pertama; ?></strong></td>
    <td align="center" width="30%">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" width="30%">&nbsp;</td>
    <td align="center" width="40%">&nbsp;</td>
    <td align="center" width="30%">&nbsp;</td>
  </tr>
  <?php
  } ?>
  <tr>
    <td align="center" width="30%">&nbsp;</td>
    <td align="center" width="40%"><strong>TANDA TANGAN SAKSI – SAKSI</strong></td>
    <td align="center" width="30%">&nbsp;</td>
  </tr>
</table>

<br/>&nbsp;
<hr/>&nbsp;
<br/>&nbsp;
<table width="100%" border="0">
  <tr>
    <?php $no = 0;
    foreach ($dt_saksi as $row) {
      $no = $no+1;
      $lebar = $no_saksi/100;
      ?>
      <td width=<?php echo $lebar ?>."%" align="center"><?php echo $no; ?></td>
    <?php } ?>
  </tr>
</table>
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;

<table width="100%" border="0" >
  <tr>
    <?php 
    foreach ($dt_saksi as $row) {
      
      $lebar = $no_saksi/100;
      ?>
      <td width=<?php echo $lebar ?>."%" align="center" style="size: 2px;"><strong><?php echo $row['nama'] ?></strong></td>
    <?php } ?>
  </tr>
</table>


<table width="100%" border="0">
  <tr>
    
    <td width="100%" align="center"><strong>-------------------------------------------------------</strong></td>
  </tr>
  <tr>
   
    <td width="100%" align="center"><strong>NOMOR : <?php echo $no_surat; ?></strong></td>
  </tr>
  <tr>
   
    <td width="100%" align="center"><strong>-------------------------------------------------------</strong></td>
  </tr>
  
</table>


<table>
  <tr>
    <td width="50%">&nbsp;</td>
    <td width="50%"><strong>MENGETAHUI :</strong></td>
  </tr>
  <tr>
    <td width="50%">&nbsp;</td>
    <td width="50%">&nbsp;</td>
  </tr>
  <tr>
    <td width="50%">&nbsp;</td>
    <td width="50%"><strong>CAMAT MUNTOK, :</strong></td>
  </tr>
  <tr>
    <td width="50%">&nbsp;</td>
    <td width="50%">&nbsp;</td>
  </tr>
  <tr>
    <td width="50%">&nbsp;</td>
    <td width="50%">&nbsp;</td>
  </tr>
  <tr>
    <td width="50%">&nbsp;</td>
    <td width="50%">&nbsp;</td>
  </tr>
  <tr>
    <td width="50%">&nbsp;</td>
    <td width="50%">&nbsp;</td>
  </tr>
  <tr>
    <td width="50%">&nbsp;</td>
    <td width="50%"><strong><?php echo $nama_camat; ?></strong></td>
  </tr>
  <tr>
    <td width="50%">&nbsp;</td>
    <td width="50%"><strong><?php echo $jabatan_camat; ?></strong></td>
  </tr>
  <tr>
    <td width="50%">&nbsp;</td>
    <td width="50%"><strong>NIP. <?php echo $nip_camat; ?></strong></td>
  </tr>
</table>


   

<!-- 
      RIDUAN ZAHRI, S.Sos
      Pembina 
               NIP.19621104 198303 1 004 -->



<!-- </div> end of wrap -->
</body>

</html>