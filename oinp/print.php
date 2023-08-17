<?php 

require '../../vendor/autoload.php';
require '../../include/config/conn_local.php';
require '../../include/function.php';

$key = $_GET['key'];

$query = mysqli_query($connect, "SELECT * FROM db_tt_oinp WHERE reg = '$key'");
$data 	= mysqli_fetch_array($query);

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
.header1-1,
.header1-2,
.header1-3 {
	width: 100%;
	position: relative;
}
.header1-2 {
	width: 100%;
	position: relative;
}
.header1-2 p {
	width: 100%;
	margin-top: 5px;
	margin-bottom: 0;
}
.header1-2 p span {
	position: absolute;
	right: 50px;
}
.header1-3 h3 {
	width: 100%;
	text-align: center;
	margin-top: 20px;
	font-size: 17px;
}
.main {
	position: relative;
	display: block;
	width: 100%;
}
.main .table1 {
	display: block;
	position: relative;
	width: 100%;
	border-collapse: collapse;
	font-size: 15px;
}
.main .table1 tr {
	width: 100%;
	display: block;
}
.main .table1 tr th {
	display: block;
	width: 200px;
	padding: 10px 0;
	text-align: left;
}
.main .table2 {
	width: 100%;
	margin: 30px 0;
	border-collapse: collapse;
	border: 1px solid black;
}
.main .table2 tr {
	width: 100%;
	border: 1px solid black;
}
.main .table2 tr:first-child {
	background-color: #A8D1F7;
}
.main .table2 .sign td {
	height: 75px;
}
.main .table2 tr td {
	width: 20%;
	border: 1px solid black;
	padding: 2px 5px;
	font-size: 15px;
	text-align: center;
	font-weight: bold;
}
.main .foot p {
	position: relative;
	display: block;
	padding-top: -10px;
}
.main .footer {
	width: 50%;
	margin-left: 50%;
	font-size: .9em;
	background-color: #e31f27;
	padding: 5px 0;
	text-align: center;
	color: white;
}
</style>

<body>

	<div class="container">
		<div class="header1-1">
			<img src="../../include/assets/images/logo-lsi.png" alt="Logo LSI06" width="175px">
		</div> <!-- end header1-1 class -->
		<div class="header1-2">
			<p><b>Lotte ST 06006&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Reg : ' . substr($data["reg"], 0, 6) . '_' . substr($data["reg"], -6) . '</b></p>
			<p>Tanggal ' . substr($data["reg"], 4, 2) . ' ' . monthnumtobulan(substr($data["reg"], 2, 2)) . ' ' . '20' . date(substr($data["reg"], 0, 2)) . '</p>
		</div> <!-- end header1-2 class -->
		<div class="header1-3">
			<h3>TANDA TERIMA PENERIMAAN OTHER INCOME NON PROGRAM</h3>
		</div> <!-- end header1-3 class -->
		<div class="main">
			<table class="table1">
				<tr>
					<th>Uang Sejumlah</th>
					<td>: Rp. ' . number_format($data["amount"], 0, ",", ".") . '-,</td>
				</tr>
				<tr>
					<th>Dari</th>
					<td>: ' . $data["giver"] . '</td>
				</tr>
				<tr>
					<th>Untuk Keperluan</th>
					<td>: ' . $data["utilities"] . '</td>
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
					<td style="text-transform: Capitalize;">' . $data["floor"] . '</td>
					<td>Yuaprino</td>
					<td style="text-transform: Capitalize;">' . $data["buyer"] . '</td>
					<td>Anton Herawan</td>
					<td>Nuni Kurniawati</td>
				</tr>
			</table>
			<div class="foot">
				<p>* Lampirkan Bukti Transfer</p>
				<p>** Yang menerima info transfer dari customer</p>
				<p class="footer">Dokumen disimpan di Store Admin</p>
			</div>
		</div> <!-- end main class -->
	</div> <!-- end container class -->

</body>
</html>';

$filename = 'Stk_Adj_'.$r['division'].'_06006_'.$r['sc_id'].'.pdf';
$mpdf->WriteHTML($html);
$mpdf->Output($filename, \Mpdf\Output\Destination::INLINE);

 ?>