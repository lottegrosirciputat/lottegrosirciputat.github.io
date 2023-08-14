<?php 

session_start();
require '../../include/function.php';
include "../../include/config/conn_local.php";
date_default_timezone_set('Asia/Jakarta');

$query  = mysqli_query($connect, "SELECT * FROM db_spb spb JOIN db_spb_sum sum ON spb.no_spb = sum.id WHERE sum.status = 1 ORDER BY sum.status");
$rows = mysqli_num_rows($query);
while ( $result = mysqli_fetch_array($query) ) {
    $data[] = $result;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>SPB ALC LSI-06</title>
    <link rel="stylesheet" href="../../include/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../include/assets/css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../include/assets/css/sector.css">
    <link rel="icon" type="image/png" href="../../include/assets/images/lotte.ico">
</head>

<body>

    <h2>List Item SPB at <i><?= date('d') . ' ' . monthnumtobulan(date('m')) . ' ' . date('Y'); ?></i></h2>

    <table class="styled-table">
        <thead>
            <tr>
                <td>No</td>
                <td>Item</td>
                <td>Qty</td>
                <td>Store</td>
                <td>Status</td>
            </tr>
        </thead>
        <tbody>

            <?php for( $i = 0; $i < $rows; $i++ ) : ?>

                <?php for( $i = 0; $i < $rows; $i++ ) : ?>
                    <tr onclick="location.href = 'data_spb.php?spb=<?= $data[$i]['no_spb'] ?>'">
                        <td><?= $i + 1 ?></td>
                        <td align="left"><?= $data[$i]['item'] ?></td>
                        <td><?= $data[$i]['qty'] ?></td>
                        <td><?= $data[$i]['receiver'] ?></td>

                        <?php if( $data[$i]['status'] == 1 ) : ?>

                            <td style="color: red;">Dipinjam</td>

                        <?php else : ?>

                            <td style="color: green;">Dikembalikan</td>

                        <?php endif; ?>

                    </tr>

                <?php endfor; ?>

            <?php endfor; ?>

        </tbody>
    </table>

</body>
</html>