<?php

require '../../include/config/conn_local.php';

session_start();

if ( isset( $_POST['submit'] ) ) {
	
	date_default_timezone_set('Asia/Jakarta');
	$spb		= substr(date('Y'), -2) . date('md') . date('His');
	$lent		= date('Y-m-d H:i:s');
	$submitter 	= strtoupper($_SESSION['login']);
	$div		= strtoupper($_SESSION['div']);
	$receiver	= strtoupper($_POST['receiver']);
	$item		= $_POST['item'];
	$qty 		= $_POST['qty'];
	$reason		= strtoupper($_POST['reason']);

	$qr_summary = "INSERT INTO db_spb_sum VALUES ('$spb', '$submitter', '$div', '$receiver', '$reason', '$lent', 1, '')";
	$summary 	= mysqli_query($connect, $qr_summary) or die(mysqli_error($connect));

	for ( $i = 0; $i < sizeof($item); $i++ ) {
		if( $item[$i] != '' ) {
			$id = $spb . sprintf('%02s', $i + 1);
			mysqli_query($connect, "INSERT INTO db_spb
						VALUES
				('$id', '$spb', '" . strtoupper(substr($item[$i], 3)) . "', '" . strtoupper($qty[$i]) . "')") or die(mysqli_error($conn));
		}
	}

	header('Location: print.php?key=' . $spb);
	return false;

}

echo 	'<script>
			alert("Data tidak dikenali!");
			window.location.replace("index.php");
		</script>';

?>