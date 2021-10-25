<?php
include '../koneksi.php';

$id_pengembalian = $_POST['id_pengembalian'];
$nama_anggota = $_POST['nama'];
$judul_buku = $_POST['judul_buku'];
$tgl_kembali = $_POST['tgl_kembali'];

if (isset($_POST['simpan'])) {
    extract($_POST);

    $sql = "INSERT INTO tbpengembalian VALUES ('$id_pengembalian','$nama_anggota','$judul_buku','$tgl_kembali')";
    $query = mysqli_query($db, $sql);

    header('location:../index.php?p=pengembalian');
}
?>