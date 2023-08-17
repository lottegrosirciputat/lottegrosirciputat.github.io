<?php

require '../../include/config/conn_local.php';

session_start();

if ( isset( $_POST['submit'] ) ) {
	
	date_default_timezone_set('Asia/Jakarta');
	$reg		= substr(date('Y'), -2) . date('md') . date('His');
	$amount		= preg_replace("/[^0-9]/", "", $_POST['amount']);
	$giver		= $_POST['giver'];
	$utilities	= $_POST['utilities'];
	$floor		= strtolower($_POST['floor']);
	$buyer		= strtolower($_POST['buyer']);
	$submitter 	= strtolower($_SESSION['login']);


	$qr_summary = "INSERT INTO db_tt_oinp VALUES ('$reg', '$amount', '$giver', '$utilities', '$floor', '$buyer', '$submitter')";
	$summary 	= mysqli_query($connect, $qr_summary) or die(mysqli_error($connect));

	// header('Location: index.php');
	header('Location: print.php?key=' . $reg);
	return false;

}

echo 	'<script>
			alert("Data tidak dikenali!");
			window.location.replace("index.php");
		</script>';

?>