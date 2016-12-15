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
    <td width="100%" align="center"><strong>No. <?php echo $no_surat ?></strong></td>
  </tr>
</table>

<br/>&nbsp;

<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="100%" align="center"><strong>TENTANG </strong></td>
  </tr>
  <tr>
    <td width="100%" align="center"><strong>PELEPASAN SEBAGIAN TANAH</strong></td>
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
         
           <td width="100%">Bermaksud hendak menyelesaikan Surat Penyerahan / Pelepasan Sebagian Tanah hak miliknya berikut segala tanaman tumbuh ang ada di tanah tersebut yang terletak di <?php echo $wilayah ?> sebagaimana surat tanah terlampir dengan ukuran sebagai berikut </td>
         </tr>
         
       </table>
       <br/>&nbsp;
       <br/>&nbsp;
       <table width="100%" border="0">
         <tr>
         <td width="4%">&nbsp;</td>
           <td width="30%">- Utara</td>
           <td width="2%">:</td>
           <td width="65%"><?php echo $panjang_batas_utara.' berbatas dengan '.$nama_batas_utara ?></td>
         </tr>
         <tr>
         <td width="4%">&nbsp;</td>
           <td width="30%">- Timur</td>
           <td width="2%">:</td>
           <td width="65%"><?php echo $panjang_batas_timur.' berbatas dengan '.$nama_batas_timur ?></td>
         </tr>
         <tr>
         <td width="4%">&nbsp;</td>
           <td width="30%">- Selatan</td>
           <td width="2%">:</td>
           <td width="65%">- <?php echo $panjang_batas_selatan.' berbatas dengan '.$nama_batas_selatan ?></td>
         </tr>
         <tr>
         <td width="4%">&nbsp;</td>
           <td width="30%">- Barat</td>
           <td width="2%">:</td>
           <td width="65%"><?php echo $panjang_batas_barat.' berbatas dengan '.$nama_batas_barat ?></td>
         </tr>
       </table>
    </td>
  </tr>
  <tr>
    <td width="3%">&nbsp; </td>
    <td width="97%" align="justify">Kepada Seseorang yang mengaku bernama </td>
  </tr>
  <tr>
  <td colspan="2" width="100%">
    <table width="100%" border="0">
      <tr>
     <td width="5%"><strong>&nbsp;</strong></td>
     <td width="25%">Nama</td>
     <td width="2%">:</td>
    <td width="68%" align="justify"><?php echo $nama_pihak_kedua; ?></td> 
    </tr>
   <tr>
     <td width="5%"><strong>&nbsp;</strong></td>
     <td width="25%">Tempat/Tgl lahir</td>
     <td width="2%">:</td>
    <td width="68%" align="justify"><?php echo $tempat_lahir_pihak_kedua.', '.flipdate($tgl_lahir_pihak_kedua) ?></td> 
   </tr>
    
   <tr>
     <td width="5%"><strong>&nbsp;</strong></td>
     <td width="25%">Pekerjaan</td>
     <td width="2%">:</td>
    <td width="68%" align="justify"><?php echo $pekerjaan_pihak_kedua ?></td> 
   </tr>
   <tr>
     <td width="5%"><strong>&nbsp;</strong></td>
     <td width="25%">No. KTP</td>
     <td width="2%">:</td>
    <td width="68%" align="justify"><?php echo $nik ?></td> 
   </tr>
   <tr>
     <td width="5%"><strong>&nbsp;</strong></td>
     <td width="25%">Alamat</td>
     <td width="2%">:</td>
    <td width="68%" align="justify"><?php echo $alamat_pihak_kedua?></td> 
   </tr>
    </table>
  </td>
  </tr>
  <tr>
    <td width="3%">&nbsp; </td>
    <?php if ($biaya_ganti_rugi!=0.00) {
      $spasi = ''
      ?>
       <td width="97%" align="justify">Yang diberikan / dilepaskan dengan ganti rugi sebesar Rp. <?php echo $biaya_ganti_rugi ?>;- </td>
    <?php }else{ 
          $spasi = '<br/>&nbsp;<br/>&nbsp;'
      ?>
      <td width="97%" align="justify">Yang diberikan / dilepaskan secara Cuma-Cuma tulus dan ikhlas <strong style="color: red;">(DIHIBAHKAN)</strong> dari <strong>Pihak Pertama</strong> kepada <strong>Pihak Kedua</strong>
      </td>
  <?php      } ?>
   
  </tr>
 
  
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="97%" align="justify"> Demikian surat Rekomendasi ini dibuat untuk dapat diteruskan ke Kantor Camat <?php echo $kecamatan; ?> :</td>
  </tr>
</table>




<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;



<table>
  <tr>
    <td width="50%">&nbsp;</td>
    <td width="50%"><?php echo $desa.' '.tgl_indo(flipdate($tanggal)); ?></td>
  </tr>
  <tr>
    <td width="50%">&nbsp;</td>
    <td width="50%"><strong>Kades/Lurah, <?php echo $desa ?></strong></td>
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
    <td width="50%"><strong><?php echo $nama_kades; ?></strong></td>
  </tr>
  
</table>


   

<!-- 
      RIDUAN ZAHRI, S.Sos
      Pembina 
               NIP.19621104 198303 1 004 -->



<!-- </div> end of wrap -->
</body>

</html>