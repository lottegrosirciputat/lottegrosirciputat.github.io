<?php

session_start();
include '../../include/config/conn.php';

$date = $_GET['date'];
$divisi = $_GET['divisi'];
$progress = $_GET['progress'];

if ( $divisi == '' ) {
	$key = "date = '$date' ";
} else {
	$key = "date = '$date' AND division = '$divisi' ";
}

$query = "SELECT * FROM db_sgm_patrol WHERE ";
$query .= $key;
$query .= "ORDER BY division";
$sql = mysqli_query($conn, $query);
$rows = mysqli_num_rows($sql);
while ( $result = mysqli_fetch_array($sql) ) {
	$data[] = $result;
}

if ( $progress == 'completed' ) :

	for ( $i = 0; $i < $rows; $i++ ) :

		if ( $data[$i]['progress'] != '' ) : ?>

	        <tr onclick="del(this)" id="<?= $data[$i]['id'] ?>">
	        	<td><?= $data[$i]['division'] ?></td>
	        	<td><?= $data[$i]['temuan'] ?></td>
	        	<td><img src="../applications/sgm_patrol/images/<?= $data[$i]['id'] ?>"></td>
	        	<?php if ( $data[$i]['progress'] == '' ) : ?>
	        		<td>On Progress</td>
        		<?php else : ?>
	        		<td><img src="../applications/sgm_patrol/images/<?= $data[$i]['progress'] ?>"></td>
        		<?php endif; ?>
	        </tr>

    	<?php endif; 

	endfor; 

elseif ( $progress == 'progress' ) :

	for ( $i = 0; $i < $rows; $i++ ) :

		if ( $data[$i]['progress'] == '' ) : ?>

	        <tr onclick="del(this)" id="<?= $data[$i]['id'] ?>">
	        	<td><?= $data[$i]['division'] ?></td>
	        	<td><?= $data[$i]['temuan'] ?></td>
	        	<td><img src="../applications/sgm_patrol/images/<?= $data[$i]['id'] ?>"></td>
	        	<?php if ( $data[$i]['progress'] == '' ) : ?>
	        		<td>On Progress</td>
        		<?php else : ?>
	        		<td><img src="../applications/sgm_patrol/images/<?= $data[$i]['progress'] ?>"></td>
        		<?php endif; ?>
	        </tr>

    	<?php endif; 

	endfor; 

else : 

	for ( $i = 0; $i < $rows; $i++ ) : ?>

        <tr onclick="del(this)" id="<?= $data[$i]['id'] ?>">
        	<td><?= $data[$i]['division'] ?></td>
        	<td><?= $data[$i]['temuan'] ?></td>
        	<td><img src="../applications/sgm_patrol/images/<?= $data[$i]['id'] ?>"></td>
        	<?php if ( $data[$i]['progress'] == '' ) : ?>
        		<td>On Progress</td>
    		<?php else : ?>
        		<td><img src="../applications/sgm_patrol/images/<?= $data[$i]['progress'] ?>"></td>
    		<?php endif; ?>
        </tr>

    <?php endfor;

endif;

?>