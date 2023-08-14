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
	<link rel="stylesheet" href="spb.css" />
	<title>ALC LSI-06</title>
</head>
<body onload="document.getElementById('receiver').focus();">
	<div class="container">
		<div class="header1-1">
			<img src="../../include/assets/images/logo-lsi.png" alt="Logo LSI06">
			<h4>SURAT PENGELUARAN BARANG<br>STORE 06 - LOTTE GROSIR CIPUTAT<br>Jl. Ir. H. Juanda No.1, Ciputat, Tangerang Selatan 15412</h4>
		</div> <!-- end header1-1 class -->
		<div class="header1-2">
			<p>Tanggal : <?= $today ?></p>
		</div> <!-- end header1-2 class -->
		<div class="main">
			<form action="save.php" method="post" onSubmit="return window.confirm('Apakah Anda yakin?');">
				<table>
					<tr>
						<td>No. SPB</td>
						<td colspan="3"><?= substr(date('Y'), -2) . date('md') . '_' ?></td>
					</tr>
					<tr>
						<td>Nama Karyawan</td>
						<td><?= $_SESSION['login'] ?></td>
						<td>Divisi</td>
						<td><?= $_SESSION['div'] ?> 06</td>
					</tr>
					<tr>
						<td>Tanggal Pengeluaran</td>
						<td><?= $today ?></td>
						<td>Penerima</td>
						<td><input id="receiver" type="text" name="receiver" required></td>
					</tr>
					<tr>
						<td colspan="2" align="center" style="font-weight: bold;">Jenis Barang</td>
						<td colspan="2" align="center" style="font-weight: bold;">Jumlah</td>
					</tr>

					<?php for( $i = 1; $i <= 5; $i++ ) : ?>
						<tr>
							<td colspan="2"><input type="text" name="item[]" id="<?= $i ?>" onfocus="no(this);" onkeyup="item(this);" onblur="nihil(this);"></td>
							<td colspan="2"><input type="text" name="qty[]"></td>
						</tr>
					<?php endfor; ?>

					<tr>
						<td>Alasan</td>
						<td colspan="3"><input type="text" name="reason" required></td>
					</tr>
				</table>

				<div class="submit">
					<button type="submit" name="submit">Submit</button>
				</div> <!-- end submit class -->
			</form>
		</div> <!-- end main class -->
	</div> <!-- end container class -->

	<script type="text/javascript">
		function no(el) {
			if ( el.value == '' ) {
				el.value = el.getAttribute('id') + '. ';
			}
		}

		function item(el) {
			if ( el.value == '' ) {
				el.value = el.getAttribute('id') + '. ';
			}
		}

		function nihil(el) {
			if ( el.value == el.getAttribute('id') + '. ' ) {
				el.value = '';
			}
		}
	</script>

</body>
</html>