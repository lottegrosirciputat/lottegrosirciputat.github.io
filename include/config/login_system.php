<?php 

session_start();

include 'conn.php';

if ( isset($_POST['submit']) ) {
	
	$id 	= $_POST["id"];
	$pw 	= $_POST["pw"];
	$loc 	= $_POST["loc"];
	
	$result = mysqli_query($conn, "SELECT * FROM user WHERE emp_id = '$id'");

	if( mysqli_num_rows($result) === 1 ) {

	    $data = mysqli_fetch_array($result);

	    // if ( $data['emp_div'] == 'OUTSOURCE' ) {

		    if( password_verify($pw, $data['password']) ) {

		        // ==========  S G M   S E S S I O N  ========== //

		        $_SESSION['emp_id'] = $data['emp_id'];
		        $_SESSION['emp_nm'] = strtolower($data['emp_nm']);
		        $_SESSION['emp_div'] = strtolower($data['emp_div']);
		        $_SESSION['div'] = strtolower($data['emp_div']);
				header("Location: ../../");
				return false;

		    }

		 //    $_SESSION['pw'] = 'Kata sandi salah!';
		 //    header("Location: ../../");
			// return false;

		// }

		// header("Location: ../../nonfood/");
		// return false;

	}

	// $_SESSION['id'] = 'Id tidak ditemukan!';
	// header("Location: ../../");

}