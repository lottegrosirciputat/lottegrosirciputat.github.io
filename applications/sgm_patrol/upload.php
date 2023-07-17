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
			<form action="../applications/sgm_patrol/save_img" method="post" id="form" enctype="multipart/form-data">
 				<input type="file" id="file-ip-1" name="image" accept="image/*" onchange="showPreview(event);">
 				<select name="div" class="data-patrol">
 					<option value="NF">NF</option>
 					<option value="DF">DF</option>
 					<option value="FF">FF</option>
 					<option value="GR">GR</option>
 					<option value="DS">DS</option>
 					<option value="ALC">ALC</option>
 					<option value="CIS">CIS</option>
 					<option value="CASHIER">CASHIER</option>
 					<option value="FACILITY">FACILITY</option>
 				</select>
 				<textarea name="problem" class="data-patrol" cols="50" rows="5"></textarea>
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