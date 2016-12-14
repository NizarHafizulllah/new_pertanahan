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

<?php $userdata = $this->session->userdata('desa_login'); 
?>

<table width="100%" border="0" cellpadding="3">
  
  <tr>
    <td width="23%" align="center"><img src="<?php echo base_url()."assets/images/bangka_barat.png" ?>" width="50" height="60" align="right" /></td>
    <td width="54%" align="center"><p><span class="judul">PEMERINTAH KABUPATEN <?php echo $kab_tanah ;?><br />
      KECAMATAN <?php echo $kec_tanah ;?><br />
      <?php if ($jenis_wilayah=='desa') {?>
        KANTOR PEMERINTAH DESA <?php echo $desa_tanah ;?></span></p>
      <?php }else{ ?>
        KELURAHAN <?php echo $desa_tanah ;?></span></p>
        <?php } ?>
      
      <p> 
    </p></td>
    <td width="23%" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><hr /></td>
  </tr>

</table>
<table width="100%">
  <tr>
    <td height="39">&nbsp;</td>
    <td align="center"><u><strong>SURAT KETERANGAN</strong></u><strong><br />
    NO : <?php echo $no_ket_desa ?></strong> </td>
    <td>&nbsp;</td>
  </tr>
</table>

<table width="100%">
<tr>
  <td width="98%" height="24"><p>Yang bertanda tangan di bawah ini :</p></td>
</tr>
</table>
<br/>    
    <table width="100%">
	<tr>
        <td width="2%" >&nbsp;</td>
      <td width="18%" >Kepala Desa</td>
      <td width="80%">: <?php echo $desa_tanah; ?> </td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >Kecamatan</td>
        <td>: <?php echo $kec_tanah; ?> </td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >Kabupaten</td>
        <td>: <?php echo $kab_tanah ?></td>
      </tr>
    </table>

<br/>
<br/>  


<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="2%">&nbsp;</td>
    <td width="98%"><p>Dengan ini menerangkan sebagaimana berikut : </p>
    </td>
  </tr>
</table>
<br/>

<table width="100%" border="0">
  <tr>
    <td width="6%">&nbsp;</td>
    <td width="3%" align="left" valign="top">1.</td>
    <td width="91%" align="justify"><p>Bahwa berdasarkan Surat Pernyataan Penguasaan Fisik Bidang Tanah tanggal <?php echo flipdate($tgl_keterangan); ?>, diketahui Kepala Desa <?php echo $desa_tanah.' tanggal '.flipdate($tgl_register_desa).' No. '.$no_register_desa; ?> berupa tanah <?php echo $guna_tanah; ?> yang terletak di <?php echo $dusun_tanah ?> Desa 
        <?php echo $desa_tanah; ?> 
        Kecamatan <?php echo $kec_tanah; ?> Kabupaten <?php echo $kab_tanah; ?> dengan luas ± &nbsp;&nbsp;&nbsp;&nbsp;
        
    M² ( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; meter persegi) dengan batas - batas sebagai berikut : </p> </td>
  </tr>
</table>
<br/>
<br/>
<table width="100%" border="0">
  <tr>
    <td width="6%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td width="24%">Sebelah Utara</td>
    <td width="67%">: <?php echo $panjang_batas_utara.' berbatasan dengan tanah '.$nama_batas_utara; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Sebelah Selatan</td>
    <td>: <?php echo $panjang_batas_selatan.' berbatasan dengan tanah '.$nama_batas_selatan; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Sebelah Timur</td>
    <td>: <?php echo $panjang_batas_timur.' berbatasan dengan tanah '.$nama_batas_timur; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="24%">Sebelah Barat</td>
    <td width="67%">: <?php echo $panjang_batas_barat.' berbatasan dengan tanah '.$nama_batas_barat; ?> </td>
  </tr>
</table>
<br/>
<br/> 
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="9%">&nbsp;</td>
    <td width="91%"><p>Adalah benar tanah yang dikuasai / dipunyai</p>
    </td>
  </tr>
</table>

<br/>
<br/>

<table width="100%" border="0">
<?php foreach ($pemilik as $row) {
  # code...
 ?>
  <tr>
    <td width="6%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td width="24%">Nama</td>
    <td width="67%">: <?php echo $row->nama ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Tempat Tanggal Lahir</td>
    <td>: <?php echo $row->tempat_lahir.', '.$row->tgl_lahir ;?></td>
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
    <td>No. KTP</td>
    <td>: <?php echo $row->nik; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="24%">Alamat/Tempat Tinggal</td>
    <td width="67%">: <?php echo $row->alamat ?></td>
  </tr>
  <?php } ?>
</table>


  


<br>
<br>
<table width="100%" border="0">
  <tr>
    <td width="6%">&nbsp;</td>
    <td width="3%" align="left" valign="top">2. </td>
    <td width="91%" align="justify"><p>Bahwa tanah <?php echo $guna_tanah; ?> tersebut diusahakan/dikuasai secara fisik oleh yang bersangkutan sejak tahun <?php echo $sejak_kuasa_tanah; ?>, serta diatas tanah tersebut terdapat <?php echo $tanaman; ?>. </p>    </td>
  </tr>
</table>
<br/>
<br/> 
<table width="100%" border="0">
  <tr>
    <td width="6%">&nbsp;</td>
    <td width="3%" align="left" valign="top">3. </td>
    <td width="91%" align="justify"><p>Bahwa tanah tersebut belum pernah dipindah tangankan dengan pihak lain, tidak dalam sengketa, tidak dalam perkara, tidak diborongkan/jaminan hutang pada pihak lain dan bukan merupakan tanah warisan / milik bersama yang belum dibagikan. </p>    </td>
  </tr>
</table>
<br/>
<br/>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="2%">&nbsp;</td>
    <td width="98%"><p>Demikian Surat Keterangan Tanah ini dibuat dengan sebenar - benarnya untuk dapat dipergunakan sebagaimana mestinya. </p></td>
  </tr>
</table>
<br/>
<br/>
<table width="100%">
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="12%">Nomor</td>
    <td colspan="2">: <?php echo $no_ket_kec; ?></td>
    <td width="26%">&nbsp;</td>
    <td width="21%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Tanggal</td>
    <td width="21%">: <?php echo flipdate($tgl_register_kecamatan); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Mengetahui </td>
    <td>: </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" >&nbsp;</td>
    <td ></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="4%">&nbsp;</td>
    <td colspan="2" ><div align="center"><b>CAMAT <?php echo $kec_tanah; ?> </b> </div></td>
    <td width="16%" ></td>
    <td colspan="2"><div align="center"><?php echo $desa_tanah.', '.flipdate($tgl_register_desa); ?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="center"></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <?php if($jenis_wilayah=='desa'){ ?>
    <td colspan="2"><div align="center"><b>KEPALA DESA <?php echo $desa_tanah; ?> </b></div></td><?php
      }else{ ?>
        <td colspan="2"><div align="center"><b>LURAH <?php echo $desa_tanah; ?> </b></div></td>
    <?php  } ?>
  </tr>
  <tr>
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
  </tr>
  <tr>
    <td width="4%">&nbsp;</td>
    <td colspan="2" ><div align="center"><b><?php echo $nama_camat; ?></b></div></td>
    <td width="16%">&nbsp;</td>
    <td td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="4%" height="21">&nbsp;</td>
    <td colspan="2"><div align="center"><b><?php echo $jabatan_camat; ?></b></div></td>
    <td width="16%">&nbsp;</td>
    <td td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="4%" height="21">&nbsp;</td>
    <td colspan="2"><div align="center"><b>NIP. <?php echo $nip_camat; ?></b></div></td>
    <td width="16%">&nbsp;</td>
    <td td colspan="2"><div align="center"><b><?php echo $nama_kades; ?></b></div></td>
  </tr>
</table>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<table width="100%" border="0">
  <tr>
    <td colspan="6"><div align="center"><strong>&quot;Denah / Peta&quot;</strong></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="19%" >&nbsp;</td>
    <td width="15%" >&nbsp;</td>
    <td width="6%" >&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="1%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
    <td width="15%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
    <td width="43%"><div align="center"> <?php echo $panjang_batas_utara ?></div></td>
    <td width="16%">&nbsp;</td>
  </tr>
  <tr>
    <td height="58">&nbsp;</td>
    <td rowspan="3" valign="middle"><img src="<?php echo base_url()."assets/images/arah.jpg" ?>" alt="" width="186" height="147" align="center" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td rowspan="3"> <img src="<?php echo base_url()."assets/images/kotak.png" ?>" alt="" width="448" height="448" align="center" /></td>
    <td align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td>&nbsp;</td>
    <td> <?php echo $panjang_batas_barat ?></td>
    <td align="left" valign="middle"> <?php echo $panjang_batas_timur ?></td>
  </tr>
  <tr>
    <td height="54">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"><?php echo $panjang_batas_selatan ?></div></td>
    <td>&nbsp;</td>
  </tr>
</table>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<table width="100%" border="0">
  <tr>
    <td width="6%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td width="24%">Sebelah Utara</td>
    <td width="67%">: <?php echo $panjang_batas_utara.' Meter berbatasan dengan tanah '.$nama_batas_utara; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Sebelah Selatan</td>
    <td>: <?php echo $panjang_batas_selatan.' berbatasan dengan tanah '.$nama_batas_selatan; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Sebelah Timur</td>
    <td>: <?php echo $panjang_batas_timur.' Meter berbatasan dengan tanah '.$nama_batas_timur; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="24%">Sebelah Barat</td>
    <td width="67%">: <?php echo $panjang_batas_barat.'  berbatasan dengan tanah '.$nama_batas_barat; ?> </td>
  </tr>
</table>
<br/>
<br/>
<br/>


<table width="100%" border="0">
  <tr>
    <td width="9%">&nbsp;</td>
    <td width="21%">Di Ukur Oleh :</td>
    <td width="16%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="34%">Pemilik Tanah</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><?php echo $jabatan_pengukur_satu ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?php echo $nama_pengukur_satu ?></td>
    <td>( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
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
    <td>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
    <td>&nbsp;</td>
    <td><?php echo $pembuat_pernyataan ?> </td>
  </tr>
</table>

<!-- </div> end of wrap -->
</body>

</html>