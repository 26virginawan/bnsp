<?php
include '../koneksi.php';

$kode_buku = $_GET['id'];

mysqli_query($db, "DELETE FROM tbbuku WHERE kode_buku = '$kode_buku'");

header('location:../index.php?p=buku');
?>