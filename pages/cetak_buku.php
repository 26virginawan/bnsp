<?php

include '../koneksi.php';

$kode_buku = $_GET['id'];
$q_tampil_buku = mysqli_query(
    $db,
    "SELECT * FROM tbbuku WHERE kode_buku = '$kode_buku'"
);
$r_tampil_buku = mysqli_fetch_array($q_tampil_buku);

if (empty($r_tampil_buku['foto']) or $r_tampil_buku['foto'] == '-') {
    $foto = 'admin-no-photo.jpg';
} else {
    $foto = $r_tampil_buku['foto'];
}
?>
<div id="label-page">
    <h3>Kartu Buku</h3>
</div>
<div id="content">
    <table id="tabel-input">

        <tr>
            <td class="label-formulir">Kode Buku</td>
            <td class="isian-formulir"><?php echo $r_tampil_buku[
                'kode_buku'
            ]; ?> </td>
        </tr>
        <tr>
            <td class="label-formulir">Judul Buku</td>
            <td class="isian-formulir"><?php echo $r_tampil_buku[
                'judul_buku'
            ]; ?> </td>
        </tr>
        <tr>
            <td class="label-formulir">FOTO</td>
            <td class="isian-formulir"><img src="../images/<?php echo $foto; ?>" width="60px" height="75px"></td>
        </tr>
        <tr>
            <td class="label-formulir">Pengarang</td>
            <td class="isian-formulir"><?php echo $r_tampil_buku[
                'pengarang'
            ]; ?> </td>
        </tr>
        <tr>
            <td class="label-formulir">Lokasi Buku</td>
            <td class="isian-formulir"><?php echo $r_tampil_buku[
                'lokasi'
            ]; ?> </td>
        </tr>
    </table>
</div>
<script>
window.print();
</script>