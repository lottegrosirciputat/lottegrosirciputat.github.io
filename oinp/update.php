<?php

require '../../include/config/conn_local.php';

session_start();

if ( isset( $_POST['submit'] ) ) {
	
	date_default_timezone_set('Asia/Jakarta');
	$key		= $_POST['key'];
	$amount		= preg_replace("/[^0-9]/", "", $_POST['amount']);
	$giver		= $_POST['giver'];
	$utilities	= $_POST['utilities'];
	$floor		= strtolower($_POST['floor']);
	$buyer		= strtolower($_POST['buyer']);


	$qr_summary = "UPDATE db_tt_oinp SET 
					amount 		= '$amount',
					giver 		= '$giver',
					utilities 	= '$utilities',
					floor 		= '$floor',
					buyer 		= '$buyer'
				WHERE reg = '$key'";
	$summary 	= mysqli_query($connect, $qr_summary) or die(mysqli_error($connect));

	// header('Location: index.php');
	header('Location: print.php?key=' . $key);
	return false;

}

echo 	'<script>
			alert("Data tidak dikenali!");
			window.location.replace("index.php");
		</script>';

?>