<?php

include "conn.php";

  // $artno=trim($_GET['b']);
  // $len=strlen($artno);

  // if($len>10) {

    // $sql_where1="prod_cd='$artno' ";
    // $sql_where1="barcode1='$artno' ";

  // }

  // else if($len==10) {

  //   $get_prod_cd=$artno;

  //   $sql_where1="prod_cd='$get_prod_cd' ";

  // }

  // else if($len==7) {

  //   $get_prod_cd=$artno."000";

  //   $sql_where1="prod_cd='$get_prod_cd' ";

  // }

  // else { // $len <7

  //   $get_prod_cd="1".sprintf("%06d", $artno)."000";

  //   $sql_where1="prod_cd='$get_prod_cd' ";

  // }

  // Koneksi Mulai

$sql_find="select ";

$sql_find.="barcode1, prod_cd, prod_nm, ";

$sql_find.="from ";

$sql_find.="product ";

$sql_find.="where barcode1 = '8999999502010'";

// $sql_find.=$sql_where1;

$sql_find.="order by prod_nm";

// $sql_find.="limit 0, 1";

$rs_find=$connect->Execute($sql_find);

  if(!$rs_find) {

    echo $connect->errorMsg();

  }

  else {

    $numrows=0;

    while(!$rs_find->EOF) {

      $barcode[$numrows]=$rs_find->fields[0];

      $prod_cd[$numrows]=$rs_find->fields[1];

      $prod_nm[$numrows]=$rs_find->fields[2];

      $bprc[$numrows]=$rs_find->fields[3];

      $uom[$numrows]=$rs_find->fields[4];

      $rs_find->MoveNext();

      $numrows+=1;

    }

    $numrows_find=$numrows;

  }

  // koneksi selesai

  if($numrows_find==1) {

    echo $prod_cd[0]."|".$barcode[0]."|".$prod_nm[0]."|".number_format($bprc[0], 0)."|".$uom[0];
    // echo json_encode($return_arr);
    die;

  }

  else {

    echo "|||||";

  }

?>