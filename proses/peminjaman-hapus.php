<?php
include '../koneksi.php';

$id_peminjaman = $_GET['id'];

mysqli_query(
    $db,
    "DELETE FROM tbpeminjaman WHERE id_peminjaman = '$id_peminjaman'"
);

header('location:../index.php?p=peminjaman');
?>