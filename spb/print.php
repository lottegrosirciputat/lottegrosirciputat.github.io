<?php 

require '../../vendor/autoload.php';
require '../../include/config/conn_local.php';
require '../../include/function.php';

$key = $_GET['key'];

$query1 = mysqli_query($connect, "SELECT * FROM db_spb WHERE no_spb = '$key'");
$rows 	= mysqli_num_rows($query1);
while( $result1 = mysqli_fetch_array($query1) ) {
	$data1[] = $result1;
}

$query2 = mysqli_query($connect, "SELECT * FROM db_spb_sum WHERE id = '$key'");
$data2 	= mysqli_fetch_array($query2);

$mpdf 		= new \Mpdf\Mpdf([
	'mode' => 'utf-8',
	'format' => 'A4',
	// 'format' => 'A4-L',
	'default_font' => 'chelvetica',
	'default_font_size' => 9,
]);

$mpdf->AddPageByArray([
    'margin-left' => 5,
    'margin-right' => 5,
    'margin-top' => 5,
    'margin-bottom' => 5,
]);

$html = '<!DOCTYPE html>
<html>
<head>
	<title>Print</title>
</head>

<style>
.container {
	position: relative;
	display: block;
	width: 100%;
	height: 13cm;
}
.header1-1 {
	width: 100%;
}
.header1-1 h4 {
	margin-top: -45px;
	text-align: center;
}
.main {
	position: relative;
	width: 100%;
}
.main table {
	width: 100%;
	border-collapse: collapse;
	border: 2px solid black;
}
.main table tr {
	width: 100%;
	border: 1px solid black;
}
.main table tr td {
	width: 25%;
	border: 1px solid black;
	padding: 2px 5px;
	font-size: 15px;
}
.main table tr td:nth-child(2) {
	width: 50%;
}
.main table tr td:nth-child(3) {
	width: 20%;
}
.main .ttd,
.main .ttd tr,
.main .ttd tr td {
	border: none;
	font-size: 13px;
}
.main .ttd tr td {
	width: 25%;
	text-align: center;
}.main .ttd tr td:nth-child(2) {
	width: 25%;
}
.main .ttd tr td:nth-child(3) {
	width: 25%;
}
.main .ttd .sign td {
	height: 75px;
}
</style>

<body>

	<div class="container">
		<div class="header1-1">
			<img src="../../include/assets/images/logo-lsi.png" alt="Logo LSI06" width="150px">
			<h4>SURAT PENGELUARAN BARANG<br>STORE 06 - LOTTE GROSIR CIPUTAT<br>Jl. Ir. H. Juanda No.1, Ciputat, Tangerang Selatan 15412</h4>
		</div> <!-- end header1-1 class -->
		<div class="header1-2">
			<p>Tanggal : ' . substr($data2["id"], 4, 2) . ' ' . monthnumtobulan(substr($data2["id"], 2, 2)) . ' ' . '20' . date(substr($data2["id"], 0, 2)) . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hal">HALAMAN 1 : PENGIRIM</span></p>
		</div> <!-- end header1-2 class -->
		<div class="main">
			<table>
				<tr>
					<td>No. SPB</td>
					<td colspan="3">' . substr($data2["id"], 0, 6) . '_' . substr($data2["id"], -6) . '</td>
				</tr>
				<tr>
					<td>Nama Karyawan</td>
					<td>' . $data2["submitter"] . '</td>
					<td>Divisi</td>
					<td>' . $data2["division"] . ' 06</td>
				</tr>
				<tr>
					<td>Tanggal Pengeluaran</td>
					<td>' . substr($data2["id"], 4, 2) . ' ' . monthnumtobulan(substr($data2["id"], 2, 2)) . ' ' . '20' . date(substr($data2["id"], 0, 2)) . '</td>
					<td>Penerima</td>
					<td>' . $data2["receiver"] . '</td>
				</tr>
				<tr>
					<td colspan="2" align="center" style="font-weight: bold;">Jenis Barang</td>
					<td colspan="2" align="center" style="font-weight: bold;">Jumlah</td>
				</tr>';

				for( $i = 0; $i < $rows; $i++ ) :
					$html .= '<tr>
						<td colspan="2">' . ($i+1) . '. ' . $data1[$i]['item'] . '</td>
						<td colspan="2">' . $data1[$i]['qty'] . '</td>
					</tr>';
				endfor;

				$html .= '<tr>
					<td>Alasan</td>
					<td colspan="3">' . $data2["reason"] . '</td>
				</tr>
			</table>
			<p><b>Note : Mohon untuk tulis nama saat tanda tangan.</b></p>
			<table class="ttd">
				<tr>
					<td>' . $data2["division"] . ' 06</td>
					<td>SGM/MOD</td>
					<td>Security</td>
					<td>' . $data2["receiver"] . '</td>
				</tr>
				<tr class="sign">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td><u>' . $data2["submitter"] . '</u></td>
					<td>_________________</td>
					<td>_________________</td>
					<td>_________________</td>
				</tr>
			</table>
		</div> <!-- end main class -->
	</div> <!-- end container class -->

	<hr>

	<div class="container">
		<div class="header1-1">
			<img src="../../include/assets/images/logo-lsi.png" alt="Logo LSI06" width="150px">
			<h4>SURAT PENGELUARAN BARANG<br>STORE 06 - LOTTE GROSIR CIPUTAT<br>Jl. Ir. H. Juanda No.1, Ciputat, Tangerang Selatan 15412</h4>
		</div> <!-- end header1-1 class -->
		<div class="header1-2">
			<p>Tanggal : ' . substr($data2["id"], 4, 2) . ' ' . monthnumtobulan(substr($data2["id"], 2, 2)) . ' ' . '20' . date(substr($data2["id"], 0, 2)) . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hal">HALAMAN 2 : PENERIMA</span></p>
		</div> <!-- end header1-2 class -->
		<div class="main">
			<table>
				<tr>
					<td>No. SPB</td>
					<td colspan="3">' . substr($data2["id"], 0, 6) . '_' . substr($data2["id"], -6) . '</td>
				</tr>
				<tr>
					<td>Nama Karyawan</td>
					<td>' . $data2["submitter"] . '</td>
					<td>Divisi</td>
					<td>' . $data2["division"] . ' 06</td>
				</tr>
				<tr>
					<td>Tanggal Pengeluaran</td>
					<td>' . substr($data2["id"], 4, 2) . ' ' . monthnumtobulan(substr($data2["id"], 2, 2)) . ' ' . '20' . date(substr($data2["id"], 0, 2)) . '</td>
					<td>Penerima</td>
					<td>' . $data2["receiver"] . '</td>
				</tr>
				<tr>
					<td colspan="2" align="center" style="font-weight: bold;">Jenis Barang</td>
					<td colspan="2" align="center" style="font-weight: bold;">Jumlah</td>
				</tr>';

				for( $i = 0; $i < $rows; $i++ ) :
					$html .= '<tr>
						<td colspan="2">' . ($i+1) . '. ' . $data1[$i]['item'] . '</td>
						<td colspan="2">' . $data1[$i]['qty'] . '</td>
					</tr>';
				endfor;

				$html .= '<tr>
					<td>Alasan</td>
					<td colspan="3">' . $data2["reason"] . '</td>
				</tr>
			</table>
			<p><b>Note : Mohon untuk tulis nama saat tanda tangan.</b></p>
			<table class="ttd">
				<tr>
					<td>' . $data2["division"] . ' 06</td>
					<td>SGM/MOD</td>
					<td>Security</td>
					<td>' . $data2["receiver"] . '</td>
				</tr>
				<tr class="sign">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td><u>' . $data2["submitter"] . '</u></td>
					<td>_________________</td>
					<td>_________________</td>
					<td>_________________</td>
				</tr>
			</table>
		</div> <!-- end main class -->
	</div> <!-- end container class -->

</body>
</html>';

$filename = 'Stk_Adj_'.$r['division'].'_06006_'.$r['sc_id'].'.pdf';
$mpdf->WriteHTML($html);
$mpdf->Output($filename, \Mpdf\Output\Destination::INLINE);

 ?>