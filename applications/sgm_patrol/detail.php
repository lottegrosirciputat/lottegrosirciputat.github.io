<?php

session_start();
include '../../include/config/conn.php';

$temuan = $_GET['temuan'];
$query = mysqli_query($conn, "SELECT * FROM db_sgm_patrol WHERE id = '$temuan'");
$data = mysqli_fetch_array($query);

if(isset($_POST["delete"])) {

	$id = $_POST['id'];
	mysqli_query($conn, "DELETE FROM db_sgm_patrol WHERE id = '$temuan'") or die(mysqli_error($conn) );
	return false;
	$_SESSION['delete'] = '1 data berhasil dihapus!';
	header("Location: ../../sgm/");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>

	<div class="cont-sum-patrol">
		<h1>Summary Patrol <span>at <span><?= date("d F Y") ?></span></span></h1>
		<div class="main-sum-patrol">
			<table>
				<thead>
				    <tr>
				      <th>Divisi</th>
				      <th>Temuan</th>
				      <th>Before</th>
				      <th>After</th>
	    			</tr>
				<thead>
				<tbody id="sum-patrol-content">
			        <tr>
			        	<td><?= $data['division'] ?></td>
			        	<td><?= $data['temuan'] ?></td>
			        	<td><img src="../applications/sgm_patrol/images/<?= $data['id'] ?>"></td>
			        	<?php if ( $data['progress'] == '' ) : ?>
			        		<td>On Progress</td>
		        		<?php else : ?>
			        		<td><img src="../applications/sgm_patrol/images/<?= $data['progress'] ?>"></td>
		        		<?php endif; ?>
			        </tr>
		    	</tbody>
			</table>
			<form action="../applications/sgm_patrol/delete.php" method="post" class="sum-button-act">
				<input type="hidden" name="id" value="<?= $data['id'] ?>">
				<button type="submit" name="delete">Delete</button>
			</form>
		</div>
	</div>
    
</body>
</html>