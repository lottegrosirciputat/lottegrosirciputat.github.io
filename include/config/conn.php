<?php 

$conn = mysqli_connect("localhost", "root", "", "lsi06");

if (!$conn) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}

?>