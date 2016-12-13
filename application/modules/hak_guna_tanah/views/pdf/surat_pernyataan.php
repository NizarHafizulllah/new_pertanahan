<h5 style="text-align: center;"><u>BERITA ACARA PENGUKURAN TANAH</u></h5>
<span style="text-align: center;">Atas Nama : <strong><?php echo $utama->pembuat_pernyataan; ?></strong></span>

<p style="text-align: justify;">Pada hari ini , Senin  tanggal 15 Agustus 2016, atas permintaan Ahliwaris <strong><?php echo $utama->pembuat_pernyataan; ?></strong> telah diadakan peninjauan lokasi serta pengukuran kembali atas sebidang tanah yang terletak di Kp.Tegalrejo Rt. 001/Rw.003 Kelurahan Sungaibaru Kecamatan Muntok.</p>

<p>Batas-batas ditunjuk oleh pemilik tanah dan tetangga yang berbatasan :</p>

<table>
	<tr>
		<td width="20px">1.</td>
		<td><?php echo $utama->nama_batas_utara; ?></td>
		<td>(tetangga yang berbatasan)</td>
	</tr>
	<tr>
		<td>2.</td>
		<td><?php echo $utama->nama_batas_timur; ?></td>
		<td>(tetangga yang berbatasan)</td>
	</tr>
	<tr>
		<td>3.</td>
		<td><?php echo $utama->nama_batas_selatan; ?></td>
		<td>(tetangga yang berbatasan)</td>
	</tr>
	<tr>
		<td>4.</td>
		<td><?php echo $utama->nama_batas_barat; ?></td>
		<td>(tetangga yang berbatasan)</td>
	</tr>
</table>


<p>Setelah diadakan pengukuran, hasilnya sebagai berikut :</p>

<table>
	<tr>
		<td width="57px">- Utara</td>
		<td width="10px">:</td>
		<td width="120px">+- <?php echo $utama->panjang_batas_utara; ?></td>
		<td width="300px">Berbatasan dengan Tanah <?php echo $utama->nama_batas_utara; ?></td>
	</tr>
	<tr>
		<td>- Timur</td>
		<td>:</td>
		<td>+- <?php echo $utama->panjang_batas_timur; ?></td>
		<td>Berbatasan dengan Tanah <?php echo $utama->nama_batas_timur; ?></td>
	</tr>
	<tr>
		<td>- Selatan</td>
		<td>:</td>
		<td>+- <?php echo $utama->panjang_batas_selatan; ?></td>
		<td>Berbatasan dengan Tanah <?php echo $utama->nama_batas_selatan; ?></td>
	</tr>
	<tr>
		<td>- Barat</td>
		<td>:</td>
		<td>+- <?php echo $utama->panjang_batas_barat; ?></td>
		<td>Berbatasan dengan Tanah <?php echo $utama->nama_batas_barat; ?></td>
	</tr>
</table>


<p style="text-align: justify;">Menurut pengakuan/keterangan yang bersangkutan dan saksi-saksi bahwa memang benar tanah tersebut milik <strong><?php echo $utama->pembuat_pernyataan; ?></strong> dan sampai sekarang tanah tersebut tidak bermasalah serta tidak ada gugatan dari pihak lain (tidak dalam sengketa).</p>

<p>Demikian berita acara pengukuran ini dibuat dengan sebenar-benarnya.</p>

<table>
	<tr>
		<td align="center" width="40%">
			Diukur Oleh, <br><br><br><br><br>
			<strong><strong><?php echo strtoupper($utama->nama_pengukur_satu); ?></strong></strong>
		</td>
		<td align="center" width="60%">
			Pemilik tanah, Ahli Waris<br>
			<table>
				<?php foreach($pemilik as $x => $row): ?>
				<tr style="text-align: left;">
					<td style="text-align: right; width: 90px"><?php echo $x+1; ?>.&nbsp;&nbsp;</td>
					<td><?php echo $row->nama; ?></td>
					<td>............................</td>
				</tr>
				<?php endforeach; ?>
			</table>

		</td>
	</tr>
</table>

<p><u>Saksi-saksi :</u></p>

<table>
	<?php foreach($saksi as $x => $row): ?>
	<tr>
		<td width="20px"><?php echo $x+1; ?>.</td>
		<td width="200px"><?php echo $row->nama; ?></td>
		<td>(.................................)</td>
	</tr>
	<?php endforeach; ?>
</table>
<br>
<div style="text-align: center;">
	Mengetahui :<br><br><br><br><br>
	EDY SUDARSONO,S.AP<br>
	Penata<br> 
	NIP.19590109 199303 1 001
</div>