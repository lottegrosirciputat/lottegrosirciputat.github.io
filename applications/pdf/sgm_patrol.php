<?php

require_once __DIR__ . '/vendor/autoload.php';

// ========== S E S S I O N ==========

// session_start();

// ==========  K O N E K S I  ==========

require '../../include/config/conn.php';

$date = $_GET['date'];
$divisi = $_GET['divisi'];
$progress = $_GET['progress'];

if ( $divisi == '' ) {
    $key = "date = '$date' ORDER BY division";
} else {
    $key = "date = '$date' AND division = '$divisi'";
}

$query = "SELECT * FROM db_sgm_patrol WHERE ";
$query .= $key;
$sql = mysqli_query($conn, $query);
$rows = mysqli_num_rows($sql);
while ( $result = mysqli_fetch_array($sql) ) {
    $data[] = $result;
}

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);

$mpdf->AddPageByArray([
    'margin-left' => 0,
    'margin-right' => 0,
    'margin-top' => 0,
    'margin-bottom' => 0,
]);
// $stylesheet = file_get_contents('fonts/fonts.css');

$header = '<div class="header">
                <img src="../../include/assets/img/icons/logo.png" style="width: 50px; margin: 50px 0 0 135px;">
                <h1>SGM PATROL at ' . $date . '</h1>
            </div>
            <table>
                <tr>
                    <th>Divisi</th>
                    <th>Temuan</th>
                    <th>Before</th>
                    <th>After</th>
                </tr>';

$html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <style>
        .container {
            position: relative;
            display: flex;
            flex direction: column;
            justify-content: center;
            width: 100%;
            height: 100%;
        }
        .container .header {
            width: 100%;
            height: 100px;
            display: flex;
            align-items: center;
        }
        .container .header h1 {
            text-align: center;
            font-size: 2em;
            line-height: 50px;
            margin-top: -48px;
            margin-left: 35px;
            margin-bottom: 50px;
        }
        .container table {
            width: 100%;
            margin: 0 20px 50px;
            border-collapse: collapse;
        }
        .container table tr th {
            height: 50px;
            border: 1px solid black;
        }
        .container table tr td {
            
            height: 100px;
            text-align: center;
            border: 1px solid black;
        }
        .container table tr td:nth-child(1) {
            width: 100px;
        }
        .container table tr td:nth-child(3),
        .container table tr td:nth-child(4) {
            width: 210px;
            height: 210px;
        }
    </style>
    <body>
        <div class="container">';
            // if ( $rows < 4 ) :
            $html .= $header;
            if ( $rows <= 4 ) { $row = $rows; } elseif ( $rows >= 4 ) { $row = 4; }
            for ( $i = 0; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            // endif;
            $html .='
            </table>';

            if ( $rows > 4 ) :
            $html .= $header;
            if ( $rows <= 8 ) { $row = $rows; } elseif ( $rows >= 8 ) { $row = 8; }
            for ( $i = 4; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 8 ) :
            $html .= $header;
            if ( $rows <= 12 ) { $row = $rows; } elseif ( $rows >= 12 ) { $row = 12; }
            for ( $i = 8; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 12 ) :
            $html .= $header;
            if ( $rows <= 16 ) { $row = $rows; } elseif ( $rows >= 16 ) { $row = 16; }
            for ( $i = 12; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 16 ) :
            $html .= $header;
            if ( $rows <= 20 ) { $row = $rows; } elseif ( $rows >= 20 ) { $row = 20; }
            for ( $i = 16; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 20 ) :
            $html .= $header;
            if ( $rows <= 24 ) { $row = $rows; } elseif ( $rows >= 24 ) { $row = 24; }
            for ( $i = 20; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 24 ) :
            $html .= $header;
            if ( $rows <= 28 ) { $row = $rows; } elseif ( $rows >= 28 ) { $row = 28; }
            for ( $i = 24; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 28 ) :
            $html .= $header;
            if ( $rows <= 32 ) { $row = $rows; } elseif ( $rows >= 32 ) { $row = 32; }
            for ( $i = 28; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 32 ) :
            $html .= $header;
            if ( $rows <= 36 ) { $row = $rows; } elseif ( $rows >= 36 ) { $row = 36; }
            for ( $i = 32; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 36 ) :
            $html .= $header;
            if ( $rows <= 40 ) { $row = $rows; } elseif ( $rows >= 40 ) { $row = 40; }
            for ( $i = 36; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 40 ) :
            $html .= $header;
            if ( $rows <= 44 ) { $row = $rows; } elseif ( $rows >= 44 ) { $row = 44; }
            for ( $i = 40; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 44 ) :
            $html .= $header;
            if ( $rows <= 48 ) { $row = $rows; } elseif ( $rows >= 48 ) { $row = 48; }
            for ( $i = 44; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 48 ) :
            $html .= $header;
            if ( $rows <= 52 ) { $row = $rows; } elseif ( $rows >= 52 ) { $row = 52; }
            for ( $i = 48; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 52 ) :
            $html .= $header;
            if ( $rows <= 56 ) { $row = $rows; } elseif ( $rows >= 56 ) { $row = 56; }
            for ( $i = 52; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 56 ) :
            $html .= $header;
            if ( $rows <= 60 ) { $row = $rows; } elseif ( $rows >= 60 ) { $row = 60; }
            for ( $i = 56; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 60 ) :
            $html .= $header;
            if ( $rows <= 64 ) { $row = $rows; } elseif ( $rows >= 64 ) { $row = 64; }
            for ( $i = 60; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 64 ) :
            $html .= $header;
            if ( $rows <= 68 ) { $row = $rows; } elseif ( $rows >= 68 ) { $row = 68; }
            for ( $i = 64; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 68 ) :
            $html .= $header;
            if ( $rows <= 72 ) { $row = $rows; } elseif ( $rows >= 72 ) { $row = 72; }
            for ( $i = 68; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 72 ) :
            $html .= $header;
            if ( $rows <= 76 ) { $row = $rows; } elseif ( $rows >= 76 ) { $row = 76; }
            for ( $i = 72; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 76 ) :
            $html .= $header;
            if ( $rows <= 80 ) { $row = $rows; } elseif ( $rows >= 80 ) { $row = 80; }
            for ( $i = 76; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 80 ) :
            $html .= $header;
            if ( $rows <= 84 ) { $row = $rows; } elseif ( $rows >= 84 ) { $row = 84; }
            for ( $i = 80; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 84 ) :
            $html .= $header;
            if ( $rows <= 88 ) { $row = $rows; } elseif ( $rows >= 88 ) { $row = 88; }
            for ( $i = 84; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 88 ) :
            $html .= $header;
            if ( $rows <= 92 ) { $row = $rows; } elseif ( $rows >= 92 ) { $row = 92; }
            for ( $i = 88; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 92 ) :
            $html .= $header;
            if ( $rows <= 96 ) { $row = $rows; } elseif ( $rows >= 96 ) { $row = 96; }
            for ( $i = 92; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 96 ) :
            $html .= $header;
            if ( $rows <= 100 ) { $row = $rows; } elseif ( $rows >= 100 ) { $row = 100; }
            for ( $i = 96; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 100 ) :
            $html .= $header;
            if ( $rows <= 104 ) { $row = $rows; } elseif ( $rows >= 104 ) { $row = 104; }
            for ( $i = 100; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 104 ) :
            $html .= $header;
            if ( $rows <= 108 ) { $row = $rows; } elseif ( $rows >= 108 ) { $row = 108; }
            for ( $i = 104; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 108 ) :
            $html .= $header;
            if ( $rows <= 112 ) { $row = $rows; } elseif ( $rows >= 112 ) { $row = 112; }
            for ( $i = 108; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 112 ) :
            $html .= $header;
            if ( $rows <= 116 ) { $row = $rows; } elseif ( $rows >= 116 ) { $row = 116; }
            for ( $i = 112; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 116 ) :
            $html .= $header;
            if ( $rows <= 120 ) { $row = $rows; } elseif ( $rows >= 120 ) { $row = 120; }
            for ( $i = 116; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 120 ) :
            $html .= $header;
            if ( $rows <= 124 ) { $row = $rows; } elseif ( $rows >= 124 ) { $row = 124; }
            for ( $i = 120; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 124 ) :
            $html .= $header;
            if ( $rows <= 128 ) { $row = $rows; } elseif ( $rows >= 128 ) { $row = 128; }
            for ( $i = 124; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 128 ) :
            $html .= $header;
            if ( $rows <= 132 ) { $row = $rows; } elseif ( $rows >= 132 ) { $row = 132; }
            for ( $i = 128; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 132 ) :
            $html .= $header;
            if ( $rows <= 136 ) { $row = $rows; } elseif ( $rows >= 136 ) { $row = 136; }
            for ( $i = 132; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 136 ) :
            $html .= $header;
            if ( $rows <= 140 ) { $row = $rows; } elseif ( $rows >= 140 ) { $row = 140; }
            for ( $i = 136; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 140 ) :
            $html .= $header;
            if ( $rows <= 144 ) { $row = $rows; } elseif ( $rows >= 144 ) { $row = 144; }
            for ( $i = 140; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 144 ) :
            $html .= $header;
            if ( $rows <= 148 ) { $row = $rows; } elseif ( $rows >= 148 ) { $row = 148; }
            for ( $i = 144; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 148 ) :
            $html .= $header;
            if ( $rows <= 152 ) { $row = $rows; } elseif ( $rows >= 152 ) { $row = 152; }
            for ( $i = 148; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 152 ) :
            $html .= $header;
            if ( $rows <= 156 ) { $row = $rows; } elseif ( $rows >= 156 ) { $row = 156; }
            for ( $i = 152; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 156 ) :
            $html .= $header;
            if ( $rows <= 160 ) { $row = $rows; } elseif ( $rows >= 160 ) { $row = 160; }
            for ( $i = 156; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 160 ) :
            $html .= $header;
            if ( $rows <= 164 ) { $row = $rows; } elseif ( $rows >= 164 ) { $row = 164; }
            for ( $i = 160; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 164 ) :
            $html .= $header;
            if ( $rows <= 168 ) { $row = $rows; } elseif ( $rows >= 168 ) { $row = 168; }
            for ( $i = 164; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 168 ) :
            $html .= $header;
            if ( $rows <= 172 ) { $row = $rows; } elseif ( $rows >= 172 ) { $row = 172; }
            for ( $i = 168; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 172 ) :
            $html .= $header;
            if ( $rows <= 176 ) { $row = $rows; } elseif ( $rows >= 176 ) { $row = 176; }
            for ( $i = 172; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 176 ) :
            $html .= $header;
            if ( $rows <= 180 ) { $row = $rows; } elseif ( $rows >= 180 ) { $row = 180; }
            for ( $i = 176; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 180 ) :
            $html .= $header;
            if ( $rows <= 184 ) { $row = $rows; } elseif ( $rows >= 184 ) { $row = 184; }
            for ( $i = 180; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 184 ) :
            $html .= $header;
            if ( $rows <= 188 ) { $row = $rows; } elseif ( $rows >= 188 ) { $row = 188; }
            for ( $i = 184; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 188 ) :
            $html .= $header;
            if ( $rows <= 192 ) { $row = $rows; } elseif ( $rows >= 192 ) { $row = 192; }
            for ( $i = 188; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 192 ) :
            $html .= $header;
            if ( $rows <= 196 ) { $row = $rows; } elseif ( $rows >= 196 ) { $row = 196; }
            for ( $i = 192; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            if ( $rows > 196 ) :
            $html .= $header;
            if ( $rows <= 200 ) { $row = $rows; } elseif ( $rows >= 200 ) { $row = 200; }
            for ( $i = 196; $i < $row; $i++ ) :
            $html .='
                <tr>
                    <td>' . $data[$i]['division'] . '</td>
                    <td>' . $data[$i]['temuan'] . '</td>
                    <td><img src="../sgm_patrol/images/' . $data[$i]['id'] . '" style="width: 200px; height: 200px;"></td>';
                    if ( $data[$i]['progress'] == '' ) :
                    $html .='
                    <td>On Progress</td>';
                    else :
                    $html .='
                    <td><img src="../sgm_patrol/images/' . $data[$i]['progress'] . '" style="width: 200px; height: 200px;"></td>';
                    endif;
                    $html .='
                </tr>';
                endfor;
            $html .='
            </table>';
            endif;

            $html .='
        </div>
    </body>
</html>';

$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($html);
$mpdf->Output('sgm_patrol.pdf', 'I');
// $mpdf->Output('sgm_patrol.pdf', 'D');

?>
