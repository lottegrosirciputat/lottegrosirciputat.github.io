<?php 

session_start();
require '../../include/function.php';
include "../../include/config/conn_local.php";
date_default_timezone_set('Asia/Jakarta');
$month = substr(date("Y"), -2) . date("m");

$query  = mysqli_query($connect, "SELECT * FROM db_tt_oinp WHERE reg LIKE '$month%' ORDER BY reg");
$rows = mysqli_num_rows($query);
while ( $result = mysqli_fetch_array($query) ) {
    $data[]     = $result;
    $total[]    = $result['amount'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>OINP ALC LSI-06</title>
    <link rel="stylesheet" href="../../include/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../include/assets/css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../include/assets/css/sector.css">
    <link rel="icon" type="image/png" href="../../include/assets/images/lotte.ico">
</head>

<body>

    <h2>OINP at <i><?= monthnumtobulan(date('m')) . ' ' . date('Y'); ?></i></h2>

    <table class="styled-table">
        <thead>
            <tr>
                <td>Tanggal</td>
                <td>No. Reg</td>
                <td>Dari</td>
                <td>Nominal</td>
            </tr>
        </thead>
        <tbody>

            <?php for( $i = 0; $i < $rows; $i++ ) : ?>

                <tr onclick="location.href = 'data.php?key=<?= $data[$i]['reg'] ?>'">
                    <?php $date = substr($data[$i]['reg'], 4, 2) . ' ' . monthnumtobulan(substr($data[$i]['reg'], 2, 2)) . ' ' . '20' . date(substr($data[$i]['reg'], 0, 2)); ?>
                    <td><?= $date ?></td>
                    <td><?= substr($data[$i]['reg'], 0, 6) . '_' . substr($data[$i]['reg'], -6) ?></td>
                    <td align="left"><?= $data[$i]['giver'] ?></td>
                    <td align="right"><?= number_format($data[$i]['amount'], 0, ',', '.') ?></td>
                </tr>

            <?php endfor; ?>

            <tr>
                <td colspan="3">Total</td>
                <td align="right" style="color: #2481C1; font-size: 1.2em;"><?= number_format(array_sum($total), 0, ',', '.') ?></td>
            </tr>

        </tbody>
    </table>

</body>
</html>