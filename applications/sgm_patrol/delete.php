<?php

session_start();
include '../../include/config/conn.php';

if(isset($_POST["delete"])) {

	$id = $_POST['id'];
	mysqli_query($conn, "DELETE FROM db_sgm_patrol WHERE id = '$id'") or die(mysqli_error($conn) );
	$_SESSION['delete'] = '1 data berhasil dihapus!';
	header("Location: ../../sgm/");
}