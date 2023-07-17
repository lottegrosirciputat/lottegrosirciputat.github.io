<?php

session_start();
include '../../include/config/conn.php';

date_default_timezone_set('Asia/Jakarta');
$date = date("Y-m-d");
$query = mysqli_query($conn, "SELECT * FROM db_sgm_patrol WHERE date = '$date'");
$rows = mysqli_num_rows($query);
while ( $result = mysqli_fetch_array($query) ) {
	$data[] = $result;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../include/assets/css/root.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>

	<div class="cont-sum-patrol">
		<h1>Summary Patrol <span>at <span><?= date("d F Y") ?></span></span></h1>
		<div class="sort-sum-patrol">
			<label for="date">Date :</label>
			<input type="date" id="date" value="<?= date('Y-m-d') ?>" onchange="sort(this)">
			<label for="divisi">Divisi :</label>
			<select id="divisi" onchange="sort(this)">
				<option value="">All</option>
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
			<label for="progress">Progress :</label>
			<select id="progress" onchange="sort(this)">
				<option value="">All</option>
				<option value="completed">Completed</option>
				<option value="progress">On Progress</option>
			</select>
			<button type="button" onclick="pdf();"><img src="../include/assets/img/icons/pdf.png" width="35px"></button>
		</div>
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
    				<?php for ( $i = 0; $i < $rows; $i++ ) : ?>
			        <tr onclick="del(this)" id="<?= $data[$i]['id'] ?>">
			        <!-- <tr onclick="location.href = '../applications/sgm_patrol/detail?temuan=<?= $data[$i]['id'] ?>'"> -->
			        	<td><?= $data[$i]['division'] ?></td>
			        	<td><?= $data[$i]['temuan'] ?></td>
			        	<td><img src="../applications/sgm_patrol/images/<?= $data[$i]['id'] ?>"></td>
			        	<?php if ( $data[$i]['progress'] == '' ) : ?>
			        		<td>On Progress</td>
		        		<?php else : ?>
			        		<td><img src="../applications/sgm_patrol/images/<?= $data[$i]['progress'] ?>"></td>
		        		<?php endif; ?>
			        </tr>
		    		<?php endfor; ?>
		    	</tbody>
			</table>
		</div>
	</div>


    <script type="text/javascript">

    	function sort(el) {
    		var date = document.getElementById("date").value;
    		var divisi = document.getElementById("divisi").value;
    		var progress = document.getElementById("progress").value;
    		var data = '?date=' + date + '&divisi=' + divisi + '&progress=' + progress;

    		var xhr = new XMLHttpRequest();
		    xhr.onreadystatechange = function() {

		        if( xhr.readyState == 4 && xhr.status == 200 ) {
					
		            var response = this.responseText;

		            document.getElementById("sum-patrol-content").innerHTML = response;
		            
		        }

		    }

		    // eksekusi
		    xhr.open('GET', '../include/ajax/sort_sum_patrol.php' + data, true);
		    xhr.send();

    	}
 
	    function del(el){

	      var temuan = $(el).attr('id');

	      $('#content').load('../applications/sgm_patrol/detail.php?temuan=' + temuan);

	      return false;

	    }

	    function pdf() {

	    	var date = document.getElementById("date").value;
	    	var divisi = document.getElementById("divisi").value;
	    	var progress = document.getElementById("progress").value;

	    	// location.href = '../applications/pdf/sgm_patrol?date=' + date + '&divisi=' + divisi + '&progress=' + progress;
	    	var anchor = document.createElement('a');
			anchor.href = '../applications/pdf/sgm_patrol?date=' + date + '&divisi=' + divisi + '&progress=' + progress;
			anchor.target="_blank";
			anchor.click();

	    }
	    
    </script>
    
</body>
</html>