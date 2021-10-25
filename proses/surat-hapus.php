<?php
include '../koneksi.php';

$id_anggota = $_GET['id'];

mysqli_query($db, "DELETE FROM tb_arsip WHERE id = '$id_anggota'");

header('location:../index.php?p=beranda');
?>