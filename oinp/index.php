<?php

session_start();
require '../../include/function.php';
require '../../include/config/conn_local.php';
date_default_timezone_set('Asia/Jakarta');
$today 	= date("d ").monthtobulan(date("M")).date(" Y");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="../../include/assets/images/lotte.ico">
	<link rel="stylesheet" href="style.css" />
	<title>ALC LSI-06</title>
</head>
<body onload="document.getElementById('amount').focus();">
	<div class="container">
		<div class="header1-1">
			<img src="../../include/assets/images/logo-lsi.png" alt="Logo LSI06">
		</div> <!-- end header1-1 class -->
		<div class="header1-2">
			<p><b>Lotte ST 06006 <span>No Reg : <?= substr(date('Y'), -2) . date('md') . '_' ?></span></b></p>
			<p>Tanggal <?= $today ?></p>
		</div> <!-- end header1-2 class -->
		<div class="header1-3">
			<h3>TANDA TERIMA PENERIMAAN OTHER INCOME NON PROGRAM</h3>
		</div> <!-- end header1-3 class -->
		<div class="main">
			<form action="save.php" method="post" onSubmit="return window.confirm('Apakah Anda yakin?');">
				<table class="table1">
					<tr>
						<th>Uang Sejumlah</th>
						<td>: </td>
						<td><textarea name="amount" id="amount" required></textarea></td>
					</tr>
					<tr>
						<th>Dari</th>
						<td>: </td>
						<td><textarea name="giver" required></textarea></td>
					</tr>
					<tr>
						<th>Untuk Keperluan</th>
						<td>: </td>
						<td><textarea name="utilities" required></textarea></td>
					</tr>
				</table>
				<table class="table2">
					<tr>
						<td>Dibuat Oleh</td>
						<td colspan="3">Mengetahui</td>
						<td>Menerima</td>
					</tr>
					<tr class="sign">
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>MOD Floor **</td>
						<td>SH ALC / Supp Mgr</td>
						<td>Local Buyer</td>
						<td>SGM</td>
						<td>Store Admin</td>
					</tr>
					<tr>
						<td><input type="text" name="floor" required></td>
						<td>Yuaprino</td>
						<td><input type="text" name="buyer" required></td>
						<td>Anton Herawan</td>
						<td>Nuni Kurniawati</td>
					</tr>
				</table>
				<p>* Lampirkan Bukti Transfer</p>
				<p>** Yang menerima info transfer dari customer</p>
				<p class="footer">Dokumen disimpan di Store Admin</p>
				<div class="submit">
					<button type="submit" name="submit">Submit</button>
				</div> <!-- end submit class -->
			</form>
		</div> <!-- end main class -->
	</div> <!-- end container class -->

	<script type="text/javascript">

		let rupiah = document.getElementById('amount');
		rupiah.addEventListener('keyup', function (e) {
		    rupiah.value = formatRupiah(this.value, 'Rp. ');
		});

		function formatRupiah(angka, prefix) {
		    let number_string = angka.replace(/[^,\d]/g, '').toString(),
		        split = number_string.split(','),
		        sisa = split[0].length % 3,
		        rupiah = split[0].substr(0, sisa),
		        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		    if (ribuan) {
		        separator = sisa ? '.' : '';
		        rupiah += separator + ribuan.join('.');
		    }

		    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}

	</script>

</body>
</html>