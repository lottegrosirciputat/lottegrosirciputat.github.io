<?php

session_start();
require '../../include/function.php';
require '../../include/config/conn_local.php';

$key = $_GET['spb'];

$query1 = mysqli_query($connect, "SELECT * FROM db_spb WHERE no_spb = '$key'");
$rows 	= mysqli_num_rows($query1);
while( $result1 = mysqli_fetch_array($query1) ) {
	$data1[] = $result1;
}

$query2 = mysqli_query($connect, "SELECT * FROM db_spb_sum WHERE id = '$key'");
$data2 	= mysqli_fetch_array($query2);

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
<body>
	<div class="container">
		<div class="header1-1">
			<img src="../include/assets/images/logo-lsi.png" alt="Logo LSI06">
			<h4>SURAT PENGELUARAN BARANG<br>STORE 06 - LOTTE GROSIR CIPUTAT<br>Jl. Ir. H. Juanda No.1, Ciputat, Tangerang Selatan 15412</h4>
		</div> <!-- end header1-1 class -->
		<div class="header1-2">
			<p>Tanggal : <?= substr($data2['id'], 4, 2) . ' ' . monthnumtobulan(substr($data2['id'], 2, 2)) . ' ' . '20' . date(substr($data2['id'], 0, 2)); ?></p>
		</div> <!-- end header1-2 class -->
		<div class="main">
			<form action="update.php" method="post" onSubmit="return window.confirm('Apakah Anda yakin?');">
				<table>
					<tr>
						<td>No. SPB</td>
						<td colspan="3"><?= substr($data2['id'], 0, 6) . '_' . substr($data2['id'], -6) ?></td>
					</tr>
					<tr>
						<td>Nama Karyawan</td>
						<td><?= $data2['submitter'] ?></td>
						<td>Divisi</td>
						<td><?= $data2['division'] ?> 06</td>
					</tr>
					<tr>
						<td>Tanggal Pengeluaran</td>
						<td><?= substr($data2['id'], 4, 2) . ' ' . monthnumtobulan(substr($data2['id'], 2, 2)) . ' ' . '20' . date(substr($data2['id'], 0, 2)); ?></td>
						<td>Penerima</td>
						<td><?= $data2['receiver'] ?></td>
					</tr>
					<tr>
						<td colspan="2" align="center" style="font-weight: bold;">Jenis Barang</td>
						<td colspan="2" align="center" style="font-weight: bold;">Jumlah</td>
					</tr>

					<?php for( $i = 0; $i < $rows; $i++ ) : ?>
						<tr>
							<td colspan="2"><?= $i+1 . '. ' . $data1[$i]['item'] ?></td>
							<td colspan="2"><?= $data1[$i]['qty'] ?></td>
						</tr>
					<?php endfor; ?>

					<tr>
						<td>Alasan</td>
						<td colspan="3"><?= $data2['reason'] ?></td>
					</tr>
				</table>

				<?php if ( $data2['status'] == 1 ) : ?>

					<div class="submit">
						<input type="hidden" name="spb" value="<?= $key ?>">
						<button type="submit" name="submit">Dikembalikan</button>
						<button type="button" onclick="location.href = 'print.php?key=<?= $key ?>'">Print</button>
						<button type="submit" name="delete">Hapus</button>
					</div> <!-- end submit class -->

				<?php else : ?>

					<?php

					$return = substr($data2['returned'], 8, 2) . ' ' . monthnumtobulan(substr($data2['returned'], 5, 2)) . ' ' . date(substr($data2['returned'], 0, 4));

					?>

					<p><br>Sudah dikembalikan pada <?= $return . ' jam ' .  substr($data2['returned'], -8)?>.</p>

				<?php endif; ?>

			</form>
		</div> <!-- end main class -->
	</div> <!-- end container class -->

</body>
</html>