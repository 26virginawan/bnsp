<?php
include '../koneksi.php';

$id_peminjaman = $_POST['id_peminjaman'];
$nama = $_POST['nama'];
$judul_buku = $_POST['judul_buku'];
$tgl_pinjam = $_POST['tgl_pinjam'];

if (isset($_POST['simpan'])) {
    extract($_POST);

    $sql = "INSERT INTO tbpeminjaman VALUES ('$id_peminjaman','$nama','$judul_buku','$tgl_pinjam')";
    $query = mysqli_query($db, $sql);

    header('location:../index.php?p=peminjaman');
}
?>