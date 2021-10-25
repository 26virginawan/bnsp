<?php
include '../koneksi.php';

$id = $_POST['id'];
$nomor_surat = $_POST['nomor_surat'];
$kategori = $_POST['kategori'];
$judul = $_POST['judul'];
$waktu = $_POST['waktu'];

if (isset($_POST['simpan'])) {
    extract($_POST);

    $sql = "INSERT INTO tb_arsip VALUES ('$id','$nomor_surat','$kategori','$judul','$waktu')";
    $query = mysqli_query($db, $sql);

    header('location:../index.php?p=beranda');
}
?>