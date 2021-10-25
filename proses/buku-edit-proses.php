<?php
include '../koneksi.php';

$kode_buku = $_POST['kode_buku'];
$judul_buku = $_POST['judul_buku'];
$pengarang = $_POST['pengarang'];
$lokasi = $_POST['lokasi'];

if (isset($_POST['simpan'])) {
    extract($_POST);
    $nama_file = $_FILES['foto']['name'];

    if (!empty($nama_file)) {
        $lokasi_file = $_FILES['foto']['tmp_nama'];
        $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $file_foto = $kode_buku . '.' . $tipe_file;

        $folder = "../images/$file_foto";
        @unlink("$folder");
        move_uploaded_file($lokasi_file, "$folder");
    } else {
        $file_foto = $foto_awal;
    }

    mysqli_query(
        $db,
        "UPDATE tbbuku SET judul_buku='$judul_buku', pengarang='$pengarang',foto='$file_foto' WHERE kode_buku = '$kode_buku' "
    );

    header('location:../index.php?p=buku');
}
?>