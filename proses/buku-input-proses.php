<?php
include '../koneksi.php';

$kode_buku = $_POST['kode_buku'];
$judul_buku = $_POST['judul_buku'];
$pengarang = $_POST['pengarang'];
$deskripsi = $_POST['deskripsi'];
$lokasi = $_POST['lokasi'];

if (isset($_POST['simpan'])) {
    extract($_POST);
    $nama_file = $_FILES['foto']['name'];

    if (!empty($nama_file)) {
        $lokasi_file = $_FILES['foto']['tmp_name'];
        $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $file_foto = $kode_buku . '.' . $tipe_file;

        $folder = "../images/$file_foto";
        move_uploaded_file($lokasi_file, "$folder");
    } else {
        $file_foto = '-';
    }

    $sql = "INSERT INTO tbbuku VALUES ('$kode_buku','$judul_buku','$file_foto','$pengarang','$deskripsi','$lokasi')";
    $query = mysqli_query($db, $sql);

    header('location:../index.php?p=buku');
}
?>