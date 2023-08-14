<?php

require '../../include/config/conn_local.php';

session_start();

if ( isset( $_POST['submit'] ) ) {
	
	date_default_timezone_set('Asia/Jakarta');
	$returned	= date('Y-m-d H:i:s');
	$spb		= $_POST['spb'];

	$qr_summary = "UPDATE db_spb_sum SET status = 2, returned = '$returned' WHERE id = '$spb'";
	$summary 	= mysqli_query($connect, $qr_summary) or die(mysqli_error($connect));

	echo 	'<script>
				alert("Data berhasil diperbarui!");
				window.location.replace("summary.php");
			</script>';

} elseif ( isset( $_POST['delete'] ) ) {
	
	date_default_timezone_set('Asia/Jakarta');
	$returned	= date('Y-m-d H:i:s');
	$spb		= $_POST['spb'];

	$qr_sum = "DELETE FROM db_spb_sum WHERE id = '$spb'";
	$sum 	= mysqli_query($connect, $qr_sum) or die(mysqli_error($connect));

	$qr_spb = "DELETE FROM db_spb WHERE no_spb = '$spb'";
	$result = mysqli_query($connect, $qr_spb) or die(mysqli_error($connect));

	echo 	'<script>
				alert("Data berhasil dihapus!");
				window.location.replace("summary.php");
			</script>';

}

echo 	'<script>
			alert("Data tidak dikenali!");
			window.location.replace("summary.php");
		</script>';

?>