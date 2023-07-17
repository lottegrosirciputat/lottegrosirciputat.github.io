<?php 

/*
* Enable ADOdb
*/
include "adodb5/adodb.inc.php";
$conn = adoNewConnection('mysql');

 
/* Open the connection */
$host		= "localhost";
$user		= "root";
$password	= "";
$database	= "lsi06";

//$conn->debug = true;
$conn->connect($host, $user, $password, $database);
 
?>