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
    <td width="23%" align="center"></td>
    <td width="54%" align="center"><span class="judul">SURAT PERNYATAAN PENGUASAAN FISIK<br />
      BIDANG TANAH</span><br />
    </td>
    <td width="23%" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><hr /></td>
  </tr>

</table>

<table width="100%">
<tr>
  <td width="1%"></td>
  <td width="98%">Yang bertanda tangan di bawah ini :</td>
</tr>
</table>
<br/>
<br/>    
    <table width="100%">
    <?php foreach ($pemilik as $row) {
      
     ?>
	<tr>
        <td width="4%" >&nbsp;</td>
        <td width="27%" >Nama </td>
        <td width="65%">: <?php echo $row->nama; ?> </td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >Tempat Tanggal Lahir </td>
        <td>: <?php echo $row->tempat_lahir.', '.flipdate($row->tgl_lahir); ?> </td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >Pekerjaan </td>
        <td>: <?php echo $row->pekerjaan ?></td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >No. KTP </td>
        <td>: <?php echo $row->nik; ?> </td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >Alamat/Tempat Tinggal </td>
        <td>: <?php echo $row->alamat ?></td>
      </tr>

      <?php } ?>
    </table>

<br/>
<br/> 


<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="3%">1. </td>
    <td width="94%" align="justify">Dengan ini menyatakan bahwa saya dengan itikad baik telah menguasai sebidang tanah yang terletak di :</td>
  </tr>
</table>
<table width="100%">
     <tr>
        <td width="6.50%" >&nbsp;</td>
        <td width="25%" >Jalan</td>
        <td width="68.50%">: <?php echo $jln_tanah; ?> </td>
        </tr>
     <tr>
        <td >&nbsp;</td>
        <td >RT/RW Lingkungan</td>
        <td>: <?php echo $rt_tanah.'/'.$rw_tanah.' - '.$dusun_tanah; ?> </td>
        </tr>
      <tr>
        <td >&nbsp;</td>
        <td >Desa/Kelurahan </td>
        <td>: <?php echo $desa_tanah; ?></td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >Kecamatan </td>
        <td>: <?php echo $kec_tanah; ?> </td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >Kabupaten </td>
        <td>: <?php echo $kab_tanah; ?> </td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >Status Tanah </td>
        <td>: <?php echo $status_tanah; ?> </td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >Dipergunakan Untuk </td>
        <td>: <?php echo $guna_tanah; ?> </td>
      </tr>
    </table>

<br/>
<br/> 

  <table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="3%">2. </td>
    <td width="94%" align="justify">Bidang tanah tersebut diusahakan/dikuasai secara fisik oleh saya sejak tahun <?php echo $sejak_kuasa_tanah; ?> yang sampai saat ini saya kuasai secara terus menerus, tidak dijadikan/menjadi jaminan suatu hutang dan tidak dalam sengketa.</td>
  </tr>
</table>
<br/>
<br/> 
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="3%" height="25">&nbsp;</td>
    <td width="3%">&nbsp; </td>
    <td width="94%">Dengan batas-batas yang telah disetujui oleh saksi yang berbatasan sebagai berikut :</td>
  </tr>
</table>
<table width="100%">
      <tr>
        <td width="6.50%" >&nbsp;</td>
        <td width="25%" >Sebelah Utara</td>
        <td width="68.50%">: <?php echo $panjang_batas_utara.' berbatasan dengan tanah '.$nama_batas_utara; ?> </td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td>Sebelah Selatan</td>
        <td>: <?php echo $panjang_batas_selatan.' Meter berbatasan dengan tanah '.$nama_batas_selatan; ?> </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Sebelah Timur</td>
        <td>: <?php echo $panjang_batas_timur.' Meter berbatasan dengan tanah '.$nama_batas_timur; ?> </td>
      </tr>
      <tr>
        <td  >&nbsp;</td>
        <td  >Sebelah Barat</td>
        <td >: <?php echo $panjang_batas_barat.' Meter berbatasan dengan tanah '.$nama_batas_barat; ?> </td>
      </tr>
      
    </table>

<br/>
<br/>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="3%">3. </td>
    <td width="94%" align="justify">Bahwa diatas tanah <?php echo $guna_tanah; ?> tersebut terdapat <?php echo $tanaman; ?>.</td>
  </tr>
</table>

<br/>
<br/>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="3%">4. </td>
    <td width="94%" align="justify">Bahwa tanah tersebut tidak ada surat-surat lain.</td>
  </tr>
</table>

<br/>
<br/>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="3%">5. </td>
    <td width="94%" align="justify">Bahwa apabila dikemudian hari ternyata Surat Pernyataan Penguasaan Fisik Bidang Tanah ini tidak benar, serta ada gugatan dan tuntutan dari pihak lain atas tanah <?php echo $guna_tanah; ?> tersebut maka saya bersedia dituntut / dihukum oleh pihak yang berwajib baik pidana maupun perdata sesuai dengan ketentuan perundang-undangan yang berlaku tanpa ada yang dikecualikan dan segala resikonya akan menjadi tanggung jawab saya sendiri.</td>
  </tr>
</table>

<br/>
<br/>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="3%">6. </td>
    <td width="94%" align="justify">Surat pernyataan ini saya buat dengan sebenarnya dengan penuh tanggung jawab dan saya bersedia untuk mengangkat sumpah bila diperlukan. Apabila ternyata pernyataan ini tidak benar saya bersedia dituntut dihadapan pihak-pihak yang berwenang baik secara pidana maupun perdata, dengan saksi-saksi.</td>
  </tr>
</table>
 

    
    <p>&nbsp;</p>
    <table width="100%" border="0" cellpadding="0">
      <tr>
        <td width="65%">&nbsp;</td>
        <td width="35%" align="center"><?php echo $desa_tanah.' '.flipdate($tgl_pernyataan); ?></td>
      </tr>
      <tr>
        <td width="65%">&nbsp;</td>
        <td width="35%" height="60px">&nbsp;</td>
      </tr>
      <tr>
        <td width="65%">&nbsp;</td>
        <td width="35%" align="center"><?php echo $pembuat_pernyataan ?></td>
      </tr>
    </table>


<br>
<br>
<br>
<br>
<br>
<br>
<br>


<table border="0" width="100%">
<tr>
    <td width="3%">&nbsp;</td>
    <td width="3%" >&nbsp; </td>
    <td width="25%" ><b>SAKSI-SAKSI</b></td>
    <td width="69%">&nbsp; </td>
  </tr>
  <tr>
  <td >&nbsp;</td>
    <td  >&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <?php 
  $no = 0;
  foreach ($saksi as $row) {
    $no = $no+1;
   ?>
  <tr>
  <td>&nbsp;</td>
    <td><?php echo $no; ?>. </td>
    <td>Nama</td>
    <td>: <b><?php echo $row->nama; ?></b> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Umur</td>
    <td>: <?php echo $row->umur; ?> Tahun</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Pekerjaan</td>
    <td>: <?php echo $row->pekerjaan; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Alamat</td>
    <td>: <?php echo $row->alamat; ?></td>
  </tr>


    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 <?php  } ?>
  
  <tr>
    <td>&nbsp;</td>
    <td><?php $no = $no+1;
     echo $no;?>. </td>
    <td>Nama</td>
    <td>: <b><?php echo $nama_pengukur_satu; ?></b> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Jabatan</td>
    <td>: <?php echo $jabatan_pengukur_satu; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Umur</td>
    <td>: <?php echo $umur_pengukur_satu; ?> Tahun</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Pekerjaan</td>
    <td>: <?php echo $pekerjaan_pengukur_satu; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Alamat</td>
    <td>: <?php echo $alamat_pengukur_satu; ?></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?php $no = $no+1;
     echo $no; ?>. </td>
    <td>Nama</td>
    <td>: <b><?php echo $nama_pengukur_dua; ?></b> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Jabatan</td>
    <td>: <?php echo $jabatan_pengukur_dua; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Umur</td>
    <td>: <?php echo $umur_pengukur_dua; ?> Tahun</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Pekerjaan</td>
    <td>: <?php echo $pekerjaan_pengukur_dua; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Alamat</td>
    <td>: <?php echo $alamat_pengukur_dua; ?></td>
  </tr>
</table>

  <br/>
<br/> 
<br/>
<br/>
<br/>


<table width="100%">
  <tr>
    <td width="6%">&nbsp;</td>
    <td colspan="2" >Diregister di Kecamatan <?php echo $kec_tanah; ?> </td>
    <td colspan="2" width="49%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diregister di Kelurahan/Desa <?php echo $desa_tanah; ?> </td>
  </tr>
  <tr>
    <td width="6%">&nbsp;</td>
    <td width="18%">Nomor</td>
    <td width="27%">: <?php echo $no_register_kecamatan; ?></td>
    <td width="21%">Nomor</td>
    <td width="28%">: <?php echo $no_register_desa ?></td>
  </tr> 
  <tr>
    <td>&nbsp;</td>
    <td>Tanggal</td>
    <td>: <?php echo flipdate($tgl_register_kecamatan); ?></td>
    <td>Tanggal</td>
    <td>: <?php echo flipdate($tgl_register_desa); ?> </td>
  </tr> 
  <tr>
    <td>&nbsp;</td>
    <td>Mengetahui </td>
    <td>: </td>
    <td>Mengetahui</td>
    <td>: </td>
  </tr>   
  <tr>
    <td width="6%">&nbsp;</td>
    <td colspan="2" ><b>CAMAT <?php echo $kec_tanah; ?> </b> </td>
    <?php if($jenis_wilayah=='desa'){ ?>
    <td colspan="2"><b>KEPALA DESA <?php echo $desa_tanah; ?> </b></td><?php
      }else{ ?>
        <td colspan="2"><b>LURAH <?php echo $desa_tanah; ?> </b></td>
    <?php  } ?>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="6%">&nbsp;</td>
    <td colspan="2" ><b><?php echo $nama_camat; ?></b></td>
    <td td colspan="2"><b><?php echo $nama_kades; ?></b></td>
  </tr>  
   <tr>
    <td width="6%" height="21">&nbsp;</td>
    <td colspan="2"><b><?php echo $jabatan_camat; ?></b></td>
    <td td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="6%" height="28">&nbsp;</td>
    <td colspan="2"><b>NIP. <?php echo $nip_camat; ?></b></td>
    <td td colspan="2">&nbsp;</td>
  </tr>  
</table> 
    
<!-- </div> end of wrap -->
</body>

</html>