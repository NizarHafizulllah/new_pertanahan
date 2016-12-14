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
    <td colspan="2" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berdasarkan surat-surat </td>
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
    <td width="97%" align="justify">Kepada Seorang </td>
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
    <td width="95%" align="justify">Yang <?php //echo $jumlah_saksi ?> turut bertanda tangan dibawah ini dan diketahui oleh Camat Muntok Kabupaten Bangka Barat.---------------------------------</td>
  </tr>
</table>

<br/>&nbsp;
<br/>&nbsp;

<table width="100%" border="0">
<?php if ($jumlah_pihak_pertama==1) {
    
   ?>
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
    <?php
    foreach ($dt_pihak_pertama as $row) {
      $status_kawin_pihak_pertama = $row['status_kawin'];
      $jenis_kelamin_pihak_pertama = $row['status_kawin'];
      $nama_pasangan_pihak_pertama = $row['nama_pasangan'];
    
     ?>
    <td align="center" width="30%"><strong><?php echo $row['nama'] ?></strong></td>
    <?php } ?>
  </tr>
  <?php }else { ?>
   <tr>
    <td align="center" width="30%"><strong>PIHAK KEDUA</strong></td>
    <td align="center" width="20%">&nbsp;</td>
    <td align="center" width="50%" colspan="2"><strong>PIHAK PERTAMA</strong></td>
  </tr>
  <tr>
    <td align="center" width="30%"><strong>YANG MENERIMA HAK</strong></td>
    <td align="center" width="20%">&nbsp;</td>
    <td align="center" width="50%" colspan="2"><strong>YANG MENYERAHKAN HAK</strong></td>
  </tr>

  <tr>
    <td align="center" width="30%"><strong>&nbsp;</strong></td>
    <td align="center" width="20%">&nbsp;</td>
    <td align="center" width="50%" colspan="2"><strong>&nbsp;</strong></td>
  </tr>
  <?php $no_tanda_tangan = 0;
    foreach ($dt_pihak_pertama as $row) {
      $status_kawin_pihak_pertama = $row['status_kawin'];
      $jenis_kelamin_pihak_pertama = $row['status_kawin'];
      $nama_pasangan_pihak_pertama = $row['nama_pasangan'];
      $no_tanda_tangan = $no_tanda_tangan+1;
     ?>
  <tr>
    <td align="center" width="30%">&nbsp;</td>
    <td align="center" width="20%">&nbsp;</td>
    <td align="left" width="30%"><strong><?php echo $no_tanda_tangan.'. '.$row['nama'] ?></strong> </td>
    <td align="center" width="20%"><strong>..................... </strong></td>
  </tr>
  <?php } ?>
  <tr>
    <td align="center" width="30%"><strong><?php echo $nama_pihak_kedua ?></strong></td>
    <td align="center" width="20%">&nbsp;</td>
    <td align="center" width="50%" colspan="2"><strong>&nbsp;</strong></td>
  </tr>


    <?php } ?>

  <tr>
    <td align="center" width="30%">&nbsp;</td>
    <td align="center" width="40%">&nbsp;</td>
    <td align="center" width="30%">&nbsp;</td>
  </tr>
  <?php if ($status_kawin_pihak_pertama=='k'&&$jumlah_pihak_pertama==1) {
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