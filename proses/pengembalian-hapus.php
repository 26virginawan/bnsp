<?php
include '../koneksi.php';

$id_pengembalian = $_GET['id'];

mysqli_query(
    $db,
    "DELETE FROM tbpengembalian WHERE id_pengembalian = '$id_pengembalian'"
);

header('location:../index.php?p=pengembalian');
?>