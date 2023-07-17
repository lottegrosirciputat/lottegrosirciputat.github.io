<?php

include '../../include/config/conn.php';
$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM db_sgm_patrol WHERE id = '$id'");
$data = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../include/assets/css/root.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
	<div class="center">
		<div class="form-input">
			<label for="file-ip-1" id="label">Upload</label>
			<div class="preview">
				<img id="file-ip-1-preview">
			</div>
			<form action="applications/sgm_patrol/save_act" method="post" id="form" enctype="multipart/form-data">
 				<input type="file" id="file-ip-1" name="image" accept="image/*" onchange="showPreview(event);">
 				<input type="hidden" class="data-patrol" name="id" value="<?= $data['id'] ?>">
 				<input type="hidden" class="data-patrol" name="div" value="<?= $data['division'] ?>">
				<div class="button_upload">
					<label for="file-ip-1">Ganti</label>
	 				<button type="submit" id="submit" name="submit">Submit</button>
				</div>
 			</form>
	  </div>
	</div>

    <script src="../include/assets/js/index.js"></script>
    <script src="../include/assets/js/greeting.js"></script>

    <script type="text/javascript">

		function showPreview(event){
			if(event.target.files.length > 0){
			var src = URL.createObjectURL(event.target.files[0]);
			var contPreview = document.querySelector(".preview");
			var preview = document.getElementById("file-ip-1-preview");
			var label = document.getElementById("label");
			var form = document.getElementById("form");
			preview.src = src;
			contPreview.style.width = '100%';
			label.style.display = "none";
			preview.style.display = "flex";
			preview.style.marginTop = "10px";
			form.style.display = "flex";
			document.getElementById('tier').focus();
			}
		}
    </script>
    
</body>
</html>