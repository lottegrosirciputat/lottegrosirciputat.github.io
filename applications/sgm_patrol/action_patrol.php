<?php

session_start();
include '../../include/config/conn.php';

date_default_timezone_set('Asia/Jakarta');
$date = date("Y-m-d");

if( $_SESSION['div'] != '' ) {
	$key = "division = '" . $_SESSION['div'] . "' AND date = '$date'";
} else {
	$key = "date = '$date'";
}


$sql = "SELECT * FROM db_sgm_patrol WHERE ";
$sql .= $key;
$query = mysqli_query($conn, $sql);
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
    <!-- <link rel="stylesheet" href="../include/assets/css/root.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>

		<h1>Action Patrol <span>at <span id="head-date"><?= date("d F Y") ?></span></span></h1>
		<div class="sort-sum-patrol">
			<label for="date">Date :</label>
			<input type="date" id="date" value="<?= date('Y-m-d') ?>" onchange="sort(this)">
			<label for="divisi">Divisi :</label>
			<select id="divisi" onchange="sort(this)">
				<?php if ( $_SESSION['div'] == '' ) : ?>
					<option value="*" selected>All</option>
				<?php else : ?>
					<option value="*">All</option>
				<?php endif; ?>

				<?php if ( $_SESSION['div'] == 'NF' ) : ?>
					<option value="NF" selected>NF</option>
				<?php else : ?>
					<option value="NF">NF</option>
				<?php endif; ?>

				<?php if ( $_SESSION['div'] == 'DF' ) : ?>
					<option value="DF" selected>DF</option>
				<?php else : ?>
					<option value="DF">DF</option>
				<?php endif; ?>

				<?php if ( $_SESSION['div'] == 'FF' ) : ?>
					<option value="FF" selected>FF</option>
				<?php else : ?>
					<option value="FF">FF</option>
				<?php endif; ?>

				<?php if ( $_SESSION['div'] == 'GR' ) : ?>
					<option value="GR" selected>GR</option>
				<?php else : ?>
					<option value="GR">GR</option>
				<?php endif; ?>

				<?php if ( $_SESSION['div'] == 'DS' ) : ?>
					<option value="DS" selected>DS</option>
				<?php else : ?>
					<option value="DS">DS</option>
				<?php endif; ?>

				<?php if ( $_SESSION['div'] == 'ALC' ) : ?>
					<option value="ALC" selected>ALC</option>
				<?php else : ?>
					<option value="ALC">ALC</option>
				<?php endif; ?>

				<?php if ( $_SESSION['div'] == 'CIS' ) : ?>
					<option value="CIS" selected>CIS</option>
				<?php else : ?>
					<option value="CIS">CIS</option>
				<?php endif; ?>

				<?php if ( $_SESSION['div'] == 'CASHIER' ) : ?>
					<option value="CASHIER" selected>CASHIER</option>
				<?php else : ?>
					<option value="CASHIER">CASHIER</option>
				<?php endif; ?>
			</select>
			<label for="progress">Progress :</label>
			<select id="progress" onchange="sort(this)">
				<option value="*">All</option>
				<option value="completed">Completed</option>
				<option value="progress">On Progress</option>
			</select>
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
					<tr onclick="act(this)" id="<?= $data[$i]['id'] ?>">
			        <!-- <tr class="action_upload" id="applications/sgm_patrol/upload_action?id=<?= $data[$i]['id'] ?>"> -->
			        	<td><?= $data[$i]['division'] ?></td>
			        	<td><?= $data[$i]['temuan'] ?></td>
			        	<td><img src="applications/sgm_patrol/images/<?= $data[$i]['id'] ?>"></td>
			        	<?php if ( $data[$i]['progress'] == '' ) : ?>
			        		<td>On Progress</td>
		        		<?php else : ?>
			        		<td><img src="applications/sgm_patrol/images/<?= $data[$i]['progress'] ?>"></td>
		        		<?php endif; ?>
			        </tr>
		    		<?php endfor; ?>
		    	</tbody>
			</table>
		</div>


    <script type="text/javascript">
 
	    function act(el){

	      var temuan = $(el).attr('id');

	      $('#content').load('applications/sgm_patrol/upload_action.php?id=' + temuan);

	      return false;

	    }

    	function sort(el) {
    		var date = document.getElementById("date").value;
    		var monthVal = date.substr(-5, 2);
    		var divisi = document.getElementById("divisi").value;
    		var progress = document.getElementById("progress").value;
    		var data = '?date=' + date + '&divisi=' + divisi + '&progress=' + progress;

    		var xhr = new XMLHttpRequest();
		    xhr.onreadystatechange = function() {

		        if( xhr.readyState == 4 && xhr.status == 200 ) {
					
		            var response = this.responseText;

		            document.getElementById("sum-patrol-content").innerHTML = response;

		            if( monthVal == '01' ) {
		            	var month = 'January';
		            } else if ( monthVal == '02' ) {
		            	var month = 'February';
		            } else if ( monthVal == '03' ) {
		            	var month = 'Maret';
		            } else if ( monthVal == '04' ) {
		            	var month = 'April';
		            } else if ( monthVal == '05' ) {
		            	var month = 'May';
		            } else if ( monthVal == '06' ) {
		            	var month = 'June';
		            } else if ( monthVal == '07' ) {
		            	var month = 'July';
		            } else if ( monthVal == '08' ) {
		            	var month = 'August';
		            } else if ( monthVal == '09' ) {
		            	var month = 'September';
		            } else if ( monthVal == '10' ) {
		            	var month = 'October';
		            } else if ( monthVal == '11' ) {
		            	var month = 'November';
		            } else if ( monthVal == '12' ) {
		            	var month = 'December';
		            }

		            document.getElementById("head-date").textContent = date.substr(-2) + ' ' + month + ' ' + date.substr(0, 4);

		$(document).ready(function(){

			$('.action_upload').click(function(){

			  var hal = $(this).attr('id');

			  $('#content').load(hal);

			  return false;

			});

		});
		            
		        }

		    }

		    // eksekusi
		    xhr.open('GET', 'include/ajax/sort_action_patrol.php' + data, true);
		    xhr.send();

    	}
		$(document).ready(function(){

			$('.action_upload').click(function(){

			  var hal = $(this).attr('id');

			  $('#content').load(hal);

			  return false;

			});

		});
    </script>
    
</body>
</html>